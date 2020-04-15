<?php

class Pagamento extends CI_Model {

	public $ambiente 	= 'sandbox';
	public $email 		= 'dossantosrafael193@gmail.com';
	public $token 		= '46234107AC8E41D4BDCDAB00AC2F7977';

	public function pagar() {


		//URL DA API
		$url = 'https://ws'.($this->ambiente == 'sandbox' ? '.sandbox' : '' ).'.pagseguro.uol.com.br/v2/sessions';

		//INICIA O CURL
		$ch = curl_init($url);

		//PARAMETROS
		$params['email'] = $this->email; 
		$params['token'] = $this->token;

		//EXECUTA O CURL
		curl_setopt_array(
			$ch,
			array(
				CURLOPT_POSTFIELDS		=> http_build_query($params),
				CURLOPT_POST 			=> count($params),
				CURLOPT_RETURNTRANSFER 	=> 1,
				CURLOPT_TIMEOUT			=> 45,
				CURLOPT_SSL_VERIFYPEER 	=> false,
				CURLOPT_SSL_VERIFYHOST 	=> false, 
			)
		);

		$response = NULL;

		try{
			$response = curl_exec($ch);
		} catch (Exception $e){
			Mage::logException($e);
			return false;
		}

		libxml_use_internal_errors(true);

		$xml = simplexml_load_string($response);
		if (false === $xml) {
			if (curl_errno($ch) > 0) {
				$this->writeLog('Falha de comunicação com a API do PagSeguro: '. curl_error($ch));
			} else {
				$this->writeLog('Falha na autenticação com API do PagSeguro email e token cadastrados.
					Retorno: '. $response
				);
			}
			return false;
		}

		//RETORNA PARA O JSON
		echo '{"id":"'.$xml->id.'"}';

	}


}
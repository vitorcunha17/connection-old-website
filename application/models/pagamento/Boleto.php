<?php

include_once('Pagamento.php');
class Boleto extends Pagamento {				

	//URL DA API
	public $endereco;

	public function __construct()
	{
		$this->endereco = 'https://ws'.($this->ambiente == 'sandbox' ? '.sandbox' : '' ).'.pagseguro.uol.com.br/v2/transactions';
	}

	public function pagarBoleto($pag_valor, $pag_hash, array $dadosComprador) {
		$this->load->library('session');

		$data = array(
			"email"			=> $this->email,
			"token"			=> $this->token,   
			"paymentMode"	=> "default",
			"paymentMethod"	=> "boleto",
			"receiverEmail"	=> $this->email,

			"currency"		=>	"BRL",
			"extraAmount"	=>	"",

			"itemId1"		=> "0001",
			"itemDescription1" 	=> "Compra de candidatos",
			"itemAmount1" 		=> number_format($pag_valor, 2, '.', ''),
			"itemQuantity1"		=>"1",

			"notificationURL"	=>	"",
			"reference"			=>	uniqid(date('dmyHis')), 

			"senderName"		=> 	$dadosComprador['bo_nome'],
			"senderCPF"			=>	$dadosComprador['bo_cpf'],
			"senderAreaCode"	=>	$dadosComprador['bo_area'],
			"senderPhone"		=>	$dadosComprador['bo_telefone'],
			"senderEmail"		=>	"teste@sandbox.pagseguro.com.br", //$this->session->userdata('email_empresa'),
			"senderHash" 		=>  $pag_hash,
			"shippingAddressStreet"		=>	$dadosComprador['bo_rua'],
			"shippingAddressNumber"		=> $dadosComprador['bo_numero_residencia'],
			"shippingAddressComplement"	=> "", //opcional
			"shippingAddressDistrict"	=> $dadosComprador['bo_bairro'],
			"shippingAddressPostalCode"	=> $dadosComprador['bo_cep'],
			"shippingAddressCity"		=> $dadosComprador['bo_cidade'],
			"shippingAddressState"		=> $dadosComprador['bo_estado'],
			"shippingAddressCountry"	=> $dadosComprador['bo_pais'],

			"shippingType"		=> "1", 
			"shippingCost"		=> "0.00",	

		);
		
	    //FAZ A MÁGICA QUE PEGA OS DADOS DA ARRAY() E MONTA A URL COMPLETA
		$fields_string = '';
		foreach ($data as $key=>$value)
		{ 
			$fields_string .= $key.'='.$value.'&'; 
		}
		$fields_string = rtrim($fields_string,'&');

		$ch = curl_init();    
		curl_setopt($ch,CURLOPT_URL, $this->endereco);
		curl_setopt($ch,CURLOPT_POST, count($data));
		curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);    		
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch,  CURLOPT_USERAGENT , "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)"); 

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	    //execute post
		$result = curl_exec($ch);

	    //close connection
		curl_close($ch);

	    //PEGA O RESULTADO E CONVERTE EM STRING
		$result = simplexml_load_string($result);  


		//GRAVA OS DADOS NO BANCO DE DADOS
		$this->load->database();
		//verifica se existe algum dado de retorno vazio, caso exista, então não cadastra o pedido no banco e retorna um erro
		if(!empty($result->code)) {

			$valor = number_format($pag_valor, 2, '.', '');

			foreach($this->session->userdata('pagamento')['id'] as $id_candidato) {

				$planos    = SELF::listaPlanosAvulsos(); //pega os planos
				$candidato = SELF::listarCandidato(strtolower($id_candidato)); //pega os dados do candidato para determinar o valor dele
				$preco = null;
				//pega valor do candidato
				if(strtolower($candidato[0]->situacao_curso) == 'concluido') {

					$preco = $planos[1]->valor_planos_avulsos;

				}else {

					$preco = $planos[0]->valor_planos_avulsos;

				}

				//verifica se o status do pagamento é 1 (aguardando pagamento)
				if($result->status == 1 OR $result->status == 2) {

					SELF::emailNotifica($candidato[0]->email, 'Olá <strong>'.$candidato[0]->nome.'</strong><br>Uma empresa teve interesse no seu perfil, ela adicionou você a lista de compras para que possa entrar em contato, em breve ela poderá estrar em contato com você, boa sorte!', 'Ótimas noticias pra você!');//email que será enviado para o candidato

					if($result->status == 1) {

						SELF::cadastraCompra($id_candidato, $this->session->userdata('pagamento')['id_empresa'], 'Aguardando pagamento', $preco, $data['reference']);

					}elseif($result->status == 2) {

						SELF::cadastraCompra($id_candidato, $this->session->userdata('pagamento')['id_empresa'], 'Em análise', $preco, $data['reference']);

					}	
					
					//muda o status do candidato e coloca como aguardando pagamento
					SELF::atualizaCandidato($id_candidato, 4); //esse numero será alterado de acordo com o status de pagamento, se o pagamento for aprovado por exemplo, então o numero muda pra 5 que é de comprado


			//se o pagamento já tiver sido aprovado ou disponivel
				}elseif($result->status == 3 OR $result->status == 4) {

				SELF::emailNotifica($candidato[0]->email, 'Olá <strong>'.$candidato[0]->nome.'</strong><br>Uma empresa teve interesse no seu perfil, em breve ela poderá estrar em contato com você, boa sorte!', 'Ótimas noticias pra você!');//email que será enviado para o candidato

				//muda o status do candidato e coloca como aguardando pagamento
					SELF::atualizaCandidato($id_candidato, 5); //esse numero será alterado de acordo com o status de pagamento, se o pagamento for aprovado por exemplo, então o numero muda pra 5 que é de comprado
					SELF::cadastraCompraAprovada($id_candidato, $this->session->userdata('pagamento')['id_empresa'], $preco);

				}

			}

			if ($result->status == 1) {

			$status = 'Aguardando Pagamento';
		//envia mensagem notificando a empresa sobre o status da compra
			SELF::emailNotifica($this->session->userdata('email_empresa'), 'Você solicitou uma compra por boleto em nosso sistema, caso ainda não tenha imprimido o boleto, estamos enviando o link abaixo: <br>
				<a href=" '. $result->paymentLink .' ">Imprimir boleto</a><br>
					Em breve teremos novidades!', 'Status da compra');//email que será enviado para a empresa

		} elseif ($result->status == 2) {

			$status = 'Em análise';
		//envia mensagem notificando a empresa sobre o status da compra
			SELF::emailNotifica($this->session->userdata('email_empresa'), 'Você solicitou uma compra por boleto em nosso sistema, caso ainda não tenha imprimido o boleto, estamos enviando o link abaixo: <br>
				<a href=" '. $result->paymentLink .' ">Imprimir boleto</a><br>
					Em breve teremos novidades!', 'Status da compra');//email que será enviado para a empresa

		}elseif ($result->status == 3 OR $result->status == 4) {

			$status = 'Pago';

		//envia mensagem notificando a empresa de que o pagamento foi aprovado
		SELF::emailNotifica($this->session->userdata('email_empresa'), 'Parabéns, sua compra foi aprovada!', 'Status da compra');//email que será enviado para a empresa

	}


		//limpa o carrinho
		unset($_SESSION['pagamento']);

			//IMPRIMI O RETORNO EM JSON
			return '{"code":"'.$result->paymentLink.'", "status_operacao": "sucesso"}';

		}else {

			//IMPRIMI O RETORNO EM JSON
			return '{"code":"'.json_encode($dadosComprador).'", "status_operacao": "erro"}';

	}
		

}

	//Serve para pegar os dados do candidato no momento da compra
public function listarCandidato($id) {

	$this->load->database();
	$quantidade = $this->db->query("SELECT * FROM candidato INNER JOIN curso cu ON candidato.curso = cu.id INNER JOIN area a ON cu.id_area = a.id WHERE candidato.id_candidato = ".$this->db->escape($id));
	return $quantidade->result();

}

	//lista plano avulso
public function listaPlanosAvulsos()
{
	$this->load->database();
	$sql = $this->db->query("SELECT * FROM planos_avulsos ORDER BY nivel_planos_avulsos ASC");
	return $sql->result();
}

	//envia email para para notificar candidato e empresa
public function emailNotifica($email, $msg, $assunto)
{

	$header  = 'MIME-Version: 1.0' . "\r\n";
	$header .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	$to      = $email;
	$subject = $assunto;
	$message = $msg;

	mail($to, $subject, $message, $header);

}

	//cadastra o pedido no banco
public function cadastraCompra($id_candidato, $id_empresa, $status, $preco, $referencia)
{

	$this->load->database();
	$this->db->query("INSERT INTO candidatos_pedidos (
		id_candidato_pedido,
		id_empresa_pedido,
		status_pedido,
		forma_pagamento,
		preco,
		code
		)
		VALUES ("
		.$this->db->escape($id_candidato).","
		.$this->db->escape($id_empresa).","
		.$this->db->escape($status).
		",'Cartão', "
		.$this->db->escape($preco).","
		.$this->db->escape($referencia).
		")"
	);

}

//cadastra a compra no banco (quando é aprovado)
public function cadastraCompraAprovada($id_candidato, $id_empresa, $preco)
{

	//pega a data da compra
	$data_compra = date('d/m/Y - H:i:s');

	$this->load->database();
	$this->db->query("INSERT INTO candidatos_comprados (
		id_candidato_comprado,
		id_empresa_compradora,
		data_compra,
		preco
		)
		VALUES ("
		.$this->db->escape($id_candidato).","
		.$this->db->escape($id_empresa).","
		.$this->db->escape($data_compra).","
		.$this->db->escape($preco).
		")"
	);

}

	//atualiza o status do candidato
public function atualizaCandidato($id_candidato, $status)
{

	$this->load->database();
	$this->db->query("UPDATE candidato SET status = ".$this->db->escape($status)." WHERE id_candidato = ".$this->db->escape($id_candidato));

}

}



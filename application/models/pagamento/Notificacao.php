<?php

include_once('Pagamento.php');
class Notificacao extends Pagamento {

	//atualiza os pedidos (candidatos comprados)
	public function atualizaPedido($notificationCode) {

		$data['token'] =$this->token;
		$data['email'] = $this->email;

		$data = http_build_query($data);

		$url = 'https://ws.sandbox.pagseguro.uol.com.br/v3/transactions/notifications/'.$notificationCode.'?'.$data;

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		$xml = curl_exec($curl);
		curl_close($curl);

		$xml = simplexml_load_string($xml);

		$reference = $xml->reference;
		$status = $xml->status;

		if($reference && $status){
			//verifica e atualiza o pedido
			SELF::verificaPedido($reference, $status);

			echo $status;
			echo '<br>';
			echo $reference;
		}

	}



	public function verificaPedido($reference, $status) {

		$this->load->database();

		//VERIFICA SE O CÓDIGO DE NOTIFICAÇÃO SE REFERE A UMA COMPRA DE CANDIDATO
		$sql = $this->db->query('SELECT * FROM candidatos_pedidos WHERE code = '.$this->db->escape($reference));
		if(count($sql->result()) >= 1) {

			//se o pedido existir, verifica se o status é de pago
			if($status == 1) { //o pagamento ainda não foi feito

				SELF::atualizaCompra($reference, 'Aguardando pagamento');

			}elseif($status == 2) { //pagamento esta sendo analisado

				SELF::atualizaCompra($reference, 'Em análise');

			}elseif($status == 3 OR $status == 4) { //pagamento foi aprovado

				
				//muda status do candidato para 5, ou seja, para comprado
				SELF::atualizaCandidato($sql->result()[0]->id_candidato_pedido, 5);
				//move compra para a lista de compras aprovadas da empresa
				SELF::moveCompra(
					$sql->result()[0]->id_candidato_pedido,
					$sql->result()[0]->id_empresa_pedido,
					$sql->result()[0]->preco
				);
				//apaga a compra dos pedidos
				SELF::apagaCompra($reference);


			}elseif($status == 7) { //se o pagamento foi cancelado (geralmente quando o boleto não é pago)

				//muda status do candidato para 2, ou seja, faz com que ele volte a ficar disponivel
				SELF::atualizaCandidato($sql->result()[0]->id_candidato_pedido, 2);

				//apaga a compra dos pedidos
				SELF::apagaCompra($reference);

			}

		}

		unset($sql);
		//CASO O CÓDIGO NÃO CORRESPONDA A NENHUMA COMPRA DE CANDIDATO, ENTÃO ELA SE REFERE A COMPRA DE PLANO
		$sql = $this->db->query('SELECT * FROM planos_pedidos INNER JOIN planos ON planos_pedidos.id_planos = planos.id_planos WHERE code = '.$this->db->escape($reference));

		//pega dados da empresa
		$dadosEmpresa = SELF::pegaInformacoesEmpresa($sql->result()[0]->id_empresa_planos_pedido);

		if(count($sql->result()) >= 1) { //se encontrar uma compra de plano com o código dessa notificação

			//se o pedido existir, verifica se o status é de pago
			if($status == 1) { //o pagamento ainda não foi feito

				SELF::atualizaCompraPlanos($reference, 'Aguardando pagamento');

			}elseif($status == 2) { //pagamento esta sendo analisado

				SELF::atualizaCompraPlanos($reference, 'Em análise');

			}elseif($status == 3 OR $status == 4) { //pagamento foi aprovado


				//verifica se a compra se refere a uma compra de plano
				if($sql->result()[0]->tipo_de_pagamento == "compra") {

					// Data de ínicio 
					$inicio     = (new DateTime());

					$data_inicio = $inicio->format('Y/m/d');

					// Adiciona 12 meses a data
					$novaData   = $inicio->add(new DateInterval('P12M')); 

					// Altera a nova data para o último dia do mês
					$vencimento = $novaData->format('Y/m/d');

					$dados = [

						"id_planos"                   => $sql->result()[0]->id_planos,
						"limite_restante_vagas_plano" => $sql->result()[0]->limite_planos,
						"data_inicio_plano"           => $data_inicio,
						"data_termino_plano"          => $vencimento,
						"meses_pagos"                 => 1,
						"saldo_adicionado_do_mes"     => 1,
						"valor_plano"                 => $sql->result()[0]->valor_planos,
						"id_empresa"                  => $sql->result()[0]->id_empresa_planos_pedido,

					];

					//adiciona o plano a empresa e apaga o pedido
					SELF::cadastraCompraAprovadaPlanos($dados);
 
				}elseif($sql->result()[0]->tipo_de_pagamento == "pagamento_atrasado") { //caso o paamento seja referente a pagamento de plano vencido

					$dados = [

						"id_planos"                   => $sql->result()[0]->id_planos,
						"limite_restante_vagas_plano" => $sql->result()[0]->limite_planos,
						"data_inicio_plano"           => $dadosEmpresa[0]->data_inicio_plano,
						"data_termino_plano"          => $dadosEmpresa[0]->data_vencimento_plano,
						"meses_pagos"                 => (int) $dadosEmpresa[0]->meses_pagos + (int) $sql->result()[0]->meses_sendo_pagos,
						"saldo_adicionado_do_mes"     => $dadosEmpresa[0]->saldo_adicionado_do_mes,
						"valor_plano"                 => $dadosEmpresa[0]->valor_plano,
						"id_empresa"                  => $sql->result()[0]->id_empresa_planos_pedido,

					];

					//adiciona o plano a empresa e apaga o pedido
					SELF::cadastraCompraAprovadaPlanos($dados);

				}elseif($sql->result()[0]->tipo_de_pagamento == "pagamento_adiantado") { //caso o paamento seja referente a pagamento adiantado

					$dados = [

						"id_planos"                   => $sql->result()[0]->id_planos,
						"limite_restante_vagas_plano" => $dadosEmpresa[0]->limite_restante_vagas_plano,
						"data_inicio_plano"           => $dadosEmpresa[0]->data_inicio_plano,
						"data_termino_plano"          => $dadosEmpresa[0]->data_vencimento_plano,
						"meses_pagos"                 => (int) $dadosEmpresa[0]->meses_pagos + (int) $sql->result()[0]->meses_sendo_pagos,
						"saldo_adicionado_do_mes"     => $dadosEmpresa[0]->saldo_adicionado_do_mes,
						"valor_plano"                 => $dadosEmpresa[0]->valor_plano,
						"id_empresa"                  => $sql->result()[0]->id_empresa_planos_pedido,

					];

					//adiciona o plano a empresa e apaga o pedido
					SELF::cadastraCompraAprovadaPlanos($dados);

				}

			}elseif($status == 7) { //pagamento foi cancelado

				//tira o pedido de compra de plano do banco
				@SELF::limpaPedidoPlano($sql->result()[0]->id_empresa_planos_pedido);

			}

		}

	}

	//PARTE USADA PARA COMPRA DE PLANOS ==================================================================================================================
	//cadastra a compra no banco (quando é aprovado)
		public function cadastraCompraAprovadaPlanos(array $dados)
		{

			$this->load->database();

			//adiciona o plano a empresa
			$this->db->query("UPDATE empresa SET 
				plano_empresa               = ". $this->db->escape($dados['id_planos']) .",
				limite_restante_vagas_plano = ". $this->db->escape($dados['limite_restante_vagas_plano']) .",
			    data_inicio_plano           = ". $this->db->escape($dados['data_inicio_plano']) .",
			    data_termino_plano          = ". $this->db->escape($dados['data_termino_plano']).",
			    meses_pagos                 = ". $this->db->escape($dados['meses_pagos']).",
				saldo_adicionado_do_mes     = ". $this->db->escape($dados['saldo_adicionado_do_mes']).",
				valor_plano                 = ". $this->db->escape($dados['valor_plano']).
			    " WHERE id_empresa =".$this->db->escape($dados['id_empresa'])
			);

			//tira o pedido de compra de plano do banco
			@SELF::limpaPedidoPlano($dados['id_empresa']);


		}

		public function atualizaCompraPlanos($reference, $status) {

		$this->load->database();
		$sql = $this->db->query('UPDATE planos_pedidos SET status_planos_pedido = '. $this->db->escape($status) .' WHERE code = '.$this->db->escape($reference));
		if($sql) {
			return true;
		}

		}

		//pega dados do plano
		public function pegaDadosPlano($id_planos) {

			$this->load->database();
			$resultado = $this->db->query("SELECT * FROM planos WHERE id_planos =".$this->db->escape($id_planos));
			return $resultado->result();

		}

		//limpa pedido de plano do banco (caso exista, isso porque como o pagamento é pelo cartão, ele pode ser aprovado na hora e nem chegar a ir pro carrinho)
		public function limpaPedidoPlano($id_empresa) {

			$this->load->database();
			$resultado = $this->db->query("DELETE FROM planos_pedidos WHERE id_empresa_planos_pedido =".$this->db->escape($id_empresa));

		}


	//PARTE USADA TANTO PARA COMPRA DE PLANOS, QUANTO PARA COMPRA DE CANDIDATOS =========================================================================

	//envia email para para notificações
	public function emailNotifica($email, $msg, $assunto)
	{

		$header  = 'MIME-Version: 1.0' . "\r\n";
		$header .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$to      = $email;
		$subject = $assunto;
		$message = $msg;

		mail($to, $subject, $message, $header);

	}

	//pega informações da empresa
	public function pegaInformacoesEmpresa($id_empresa)
	{
		$this->load->database();
		$sql = $this->db->query("SELECT * FROM empresa WHERE id_empresa = ". $this->db->escape($id_empresa));
		return $sql->result();
	}


	//PARTE DE COMPRA DE CANDIDATOS =====================================================================================================================

	public function moveCompra($id_candidato_comprado, $id_empresa_compradora, $preco) {

		//pega a data da compra (na verdade essa é a data de aprovação do pagamento)
		$data_compra = date('d/m/Y - H:i:s');

		$this->load->database();
		$sql = $this->db->query("INSERT INTO candidatos_comprados (
			id_candidato_comprado,
			id_empresa_compradora,
			data_compra,
			preco
			)
			VALUES ("
			.$this->db->escape($id_candidato_comprado).","
			.$this->db->escape($id_empresa_compradora).","
			.$this->db->escape($data_compra).","
			.$this->db->escape($preco).
			")"
		);
		if($sql) {

			SELF::emailNotifica(SELF::pegaInformacoesEmpresa($id_empresa_compradora)[0]->email, 'Parabéns, sua compra foi aprovada!', 'Status da compra');

		}

	}

	public function atualizaCompra($reference, $status) {

		$this->load->database();
		$sql = $this->db->query('UPDATE candidatos_pedidos SET status_pedido = '. $this->db->escape($status) .' WHERE code = '.$this->db->escape($reference));
		if($sql) {
			return true;
		}

	}

	public function apagaCompra($reference) { //geralmente depois de ser aprovada

		$this->load->database();
		$sql = $this->db->query('DELETE FROM candidatos_pedidos WHERE code = '. $this->db->escape($reference));
		if($sql) {
			return true;
		}
	}


	//atualiza o status do candidato
	public function atualizaCandidato($id_candidato, $status)
	{

		$this->load->database();
		$this->db->query("UPDATE candidato SET status = ".$this->db->escape($status)." WHERE id_candidato = ".$this->db->escape($id_candidato));

	}


}
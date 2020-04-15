<?php

			include_once('Pagamento.php');
			class CartaoPlanoPagamentoAdiantado extends Pagamento {				

				//URL DA API
				public $endereco;

				public function __construct()
				{
					$this->endereco = 'https://ws'.($this->ambiente == 'sandbox' ? '.sandbox' : '' ).'.pagseguro.uol.com.br/v2/transactions';
				}

				public function pagarCartao($pag_tproduto, $pag_hash, $pag_token, $pag_tparcela, $pag_vparcela, array $dadosComprador) {
					$this->load->library('session');

					$data = array(
						"email"			=> $this->email,
						"token"			=> $this->token,   
						"paymentMode"	=> "default",
						"paymentMethod"	=> "creditCard",
						"receiverEmail"	=> $this->email,

						"currency"		=>	"BRL",
						"extraAmount"	=>	"", //opcional

						"itemId1"		=> "0001",
						"itemDescription1" 	=> "Pagamento de fatura de plano",
						"itemAmount1" 		=> number_format($pag_tproduto, 2, '.', ''),
						"itemQuantity1"		=>"1",

						"notificationURL"	=>	"",
						"reference"			=>	uniqid(date('dmyHis')), 

						"senderName"		=> 	$dadosComprador['cc_nome'],
						"senderCPF"			=>	$dadosComprador['cc_cpf'],
						"senderAreaCode"	=>	$dadosComprador['cc_area'],
						"senderPhone"		=>	$dadosComprador['cc_telefone'],
						"senderEmail"		=>	"teste@sandbox.pagseguro.com.br", //$this->session->userdata('email_empresa'),
						"senderHash" 		=>  $pag_hash,
						//"shippingAddressRequired"   => false, //isso desabilita a obrigatoriedade de se enviar os dados de endereço do cliente, true habita a obrigatoriedade	 (deixe como esta)	
						"shippingAddressStreet"		=>	$dadosComprador['cc_rua'],
						"shippingAddressNumber"		=> $dadosComprador['cc_numero_residencia'],
						"shippingAddressComplement"	=> "", //opcional
						"shippingAddressDistrict"	=> $dadosComprador['cc_bairro'],
						"shippingAddressPostalCode"	=> $dadosComprador['cc_cep'],
						"shippingAddressCity"		=> $dadosComprador['cc_cidade'],
						"shippingAddressState"		=> $dadosComprador['cc_estado'],
						"shippingAddressCountry"	=> $dadosComprador['cc_pais'],

						"shippingType"		=> "1",  //opcional
						"shippingCost"		=> "0.00",	//opcional

						"creditCardToken" 	=> $pag_token,

						"installmentQuantity"	=> $pag_tparcela,
						"installmentValue" 		=> number_format($pag_vparcela, 2, '.', ''),

						"creditCardHolderName"	=>	$dadosComprador['cc_nome'],
						"creditCardHolderCPF"	=> 	$dadosComprador['cc_cpf'],
						"creditCardHolderBirthDate"	=>	$dadosComprador['cc_nascimento'],
						"creditCardHolderAreaCode"	=>	$dadosComprador['cc_area'],
						"creditCardHolderPhone"	=>	$dadosComprador['cc_telefone'],
						"billingAddressStreet"	=>	$dadosComprador['cc_rua'],	
						"billingAddressNumber"	=>	$dadosComprador['cc_numero_residencia'],
						"billingAddressComplement"	=>	"",
						"billingAddressDistrict"	=>	$dadosComprador['cc_bairro'],
						"billingAddressPostalCode"	=>	$dadosComprador['cc_cep'],
						"billingAddressCity"	=>	$dadosComprador['cc_cidade'],
						"billingAddressState"	=>	$dadosComprador['cc_estado'],
						"billingAddressCountry" => $dadosComprador['cc_pais']

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

						$valor = number_format($pag_tproduto, 2, '.', '');

							//verifica se o status do pagamento é 1 (aguardando pagamento)
						if($result->status == 1 OR $result->status == 2) {

								SELF::emailNotifica($this->session->userdata('email_empresa'), 'Olá, você solicitou o pagamento de suas faturas, em breve entraremos em contato com o andamento do processo', 'Status de pagamento');//email que será enviado para a empresa

								if($result->status == 1) {

									SELF::cadastraCompra(
										$this->session->userdata('pagamento_antecipado')['id_empresa'],
										$this->session->userdata('pagamento_antecipado')['id_plano'],
										'Aguardando pagamento',
										$this->session->userdata('pagamento_antecipado')['valor_plano'],
										0,
										$this->session->userdata('pagamento_antecipado')['total'],
										$data['reference'],
										$this->session->userdata('pagamento_antecipado')['pagando_quantidade_meses']
									);

								}elseif($result->status == 2) {

									SELF::cadastraCompra(
										$this->session->userdata('pagamento_antecipado')['id_empresa'],
										$this->session->userdata('pagamento_antecipado')['id_plano'],
										'Em análise',
										$this->session->userdata('pagamento_antecipado')['valor_plano'],
										0,
										$this->session->userdata('pagamento_antecipado')['total'],
										$data['reference'],
										$this->session->userdata('pagamento_antecipado')['pagando_quantidade_meses']
									);

								}	

						//se o pagamento já tiver sido aprovado ou disponivel
							}elseif($result->status == 3 OR $result->status == 4) {


							SELF::emailNotifica($this->session->userdata('email_empresa'), 'Olá, o pagamento do seu plano já foi aprovado, aproveite!', 'Status de pagamento');//email que será enviado para a empresa
							SELF::cadastraCompraAprovada(
								$this->session->userdata('pagamento_antecipado')['id_empresa'],
								$this->session->userdata('pagamento_antecipado')['pagando_quantidade_meses']
							);

						}elseif($result->status == 7) { //se o pagamento for cancelado

							SELF::limpaPedidoPlano($this->session->userdata('pagamento_antecipado')['id_empresa']);

						}

						if ($result->status == 1) {

						$status = 'Aguardando Pagamento';

					} elseif ($result->status == 2) {

						$status = 'Em análise';

					}elseif ($result->status == 3 OR $result->status == 4) {

						$status = 'Pago';

					}


					//limpa o carrinho
					unset($_SESSION['pagamento_antecipado']);

					//IMPRIMI O RETORNO EM JSON
					return '{"codeTransacao":"'.$result->code.'", "statusTransacao":"'.$status.'", "status_operacao": "sucesso"}';

					}else {

						//IMPRIMI O RETORNO EM JSON
					return '{"codeTransacao": '.json_encode($dadosComprador).', "statusTransacao":"erro", "status_operacao": "erro"}';

					}

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
				public function cadastraCompra($id_empresa, $id_plano, $status, $preco, $taxa, $precoTotal, $referencia, $meses_sendo_pagos)
				{

					$this->load->database();
					$this->db->query("INSERT INTO planos_pedidos (
						id_empresa_planos_pedido,
						id_planos,
						status_planos_pedido,
						preco,
						taxa,
						preco_total,
						code,
						meses_sendo_pagos,
						tipo_de_pagamento
						)
						VALUES ("
						.$this->db->escape($id_empresa).","
						.$this->db->escape($id_plano).","
						.$this->db->escape($status).","
						.$this->db->escape($preco).","
						.$this->db->escape($taxa).","
						.$this->db->escape($precoTotal).","
						.$this->db->escape($referencia).","
						.$this->db->escape($meses_sendo_pagos).","
						.$this->db->escape('pagamento_adiantado').
						")"
					);

				}

			//atualizada o plano da empresa quando o pagamento é aprovado
				public function cadastraCompraAprovada($id_empresa, $meses_sendo_pagos)
				{

					$this->load->database();

						//atualiza o plano da empresa
					$this->db->query("UPDATE empresa SET 
						meses_pagos                 = meses_pagos + ". $this->db->escape($meses_sendo_pagos).
						" WHERE id_empresa =".$this->db->escape($id_empresa)
					);

						//tira o pedido de compra de plano do banco
					@SELF::limpaPedidoPlano($id_empresa);

				}

			//limpa pedido de plano do banco (caso exista, isso porque como o pagamento é pelo cartão, ele pode ser aprovado na hora e nem chegar a ir pro carrinho)
			public function limpaPedidoPlano($id_empresa) {

				$this->load->database();
				$resultado = $this->db->query("DELETE FROM planos_pedidos WHERE id_empresa_planos_pedido =".$this->db->escape($id_empresa));

			}

			}
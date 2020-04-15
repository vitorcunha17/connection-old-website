<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Realizar pagamento</title>
	<link rel="icon" href="favicon.png">

	<meta property="og:locale" content="pt_BR">
	<meta property="og:image:type" content="image/png">
	<meta property="og:image:width" content="400">
	<meta property="og:image:height" content="400">
	
	<!-- Arquivos  CSS -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/empresa/pagamento/dist/bootstrap/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/empresa/pagamento/css/estilo.css') ?>">
</head>
<body>

	<section class="tabs-pagamentos" style="margin-bottom:80px;">
		<div class="container">

			<h4><a href="<?= base_url('empresa/login/logado_inicial/planos') ?>">Voltar</a></h4>

			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

					<div>
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active">
								<a href="#cartao" aria-controls="cartao" role="tab" data-toggle="tab">Cartão de Crédito</a>
							</li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="cartao">

								<div class="row">
									<div class="col-xs-12 col-sm-11 col-md-11 col-lg-11">
										<h3>Pagar com cartão de crédito</h3>
										<p>
											Preencha o formulário abaixo, com os dados do seu cartão.
										</p>

												<p>Meses sendo pagos: <?= $this->session->userdata('pagamento_antecipado')['pagando_quantidade_meses']; ?></p>
												<p>Valor do plano: R$ <?= number_format($this->session->userdata('pagamento_antecipado')['valor_plano'], 2, ',', '.'); ?></p>
												<h4 style="padding: 10px 0">Total: R$: <?= number_format($this->session->userdata('pagamento_antecipado')['total'],2,",","."); ?></h4>

										</div>
										<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
											<div class="cc_brand" id="show_brand"><!-- vai fica a bandeira do cartão --></div>
										</div>
									</div>	

									<div id="erros_cartao"><!-- aqui fica os erros --></div>
									<div id="msg_cartao"><!-- msg cartão --></div>


									<form method="post" id="form_pagamento" name="form_pagamento">
										<div class="row">
											<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
												<div class="form-group">
													<label>Número do cartão</label>
													<input type="text" id="cc_numero" class="form-control">
													<span id="cc_erro" class="erro"><!-- erro no cartão --></span>
												</div>
											</div>
											<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
												<div class="form-group">
													<label>Nome no cartão</label>
													<input type="text" id="cc_nome" class="form-control">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
												<div class="form-group">
													<label>Válidade mês</label>
													<input type="text" id="cc_mes" class="form-control">
												</div>
											</div>
											<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
												<div class="form-group">
													<label>Válidade ano</label>
													<input type="text" id="cc_ano" class="form-control">
												</div>
											</div>
											<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
												<div class="form-group">
													<label>CVV</label>
													<input type="text" id="cc_cvv" class="form-control">
												</div>
											</div>
											<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
												<div class="form-group">
													<label>Parcelamento</label>
													<select id="cc_parcela" class="form-control">
														<option value=""></option>
													</select>
												</div>
											</div>
										</div>


										<div class="row">
											<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
												<div class="form-group">
													<label>CPF (apenas números)</label>
													<input type="number" id="cc_cpf" class="form-control">
												</div>
											</div>
											<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
												<div class="form-group">
													<label>Nascimento</label>
													<input type="date" id="cc_nascimento" class="form-control">
												</div>
											</div>
											<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
												<div class="form-group">
													<label>Código de área</label>
													<input type="number" id="cc_area" class="form-control">
												</div>
											</div>
											<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
												<div class="form-group">
													<label>Telefone (sem código de área)</label>
													<input type="number" id="cc_telefone" class="form-control">
												</div>
											</div>
										</div>

										<div class="row">

											<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
												<div class="form-group">
													<label>CEP (apenas números)</label>
													<input type="number" id="cc_cep" class="form-control">
												</div>
											</div>

											<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
												<div class="form-group">
													<label>País</label>
													<input type="text" id="cc_pais" class="form-control">
												</div>
											</div>
											<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
												<div class="form-group">
													<label>Estado</label>
													<input type="text" id="cc_estado" class="form-control">
												</div>
											</div>
											<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
												<div class="form-group">
													<label>Cidade</label>
													<input type="text" id="cc_cidade" class="form-control">
												</div>
											</div>
										</div>


										<div class="row">

											<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
												<div class="form-group">
													<label>Bairro</label>
													<input type="text" id="cc_bairro" class="form-control">
												</div>
											</div>

											<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
												<div class="form-group">
													<label>Rua</label>
													<input type="text" id="cc_rua" class="form-control">
												</div>
											</div>
											<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
												<div class="form-group">
													<label>Número da residência</label>
													<input type="number" id="cc_numero_residencia" class="form-control">
												</div>
											</div>
										</div>


										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<button id="pag_cartao" class="btn btn-primary">Pagar com cartão</button>
											</div>
										</div>
										<input type="hidden" id="cc_brand" value="">
										<input type="hidden" id="total_compra" value="<?= $this->session->userdata('pagamento_antecipado')['total']; ?>">
									</form>

									<h4 class="text-center margin-top20">Aceitamos os seguintes cartões</h4>
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<ul class="PaymentMethods" id="PaymentMethods">
												<!-- Aqui vai carregar as bandeiras de pagamento -->

											</ul>
										</div>
									</div>
								</div>

							</div>

						</div>
					</div>
				</div>
			</div>

		</section>

		<!-- Atribui a url que será pega pelo ajax do cartão -->
		<div class="cartaoAjax" data-cartao-ajax="<?= base_url('empresa/login/CartaoPlanoPagamentoAdiantado') ?>"></div>
		<div class="chamaAPI" data-chama-api-ajax="<?= base_url('empresa/login/chamaAPI') ?>"></div>
		<!-- Arquivos JS -->
		<script src="<?= base_url('assets/empresa/pagamento/dist/jquery/jquery.js') ?>"></script>
		<script src="<?= base_url('assets/empresa/pagamento/dist/bootstrap/js/bootstrap.min.js') ?>"></script>
		<script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
		<script src="<?= base_url('assets/empresa/pagamento/js/getPaymentMethods.js') ?>"></script>
		<script src="<?= base_url('assets/empresa/pagamento/js/pagCartao.js') ?>"></script>

		<!-- pega informações do cep -->
		<script>

        $(document).ready(function() {

        	//PEGA OS DADOS DO CEP (AREA CARTAO) =============================================
            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                
                $("#cc_estado").val("...");
                $("#cc_cidade").val("");
                $("#cc_bairro").val("...");
                $("#cc_rua").val("...");
            }

            //Quando o campo cep perde o foco.
            $("#cc_cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if (validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        
                        $("#cc_estado").val("...");
                        $("#cc_cidade").val("...");
                        $("#cc_bairro").val("...");
                        $("#cc_rua").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                
                                $("#cc_estado").val(dados.uf);
                                $("#cc_cidade").val(dados.localidade);
                                $("#cc_bairro").val(dados.bairro);
                                $("#cc_rua").val(dados.logradouro);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            }); //FIM PEGA OS DADOS DO CEP (AREA CARTAO) =============================================


        });
    </script>
	</body>
	</html>
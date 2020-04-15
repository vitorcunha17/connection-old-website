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

	<?php var_dump($this->session->userdata('pagar_todas_tarifas')) ?>

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

												<p>Meses atrasados: <?= strtolower($this->session->userdata('pagar_todas_tarifas')['atrasados']); ?></p>
												<h4 style="padding: 10px 0">Total: R$: <?= number_format($this->session->userdata('pagar_todas_tarifas')['total'],2,",","."); ?></h4>

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
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<button id="pag_cartao" class="btn btn-primary">Pagar com cartão</button>
											</div>
										</div>
										<input type="hidden" id="cc_brand" value="">
										<input type="hidden" id="total_compra" value="<?= $this->session->userdata('pagar_todas_tarifas')['total']; ?>">
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
		<div class="cartaoAjax" data-cartao-ajax="<?= base_url('empresa/login/pagamentoCartaoPlanoVencidos') ?>"></div>
		<div class="chamaAPI" data-chama-api-ajax="<?= base_url('empresa/login/chamaAPI') ?>"></div>
		<!-- Arquivos JS -->
		<script src="<?= base_url('assets/empresa/pagamento/dist/jquery/jquery.js') ?>"></script>
		<script src="<?= base_url('assets/empresa/pagamento/dist/bootstrap/js/bootstrap.min.js') ?>"></script>
		<script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
		<script src="<?= base_url('assets/empresa/pagamento/js/getPaymentMethods.js') ?>"></script>
		<script src="<?= base_url('assets/empresa/pagamento/js/pagCartao.js') ?>"></script>
	</body>
	</html>
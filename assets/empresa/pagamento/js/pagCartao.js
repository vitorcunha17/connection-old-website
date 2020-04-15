$(document).ready(function(){		
	var ccCampo			= $('#cc_numero');
	var btnPagarCartao 	= $('#pag_cartao');
	var errosCartao		= $('#erros_cartao');
	var totalCompra		= $('#total_compra').val();

	//FUNÇÃO PEGA BANDEIR DO CARÃO E PEGA OS PARCELAMENTO
	ccCampo.on('blur', function(event){
		event.preventDefault();
		var ccNumero 	= $('#cc_numero').val();
		var showBrand	= $('#show_brand');
		var ccErro		= $('#cc_erro');
		var ccBrand		= $('#cc_brand');
		var ccParcelas	= $('#cc_parcela');

		if (ccNumero >= 6) {	
			var cBin = ccNumero.substr(0, 6);
			PagSeguroDirectPayment.getBrand({
				cardBin: cBin,
				success: function(response){
					var brand = response.brand.name;
					showBrand.html('<img src="https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/68x30/'+brand+'.png">');
					ccBrand.val(brand);

					PagSeguroDirectPayment.getInstallments({
						amount: totalCompra,
						brand: brand,
						success: function(response){
							var rParcelas = response.installments[brand];
							ccErro.empty();
							errosCartao.empty();

							var numeroParcelas = '';
							var juros = '';

							$.each(rParcelas, function(key,value){
								juros = (value.interestFree == true) ? 'S/ juros' : 'C/ juros';
								numeroParcelas += '<option value="'+value.quantity+'|'+value.installmentAmount+'">'+value.quantity+' x de '+ formatMoeda(value.installmentAmount) +' - Total: '+ formatMoeda(value.installmentAmount * value.quantity) +' '+ juros +'</option>';
							});

							ccParcelas.html(numeroParcelas);
						},
						error: function(response){
							ccErro.html('Cartão inválido');
						}
					});
				},
				error: function(response){
					ccErro.html('Cartão inválido');
				}
			});
		} else {
			ccErro.html('Cartão inválido');
		}
	})

	//FUNÇAO PARA CRIA TOKEN
	btnPagarCartao.on('click', function(event){
		event.preventDefault();
		var ccNumero 	= $('#cc_numero').val();
		var ccNome 		= $('#cc_nome').val();
		var ccMes 		= $('#cc_mes').val();
		var ccAno 		= $('#cc_ano').val();			
		var ccBrand 	= $('#cc_brand').val();
		var ccCvv 		= $('#cc_cvv').val();

		PagSeguroDirectPayment.createCardToken({
			cardNumber: ccNumero,
			brand: ccBrand,
			cvv: ccCvv,
			expirationMonth: ccMes,
			expirationYear: ccAno,
			success: function(response){
				var token = response.card.token;
				errosCartao.empty();
				pagarCartao(token);
			},
			error: function(response){
				errosCartao.html(response);
			}
		});

	});

	//FUNÇAO PARA O CARTÃO ENVIAR OS DADOS VIA AJAX POST
	function pagarCartao(token){

			//DADOS DO TITULAR
			var cc_nome				= $('#cc_nome').val();
			var cc_cpf				= $('#cc_cpf').val();
			var cc_nascimento		= $('#cc_nascimento').val();
			var cc_area				= $('#cc_area').val();
			var cc_telefone			= $('#cc_telefone').val();
			var cc_cep				= $('#cc_cep').val();
			var cc_pais				= $('#cc_pais').val();
			var cc_estado			= $('#cc_estado').val();
			var cc_cidade			= $('#cc_cidade').val();
			var cc_bairro			= $('#cc_bairro').val();
			var cc_rua			    = $('#cc_rua').val();
			var cc_numero_residencia= $('#cc_numero_residencia').val();
			////////////////////////////////////////////////////////////

		var hashPagamento  = PagSeguroDirectPayment.getSenderHash();
		var msgCartao 	   = $('#msg_cartao');
		var formPagamento  = $('#form_pagamento');
		var boleto_oculta  = $('#boleto_oculta');
		var debito_oculta  = $('#debito_oculta');
		var tokenPagamento = token; 

		//PEGA INFORMAÇÕES DA PARCELA
		var totalParcela	= $('#cc_parcela');	
		$parcelaValor = totalParcela.val();
		$parcelaValor = $parcelaValor.split("|");

		t_parcela = $parcelaValor[0]; 
		v_parcela = $parcelaValor[1];
		var totalPagarCartao = (t_parcela * v_parcela).toFixed(2);	
		var $url  = document.querySelector('.cartaoAjax').getAttribute('data-cartao-ajax');  //pega a url de solicitação ajax, atualmente o valor é passado fixamente como: 'core/ajax/cartaoCredito.php', mas agora ele será pego dinamicamente

		$.ajax({
			url:  $url,
			type: 'POST',
			dataType: 'json',
			data: {
				"pag_hash": hashPagamento,
				"pag_token": tokenPagamento,
				"pag_tproduto": totalCompra,
				"pag_tparcela": t_parcela,
				"pag_vparcela": v_parcela,
				"cc_nome": cc_nome,
				"cc_cpf": cc_cpf,
				"cc_nascimento": cc_nascimento,
				"cc_area": cc_area,
				"cc_telefone": cc_telefone,
				"cc_cep": cc_cep,
				"cc_pais": cc_pais,
				"cc_estado": cc_estado,
				"cc_cidade": cc_cidade,
				"cc_bairro": cc_bairro,
				"cc_rua": cc_rua,
				"cc_numero_residencia": cc_numero_residencia

			},
			beforeSend: function(){
	        	 msgCartao.html('<div class="alert alert-success" role="alert">Dados de pagamento enviado, aguarde por favor.</div>'); 
	        },
	        success: function(data){
	        	btnPagarCartao.hide();
	        	formPagamento.hide();
	        	boleto_oculta.hide();
	        	debito_oculta.hide();
	        	var status = data.statusTransacao;
	        	var code = data.codeTransacao;
	        	var status_operacao = data.status_operacao;

	        	if(status_operacao == "sucesso") {
	        		msgCartao.html('<div class="alert alert-success text-center" role="alert"><h3>Pagamento realizado com sucesso.</h3> <br> Status do pagamento: <strong>'+ status +'</strong> <br> Código da transação: <strong>'+ code +'</strong><br><button onclick="window.location.reload()">Voltar</button></div>');
	        	}else {
	        	    msgCartao.html('<div class="alert alert-danger text-center" role="alert"><h3>Erro ao realizar o pagamento.</h3> <br> Status do pagamento: <strong>Verifique os dados e tente novamente</strong><br><button onclick="window.location.reload()">Voltar</button></div>');
	        	    console.log(code);

	        	}
	        }          
		})
		
	}

	//FUNÇÃO PARA CONVERTER EM MOEDA
	function formatMoeda( int )
	{
        var valor = int.toFixed(2);
        valor = valor.replace(".", ",");	       	
        return "R$ "+ valor;
	}

});
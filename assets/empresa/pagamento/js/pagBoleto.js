$(document).ready(function(){		
	var btnPagarBoleto 	= $('#pag_boleto');
	var msgBoleto 		= $('#msg_boleto');
	var totalCompra		= $('#total_compra').val();

	var debito_oculta  = $('#debito_oculta');
	var cartao_oculta  = $('#cartao_oculta');
	var boleto_form    = $('#boleto_form');

	//ENVIA SOLICITAÇAO DE PAGAMENTO POR BOLETO
	btnPagarBoleto.on('click', function(event){

		//DADOS DO TITULAR
			var bo_nome				= $('#bo_nome').val();
			var bo_cpf				= $('#bo_cpf').val();
			var bo_nascimento		= $('#bo_nascimento').val();
			var bo_area				= $('#bo_area').val();
			var bo_telefone			= $('#bo_telefone').val();
			var bo_cep				= $('#bo_cep').val();
			var bo_pais				= $('#bo_pais').val();
			var bo_estado			= $('#bo_estado').val();
			var bo_cidade			= $('#bo_cidade').val();
			var bo_bairro			= $('#bo_bairro').val();
			var bo_rua			    = $('#bo_rua').val();
			var bo_numero_residencia= $('#bo_numero_residencia').val();
			////////////////////////////////////////////////////////////

		event.preventDefault();
		var hashPagamento = PagSeguroDirectPayment.getSenderHash();
		var $url  = document.querySelector('.boletoAjax').getAttribute('data-boleto-ajax');
		$.ajax({         
	        url: $url,
	        type: 'POST',
	        data: {
	        	pag_hash: hashPagamento,
	        	pag_valor: totalCompra,
	        	"bo_nome": bo_nome,
				"bo_cpf": bo_cpf,
				"bo_nascimento": bo_nascimento,
				"bo_area": bo_area,
				"bo_telefone": bo_telefone,
				"bo_cep": bo_cep,
				"bo_pais": bo_pais,
				"bo_estado": bo_estado,
				"bo_cidade": bo_cidade,
				"bo_bairro": bo_bairro,
				"bo_rua": bo_rua,
				"bo_numero_residencia": bo_numero_residencia
	        },
	        beforeSend: function(){
	        	msgBoleto.html('<div class="alert alert-success" role="alert">Aguarde o boleto está sendo gerado.</div>');        
	        },
	        success: function(data){
	        	btnPagarBoleto.hide();
	        	debito_oculta.hide();
	        	cartao_oculta.hide();
	        	boleto_form.hide();
	        	var code = data.code;
	        	var status_operacao = data.status_operacao;

	        	console.log(data.code);

	        	if(status_operacao == "sucesso") {
	        		msgBoleto.html('<div class="alert alert-success" role="alert">Boleto gerado com sucesso, <strong>clique no botão para imprimir</strong>.<br /> <a href="'+code+'" target="_blank" class="btn btn-success" title="Imprimir boleto">Imprimir Boleto</a><br><button onclick="window.location.reload()">Voltar</button></div>');	
	        	}else {
	        	    msgBoleto.html('<div class="alert alert-danger text-center" role="alert"><h3>Erro ao realizar o pagamento.</h3> <br> Status do pagamento: <strong>Verifique os dados e tente novamente</strong><br><button onclick="window.location.reload()">Voltar</button></div>');
	        	    console.log( code );
	        	}
           		       
	        }               
	   	});	
	})
});
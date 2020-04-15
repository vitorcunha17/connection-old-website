$(document).ready(function(){		

	var btnPagarDebito 	= $('#pag_debito');
	var msgDebito		= $('#msg_debito');
	var totalCompra		= $('#total_compra').val();	

	var boleto_oculta  = $('#boleto_oculta');
	var cartao_oculta  = $('#cartao_oculta');
	var debito_form    = $('#debito_form');

	btnPagarDebito.on('click', function(event){

		//DADOS DO TITULAR
			var de_nome				= $('#de_nome').val();
			var de_cpf				= $('#de_cpf').val();
			var de_nascimento		= $('#de_nascimento').val();
			var de_area				= $('#de_area').val();
			var de_telefone			= $('#de_telefone').val();
			var de_cep				= $('#de_cep').val();
			var de_pais				= $('#de_pais').val();
			var de_estado			= $('#de_estado').val();
			var de_cidade			= $('#de_cidade').val();
			var de_bairro			= $('#de_bairro').val();
			var de_rua			    = $('#de_rua').val();
			var de_numero_residencia= $('#de_numero_residencia').val();
			////////////////////////////////////////////////////////////

		event.preventDefault();

		var hashPagamento = PagSeguroDirectPayment.getSenderHash();
		var $url  = document.querySelector('.debitoAjax').getAttribute('data-debito-ajax');
		$.ajax({         
	        url: $url,
	        type: 'POST',
	        data: {
	        	pag_hash: hashPagamento,
	        	pag_valor: totalCompra,
	        	"de_nome": de_nome,
				"de_cpf": de_cpf,
				"de_nascimento": de_nascimento,
				"de_area": de_area,
				"de_telefone": de_telefone,
				"de_cep": de_cep,
				"de_pais": de_pais,
				"de_estado": de_estado,
				"de_cidade": de_cidade,
				"de_bairro": de_bairro,
				"de_rua": de_rua,
				"de_numero_residencia": de_numero_residencia
	        	},
	        beforeSend: function(){
	        	msgDebito.html('<div class="alert alert-success" role="alert">Aguarde um instante</div>');        
	        },
	        success: function(data){
	        	btnPagarDebito.hide();
	        	boleto_oculta.hide();
	        	cartao_oculta.hide();
	        	debito_form.hide();
	        	var code = data.code;
	        	var status_operacao = data.status_operacao;

	        	if(status_operacao == "sucesso") {
	        		msgDebito.html('<div class="alert alert-success" role="alert">Seus dados foram enviado para o PagSeguro<br>agora você precisa realizar a transferência on-line,<br><strong>Clique no botão pagar</strong><br /> <a href="'+code+'" target="_blank" class="btn btn-success" title="Ambiente seguro">Abrir ambiente SEGURO</a><br><button onclick="window.location.reload()">Voltar</button></div>');
	        	}else {
	        	    msgDebito.html('<div class="alert alert-danger text-center" role="alert"><h3>Erro ao realizar o pagamento.</h3> <br> Status do pagamento: <strong>Verifique os dados e tente novamente</strong><br><button onclick="window.location.reload()">Voltar</button></div>');
	        	    console.log(code);
	        	}
	        		           		       
	        }               
    	});	

	})

});
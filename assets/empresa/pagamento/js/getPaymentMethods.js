$(document).ready(function(){		
	var $url  = document.querySelector('.chamaAPI').getAttribute('data-chama-api-ajax');
	$.ajax({         
        url: $url,
        dataType: 'json',
        success: function(data){
            var idSessao = data.id;               
            PagSeguroDirectPayment.setSessionId(idSessao);
            PagSeguroDirectPayment.getPaymentMethods({
		        success: function(response){ 			        	
		           var PaymentMethods = '';			           
		           $.each(response.paymentMethods.CREDIT_CARD.options, function(key,value){			                
		                PaymentMethods+= '<li class="icone"><img src=https://stc.pagseguro.uol.com.br'+value.images.MEDIUM.path+' /></li>';   			                   
		           });
		           $('#PaymentMethods').html(PaymentMethods);
		        }
		    }); 			       
        }               
    });	
});
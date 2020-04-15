<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Candidato Comprado</title>

	<style type="text/css">

		* {margin: 0;padding: 0;border: none;box-sizing: border-box}
		html,body {width: 100%;height: 100%}

		.bloco  {display: flex;flex-wrap: wrap;position: relative;height: 100%}

		.conversas {padding: 30px 10px;/*flex-grow: 1*/}
		.conversas > p,.conversas > a {text-decoration: none;color: #454545;padding: 10px 0;display: flex;align-items: center;border-bottom: 1px solid #eee}
		.conversas > p > img, .conversas > a > img {margin-right: 5px}

		.chat {display: flex;flex-direction: column;flex: 1;/*flex-grow: 5; */overflow: auto;width: 80%;margin-bottom: 75px}
		.mensagem {padding: 30px 40px;background: #EEE;margin: 15px 30px;position: relative;border-radius: 20px;color: #454545;line-height: 1.5em}
		.mensagem:after {content: "";position: absolute;}
		time {display: block;padding: 10px 0;text-align: right;font-size: 12px}
		.autor {text-decoration: none;font-size: 14px;display: block;padding: 10px 0;color: #222;cursor: text}
		.msgCandidato {background: #81D4FA}
		.msgCandidato:after {right: -30px;bottom: 0;border-left: 60px solid #81D4FA;border-top: 40px solid transparent;border-bottom: 0 solid transparent;}
		.msgEmpresa:after {left: -30px;bottom: 0;border-right: 60px solid #EEE;border-top: 40px solid transparent;border-bottom: 0 solid transparent;}

		.formulario {position: fixed;width: 100%;bottom: 0;background: #fff;box-shadow: 0 0 20px #ccc;display: flex;}
		textarea {flex: 1}
		input {padding: 15px 35px;color: #fff;border: none;outline: none;background: #2d7ca0}
		textarea {padding: 15px;color: #454545;border: none;outline: none}

	</style>
</head>
<body>
	<div class="bloco">

		<div class="chat">

			<div class="bloco-mensagens">
				<!-- LISTA AS MENSAGENS -->
				<div class="mensagens"></div>
			</div>

		</div>
		<form class="formulario" method="post" action="<?= base_url('candidato/login/enviaMensagem_') ?>">
		
				<textarea placeholder="Digite sua mensagem" name="mensagem" class="texto"></textarea>
				<input type="submit" value="Enviar">
	
		</form>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="http://malsup.github.com/jquery.form.js"></script>
	<script type="text/javascript">

		$(document).ready(function() {

			var x = 0;

		var timeout = setInterval(reloadChat, 1000);    
		function reloadChat () {

			<?php $link =  base_url("candidato/login/mensagens/"); ?>
			$('.mensagens').load('<?= $link ?>');
			if(x == 1) {

				setInterval((function() {
   					$( ".chat" ).scrollTop( $(".bloco-mensagens").height());
				}), 1000);
				
				x = 0;
			}

		}

		//ENVIA MENSAGEM
		$('form').ajaxForm({
            beforeSend: function() {
            },
            uploadProgress: function(event, position, total, percentComplete) {
            },
            complete: function(xhr) {
            	x = 1;
            	$(".texto").val("");
            }
        });

		})


	</script>

</body>
</html>
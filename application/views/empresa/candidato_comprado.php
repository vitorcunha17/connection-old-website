<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Candidato Comprado</title>

	<style type="text/css">

	* {margin: 0;padding: 0;border: none;box-sizing: border-box}
	html,body {width: 100%;height: 100%}

	.bloco  {display: flex;flex-wrap: wrap;position: relative;height: 100%;width: 80%;margin: 0 30px}

.conversas {padding: 30px 10px;/*flex-grow: 1*/}
.conversas > p,.conversas > a {text-decoration: none;color: #454545;padding: 10px 0;display: flex;align-items: center;border-bottom: 1px solid #eee}
.conversas > p > img, .conversas > a > img {margin-right: 5px}

.chat {display: flex;flex-direction: column;flex: 1;/*flex-grow: 5; */overflow: auto;width: 80%;margin-bottom: 75px}
.mensagem {padding: 30px 40px;background: #EEE;margin: 15px 30px;position: relative;border-radius: 20px;color: #454545;line-height: 1.5em}
.mensagem:after {content: "";position: absolute;}
time {display: block;padding: 10px 0;text-align: right;font-size: 12px}
.autor {text-decoration: none;font-size: 14px;display: block;padding: 10px 0;color: #222;cursor: text}
.msgEmpresa {background: #81D4FA}
.msgEmpresa:after {right: -30px;bottom: 0;border-left: 60px solid #81D4FA;border-top: 40px solid transparent;border-bottom: 0 solid transparent;}
.msgCandidato:after {left: -30px;bottom: 0;border-right: 60px solid #EEE;border-top: 40px solid transparent;border-bottom: 0 solid transparent;}

.formulario {position: fixed;width: 80%;bottom: 0;background: #fff;box-shadow: 0 0 20px #ccc;display: flex;}
textarea {flex: 1}
input {padding: 15px 35px;color: #fff;border: none;outline: none;background: #2d7ca0}
textarea {padding: 15px;color: #454545;border: none;outline: none}






.elvis ul{
	list-style: none !important;
	margin: 0 !important;
}
.elvis ul li{
	padding: 15px !important;
	position: relative !important;
	width: 250px !important;
	background-color: #34495E !important;
	border-top: 1px solid #BDC3C7 !important;
	border-right: 3.5px solid #F1C40F !important;
	cursor: pointer !important;
}
.elvis ul ul{
	transition: all 0.3s !important;
	opacity:0 !important;
	visibility: hidden !important;
	position: absolute !important;
	left: 100% !important;
	top: -2% !important;
}

.elvis ul li:hover > ul{
	opacity: 1 !important;
	visibility: visible !important;
}

.elvis ul li:hover{
	background-color: orange !important;
}

.elvis ul li a{
	color: #fff;
	text-decoration: none !important;
}
span{
	margin-right: 15px !important;
}

.candidatoSelecionado {
	background: #069 !important;
	border-color: #069 !important;
	outline-color: #069 !important;
}
.candidatoSelecionado:hover {
	background: #069 !important;
}
.candidatoSelecionado:focus {
	background: #069 !important;
	border-color: #069 !important;
}

#sad{
	margin-top: 0px !important;
	margin-left: 700px !important;
	position: absolute!important;
}
#menu ul {
	padding: 0px 0 !important;
	margin: 0px !important;
	background-color:#074656 !important;
	list-style:none !important;

}

#menu ul li { display: inline !important; }


#menu ul li a {


	padding:  11px 27px !important;
	display: inline-block !important;


	/* visual do link */
	background-color:#304E54 !important;
	color: #333 !important;
	text-decoration: none !important;
	border-bottom:3px solid #EDEDED !important;

}

#menu ul li a:hover {
	background-color:#6d6d6d !important;
	color: #6D6D6D !important;
	border-bottom:3px solid #f28b32 !important;
}

/*  Elementos que se referem ao mapa */

</style>
</head>
<body>
	<body  id="page-top" data-spy="scroll" data-target=".navbar">
		<header class="container-fluid bg-dark navbar-dark">
			<nav id= "menu">
				<script>localStorage.setItem('idEmpresa',)</script>
				<ul class="nav navbar navbar-dark">
					<li class="nav-item"><a href="<?= base_url('empresa/login/logado_inicial/meu_perfil'); ?>" class="nav-link text-white" ><FONT COLOR="#FFFFFF">Meu Perfil</FONT></a></li>
					<li class="nav-item"><a href="<?= base_url('empresa/login/logado_inicial/curriculum_recebido'); ?>"  class="nav-link text-white"><FONT COLOR="#FFFFFF">Curriculum recebido</FONT></a></li>
					<li class="nav-item"><a href="<?= base_url('empresa/login/logado_inicial/cadastra_vaga'); ?>" class="nav-link text-white"><FONT COLOR="#FFFFFF">Cadastrar vaga</a></FONT></li>
					<li class="nav-item"><a href="<?= base_url('empresa/login/logado_inicial/planos'); ?>"  class="nav-link text-white" ><FONT COLOR="#FFFFFF">Planos</FONT></a></li>
					<li class="nav-item"><a href="<?= base_url('empresa/login/logado'); ?>"  class="nav-link text-white" ><FONT COLOR="#FFFFFF">Candidatos</FONT></a></li>
					<li class="nav-item"><a href="<?= base_url('empresa/login/logado_inicial/compras_aprovadas'); ?>" class="nav-link text-white"><FONT COLOR="#FFFFFF">Contratados</FONT></a></li>
					<li class="nav-item"><a href="<?= base_url('empresa/login/logado_inicial/compras_aprovadas'); ?>" class="nav-link text-white"><FONT COLOR="#FFFFFF">Novas mensagens (<span class="totais" style="margin: 0 !important"></span>)</FONT></a></li>
					<li class="nav-item"><a href="<?= base_url('empresa/login/logado_inicial/pedidos'); ?>" class="nav-link text-white"><FONT COLOR="#FFFFFF">Meus Pedidos</FONT></a></li>
					<li class="nav-item"><a href="#" class="nav-link text-white"><FONT COLOR="#FFFFFF">Contato - Connection</FONT></a></li>
					<li class="nav-item"><a href="<?= base_url('empresa/login/logado_inicial/sair'); ?>" class="nav-link text-white"><FONT COLOR="#FF041E">Sair</FONT></a></li>
				</ul>
			</nav>
		</header>

		<div class="bloco">


			<div class="conversas">

				<?php foreach($dados["candidatos_comprados"] as $candidatos) { ?>
				<a href="<?= base_url('empresa/login/chat/'.$candidatos->id_candidato_comprado) ?>" <?php if($this->uri->segment(4) == $candidatos->id_candidato_comprado) { echo "style='background: #eee;padding: 20px'"; } ?> data-id="<?= $candidatos->id_candidato ?>" class="candidatoItem"><img src="https://www.law.berkeley.edu/wp-content/uploads/2015/04/Blank-profile.png" alt="" width="30"><?= $candidatos->nome ?>  (<span style="margin: 0 !important" class="msgsNaoLidas"></span>)</a>
				<?php } ?>

			</div>

			<div class="chat">

				<div class="bloco-mensagens">
					<!-- LISTA AS MENSAGENS -->
					<div class="mensagens"></div>
				</div>

			</div>

			<?php if($this->uri->segment(4) AND is_numeric($this->uri->segment(4))) { ?>
			<form class="formulario" method="post" action="<?= base_url('empresa/login/enviaMensagem_') ?>">

				<textarea placeholder="Digite sua mensagem" name="mensagem" class="texto"></textarea>
				<input type="submit" value="Enviar">
				<input type="hidden" value="<?= $this->uri->segment(4) ?>" name="id_candidato">

			</form>
			<?php } ?>
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="http://malsup.github.com/jquery.form.js"></script>
		<script type="text/javascript">

			$(document).ready(function() {

				var timeout = setInterval(reloadChat, 1000);    
				function reloadChat () {

					<?php $link =  base_url("empresa/login/mensagens/".$this->uri->segment(4)); ?>

					$.get('<?= $link ?>', function (data) {

					    if(data != $(".mensagens").html()) {
					    	$(".mensagens").html(data);
					    	$( ".chat" ).scrollTop( $(".bloco-mensagens").height() + 100);
					    }

					});

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

        //PEGA QUANTIDADE TOTAL DE MENSAGENS NÃO LIDAS
        var reloadMSGTotais_ = setInterval(reloadMSGTotais, 1000);    
        function reloadMSGTotais () {

        	<?php $quantTotais =  base_url("empresa/login/mensagensNaoLidasTotais_/"); ?>

        	$.get('<?= $quantTotais ?>', function (data) {

			    if(parseInt(data) != parseInt($("span.totais").val())) {
			    	$(".totais").text(data);
			    }

			});

        }

		//ATUAlIZA O CONTADOR DAS MENSAGENS NÃO LIDAS
		var reloadMsgLidas_ = setInterval(reloadMsgLidas, 1000);    
		function reloadMsgLidas () {

			<?php $quantTotais =  base_url("empresa/login/atualizaMensagens_/".$this->uri->segment(4)); ?>
			$.get('<?= $quantTotais ?>', function (data) {});

		}

		//conta as novas mensagens de cada uma das conversas
		var reloadQuantMSG_ = setInterval(reloadQuantMSG, 1000);    
		function reloadQuantMSG () {

			document.querySelectorAll(".candidatoItem").forEach(function(elemento){

				<?php $quantTotais =  base_url("empresa/login/contaMensagens_/"); ?>

				$.get('<?= $quantTotais ?>'+elemento.getAttribute("data-id"), function (data) {

				    if(parseInt(data) != parseInt($(elemento).children("span.msgsNaoLidas").text())) {
				    	$(elemento).children("span.msgsNaoLidas").text(data);
				    }

				});

			})

		}




	})


</script>

</body>
</html>
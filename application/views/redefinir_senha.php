<!DOCTYPE html>
<html>
<head>
	<title>Recuperar senha</title>
	<style type="text/css">
		* {margin: 0;padding: 0;border: none;box-sizing: border-box;}
		html, body {background: #EEE}
		form {width: 400px;margin: 100px auto;}
		input {padding: 15px 10px;margin: 10px;color: #454545;font-size: 16px;display: block;width: calc(100% - 20px);}
		input[type="submit"] {color: #FFF;background: #454545;border: 1px solid #efeeee;}
		h1 {font-size: 18px;color: #454545;padding: 15px 10px}
	</style>
</head>
<body>

	<form method="post" action="<?= base_url('acesso/acessoUsuario/valida_alteracao') ?>" class="formulario">
		<h1> <?php if($this->session->flashdata("msg")) { echo $this->session->flashdata("msg"); }else { echo "Digite o e-mail e sua nova senha."; } ?> </h1>
		<input type="email" name="email" placeholder="Qual seu email?">
		<input type="password" name="senha" placeholder="Escolha uma senha de 5 á 30 caracteres" class="senha">
		<input type="password" name="repitaSenha" placeholder="Repita sua senha" class="repitaSenha">
		<input type="hidden" name="codigoURL" value="<?= $this->uri->segment(4); ?>">
		<input type="submit" value="Alterar" class="botao">
	</form>


	<script type="text/javascript">
		
		var $senha       = document.querySelector(".senha");
		var $repitaSenha = document.querySelector(".repitaSenha");
		var $botao       = document.querySelector(".botao");
		var $form        = document.querySelector(".formulario");

		$botao.addEventListener("click", function(evt){
			evt.preventDefault();
			if($senha.value != $repitaSenha.value) {
				alert("Senhas não são iguais!");
			}else {
				$form.submit();
			}
		})

	</script>

</body>
</html>
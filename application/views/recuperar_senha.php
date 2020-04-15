<!DOCTYPE html>
<html>
<head>
	<title>Recuperar senha</title>
	<style type="text/css">
		* {margin: 0;padding: 0;border: none;box-sizing: border-box;}
		html, body {background: #FFF}
		form {width: 400px;}
		input {padding: 15px 10px;margin: 10px;color: #454545;font-size: 16px;display: block;width: calc(100% - 20px);outline: none;border: 1px solid #EEE;}
		input[type="submit"] {color: #FFF;background: #66BB6A;border: 1px solid #efeeee;}
		h1 {font-size: 18px;color: #454545;padding: 15px 10px}
	</style>
</head>
<body>

	<form method="post" action="<?= base_url('acesso/acessoUsuario/valida_recuperacao') ?>">
		<h1> <?php if($this->session->flashdata("msg")) { echo $this->session->flashdata("msg"); }else { echo "Digite o e-mail da sua conta abaixo."; } ?> </h1>
		<input type="email" name="email" placeholder="Qual seu email?">
		<input type="submit" value="Recuperar">
	</form>

</body>
</html>
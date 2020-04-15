<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Recuperar senha</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<?php if($this->session->flashdata('msg')): echo $this->session->flashdata('msg'); endif; ?>
	<?= validation_errors(); ?>
	<div class="container">
		
		<div class="row">
			<div class="col-md-8 mx-auto" style="background: #eee">
				<h5 id="status" class="alert warning"></h5>
				<form method="post" accept-charset="utf-8">
					<h1>Alterar senha</h1>

					<div class="form-group row">
                        <label for="email" class="col-3 col-form-label">E-mail</label>
                        <div class="col-4">
                            <input class="form-control" type="email" value="<?= set_value('email'); ?>" name="email" placeholder="Digite seu email" id="email" required>
                        </div>
                    </div>

					<p>Escolha uma senha de 5 á 30 caracteres</p>
					<div class="form-group row">
                        <label for="senha" class="col-3 col-form-label">Nova senha</label>
                        <div class="col-4">
                            <input class="form-control" type="password" value="<?= set_value('senha'); ?>" name="senha" placeholder="Digite a nova senha" id="senha" required minlength="5" maxlength="30">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="repetirSenha" class="col-3 col-form-label">Repita a senha</label>
                        <div class="col-4">
                            <input class="form-control" type="password" value="<?= set_value('repetirSenha'); ?>" name="repetirSenha" placeholder="Repetir senha" id="repetirSenha" required minlength="5" maxlength="30">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-4">
                            <input class="form-control btn btn-primary" type="submit" value="Alterar senha" disabled id="alterar">
                        </div>
                    </div>

				</form>
			</div>
		</div>

	</div>




	<script type="text/javascript">
		var $senha = document.getElementById('senha');
		var $repetirSenha = document.getElementById('repetirSenha');
		var $status = document.getElementById('status');
		var $botao = document.getElementById('alterar');
		var $email = document.getElementById('email');

		$repetirSenha.addEventListener('input', verificaSenha);
		$senha.addEventListener('input', verificaSenha);
		$email.addEventListener('input', verificaSenha);

		function verificaSenha() {
			if($repetirSenha.value != $senha.value && $repetirSenha.value.length >= 1) {
				$status.textContent = 'senhas diferentes';
				$botao.disabled = true;
			}else if ($repetirSenha.value.length >= 5 && $senha.value.length >= 5 && $repetirSenha.value == $senha.value && $email.value.length >= 10) {
				$status.textContent = '';
				$botao.disabled = false;
			}
			else {
				$status.textContent = '';
				$botao.disabled = true;
			}
		}
	</script>

</body>
</html>
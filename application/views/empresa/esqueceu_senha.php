<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Recuperar senha</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	 <?php if($this->session->flashdata('msg')): echo $this->session->flashdata('msg'); endif; ?>
	<div class="container">
		
		<div class="row">
			<div class="col-md-8 mx-auto" style="background: #eee">
				<h5 id="status" class="alert warning"></h5>
				<form method="post" accept-charset="utf-8">
					<div class="form-group row">
                        <label for="email" class="col-2 col-form-label">Email</label>
                        <div class="col-6">
                            <input class="form-control" type="email" value="<?= set_value('email'); ?>" name="email" placeholder="Digite seu email" required>
                        </div>
                        <div class="col-4">
                            <input class="form-control btn btn-primary" type="submit" value="Recuperar">
                        </div>
                    </div>
				</form>
				<a href="<?= base_url('empresa/login/') ?>">Voltar</a>
			</div>
		</div>

	</div>

</body>
</html>
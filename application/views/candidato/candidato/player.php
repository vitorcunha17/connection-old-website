<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Exibir candidato</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

	<video controls style="max-width: 100%;min-width: 100%">
		<source src="<?= base_url('assets/candidato/video_editado/') ?><?= $this->uri->segment(5); ?>" type="video/mp4">
	</video>

</body>
</html>
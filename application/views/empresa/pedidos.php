<h1 class="col-12 text-center">Meus pedidos</h1>

<!-- se a empresa não tiver nenhum pedido -->
<?php if(count($pegaCandidatosFilaProvacao) < 1): ?>
	<h5>Atualmente você não possui pedidos</h5>
<?php else: ?>
<div class="container margin-top">
	<div class="row">
		<p>Aguardando aprovação:</p>
		<div class="col-12">
			<div class="row">

					<!-- lista os candidatos comprados pela empresa -->
					<?php foreach($pegaCandidatosFilaProvacao as $pegaCandidatosFilaProvacaoValue): ?>

						<div class="col-md-4 border">
							<p><img style="margin: 20px 0;max-height: 50px;max-width: 100px" src="<?= base_url('assets/candidato/foto_candidato/') ?><?= $pegaCandidatosFilaProvacaoValue->foto_candidato ?>"> <strong><?= $pegaCandidatosFilaProvacaoValue->nome ?></strong></p>
							<p><?= $pegaCandidatosFilaProvacaoValue->area_nome .' / '. $pegaCandidatosFilaProvacaoValue->nome_curso ?></p>
						</div>

					<?php endforeach; ?>

			</div>
		</div>
	</div>
</div>
<?php endif; ?>








<?php if(count($mensagens) < 1): echo "<h1>Mande uma mensagem para a empresa!</h1>"; endif; ?>
<?php foreach($mensagens as $mensagens_): ?>
	<?php if($mensagens_->autor == "candidato"): ?>

		<div class="mensagem msgCandidato">
			<p class="autor"><?= $dados[0]->nome ?>:</p>
			<?= $mensagens_->mensagem ?>
			<time><?= $mensagens_->data_envio ?></time>
		</div>

	<?php elseif($mensagens_->autor == "empresa"): ?>

		<div class="mensagem msgEmpresa">
			<p class="autor"><?= $mensagens_->empresa ?>:</p>
			<?= $mensagens_->mensagem ?>
			<time><?= $mensagens_->data_envio ?></time>
		</div>

	<?php endif; ?>
<?php endforeach; ?>
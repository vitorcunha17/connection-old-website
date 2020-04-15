<h1 class="col-12 text-center" style="margin-left: 10px;">Minhas compras</h1>

<div class="container " style="width: 760px; margin-top: 2px; margin-left: 15px;">
    <div class="row">
        <div class="col-12">
            <div class="row">

                <?php if (count($comprasAprovadas) < 1): ?>

                    <h5>Você não possui compras aprovadas!</h5>

                <?php else: ?>

                    <!-- lista os candidatos comprados pela empresa -->
                    <?php foreach ($comprasAprovadas as $comprasAprovadasValue): ?>

                        <div class="col-md-4 border">
                            <p><img style="margin: 20px 0;max-height: 50px;max-width: 100px" src="<?= base_url('assets/candidato/foto_candidato/') ?><?= $comprasAprovadasValue->foto_candidato ?>"> <strong><a href="<?= base_url('empresa/login/perfil/') ?><?= $comprasAprovadasValue->id_candidato ?>"><?= $comprasAprovadasValue->nome ?></a></strong></p>
                            <p><video controls style="width: 100%">
                                    <source src="<?= base_url('assets/candidato/video_editado/') ?><?= $comprasAprovadasValue->video_nome ?>" type="">
                                </video></p>
                            <p><?= $comprasAprovadasValue->area_nome . ' / ' . $comprasAprovadasValue->nome_curso ?></p>
                            <p>Data da compra: <?= $comprasAprovadasValue->data_compra ?></p>
                            <p>E-mail: <?= $comprasAprovadasValue->email ?></p>
                            <p>CPF: <?= $comprasAprovadasValue->cpf ?></p>
                            <p>CEP: <?= $comprasAprovadasValue->cep ?></p>
                            <p>Estado: <?= $comprasAprovadasValue->estado ?></p>
                            <p>Cidade: <?= $comprasAprovadasValue->cidade ?></p>
                            <p>Telefone: <?= $comprasAprovadasValue->telefone ?></p>
                            <p>PCD: <?= $comprasAprovadasValue->pcd ?></p>
                            <p>Curso: <?= $comprasAprovadasValue->situacao_curso ?></p>
                            <a href="<?= base_url('empresa/login/chat') ?>" class="btn">Enviar mensagem</a>
                        </div>

                    <?php endforeach; ?>

                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
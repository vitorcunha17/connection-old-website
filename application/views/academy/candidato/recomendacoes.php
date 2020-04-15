<div  style="margin: 30px; " class="row">
    <h1>Recomendações</h1>

    <?php if (count($pegaRecomendacao) < 1): ?>

        <div class="col-md-12">Você ainda não recebeu recomendações!</div>

    <?php else: ?>
        <?php foreach ($pegaRecomendacao as $pegaRecomendacaoValue): ?>

            <div class="col-md-3" style="padding: 30px 0">

                <h4><?= $pegaRecomendacaoValue->empresa; ?></h4>
                <p style="color: #ccc"><?= $pegaRecomendacaoValue->area_nome; ?></p>

            </div>

        <?php endforeach; ?>
    <?php endif; ?>



</div>
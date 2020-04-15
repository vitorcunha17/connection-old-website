<style>

    body {
        margin: 0;
        padding: 0px 0;
        font-family: 'Roboto', sans-serif;
        background: #F1F2F6;
    }



</style>

<div  style="margin: 30px; " class="row">

    <h1>Me visitaram</h1>

    <?php if (count($visitas) < 1): ?>

        <div class="col-md-12">Você ainda não recebeu visitas!</div>

    <?php else: ?>
        <?php foreach ($visitas as $visitasValue): ?>

            <div class="col-md-3" style="padding: 30px 0">

                <h4><?= $visitasValue->nome_empresa; ?></h4>
                <p style="color: #ccc"><?= $visitasValue->area_nome; ?></p>

            </div>

        <?php endforeach; ?>
    <?php endif; ?>


</div>
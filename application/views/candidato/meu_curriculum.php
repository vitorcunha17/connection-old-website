<style>


    .row{
        display: inline-block;

    }

    #da{
        margin-left: 70px;
        margin-top: 40px;
    }

</style>


<div style="margin: 30px; " class="row" id="xa">

    <h1>Meu curriculum</h1>

    <p>Nome: <strong><?= $dados[0]->nome; ?></strong></p>
    <p>E-mail: <strong><?= $dados[0]->email; ?></strong></p>
    <p>Sexo: <strong><?= $dados[0]->sexo; ?></strong></p>
    <p>CPF: <strong><?= $dados[0]->cpf; ?></strong></p>
    <p>CEP: <strong><?= $dados[0]->cep; ?></strong></p>
    <p>Estado: <strong><?= $dados[0]->estado; ?></strong></p>
    <p>Cidade: <strong><?= $dados[0]->cidade; ?></strong></p>
    <p>Telefone: <strong><?= $dados[0]->telefone; ?></strong></p>
    <p>Área: <strong><?= $dados[0]->area_nome; ?></strong></p>
    <p>
        <?php require_once 'add-post.php'; ?>


</div>




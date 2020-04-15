<?php $controller = get_instance(); /* instancia a classe */ ?>
<main class="container">

    <section class="row align-items-md-center" style="margin-top: 30px">

        <div class="col-md-12"><h4>Cadastra ADM</h4></div>
        <div class="col-md-6 offset-md-3"><?= validation_errors(); ?></div>
        <div class="col-md-8 offset-md-2">

            <div style="margin: 30px 0 70px 0;">
                <form method="post" accept-charset="utf-8" style="margin-top: 30px" action="<?= base_url('administracao/administracao/cadastra_adm') ?>">
                    <input type="text" name="nomeADM" class="form-control" value="" placeholder="Nome" minlength="3" maxlength="100" required style="margin-top: 10px">
                    <input type="email" name="emailADM" class="form-control" value="" placeholder="Email" minlength="8" maxlength="100" required style="margin-top: 10px">
                    <input type="password" name="senhaADM" class="form-control" value="" placeholder="Senha" minlength="3" maxlength="100" required style="margin-top: 10px">

                    <select style="margin-top: 10px" class="form-control" name="acessoADM">

                        <?php foreach ($controller->pegacategoriasAcesso() as $pegacategoriasAcessoValue) { ?>

                            <option value="<?= $pegacategoriasAcessoValue->id_acesso ?>"><?= $pegacategoriasAcessoValue->nome_acesso ?></option>

                        <?php } ?>

                    </select>

                    <button class="button form-control btn-primary" type="submit" style="margin-top: 10px" value="">Cadastrar</button>
                </form>
            </div>
        </div>


        <table class="table table-striped tabelaCandidato">
            <thead>
                <tr>

                    <th>Nome</th>
                    <th>Email</th>
                    <th>Acesso</th>
                    <th>Apagar</th>

                </tr>
            </thead>

            <tbody>

                <?php foreach ($controller->pegaADMs() as $adminValue) { ?>

                    <tr style="height: 50px">

                        <td style="line-height: 50px"><?= $adminValue->nomeADM; ?></td>
                        <td style="line-height: 50px"><?= $adminValue->email_administrador; ?></td>
                        <td style="line-height: 50px"><?= $adminValue->nome_acesso; ?></td>
                        <td style="line-height: 50px"><a href="<?= base_url('administracao/administracao/apaga_adm/') ?><?= $adminValue->id_administrador; ?>">Apagar</a></td>

                    </tr>

                <?php } ?>

            </tbody>
        </table>


    </section>

</main>

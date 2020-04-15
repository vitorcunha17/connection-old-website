<?php $controller = get_instance(); ?>
<main class="container">
  <br>
  <div class="card" style="padding: 55px">
      <h1>Disparo de E-mails</h1>
      <br>
      <form method="post" accept-charset="utf-8" style="margin-top: 30px" action="<?= base_url('administracao/disparoemail/cadastra_horario') ?>">   
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-lg-6">
            <label>Defina um horário de disparo</label>
            <input type="time" name="horario" class="form-control" value="" placeholder="Data de envio">
          </div>
          <div class="col-xs-12 col-sm-12 col-lg-3">
            <label style="color: #fff">Salvar</label>
            <button class="button form-control btn-primary" type="submit" value="">Salvar</button>
          </div>
          <div class="col-xs-12 col-sm-12 col-lg-3">
            <label style="color: #fff">Disparar</label>
            <a class="button form-control btn-info" href="<?= base_url('administracao/disparoemail/disparar_email') ?>" style="text-decoration: none; text-align: center">Disparar</a>
          </div>
        </div>
      </form>
  </div>
</main>

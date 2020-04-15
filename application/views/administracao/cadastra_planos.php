
<main class="container">

    <section class="row align-items-md-center" style="margin-top: 30px"> 

     <div class="col-md-12"><h4>Planos</h4></div>
     <div class="col-md-6 offset-md-3"><?= validation_errors(); ?></div>
     <div class="col-md-8 offset-md-2">
      <h5 style="color: #ccc">Planos fixos:</h5>
      <!-- lista os planos fixos -->
      <div style="margin: 30px 0 70px 0;overflow-x: hidden;overflow-y: auto;height: 200px">
        <table class="table">
          <tr>
            <th>Nome</th>
            <th>Limite</th>
            <th>Valor</th>
            <th>Editar</th>
            <th>Apagar</th>
          </tr>

          <?php foreach($listaPlanos as $listaPlanosValue): ?>
            <tr>
              <td><?= $listaPlanosValue->nome_planos; ?></td>
              <td><?= $listaPlanosValue->limite_planos; ?></td>
              <td><?= $listaPlanosValue->valor_planos; ?></td>
              <td><a href="<?= base_url('administracao/administracao/logado/cadastra_planos/editar_plano_fixo/'); ?><?= $listaPlanosValue->id_planos; ?>">Editar</a></td>
              <td><a href="<?= base_url('administracao/administracao/logado/cadastra_planos/excluir_plano_fixo/'); ?><?= $listaPlanosValue->id_planos; ?>">Apagar</a></td>
            </tr>
          <?php endforeach; ?>

        </table>
      </div>

      <!--  VERIFICA SE EXISTE SOLICITAÇÃO PARA EDITAR PLANO FIXO -->
      <?php if($this->uri->segment(5) == 'editar_plano_fixo' AND is_numeric($this->uri->segment(6)) AND count($plano_fixo_editar_preenche_campos) == 1): ?>
        <div style="margin: 30px 0 70px 0">
        <form method="post" accept-charset="utf-8" style="margin-top: 60px">
          <h5 style="color: #ccc">Editar plano fixo</h5>
          <input type="text" name="editar_plano_fixo_nome" class="form-control" placeholder="Nome" value="<?= $plano_fixo_editar_preenche_campos[0]->nome_planos; ?>" minlength="3" maxlength="100" required style="margin-top: 30px">
          <input type="text" name="editar_plano_fixo_valor" class="form-control reais" placeholder="Valor" value="<?= $plano_fixo_editar_preenche_campos[0]->valor_planos; ?>" minlength="3" maxlength="100" required style="margin-top: 10px">
          <input type="number" name="editar_plano_fixo_limite" class="form-control" placeholder="Limite" value="<?= $plano_fixo_editar_preenche_campos[0]->limite_planos; ?>" minlength="3" maxlength="100" required style="margin-top: 10px">
          <input type="hidden" value="<?= $plano_fixo_editar_preenche_campos[0]->id_planos; ?>" name="editar_plano_fixo_id">
          <input type="hidden" name="editado_plano_fixo" class="form-control" required value="editado_plano_fixo">
          <button class="button form-control" type="submit" style="margin-top: 10px"><img src="<?= base_url('assets/admin/imagens/icons/confirm.png'); ?>" width="16">Editar</button>
        </form>
        <a href="<?= base_url('administracao/administracao/logado/cadastra_planos/'); ?>">Cancelar</a>
      </div>
      <?php endif; ?>



      <h5 style="color: #ccc">Planos avulsos:</h5>
      <!-- lista os planos avulsos -->
      <div style="margin: 30px 0 70px 0;overflow-x: hidden;overflow-y: auto;height: 200px">
        <table class="table">
          <tr>
            <th>Valor</th>
            <th>Nivel</th>
            <th>Editar</th>
          </tr>

          <?php foreach($listaPlanosAvulsos as $listaPlanosAvulsosValue): ?>
            <tr>
              <td><?= $listaPlanosAvulsosValue->valor_planos_avulsos; ?></td>
              <td><?= $listaPlanosAvulsosValue->nivel_planos_avulsos; ?></td>
              <td><a href="<?= base_url('administracao/administracao/logado/cadastra_planos/editar_plano_avulso/'); ?><?= $listaPlanosAvulsosValue->id_planos_avulsos; ?>">Editar</a></td>
            </tr>
          <?php endforeach; ?>

        </table>
      </div>

       <!--  VERIFICA SE EXISTE SOLICITAÇÃO PARA EDITAR PLANO AVULSO -->
      <?php if($this->uri->segment(5) == 'editar_plano_avulso' AND is_numeric($this->uri->segment(6)) AND count($plano_avulso_editar_preenche_campos) == 1): ?>
        <div style="margin: 30px 0 70px 0">
        <form method="post" accept-charset="utf-8" style="margin-top: 60px">
          <h5 style="color: #ccc">Editar plano avulso</h5>
          <input type="text" name="editar_plano_avulso_nome" class="form-control" placeholder="Nome" value="<?= $plano_avulso_editar_preenche_campos[0]->nivel_planos_avulsos; ?>" disabled minlength="3" maxlength="100" required style="margin-top: 10px">
          <input type="text" name="editar_plano_avulso_valor" class="form-control reais" placeholder="Valor" value="<?= $plano_avulso_editar_preenche_campos[0]->valor_planos_avulsos; ?>" minlength="3" maxlength="100" required style="margin-top: 10px">
          <input type="hidden" value="<?= $plano_avulso_editar_preenche_campos[0]->id_planos_avulsos; ?>" name="editar_plano_avulso_id">
          <input type="hidden" name="editado_plano_avulso" class="form-control" required value="editado_plano_avulso">
          <button class="button form-control" type="submit" style="margin-top: 10px"><img src="<?= base_url('assets/admin/imagens/icons/confirm.png'); ?>" width="16">Editar</button>
        </form>
        <a href="<?= base_url('administracao/administracao/logado/cadastra_planos/'); ?>">Cancelar</a>
      </div>
      <?php endif; ?>

      <div style="margin: 30px 0 70px 0">
        <form method="post" accept-charset="utf-8" style="margin-top: 60px">
          <h5 style="color: #ccc">Cadastrar plano fixo</h5>
          <input type="text" name="nome" class="form-control" placeholder="Nome" minlength="3" maxlength="100" required style="margin-top: 30px">
          <input type="text" name="valor" class="form-control reais" placeholder="Valor" minlength="3" maxlength="100" required style="margin-top: 10px">
          <input type="number" name="limite" class="form-control" placeholder="Limite" minlength="3" maxlength="100" required style="margin-top: 10px">
          <input type="hidden" name="planos" class="form-control" required value="planos">
          <button class="button form-control" type="submit" style="margin-top: 10px"><img src="<?= base_url('assets/admin/imagens/icons/confirm.png'); ?>" width="16">Cadastrar</button>
        </form>
      </div>
    </div>
  </section>

</main>
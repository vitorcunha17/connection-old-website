<style>
    
body {
   margin: 0;
   padding: 0px 0;
   font-family: 'Roboto', sans-serif;
   background: #F1F2F6;
}
    
    
    
</style>

<main class="container">

    <section class="row align-items-md-center" style="margin-top: 30px"> 

     <div class="col-md-12"><h4>Áreas</h4></div>
     <div class="col-md-6 offset-md-3"><?= validation_errors(); ?></div>
     <div class="col-md-8 offset-md-2">
      <h5 style="color: #ccc">Áreas existentes:</h5>
      <!-- lista as categorias -->
      <div style="margin: 30px 0 70px 0;overflow-x: hidden;overflow-y: auto;height: 200px">
        <table class="table">
          <tr>
            <th>Nome</th>
            <th>Editar</th>
            <th>Apagar</th>
          </tr>

          <?php foreach($listaArea as $listaAreaValue): ?>

            <tr>
              <td><?= $listaAreaValue->area_nome; ?></td>
              <td><a href="<?= base_url('administracao/administracao/logado/cadastra_categoria/editar_area/'); ?><?= $listaAreaValue->id; ?>">Editar</a></td>
              <td><a href="<?= base_url('administracao/administracao/logado/cadastra_categoria/excluir_area/'); ?><?= $listaAreaValue->id; ?>">Apagar</a></td>
            </tr>

          <?php endforeach; ?>

        </table>
      </div>

      <!--  VERIFICA SE EXISTE SOLICITAÇÃO PARA EDITAR AREA -->
      <?php if($this->uri->segment(5) == 'editar_area' AND is_numeric($this->uri->segment(6)) AND count($area_editar_preenche_campos) == 1): ?>
        <div style="margin: 30px 0 70px 0">
        <form method="post" accept-charset="utf-8" style="margin-top: 60px">
          <h5 style="color: #ccc">Editar área</h5>
          <input type="text" name="editar_area_nome" class="form-control" placeholder="Nome" value="<?= $area_editar_preenche_campos[0]->area_nome; ?>" minlength="3" maxlength="100" required style="margin-top: 10px">
          <input type="hidden" value="<?= $area_editar_preenche_campos[0]->id; ?>" name="editar_area_id">
          <input type="hidden" name="editada_area" class="form-control" required value="editada_area">
          <button class="button form-control" type="submit" style="margin-top: 10px"><img src="<?= base_url('assets/admin/imagens/icons/confirm.png'); ?>" width="16">Editar</button>
        </form>
        <a href="<?= base_url('administracao/administracao/logado/cadastra_categoria'); ?>">Cancelar</a>
      </div>
      <?php endif; ?>

      <div style="margin: 30px 0 70px 0;overflow-x: hidden;overflow-y: auto;height: 200px">
        <form method="post" accept-charset="utf-8" style="margin-top: 30px">
          <input type="text" name="categoria" class="form-control" value="" placeholder="Nova área" minlength="3" maxlength="100" required style="margin-top: 60px">
          <button class="button form-control" type="submit" style="margin-top: 10px"><img src="<?= base_url('assets/admin/imagens/icons/confirm.png'); ?>" width="16">Cadastrar</button>
        </form>
      </div>
    </div>



  </section>

</main>
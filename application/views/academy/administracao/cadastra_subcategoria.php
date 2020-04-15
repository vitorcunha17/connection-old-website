  <main class="container">


    <section class="row align-items-md-center" style="margin-top: 30px"> 

     <div class="col-md-12"><h4>Cursos</h4></div>
     <div class="col-md-6 offset-md-3"><?= validation_errors(); ?></div>
     <div class="col-md-8 offset-md-2">

      <h5 style="color: #ccc">Cursos existentes:</h5>
      <!-- lista as categorias -->
      <div style="margin: 30px 0 30px 0;overflow-x: hidden;overflow-y: auto;height: 200px">
        <table class="table">
          <tr>
            <th>Nome</th>
            <th>Área</th>
            <th>Editar</th>
            <th>Apagar</th>
          </tr>

          <?php foreach($listaCurso as $listaCursoValue): ?>

            <tr>
              <td><?= $listaCursoValue->nome_curso; ?></td>
              <td><?= $listaCursoValue->area_nome; ?></td>
              <td><a href="<?= base_url('administracao/administracao/logado/cadastra_subcategoria/editar_subcategoria/'); ?><?= $listaCursoValue->curso_id; ?>">Editar</a></td>
              <td><a href="<?= base_url('administracao/administracao/logado/cadastra_subcategoria/excluir_curso/'); ?><?= $listaCursoValue->curso_id; ?>">Apagar</a></td>
            </tr>

          <?php endforeach; ?>

        </table>
      </div>

      <!--  VERIFICA SE EXISTE SOLICITAÇÃO PARA EDITAR CURSO -->
      <?php if($this->uri->segment(5) == 'editar_subcategoria' AND is_numeric($this->uri->segment(6)) AND count($curso_editar_preenche_campos) == 1): ?>
        <div style="margin: 30px 0 70px 0">
          <form method="post" accept-charset="utf-8" style="margin-top: 60px">
            <h5 style="color: #ccc">Editar curso</h5>
            <input type="text" name="editar_curso_nome" class="form-control" placeholder="Nome" value="<?= $curso_editar_preenche_campos[0]->nome_curso; ?>" minlength="3" maxlength="100" required style="margin-top: 10px">
            <select class="form-control" style="margin-top: 10px" name="editar_area_id">
              <?php foreach($listaArea as $listaAreaValue): ?>
              <option value="<?= $listaAreaValue->id ?>"><?= $listaAreaValue->area_nome ?></option>
            <?php endforeach; ?>
            </select>
            <input type="hidden" value="<?= $curso_editar_preenche_campos[0]->curso_id; ?>" name="editar_curso_id">
            <input type="hidden" name="editado_curso" class="form-control" required value="editado_curso">
            <button class="button form-control" type="submit" style="margin-top: 10px"><img src="<?= base_url('assets/admin/imagens/icons/confirm.png'); ?>" width="16">Editar</button>
          </form>
          <a href="<?= base_url('administracao/administracao/logado/cadastra_subcategoria'); ?>">Cancelar</a>
        </div>
      <?php endif; ?>

      <!-- lista as categorias -->
      <form class="row align-items-md-center" method="post" accept-charset="utf-8" style="margin-top: 30px">
        <select class="form-control" name="id_area" style="margin-top: 60px">
          <option selected disabled value="">Selecione uma área</option>

          <?php foreach($listaArea as $listaAreaValue): ?>

            <option value="<?= $listaAreaValue->id; ?>"><?= $listaAreaValue->area_nome; ?></option>

          <?php endforeach; ?>

        </select>

        <input type="text" name="subcategoria" class="form-control" value="" placeholder="Novo curso" minlength="3" maxlength="100" required style="margin-top: 10px">
        <button class="button form-control" type="submit" style="margin-top: 10px"><img src="<?= base_url('assets/admin/imagens/icons/confirm.png'); ?>" width="16">Cadastrar</button>
      </form>

    </section>

  </main>
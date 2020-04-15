<?php $controller = get_instance(); /* instancia a classe */ ?>
<div class="row">

  <?php 

  $aprovados  = array_filter($listaTodosCandidatos, function($status){ return $status->status == 2; });
  $reprovados = array_filter($listaTodosCandidatos, function($status){ return $status->status == 3; });
  $analise    = array_filter($listaTodosCandidatos, function($status){ return $status->status == 1; });

  ?>

  <header class="container-fluid bg-light navbar-light">
    <nav >
      <a href="#" >Inscritos ( <?= count($listaTodosCandidatos); ?> )</a>
      <ul class="nav navbar navbar-dark" style="background-color: #f5ad036e">
        <li ><a href="<?= base_url('/administracao/administracao/logado/candidatosPage/aprovados'); ?>" class="nav-link text-dark" <?php $controller->menuAtivo($this->uri->segment(5), 'aprovados'); ?> >Aprovados ( <?= count($aprovados); ?> )</a></li>
        <li><a href="<?= base_url('/administracao/administracao/logado/candidatosPage/reprovados'); ?>" class="nav-link text-dark" <?php $controller->menuAtivo($this->uri->segment(5), 'reprovados'); ?> >Reprovados ( <?= count($reprovados); ?> )</a></li>
        <li ><a href="<?= base_url('/administracao/administracao/logado/candidatosPage/analise'); ?>" class="nav-link text-dark" <?php $controller->menuAtivo($this->uri->segment(5), 'analise'); ?> >Em Análise ( <?= count($analise); ?> )</a></li>
        <li ><a href="<?= base_url('/administracao/administracao/logado/candidatosPage/contratacoes'); ?>" class="nav-link text-dark" <?php $controller->menuAtivo($this->uri->segment(5), 'contratacoes'); ?> >Contratações ( <?= count($listarCandidatosContratados); ?> )</a></li>
      </ul>
    </nav>
  </header>

  <!-- PAGINA DE ANALISE DE CANDIDATO ############################################################################################################################################# -->
  <?php if($this->uri->segment(5) == 'analise') { ?>

  <!-- lista as areas e a quantidade de candidatos em cada uma deas ######## -->
  <div class="col-md-12" style="margin: 20px 0">

    <?php $controller->quantidade_candidato_area($listaTodosCandidatos ,$listaArea, 1); ?>
    <br>
    <hr>
    <!-- exibe o cargo e a quantidade de candidatos contidos nele de acordo com a area -->
    <?php $controller->cargo($listaArea, $analise); ?>


  </div>
  <!-- fim lista as areas ############ -->
  <?php } ?>
  <!-- FIM PAGINA ANALISE  #################################################################################################################################################### -->

  <!-- PAGINA DE ANALISE DE CANDIDATO (REPROVADOS) ############################################################################################################################################# -->
  <?php if($this->uri->segment(5) == 'reprovados') { ?>

  <!-- lista as areas e a quantidade de candidatos em cada uma deas ######## -->
  <div class="col-md-12" style="margin: 20px 0">

    <?php $controller->quantidade_candidato_area($listaTodosCandidatos ,$listaArea, 3); ?>
    <br>
    <hr>
    <!-- exibe o cargo e a quantidade de candidatos contidos nele de acordo com a area -->
    <?php $controller->cargo($listaArea, $reprovados); ?>


  </div>
  <!-- fim lista as areas ############ -->
  <?php } ?>
  <!-- FIM PAGINA ANALISE (REPROVADOS) #################################################################################################################################################### -->

  <!-- PAGINA DE ANALISE DE CANDIDATO (APROVADOS) ############################################################################################################################################# -->
  <?php if($this->uri->segment(5) == 'aprovados') { ?>

  <!-- lista as areas e a quantidade de candidatos em cada uma deas ######## -->
  <div class="col-md-12" style="margin: 20px 0">

    <?php $controller->quantidade_candidato_area($listaTodosCandidatos ,$listaArea, 2); ?>
    <br>
    <hr>
    <!-- exibe o cargo e a quantidade de candidatos contidos nele de acordo com a area -->
    <?php $controller->cargo($listaArea, $aprovados); ?>


  </div>
  <!-- fim lista as areas ############ -->
  <?php } ?>
  <!-- FIM PAGINA ANALISE (APROVADOS) #################################################################################################################################################### -->

</div>

<!-- Lista todos os candidatos de acordo com a area -->
<?php $candidatos_aprovados = $controller->candidatosLista(); ?> 
<?php if($candidatos_aprovados != false) { ?>
<div class="row">
  <div class="col-md-9" style="max-height: 250px;min-height: 250px;overflow-y: auto;margin-top: 10px;padding: 0 10px">
    <input type="text" class="form-control pesquisarCandidato" placeholder="Pesquisar" style="margin: 10px 0">
    <table class="table table-striped tabelaCandidato">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Curso</th>
          <th>Msg</th>
        </tr>
      </thead>
      <tbody>

        <?php foreach($candidatos_aprovados as $candidatosAprovadosValue) { ?>

        <tr style="height: 50px">
          <td><a href="<?= base_url('administracao/administracao/logado/candidatosPage/') ?><?= $this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7).'/' ?><?= $candidatosAprovadosValue->id_candidato ?>" style="line-height: 50px">
            <img src="<?= base_url('assets/candidato/foto_candidato/') ?><?= $candidatosAprovadosValue->foto_candidato ?>" style="max-height: 50px;height: 50px">
            <?= explode(' ', trim($candidatosAprovadosValue->nome))[0].'...'; ?>
          </a>
        </td>
        <td style="line-height: 50px">
          <?= mb_substr( mb_convert_encoding( html_entity_decode($candidatosAprovadosValue->nome_curso) , 'utf-8' ) , 0 , 7 ).'...';  ?>
        </td>

        <!-- SE O CANDIDATO JÁ FOI APROVADO, ENTÃO EXIBIR SOMENTE O BOTÃO DE APAGAR -->
        <?php if($candidatosAprovadosValue->status == 2) { ?>
        <form accept-charset="utf-8" method="post">
          <td><input type="text" class="form-control" name="msg_candidato_acao" placeholder="Por que esta apagando?"><input type="hidden" name="id_candidato_acao" required value="<?=  $candidatosAprovadosValue->id_candidato  ?>"></td>
          <td><button class="btn btn-danger" type="submit" name="apagaCandidato" value="apagaCandidato">Apagar</button></td>
        </form>
        <!-- SE O CANDIDATO AINDA NÃO FOI APROVADO, ENTÃO EXIBIR TRÊS BOTÕES, PRA APAGAR, RECUSAR E ACEITAR -->
        <?php } elseif($candidatosAprovadosValue->status == 1) { ?>
        <form accept-charset="utf-8" method="post">
          <td><input type="text" class="form-control" name="msg_candidato_acao" placeholder="Por que esta apagando ou recusando?"><input type="hidden" name="id_candidato_acao" required value="<?=  $candidatosAprovadosValue->id_candidato  ?>"></td>
          <td><button class="btn btn-success" type="submit" name="aceitaCandidato" value="aceitaCandidato">Aceitar</button></td>
          <td><button class="btn btn-warning" type="submit" name="recusaCandidato" value="recusaCandidato">Recusar</button></td>
          <td><button class="btn btn-danger" type="submit" name="apagaCandidato" value="apagaCandidato">Apagar</button></td>
        </form>
        <!-- SE O CANDIDATO FOI REPROVADO, ENTÃO EXIBIR UM BOTÃO PARA APAGAR -->
        <?php } elseif($candidatosAprovadosValue->status == 3) { ?>
        <form accept-charset="utf-8" method="post">
          <td><input type="text" class="form-control" name="msg_candidato_acao" placeholder="Por que esta apagando ou recusando?"><input type="hidden" name="id_candidato_acao" required value="<?=  $candidatosAprovadosValue->id_candidato  ?>"></td>
          <td><button class="btn btn-danger" type="submit" name="apagaCandidato" value="apagaCandidato">Apagar</button></td>
        </form>
        <?php } ?>
      </tr>

      <?php } ?>

    </tbody>
  </table>
</div>

<!-- lista detalhes do candidato -->
<?php if($controller->listaDetalhesCandidato() != false) { ?>
<?php foreach($controller->listaDetalhesCandidato() as $listaDetalhesCandidatoValue) { ?>

<div class="col-md-3 detalhes" style="max-height: 450px;min-height: 450px;overflow-y: auto;margin-top: 20px;padding: 0 10px;">
  <div><strong>Detalhes</strong></div>

  <?php $localVideo = null; if($listaDetalhesCandidatoValue->status == 1) { $localVideo = 'video_analise'; }elseif($listaDetalhesCandidatoValue->status == 2) { $localVideo = 'video_editado'; }elseif($listaDetalhesCandidatoValue->status == 3) { $localVideo = 'video_recusado'; } ?>

  <p><video controls style="max-width: 100%"> <source src="<?= base_url('assets/candidato/') ?><?= $localVideo.'/' ?><?= $listaDetalhesCandidatoValue->video_nome ?>" type="video/mp4"> </video></p>

    <p>Nome: <?= $listaDetalhesCandidatoValue->nome ?></p>
    <p>Inscrição: <?= $listaDetalhesCandidatoValue->data_inscricao ?></p>
    <p>Área: <?= $listaDetalhesCandidatoValue->area_nome ?></p>
    <p>Curso: <?= $listaDetalhesCandidatoValue->nome_curso ?></p>
    <p>Email: <?= $listaDetalhesCandidatoValue->email ?></p>
    <p>CEP: <?= $listaDetalhesCandidatoValue->cep ?></p>
    <p>Estado: <?= $listaDetalhesCandidatoValue->estado ?></p>
    <p>Cidade: <?= $listaDetalhesCandidatoValue->cidade ?></p>
    <p>Telefone: <?= $listaDetalhesCandidatoValue->telefone ?></p>
  </div>

  <?php } ?>
  <?php } ?>

</div>

<?php } ?>
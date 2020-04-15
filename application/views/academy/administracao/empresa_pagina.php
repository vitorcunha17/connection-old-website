<?php $controller = get_instance(); /* instancia a classe */ ?>
<div class="row">

  <?php 

  $vagas_inscritas  = array_filter($controller->vagas(), function($status){ return $status->status_vaga == 2; });
  $vagas_analise    = array_filter($controller->vagas(), function($status){ return $status->status_vaga == 1; });
  $analise    = array_filter($listaTodosCandidatos, function($status){ return $status->status == 1; });

  ?>

  <header class="container-fluid bg-light navbar-light">
    <nav >
      <a href="#" class="navbar-brand">Inscritas ( <?= count($controller->empresas()); ?> )</a>
      <ul class="nav navbar navbar-dark" style="background-color: #f5ad036e">
        <li class="nav-item"><a href="<?= base_url('/administracao/administracao/logado/empresasPage/empresas'); ?>" class="nav-link text-dark" <?php $controller->menuAtivo($this->uri->segment(5), 'empresas'); ?> >Empresas</a></li>
        <li class="nav-item"><a href="<?= base_url('/administracao/administracao/logado/empresasPage/vagas_inscritas'); ?>" class="nav-link text-dark" <?php $controller->menuAtivo($this->uri->segment(5), 'vagas_inscritas'); ?> >Vagas inscritas ( <?= count($vagas_inscritas); ?> )</a></li>
        <li class="nav-item"><a href="<?= base_url('/administracao/administracao/logado/empresasPage/vagas_analise'); ?>" class="nav-link text-dark" <?php $controller->menuAtivo($this->uri->segment(5), 'vagas_analise'); ?> >Vagas em Análise ( <?= count($vagas_analise); ?> )</a></li>
        <li class="nav-item"><a href="<?= base_url('/administracao/administracao/logado/empresasPage/contratacoes'); ?>" class="nav-link text-dark" <?php $controller->menuAtivo($this->uri->segment(5), 'contratacoes'); ?> >Contratações ( <?= count($listarCandidatosContratados); ?> )</a></li>
      </ul>
    </nav>
  </header>

  <!-- PAGINA DE ANALISE DE CANDIDATO ############################################################################################################################################# -->
  <?php if($this->uri->segment(5) == 'empresas'): ?>

    <!-- lista as areas e a quantidade de candidatos em cada uma deas ######## -->
    <div class="col-md-12" style="margin: 20px 0">

      <?php $controller->areas_empresas_quantidade(); ?>
      <br>
      <hr>


    </div>
    <!-- fim lista as areas ############ -->
  <?php endif; ?>
  <!-- FIM PAGINA ANALISE  #################################################################################################################################################### -->

  <!-- PAGINA DE ANALISE DE CANDIDATO (REPROVADOS) ############################################################################################################################################# -->
  <?php if($this->uri->segment(5) == 'vagas_inscritas'): ?>

    <!-- lista as areas e a quantidade de candidatos em cada uma deas ######## -->
    <div class="col-md-12" style="margin: 20px 0">

      <?php $controller->areas_empresas_quantidade($vagas_inscritas); ?>
      <br>
      <hr>
      <!-- exibe o cargo e a quantidade de candidatos contidos nele de acordo com a area -->
      <?php $controller->cargoVaga($vagas_inscritas); ?>


    </div>
    <!-- fim lista as areas ############ -->
  <?php endif; ?>
  <!-- FIM PAGINA ANALISE (REPROVADOS) #################################################################################################################################################### -->

  <!-- PAGINA DE ANALISE DE CANDIDATO (APROVADOS) ############################################################################################################################################# -->
  <?php if($this->uri->segment(5) == 'vagas_analise'): ?>

    <!-- lista as areas e a quantidade de candidatos em cada uma deas ######## -->
    <div class="col-md-12" style="margin: 20px 0">

      <?php $controller->areas_empresas_quantidade($vagas_analise); ?>
      <br>
      <hr>
      <!-- exibe o cargo e a quantidade de candidatos contidos nele de acordo com a area -->
      <?php $controller->cargoVaga($vagas_analise); ?>


    </div>
    <!-- fim lista as areas ############ -->
  <?php endif; ?>
  <!-- FIM PAGINA ANALISE (APROVADOS) #################################################################################################################################################### -->



  <!-- lista os candidatos para aprovação de acordo com a area -->
  <?php $retorno = $controller->auditar($listaArea, $analise); ?>


  <div class="col-9 bloco_lista">
    <?php if($this->uri->segment(5) == 'analise' AND $this->uri->segment(6) AND $this->uri->segment(7) AND $this->uri->segment(8) AND $retorno): ?>

      <?php foreach($candidatoDados as $dados_user): ?>
        <div class="container">
          <div class="row bg-light padding-small">
            <div class="col-md-6">
              <form>
                <div class="form-group row">
                  <label for="nome" class="col-3 col-form-label">Nome
                  </label>
                  <div class="col-9">
                    <input class="form-control" type="text" disabled value="<?= $dados_user->nome; ?>" placeholder="Nome" id="nome" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="cep" class="col-3 col-form-label">Cep
                  </label>
                  <div class="col-9">
                    <input class="form-control" type="text" disabled value="<?= $dados_user->cep; ?>" placeholder="cep" id="cep" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="cep" class="col-3 col-form-label">Estado
                  </label>
                  <div class="col-9">
                    <input class="form-control" type="text" disabled value="<?= $dados_user->estado; ?>" placeholder="cep" id="cep" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="cep" class="col-3 col-form-label">Cidade
                  </label>
                  <div class="col-9">
                    <input class="form-control" type="text" disabled value="<?= $dados_user->cidade; ?>" placeholder="cep" id="cep" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email" class="col-3 col-form-label">E-mail
                  </label>
                  <div class="col-9">
                    <input class="form-control" type="email" disabled value="<?= $dados_user->email; ?>" name="email" placeholder="email" id="email" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="telefone" class="col-3 col-form-label">Telefone
                  </label>
                  <div class="col-9">
                    <input class="form-control" type="text" disabled value="<?= $dados_user->telefone; ?>" name="telefone" placeholder="Telefone" id="telefone" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="curso" class="col-3 col-form-label">Área
                  </label>
                  <div class="col-9">
                    <input class="form-control" type="text" disabled value="<?= $dados_user->area_nome; ?>" name="curso" placeholder="Curso" id="curso" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="curso" class="col-3 col-form-label">Curso
                  </label>
                  <div class="col-9">
                    <input class="form-control" type="text" disabled value="<?= $dados_user->nome_curso; ?>" name="curso" placeholder="Curso" id="curso" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="situacao" class="col-3 col-form-label">Curso esta
                  </label>
                  <div class="col-9">
                    <select class="form-control" name="situacao_curso" disabled id="situacao">
                      <option selected>
                        <?= $dados_user->situacao_curso; ?>
                      </option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="sexo" class="col-3 col-form-label">Sexo
                  </label>
                  <div class="col-9">
                    <select class="form-control" name="sexo" disabled id="sexo">
                      <option selected>
                        <?= $dados_user->sexo; ?>
                      </option>
                    </select>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-md-6">
              <video class="col-md-12" controls="true">
                <source src="<?= base_url('assets/candidato/video_analise/'.$dados_user->video_nome); ?>" type="video/mp4">
                </video>
              </div>
              <a href="<?= base_url('/administracao/administracao/logado/candidatosPage/analise/'); ?><?= $this->uri->segment(6).'/'.$this->uri->segment(7).'/'.$this->uri->segment(8).'/'.$this->uri->segment(9) ?>sim" class="btn bg-success text-white">Aceitar
              </a>
              <a href="<?= base_url('/administracao/administracao/logado/candidatosPage/analise/'); ?><?= $this->uri->segment(6).'/'.$this->uri->segment(7).'/'.$this->uri->segment(8).'/'.$this->uri->segment(9) ?>nao" class="btn bg-warning text-white">Recusar
              </a>
              <a href="<?= base_url('/administracao/administracao/logado/candidatosPage/analise/'); ?><?= $this->uri->segment(6).'/'.$this->uri->segment(7).'/'.$this->uri->segment(8).'/'.$this->uri->segment(9) ?>nao" class="btn bg-danger text-white">Apagar
              </a>
            </div>
          </div>
        <?php endforeach; ?>

      <?php endif; ?>
    </div>
  </div>

  <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////q -->
  <!-- Lista todas as empresas de acordo com a area -->
  <?php $listaEmpresasPorArea = $controller->listaEmpresasPorArea(); ?> 
  <?php if($listaEmpresasPorArea != false): ?>
    <div class="row">
      <div class="col-md-8" style="max-height: 450px;min-height: 450px;overflow-y: auto;margin-top: 10px;padding: 0 10px">
        <input type="text" class="form-control pesquisarCandidato" placeholder="Pesquisar" style="margin: 10px 0">
        <table class="table table-striped tabelaCandidato">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Detalhes</th>
              <th>Msg</th>
              <th>Apagar</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach($listaEmpresasPorArea as $listaEmpresasPorAreaValue): ?>
              <tr style="height: 50px">
                <td><img src="<?= base_url('assets/empresa/logo/') ?><?= $listaEmpresasPorAreaValue->logo ?>" style="max-height: 50px;height: 50px">
                  <?php if(strlen($listaEmpresasPorAreaValue->empresa) > 20) { echo mb_substr( mb_convert_encoding( html_entity_decode($listaEmpresasPorAreaValue->empresa) , 'utf-8' ) , 0 , 20 ).'...'; }else {echo $listaEmpresasPorAreaValue->empresa; } ?>
                </td>
                <td><a href="<?= base_url('administracao/administracao/logado/empresasPage/empresas/') ?><?= $this->uri->segment(6).'/detalhes/' ?><?= $listaEmpresasPorAreaValue->id_empresa ?>" style="line-height: 50px">Detalhes</a></td>

                <form accept-charset="utf-8" method="post">
                  <td><input type="text" class="form-control" name="apagaEmpresaMsg" placeholder="Por que esta apagando?"><input type="hidden" name="id_empresa_apaga" required value="<?= $listaEmpresasPorAreaValue->id_empresa ?>"></td>
                  <td><button class="btn btn-danger" type="submit">Apagar</button></td>
                </form>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <!-- lista detalhes da empresa -->
      <?php if($controller->listaDetalhesEmpresa() != false): ?>
        <?php foreach($controller->listaDetalhesEmpresa() as $listaDetalhesEmpresaValue): ?>

        <div class="col-md-4 detalhes" style="max-height: 450px;min-height: 450px;overflow-y: auto;margin-top: 20px;padding: 0 10px;">
          <div><strong>Detalhes</strong></div>
          <p><img src="<?= base_url('assets/empresa/logo/'.$listaDetalhesEmpresaValue->logo) ?>" style="max-height: 100px;height: 100px"></p>
          <p>Empresa: <?= $listaDetalhesEmpresaValue->empresa ?></p>
          <p>Área: <?= $listaDetalhesEmpresaValue->area_nome ?></p>
          <p>CNPJ: <?= $listaDetalhesEmpresaValue->cnpj ?></p>
          <p>Email: <?= $listaDetalhesEmpresaValue->email ?></p>
          <p>CEP: <?= $listaDetalhesEmpresaValue->cep ?></p>
          <p>Estado: <?= $listaDetalhesEmpresaValue->estado ?></p>
          <p>Cidade: <?= $listaDetalhesEmpresaValue->cidade ?></p>
          <p>Telefone: <?= $listaDetalhesEmpresaValue->telefone ?></p>
        </div>

    <?php endforeach; ?>
    <?php endif; ?>
    </div>
  <?php endif; ?>

  <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////q -->
  <!-- Lista todas as vagas das empresas de acordo com a area -->
  <?php $listaVagasPorArea = $controller->listaVagasPorArea(); ?> 
  <?php if($listaVagasPorArea != false AND !is_null($listaVagasPorArea)): ?>
    <div class="row">
      <?php foreach($listaVagasPorArea['empresa'] as $listaVagasPorAreaValue): ?>

        <div class="col-md-6" style="max-height: 450px;min-height: 450px;overflow-y: auto;margin-top: 10px;padding: 0 10px">
          <input type="text" class="form-control pesquisarCandidato" placeholder="Pesquisar" style="margin: 10px 0">
          <table class="table table-striped tabelaCandidato">
            <thead>
              <tr>
                <th>Nome</th>
                <th>Quantidade</th>
              </tr>
            </thead>
            <tbody>
              <tr style="height: 50px">
                <td><img src="<?= base_url('assets/empresa/logo/') ?><?= $listaVagasPorAreaValue->logo ?>" style="max-height: 50px;height: 50px"><?= $listaVagasPorAreaValue->empresa ?></td>
                <td><a href="<?= base_url('administracao/administracao/logado/empresasPage/') ?><?= $this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7).'/' ?><?= $listaVagasPorAreaValue->id_empresa ?>" style="line-height: 50px">
                  ( <?= $listaVagasPorArea['quantidade'][$listaVagasPorAreaValue->id_empresa] ?> )
                </a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <!-- lista vagas da empresa -->
      <?php $listaVagasDaEmpresa = $controller->listaVagasDaEmpresa(); ?>
      <?php if($listaVagasDaEmpresa != false AND !is_null($listaVagasDaEmpresa)): ?>

        <div class="col-md-6 detalhes" style="max-height: 450px;min-height: 450px;overflow-y: auto;margin-top: 20px;">
          <div class="row">

            <?php foreach($listaVagasDaEmpresa as $listaVagasDaEmpresaValue): ?>

              <div class="col-md-6 border">
                <h4 style="padding: 10px 0;border-bottom: 1px solid #ccc"><?= $listaVagasDaEmpresaValue->nome_vaga; ?></h4>
                <p><?= $listaVagasDaEmpresaValue->area_nome; ?> / <?= $listaVagasDaEmpresaValue->nome_curso; ?></p>
                <p>PCD: <?= lcfirst($listaVagasDaEmpresaValue->pcd); ?></p>
                <p>Cargo: <?= lcfirst($listaVagasDaEmpresaValue->cargo); ?></p>
                <p>Salário: <span style="color: #b22222"><?= $listaVagasDaEmpresaValue->salario_vaga; ?></span></p>
                <p>Experiência: <strong style="text-transform: uppercase;"><?= $listaVagasDaEmpresaValue->experiencia_vaga; ?></strong></p>
                <p>Empresa: <strong style="text-transform: capitalize;"><?= $listaVagasDaEmpresaValue->empresa_vaga; ?></strong></p>

                <!-- verifica se a vaga esta na lista de inscritas ou em analise, se for inscritas, enão exiba um botão de apagar e se for em analise, então exibe um botão para aceitar ou apagar -->
                <?php if($this->uri->segment(5) == 'vagas_inscritas'): ?>

                  <a href="<?= base_url('administracao/administracao/logado/empresasPage/') ?><?= $this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7).'/'.$listaVagasDaEmpresaValue->id_vaga.'/apagar/sim' ?>" class="btn bg-danger col-12 text-dark" style="cursor: pointer">Apagar</a>

                <?php elseif($this->uri->segment(5) == 'vagas_analise'): ?>

                  <a href="<?= base_url('administracao/administracao/logado/empresasPage/') ?><?= $this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7).'/'.$listaVagasDaEmpresaValue->id_vaga.'/aceitar/sim' ?>" class="btn bg-success col-12 text-dark" style="cursor: pointer;">Aceitar</a>
                  <br>
                  <br>
                  <a href="<?= base_url('administracao/administracao/logado/empresasPage/') ?><?= $this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7).'/'.$listaVagasDaEmpresaValue->id_vaga.'/apagar/sim' ?>" class="btn bg-danger col-12 text-dark" style="cursor: pointer;">Apagar</a>

                <?php endif; /* fim da verificação se é vagas inscritas ou em analise */ ?>


                <br>
                <br>
              </div>

            <?php endforeach; ?>

          </div>
        </div>

      <?php endif; /* fim lista vagas da empresa */ ?>

    </div>
  <?php endif; ?>
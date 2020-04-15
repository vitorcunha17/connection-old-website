<?php $controller = get_instance(); /* instancia a classe */ ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Connection</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="shortcut icon" type="image/icon" href="<?= base_url('assets/images/Logo2.png'); ?>"/>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/font-awesome/css/font-awesome.min.css'); ?>">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?= base_url('assets/css/fontastic.css'); ?>">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="<?= base_url('assets/css/grasp_mobile_progress_circle-1.0.0.min.css'); ?>">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css'); ?>">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.default.css" id="theme-stylesheet'); ?>">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css'); ?>">
    <!-- Favicon-->
    <link rel="shortcut icon" href="">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="<?= base_url('assets/images/hgh.jpg'); ?>" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5">Luis Nogma</h2><span>Diretor Financeiro</span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="" class="brand-small text-center"> <strong>D</strong><strong class="text-primary">F</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Menu</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">
            <li><a href="<?= base_url('/administracao/administracao/logado'); ?>"> <i class="icon-home"></i>Home</a></li>

            <?php if ($controller->pegaDadosADM()[0]->acesso == 1 OR $controller->pegaDadosADM()[0]->acesso == 3): ?>
            <li><a  href="<?= base_url('/administracao/administracao/logado/candidatosPage'); ?>"  <?php $controller->menuAtivo($this->uri->segment(4), 'candidatosPage'); ?> > <i class="icon-form"></i>Candidatos                            </a></li>
            <?php endif; ?>

            <?php if ($controller->pegaDadosADM()[0]->acesso == 1 OR $controller->pegaDadosADM()[0]->acesso == 4): ?>
            <li><a href="<?= base_url('/administracao/administracao/logado/empresasPage'); ?>" <?php $controller->menuAtivo($this->uri->segment(4), 'empresasPage'); ?>> <i class="fa fa-bar-chart"></i>Empresas                             </a></li>
            <?php endif; ?>

            <?php if ($controller->pegaDadosADM()[0]->acesso == 1 OR $controller->pegaDadosADM()[0]->acesso == 2): ?>
            <li><a  href="<?= base_url('/administracao/administracao/logado/cadastra_planos'); ?>" <?php $controller->menuAtivo($this->uri->segment(4), 'cadastra_planos'); ?>> <i class="icon-grid"></i>Planos                             </a></li>
            <?php endif; ?>


            <?php if ($controller->pegaDadosADM()[0]->acesso == 1 OR $controller->pegaDadosADM()[0]->acesso == 5): ?>
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Categorias </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="<?= base_url('/administracao/administracao/logado/cadastra_categoria'); ?>" >Cadastrar Área</a></li>
                <li><a  href="<?= base_url('/administracao/administracao/logado/cadastra_subcategoria'); ?>">Cadastrar Curso</a></li>

              </ul>
            </li>

            <?php endif; ?>
            <?php if ($controller->pegaDadosADM()[0]->acesso == 1 OR $controller->pegaDadosADM()[0]->acesso == 6): ?>
            <li><a href="<?= base_url('/administracao/administracao/logado/grafica'); ?>" <?php $controller->menuAtivo($this->uri->segment(4), 'empresasPage'); ?>  > <i class="icon-interface-windows"></i>Estatística                           </a></li>
            <?php endif; ?>

            <?php if ($controller->pegaDadosADM()[0]->acesso == 1): ?>
            <li> <a href="<?= base_url('/administracao/administracao/logado/cadastro_adm'); ?>"  <?php $controller->menuAtivo($this->uri->segment(4), 'cadastro_adm'); ?>> <i class="icon-mail"></i>Cadastrar ADM
                <div class="badge badge-warning">6 adm</div></a></li>
                <?php endif; ?>
          </ul>
        </div>
        <div class="admin-menu">
          <h5 class="sidenav-heading">FeedBacks</h5>
          <ul id="side-admin-menu" class="side-menu list-unstyled">
            <li> <a href="#"> <i class="icon-screen"> </i>Empresas</a></li>
            <li> <a href="#"> <i class="icon-flask"> </i><div class="badge badge-info">Special</div></a></li>
            <?php if ($controller->pegaDadosADM()[0]->acesso == 1 OR $controller->pegaDadosADM()[0]->acesso == 3): ?>
            <li> <a href="<?= base_url('/administracao/administracao/logado/disparoEmail'); ?>"  <?php $controller->menuAtivo($this->uri->segment(4), 'disparoEmail'); ?> > <i class="icon-form"></i>Disparo de E-mails                            </a></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>
    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><span>All Connection </span><strong class="text-primary"> Administração</strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Notifications dropdown-->
                <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell"></i><span class="badge badge-warning">12</span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item">
                        <div class="notification d-flex justify-content-between">
                          <div class="notification-content"><i class="fa fa-envelope"></i>Você tem novos feedbacks </div>
                          <div class="notification-time"><small>4 minutos - ago</small></div>
                        </div></a></li>


                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-bell"></i>ver todas...                                           </strong></a></li>
                  </ul>
                </li>
                <!-- Messages dropdown-->
                <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope"></i><span class="badge badge-info">10</span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                        <div class="msg-profile"> <img src="<?= base_url('assets/images/sadrak3.jpg'); ?>" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Sadrak Silva</h3><span>Gostaria de Solicitar os dados de inscrições do mês de abriel de 2019</span><small>3 dia ago at 7:58 pm - 10.01.2019</small>
                        </div></a></li>


                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-envelope"></i>Ler todas as mensagens   </strong></a></li>
                  </ul>
                </li>
                <!-- Languages dropdown    -->
                <li class="nav-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><img src="<?= base_url('assets/img/flags/16/GB.png'); ?>" alt="English"><span class="d-none d-sm-inline-block">Inglês</span></a>
                  <ul aria-labelledby="languages" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="<?= base_url('assets/img/flags/16/DE.png'); ?>" alt="English" class="mr-2"><span>Alemçao</span></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="<?= base_url('assets/img/flags/16/FR.png'); ?>" alt="English" class="mr-2"><span>Francês                                                        </span></a></li>
                  </ul>
                </li>
                <!-- Log out-->
                <li class="nav-item"><a href="<?= base_url('/administracao/administracao/sair'); ?>"  class="nav-link logout"> <span class="d-none d-sm-inline-block">Sair</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <!-- Counts Section -->
      <section class="dashboard-counts section-padding">
        <div class="container-fluid">
          <div class="row">
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-user"></i></div>
                <div class="name"><strong class="text-uppercase">Candidatos</strong><span>Período- 1 ano</span>
                  <div class="count-number">2500</div>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-padnote"></i></div>
                <div class="name"><strong class="text-uppercase">Empresas</strong><span>Período- 1 ano</span>
                  <div class="count-number">400</div>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-check"></i></div>
                <div class="name"><strong class="text-uppercase">Vagas</strong><span>Período- 1 ano</span>
                  <div class="count-number">342</div>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-bill"></i></div>
                <div class="name"><strong class="text-uppercase">Cursos</strong><span>Período- 1 ano</span>
                  <div class="count-number">123</div>
                </div>
              </div>
            </div>
            <!-- Count item widget-->

            <!-- Count item widget-->
            <div class="col-xl-2 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-list-1"></i></div>
                <div class="name"><strong class="text-uppercase">Faturamento</strong><span>Período- 1 ano</span>
                  <div class="count-number">$70.000/a.m</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>




        <?php if ($this->session->flashdata('msg')): echo $this->session->flashdata('msg');
        endif;
        ?>

        <div class="container">
            <!-- se o usuario solicitar a pagina de candidato -->
            <?php if ($this->uri->segment(4) == 'candidatosPage' AND ( $controller->pegaDadosADM()[0]->acesso == 1 OR $controller->pegaDadosADM()[0]->acesso == 3)): ?>
    <?php $this->load->view('administracao/candidato_pagina.php'); ?>

                <!-- se o usuario solicitar a pagina de empresa -->
            <?php elseif ($this->uri->segment(4) == 'empresasPage' AND ( $controller->pegaDadosADM()[0]->acesso == 1 OR $controller->pegaDadosADM()[0]->acesso == 4)): ?>
    <?php $this->load->view('administracao/empresa_pagina.php'); ?>

                <!-- se o usuario solicitar a pagina de cadastro de categoria -->
            <?php elseif ($this->uri->segment(4) == 'cadastra_categoria' AND ( $controller->pegaDadosADM()[0]->acesso == 1 OR $controller->pegaDadosADM()[0]->acesso == 5)): ?>
    <?php $this->load->view('administracao/cadastra_categoria'); ?>

                <!-- se o usuario solicitar a pagina de cadastro de subcategoria -->
            <?php elseif ($this->uri->segment(4) == 'cadastra_subcategoria' AND ( $controller->pegaDadosADM()[0]->acesso == 1 OR $controller->pegaDadosADM()[0]->acesso == 5)): ?>
    <?php $this->load->view('administracao/cadastra_subcategoria'); ?>

                <!-- se o usuario solicitar a pagina de cadastro de planos -->
            <?php elseif ($this->uri->segment(4) == 'cadastra_planos' AND ( $controller->pegaDadosADM()[0]->acesso == 1 OR $controller->pegaDadosADM()[0]->acesso == 2)): ?>
    <?php $this->load->view('administracao/cadastra_planos'); ?>

                <!-- se o usuario solicitar a pagina de cadastro de adm -->
            <?php elseif ($this->uri->segment(4) == 'cadastro_adm' AND $controller->pegaDadosADM()[0]->acesso == 1): ?>
    <?php $this->load->view('administracao/cadastro_adm'); ?>

                <!-- página inicial -->
            <?php elseif ($this->uri->segment(4) == ''): ?>
    <?php $this->load->view('administracao/boas_vindas'); ?>

                <!-- se o usuario solicitar a pagina de Estatística -->
            <?php elseif ($this->uri->segment(4) == 'grafica' AND $controller->pegaDadosADM()[0]->acesso == 1): ?>
    <?php $this->load->view('administracao/grafica'); ?>

    <!-- Se o usuario solicitar a pagina de Envio de E-mails -->
  <?php elseif ($this->uri->segment(4) == 'disparoEmail' AND $controller->pegaDadosADM()[0]->acesso == 1): ?>
    <?php $this->load->view('administracao/disparo_email'); ?>



<?php endif; ?>

        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.rawgit.com/plentz/jquery-maskmoney/master/dist/jquery.maskMoney.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function()
            {
                $(".reais").maskMoney({
                    prefix: "R$:",
                    decimal: ",",
                    thousands: "."
                });
            });


            //fa pesquisa pelo candidato na tabela
            var $busca = document.querySelector('.pesquisarCandidato');
            //   var $tabelaCandidato =  document.getElementByClassName('.tabelaCandidato').getElementByTagName('tbody');

            var $tabelaCandidato = document.querySelector('.tabelaCandidato').querySelector('tbody');

            $busca.addEventListener('input', function() {
                var contaLetras = $busca.value.length;

                //conta resultado totais
                var total = $tabelaCandidato.children.length;

                //faz buscas e exibe apenas os resultados encontrados
                for (i = 0; i < total; i++) {
                    if ($tabelaCandidato.children[i].textContent.toLowerCase().indexOf($busca.value) != -1) {
                        $tabelaCandidato.children[i].hasAttribute('class', 'invisivel') ? $tabelaCandidato.children[i].removeAttribute('class', 'invisivel') : null;
                    } else {
                        $tabelaCandidato.children[i].setAttribute('class', 'invisivel');
                    }
                }

            });
        </script>


      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>All Connection &copy; 2018-2019</p>
            </div>
            <div class="col-sm-6 text-right">
              <p>Suporte Especializado <a href="#" class="external">RH 4.0</a></p>
              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- JavaScript files-->
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/popper.js/umd/popper.min.js'); ?>"> </script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/grasp_mobile_progress_circle-1.0.0.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/jquery.cookie/jquery.cookie.js'); ?>"> </script>
    <script src="<?= base_url('assets/vendor/chart.js/Chart.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/jquery-validation/jquery.validate.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/charts-home.js'); ?>"></script>
    <!-- Main File-->
    <script src="<?= base_url('assets/js/front.js'); ?>"></script>
  </body>
</html>

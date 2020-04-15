<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Emprega_Ê</title>
        <meta name="description" content="Sadrak Silva">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Google Fonts -->



        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <script>
            WebFont.load({
                google: {"families": ["Montserrat:400,500,600,700", "Noto+Sans:400,700"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>
            <script type="text/javascript">
        window.movies = <?php echo html_entity_decode(json_encode($contatos, JSON_NUMERIC_CHECK)),  html_entity_decode(json_encode($candidatos, JSON_NUMERIC_CHECK));  ?>;
        </script>


        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets2/img/apple-touch-icon.png'); ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets2/img/favicon-32x32.png'); ?> ">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets2/img/favicon-16x16.png'); ?>">
        <!-- Stylesheet -->
        <link rel="stylesheet" href="<?= base_url('assets2/vendors/css/base/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets2/vendors/css/base/sadrak-1.5.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets2/js/components/notifications/notifications.min.js'); ?>">
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->




    </head>

    <body id="page-top">
        <?php foreach ($dados as $dados_user): ?>
            <?php if ($dados_user->status == 1 OR $dados_user->status == 4 OR $dados_user->status == 5): ?>

                <!-- Begin Preloader -->
                <div id="preloader">
                    <div class="canvas">
                        <img src="../../assets2/img/logo.png" alt="logo" class="loader-logo">
                        <div class="spinner"></div>
                    </div>
                </div>

                <!-- End Preloader -->
                <div class="page db-social">

                    <!-- SE A EMPRESA ESTA EM ANALISE -->
                    <?php if ($dados_user->status == 1) { ?>

                        <!-- Begin Header -->
                        <header class="header">
                            <nav class="navbar fixed-top">
                                <!-- Begin Search Box-->
                                <div class="search-box">
                                    <button class="dismiss"><i class="ion-close-round"></i></button>
                                    <form id="searchForm" action="#" role="search">
                                        <input type="search" placeholder="Buscar vagas..." class="form-control">
                                    </form>
                                </div>
                                <!-- End Search Box-->
                                <!-- Begin Topbar -->
                                <div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
                                    <!-- Begin Logo -->
                                    <div class="navbar-header">
                                        <a href="#" class="navbar-brand">
                                            <div class="brand-image brand-big">
                                                <img src="../../assets2/img/logo.png" alt="logo" style="width: 70px;" class="logo-big">
                                            </div>
                                            <div class="brand-image brand-small">
                                                <img src="../../assets2/img/logo.png" alt="logo" class="logo-small">
                                            </div>
                                        </a>
                                        <!-- Toggle Button -->
                                        <a id="toggle-btn" href="#" class="menu-btn active">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </a>
                                        <!-- End Toggle -->
                                    </div>
                                    <!-- End Logo -->
                                    <!-- Begin Navbar Menu -->
                                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">
                                        <!-- Search -->
                                        <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="la la-search"></i></a></li>
                                        <!-- End Search -->
                                        <!-- Begin Notifications -->
                                        <li class="nav-item dropdown"><a id="abrir2" rel="nofollow"  aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="la la-bell animated infinite swing"></i><span class="badge-pulse"></span></a>
                                            <ul id="minha_div2" aria-labelledby="abrir2" class="dropdown-menu notification">
                                                <li>
                                                    <div class="notifications-header">
                                                        <div class="title">Notificações (4)</div>
                                                        <div class="notifications-overlay"></div>
                                                        <img src="../../assets2/img/notifications/01.jpg" alt="..." class="img-fluid">
                                                    </div>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="message-icon">
                                                            <i class="la la-user"></i>
                                                        </div>
                                                        <div class="message-body">
                                                            <div class="message-body-heading">
                                                                Um colega quer se conectar com você.
                                                            </div>
                                                            <span class="date">2 horas, ago</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="message-icon">
                                                            <i class="la la-bank"></i>
                                                        </div>
                                                        <div class="message-body">
                                                            <div class="message-body-heading">
                                                                3 empresas assitiram ao seu vídeo-curriculum. Ver empresas...
                                                            </div>
                                                            <span class="date">7 horas, ago</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="message-icon">
                                                            <i class="la la-users"></i>
                                                        </div>
                                                        <div class="message-body">
                                                            <div class="message-body-heading">
                                                                Alguns colegas comentaram seu Vídeo-Curriculum. Ver comentários...
                                                            </div>
                                                            <span class="date">7 horas, ago</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="message-icon">
                                                            <i class="la la-twitter"></i>
                                                        </div>
                                                        <div class="message-body">
                                                            <div class="message-body-heading">
                                                                Atualize seus twitters.
                                                            </div>
                                                            <span class="date">10 horas, ago</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a rel="nofollow" href="#" class="dropdown-item all-notifications text-center">Ver todas notificações</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <!-- End Notifications -->
                                        <!-- User -->

                                        <script>
                                            // Captura o evento load da página
                                            window.onload = function() {
                                                // Localiza o elemento
                                                var div = document.getElementById('minha_div');
                                                var div2 = document.getElementById('minha_div2');
                                                // Esconde a DIV
                                                div.style.display = 'none';
                                                div2.style.display = 'none';

                                                // O link
                                                var clique = document.getElementById('abrir');
                                                var clique2 = document.getElementById('abrir2');

                                                // Captura o evento de clique no link
                                                clique.onclick = function() {
                                                    // Verifica se getComputedStyle é suportado
                                                    if ('getComputedStyle' in window) {
                                                        var display = window.getComputedStyle(div).display;
                                                    } else {
                                                        // Obtém a opção display para navegadores antigos
                                                        var display = div.currentStyle.display;
                                                    }

                                                    // Verifica se display é none
                                                    if (display == 'none') {
                                                        // Muda para display block
                                                        div.style.display = 'block';
                                                    } else {
                                                        // Muda para display none
                                                        div.style.display = 'none';
                                                    }

                                                    // Retorna falso para não atualizar a página
                                                    return false;
                                                }
                                                clique2.onclick = function() {
                                                    // Verifica se getComputedStyle é suportado
                                                    if ('getComputedStyle' in window) {
                                                        var display = window.getComputedStyle(div2).display;
                                                    } else {
                                                        // Obtém a opção display para navegadores antigos
                                                        var display = div2.currentStyle.display;
                                                    }

                                                    // Verifica se display é none
                                                    if (display == 'none') {
                                                        // Muda para display block
                                                        div2.style.display = 'block';
                                                    } else {
                                                        // Muda para display none
                                                        div2.style.display = 'none';
                                                    }

                                                    // Retorna falso para não atualizar a página
                                                    return false;
                                                }
                                            }
                                        </script>
                                        <li class="nav-item dropdown"><a id="abrir" rel="nofollow"  aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="la la-gear"></i></a>
                                            <ul  id="minha_div" aria-labelledby="user" class="user-size dropdown-menu">
                                                <li class="welcome">
                                                    <a href="#off-canvas" class="edit-profil"><i class="la la-gear"></i></a>
                                                    <img src="../../assets2/img/avatar/avatar-01.jpg" alt="..." class="rounded-circle">
                                                </li>
                                                <li>
                                                    <a href="<?= base_url('candidato/login/logado'); ?>" class="dropdown-item">
                                                        Perfil
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="app-mail.html" class="dropdown-item">
                                                        Menssagens
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-target="#editaPerfil" data-toggle="modal" style="cursor: pointer"class="dropdown-item no-padding-bottom">
                                                        Configurações
                                                    </a>
                                                </li>
                                                <li class="separator"></li>
                                                <li>
                                                    <a href="<?= base_url('candidato/login/sair'); ?>" class="dropdown-item no-padding-top">
                                                        Sair
                                                    </a>
                                                </li>
                                                <li><a rel="nofollow" href="<?= base_url('candidato/login/sair'); ?>" class="dropdown-item logout text-center"><i class="ti-power-off"></i></a></li>
                                            </ul>
                                        </li>
                                        <!-- End User -->
                                        <!-- Begin Quick Actions -->
                                        <li class="nav-item"><a href="#off-canvas" class="open-sidebar"><i class="la la-commenting-o"></i></a></li>
                                        <!-- End Quick Actions -->
                                    </ul>
                                    <!-- End Navbar Menu -->
                                </div>
                                <!-- End Topbar -->
                            </nav>
                        </header>
                        <!-- End Header -->
                        <!-- Begin Page Content -->
                        <!--<span class="text-gradient-03" ><h4 style="margin-left: 500px"> Seu cadastro está em análise, envie um vídeo-curriculum e aguarde aprovação.</h4></span>-->




                        <div class="page-content d-flex align-items-stretch">
                            <div class="compact-sidebar light-sidebar has-shadow">
                                <!-- Begin Side Navbar -->
                                <nav class="side-navbar box-scroll sidebar-scroll">
                                    <!-- Begin Main Navigation -->
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="<?= base_url('candidato/login/aceito/vagas'); ?>">  <i class="ti ti-bag"></i>Vagas</a>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url('candidato/login/aceito/meu_curriculum'); ?>">
                                                <i class="ti ti-receipt"></i>Curriculum
                                            </a>
                                        </li>

                                        <li>
                                            <a href="<?= base_url('candidato/login/rede'); ?>">
                                                <i class="ti ti-world"></i>Rede Social
                                            </a>
                                        </li>  <li>
                                        <a href="<?= base_url('candidato/login/aceito/colegas'); ?>">
                                                <i class="la la-group"></i>Contatos
                                            </a>
                                        </li>

                                        <li>
                                        <a href="<?= base_url('candidato/login/aceito'); ?>">
                                                <i class="ti ti-user"></i>My Perfil
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" data-toggle="tooltip" data-placement="right" title="" data-original-title="Página Em construçao" aria-describedby="tooltip719485">
                                                <i class="ti ti-shopping-cart"></i>Cursos
                                            </a>
                                        </li>

                                        <li>
                                        <a href="<?= base_url('candidato/login/aceito'); ?>">
                                                <i class="la la-angle-left"></i>voltar
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- End Main Navigation -->
                                </nav>
                                <!-- End Side Navbar -->
                            </div>
                            <!-- End Left Sidebar -->
                            <!-- Begin Content -->
                            <div class="content-inner compact">
                                <!-- Begin Jumbotron -->
                                <div class="jumbotron jumbotron-fluid"></div>
                                <!-- End Jumbotron -->
                                <div class="container-fluid">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-11">
                                            <!-- Start Head Profile -->
                                            <div class="widget head-profile has-shadow">
                                                <div class="widget-body pb-0">
                                                    <div class="row d-flex align-items-center">
                                                        <div class="col-xl-4 col-md-4 d-flex justify-content-lg-start justify-content-md-start justify-content-center">
                                                            <ul>
                                                                <li>
                                                                    <div class="counter">8234</div>
                                                                    <div class="heading">Visualizaçoes</div>
                                                                </li>
                                                                <li>
                                                                    <div class="counter">357</div>
                                                                    <div class="heading">Trabalhos</div>
                                                                </li>
                                                                <li>
                                                                    <div class="counter">23</div>
                                                                    <div class="heading">Indicações</div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-xl-4 col-md-4 d-flex justify-content-center">
                                                            <div class="image-default">


                                                                <img class="rounded-circle" alt="..." src="<?= base_url('assets/candidato/foto_candidato/'); ?><?= $dados[0]->foto_candidato; ?>" >
                                                            </div>
                                                            <div class="infos">
                                                                <h2><?= $dados_user->nome; ?>, <?= $dados_user->sobrenome; ?> </h2>
                                                                <div class="location"><?= $dados[0]->cidade; ?>, <?= $dados[0]->estado; ?>, Brasil</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-md-4 d-flex justify-content-lg-end justify-content-md-end justify-content-center">
                                                            <div class="follow">
                                                                <div class="col-md-5 mb-3" >

                                                                    <button  class="btn btn-gradient-01" data-target="#modal-centered" type="button" data-toggle="modal"><i class="la la-check"> </i>Enviar Vídeo Curriculum</button>


                                                                    <!-- #####    Modais  #####  -->

                                                                    <!--Modal de edicao da descricao do video-->

                                                                    <div id="editaQuemSou" class="fade show modal" style=" padding-right: 15px;">
                                                                        <div class="modal-dialog modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title">Quem Sou  - Descrição Profissional</h4>
                                                                                    <button type="button" class="close" data-dismiss="modal">
                                                                                        <span aria-hidden="true">×</span>
                                                                                        <span class="sr-only">close</span>
                                                                                    </button>
                                                                                </div>






                                                                                <?php echo form_open('candidato/login/submission', array('class' => 'jsform')); ?>
                                                                                <div class="modal-body">

                                                                                    <div class="widget-body">
                                                                                        <label> Descrever: </label>
                                                                                        <p><textarea rows="4" cols="55" type="text" name="quemsou"></textarea></p>
                                                                                    </div>
                                                                                    <div class="resposta">



                                                                                        <div class="widget-body">
                                                                                            <p>

                                                                                                <?= $dados[0]->quemsou ?>


                                                                                            </p>
                                                                                        </div>


                                                                                    </div>

                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-shadow" data-dismiss="modal">Confirmar</button>
                                                                                    <button type="submit" class="btn btn-primary" >Salvar</button>
                                                                                </div>
                                                                            </div>
                                                                            <?php echo form_close(); ?>
                                                                        </div>
                                                                    </div>


                                                                    <!--MODAL Confimaçao-->
                                                                    <div id="message" class="modal fade" style="display: none;" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-body text-center">
                                                                                    <div class="sa-icon sa-success animate" style="display: block;">
                                                                                        <span class="sa-line sa-tip animateSuccessTip"></span>
                                                                                        <span class="sa-line sa-long animateSuccessLong"></span>
                                                                                        <div class="sa-placeholder"></div>
                                                                                        <div class="sa-fix"></div>
                                                                                    </div>
                                                                                    <div class="section-title mt-5 mb-2">
                                                                                        <h2 class="text-gradient-01">Hello!</h2>
                                                                                    </div>
                                                                                    <p class="mb-5">And GoodBye :)</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!--Modal de edicao da descricao do video-->

                                                                    <div id="editaDescricao" class="modal fade show" style=" padding-right: 15px;">
                                                                        <div class="modal-dialog modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title">Descrição do Vídeo- Curriculum</h4>
                                                                                    <button type="button" class="close" data-dismiss="modal">
                                                                                        <span aria-hidden="true">×</span>
                                                                                        <span class="sr-only">close</span>
                                                                                    </button>
                                                                                </div>
                                                                                <form method = "post"  accept-charset = "utf-8"   enctype = "multipart/form-data"  action="<?= base_url('candidato/login/atualizaDescricao'); ?>">
                                                                                    <div class="modal-body">
                                                                                        <textarea  style="background-color: #ffffff; " name="descricao_video"  rows="6" cols="60" maxlength="500"><?php echo $dados[0]->descricao_video; ?></textarea>

                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-shadow" data-dismiss="modal">Fechar</button>
                                                                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!--Modal Edita Foto-->

                                                                    <div id="modalfoto" class="modal  fade show" style="display: none; padding-right: 17px;">
                                                                        <div class="modal-dialog modal-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title">Editar Perfil</h4>
                                                                                    <button type="button" class="close" data-dismiss="modal">
                                                                                        <span aria-hidden="true">×</span>
                                                                                        <span class="sr-only">Fechar</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">

                                                                                    <form method="post" accept-charset="utf-8" enctype="multipart/form-data" action="<?= base_url('candidato/login/logado'); ?>">
                                                                                        <div class="form-group">
                                                                                            <div class="alert alert-secondary-bordered alert-lg square fade show" role="alert">
                                                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                                                                                <i class="la la-diamond mr-2"></i>
                                                                                                <strong> Vamos atualizar :) </strong> Editar minha foto  do perfil
                                                                                            </div>

                                                                                            <input class="btn btn-outline-primary mr-1 mb-2"id="foto" style="margin-left: -7px;display: block;" name="foto" type="file" value="<?= set_value('foto'); ?>" class="form-control"  />



                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-shadow" data-dismiss="modal">Fechar</button>
                                                                                            <button id="example-top-center" type="submit" class="btn btn-primary">Salvar</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <ul class="head-nav nav nav-tabs justify-content-center">
                                                                            <li><a class="active" href="#">Timeline</a></li>
                                                                            <li><a href="#">Sobre</a></li>
                                                                            <li><a href="#">Amigos</a></li>
                                                                            <li><a href="#">Portifólio</a></li>
                                                                            <li><a href="#">Videos</a></li>
                                                                            <li><a href="#"><label for="confirmar">Atualizar</label></a></li>
                                                                        </ul>
                                                                    </div>



                                                                    <!-- Modal Carregar Vídeo -->
                                                                    <div id="modal-centered" class="modal fade show" style="display: none; padding-right: 17px;">
                                                                        <div class="modal-dialog modal-dialog-centered">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title">Carregar Meu Vídeo - Curriculum</h4>
                                                                                    <form method = "post"  accept-charset = "utf-8" onsubmit="return enviaVideo();"  enctype = "multipart/form-data" id="cadastroForm" action="<?= base_url('candidato/login/cadastraVideo'); ?>">
                                                                                        <button type="button" class="close" data-dismiss="modal">
                                                                                            <span aria-hidden="true">×</span>
                                                                                            <span class="sr-only">Fechar</span>
                                                                                        </button>

                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <input style="margin-left: 40px;" type="file" class="btn btn-outline-primary mr-1 mb-2" id="inputFile" name="video" required>
                                                                                    <br><br>
                                                                                    <div class="progress">

                                                                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                                                                    </div>
                                                                                    <video class="col-md-12" controls >
                                                                                        <source src="" id="video_preview">
                                                                                    </video>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-shadow" data-dismiss="modal">Fechar</button>
                                                                                    <button class="btn btn-primary" type="submit">Enviar</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    </form>
                                                                </div>

                                                                <script src="<?= base_url('assets/vendors/js/base/jquery.min.js'); ?>"></script>
                                                                <script src="<?= base_url('assets/vendors/js/base/core.min.js'); ?>"></script>
                                                                <script src="<?= base_url('assets/vendors/js/nicescroll/nicescroll.min.js'); ?>"></script>
                                                                <script src="<?= base_url('assets/vendors/js/bootstrap-wizard/bootstrap.wizard.min.js'); ?>"></script>
                                                                <script src="<?= base_url('assets/js/components/wizard/form-wizard.min.js'); ?>"></script>
                                                                <!--Modal editar Perfil-->
                                                                <div id="editaPerfil" class="modal fade show" style="display: none;padding-right: 17px;">
                                                                    <div class="modal-dialog modal-lg" style="max-width: 900px">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Atualizar Meu Perfil </h4>
                                                                                <button type="button" class="close" data-dismiss="modal">
                                                                                    <span aria-hidden="true">×</span>
                                                                                    <span class="sr-only">Fechar</span>
                                                                                </button>

                                                                            </div>
                                                                            <div class="modal-body">

                                                                                <div class="widget has-shadow">

                                                                                    <div class="widget-body">
                                                                                        <div class="row flex-row justify-content-center">
                                                                                            <div class="col-xl-10">
                                                                                                <div id="rootwizard">

                                                                                                    <div class="tab-content">
                                                                                                        <form method = "post"  accept-charset = "utf-8"  enctype = "multipart/form-data" id="cadastroForm" action="<?= base_url('candidato/login/atualizaCadastro'); ?>">

                                                                                                            <div class="tab-pane active show" id="tab1">
                                                                                                                <div class="section-title mt-5 mb-5">
                                                                                                                    <h4>Informações Pessoais</h4>
                                                                                                                </div>
                                                                                                                <div class="form-group row mb-3">
                                                                                                                    <div class="col-xl-3 mb-3">
                                                                                                                        <label class="form-control-label">Nome<span class="text-danger ml-2">*</span></label>
                                                                                                                        <input type="text" style="background-color: #f3f2f2; width: 170px" name="nome" value="<?= $dados[0]->nome; ?>" id="nome" class="form-control" required>
                                                                                                                    </div>
                                                                                                                    <div class="col-xl-3 mb-3">
                                                                                                                        <label class="form-control-label">Sobrenome<span class="text-danger ml-2">*</span></label>
                                                                                                                        <input type="text" style="background-color: #f3f2f2; width: 150px" name="sobrenome" value="<?= $dados[0]->sobrenome; ?>" id="sobrenome"  class="form-control" required>
                                                                                                                    </div>
                                                                                                                    <div class="col-xl-6">
                                                                                                                        <label class="form-control-label">Nascimento<span class="text-danger ml-2">*</span></label>
                                                                                                                        <div class="input-group">
                                                                                                                            <span class="input-group-addon addon-secondary">
                                                                                                                                <i class="ti ti-calendar"></i>
                                                                                                                            </span>
                                                                                                                            <input style="background-color: #f3f2f2;"type="date" name="data" value="<?= $dados[0]->nascimento; ?>" class="form-control" required>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-group row mb-5">
                                                                                                                    <div class="col-xl-3 mb-3">
                                                                                                                        <label class="form-control-label">Phone</label>
                                                                                                                        <div class="input-group">
                                                                                                                            <span class="input-group-addon addon-secondary">
                                                                                                                                <i class="la la-phone"></i>
                                                                                                                            </span>
                                                                                                                            <input type="text" class="form-control" name="telefone"style="background-color: #f3f2f2;"  id ="telefone"value="<?= $dados[0]->telefone; ?> ">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-xl-3">
                                                                                                                        <label class="form-control-label">Ocupação</label>
                                                                                                                        <input type="text" style="background-color: #f3f2f2;" name="ocupacao" id="ocupacao" value="<?= $dados[0]->ocupacao; ?>" class="form-control">
                                                                                                                    </div>
                                                                                                                    <div class="col-xl-3">
                                                                                                                        <label class="form-control-label">Gênero</label>
                                                                                                                        <select  style="background-color: #f3f2f2;"class="form-control" name="sexo" required id="sexo">
                                                                                                                            <option value="Masculino" selected="">Masculino</option>
                                                                                                                            <option value="Feminino">Feminino</option>
                                                                                                                            <option value="LGBTQI">LGBTQI+</option>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                    <div class="col-xl-3">
                                                                                                                        <label class="form-control-label">PcD</label>
                                                                                                                        <div class="input-group">
                                                                                                                            <span class="input-group-addon addon-secondary">
                                                                                                                                <i class="ti ti-wheelchair"></i>
                                                                                                                            </span>
                                                                                                                            <select style="background-color: #f3f2f2;" class="form-control" name="pcd" require id="pcd">
                                                                                                                                <option selected disabled>Deficiente</option>
                                                                                                                                <option value="sim" name="sim">Sim</option>
                                                                                                                                <option value="não" name="não" selected="">Não</option>
                                                                                                                            </select>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <h4>Endereço</h4>

                                                                                                                <div class="form-group row mb-3">
                                                                                                                    <div class="col-xl-2 mb-3">
                                                                                                                        <label class="form-control-label">Nº<span class="text-danger ml-2">*</span></label>
                                                                                                                        <input type="text" style="background-color: #f3f2f2;" name="num" id="num"value="<?= $dados[0]->num; ?> " class="form-control">
                                                                                                                    </div>
                                                                                                                    <div class="col-xl-3 mb-3">
                                                                                                                        <label class="form-control-label">Rua/Avenida<span class="text-danger ml-2">*</span></label>
                                                                                                                        <input type="text" style="background-color: #f3f2f2;" name="rua" id="rua" value="<?= $dados[0]->rua; ?>" class="form-control">
                                                                                                                    </div>
                                                                                                                    <div class="col-xl-3 mb-3">
                                                                                                                        <label class="form-control-label">Bairro<span class="text-danger ml-2">*</span></label>
                                                                                                                        <input type="text" style="background-color: #f3f2f2;" name="bairro" id="bairro" value="<?= $dados[0]->bairro; ?>" class="form-control">
                                                                                                                    </div>
                                                                                                                    <div class="col-xl-4">
                                                                                                                        <label class="form-control-label">País<span class="text-danger ml-2">*</span></label>
                                                                                                                        <select name="pais" style="background-color: #f3f2f2;" id="pais" class="custom-select form-control">
                                                                                                                            <option value="">Selecionar</option>
                                                                                                                            <option value="AF">Afghanistan</option>
                                                                                                                            <option value="AX">Åland Islands</option>
                                                                                                                            <option value="AL">Albania</option>
                                                                                                                            <option value="DZ">Algeria</option>
                                                                                                                            <option value="AS"ad>American Samoa</option>
                                                                                                                            <option value="AD">Andorra</option>
                                                                                                                            <option value="AO">Angola</option>
                                                                                                                            <option value="AI">Anguilla</option>
                                                                                                                            <option value="AQ">Antarctica</option>
                                                                                                                            <option value="AG">Antigua and Barbuda</option>
                                                                                                                            <option value="AR">Argentina</option>
                                                                                                                            <option value="AM">Armenia</option>
                                                                                                                            <option value="AW">Aruba</option>
                                                                                                                            <option value="AU">Australia</option>
                                                                                                                            <option value="AT">Austria</option>
                                                                                                                            <option value="AZ">Azerbaijan</option>
                                                                                                                            <option value="BS">Bahamas</option>
                                                                                                                            <option value="BH">Bahrain</option>
                                                                                                                            <option value="BD">Bangladesh</option>
                                                                                                                            <option value="BB">Barbados</option>
                                                                                                                            <option value="BY">Belarus</option>
                                                                                                                            <option value="BE">Belgium</option>
                                                                                                                            <option value="BZ">Belize</option>
                                                                                                                            <option value="BJ">Benin</option>
                                                                                                                            <option value="BM">Bermuda</option>
                                                                                                                            <option value="BT">Bhutan</option>
                                                                                                                            <option value="BO">Bolivia, Plurinational State of</option>
                                                                                                                            <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                                                                                                            <option value="BA">Bosnia and Herzegovina</option>
                                                                                                                            <option value="BW">Botswana</option>
                                                                                                                            <option value="BV">Bouvet Island</option>
                                                                                                                            <option value="BR" selected="">Brasil</option>
                                                                                                                            <option value="IO">British Indian Ocean Territory</option>
                                                                                                                            <option value="BN">Brunei Darussalam</option>
                                                                                                                            <option value="BG">Bulgaria</option>
                                                                                                                            <option value="BF">Burkina Faso</option>
                                                                                                                            <option value="BI">Burundi</option>
                                                                                                                            <option value="KH">Cambodia</option>
                                                                                                                            <option value="CM">Cameroon</option>
                                                                                                                            <option value="CA">Canada</option>
                                                                                                                            <option value="CV">Cape Verde</option>
                                                                                                                            <option value="KY">Cayman Islands</option>
                                                                                                                            <option value="CF">Central African Republic</option>
                                                                                                                            <option value="TD">Chad</option>
                                                                                                                            <option value="CL">Chile</option>
                                                                                                                            <option value="CN">China</option>
                                                                                                                            <option value="CX">Christmas Island</option>
                                                                                                                            <option value="CC">Cocos (Keeling) Islands</option>
                                                                                                                            <option value="CO">Colombia</option>
                                                                                                                            <option value="KM">Comoros</option>
                                                                                                                            <option value="CG">Congo</option>
                                                                                                                            <option value="CD">Congo, the Democratic Republic of the</option>
                                                                                                                            <option value="CK">Cook Islands</option>
                                                                                                                            <option value="CR">Costa Rica</option>
                                                                                                                            <option value="CI">Côte d'Ivoire</option>
                                                                                                                            <option value="HR">Croatia</option>
                                                                                                                            <option value="CU">Cuba</option>
                                                                                                                            <option value="CW">Curaçao</option>
                                                                                                                            <option value="CY">Cyprus</option>
                                                                                                                            <option value="CZ">Czech Republic</option>
                                                                                                                            <option value="DK">Denmark</option>
                                                                                                                            <option value="DJ">Djibouti</option>
                                                                                                                            <option value="DM">Dominica</option>
                                                                                                                            <option value="DO">Dominican Republic</option>
                                                                                                                            <option value="EC">Ecuador</option>
                                                                                                                            <option value="EG">Egypt</option>
                                                                                                                            <option value="SV">El Salvador</option>
                                                                                                                            <option value="GQ">Equatorial Guinea</option>
                                                                                                                            <option value="ER">Eritrea</option>
                                                                                                                            <option value="EE">Estonia</option>
                                                                                                                            <option value="ET">Ethiopia</option>
                                                                                                                            <option value="FK">Falkland Islands (Malvinas)</option>
                                                                                                                            <option value="FO">Faroe Islands</option>
                                                                                                                            <option value="FJ">Fiji</option>
                                                                                                                            <option value="FI">Finland</option>
                                                                                                                            <option value="FR">France</option>
                                                                                                                            <option value="GF">French Guiana</option>
                                                                                                                            <option value="PF">French Polynesia</option>
                                                                                                                            <option value="TF">French Southern Territories</option>
                                                                                                                            <option value="GA">Gabon</option>
                                                                                                                            <option value="GM">Gambia</option>
                                                                                                                            <option value="GE">Georgia</option>
                                                                                                                            <option value="DE">Germany</option>
                                                                                                                            <option value="GH">Ghana</option>
                                                                                                                            <option value="GI">Gibraltar</option>
                                                                                                                            <option value="GR">Greece</option>
                                                                                                                            <option value="GL">Greenland</option>
                                                                                                                            <option value="GD">Grenada</option>
                                                                                                                            <option value="GP">Guadeloupe</option>
                                                                                                                            <option value="GU">Guam</option>
                                                                                                                            <option value="GT">Guatemala</option>
                                                                                                                            <option value="GG">Guernsey</option>
                                                                                                                            <option value="GN">Guinea</option>
                                                                                                                            <option value="GW">Guinea-Bissau</option>
                                                                                                                            <option value="GY">Guyana</option>
                                                                                                                            <option value="HT">Haiti</option>
                                                                                                                            <option value="HM">Heard Island and McDonald Islands</option>
                                                                                                                            <option value="VA">Holy See (Vatican City State)</option>
                                                                                                                            <option value="HN">Honduras</option>
                                                                                                                            <option value="HK">Hong Kong</option>
                                                                                                                            <option value="HU">Hungary</option>
                                                                                                                            <option value="IS">Iceland</option>
                                                                                                                            <option value="IN">India</option>
                                                                                                                            <option value="ID">Indonesia</option>
                                                                                                                            <option value="IR">Iran, Islamic Republic of</option>
                                                                                                                            <option value="IQ">Iraq</option>
                                                                                                                            <option value="IE">Ireland</option>
                                                                                                                            <option value="IM">Isle of Man</option>
                                                                                                                            <option value="IL">Israel</option>
                                                                                                                            <option value="IT">Italy</option>
                                                                                                                            <option value="JM">Jamaica</option>
                                                                                                                            <option value="JP">Japan</option>
                                                                                                                            <option value="JE">Jersey</option>
                                                                                                                            <option value="JO">Jordan</option>
                                                                                                                            <option value="KZ">Kazakhstan</option>
                                                                                                                            <option value="KE">Kenya</option>
                                                                                                                            <option value="KI">Kiribati</option>
                                                                                                                            <option value="KP">Korea, Democratic People's Republic of</option>
                                                                                                                            <option value="KR">Korea, Republic of</option>
                                                                                                                            <option value="KW">Kuwait</option>
                                                                                                                            <option value="KG">Kyrgyzstan</option>
                                                                                                                            <option value="LA">Lao People's Democratic Republic</option>
                                                                                                                            <option value="LV">Latvia</option>
                                                                                                                            <option value="LB">Lebanon</option>
                                                                                                                            <option value="LS">Lesotho</option>
                                                                                                                            <option value="LR">Liberia</option>
                                                                                                                            <option value="LY">Libya</option>
                                                                                                                            <option value="LI">Liechtenstein</option>
                                                                                                                            <option value="LT">Lithuania</option>
                                                                                                                            <option value="LU">Luxembourg</option>
                                                                                                                            <option value="MO">Macao</option>
                                                                                                                            <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                                                                                                            <option value="MG">Madagascar</option>
                                                                                                                            <option value="MW">Malawi</option>
                                                                                                                            <option value="MY">Malaysia</option>
                                                                                                                            <option value="MV">Maldives</option>
                                                                                                                            <option value="ML">Mali</option>
                                                                                                                            <option value="MT">Malta</option>
                                                                                                                            <option value="MH">Marshall Islands</option>
                                                                                                                            <option value="MQ">Martinique</option>
                                                                                                                            <option value="MR">Mauritania</option>
                                                                                                                            <option value="MU">Mauritius</option>
                                                                                                                            <option value="YT">Mayotte</option>
                                                                                                                            <option value="MX">Mexico</option>
                                                                                                                            <option value="FM">Micronesia, Federated States of</option>
                                                                                                                            <option value="MD">Moldova, Republic of</option>
                                                                                                                            <option value="MC">Monaco</option>
                                                                                                                            <option value="MN">Mongolia</option>
                                                                                                                            <option value="ME">Montenegro</option>
                                                                                                                            <option value="MS">Montserrat</option>
                                                                                                                            <option value="MA">Morocco</option>
                                                                                                                            <option value="MZ">Mozambique</option>
                                                                                                                            <option value="MM">Myanmar</option>
                                                                                                                            <option value="NA">Namibia</option>
                                                                                                                            <option value="NR">Nauru</option>
                                                                                                                            <option value="NP">Nepal</option>
                                                                                                                            <option value="NL">Netherlands</option>
                                                                                                                            <option value="NC">New Caledonia</option>
                                                                                                                            <option value="NZ">New Zealand</option>
                                                                                                                            <option value="NI">Nicaragua</option>
                                                                                                                            <option value="NE">Niger</option>
                                                                                                                            <option value="NG">Nigeria</option>
                                                                                                                            <option value="NU">Niue</option>
                                                                                                                            <option value="NF">Norfolk Island</option>
                                                                                                                            <option value="MP">Northern Mariana Islands</option>
                                                                                                                            <option value="NO">Norway</option>
                                                                                                                            <option value="OM">Oman</option>
                                                                                                                            <option value="PK">Pakistan</option>
                                                                                                                            <option value="PW">Palau</option>
                                                                                                                            <option value="PS">Palestinian Territory, Occupied</option>
                                                                                                                            <option value="PA">Panama</option>
                                                                                                                            <option value="PG">Papua New Guinea</option>
                                                                                                                            <option value="PY">Paraguay</option>
                                                                                                                            <option value="PE">Peru</option>
                                                                                                                            <option value="PH">Philippines</option>
                                                                                                                            <option value="PN">Pitcairn</option>
                                                                                                                            <option value="PL">Poland</option>
                                                                                                                            <option value="PT">Portugal</option>
                                                                                                                            <option value="PR">Puerto Rico</option>
                                                                                                                            <option value="QA">Qatar</option>
                                                                                                                            <option value="RE">Réunion</option>
                                                                                                                            <option value="RO">Romania</option>
                                                                                                                            <option value="RU">Russian Federation</option>
                                                                                                                            <option value="RW">Rwanda</option>
                                                                                                                            <option value="BL">Saint Barthélemy</option>
                                                                                                                            <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                                                                                                            <option value="KN">Saint Kitts and Nevis</option>
                                                                                                                            <option value="LC">Saint Lucia</option>
                                                                                                                            <option value="MF">Saint Martin (French part)</option>
                                                                                                                            <option value="PM">Saint Pierre and Miquelon</option>
                                                                                                                            <option value="VC">Saint Vincent and the Grenadines</option>
                                                                                                                            <option value="WS">Samoa</option>
                                                                                                                            <option value="SM">San Marino</option>
                                                                                                                            <option value="ST">Sao Tome and Principe</option>
                                                                                                                            <option value="SA">Saudi Arabia</option>
                                                                                                                            <option value="SN">Senegal</option>
                                                                                                                            <option value="RS">Serbia</option>
                                                                                                                            <option value="SC">Seychelles</option>
                                                                                                                            <option value="SL">Sierra Leone</option>
                                                                                                                            <option value="SG">Singapore</option>
                                                                                                                            <option value="SX">Sint Maarten (Dutch part)</option>
                                                                                                                            <option value="SK">Slovakia</option>
                                                                                                                            <option value="SI">Slovenia</option>
                                                                                                                            <option value="SB">Solomon Islands</option>
                                                                                                                            <option value="SO">Somalia</option>
                                                                                                                            <option value="ZA">South Africa</option>
                                                                                                                            <option value="GS">South Georgia and the South Sandwich Islands</option>
                                                                                                                            <option value="SS">South Sudan</option>
                                                                                                                            <option value="ES">Spain</option>
                                                                                                                            <option value="LK">Sri Lanka</option>
                                                                                                                            <option value="SD">Sudan</option>
                                                                                                                            <option value="SR">Suriname</option>
                                                                                                                            <option value="SJ">Svalbard and Jan Mayen</option>
                                                                                                                            <option value="SZ">Swaziland</option>
                                                                                                                            <option value="SE">Sweden</option>
                                                                                                                            <option value="CH">Switzerland</option>
                                                                                                                            <option value="SY">Syrian Arab Republic</option>
                                                                                                                            <option value="TW">Taiwan, Province of China</option>
                                                                                                                            <option value="TJ">Tajikistan</option>
                                                                                                                            <option value="TZ">Tanzania, United Republic of</option>
                                                                                                                            <option value="TH">Thailand</option>
                                                                                                                            <option value="TL">Timor-Leste</option>
                                                                                                                            <option value="TG">Togo</option>
                                                                                                                            <option value="TK">Tokelau</option>
                                                                                                                            <option value="TO">Tonga</option>
                                                                                                                            <option value="TT">Trinidad and Tobago</option>
                                                                                                                            <option value="TN">Tunisia</option>
                                                                                                                            <option value="TR">Turkey</option>
                                                                                                                            <option value="TM">Turkmenistan</option>
                                                                                                                            <option value="TC">Turks and Caicos Islands</option>
                                                                                                                            <option value="TV">Tuvalu</option>
                                                                                                                            <option value="UG">Uganda</option>
                                                                                                                            <option value="UA">Ukraine</option>
                                                                                                                            <option value="AE">United Arab Emirates</option>
                                                                                                                            <option value="GB">United Kingdom</option>
                                                                                                                            <option value="US">United States</option>
                                                                                                                            <option value="UM">United States Minor Outlying Islands</option>
                                                                                                                            <option value="UY">Uruguay</option>
                                                                                                                            <option value="UZ">Uzbekistan</option>
                                                                                                                            <option value="VU">Vanuatu</option>
                                                                                                                            <option value="VE">Venezuela, Bolivarian Republic of</option>
                                                                                                                            <option value="VN">Viet Nam</option>
                                                                                                                            <option value="VG">Virgin Islands, British</option>
                                                                                                                            <option value="VI">Virgin Islands, U.S.</option>
                                                                                                                            <option value="WF">Wallis and Futuna</option>
                                                                                                                            <option value="EH">Western Sahara</option>
                                                                                                                            <option value="YE">Yemen</option>
                                                                                                                            <option value="ZM">Zambia</option>
                                                                                                                            <option value="ZW">Zimbabwe</option>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-group row mb-3">
                                                                                                                    <div class="col-xl-4 mb-3">
                                                                                                                        <label class="form-control-label">Cidade<span class="text-danger ml-2">*</span></label>
                                                                                                                        <input type="text" style="background-color: #f3f2f2;" name="cidade" id="cidade"value="<?= $dados[0]->cidade; ?>" class="form-control">
                                                                                                                    </div>
                                                                                                                    <div class="col-xl-4 mb-5">
                                                                                                                        <label class="form-control-label">Estado<span class="text-danger ml-2">*</span></label>
                                                                                                                        <input type="text" style="background-color: #f3f2f2;" name="estado" id="estado"value="<?= $dados[0]->estado; ?>" class="form-control">
                                                                                                                    </div>
                                                                                                                    <div class="col-xl-4">
                                                                                                                        <label class="form-control-label">CEP / ZipCode<span class="text-danger ml-2">*</span></label>
                                                                                                                        <input type="text" style="background-color: #f3f2f2;" name="cep" id="cep" value="<?= $dados[0]->cep; ?>" class="form-control">
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>


                                                                                                            <div class="tab-pane" id="tab2">
                                                                                                                <div class="section-title mt-5 mb-5">
                                                                                                                    <h4>Informações Profissionais</h4>
                                                                                                                </div>
                                                                                                                <div class="form-group row mb-3">
                                                                                                                    <div class="col-xl-6 mb-3">
                                                                                                                        <label class="form-control-label">Formação Acadêmica<span class="text-danger ml-2">*</span></label>
                                                                                                                        <select name="curso" id="curso" style="background-color: #f3f2f2;" class="form-control">

                                                                                                                            <?php foreach ($cursos as $curso): ?>
                                                                                                                                <option nome="curso" value="<?= $curso->id; ?>">
                                                                                                                                    <?= $curso->nome_curso; ?>
                                                                                                                                </option>
                                                                                                                            <?php endforeach; ?>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                    <div class="col-xl-6">
                                                                                                                        <label class="form-control-label">Status do Curso<span class="text-danger ml-2">*</span></label>
                                                                                                                        <select class="form-control" style="background-color: #f3f2f2;" name="situacao_curso" require id="status">
                                                                                                                            <option selected disabled>Situação</option>
                                                                                                                            <option name="situacao_curso" value="Concluido" selected="">Concluído</option>
                                                                                                                            <option name="situacao_curso" value="Em andamento">Cursando</option>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                    <label style="margin-left: 15px;" for="add_field"><span>Adicionar mais</span> <input style="display: none; margin-left: 15px;" type="button" id="add_field" value="Adicionar">
                                                                                                                        <img src="https://img.icons8.com/nolan/40/000000/add.png">
                                                                                                                    </label> <br>
                                                                                                                    <table id="listas" border="0" style="margin-left: 15px;" >
                                                                                                                        <tr>
                                                                                                                            <th class="form-control-label">Nome do Curso</th>
                                                                                                                            <th class="form-control-label">Período</th>

                                                                                                                            <th class="form-control-label">Instituiçao</th>
                                                                                                                            <th >&nbsp;</th>
                                                                                                                            <th>&nbsp;</th>

                                                                                                                        </tr>
                                                                                                                        <tr>
                                                                                                                            <td><input class="form-control" style="background-color: #f3f2f2;" type="text" name="nome_curso" value="<?= $cursinhos[0]->nome_curso; ?>" id="utente" ></td>
                                                                                                                            <td><input class="form-control" style="background-color: #f3f2f2;" type="text" name="periodo" value="<?= $cursinhos[0]->periodo; ?>"id="dta_nasc" ></td>
                                                                                                                            <td>
                                                                                                                                <input class="form-control" style="background-color: #f3f2f2;" class="form-control" type="text"value="<?= $cursinhos[0]->instituicao; ?>" name="instituicao" style="width: 250px "id="inst">
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                    </table>

                                                                                                                </div>


                                                                                                                <div class="form-group row mb-3">
                                                                                                                    <div class="col-xl-12">
                                                                                                                        <div class="section-title mt-5 mb-5">
                                                                                                                            <h4> Experiências Profissionais</h4><br>
                                                                                                                        </div>
                                                                                                                        <label for="add_field2"><span>Adicionar mais</span> <input  style="display: none" type="button" id="add_field2" value="Adicionar">
                                                                                                                            <img src="https://img.icons8.com/nolan/40/000000/add.png">
                                                                                                                        </label> <br>
                                                                                                                        <table id="listas2" border="0">
                                                                                                                            <tr>
                                                                                                                                <th class="form-control-label">Cargo</th>
                                                                                                                                <th class="form-control-label">Período</th>

                                                                                                                                <th class="form-control-label">Nome da Empresa</th>
                                                                                                                                <th >&nbsp;</th>
                                                                                                                                <th>&nbsp;</th>

                                                                                                                            </tr>
                                                                                                                            <tr>
                                                                                                                                <td><input class="form-control" type="text"style="background-color: #f3f2f2;" name="cargo" value="<?= $experiencias[0]->cargo; ?>"  id="utente" ></td>
                                                                                                                                <td><input class="form-control" type="text" style="background-color: #f3f2f2;" name="periodo2" value="<?= $experiencias[0]->periodo2; ?>"  id="dta_nasc" ></td>
                                                                                                                                <td>
                                                                                                                                    <input class="form-control" class="form-control" type="text" name="empresa2" value="<?= $experiencias[0]->empresa2; ?>"  style="width: 250px; background-color: #f3f2f2;"id="inst">
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                                        </table>

                                                                                                                    </div>


                                                                                                                </div>
                                                                                                            </div>





                                                                                                            <ul class="pager wizard text-right">
                                                                                                                <li class="previous d-inline-block disabled">
                                                                                                                    <a href="javascript:void(0)" class="btn btn-secondary ripple">Voltar</a>
                                                                                                                </li>
                                                                                                                <?php if($this->uri->segment(3)=='logado'): ?>
                                                                                                                 <input type="hidden" nome="gologado">
                                                                                                                <?php endif; ?>

                                                                                                                <li class="next d-inline-block">
                                                                                                                    <button  class="finish btn btn-gradient-01" type="submit">Salvar</button>
                                                                                                                </li>
                                                                                                            </ul>


                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>




                                                                <div class="actions dark">
                                                                    <div class="dropdown">
                                                                        <button type="button" style="width: 50px" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                                                                            <i class="la la-pencil-square"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu">
                                                                            <a href="#" class="dropdown-item" style="cursor: pointer">
                                                                                Relatório
                                                                            </a>
                                                                            <a data-target="#editaPerfil" data-toggle="modal" class="dropdown-item" style="cursor: pointer">
                                                                                Editar Perfil
                                                                            </a>
                                                                            <a data-toggle="modal" data-target="#modalfoto" class="dropdown-item" style="cursor: pointer">
                                                                                Atualizar Foto
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>
                                                <!-- End Head Profile -->
                                                <div class="row">

                                                <!-- se a pagina solicitada for vagas -->




 <!-- se a pagina solicitada for visitas -->
 <?php
 if ($this->uri->segment(4) == 'meu_curriculum'): $this->load->view('candidato/meu_curriculum');
 endif;
 ?>
 <!-- se a pagina solicitada for recomendações -->
 <?php
 if ($this->uri->segment(4) == 'colegas'): $this->load->view('candidato/colegas');
 endif;
 ?>
 <!-- se a pagina solicitada for meu curriculum -->


 <!-- se a pagina solicitada for meu perfil -->
 <?php
 if ($this->uri->segment(4) == 'vagas'): $this->load->view('candidato/vagas');
 endif;
 ?>

 <?php
 if ($this->uri->segment(4) == 'edicao'): $this->load->view('candidato/edicao');
 endif;
 ?>
 <?php
 if ($this->uri->segment(4) == 'empresasCA'): $this->load->view('candidato/empresasCA');
 endif;
 ?>


 <?php
 if ($this->uri->segment(4) == 'contato'): $this->load->view('candidato/contato');
 endif;
 ?>



 <?php if($this->uri->segment(4)=='colegas'): ?>

 <script type="text/javascript">
 window.movies = <?php echo html_entity_decode(json_encode($network, JSON_NUMERIC_CHECK)); ?>;
 </script>
 <?php endif; ?>

 <?php if($this->uri->segment(4)=='vagas'): ?>
 <script type="text/javascript">
 window.movies = <?php echo html_entity_decode(json_encode($candidatos, JSON_NUMERIC_CHECK)); ?>;
 </script>
 <?php endif; ?>

                                                    <div class="col-xl-3 column">
                                                        <!-- Begin About -->
                                                        <div class="widget has-shadow">
                                                            <div class="widget-header bordered no-actions d-flex align-items-center">
                                                                <h5>Quem Sou   <a  data-target="#editaQuemSou" data-toggle="modal"  style="margin-left: 110px; cursor: pointer" > <i class="la la-edit"></i></a></h5>
                                                            </div>
                                                            <div class="widget-body">
                                                                <p>
                                                                <div class="resposta">
                                                                    <?= $dados[0]->quemsou ?>
                                                                </div>

                                                                </p>
                                                            </div>
                                                        </div>
                                                        <!-- End About -->
                                                        <!-- Begin Twitter Feed -->
                                                        <div class="widget has-shadow">
                                                            <div class="widget-header bordered no-actions d-flex align-items-center">
                                                                <h5>Twitter Feed</h5>
                                                            </div>
                                                            <div class="widget-body p-0">
                                                                <ul class="list-group w-100">
                                                                    <li class="list-group-item">
                                                                        <div class="media">
                                                                            <div class="media-body align-self-center">
                                                                                <div class="text-dark pb-2">
                                                                                    <i class="ion-social-twitter align-middle text-twitter pr-2"></i>@Emprega_Ê
                                                                                </div>
                                                                                <p>
                                                                                    "O que os empreendedores têm em comum não é determinado tipo de personalidade, mas um compromisso com a prática sistemática da inovação."
                                                                                    <a href="#" class="text-twitter">#EmpregaÊ_Peter.Druker</a>
                                                                                </p>
                                                                                <small>1 hora, ago</small>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <div class="media">
                                                                            <div class="media-body align-self-center">
                                                                                <div class="text-dark pb-2">
                                                                                    <i class="ion-social-twitter align-middle text-twitter pr-2"></i>@Emprega_Ê
                                                                                </div>
                                                                                <p>
                                                                                    "As empresas inovadoras não gastam esforços para defender o passado."
                                                                                    <a href="#" class="text-twitter">#EmpregaÊ_Peter.Druker</a>
                                                                                </p>
                                                                                <small>2 horas, ago</small>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!-- End Twitter Feed -->
                                                        <!-- Begin Blog Posts -->
                                                        <div class="widget has-shadow">
                                                            <div class="widget-header bordered no-actions d-flex align-items-center">
                                                                <h5>Experiências - Comentários</h5>
                                                            </div>
                                                            <div class="widget-body p-0">
                                                                <ul class="list-group w-100">
                                                                    <li class="list-group-item">
                                                                        <div class="media">
                                                                            <div class="media-body align-self-center">
                                                                                <h3 class="mb-3">Como foi Trabalhar na Embraer</h3>
                                                                                <p>
                                                                                    Muito aprendizado! Empresa MARAVILHOSA. Podemos.dizer que realmente é uma grande escola. Tive relacionamentos incríveis, cresci e aprendi tudo que eu sei do mundo corporativo.
                                                                                </p>
                                                                                <small>1 hora, ago</small>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <div class="media">
                                                                            <div class="media-body align-self-center">
                                                                                <h3 class="mb-3">UTFPR - Desciclopédia</h3>
                                                                                <p>
                                                                                    A UTFPR é uma séria instituição de ensino que tem o objetivo de casar a vida de qualquer aluno que entre nessa merda com o maior número de burocracia possível, a sigla UTFPR significa União dos Tecnocratas Fechados do Paraná, vulgarmente conhecida como Universidade Tecnológica Federal do Paraná, ou ainda como A Federal com um TESÃO a mais, para quem está de fora. A UTFPR está igualmente distribuída entre 13, 14 ou 234, ou, mais atualmente, 232.369 unidades e pseudo-unidades, que formam a todo segundo um engenheiro eletricista especialmente programado para virar um CABIDE de emprego na falida COPEL,Paraná.
                                                                                </p>
                                                                                <small>1 dia, ago</small>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!-- End Blog Posts -->
                                                    </div>
                                                    <!-- End Col -->
                                                    <!-- Begin Timeline -->
                                                    <div class="col-xl-6">
                                                        <!-- Begin Widget -->
                                                        <div class="widget has-shadow">
                                                            <!-- Begin Widget Header -->
                                                            <div class="widget-header d-flex align-items-center">
                                                                <div class="user-image">
                                                                    <img class="rounded-circle" src="<?= base_url('assets/candidato/foto_candidato/'); ?><?= $dados[0]->foto_candidato; ?>" alt="...">
                                                                </div>
                                                                <div class="d-flex flex-column mr-auto">
                                                                    <div class="title">
                                                                        <span class="username"><?= $dados[0]->nome; ?></span>
                                                                        <!--<button style="margin-left: 100px" onclick="playPause()" class="btn btn-gradient-01" type="submit" ><i class="la la-play-circle-o"> </i>Assistir Vídeo-Curriculum</button>-->
                                                                    </div>
                                                                    <div class="time">25 min, ago</div>

                                                                </div>
                                                                <div class="widget-options">
                                                                    <div class="dropdown">
                                                                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                                                                            <i class="la la-pencil-square"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu">
                                                                            <a style="cursor: pointer"data-toggle="modal" data-target="#editaDescricao" class="dropdown-item">
                                                                                <i class="la la-edit"></i>Editar
                                                                            </a>

                                                                            <a style="cursor: pointer"data-target="#modal-centered"data-toggle="modal" class="dropdown-item">
                                                                                <i class="la la-play-circle"></i>Trocar Vídeo
                                                                            </a>
                                                                            <a style="cursor: pointer"href="javascript:void(0);" class="dropdown-item">
                                                                                <i class="la la-bell-slash"></i>Desativar Notificações
                                                                            </a>
                                                                            <a style="cursor: pointer"href="javascript:void(0);" class="dropdown-item faq">
                                                                                <i class="la la-question-circle"></i>FAQ
                                                                            </a>
                                                                            <a data-toggle="modal" data-target="#modalfoto" class="dropdown-item" style="cursor: pointer">
                                                                                Atualizar Foto
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Widget Header -->
                                                            <!-- Begin Widget Body -->
                                                            <div class="widget-body">
                                                                <p style="margin-left: 15px"> <?= $dados[0]->descricao_video; ?> </p>
                                                                <style>


                                                                    div.container {
                                                                        background-color: #fff;
                                                                        border-radius: 2px;
                                                                        margin: auto auto;
                                                                        width: 50%;
                                                                        padding: 20px;
                                                                        text-align: center;
                                                                    }
                                                                    div.errors {
                                                                        padding: 10px;
                                                                        color: red;
                                                                        background-color: #ddd;
                                                                        border: 1px solid #ccc;
                                                                    }
                                                                    div.success {
                                                                        padding: 22px;
                                                                        color: green;
                                                                        background-color: #ddd;
                                                                        border: 1px solid #ccc;
                                                                    }
                                                                </style>



                                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

                                                                <script>
                                                                                        $(document).ready(function() {
                                                                                            $('form.jsform').on('submit', function(form) {
                                                                                                form.preventDefault();
                                                                                                $.post('../../candidato/Login/submission', $('form.jsform').serialize(), function(data) {
                                                                                                    $('div.resposta').html(data);
                                                                                                });
                                                                                            });
                                                                                        });</script>


                                                                <video class="col-md-12" controls="">
                                                                    <source src="<?= base_url('assets/candidato/video_analise/' . $dados_user->video_nome); ?>" type="video/mp4">
                                                                </video>

                                                            </div>
                                                            <!-- End Widget Body -->
                                                            <!-- Begin Widget Footer -->
                                                            <div class="widget-footer d-flex align-items-center">
                                                                <div class="col-xl-8 col-md-8 col-7 no-padding d-flex justify-content-start">
                                                                    <div class="users-like">
                                                                        <a href="javascript:void(0);">

                                                                            <img src="<?= base_url('assets/candidato/foto_candidato/'); ?><?= $dados[0]->foto_candidato; ?>"  class="img-fluid rounded-circle" alt="...">
                                                                        </a>
                                                                        <a href="javascript:void(0);">
                                                                            <img src="http://www.slainte21.com/wp-content/uploads/2013/10/DSC5310-e1476052466530.jpg" class="img-fluid rounded-circle" alt="...">
                                                                        </a>
                                                                        <a href="javascript:void(0);">
                                                                            <img src="http://www.christiangarces.org/wp-content/uploads/2017/11/perfil-profesional.jpg" class="img-fluid rounded-circle" alt="...">
                                                                        </a>
                                                                        <a href="javascript:void(0);">
                                                                            <img src="https://sg.fiverrcdn.com/photos/118254724/original/08c8a1828da29e8f539e2f37251da45ee3540def.jpg?1538827871" class="img-fluid rounded-circle" alt="...">
                                                                        </a>
                                                                        <a class="view-more" href="javascript:void(0);">
                                                                            +4
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-4 col-md-4 col-5 no-padding d-flex justify-content-end">
                                                                    <div class="meta">
                                                                        <ul>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <i class="la la-comment"></i><span class="numb">12</span>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <i class="la la-heart-o"></i><span class="numb">30</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Widget Footer -->
                                                            <!-- Begin Comments -->
                                                            <div class="comments">
                                                                <div class="comments-header d-flex align-items-center">
                                                                    <div class="user-image">
                                                                        <img class="rounded-circle" src="http://www.slainte21.com/wp-content/uploads/2013/10/DSC5310-e1476052466530.jpg" alt="...">
                                                                    </div>
                                                                    <div class="d-flex flex-column mr-auto">
                                                                        <div class="title">
                                                                            <span class="username">Anna Maria</span>
                                                                        </div>
                                                                        <div class="time">10 min, ago</div>
                                                                    </div>
                                                                </div>
                                                                <div class="comments-body">
                                                                    <p>
                                                                        Olá colega, amei o seu curriculum, te contrataria :)

                                                                    </p>
                                                                </div>
                                                                <div class="comments-footer d-flex align-items-center">
                                                                    <div class="meta">
                                                                        <ul>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <i class="la la-flag"></i>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <span class="rep">Resposta</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Comments -->
                                                            <!-- Begin Reply -->
                                                            <div class="reply">
                                                                <div class="reply-header d-flex align-items-center">
                                                                    <div class="user-image">
                                                                        <img class="rounded-circle" src="http://www.christiangarces.org/wp-content/uploads/2017/11/perfil-profesional.jpg" alt="...">
                                                                    </div>
                                                                    <div class="d-flex flex-column mr-auto">
                                                                        <div class="title">
                                                                            <span class="username">Rafael Koren</span>
                                                                        </div>
                                                                        <div class="time">12 min, ago</div>
                                                                    </div>
                                                                </div>
                                                                <div class="reply-body">
                                                                    <p>
                                                                        Muito legal sua aprensetação, gostaria de saber qual câmera você usou para gravar o vídeo. Parabéns, logo você será contratado.
                                                                    </p>
                                                                </div>
                                                                <div class="reply-footer d-flex align-items-center">
                                                                    <div class="meta">
                                                                        <ul>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <i class="la la-flag"></i>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <span class="rep">Resposta</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="reply">
                                                                <div class="reply-header d-flex align-items-center">
                                                                    <div class="user-image">
                                                                        <img class="rounded-circle" src="https://sg.fiverrcdn.com/photos/118254724/original/08c8a1828da29e8f539e2f37251da45ee3540def.jpg?1538827871" alt="...">
                                                                    </div>
                                                                    <div class="d-flex flex-column mr-auto">
                                                                        <div class="title">
                                                                            <span class="username">Michelle Melissa</span>
                                                                        </div>
                                                                        <div class="time">20 min, ago</div>
                                                                    </div>
                                                                </div>
                                                                <div class="reply-body">
                                                                    <p>
                                                                        Que bacana! Muito simpático, claro e objetivo! Quero umas aulas sobre como se como fazer uma boa entrevista de emprego :)
                                                                    </p>
                                                                </div>
                                                                <div class="reply-footer d-flex align-items-center">
                                                                    <div class="meta">
                                                                        <ul>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <i class="la la-flag"></i>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <span class="rep">Resposta</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Reply -->
                                                            <!-- Begin Publisher -->
                                                            <div class="publisher publisher-multi">
                                                                <textarea class="publisher-input" rows="3" placeholder="Adicionar comentário"></textarea>
                                                                <div class="publisher-bottom d-flex justify-content-end">
                                                                    <a class="publisher-btn" href="javascript:void(0);"><i class="la la-smile-o"></i></a>
                                                                    <a class="publisher-btn" href="javascript:void(0);"><i class="la la-camera"></i></a>
                                                                    <button class="btn btn-gradient-01">Deixar um comentário</button>
                                                                </div>
                                                            </div>
                                                            <!-- End Publisher -->
                                                        </div>
                                                        <!-- End Widget -->

                                                    </div>
                                                    <!-- End Timeline -->
                                                    <!-- Begin Column -->
                                                    <div class="col-xl-3 column">
                                                    <!-- Begin Badge -->
                                                        <div class="widget has-shadow">
                                                        <div class="widget-header bordered no-actions d-flex align-items-center">
                                                                <h5><i class="la la-mortar-board la-1.5x"> Formação Academica</i></h5>
                                                            </div>
                                                            <div class="widget-body p-3">
                                                                <div class="row m-0">
                                                                    <div class="col-xl-12 col-md-6 col-6 p-0">
                                                                     <?= $dados[0]->nome_curso; ?> -
                                                                     UTFPR

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Badge -->
                                                        <!-- Begin Friends -->
                                                        <div class="widget has-shadow">
                                                            <div class="widget-header bordered no-actions d-flex align-items-center">
                                                                <h5>Contatos (<?php echo count($contatos, COUNT_RECURSIVE); ?>)</h5>
                                                            </div>
                                                            <div class="widget-body">
                                                                <div class="friends-list">

                                                                    <div class="d-flex justify-content-between">

                                                                    <?php foreach($contatos as $contatosValue): ?>

                                                                    <a href="javascript:void(0);">
                                                                            <img src="<?= base_url('assets/candidato/foto_candidato/'); ?><?= $colegasValue->foto_candidato ?>" class="img-fluid rounded-circle" alt="...">
                                                                        </a>

                                                                <?php endforeach; ?>

                                                                    </div>

                                                                        <a class="view-more" href="javascript:void(0);">
                                                                            +<?php echo count($contatos, COUNT_RECURSIVE); ?>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Friends -->
                                                        <!-- Begin Photos -->
                                                        <div class="widget has-shadow">
                                                            <div class="widget-header bordered no-actions d-flex align-items-center">
                                                                <h5>Portifólio - Album</h5>
                                                            </div>
                                                            <div class="widget-body p-3">
                                                                <div class="row m-0">
                                                                    <div class="col-xl-6 col-md-6 col-6 p-0">
                                                                        <a href="javascript:void(0);">
                                                                            <img class="img-fluid rounded border border-white" src="../../assets2/img/background/01.jpg" alt="...">
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-xl-6 col-md-6 col-6 p-0">
                                                                        <a href="javascript:void(0);">
                                                                            <img class="img-fluid rounded border border-white" src="../../assets2/img/background/02.jpg" alt="...">
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-xl-6 col-md-6 col-6 p-0">
                                                                        <a href="javascript:void(0);">
                                                                            <img class="img-fluid rounded border border-white" src="../../assets2/img/background/03.jpg" alt="...">
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-xl-6 col-md-6 col-6 p-0">
                                                                        <a href="javascript:void(0);">
                                                                            <img class="img-fluid rounded border border-white" src="../../assets2/img/background/04.jpg" alt="...">
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-xl-6 col-md-6 col-6 p-0">
                                                                        <a href="javascript:void(0);">
                                                                            <img class="img-fluid rounded border border-white" src="../../assets2/img/background/05.jpg" alt="...">
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-xl-6 col-md-6 col-6 p-0">
                                                                        <a href="javascript:void(0);">
                                                                            <img class="img-fluid rounded border border-white" src="../../assets2/img/background/06.jpg" alt="...">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Photos -->
                                                        <!-- Begin Social Network -->
                                                        <div class="widget no-bg text-center">
                                                            <ul class="social-network">
                                                                <li>
                                                                    <a href="javascript:void(0);" class="ico-facebook" title="Facebook">
                                                                        <i class="ion-social-facebook"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="ico-twitter" title="Twitter">
                                                                        <i class="ion-social-twitter"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="ico-youtube" title="Youtube">
                                                                        <i class="ion-social-youtube"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="ico-linkedin" title="Linkedin">
                                                                        <i class="ion-social-linkedin"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!-- End Social Networks -->
                                                    </div>
                                                    <!-- End Column -->
                                                </div>
                                                <!-- End Row -->
                                            </div>
                                            <!-- End Col -->
                                        </div>
                                        <!-- End Row -->
                                    </div>
                                    <!-- End Container -->
                                    <!-- Begin Page Footer-->
                                    <footer class="alain-footer">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center">
                                                <p class="text-gradient-02">Emprega_Ê</p>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-end justify-content-lg-end justify-content-md-end justify-content-center">
                                                <ul class="nav">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Documentação</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Contato com a Emprega_Ê</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </footer>
                                    <!-- End Page Footer -->
                                    <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
                                    <!-- Offcanvas Sidebar -->
                                    <div class="off-sidebar from-right">
                                        <div class="off-sidebar-container">
                                            <header class="off-sidebar-header">
                                                <ul class="button-nav nav nav-tabs mt-3 mb-3 ml-3" role="tablist" id="weather-tab">
                                                    <li><a class="active" data-toggle="tab" href="#messenger" role="tab" id="messenger-tab">Conversas</a></li>
                                                    <li><a data-toggle="tab" href="#today" role="tab" id="today-tab">Hoje</a></li>
                                                </ul>
                                                <a href="#off-canvas" class="off-sidebar-close"></a>
                                            </header>
                                            <div class="off-sidebar-content offcanvas-scroll auto-scroll">
                                                <div class="tab-content">
                                                    <!-- Begin Messenger -->
                                                    <div role="tabpanel" class="tab-pane show active fade" id="messenger" aria-labelledby="messenger-tab">
                                                        <!-- Begin Chat Message -->
                                                        <span class="date">Hoje</span>
                                                        <div class="messenger-message messenger-message-sender">
                                                            <img class="messenger-image messenger-image-default" src="https://www.to13.com/wp-content/uploads/2014/10/RENAULT-LOGO-OFFICIEL.jpg" alt="...">
                                                            <div class="messenger-message-wrapper">
                                                                <div class="messenger-message-content">
                                                                    <p>
                                                                        <span class="mb-2">Renault</span>
                                                                        Olá, <?= $dados[0]->nome; ?>
                                                                    </p>
                                                                </div>
                                                                <div class="messenger-details">
                                                                    <span class="messenger-message-localization font-size-small">2 minutes ago</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="messenger-message messenger-message-recipient">
                                                            <div class="messenger-message-wrapper">
                                                                <div class="messenger-message-content">
                                                                    <p>
                                                                        Olá, estou muito feliz por entrar em contato comigo :)
                                                                    </p>
                                                                    <p>
                                                                        Já viram meu Vídeo-Curriculum?
                                                                    </p>
                                                                </div>
                                                                <div class="messenger-details">
                                                                    <span class="messenger-message-localisation font-size-small">3 minutos, ago</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="messenger-message messenger-message-sender">
                                                            <img class="messenger-image messenger-image-default" src="https://www.to13.com/wp-content/uploads/2014/10/RENAULT-LOGO-OFFICIEL.jpg" alt="...">
                                                            <div class="messenger-message-wrapper">
                                                                <div class="messenger-message-content">
                                                                    <p>
                                                                        <span class="mb-2">Renault</span>
                                                                        Queremos conversamos sobre trabalhos e propostas.
                                                                    </p>
                                                                </div>
                                                                <div class="messenger-details">
                                                                    <span class="messenger-message-localization font-size-small">5 minutos, ago</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="messenger-message messenger-message-recipient">
                                                            <div class="messenger-message-wrapper">
                                                                <div class="messenger-message-content">
                                                                    <p>
                                                                        Que legal, vou sim, estou à diposição :)
                                                                    </p>
                                                                </div>
                                                                <div class="messenger-details">
                                                                    <span class="messenger-message-localisation font-size-small">10 minutos, ago</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Chat Message -->
                                                        <!-- Begin Message Form -->
                                                        <div class="enter-message">
                                                            <div class="enter-message-form">
                                                                <input type="text" placeholder="Enviar mensagem..."/>
                                                            </div>
                                                            <div class="enter-message-button">
                                                                <a href="#" class="send"><i class="ion-paper-airplane"></i></a>
                                                            </div>
                                                        </div>
                                                        <!-- End Message Form -->
                                                    </div>
                                                    <!-- End Messenger -->
                                                    <!-- Begin Today -->
                                                    <div role="tabpanel" class="tab-pane fade" id="today" aria-labelledby="today-tab">
                                                        <!-- Begin Today Stats -->
                                                        <div class="sidebar-heading pt-0">Status Atual</div>
                                                        <div class="today-stats mt-3 mb-3">
                                                            <div class="row">
                                                                <div class="col-4 text-center">
                                                                    <i class="la la-users"></i>
                                                                    <div class="counter">264</div>
                                                                    <div class="heading">Coligações</div>
                                                                </div>
                                                                <div class="col-4 text-center">
                                                                    <i class="la la-cart-arrow-down"></i>
                                                                    <div class="counter">360</div>
                                                                    <div class="heading">Empresas</div>
                                                                </div>
                                                                <div class="col-4 text-center">
                                                                    <i class="la la-money"></i>
                                                                    <div class="counter">27</div>
                                                                    <div class="heading">Propostas</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Today Stats -->
                                                        <!-- Begin Friends -->
                                                        <div class="sidebar-heading">Colegas</div>
                                                        <div class="quick-friends mt-3 mb-3">
                                                            <ul class="list-group w-100">
                                                                <li class="list-group-item">
                                                                    <div class="media">
                                                                        <div class="media-left align-self-center mr-3">
                                                                            <img src="../../assets2/img/avatar/avatar-02.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                                        </div>
                                                                        <div class="media-body align-self-center">
                                                                            <a href="javascript:void(0);">Mare Martins</a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="media">
                                                                        <div class="media-left align-self-center mr-3">
                                                                            <img src="../../assets2/img/avatar/avatar-03.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                                        </div>
                                                                        <div class="media-body align-self-center">
                                                                            <a href="javascript:void(0);">Frank Brandão</a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="media">
                                                                        <div class="media-left align-self-center mr-3">
                                                                            <img src="../../assets2/img/avatar/avatar-04.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                                        </div>
                                                                        <div class="media-body align-self-center">
                                                                            <a href="javascript:void(0);">Lucas Mendonça</a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="media">
                                                                        <div class="media-left align-self-center mr-3">
                                                                            <img src="../../assets2/img/avatar/avatar-05.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                                        </div>
                                                                        <div class="media-body align-self-center">
                                                                            <a href="javascript:void(0);">Claudemar Teixeira</a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="media">
                                                                        <div class="media-left align-self-center mr-3">
                                                                            <img src="../../assets2/img/avatar/avatar-06.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                                        </div>
                                                                        <div class="media-body align-self-center">
                                                                            <a href="javascript:void(0);">Tatiane Koren</a>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!-- End Friends -->
                                                        <!-- Begin Settings -->
                                                        <div class="sidebar-heading">Configurações</div>
                                                        <div class="quick-settings mt-3 mb-3">
                                                            <ul class="list-group w-100">
                                                                <li class="list-group-item">
                                                                    <div class="media">
                                                                        <div class="media-body align-self-center">
                                                                            <p class="text-dark">Notificações - Email</p>
                                                                        </div>
                                                                        <div class="media-right align-self-center">
                                                                            <label>
                                                                                <input class="toggle-checkbox" type="checkbox" checked>
                                                                                <span>
                                                                                    <span></span>
                                                                                </span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="media">
                                                                        <div class="media-body align-self-center">
                                                                            <p class="text-dark">Notificações - Son</p>
                                                                        </div>
                                                                        <div class="media-right align-self-center">
                                                                            <label>
                                                                                <input class="toggle-checkbox" type="checkbox">
                                                                                <span>
                                                                                    <span></span>
                                                                                </span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="media">
                                                                        <div class="media-body align-self-center">
                                                                            <p class="text-dark">Chat Menssagens - Son</p>
                                                                        </div>
                                                                        <div class="media-right align-self-center">
                                                                            <label>
                                                                                <input class="toggle-checkbox" type="checkbox" checked>
                                                                                <span>
                                                                                    <span></span>
                                                                                </span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!-- End Settings -->
                                                    </div>
                                                    <!-- End Today -->
                                                </div>
                                            </div>
                                            <!-- End Offcanvas Container -->
                                        </div>
                                        <!-- End Offsidebar Container -->
                                    </div>
                                    <!-- End Offcanvas Sidebar -->
                                </div>
                                <!-- End Content -->
                            </div>
                            <!-- End Page Content -->
                        </div>


                        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
                        <script>
                                                                                        var max_fields = 20; //max de 15 inscricoes de cada vez
                                                                                        var x = 1;
                                                                                        $('#add_field2').click(function(e) {
                                                                                            e.preventDefault(); //prevenir novos clicks
                                                                                            if (x < max_fields) {
                                                                                                $('#listas2').append('\
                                                                <tr class="remove' + x + '"><td><input style="background-color: #f3f2f2;" class="form-control" type="text"  name="cargo" value="<?= set_value('cargo'); ?>"  id="nome" placeholder="Ex.: Analista  "></td>\
                                                                <td><input style="background-color: #f3f2f2;" class="form-control" type="text"  name="periodo2" value="<?= set_value('periodo'); ?>"  id="dta_nasc" placeholder="Ex.: 12/2015 - 10/2017 "></td>\
                                                               \
                                                                <td>\
                                                                         <input style="background-color: #f3f2f2;" class="form-control" type="text"  name="empresa2" value="<?= set_value('empresa2'); ?>"  style="width: 250px "id="inst"placeholder="Ex.: Apple">\
                                                                </td>\
                                                                <td><a href="#" class="remove_campo" id="remove' + x + '">Apagar</a></td>\\n\
                                                                   \
                                                ');
                                                                                                x++;
                                                                                            }
                                                                                        });
                                                                                        //this is not the best move, because will create overhead...
                                                                                        //but is for simplicity
                                                                                        //damn users
                                                                                        $('#listas2').on("click", ".remove_campo", function(e) {
                                                                                            e.preventDefault();
                                                                                            //tr id will be the same as the image
                                                                                            var tr = $(this).attr('id');
                                                                                            //alert ('remove: ' + tr);
                                                                                            $('#listas2 tr.' + tr).remove();
                                                                                            x--;
                                                                                        });
                                                                                        var max_fields = 20; //max de 15 inscricoes de cada vez
                                                                                        var x = 1;
                                                                                        $('#add_field').click(function(e) {
                                                                                            e.preventDefault(); //prevenir novos clicks
                                                                                            if (x < max_fields) {
                                                                                                $('#listas').append('\
                                       <tr class="remove' + x + '"><td><input style="background-color: #f3f2f2;" class="form-control" type="text" name="nome_curso" value="<?= set_value('nome_curso'); ?>" id="nome"></td>\
                                       <td><input class="form-control" type="text" style="background-color: #f3f2f2;" name="periodo" value="<?= set_value('periodo'); ?>"  id="dta_nasc" placeholder="Ex.: 12/2017 - 10/2018 "></td>\
                                      \
                                       <td>\
                                                <input class="form-control" style="background-color: #f3f2f2;" type="text" name="instituicao" value="<?= set_value('instituicao'); ?>" style="width: 250px "id="inst"placeholder="Ex.: USP - Uni..">\
                                       </td>\
                                       <td><a href="#" class="remove_campo" id="remove' + x + '">Apagar</a></td>\\n\
                                          \
                       ');
                                                                                                x++;
                                                                                            }
                                                                                        });
                                                                                        //this is not the best move, because will create overhead...
                                                                                        //but is for simplicity
                                                                                        //damn users
                                                                                        $('#listas').on("click", ".remove_campo", function(e) {
                                                                                            e.preventDefault();
                                                                                            //tr id will be the same as the image
                                                                                            var tr = $(this).attr('id');
                                                                                            //alert ('remove: ' + tr);
                                                                                            $('#listas tr.' + tr).remove();
                                                                                            x--;
                                                                                        });
                        </script>
                        <script>

                            function enviaVideo() {

                                //Receber os dados
                                $form = $(this);
                                var formdata = new FormData($form[0]);
                                //Criar a conexao com o servidor
                                var request = new XMLHttpRequest();
                                //Progresso do Upload
                                request.upload.addEventListener('progress', function(e) {
                                    var percent = Math.round(e.loaded / e.total * 100);
                                    $form.find('.progress-bar').width(percent + '%').html(percent + '%');
                                });
                                //Upload completo limpar a barra de progresso
                                request.addEventListener('load', function(e) {
                                    $form.find('.progress-bar').addClass('progress-bar-success').html('upload completo...');
                                    //Atualizar a página após o upload completo
                                    setTimeout("window.open(self.location, '_self');", 1000);
                                });
                                //Arquivo responsável em fazer o upload da imagem
                                request.open('post', '<?= base_url(); ?>' + 'index.php/candidato/login/logado');
                                request.send(formdata);
                                var inputFile = document.getElementById('inputFile');
                                inputFile.addEventListener('change', function() {
                                    var arquivo = this.value;
                                    if (arquivo.length < 1) {
                                        document.querySelector('.file img').src = "<?= base_url('assets/admin/imagens/icons/upload.png'); ?>";
                                    } else {
                                        arquivo = arquivo.toLowerCase();
                                        arquivo = arquivo.split('.').pop();
                                        if (arquivo == 'mp4') {
                                            //faz preview do vídeo
                                            var $source = $('#video_preview');
                                            $source[0].src = URL.createObjectURL(this.files[0]);
                                            $source.parent()[0].load();
                                        } else {
                                            alert('Formato de arquivo invalido!');
                                        }
                                    }
                                });
                            }
                        </script>

                        <!-- Begin Vendor Js -->
                        <script src="<?= base_url('assets2/vendors/js/base/jquery.min.js'); ?> "></script>
                        <script src="<?= base_url('assets2/vendors/js/base/core.min.js'); ?>"></script>
                        <!-- End Vendor Js -->
                        <!-- Begin Page Vendor Js -->
                        <script src="<?= base_url('assets2/vendors/js/nicescroll/nicescroll.min.js'); ?>"></script>
                        <script src="<?= base_url('assets2/vendors/js/app/app.min.js'); ?>"></script>
                        <!-- End Page Vendor Js -->






                    <?php } elseif ($dados_user->status == 4 OR $dados_user->status == 5) { ?>

                        <h4 class="navbar"><span class="text-left">Novidade:</span> <a href="<?= base_url('candidato/login/sair'); ?>" class="link">Sair</a></h4>
                        <h6 class="navbar">Uma empresa teve interesse em seu perfil, em breve ela poderá entrar em contato, boa sorte!</h6>

                    <?php } ?>







                </div>
            </div>
        <?php elseif ($dados_user->status == 2): redirect(base_url('/candidato/login/rede')); /* else: redirect(base_url('/candidato/login')); */ elseif ($dados_user->status == 3): ?>

            <?php $this->load->view('candidato/candidato_recusado', ['dados_user' => $dados_user]); ?>

        <?php endif; ?>
    <?php endforeach; ?>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>

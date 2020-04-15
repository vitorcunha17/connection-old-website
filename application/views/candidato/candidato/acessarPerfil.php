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



    <body id="page-top" style="color :#2c304d">


                <!-- Begin Preloader -->
                <div id="preloader">
                    <div class="canvas">
                        <img src="<?= base_url('assets2/img/logo.png'); ?>" alt="logo" class="loader-logo">
                        <div class="spinner"></div>
                    </div>
                </div>

                <!-- End Preloader -->
                <div class="page db-social">

                    <!-- SE A EMPRESA ESTA EM ANALISE -->


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
                                                <img src="<?= base_url('assets2/img/logo.png'); ?>" alt="logo" style="width: 70px;" class="logo-big">
                                            </div>
                                            <div class="brand-image brand-small">
                                                <img src="<?= base_url('assets2/img/logo.png'); ?>" alt="logo" class="logo-small">
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
                                        <li class="nav-item d-flex align-items-center"></li>
                                        <!-- End Search -->
                                        <!-- Begin Notifications -->
                                        <li class="nav-item dropdown">
                                            <ul id="minha_div2" aria-labelledby="abrir2" class="dropdown-menu notification">
                                                <li>
                                                    <div class="notifications-header">
                                                        <div class="title">Notificações (4)</div>
                                                        <div class="notifications-overlay"></div>
                                                        <img src="<?= base_url('assets2/img/notifications/01.jpg'); ?>" alt="..." class="img-fluid">
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
                                        <li class="nav-item dropdown">

                                        <div class="actions dark">
                                                                    <div class="dropdown">
                                                                        <button type="button" style="width: 50px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                                                                            <i class="la la-mail-forward" style="color: #aea9c3"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu"   style="width: 20px;">
                                                                            <a href="#"   style="width: 20px;" class="dropdown-item" style="cursor: pointer">Indicar</a>
                                                                        </div>
                                                                    </div>
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
                                                                    <div class="counter"><?php echo $valorVisitas; ?> </div>
                                                                    <div class="heading">Visualizaçoes</div>
                                                                </li>
                                                                <li>
                                                                    <div class="counter"><?php echo count($contatos, COUNT_RECURSIVE); ?></div>
                                                                    <div class="heading">Contatos</div>
                                                                </li>
                                                                <li>
                                                                <div class="counter">
                                                                 <?= $valor; ?>
                                                                 </div>
                                                                    <div class="heading">Indicações</div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-xl-4 col-md-4 d-flex justify-content-center">
                                                            <div class="image-default">


                                                                <img class="rounded-circle" alt="..." src="<?= base_url('assets/candidato/foto_candidato/'); ?><?= $dados[0]->foto_candidato; ?>" >
                                                            </div>
                                                            <div class="infos">
                                                                <h2><?= $dados[0]->nome; ?>, <?= $dados[0]->sobrenome; ?> </h2>
                                                                <div class="location"><?= $dados[0]->cidade; ?>, <?= $dados[0]->estado; ?>, Brasil</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-md-4 d-flex justify-content-lg-end justify-content-md-end justify-content-center">
                                                            <div class="follow">
                                                                <div class="col-md-5 mb-3" >

                                                                <button  class="btn btn-gradient-01" data-target="#modal-centered" type="button" data-toggle="modal"><i class="la la-sitemap"> </i><?= $dados[0]->nome; ?> está conectado com voce </button>



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

                                                                                            <input class="btn btn-outline-primary mr-1 mb-2"id="foto" style="margin-left: 50px;display: block;" name="foto" type="file" value="<?= set_value('foto'); ?>" class="form-control"  />



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



                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>
                                                <!-- End Head Profile -->
                                                <div class="row">
                                                    <div class="col-xl-3 column">
                                                        <!-- Begin About -->
                                                        <div class="widget has-shadow">
                                                            <div class="widget-header bordered no-actions d-flex align-items-center">
                                                                <h5>Quem Sou   </h5>
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

                                                        <!-- Begin Blog Posts -->
                                                        <div class="widget has-shadow">
                                                            <div class="widget-header bordered no-actions d-flex align-items-center">
                                                                <h5><i class="la la-suitcase la-1x"> Cursos Realidados</i></h5>
                                                            </div>
                                                            <div class="widget-body p-0">
                                                                <ul class="list-group w-100">
                                                                <?php  foreach($cursinhos as $cursinhosValue): ?>
                                                                    <li class="list-group-item">
                                                                        <div class="media">
                                                                            <div class="media-body align-self-center">
                                                                                <h3 class="mb-3"style="color: #e76c90;"><?= $cursinhosValue->nome_curso; ?></h3>
                                                                                <p>
                                                                                Local: <?= $cursinhosValue->instituicao; ?><br>
                                                                                Curso:  <?= $cursinhosValue->periodo; ?>
                                                                                </p>
                                                                             <hr>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                <?php endforeach; ?>
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
                                                                            <i class="la la-star"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu">
                                                                            <a style="cursor: pointer"data-toggle="modal" data-target="#editaDescricao" class="dropdown-item">
                                                                                Excelente
                                                                            </a>

                                                                            <a style="cursor: pointer"data-target="#modal-centered"data-toggle="modal" class="dropdown-item">
                                                                            Ótimo
                                                                            </a>
                                                                            <a style="cursor: pointer"href="javascript:void(0);" class="dropdown-item">
                                                                               Bom
                                                                            </a>
                                                                            <a style="cursor: pointer"href="javascript:void(0);" class="dropdown-item faq">
                                                                               Ruim
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






                                                                <video class="col-md-12" controls="">
                                                                    <source src="<?= base_url('assets/candidato/video_analise/'); ?><?= $dados[0]->video_nome; ?>" type="video/mp4">
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
                                                            <?php foreach($messagens as $valueComents): ?>
                                                            <div class="comments">
                                                                    <div class="comments-header d-flex align-items-center">
                                                                        <div class="user-image">
                                                                            <img class="rounded-circle" src="<?= base_url('assets/candidato/foto_candidato/'); ?><?php echo $valueComents->foto_candidato ?>" " alt="...">
                                                                        </div>
                                                                        <div class="d-flex flex-column mr-auto">
                                                                            <div class="title">
                                                                                <span class="username"><?php echo $valueComents->nome ?> <?php echo $valueComents->sobrenome ?></span>
                                                                            </div>
                                                                            <div class="time"><?php echo $valueComents->data ?></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="comments-body">
                                                                        <p>
                                                                            <?php echo $valueComents->conteudo ?>
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

                                                                <?php endforeach; ?>
                                                                <div class="respostaComments"></div>
                                          <!-- Fim comentario -->

                                                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
                                                                    <script>
                                                                    $(document).ready(function() {
                                                                        $('form.jsform').on('submit', function(form) {
                                                                            form.preventDefault();
                                                                            $.post('../../../candidato/Login/fazerComentario', $('form.jsform').serialize(), function(data) {
                                                                                $('div.respostaComments').html(data);


                                                                            });
                                                                        });
                                                                    });</script>


                                                            <!-- Caixa -->
                                                            <?php echo form_open('candidato/login/fazerComentario', array('class' => 'jsform')); ?>
                                                            <div class="publisher publisher-multi">
                                                            <input type="hidden" name="id_para" class="publisher-input"  rows="3" value="<?= $dados[0]->id_candidato; ?>">

                                                                <textarea style="color: #2c304d;"class="publisher-input"  name="comentario"  id="" rows="3" placeholder="Adicionar comentário"></textarea>
                                                                <div class="publisher-bottom d-flex justify-content-end">
                                                                    <a class="publisher-btn" href="javascript:void(0);"><i class="la la-smile-o"></i></a>
                                                                    <a class="publisher-btn" href="javascript:void(0);"><i class="la la-camera"></i></a>

                                                                    <button class="btn btn-gradient-01"  type="submit">Deixar um comentário</button>
                                                                    <?php echo form_close(); ?>
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

                                                        <!-- End Friends -->
                                                        <!-- Begin Photos -->
                                                        <div class="widget has-shadow">
                                                            <div class="widget-header bordered no-actions d-flex align-items-center">
                                                                <h5><i class="la la-globe la-1x"> Experiencia Profissional</i></h5>
                                                            </div>
                                                            <div class="widget-body p-0">
                                                                <ul class="list-group w-100">
                                                                <?php  foreach($experiencia as $experienciaValue): ?>
                                                                    <li class="list-group-item">
                                                                        <div class="media">
                                                                            <div class="media-body align-self-center">
                                                                                <h3 class="mb-3"style="color: #e76c90;"> <?=  $experienciaValue->empresa2; ?></h3>
                                                                                <p>
                                                                               Cargo:  <?=  $experienciaValue->cargo; ?><br>
                                                                               Período: <?=  $experienciaValue->periodo2; ?>
                                                                                </p> <hr>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="widget has-shadow">
                                                            <div class="widget-header bordered no-actions d-flex align-items-center">
                                                            <h5>   <i class="la la-eye"> Interesses </i></h5>
                                                            </div>
                                                            <div class="widget-body p-3">
                                                                <div class="row m-0">
                                                                    <div class="col-xl-6 col-md-6 col-6 p-0">

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>


                                                        <!-- End Photos -->
                                                          <!-- Begin Friends -->
                                                        <div class="widget has-shadow">
                                                            <div class="widget-header bordered no-actions d-flex align-items-center">
                                                              <i class="la la-users" > Contatos de <?= $dados[0]->nome; ?> (<?php echo count($contatos, COUNT_RECURSIVE); ?>) </i>
                                                            </div>
                                                            <div class="widget-body">
                                                                <div class="friends-list">
                                                                <?php foreach($contatos as $contatosValue): ?>
                                                                    <div class="d-flex justify-content-between">
                                                                        <a data-toggle="tooltip" data-placement="top" title="<?= $contatosValue->nome ?>" data-original-title="Tooltip" href="javascript:void(0);">
                                                                            <img  src="<?= base_url('assets/candidato/foto_candidato/'); ?><?= $contatosValue->foto_candidato ?>" class="img-fluid rounded-circle" alt="...">
                                                                        </a>

                                                                    </div>
                                                                    <?php endforeach; ?>
                                                                </div>
                                                            </div>
                                                        </div>
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



        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })

                        </script>

                        <!-- Begin Vendor Js -->
                        <script src="<?= base_url('assets2/vendors/js/base/jquery.min.js'); ?> "></script>
                        <script src="<?= base_url('assets2/vendors/js/base/core.min.js'); ?>"></script>
                        <!-- End Vendor Js -->
                        <!-- Begin Page Vendor Js -->
                        <script src="<?= base_url('assets2/vendors/js/nicescroll/nicescroll.min.js'); ?>"></script>
                        <script src="<?= base_url('assets2/vendors/js/app/app.min.js'); ?>"></script>
                        <!-- End Page Vendor Js -->



                </div>
            </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>




</body>

</html>

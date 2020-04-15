<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Connection</title>
  <!-- Favicon -->

  <link rel="shortcut icon" type="image/icon" href="<?= base_url('assets/images/Logo2.png'); ?>" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>
  <link href="<?= base_url('assets/css/font-awesome.css'); ?>" rel="stylesheet">
  <!-- Bootstrap -->
  <link href="<?= base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet">
  <!-- Slick slider -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/slick.css'); ?>" />
  <!-- Fancybox slider -->
  <link rel="stylesheet" href="<?= base_url('assets/css/jquery.fancybox.css'); ?>" type="text/css" media="screen" />
  <!-- Animate css -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/animate.css'); ?>" />
  <!-- Bootstrap progressbar  -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap-progressbar-3.3.4.css'); ?>" />
  <!-- Theme color -->
  <link id="switcher" href="<?= base_url('assets/css/theme-color/default-theme.css'); ?>" rel="stylesheet">

  <!-- Main Style -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css'); ?>" />

  <!-- Fonts -->
  <script src="<?= base_url('assets/empresa/Buscapaginacao/assets/js/jquery-1.11.3.min.js "'); ?>" type="text/javascript">
  </script>
  <script src="<?= base_url('assets/empresa/Buscapaginacao/assets/js/jquery-1.11.3.min.js"'); ?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/empresa/Buscapaginacao/assets/js/jquery-ui-1.10.2.custom.min.js"'); ?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/empresa/Buscapaginacao/assets/js/filter.js"'); ?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/empresa/Buscapaginacao/assets/js/pagination_vagas.js"'); ?>" type="text/javascript"></script>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/crud/bulma.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/crud/animate.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/crud/font-awesome.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/crud/style.css') ?>">
  <script src="<?php echo base_url('assets/js/crud/vue.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/crud/axios.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/crud/jquery.min.js') ?>"></script>
  <script type="text/javascript">
    window.movies = <?php echo html_entity_decode(json_encode($candidatos, JSON_NUMERIC_CHECK)); ?>;
  </script>


  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <!-- Lato for Title -->
  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>



  <script>
    var vid = document.getElementByName("media");
    vid.autoplay = false;
    vid.load();
  </script>


  <?php

  $iphone = strpos($_SERVER['HTTP_USER_AGENT'], "iPhone");
  $ipad = strpos($_SERVER['HTTP_USER_AGENT'], "iPad");
  $android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
  $palmpre = strpos($_SERVER['HTTP_USER_AGENT'], "webOS");
  $berry = strpos($_SERVER['HTTP_USER_AGENT'], "BlackBerry");
  $ipod = strpos($_SERVER['HTTP_USER_AGENT'], "iPod");
  $symbian = strpos($_SERVER['HTTP_USER_AGENT'], "Symbian");
  $windowsphone = strpos($_SERVER['HTTP_USER_AGENT'], "Windows Phone");

  if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian || $windowsphone == true) {
    $dispositivo = "mobile";
  } else {
    $dispositivo = "computador";
  }

  ?>
</head>

<body>

  <!-- BEGAIN PRELOADER -->
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
  <!-- END PRELOADER -->

  <!-- SCROLL TOP BUTTON -->
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start header -->
  <header id="header">
    <!-- header top search -->
    <div class="header-top">
      <div class="container">
        <form action="">
          <div id="search">
            <input type="text" placeholder="Type your search keyword here and hit Enter..." name="s" id="m_search" style="display: inline-block;">
            <button type="submit">
              <i class="fa fa-search"></i>
            </button>
          </div>
        </form>
      </div>
    </div>
    <!-- header bottom -->
    <div class="header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="header-contact">
              <ul>
                <li>
                  <div class="phone">
                    <i class="fa fa-phone"></i>
                    <?= $dados[0]->telefone; ?>
                  </div>
                </li>
                <li>
                  <div class="mail">
                    <i class="fa fa-envelope"></i>
                    <?= $dados[0]->email; ?>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6" id="informacoespessoais">
            <transition enter-active-class="animated fadeInLeft" leave-active-class="animated fadeOutRight">
              <div class="notification is-success text-center px-5 top-middle" v-if="successMSGInfo" @click="successMSGInfo= false">{{successMSGInfo}}</div>
            </transition>
            <div class="header-login" v-for="crud in candidato">
              <a class="login modal-form" @click="editModal = true; selectbiodata(crud)">Editar Dados</a>
            </div>
            <?php include 'candidato/modalInfo.php'; ?>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End header -->


  <!-- Start login modal window -->
  <div aria-hidden="false" role="dialog" tabindex="-1" id="abriModal" class="modal leread-modal fade in">
    <div class="modal-dialog">

      <!-- Start login section -->
      <div id="quemsou" class="modal-content">
        <div class="modal-header">
          <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title">Quem Sou</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="<?= base_url('candidato/login/aceito'); ?>">
            <div class="form-group">
              <p><textarea rows="10" cols="35" type="text" name="quemsou" value="<?= $dados[0]->quemsou; ?>"> <?= $dados[0]->quemsou; ?></textarea></p>
            </div>
            <input type="hidden" name="quemsou" value="<?= $dados[0]->quemsou; ?>" required>
            <div class="loginbox">
              <button class="btn signin-btn" type="submit">Confirmar</button>
            </div>
          </form>
        </div>
      </div>
      <!-- End login section -->

    </div>
  </div>


  <!-- BEGIN MENU -->
  <section id="menu-area">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO -->
          <!-- TEXT BASED LOGO -->
          <a class="navbar-brand"> <?= $dados[0]->nome; ?></a>
          <!-- IMG BASED LOGO  -->
          <!-- <a class="navbar-brand" href="index.html"><img src="assets/images/logo.png" alt="logo"></a> -->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <script>
            localStorage.setItem('idCandidato', <?= $dados[0]->id_candidato; ?>);
          </script>
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <li><a href="<?= base_url('candidato/login/aceito/'); ?>">Home</a></li>
            <li><a href="<?= base_url('candidato/login/aceito/empresasCA'); ?>">Empresas</a></li>
            <li><a href="<?= base_url('candidato/login/aceito/meu_curriculum'); ?>">Meu Curriculum</a></li>
            <li><a href="<?= base_url('candidato/login/aceito/vagas'); ?>">Vagas</a></li>

            <li><a href="<?= base_url('conference/watch/reuniao'); ?>">Entrevistas</a></li>
            <li><a href="<?= base_url('candidato/login/aceito/connectionAcademic'); ?>">Academy</a></li>
            <li><a href="<?= base_url('candidato/login/sair'); ?>">Sair</a></li>
          </ul>
        </div>
        <!--/.nav-collapse -->
        <!-- search icon -->

      </div>
    </nav>
  </section>
  <!-- END MENU -->


  <!-- Start blog archive -->
  <section id="blog-archive">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="blog-archive-area">
            <div class="row">
              <div class="col-md-4 hidden-sm hidden-xs">
                <aside class="blog-side-bar">
                  <!-- Start sidebar widget -->
                  <div class="sidebar-widget">
                    <h4 class="widget-title"> Vídeo-Curriculum</h4>
                    <iframe src="https://player.vimeo.com/video/<?= $dados[0]->video_nome; ?>" width="320" height="240" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    <?= $dados[0]->nome; ?>
                  </div>
                  <!-- Start sidebar widget -->
                  <div class="sidebar-widget">
                    <h4 class="widget-title">Cursos Feitos</h4>
                    <ul class="widget-catg">
                      <?php foreach ($habilidade as $habilidade_) { ?>
                        <div class="progress">
                          <div class="progress-bar six-sec-ease-in-out" role="progressbar" data-transitiongoal="<?= $habilidade_->porcentagem ?>">
                            <span class="progress-title">
                              <p><?= $habilidade_->titulo ?></p>
                            </span>
                          </div>
                        </div>
                      <?php } ?>
                    </ul>
                  </div>
                  <!-- Start sidebar widget -->
                  <div class="sidebar-widget">
                    <h4 class="widget-title">Quem é <?= $dados[0]->nome; ?><a style="margin-left: 10px" class="login modal-form" data-target="#abriModal" data-toggle="modal"> <img src="https://img.icons8.com/ios/20/000000/multi-edit.png"></a></h4>
                    <p><?= $dados[0]->quemsou; ?></p>
                  </div>

                  <!-- Start sidebar widget -->
                  <div class="sidebar-widget">
                    <h4 class="widget-title">Links Impostantes</h4>
                    <ul>
                      <li><a href="#">Facebook</a></li>
                      <li><a href="#">Instagram</a></li>
                      <li><a href="#">twitter</a></li>
                      <li><a href="#">linkedin</a></li>
                    </ul>
                  </div>
                </aside>
              </div>
              <div class="col-md-8">
                <div class="blog-archive-left">
                  <div class="col-md-4 visible-sm visible-xs">
                    <div class="sidebar-widget">
                      <!--  <?php if ((substr($dados[0]->video_nome, -3) == 'mp4') && ($_GET['mobile'] == "mobile")) : ?>
                     <embed src="<?= base_url('assets/candidato/video_editado/'); ?><?= $dados[0]->video_nome; ?>" autostart="1" height="30" width="144" />
                  	   <iframe src="<?= base_url('assets/candidato/video_editado/'); ?><?= $dados[0]->video_nome; ?>" autoplay="1" width="320" height="240" webkitallowfullscreen mozallowfullscreen
                            allowfullscreen></iframe>
                          <?php else : ?>
                          <iframe src="https://player.vimeo.com/video/<?= $dados[0]->video_nome ?>" width="320" height="240" webkitallowfullscreen mozallowfullscreen
                            allowfullscreen></iframe>
                          <?php endif; ?>   -->
                    </div>
                  </div>
                </div>
                <div class="blog-news-details blog-single-details">
                  <!-- se a pagina solicitada for vagas -->
                  <?php
                  if ($this->uri->segment(4) == 'meu_perfil' or !$this->uri->segment(4)) : $this->load->view('candidato/meu_perfil');
                  endif;
                  ?>
                  <!-- se a pagina solicitada for visitas -->
                  <?php
                  if ($this->uri->segment(4) == 'visitas') : $this->load->view('candidato/visitas');
                  endif;
                  ?>
                  <!-- se a pagina solicitada for recomendações -->
                  <?php
                  if ($this->uri->segment(4) == 'recomendacoes') : $this->load->view('candidato/recomendacoes');
                  endif;
                  ?>
                  <!-- se a pagina solicitada for meu curriculum -->
                  <?php
                  if ($this->uri->segment(4) == 'meu_curriculum') : $this->load->view('candidato/meu_perfil');
                  endif;
                  ?>
                  <!-- se a pagina solicitada for meu perfil -->
                  <?php
                  if ($this->uri->segment(4) == 'vagas') : $this->load->view('candidato/vagas');
                  endif;
                  ?>

                  <?php
                  if ($this->uri->segment(4) == 'edicao') : $this->load->view('candidato/edicao');
                  endif;
                  ?>
                  <?php
                  if ($this->uri->segment(4) == 'empresasCA') : $this->load->view('candidato/empresasCA');
                  endif;
                  ?>

                  <?php
                  if ($this->uri->segment(4) == 'contato') : $this->load->view('candidato/contato');
                  endif;
                  ?>

                </div>
                </article>
                <!-- Start blog navigation -->
                <div class="blog-navigation-area">

                </div>
                <!-- Start Comment box -->

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    </div>
  </section>

  <?php if (($this->uri->segment(4) == 'meu_perfil') or !$this->uri->segment(4)) : { ?>


      <section id="portfolio" style="padding: 0px 0;">
        <div class="portfolio-area">
          <!-- portfolio menu -->
          <div class="portfolio-menu">
            <ul>
              <h1> Portfólio</h1>

          </div>
          <!-- Portfolio container -->
          <div id="mixit-container" class="portfolio-container">
            <?php foreach ($portfolio as $portfolio_) { ?>
              <div class="single-portfolio mix branding">
                <div class="single-item">
                  <img src="<?= base_url('assets/candidato/portfolio/'); ?><?= $portfolio_->foto ?>" alt="img">
                  <div class="single-item-content">
                    <a class="fancybox view-icon" data-fancybox-group="gallery" href="<?= base_url('assets/candidato/portfolio/'); ?><?= $portfolio_->foto ?>"><i class="fa fa-search-plus"></i></a>
                    <div class="portfolio-title">
                      <p><?= $portfolio_->titulo ?></p>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </section>


  <?php }
  endif; ?>


  <!-- Start footer -->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <div class="footer-left">
            <p>2019 <a href="#/">Connection</a></p>
          </div>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="footer-right">
            <a href="#"><img src="https://img.icons8.com/dusk/30/000000/facebook.png"></a>
            <a href="#"><img src="https://img.icons8.com/dusk/30/000000/twitter.png"></a>
            <a href="#"><img src="https://img.icons8.com/dusk/30/000000/instagram-new.png"></a>
            <a href="#"><img src="https://img.icons8.com/dusk/30/000000/linkedin.png"></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- End footer -->



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <!-- Bootstrap -->
  <script src="<?= base_url('assets/js/bootstrap.js'); ?>"></script>
  <!-- Slick Slider -->
  <script type="text/javascript" src="<?= base_url('assets/js/slick.js'); ?>"></script>
  <!-- mixit slider -->
  <script type="text/javascript" src="<?= base_url('assets/js/jquery.mixitup.js'); ?>"></script>
  <!-- Add fancyBox -->
  <script type="text/javascript" src="<?= base_url('assets/js/jquery.fancybox.pack.js'); ?>"></script>
  <!-- counter -->
  <script src="<?= base_url('assets/js/waypoints.js'); ?>"></script>
  <script src="<?= base_url('assets/js/jquery.counterup.js'); ?>"></script>
  <!-- Wow animation -->
  <script type="text/javascript" src="<?= base_url('assets/js/wow.js'); ?>"></script>
  <!-- progress bar   -->
  <script type="text/javascript" src="<?= base_url('assets/js/bootstrap-progressbar.js'); ?>"></script>

  <script src="<?php echo base_url('assets/js/crud/pagination.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/crud/edita_info.js'); ?>"></script>
  <!-- Custom js -->
  <script type="text/javascript" src="<?= base_url('assets/js/custom.js'); ?>"></script>

</body>

</html>
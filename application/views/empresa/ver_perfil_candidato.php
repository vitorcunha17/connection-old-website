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
  <script src="<?= base_url('assets/empresa/Buscapaginacao/assets/js/jquery-ui-1.10.2.custom.min.js" '); ?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/empresa/Buscapaginacao/assets/js/filter.js "'); ?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/empresa/Buscapaginacao/assets/js/pagination.js" '); ?>" type="text/javascript"></script>
  <script type="text/javascript">
    window.movies = <?php echo html_entity_decode(json_encode($candidatos, JSON_NUMERIC_CHECK)); ?>;
  </script>

  <!-- Open Sans for body font -->
  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <!-- Lato for Title -->
  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <style>
    #mapa {
      height: 180px;
      width: 1349px;

    }


    #floating-panel {
      position: absolute;


      z-index: 5;
      background-color: #fff;
      padding: 5px;
      border: 1px solid #999;
      text-align: center;
      font-family: 'Roboto', 'sans-serif';
      line-height: 30px;
      padding-left: 10px;
    }
  </style>




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
          <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="header-login">
              <a class="login modal-form" href="<?= base_url('empresa/login/logado'); ?>">Voltar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End header -->



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
          <a class="navbar-brand" href="index.html"> <?= $dados[0]->nome; ?></a>
          <!-- IMG BASED LOGO  -->
          <!-- <a class="navbar-brand" href="index.html"><img src="assets/images/logo.png" alt="logo"></a> -->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <script>
            localStorage.setItem('idCandidato', <?= $dados[0]->id_candidato; ?>);
          </script>
          <script>
            localStorage.setItem('idEmpresa', )
          </script>
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <li><a href="<?= base_url('empresa/login/logado'); ?>"">Voltar</a></li>
            <li><a href=" <?= base_url('empresa/login/logado_inicial/curriculum_recebido'); ?>">Curriculum Recebidos</a></li>
            <li><a href="<?= base_url('empresa/login/logado_inicial/cadastra_vaga'); ?>">Cadastrar Vaga</a></li>
            <li><a href="<?= base_url('empresa/login/logado_inicial/planos'); ?>">Planos</a></li>
            <li><a href="<?= base_url('empresa/login/logado'); ?>">Compartilhamentos</a></li>
            <li class="dropdown active">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">RH <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?= base_url('empresa/login/logado_inicial/compras_aprovadas'); ?>">Candidatos Contratados</a></li>
                <li><a href="<?= base_url('empresa/login/logado_inicial/mensagens'); ?>">Novas Mensaens</a></li>
                <li><a href="<?= base_url('empresa/login/logado_inicial/pedidos'); ?>">Meus Pedidos</a></li>
              </ul>
            </li>
            <li><a href="<?= base_url('empresa/login/logado'); ?>">Candidatos</a></li>
            <li><a href="<?= base_url('empresa/login/logado_inicial/contato'); ?>">Contato</a></li>
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
                  <div class="sidebar-widget">
                    <h4 class="widget-title"> Vídeo-Curriculum </h4>
                    <a style="border-color: #242869; background-color: #242869; color: #fff;" class="btn signin-btn" href="<?= base_url('empresa/login/logado'); ?>">Compartilhar Vídeo</a>
                    <br><br>
                    <iframe src="https://player.vimeo.com/video/<?= $dados[0]->video_nome ?>" width="320" height="240" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                  </div>
                  <div class="sidebar-widget">
                    <h4 class="widget-title">Cursos - Status de Conclusão</h4>
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
                  <div class="sidebar-widget">
                    <h4 class="widget-title">Quem é <?= $dados[0]->nome; ?></h4>
                    <p><?= $dados[0]->quemsou; ?></p>
                  </div>
                  <div class="sidebar-widget">
                    <h4 class="widget-title">Anotações Sobre Candidato</h4>
                    <ul class="widget-catg">
                      <?php foreach ($habilidade as $habilidade_) { ?>
                      <span>
                        <p><?= $habilidade_->titulo ?></p>
                      </span>
                      <?php } ?>
                    </ul>
                  </div>
                  <div class="sidebar-widget">
                    <h4 class="widget-title">Links Importantes</h4>
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
                  <!-- Start blog news single -->
                  <article class="blog-news-single">

                    <div class="blog-news-title">
                      <h2>Curriculum Vitae</h2>
                      <p>By <a class="blog-author" href="#"><?= $dados[0]->nome; ?></a> <span class="blog-date">|Informaçoes enviadas pelo candidato.</span></p>
                    </div>
                    <div class="blog-news-details blog-single-details">


                      <p>Expertises: </p>
                      <blockquote>
                        <?php foreach ($pontoForte as $pontoForte_) { ?>
                        <h4> <?= $pontoForte_->conteudo ?></h4>

                        <?php } ?>
                        <hr style="border-top: 1px solid #f77c21;">
                      </blockquote>


                      <p>Cursos: </p>
                      <blockquote>
                        <?php foreach ($habilidade as $habilidade_) { ?>
                        <h4> <?= $habilidade_->titulo ?></h4>

                        <?php } ?>
                        <hr style="border-top: 1px solid #f77c21;">
                      </blockquote>


                      <p>Experiencia Profissional: </p>
                      <blockquote>
                        <?php foreach ($experiencia as $experiencia_) { ?>
                        <small> <?= $experiencia_->dataReferencia ?></small>
                        <h3> <?= $experiencia_->titulo ?></h3>
                        <h4> <?= $experiencia_->empresa ?></h4>
                        <p> <?= $experiencia_->cidadeEstado ?></p>

                        <?php } ?>
                        <hr style="border-top: 1px solid #f77c21;">
                      </blockquote>

                      <p>Educaçao: </p>
                      <blockquote>
                        <?php foreach ($educacao as $educacao_) { ?>
                        <small> <?= $educacao_->dataReferencia ?></small>
                        <h3> <?= $educacao_->curso2 ?></h3>
                        <h4> <?= $educacao_->instituicao ?></h4>
                        <p> <?= $educacao_->cidadeEstado2 ?></p>

                        <?php } ?>
                        <hr style="border-top: 1px solid #f77c21;">
                      </blockquote>

                      <p>Lista de Interesses: </p>
                      <blockquote>
                        <?php foreach ($interesses as $interesse) { ?>
                        <small> <?= $interesse->titulo ?></small>
                        <h4> <?= $interesse->conteudo ?></h4>

                        <?php } ?>
                        <hr style="border-top: 1px solid #f77c21;">
                      </blockquote>


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
    </div>
  </section>
  <section id="portfolio">
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
      <div class="comments-box-area">
        <h2>Enviar Mensagem</h2>
        <p>Gostaria de marcar uma entrevista ou pedir mais informaçoes?</p>
        <form action="" class="comments-form" style="width: 700px;">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Seu nome">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" placeholder="Email">
          </div>
          <div class="form-group">
            <textarea placeholder="Mensagem" rows="3" class="form-control"></textarea>
          </div>
          <button class="comment-btn">Enviar Mensagem</button>
        </form>
      </div>
    </div>

  </section>



  <!-- Start footer -->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <div class="footer-left">
            <p>2019 <a href="#">Connection</a></p>
          </div>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="footer-right">
            <a href="#"><img src="https://img.icons8.com/dusk/30/000000/facebook.png"></a>
            <a href="#"><img src="https://img.icons8.com/dusk/30/000000/twitter.png"></a>
            <a href="#"><img src="https://img.icons8.com/dusk/64/000000/instagram-new.png"></a>
            <a href="#"><img src="https://img.icons8.com/dusk/64/000000/linkedin.png"></a>
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


  <!-- Custom js -->
  <script type="text/javascript" src="<?= base_url('assets/js/custom.js'); ?>"></script>

</body>

</html>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-145081021-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-145081021-1');
  </script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Connection</title>

  <!-- Font Awesome -->
  <link href="<?= base_url('assets/fontawesome/css/fontawesome.css'); ?>" rel="stylesheet">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>
  <link href="<?= base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/font-awesome.css'); ?>">
  <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url('assets/empresa/Buscapaginacao/recursos2/css/font-awesome.min.css"'); ?>">

  <!-- Slick slider -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/slick.css'); ?>" />
  <!-- Fancybox slider -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/jquery.fancybox.css'); ?>" media="screen" />
  <!-- Animate css -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/animate.css'); ?>" />
  <!-- Progress bar  -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap-progressbar-3.3.4.css'); ?>" />
  <!-- Theme color -->
  <!--<link id="switcher" href="<?= base_url('assets/css/theme-color/default-theme.css'); ?>" rel="stylesheet">-->
  <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">
  <link rel="shortcut icon" type="image/icon" href="assets/images/Logo2.png" />
  <!-- Main Style -->
  <!--<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/styles-principal.css'); ?>" />-->
  <link rel="stylesheet" type="text/css" href="assets/css/styles-principal.css" />

  <!-- Fonts -->

  <!-- Open Sans for body font -->
  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>


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

  <!-- Start login modal window -->
  <div aria-hidden="false" role="dialog" tabindex="-1" id="login-form" class="modal leread-modal fade in">
    <div class="modal-dialog">
      <!-- Start login section -->
      <div id="login-content" class="modal-content">
        <div class="modal-header">
          <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title"><i class="fa fa-unlock-alt"></i>Login</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="<?= base_url('acesso/acessoUsuario/logar'); ?>">
            <div class="form-group">
              <input type="text" name="email" placeholder="Digite seu email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="senha" placeholder="Sua senha" class="form-control">
            </div>
            <div class="loginbox">
              <label><input type="checkbox"><span>Lembrar-me</span></label>
              <button class="btn signin-btn" type="submit" name="" value="Logar" type="button">Entrar</button>
              <button class="btn signin-btn" type="submit" name="" id="signup-btn" type="button" style="margin-left: 20%">Cadastre-se Agora</button>
            </div>
          </form>
        </div>
        <div class="modal-footer footer-box">
          <a href="#">Esqueceu a Senha?</a>
          <span>Nao tem conta <a id="signup-btn" href="#">Cadastro</a></span>
        </div>
      </div>
      <!-- End login section -->

      <!-- Start Modal Candidato -->
      <div id="signup-content" class="modal-content">
        <div class="modal-header">
          <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
          Sou <button class="btn signin-btn" style="background-color: #a0e4a0" type="submit" value="Logar" type="button"> Candidato</button>
          Sou <button class="btn signin-btn" name="" id="signup-btn22" value="Logar" type="button">Empresa</button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?= base_url('acesso/acessoUsuario/valida_cadastro') ?>" class="formualrio_candidato formulario">
            <div class="form-group">
              <input type="email" name="email" placeholder="Informe seu e-mail" class="form-control">
            </div>
            <div class="form-group">
              <input type="date" required name="nascimento" class="form-control">
            </div>
            <div class="form-group">
              <select class="form-control" name="sexo">
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
              </select>
            </div>
            <div class="form-group">
              <input type="password" required name="senha" placeholder="Informe seu Password" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" required name="repitaSenha" placeholder="Confirmar Password" class="form-control">
            </div>
            <div class="signupbox">
              <span>Já tem uma conta? <a id="login-btn" href="#">Login</a></span>
            </div>
            <div class="loginbox">
              <label><input type="checkbox" name="" class="checkTermos termosCA"><span>Aceito os <a id="signup-btn4" href="#">termos</a></span><i class="fa"></i></label>
              <button class="btn signin-btn" id="enviar" type="submit" type="button">Confirmar Cadastro</button>
            </div>
            <input type="hidden" name="tipo" value="candidato">
          </form>
        </div>
      </div>
      <!-- End Modal Candidato -->

      <!-- Start Modal Empresa -->
      <div id="signup-content2" class="modal-content" style="display: none">
        <div class="modal-header">
          <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
          Sou <button class="btn signin-btn" type="submit" id="signup-btn31" value="Logar" type="button"> Candidato</button>
          Sou <button class="btn signin-btn" style="background-color: #a0e4a0" name="" value="Logar" type="button">Empresa</button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?= base_url('acesso/acessoUsuario/valida_cadastro') ?>" class="formualrio_candidato formulario">
            <div class="form-group">
              <input type="email" name="email" placeholder="Informe seu e-mail" class="form-control">
            </div>
            <input type="hidden" name="empresa" value="x" class="form-control">
            <input type="hidden" name="cnpj" value="y" class="form-control">
            <div class="form-group">
              <input type="password" required name="senha" placeholder="Informe seu Password" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" required name="repitaSenha" placeholder="Confirmar Password" class="form-control">
            </div>
            <div class="signupbox">
              <span>Já tem uma conta? <a id="login-btn2" href="#">Fazer Login</a></span>
            </div>
            <div class="loginbox">
              <label><input type="checkbox" name="" class="checkTermos termosEM"><span>Aceito os <a id="signup-btn3" href="#">termos</a></span><i class="fa"></i></label>
              <button class="btn signin-btn" id="enviarEmpresa" type="submit" type="button">Confirmar Cadastro</button>
            </div>
            <input type="hidden" name="tipo" value="empresa">
          </form>
        </div>
      </div>
      <!-- End Modal Empresa-->

      <!-- Start Modal Termos p/  EMPRESA -->
      <div id="signup-content3" class="modal-content" style="display: none">
        <div class="modal-header">
          <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
          Termos de Uso para Empresa
        </div>
        <div class="modal-body">
          <form method="post" action="<?= base_url('acesso/acessoUsuario/valida_cadastro') ?>" class="formualrio_candidato formulario">
            <div style="overflow:scroll; height:400px;">
              Nossa missão é proporcionar às pessoas o poder de criar comunidades e aproximar o mundo. Para ajudar a promover essa missão, fornecemos os Produtos e serviços descritos abaixo para você:
              Fornecer uma experiência personalizada para você:
              sua experiência no Facebook não se compara à de mais ninguém  desde publicações, histórias, eventos, anúncios e outro conteúdo que você vê no Feed de Notícias ou em nossa plataforma de vídeo até as Páginas que você segue e outros recursos que pode usar, como a seção Em alta, o Marketplace e a Pesquisa. Usamos os dados que temos (por exemplo, sobre as conexões que você faz, as escolhas e configurações que seleciona e o que compartilha e faz dentro e fora de nossos Produtos) para personalizar sua experiência.
              Conectar você com as pessoas e organizações com as quais se importa:
              ajudamos você a encontrar e se conectar com pessoas, grupos, empresas, organizações e outras entidades de seu interesse nos Produtos do Facebook que você usa. Usamos os dados que temos para fazer sugestões para você e para outras pessoas, por exemplo, grupos dos quais participar, eventos para comparecer, Páginas para seguir ou enviar uma mensagem, programas para assistir e pessoas que você talvez queira ter como amigas. Laços mais fortes ajudam a criar comunidades melhores, e acreditamos que nossos serviços são mais úteis quando as pessoas estão conectadas a pessoas, grupos e organizações com os quais se importam.
              Permitir que você se expresse e fale sobre o que é importante para você:
              há muitas maneiras de se expressar no Facebook e de conversar com amigos, familiares e outras pessoas sobre o que é importante para você. Por exemplo, é possível compartilhar atualizações de status, fotos, vídeos e histórias nos Produtos do Facebook que você usa, enviar mensagens a um amigo ou a diversas pessoas, criar eventos ou grupos, ou adicionar conteúdo a seu perfil. Também desenvolvemos e continuamos explorando novas formas de uso da tecnologia, como realidade aumentada e vídeo 360, para que as pessoas possam criar e compartilhar conteúdo mais expressivo e envolvente no Facebook.
              Ajudar você a descobrir conteúdo, produtos e serviços que possam ser de seu interesse:
              exibimos para você anúncios, ofertas e outros conteúdos patrocinados para ajudá-lo a descobrir conteúdo, produtos e serviços que são oferecidos pelas várias empresas e organizações que usam o Facebook e outros Produtos do Facebook. Nossos parceiros nos pagam para mostrar o conteúdo deles para você, e nós projetamos nossos serviços de modo que o conteúdo patrocinado que você vê seja tão relevante e útil quanto tudo o que vê em nossos Produtos.
            </div>
            <div class="loginbox">
              <button class="btn signin-btn" id="btn-empresa" type="button">Voltar</button>
            </div>
            <input type="hidden" name="tipo" value="empresa">
          </form>
        </div>
      </div>
      <!-- End Modal Termos p/ EMPRESA-->

      <!-- Start Modal Termos p/  CANDIDATO -->
      <div id="signup-content4" class="modal-content" style="display: none">
        <div class="modal-header">
          <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
          Termos de Uso para Candidatos
        </div>
        <div class="modal-body">
          <form method="post" action="<?= base_url('acesso/acessoUsuario/valida_cadastro') ?>" class="formualrio_candidato formulario">
            <div style="overflow:scroll; height:400px;">
              Nossa missão é proporcionar às pessoas o poder de criar comunidades e aproximar o mundo. Para ajudar a promover essa missão, fornecemos os Produtos e serviços descritos abaixo para você:
              Fornecer uma experiência personalizada para você:
              sua experiência no Facebook não se compara à de mais ninguém  desde publicações, histórias, eventos, anúncios e outro conteúdo que você vê no Feed de Notícias ou em nossa plataforma de vídeo até as Páginas que você segue e outros recursos que pode usar, como a seção Em alta, o Marketplace e a Pesquisa. Usamos os dados que temos (por exemplo, sobre as conexões que você faz, as escolhas e configurações que seleciona e o que compartilha e faz dentro e fora de nossos Produtos) para personalizar sua experiência.
              Conectar você com as pessoas e organizações com as quais se importa:
              ajudamos você a encontrar e se conectar com pessoas, grupos, empresas, organizações e outras entidades de seu interesse nos Produtos do Facebook que você usa. Usamos os dados que temos para fazer sugestões para você e para outras pessoas, por exemplo, grupos dos quais participar, eventos para comparecer, Páginas para seguir ou enviar uma mensagem, programas para assistir e pessoas que você talvez queira ter como amigas. Laços mais fortes ajudam a criar comunidades melhores, e acreditamos que nossos serviços são mais úteis quando as pessoas estão conectadas a pessoas, grupos e organizações com os quais se importam.
              Permitir que você se expresse e fale sobre o que é importante para você:
              há muitas maneiras de se expressar no Facebook e de conversar com amigos, familiares e outras pessoas sobre o que é importante para você. Por exemplo, é possível compartilhar atualizações de status, fotos, vídeos e histórias nos Produtos do Facebook que você usa, enviar mensagens a um amigo ou a diversas pessoas, criar eventos ou grupos, ou adicionar conteúdo a seu perfil. Também desenvolvemos e continuamos explorando novas formas de uso da tecnologia, como realidade aumentada e vídeo 360, para que as pessoas possam criar e compartilhar conteúdo mais expressivo e envolvente no Facebook.
              Ajudar você a descobrir conteúdo, produtos e serviços que possam ser de seu interesse:
              exibimos para você anúncios, ofertas e outros conteúdos patrocinados para ajudá-lo a descobrir conteúdo, produtos e serviços que são oferecidos pelas várias empresas e organizações que usam o Facebook e outros Produtos do Facebook. Nossos parceiros nos pagam para mostrar o conteúdo deles para você, e nós projetamos nossos serviços de modo que o conteúdo patrocinado que você vê seja tão relevante e útil quanto tudo o que vê em nossos Produtos.
            </div>
            <div class="loginbox">
              <button class="btn signin-btn" id="btn-candidato" type="button">Voltar</button>
            </div>
            <input type="hidden" name="tipo" value="empresa">
          </form>
        </div>
      </div>
      <!-- End Modal Termos p/ CANDIDATO-->
    </div>
  </div>
  <!-- End login modal window -->

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
          <div>
            <a class="navbar-brand" href="index.php"><img style="margin-top: -12px; width: 168px;" src="<?= base_url('assets/images/logo-novo.png') ?>" align="left"></a>
          </div>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="#sobrenos">Sobre</a></li>
            <li><a data-target="#login-form" data-toggle="modal" href="#">Vagas e empresas aliadas</a></li>
            <li><a href="#contato">Contato</a></li>
            <li><a href="<?= base_url('academy') ?>">Academy</a></li>
            <li><a data-target="#login-form" data-toggle="modal" href="#" style="font-family: RedHatMedium;">Entrar</a></li>
            <li><a data-target="#login-form" class="button-novo-layout" data-toggle="modal" href="#" style="font-family: RedHatMedium;">Se cadastrar</a></li>
          </ul>
        </div>
        <!--/.nav-collapse -->
      </div>
    </nav>
  </section>
  <!-- END MENU -->

  <!-- Start slider -->
  <section id="slider">
    <div class="main-slider">
      <div class="single-slide">
        <img src="assets/images/slider1.png" alt="img">
        <div class="slide-content">
          <div class="container">
            <div class="row">
              <div class="col-md-6 col-sm-6">
                <div class="slide-article">
                  <h2 class="wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">Encontre empresas do mundo todo com um video currículo.</h2>
                  <p class="wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.75s">Nosso objetivo consiste em conectar empresas e candidatos por vídeo.</p>
                  <a class="read-more-btn wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s" data-target="#login-form" data-toggle="modal" href="#" style="font-family: RedHatMedium;">Se cadastre grátis</a>
                </div>
              </div>
              <div class="col-md-6 col-sm-6">
                <div class="slider-img wow fadeInUp">
                  <!-- Start Pricing table -->
                  <!-- <section id="pricing-table"  style="background-color: #f8f8f800;">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="pricing-table-content">
                          <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                              <div class="single-table-price wow fadeInUp" data-wow-duration="1.15s" data-wow-delay="1.15s">
                                <div class="price-header">
                                  <span class="price-title"></span>
                                  <div class="price">
                                    <sup class="price-up">Direto <br>R$</sup>
                                  8.500,00
                                    <span class="price-down">/a.m</span>
                                  </div>
                                </div>
                                <div class="price-article">
                                  <ul>
                                    <li>8h/dia</li>
                                    <li>Petrobrás</li>
                                  </ul>
                                </div>
                                <div class="price-footer">
                                  <a class="purchase-btn" href="#">Candidatar</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="single-slide">
        <img src="assets/images/slider1.png" alt="img">
        <div class="slide-content">
          <div class="container">
            <div class="row">
              <div class="col-md-6 col-sm-6">
                <div class="slide-article">
                  <h2 class="wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">Tecnologia em Recrutamento - RH 4.0</h2>
                  <p class="wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.75s">Para os candidatos mais e chances de ser contratado. Para as empresas maior agilidade, praticidade e economia de tempo e de recursos.</p>
                  <a class="read-more-btn wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s" data-target="#login-form" data-toggle="modal" href="#" style="font-family: RedHatMedium;">Se cadastre grátis</a>
                </div>
              </div>
              <div class="col-md-6 col-sm-6">
                <div class="slider-img wow fadeInUp">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End slider -->

  <!-- Start Feature -->
  <!--<section id="feature">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-area">
            <h2 class="title">Como Fazer?</h2>
            <span class="line"></span>
            <br><br><br>
            <img class="hidden-xs" src="<?= base_url('assets/images/celular.png') ?>" style="width: 434px" />
            <video class="video-celular hidden-xs" controls autoplay>
              <source src="<?= base_url('assets/video/celularvideo.mp4') ?>" type="video/mp4" />
            </video>
            <div class="video-mobile visible-xs">
              <center>
                <video class="video-celular-mobile visible-xs" controls autoplay>
                  <source src="<?= base_url('assets/video/celularvideo.mp4') ?>" type="video/mp4" />
                </video>
              </center>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>-->
  <!-- End Feature -->

  <!-- Start Feature -->
  <section id="feature" style="padding:1%;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div style="padding:45.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/363132835?autoplay=1&loop=1&title=0&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe></div>
          <script src="https://player.vimeo.com/api/player.js"></script>
        </div>
    </div>
  </div>
  </section>
  <!-- End Feature -->

  <!-- Start latest-news -->
  <section id="latest-news">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-area">
            <h2 class="title">Benefícios de ser Connection </h2>
            <span class="line"></span>
            <p>Aqui você pode promover o seu marketing pessoal, indexar o seu portofólio, enviar o seu vídeo-curriculum para grandes empresas e acessar cursos para aperfeiçoar seu perfil profissional. Está esperando o quê :) ? Venha ser Connection! Cadastre-se</p>
          </div>
        </div>
        <div class="col-md-12">
          <div class="feature-content">
            <div class="row">
              <div class="col-md-4 col-sm-6">
                <div class="single-feature wow zoomIn">
                  <i class="fa fa-leaf feature-icon"></i>
                  <h4 class="feat-title">Curriculum Diferenciado</h4>
                  <p>Por meio de Vídeo-Curriculum você pode expressar habilidades e competências que não são perceptíveis através do curriculum vitae tradicional. O Contato Audivisual é mais vantajoso no processo seletivo. </p>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="single-feature wow zoomIn">
                  <i class="fa fa-mobile feature-icon"></i>
                  <h4 class="feat-title">Plataforma Responsiva</h4>
                  <p>Acesse a nossa plataforma pelo seu smartphone, tablet ou qualquer outro dispositivo mobile e veja as possibilidades de contratações e de novas vagas na sua área. Tenha nossa plataforma completa em seu bolso :)</p>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="single-feature wow zoomIn">
                  <i class="fa fa-magic feature-icon"></i>
                  <h4 class="feat-title">Sistema de Recomendações</h4>
                  <p>Na Connection as empresas ao assistirem seu vídeo-curriculum podem recomendar o seu curriculum, isso colocará você um passo a frente no processo de recrutamento. Experimente esse recurso :) Entre para a Connection você também.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End latest-news -->

  <!-- Start slider -->
  <section class="new-slider">
    <div class="main-slider">
      <div class="single-slide">
        <img src="assets/images/Vantagens - Contratante.png" alt="img">
      </div>
      <div class="single-slide">
        <img src="assets/images/Vantagens.png" alt="img">
      </div>
      <div class="single-slide">
        <img src="assets/images/Vantagens - Contratado.png" alt="img">
      </div>
    </div>
  </section>
  <!-- End slider -->

  <!-- Start about  -->
  <!--<section id="about">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-area">
            <h2 class="title">Oportunidades</h2>
            <span class="line"></span>
            <p>Veja instituições e cursos mais requisitados pelas empresas na plataforma Connection. Além disso veja os nossos cursos com certificados que vão alavancar o seu perfil profissional.</p>
          </div>
        </div>
        <div class="col-md-12">
          <div class="about-content">
            <div class="row">
              <div class="col-md-12">
                <div class="our-skill">
                  <h3> Disponíveis</h3>
                  <div class="our-skill-content">
                  <p>Aqui consta a porcetagem de vagas disponíveis avaliadas na base de dados de mais 2 vagas cadastradas.</p>
                    <div class="progress">
                      <div class="progress-bar six-sec-ease-in-out" role="progressbar" data-transitiongoal="0">
                        <span class="progress-title">Administração</span>
                      </div>
                  </div>
                  <div class="progress">
                      <div class="progress-bar six-sec-ease-in-out" role="progressbar" data-transitiongoal="0">
                        <span class="progress-title">Engenharia</span>
                      </div>
                  </div>
                  <div class="progress">
                      <div class="progress-bar six-sec-ease-in-out" role="progressbar" data-transitiongoal="0">
                        <span class="progress-title">Direito</span>
                      </div>
                  </div>
                  <div class="progress">
                      <div class="progress-bar six-sec-ease-in-out" role="progressbar" data-transitiongoal="100">
                        <span class="progress-title">Tecnologia da Informação</span>
                      </div>
                  </div>
                  <div class="progress">
                      <div class="progress-bar six-sec-ease-in-out" role="progressbar" data-transitiongoal="0">
                        <span class="progress-title">Contabilidade</span>
                      </div>
                  </div>
                   <div class="progress">
                      <div class="progress-bar six-sec-ease-in-out" role="progressbar" data-transitiongoal="0">
                        <span class="progress-title">Jornalismo</span>
                      </div>
                  </div>
                  </div>
                </div>
              </div>
              <!--<div class="col-md-6">
                <div class="why-choose-us">
                  <h3>Candidatos Satisfeitos</h3>
                  <div class="panel-group why-choose-group" id="accordion">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            Raquel Melissa <span class="fa fa-minus-square"></span>
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                        <img class="why-choose-img" src="assets/images/testi2.jpg" alt="img">
                         <p> A Connection é a melhor plataforma de integração candidato-empresa, em pouco tempo foi possível perceber o quão enriquecedor é ter um vídeo-curriculum em um portal onde empresas sérias podem assisti-lo. Recebi várias propostas de emprego, as empresas acham interessante candidatos que não tem vergonha de se expor e falar de si em um vídeo. O processo mais humanizado e assim acredito que fico mais à vontade para falar das minhas habilidades e competências. Enfim, sempre indico o All Connection para os meus colegas desempregados.</p>
                        </div>
                      </div>
                    </div>
                    <div class="panel panel-default ">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            José Madalena <span class="fa fa-plus-square"></span>
                          </a>
                        </h4>
                      </div>
                      <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                         <p></p>
                        </div>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                           Luís Ngoma <span class="fa fa-plus-square"></span>
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                          <p></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>-->
  <!--</div>
          </div>
        </div>
      </div>
    </div>
  </section>-->
  <!-- end about -->

  <!-- Start counter -->
  <!--<section id="counter">
    <div class="counter-overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="counter-area">
              <div class="row">

                <div class="col-md-3 col-sm-6">
                  <div class="single-counter">
                    <div class="counter-icon">
                      <i class="fa fa-suitcase"></i>
                    </div>
                    <div class="counter-no counter">
                      20
                    </div>
                    <div class="counter-label">
                      Vagas Disponíveis
                    </div>
                  </div>
                </div>

                <div class="col-md-3 col-sm-6">
                  <div class="single-counter">
                    <div class="counter-icon">
                      <i class="fa fa-desktop"></i>
                    </div>
                    <div class="counter-no counter">
                      10
                    </div>
                    <div class="counter-label">
                      Empresas Cadastradas
                    </div>
                  </div>
                </div>

                <div class="col-md-3 col-sm-6">
                 <div class="single-counter">
                    <div class="counter-icon">
                      <i class="fa fa-trophy"></i>
                    </div>
                    <div class="counter-no counter">
                      80
                    </div>
                    <div class="counter-label">
                      Candidatos
                    </div>
                  </div>
                </div>

                <div class="col-md-3 col-sm-6">
                  <div class="single-counter">
                    <div class="counter-icon">
                      <i class="fa fa-users"></i>
                    </div>
                    <div class="counter-no counter">
                      0
                    </div>
                    <div class="counter-label">
                      Cursos
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>-->
  <!-- End counter -->

  <!-- Start Service -->
  <section id="service">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-area">
            <h2 class="title">Nossos Serviços</h2>
            <span class="line"></span>
            <p>Com atuação em três países, ofertamos diversos serviços na área de RH com soluções tecnológicas de ponta, confira abaixo nossos serviços.</p>
          </div>
        </div>
        <div class="col-md-12">
          <div class="service-content">
            <div class="row">
              <!-- Start single service -->
              <div class="col-md-4 col-sm-6">
                <div class="single-service wow zoomIn">
                  <i class="fa fa-desktop service-icon"></i>
                  <h4 class="service-title">RH Para Empresas</h4>
                  <p>Divulgue vagas e contrate por meio de um processo mais eficaz, nossa plataforma pode reduzir consideravelmente o tempo de contratação de um novo funcionário.</p>
                </div>
              </div>
              <!-- End single service -->
              <!-- Start single service -->
              <div class="col-md-4 col-sm-6">
                <div class="single-service wow zoomIn">
                  <i class="fa fa-trophy service-icon"></i>
                  <h4 class="service-title">Vínculo Empregatício</h4>
                  <p>Na Connection é possível fazer feedbacks dos candidatos contratados por meio da plataforma, isso pode agregar valor para o candidato e para a empresa.</p>
                </div>
              </div>
              <!-- End single service -->
              <!-- Start single service -->
              <div class="col-md-4 col-sm-6">
                <div class="single-service wow zoomIn">
                  <i class="fa fa-magic service-icon"></i>
                  <h4 class="service-title">Connection Academy</h4>
                  <p>Através da Connection é possível encontrar problemas reais de organizações privadas que podem servir de tema para o seu trabalho de conclusão de curso. </p>
                </div>
              </div>
              <!-- End single service -->
              <!-- Start single service -->
              <div class="col-md-4 col-sm-6">
                <div class="single-service wow zoomIn">
                  <i class="fa fa-shopping-cart service-icon"></i>
                  <h4 class="service-title">Curso de Exercício de Função</h4>
                  <p>Contrate um funcionário preparado para exercer um cargo com eficiência previamente confirmada. Envie o vídeos tutoriais e emitiremos um certificado de aptidão para os candidatos que o fizer.</p>
                </div>
              </div>
              <!-- End single service -->
              <!-- Start single service -->
              <div class="col-md-4 col-sm-6">
                <div class="single-service wow zoomIn">
                  <i class="fa fa-leaf service-icon"></i>
                  <h4 class="service-title">Logística Contratual</h4>
                  <p>Na Conncetion é possível encontrar os candidatos mais próximo da sua empresa por meio de uma interface amigável e prática. Os candidatos são marcados no mapa em seus respectivos endereços.</p>
                </div>
              </div>
              <!-- End single service -->
              <!-- Start single service -->
              <div class="col-md-4 col-sm-6">
                <div class="single-service wow zoomIn">
                  <i class="fa fa-rocket service-icon"></i>
                  <h4 class="service-title">Connection Global</h4>
                  <p>Contrate candidatos que estão no exterior fazendo intercâmbio por exemplo, nossa plataforma reune uma grande quantidade de candidatos que estão em outros países mas gostariam de regressar em razão de oportunidades de emprego.</p>
                </div>
              </div>
              <!-- End single service -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Service -->

  <!-- Start Feature -->
  <section id="latest-news">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-area" id="sobrenos">
            <h2 class="title">Sobre</h2>
            <span class="line"></span>
            <div style="text-align: left;">
              <p> Somos uma plataforma com uma metodologia inovadora no processo de recrutamento e seleção. Nosso objetivo consiste em conectar empresas e candidatos por um click. </p>
              <p> A connection automatizou o processo de recrutamento e seleção trazendo - o todo por completo para o digital desde da fase de triagem até as entrevistas. </p>
              <p> Os currículos são feitos em forma de vídeo. Ah, a propósito, você sabia que o tradicional curriculum vitae no papel está perdendo o seu espaço? As empresas estão adotando meios mais modernos e interativos de receber os perfis dos candidatos. Um desses meios é currículo em vídeo. </p>
              <br>
              <h4 style="font-weight: bold; color: #242869;">Vantagens para candidatos</h4>
              <p> Maior visibilidade: O currículo em vídeo expõe um lado seu que a folha de papel não permite. É mais do que um simples vídeo, é a marca pessoal do candidato. </p>
              <br>
              <h4 style="font-weight: bold; color: #242869;">Vantagens para empresas</h4>
              <p> Tempo e agilidade: Direcionamento inteligente de candidatos de forma rápida, simples e econômica. <br>
                Entrevistas por vídeo conferência, podendo entrevistar mais de um candidato ao mesmo tempo. </p>
              <br>
              <h4 style="font-weight: bold; color: #242869;">Missão e propósito</h4>
              <p> A nossa MISSÃO é tornar a prática de recrutamento e seleção um processo dinâmico, econômico interativa para as empresas e candidatos. <br>
                O nosso PROPÓSITO é tornar o processo de recrutamento e seleção mais humanizado, inclusivo e interativo. </p>
              <p> Experimente um novo jeito de realizar processos seletivos. </p>
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Feature -->

  <!-- Start Selection -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-area">
            <br><br><br>
            <h2 class="title">Quem acredita na Connectionrh?</h2>
            <span class="line"></span>
            <br><br>
            <!--<p>Quer fazer parte desse grupo de sucesso e trabalhar em uma grande multinacional? Então cadastre-se e aumente suas chances de chagar lá... Venha ser Connection. </p>-->
          </div>
        </div>

        <!-- Start Clients brand -->
        <section id="clients-brand">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="clients-brand-area">
                  <ul class="clients-brand-slide">
                    <li class="col-md-3">
                      <div>
                        <img src="<?= base_url('assets/images/copacol.png'); ?>" alt="img" style="margin: 0 auto; width: 230px; margin-top: -32px;">
                      </div>
                    </li>
                    <li class="col-md-3">
                      <div>
                        <img src="<?= base_url('assets/images/ms.png'); ?>" alt="img" style="margin: 0 auto; width: 230px; margin-top: 36px;">
                      </div>
                    </li>
                    <li class="col-md-3">
                      <div>
                        <img src="<?= base_url('assets/images/brado.jpg'); ?>" alt="img" style="margin: 0 auto; width: 230px;">
                      </div>
                    </li>
                    <li class="col-md-3">
                      <div>
                        <img src="<?= base_url('assets/images/marista.png'); ?>" alt="img" style="margin: 0 auto; width: 230px; margin-top: -26px;">
                      </div>
                    </li>
                    <li class="col-md-3">
                      <div>
                        <img src="<?= base_url('assets/images/ontheroad.jpeg'); ?>" alt="img" style="margin: 0 auto; width: 205px;">
                      </div>
                    </li>
                    <li class="col-md-3">
                      <div>
                        <img src="<?= base_url('assets/images/fazrh.png'); ?>" alt="img" style="margin: 0 auto; width: 230px; margin-top: 44px;">
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End Clients brand -->

      </div>
    </div>
  </section>
  <!-- End Selection -->

  <!-- Start academy bg  -->
  <section id="clients-brand">
    <div>
      <a href="<?= base_url('academy') ?>">
        <img class="zoom" src="assets/images/academy-fundo-letras.png" alt="Academy" style="width: 100%; cursor: pointer;">
      </a>
    </div>
    <div class="subscribe-area" style="margin-top: -31px;">
      <h4 class="wow fadeInUp">Cadastre seu e-mail e receba anúncios de vagas exclusivos.</h4>
      <br />
      <form action="" class="subscrib-form wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
        <input type="text" style="border: 1px solid #838282b0">
        <button class="subscribe-btn" type="submit" style="background-color: #242869">ENVIAR</button>
      </form>
    </div>
  </section>
  <!-- end academy bg -->

  <!-- Start subscribe us -->
  <!--<section id="subscribe">
    <div class="subscribe-overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="subscribe-area">
              <h2 class="wow fadeInUp">Deseja Receber Anúncio de vagas?</h2>
              <form action="" class="subscrib-form wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                <input type="text" placeholder="Cadastre seu e-mail e receba vagas.">
                <button class="subscribe-btn" type="submit">Enviar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>-->
  <!-- End subscribe us -->

  <!-- Start contato  -->
  <section id="latest-news">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-area" id="contato">
            <h2 class="title">Contato</h2>
            <span class="line"></span>
            <br><br>
            <p><i class="fa fa-envelope"></i> connectionrh@connection.com.br</p>
            <p><i class="fa fa-phone"></i> 41 9 8817-1275</p>
            <p>Termos de uso: <a href="https://drive.google.com/file/d/1sxiK9G1ziTXMXUp7qzPfRvN3AMTHtqM-/view?usp=sharing" target="_blank">Acesse aqui</a></p>
            <br>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contato -->

  <!-- Start footer -->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <div class="footer-left">
            <p>Connection<a href="#"></a> - Fale conosco</p>
          </div>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="footer-right">
            <a target="_blank" href="https://www.facebook.com/connection.startup/"><img src="https://img.icons8.com/dusk/30/000000/facebook.png"></a>
            <a target="_blank" href="https://www.instagram.com/connectionrh/"><img src="https://img.icons8.com/dusk/30/000000/instagram-new.png"></a>
            <a target="_blank" href="#"><img src="https://img.icons8.com/dusk/30/000000/twitter.png"></a>
            <a target="_blank" href="#"><img src="https://img.icons8.com/dusk/30/000000/linkedin.png"></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- End footer -->

  <!-- jQuery library -->
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
  <script type="text/javascript">
    var $senhaCA = document.querySelector(".senhaCA");
    var $repitaSenhaCA = document.querySelector(".repitaSenhaCA");
    var $senhaEM = document.querySelector(".senhaEM");
    var $repitaSenhaEM = document.querySelector(".repitaSenhaEM");
    var $botaoCA = document.querySelector(".cadastraCandidato");
    var $botaoEM = document.querySelector(".cadastraEmpresa");
    var $formCA = document.querySelector(".formualrio_candidato");
    var $formEM = document.querySelector(".formualrio_empresa");
    var $termosCA = document.querySelector(".termosCA");
    var $termosEM = document.querySelector(".termosEM");

    $botaoCA.addEventListener("click", function(evt) {

      if (($senhaCA.value == $repitaSenhaCA.value) && $senhaCA.value.length > 1) {
        if ($termosCA.checked == true) {
          $formCA.submit();
        } else {
          alert("Você precisa aceitar os termos de uso.akjdjkaskjd");
          evt.preventDefault();
        }
      } else {
        alert("Preencha as senhas corretamente!");
        evt.preventDefault();
      }
    })

    $botaoEM.addEventListener("click", function(evt) {

      if (($senhaEM.value == $repitaSenhaEM.value) && $senhaEM.value.length > 1) {
        if ($termosEM.checked == true) {
          $formEM.submit();
        } else {
          alert("Você precisa aceitar os termos de uso.");
          evt.preventDefault();
        }
      } else {
        alert("Preencha as senhas corretamente!");
        evt.preventDefault();
      }
    })
  </script>
  <script>
    $('.nav a[href^="#"]').on('click', function(e) {
      e.preventDefault();
      var id = $(this).attr('href'),
        targetOffset = $(id).offset().top;

      $('html, body').animate({
        scrollTop: targetOffset - 100
      }, 500);
    });
  </script>

</body>

</html>

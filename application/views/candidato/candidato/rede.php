<?php

define('HOST', getenv('DATA_DB_HOST'));
define('DB', 'gonano');
define('USER', 'root');
define('PASS', getenv('DATA_DB_ROOT_PASS'));

    class BD{
        private static $conn;

        public function __construct(){}

        public static function conn(){
            if(is_null(self::$conn)){
                self::$conn = new PDO('mysql:host='.HOST.';dbname='.DB.'', ''.USER.'', ''.PASS.'');
            }

            return self::$conn;
        }
    }

	BD::conn();

    $pegaUser = BD::conn()->prepare("SELECT * FROM `candidato` WHERE `email` = ?");
	$pegaUser->execute(array($_SESSION['email_candidato']));
	$dadosUser = $pegaUser->fetch();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Rede Social</title>
        <meta name="description" content="Empregae">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Google Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>


         <style>



 .status{
     position:relative;
     right:8px;
     top:50%;
     width:12px;
     height:12px;
     margin-top: -53px;
     margin-left: 45px;
     border-radius:50%;
     background:#666;
 }
 .status.off{background:#ccc;}
 .status.on{background:#090;}

 /**Aside dos chats **/
 #chats{
     position:absolute;
     bottom:0;
     left:0;
     width:82%;
     z-index: 1;
    margin-left: 8.1%;
 }

 /**JANELAS**/
 .window{
     float:left;
     width:270px;
     margin-left: 10%;
     height:auto;
     overflow:hidden;
     border-radius:4px;
     z-index: 1;
    margin-left: 5.5%;
 }

 .window .header_window{
     float:left;
     background:#2c304d;
     padding:5px;
     width:270px;
     position:relative;
     cursor:pointer;
 }
 .window .header_window .close{
     text-decoration:none;
     float:left;
     color:white;
     font:16px Tahoma, arial;
     padding:0 10px 0 0;
 }
 .window .header_window .name{
     float:left;
     font:16px tahoma, arial;
     color:white;
 }

 .window .body{
     float:left;
     width:100%;
 }

 .window .body .mensagens{
     float:left;
     width:100%;
     border-left:1px solid #999;
     border-right:1px solid #999;
     height:230px;
     overflow-y:auto;
     overflow-x:hidden;
     padding:4px;
     background: #f9f9f9;
    color: #2c304d;
    width: 100%;

    font-weight: 500;
 }
 .mensagens ul{
     float:left;
     width:100%;
     border-radius: 20px;


 }
 .mensagens ul li{
     float:right;
     width:80%;
     background:linear-gradient(to bottom,#eb1a5b, #ccc 130%);
     border:1px solid #999;
     position:relative;
     padding:4px;
     margin-bottom:9px;
     border-radius: 20px;



 }
 .mensagens ul li .imgSmall{
     position:absolute;
     width:35px;
     height:35px;
     left:-45px;
     margin-top:-8px;
     margin-bottom:10px;
 }
 .mensagens ul li p{

     color: white;
     font-family: helvetica;
     margin: 1px;
     margin-left: 5px;


 }

 .imgSmall{

	width:44px;
	height:44px;

}
.imgSmall img{width:100%; height:100%;border-radius:50%;}

 .mensagens ul li.eu{float:left;
    background: linear-gradient(to bottom, #00D0EA 0%, #0085D1 100%);

 }
 .mensagens::-webkit-scrollbar{width:3px;}
 .mensagens::-webkit-scrollbar-track{background-color:#666; border-left:1px solid #ebebeb; border-right:1px solid #ebebeb;}
 .mensagens::-webkit-scrollbar-thumb{background-color:#666;}
 .mensagens::-webkit-scrollbar-thumb:hover{background-color:#069;}

 .window .body .send_message{
     float:left;
     width:100%;
     position:relative;
     background: #e4e8f0;
     border: 1px solid #2c304d;
     border: 1 ;
    color: #2c304d;
    font-weight: 500;
 }

 i.glyphicon {
    font-size: 2em;
}

 .window .body .send_message input{
     float:left;
     width:82%;
     padding:3px;
     border: 1px solid #2c304d;
     outline:none;
     border: 0;
    padding: 10px 15px;
    background: #e4e8f0;
    font-weight: 500;

 }

         </style>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/img/apple-touch-icon.png'); ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/img/favicon-32x32.png'); ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/img/favicon-16x16.png'); ?>">
        <!-- Stylesheet -->
        <link rel="stylesheet" href="<?= base_url('assets/vendors/css/base/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/vendors/css/base/sadrak-1.5.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/lity/lity.min.css'); ?>">

<link href="<?= base_url('assets/empresa/Buscapaginacao/assets/css/jquery-ui-1.10.2.custom.min.css"'); ?>" media="screen" rel="stylesheet" type="text/css">
<script src="<?= base_url('assets/empresa/Buscapaginacao/assets/js/jquery-1.11.3.min.js"'); ?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/empresa/Buscapaginacao/assets/js/jquery-ui-1.10.2.custom.min.js"'); ?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/empresa/Buscapaginacao/assets/js/filter.js"'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/empresa/js/paginationvagas.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/empresa/Buscapaginacao/assets/js/pagination.js'); ?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/chat/jquery.js'); ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/chat/jquery_play.js'); ?>"></script>
		<script type="text/javascript">
			$.noConflict();
		</script>
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        <script type="text/javascript">
                    window.movies = <?php echo html_entity_decode(json_encode($network, JSON_NUMERIC_CHECK)); ?>;
                    </script>


    </head>
    <body id="page-top">

    <?php if($this->session->flashdata('msg')): echo $this->session->flashdata('msg'); endif; ?>

        <!-- Begin Preloader -->
        <div id="preloader">
            <div class="canvas">
                <img src="<?= base_url('assets/img/logo.png'); ?>" alt="logo" class="loader-logo">
                <div class="spinner"></div>
            </div>
        </div>
        <!-- End Preloader -->
        <div class="page db-social">
            <!-- Begin Header -->
            <header class="header">
                <nav class="navbar fixed-top">
                    <!-- Begin Search Box-->

                    <!-- End Search Box-->
                    <!-- Begin Topbar -->
                    <div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
                        <!-- Begin Logo -->
                        <div class="navbar-header">
                            <a href="db-social.html" class="navbar-brand">
                                <div class="brand-image brand-big">
                                    <img src="<?= base_url('assets/img/logo.png'); ?>" alt="logo" style="width: 70px;" class="logo-big">
                                </div>
                                <div class="brand-image brand-small">
                                    <img src="<?= base_url('assets/img/logo.png'); ?>" alt="logo" class="logo-small">
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

                        <!-- Barra Superior -->

                        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">


                        <!-- Início Solicitaçoes  -->
                        <?php if(count($solicitacoesRE) < 1): ?>
                        <li class="nav-item dropdown"><a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="la la-user-plus "> </i><span class="badge-pulse"></span></a>
                                <ul aria-labelledby="notifications" class="dropdown-menu notification">
                                    <li>
                                        <div class="notifications-header">
                                            <div class="title">Solicitaçoes </div>
                                            <div class="notifications-overlay"></div>
                                            <img src="assets/img/notifications/01.jpg" alt="..." class="img-fluid">
                                        </div>
                                    </li>
                                    <li>
                                    <a href="#">
                                                      <div class="message-icon">
                                                          <i class="la la-frown-o"></i>
                                                      </div>
                                                      <div class="message-body">
                                                          <div class="message-body-heading">
                                                           Ops! Nenhuma solitaçao de contato ainda :(
                                                          </div>
                                                     <span class="date"      href="<?= base_url('candidato/login/aceito/colegas');?>"> Pesquisar colegas?      Clique aqui.</span>
                                                      </div>
                                                  </a>
                                                  <?php else: ?>
                                                  <li class="nav-item dropdown"><a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i style="color: #fff;"  class="la la-user-plus "><font face="Times" size="1">+<?php echo count($solicitacoesRE, COUNT_RECURSIVE); ?> </font> </i> <span class="online badge-pulse-green"></span></a>
                                <ul aria-labelledby="notifications" class="dropdown-menu notification">



                                                            <li>
                                                                <div class="notifications-header">
                                                                    <div class="title">Solicitaçoes</div>
                                                                    <div class="notifications-overlay"></div>
                                                                    <img src="#" alt="..." class="img-fluid">
                                                                </div>
                                                            </li>
                                                            <li>
                                                        <?php foreach($solicitacoesRE as $solicatacoesREValue): ?>
                                                        <a href="#">
                                                        <div class="message-icon">
                                                        <img class="messenger-image messenger-image-default" src="<?= base_url('assets/candidato/foto_candidato/'); ?><?= $solicatacoesREValue->foto_candidato; ?>" alt="...">
                                                        </div>
                                                        <div class="message-body">
                                                            <div class="message-body-heading">
                                                            <?= $solicatacoesREValue->nome; ?> quer se conectar com você.
                                                            </div>
                                                            <span class="date">
                                                            <form method="post" class="col-md-12">
                                                            <input type="hidden" name="id_de" value="<?= $solicatacoesREValue->id_candidato; ?>">
                                                            <div class="btn-group" role="group" aria-label="Buttons Group">
                                                                <button type="submit" style="padding: 2px 12px; " name="indicador" value="2" class="btn btn-success mb-2">Aceitar</button>
                                                                <button type="submit" style="padding: 2px 12px;" name="indicador"  class="btn btn-danger mb-2">Recusar</button>
                                                                </div>
                                                            </form>
                                                        </span>
                                                        </div>
                                                        </a>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?>

                                                        </li>
                                                        <li>

                                                        </li>
                                                        <li>

                                                        </li>
                                                        <li>
                                                        <a rel="nofollow" href="#" class="dropdown-item all-notifications text-center">Ver todas solicitações</a>
                                                        </li>
                                                        </ul>
                                                        </li>


                                                        </li>


                            <!-- Fim Solicitaçoes  -->

                            <!-- Inicio NOtificaçoes -->
                            <li class="nav-item dropdown"><a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="la la-bell animated infinite swing"></i><span class="badge-pulse"></span></a>
                                <ul aria-labelledby="notifications" class="dropdown-menu notification">
                                    <li>
                                        <div class="notifications-header">
                                            <div class="title">Notificaçoes </div>
                                            <div class="notifications-overlay"></div>
                                            <img src="assets/img/notifications/01.jpg" alt="..." class="img-fluid">
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="message-icon">
                                                <i class="la la-user"></i>
                                            </div>
                                            <div class="message-body">
                                                <div class="message-body-heading">
                                                  Fulano te indicou
                                                </div>
                                                <span class="date">2 horas, ago</span>
                                            </div>
                                        </a>
                                    </li>


                                    <li>
                                        <a rel="nofollow" href="#" class="dropdown-item all-notifications text-center">Ver Todas Notificaçoes</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Fim Notifications -->
                            <!-- usuario -->
                            <li class="nav-item dropdown"><a id="user" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="la la-gear"></i></a>
                                <ul aria-labelledby="user" class="user-size dropdown-menu">

                                                <li>
                                                    <a href="<?= base_url('candidato/login/aceito'); ?>" class="dropdown-item">
                                                        Perfil
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
                                                <i class="ti ti-user"></i>Meu Perfil
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
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
                <aside id="chats" style="    z-index: 1;"> </aside>
                <div class="content-inner compact">
                    <div class="container-fluid newsfeed">
                        <div class="row justify-content-center">
                            <div class="col-xl-11">
                                <div class="row">

                                    <!-- Timeline -->
                                    <div class="col-xl-8">

                                    



                         </script>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
                        <script>

                     
} 

                        $(document).ready(function() {
                            $('form.jsform').on('submit', function(form) {
                                form.preventDefault();
                                $.post('../../candidato/Login/classificarContato', $('form.jsform').serialize(), function(data) {
                                id = $('#indicacoes').attr("value");
                                myClass = 'div.'+id;
                                alert(myClass);
                                 $(myClass).html(data);
                                });
                                myClass = 0;
                            });
                        });
                        </script>

                                       <?php  $i = 0; ?>
                                          <?php while($i < max(sizeof($teste['contatos']),sizeof($teste['vagas']) )): ?>
                                        <?php echo form_open('candidato/login/classificarContato', array('class' => 'jsform')); ?>
                                          <?php if($i < sizeof($teste['contatos']) && ($teste['contatos'][$i]->nome != '') ): ?>

                                                    <div class="widget has-shadow">
                                                        <!-- Inicio Bloco contato/vaga -->

                                                        <div class="widget-header d-flex align-items-center">
                                                            <div class="user-image">

                                                            <a href="<?= base_url('candidato/login/perfil/') ?><?= $teste['contatos'][$i]->id_candidato; ?> "><img class="rounded-circle" src="<?= base_url('assets/candidato/foto_candidato/'); ?><?= $teste['contatos'][$i]->foto_candidato; ?>" alt="..."></a>
                                                            </div>
                                                            <div class="d-flex flex-column mr-auto">
                                                                <div class="title">
                                                                <a href="<?= base_url('candidato/login/perfil/') ?><?= $teste['contatos'][$i]->id_candidato; ?> "> <span class="username"><?= $teste['contatos'][$i]->nome; ?></a></span> Assistir Vídeo-Curriculum
                                                                </div>
                                                                <div class="time">Entrou em <?= $teste['contatos'][$i]->data_inscricao; ?></div>
                                                            </div>
                                                            <div class="widget-options">
                                                                <div class="dropdown">
                                                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                                                                        <i class="la la-bullhorn"></i>
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
                                                        <div class="widget-body">
                                                            <p style="margin-left: 4.5%">
                                                            <?= $teste['contatos'][$i]->descricao_video; ?>
                                                            </p>
                                                            <div class="row justify-content-center">
                                                                <div class="col-xl-11">
                                                                    <div class="row post-video">
                                                                        <div class="col-xl-5 col-lg-5 col-sm-5 col-12">
                                                                            <div class="hover-img">
                                                                                <div class="overlay">
                                                                                    <a href="<?= base_url('assets/candidato/video_analise/'); ?><?= $teste['contatos'][$i]->video_nome; ?>" class="button has-shadow" data-lity>
                                                                                        <i class="ion-play" style="margin-top: 30%"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <a href="javascript:void(0);">


                                                                                    <img src="<?= base_url('assets/candidato/foto_candidato/'); ?><?= $teste['contatos'][$i]->foto_candidato; ?>" class="img-fluid rounded" alt="..." >

                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xl-7 col-lg-7 col-sm-7 col-12 mt-auto mb-auto">
                                                                            <h3>Quem Sou </h3>
                                                                            <p><?= $teste['contatos'][$i]->quemsou; ?></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="widget-footer d-flex align-items-center">
                                                            <div class="col-xl-6 col-md-6 col-5 no-padding d-flex justify-content-start align-items-center">
                                                            <div class="meta">
                                                                    <ul>
                                                                        <li>
                                                                        <a class=" collapsed d-flex align-items-center">
                                                                        <div class="link"><span class="badge-rounded mr-2 success"></span>Excelente</div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                        <a class=" collapsed d-flex align-items-center" >
                                                                        <div class="link"><span class="badge-rounded mr-2"></span>Ótimo</div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                        <a class=" collapsed d-flex align-items-center" >
                                                                        <div class="link"><span class="badge-rounded mr-2 danger"></span>Bom</div>
                                                                            </a>
                                                                        </li>

                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-md-6 col-7 no-padding d-flex justify-content-end">
                                                                <div class="meta">
                                                                    <ul>
                                                                        <li>
                                                                        <a class=" collapsed d-flex align-items-center" data-toggle="collapse" href="#collapseOne">
                                                                                <i class="la la-comment"></i>
                                                                                <span class="nb-new badge-rounded info badge-rounded-small" style="background: #2c304d; margin-right: 3%"><?= $teste['contatos'][$i]->recomendados; ?></span>
                                                                                <div class="time"> comentar</div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                        <a class=" collapsed d-flex align-items-center" >
                                                                                <i class="la la-hand-scissors-o"></i>

                                                                                <span class="nb-new badge-rounded info badge-rounded-small" style="background: #fe195e; margin-right: 3%"><div class="<?= $teste['contatos'][$i]->id_candidato; ?>" id="indicacoes" value="<?= $teste['contatos'][$i]->id_candidato; ?>"><?= $teste['contatos'][$i]->indicacoes; ?></div></span>
                                                                                <input type="hidden" name="id_para" value="<?= $teste['contatos'][$i]->id_candidato; ?>">
                                                                                <input type="hidden" name="tipo" value="4">
                                                                                <span style="width:100px;"><button  class="badge-text badge-text-small success"  type="submit" >indicar</button></span>

                                                                            </a>
                                                                        </li>

                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="accordion" class="accordion">
                                                                    <div class="widget">
                                                                        <div id="collapseOne" class="card-body bg-grey collapse" data-parent="#accordion">
                                                                        <div class="publisher publisher-multi">
                                                            <textarea class="publisher-input" rows="1"></textarea>
                                                            <div class="publisher-bottom d-flex justify-content-end">
                                                                <a class="publisher-btn" href="javascript:void(0);"><i class="la la-smile-o"></i></a>
                                                                <a class="publisher-btn" href="javascript:void(0);"><i class="la la-camera"></i></a>
                                                                <button class="btn btn-gradient-01">Postar Comentário</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>

                                         <?php endif; ?>
                                         <?php echo form_close(); ?>
                                        <div class="widget has-shadow">
                                            <!-- Inicio Bloco de Vaga -->
                                            <?php if($i < sizeof($teste['vagas'])): ?>
                                            <div class="publisher publisher-multi bg-white">
                                                <div class="publisher-bottom">
                                                <h2><?= $teste['vagas'][$i]->nome_vaga; ?></h2>
                                                <h5 style="color: #e76c90;"><?= $teste['vagas'][$i]->empresa_vaga; ?></h5>
                                                <p style="margin-left: 15%">Estudante de Engenharia Eletrônica para projetar e consertar placas eletrônicas entre outras atividades da função.</p>
                                                <h5 style="margin-left: 15%">Salário:  <?= $teste['vagas'][$i]->salario_vaga; ?> + VT + VA</h5>
                                                <h6> Curitiba/PR<h6>
                                                    <div class="d-inline-block">
                                                        <a class="publisher-btn"  data-toggle="modal" data-target="#modal-centered" ><i class="la la-mail-forward"></i></a>
                                                        <a class="publisher-btn" href="javascript:void(0);"><i class="la la-star-o"></i></a>
                                                        <h9 class="time"> - Publicada há 1h</h9>
                                                    </div>
                                                    <div class="d-inline-block pull-right">
                                                    <form method="post" class="form_vagas">
                                                                <input type="hidden" name="id_vaga" value="<?= $teste['vagas'][$i]->id_vaga; ?>">
                                                                <input type="hidden" name="empresa_id" value="<?= $teste['vagas'][$i]->empresa_id; ?>">
                                                    <button type="button" class="btn btn-shadow mr-2" data-toggle="modal" data-target="#modal-centered" data-placement="top" title="" data-original-title="Enviar essa vaga para um contato">   Recomendar  </button>
                                                        <button class="btn btn-gradient-01" type="submit">Enviar Vídeo</button>

                                                        </form>

                                                        <!-- INICIO - Modal que abri recomendaçao de vaga -->
                                                        <div id="modal-centered" class="modal fade show" >
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Enviar vaga para contato</h4>
                                                                            <button type="button" class="close" data-dismiss="modal">
                                                                                <span aria-hidden="true">×</span>
                                                                                <span class="sr-only">Fechar</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                        <!-- CORPO- Modal que abri recomendaçao de vaga -->
                                                                    <div class="widget widget-19 has-shadow">
                                                                       
                                                                        <div class="widget-header bordered d-flex align-items-center">
                                                                            <h2><i style="color: #303450" class="la la-group"> Contatos <font size="2">(<?php echo count($colegas, COUNT_RECURSIVE); ?>)</font> </i></h2>
                                                                            <div class="widget-options">
                                                                                <div class="dropdown">
                                                                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                                                                                        <i class="la la-ellipsis-h"></i>
                                                                                    </button>
                                                                                    <div class="dropdown-menu">
                                                                                        <a href="#" class="dropdown-item"> 
                                                                                            <i class="la la-bell-slash"></i>Tela cheia
                                                                                        </a>
                                                                                        <a href="#" class="dropdown-item"> 
                                                                                            <i class="la la-edit"></i>Filtro
                                                                                        </a>
                                                                                        <a href="#" class="dropdown-item faq"> 
                                                                                            <i class="la la-question-circle"></i>Ajuda
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="widget-body p-0">
                                                                            <div class="form-group row mt-3 mr-0 mb-3 ml-0">
                                                                                <div class="col-xl-12">
                                                                                    <label class="form-control-label">Pesquisar Colega </label>
                                                                                    <input type="text" value="Ex.: Raquel Musk " class="form-control">
                                                                                </div>
                                                                            </div>
                                                                        
                                                                            <ul class="list-group w-100 widget-scroll" style="max-height: 250px; overflow: hidden; outline: none;" tabindex="2">
                                                                                <li class="list-group-item ">
                                                                                <?php if(count($colegas) < 1): ?>
                                                                                <div class="media">
                                                                                        <div class="media-left align-self-center mr-3">
                                                                                        <div class="message-icon">
                                                                                                <i class="la la-frown-o la-3x"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="media-body align-self-center">
                                                                                            <div class="people-name"> Voce nao tem colegas. Pesquise e adcione novos contatos.</div>
                                                                                        </div>
                                                                                        <div class="media-right align-self-center">
                                                                                
                                                                                        </div>
                                                                                    </div>
                                                                                    <hr>

                                                                                <?php else: ?>

                                                                                <?php foreach($colegas as $colegasValue): ?>
                                                                                    <div class="media">
                                                                                        <div class="media-left align-self-center mr-3">
                                                                                            <img src="<?= base_url('assets/candidato/foto_candidato/'); ?><?= $colegasValue->foto_candidato ?>" class="img-fluid rounded-circle" style="width: 40px;">
                                                                                        </div>
                                                                                        <div class="media-body align-self-center">
                                                                                            <div class="people-name"> <?= $colegasValue->nome; ?>  <?= $colegasValue->sobrenome; ?> </div>
                                                                                        </div>
                                                                                        <div class="media-right align-self-center">
                                                                                        <form method="post" class="col-md-12">
                                                                                        <input type="hidden" name="enviar_vaga" value="">
                                                                                        <input type="hidden" name="id_para" value="<?= $colegasValue->id_candidato; ?>">
                                                                                                <div class="btn-group" role="group" aria-label="Buttons Group">
                                                                                                    <button type="button" style="padding: 2px 12px;" id="<?= $teste['vagas'][$i]->id_vaga; ?>" onClick="reply_click(this.id)" class="btn btn-outline-info mb-2">Enviar</button>
                                                                                                    </div> 
                                                                                                </form>
                                                                                        </div>
                                                                                    </div>
                                                                                    <hr>
                                                                                    <script type="text/javascript">
                                                                                        function reply_click(clicked_id)
                                                                                        {
                                                                                            alert(clicked_id);
                                                                                        }
                                                                                        </script>
                                                                                    <?php endforeach; ?>
                                                                                    <?php endif; ?>
                                                                                </li>
                                                                            </ul>
                                                                          <br>
                                                                        </div>
                                                                    </div>
                                                                    <!-- FIM CORPO - Modal que abri recomendaçao de vaga -->  
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-shadow" data-dismiss="modal">Fechar</button>
                                                                            <button type="button" class="btn btn-primary">Enviar</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- FIM - Modal que abri recomendaçao de vaga -->


                                                    </div>
                                                </div>
                                            </div>
                                            <!--Fim  Bloco de Vagas -->
                                    <?php endif; ?>

                                        </div>
                                        <!-- Fim Bloco contato/vaga -->
                                         <?php $i = $i+1; ?>
                                         <?php  endwhile; ?>


                                    </div>
                                    <!-- Fim Timeline -->
                                    <div class="col-xl-3 column">
                                        <!-- Blocos lateral direita -->
                                        <div class="widget has-shadow">
                                            <div class="widget-header bordered no-actions d-flex align-items-center">
                                                <h5>Empresas Mais Acessadas</h5>
                                            </div>
                                            <div class="widget-body p-3">
                                                <ul class="pop-groups list-group w-100">
                                                    <!-- 01 -->
                                                    <li class="list-group-item">
                                                        <div class="media">
                                                            <div class="media-left align-self-center mr-3">
                                                                <i class="la la-industry"></i>
                                                            </div>
                                                            <div class="media-body align-self-center">
                                                                <h5 class="m-0">KSI Sadrak</h5>
                                                                <small class="m-0">
                                                                   TecnoloGY CIA.
                                                                </small>
                                                            </div>
                                                            <div class="media-right align-self-center">
                                                                <i class="la la-heart-o" data-toggle="tooltip" data-placement="top" title="Add como Favorita"></i>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <!-- End 01 -->
                                                    <!-- 02 -->
                                                    <li class="list-group-item">
                                                        <div class="media">
                                                        <div class="media-left align-self-center mr-3">
                                                                <i class="la la-play-circle"></i>
                                                            </div>
                                                            <div class="media-body align-self-center">
                                                                <h5 class="m-0">Vagas_App</h5>
                                                                <small class="m-0">
                                                                   RH 4.0
                                                                </small>
                                                            </div>
                                                            <div class="media-right align-self-center">
                                                                <i class="la la-heart-o" data-toggle="tooltip" data-placement="top" title="Add como Favorita"></i>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <!-- End 02 -->
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- End Groups -->
                                        <!-- Begin Suggestion -->


                                        <div class="widget has-shadow">
                                            <div class="widget-header bordered no-actions d-flex align-items-center">
                                                <h5>Possíveis contatos</h5>
                                            </div>
                                            <div class="widget-body p-3">
                                                <ul class="pop-groups list-group w-100">
                                                <ul class="list-group w-100 widget-scroll" style="max-height: 250px; overflow: hidden; outline: none;" tabindex="2">
                                            <li class="list-group-item  movies row" id="movies" >
                                            <script id="movie-template" type="text/html">
                                                <div class="media">
                                                <a data-toggle="tooltip" data-placement="top" data-original-title="<%= nome %> <%= sobrenome %> <br> <%= ocupacao %>"  data-html="true" aria-describedby="tooltip778899">
                                                    <div class="media-left align-self-center mr-3">
                                                        <img src="<?= base_url('assets/candidato/foto_candidato/'); ?><%= foto_candidato %>" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                    </div>
                                                    <div class="media-body align-self-center">

                                                       <div class="people-name"><%= nome %> </div>

                                                    </div></a>
                                                    <div class="media-right align-self-center">
                                                        <form method="post" class="col-md-12">
                                                        <input type="hidden" name="addContatoRede" value="<%= id_candidato %>">
                                                        <input type="hidden" name="id_tela" value="2">
                                                               <div class="btn-group" role="group" aria-label="Buttons Group">
                                                                 <button type="submit" style="padding: 2px 12px; "  value="2" class="btn btn-outline-success mb-2">Add</button>
                                                                </div>
                                                            </form>
                                                    </div>
                                                </div>
                                                <hr>
                                        </script>
                                          </li>
                                        </ul>
                                   </ul>
                             </div>
                                            <script id="genre_template" type="text/html">
                                            <div class="checkbox">
                                            <label>
                                            <input type="checkbox" value="<%= area_nome %>">
                                            </div>
                                            </script>
                                            <span style="display: none" id="per_page" class="content"></span>
                                            <span  id="pagination" style="display: none" class="movies-pagination"></span>
                                     </div>

                                        <!-- End Suggestion -->
                                        <!-- Begin Register -->
                                        <div class="widget no-bg text-center">
                                            <i class="la la-smile-o la-5x"></i>
                                            <h3 class="text-primary mt-4">Novas Vagas Cadastradas</h3>
                                            <p>Veja novas vagas que foram cadastradas:)</p>
                                            <a href="<?= base_url('candidato/login/aceito/vagas'); ?>"class="btn btn-shadow mt-4">Acessar Vagas</a>





                                        </div>
                                        <!-- End Register -->
                                    </div>
                                    <!-- End Col -->
                                    <!-- Begin Column -->
                                    <div class="col-xl-1 column d-flex justify-content-center widget has-shadow">
                                        <!-- Coluna Contato -->

                                        <div class="friends-mini text-center "  ><p style="    color: #2c304d;">Contatos</p>
                                                <aside id="users_online">
                                                                <ul>
                                                                <?php
                                                                    $pegaUsuarios = BD::conn()->prepare("

                                                                    SELECT CA.nome, CA.foto_candidato, CA.id_candidato, CA.blocks, CA.limite FROM candidato AS CA
                                                                    INNER JOIN relacionamento AS re ON CA.id_candidato = re.id_para WHERE re.indicador = 2 AND re.id_de = ?
                                                                    union
                                                                    SELECT CA.nome, CA.foto_candidato, CA.id_candidato, CA.blocks, CA.limite FROM candidato AS CA
                                                                    INNER JOIN relacionamento AS rel ON CA.id_candidato = rel.id_de WHERE rel.indicador = 2 AND rel.id_para = ? ORDER BY RAND()

                                                                    ");
                                                                    $pegaUsuarios->execute(array( $_SESSION['id_user'],  $_SESSION['id_user']));
                                                                    while($row = $pegaUsuarios->fetch()){
                                                                        $foto = ($row['foto_candidato'] == '') ? 'padrao.png' : $row['foto_candidato'];
                                                                        $blocks = explode(',', $row['blocks']);
                                                                        $agora = date('Y-m-d H:i:s');
                                                                        if(!in_array(  $_SESSION['id_user'] , $blocks)){
                                                                            $status = 'on';
                                                                            if($agora >= $row['limite']){
                                                                                $status = 'off';
                                                                            }
                                                                ?>

                                                                    <li id="<?php echo $row['id_candidato'];?>">
                                                                        <div class="imgSmall">
                                                                         <a data-toggle="tooltip" data-placement="top" title=" <?php echo utf8_encode($row['nome']);?>" data-original-title="Tooltip" id="<?php echo  $_SESSION['id_user'].':'.$row['id_candidato'];?>" class="comecar">
                                                                        <img src="<?= base_url('assets/candidato/foto_candidato/'); ?><?php echo $foto; ?>" border="0">
                                                                        <span style="display: table-caption;" id="<?php echo  $row['id_candidato'];?>" class="status <?php echo $status;?>"></span></a>
                                                                    </li><br>
                                                                <?php }}?>

                                                                </ul>
                                                            </aside>

                                                            <aside id="chats">

                                                            </aside>
                                                            <script type="text/javascript" src="<?= base_url('assets/js/chat/functions.js'); ?>" ></script>



                                      <br><br>
                                            <a href="javascript:void(0);">
                                                <i class="la la-user-plus"></i>
                                            </a>
                                        </div>
                                        <!-- End Friends -->
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
                    <footer class="main-footer">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center">
                                <p class="text-gradient-02">Emprega_eu</p>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-end justify-content-lg-end justify-content-md-end justify-content-center">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">RH 4.0</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Contato</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </footer>
                    <!-- End Page Footer -->
                    <a href="#" class="go-top"><i class="la la-commenting-o"></i></a>
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
                                                            <span class="user_online" id="<?php echo $dadosUser['id_candidato'];?>"></span>

                                                                <ul>
                                                                <?php
                                                                    $pegaUsuarios = BD::conn()->prepare("

                                                                    SELECT CA.nome, CA.foto_candidato, CA.id_candidato, CA.blocks, CA.limite FROM candidato AS CA
                                                                    INNER JOIN relacionamento AS re ON CA.id_candidato = re.id_para WHERE re.indicador = 2 AND re.id_de = ?
                                                                    union
                                                                    SELECT CA.nome, CA.foto_candidato, CA.id_candidato, CA.blocks, CA.limite FROM candidato AS CA
                                                                    INNER JOIN relacionamento AS rel ON CA.id_candidato = rel.id_de WHERE rel.indicador = 2 AND rel.id_para = ? ORDER BY RAND()

                                                                    ");
                                                                    $pegaUsuarios->execute(array( $_SESSION['id_user'],  $_SESSION['id_user']));
                                                                    while($row = $pegaUsuarios->fetch()){
                                                                        $foto = ($row['foto_candidato'] == '') ? 'padrao.png' : $row['foto_candidato'];
                                                                        $blocks = explode(',', $row['blocks']);
                                                                        $agora = date('Y-m-d H:i:s');
                                                                        if(!in_array(  $_SESSION['id_user'] , $blocks)){
                                                                            $status = 'on';
                                                                            if($agora >= $row['limite']){
                                                                                $status = 'off';
                                                                            }
                                                                      ?>

                                                                    <li id="<?php echo $row['id_candidato'];?>">
                                                                        <div class="imgSmall">
                                                                         <a data-toggle="tooltip" data-placement="top" title=" <?php echo utf8_encode($row['nome']);?>" data-original-title="Tooltip" id="<?php echo  $_SESSION['id_user'].':'.$row['id_candidato'];?>" class="comecar">
                                                                        <img src="<?= base_url('assets/candidato/foto_candidato/'); ?><?php echo $foto; ?>" border="0"><?php echo utf8_encode($row['nome']);?></a>
                                                                        <span style="display: table-caption;" id="<?php echo  $row['id_candidato'];?>" class="status <?php echo $status;?>"></span>
                                                                    </li><br>
                                                                <?php }}?>
                                                                </ul>
                                                            </aside>

                                                       <script type="text/javascript" src="<?= base_url('assets/js/chat/functions.js'); ?>" ></script>

                                                       </ul>
                                                        </div>
                                                        <!-- End Friends -->

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
        <!-- Begin Vendor Js -->
        <script src="<?= base_url('assets/vendors/js/base/jquery.min.js'); ?>"></script>
        <script src="<?= base_url('assets/vendors/js/base/core.min.js'); ?>"></script>
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="<?= base_url('assets/vendors/js/nicescroll/nicescroll.min.js'); ?>"></script>
        <script src="<?= base_url('assets/vendors/js/lity/lity.min.js'); ?>"></script>
        <script src="<?= base_url('assets/vendors/js/app/app.min.js'); ?>"></script>
        <!-- End Page Vendor Js -->
        <!-- Begin Page Snippets -->
        <script src="<?= base_url('assets/js/pages/newsfeed.min.js'); ?>"></script>
        <script src="<?= base_url('assets/vendors/js/noty/noty.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/components/notifications/notifications.min.js'); ?>"></script>
        <!-- End Page Snippets -->
        <!-- Tooltip Initialisation -->
        <script>
        $(document).ready(function(){  // A DIFERENÇA ESTA AQUI, EXECUTA QUANDO O DOCUMENTO ESTA "PRONTO"
                                $( "div.noty_layout" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
                                });
       </script>
  <script>
 $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
                            </script>
    </body>
</html>
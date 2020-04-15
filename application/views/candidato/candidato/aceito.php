<?php

 

    
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
         
        <style>


.imgSmall img{width:100%; height:100%;}
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
}

/**JANELAS**/
.window{
	float:left;
	width:270px;
	margin-left:5px;
	height:auto;
	overflow:hidden;
	border-radius:4px;
}

.window .header_window{
	float:left;
	background:#2d314e;
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
	background:#ebebeb;
	border-left:1px solid #999;
	border-right:1px solid #999;
	height:230px;
	overflow-y:auto;
	overflow-x:hidden;
	padding:4px;
}
.mensagens ul{
	float:left;
	width:100%;
}
.mensagens ul li{
	float:right;
	width:80%;
	background:linear-gradient(to bottom, #fff, #ccc 130%);
	border:1px solid #999;
	border-radius:4px;
	position:relative;
	padding:4px;
	margin-bottom:9px;
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
	font:13px tahoma, arial;
	color:#666;
}
.mensagens ul li.eu{float:left; background:#a4e9ff;}
.mensagens::-webkit-scrollbar{width:3px;}
.mensagens::-webkit-scrollbar-track{background-color:#666; border-left:1px solid #ebebeb; border-right:1px solid #ebebeb;}
.mensagens::-webkit-scrollbar-thumb{background-color:#666;}
.mensagens::-webkit-scrollbar-thumb:hover{background-color:#069;}

.window .body .send_message{
	float:left;
	width:100%;
	position:relative;
}
.window .body .send_message input{
	float:left;
	width:100%;
	padding:3px;
	background:white;
	border:1px solid #999;
	outline:none;
}

        </style>
  <link href="<?= base_url('assets/empresa/Buscapaginacao/assets/css/stream.css" '); ?>" media="screen" rel="stylesheet" type="text/css">



<link href="<?= base_url('assets/empresa/Buscapaginacao/assets/css/jquery-ui-1.10.2.custom.min.css"'); ?>" media="screen" rel="stylesheet" type="text/css">
<script src="<?= base_url('assets/empresa/Buscapaginacao/assets/js/jquery-1.11.3.min.js"'); ?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/empresa/Buscapaginacao/assets/js/jquery-ui-1.10.2.custom.min.js"'); ?>" type="text/javascript"></script>
  <script src="<?= base_url('assets/empresa/Buscapaginacao/assets/js/filter.js"'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/empresa/js/paginationvagas.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/empresa/Buscapaginacao/assets/js/pagination.js'); ?>" type="text/javascript"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/crud/bulma.min.css')?>">

<link rel="stylesheet" href="<?php echo base_url('assets/css/crud/animate.min.css')?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/crud/font-awesome.min.css')?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/crud/style.css')?>">
<script src="<?php echo base_url('assets/js/crud/vue.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/crud/axios.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/crud/jquery.min.js')?>"></script>
 <link rel="stylesheet" href="<?= base_url('assets2/vendors/css/base/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets2/vendors/css/base/sadrak-1.5.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/owl-carousel/owl.carousel.min.css"'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/owl-carousel/owl.theme.min.css'); ?>">
        <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets2/img/apple-touch-icon.png'); ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets2/img/favicon-32x32.png'); ?> ">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets2/img/favicon-16x16.png'); ?>">
        <!-- Stylesheet -->
       
        <link rel="stylesheet" href="<?= base_url('assets2/js/components/notifications/notifications.min.js'); ?>">

        <script type="text/javascript">
        window.movies = <?php echo html_entity_decode(json_encode($colegas, JSON_NUMERIC_CHECK)),  html_entity_decode(json_encode($candidatos, JSON_NUMERIC_CHECK));  ?>;
        </script>


        <script type="text/javascript">
        window.movies = <?php echo html_entity_decode(json_encode($candidatos, JSON_NUMERIC_CHECK)); ?>;
        </script>
    </head>

    <body id="page-top" style="color: #2c304d">
 
    <?php if($this->session->flashdata('msg')): echo $this->session->flashdata('msg'); endif; ?> 
        <?php foreach ($dados as $dados_user): ?>
            <?php if ($dados_user->status == 2 OR $dados_user->status == 4 OR $dados_user->status == 5): ?>

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
                    <?php if ($dados_user->status == 2) { ?>

                        <!-- Begin Header -->
                        <header class="header">
                            <nav class="navbar fixed-top">
                                <!-- Begin Search Box-->
                        
                                
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
                                        
                                       
                                        <?php if(count($solicitacoesRE) < 1): ?>
                                      
                                        <li class="nav-item dropdown"><a id="abrir2" rel="nofollow"  aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="la la-user-plus "> </i><span style="margin-top: -5px; margin-right: 11px;" class="badge-pulse"></span></a>

                                            <ul id="minha_div2" aria-labelledby="abrir2" class="dropdown-menu notification">
                                                <li>
                                                    <div class="notifications-header">
                                                        <div class="title">Solicitaçoes </div>
                                                        <div class="notifications-overlay"></div>
                                                        <img src="#" alt="..." class="img-fluid">
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
                                                <li class="nav-item dropdown"><a id="abrir2" rel="nofollow"  aria-haspopup="true" aria-expanded="false" class="nav-link"><i style="color: #fff;"  class="la la-user-plus animated infinite swing">  <font face="Times" size="1">+<?php echo count($solicitacoesRE, COUNT_RECURSIVE); ?> </font></i><span style="margin-top: -5px; margin-right: 11px;" class="online badge-pulse-green"></span></a>

                                                        <ul id="minha_div2" aria-labelledby="abrir2" class="dropdown-menu notification">
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

                                     
                                     
                                        <!-- Inicio Notifications -->
                                        <li class="nav-item dropdown"><a id="abrir3" rel="nofollow"  aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="la la-bell "></i><span  style="margin-top: -5px; margin-right: 8px;"class="badge-pulse"></span></a>
                                            <ul id="minha_div3" aria-labelledby="abrir3" class="dropdown-menu notification">
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


                                        <!-- Inicio Editar Perfil -->
                                        <li class="nav-item dropdown"><a id="abrir4" rel="nofollow"  aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="la la-pencil-square "></i><span style="margin-top: -5px; margin-right: -5px;" class="badge-pulse"></span></a>
                                            <ul  id="minha_div4" aria-labelledby="user" class="user-size dropdown-menu">
                                                <li class="welcome">
                                                    <a  data-toggle="modal" data-target="#modalfoto"  style="cursor: pointer" class="edit-profil"><i class="la la-gear"></i></a>
                                                    <img src="<?= base_url('assets/candidato/foto_candidato/'); ?><?= $dados[0]->foto_candidato; ?>"" alt="..." class="rounded-circle">
                                                </li>
                                                <li>
                                                <?php if($this->uri->segment(4)=='meu_curriculum'): ?>   
                                                         <a   href="<?= base_url('candidato/login/aceito'); ?>" class="dropdown-item" style="cursor: pointer" class="dropdown-item">
                                                       Editar Perfil
                                                    </a>    
                                                            <?php else: ?> 
                                                            <a   class="chamar"  class="dropdown-item" style="cursor: pointer" class="dropdown-item">
                                                       Editar Perfil
                                                    </a>    
                                                             <?php endif; ?>
                                                 
                                                </li>
                                                <li>
                                                <?php if($this->uri->segment(4)=='meu_curriculum'): ?>   
                                                   
                                                            <?php else: ?> 
                                                            <a href="<?= base_url('candidato/login/aceito/meu_curriculum'); ?>" style="cursor: pointer" class="dropdown-item">
                                                       Editar Curriculum
                                                    </a> 
                                                             <?php endif; ?>

                                                    
                                                </li>
                                                <li>
                                                <?php if($this->uri->segment(4)=='meu_curriculum'): ?>   
                                                    <a   href="<?= base_url('candidato/login/aceito'); ?>" class="dropdown-item">
                                                        Trocar Vídeo-Curriculum
                                                    </a>
                                                 
                                                   <?php else: ?> 
                                                    <a  style="cursor: pointer"data-target="#modal-centered"data-toggle="modal" class="dropdown-item">
                                                        Trocar Vídeo-Curriculum
                                                    </a>
                                                    <?php endif; ?>
                                                  
                                                </li>
                                                <li>
                                                    <a  data-toggle="modal" data-target="#modalfoto"  style="cursor: pointer"class="dropdown-item no-padding-bottom">
                                                       Trocar Foto do Perfil
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
                                        
                                        <!-- User -->
                                        <script>
                                        document.getElementsByClassName("chamar")[0].addEventListener("click", function() {
                                    document.getElementsByClassName("abrir")[0].click();
                                      div4.style.display = 'none';
                                    });
                                        </script>
                                        <script>
                                       

                                            // Captura o evento load da página
                                            window.onload = function() {
                                                // Localiza o elemento
                                                var div = document.getElementById('minha_div');
                                                var div2 = document.getElementById('minha_div2');
                                                var div3 = document.getElementById('minha_div3');
                                                var div4 = document.getElementById('minha_div4');
                                                // Esconde a DIV
                                                div.style.display = 'none';
                                                div2.style.display = 'none';
                                                div3.style.display = 'none';
                                                div4.style.display = 'none';

                                                // O link
                                                var clique = document.getElementById('abrir');
                                                var clique2 = document.getElementById('abrir2');
                                                var clique3 = document.getElementById('abrir3');
                                                var clique4 = document.getElementById('abrir4');
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
                                                clique3.onclick = function() {
                                                    // Verifica se getComputedStyle é suportado
                                                    if ('getComputedStyle' in window) {
                                                        var display = window.getComputedStyle(div3).display;
                                                    } else {
                                                        // Obtém a opção display para navegadores antigos
                                                        var display = div3.currentStyle.display;
                                                    }

                                                    // Verifica se display é none
                                                    if (display == 'none') {
                                                        // Muda para display block
                                                        div3.style.display = 'block';
                                                    } else {
                                                        // Muda para display none
                                                        div3.style.display = 'none';
                                                    }

                                                    // Retorna falso para não atualizar a página
                                                    return false;
                                                }

                                                clique4.onclick = function() {
                                                    // Verifica se getComputedStyle é suportado
                                                    if ('getComputedStyle' in window) {
                                                        var display = window.getComputedStyle(div4).display;
                                                    } else {
                                                        // Obtém a opção display para navegadores antigos
                                                        var display = div4.currentStyle.display;
                                                    }

                                                    // Verifica se display é none
                                                    if (display == 'none') {
                                                        // Muda para display block
                                                        div4.style.display = 'block';
                                                    } else {
                                                        // Muda para display none
                                                        div4.style.display = 'none';
                                                    }

                                                    // Retorna falso para não atualizar a página
                                                    return false;
                                                }
                                            }
                                        </script>
                                        <li class="nav-item"><a href="#off-canvas" class="open-sidebar"><i class="la la-commenting-o"></i></a></li>
                                        <li class="nav-item dropdown"><a id="abrir" rel="nofollow"  aria-haspopup="true" aria-expanded="false" class="nav-link"></a>
                                            <ul  id="minha_div" aria-labelledby="user" class="user-size dropdown-menu">
                                                <li class="welcome">
                                                    <a href="#off-canvas" class="edit-profil"><i class="la la-gear"></i></a>
                                                    <img src="<?= base_url('assets2/img/avatar/avatar-01.jpg'); ?>" alt="..." class="rounded-circle">
                                                </li>
                                                <li>
                                                    <a href="<?= base_url('candidato/login/logado'); ?>" class="dropdown-item">
                                                        Perfil
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="" class="dropdown-item">
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
                                    <script>localStorage.setItem('idCandidato', <?= $dados[0]->id_candidato; ?>);</script>
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
                                            <a href="<?= base_url('candidato/login/aceito/experiencias'); ?>" data-toggle="tooltip" data-placement="right" title="Em Construçao" data-original-title="Página Em construçao" aria-describedby="tooltip719485">
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
                                                                    <div class="counter"><?php echo $qtdVisitas; ?></div>
                                                                    <div class="heading">Visualizaçoes</div>
                                                                </li>
                                                                <li>
                                                                    <div class="counter"><?php echo count($colegas, COUNT_RECURSIVE); ?></div>
                                                                    <div class="heading">Contatos</div>
                                                                </li>
                                                                <li>
                                                                    <div class="counter"> <?= $valor; ?></div>
                                                                    <div class="heading">Indicações</div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        
                                                        <div class="col-xl-4 col-md-4 d-flex justify-content-center" >
                                                            <div class="image-default">
                                                            <?php if($this->uri->segment(4)=='meu_curriculum'): ?>   
                                                                 <a style="cursor: pointer" >
                                                                <img class="rounded-circle" alt="..." src="<?= base_url('assets/candidato/foto_candidato/'); ?><?= $dados[0]->foto_candidato; ?>" >
                                                                </a>
                                                            <?php else: ?> 
                                                                 <a data-toggle="modal" data-target="#modalfotoVerEdit" style="cursor: pointer" >
                                                                <img class="rounded-circle" alt="..." src="<?= base_url('assets/candidato/foto_candidato/'); ?><?= $dados[0]->foto_candidato; ?>" >
                                                                </a>
                                                            <?php endif; ?>
                                                                </div>

                                                              
                                                        <div id="info">
                                                            <div class="infos" v-for="crud in candidato" >
                                                          
                                                                <a id="ativar" class="abrir" href="#" @click="editModal = true; selectbiodata(crud)"><i class="la la-edit edit la-2x"> -  {{crud.nome}} </i></a>
                                                                <div class="location">{{crud.cidade}} , {{crud.estado}} , {{crud.pais}} </div>
                                                                <?php include 'modalInfo.php';?>
                                                                </div>
                                                                </div>
                                                                <script src="<?php echo base_url('assets/js/crud/edita_info.js');?>"></script>
                                                                <script src="<?php echo base_url('assets/js/crud/pagination.js');?>"></script>
                                                        </div>   
                                                  
                                                        <div class="col-xl-4 col-md-4 d-flex justify-content-lg-end justify-content-md-end justify-content-center">
                                                            <div class="follow">
                                                                

                                                            
                                                             
                                                
                          <?php if($this->uri->segment(4)==''): ?>   
                          <div class="searchbox">
                                <form  action="aceito/vagas" method="post" target="_blank">
                                <input  style="width: 310px; box-sizing: border-box; border: 2px solid #aea9c3;border-radius: 50px !important;font-size: 1rem;color: #2c304d;background-color: transparent;padding: .85rem 1.4rem;transition: width 0.5s ease-out;" type="text" id="searchbox" value="" placeholder="Buscar vagas..." autocomplete="on">
                        	   </form>
                           </div>
                         <?php endif; ?>

                            <?php if($this->uri->segment(4)=='vagas'): ?>
                            <div class="searchbox">
                               <input  style="width: 310px;box-sizing: border-box;border: 2px solid #aea9c3;border-radius: 50px !important; font-size: 1rem;color: #2c304d;background-color: transparent;padding: .85rem 1.4rem;transition: width 0.5s ease-out;" type="text"  id="searchbox" value="" placeholder="Buscar vagas..." autocomplete="on">
                             </div>
                            <?php endif; ?>  

                               <?php if($this->uri->segment(4)=='meu_curriculum'): ?>
                               
                                                            <ul>
                                                                <li>
                                                                   <a href="#"> <div class="counter"><i class="la la-print"></i></div>
                                                                    <div class="heading">Imprimir</div></a>
                                                                </li>
                                                                <li>
                                                                <a href="#">  <div class="counter"><i class="la la-download"></i></div>
                                                                    <div class="heading">Download</div></a>
                                                                </li>
                                                                <li>
                                                                <a href="#"> <div class="counter"><i class="la la-star-o"></i></div>
                                                                    <div class="heading">Salvar</div></a>
                                                                </li>
                                                            </ul>

                            <?php endif; ?>         
                        
        </div>                        
                   

                                                     
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

                                                                    <!--Modal Edita Foto-->

<div id="modalfotoVerEdit" class="modal  fade show" style="display: none; padding-right: 17px;">
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

                <form method="post" accept-charset="utf-8" enctype="multipart/form-data" action="<?= base_url('candidato/login/aceito'); ?>">
                    <div class="form-group">
                        <div class="alert alert-secondary-bordered alert-lg square fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                            <i class="la la-diamond mr-2"></i>
                
                            <strong> Vamos atualizar :) </strong> Editar foto
                            <img style="width: 40%; margin-left: 30%; "alt="..." src="<?= base_url('assets/candidato/foto_candidato/'); ?><?= $dados[0]->foto_candidato; ?>" >
                        </div>

                        <input class="btn btn-outline-primary mr-1 mb-2"id="foto" style="margin-left: -7px;display: block;" name="foto" type="file" value="<?= set_value('foto'); ?>" class="form-control"  />



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-shadow" data-dismiss="modal">Fechar</button>
                        <button  type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <ul class="head-nav nav nav-tabs justify-content-center">
   
        <li><a href="#"><label for="confirmar">Atualizar</label></a></li>
    </ul>
</div>

<!--  ModalFotoVerEdit -->
            
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
                                                                                <i class="la la-diamond mr-2"></i>
                                                                                        <strong> Vamos atualizar :) </strong> Editar foto
                                                                                        <img style="width: 40%; margin-left: 30%; "alt="..." src="<?= base_url('assets/candidato/foto_candidato/'); ?><?= $dados[0]->foto_candidato; ?>" >
                                                                                    <form method="post" accept-charset="utf-8" enctype="multipart/form-data" action="<?= base_url('candidato/login/aceito'); ?>">
                                                                                        <div class="form-group">
                                                                                          
                                                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                                                                                <i class="la la-diamond mr-2"></i>
                                                                                            </div>

                                                                                            <input class="btn btn-outline-primary mr-1 mb-2"id="foto" style="margin-left: -7px;display: block;" name="foto" type="file" value="<?= set_value('foto'); ?>" class="form-control"  />



                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-shadow" data-dismiss="modal">Fechar</button>
                                                                                            <button  type="submit" class="btn btn-primary">Salvar</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                     
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
                                                                                                                                <option value="sim">Sim</option>
                                                                                                                                <option value="não" selected="">Não</option>
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

                                                                                                            <ul class="pager wizard text-right">
                                                                                                                <li class="previous d-inline-block disabled">
                                                                                                                    <a href="javascript:void(0)" class="btn btn-secondary ripple">Voltar</a>
                                                                                                                </li>
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


                        

                                                          
                                                            </div>
                                                        </div>
                                                    </div>


                   
                                                </div>
                                                <!-- End Head Profile -->
                                                <aside id="chats"> </aside>
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
 
                                                             <aside id="users_online">
                                                                <?php
                                                                    $pegaUsuarios = BD::conn()->prepare("
                                                                    SELECT CA.nome, CA.foto_candidato, CA.id_candidato, CA.blocks, CA.limite FROM candidato AS CA
                                                                    INNER JOIN relacionamento AS re ON CA.id_candidato = re.id_para WHERE re.indicador = 2 AND re.id_de = ?  
                                                                    union
                                                                    SELECT CA.nome, CA.foto_candidato, CA.id_candidato, CA.blocks, CA.limite FROM candidato AS CA 
                                                                    INNER JOIN relacionamento AS rel ON CA.id_candidato = rel.id_de WHERE rel.indicador = 2 AND rel.id_para = ? ORDER BY RAND()

                                                                    ");
                                                                    $pegaUsuarios->execute(array( $_SESSION['id_user'], $_SESSION['id_user']));
                                                                    while($row = $pegaUsuarios->fetch()){
                                                                        $foto = ($row['foto_candidato'] == '') ? 'padrao.png' : $row['foto_candidato'];
                                                                        $blocks = explode(',', $row['blocks']);
                                                                        $agora = date('Y-m-d H:i:s');
                                                                        if(!in_array( $_SESSION['id_user'] , $blocks)){
                                                                            $status = 'on';
                                                                            if($agora >= $row['limite']){
                                                                                $status = 'off';
                                                                            }
                                                                ?>
                                                                    <li id="<?php echo $row['id_candidato'];?>">
                                                                        <div class="imgSmall">
                                                                        <img src="<?= base_url('assets/candidato/foto_candidato/'); ?><?php echo $foto; ?>" border="0"" alt="..." class="img-fluid rounded-circle" style="width: 35px;"></div>
                                                                        <a href="#" id="<?php echo $_SESSION['id_user']  . ':' . $row['id_candidato']; ?>" class="comecar"><?php echo utf8_encode($row['nome']);?></a>
                                                                        <span style="display: table-caption;" id="<?php echo $row['id_candidato']; ?>" class="status <?php echo $status;?>"></span>
                                                                    </li>
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

      <!-- se a pagina solicitada for vagas -->

  

                   <?php
                    if ($this->uri->segment(4) == ''):  $this->load->view('candidato/meu_perfil');
                    endif;
                    ?>
                    <!-- se a pagina solicitada for visitas -->
                    <?php
                    if ($this->uri->segment(4) == 'meu_curriculum'): $this->load->view('candidato/meu_curriculum', $dados);
                    endif;
                    ?>
                    <?php
                    if ($this->uri->segment(4) == 'experiencias'): $this->load->view('candidato/experiencias');
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
                                                        <a class="nav-link" href="#">FeedBack</a>
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

                            $(document).ready(function(){  // A DIFERENÇA ESTA AQUI, EXECUTA QUANDO O DOCUMENTO ESTA "PRONTO"
                                $( "div.noty_layout" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
                                });
                            </script>

                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                        <script src="<?= base_url('assets/vendors/js/noty/noty.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/components/notifications/notifications.min.js'); ?>"></script>
                        <!-- Begin Vendor Js -->
                        <script src="<?= base_url('assets2/vendors/js/base/jquery.min.js'); ?> "></script>
                        <script src="<?= base_url('assets2/vendors/js/base/core.min.js'); ?>"></script>
                        <!-- End Vendor Js -->
                        <!-- Begin Page Vendor Js -->
                        <script src="<?= base_url('assets2/vendors/js/nicescroll/nicescroll.min.js'); ?>"></script>
                        <script src="<?= base_url('assets2/vendors/js/app/app.min.js'); ?>"></script>
                        <!-- End Page Vendor Js -->
                        <script type="text/javascript"  src="<?= base_url('assets/empresa/Buscapaginacao/recursos2/js/jquery-2.1.4.min.js'); ?>" ></script>
    <script  type="text/javascript" src="<?= base_url('assets/empresa/Buscapaginacao/recursos2/js/bootstrap.min.js'); ?>" ></script>
    <script  type="text/javascript" src="<?= base_url('assets/empresa/Buscapaginacao/recursos2/js/theia-sticky-sidebar.js'); ?>" ></script>
    <script  type="text/javascript" src="<?= base_url('assets/empresa/Buscapaginacao/recursos2/js/scripts.js'); ?>" ></script>





                    <?php } elseif ($dados_user->status == 4 OR $dados_user->status == 5) { ?>

                        <h4 class="navbar"><span class="text-left">Novidade:</span> <a href="<?= base_url('candidato/login/sair'); ?>" class="link">Sair</a></h4>
                        <h6 class="navbar">Uma empresa teve interesse em seu perfil, em breve ela poderá entrar em contato, boa sorte!</h6>

                    <?php } ?>







                </div>
            </div>
        <?php elseif ($dados_user->status == 2): redirect(base_url('/candidato/login/aceito')); /* else: redirect(base_url('/candidato/login')); */ elseif ($dados_user->status == 3): ?>

            <?php $this->load->view('candidato/candidato_recusado', ['dados_user' => $dados_user]); ?>

        <?php endif; ?>
    <?php endforeach; ?>


    <script type="text/javascript">
    $(document).on('submit', '.form_vagas', function(e) {
      e.preventDefault();

            //Receber os dados
            $form = $(this);
            var formdata = new FormData($form[0]);

            //Criar a conexao com o servidor
            var request = new XMLHttpRequest();


            //Upload completo limpar a barra de progresso
            request.addEventListener('load', function(e) {
                //Atualizar a página após o upload completo
                setTimeout("window.open(self.location, '_self');", 1000);
            });

            //Arquivo responsável em fazer o upload da imagem
            request.open('post', '<?= base_url(); ?>' + 'index.php/candidato/login/aceito');
            request.send(formdata);

        });
    </script>
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>

<script type="text/javascript">
    $(document).on('submit', '.form_vagas', function(e) {
      e.preventDefault();

            //Receber os dados
            $form = $(this);
            var formdata = new FormData($form[0]);

            //Criar a conexao com o servidor
            var request = new XMLHttpRequest();


            //Upload completo limpar a barra de progresso
            request.addEventListener('load', function(e) {
                //Atualizar a página após o upload completo
                setTimeout("window.open(self.location, '_self');", 1000);
            });

            //Arquivo responsável em fazer o upload da imagem
            request.open('post', '<?= base_url(); ?>' + 'index.php/candidato/login/aceito');
            request.send(formdata);

        });
    </script>
    <script src="<?= base_url('assets/vendors/js/base/jquery.min.js'); ?>"></script>
        <script src="<?= base_url('assets/vendors/js/base/core.min.js'); ?>"></script>
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="<?= base_url('assets/vendors/js/nicescroll/nicescroll.min.js'); ?>"></script>
        <script src="<?= base_url('assets/vendors/js/owl-carousel/owl.carousel.min.js'); ?>"></script>
        <script src="<?= base_url('assets/vendors/js/app/app.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/pages/vagas.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendors/js/noty/noty.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/components/notifications/notifications.min.js'); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
     
    <script type="text/javascript" src="<?= base_url('assets/js/chat/jquery.js'); ?>"></script>
        <script type="text/javascript">	$.noConflict(); 
        </script>


</body>

</html>
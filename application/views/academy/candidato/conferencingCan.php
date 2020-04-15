
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Connection</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="<?= base_url('assets/images/Logo2.png'); ?>"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>
    <link href="<?= base_url('assets/css/font-awesome.css'); ?>" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="<?= base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet">    
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/slick.css'); ?>"/> 
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="<?= base_url('assets/css/jquery.fancybox.css'); ?>" type="text/css" media="screen" /> 
    <!-- Animate css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/animate.css'); ?>"/> 
    <!-- Bootstrap progressbar  --> 
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap-progressbar-3.3.4.css'); ?>"/> 
     <!-- Theme color -->
    <link id="switcher" href="<?= base_url('assets/css/theme-color/default-theme.css'); ?>" rel="stylesheet">

    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css'); ?>"/> 

    <!-- Fonts -->
    <script src="<?= base_url('assets/empresa/Buscapaginacao/assets/js/jquery-1.11.3.min.js "'); ?>" type="text/javascript">
    </script>
    <script src="<?= base_url('assets/empresa/Buscapaginacao/assets/js/jquery-ui-1.10.2.custom.min.js" '); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/empresa/Buscapaginacao/assets/js/filter.js "'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/empresa/Buscapaginacao/assets/js/pagination.js" '); ?>" type="text/javascript"></script>
 
    <!-- Open Sans for body font -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!-- Lato for Title -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'> 
    <link rel="stylesheet" href="<?php echo base_url('assets/css/crud/bulma.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/crud/animate.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/crud/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/crud/style.css')?>">
    <script src="<?php echo base_url('assets/js/crud/vue.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/crud/axios.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/crud/jquery.min.js')?>"></script>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <script src="https://rtcmulticonnection.herokuapp.com/dist/RTCMultiConnection.min.js"></script>
<script src="https://rtcmulticonnection.herokuapp.com/socket.io/socket.io.js"></script>


<style>
#mapa {
    height: 180px;
    width: 1349px;

}
#video{
  position: absolute;
    z-index: 5;
    background-color: #fff;
    padding: 5px;
    border: 1px solid #999;
    text-align: center;
    font-family: 'Roboto','sans-serif';
    line-height: 30px;
    padding-left: 10px;
}

#floating-panel {
    position: absolute;
    z-index: 5;
    background-color: #fff;
    padding: 5px;
    border: 1px solid #999;
    text-align: center;
    font-family: 'Roboto','sans-serif';
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
  <?php if($this->session->flashdata('msg')): echo $this->session->flashdata('msg'); endif; ?>

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
          <div class="col-md-6 col-sm-6 col-xs-6" >
            <div class="header-login" >
              <a class="login modal-form" >Voltar</a>
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
          <a class="navbar-brand" href="<?= base_url('empresa/login/logado'); ?>"><?= $dados[0]->nome ?></a>              
          <!-- IMG BASED LOGO  -->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <li> <a>Ultima fase do processe de Triagem da Connection!</a></li>
           
          </ul>                     
        </div><!--/.nav-collapse -->
        <!-- search icon -->
     
      </div>     
    </nav>
  </section>
  <!-- END MENU -->  
  
  <!-- Start single page header -->
  <section id="single-page-header">
    <div class="overlay" id="mapa">
      <div class="container">
        <div class="row" >
        </div>
      </div>
    </div>
  </section>
  <!-- End single page header -->
  
  <!-- Start latest news -->
  <section id="latest-news">
    <div class="container">
      <div class="row">
          <div class="col-md-12">
                <div class="title-area">
                  <h2 class="title">
                  <?php if (!empty($_GET['sala'])): ?> 
                                        <a style="color: crimson" href="<?= base_url('conference/watch/reuniao'); ?>">Sair da Vídeo-Chamada <i style="margin-left: 10px" class="fas fa-video-slash"></i></a>
                                                  <?php else: ?>
                                           3ª Fase do Processo de Triagem
                                        
                                                  <?php endif; ?>
                  </h2>
                </div>
          </div>

        <div class="col-md-4">
          <div class="latest-news-content">
            <div class="row">
                  <div class="sidebar-widget">
                    <h4 class="widget-title">Empresas nas quais voce foi aprovado</h4>
                    <?php foreach($empresaAprovei as $empresaSelecionadosValue): ?>  
                        <ul class="widget-catg"> 
                        <li>
                            <?php  $j = 1; ?>
                            <?php while($j <= sizeof($result['carga'])  ): ?>
                                <?php if(!empty($result['carga'][$j]['reuniao'][0]->id_empresa)): ?>
                                    <?php if($empresaSelecionadosValue->id_empresa == $result['carga'][$j]['reuniao'][0]->id_empresa):  ?>     
                                         <li>
                                            
                                                 <?php if (!empty($_GET['sala'])): ?> 
                                                 <?php if ($_GET['sala'] == $dados[0]->video_nome ): ?> 
                                                    <H6 style="color: #4caf50" >Vídeo Coferencia ATIVA - <?= $empresaSelecionadosValue->empresa  ?> </H6>
                                                    <u > <H6 style="color:#4caf50 "><?= $result['carga'][$j]['reuniao'][0]->dataReuniao ?> - Às   <?= $result['carga'][$j]['reuniao'][0]->horario ?> <i style=" margin-left: 10px"class="fas fa-video"></i></H6>
                                                      </u>
                                                    <input  type="hidden" style="margin-left: 60%" class="sala" name="" value="<?php  $sala = $_GET['sala'] ?? "salateste"; echo $sala;  ?>">         
                                                   <?php else: ?>
                                                   <a href="<?= base_url('conference/watch/reuniao'); ?>?sala=<?= $dados[0]->video_nome; ?> ">
                                                   <H6 style="color: darkmagenta" > Inativa - <?= $empresaSelecionadosValue->empresa  ?> </H6>
                                                   <u > <H6 style="color: darkmagenta"><?= $result['carga'][$j]['reuniao'][0]->dataReuniao ?> - Às   <?= $result['carga'][$j]['reuniao'][0]->horario ?> <i style=" margin-left: 10px"class="fas fa-video"></i></H6>
                                                </u>
                                               
                                                  <?php endif; ?>
                                                  <?php else: ?>
                                                  <a href="<?= base_url('conference/watch/reuniao'); ?>?sala=<?= $dados[0]->video_nome; ?> ">
                                                  <H6 style="color: darkmagenta" > Inativa - <?= $empresaSelecionadosValue->empresa  ?></H6>
                                                  <u > <H6 style="color: darkmagenta"><?= $result['carga'][$j]['reuniao'][0]->dataReuniao ?> - Às   <?= $result['carga'][$j]['reuniao'][0]->horario ?> <i style=" margin-left: 10px"class="fas fa-video"></i></H6>
                                                </u>
                                              
                                                  <?php endif; ?>
                                                
                                         </li>          
                                    <?php  endif; ?>
                                    <?php else: ?>
                                    <H5 style="color: darkmagenta" > Nenhuma</H5>
                                <?php endif; ?>     
                                <?php $j = $j+1; ?>
                            <?php endwhile; ?>
                            <?php endforeach; ?>
                     <br><br><br><br><br><br><br><br><br>
                  </div>
              </div>
             </div> 
           </div>
           <?php if (empty($_GET['sala'])): ?> 
              <div class="col-md-6" style="margin-top: 10px">
             <img src="https://png.pngtree.com/element_origin_min_pic/16/09/05/1957cd531ada57d.jpg">
             </div>
            <?php endif; ?>
          
         </div>
      </div>
  </section>
              
  <!-- Start footer -->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <div class="footer-left">
          <p>2019 <a href="">Connection</a></p>
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

<script>
var connection = new RTCMultiConnection();
// IMPORTANTE, NÃO REMOVER
connection.socketURL = 'https://rtcmulticonnection.herokuapp.com:443/';

let sala = document.querySelector(".sala").value;

connection.session = {
    audio: true,
    video: true
};
connection.openOrJoin(sala);
</script>


<script type="text/javascript">
var conta = document.querySelectorAll('.infoModal').length;
var carrinhoTotal = 0;
        //var prods = []; // array para guardar os valores clicados
        //esse setInterval é importante para que o sistema detecte que houve alterações nos resultados
        $(document).ready(function() {
            $valorInicial = "<?= base_url('conference/watch/reuniao'); ?>";
            var prods = [$valorInicial];
            setInterval(function() {

                //se o valor for diferente, é preciso reatribuir algumas tarefas para que possar ser atualizadas, sem isso o sistema para de funcionar quando os resultados são alterados
                //atribui algumas informações do candidato ao modal


                //MODAL =======================================================
                $('.infoModal').click(function() {
                    $('.iframePlayer').attr('src', this.rel);
                    $('#myModalLabel').html($(this).find('.nomeModal').attr('value'));
                    $('.cursoModalexibe').html($(this).find('.cursoModal').attr('value'));
                });
                //Modal que exibe o vídeo do candidato ao seleciona-ló
                $('#myModal').on('shown.bs.modal', function() {
                    $('#myInput').trigger('focus')
                })

                //Carrinho de compras ========================================
                //var prods = []; // array para guardar os valores clicados (valores do carrinho de compras, no caso os ids dos candidatos)
                // evento "click" nos links


                $(".botaoCarrinho").on('click', function(e) {

                    e.preventDefault(); // cancela o evento do link
                    var p = $(this).attr("data-identificador"); // pega o valor do atributo "rel" do link clicado
                    // verifica se o valor já existe na array.
                    // se não existe, adiciona com "push"
                    if (!~prods.indexOf(p)) {
                        prods.push(p);
                        $(this).removeClass = 'btn-success';
                        $(this).addClass = 'candidatoSelecionado';
                     
                    }
                    // converte a array em string com os valores separados por barras
                    // e insere no href do link de analisar candidatos
                });
                //marca os candidatos selecionados
                var carrinho = document.querySelectorAll('.botaoCarrinho');
                for (y = 0; y < carrinho, length; y++) {

                    if (~prods.indexOf(carrinho[y].getAttribute('data-identificador'))) {
                        carrinho[y].classList.add('candidatoSelecionado');
                        //console.log(1++);
                    }

                }



            }, 500);
});


</script>
<script>

function initMap() {
var mapa = new google.maps.Map(document.getElementById('mapa'), {
center: {lat: -25.4284, lng: -49.2733},
zoom: 12,
styles: [
{elementType: 'geometry', stylers: [{color: '#242f3e'}]},
{elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
{elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
{
featureType: 'administrative.locality',
elementType: 'labels.text.fill',
stylers: [{color: '#fb7a16'}]
},
{
featureType: 'poi',
elementType: 'labels.text.fill',
stylers: [{color: '#d59563'}]
},
{
featureType: 'poi.park',
elementType: 'geometry',
stylers: [{color: '#263c3f'}]
},
{
featureType: 'poi.park',
elementType: 'labels.text.fill',
stylers: [{color: '#6b9a76'}]
},
{
featureType: 'road',
elementType: 'geometry',
stylers: [{color: '#38414e'}]
},
{
featureType: 'road',
elementType: 'geometry.stroke',
stylers: [{color: '#212a37'}]
},
{
featureType: 'road',
elementType: 'labels.text.fill',
stylers: [{color: '#9ca5b3'}]
},
{
featureType: 'road.highway',
elementType: 'geometry',
stylers: [{color: '#746855'}]
},
{
featureType: 'road.highway',
elementType: 'geometry.stroke',
stylers: [{color: '#1f2835'}]
},
{
featureType: 'road.highway',
elementType: 'labels.text.fill',
stylers: [{color: '#f3d19c'}]
},
{
featureType: 'transit',
elementType: 'geometry',
stylers: [{color: '#2f3948'}]
},
{
featureType: 'transit.station',
elementType: 'labels.text.fill',
stylers: [{color: '#d59563'}]
},
{
featureType: 'water',
elementType: 'geometry',
stylers: [{color: '#17263c'}]
},
{
featureType: 'water',
elementType: 'labels.text.fill',
stylers: [{color: '#515c6d'}]
},
{
featureType: 'water',
elementType: 'labels.text.stroke',
stylers: [{color: '#17263c'}]
}
]

});


}

</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
    <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCx4-rcijLzQORExZOIsKckO_8sNBObdSk&callback=initMap"></script>
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
    
  </body>
  
</html>
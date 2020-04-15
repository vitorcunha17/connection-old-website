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
    <script type="text/javascript">
        window.movies = <?php echo html_entity_decode(json_encode($candidatos, JSON_NUMERIC_CHECK)); ?>;
    </script>

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

      <style>



#mapa {
    height: 180px;
    width: 1349px;

}

.candidatoSelecionado{
  background-color: springgreen;
  color: #270f0f;
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

    <div class="header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="header-contact">
              <ul>
                <li>
                  <div class="phone">
                    <i class="fa fa-phone"></i>
                    <?= $areaEmpresa[0]->telefone; ?>
                  </div>
                </li>
                <li>
                  <div class="mail">
                    <i class="fa fa-envelope"></i>
                    <?= $areaEmpresa[0]->email; ?>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6" id="informacoesempresa">
                      
           <transition
                          enter-active-class="animated fadeInLeft"
                              leave-active-class="animated fadeOutRight">
                              <div class="notification is-success text-center px-5 top-middle" v-if="successMSGInfo" @click="successMSGInfo= false">{{successMSGInfo}}</div>
                      </transition>
            <div class="header-login" v-for="crud in empresa" >
              <a class="login modal-form"   @click="editModal = true; selectbiodata(crud)" >Editar Informaçoes</a>
            </div>

            <?php include 'modalInfo.php';?>
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
          <a class="navbar-brand" href="index.html"><?= $areaEmpresa[0]->empresa; ?></a>              
          <!-- IMG BASED LOGO  -->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
          <li> <a>Candidatos na 2ª fase da Triagem!</a></li>
            <li><a  href="<?= base_url('empresa/login/logado'); ?>">Voltar</a></li>
           
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
            <h2 class="title">2ª Fase do processo de triagem</h2>
            <span class="line"></span>
            <p>Nesta Fase Voce pode marcar renioes por vídeo conferencia aqui na plataforma Connection</p>
          </div>
        </div>

        <div class="col-md-12">
          <div class="latest-news-content">
            <div class="row">

              <!-- Inicio Card Candidato Selecionado -->
				         <?php foreach($candidatosSelecionados as $candidatosSelecionadosValue): ?>

                  <div class="col-md-4" >
                        <article class="blog-news-single">
                                  <div class="blog-news-title">
                                  
                              <div class="blog-news-details">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#<?= $candidatosSelecionadosValue->id_candidato ?>" aria-expanded="false" class="collapsed">
                                        <?= strtolower($candidatosSelecionadosValue->nome); ?> <span style="margin-left: 20%" class="fa fa-arrow-circle-down"></span>
                                        </a>
                                      </h4>                                   
                                    </div>
                                    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

                                    <script>
                                    $( "#botaoSalvar" ).click(function() {
                                      $(document).ready(function() {
                                          $('form.jsform').on('submit', function(form) {
                                              form.preventDefault();
                                              $.post('<?= base_url('empresa/Login/reunioes') ?>', $('form.jsform').serialize(), function(data) {
                                                  $('.Id'+data.id_candidato).html("Enviado! :)");
                                              });
                                          });
                                      });
                                    });
                                    </script> -->
                                    <?php echo form_open('empresa/login/reunioes', array('class' => 'jsform')); ?>
                                  <div class="form-group">                        
                                    <input type='date' id="myDate<?= $candidatosSelecionadosValue->id_candidato; ?>" nome='dataReuniao' class="form-control" value=""  >
                                    <input type="hidden" id="myIdCand<?= $candidatosSelecionadosValue->id_candidato; ?>" nome="id_candidato"  value="<?= $candidatosSelecionadosValue->id_candidato; ?>" >
                                    <input type="hidden" id="myIdEmp<?= $candidatosSelecionadosValue->id_candidato; ?>" nome="id_empresa"  value="<?= $areaEmpresa[0]->id_empresa; ?>" >
                                  </div>
                                  <div class="form-group">                        
                                    <input id="MyTime<?= $candidatosSelecionadosValue->id_candidato; ?>" type="text" nome="horario" placeholder="Escolha um horário para a reuniao" onfocus="(this.type='time')" class="form-control" required="" >
                                  </div>
                                  <div class="form-group">             
                                    <input type="text" id="myMens<?= $candidatosSelecionadosValue->id_candidato; ?>" nome="mensagem" placeholder="Mensagem" value=""   class="form-control" required="">
                                  </div>
                                  <div class="portfolio-menu">
                                    <ul>
                                      <li class="botaoCarrinho botao filter active" data-identificador="<?= $candidatosSelecionadosValue->id_candidato; ?>" data-filter="all">Aprovar</li>
                                      <button class="Id<?= $candidatosSelecionadosValue->id_candidato; ?> purchase-btn "  style="display: none;"  data-identificador="<?= $candidatosSelecionadosValue->id_candidato; ?>" data-filter=".branding">Enviar Mensagem</button>
                                    </ul>
                                  </div>
                                  <?php echo form_close(); ?>

                                    <div id="<?= $candidatosSelecionadosValue->id_candidato ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                      <div class="panel-body">
                                      <div class="blog-news-img">
                                 <?php if(substr($candidatosSelecionadosValue->video_nome, -3) == 'mp4'): ?>
                             
                              <iframe src="<?= base_url('empresa/login/player/') ?><?= $candidatosSelecionadosValue->id_candidato ?>/<?= $candidatosSelecionadosValue->video_nome ?>" class="iframePlayer" seamless="" height="95%" width="97%" frameborder="0"></iframe>
                          <?php else: ?>
                           
                          <iframe src="https://player.vimeo.com/video/<?= $candidatosSelecionadosValue->video_nome ?>" width="97%" height="95%" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>   
                          <?php endif; ?> 
                                 </div>
                                      <p><?= strtolower($candidatosSelecionadosValue->quemsou); ?></p>
                                      <div class="sidebar-widget">
                                            <h4 class="widget-title">Expertises</h4>
                                            <ul class="widget-catg">              
                                            <?php  $j = 1; ?>
                                            <?php while($j <= sizeof($result['carga'])  ): ?>
                                            <?php if(!empty($result['carga'][$j]['expertise'][0]->email_candidato)): ?>
                                                      <?php if($candidatosSelecionadosValue->email == $result['carga'][$j]['expertise'][0]->email_candidato):  ?>     
                                                                  <?php $tam = count($result['carga'][$j]['expertise'])-1;  ?>
                                                                        <?php while($tam >= 0): ?> 
                                                                            <li><a href="#">
                                                                                  <?= $result['carga'][$j]['expertise'][$tam]->conteudo ?>
                                                                                  <?php $tam--; ?>
                                                                              </a></li>          
                                                                        <?php endwhile; ?>
                                                                <?php  endif; ?>
                                                            <?php endif; ?>     
                                                      <?php $j = $j+1; ?>
                                                <?php endwhile; ?>
                                             </ul>
                                        </div>
                                        <div class="sidebar-widget">
                                            <h4 class="widget-title">Cursos</h4>
                                                 <?php  $j = 1; ?>
                                                     <?php while($j <= sizeof($result['carga'])  ): ?>
                                                            <?php if(!empty($result['carga'][$j]['cursos'][0]->email_candidato)): ?>
                                                                   <?php if(($candidatosSelecionadosValue->email == $result['carga'][$j]['cursos'][0]->email_candidato)):  ?>
                                                                           <?php $tam = count($result['carga'][$j]['cursos'])- 1; ?>
                                                                                      <?php while($tam >= 0): ?> 
                                                                                                <h3> <?= $result['carga'][$j]['cursos'][$tam]->curso2 ?></h3>
                                                                                                     <div class="blog-navigation-prev"><a>
                                                                                                  <h5><?= $result['carga'][$j]['cursos'][$tam]->instituicao?></h5>
                                                                                              <span>Período: <?= $result['carga'][$j]['cursos'][$tam]->dataReferencia ?></span>
                                                                                          </a></div>
                                                                                    <?php $tam--; ?>       
                                                                          <?php endwhile; ?>
                                                                    <?php  endif; ?>
                                                                <?php  endif; ?>
                                                       <?php $j = $j+1; ?>
                                                <?php endwhile; ?>
                                         </div> 
                                         <div class="sidebar-widget">
                                            <h4 class="widget-title">Experiencia Profissional</h4>
                                            <div class="fundo" style="background-color: azure">
                                                 <?php  $j = 1; ?>
                                                     <?php while($j <= sizeof($result['carga'])  ): ?>
                                                            <?php if(!empty($result['carga'][$j]['experiencia'][0]->email_candidato)): ?>
                                                                   <?php if(($candidatosSelecionadosValue->email == $result['carga'][$j]['experiencia'][0]->email_candidato)):  ?>
                                                                           <?php $tam = count($result['carga'][$j]['experiencia'])- 1; ?>
                                                                                      <?php while($tam >= 0): ?> 
                                                                                      <br>
                                                                                                <br><h3> * <?= $result['carga'][$j]['experiencia'][$tam]->titulo ?></h3>
                                                                                                     <div class="blog-navigation-prev" style="background-color: azure"><a>
                                                                                                  <h5><?= $result['carga'][$j]['experiencia'][$tam]->empresa ?></h5>
                                                                                              <span>Período: <?= $result['carga'][$j]['experiencia'][$tam]->dataReferencia ?></span>
                                                                                              <br><span>Local: <?= $result['carga'][$j]['experiencia'][$tam]->cidadeEstado ?></span>
                                                                                          </a></div>
                                                                                          <br>
                                                                                    <?php $tam--; ?>       
                                                                          <?php endwhile; ?>
                                                                    <?php  endif; ?>
                                                                <?php  endif; ?>
                                                       <?php $j = $j+1; ?>
                                                <?php endwhile; ?>
                                                </div>
                                         </div> 
                                      </div>
                                    </div>
                                  </div>
                              </div>
                        </article>
                  </div>
               <?php endforeach; ?>

            </div>
          </div>
        </div>

        <div class="text-left container">
                        <a type="submit"  href="<?= base_url('conference/watch/reuniao'); ?>"  id="produtos" class="purchase-btn col-md-offset-3">Avançar Para 3ª Fase de Triagem</a>
                        <br><br>
                    </div>     

      </div>
    </div>
  </section>

  <!-- End latest news -->
              
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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/d3js/5.9.0/d3.min.js"></script
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
                        $(this).html('✔');
                        $('#carrinho_total').html(++carrinhoTotal);
                        var button = document.querySelector(".Id"+p);
                        button.style.display = "";
                        dataReuniao = document.getElementById("myDate"+p).value; 
                        mensagem = document.getElementById("myMens"+p).value;
                        id_empresa = document.getElementById("myIdEmp"+p).value;
                        id_candidato = document.getElementById("myIdCand"+p).value;
                        horario = document.getElementById("MyTime"+p).value;

                    $.ajax({
                          type: "POST",
                          data: { dataReuniao, mensagem, id_empresa, id_candidato, horario },
                          url: "<?= base_url(''); ?>"+"empresa/login/reunioes",
                          success: function(data) { //Se a requisição retornar com sucesso, 
                            $(".Id"+p).html('Enviado! ✔');
                            dataReuniao = document.getElementById("myDate"+p).value(""); 
                            mensagem = document.getElementById("myMens"+p).value("");
                            id_empresa = document.getElementById("myIdEmp"+p).value("");
                            id_candidato = document.getElementById("myIdCand"+p).value("");
                            horario = document.getElementById("MyTime"+p).value("");
                              }
                          });
                          
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
   $.ajax({
          type: "POST",
          data: { videoId },
          url: "<?= base_url('candidato/Login/insertVideo') ?>",
          success: function(data) { //Se a requisição retornar com sucesso, 
            start()
              }
          });
</script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
<script>

//PEGA QUANTIDADE TOTAL DE MENSAGENS NÃO LIDAS
var reloadMSGTotais_ = setInterval(reloadMSGTotais, 1000);    
// function reloadMSGTotais () {

// <?php $quantTotais =  base_url("empresa/login/mensagensNaoLidasTotais_/"); ?>

// $.get('<?= $quantTotais ?>', function (data) {

// if(parseInt(data) != parseInt($("span.totais").val())) {
// $(".totais").text(data);
// }

// });

// }



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
var geocodificador = new google.maps.Geocoder();
marcadorCEP(geocodificador, mapa);
}



function marcadorCEP(geocodificador, resultsMap) {
getEndereco(localStorage.getItem("idEmpresa"), function(results, status) {
results = JSON.parse(results);
if (results.length > 0) {
for (var i = 0; i < results.length;
i++
)
marcaMapa(geocodificador, resultsMap, results[i]);
}
});
}



function marcaMapa(geocodificador, resultsMap, data) {
addressQ = data.num + ", " + data.rua + ", " + data.bairro + " - " + data.cidade + "/" + data.estado;
console.log(addressQ + ' ##  IdCandidato: ' + parseInt(data.id_candidato) + ' Nome:' + data.nome);
geocodificador.geocode(
{'address': addressQ},
function(results, status) {
if (status === 'OK') {
resultsMap.setCenter(results[0].geometry.location);
var iconBase = 'http://i68.tinypic.com/2laq32d_th.png';
var marker = new google.maps.Marker({
position: results[0].geometry.location,
map: resultsMap,
icon: iconBase,
title: data.nome
});
var contentString = '<div style="font-family: sans-serif; font-size: 22px; font-weight: 400;  background-color: #1d1e22; color: white; margin: 0; border-radius: 2px 2px 0 0;">' +
'<table>' +
'<tb><img width="20" height="20" style="margin-right: 20px; margin-left: 5px; " src="http://localhost/x/Sistema_v6.1/assets/candidato/foto_candidato/'
+ data.foto_candidato + '"/>' + '' + data.nome + ' </br> Curso: ' + data.nome_curso + ' </td>'
+ '</table>' + '<video controls="" style="width:300px; height:220px">' +
'<source src="http://localhost/x/Sistema_v6.1/assets/candidato/video_editado/'
+ data.video_nome + '"type="video/mp4"></video>' +
' <tr style="height: 50px; width: 310px; ">' +
'<div class="sadrak" style="width: 310px;  ">' +
'<form method="post" class="col-md-12">' +
'<input type="hidden" name="recomendacao_candidato" value="' + parseInt(data.id_candidato) + '">' +
'<input type="hidden" name="recomendacao_empresa" value="' + localStorage.getItem("idEmpresa") + '">' +
'<tb><button style="width: 100px; margin-left: 0px;  background-color:  #c82333" data-identificador= "' + parseInt(data.id_candidato) + '" class="botaoCarrinho botao btn btn-small btn-success col-md-12">Selecionar</button></tb>' +
'<tb><button  type="submit"  class="btn btn-info col-md-12"style=" width: 100px;">Recomendar</button></tb>' +
'<tb><a href="" style=" background-color: #ffc107; color:#212529;" id="produtos" class="btn btn-success">Triagem</a></tb>' +
'</form></div></tb></div> ';
var infoWindow = new google.maps.InfoWindow({
content: contentString
});
marker.addListener('click', function() {
infoWindow.open(resultsMap, marker);
});
}


}
);
}


function getEndereco(id, callback) {
$.ajax({
url: "http://localhost/x/Sistema_v6.1/empresa/endereco?id=1" ,
success: function(resultado) {
callback(resultado);
}
});
}




        // Carregar todos os endereços que estão no BD
        // Puxar todos os endereços e jogar em um XML e a partir dele povoar o mapa



        // Laço para exibir os itens




    </script>
				<script type="text/javascript">
		//MODAL =======================================================
		$('.infoModal').click(function() {
			$('.iframePlayer').attr('src', this.rel);
            //$('#myModalLabel').html($(this).find('.nomeModal').attr('value'));
            //$('.cursoModalexibe').html($(this).find('.cursoModal').attr('value'));

        });

        //pega o vador dos candidatos selecionados e exibe o valor total do carrinho
        var carrinho  = document.getElementsByName('preco[]');
        var valor     = document.querySelector('.total');
        var saldo     = document.querySelector('.saldo');
        var saldoTotal= parseInt(saldo.textContent);
        var total = 0;


        carrinho.forEach(function(elemento){

        	elemento.addEventListener('click', function(){

        		if(elemento.checked) {

        			//verifica o saldo
        			if(parseInt(saldoTotal) > 0) {

        				console.log(saldoTotal -= 1)
        				saldo.textContent = saldoTotal

        			}else {

        				total += parseInt(elemento.getAttribute('data-valor'));
        				valor.textContent = total.toFixed(2)

        			}

        			
        		}else {

        			if(total < 1) {

        				console.log(saldoTotal += 1)
        				saldo.textContent = saldoTotal

        			}else {

        				total -= parseInt(elemento.getAttribute('data-valor'));
        				valor.textContent = total

        			}

        		}

        	})

        })
    </script>

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
    
  <script src="<?php echo base_url('assets/js/crud/pagination.js');?>"></script>
<script src="<?php echo base_url('assets/js/crud/edita_infosEmp.js');?>"></script>
  </body>
</html>
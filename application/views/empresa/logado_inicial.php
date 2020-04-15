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
          <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="header-login">
              <a class="login modal-form"  href="<?= base_url('empresa/login/logado_inicial/sair'); ?>">Sair</a>
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
          <a class="navbar-brand" href="index.html"><?= $areaEmpresa[0]->empresa; ?></a>
          <!-- IMG BASED LOGO  -->
          <!-- <a class="navbar-brand" href="index.html"><img src="assets/images/logo.png" alt="logo"></a> -->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
         <script>localStorage.setItem('idEmpresa', <?= $areaEmpresa[0]->ramo; ?>);</script>
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <li><a href="<?= base_url('empresa/login/logado'); ?>">Home</a></li>
            <li><a href="<?= base_url('empresa/login/logado'); ?>">Compartilhamentos</a></li>
            <li><a href="<?= base_url('empresa/login/logado_inicial/curriculum_recebido'); ?>">Curriculum Recebidos</a></li>
            <li><a href="<?= base_url('empresa/login/logado_inicial/cadastra_vaga'); ?>">Cadastrar Vaga</a></li>
            <li><a href="<?= base_url('empresa/login/logado_inicial/planos'); ?>">Planos</a></li>
            <li class="dropdown active">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">RH <span class="fa fa-angle-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?= base_url('empresa/login/logado_inicial/compras_aprovadas'); ?>">Candidatos Contratados</a></li>
                <li><a href="<?= base_url('empresa/login/logado_inicial/compras_aprovadas'); ?>">Novas Mensaens</a></li>
                <li><a href="<?= base_url('empresa/login/logado_inicial/pedidos'); ?>">Meus Pedidos</a></li>
              </ul>
            </li>
            <li><a href="<?= base_url('empresa/login/logado_inicial/contato'); ?>">Contato</a></li>
          </ul>
        </div><!--/.nav-collapse -->
        <!-- search icon -->
        <a href="#" id="search-icon">
          <i class="fa fa-search">
          </i>
        </a>
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

  <!-- Start blog archive -->
  <section id="blog-archive"    style="  padding: 0px 0;" >

    <div class="container" style="    padding-left: 0px;">

      <div class="row">

        <div class="col-md-12">
          <div class="blog-archive-area">
            <div class="row">
              <div class="col-md-4 hidden-sm hidden-xs">
                <aside class="blog-side-bar">
                  <!-- Start sidebar widget -->
                  <div class="sidebar-widget">
                    <!-- Start blog search -->

                    <!-- End blog search -->
                  </div>
                  <!-- Start sidebar widget -->
                  <div class="sidebar-widget">
                  <img src="<?= base_url('assets/empresa/logo/'); ?><?php
                            foreach ($areaEmpresa as $areaEmpresaValue): echo $areaEmpresaValue->logo;
                            endforeach;
                            ?>" style="width: 320px;height: 250px;">

                            <h4 class="text-secondary"><?php
                                foreach ($areaEmpresa as $areaEmpresaValue): echo $areaEmpresaValue->area_nome;
                                endforeach;
                                ?></h4>
                    <ul class="widget-catg">

                      <fieldset id="genre_criteria">

        </fieldset>
        <br>

                    </ul>
                  </div>
                  <!-- Start sidebar widget -->
                  <div class="sidebar-widget">
                    <h4 class="widget-title">Filosofia Connenction</h4>
                    <p>Nosso propósito é prover a energia que move pessoas e empresas a realizarem o seu potencial. </p>
                  </div>

                  <div class="sidebar-widget">
                    <h4 class="widget-title">Minhas Informaçoes</h4>
                    <ul>
                    <p style="color: #074656; "><strong>Empresa:</strong> <?= $areaEmpresa[0]->empresa; ?></p>
            <p style="color: #074656; "><strong>Cep:</strong> <?= $areaEmpresa[0]->cep; ?></p>
            <p style="color: #074656; "><strong>CNPJ:</strong> <?= $areaEmpresa[0]->cnpj; ?></p>
            <p style="color: #074656; "><strong>Área:</strong> <?= $areaEmpresa[0]->area_nome; ?></p>
            <p style="color: #074656; "><strong>Estado:</strong> <?= $areaEmpresa[0]->estado; ?></p>
            <p style="color: #074656; "><strong>Cidade:</strong> <?= $areaEmpresa[0]->cidade; ?></p>
            <p style="color: #074656; "><strong>Telefone:</strong> <?= $areaEmpresa[0]->telefone; ?></p>
                    </ul>
                  </div>
                </aside>
              </div>
              <div class="col-md-8">
                <div class="blog-archive-left">
                  <!-- Start blog news single -->



                  <section  id="pricing-table" style="    padding: 0px 0;" >

    <div class="container"  >

      <div class="row" style="margin-top: -28px">

        <div class="col-md-12">
          <div class="pricing-table-content">
            <div class="row">


            <!-- se estiver na pagina inicial faça isso -->
           <?php if ($this->uri->segment(4) == 'cadastra_vaga'): ?>

<?php $this->load->view('empresa/cadastra_vaga'); ?>


<!-- se a pagina requerida for do perfil -->
<?php elseif ($this->uri->segment(4) == 'meu_perfil'): ?>

<?php $this->load->view('empresa/meu_perfil'); ?>

<!-- se a página requerida for curriculos recebidos -->
<?php elseif ($this->uri->segment(4) == 'curriculum_recebido'): ?>

<?php $this->load->view('empresa/curriculum_recebido'); ?>

<!-- se a página requerida for planos -->
<?php elseif ($this->uri->segment(4) == 'planos'): ?>

<?php $this->load->view('empresa/planos'); ?>

<!-- se a página requerida for pedidos -->
<?php elseif ($this->uri->segment(4) == 'pedidos'): ?>

<?php $this->load->view('empresa/pedidos'); ?>

<!-- se a página requerida for pedidos -->
<?php elseif ($this->uri->segment(4) == 'mensagens'): ?>

<?php $this->load->view('empresa/mensagens'); ?>

<!-- se a página requerida for pedidos -->
<?php elseif ($this->uri->segment(4) == 'contato'): ?>

<?php $this->load->view('empresa/contato'); ?>

<!-- se a página requerida for das compras realizadas pela empresa -->
<?php elseif ($this->uri->segment(4) == 'compras_aprovadas'): ?>

<?php $this->load->view('empresa/compras_aprovadas'); ?>


<?php endif; ?>


            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


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
                    <!-- Start blog search -->

                    <!-- End blog search -->
                  </div>
                  <!-- Start sidebar widget -->

              </div>
              <div class="col-md-8">
                <div class="blog-archive-left">


                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
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
  <!-- End footer -->
  <script type="text/javascript">

var conta = document.querySelectorAll('.infoModal').length;
var carrinhoTotal = 0;
        //var prods = []; // array para guardar os valores clicados
        //esse setInterval é importante para que o sistema detecte que houve alterações nos resultados
        $(document).ready(function() {
            $valorInicial = "<?= base_url('empresa/login/logado'); ?>";
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
                        $(this).html('Selecionado');
                        $('#carrinho_total').html(++carrinhoTotal);
                    }
                    // converte a array em string com os valores separados por barras
                    // e insere no href do link de analisar candidatos
                    $("#produtos").attr('href', prods.join("/"));
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script>

//PEGA QUANTIDADE TOTAL DE MENSAGENS NÃO LIDAS
var reloadMSGTotais_ = setInterval(reloadMSGTotais, 1000);
function reloadMSGTotais () {

<?php $quantTotais =  base_url("empresa/login/mensagensNaoLidasTotais_/"); ?>

$.get('<?= $quantTotais ?>', function (data) {

if(parseInt(data) != parseInt($("span.totais").val())) {
$(".totais").text(data);
}

});

}



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
'<tb><img width="20" height="20" style="margin-right: 20px; margin-left: 5px; " src="https://connectionrh.com.br/assets/candidato/foto_candidato/'
+ data.foto_candidato + '"/>' + '' + data.nome + ' </br> Curso: ' + data.nome_curso + ' </td>'
+ '</table>' + '<video controls="" style="width:300px; height:220px">' +
'<source src="https://connectionrh.com.br/assets/candidato/video_editado/'
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
url: "../../endereco?id=" + id,
success: function(resultado) {
callback(resultado);
}
});
}




        // Carregar todos os endereços que estão no BD
        // Puxar todos os endereços e jogar em um XML e a partir dele povoar o mapa



        // Laço para exibir os itens




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




   <script>
        $(function(){

	//ATUALIZA A SELEÇÃO DE CURSOS AO SELECIONAR UMA AREA (CADASTRO DE VAGAS)

	$("#area").bind("change", function(){
		var area = $("#area").val();

		     $.ajax({
		      type: "GET",
		      dataType: "json",
		      url: "https://connectionrh.com.br/empresa/login/pegaCursoPorId/"+area, //Relative or absolute path to response.php file
		      success: function(data) {
		        $("#curso").html("");
		      	$.each(data, function(key, item){
		      		$("#curso").append("<option value='"+item["curso_id"]+"'>"+ item["nome_curso"] +"</option>");
		      	})

		      }
		    });

		})

	})

        </script>

  </body>
</html>

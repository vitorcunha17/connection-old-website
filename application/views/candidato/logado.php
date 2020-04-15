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

    <style type="text/css">



        .bloco {
            width: 80%;
            margin: 0 auto;
            background: #FFF;
            padding: 10px;
            top: 3px;
            position: relative;
            box-shadow: 0 0 30px #777
        }

        .bloco>h1 {
            font-size: 16px;
            text-transform: uppercase;
            color: #66BB6A
        }

        input {
            font-size: 18px;
            color: #454545;
            padding: 15px;
            border-bottom: 1px solid #eee;
            border-left: none;
            border-top: none;
            border-right: none;
            display: block;
            margin: 10px 0;
            width: 100%;
            outline: none
        }

        .bloco-select {
            display: flex
        }

        div > div {
    display: inline-block;
}

        .bloco>.bloco-select>select {
            flex: 1;
            margin: 5px;
            padding: 5px;
            border-radius: 30px;
            color: #454545;
            outline: none
        }

        .select {
            display: flex
        }

        .bloco>.select>select {
            flex: 1;
            margin: 15px 0;
            padding: 15px;
            border-radius: 30px;
            color: #454545;
            outline: none
        }

        .bloco>.botoes {
            display: flex;
            flex-direction: row;
            justify-content: space-between
        }

        .bloco>.botoes>a {
            display: block;
            padding: 15px;
            text-decoration: none;
            position: relative;
            background: #66BB6A;
            width: 150px;
            text-align: center;
            color: #2E7D32;
            border-radius: 30px;
            margin: 10px 0
        }

        .bloco>.botoes>.inicioLink {
            left: 325px
        }

        .info-upload {
            background: #0f4658;
            margin: 10px;
            color: #fff
        }

        .info-upload>p {
            padding: 2px 10px
        }

        .info-upload>p:first-child {
            padding: 15px 10px
        }

        /* PARTES */
        .parte2,


        .ativo {
            color: #66bb6a;
        }

        .desligado {
            color: red;
        }
    </style>

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            //PEGA DURAÇÃO DO VÍDEO
            var tamanho_maximo = 10; //tamanho maximo do upload permitido
            var duracao_maxima = 120; //120 é igual a 2 minutos
            var duracao_atual = 0; //duração do video que foi carregado
            var myVideos = [];
            window.URL = window.URL || window.webkitURL;
            document.getElementsByClassName('arquivoVideo')[0].onchange = setFileInfo;

            function setFileInfo() {
                var files = this.files;
                myVideos.push(files[0]);
                var video = document.createElement('video');
                video.preload = 'metadata';

                video.onloadedmetadata = function() {
                    window.URL.revokeObjectURL(video.src);
                    var duration = video.duration;
                    myVideos[myVideos.length - 1].duration = duration;
                    updateInfos();
                }

                video.src = URL.createObjectURL(files[0]);
            }

            function updateInfos() {
                var infos = document.getElementById('infos');
                infos.textContent = "";
                for (var i = 0; i < myVideos.length; i++) {
                    //infos.textContent += myVideos[i].name + " duration: " + myVideos[i].duration + '\n';

                    //VERIFICA A DURAÇÃO DO VIDEO
                    if (myVideos[i].duration <= duracao_maxima) {

                        $(".duracaoVideo").addClass("ativo");
                        $(".duracaoVideo").removeClass("desligado");

                    } else {

                        $(".duracaoVideo").removeClass("ativo");
                        $(".duracaoVideo").addClass("desligado");
                        //alert("Vídeo invalido. O vídeo precisa ter no máximo 2minutos de duração")

                    }

                    //VERIFICA O TIPO ARQUIVO
                    if (myVideos[i].type == "video/mp4") {

                        $(".formatoVideo").addClass("ativo");
                        $(".formatoVideo").removeClass("desligado");

                    } else {
                        $(".formatoVideo").removeClass("ativo");
                        $(".formatoVideo").addClass("desligado");
                        //alert("O vídeo precisa ter o formato MP4")
                    }

                    //VERIFICA O TAMANHO O VIDEO
                    if ((myVideos[i].size / (1024 * 1024)).toFixed(2) <= tamanho_maximo) {

                        $(".tamanhoVideo").addClass("ativo");
                        $(".tamanhoVideo").removeClass("desligado");
                        //console.log("vídeo permitido")
                    } else {
                        $(".tamanhoVideo").removeClass("ativo");
                        $(".tamanhoVideo").addClass("desligado");
                        //console.log("vídeo muito grande")
                    }

                }
            }



            //ENVIA OS DADOS
                var bar = $('.bar');
                var percent = $('.porcentagem');
                var status2 = $('#status2');

                $('form').ajaxForm({
                    beforeSend: function() {
                        status2.empty();
                        var percentVal = '0%';
                        bar.width(percentVal);
                        percent.html(percentVal);
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                        var percentVal = percentComplete + '%';
                        bar.width(percentVal);
                        percent.html(percentVal);
                    },
                    complete: function(xhr) {

                       if(xhr.responseText == true) {
                        window.location.href = "<?= base_url('candidato/login/logado'); ?>";
                      }else {
                        status2.html(xhr.responseText);
                      }
                    }
                });




            //PARTE 1
            var $parte1 = $(".parte1")
            var $btn1 = $(".btn1")
            var $pais = $(".pais")
            //PARTE 2
            var $parte2 = $(".parte2")
            var $btn2 = $(".btn2")
            var $voltar2 = $(".voltar2")
            var $nome = $(".nome")
            var $cpf = $(".cpf")
            var $cep = $(".cep")
            var $estado = $(".estado")
            var $cidade = $(".cidade")
            var $bairro = $(".bairro")
            var $rua = $(".rua")
            var $telefone = $(".telefone")
            var $numero_residencia = $(".numero_residencia")
            var $pcd = $(".pcd")
            var $curso = $(".curso")
            var $status_curso = $(".status_curso")

            //MASCARAS PARTE 2
            $cpf.mask('000.000.000-00', {
                reverse: true
            });
            $cep.mask("99999-999");
            $telefone.mask("(00) 0000-00009");

            //FUNÇÃO PARTE 1
            $btn1.click(function(e) {

                if ($pais.val() == null || $pais.val() == undefined || $pais.val() < 1) {

                    alert("Selecione seu país.")

                } else {

                    if ($pais.val() == "Brasil") {

                        $estado.hide();
                        $cidade.hide();
                        $bairro.hide();
                        $rua.hide();

                        console.log("Brasil")

                    } else {

                        $estado.show();
                        $cidade.show();
                        $bairro.show();
                        $rua.show();

                        console.log("Não é Brasil")

                    }
                    $parte1.hide();
                    $parte2.show();

                }
                 e.preventDefault();
            });

            //FUNÇÃO PARTE 2
            $voltar2.click(function(e) {

                e.preventDefault();
                $parte1.show();
                $parte2.hide();

            });

            $(".proximo2").click(function(e) {

                e.preventDefault();
                if (
                    $(".nome").val().length > 0 &&
                    $(".cpf").val().length > 0 &&
                    $(".cep").val().length > 0 &&
                    $(".estado").val().length > 0 &&
                    $(".cidade").val().length > 0 &&
                    //bairro e rua serão verificados a parte, isso porque nem todo cep tem isso
                    $(".telefone").val().length > 0 &&
                    $(".numero_residencia").val().length > 0 &&
                    $(".pcd").val().length > 0 &&
                    $(".curso").val().length > 0 &&
                    $(".situacao_curso").val().length > 0
                ) {
                    $(".parte3").show();
                    $parte2.hide();
                } else {
                    alert("Preencha todos os campos corretamente.")
                }

            })


            //FUNCAO PARTE 3

            $(".voltar3").click(function(e) {

                e.preventDefault();
                $parte2.show();
                $(".parte3").hide();

            })

            $(".finalizar").click(function(e) {

                e.preventDefault();

                //verifica se todos os requisitos do vídeo estão corretos
                if(
                  $(".tamanhoVideo").hasClass("ativo") &&
                  $(".duracaoVideo").hasClass("ativo") &&
                  $(".formatoVideo").hasClass("ativo")

                  ) {

                  $('form').submit();


                  console.log("OK")
                }else {
                  console.log("NÂO TA OK")
                }

            })


            //BLOQUEIA O ENVIO DOS DADOS COM ENTER
            $('input').keypress(function(e) {
                if(e.which == 13) {
                  e.preventDefault();
                  console.log('Não vou enviar');
                }
            });

            //Pega os dados atraves do CEP (só funciona se o país for Brasil)

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $rua.val("");
                $bairro.val("");
                $cidade.val("");
                $estado.val("");
            }

            $('.cep:input').on('propertychange input', function(e) {

                if ($pais.val() == "Brasil") {
                    //Quando o campo cep perde o foco.
                    $cep.blur(function() {

                        //Nova variável "cep" somente com dígitos.
                        var cep = $(this).val().replace(/\D/g, '');

                        //Verifica se campo cep possui valor informado.
                        if (cep != "") {

                            //Expressão regular para validar o CEP.
                            var validacep = /^[0-9]{8}$/;

                            //Valida o formato do CEP.
                            if (validacep.test(cep)) {

                                //Preenche os campos com "..." enquanto consulta webservice.
                                $rua.val("...");
                                $bairro.val("...");
                                $cidade.val("...");
                                $estado.val("...");

                                //Consulta o webservice viacep.com.br/
                                $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                                    if (!("erro" in dados)) {
                                        //Atualiza os campos com os valores da consulta.
                                        $rua.val(dados.logradouro);
                                        $bairro.val(dados.bairro);
                                        $cidade.val(dados.localidade);
                                        $estado.val(dados.uf);
                                    } //end if.
                                    else {
                                        //CEP pesquisado não foi encontrado.
                                        limpa_formulário_cep();
                                        alert("CEP não encontrado.");
                                    }
                                });
                            } //end if.
                            else {
                                //cep é inválido.
                                limpa_formulário_cep();
                                alert("Formato de CEP inválido.");
                            }
                        } //end if.
                        else {
                            //cep sem valor, limpa formulário.
                            limpa_formulário_cep();
                        }
                    });
                }
            });


        })
    </script>



      <script src="<?= base_url('assets/empresa/Buscapaginacao/assets/js/jquery-1.11.3.min.js"'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/empresa/Buscapaginacao/assets/js/jquery-ui-1.10.2.custom.min.js"'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/empresa/Buscapaginacao/assets/js/filter.js"'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/empresa/Buscapaginacao/assets/js/pagination_vagas.js"'); ?>" type="text/javascript"></script>
    <script type="text/javascript">
        window.movies = <?php echo html_entity_decode(json_encode($candidatos, JSON_NUMERIC_CHECK)); ?>;
    </script>



    <!-- Open Sans for body font -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!-- Lato for Title -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/websemantics/bragit/0.1.2/bragit.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/vimeo-upload.js'); ?>"></script>




  </head>
  <body>
  <?php foreach($dados as $dados_user): ?>
        <?php if($dados_user->status == 1 OR $dados_user->status == 4 OR $dados_user->status == 9): ?>

        <?php if($dados_user->status == 1 OR $dados_user->status == 9)  { ?>


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
                    <?= $dados_user->telefone; ?>
                  </div>
                </li>
                <li>
                  <div class="mail">
                    <i class="fa fa-envelope"></i>
                    <?= $dados_user->email; ?>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="header-login" style="margin-left: 448%">
              <a class="login modal-form"   href="<?= base_url('candidato/login/sair'); ?>">Sair</a>
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
          <a class="navbar-brand" href="index.html"> <?= $dados_user->nome; ?></a>
          <!-- IMG BASED LOGO  -->
          <!-- <a class="navbar-brand" href="index.html"><img src="assets/images/logo.png" alt="logo"></a> -->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        <script>localStorage.setItem('idCandidato', <?= $dados_user->id_candidato; ?>);</script>
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <li><a  href="#">Home</a></li>
            <li><a href="#">Empresas</a></li>
            <li><a href="#">Meu Curriculum</a></li>
            <li><a href="#">Vagas</a></li>

            <li><a href="#" >Me Visitaram</a></li>
            <li><a  href="#">recomendacoes</a></li>
            <li><a href="#>">Contato</a></li>
            <li><a   href="<?= base_url('candidato/login/sair'); ?>">Sair</a></li>

          </ul>
        </div><!--/.nav-collapse -->
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
                 <?php if($dados_user->video_nome == NULL OR $dados_user->video_nome == ''): ?>
                  <iframe src="https://player.vimeo.com/video/340295016" width="320" height="240" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                  <?php else: ?>
                  <iframe src="https://player.vimeo.com/video/<?= $dados_user->video_nome ?>" width="320" height="240" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                  <?php endif; ?>
                  </div>
                  <!-- Start sidebar widget -->
                  <div class="sidebar-widget">
                    <h4 class="widget-title">Seus Dados</h4>
                    <ul class="widget-catg">
                      <li><a href="#">Nome: <?= $dados_user->nome; ?></a></li>
                      <li><a href="#">CEP: <?= $dados_user->cep; ?></a></li>
                      <li><a href="#">Estado: <?= $dados_user->estado; ?></a></li>
                      <li><a href="#">Cidade: <?= $dados_user->cidade; ?></a></li>
                      <li><a href="#">Email: <?= $dados_user->email; ?></a></li>
                      <li><a href="#">Fone: <?= $dados_user->telefone; ?></a></li>
                      <li><a href="#">Área: <?= $dados_user->area_nome; ?></a></li>
                      <li><a href="#">Curso: <?= $dados_user->nome_curso; ?></a></li>
                      <li><a href="#">Sexo: <?= $dados_user->sexo; ?></a></li>
                      <li><a href="#">PcD:  <?= $dados_user->pcd; ?></a></li>
                    </ul>
                  </div>

                </aside>
              </div>
              <div class="col-md-8">
                <div class="blog-archive-left">
                  <!-- Start blog news single -->
                  <article class="blog-news-single">


                    <div class="blog-news-details blog-single-details">
                    <?php if($dados_user->status == 9): ?>

                    <section class="bloco parte3">

                          <h1>Envie o seu vídeo-curriculum para ter acesso às vagas:</h1>

                          <div class="info-upload">
                              <p>Envie um vídeo falando um pouco sobre você. Não mencione dados pessoais no vídeo. Ele precisa ter as seguintes caracteristicas:</p>
                              <p class="tamanhoVideo">Tamanho máximo: 10MB</p>
                              <p class="duracaoVideo">Duração máxima: 2 minutos</p>
                              <p class="formatoVideo" id="results"> <div id="tempo"></div></p>

                          </div>

                          <div id="progress-container" class="progress">
                             <div id="progress" class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="46" aria-valuemin="0" aria-valuemax="100" style="width: 0%">&nbsp;0%
                              </div>
                          </div>

                          <div>
                              <div>
                              <input type="file"  id="browse" type="file" name="video">
                              </div>

                          </div>
                          </section>
                          <div id="status2" style="padding: 1px 1px;color: red; display: none"></div>
                          <div id="progress-container" class="progress">
                              <div id="progress" class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="46" aria-valuemin="0" aria-valuemax="100" style="width: 0%">&nbsp;0%
                              </div>
                          </div>

                          <div class="row">
                            <div class="col-md-8">
                              <div class="form-group">
                                  <input type="hidden" name="name" id="videoName" class="form-control" placeholder="Video name" value="<?= $dados_user->nome; ?>"></input>
                              </div>
                              <div class="form-group">
                                  <input type="hidden" name="description" id="videoDescription" class="form-control" placeholder="Video description" value="<?= $dados_user->email; ?>"></input>
                              </div>
                              <div class="checkbox">
                                  <label>
                                      <input type="hidden" id="upgrade_to_1080" name="upgrade_to_1080"></input>
                                  </label>
                              </div>
                              <div class="checkbox">
                                  <label>
                                      <input type="hidden" id="make_private" name="make_private"></input>
                                  </label>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div id="drop_zone"></div>
                            </div>
                          </div>
                      </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript">
        /**
         * Called when files are dropped on to the drop target or selected by the browse button.
         * For each file, uploads the content to Drive & displays the results when complete.
         */
        function handleFileSelect(evt) {
            evt.stopPropagation()
            evt.preventDefault()

            var files = evt.dataTransfer ? evt.dataTransfer.files : $(this).get(0).files
            var results = document.getElementById('results')

            /* Clear the results div */
            while (results.hasChildNodes()) results.removeChild(results.firstChild)

            /* Rest the progress bar and show it */
            updateProgress(0)
            document.getElementById('progress-container').style.display = 'block'

            var count = Number();
            var count = 100;
            var tempo = document.getElementById("tempo");

              function start(){
                if ((count - 1) >= 0){
                  count -= 1;
                  if (count == 0) {
                    count = "Ok! Vamos lá..!   0";
                    document.location.reload(true);
                  }else if(count < 10){
                    count = "0"+count;
                  }
                tempo.innerText="Convertendo Vídeo. Aguarde...  "+count+"%";
                  setTimeout(start, 1000);
                }
              }

            /* Chamando o Vimeo Upload */
            ;(new VimeoUpload({
                name: document.getElementById('videoName').value,
                description: document.getElementById('videoDescription').value,
                private: document.getElementById('make_private').checked,
                file: files[0],
                token: '02b975cf0f6e36e1371adfc47c10fd62',
                upgrade_to_1080: document.getElementById('upgrade_to_1080').checked,
                onError: function(data) {
                    showMessage('<strong>Error</strong>: ' + JSON.parse(data).error, 'danger')
                },
                onProgress: function(data) {
                    updateProgress(data.loaded / data.total)
                },
                onComplete: function(videoId, index) {
                    var url = 'https://vimeo.com/' + videoId

                    if (index > -1) {
                        /* The metadata contains all of the uploaded video(s) details see: https://developer.vimeo.com/api/endpoints/videos#/{video_id} */
                        url = this.metadata[index].link //

                        /* add stringify the json object for displaying in a text area */
                        var pretty = JSON.stringify(this.metadata[index], null, 2)

                        console.log(pretty) /* echo server data */
                    }


                    showMessage('<strong>Video enviado com sucesso!</strong>')

                    $.ajax({
                          type: "POST",
                          data: { videoId },
                          url: "<?= base_url('candidato/Login/insertVideo') ?>",
                          success: function(data) { //Se a requisição retornar com sucesso,
                            start()

                              }
                          });
                }
            })).upload()

            /* local function: show a user message */
            function showMessage(html, type) {
                /* hide progress bar */
                document.getElementById('progress-container').style.display = 'none'

                /* display alert message */
                var element = document.createElement('div')
                element.setAttribute('class', 'alert alert-' + (type || 'success'))
                element.innerHTML = html
                results.appendChild(element)
            }
        }

        /**
         * Dragover handler to set the drop effect.
         */
        function handleDragOver(evt) {
            evt.stopPropagation()
            evt.preventDefault()
            evt.dataTransfer.dropEffect = 'copy'
        }

        /**
         * Updat progress bar.
         */
        function updateProgress(progress) {
            progress = Math.floor(progress * 100)
            var element = document.getElementById('progress')
            element.setAttribute('style', 'width:' + progress + '%')
            element.innerHTML = '&nbsp;' + progress + '%'
        }
        /**
         * Wire up drag & drop listeners once page loads
         */
            document.addEventListener('DOMContentLoaded', function() {
            var dropZone = document.getElementById('drop_zone')
            var browse = document.getElementById('browse')
            dropZone.addEventListener('dragover', handleDragOver, false)
            dropZone.addEventListener('drop', handleFileSelect, false)
            browse.addEventListener('change', handleFileSelect, false)
        })

    </script>

    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-57984417-1', 'auto');
        ga('send', 'pageview');
    </script>





                    <?php endif;  ?>

                    <?php if($dados_user->status == 1): ?>

                    <div class="row">
            <div class="col-md-12">
              <div class="title-area">
                <h2 class="title">Parabéns!  </h2>
                <span class="line"></span>
                <p>Seus dados foram enviados, a equipe Connection vai analisar se está tudo ok. Após o chekout voce poderá enviar seu Vídeo-Curriculum para as empresas e se candidatar nas vagas<p>

                 <i class="far fa-smile fa-7x"></i>
                 <br><br>
              </div>

                 <h3>Vagas em aberto (<span id="total_movies">0</span>)    -   <small> Por página: <span id="per_page" class="content"></span></small></h3>
                            <div class="col-md-6 progress" style="display: none;">
                              </div>
                              <br>
            </div>


          </div>
           <?php endif;  ?>
    </div>
</div>





  <!-- Start Pricing table -->
  <section id="pricing-table" style="margin-top: -65px">
    <div class="container">
      <div class="row">
        <div class="col-md-12" id="movies" style="width: 89%">
          <div class="pricing-table-content">
            <div class="row" >

            <script id="movie-template" type="text/html">
            <div class="col-md-3 col-sm-6 col-xs-12" >
                <div class="single-table-price wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                  <div class="price-header">
                    <span class="price-title"><%= nome_curso %></span>
                    <div class="price">
                    <h4 style="color:#fff"><%= nome_vaga %></h4>
                      <sup class="price-up">     <%= salario_vaga %></sup>
                    </div>
                  </div>
                  <div class="price-article">
                    <ul>
                     <small style="color:#074656">- <%= area_nome %></small><br>
                     <p style="color:#074656">Experiência:</p><small style="color:#f28b32"> <%= experiencia_vaga %></small><br>
                    <small style="color:#074656"> Empresa:</small> <small style="color:#f28b32"><%= empresa_vaga %></small>
                    </ul>
                  </div>
                  <div class="price-footer">


                                <button  class="purchase-btn" data-toggle="modal" data-target="#modal2" id="b2">Enviar curriculum</button>

                        </div>
                        </div>
                    </div>

              </script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--Start  Modal -->
  <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modal2Label" aria-hidden="true" data-trigger="hover">
        <div class="modal-dialog modal-sm modal-right">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>

                    </button>
                     <h4 class="modal-title" id="modal2Label">Sorry!</h4>

                </div>
                <div class="modal-body">Voce só poderá enviar o seu Video-Curriculum após analisarmos se está tudo com suas informaçoes. Após aprovaçao voce poderá enviar seu curriculum e terá acesso a outras funcionalidades também.
                <br>Aradecemos a compreensao.
                <br><br>-Connection!</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
               </div>
        </div>
    </div>

<!-- End #myModal -->
   <script type="text/javascript">
   $("#b2").hover(function () {
    $('#modal2').modal({
        show: true,
        backdrop: false
    })
});
  </script>
<div id="pagination" class="movies-pagination col-md-9"></div>


<script id="genre_template" type="text/html">
    <div class="checkbox">
        <label>
            <input type="checkbox" value="<%= area_nome %>"> <%= area_nome %>
        </label>
    </div>
</script>





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
            <a href="index.html"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-google-plus"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- End footer -->
  <?php }elseif($dados_user->status == 4 OR $dados_user->status == 5) { ?>
    <!-- BEGAIN PRELOADER -->
  <div id="preloader">
    <div id="status"></div>
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
                    <?= $dados_user->telefone; ?>
                  </div>
                </li>
                <li>
                  <div class="mail">
                    <i class="fa fa-envelope"></i>
                    <?= $dados_user->email; ?>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="header-login">
              <a class="login modal-form"   href="<?= base_url('candidato/login/aceito/edicao'); ?>">Editar Perfil</a>
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
          <a class="navbar-brand" href="index.html"> <?= $dados_user->nome; ?></a>

          <!-- IMG BASED LOGO  -->
          <!-- <a class="navbar-brand" href="index.html"><img src="assets/images/logo.png" alt="logo"></a> -->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        <script>localStorage.setItem('idCandidato', <?= $dados_user->id_candidato; ?>);</script>
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <li><a  href="<?= base_url('candidato/login/aceito/'); ?>">Home</a></li>
            <li><a href="#">Empresas</a></li>
            <li><a href="#">Meu Curriculum</a></li>
            <li><a href="#">Vagas</a></li>

            <li><a href="#" >Me Visitaram</a></li>
            <li><a  href="#">recomendacoes</a></li>
            <li><a href="#">Contato</a></li>
          </ul>
        </div><!--/.nav-collapse -->
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
                  <iframe src="https://player.vimeo.com/video/340122995" width="320" height="240" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                  </div>
                  <!-- Start sidebar widget -->
                  <div class="sidebar-widget">
                    <h4 class="widget-title">Seus Dados</h4>
                    <ul class="widget-catg">
                      <li><a href="#">Nome: <?= $dados_user->nome; ?></a></li>
                      <li><a href="#">CEP: <?= $dados_user->cep; ?></a></li>
                      <li><a href="#">Estado: <?= $dados_user->estado; ?></a></li>
                      <li><a href="#">Cidade: <?= $dados_user->cidade; ?></a></li>
                      <li><a href="#">Email<?= $dados_user->email; ?></a></li>
                      <li><a href="#">Fone: <?= $dados_user->telefone; ?></a></li>
                      <li><a href="#">Área: <?= $dados_user->area_nome; ?></a></li>
                      <li><a href="#">Curso: <?= $dados_user->nome_curso; ?></a></li>
                      <li><a href="#">Sexo: <?= $dados_user->sexo; ?></a></li>
                      <li><a href="#">PcD:  <?= $dados_user->pcd; ?></a></li>
                    </ul>
                  </div>

                </aside>
              </div>
              <div class="col-md-8">
                <div class="blog-archive-left">
                  <!-- Start blog news single -->
                  <article class="blog-news-single">


                    <div class="blog-news-details blog-single-details">






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


    <?php } ?>



  <?php elseif($dados_user->status == 2): redirect(base_url('/candidato/login/aceito'));/* else: redirect(base_url('/candidato/login')); */ elseif($dados_user->status ==3): ?>

                <?php $this->load->view('candidato/candidato_recusado', ['dados_user' => $dados_user]); ?>


<!-- CASO O CANDIDATO TENHA SIDO "COMPRADO" POR ALGUMA EMPRESA -->
        <?php elseif($dados_user->status == 5): redirect("candidato/login/chat") ?>

<?php endif; ?>

<?php endforeach; ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
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

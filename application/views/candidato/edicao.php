<body>

    <div class="theiaStickySidebar">

        <section class="expertise-wrapper section-wrapper gray-bg">
            <?php
            if ($this->session->flashdata('msg')): echo $this->session->flashdata('msg');
            endif;
            ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>Expertise</h2>
                        </div>
                    </div>
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <form method="post"  accept-charset="utf-8" action="<?= base_url('candidato/login/cadastraPontoForte_') ?>" class="cadastraPontoForte">
                                
                                <div class="form-group">
                                    <input class="form-control" type="text" value=""
                                           name="conteudo" minlength="5" maxlength="100" placeholder="Ex.: Tenho Carteira de Habilitação D" required>
                                </div>
                                <br>
                                <button   type="submit" class="btn btn-info">Salvar</button>
                            </form>
                        </div>
                        <blockquote>
                            <?php foreach($pontoForte as $pontoForte_) { ?>
                       
                                  <h5>
                                  <?= $pontoForte_->conteudo ?>  
                                  
                                   <a class="infoModal" onclick="myFunction()" data-toggle="modal" data-target="#myModal" style="margin-left: 10px" class="login modal-form" data-target="#abriModalEditPontoForte" data-toggle="modal">
                                 <input type="hidden" name="id_pontoForte_editar" id="id_expertise"   value="<?= $pontoForte_->id ?>">  
                                 <input type="hidden" name="valor" value="<?= $pontoForte_->conteudo ?>">  
                                  <img src="https://img.icons8.com/ios/16/000000/multi-edit.png">
                                  </a>

                                   <a style="margin-left: 10px" class="login modal-form" data-target="#abriModalEditPontoForte" data-toggle="modal">
                                 <input type="hidden" name="id_pontoForte_excluir" value="<?= $pontoForte_->id ?>">  
                                 <img src="https://img.icons8.com/metro/16/000000/delete-sign.png"></a>
                                  
                                  </h5>
                        
                                 
                        <br>
                            <?php } ?>
                        </blockquote>
                    </div>
                </div>
                <hr style="    border-top: 3px solid #074656;">
        </section>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                                                                                                                                                    <div class="modal-dialog">
                                                                                                                                                                                                        <div class="modal-content">
                                                                                                                                                                                                            <div class="modal-header">
                                                                                                                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                                                                                                                                                                <h4 class="modal-title" id="myModalLabel"></h4>
                                                                                                                                                                                                                <p class="cursoModalexibe"></p>
                                                                                                                                                                                                                
                                                                                                                                                                                                            </div>

                                                                                                                                                                                                            <div class="modal-body">
                                                                                                                                                                                                            <p> <a class="blog-author" href="#">  <input id="input" nome="pontoforte" value=""></a> <span class="blog-date">|18 October 2015</span></p>
                                                                                                                                                                                                            </div>

                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                  </div>    
                                                                                                                                                                                                    </div>  
                              
                                    <!-- Inicio modal -->
                                    <script>
                        function myFunction() {
                           var  id = document.getElementById("id_expertise").value;
                     
                           document.getElementById("input").value = id;
                        }
                            </script>
                     <script>
                     //Modal que exibe o vídeo do candidato ao seleciona-ló 
                      var id = $("#id");
                    id.focusout( function(){
                        alert(id.val());
                    });
                $('#myModal').on('shown.bs.modal', function() {
                  
                })

                     </script>

                        <div aria-hidden="false" role="dialog" tabindex="-1" id="abriModal" class="modal leread-modal fade in" >
                             <div class="modal-dialog">
                                <!-- Start login section -->
                                <div id="quemsou" class="modal-content">
                                    <div class="modal-header">
                                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">Editar</h4>
                                    </div>
                                    <div class="modal-body">
                                    <form method="post" action="http://www.connectionrh.com.br/candidato/login/aceito">
                                        <div class="form-group">
                                        <p><textarea rows="10" cols="35" type="text" name="quemsou" value="Sou um profissional consciente, capaz de trabalhar em equipe ou individualmente. Dinâmico de fácil adaptação a mudanças, possuo bom humor, dinamismo, perfeccionismo, auto-exigência, dedicação ao trabalho e bom relacionamento em geral"> Sou um profissional consciente, capaz de trabalhar em equipe ou individualmente. Dinâmico de fácil adaptação a mudanças, possuo bom humor, dinamismo, perfeccionismo, auto-exigência, dedicação ao trabalho e bom relacionamento em geral</textarea></p>
                                        </div>
                                        <input type="hidden" name="quemsou" value="Sou um profissional consciente, capaz de trabalhar em equipe ou individualmente. Dinâmico de fácil adaptação a mudanças, possuo bom humor, dinamismo, perfeccionismo, auto-exigência, dedicação ao trabalho e bom relacionamento em geral" required="">
                                        <div class="loginbox">
                                        <button class="btn signin-btn" type="submit">Confirmar</button>
                                        </div>                    
                                    </form>
                                    </div>
                                </div>
                            </div>
                      </div>
                                   <!-- Fim Modal -->

        <section class="section-wrapper skills-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>Cursos - Status de Conclusão</h2>
                        </div>
                    </div>

                </div>

                <form action="<?= base_url('candidato/login/cadastraHabilidade_'); ?>" method="post" class="cadastraHabilidade">
                <div class="row">
                    <div class="col-md-12">
                        <div class="progress-wrapper">

                        <div class="form-group">
                               <input style="width: 50%"class="form-control campo1" type="text"  value="" name="curso"  placeholder="Informe o Curso" id="curso" required>
                                <input style="width: 50%"class="form-control" type="text"   value="" name="porcentagem" placeholder="Informa a porcentagem de conclusao. Ex.: 62%" id="porcentagem" required>

                                

                             <br>
                                <!-- .progress -->
                            </div>
                            <!-- .skill-progress -->
                            <blockquote>
                            <?php foreach($habilidade as $habilidade_) { ?>
                           
                                <h5><?= $habilidade_->titulo ?></h5>

                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                         aria-valuemax="100" style="width: <?= $habilidade_->porcentagem ?>%"><span class="progress-percent"><?= $habilidade_->porcentagem ?>% concluído</span>
                                    </div>
                                </div>
                           
                            <?php } ?>
                            </blockquote>
                            <!-- /.skill-progress -->

                        </div>
                        <!-- /.progress-wrapper -->
                    </div>
                </div>
                <button class="btn btn-info" type="submit">Salvar</button>
                </form>

                <!--.row -->
            </div>
            <hr style="    border-top: 3px solid #074656;">
        </section>
        <!-- .skills-wrapper -->

        <section class="section-wrapper section-experience gray-bg">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title"><h2>Experiência Profissional </h2></div>
                    </div>
                </div>
                <!--.row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="content-item">
                            <form action="<?= base_url('candidato/login/cadastraExperiencia_'); ?>" method="post" class="cadastraExperiencia">
                            <small><input class="form-control" type="text"  style="height: 27px; width: 200px;"  value="" name="periodo" placeholder="Período - Ex.: 2010-2018" id="telefone" required></small>
                            <h3><input class="form-control" type="text"  style="height: 32px; width: 350px; margin-top: 10px;"  value="" name="cargo" placeholder="Exemplo: Analista de Sistemas" id="telefone" required></h3>
                            <h4><input class="form-control" type="text"  style="height: 32px; width: 360px;"  value="" name="empresa" placeholder="Nome da Empresa - Ex.: Google" id="telefone" required></h4>

                            <p><input class="form-control" type="text"  style="height: 32px; width: 360px; margin-top: 10px;"  value="" name="local" placeholder="Local - Ex.: Curitiba, PR" id="telefone" required></p>
                            <button class="btn btn-info" type="submit">Salvar</button>
                        </form>
                        </div>

                        <blockquote>
                        <?php foreach($experiencia as $experiencia_) { ?>
                                <small><?= $experiencia_->dataReferencia ?></small>
                                <h3><?= $experiencia_->titulo ?></h3>
                                <h4><?= $experiencia_->empresa ?></h4>

                                <p><?= $experiencia_->cidadeEstado ?></p>
                            <?php } ?>
                        </blockquote>
                        <!-- .experience-item -->
                    </div>
                </div>
                <!--.row-->
            </div>
            <!-- .container-fluid -->
            <hr style="    border-top: 3px solid #074656;">
        </section>
        <!-- .section-experience -->

        <section class="section-wrapper section-education">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title"><h2>Educação</h2></div>
                    </div>
                </div>
                <!--.row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="content-item">

                            <!-- .experience-item -->
                            <form action="<?= base_url('candidato/login/cadastraEducacao_'); ?>" method="post" class="cadastraEducacao">
                                <div class="content-item">
                                    <input class="form-control" type="text"  style="height: 27px; width: 200px;"  value="" name="periodo" placeholder="Período - Ex.: 2010-2018" id="telefone" required>
                                    <h3><input class="form-control" type="text"  style="height: 32px; width: 350px; margin-top: 10px;"  value="" name="curso" placeholder="Exemplo: Execel Avançado" id="telefone" required></h3>
                                    <h4><input class="form-control" type="text"  style="height: 32px; width: 360px;"  value="" name="empresa" placeholder="Nome da Empresa - Ex.: Elaborata Cursos" id="telefone" required></h4>
                                    <p><input class="form-control" type="text"  style="height: 32px; width: 360px; margin-top: 10px;"  value="" name="local" placeholder="Local - Ex.: Curitiba, PR" id="telefone" required></p>
                                </div>
                                <button class="btn btn-info" type="submit">Salvar</button>
                            </form>
                           
                            <blockquote>
                            <?php foreach($educacao as $educacao_) { ?>
                                <small><?= $educacao_->dataReferencia ?></small>
                                <h3><?= $educacao_->curso2 ?></h3>
                                <h4><?= $educacao_->instituicao ?></h4>
                                <p><?= $educacao_->cidadeEstado2 ?></p>
                            <?php } ?>
                            </blockquote>
                            <!-- .experience-item -->
                        </div>
                    </div>
                    <!--.row-->
                </div>
                <!-- .container-fluid -->
                <hr style="    border-top: 3px solid #074656;">
        </section>
        <!-- .section-education -->

        <section class="section-wrapper section-interest gray-bg">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>Interessante</h2>
                        </div>
                    </div>
                </div>
                <!-- .row -->

                <div class="row">
                    <div class="col-md-12">

                        <!-- INTERESSES -->
                        <form action="<?= base_url('candidato/login/cadastraInteresses_'); ?>" method="post" class="cadastraInteresses">
                        <div class="content-item">
                            <h3><input class="form-control" type="text"  style="height: 32px; width: 190px; margin-top: 10px;"  value="" name="titulo" placeholder="Exemplo: Livros" id="telefone" required></h3>

                            <input class="form-control" type="text"  style="height: 100px; margin-top: 10px;"  value="" name="conteudo" placeholder='Uma breve descrição que descreva seu interesse'  id="telefone" required>
                        </div>
                        <button class="btn btn-info" type="submit">Salvar</button>
                        </form>

                        <blockquote>
                        <?php foreach($interesses as $interesse) { ?>
                            <small><?= $interesse->titulo ?></small>
                            <p><?= $interesse->conteudo ?></p>
                        <?php } ?>
                        </blockquote>
                    </div>
                </div>
                <!-- .row -->

            </div>
             <hr style="    border-top: 3px solid #074656;">
        </section>
        <!-- .section-publications -->

        <section class="section-wrapper portfolio-section"id="portfolio">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>Portfolio</h2>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-12">
                        <form action="<?= base_url('candidato/login/cadastraPortfolio_'); ?>" method="post" class="cadastraPortfolio" style="margin-bottom: 15px">
                        <div class="content-item">
                            
                            <p><input class="form-control" type="text"  style="height: 32px; width: 360px; margin-top: 10px;"  value="" name="nome" placeholder="Nome" required></p>

                            <p><input class="form-control" type="text"  style="height: 32px; width: 360px; margin-top: 10px;"  value="" name="url" placeholder="URL (esse campo pode ficar em branco)" required></p>

                            <input class="form-control" type="file"  style="height: 80px;  width: 360px;margin-top: 10px;display: block"  value="" name="arquivo" required>
                        </div>
                        <button class="btn btn-info" type="submit">Salvar</button>
                        </form>
                    </div>
                    <section id="portfolio" style="padding: 0px 0;">
                        <div class="portfolio-area">
                        <div id="mixit-container" class="portfolio-container">
                            <?php foreach($portfolio as $portfolio_) { ?>
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
                </div>
            </div>
            <hr style="    border-top: 3px solid #074656;">
        </section>
        <!-- .portfolio -->

        <section class="section-contact section-wrapper gray-bg">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>Informações Pessoais</h2>
                        </div>
                    </div>
                </div>
                <!--.row-->
                <div class="row">
                    <div class="col-md-12">
                        <address>
                            <strong>Endereço</strong><br>
                            <?= @$dados[0]->num; ?>, <?= @$dados[0]->rua; ?><br>
                            <?= @$dados[0]->cidade; ?>, <?= @$dados[0]->estado; ?>

                        </address>
                        <address>
                            <strong>Mobile - Numero</strong><br>
                            <?= $dados[0]->telefone; ?>
                        </address>

                        <address>
                            <strong>Sexo</strong><br>
                            <?= $dados[0]->sexo; ?>
                        </address>


                        <address>
                            <strong>Email</strong><br>
                            <a href="mailto:#"> <?= $dados[0]->email; ?></a>
                        </address>
                    </div>
                </div>
                <!--.row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="feedback-form">
                            <h2>Entrar em Contato</h2>

                            <form id="contactForm" action="sendemail.php" method="POST">
                                <div class="form-group">
                                    <label for="InputName">Nome</label>
                                    <input type="text" name="name" required="" class="form-control" id="InputName"
                                           placeholder="Informe seu nome">
                                </div>
                                <div class="form-group">
                                    <label for="InputEmail">Email </label>
                                    <input type="email" name="email" required="" class="form-control" id="InputEmail"
                                           placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="InputSubject">Assunto</label>
                                    <input type="text" name="subject" class="form-control" id="InputSubject"
                                           placeholder="Contratação, Entrevista Pessoal, Discutir Salário">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="control-label">Messagem</label>
                                    <textarea class="form-control" rows="4" required="" name="message" id="message-text"
                                              placeholder="Conteúdo"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </form>
                        </div>
                        <!-- .feedback-form -->


                    </div>
                </div>
            </div>
            <hr style="    border-top: 3px solid #074656;">
        </section>
        <!--.section-contact-->

        <footer class="footer">
            <div class="copyright-section">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copytext">&copy; Connection | 2019 <a
                                    href="#">RH 4.0</a></div>
                        </div>
                    </div>

                </div>

            </div>

        </footer>

    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <script type="text/javascript">

        //CADASTRA INTERESSES
        $('.cadastraInteresses').ajaxForm({
            beforeSend: function() {
            },
            uploadProgress: function(event, position, total, percentComplete) {
            },
            complete: function(xhr) {

                window.location.reload();

            }
        });


        //CADASTRA EDUCAÇÃO
        $('.cadastraEducacao').ajaxForm({
            beforeSend: function() {
            },
            uploadProgress: function(event, position, total, percentComplete) {
            },
            complete: function(xhr) {

                window.location.reload();

            }
        });

        //CADASTRA EXPERIENCIA
        $('.cadastraExperiencia').ajaxForm({
            beforeSend: function() {
            },
            uploadProgress: function(event, position, total, percentComplete) {
            },
            complete: function(xhr) {

                window.location.reload();

            }
        });

        //CADASTRA HABILIDADE
        $('.cadastraHabilidade').ajaxForm({
            beforeSend: function() {
            },
            uploadProgress: function(event, position, total, percentComplete) {
            },
            complete: function(xhr) {

                window.location.reload();

            }
        });

        //CADASTRA PONTO FORTE
        $('.cadastraPontoForte').ajaxForm({
            beforeSend: function() {
            },
            uploadProgress: function(event, position, total, percentComplete) {
            },
            complete: function(xhr) {

                window.location.reload();

            }
        });

        //CADASTRAPORTFOLIO
        $('.cadastraPortfolio').ajaxForm({
            beforeSend: function() {
            },
            uploadProgress: function(event, position, total, percentComplete) {
            },
            complete: function(xhr) {

                window.location.reload();

            }
        });

        //ACEITA APENAS NÚMEROS DE 0 A 100 NA PORCENTAGEM
        $('#porcentagem').on('keyup', function(event) {
          var valorMaximo = 100;
            
          $(this).val(this.value.replace(/\D/g, ''));
          
          if (event.target.value > valorMaximo)
            return event.target.value = valorMaximo;
        });


    </script>

</body>
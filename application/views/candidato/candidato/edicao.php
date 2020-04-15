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
                        <div class="form-group row">
                            <form method="post"  accept-charset="utf-8" action="<?= base_url('candidato/login/enviaPontoForte') ?>">
                                <div class="col-md-6 offset-md-3">
                                    <?= validation_errors(); ?>
                                </div>
                                <div class="expertise-item">
                                    <input class="form-control" type="text" value="<?= set_value('titulo1'); ?>"
                                           name="titulo1" minlength="5" maxlength="100" placeholder="Ex.: Tenho Carteira de Habilitação D" id="titulo1" required>
                                    <p>
                                        <input class="form-control" type="text"  value="<?= set_value('conteudo1'); ?>"
                                               name="conteudo1"  placeholder="Exemplo: Sou um excelente motorista" id="conteudo1" required>
                                        <input name="id" type="hidden" id="id" value="1" />
                                    </p>
                                </div>
                                <button   type="submit" class="btn btn-info">Salvar</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="expertise-item">
                            <form method="post"  accept-charset="utf-8" action="<?= base_url('candidato/login/enviaPontoForte') ?>">
                                <div class="col-md-6 offset-md-3">
                                    <?= validation_errors(); ?>
                                </div>
                                <div class="expertise-item">
                                    <input class="form-control" type="text" value="<?= set_value('titulo1'); ?>"
                                           name="titulo1" minlength="5" maxlength="100" placeholder="Ex.: Tenho Carteira de Habilitação D" id="titulo1" required>
                                    <p>
                                        <input class="form-control" type="text"  value="<?= set_value('conteudo1'); ?>"
                                               name="conteudo1"  placeholder="Exemplo: Sou um excelente motorista" id="conteudo1" required>
                                        <input name="id" type="hidden" id="id" value="2" />
                                    </p>
                                </div>
                                <button   type="submit" class="btn btn-info">Salvar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <form method="post"  accept-charset="utf-8" action="<?= base_url('candidato/login/enviaPontoForte') ?>">
                                <div class="col-md-6 offset-md-3">
                                    <?= validation_errors(); ?>
                                </div>
                                <div class="expertise-item">
                                    <input class="form-control" type="text" value="<?= set_value('titulo1'); ?>"
                                           name="titulo1" minlength="5" maxlength="100" placeholder="Ex.: Tenho Carteira de Habilitação D" id="titulo1" required>
                                    <p>
                                        <input class="form-control" type="text"  value="<?= set_value('conteudo1'); ?>"
                                               name="conteudo1"  placeholder="Exemplo: Sou um excelente motorista" id="conteudo1" required>
                                        <input name="id" type="hidden" id="id" value="3" />
                                    </p>
                                </div>
                                <button   type="submit" class="btn btn-info">Salvar</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="expertise-item">
                            <form method="post"  accept-charset="utf-8" action="<?= base_url('candidato/login/enviaPontoForte') ?>">
                                <div class="col-md-6 offset-md-3">
                                    <?= validation_errors(); ?>
                                </div>
                                <div class="expertise-item">
                                    <input class="form-control" type="text" value="<?= set_value('titulo1'); ?>"
                                           name="titulo1" minlength="5" maxlength="100" placeholder="Ex.: Tenho Carteira de Habilitação D" id="titulo1" required>
                                    <p>
                                        <input class="form-control" type="text"  value="<?= set_value('conteudo1'); ?>"
                                               name="conteudo1"  placeholder="Exemplo: Sou um excelente motorista" id="conteudo1" required>
                                        <input name="id" type="hidden" id="id" value="4" />
                                    </p>
                                </div>
                                <button   type="submit" class="btn btn-info">Salvar</button>
                            </form>
                        </div>
                    </div>

                </div>


        </section>
        <!-- .expertise-wrapper -->

        <section class="section-wrapper skills-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>Cursos - Status de Conclusão</h2>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="progress-wrapper">

                            <div class="progress-item">
                                <span class="progress-title"><input class="form-control" type="text" style="height: 30px;"  value="<?= set_value('curso'); ?>" name="curso"  placeholder="Informe o Curso" id="curso" required>

                                </span>

                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="62" aria-valuemin="0"
                                         aria-valuemax="100" style="width: 62%"><span class="progress-percent"><input class="form-control" type="text"  style="height: 27px;"  value="<?= set_value('telefone'); ?>" name="telefone" placeholder="Exemplo: 62%" id="telefone" required></span>
                                    </div>
                                </div>
                                <!-- .progress -->
                            </div>
                            <!-- .skill-progress -->


                            <div class="progress-item">
                                <span class="progress-title">Ex.: Informática Avançada</span>

                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                         aria-valuemax="100" style="width: 90%"><span class="progress-percent"> 90%</span>
                                    </div>
                                </div>
                                <!-- /.progress -->
                            </div>
                            <!-- /.skill-progress -->


                            <div class="progress-item">
                                <span class="progress-title">Comunicação Organizacional</span>

                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0"
                                         aria-valuemax="100" style="width: 75%;"><span class="progress-percent"> 75%</span>
                                    </div>
                                </div>
                                <!-- /.progress -->
                            </div>
                            <!-- /.skill-progress -->




                        </div>
                        <!-- /.progress-wrapper -->
                    </div>
                </div>
                <button class="btn btn-info">Salvar</button>
                <!--.row -->
            </div>
            <!-- .container-fluid -->
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
                            <small><input class="form-control" type="text"  style="height: 27px; width: 200px;"  value="<?= set_value('telefone'); ?>" name="telefone" placeholder="Período - Ex.: 2010-2018" id="telefone" required></small>
                            <h3><input class="form-control" type="text"  style="height: 32px; width: 350px; margin-top: 10px;"  value="<?= set_value('telefone'); ?>" name="telefone" placeholder="Exemplo: Analista de Sistemas" id="telefone" required></h3>
                            <h4><input class="form-control" type="text"  style="height: 32px; width: 360px;"  value="<?= set_value('telefone'); ?>" name="telefone" placeholder="Nome da Empresa - Ex.: Google" id="telefone" required></h4>

                            <p><input class="form-control" type="text"  style="height: 32px; width: 360px; margin-top: 10px;"  value="<?= set_value('telefone'); ?>" name="telefone" placeholder="Local - Ex.: Curitiba, PR" id="telefone" required></p>
                        </div>
                        <button class="btn btn-info">Salvar</button>
                        <!-- .experience-item -->
                        <div class="content-item">
                            <small>2012 - 2015</small>
                            <h3>Ex. Analist de Banco de Dados - DBA</h3>
                            <h4>Sadrak TecnoloGY</h4>

                            <p>Curitiba, Paraná</p>
                        </div>
                        <!-- .experience-item -->
                        <div class="content-item">
                            <small>2010 - 2012</small>
                            <h3>Ex. Programador Back-End</h3>
                            <h4>Sony LTDA.</h4>

                            <p>United Kingdom, London</p>
                        </div>
                        <!-- .experience-item -->
                    </div>
                </div>
                <!--.row-->
            </div>
            <!-- .container-fluid -->

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
                            <div class="content-item">
                                <small><input class="form-control" type="text"  style="height: 27px; width: 200px;"  value="<?= set_value('telefone'); ?>" name="telefone" placeholder="Período - Ex.: 2010-2018" id="telefone" required></small>
                                <h3><input class="form-control" type="text"  style="height: 32px; width: 350px; margin-top: 10px;"  value="<?= set_value('telefone'); ?>" name="telefone" placeholder="Exemplo: Execel Avançado" id="telefone" required></h3>
                                <h4><input class="form-control" type="text"  style="height: 32px; width: 360px;"  value="<?= set_value('telefone'); ?>" name="telefone" placeholder="Nome da Empresa - Ex.: Elaborata Cursos" id="telefone" required></h4>
                                <p><input class="form-control" type="text"  style="height: 32px; width: 360px; margin-top: 10px;"  value="<?= set_value('telefone'); ?>" name="telefone" placeholder="Local - Ex.: Curitiba, PR" id="telefone" required></p>
                            </div>
                            <button class="btn btn-info">Salvar</button>
                            <!-- .experience-item -->
                            <div class="content-item">
                                <small>2002 - 2006</small>
                                <h3>Ex.: Curso Avançado em Inglês</h3>
                                <h4>UTFPR - CALEM</h4>

                                <p>Curitiba, Paraná</p>
                            </div>
                            <!-- .experience-item -->
                        </div>
                    </div>
                    <!--.row-->
                </div>
                <!-- .container-fluid -->

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
                        <div class="content-item">
                            <h3><input class="form-control" type="text"  style="height: 32px; width: 190px; margin-top: 10px;"  value="<?= set_value('telefone'); ?>" name="telefone" placeholder="Exemplo: Livros" id="telefone" required></h3>

                            <input class="form-control" type="text"  style="height: 100px; margin-top: 10px;"  value="<?= set_value('telefone'); ?>" name="telefone" placeholder='  Assertively grow optimal methodologies after viral technologies.  '  id="telefone" required>
                        </div>
                        <button class="btn btn-info">Salvar</button>
                        <div style="margin-top: 10px;"class="content-item">
                            <h3>Esportes</h3>

                            <p>Assertivamente, desenvolva metodologias ótimas após tecnologias virais. Desenvolver adequadamente
                                Tecnologia sem atrito para funcionalidades adaptativas. Competentemente iterar funcionalizando
                                redes para os melhores serviços.</p>

                        </div>
                        <div class="content-item">
                            <h3>Arte</h3>

                            <p>
                                Dramaticamente utilizar infomediários superiores, enquanto competências essenciais funcionais.
                                Reutilize entusiasticamente vortais sinérgicos para portais direcionados a clientes. Interativamente
                                buscar a liderança sustentável via.</p>
                        </div>
                    </div>
                </div>
                <!-- .row -->

            </div>
        </section>
        <!-- .section-publications -->

        <section class="section-wrapper portfolio-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>Portfolio</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <a class="portfolio-item" href="#">
                            <div class="portfolio-thumb">
                                <img src="<?= base_url('assets/empresa/Buscapaginacao/recursos2/img/portfolio-1.jpg'); ?>" alt=""/>
                            </div>

                            <div class="portfolio-info">
                                <h3>Creative concepts</h3>
                                <small>domain.com</small>
                            </div>
                            <!-- portfolio-info -->
                        </a>
                        <!-- .portfolio-item -->
                    </div>
                    <div class="col-md-6">
                        <a class="portfolio-item" href="#">
                            <div class="portfolio-thumb">
                                <img src="<?= base_url('assets/empresa/Buscapaginacao/recursos2/img/portfolio-2.jpg'); ?>" alt=""/>
                            </div>

                            <div class="portfolio-info">
                                <h3>Customer focused</h3>
                                <small>domain.com</small>
                            </div>
                            <!-- portfolio-info -->
                        </a>
                        <!-- .portfolio-item -->
                    </div>
                    <div class="col-md-6">
                        <a class="portfolio-item" href="#">
                            <div class="portfolio-thumb">
                                <img src="<?= base_url('assets/empresa/Buscapaginacao/recursos2/img/portfolio-3.jpg'); ?>" alt=""/>
                            </div>

                            <div class="portfolio-info">
                                <h3>Management methodology</h3>
                                <small>domain.com</small>
                            </div>
                            <!-- portfolio-info -->
                        </a>
                        <!-- .portfolio-item -->
                    </div>
                    <div class="col-md-6">
                        <a class="portfolio-item" href="#">
                            <div class="portfolio-thumb">
                                <img src="<?= base_url('assets/empresa/Buscapaginacao/recursos2/img/portfolio-4.jpg'); ?>" alt=""/>
                            </div>

                            <div class="portfolio-info">
                                <h3>Market research</h3>
                                <small>domain.com</small>
                            </div>
                            <!-- portfolio-info -->
                        </a>
                        <!-- .portfolio-item -->
                    </div>

                </div>
                <!-- /.row -->
            </div>
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
            <!--.container-fluid-->
        </section>
        <!--.section-contact-->

        <footer class="footer">
            <div class="copyright-section">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                        </div>
                    </div>

                </div>

            </div>

        </footer>

    </div>

</body>
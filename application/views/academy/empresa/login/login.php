<!DOCTYPE html>
<html id="home">
    <head>
        <title>Site</title>
        <meta charset="UTF-8">
        <meta property="og:title" content="Modelo Site"/>
        <meta property="og:type" content="Site"/>
        <meta property="og:url" content="http://localhost/Sistema_v4/"/>
        <meta property="og:site_name" content="Modelo Site"/>
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css'); ?>">
        <!-- FAVICON -->
        <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/img/html5.png'); ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Escreva algo aqui, tipo palavras chaves.">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/font'); ?>">
        <script type="text/javascript" src="<?= base_url('assets/js/function.js'); ?>"></script>
    </head>
    <body>
        <?php
        if ($this->session->flashdata('msg')): echo $this->session->flashdata('msg');
        endif;
        ?>
        <!-- CONTATO TOPO -->
        <div class="contato-topo">
            <div class="conteudo-site">
                <div class="contact">
                    <a class="link-contato email" href="mailto:contato@all-connection.com"><img src="img/mail.png"> contato@all-connection.com</a>
                    <a class="link-contato fone" href="tel:554100000000"><img src="img/fone.png">(41) 9 0000-0000</a>
                </div>
                <div class="contact login-topo">
                    <form class="login-topo" action="" method="post">
                        <label>Login: <input class="iput-login" type="email" name="email" required></label>
                        <label>Senha: <input class="iput-login" type="password" name="senha" required></label>
                        <button type="submit" class="logar">Logar</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- MENUS -->
        <header>
            <link rel="stylesheet" type="text/css" href="<?= base_url('assets/font'); ?>">
            <div class="conteudo-site header-coluna">
                <!-- MENU MOBILE -->
                <div id="logo">
                    <!--  LOGO -->
                    <a href=" "><h1 id="nome-site-logo">All<span id="detalhe-logo">Connection</span></h1></a>
                    <nav id="mobile_menu">
                        <img id="opcao-menu" src="<?= base_url('assets/img/menu-mobile.png'); ?>" alt="" width="32px" />
                        <ul class="menu-principal-mobile">
                            <div class="login-topo">
                                <form class="login-topo" action="" method="">
                                    <label>Login: <input class="iput-login" type="text" name="login" required></label>
                                    <label>Senha: <input class="iput-login" type="password" name="senha" required></label>


                                </form>
                            </div>
                            <button id="fechar-menu-mobile">&times;</button>
                            <a href=""><li class="li-mobile">HOME</li></a>
                            <a class="scroll-link" href="#projetos"><li class="li-mobile">PROJETOS</li></a>
                            <a class="scroll-link" href="#sobre"><li class="li-mobile">SOBRE</li></a>
                            <a class="scroll-link" href="#contato"><li class="li-mobile">CONTATO</li></a>
                            <li class="li-menu"><button id="abrirCad">Cadastrar</button></li>
                        </ul>
                    </nav>
                </div>
                <!-- MENU DESKTOP -->
                <nav class="menu header-coluna">
                    <ul class="menu-principal">
                        <li class="li-menu"><a href="">HOME</a></li>
                        <li class="li-menu"><a class="scroll-link" href="#projetos">PROJETOS</a></li>
                        <li class="li-menu"><a class="scroll-link" href="#sobre">SOBRE</a></li>
                        <li class="li-menu"><a class="scroll-link" href="#contato">CONTATO</a></li>
                        <li class="li-menu"><button id="abrirCad">Cadastrar</button></li>
                    </ul>
                </nav>
                <!-- MENU FIXO -->
                <nav class="menu-fixo">
                    <div class="fixo-menu conteudo-site">
                        <a href=""><h1 class="nome-site-fixo">All Connection</h1></a>
                        <ul class="ul-fixo-menu">
                            <li class="li-menu"><a href="">HOME</a></li>
                            <li class="li-menu"><a class="scroll-link" href="#projetos">PROJETOS</a></li>
                            <li class="li-menu"><a class="scroll-link" href="#sobre">SOBRE</a></li>
                            <li class="li-menu"><a class="scroll-link" href="#contato">CONTATO</a></li>
                            <li class="li-menu"><button id="abrirCad">Cadastrar</button></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!-- SLIDER -->
        <section id="slide">
            <link rel="stylesheet" type="text/css" href="<?= base_url('assets/font'); ?>">
            <div class="slideshow-container">
                <div class="mySlides fade">
                    <img class="img-banner banner1" src="<?= base_url('assets/img/banner1.jpg'); ?>">
                    <div class="info-absoluto">
                        <div class="coluna-info-slide texto">
                            <h2 class="titulo-slide">Missão</h2>
                            <br>
                            <p class="info-slide">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Nullam varius sapien in purus blandit, finibus malesuada quam ultrices.
                            </p><br><br>
                            <a class="acaoBanner" href="#">SAIBA MAIS</a>
                        </div>
                        <div class="coluna-info-slide">
                            <img class="img-info-banner a" src="<?= base_url('assets/img/responsivo.png'); ?>">
                        </div>
                    </div>
                </div>
                <div class="mySlides fade">
                    <img class="img-banner banner2" src="<?= base_url('assets/img/responsivo.png'); ?>">
                    <div class="info-absoluto">
                        <div class="coluna-info-slide">
                            <img class="img-info-banner b" src="<?= base_url('assets/img/html5.png'); ?>">
                        </div>
                        <div class="coluna-info-slide texto">
                            <h2 class="titulo-slide">Visão</h2>
                            <br>
                            <p class="info-slide">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Nullam varius sapien in purus blandit, finibus malesuada quam ultrices.
                            </p><br><br>
                            <a class="acaoBanner" href="#">SAIBA MAIS</a>
                        </div>
                    </div>
                </div>

                <div class="mySlides fade">
                    <img class="img-banner banner3" src="<?= base_url('assets/img/banner3.jpg'); ?>">
                    <div class="info-absoluto">
                        <div class="coluna-info-slide">
                            <h2 class="titulo-slide">Valores</h2>
                            <br>
                            <p class="info-slide">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Nullam varius sapien in purus blandit, finibus malesuada quam ultrices.
                            </p><br><br>
                            <a class="acaoBanner" href="#">SAIBA MAIS</a>
                        </div>
                    </div>
                </div>
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <script type="text/javascript" src="<?= base_url('assets/js/slider.js'); ?>"></script>
        </section>

        <section class="conteudo-site padding-conteudo">
            <div class="section1">
                <h2>O Potencial que você só encontra na Connection</h2><br><br>
                <div class="cont1 texto-cont">
                    <h3>Conteúdo</h3>
                    <br>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Nullam varius sapien in purus blandit, finibus malesuada quam ultrices
                        Nullam varius sapien in purus blandit, finibus malesuada quam ultrices
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Nullam vdolor sit amet, finibus malesuada quam ultrices
                    </p>
                </div>
                <div class="cont1 img-cont">
                    <div class="limite-img">
                        <img class="img-sobre" src="img/img.jpg" alt="" title="">
                    </div>
                </div>
            </div>
        </section>

        <section id="projetos" class="padding-conteudo">
            <div class="conteudo-site">
                <h2 class="left">PROJETOS</h2><br><br>
                <p class="right">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet.
                </p><br>
                <div class="coluna-opcao">
                    <img class="img-hover" src="img/1.jpg" alt="" />
                    <div class="info-hover">
                        <div class="centro-conteudo">
                            <h3>Título 1</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                dolor sit amet, consectetur adipiscing elit.
                                Nullam varius sapien in purus blandit.
                            </p><br>
                            <a class="acaoBanner" href="#">SAIBA MAIS</a>
                        </div>

                    </div>
                    <h2 class="descricao-serv">Título 1</h2>
                </div>

                <div class="coluna-opcao">
                    <img class="img-hover" src="img/2.jpg" alt="" />
                    <div class="info-hover">
                        <div class="centro-conteudo">
                            <h3>Título 2</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                dolor sit amet, consectetur adipiscing elit.
                                Nullam varius sapien in purus blandit.
                            </p><br>
                            <a class="acaoBanner" href="#">SAIBA MAIS</a>
                        </div>
                    </div>
                    <h2 class="descricao-serv">Título 2</h2>
                </div>

                <div class="coluna-opcao">
                    <img class="img-hover" src="img/1.jpg" alt="" />
                    <div class="info-hover">
                        <div class="centro-conteudo">
                            <h3>Título 3</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                dolor sit amet, consectetur adipiscing elit.
                                Nullam varius sapien in purus blandit.
                            </p><br>
                            <a class="acaoBanner" href="#">SAIBA MAIS</a>
                        </div>
                    </div>
                    <h2 class="descricao-serv">Título 3</h2>
                </div>

                <div class="coluna-opcao">
                    <img class="img-hover" src="img/2.jpg" alt="" />
                    <div class="info-hover">
                        <div class="centro-conteudo">
                            <h3>Título 4</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                dolor sit amet, consectetur adipiscing elit.
                                Nullam varius sapien in purus blandit.
                            </p><br>
                            <a class="acaoBanner" href="#">SAIBA MAIS</a>
                        </div>
                    </div>
                    <h2 class="descricao-serv">Título 4</h2>
                </div>

                <div class="coluna-opcao">
                    <img class="img-hover" src="img/1.jpg" alt="" />
                    <div class="info-hover">
                        <div class="centro-conteudo">
                            <h3>Título 5</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                dolor sit amet, consectetur adipiscing elit.
                                Nullam varius sapien in purus blandit.
                            </p><br>
                            <a class="acaoBanner" href="#">SAIBA MAIS</a>
                        </div>
                    </div>
                    <h2 class="descricao-serv">Título 5</h2>
                </div>

                <div class="coluna-opcao">
                    <img class="img-hover" src="img/2.jpg" alt="" />
                    <div class="info-hover">
                        <div class="centro-conteudo">
                            <h3>Título 6</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                dolor sit amet, consectetur adipiscing elit.
                                Nullam varius sapien in purus blandit.
                            </p><br>
                            <a class="acaoBanner" href="#">SAIBA MAIS</a>
                        </div>
                    </div>
                    <h2 class="descricao-serv">Título 6</h2>
                </div>
            </div>
        </section>

        <section id="sobre" class="conteudo-site padding-conteudo">
            <h2 class="right">LOREN IPSUM DOLOR MODS</h2><br><br>
            <div class="cont-sobre">
                <p class="fade-up">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Nullam varius sapien in purus blandit, finibus malesuada quam ultrices
                    Nullam varius sapien in purus blandit, finibus malesuada quam ultrices
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Nullam vdolor sit amet, finibus malesuada quam ultrices
                </p>
            </div>
            <div class="conteudo-site">
                <div class="conteudo-colunas left">
                    <img class="img-icones-sobre" src="img/icon1.png" alt="" />
                    <h3>Título 1</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet.
                    </p>
                </div>
                <div class="conteudo-colunas bottom">
                    <img class="img-icones-sobre" src="img/icon2.png" alt="" />
                    <h3>Título 2</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet.
                    </p>
                </div>
                <div class="conteudo-colunas right">
                    <img class="img-icones-sobre" src="img/icon3.png" alt="" />
                    <h3>Título 3</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet.
                    </p>
                </div>
            </div>
        </section>

        <section id="contato">

            <div class="conteudo-form conteudo-site">
                <h2>ENTRE EM CONTATO</h2>
                <br>
                <div class="coluna-form mapa">
                    <h3>Localização</h3>
                    <p class="chamada-mapa">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet.
                    </p>
                    <br>
                    <iframe class="iframe-mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3603.155747027231!2d-49.27671548549164!3d-25.433056039240796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94dce4729850382f%3A0xe3961cdf095e7740!2sR.+Volunt%C3%A1rios+da+P%C3%A1tria%2C+255+-+Centro%2C+Curitiba+-+PR%2C+80020-000!5e0!3m2!1spt-BR!2sbr!4v1538930215803" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>

                <link rel="stylesheet" type="text/css" href="<?= base_url('assets/font'); ?>">
                <div class="coluna-form formulario">
                    <p class="chamada-contato">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet.
                    </p>
                    <form method="POST" action="#">
                        <input class="left" type="text" name="nome" placeholder="Nome Completo" required
                               style="background-image: url(assets/img/user.png);">
                        <br>
                        <input class="right" type="email" name="nome" placeholder="E-mail" required
                               style="background-image: url(assets/img/e-mail-input.png);">
                        <br>
                        <input class="left" type="number" name="nome" placeholder="Telefone - (DDD) 0000 0000"
                               style="background-image: url(assets/img/tel.png);"/>
                        <br>
                        <p>Escreva sua mensagem</p>
                        <br>
                        <textarea placeholder="Mensagem" class="fade-up textarea" rows="5" style="background-image: url(assets/img/msg.png);">
                        </textarea>
                        <br>
                        <input class="enviar" type="submit" value="Enviar" />
                    </form>
                </div>
            </div>

        </section>

        <footer>
            <link rel="stylesheet" type="text/css" href="<?= base_url('assets/font'); ?>">
            <section class="conteudo-site padding-conteudo">
                <div class="coluna-rodape">
                    <div class="conteudo-site-rodape">
                        <h3>CONTATO</h3><br>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet.
                        </p>
                    </div>
                </div>
                <div class="coluna-rodape">
                    <div class="conteudo-site-rodape">
                        <h3>LOCALIZAÇÃO</h3><br>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet.
                        </p>
                    </div>
                </div>
                <div class="coluna-rodape">
                    <div class="conteudo-site-rodape">
                        <h3>REDES SOCIAIS</h3><br>
                        <p>Siga-nos nas redes sociais.</p>
                        <div class="conteudo-redes-sociais">
                            <a href="#" target="_blank"><img class="Icones-redes" src="<?= base_url('assets/img/.twitter.png'); ?>" alt="" /></a>
                            <a href="#" target="_blank"><img class="Icones-redes" src="<?= base_url('assets/img/facebook.png'); ?>" alt="" /></a>
                            <a href="#" target="_blank"><img class="Icones-redes" src="<?= base_url('assets/img/instagram.png'); ?>" alt="" /></a>
                        </div>
                    </div>
                </div>
                <span id="botao-topo"><a class="scroll-link" id="link-topo" href="#home">&raquo;</a></span>
            </section>
            <div id="direitos-reservados">
                <p>Todos os direitos Reservados |
                    <a href=" " target="_blank"> <i>All Connection</a></i> | 2018</p>
            </div>
            <script type="text/javascript" src="<?= base_url('assets/js/jquery-3.1.1.min.js'); ?>"></script>
            <script type="text/javascript" src="<?= base_url('assets/js/animacao.js'); ?>"></script>
        </footer>
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/font'); ?>">
        <div id="fundo-modal">
            <div id="modal-formulario">
                <span id="fechar-modal-form">&times;</span>
                <div class="escolha">
                    <button id="empresa">EMPRESA</button>
                    <button id="estudante">CANDIDATO</button>
                    <button id="login">LOGIN</button>
                </div>
                <!-- EMPRESA -->
                <div id="form1" class="escolha-form">
                    <form id="form-empresa">
                        <h2>EMPRESA</h2>


                        <br><br>
                        <label> CNPJ/CPF</label><br>
                        <input type="number" name=""/>
                        <br>
                        <label> NOME COMPLETO</label><br>
                        <input type="text" name="" required/>
                        <br>
                        <label> E-MAIL</label><br>
                        <input type="email" name="" required/>
                        <br>
                        <label> TELEFONE</label><br>
                        <input type="number" name="" required/>
                        <br>
                        <button class="enviarCadastro">CADASTRAR</button>
                    </form>
                </div>
                <!-- ESTUDANTE -->
                <div id="form2" class="escolha-form">
                    <form id="form-empresa">
                        <h2>CANDIDATO</h2>

                        <br><br>
                        <label>CPF</label><br>
                        <input type="number" name=""/>
                        <br>
                        <label> NOME COMPLETO</label><br>
                        <input type="text" name="" required/>
                        <br>
                        <label> E-MAIL</label><br>
                        <input type="email" name="" required/>
                        <br>
                        <label> DATA DE NASCIMENTO</label><br>
                        <input type="date" name="" required/>
                        <br>
                        <button class="enviarCadastro">CADASTRAR</button>
                    </form>
                </div>
                <!-- LOGIN -->
                <div id="form3" class="escolha-form">
                    <form id="form-empresa">
                        <h2>LOGIN</h2>
                        <label> USUÁRIO</label><br>
                        <input type="text" name="" required/>
                        <br>
                        <label> SENHA</label><br>
                        <input type="password" name="" required/>
                        <br>
                        <button class="enviarCadastro">LOGAR</button>
                        <br><br>
                        <span id="esqueci-senha">Esqueci minha senha</span>
                    </form>
                    <div id="form-require-senha">
                        <form>
                            <label>SEU EMAIL CADASTRADO</label><br>
                            <input type="email" name="" required/>
                            <br>
                            <label> NOME DE USUÁRIO</label><br>
                            <input type="text" name="" required/>
                            <br>
                            <button class="enviarCadastro">ENVIAR</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    </body>
</html>
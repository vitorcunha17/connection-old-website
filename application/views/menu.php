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
                <a class="scroll-link" href="#contato"><li class="li-mobile">PARCEIROS</li></a>

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
            <li class="li-menu"><a class="scroll-link" href="#contato">PARCEIROS</a></li>

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
                <li class="li-menu"><a class="scroll-link" href="#contato">PARCEIROS</a></li>

            </ul>
        </div>
    </nav>
</div>
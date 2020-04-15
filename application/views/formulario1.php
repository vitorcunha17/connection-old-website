
<head>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/font'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/fonts.css'); ?>">



    <!-- Linkando o arquivo que terá as funções javascript - functions.js -->


    <style>

        div#fundo-modal1 {
            position: fixed;
            top: 100px;
            width: 100%;
            display: none;
            height: 100%;
            background: #25272fcc;
            -ms-background: #25272fcc;
            -webkit-background: #25272fcc;
            z-index: 999;
        }
        div#modal-formulario1{
            background: white;
            width: 750px;
            height: 370px;
            margin: auto;
            overflow: auto;
            margin-top: 4%;
            border-radius: 3px;
            border: 5px solid #f3f2f2;
        }

        button#empresa1, button#estudante1, button#login1, button#entrar   {
            border: 0;
            font-weight: 660;
            color: white;
            padding: 9px;
            border-radius: 3px;
            cursor: pointer;
        }

        button#empresa1 {
            background: #299829;
        }

        button#entrar {
            background: #101010;
        }
        button#logaempresa {
            background: #0c2e4e;
        }

        button#estudante1 {
            background: #2857bd;
        }
        button#login1 {
            background: #de991a;
        }
        button#empresa1:hover {
            background: #f28b32;
        }
        button#estudante1:hover {
            background: #3315c9;
        }
        button#login1:hover {
            background: #074656;
        }

        button#entrar:hover {
            background: #3315c9;
        }



        /* Create two equal columns that floats next to each other */
        .column {
            float: left;
            width: 50%;
            padding: 10px;
            height:400px; /*   Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

    </style>
    <style>



        /* Float four columns side by side */
        .columnn {
            float: left;
            width: 40%;
            position: relative;
            padding: 0 4px;
        }

        /* Remove extra left and right margins, due to padding */
        .roww {
            margin: 0 -5px 12px 20px;
        }

        /* Clear floats after the columns */
        .roww:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive columns */
        @media screen and (max-width: 600px) {
            .columnn {
                width: 100%;
                margin-top: 10px;
                display: block;
                margin-bottom: 20px;
            }
        }

        /* Style the counter cards */
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            padding: 10px;
            margin: 2px;

            text-align: center;
            background-color: #f1f1f1;


        }
        .card:hover .overlay {
            opacity: 1;
        }
        .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100%;
            width: 100%;
            opacity: 0;
            transition: .5s ease;

        }
        .text {
            color: white;
            font-size: 15px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .image {
            display: block;

        }
    </style>
</head>
<body>

    <div id="fundo-modal1">

        <div id="modal-formulario1">

            <span id="fechar-modal-form1">&times;</span>
            <div class="escolha">
                <button id="empresa1">Sou Candidato</button>
                <button id="estudante1">Sou Empresa</button>
                <button id="login1">Connection</button>
            </div>
            <!-- EMPRESA -->



            <div class="row" style="background-color:#bbb;" >

                <div class="columnn" style="background-color:#bbb; width: 340px; box-sizing: border-box;">

                    <h2 style=" font-family: Barlow !important; letter-spacing: 1px; font-size: 1.5em; color: #1c3343; text-align: center; margin-top: 40px; " >FAZER CADASTRO</h2>

                    <div class="roww"  style="margin-top: 10px; margin-left: 20px;">
                        <div class="columnn">
                            <a href="empresa/login/cadastro">
                                <div class="card">
                                    <img   src="https://img.icons8.com/wired/30/000000/client-company.png" >
                                    <p style="color: #1c3343; font-size: 12px">Empresa</p>
                                    <p style="color: #1c3343; font-size: 12px">Brasileira</p>
                                    <div class="overlay" style=" background-color: #009926;">
                                        <div class="text" >@Vamos lá!</div>
                                    </div>
                                </div>

                            </a>
                        </div>

                        <div class="columnn">
                            <a href="candidato/login/cadastro">
                                <div class="card">
                                    <img src="https://img.icons8.com/dotty/30/000000/businessman.png">
                                    <p style="color: #1c3343; font-size: 12px">Candidato</p>
                                    <p style="color: #1c3343; font-size: 12px ">Brasileiro</p>
                                    <div class="overlay" style=" background-color: #008CBA;">
                                        <div class="text" >@Vamos lá!</div>
                                    </div>
                                </div>
                            </a>
                        </div>


                    </div>
                    <div class="roww" >
                        <div class="columnn">
                            <a href="empresa/login/cadastro">
                                <div class="card">
                                    <img src="https://img.icons8.com/dotty/30/000000/new-company.png">
                                    <p style="color: #1c3343; font-size: 12px">Empresa</p>
                                    <p style="color: #1c3343; font-size: 12px">Estrangeira</p>
                                    <div class="overlay" style=" background-color: #f28b32;">
                                        <div class="text" >@Vamos lá!</div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="columnn">
                            <a href="candidato/login/cadastro">
                                <div class="card">
                                    <img src="https://img.icons8.com/dotty/30/000000/businesswoman.png">
                                    <p style="color: #1c3343; font-size: 12px">Candidato</p>
                                    <p style="color: #1c3343; font-size: 12px ">Estrangeiro</p>
                                    <div class="overlay"style=" background-color: #295;">
                                        <div class="text" >@Vamos lá!</div>
                                    </div>
                                </div>
                            </a>
                        </div>


                    </div>

                </div>
                <div class="columnn" style="background-color:#bbb;  width: 380px; box-sizing: border-box;">

                    <div id="form11" class="escolha-form">
                        <form  method="post" id="form-empresa"  accept-charset="utf-8"  action="<?= base_url('candidato/login/index') ?>">

                            <h2>CANDIDATO</h2>


                            <label> USUÁRIO</label><br>
                            <input  class="form-control" type="email" id="email"  name="email" placeholder="Digite seu e-mail" required />
                            <br>
                            <label> SENHA</label><br>
                            <input  class="form-control" type="password" style="color: #0c2e4e" id="senha" name="senha" placeholder="Senha" required/>

                            <button type="submit" id="entrar" >Logar</button>

                            <br><br>
                            <a href="https://sistema-sadrak.000webhostapp.com/candidato/login/esqueceu_senha"><span id="esqueci-senha"><FONT COLOR="#">Esqueci minha senha</span></a>
                            <!--<button type="submit" name="btn_login" id="btn_login">Entrar</button>-->


                        </form>

                    </div>

                    <!-- CANDIDATO -->
                    <div id="form12" class="escolha-form">
                        <form  method="post" id="form-empresa"  accept-charset="utf-8"  action="<?= base_url('empresa/login/index') ?>">

                            <h2>EMPRESA</h2>


                            <label> USUÁRIO</label><br>
                            <input  class="form-control" type="email" id="email"  name="email" placeholder="Digite seu e-mail" required />
                            <br>
                            <label> SENHA</label><br>
                            <input  class="form-control" type="password" style="color: #0c2e4e" id="senha" name="senha" placeholder="Senha" required/>

                            <button type="submit" id="entrar" >Logar</button>

                            <br><br>
                            <a href="https://sistema-sadrak.000webhostapp.com/empresa/login/esqueceu_senha"><FONT COLOR="#">Esqueci minha senha</span></a>
                            <!--<button type="submit" name="btn_login" id="btn_login">Entrar</button>-->


                        </form>

                    </div>
                    <!-- CONNECTION -->
                    <div id="form13" class="escolha-form">

                        <form  method="post" id="form-empresa"  accept-charset="utf-8"  action="<?= base_url('administracao/administracao/index') ?>">

                            <h2>CONNECTION</h2>
                            <label> USUÁRIO</label><br>
                            <input  class="form-control" type="email" id="email"  name="email" placeholder="Digite seu e-mail" required />
                            <br>
                            <label> SENHA</label><br>
                            <input  class="form-control" type="password" style="color: #0c2e4e" id="senha" name="senha" placeholder="Senha" required/>
                            <button type="submit" id="entrar" >Logar</button>
                            <a href="https://sistema-sadrak.000webhostapp.com/administracao/administracao/esqueceu_senha" style="color: #3315c9"><FONT >Esqueci minha senha</a>
                            <!--<button type="submit" name="btn_login" id="btn_login">Entrar</button>-->


                        </form>
                    </div>


                </div>



            </div>


        </div>
    </div>






</body>
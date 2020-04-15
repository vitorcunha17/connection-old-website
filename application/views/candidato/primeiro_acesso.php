<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Cadastro de dados</title>

    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            border: none
        }

        html,
        body {
            width: 100%;
            height: 100%
        }

        .pagina {
            background: #EEE;
            width: 100%;
            height: 100%
        }

        .bloco {
            width: 500px;
            margin: 0 auto;
            background: #FFF;
            padding: 10px;
            top: 100px;
            position: relative;
            box-shadow: 0 0 30px #777
        }

        .bloco>h1 {
            font-size: 16px;
            text-transform: uppercase;
            color: #074656
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

        .bloco>.bloco-select>select {
            flex: 1;
            margin: 5px;
            padding: 5px;
            border-radius: 30px;
            color: #074656;
            outline: none;
            background-color: #f5ad03;
        }

        .select {
            display: flex;
         
        }

        .ajust {
            width: 25%;
             
      
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
            background: #074656;
            width: 100px;
            text-align: center;
            color: #fff;
            border-radius: 30px;
            margin: 15px 0
        }

        .bloco>.botoes>.inicioLink {
            left: 325px
        }

        .info-upload {
            background: #EEE;
            margin: 10px;
            color: #454545
        }

        .info-upload>p {
            padding: 2px 10px
        }

        .info-upload>p:first-child {
            padding: 15px 10px
        }

        /* PARTES */
        .parte2,
        .parte3 {
            display: none
        }

        .ativo {
            color: #66bb6a;
        }

        .desligado {
            color: red;
        }
    </style>

    <link rel="shortcut icon" type="image/icon" href="<?= base_url('assets/images/Logo2.png'); ?>"/>
</head>

<body>

    <div class="pagina">



        <form id="myForm" action="<?= base_url('candidato/login/primeiroAcesso_'); ?>" method="post" enctype="multipart/form-data">


            <!-- PRIMEIRA PARTE -->
            <section class="bloco parte1">

                <h1>Preencha alguns dados:</h1>

                <div class="select">

                    <select class="pais" name="pais">
                        <option value="" disabled selected>Qual seu país?</option>
                        <option value="Angola">Angola</option>
                        <option value="Brasil">Brasil</option>
                        <option value="Portugal">Portugal</option>
                    </select>

                </div>

                <div class="botoes">
                    <a href="#" class="btn1 inicioLink">Próximo</a>
                </div>

            </section>
            <!-- SEGUNDA PARTE -->
            <section class="bloco parte2">

                <h1>Preencha alguns dados:</h1>

                <input type="text" placeholder="Seu nome" class="nome" name="nome">
                <input type="text" placeholder="CPF" class="cpf" name="cpf">
                <input type="text" placeholder="CEP" class="cep" name="cep">
                <!-- CAMPOS PODEM SER OCULTOS DEPENDENDO DO PAÍS  -->
                <input type="text" placeholder="Estado" class="estado" name="estado">
                <input type="text" placeholder="Cidade" class="cidade" name="cidade">
                <input type="text" placeholder="Bairro" class="bairro" name="bairro">
                <input type="text" placeholder="Rua" class="rua" name="rua">
                <!-- ============================================ -->
                <input type="text" placeholder="Telefone" class="telefone" name="telefone">
                <input type="number" placeholder="Número residencial" class="numero_residencia" name="numero_residencia">

                <div class="bloco-select">

                    <select name="pcd" style="width: 33%" class="pcd">
                        <option value="" selected disabled>Deficiente (PcD)</option>
                        <option value="sim">Sim</option>
                        <option value="nao">Não</option>
                    </select>

                    <select name="curso" style="width: 33%" class="curso">
                        <option value="" disabled selected>Curso</option>
                        <?php foreach ($cursos as $curso): ?>
                        <option value="<?= $curso->id; ?>">
                            <?= $curso->nome_curso; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>

                    <select name="situacao_curso" style="width: 33%" class="situacao_curso">
                        <option value="" disabled selected>Situação do curso</option>
                        <option value="Concluido">Concluido</option>
                        <option value="Em andamento">Cursando</option>
                    </select>

                </div>
                
                  <div class="bloco-select" >

                <select name="univer" class="univer" style="width: 80%">
                        <option value="" disabled selected>Universidade</option>
                        <?php foreach ($universidades as $value): ?>
                        <option value="<?= $value->univer; ?>">
                        <?= $value->cidade; ?> - <?= $value->univer; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>        
                 </div>   

                <div class="botoes">
                    <a href="#" class="btn2 voltar2">Voltar</a>
                    <input type="hidden" value="enviarDados" name="enviarDados">
                    <button  type="submit" class="finalizar">Finalizar</button>
                </div>

            </section>

        

        </form>
    </div>
   

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>




    <script type="text/javascript">
        $(document).ready(function() {



            //ENVIA OS DADOS
                var bar = $('.bar');
                var percent = $('.porcentagem');
                var status = $('#status');




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





            //FUNCAO PARTE 3

        

            $(".proximo2").click(function(e) {
                e.preventDefault();
               

                //verifica se todos os requisitos do vídeo estão corretos
                if(
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
             
                  console.log("OK")
                }else {
                  console.log("NÂO TA OK")
                }

            })

            $(".finalizar").click(function(e) {

                    e.preventDefault();

                    //verifica se todos os requisitos do vídeo estão corretos
                    if(
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
                        document.getElementById("myForm").submit();  
                        


                    console.log("OK")
                    }else {
                    console.log("NÂO TA OK")
                    }

                })

            //BLOQUEIA O ENVIO DOS DADOS COM ENTER
            $('input').keypress(function(e) {
                if(e.which == 12) {
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

</body>

</html>
<!DOCTYPE html>
<html>
    <head>
        <title>Cadastre-se</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/empresa/css/login.css'); ?>">
        <style>
            #aux{
                margin: 5px;
            }


        </style>

    </head>
    <body>
        <?php if ($this->session->flashdata('msg')): echo $this->session->flashdata('msg');
        endif;
        ?>
<?= validation_errors(); ?>
        <form id="regForm" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <h1>Cadastre-se:</h1>
            <!-- One "tab" for each step in the form: -->
            <div class="">
                Usuário*:
                <p><input placeholder="Email" class="obrigatorio" type="email" required oninput="this.className = ''" name="email"></p>
                <p><input placeholder="Senha (5 à 30 caracteres)" class="obrigatorio" type="password" minlength="5" maxlength="30" required oninput="this.className = ''" name="senha"></p>
            </div>
            <div class="">
                Dados da empresa*:
                <p><input class="obrigatorio" placeholder="Nome (3 à 100 caracteres)" type="text" minlength="3" maxlength="100" required oninput="this.className = ''" name="empresa"></p>
                <div class="form-group row" id="aux">

                    <label for="cep" class="col-2-2 col-form-label">CEP</label>
                    <div class="col-4">
                        <p><input id="cep" placeholder="CEP (exemplo: 36900-000)" required type="text" oninput="this.className = ''" name="cep" pattern="\d{5}-?\d{3}"></p>
                    </div>
                    <label for="num" class="col-2-2 col-form-label">Numéro</label>
                    <div class="col-3">
                        <p><input id="num" placeholder="Nº Ex.: 1232" required type="text" oninput="this.className = ''" name="num"></p>
                    </div>

                </div>
                <p><input placeholder="Telefone" required type="text" oninput="this.className = ''" name="telefone"></p>
                <p><input placeholder="CNPJ" required type="text" oninput="this.className = ''" name="cnpj"></p>
                <p><select name="ramo" required>
                        <option selected disabled value="">Selecione o ramo</option>
                        <?php foreach ($area as $areaValor): ?>
                            <option value="<?= $areaValor->id; ?>"><?= $areaValor->area_nome; ?></option>
<?php endforeach ?>a
                    </select></p>

                <p><input id="uf" required type="hidden" oninput="this.className = ''" name="estado"></p>
                <p><input id="cidade" required type="hidden" oninput="this.className = ''" name="cidade"></p>
                <p><input id="rua" required type="hidden" oninput="this.className = ''" name="rua"></p>
                <p><input id="bairro" required type="hidden" oninput="this.className = ''" name="bairro"></p>




            </div>
            <div class="">
                Dados Bancários:
                <p><input placeholder="Conta" type="text" oninput="this.className = ''" name="conta_numero"></p>
                <p><input placeholder="Senha" type="text" oninput="this.className = ''" name="conta_senha"></p>
                <p><label><input type="checkbox" oninput="this.className = ''" name="salva_conta" style="width: auto">Relembrar</label></p>
            </div>
            <div class="">
                Logo*:
                <p id="image-holder">
                </p>
                <input type="file" name="logo" id="inputFile" required>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                </div>
                <br><br>
                <input type="submit" value="Cadastrar">
            </div>
            <br>
            <h3>Já posui uma conta?</h3>
            <a href="<?= base_url('empresa/login'); ?>" class="btn">Logar</a>
        </form>

        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script type="text/javascript" src="<?= base_url('assets/empresa/js/login.js'); ?>"></script>
        <script>
            //Pega cidade atravez do cep
            $(document).ready(function() {

                function limpa_formulário_cep() {
                    // Limpa valores do formulário de cep.

                    $("#rua").val("");
                    $("#bairro").val("");
                    $("#cidade").val("");
                    $("#uf").val("");
                }

                //Quando o campo cep perde o foco.
                $("#cep").blur(function() {

                    //Nova variável "cep" somente com dígitos.
                    var cep = $(this).val().replace(/\D/g, '');

                    //Verifica se campo cep possui valor informado.
                    if (cep != "") {

                        //Expressão regular para validar o CEP.
                        var validacep = /^[0-9]{8}$/;

                        //Valida o formato do CEP.
                        if (validacep.test(cep)) {

                            //Preenche os campos com "..." enquanto consulta webservice.
                            $("#rua").val("...");
                            $("#bairro").val("...");
                            $("#cidade").val("...");
                            $("#uf").val("...");
                            //Consulta o webservice viacep.com.br/
                            $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                                if (!("erro" in dados)) {
                                    //Atualiza os campos com os valores da consulta.
                                    $("#rua").val(dados.logradouro);
                                    $("#bairro").val(dados.bairro);
                                    $("#cidade").val(dados.localidade);
                                    $("#uf").val(dados.uf);
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
            });
        </script>



    </body>
</html>
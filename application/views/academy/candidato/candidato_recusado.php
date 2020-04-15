<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Atualize seus dados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/candidato/assets/css/estilo.css'); ?>">
</head>

<body>
    
    <?php if($this->session->flashdata('msg')): echo $this->session->flashdata('msg'); endif; ?>

    <div class="container margin-top">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <form method="post" accept-charset="utf-8" enctype="multipart/form-data">
                    <h4>Cadastro</h4>
                    <div class="col-md-6 offset-md-3">
                        <?= validation_errors(); ?>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="nome" class="col-2 col-form-label">Nome</label>
                        <div class="col-4">
                            <input class="form-control" type="text" value="<?= set_value('nome'); ?><?= $dados_user->nome ?>" name="nome" minlength="5" maxlength="30" placeholder="Nome" id="nome" required>
                        </div>
                         <label for="pcd" class="col-2 col-form-label" title="Pessoa com deficiência">PCD</label>
                        <div class="col-4">
                            <select class="form-control" name="pcd" require id="pcd">
                                <option selected disabled>Pessoa com deficiência</option>
                                <option value="sim">Sim</option>
                                <option value="não">Não</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cep" class="col-2 col-form-label">Cep</label>
                        <div class="col-4">
                            <input class="form-control" type="text" value="<?= set_value('cep'); ?><?= $dados_user->cep ?>" name="cep" minlength="8" maxlength="10" placeholder="00000-000" id="cep" required pattern="\d{5}-?\d{3}">
                        </div>
                        <label for="email" class="col-2 col-form-label">E-mail</label>
                        <div class="col-4">
                            <input class="form-control" type="email" value="<?= set_value('email'); ?><?= $dados_user->email ?>" name="email" placeholder="email" id="email" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="senha" class="col-2 col-form-label">Senha</label>
                        <div class="col-4">
                            <input class="form-control" type="password" value="<?= set_value('senha'); ?>" id="senha" name="senha" minlength="5" maxlength="30" placeholder="Senha" id="senha" required>
                        </div>
                        <label for="telefone" class="col-2 col-form-label">Repita a senha</label>
                        <div class="col-4">
                            <input class="form-control" type="password" value="" id="repitaSenha" placeholder="Repita a senha" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="senha" class="col-2 col-form-label">Cpf</label>
                        <div class="col-4">
                            <input class="form-control" type="text" value="<?= set_value('cpf'); ?><?= $dados_user->cpf ?>" name="cpf" minlength="14" maxlength="14"  pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" placeholder="Digite no formato nnn.nnn.nnn-nn" id="cpf" required>
                        </div>
                        <label for="telefone" class="col-2 col-form-label">Telefone</label>
                        <div class="col-4">
                            <input class="form-control" type="text" value="<?= set_value('telefone'); ?><?= $dados_user->telefone ?>" name="telefone" placeholder="Telefone" id="telefone" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Curso</label>
                        <div class="col-4 lista_cursos">
                            <select name="curso" class="form-control">
                                <option selected disabled>Selecione o curso</option>
                                <?php foreach($cursos as $curso): ?>
                                <option value="<?= $curso->id; ?>">
                                    <?= $curso->nome_curso; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <label for="curso" class="col-2 col-form-label">Situação</label>
                        <div class="col-4">
                            <select class="form-control" name="situacao_curso" require id="curso">
                                <option selected disabled>Situação</option>
                                <option value="Concluido">Formado</option>
                                <option value="Em andamento">Cursando</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sexo" class="col-2 col-form-label">Sexo</label>
                        <div class="col-4">
                            <select class="form-control" name="sexo" required id="sexo">
                                <option selected disabled>Selecione o sexo</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                            </select>
                        </div>
                        <label for="sexo" class="col-2 col-form-label">Nascimento</label>
                        <div class="col-4">
                            <input type="date" name="data" class="form-control" value="<?= $dados_user->nascimento ?>" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <label class="file d-block mx-auto" for="inputFile"><img src="<?= base_url('assets/admin/imagens/icons/upload.png'); ?>" width="128" class="img-afasta d-block mx-auto"></label>
                            <input type="file" id="inputFile" name="video" required>
                        </div>
                        <div class="col-md-6">
                            <video class="col-md-12" controls>
                                <source src="<?= base_url('assets/candidato/video_analise/') ?><?= $dados_user->video_nome ?>" id="video_preview">
                            </video>
                        </div>
                    </div>
                    <button class="btn btn-info">Cadastrar</button>
                    <br>
                    <br>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                    </div>
                    <input id="cidade" required type="hidden" oninput="this.className = ''" name="cidade">
                    <input id="uf" required type="hidden" oninput="this.className = ''" name="estado">
                </form>
                <hr>
                <h4>Já possui uma conta?</h4>
                <a href="<?= base_url('candidato/login/'); ?>" class="btn btn-info">Logar-se</a>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
        $(document).on('submit', 'form', function(e) {
            e.preventDefault();

            //verifica se a o campo repita senha esta igual a senha
            if(document.getElementById('senha').value != document.getElementById('repitaSenha').value) {
                alert('Senha e verificar senha não são iguais, digite novamente!');
            }else {


            //Receber os dados
            $form = $(this);
            var formdata = new FormData($form[0]);

            //Criar a conexao com o servidor
            var request = new XMLHttpRequest();

            //Progresso do Upload
            request.upload.addEventListener('progress', function(e) {
                var percent = Math.round(e.loaded / e.total * 100);
                $form.find('.progress-bar').width(percent + '%').html(percent + '%');
            });

            //Upload completo limpar a barra de progresso
            request.addEventListener('load', function(e) {
                $form.find('.progress-bar').addClass('progress-bar-success').html('upload completo...');
                //Atualizar a página após o upload completo
                setTimeout("window.open(self.location, '_self');", 1000);
            });

            //Arquivo responsável em fazer o upload da imagem
            request.open('post', '<?= base_url(); ?>' + 'index.php/candidato/login/cadastro');
            request.send(formdata);
        }
        });

        var inputFile = document.getElementById('inputFile');
        inputFile.addEventListener('change', function() {
            var arquivo = this.value;
            if (arquivo.length < 1) {
                document.querySelector('.file img').src = "<?= base_url('assets/admin/imagens/icons/upload.png'); ?>";
            } else {
                arquivo = arquivo.toLowerCase();
                arquivo = arquivo.split('.').pop();

                if (arquivo == 'mp4') {
                    document.querySelector('.file img').src = "<?= base_url('assets/admin/imagens/icons/upload_selected.png'); ?>";
                    //faz preview do vídeo
                    var $source = $('#video_preview');
                    $source[0].src = URL.createObjectURL(this.files[0]);
                    $source.parent()[0].load();
                } else {
                    alert('Formato de arquivo invalido!');
                }
            }
        });

        //Pega cidade atravez do cep
        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#cidade").val("");
                $("#uf").val("...");
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
                        $("#cidade").val("...");
                        $("#uf").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
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
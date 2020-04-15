
   
<div class="row course_boxes">
    <div class="contact_form_container" style="width: 45%">
    <form action="<?= base_url('academy/empresa/login/logado'); ?>" method="post" enctype="multipart/form-data">
    <input name="titulo" id="contact_form_name" class="input_field contact_form_name" type="text" placeholder="Título do problema" required="required" data-error="Infome um nome válido.">
    <input name="representante" id="contact_form_name" class="input_field contact_form_name" type="text" placeholder="Nome do representante" required="required" data-error="Informe um nome válido.">
    <input name="email" id="contact_form_email" class="input_field contact_form_email" type="email" placeholder="E-mail do representante" required="required" data-error="Informe um e-mail válido.">
    <input name="nome_dp" id="contact_form_name" class="input_field contact_form_name" type="text" placeholder="Nome do Departamento" required="required" data-error="Informe um nome válido.">
    <select name="area" class="input_field contact_form_email">
     <option selectted disabled>Área relacionada ao Problema:</option>
        <?php foreach ($area as $value): ?>
      <option value="<?= $value->id; ?>">
        <?= $value->area_nome; ?>
    </option>
    <?php endforeach; ?>
    </select>
    <button id="contact_send_btn" type="submit" class="contact_send_btn trans_200" >Cadastrar Problema!</button>
    </div>
        <div class="col-lg-5 course_box" style="margin-left: 10%; width: 80%; margin-top: 66px;">
            <div class="card">
                        <div class="col-md-5 mb-3" >
                                <label class="file d-block mx-auto" for="inputFile"><img  src="<?= base_url(''); ?>assets/academy/images/sad.png" width="128" class="img-afasta d-block mx-auto"></label>
                                <input type="file" id="inputFile"  name="video" required>
                            </div>
                                <div class="card-body text-center">
                            <div class="progress">
                                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                </div>
                          <div class="card-title" style="margin-top: 15px;"><a href="">Envie um vídeo sobre o problema. </a></div>
                        <!-- <div class="card-text"><a href="">Ou cadastre o problema em forma de texto clicando aqui</a></div> -->
                       <video class="col-md-12" controls >
                     <source src="" id="video_preview">
                   </video>
                 </div>
              </div>
            </div>
        </div>
      </form>
    </div>
<style>
    .inputfile {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}


.inputfile + label {
    font-size: 1.25em;
    font-weight: 700;
    color: white;
    background-color: black;
    display: inline-block;
    cursor: pointer;
}


.inputfile:focus + label {
	outline: 1px dotted #000;
	outline: -webkit-focus-ring-color auto 5px;
}

.inputfile + label * {
	pointer-events: none;
}
    </style>

  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>        <script>

            $(document).ready(function() {
                $('input:radio[name="custom_field[account][1]"]').on("change", function() {
                    if (this.checked && this.value == '1') {
                        $("#input-custom-field2, #input-custom-field3").show();
                        $("#input-custom-field4, #input-custom-field5, #input-custom-field6").hide();
                    } else {
                        $("#input-custom-field4, #input-custom-field5, #input-custom-field6").show();
                        $("#input-custom-field2, #input-custom-field3").hide();
                    }
                });
            });



            $(document).on('submit', 'form', function(e) {
                e.preventDefault();

                //verifica se a o campo repita senha esta igual a senha
                if (document.getElementById('senha').value != document.getElementById('repitaSenha').value) {
                    alert('Senha e verificar senha não são iguais, digite novamente!');
                } else {


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
                        $form.find('.progress-bar').addClass('progress-bar-success').html('Video carregado com sucesso!');
                        //Atualizar a página após o upload completo
                        setTimeout("window.open(self.location, '_self');", 1000);
                    });

                    //Arquivo responsável em fazer o upload da imagem
                    request.open('post', '<?= base_url(); ?>' + 'index.php/academy/empresa/login/newsproblemas');
                    request.send(formdata);
                }
            });

            var inputFile = document.getElementById('inputFile');
            inputFile.addEventListener('change', function() {
                var arquivo = this.value;
                if (arquivo.length < 1) {
                    document.querySelector('.file img').src = "<?= base_url(''); ?>assets/academy/images/sad.png";
                } else {
                    arquivo = arquivo.toLowerCase();
                    arquivo = arquivo.split('.').pop();

                    if (arquivo == 'mp4') {
                        document.querySelector('.file img').src = "<?= base_url(''); ?>assets/academy/images/das.png";
                        //faz preview do vídeo
                        var $source = $('#video_preview');
                        $source[0].src = URL.createObjectURL(this.files[0]);
                        $source.parent()[0].load();
                    } else {
                        alert('Formato de arquivo invalido!');
                    }
                }
            });

</script>
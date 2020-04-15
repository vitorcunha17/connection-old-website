//valida imagem e envia os dados
/* $(document).on('submit', 'form', function(e) {
    e.preventDefault();
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
    request.open('post', '<?= base_url(); ?>' + 'empresa/login/cadastro');
    request.send(formdata);
}); */

//carrega imagem de preview
$("#inputFile").on('change', function() {

    var countFiles = $(this)[0].files.length;

    var imgPath = $(this)[0].value;
    var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
    var image_holder = $("#image-holder");
    image_holder.empty();

    if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
        if (typeof(FileReader) != "undefined") {

            //loop for each file selected for uploaded.
            for (var i = 0; i < countFiles; i++) {

                var reader = new FileReader();
                reader.onload = function(e) {
                    $("<img />", {
                        "src": e.target.result,
                        "class": "thumb-image",
                        "width": "320"
                    }).appendTo(image_holder);
                }

                image_holder.show();
                reader.readAsDataURL($(this)[0].files[i]);
            }

        } else {
            alert("This browser does not support FileReader.");
        }
    } else {
        alert("Pls select only images");
        $('#inputFile').val('');
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
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#cidade").val("...");
                        $("#uf").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

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

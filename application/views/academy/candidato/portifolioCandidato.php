
<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Candidato
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="<?= base_url('assets/empresa/Buscapaginacao/assets/css/bootstrap.min.css"'); ?>" media="screen" rel="stylesheet" type="text/css">
        <link href="<?= base_url('assets/empresa/Buscapaginacao/assets/css/jquery-ui-1.10.2.custom.min.css"'); ?>" media="screen" rel="stylesheet" type="text/css">
        <link href="<?= base_url('assets/empresa/Buscapaginacao/assets/css/stream.css"'); ?>" media="screen" rel="stylesheet" type="text/css">
        <script src="<?= base_url('assets/empresa/Buscapaginacao/assets/js/jquery-1.11.3.min.js"'); ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/empresa/Buscapaginacao/assets/js/jquery-ui-1.10.2.custom.min.js"'); ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/empresa/Buscapaginacao/assets/js/filter.js"'); ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/empresa/Buscapaginacao/assets/js/pagination_vagas.js"'); ?>" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/estilo.css'); ?>">
        <script type="text/javascript">
            window.movies = <?php echo html_entity_decode(json_encode($candidatos, JSON_NUMERIC_CHECK)); ?>;</script>
        <link rel="stylesheet"href="<?= base_url('assets/font-awesome/css/font-awesome.css'); ?>">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        <style type="text/css">

            img{
                background-color: #ddd;
                border-radius: 60%;
                height: 200px;
                object-fit: cover;
                width: 200px;
            }

            .menu ul{
                list-style: none;
                margin: 0;
            }
            .menu ul li{
                padding: 15px;
                position: relative;
                width: 200px;
                background-color: #34495E;
                border-top: 1px solid #BDC3C7;
                border-right: 3.5px solid #F1C40F;
                cursor: pointer;
            }
            .menu ul ul{
                transition: all 0.3s;
                opacity:0;
                visibility: hidden;
                position: absolute;
                left: 100%;
                top: -2%;
            }

            .menu ul li:hover > ul{
                opacity: 1;
                visibility: visible;
            }

            .menu ul li:hover{
                background-color: orange;




                .menu ul li a{
                    color: #fff;
                    text-decoration: none;
                }
                span{
                    margin-right: 15px;
                }

            </style>

        </head>
        <body>
            <?php
            if ($this->session->flashdata('msg')): echo $this->session->flashdata('msg');
            endif;
            ?>

            <script>localStorage.setItem('idCandidato', <?= $dados[0]->id_candidato; ?>);</script>
            <div class="container">
                <div class="sidebar col-md-3">
                    <br>
                    <img src="<?= base_url('assets/candidato/foto_candidato/'); ?><?= $dados[0]->foto_candidato; ?>" style="max-width: 100%;max-height: 200px">

                        <h4><?= $dados[0]->nome; ?></h4>


                        <div class="menu">
                            <ul>
                                <li> <a href="<?= base_url('candidato/login/aceito/'); ?>"><span span class="fa fa-home" ></span>Menu</a></li>
                                <li> <a href="<?= base_url('candidato/login/aceito/meu_perfil'); ?>" > <span class="fa fa-user-graduate"></span>Menu perfil</a></li>
                                <li> <a href="<?= base_url('candidato/login/aceito/meu_curriculum'); ?>" ><span class="fa fa-id-card"></span>Meu curriculum</a></li>
                                <li> <a href="<?= base_url('candidato/login/aceito/vagas'); ?>" ><span class="fa fa-briefcase"></span>Vagas</a></li>
                                <li> <a href="<?= base_url('candidato/login/aceito/visitas'); ?>" > <span class="fa fa-home"></span>Me Visitaram</a></li>
                                <li> <a href="<?= base_url('candidato/login/aceito/recomendacoes'); ?>" ><span class="fa fa-eye"></span>Recomendações</a></li>
                                <li> <a href="<?= base_url('candidato/login/sair'); ?>" > <span class="fa fa-frown-open"></span>Sair</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- /.col-md-3 -->
                    <div class="col-md-9">

                        <!-- se a pagina solicitada for vagas -->
                        <?php
                        if ($this->uri->segment(4) == 'vagas' OR ! $this->uri->segment(4)): $this->load->view('candidato/vagas');
                        endif;
                        ?>
                        <!-- se a pagina solicitada for visitas -->
                        <?php
                        if ($this->uri->segment(4) == 'visitas'): $this->load->view('candidato/visitas');
                        endif;
                        ?>
                        <!-- se a pagina solicitada for recomendações -->
                        <?php
                        if ($this->uri->segment(4) == 'recomendacoes'): $this->load->view('candidato/recomendacoes');
                        endif;
                        ?>
                        <!-- se a pagina solicitada for meu curriculum -->
                        <?php
                        if ($this->uri->segment(4) == 'meu_curriculum'): $this->load->view('candidato/meu_curriculum');
                        endif;
                        ?>
                        <!-- se a pagina solicitada for meu perfil -->
                        <?php
                        if ($this->uri->segment(4) == 'meu_perfil'): $this->load->view('candidato/meu_perfil');
                        endif;
                        ?>

                    </div>
                    <!-- /.col-md-9 -->

                    <!-- /.container -->
                </div>

                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
                </script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
                </script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
                </script>

                <script type="text/javascript">
                    $(document).on('submit', '.form_vagas', function(e) {
                        e.preventDefault();

                        //Receber os dados
                        $form = $(this);
                        var formdata = new FormData($form[0]);

                        //Criar a conexao com o servidor
                        var request = new XMLHttpRequest();


                        //Upload completo limpar a barra de progresso
                        request.addEventListener('load', function(e) {
                            //Atualizar a página após o upload completo
                            setTimeout("window.open(self.location, '_self');", 1000);
                        });

                        //Arquivo responsável em fazer o upload da imagem
                        request.open('post', '<?= base_url(); ?>' + 'index.php/candidato/login/aceito');
                        request.send(formdata);

                    });
                </script>
            </body>
        </html>

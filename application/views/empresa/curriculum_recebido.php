<div class="container" style="width: 760px; margin-top: 2px; margin-left: 15px;">
    <h3>Interessados na(s) vagas</h4>
        <h5>Curriculum (<?php echo count($pegaCurriculum); ?>)</h5>
        <div class="row">

            <!-- lista as vagas com os curriculum -->
            <?php foreach ($pegaCurriculum as $pegaCurriculumValue): ?>
                <div class="col-md-4 border" style="margin: 30px 0; background-color: #f1f1f1;">
                    <h5 style="color: #ed4343"><?= $pegaCurriculumValue->nome_vaga; ?></h5>
                    <p><?= $pegaCurriculumValue->area_nome . ' / ' . $pegaCurriculumValue->nome_curso; ?></p>
                    <p>Salário: <span style="color: #ed4343"><?= $pegaCurriculumValue->salario_vaga; ?></span></p>
                    <p>Experiência: <strong><?= $pegaCurriculumValue->experiencia_vaga; ?></strong></p>
                    <hr>
                    <p>Candidato: </p>
<a style="color: #3a5161"href="<?= base_url('empresa/login/perfil/') ?><?= $pegaCurriculumValue->id_candidato; ?>">
                    <p class="text-primary"><?= $pegaCurriculumValue->nome; ?></p></a>
                    <p>PCD: <?= $pegaCurriculumValue->pcd; ?></p>
                    <a href="#"  class="infoModal" data-toggle="modal" data-target="#myModal">     
                                      
 <input type="hidden" name="" class="nomeModal" value="<?= $pegaCurriculumValue->nome; ?>">

                           <iframe src="https://player.vimeo.com/video/<?= $pegaCurriculumValue->video_nome ?>" width="230" height="240" webkitallowfullscreen 
                  mozallowfullscreen allowfullscreen></iframe> 

                    </a>
                    <div class="row">
                        <div class="col-md-12">
                            <button data-identificador="<?= $pegaCurriculumValue->id_candidato; ?>" class="botaoCarrinho botao btn btn-small btn-success col-md-12"><a style="color: #fff"href="<?= base_url('empresa/login/perfil/') ?><?= $pegaCurriculumValue->id_candidato; ?>">Ver Perfil</a></button>
                        </div>
                        <!-- formulario para enviar a recomendação -->
                        <form method="post" class="col-md-12">
                            <input type="hidden" name="recomendacao_candidato" value="<?= $pegaCurriculumValue->id_candidato; ?>">
                            <input type="hidden" name="recomendacao_empresa" value="<?= $areaEmpresa[0]->id_empresa; ?>">
                            <button type="submit" class="btn btn-small btn-info col-md-12" style="margin-top: 10px">Recomendar</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>

            <!-- Modal exibe o vídeo do candidato -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="display: block;">
                            <h4 class="modal-title" id="myModalLabel"></h4>

                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                        </div>

                        <div class="modal-body">
                            <iframe src="" class="iframePlayer" seamless="" height="300" width="100%" frameborder="0"></iframe>
                        </div>
           
                    </div>
                </div>
            </div> <!-- /#myModal -->
        </div>
        <div class="text-left container">
         
            <br><br>
        </div>
</div>
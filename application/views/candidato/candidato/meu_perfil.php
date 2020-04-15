<link rel="stylesheet" href="<?php echo base_url('assets/css/crud/bulma.min.css')?>">

<link rel="stylesheet" href="<?php echo base_url('assets/css/crud/animate.min.css')?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/crud/font-awesome.min.css')?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/crud/style.css')?>">
<script src="<?php echo base_url('assets/js/crud/vue.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/crud/axios.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/crud/jquery.min.js')?>"></script>


        <div class="row">



        <div class="col-xl-3 column">



      <!-- Begin About -->
                                                        <div class="widget has-shadow">
                                                            <div class="widget-header bordered no-actions d-flex align-items-center">
                                                                <h5>Sou   <a  data-target="#editaQuemSou" data-toggle="modal"  style="margin-left: 110px; cursor: pointer" > <i class="la la-edit">editar</i></a></h5>
                                                            </div>
                                                            <div class="widget-body">
                                                                <p>
                                                                <div class="resposta">
                                                                    <?= $dados[0]->quemsou ?>
                                                                </div>

                                                                </p>
                                                            </div>
                                                        </div>
                                                        <!-- End About -->

                                                        <!-- Begin Blog Posts -->
                                                        <div class="widget has-shadow"  id="app">
                                                            <div class="widget-header bordered no-actions d-flex align-items-center">
                                                                <h5><i class="la la-suitcase la-1x"> Cursos Realidados<a  style="margin-left: 10px; cursor: pointer" @click="addModal = true"><i class="la la-plus-circle">Add</i></a></i></h5>
                                                            </div>  <transition
                                                                    enter-active-class="animated fadeInLeft"
                                                                        leave-active-class="animated fadeOutRight">
                                                                        <div class="notification is-success text-center px-5 top-middle"  style="background-color:#f2f221" v-if="successMSG" @click="successMSG = false">{{successMSG}}</div>
                                                                </transition>
                                                            <div class="widget-body p-0" v-for="crud in cursinhos">
                                                                <ul class="list-group w-100">

                                                                    <li class="list-group-item">
                                                                        <div class="media">
                                                                            <div class="media-body align-self-center">
                                                                                <h3 class="mb-3"style="color: #e76c90;">{{crud.nome_curso}}</h3>
                                                                                <p>
                                                                                Local: {{crud.instituicao}}<br>
                                                                                Curso: {{crud.periodo}}
                                                                                </p>
                                                                                <td class="td-actions">
                                                                                                <a href="#" @click="editModal = true; selectbiodata(crud)"><i style="font-size: 1rem;"class="la la-edit edit">editar</i></a>
                                                                                                <a href="#"  @click="deleteModal = true; selectbiodata(crud)"><i style="font-size: 1rem; margin-left:282%" style="background: #f758588f" class="la la-close ">excluir</i></a>
                                                                                </td>
                                                                             <hr>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <pagination
                                                                    :current_page="currentPage"
                                                                    :row_count_page="rowCountPage"
                                                                    @page-update="pageUpdate"
                                                                    :total_biodata="totalbiodata"
                                                                    :page_range="pageRange"
                                                                    >
                                                                </pagination>
                                                                </ul>
                                                            </div>
                                                       <?php include 'modal.php';?>
                                                        </div>
                                                        <!-- End Blog Posts -->


<!-- Begin Friends -->
<div class="widget has-shadow">
                                                            <div class="widget-header bordered no-actions d-flex align-items-center">
                                                                <h5>Colegas (<?php echo count($contatos, COUNT_RECURSIVE) ; ?>)</h5>
                                                            </div>
                                                            <div class="widget-body">
                                                                <div class="friends-list">
                                                                <?php  $i = 0; ?>
                                                                <?php foreach($contatos as $contatosValue): ?>
                                                                <?php if($i <= 3): ?>
                                                                    <div class="d-flex justify-content-between">
                                                                    <a data-toggle="tooltip" data-placement="top" title="<?= $contatosValue->nome ?>" data-original-title="Tooltip" href="<?= base_url('candidato/login/perfil/') ?><?= $contatosValue->id_candidato; ?> ">
                                                                            <img  src="<?= base_url('assets/candidato/foto_candidato/'); ?><?= $contatosValue->foto_candidato ?>" class="img-fluid rounded-circle" alt="...">
                                                                        </a>

                                                                    </div>
                                                                    <?php $i = $i+1; ?>
                                                                    <?php  elseif($i <= 7): ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Begin Social Network -->
                                                        <div class="widget no-bg text-center">
                                                            <ul class="social-network">
                                                                <li>
                                                                <a href="javascript:void(0);">
                                                                            <img  src="<?= base_url('assets/candidato/foto_candidato/'); ?><?= $contatosValue->foto_candidato ?>" class="img-fluid rounded-circle" alt="...">
                                                                        </a>
                                                                   <a class="view-more" href="javascript:void(0);">
                                                                            + <?php echo count($colegas, COUNT_RECURSIVE) ; ?>
                                                                        </a>

                                                              <?php endif; ?>
                                                              <?php endforeach; ?>
                                                                </li>

                                                            </ul>
                                                        </div>
                                           </div>
                                     </div>


                                                    </div>





                                                    <!-- End Col -->
                                                    <!-- Begin Timeline -->
                                                    <div class="col-xl-6">
                                                        <!-- Begin Widget -->
                                                        <div class="widget has-shadow">
                                                            <!-- Begin Widget Header -->
                                                            <div class="widget-header d-flex align-items-center">
                                                                <div class="user-image">
                                                                    <img class="rounded-circle" src="<?= base_url('assets/candidato/foto_candidato/'); ?><?= $dados[0]->foto_candidato; ?>" alt="...">
                                                                </div>
                                                                <div class="d-flex flex-column mr-auto">
                                                                    <div class="title">
                                                                        <span class="username"><?= $dados[0]->nome; ?></span>
                                                                        <!--<button style="margin-left: 100px" onclick="playPause()" class="btn btn-gradient-01" type="submit" ><i class="la la-play-circle-o"> </i>Assistir Vídeo-Curriculum</button>-->
                                                                    </div>
                                                                    <div class="time">25 min, ago</div>

                                                                </div>
                                                                <div class="widget-options">
                                                                    <div class="dropdown">
                                                                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                                                                        <div class="time"><i class="la la-pencil-square"></i> Editar Perfil</div>
                                                                        </button>
                                                                        <div class="dropdown-menu">
                                                                            <a style="cursor: pointer"data-toggle="modal" data-target="#editaDescricao" class="dropdown-item">
                                                                                <i class="la la-edit"></i>Editar
                                                                            </a>

                                                                            <a style="cursor: pointer"data-target="#modal-centered"data-toggle="modal" class="dropdown-item">
                                                                                <i class="la la-play-circle"></i>Trocar Vídeo
                                                                            </a>
                                                                            <a style="cursor: pointer"href="javascript:void(0);" class="dropdown-item">
                                                                                <i class="la la-bell-slash"></i>Desativar Notificações
                                                                            </a>
                                                                            <a style="cursor: pointer"href="javascript:void(0);" class="dropdown-item faq">
                                                                                <i class="la la-question-circle"></i>FAQ
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Widget Header -->
                                                            <!-- Begin Widget Body -->
                                                            <div class="widget-body">
                                                                <p style="margin-left: 15px"> <?= $dados[0]->descricao_video; ?> </p>
                                                                <style>


                                                                    div.container {
                                                                        background-color: #fff;
                                                                        border-radius: 2px;
                                                                        margin: auto auto;
                                                                        width: 50%;
                                                                        padding: 20px;
                                                                        text-align: center;
                                                                    }
                                                                    div.errors {
                                                                        padding: 10px;
                                                                        color: red;
                                                                        background-color: #ddd;
                                                                        border: 1px solid #ccc;
                                                                    }
                                                                    div.success {
                                                                        padding: 22px;
                                                                        color: green;
                                                                        background-color: #ddd;
                                                                        border: 1px solid #ccc;
                                                                    }
                                                                </style>





                                                                <video class="col-md-12" controls="">
                                                                    <source src="<?= base_url('assets/candidato/video_analise/'); ?><?= $dados[0]->video_nome; ?>" type="video/mp4">
                                                                </video>

                                                            </div>
                                                            <!-- End Widget Body -->
                                                            <!-- Begin Widget Footer -->
                                                            <div class="widget-footer d-flex align-items-center">
                                                                <div class="col-xl-8 col-md-8 col-7 no-padding d-flex justify-content-start">
                                                                    <div class="users-like">
                                                                        <a href="javascript:void(0);">

                                                                            <img src="<?= base_url('assets/candidato/foto_candidato/'); ?><?= $dados[0]->foto_candidato; ?>"  class="img-fluid rounded-circle" alt="...">
                                                                        </a>
                                                                        <a href="javascript:void(0);">
                                                                            <img src="http://www.slainte21.com/wp-content/uploads/2013/10/DSC5310-e1476052466530.jpg" class="img-fluid rounded-circle" alt="...">
                                                                        </a>
                                                                        <a href="javascript:void(0);">
                                                                            <img src="http://www.christiangarces.org/wp-content/uploads/2017/11/perfil-profesional.jpg" class="img-fluid rounded-circle" alt="...">
                                                                        </a>
                                                                        <a href="javascript:void(0);">
                                                                            <img src="https://sg.fiverrcdn.com/photos/118254724/original/08c8a1828da29e8f539e2f37251da45ee3540def.jpg?1538827871" class="img-fluid rounded-circle" alt="...">
                                                                        </a>
                                                                        <a class="view-more" href="javascript:void(0);">
                                                                            +4
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-4 col-md-4 col-5 no-padding d-flex justify-content-end">
                                                                    <div class="meta">
                                                                        <ul>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <i class="la la-comment"></i><span class="numb">12</span>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="javascript:void(0);">
                                                                                    <i class="la la-heart-o"></i><span class="numb">30</span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Widget Footer -->
                                                            <!-- Begin Comments -->
                                                            <?php foreach($messagens as $valueComents): ?>
                                                            <div class="comments">
                                                                    <div class="comments-header d-flex align-items-center">
                                                                        <div class="user-image">
                                                                            <img class="rounded-circle" src="<?= base_url('assets/candidato/foto_candidato/'); ?><?php echo $valueComents->foto_candidato ?>" " alt="...">
                                                                        </div>
                                                                        <div class="d-flex flex-column mr-auto">
                                                                            <div class="title">
                                                                                <span class="username"><?php echo $valueComents->nome ?> <?php echo $valueComents->sobrenome ?></span>
                                                                            </div>
                                                                            <div class="time"><?php echo $valueComents->data ?></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="comments-body">
                                                                        <p>
                                                                            <?php echo $valueComents->conteudo ?>
                                                                        </p>
                                                                    </div>
                                                                    <div class="comments-footer d-flex align-items-center">
                                                                        <div class="meta">
                                                                            <ul>
                                                                                <li>
                                                                                    <a href="javascript:void(0);">
                                                                                        <i class="la la-flag"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="javascript:void(0);">
                                                                                        <span class="rep">Resposta</span>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <?php endforeach; ?>
                                                                <div class="respostaComments"></div>


                                                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
                                                                    <script>
                                                                    $(document).ready(function() {
                                                                        $('form.jsform').on('submit', function(form) {
                                                                            form.preventDefault();
                                                                            $.post('../../candidato/Login/fazerComentario', $('form.jsform').serialize(), function(data) {
                                                                                $('div.respostaComments').html(data);


                                                                            });
                                                                        });
                                                                    });</script>


                                                            <!-- Caixa -->
                                                            <?php echo form_open('candidato/login/fazerComentario', array('class' => 'jsform')); ?>
                                                            <div class="publisher publisher-multi">
                                                            <input type="hidden" name="id_para" class="publisher-input"  rows="3" value="<?= $dados[0]->id_candidato; ?>">

                                                                <textarea style="color: #2c304d;"class="publisher-input"  name="comentario"  id="" rows="3" placeholder="Adicionar comentário"></textarea>
                                                                <div class="publisher-bottom d-flex justify-content-end">
                                                                    <a class="publisher-btn" href="javascript:void(0);"><i class="la la-smile-o"></i></a>
                                                                    <a class="publisher-btn" href="javascript:void(0);"><i class="la la-camera"></i></a>

                                                                    <button class="btn btn-gradient-01"  type="submit">Deixar um comentário</button>
                                                                    <?php echo form_close(); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Fim Comentarios -->

                                                    </div>
                                                    <!-- End Timeline -->
                                                    <!-- Begin Column -->
                                                    <div class="col-xl-3 column">
                                                                        <!-- Begin Badge -->
                                                    <div class="widget has-shadow" id="acad">
                                                    <transition
                                                        enter-active-class="animated fadeInLeft"
                                                            leave-active-class="animated fadeOutRight">
                                                            <div class="notification is-success text-center px-5 top-middle " style="background-color:#f2f221" v-if="successMSGInfo" @click="successMSG = false">{{successMSGInfo}}</div>
                                                    </transition>
                                                        <div class="widget-header bordered no-actions d-flex align-items-center">
                                                                <h5><i class="la la-mortar-board la-1.5x"> Formação Academica</i><a href="#" @click="editModal = true; selectbiodata(crud)"><i style="font-size: 1rem;margin-left: 118%; cursor: pointer"class="la la-edit edit">editar</i></a></h5>
                                                            </div>
                                                            <div class="widget-body p-3">
                                                                <div class="row m-0">
                                                                    <div class="col-xl-12 col-md-6 col-6 p-0" v-for="crud in formacao">
                                                                        <td>{{crud.nome_curso}}</td><br>
                                                                        <td> Status - {{crud.situacao_curso}}</td>


                                                                    </div>
                                                                    <?php include 'modalAcad.php';?>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <!-- End Badge -->
                                                          <!-- Begin Photos -->
                                                  <div class="widget has-shadow" id="Exp">
                                                             <transition
                                                                enter-active-class="animated fadeInLeft"
                                                                    leave-active-class="animated fadeOutRight">
                                                                    <div class="notification is-success text-center px-5 top-middle"  style="background-color:#f2f221" v-if="successMSGExp" @click="successMSGExp= false">{{successMSGExp}}</div>
                                                                    </transition>
                                                            <div class="widget-header bordered no-actions d-flex align-items-center">
                                                                <h5><i class="la la-globe la-1x"> Experiencia Profissional <a  style="margin-left: 10px; cursor: pointer" @click="addModalExp = true"><i class="la la-plus-circle">Add</i></a></i></h5>
                                                            </div>
                                                            <div class="widget-body p-0" >
                                                                <ul class="list-group w-100" v-for="crudExp in experiencias">

                                                                    <li class="list-group-item">
                                                                        <div class="media">
                                                                            <div class="media-body align-self-center">
                                                                                <h3 class="mb-3"style="color: #e76c90;"> {{crudExp.empresa2}} </h3>
                                                                                <p>
                                                                               Cargo: {{crudExp.cargo}}<br>
                                                                               Período: {{crudExp.periodo2}}
                                                                                </p>  <td class="td-actions" >
                                                                            <a href="#" @click="editaModalExp = true; selectbiodata(crudExp)"><i style="font-size: 1rem;"class="la la-edit edit">editar</i></a>
                                                                            <a href="#"  @click="deleteModalExp = true; selectbiodata(crudExp)"><i style="font-size: 1rem; margin-left:282%" style="background: #f758588f; " class="la la-close ">excluir</i></a>
                                                                            </td>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <hr>


                                                                </ul>
                                                                <?php include 'modalExp.php';?>
                                                            </div>
                                                        </div>
                                                                 <pagination
                                                                    :current_page="currentPageExp"
                                                                    :row_count_page="rowCountPageExp"
                                                                    @page-update="pageUpdateExp"
                                                                    :total_biodata="totalbiodataExp"
                                                                    :page_range="pageRangeExp"
                                                                    >
                                                                </pagination>
                                                        <!-- End Friends -->


                                                        <div class="widget has-shadow" id="interesse">
                                                            <div class="widget-header bordered no-actions d-flex align-items-center">
                                                            <h5>   <i class="la la-eye"> Interesses<a  style="margin-left: 10px; cursor: pointer" @click="addModalInt = true"><i class="la la-plus-circle">Add</i></a> </i></h5>
                                                            </div>
                                                            <div class="widget-body p-3">
                                                                <div class="row m-0">
                                                                  <div>
                                                                  <transition
                                                                     enter-active-class="animated fadeInLeft"
                                                                     leave-active-class="animated fadeOutRight">
                                                                      <div class="notification is-success text-center px-5 top-middle"  style="background-color:#f2f221" v-if="successMSGInt" @click="successMSGInt = false">{{successMSGInt}}</div>
                                                                       </transition>
                                                                    <li class="list-group-item">
                                                                        <div class="media" v-for="crudInt in interesses">

                                                                            <div class="media-body align-self-center">
                                                                                <h3 class="mb-3"style="color: #e76c90;"> {{crudInt.titulo}}</h3>
                                                                                <p>
                                                                                  - {{crudInt.conteudo}}
                                                                                </p>
                                                                                <td class="td-actions">
                                                                                                <a href="#" @click="editModalInt = true; selectbiodata(crudInt)"><i style="font-size: 1rem;"class="la la-edit edit">editar</i></a>
                                                                                                <a href="#"  @click="deleteModalInt = true; selectbiodata(crudInt)"><i  style=" font-size: 1rem; margin-left:250% " class="la la-close ">excluir</i></a>
                                                                                                </td>
                                                                            </div>
                                                                            <hr><br>
                                                                        </div>
                                                                    </li>

                                                                    <?php include 'modalInteresses.php';?>
                                                                 </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <pagination
                                                        :current_page="currentPageInt"
                                                        :row_count_page="rowCountPageInt"
                                                        @page-update="pageUpdate"
                                                        :total_biodata="totalbiodataInt"
                                                        :page_range="pageRangeInt"
                                                        >
                                                    </pagination>



                                                        <!-- Begin Social Network -->
                                                        <div class="widget no-bg text-center">
                                                            <ul class="social-network">
                                                                <li>
                                                                    <a href="javascript:void(0);" class="ico-facebook" title="Facebook">
                                                                        <i class="ion-social-facebook"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="ico-twitter" title="Twitter">
                                                                        <i class="ion-social-twitter"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="ico-youtube" title="Youtube">
                                                                        <i class="ion-social-youtube"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);" class="ico-linkedin" title="Linkedin">
                                                                        <i class="ion-social-linkedin"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <!-- End Social Networks -->
                                                    </div>
                                                    <!-- End Column -->
                                                                </div>

                                                                <script src="<?php echo base_url('assets/js/crud/pagination.js');?>"></script>
                                                             <script src="<?php echo base_url('assets/js/crud/interesseVue.js');?>"></script>
                                                             <script src="<?php echo base_url('assets/js/crud/cursosVue.js');?>"></script>
                                                                <script src="<?php echo base_url('assets/js/crud/experienciasVue.js');?>"></script>
                                                                <script src="<?php echo base_url('assets/js/crud/formacaoAcad.js');?>"></script>
<script>
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
        </script>

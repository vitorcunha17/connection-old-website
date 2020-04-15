<div class="row flex-row">
                            <!-- Begin Widget 18 -->
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="widget widget-19 has-shadow">
                                    <!-- Begin Widget Header -->
                                    <div class="widget-header bordered d-flex align-items-center">
                                        <h2><i style="color: #303450" class="la la-sitemap"> NetWork  <font size="2">(<span id="total_movies">0</span>)</font></i> </h2>
                                        <div class="widget-options">
                                            <div class="dropdown">
                                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                                                    <i class="la la-ellipsis-h"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="#" class="dropdown-item"> 
                                                        <i class="la la-bell-slash"></i>Tela cheia
                                                    </a>
                                                    <a href="#" class="dropdown-item"> 
                                                        <i class="la la-edit"></i>Filtro
                                                    </a>
                                                    <a href="#" class="dropdown-item faq"> 
                                                        <i class="la la-question-circle"></i>Ajuda
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Widget Header -->
                                    <div class="widget-body p-0">
                                        <div class="form-group row mt-3 mr-0 mb-3 ml-0">
                                            <div class="col-xl-12">
                                                <label class="form-control-label">Pesquisar novo contato</label>
                                                <input type="text" value="Ex.: Max " class="form-control">
                                            </div>
                                        </div>
                                     
                                       
                                        
                                           
                                        <ul class="list-group w-100 widget-scroll" style="max-height: 250px; overflow: hidden; outline: none;" tabindex="2">
                                            <li class="list-group-item  movies row" id="movies" >
                                            <script id="movie-template" type="text/html">
                                                <div class="media">
                                                    <div class="media-left align-self-center mr-3">
                                                        <img src="<?= base_url('assets/candidato/foto_candidato/'); ?><%= foto_candidato %>" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                    </div>
                                                    <div class="media-body align-self-center">
                                                   
                                                        <div class="people-name"><%= nome %> - <%= cidade %> </div>
                                                       
                                                        
                                                    </div>
                                                    <div class="media-right align-self-center">
                                                        <form method="post" class="col-md-12">
                                                        <input type="hidden" name="id_candidato" value="<%= id_candidato %>">
                                                        <input type="hidden" name="id_tela" value="1">
                                                               <div class="btn-group" role="group" aria-label="Buttons Group">
                                                                 <button type="submit" style="padding: 2px 12px; " name="indicador" value="2" class="btn btn-outline-success mb-2">Add</button>
                                                                </div> 
                                                            </form>
                                                    </div>
                                                </div>
                                                <hr>
                                                </script>
                                            </li>
                                            
                                        </ul>
                                      <br>
                                    </div>
                                </div>
                            </div>
                            <!-- End Widget 18 -->
                            <!-- Begin Widget 19 -->
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <div class="widget widget-19 has-shadow">
                                    <!-- Begin Widget Header -->
                                    <div class="widget-header bordered d-flex align-items-center">
                                        <h2><i style="color: #303450" class="la la-group"> Meus Contatos <font size="2">(<?php echo count($colegas, COUNT_RECURSIVE); ?>)</font> </i></h2>
                                        <div class="widget-options">
                                            <div class="dropdown">
                                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                                                    <i class="la la-ellipsis-h"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="#" class="dropdown-item"> 
                                                        <i class="la la-bell-slash"></i>Tela cheia
                                                    </a>
                                                    <a href="#" class="dropdown-item"> 
                                                        <i class="la la-edit"></i>Filtro
                                                    </a>
                                                    <a href="#" class="dropdown-item faq"> 
                                                        <i class="la la-question-circle"></i>Ajuda
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Widget Header -->
                                    <div class="widget-body p-0">
                                        <div class="form-group row mt-3 mr-0 mb-3 ml-0">
                                            <div class="col-xl-12">
                                                <label class="form-control-label">Pesquisar Colega</label>
                                                <input type="text" value="Ex.: Raquel Musk " class="form-control">
                                            </div>
                                        </div>
                                     
                                       
                                        
                                     
                                        <ul class="list-group w-100 widget-scroll" style="max-height: 250px; overflow: hidden; outline: none;" tabindex="2">
                                            <li class="list-group-item ">
                                            <?php if(count($colegas) < 1): ?>
                                            <div class="media">
                                                    <div class="media-left align-self-center mr-3">
                                                    <div class="message-icon">
                                                            <i class="la la-frown-o la-3x"></i>
                                                        </div>
                                                    </div>
                                                    <div class="media-body align-self-center">
                                                        <div class="people-name"> Voce nao tem colegas. Pesquise e adcione novos contatos.</div>
                                                    </div>
                                                    <div class="media-right align-self-center">
                                               
                                                    </div>
                                                </div>
                                                <hr>

                                            <?php else: ?>

                                               <?php foreach($colegas as $colegasValue): ?>
                                                <div class="media">
                                                    <div class="media-left align-self-center mr-3">
                                                        <img src="<?= base_url('assets/candidato/foto_candidato/'); ?><?= $colegasValue->foto_candidato ?>" class="img-fluid rounded-circle" style="width: 125px;">
                                                    </div>
                                                    <div class="media-body align-self-center">
                                                        <div class="people-name"> <?= $colegasValue->nome; ?> </div>
                                                    </div>
                                                    <div class="media-right align-self-center">
                                                    <form method="post" class="col-md-12">
                                                    <input type="hidden" name="excluirContato_id" value="<?= $colegasValue->id_candidato; ?>">
                                                               <div class="btn-group" role="group" aria-label="Buttons Group">
                                                                 <button type="submit" style="padding: 2px 8px; " name="id_para" value="<?= $colegasValue->id_candidato; ?>" class="btn btn-outline-warning mb-2">Desfazer Contato</button>
                                                                 <button type="button" style="padding: 2px 12px;"  class="btn btn-outline-danger mb-2"><a href="<?= base_url('candidato/login/perfil/') ?><?= $colegasValue->id_candidato; ?> ">Perfil</a></button>
                                                                </div> 
                                                            </form>
                                                    </div>
                                                </div>
                                                <hr>
                                                
                                                <?php endforeach; ?>
                                                <?php endif; ?>

                                            </li>
                                            
                                        </ul>
                                       <br>
                                    </div>
                                </div>
                            </div>
                            <!-- End Widget 19 -->
                            <!-- Begin Widget 20 -->
                            <div class="col-xl-4">
                            <div class="widget widget-19 has-shadow">
                                    <!-- Begin Widget Header -->
                                    <div class="widget-header bordered d-flex align-items-center">
                                        <h2>  <i style="color: #303450" class="la la-mail-forward">Solicitacaçoes Recebidas<font size="2">(<?php echo count($solicitacoesRE, COUNT_RECURSIVE); ?>)</font></i></h2>
                                        <div class="widget-options">
                                            <div class="dropdown">
                                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                                                  
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="#" class="dropdown-item"> 
                                                        <i class="la la-bell-slash"></i>Tela cheia
                                                    </a>
                                                    <a href="#" class="dropdown-item"> 
                                                        <i class="la la-edit"></i>Filtro
                                                    </a>
                                                    <a href="#" class="dropdown-item faq"> 
                                                        <i class="la la-question-circle"></i>Ajuda
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Widget Header -->
                                    <div class="widget-body p-0">
                                        
                                     
                                       
                                        
                                     
                                        <ul class="list-group w-100 widget-scroll" style="max-height: 250px; overflow: hidden; outline: none;" tabindex="2">
                                            <li class="list-group-item ">
                                            <?php if(count($solicitacoesRE) < 1): ?>
                                            <div class="media">
                                                    <div class="media-left align-self-center mr-3">
                                                    <div class="message-icon">
                                                            <i class="la la-frown-o la-3x"></i>
                                                        </div>
                                                    </div>
                                                    <div class="media-body align-self-center">
                                                        <div class="people-name"> Voce nao tem solicitaçoes em aberto agora.</div>
                                                    </div>
                                                    <div class="media-right align-self-center">
                                               
                                                    </div>
                                                </div>
                                                <hr>

                                            <?php else: ?>
                                            <?php foreach($solicitacoesRE as $solicatacoesREValue): ?>
                                                <div class="media">
                                                    <div class="media-left align-self-center mr-3">
                                                        <img src="<?= base_url('assets/candidato/foto_candidato/'); ?><?= $solicatacoesREValue->foto_candidato ?>" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                    </div>
                                                    <div class="media-body align-self-center">
                                                        <div class="people-name"> <?= $solicatacoesREValue->nome; ?></div>
                                                    </div>
                                                    <div class="media-right align-self-center">
                                                    <form method="post" class="col-md-12">
                                                            <input type="hidden" name="id_de" value="<?= $solicatacoesREValue->id_candidato; ?>">
                                                               <div class="btn-group" role="group" aria-label="Buttons Group">
                                                                 <button type="submit" style="padding: 2px 8px; " name="indicador" value="2" class="btn btn-outline-success mb-2">Aceitar</button>
                                                                 <button type="submit" style="padding: 2px 8px;" name="indicador"  class="btn btn-outline-danger mb-2">Recusar</button>
                                                                </div> 
                                                            </form>
                                                    </div>
                                                </div>
                                                <hr>
                                                
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                             
                                            </li>
                                            
                                        </ul>
                                        <div class="widget-header bordered d-flex align-items-center">
                                        <h2>  <i style="color: #303450"class="la la-mail-reply"> Solicitacaçoes Enviadas<font size="2">(<?php echo count($solicitacoesEN, COUNT_RECURSIVE); ?>)</font></i></h2>
                                        <div class="widget-options">
                                            <div class="dropdown">
                                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                                                  
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="#" class="dropdown-item"> 
                                                        <i class="la la-bell-slash"></i>Tela cheia
                                                    </a>
                                                    <a href="#" class="dropdown-item"> 
                                                        <i class="la la-edit"></i>Filtro
                                                    </a>
                                                    <a href="#" class="dropdown-item faq"> 
                                                        <i class="la la-question-circle"></i>Ajuda
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-group w-100 widget-scroll" style="max-height: 250px; overflow: hidden; outline: none;" tabindex="2">
                                            <li class="list-group-item ">
                                            <?php if(count($solicitacoesEN) < 1): ?>
                                            <div class="media">
                                                    <div class="media-left align-self-center mr-3">
                                                    <div class="message-icon">
                                                            <i class="la la-frown-o la-3x"></i>
                                                        </div>
                                                    </div>
                                                    <div class="media-body align-self-center">
                                                        <div class="people-name"> Voce nao tem solitaçoes enviadas em espera.</div>
                                                    </div>
                                                    <div class="media-right align-self-center">
                                               
                                                    </div>
                                                </div>
                                                <hr>

                                            <?php else: ?>
                                                <?php foreach($solicitacoesEN as $solicatacoesENValue): ?>
                                                <div class="media">
                                                    <div class="media-left align-self-center mr-3">
                                                        <img src="<?= base_url('assets/candidato/foto_candidato/'); ?><?= $solicatacoesENValue->foto_candidato ?>" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                    </div>
                                                    <div class="media-body align-self-center">
                                                        <div class="people-name"> <?= $solicatacoesENValue->nome; ?></div>
                                                    </div>
                                                    <div class="media-right align-self-center">
                                                    <form method="post" class="col-md-12">
                                                    <input type="hidden" name="excluiSolicitacao" value="2">
                                                               <div class="btn-group" role="group" aria-label="Buttons Group">
                                                                 <button type="submit" style="padding: 2px 12px; " name="id_para" value="<?= $solicatacoesENValue->id_candidato; ?>" class="btn btn-outline-info mb-2">Cancelar</button>
                                                                </div> 
                                                            </form>
                                                    </div>
                                                </div>
                                                <hr>
                                                
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                            </li>
                                            
                                            </ul>
                                            <br>
                                    </div>
                                </div>
                          
                        </div>

                    

<script id="genre_template" type="text/html">
  <div class="checkbox">
    <label>
      <input type="checkbox" value="<%= area_nome %>">
  </div>
</script>
<span style="display: none" id="per_page" class="content"></span>
<span  id="pagination" style="display: none" class="movies-pagination"></span> 

</div>
 
    <script src="<?= base_url('assets/vendors/js/base/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendors/js/base/core.min.js'); ?>"></script>
    <!-- End Vendor Js -->
    <!-- Begin Page Vendor Js -->
    <script src="<?= base_url('assets/vendors/js/nicescroll/nicescroll.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendors/js/owl-carousel/owl.carousel.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendors/js/app/app.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/pages/vagas.min.js'); ?>"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
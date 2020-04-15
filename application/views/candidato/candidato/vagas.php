
<div class="row">
  
      <?php if($this->session->flashdata('msg')): echo $this->session->flashdata('msg'); endif; ?> 


      
        
      </div>
    </div>
  
    <div class="movies row" id="movies"> </div>
    <script id="movie-template" type="text/html">
    <div class="col-xl-3 col-md-4 col-sm-6 col-remove">
                                        <!-- Card da Vaga -->
                                        <div class="widget-image has-shadow">
                                            <div class="group-card">
                                                <!-- corpo do card -->
                                                <div class="widget-body">
                                                    <div class="quick-actions">
                                                        <div class="dropdown">
                                                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                                                                <i class="la la-sitemap"></i>
                                                            </button>
                                                          
                                                        </div>
                                                    </div>
                                                 
                                                    <h4 class="name" ><a href="#"><font color="#e76c90"> <%= nome_vaga %> </font></a></h4>
                                                    <div class="category"><%= area_nome %> / <%= nome_curso %></div>
                                                    <div class="stats text-center">
                                                        <span><i class="la la-briefcase"></i></span>
                                                    
                                                        <span class="counter"><%= salario_vaga %></span> 
                                                        <span class="text"> <%= experiencia_vaga %></span>
                                                    </div>
                                                    <div class="group-members text-center mt-4">
                                                    <span class="text">Descriçao: <%= empresa_vaga %> Ver mais...</span>
                                                    </div>
                                                    <div class="text-center mt-2 pb-3">
                                                      <!-- form para enviar o curriculum -->
              <form method="post" class="form_vagas" action="<?= base_url('candidato/login/aceito'); ?>">
                <input type="hidden" name="id_vaga" value="<%= id_vaga %>">
                <input type="hidden" name="empresa_id" value="<%= empresa_id %>">
                <button type="submit" class="btn bg-primary" ">Enviar curriculum</button>

              </form>

                    
                                                    </div>
                                                </div>
                                                <!-- Fim do corpo do card -->
                                            </div>
                                        </div>
                                        <!-- Fim Card -->
                                    </div>


    </script>

    <script id="genre_template" type="text/html">
      <div class="checkbox">
        <label>
          <input type="checkbox" value="<%= area_nome %>"> <%= area_nome %>
        </label>
      </div>
    </script>
      
    <div class="col d-flex align-items-center" style="background-color: #fff" class="widget-body pb-0">
                                        <div class="mr-auto p-2">
                                            <span class="display-items" >Mostrando (<span id="per_page" class="content"></span>) / (<span id="total_movies">0</span>) Vagas</span>
                                        </div>
                                        <div class="p-2">
                                            <nav aria-label="...">
                                                <ul class="pagination">
                                                    <li class="page-item">
                                                        <span class="page-link"><i class="ion-chevron-left"></i></span>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#"><span class="sr-only">(current)</span><span  id="pagination" class="movies-pagination"></span></a></li>
                                                    <li class="page-item active">
                                                        <span class="page-link">2</span>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#"><i class="ion-chevron-right"></i></a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                        </div>   </div>

     
        <script src="<?= base_url('assets/vendors/js/base/jquery.min.js'); ?>"></script>
        <script src="<?= base_url('assets/vendors/js/base/core.min.js'); ?>"></script>
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="<?= base_url('assets/vendors/js/nicescroll/nicescroll.min.js'); ?>"></script>
        <script src="<?= base_url('assets/vendors/js/owl-carousel/owl.carousel.min.js'); ?>"></script>
        <script src="<?= base_url('assets/vendors/js/app/app.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/pages/vagas.min.js'); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
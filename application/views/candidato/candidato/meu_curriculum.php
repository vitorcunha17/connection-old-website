

<!-- Inicio CRUD -->
<meta charset="utf-8">
<div id="acad">
   <div class="container">
    <div class="row">
        <transition
                enter-active-class="animated fadeInLeft"
                     leave-active-class="animated fadeOutRight">
                     <div class="notification is-success text-center px-5 top-middle" v-if="successMSGInfo" @click="successMSG = false">{{successMSGInfo}}</div>
            </transition>

                            <div class="col-xl-12">
                                <!--CURSOS -->
                          
                                <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Formacao </h4>
                                             </div>
                                                        <div class="widget-body">
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered mb-0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Curso</th>
                                                                            <th>Situacao</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr v-for="crud in formacao" >
                                                                        <td>{{crud.nome_curso}}</td>
                                                                        <td>{{crud.situacao_curso}}</td>
                                                                
                                                                        <td class="td-actions">
                                                                                                <a href="#" @click="editModal = true; selectbiodata(crud)"><i class="la la-edit edit"></i></a>
                                                                                                </td>
                                                    
                                                                                            </tr>
                                                                                        
                                                                                            </tr>
                                                                                    </tbody>
                                                                          </table>
                                                                        </div>
                                                                </div>
         <pagination
             :current_page="currentPage"
             :row_count_page="rowCountPage"
              @page-update="pageUpdate"
              :total_biodata="totalbiodata"
              :page_range="pageRange"
              >
           </pagination>
                      </div>
     <?php include 'modalAcad.php';?>
     
              </div>
           </div>
         </div>
     </div>



  <div id="app">
   <div class="container">
    <div class="row">
        <transition
                enter-active-class="animated fadeInLeft"
                     leave-active-class="animated fadeOutRight">
                     <div class="notification is-success text-center px-5 top-middle" v-if="successMSG" @click="successMSG = false">{{successMSG}}</div>
            </transition>

                            <div class="col-xl-12">
                                <!--CURSOS -->
                          
                                <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Cursos</h4>
                                            <button type="button" style="margin-left: 4%" class="btn btn-primary btn-lg mr-1 mb-2" @click="addModal= true">Adicionar</button>
                                            <input placeholder="pesquisar curso cadastrado"type="search" class="form-control" v-model="search.text" @keyup="buscaCursos" name="search">
                                             </div>
                                                        <div class="widget-body">
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered mb-0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Período</th>
                                                                            <th>Instituicao</th>
                                                                            <th>Curso</th>
                                                                            <th>Açoes</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr v-for="crud in cursinhos" >
                                                                        <td>{{crud.nome_curso}} </td>
                                                                        <td>{{crud.instituicao}}</td>
                                                                        <td>{{crud.periodo}}</td>
                                                                
                                                                        <td class="td-actions">
                                                                                                <a href="#" @click="editModal = true; selectbiodata(crud)"><i class="la la-edit edit"></i></a>
                                                                                                <a href="#"  @click="deleteModal = true; selectbiodata(crud)"><i style="background: #f758588f" class="la la-close "></i></a>
                                                                                                </td>
                                                    
                                                                                            </tr>
                                                                                        
                                                                                            </tr>
                                                                                    </tbody>
                                                                          </table>
                                                                        </div>
                                                                </div>
         <pagination
             :current_page="currentPage"
             :row_count_page="rowCountPage"
              @page-update="pageUpdate"
              :total_biodata="totalbiodata"
              :page_range="pageRange"
              >
           </pagination>
                      </div>
     <?php include 'modal.php';?>
     
              </div>
           </div>
         </div>
     </div>


<div id="Exp">
   <div class="container">
    <div class="row">
        <transition
                enter-active-class="animated fadeInLeft"
                     leave-active-class="animated fadeOutRight">
                     <div class="notification is-success text-center px-5 top-middle" v-if="successMSGExp" @click="successMSGExp= false">{{successMSGExp}}</div>
            </transition>

                            <div class="col-xl-12">
                            <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Experiencias</h4>
                                    
                             
                                            <button type="button" style="margin-left: 4%" class="btn btn-primary btn-lg mr-1 mb-2" @click="addModalExp = true">Adicionar</button>
                                            <input placeholder="pesquisar experiencia cadastrada"type="search" class="form-control" v-model="search2.text" @keyup="buscaExperiencia" name="search2">
                                       
                                    
                                </div>
                                    <div class="widget-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Empresa</th>
                                                        <th>Cargo</th>
                                                        <th>Período</th>
                                                        <th>Açoes</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="crudExp in experiencias" >
                                                    <td>{{crudExp.empresa2}}</td>
                                                    <td>{{crudExp.cargo}}</td>
                                                    <td>{{crudExp.periodo2}}</td>
                                            
                                                    <td class="td-actions">
                                                                            <a href="#" @click="editaModalExp = true; selectbiodata(crudExp)"><i class="la la-edit edit"></i></a>
                                                                            <a href="#"  @click="deleteModalExp = true; selectbiodata(crudExp)"><i style="background: #f758588f" class="la la-close "></i></a>
                                                                            </td>
                                
                                                    </tr>
                                                 
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                         
                                <!-- End Border -->

                                                 
                            
                                    <!-- End Invoice Container -->
                                    <!-- Begin Invoice Footer -->
    <pagination
        :current_page="currentPageExp"
        :row_count_page="rowCountPageExp"
         @page-update="pageUpdateExp"
         :total_biodata="totalbiodataExp"
         :page_range="pageRangeExp"
         >
      </pagination>      
      </div>
     <?php include 'modalExp.php';?>
     
                </div>
           </div>
         </div>
     </div>

 <div id="interesse">
   <div class="container">
    <div class="row">
        <transition
                enter-active-class="animated fadeInLeft"
                     leave-active-class="animated fadeOutRight">
                     <div class="notification is-success text-center px-5 top-middle" v-if="successMSGInt" @click="successMSGInt = false">{{successMSGInt}}</div>
            </transition>

                            <div class="col-xl-12">
                                <!--CURSOS -->
                          
                                <div class="widget has-shadow">
                                    <div class="widget-header bordered no-actions d-flex align-items-center">
                                        <h4>Interesses</h4>
                                            <button type="button" style="margin-left: 4%" class="btn btn-primary btn-lg mr-1 mb-2" @click="addModalInt = true">Adicionar</button>
                                            <input placeholder="pesquisar interesse cadastrado"type="search" class="form-control" v-model="searchInt.text" @keyup="buscaInteresse" name="searchInt">
                                             </div>
                                                        <div class="widget-body">
                                                            <div class="table-responsive">
                                                                <table class="table table-bordered mb-0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Titulo</th>
                                                                            <th>Descriçao</th>
                                                                            <th>Açoes</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr v-for="crudInt in interesses" >
                                                                        <td>{{crudInt.titulo}}</td>
                                                                        <td>{{crudInt.conteudo}}</td>
                                                                
                                                                        <td class="td-actions">
                                                                                                <a href="#" @click="editModalInt = true; selectbiodata(crudInt)"><i class="la la-edit edit"></i></a>
                                                                                                <a href="#"  @click="deleteModalInt = true; selectbiodata(crudInt)"><i style="background: #f758588f" class="la la-close "></i></a>
                                                                                                </td>
                                                    
                                                                                            </tr>
                                                                                        
                                                                                            </tr>
                                                                                    </tbody>
                                                                          </table>
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
                      </div>
     <?php include 'modalInteresses.php';?>
     
              </div>
           </div>
         </div>
     </div>   
<script src="<?php echo base_url('assets/js/crud/pagination.js');?>"></script>
<script src="<?php echo base_url('assets/js/crud/cursosVue.js');?>"></script>
<script src="<?php echo base_url('assets/js/crud/experienciasVue.js');?>"></script>
<script src="<?php echo base_url('assets/js/crud/interesseVue.js');?>"></script>
<script src="<?php echo base_url('assets/js/crud/edita_info.js');?>"></script>
<script src="<?php echo base_url('assets/js/crud/formacaoAcad.js');?>"></script>

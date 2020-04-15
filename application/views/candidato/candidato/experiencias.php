<link rel="stylesheet" href="<?php echo base_url('assets/css/crud/bulma.min.css')?>">

 <link rel="stylesheet" href="<?php echo base_url('assets/css/crud/animate.min.css')?>">
 <link rel="stylesheet" href="<?php echo base_url('assets/css/crud/font-awesome.min.css')?>">
 <link rel="stylesheet" href="<?php echo base_url('assets/css/crud/style.css')?>">
<script src="<?php echo base_url('assets/js/crud/vue.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/crud/axios.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/crud/jquery.min.js')?>"></script>

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
                                            <input placeholder="pesquisar experiencia cadastrado"type="search" class="form-control" v-model="search2.text" @keyup="buscaExperiencia" name="search2">
                                       
                                    
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

<script src="<?php echo base_url('assets/js/crud/pagination.js');?>"></script>
<script src="<?php echo base_url('assets/js/crud/experienciasVue.js');?>"></script>


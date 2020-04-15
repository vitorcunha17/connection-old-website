<link rel="stylesheet" href="<?php echo base_url('assets/css/crud/bulma.min.css')?>">

 <link rel="stylesheet" href="<?php echo base_url('assets/css/crud/animate.min.css')?>">
 <link rel="stylesheet" href="<?php echo base_url('assets/css/crud/font-awesome.min.css')?>">
 <link rel="stylesheet" href="<?php echo base_url('assets/css/crud/style.css')?>">
<script src="<?php echo base_url('assets/js/crud/vue.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/crud/axios.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/crud/jquery.min.js')?>"></script>
                   
                    <div class="blog-news-title">
                      <h2><a style="  " href="" class="typewrite" data-period="1000" data-type='[ "Forneça informaçoes para seu curriculum ficar completo :) ", "As Empresas querem saber mais sobre voce", "Clique em editar perfil para prencher informaçoes.", "Voce com a Connection Rumo ao Sucesso! :)" ]'>
					</span> <span class="wrap"></span>
					</a></h2>
                      <p> <a class="blog-author" href="#"><?= $dados[0]->nome; ?></a> <span class="blog-date">|Meus Dados</span></p>
                    </div>
                    <div class="blog-news-details blog-single-details">
                   


                    <div id="expertise">
                     <p>Lista de Expertise <a  style="margin-left: 10px; cursor: pointer" @click="addModalTis = true"><img src="https://img.icons8.com/ios/16/000000/plus.png">Adicionar Expertise</a></p>
                       <blockquote >
                        <transition
                          enter-active-class="animated fadeInLeft"
                              leave-active-class="animated fadeOutRight">
                              <div class="notification is-success text-center px-5 top-middle" v-if="successMSGTis" @click="successMSGTis= false">{{successMSGTis}}</div>
                      </transition>
                      <div  v-for="crudTis in expertise">
                        <h3>   {{crudTis.conteudo}}</h3>
                                <div  style="display: inline-flex">
                                <td >
                                <img src="https://img.icons8.com/metro/10/000000/map-editing.png"> <a style="margin-right: 20%" href="#" @click="editModalTis = true; selectbiodata(crudTis)"><p style="font-size: 11px">Editar</p></a>
                                <img src="https://img.icons8.com/metro/10/000000/delete.png">  <a href="#"  @click="deleteModalTis = true; selectbiodata(crudTis)"><p style="font-size: 11px">Excluir</p></a>
                                </td>
                              </div>
                      <hr style="border-top: 1px solid #f77c21;">
                     </div>
                     </blockquote>
                     <?php include 'candidato/modalExpertise.php';?>
                     <pagination
                        :current_page="currentPageTis"
                        :row_count_page="rowCountPageTis"
                        @page-update="pageUpdate"
                        :total_biodata="totalbiodataTis"
                        :page_range="pageRangeTis"
                        >
                      </pagination>     
                        </div>
                      

                  
                     <div id="habilidadeJava">
                     <p>Lista de Skill's <a  style="margin-left: 10px; cursor: pointer" @click="addModalhab = true"><img src="https://img.icons8.com/ios/16/000000/plus.png">Adicionar habilidade</a></p>
                       <blockquote >
                        <transition
                          enter-active-class="animated fadeInLeft"
                              leave-active-class="animated fadeOutRight">
                              <div class="notification is-success text-center px-5 top-middle" v-if="successMSGhab" @click="successMSGhab= false">{{successMSGhab}}</div>
                      </transition>
                      <div  v-for="crudhab in habilidade">
                        <h3>   {{crudhab.titulo}}</h3>
                          <h4>  - Onde Cursou: {{crudhab.instituicao}} </h4>
                        <h5>  - Status: {{crudhab.porcentagem}} %</h5>
                        <h4>  - Descricao: {{crudhab.descricao}} </h4>
                      



                                <div  style="display: inline-flex">
                                <td >
                                <img src="https://img.icons8.com/metro/10/000000/map-editing.png"> <a style="margin-right: 20%" href="#" @click="editModalhab = true; selectbiodata(crudhab)"><p style="font-size: 11px">Editar</p></a>
                                <img src="https://img.icons8.com/metro/10/000000/delete.png">  <a href="#"  @click="deleteModalhab = true; selectbiodata(crudhab)"><p style="font-size: 11px">Excluir</p></a>
                                </td>
                              </div>
                      <hr style="border-top: 1px solid #f77c21;">
                     </div>
                     </blockquote>
                     <?php include 'candidato/habilidadeVue.php';?>
                     <pagination
                        :current_page="currentPagehab"
                        :row_count_page="rowCountPagehab"
                        @page-update="pageUpdate"
                        :total_biodata="totalbiodatahab"
                        :page_range="pageRangehab"
                        >
                      </pagination>     
                        </div>

                  <div id="javaScriptExperiencia">
                     <p>Experiencia Profissional <a  style="margin-left: 10px; cursor: pointer" @click="addModalExp = true"><img src="https://img.icons8.com/ios/16/000000/plus.png">Adicionar Experiencia</a></p>
                       <blockquote >
                        <transition
                          enter-active-class="animated fadeInLeft"
                              leave-active-class="animated fadeOutRight">
                              <div class="notification is-success text-center px-5 top-middle" v-if="successMSGExp" @click="successMSGExp= false">{{successMSGExp}}</div>
                      </transition>
                      <div  v-for="crudExp in experiencia">
                        <small> {{crudExp.dataReferencia}}</small>
                        <h3>  {{crudExp.titulo}}</h3>
                        <h4>  {{crudExp.empresa}}</h4>
                        <p>  {{crudExp.cidadeEstado2}}</p>
                              <div  style="display: inline-flex">
                              <td >
                              <img src="https://img.icons8.com/metro/10/000000/map-editing.png"> <a style="margin-right: 20%" href="#" @click="editaModalExp = true; selectbiodata(crudExp)"><p style="font-size: 11px">Editar</p></a>
                              <img src="https://img.icons8.com/metro/10/000000/delete.png">  <a href="#"  @click="deleteModalExp = true; selectbiodata(crudExp)"><p style="font-size: 11px">Excluir</p></a>
                              </td>
                            </div>
                     <hr style="border-top: 1px solid #f77c21;">
                     </div>
                         
                     </blockquote>
                     <?php include 'candidato/modalExp.php';?>
                     <pagination
                        :current_page="currentPageExp"
                        :row_count_page="rowCountPageExp"
                        @page-update="pageUpdateExp"
                        :total_biodata="totalbiodataExp"
                        :page_range="pageRangeExp"
                        >
                      </pagination>     
                  </div>
                     
                    
                  <div id="javaScriptCurso">
                     <p>Cursos Realizados<a  style="margin-left: 10px; cursor: pointer" @click="addModaCur = true"><img src="https://img.icons8.com/ios/16/000000/plus.png">Adicionar Curso</a></p>
                       <blockquote >
                        <transition
                          enter-active-class="animated fadeInLeft"
                              leave-active-class="animated fadeOutRight">
                              <div class="notification is-success text-center px-5 top-middle" v-if="successMSGCur" @click="successMSGCur= false">{{successMSGCur}}</div>
                      </transition>
                      <div  v-for="crud in educacao">
                        <small> {{crud.dataReferencia}}</small>
                        <h3>  {{crud.curso2}}</h3>
                        <h4>  {{crud.instituicao}}</h4>
                        <p>  {{crud.cidadeEstado2}}</p>
                              <div  style="display: inline-flex">
                                  <td >
                                  <img src="https://img.icons8.com/metro/10/000000/map-editing.png"> <a style="margin-right: 20%" href="#" @click="editModal = true; selectbiodata(crudCur)"><p style="font-size: 11px">Editar</p></a>
                                  <img src="https://img.icons8.com/metro/10/000000/delete.png">  <a href="#"  @click="deleteModalCur = true; selectbiodata(crudCur)"><p style="font-size: 11px">Excluir</p></a>
                                  </td>
                            </div>
                     <hr style="border-top: 1px solid #f77c21;">
                     </div>
                         
                     </blockquote>
                     <?php include 'candidato/modal.php';?>
                     <pagination
                        :current_page="currentPageCur"
                        :row_count_page="rowCountPageCur"
                        @page-update="pageUpdate"
                        :total_biodata="totalbiodataCur"
                        :page_range="pageRangeCur"
                        >
                      </pagination>     
                  </div>


                     <div id="interesse">
                     <p>Lista de Interesses <a  style="margin-left: 10px; cursor: pointer" @click="addModalInt = true"><img src="https://img.icons8.com/ios/16/000000/plus.png">Adicionar Interesse</a></p>
                       <blockquote >
                        <transition
                          enter-active-class="animated fadeInLeft"
                              leave-active-class="animated fadeOutRight">
                              <div class="notification is-success text-center px-5 top-middle" v-if="successMSGInt" @click="successMSGInt= false">{{successMSGInt}}</div>
                      </transition>
                      <div  v-for="crudInt in interesses">
                        <h3>   {{crudInt.titulo}}</h3>
                        <h4>  - {{crudInt.conteudo}}</h4>
                                <div  style="display: inline-flex">
                                <td >
                                <img src="https://img.icons8.com/metro/10/000000/map-editing.png"> <a style="margin-right: 20%" href="#" @click="editModalInt = true; selectbiodata(crudInt)"><p style="font-size: 11px">Editar</p></a>
                                <img src="https://img.icons8.com/metro/10/000000/delete.png">  <a href="#"  @click="deleteModalInt = true; selectbiodata(crudInt)"><p style="font-size: 11px">Excluir</p></a>
                                </td>
                              </div>
                      <hr style="border-top: 1px solid #f77c21;">
                     </div>
                     </blockquote>
                     <?php include 'candidato/modalInteresses.php';?>
                     <pagination
                        :current_page="currentPageInt"
                        :row_count_page="rowCountPageInt"
                        @page-update="pageUpdate"
                        :total_biodata="totalbiodataInt"
                        :page_range="pageRangeInt"
                        >
                      </pagination>     
                        </div>

                    </div>


  <script src="<?php echo base_url('assets/js/crud/pagination.js');?>"></script>
<script src="<?php echo base_url('assets/js/crud/experienciasVue.js');?>"></script>
 <script src="<?php echo base_url('assets/js/crud/interesseVue.js');?>"></script>
 <script src="<?php echo base_url('assets/js/crud/cursosVue.js');?>"></script>
 <script src="<?php echo base_url('assets/js/crud/habilidadeVue.js');?>"></script>
 <script src="<?php echo base_url('assets/js/crud/expertiseVue.js');?>"></script>
  <script>
	var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 1000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
        }

        setTimeout(function() {
        that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
              new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #074656; color:#074656}";
        document.body.appendChild(css);
    };
	</script>

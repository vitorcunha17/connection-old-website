Vue.component('modal',{ //modal
    template:`
      <transition
                enter-active-class="animated "
                     leave-active-class="animated ">
    <div class="modal is-active" >
  <div class="modal-card border border border-secondary">
    <div class="modal-card-head text-center bg-dark">
    <div class="modal-card-title text-white">
          <slot name="head"></slot>
    </div>
    </div>
    <div class="modal-card-body">
         <slot name="body"></slot>
    </div>
    <div class="modal-card-foot" >
      <slot name="foot"></slot>
    </div>
  </div>
</div>
</transition>
    `
})
var e = new Vue({
    el:'#javaScriptExperiencia',
     data:{
         url: 'https://connectionrh.com.br/', 
         addModalExp: false,
         editaModalExp:false,
         deleteModalExp:false,
         experiencia:[],
         search2: {text: ''},
         emptyResultExp:false,
         novaExperiencia:{
             empresa:'',
             dataReferencia:'',
             titulo:'',
             cidadeEstado:'',
             email_candidato:''},
         pilihbiodataExp:{},
         formValidateExp:[],
         successMSGExp:'',
         
         //paginaçao
         currentPageExp: 0,
         rowCountPageExp:5,
         totalbiodataExp:0,
         pageRangeExp:2
     },
      created(){
       this.listaExperiencia(); 
     },
     methods:{
        listaExperiencia(){ axios.get(this.url+"candidato/login/listaExperiencia").then(function(response){
                  if(response.data.experiencia == null){
                      e.noResult()
                     }else{
                         e.getData(response.data.experiencia);
                     }
             })
         },
         addExperiencia(){   
             var formData = e.formData(e.novaExperiencia);
               axios.post(this.url+"candidato/login/addExperiencia", formData).then(function(response){
                 if(response.data.error){
                     e.formValidateExp = response.data.msg;
                 }else{
                     e.successMSGExp = response.data.msg;
                     e.clearAllExp();
                     e.clearMSGExp();
                 }
                })
         },
         editaExperiencia(){
             var formData = e.formData(e.pilihbiodataExp); axios.post(this.url+"candidato/login/editaExperiencia", formData).then(function(response){
                 if(response.data.error){
                     e.formValidateExp = response.data.msg;
                 }else{
                       e.successMSGExp = response.data.success;
                     e.clearAllExp();
                     e.clearMSGExp();
                 
                 }
             })
         },
         deletaExperiencia(){
              var formData = e.formData(e.pilihbiodataExp);
               axios.post(this.url+"candidato/login/deletaExperiencia", formData).then(function(response){
                 if(!response.data.error){
                      e.successMSGExp = response.data.success;
                     e.clearAllExp();
                     e.clearMSGExp();
                 }
             })
         },
          formData(obj){
       var formData = new FormData();
           for ( var key in obj ) {
               formData.append(key, obj[key]);
           } 
           return formData;
     },
         getData(experiencia){
             e.emptyResultExp = false; // become false if has a record
             e.totalBiodataExp = experiencia.length //get total of user
             e.experiencia = experiencia.slice(e.currentPageExp * e.rowCountPageExp, (e.currentPageExp * e.rowCountPageExp) + e.rowCountPageExp); //slice the result for pagination
             
              // if the record is empty, go back a page
             if(e.experiencia.length == 0 && e.currentPageExp > 0){ 
             e.pageUpdateExp(e.currentPageExp - 1)
             e.clearAllExp();  
             }
         },
             
         selectbiodata(crudExp){
             e.pilihbiodataExp = crudExp; 
         },
         clearMSGExp(){
             setTimeout(function(){
        e.successMSGExp=''
        },3000); // disappearing message success in 2 sec
         },
         clearAllExp(){
             e.novaExperiencia = { 
                empresa:'',
                dataReferencia:'',
                titulo:'',
                cidadeEstado:'',
                email_candidato:''},
             e.formValidateExp = false;
             e.addModalExp= false;
             e.editaModalExp=false;
             e.deleteModalExp=false;
             e.refresh()
             
         },
         noResult(){
           
                       e.emptyResultExp = true;  // become true if the record is empty, print 'No Record Found'
                       e.experiencia = null 
                       e.experiencia = 0 //remove current page if is empty
             
         },
 
       
         pageUpdateExp(pageNumber){
               e.currentPageExp = pageNumber; //receive currentPage number came from pagination template
                 e.refresh()  
         },
         refresh(){
            e.listaExperiencia();
              e.search2.text ? e.buscaExperiencia() : e.listaExperiencia(); //for preventing
         }
     }
 })


$('.button').click(function(){
  var buttonId = $(this).attr('id');
  $('#modal-container').removeAttr('class').addClass(buttonId);
  $('body').addClass('modal-active');
})

$('#modal-container').click(function(){
  $(this).addClass('out');
  $('body').removeClass('modal-active');
});
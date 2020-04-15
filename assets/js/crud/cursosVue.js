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
var cr = new Vue({
    el:'#javaScriptCurso',
     data:{
         url: 'https://connectionrh.com.br/', 
         addModalCur: false,
         editaModalCur:false,
         deleteModalCur:false,
         educacao:[],
         search2: {text: ''},
         emptyResultCur:false,
         novaeducacao:{
             empresa:'',
             dataReferencia:'',
             titulo:'',
             cidadeEstado:'',
             email_candidato:''},
         pilihbiodataCur:{},
         formValidateCur:[],
         successMSGCur:'',
         
         //paginaçao
         currentPageCur: 0,
         rowCountPageCur:5,
         totalbiodataCur:0,
         pageRangeCur:2
     },
      created(){
       this.listaeducacao(); 
     },
     methods:{
        listaeducacao(){ axios.get(this.url+"candidato/login/listaeducacao").then(function(response){
                  if(response.data.educacao == null){
                     cr.noResult()
                     }else{
                        cr.getData(response.data.educacao);
                     }
             })
         },
         addeducacao(){   
             var formData =cr.formData(cr.novaeducacao);
               axios.post(this.url+"candidato/login/addeducacao", formData).then(function(response){
                 if(response.data.error){
                    cr.formValidateCur = response.data.msg;
                 }else{
                    cr.successMSGCur = response.data.msg;
                    cr.clearAllCur();
                    cr.clearMSGCur();
                 }
                })
         },
         editaeducacao(){
             var formData =cr.formData(cr.pilihbiodataCur); axios.post(this.url+"candidato/login/editaeducacao", formData).then(function(response){
                 if(response.data.error){
                    cr.formValidateCur = response.data.msg;
                 }else{
                      cr.successMSGCur = response.data.success;
                    cr.clearAllCur();
                    cr.clearMSGCur();
                 
                 }
             })
         },
         deletaeducacao(){
              var formData =cr.formData(cr.pilihbiodataCur);
               axios.post(this.url+"candidato/login/deletaeducacao", formData).then(function(response){
                 if(!response.data.error){
                     cr.successMSGCur = response.data.success;
                    cr.clearAllCur();
                    cr.clearMSGCur();
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
         getData(educacao){
            cr.emptyResultCur = false; // become false if has a record
            cr.totalBiodataCur = educacao.length //get total of user
            cr.educacao = educacao.slice(cr.currentPageCur *cr.rowCountPageCur, (cr.currentPageCur *cr.rowCountPageCur) +cr.rowCountPageCur); //slice the result for pagination
             
              // if the record is empty, go back a page
             if(cr.educacao.length == 0 &&cr.currentPageCur > 0){ 
            cr.pageUpdateCur(cr.currentPageCur - 1)
            cr.clearAllCur();  
             }
         },
             
         selectbiodata(crudCur){
            cr.pilihbiodataCur = crudCur; 
         },
         clearMSGCur(){
             setTimeout(function(){
       cr.successMSGCur=''
        },3000); // disappearing message success in 2 sec
         },
         clearAllCur(){
            cr.novaeducacao = { 
                empresa:'',
                dataReferencia:'',
                titulo:'',
                cidadeEstado:'',
                email_candidato:''},
            cr.formValidateCur = false;
            cr.addModalCur= false;
            cr.editaModalCur=false;
            cr.deleteModalCur=false;
            cr.refresh()
             
         },
         noResult(){
           
                      cr.emptyResultCur = true;  // become true if the record is empty, print 'No Record Found'
                      cr.educacao = null 
                      cr.educacao = 0 //remove current page if is empty
             
         },
 
       
         pageUpdateCur(pageNumber){
              cr.currentPageCur = pageNumber; //receive currentPage number came from pagination template
                cr.refresh()  
         },
         refresh(){
           cr.listaeducacao();
             cr.search2.text ?cr.buscaeducacao() :cr.listaeducacao(); //for preventing
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
Vue.component('modal',{ //modal
    template:`
      <transition
                enter-active-class="animated "
                     leave-active-class="animated ">
    <div class="modal is-active" >
  <div class="modal-card border border border-secondary">
    <div class="modal-card-head text-center bg-dark" style="background-color: rgb(242, 139, 50);">
    <div class="modal-card-title text-white">
          <slot name="head"></slot>
    </div>
<button class="delete" @click="$emit('close')"></button>
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
var Tis = new Vue({
   el:'#expertise',
    data:{
        url: 'https://connectionrh.com.br/', 
        addModalTis: false,
        editModalTis:false,
        deleteModalTis:false,
        expertise:[],
        searchTis: {text: ''},
        emptyResultTis:false,
        novoCadastroTis:{
            conteudo:'',
            email_candidato:''},
        selectDadoTis:{},
        formValidate:[],
        successMSGTis:'',
        
        //paginaçao
        currentPageTis: 0,
        rowCountPageTis:5,
        totalbiodataTis:0,
        pageRangeTis:2
    },
     created(){
      this.listaExpertise(); 
    },
    methods:{
         listaExpertise(){ axios.get(this.url+"candidato/login/listaExpertise").then(function(response){
                 if(response.data.expertise == null){
                     Tis.noResult()
                    }else{
                        Tis.getData(response.data.expertise);
                    }
            })
        },

        buscaExpertise(){
            var formData = Tis.formData(Tis.searchTis);
              axios.post(this.url+"candidato/login/buscaExpertise", formData).then(function(response){
                  if(response.data.expertise == null){
                      Tis.noResult()
                    }else{
                      Tis.getData(response.data.expertise);
                    
                    }  
            })
        },
        
        insertExpertise(){   
            var formData = Tis.formData(Tis.novoCadastroTis);
              axios.post(this.url+"candidato/login/insertExpertise", formData).then(function(response){
                if(response.data.error){
                    Tis.formValidate = response.data.msg;
                }else{
                    Tis.successMSGTis = response.data.msg;
                    Tis.clearAll();
                    Tis.clearMSG();
                }
               })
        },
        editaExpertise(){
            var formData = Tis.formData(Tis.selectDadoTis); axios.post(this.url+"candidato/login/editaExpertise", formData).then(function(response){
                if(response.data.error){
                    Tis.formValidate = response.data.msg;
                }else{
                      Tis.successMSGTis = response.data.success;
                    Tis.clearAll();
                    Tis.clearMSG();
                
                }
            })
        },
        deletaExpertise(){
             var formData = Tis.formData(Tis.selectDadoTis);
              axios.post(this.url+"candidato/login/deletaExpertise", formData).then(function(response){
                if(!response.data.error){
                     Tis.successMSGTis = response.data.success;
                    Tis.clearAll();
                    Tis.clearMSG();
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
        getData(expertise){
            Tis.emptyResultTis = false; // become false if has a record
            Tis.totalBiodataTis = expertise.length //get total of user
            Tis.expertise = expertise.slice(Tis.currentPageTis * Tis.rowCountPageTis, (Tis.currentPageTis * Tis.rowCountPageTis) + Tis.rowCountPageTis); //slice the result for pagination
            
             // if the record is empty, go back a page
            if(Tis.expertise.length == 0 && Tis.currentPageTis > 0){ 
            Tis.pageUpdate(Tis.currentPageTis - 1)
            Tis.clearAll();  
            }
        },
            
        selectbiodata(crudTis){
            Tis.selectDadoTis = crudTis; 
        },
        clearMSG(){
            setTimeout(function(){
       Tis.successMSGTis=''
       },3000); // disappearing message success in 2 sec
        },
        clearAll(){
            Tis.novoCadastroTis = { 
                conteudo:'',
                email_candidato:''},
            Tis.formValidate = false;
            Tis.addModalTis= false;
            Tis.editModalTis=false;
            Tis.deleteModalTis=false;
            Tis.refresh()
            
        },
        noResult(){
          
               Tis.emptyResultTis = true;  // become true if the record is empty, prTis 'No Record Found'
                      Tis.expertise = null 
                     Tis.expertise = 0 //remove current page if is empty
            
        },
        pageUpdate(pageNumber){
              Tis.currentPageTis = pageNumber; //receive currentPageTis number came from pagination template
                Tis.refresh()  
        },
        refresh(){
             Tis.searchTis.text ? Tis.buscaExpertise() : Tis.listaExpertise(); //for preventing
            
        }
    }
});
$('.button').click(function(){
    var buttonId = $(this).attr('id');
    $('#modal-container').removeAttr('class').addClass(buttonId);
    $('body').addClass('modal-active');
  })
  
  $('#modal-container').click(function(){
    $(this).addClass('out');
    $('body').removeClass('modal-active');
  });

                


   

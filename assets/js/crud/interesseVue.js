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
var int = new Vue({
   el:'#interesse',
    data:{
        url: 'https://connectionrh.com.br/', 
        addModalInt: false,
        editModalInt:false,
        deleteModalInt:false,
        interesses:[],
        searchInt: {text: ''},
        emptyResultInt:false,
        novoCadastroInt:{
            titulo:'',
            conteudo:'',
            email_candidato:''},
        selectDadoInt:{},
        formValidate:[],
        successMSGInt:'',
        
        //paginaçao
        currentPageInt: 0,
        rowCountPageInt:5,
        totalbiodataInt:0,
        pageRangeInt:2
    },
     created(){
      this.listaInteresse(); 
    },
    methods:{
         listaInteresse(){ axios.get(this.url+"candidato/login/listaInteresse").then(function(response){
                 if(response.data.interesses == null){
                     int.noResult()
                    }else{
                        int.getData(response.data.interesses);
                    }
            })
        },

        buscaInteresse(){
            var formData = int.formData(int.searchInt);
              axios.post(this.url+"candidato/login/buscaInteresse", formData).then(function(response){
                  if(response.data.interesses == null){
                      int.noResult()
                    }else{
                      int.getData(response.data.interesses);
                    
                    }  
            })
        },
        
        insertInteresse(){   
            var formData = int.formData(int.novoCadastroInt);
              axios.post(this.url+"candidato/login/insertInteresse", formData).then(function(response){
                if(response.data.error){
                    int.formValidate = response.data.msg;
                }else{
                    int.successMSGInt = response.data.msg;
                    int.clearAll();
                    int.clearMSG();
                }
               })
        },
        editaInteresse(){
            var formData = int.formData(int.selectDadoInt); axios.post(this.url+"candidato/login/editaInteresse", formData).then(function(response){
                if(response.data.error){
                    int.formValidate = response.data.msg;
                }else{
                      int.successMSGInt = response.data.success;
                    int.clearAll();
                    int.clearMSG();
                
                }
            })
        },
        deletaInteresse(){
             var formData = int.formData(int.selectDadoInt);
              axios.post(this.url+"candidato/login/deletaInteresse", formData).then(function(response){
                if(!response.data.error){
                     int.successMSGInt = response.data.success;
                    int.clearAll();
                    int.clearMSG();
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
        getData(interesses){
            int.emptyResultInt = false; // become false if has a record
            int.totalBiodataInt = interesses.length //get total of user
            int.interesses = interesses.slice(int.currentPageInt * int.rowCountPageInt, (int.currentPageInt * int.rowCountPageInt) + int.rowCountPageInt); //slice the result for pagination
            
             // if the record is empty, go back a page
            if(int.interesses.length == 0 && int.currentPageInt > 0){ 
            int.pageUpdate(int.currentPageInt - 1)
            int.clearAll();  
            }
        },
            
        selectbiodata(crudInt){
            int.selectDadoInt = crudInt; 
        },
        clearMSG(){
            setTimeout(function(){
       int.successMSGInt=''
       },3000); // disappearing message success in 2 sec
        },
        clearAll(){
            int.novoCadastroInt = { 
                titulo:'',
                conteudo:'',
                email_candidato:''},
            int.formValidate = false;
            int.addModalInt= false;
            int.editModalInt=false;
            int.deleteModalInt=false;
            int.refresh()
            
        },
        noResult(){
          
               int.emptyResultInt = true;  // become true if the record is empty, print 'No Record Found'
                      int.interesses = null 
                     int.interesses = 0 //remove current page if is empty
            
        },
        pageUpdate(pageNumber){
              int.currentPageInt = pageNumber; //receive currentPageInt number came from pagination template
                int.refresh()  
        },
        refresh(){
             int.searchInt.text ? int.buscaInteresse() : int.listaInteresse(); //for preventing
            
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

                


   

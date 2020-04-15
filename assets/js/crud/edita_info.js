Vue.component('modal',{ //modal
    template:`
      <transition
                enter-active-class="animated"
                     leave-active-class="animated ">
    <div class="modal is-active" >
  <div class="modal-card border border border-secondary">
    <div class="modal-card-head text-center bg-dark" style="background-color: #f28b32;">
    <div class="modal-card-title text-white">
          <slot name="head"></slot>
    </div>
<button class="delete" @click="$emit('close')">X</button>
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
var info = new Vue({
   el:'#informacoespessoais',
    data:{
        url:'https://connectionrh.com.br/', 
        addModal: false,
        editModal:false,
        deleteModal:false,
        candidato:[],
        search: {text: ''},
        emptyResult:false,
        novoCadastro:{
            nome:'',
            nascimento:'',
            ocupacao:'',
            cep:'',
            estado:'',
            cidade:'',
            bairro:'',
            rua:'',
            num:'',
            telefone:'',
            pais:'',
            sexo:'',
            quemsou:'',
            pcd:''},
        selectDado:{},
        formValidate:[],
        successMSGInfo:'',
        
        //paginaçao
        currentPage: 0,
        rowCountPage:5,
        totalbiodata:0,
        pageRange:2
    },
     created(){
      this.listaInfos(); 
    },
    methods:{
         listaInfos(){ axios.get(this.url+"candidato/login/listaInfos").then(function(response){
                 if(response.data.candidato == null){
                    info.noResult()
                    }else{
                       info.getData(response.data.candidato);
                    }
            })
        },

        editaInfos(){
            var formData =info.formData(info.selectDado); axios.post(this.url+"candidato/login/editaInfos", formData).then(function(response){
                if(response.data.error){
                   info.formValidate = response.data.msg;
                }else{
                     info.successMSGInfo = response.data.success;
                   info.clearAll();
                   info.clearMSG();
                
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
        getData(candidato){
           info.emptyResult = false; // become false if has a record
           info.totalBiodata = candidato.length //get total of user
           info.candidato = candidato.slice(info.currentPage *info.rowCountPage, (info.currentPage *info.rowCountPage) +info.rowCountPage); //slice the result for pagination
            
             // if the record is empty, go back a page
            if(info.candidato.length == 0 &&info.currentPage > 0){ 
           info.pageUpdate(info.currentPage - 1)
           info.clearAll();  
            }
        },
            
        selectbiodata(crud){
           info.selectDado = crud; 
        },
        clearMSG(){
            setTimeout(function(){
      info.successMSGInfo=''
       },3000); // disappearing message success in 2 sec
        },
        clearAll(){
           info.novoCadastro = { 
            nome:'',
            nascimento:'',
            ocupacao:'',
            cep:'',
            estado:'',
            cidade:'',
            bairro:'',
            rua:'',
            num:'',
            telefone:'',
            pais:'',
            sexo:'',
            quemsou:'',
            pcd:''},
           info.formValidate = false;
           info.addModal= false;
           info.editModal=false;
           info.deleteModal=false;
           info.refresh()
            
        },
        noResult(){
          
              info.emptyResult = true;  // become true if the record is empty, print 'No Record Found'
                     info.candidato = null 
                    info.candidato = 0 //remove current page if is empty
            
        },
        pageUpdate(pageNumber){
             info.currentPage = pageNumber; //receive currentPage number came from pagination template
               info.refresh()  
        },
        refresh(){
           info.listaInfos(); //for preventing
            
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


   

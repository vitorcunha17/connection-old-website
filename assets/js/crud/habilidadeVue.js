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
var hab = new Vue({
   el:'#habilidadeJava',
    data:{
        url: 'https://connectionrh.com.br/', 
        addModalhab: false,
        editModalhab:false,
        deleteModalhab:false,
        habilidade:[],
        searchhab: {text: ''},
        emptyResulthab:false,
        novoCadastrohab:{
            titulo:'',
            porcentagem:'',
            descricao:'',
            instituicao:'',
            email_candidato:''},
        selectDadohab:{},
        formValidate:[],
        successMSGhab:'',
        
        //paginaçao
        currentPagehab: 0,
        rowCountPagehab:5,
        totalbiodatahab:0,
        pageRangehab:2
    },
     created(){
      this.listaHabilidade(); 
    },
    methods:{
         listaHabilidade(){ axios.get(this.url+"candidato/login/listaHabilidade").then(function(response){
                 if(response.data.habilidade == null){
                     hab.noResult()
                    }else{
                        hab.getData(response.data.habilidade);
                    }
            })
        },

        buscaHabilidade(){
            var formData = hab.formData(hab.searchhab);
              axios.post(this.url+"candidato/login/buscaHabilidade", formData).then(function(response){
                  if(response.data.habilidade == null){
                      hab.noResult()
                    }else{
                      hab.getData(response.data.habilidade);
                    
                    }  
            })
        },
        
        insertHabilidade(){   
            var formData = hab.formData(hab.novoCadastrohab);
              axios.post(this.url+"candidato/login/insertHabilidade", formData).then(function(response){
                if(response.data.error){
                    hab.formValidate = response.data.msg;
                }else{
                    hab.successMSGhab = response.data.msg;
                    hab.clearAll();
                    hab.clearMSG();
                }
               })
        },
        editaHabilidade(){
            var formData = hab.formData(hab.selectDadohab); axios.post(this.url+"candidato/login/editaHabilidade", formData).then(function(response){
                if(response.data.error){
                    hab.formValidate = response.data.msg;
                }else{
                      hab.successMSGhab = response.data.success;
                    hab.clearAll();
                    hab.clearMSG();
                
                }
            })
        },
        deletaHabilidade(){
             var formData = hab.formData(hab.selectDadohab);
              axios.post(this.url+"candidato/login/deletaHabilidade", formData).then(function(response){
                if(!response.data.error){
                     hab.successMSGhab = response.data.success;
                    hab.clearAll();
                    hab.clearMSG();
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
        getData(habilidade){
            hab.emptyResulthab = false; // become false if has a record
            hab.totalBiodatahab = habilidade.length //get total of user
            hab.habilidade = habilidade.slice(hab.currentPagehab * hab.rowCountPagehab, (hab.currentPagehab * hab.rowCountPagehab) + hab.rowCountPagehab); //slice the result for pagination
            
             // if the record is empty, go back a page
            if(hab.habilidade.length == 0 && hab.currentPagehab > 0){ 
            hab.pageUpdate(hab.currentPagehab - 1)
            hab.clearAll();  
            }
        },
            
        selectbiodata(crudhab){
            hab.selectDadohab = crudhab; 
        },
        clearMSG(){
            setTimeout(function(){
       hab.successMSGhab=''
       },3000); // disappearing message success in 2 sec
        },
        clearAll(){
            hab.novoCadastrohab = { 
                titulo:'',
                porcentagem:'',
                descricao:'',
                instituicao:'',
                email_candidato:''},
            hab.formValidate = false;
            hab.addModalhab= false;
            hab.editModalhab=false;
            hab.deleteModalhab=false;
            hab.refresh()
            
        },
        noResult(){
          
               hab.emptyResulthab = true;  // become true if the record is empty, prhab 'No Record Found'
                      hab.habilidade = null 
                     hab.habilidade = 0 //remove current page if is empty
            
        },
        pageUpdate(pageNumber){
              hab.currentPagehab = pageNumber; //receive currentPagehab number came from pagination template
                hab.refresh()  
        },
        refresh(){
             hab.searchhab.text ? hab.buscaHabilidade() : hab.listaHabilidade(); //for preventing
            
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

                


   

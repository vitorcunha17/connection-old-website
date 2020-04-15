
<!--add modal-->
<modal v-if="addModalInt" @close="clearAll()">

<h3 slot="head" style="color: #fff" >Novo Registro</h3>
<div slot="body" class="row">
    <div class="col-md-4">
          <div class="form-group">
    <label>Título</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.titulo}" name="titulo" v-model="novoCadastroInt.titulo">
            
             <div class="has-text-danger" v-html="formValidate.titulo"> </div>
            </div>
        </div>
        <div class="col-md-4">
             <div class="form-group">
    <label>Descriçao</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.conteudo}" name="conteudo" v-model="novoCadastroInt.conteudo">
            
             <div class="has-text-danger" v-html="formValidate.conteudo"> </div>
            </div>
        </div>
     
     </div>

<div slot="foot">
    <button class="btn btn-dark" @click="insertInteresse">Salvar Registro</button>
    <button class="btn" @click="addModalInt = false">Cancelar</button>
</div>

</modal>
<!-- update -->

<modal v-if="editModalInt" @close="clearAll()">
<h3 slot="head"  style="color: #fff">Editar Registro</h3>
<div slot="body" class="row">
    <div class="col-md-4">
          <div class="form-group">
             <label>Título</label>
                <input type="text" class="form-control" :class="{'is-invalid': formValidate.titulo}" name="titulo" v-model="selectDadoInt.titulo">
                 <div class="has-text-danger" v-html="formValidate.titulo"> </div>
            </div>
        </div>
<div class="col-md-4">
<div class="form-group">
        <label>Descriçao</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.conteudo}" name="conteudo" v-model="selectDadoInt.conteudo">
             <div class="has-text-danger" v-html="formValidate.conteudo"> </div>
        </div>
    </div>
<div slot="foot">
    <button class="btn btn-dark" @click="editaInteresse">Editar</button>
    <button class="btn" @click="editModalInt = false">Cancelar</button>
</div>
</div>
</modal>


<!--delete modal-->
<modal v-if="deleteModalInt" @close="clearAll()">
    <h3 slot="head"  style="color: #fff">Deletar</h3>
    <div slot="body" class="text-center">Tem certeza que gostaria de excluir o registro?</div>
         <div slot="foot">
        <button class="btn btn-dark" @click="deleteModalInt = false; deletaInteresse()" >Excluir</button>
        <button class="btn" @click="deleteModalInt = false">Cancelar</button>
    </div>
</modal>




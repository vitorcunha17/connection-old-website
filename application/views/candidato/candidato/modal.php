<!--add modal-->
<modal v-if="addModal" @close="clearAll()">

<h3 slot="head" style="color: #fff" >Novo Registro</h3>
<div slot="body" class="row">
    <div class="col-md-4">
          <div class="form-group">
    <label>Curso</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.curso2}" name="curso2" v-model="novoCadastro.curso2">
            
             <div class="has-text-danger" v-html="formValidate.curso2"> </div>
            </div>
        </div>
        <div class="col-md-4">
             <div class="form-group">
    <label>Instituicao</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.instituicao}" name="instituicao" v-model="novoCadastro.instituicao">
            
             <div class="has-text-danger" v-html="formValidate.instituicao"> </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
    <label>Periodo</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.dataReferencia}" name="dataReferencia" v-model="novoCadastro.dataReferencia">
             <div class="has-text-danger" v-html="formValidate.dataReferencia"> </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="form-group">
    <label>Cidade/Estado</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.cidadeEstado2'}" name="cidadeEstado2'" v-model="novoCadastro.cidadeEstado2'">
             <div class="has-text-danger" v-html="formValidate.cidadeEstado2'"> </div>
            </div>
         </div>

     </div>

<div slot="foot">
    <button class="btn btn-dark" @click="inserteducacao">Salvar Registro</button>
    <button class="btn" @click="addModal = false">Cancelar</button>
</div>

</modal>
<!-- update -->

<modal v-if="editModal" @close="clearAll()">
<h3 slot="head"  style="color: #fff">Editar Registro</h3>
<div slot="body" class="row">
    <div class="col-md-4">
          <div class="form-group">
       
    <label>Curso</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.curso2}" name="curso2" v-model="pilihbiodataCur.curso2">
            
             <div class="has-text-danger" v-html="formValidate.curso2"> </div>
</div>
</div>
<div class="col-md-4">
<div class="form-group">
       
    <label>Instituicao</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.instituicao}" name="instituicao" v-model="pilihbiodataCur.instituicao">
            
             <div class="has-text-danger" v-html="formValidate.instituicao"> </div>
</div>
</div>
<div class="col-md-4">
<div class="form-group">
       
    <label>Período</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.dataReferencia}" name="dataReferencia" v-model="pilihbiodataCur.dataReferencia">
            
             <div class="has-text-danger" v-html="formValidate.dataReferencia"> </div>
</div>
    </div>
    <div class="col-md-4">
<div class="form-group">
       
    <label>Cidade/Estado</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.cidadeEstado2}" name="cidadeEstado2" v-model="pilihbiodataCur.cidadeEstado2">
            
             <div class="has-text-danger" v-html="formValidate.cidadeEstado2"> </div>
</div>
    </div>
    
    
</div>
<div slot="foot">
    <button class="btn btn-dark" @click="editaeducacao">Editar</button>
    <button class="btn" @click="editModal = false">Cancelar</button>
</div>
</modal>


<!--delete modal-->
<modal v-if="deleteModal" @close="clearAll()">
    <h3 slot="head"  style="color: #fff">Deletar</h3>
    <div slot="body" class="text-center">Tem certeza que gostaria de excluir o registro?</div>
    <div slot="foot">
        <button class="btn btn-dark" @click="deleteModal = false; deletaeducacao()" >Excluir</button>
        <button class="btn" @click="deleteModal = false">Cancelar</button>
    </div>
</modal>




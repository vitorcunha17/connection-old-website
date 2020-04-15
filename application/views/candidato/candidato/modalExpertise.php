
<!--add modal-->
<modal v-if="addModalTis" @close="clearAll()">

<h3 slot="head" style="color: #fff" >Novo Registro</h3>
<div slot="body" class="row">
        <div class="col-md-8">
             <div class="form-group">
    <label>Expertise</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.conteudo}" name="conteudo" v-model="novoCadastroTis.conteudo">
            
             <div class="has-text-danger" v-html="formValidate.conteudo"> </div>
            </div>
        </div>
     
     </div>

<div slot="foot">
    <button class="btn btn-dark" @click="insertExpertise">Salvar Registro</button>
    <button class="btn" @click="addModalTis = false">Cancelar</button>
</div>

</modal>
<!-- update -->

<modal v-if="editModalTis" @close="clearAll()">
<h3 slot="head"  style="color: #fff">Editar Registro</h3>
<div slot="body" class="row">
<div class="col-md-8">
<div class="form-group">
        <label>Expertise</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.conteudo}" name="conteudo" v-model="selectDadoTis.conteudo">
             <div class="has-text-danger" v-html="formValidate.conteudo"> </div>
        </div>
    </div>
<div slot="foot">
    <button class="btn btn-dark" @click="editaExpertise">Editar</button>
    <button class="btn" @click="editModalTis = false">Cancelar</button>
</div>
</div>
</modal>


<!--delete modal-->
<modal v-if="deleteModalTis" @close="clearAll()">
    <h3 slot="head"  style="color: #fff">Deletar</h3>
    <div slot="body" class="text-center">Tem certeza que gostaria de excluir o registro?</div>
         <div slot="foot">
        <button class="btn btn-dark" @click="deleteModalTis = false; deletaExpertise()" >Excluir</button>
        <button class="btn" @click="deleteModalTis = false">Cancelar</button>
    </div>
</modal>





<!--add modal-->
<modal v-if="addModalhab" @close="clearAll()">

<h3 slot="head" style="color: #fff" >Novo Registro</h3>
<div slot="body" class="row">
    <div class="col-md-4">
          <div class="form-group">
    <label>Título</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.titulo}" name="titulo" v-model="novoCadastrohab.titulo">
            
             <div class="has-text-danger" v-html="formValidate.titulo"> </div>
            </div>
        </div>
        <div class="col-md-8">
             <div class="form-group">
    <label>Procentagem de Conclusao</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.porcentagem}" name="porcentagem" v-model="novoCadastrohab.porcentagem">
            
             <div class="has-text-danger" v-html="formValidate.porcentagem"> </div>
            </div>
        </div>
        <div class="col-md-12">
             <div class="form-group">
    <label>Descricao</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.descricao}" name="descricao" v-model="novoCadastrohab.descricao">
            
             <div class="has-text-danger" v-html="formValidate.descricao"> </div>
            </div>
        </div>

        <div class="col-md-10">
             <div class="form-group">
    <label>Instituicao Onde Cursou</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.instituicao}" name="instituicao" v-model="novoCadastrohab.instituicao">
            
             <div class="has-text-danger" v-html="formValidate.instituicao"> </div>
            </div>
        </div>

     </div>

<div slot="foot">
    <button class="btn btn-dark" @click="insertHabilidade">Salvar Registro</button>
    <button class="btn" @click="addModalhab = false">Cancelar</button>
</div>

</modal>
<!-- update -->

<modal v-if="editModalhab" @close="clearAll()">
<h3 slot="head"  style="color: #fff">Editar Registro</h3>
<div slot="body" class="row">
    <div class="col-md-4">
          <div class="form-group">
             <label>Título</label>
                <input type="text" class="form-control" :class="{'is-invalid': formValidate.titulo}" name="titulo" v-model="selectDadohab.titulo">
                 <div class="has-text-danger" v-html="formValidate.titulo"> </div>
            </div>
        </div>
<div class="col-md-8">
<div class="form-group">
        <label>Procentagem de Conclusao</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.porcentagem}" name="porcentagem" v-model="selectDadohab.porcentagem">
             <div class="has-text-danger" v-html="formValidate.porcentagem"> </div>
        </div>
    </div>
    <div class="col-md-12">
<div class="form-group">
        <label>Descricao</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.descricao}" name="descricao" v-model="selectDadohab.descricao">
             <div class="has-text-danger" v-html="formValidate.descricao"> </div>
        </div>
    </div>
    <div class="col-md-8">
<div class="form-group">
        <label>Instituicao</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.instituicao}" name="instituicao" v-model="selectDadohab.instituicao">
             <div class="has-text-danger" v-html="formValidate.instituicao"> </div>
        </div>
    </div>
<div slot="foot">
    <button class="btn btn-dark" @click="editaHabilidade">Editar</button>
    <button class="btn" @click="editModalhab = false">Cancelar</button>
</div>
</div>
</modal>


<!--delete modal-->
<modal v-if="deleteModalhab" @close="clearAll()">
    <h3 slot="head"  style="color: #fff">Deletar</h3>
    <div slot="body" class="text-center">Tem certeza que gostaria de excluir o registro?</div>
         <div slot="foot">
        <button class="btn btn-dark" @click="deleteModalhab = false; deletaHabilidade()" >Excluir</button>
        <button class="btn" @click="deleteModalhab = false">Cancelar</button>
    </div>
</modal>




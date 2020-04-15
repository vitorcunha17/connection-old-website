
<!--add modal-->
<modal v-if="addModalExp" @close="clearAllExp()">

<h3 slot="head" style="color: #fff" >Nova Experiencia</h3>
<div slot="body" class="row">
    <div class="col-md-4">
          <div class="form-group">
    <label>Empresa</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidateExp.empresa}" name="empresa" v-model="novaExperiencia.empresa">
            
             <div class="has-text-danger" v-html="formValidateExp.empresa"> </div>
            </div>
        </div>
        <div class="col-md-4">
             <div class="form-group">
    <label>Cargo</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidateExp.titulo}" name="titulo" v-model="novaExperiencia.titulo">
            
             <div class="has-text-danger" v-html="formValidateExp.titulo"> </div>
            </div>
        </div>
        <div class="col-md-4">
             <div class="form-group">
    <label>Cidade/UF</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidateExp.cidadeEstado}" name="cidadeEstado" v-model="novaExperiencia.cidadeEstado">
            
             <div class="has-text-danger" v-html="formValidateExp.cidadeEstado"> </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
    <label>Periodo</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidateExp.dataReferencia}" name="dataReferencia" v-model="novaExperiencia.dataReferencia">
            <input type="hidden" class="form-control" :class="{'is-invalid': formValidateExp.email_candidato}" value="<?= $dados[0]->email; ?>"  name="email_candidato" v-model="novaExperiencia.email_candidato">
             <div class="has-text-danger" v-html="formValidateExp.email_candidato"> </div>
            </div>
         </div>
     </div>

<div slot="foot">
    <button class="btn btn-dark" @click="addExperiencia">Salvar Registro</button>
    <button class="btn"  @click="addModalExp = false">Cancelar</button>
    
</div>

</modal>
<!-- update -->

<modal v-if="editaModalExp" @close="clearAllExp()">
<h3 slot="head"  style="color: #fff">Editar Registro</h3>
<div slot="body" class="row">
    <div class="col-md-4">
          <div class="form-group">
       
    <label>Empresa</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidateExp.empresa}" name="empresa" v-model="pilihbiodataExp.empresa">
            
             <div class="has-text-danger" v-html="formValidateExp.empresa"> </div>
</div>
</div>
<div class="col-md-4">
<div class="form-group">
       
    <label>titulo</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidateExp.titulo}" name="titulo" v-model="pilihbiodataExp.titulo">
            
             <div class="has-text-danger" v-html="formValidateExp.titulo"> </div>
</div>
</div>
<div class="col-md-4">
<div class="form-group">
       
    <label>Período</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidateExp.dataReferencia}" name="dataReferencia" v-model="pilihbiodataExp.dataReferencia">
             <div class="has-text-danger" v-html="formValidateExp.dataReferencia"> </div>
                 </div>
            </div>
            <div class="col-md-4">
<div class="form-group">
       
    <label>Cidade/UF</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidateExp.cidadeEstado}" name="cidadeEstado" v-model="pilihbiodataExp.cidadeEstado">
             <div class="has-text-danger" v-html="formValidateExp.cidadeEstado"> </div>
                 </div>
            </div>
</div>
<div slot="foot">
    <button class="btn btn-dark" @click="editaExperiencia">Editar</button>
    <button class="btn"  @click="editaModalExp = false">Cancelar</button>
</div>
</modal>


<!--delete modal-->
<modal v-if="deleteModalExp" @close="clearAllExp()">
    <h3 slot="head"  style="color: #fff">Deletar</h3>
    <div slot="body" class="text-center">Tem certeza que gostaria de excluir o registro?</div>
    <div slot="foot">
        <button class="btn btn-dark" @click="deleteModalExp = false; deletaExperiencia()" >Excluir</button>
        <button class="btn" @click="deleteModalExp = false">Cancelar</button>
    </div>
</modal>

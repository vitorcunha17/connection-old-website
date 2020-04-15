
<!-- update -->

<modal v-if="editModal" @close="clearAll()">
<h3 slot="head"  style="color: #fff">Editar Informaçoes</h3>
<div slot="body" class="row">

 <div class="col-md-4">
 <div class="form-group">
    <label>Curso</label>
  
    <select  v-model="selectDado.curso"  class="form-control" :class="{'is-invalid': formValidate.curso}" name="curso">

<?php foreach ($cursos as $curso): ?>
    <option nome="curso" value="<?= $curso->id; ?>">
        <?= $curso->nome_curso; ?>
    </option>
<?php endforeach; ?>
</select>

        </div>
    </div>
<div class="col-md-4">
<div class="form-group">
    <label>Status</label>
    <select v-model="selectDado.situacao_curso"  class="form-control" :class="{'is-invalid': formValidate.situacao_curso}" name="situacao_curso"  >
            <option disabled value="">Selecionar!</option>
            <option>Concluido</option>
            <option>Em andamento</option>
            </select>
             <div class="has-text-danger" v-html="formValidate.situacao_curso"> </div>
        </div>
    </div>

</div>
<div slot="foot">
    <button class="btn btn-dark" @click="editaFormacao">Editar</button>
<button class="btn"  @click="editModal = false">Fechar</button>

</div>
</modal>







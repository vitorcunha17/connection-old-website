<?php
if ($this->session->flashdata('msg')): echo $this->session->flashdata('msg');
endif;
?>

<h1 >Cadastrar vagas</h1>


    <div class="row" style=" margin: 20px;">
        <div class="col-12">
            <form style="    width: 450px;" class="form-group" novalidate method="post" accept-charset="utf-8">
                <div class="form-row">
                    
                
                        <input class="form-control"  type="text"  value="<?= set_value('titulo'); ?>" name="titulo" maxlength="50" placeholder="Título da vaga" id="titulo" required>
                    
                        <select placeholder="Atuacao"  class="form-control" id="area"  >
                        <option value="" selected disabled>Área</option>
                            <?php foreach ($area as $areaValue): ?>
                                <option value="<?= $areaValue->id; ?>"><?= $areaValue->area_nome; ?></option>
                            <?php endforeach; ?>
                        </select>
                        
                        <select placeholder="Atuacao"  class="form-control" id="curso" name="atuacao" required  >
                            <option value="" selected disabled>Curso</option>
                        	
                            <?php foreach ($listaCursosCadastraVagasSelect as $listaCursosCadastraVagasSelectValue): ?>
                                <option value="<?= $listaCursosCadastraVagasSelectValue->id; ?>"><?= $listaCursosCadastraVagasSelectValue->nome_curso; ?></option>
                            <?php endforeach; ?>
                        </select>
                        
                            <select class="form-control" placeholder="Para PcD ?"  name="pcd" required   >
                                <option value="" selected disabled>Para Deficientes</option>
                                <option value="sim">Sim</option>
                                <option value="não">Não</option>
                            </select>
     
              
                        <select placeholder="Cargo"  class="form-control" name="cargo" required   >
                            <option value="profissional">Profissional</option>
                            <option value="estagiario">Estagiário</option>
                        </select>

             
                        
                        <input class="form-control" type="text" value="<?= set_value('salario'); ?>" name="salario" maxlength="15" placeholder=" Salário R$" id="salario" required>
                       
                   

                        <input  class="form-control" name="experiencia" maxlength="100" placeholder="Experiencia - Ex: HTML, JAVASCRIPT, PHP..." id="experiencia" required>

                        <input class="form-control" type="hidden" name="empresa_vaga" value="<?php
                        foreach ($areaEmpresa as $areaEmpresaValue): echo $areaEmpresaValue->empresa;
                        endforeach;
                        ?>">
                        <input class="form-control" type="hidden"  name="empresa_id" value="<?php
                        foreach ($areaEmpresa as $areaEmpresaValue): echo $areaEmpresaValue->id_empresa;
                        endforeach;
                        ?>">
                        <input  class="form-control" type="hidden"  name="area_id" value="<?php
                        $x = 0;
                        foreach ($listaCursosCadastraVagasSelect as $listaCursosCadastraVagasSelectValue): if ($x == 0) : echo $listaCursosCadastraVagasSelectValue->id_area;
                                $x++;
                            endif;
                        endforeach;
                        ?>">
                    
                  
                </div>
               
                
        </div>

        <div class="form-group">

            <button class="btn btn-primary" type="submit">Cadastrar Vaga</button>
        </div>

        </form>

        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>

 
</div>
<hr>



                             
        <h1 class="col-12">Em Análise</h1>
        <br>
        <br>

        <?php foreach ($listaVagasEmpresaEmAnalise as $listaVagasEmpresaEmAnaliseValue): ?>

                           
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="single-table-price wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                  <div class="price-header">
                    <span class="price-title"><?= $listaVagasEmpresaEmAnaliseValue->nome_curso; ?></span>
                    <div class="price">
                    <h4 style="color:#fff"> <?= $listaVagasEmpresaEmAnaliseValue->nome_vaga; ?></h4>
                      <sup class="price-up">    <?= $listaVagasEmpresaEmAnaliseValue->salario_vaga; ?></sup>
                    </div>
                  </div>
                  <div class="price-article">
                    <ul>
                     <small style="color:#074656">- <?= $listaVagasEmpresaEmAnaliseValue->area_nome; ?></small><br>
                     <p style="color:#074656">Experiência:</p><small style="color:#f28b32"> <?= $listaVagasEmpresaEmAnaliseValue->experiencia_vaga; ?></small><br>
                    <small style="color:#074656"> Empresa:</small> <small style="color:#f28b32"><?= $listaVagasEmpresaEmAnaliseValue->empresa_vaga; ?></small><br>
                    <small style="color:#074656">PcD:</small><small style="color:#f28b32"> <?= lcfirst($listaVagasEmpresaEmAnaliseValue->pcd); ?></small>
                    </ul>
                  </div>
                  <div class="price-footer">
                <button  class="purchase-btn" data-toggle="modal" data-target="#modal2" id="b2">Em Análise</button>
            </div>
          </div>
       </div>
    
    <?php endforeach; ?>
   
    


        <h1 class="col-12">Aceitas</h1>

        <br>
        <br>
  
        <?php foreach ($listaVagasEmpresaAceitas as $listaVagasEmpresaAceitasValue): ?>
            
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="single-table-price wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                  <div class="price-header">
                    <span class="price-title"><?= $listaVagasEmpresaAceitasValue->nome_curso; ?></span>
                    <div class="price">
                    <h4 style="color:#fff"> <?= $listaVagasEmpresaAceitasValue->nome_vaga; ?></h4>
                      <sup class="price-up">    <?= $listaVagasEmpresaAceitasValue->salario_vaga; ?></sup>
                    </div>
                  </div>
                  <div class="price-article">
                    <ul>
                     <small style="color:#074656">- <?= $listaVagasEmpresaAceitasValue->area_nome; ?></small><br>
                     <p style="color:#074656">Experiência:</p><small style="color:#f28b32"> <?= $listaVagasEmpresaAceitasValue->experiencia_vaga; ?></small><br>
                    <small style="color:#074656"> Empresa:</small> <small style="color:#f28b32"><?= $listaVagasEmpresaAceitasValue->empresa_vaga; ?></small><br>
                    <small style="color:#074656">PcD:</small><small style="color:#f28b32"> <?= lcfirst($listaVagasEmpresaAceitasValue->pcd); ?></small>
                    </ul>
                  </div>
                  <div class="price-footer">
                <button  class="purchase-btn" data-toggle="modal" data-target="#modal2" id="b2">Aceita</button>
            </div>
          </div>
       </div>

        <?php endforeach; ?>


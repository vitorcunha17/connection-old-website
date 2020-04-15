
<style>


    .container-fluide {
        padding: 0px 7px;
        margin-right: 2px;
    }
    .bg-grey {
        background-color: #074656;
    }


    .panel {
        border: 1px solid #f4511e;
        border-radius:0 !important;
        transition: box-shadow 0.5s;
    }
    .panel:hover {
        box-shadow: 5px 0px 40px rgba(0,0,0, .2);
    }
    .panel-footer .btn:hover {
        border: 1px solid #f4511e;
        background-color: #fff !important;
        color: #f4511e;
    }
    .panel-heading {
        color: #fff !important;
        background-color: #074656 !important;
        padding: 5px;
        border-bottom: 1px solid transparent;
        border-top-left-radius: 0px;
        border-top-right-radius: 0px;
        border-bottom-left-radius: 0px;
        border-bottom-right-radius: 0px;
    }
    .panel-footer {
        background-color: white !important;
    }
    .panel-footer h3 {
        font-size: 32px;
    }
    .panel-footer h4 {
        color: #aaa;
        font-size: 14px;
    }
    .panel-footer .btn {
        margin: 4px 0;
        background-color: #074656;
        color: #fff;
    }



    .btn-lg {
        width: 100%;
        margin-bottom: 4px;
    }
    }

</style>




<section  id="pricing-table" style="    padding: 0px 0;" >           
                    
                    <div class="container"  >
                   
                      <div class="row" style="margin-top: -28px">
                      
                      <?php $controller = get_instance(); /* instancia a classe */ ?>

                    <!-- se a empresa não tiver nenhum plano e não tiver nenhum pagamento de plano aguardando aprovação-->
                    <?php if ($areaEmpresa[0]->plano_empresa < 1 AND count($controller->pega_plano_pedidos()) < 1) { ?>

                        <div class="col-md-12"> 
   
                          <div class="pricing-table-content">
                            <div class="row">
                            <?php foreach ($listaPlanos as $listaPlanosValue): /* lista os planos */ ?>
                              <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="single-table-price wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
                                  <div class="price-header">
                                    <span class="price-title"><?= $listaPlanosValue->nome_planos; ?></span>
                                    <div class="price">
                                      <sup class="price-up">R$</sup>
                                      <?= number_format($listaPlanosValue->valor_planos, 2, ",", "."); ?>
                                      <span class="price-down">/a.m</span>
                                    </div>
                                  </div>
                                  <div class="price-article">
                                    <ul>
                                      <li>10 Vagas/ano</li>
                                      <li><?= $listaPlanosValue->limite_planos; ?> Candidatos/ano</li>
                                      <li>5 Candidatos intercambista</li>
                                      <li>1 Recisão Contratual</li>
                                      <li>10 Candidatos no mapa</li>
                                    </ul>
                                  </div>
                                  <div class="price-footer">
                                  <form method="post" accept-charset="utf-8" action="<?= base_url('empresa/login/valida_plano') ?>">
                                             <input type="hidden" value="<?= $listaPlanosValue->id_planos; ?>" name="id_plano">
                                              <button class="purchase-btn">Assinar</button>
                                  </form>
                                    
                                  </div>
                                </div>
                              </div>
                            
                              <?php endforeach; /* fim da listagem */ ?>
                            
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                





        <!-- se a empresa ainda não tiver um plano mas tiver um pagamento de plano aguardando aprovação -->
    <?php } elseif ($areaEmpresa[0]->plano_empresa < 1 AND count($controller->pega_plano_pedidos()) >= 1) { ?>

        <h5>Seu pagamento esta aguardando aprovação!</h5>

    <?php } else { ?> <!-- ================================================================================ -->












        <!-- SE O PLANO AINDA NÃO TERMINOU E A EMPRESA TIVER COM PAGAMENTOS PENDENTES -->
        <?php if ($controller->verifica_plano_status()['status'] == 2 OR $controller->verifica_plano_status()['status'] == 8) { ?>

            <h5>Seu plano atual é: <strong><?= strtolower($pegaPlano[0]->nome_planos); ?></strong></h5>
            <h5><?= 'Saldo: <span class="saldo text-primary">' . $pegaPlano[0]->limite_restante_vagas_plano . '</span> candidatos'; ?></h5>
            <p><?= $controller->verifica_plano_status()['msg'] ?></p>

            <p>Pagar as tarifas atrasadas:</p>
            <form method="post" action="<?= base_url('empresa/login/pagar_todas_tarifas') ?>">
                <input type="hidden" name="pagar_todas_tarifas" value="pagar_todas_tarifas">
                <button type="submit" class="btn btn-success btn-lg">Pagar</button>
            </form><!-- ============================================================================== -->











            <!-- SE O PLANO AINDA NÃO TERMINOU E A EMPRESA TIVER COM PAGAMENTOS PENDENTES -->
        <?php } elseif ($controller->verifica_plano_status()['status'] == 9) { ?>

            <h5>Seu plano atual é: <strong><?= strtolower($pegaPlano[0]->nome_planos); ?></strong></h5>
            <h5><?= 'Saldo: <span class="saldo text-primary">' . $pegaPlano[0]->limite_restante_vagas_plano . '</span> candidatos'; ?></h5>
            <p><?= $controller->verifica_plano_status()['msg'] ?></p>

            <div class="container margin-top">
                <div class="row">
                    <div class="col-12">
                        <form method="post" accept-charset="utf-8" action="<?= base_url('empresa/login/valida_plano') ?>">

                            <div class="form-group row"  style="width: 500px;margin-left: 10px;" >
                                <label for="atuacao" class="col-3 col-form-label">Planos</label>
                                <div class="col-7">
                                    <select name="id_plano" required class="form-control">

                                        <?php if ($areaEmpresa[0]->plano_empresa >= 1): ?>
                                            <option value="" selected disabled><?= $pegaPlano[0]->nome_planos . ' | valor: ' . $pegaPlano[0]->valor_planos . ' | limite: ' . $pegaPlano[0]->limite_planos; ?></option>
                                        <?php endif; ?>
                                        <?php foreach ($listaPlanos as $listaPlanosValue): ?>
                                            <?php if (@$pegaPlano[0]->id_planos != $listaPlanosValue->id_planos): ?>
                                                <option value="<?= $listaPlanosValue->id_planos; ?>"><?= $listaPlanosValue->nome_planos . ' | valor: ' . $listaPlanosValue->valor_planos . ' | limite: ' . $listaPlanosValue->limite_planos; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                    </select>

                                </div>
                                <button type="submit" class="btn btn-info">Assinar</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div><!-- ================================================================================== -->














            <!-- SE O PLANO TERMINOU E A EMPRESA TIVER COM PAGAMENTOS PENDENTES -->
        <?php } elseif ($controller->verifica_plano_status()['status'] == 7) { ?>

            <h5>Seu plano: <strong><?= strtolower($pegaPlano[0]->nome_planos); ?></strong></h5>
            <p><?= $controller->verifica_plano_status()['msg'] ?></p>

            <p>Pagar as tarifas atrasadas:</p>
            <form method="post" action="<?= base_url('empresa/login/pagar_todas_tarifas') ?>">
                <input type="hidden" name="pagar_todas_tarifas" value="pagar_todas_tarifas">
                <button type="submit" class="btn btn-success btn-lg">Pagar</button>
            </form><!-- ============================================================================== -->
















            <!-- SE A EMPRESA NÃO TIVER COM PAGAMENTOS PENDENTES -->
        <?php } elseif ($controller->verifica_plano_status()['status'] == 3) { ?>

            <h5>Seu plano atual é: <strong><?= strtolower($pegaPlano[0]->nome_planos); ?></strong></h5>
            <h5><?= 'Saldo: <span class="saldo text-primary">' . $pegaPlano[0]->limite_restante_vagas_plano . '</span> candidatos'; ?></h5>
            <p><?= $controller->verifica_plano_status()['msg'] ?></p>

            <form method="post" action="<?= base_url('empresa/login/pagamento_antecipado') ?>">
                <div class="form-group row">
                    <label for="pagar_adiantado" class="col-3 col-form-label">Pagar adiantado:</label>
                    <div class="col-md-7">
                        <select class="form-control" name="pagar_adiantado" id="pagar_adiantado" required>
                            <option value="" disabled selected>Deseja pagar quantos meses adiantado?</option>

                            <?php
                            for ($i = 1; $i <= $controller->verifica_plano_status()['para_pagar']; $i++) {
                                echo "<option value=" . $i . ">$i</option>";
                            }
                            ?>

                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Pagar</button>
                </div>
            </form>

            <div class="container margin-top">
                <div class="row">
                    <div class="col-12">
                        <form method="post" accept-charset="utf-8" action="<?= base_url('empresa/login/valida_plano') ?>">

                            <div class="form-group row"  style="width: 500px;margin-left: 10px;" >
                                <label for="atuacao" class="col-3 col-form-label">Planos</label>
                                <div class="col-7">
                                    <select name="id_plano" required class="form-control">

                                        <?php if ($areaEmpresa[0]->plano_empresa >= 1): ?>
                                            <option value="" selected disabled><?= $pegaPlano[0]->nome_planos . ' | valor: ' . $pegaPlano[0]->valor_planos . ' | limite: ' . $pegaPlano[0]->limite_planos; ?></option>
                                        <?php endif; ?>
                                        <?php foreach ($listaPlanos as $listaPlanosValue): ?>
                                            <?php if (@$pegaPlano[0]->id_planos != $listaPlanosValue->id_planos): ?>
                                                <option value="<?= $listaPlanosValue->id_planos; ?>"><?= $listaPlanosValue->nome_planos . ' | valor: ' . $listaPlanosValue->valor_planos . ' | limite: ' . $listaPlanosValue->limite_planos; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                    </select>

                                </div>
                                <button type="submit" class="btn btn-info">Assinar</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div><!-- ================================================================================== -->











            <!-- SE O PLANO TERMINOU E A EMPRESA TIVER COM PAGAMENTOS PENDENTES AGUARDANDO APROVAÇÃO -->
        <?php } elseif ($controller->verifica_plano_status()['status'] == 6) { ?>

            <h5>Seu plano: <strong><?= strtolower($pegaPlano[0]->nome_planos); ?></strong></h5>
            <p><?= $controller->verifica_plano_status()['msg'] ?></p>
            <h5>O plano terminou, o pagamento foi feito e esta aguardando aprovação!</h5>
            <!-- ========================================================================================== -->













            <!-- SE O PLANO TERMINOU E A EMPRESA NÃO TIVER COM PAGAMENTOS PENDENTES -->
        <?php } elseif ($controller->verifica_plano_status()['status'] == 5) { ?>

            <h5>O plano terminou e não existe pagamentos pendentes!</h5>
            <div class="container margin-top">
                <div class="row">
                    <div class="col-12">
                        <form method="post" accept-charset="utf-8" action="<?= base_url('empresa/login/valida_plano') ?>">

                            <div class="form-group row">
                                <label for="atuacao" class="col-3 col-form-label"  style="width: 500px; margin-left: 10px;" >Planos</label>
                                <div class="col-7">
                                    <select name="id_plano" required class="form-control">

                                        <?php if ($areaEmpresa[0]->plano_empresa >= 1): ?>
                                            <option value="" selected disabled><?= $pegaPlano[0]->nome_planos . ' | valor: ' . $pegaPlano[0]->valor_planos . ' | limite: ' . $pegaPlano[0]->limite_planos; ?></option>
                                        <?php endif; ?>
                                        <?php foreach ($listaPlanos as $listaPlanosValue): ?>
                                            <?php if (@$pegaPlano[0]->id_planos != $listaPlanosValue->id_planos): ?>
                                                <option value="<?= $listaPlanosValue->id_planos; ?>"><?= $listaPlanosValue->nome_planos . ' | valor: ' . $listaPlanosValue->valor_planos . ' | limite: ' . $listaPlanosValue->limite_planos; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                    </select>

                                </div>
                                <button type="submit" class="btn btn-info">Assinar</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div><!-- ================================================================================== -->












            <!-- SE O PLANO TERMINA ESTE MÊS E A EMPRESA NÃO TIVER COM PAGAMENTOS PENDENTES -->
        <?php }elseif ($controller->verifica_plano_status()['status'] == 4) { ?>

            <h5>Seu plano: <strong><?= strtolower($pegaPlano[0]->nome_planos); ?></strong></h5>
            <p><?= $controller->verifica_plano_status()['msg'] ?></p>
            <div class="container margin-top">
                <div class="row">
                    <div class="col-12">
                        <form method="post" accept-charset="utf-8" action="<?= base_url('empresa/login/valida_plano') ?>">

                            <div class="form-group row">
                                <label for="atuacao" class="col-3 col-form-label"  style="width: 500px; margin-left: 10px;" >Planos</label>
                                <div class="col-7">
                                    <select name="id_plano" required class="form-control">

                                        <?php if ($areaEmpresa[0]->plano_empresa >= 1): ?>
                                            <option value="" selected disabled><?= $pegaPlano[0]->nome_planos . ' | valor: ' . $pegaPlano[0]->valor_planos . ' | limite: ' . $pegaPlano[0]->limite_planos; ?></option>
                                        <?php endif; ?>
                                        <?php foreach ($listaPlanos as $listaPlanosValue): ?>
                                            <?php if (@$pegaPlano[0]->id_planos != $listaPlanosValue->id_planos): ?>
                                                <option value="<?= $listaPlanosValue->id_planos; ?>"><?= $listaPlanosValue->nome_planos . ' | valor: ' . $listaPlanosValue->valor_planos . ' | limite: ' . $listaPlanosValue->limite_planos; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                    </select>

                                </div>
                                <button type="submit" class="btn btn-info">Assinar</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div><!-- ================================================================================== -->













            <!-- SE O PLANO NÃO TERMINOU E A EMPRESA TIVER COM PAGAMENTOS PENDENTES PAGOS AGUARDANDO APROVAÇÃO -->
        <?php }elseif ($controller->verifica_plano_status()['status'] == 1) { ?>

            <h5>Seu plano: <strong><?= strtolower($pegaPlano[0]->nome_planos); ?></strong></h5>
            <p><?= $controller->verifica_plano_status()['msg'] ?></p>

            <?php
        }
    }
    ?>
    <!-- ======================================================================================== -->

</div>
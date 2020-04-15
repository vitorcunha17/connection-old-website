<h2 class="col-12 text-center"  style="margin-left: 10px;">Meu perfil</h2>
<div class="container" style="width: 760px; margin-top: 2px; margin-left: 15px;">
    <div class="row">
        <div class="col-12">
            <p><strong>Empresa:</strong> <?= $areaEmpresa[0]->empresa; ?></p>
            <p><strong>Cep:</strong> <?= $areaEmpresa[0]->cep; ?></p>
            <p><strong>CNPJ:</strong> <?= $areaEmpresa[0]->cnpj; ?></p>
            <p><strong>Área:</strong> <?= $areaEmpresa[0]->area_nome; ?></p>
            <p><strong>Estado:</strong> <?= $areaEmpresa[0]->estado; ?></p>
            <p><strong>Cidade:</strong> <?= $areaEmpresa[0]->cidade; ?></p>
            <p><strong>Telefone:</strong> <?= $areaEmpresa[0]->telefone; ?></p>
        </div>
    </div>
</div>
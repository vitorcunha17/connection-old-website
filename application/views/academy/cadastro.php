<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<style type="text/css">
		html, body {margin: 10px;}
		* {margin: 0;padding: 0;border: none;box-sizing: border-box;}
		.formualrio_empresa {display: none}
		.formualrio_candidato {display: none}
		.oculta {display: none}
		input, select {padding: 15px 10px;border-radius: 30px;border: 1px solid #eee;width: calc(400px - 30px);outline: none}
		input[type="submit"] {background: #66BB6A;width: 100%}
		select {width: 100%}
		.bloco {width: calc(400px - 30px);display: flex;flex-direction: row;justify-content: space-between;align-items: center;text-align: center;padding: 15px}
		.cadastro_candidato , .cadastro_empresa {width: 50%;display: inline-block;padding: 15px}
		.cadastro_candidato {background: #ccc;}
		#cadastro_candidato:checked ~ .bloco > .cadastro_candidato {background: #66BB6A;color: #2E7D32 !important}
		#cadastro_candidato:checked ~ .formualrio_candidato {display: block}
		.cadastro_empresa {background: #ddd}
		#cadastro_empresa:checked ~ .bloco > .cadastro_empresa {background: #66BB6A;color: #2E7D32 !important}
		#cadastro_empresa:checked ~ .formualrio_empresa {display: block}
		h1 {font-size: 18px;padding: 0 10px}
		p {font-size: 14px;padding: 0 10px;width: 360px}
		.termos {width: 360px;height: 80px;overflow: auto;background: #efeeee;padding: 5px;margin: 10px 0}
		.checkTermos {width: auto;margin-right: 10px}
	</style>
</head>
<body>

	<input type="radio" class="oculta" id="cadastro_candidato" checked name="cadasro">
	<input type="radio" class="oculta" id="cadastro_empresa" name="cadasro">

	<div class="bloco">
	  <label for="cadastro_candidato" class="cadastro_candidato">Candidato</label>
	  <label for="cadastro_empresa" class="cadastro_empresa">Empresa</label>
	</div>

	<?php if($this->session->flashdata("msg")) { echo $this->session->flashdata("msg"); } ?>

	<form method="post" action="<?= base_url('acesso/acessoUsuario/valida_cadastro') ?>" class="formualrio_candidato formulario">

	    <h1>Cadastro para candidato</h1>
	    
	    <table>
	      <tr>
	        <td><input type="email" name="email" placeholder="Qual seu email?" required></td>
	      </tr>
	      <tr>
	        <td>
	            <select name="sexo">
	              <option value="Masculino">Masculino</option>
	              <option value="Feminino">Feminino</option>
	            </select>  
	        </td>
	      </tr>
	      <tr>
	        <td><input type="date" required name="nascimento"></td>
	      </tr>
	      <tr>
	        <td><input type="password" required name="senha" class="senhaCA" placeholder="Escolha uma senha de 5 á 30 caracteres"></td>
	      </tr>
	      <tr>
	        <td><input type="password" required name="repitaSenha" class="repitaSenhaCA" placeholder="Repita a senha"></td>
	      </tr>
	      <tr>
	      	<td>
	      		<input type="checkbox" name="" class="checkTermos termosCA">Aceitos os termos de uso
	      		<p class="termos">Where does it come from?
Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
	      	</td>
	      </tr>
	      <tr>
	        <td><input type="submit" value="Me cadastrar!" class="cadastraCandidato"></td>
	      </tr>
	    </table>
	  	<input type="hidden" name="tipo" value="candidato">
	</form>

	<form method="post" action="<?= base_url('acesso/acessoUsuario/valida_cadastro') ?>" class="formualrio_empresa formulario" required>

	    <h1>Cadastro para empresa</h1>
	    
	    <table>
	      <tr>
	        <td><input type="email" name="email" placeholder="Qual seu email?" required></td>
	      </tr>
	      <tr>
	        <td><input type="text" name="empresa" placeholder="Qual nome da empresa?" required></td>
	      </tr>
	      <tr>
	        <td><input type="text" required placeholder="CNPJ" name="cnpj"></td>
	      </tr>
	      <tr>
	        <td><input type="password" required name="senha" class="senhaEM" placeholder="Escolha uma senha de 5 á 30 caracteres"></td>
	      </tr>
	      <tr>
	        <td><input type="password" required name="repitaSenha" class="repitaSenhaEM" placeholder="Repita a senha"></td>
	      </tr>
	      <tr>
	      	<td>
	      		<input type="checkbox" name="" class="checkTermos termosEM">Aceitos os termos de uso
	      		<p class="termos">Where does it come from?
Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
	      	</td>
	      </tr>
	      <tr>
	        <td><input type="submit" value="Me cadastrar!" class="cadastraEmpresa"></td>
	      </tr>
	    </table>
	  	<input type="hidden" name="tipo" value="empresa">
	</form>

	<script type="text/javascript">
		
		var $senhaCA       = document.querySelector(".senhaCA");
		var $repitaSenhaCA = document.querySelector(".repitaSenhaCA");
		var $senhaEM       = document.querySelector(".senhaEM");
		var $repitaSenhaEM = document.querySelector(".repitaSenhaEM");
		var $botaoCA       = document.querySelector(".cadastraCandidato");
		var $botaoEM       = document.querySelector(".cadastraEmpresa");
		var $formCA        = document.querySelector(".formualrio_candidato");
		var $formEM        = document.querySelector(".formualrio_empresa");
		var $termosCA      = document.querySelector(".termosCA");
		var $termosEM      = document.querySelector(".termosEM");

		$botaoCA.addEventListener("click", function(evt){
			
			if(($senhaCA.value == $repitaSenhaCA.value) && $senhaCA.value.length > 1) {
				if($termosCA.checked == true) {
					$formCA.submit();
				}else{
					alert("Você precisa aceitar os termos de uso.");
					evt.preventDefault();
				}
			}else {
				alert("Preencha as senhas corretamente!");
				evt.preventDefault();
			}
		})

		$botaoEM.addEventListener("click", function(evt){
			
			if(($senhaEM.value == $repitaSenhaEM.value) && $senhaEM.value.length > 1) {
				if($termosEM.checked == true) {
					$formEM.submit();
				}else{
					alert("Você precisa aceitar os termos de uso.");
					evt.preventDefault();
				}
			}else {
				alert("Preencha as senhas corretamente!");
				evt.preventDefault();
			}
		})

	</script>

</body>
</html>
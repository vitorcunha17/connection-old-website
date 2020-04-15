<?php
class Acesso extends CI_Model {

	private $email, $genero, $nascimento, $senha;

	public function verificaLogar($email, $senha) {

		$this->load->database();

		//verifica se existe esse cadastro em uma das tabelas
		$consultaEMP = $this->db->query('SELECT * FROM empresa WHERE confirmou_email = "sim" AND email=' . $this->db->escape($email) . ' AND senha='. $this->db->escape($senha));
		$consultaCAN = $this->db->query('SELECT * FROM candidato WHERE confirmou_email = "sim" AND email=' . $this->db->escape($email) . ' AND senha='. $this->db->escape($senha));
		$consultaDEP = $this->db->query('SELECT * FROM departamentos WHERE email_coord = ' . $this->db->escape($email) . ' AND senha='. $this->db->escape($senha));
		  
		if($consultaEMP->num_rows() > 0) {

        	//existe uma empresa com esses dados, então retornar uma sessão
        	$dados = ['conta_status' => 'empresa', 'dadosUsuario' => $consultaEMP->result()];
        	return $dados;

			
        }elseif($consultaCAN->num_rows() > 0) {

        	//existe um candidato com esses dados, então retornar uma sessão
        	$dados = ['conta_status' => 'candidato', 'dadosUsuario' => $consultaCAN->result()];
			return $dados;
			

        }elseif($consultaDEP->num_rows() > 0) {

        	//existe um coordenador com esses dados, então retornar uma sessão
        	$dados = ['conta_status' => 'coordenadores', 'dadosUsuario' => $consultaDEP->result()];
        	return $dados;

        }else {

        	$dados = ['conta_status' => 'nenhuma'];
        	return $dados;

        }

	}

	//valida o cadastro
	public function verificaCadastro($email, $senha, $sexo = null, $nascimento = null, $empresa = null, $cnpj = null, $tipo) {

		$this->load->database();

		//verifica se existe esse cadastro em uma das tabelas
		$consultaADM = $this->db->query('SELECT * FROM administrador WHERE email_administrador=' . $this->db->escape($email));
		$consultaEMP = $this->db->query('SELECT * FROM empresa WHERE email=' . $this->db->escape($email));
		$consultaCAN = $this->db->query('SELECT * FROM candidato WHERE email=' . $this->db->escape($email));

		$status = [];
        if($consultaADM->num_rows() > 0) {

        	//se já existir um cadastro com esse email
        	$status["status"] = null;
        	return $status;

        }elseif($consultaEMP->num_rows() > 0) {

        	//se já existir um cadastro com esse email
        	$status["status"] = null;
        	return $status;

        }elseif($consultaCAN->num_rows() > 0) {

        	//se já existir um cadastro com esse email
        	$status["status"] = null;
        	return $status;

        }else {

        	//se NÃO existir um cadastro com esse email
        	$resultado = SELF::cadastraUsuario($email, $senha, $sexo, $nascimento, $empresa, $cnpj, $tipo);
        	if($resultado["resultado"] == true) {

        		if($resultado["de"] == "candidato") {


        			//pega os dados do candidato que acabou de se cadastrar
        			$dadosCAN = $this->db->query('SELECT * FROM candidato WHERE email=' . $this->db->escape($email) .'AND senha='.$this->db->escape($senha));
        			$status["status"] = true;
        			$status["id"]     = $dadosCAN->result()[0]->id_candidato;
        			return $status;

        		}elseif($resultado["de"] == "empresa") {

        			//pega os dados da empresa que acabou de se cadastrar
        			$dadosEMP = $this->db->query('SELECT * FROM empresa WHERE email=' . $this->db->escape($email) .'AND senha='.$this->db->escape($senha));
        			$status["status"] = true;
        			$status["id"]     = $dadosEMP->result()[0]->id_empresa;
        			return $status;

        		}
        		
        	}else {
        		$status["status"] = false;
        		return $status;
        	}

        }

	}

	//cadastra usuario
	public function cadastraUsuario($email, $senha, $sexo = null, $nascimento = null, $empresa = null, $cnpj = null, $tipo) {

		$this->load->database();
		$resultado = [];

		if($tipo == "candidato") {

			$this->db->insert("candidato", ["email" => $email, "senha" => $senha, "confirmou_email" => "sim", "primeiro_acesso" => "sim", "sexo" => $sexo, "nascimento" => $nascimento]);
			$resultado["resultado"] = true;
			$resultado["de"] = "candidato";
			return $resultado;

		}elseif($tipo == "empresa") {

			$this->db->insert("empresa", ["email" => $email, "senha" => $senha,  "confirmou_email" => "sim", "primeiro_acesso" => "sim",  "empresa" => $empresa, "cnpj" => $cnpj]);
			$resultado["resultado"] = true;
			$resultado["de"] = "empresa";
			return $resultado;

		}else {

			$resultado["resultado"] = false;
			$resultado["de"] = "";
			return $resultado;

		}

	}

	//valida email
	public function confirmarEmail($id, $token) {

		$this->load->database();

		$consultaEMP = $this->db->query('SELECT * FROM empresa WHERE id_empresa=' . $this->db->escape($id));
		$consultaCAN = $this->db->query('SELECT * FROM candidato WHERE id_candidato=' . $this->db->escape($id));

		if($consultaCAN->num_rows() > 0) {

			if(hash("sha1", $consultaCAN->result()[0]->email.$consultaCAN->result()[0]->senha) == $token) {
				$this->db->query('UPDATE candidato SET confirmou_email = "sim" WHERE id_candidato=' . $this->db->escape($id)); //confirma o email
				return true;
			}else {
				return false;
			}

		}elseif($consultaEMP->num_rows() > 0) {

			if(hash("sha1", $consultaEMP->result()[0]->email.$consultaEMP->result()[0]->senha) == $token) {
				$this->db->query('UPDATE empresa SET confirmou_email = "sim" WHERE id_empresa=' . $this->db->escape($id)); //confirma o email
				return true;
			}else {
				return false;
			}

		}

	}

	//valida a recuperação de senha
	public function verificaRecuperacao($email) {

		$this->load->database();

		//verifica se existe esse cadastro em uma das tabelas
		$consultaADM = $this->db->query('SELECT * FROM administrador WHERE email_administrador=' . $this->db->escape($email));
		$consultaEMP = $this->db->query('SELECT * FROM empresa WHERE email=' . $this->db->escape($email));
		$consultaCAN = $this->db->query('SELECT * FROM candidato WHERE email=' . $this->db->escape($email));

        if($consultaADM->num_rows() > 0) {

        	//existe um admin com esses dados
        	$dados = ['dadosUsuario' => $consultaADM->result(), "conta"=>"ADM"];
        	return $dados;

        }elseif($consultaEMP->num_rows() > 0) {

        	//existe uma empresa com esses dados
        	$dados = ['dadosUsuario' => $consultaEMP->result(),"conta"=>"EMP"];
        	return $dados;

        }elseif($consultaCAN->num_rows() > 0) {

        	//existe um candidato com esses dados
        	$dados = ['dadosUsuario' => $consultaCAN->result(),"conta"=>"CAN"];
        	return $dados;

        }else {

        	$dados = ['dadosUsuario' => 'nenhuma'];
        	return $dados;

        }

	}

	//valida a alteração
	public function validaAlteracao($email, $senha, $codigoURL) {

		$this->load->database();

		//verifica se existe esse cadastro em uma das tabelas
		$consultaADM = $this->db->query('SELECT * FROM administrador WHERE email_administrador=' . $this->db->escape($email));
		$consultaEMP = $this->db->query('SELECT * FROM empresa WHERE email=' . $this->db->escape($email));
		$consultaCAN = $this->db->query('SELECT * FROM candidato WHERE email=' . $this->db->escape($email));

        if($consultaADM->num_rows() > 0) {

        	if(hash("sha1", $consultaADM->result()[0]->email_administrador.$consultaADM->result()[0]->senha_administrador) == $codigoURL) {

        	//existe um admin com esses dados
        	$this->db->where('email_administrador', $email);
    		$this->db->set('senha_administrador', hash("sha512", $senha));
    		$this->db->update('administrador');
        	return true;

        	}else {

        		return false;

        	}

        }elseif($consultaEMP->num_rows() > 0) {

        	if(hash("sha1", $consultaEMP->result()[0]->email.$consultaEMP->result()[0]->senha) == $codigoURL) {

        	//existe uma empresa com esses dados
        	$this->db->where('email', $email);
    		$this->db->set('senha', hash("sha512", $senha));
    		$this->db->update('empresa');
        	return true;

        	}else {

        		return false;

        	}

        }elseif($consultaCAN->num_rows() > 0) {

        	if(hash("sha1", $consultaCAN->result()[0]->email.$consultaCAN->result()[0]->senha) == $codigoURL) {

        	//existe um candidato com esses dados
        	$this->db->where('email', $email);
    		$this->db->set('senha', hash("sha512", $senha));
    		$this->db->update('candidato');
        	return true;

        	}else {

        		return false;

        	}

        }else {

        	return false;

        }

	}

}
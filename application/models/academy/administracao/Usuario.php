<?php


class ADM extends Upload {
    
    
public function cadastraADM($dados) {

		$this->load->database();
		


				
				//$dados['status']          = 1;
				//$dados['data_inscricao']  = date('d/m/Y');
				$this->db->insert('administrador', $dados);
				return 'certo';

		}

}
?>


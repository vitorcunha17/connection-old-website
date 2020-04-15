<?php

class AnotacaoModel extends CI_Model {

    public function cadastraAnotacao(array $dados) {
        $this->load->database();
        if ($this->db->insert('anotacoes', [
                    'anotacao' => $dados['anotacao'],
                    'id_candidato' => $dados['id_candidato'],
                    'id_empresa' => $dados['id_empresa']
                ])) {
            return true;
        } else {
            return false;
        }
    }
    
}
?>
<?php

class DisparoEmailModel extends CI_Model{

    public function cadastraHorario(array $dados){
        $this->load->database();
        if($this->db->insert('disparo_email', [
                    'horario' => $dados['horario'],
                ])) {
            return true;
        } else {
            return false;
        }
    }

    public function getCandidatos(){
        $this->load->database();
        $this->db->select('nome, email');    
        $this->db->from('candidato');

        $query = $this->db->get();

        if($query->num_rows() > 0){
            var_dump ($query->result());
            return  $query->result();
        }else{
            return false;
        }
    }

    public function getVagas(){
        $this->load->database();
        $this->db->select('*');    
        $this->db->from('vagas');
        
        $query = $this->db->get();

        if($query->num_rows() > 0){
            var_dump ($query->result());
            return  $query->result();
        }else{
            return false;
        }
    }

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_m extends CI_Model {

   
// CRUD DE Informaçoes Pessoais

public function listaInfos($email){
    $this->load->database(); 
    $this->db->where('email', $email); 
       $query = $this->db->get('empresa');

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function editaInfos($email, $field){
        $this->load->database();  
        $this->db->where('email', $email);
        $this->db->update('empresa', $field);
        if($this->db->affected_rows() >0){
            return true;
        }else{
            return false;
        }
        
    }


}

/* End of file crud_m.php */
/* Location: ./application/models/crud_m.php */
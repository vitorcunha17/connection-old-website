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


    public function insertVideoDB($email, $field){
        $this->load->database();  
        $this->db->where('email', $email);
        $this->db->update('candidato', $field);
        if($this->db->affected_rows() >0){
            return true;
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

    
    public function listavagas($email){
        $this->load->database(); 
        $this->db->where('email', $email); 
        $query = $this->db->get('vagas');

            if($query->num_rows() > 0){
                return $query->result();
            }else{
                return false;
            }
        }

    public function editavagas($field, $id){
        $this->load->database();  
        $this->db->where('id', $id);
        $this->db->update('vagas', $field);
        if($this->db->affected_rows() >0){
            return true;
        }else{
            return false;
        }
        
    }

    public function deletavagas($id){
        $this->load->database();  
         $this->db->where('id', $id);
        $this->db->delete('vagas');
           if($this->db->affected_rows() >0){
            return true;
        }else{
            return false;
        }
        
    }

        // CRUD LISTA VAGAS
        public function _listavagas( $idEmpresa, $status){
            $this->load->database();
                $this->db->select('nome_vaga, curso_vaga, area_curso, nome_curso, salario_vaga, experiencia_vaga, empresa_vaga, empresa_id, pcd, cargo, status_vaga');    
                $this->db->from('area');
                $this->db->join('curso', 'curso.id_area = area.id');
                $this->db->join('vagas', 'vagas.curso_vaga = curso.id');
                $this->db->join('empresa', 'vagas.empresa_id = empresa.id_empresa');
                $this->db->where('vagas.empresa_id', $idEmpresa); 
                $this->db->where('vagas.status_vaga', $status); 
                $query = $this->db->get();
                if($query->num_rows() > 0){
                    return  $query->result();
                }else{
                    return false;
                }
        }

        // SELECT * FROM area 
        // INNER JOIN curso cu ON cu.id_area = area.id 
        // INNER JOIN vagas va ON va.curso_vaga = cu.id 
        // INNER JOIN empresa a ON va.empresa_id = a.id_empresa 
        // WHERE va.empresa_id = " . $this->db->escape($id) . " AND va.status_vaga = " . $this->db->escape($status) . " ORDER BY va.id_vaga DESC"


}

/* End of file crud_m.php */
/* Location: ./application/models/crud_m.php */
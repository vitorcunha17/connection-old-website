<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_m extends CI_Model {

    // CRUD FORMACAO ACADEMICA
     public function listaFormacao($email){
            $this->load->database();
                $this->db->where('email', $email); 
                $this->db->select('*');    
                $this->db->from('candidato');
                $this->db->join('curso', 'candidato.curso = curso.id');
                $query = $this->db->get();
                if($query->num_rows() > 0){
                    return $query->result();
                }else{
                    return false;
                }
        }


    public function editaFormacao($email, $field){
        $this->load->database();  
        $this->db->where('email', $email);
        $this->db->update('candidato', $field);
        if($this->db->affected_rows() >0){
            return true;
        }else{
            return false;
        }
        
    }

// CRUD DE Informaçoes Pessoais

public function listaInfos($email){
    $this->load->database(); 
    $this->db->where('email', $email); 
       $query = $this->db->get('candidato');

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function editaInfos($email, $field){
        $this->load->database();  
        $this->db->where('email', $email);
        $this->db->update('candidato', $field);
        if($this->db->affected_rows() >0){
            return true;
        }else{
            return false;
        }
        
    }

// CRUD DE educacao

 public function listaeducacao($email){
    $this->load->database(); 
    $this->db->where('email_candidato', $email); 
       $query = $this->db->get('educacao');

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

   public function buscaeducacao($match, $email) {
        $this->load->database();  
        $field = array('curso2','instituicao','cidadeEstado2', 'email_candidato');    
        $this->db->where('email_candidato', $email);
        $this->db->like('concat('.implode(',',$field).')',$match);
        $query = $this->db->get('educacao');
         if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

	 public function inserteducacao($data){
        $this->load->database();  
        return $this->db->insert('educacao', $data);
    }

    public function editaeducacao($id, $field){
        $this->load->database();  
        $this->db->where('id', $id);
        $this->db->update('educacao', $field);
        if($this->db->affected_rows() >0){
            return true;
        }else{
            return false;
        }
        
    }

    public function deletaeducacao($id){
        $this->load->database();  
         $this->db->where('id', $id);
        $this->db->delete('educacao');
           if($this->db->affected_rows() >0){
            return true;
        }else{
            return false;
        }
        
    }


    // CRUD DE HABILIDADE

 public function listaHabilidade($email){
    $this->load->database(); 
    $this->db->where('email_candidato', $email); 
       $query = $this->db->get('habilidade');

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

   public function buscaHabilidade($match, $email) {
        $this->load->database();  
        $field = array('titulo','habilidade', 'email_candidato');    
        $this->db->where('email_candidato', $email);
        $this->db->like('concat('.implode(',',$field).')',$match);
        $query = $this->db->get('habilidade');
         if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

	 public function insertHabilidade($data){
        $this->load->database();  
        return $this->db->insert('habilidade', $data);
    }

    public function editaHabilidade($id, $field){
        $this->load->database();  
        $this->db->where('id', $id);
        $this->db->update('habilidade', $field);
        if($this->db->affected_rows() >0){
            return true;
        }else{
            return false;
        }
        
    }

    public function deletaHabilidade($id){
        $this->load->database();  
         $this->db->where('id', $id);
        $this->db->delete('habilidade');
           if($this->db->affected_rows() >0){
            return true;
        }else{
            return false;
        }
        
    }



    // CRUD de EXPERIENCIAS

    public function listaExperiencia($email){
        $this->load->database(); 
        $this->db->where('email_candidato', $email); 
           $query = $this->db->get('experiencia');
            if($query->num_rows() > 0){
                return $query->result();
            }else{
                return false;
            }
        }
     

         public function addExperiencia($data){
            $this->load->database();  
            return $this->db->insert('experiencia', $data);
        }


        public function editaExperiencia($id, $field){
            $this->load->database();  
            $this->db->where('id', $id);
            $this->db->update('experiencia', $field);
            if($this->db->affected_rows() >0){
                return true;
            }else{
                return false;
            }
            
        }
        
        public function deletaExperiencia($id){
            $this->load->database();  
             $this->db->where('id', $id);
            $this->db->delete('experiencia');
               if($this->db->affected_rows() >0){
                return true;
            }else{
                return false;
            }
            
        }


        // CRUD INTERESSES  Interesse
	    public function listaInteresse($email){
            $this->load->database(); 
            $this->db->where('email_candidato', $email); 
               $query = $this->db->get('interesses');
               if($query->num_rows() > 0){
                return $query->result();
            }else{
                return false;
            }
            }
           public function buscaInteresse($match, $email) {
                $this->load->database();  
                $field = array('titulo','conteudo', 'email_candidato');    
                $this->db->where('email_candidato', $email);
                $this->db->like('concat('.implode(',',$field).')',$match);
                $query = $this->db->get('interesses');
                 if($query->num_rows() > 0){
                    return $query->result();
                }else{
                    return false;
                }
        }
             public function insertInteresse($data){
                $this->load->database();  
                return $this->db->insert('interesses', $data);
            }
            public function editaInteresse($id, $field){
                $this->load->database();  
                $this->db->where('id', $id);
                $this->db->update('interesses', $field);
                if($this->db->affected_rows() >0){
                    return true;
                }else{
                    return false;
                }
                
            }
            public function deletaInteresse($id){
                $this->load->database();  
                 $this->db->where('id', $id);
                $this->db->delete('interesses');
                   if($this->db->affected_rows() >0){
                    return true;
                }else{
                    return false;
                }
                
            }
    

              // CRUD EXPERTISE
	    public function listaExpertise($email){
            $this->load->database(); 
            $this->db->where('email_candidato', $email); 
               $query = $this->db->get('pontoforte');
               if($query->num_rows() > 0){
                return $query->result();
            }else{
                return false;
            }
            }
           public function buscaExpertise($match, $email) {
                $this->load->database();  
                $field = array('conteudo', 'email_candidato');    
                $this->db->where('email_candidato', $email);
                $this->db->like('concat('.implode(',',$field).')',$match);
                $query = $this->db->get('pontoforte');
                 if($query->num_rows() > 0){
                    return $query->result();
                }else{
                    return false;
                }
        }
             public function insertExpertise($data){
                $this->load->database();  
                return $this->db->insert('pontoforte', $data);
            }
            public function editaExpertise($id, $field){
                $this->load->database();  
                $this->db->where('id', $id);
                $this->db->update('pontoforte', $field);
                if($this->db->affected_rows() >0){
                    return true;
                }else{
                    return false;
                }
                
            }
            public function deletaExpertise($id){
                $this->load->database();  
                 $this->db->where('id', $id);
                $this->db->delete('pontoforte');
                   if($this->db->affected_rows() >0){
                    return true;
                }else{
                    return false;
                }
                
            }
}

/* End of file crud_m.php */
/* Location: ./application/models/crud_m.php */
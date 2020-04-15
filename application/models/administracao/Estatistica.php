<?php
include('Upload.php');
date_default_timezone_set('America/Sao_Paulo');
class Estatistica extends Upload {
    
    
    
    public function getEnderecoByArea() {
	$this->load->database();
        $quantidade = $this->db->query("SELECT p.num As 'num2', p.rua AS 'rua2', p.bairro As 'bairro2', p.cidade AS 'cidade2', p.empresa AS 'nome2', p.ramo AS 'area2', p.logo, p.estado AS 'estado2',x.nome, x.video_nome, x.area, area_nome, x.foto_candidato, x.num , x.rua, x.bairro, x.cidade, x.estado, x.curso FROM empresa p, candidato x INNER JOIN curso cu ON curso= cu.id INNER JOIN area on cu.id_area = area.id where status = 2;");
         return $quantidade->result();                                                                                                               
    }
    

    
    
    }

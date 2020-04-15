<?php

include('Upload.php');
date_default_timezone_set('America/Sao_Paulo');

class Localizacao extends Upload {

    public function getEnderecoByArea($id) {
        $this->load->database();
        $quantidade = $this->db->query("SELECT id_candidato, nome, video_nome, foto_candidato, cu.nome_curso, num, rua, bairro, cidade, estado, candidato.curso FROM candidato INNER JOIN curso cu ON candidato.curso = cu.id INNER JOIN area a ON cu.id_area = $id");
        return $quantidade->result();
    }

    public function listaVagas($area, $cargo) {
        $this->load->database();
        $sql = $this->db->query("SELECT * FROM area INNER JOIN curso cu ON cu.id_area = area.id INNER JOIN vagas va ON va.curso_vaga = cu.id WHERE area.id = " . $this->db->escape($area) . " AND va.status_vaga = 2 AND va.pcd = 'não' AND va.cargo = " . $this->db->escape($cargo) . " ORDER BY va.id_vaga DESC");
        return $sql->result();
    }

}

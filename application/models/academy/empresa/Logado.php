<?php

class Logado extends CI_Model {

    public function listaArea() {
        $this->load->database();
        $sql = $this->db->query("SELECT DISTINCT id, area_nome FROM area ORDER BY area_nome ASC");
        return $sql->result();
    }

    public function listaCurso() {
        $this->load->database();
        //$sql = $this->db->query("SELECT DISTINCT id, nome_curso, id_area FROM curso ORDER BY nome_curso ASC");
        $sql = $this->db->query("SELECT DISTINCT curso.id as curso_id, curso.nome_curso, curso.id_area, area.area_nome FROM curso INNER JOIN area ON curso.id_area = area.id ORDER BY nome_curso ASC");

        return $sql->result();
    }

    public function listaUniversidades() {
        $this->load->database();
        $sql = $this->db->query("SELECT * FROM universidades ORDER BY univer ASC");
        return $sql->result();
    }


    public function listaCandidato() {
        $this->load->database();
        $sql = $this->db->query("SELECT cu.nome_curso, cu.id, cu.id_area, a.area_nome, a.id, candidato.nome, candidato.curso, candidato.curso, candidato.recomendados, candidato.video_nome, candidato.id_candidato, candidato.pcd FROM candidato INNER JOIN curso cu ON candidato.curso = cu.id INNER JOIN area a ON cu.id_area = a.id WHERE candidato.status = 2 ORDER BY candidato.nome ASC");
        return $sql->result();
    }

    public function listaAlunos($univer) {
        $this->load->database();
        $sql = $this->db->query("SELECT  cu.nome_curso, cu.id, cu.id_area, a.area_nome, a.id, candidato.nome, candidato.curso, candidato.curso, candidato.recomendados, candidato.video_nome, candidato.id_candidato, candidato.pcd FROM candidato INNER JOIN curso cu ON candidato.curso = cu.id INNER JOIN area a ON cu.id_area = a.id WHERE candidato.status = 2 AND candidato.univer = " . $this->db->escape($univer) . " ORDER BY candidato.nome ASC");
        return $sql->result();
    }

    //"SELECT FROM `candidato` WHERE `id_candidato` IN (".implode(',',$candidatos).")";
    public function candidatosSelecionados($candidatos) {
        $this->load->database();
        $sql = $this->db->query("
        SELECT cu.nome_curso, cu.id, candidato.nome, candidato.email, candidato.quemsou, candidato.situacao_curso, candidato.id_candidato, candidato.curso, candidato.video_nome, candidato.recomendados, candidato.curso, candidato.curso, candidato.recomendados, candidato.video_nome, candidato.id_candidato, candidato.pcd 
        FROM candidato
        INNER JOIN curso cu ON  candidato.curso = cu.id
        WHERE candidato.id_candidato IN (" . implode(',', $this->db->escape($candidatos)) . ") AND status = 2 ORDER BY nome ASC");
        return $sql->result();
    }

    //LISTAGEM DAS VAGAS =====================================================================================================================
    //lista a vaga pro candidato sem deficiência
    public function listaVagas($area, $cargo) {
        $this->load->database();
        $sql = $this->db->query("SELECT * FROM area INNER JOIN curso cu ON cu.id_area = area.id INNER JOIN vagas va ON va.curso_vaga = cu.id WHERE area.id = " . $this->db->escape($area) . " AND va.status_vaga = 2 AND va.pcd = 'não' AND va.cargo = " . $this->db->escape($cargo) . " ORDER BY va.id_vaga DESC");
        return $sql->result();
    }

    public function listacidades() {
        $this->load->database();
        $sql = $this->db->query("SELECT DISTINCT municipio, uf from municipios_ibge");
        return $sql->result();
    }

    //lista a vaga pro candidato com deficiência
    public function listaVagasPCD($area, $cargo) {
        $this->load->database();
        $sql = $this->db->query("SELECT * FROM area INNER JOIN curso cu ON cu.id_area = area.id INNER JOIN vagas va ON va.curso_vaga = cu.id WHERE area.id = " . $this->db->escape($area) . " AND va.status_vaga = 2 AND va.pcd = 'sim' AND va.cargo = " . $this->db->escape($cargo) . " ORDER BY va.id_vaga DESC");
        return $sql->result();
    }

    //lista a vaga pra empresa em questão (essas vagas serão exibidas para a empresa que as criou)
    public function listaVagasEmpresas($id, $status) {
        $this->load->database();
        $sql = $this->db->query("SELECT * FROM area INNER JOIN curso cu ON cu.id_area = area.id INNER JOIN vagas va ON va.curso_vaga = cu.id INNER JOIN empresa a ON va.empresa_id = a.id_empresa WHERE va.empresa_id = " . $this->db->escape($id) . " AND va.status_vaga = " . $this->db->escape($status) . " ORDER BY va.id_vaga DESC");
        return $sql->result();
    }

    //lista a vaga para aprovação
    public function listaVagasAprovacao($status) {
        $this->load->database();
        $sql = $this->db->query("SELECT * FROM area INNER JOIN curso cu ON cu.id_area = area.id INNER JOIN vagas va ON va.curso_vaga = cu.id INNER JOIN empresa a ON va.empresa_id = a.id_empresa WHERE va.status_vaga = " . $this->db->escape($status) . " ORDER BY va.id_vaga DESC");
        return $sql->result();
    }

    //A vaga muda o status para 2, ou seja, a vaga é aceita
    public function vagaAceita($id, $status) {
        $this->load->database();
        //pega dados da vaga
        $vaga = SELF::pegaDadosVaga($id); //usado apenas para pegar o email da empresa
        //envia o email avisando que a vaga foi aceita
        $header = 'MIME-Version: 1.0' . "\r\n";
        $header .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $to = $vaga[0]->email;
        $subject = html_entity_decode("Status da sua vaga");
        $message = html_entity_decode("Sua vaga:<br> '<strong>" . $vaga[0]->nome_vaga . "</strong>', foi aceita!");
        mail($to, $subject, $message, $header);
        $this->db->query("UPDATE vagas SET status_vaga = $status WHERE id_vaga = " . $this->db->escape($id));
    }

    //pega os dados de uma vaga em especifico
    public function pegaDadosVaga($id_vaga) {
        $this->load->database();
        $sql = $this->db->query("SELECT * FROM area INNER JOIN curso cu ON cu.id_area = area.id INNER JOIN vagas va ON va.curso_vaga = cu.id INNER JOIN empresa a ON va.empresa_id = a.id_empresa WHERE va.id_vaga = " . $this->db->escape($id_vaga));
        return $sql->result();
    }

    //Se a vaga for rejeitada, então ela será apagada
    public function vagaRejeitada($id_vaga) {

        $this->load->database();
        //pega dados da vaga
        $vaga = SELF::pegaDadosVaga($id_vaga); //usado apenas para pegar o email da empresa
        //envia o email avisando que a vaga foi rejeitada
        $header = 'MIME-Version: 1.0' . "\r\n";
        $header .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $to = $vaga[0]->email;
        $subject = html_entity_decode("Status da sua vaga");
        $message = html_entity_decode("Sua vaga:<br> '<strong>" . $vaga[0]->nome_vaga . "</strong>', não se adequa ao nosso sistema!");
        mail($to, $subject, $message, $header);
        //apaga a vaga
        $this->db->query("DELETE FROM vagas WHERE id_vaga = " . $this->db->escape($id_vaga));
    }

    // ======================================================================================================================================
    //pega a area da empresa para que possa exibir resultados direcionados com o interesse dela
    public function pegaArea($email) {

        $this->load->database();
        $quantidade = $this->db->query("SELECT * FROM empresa INNER JOIN area a ON empresa.ramo = a.id WHERE empresa.email = " . $this->db->escape($email));
        return $quantidade->result();
    }

    //pega o plano da empresa caso ela tenha
    public function pegaPlano($email) {

        $this->load->database();
        $quantidade = $this->db->query("SELECT * FROM empresa INNER JOIN area a ON empresa.ramo = a.id INNER JOIN planos ON empresa.plano_empresa = planos.id_planos WHERE empresa.email = " . $this->db->escape($email));
        return $quantidade->result();
    }

     public function candidatosAprovados($id_empresa) {
        $this->load->database();
        $sql = $this->db->query("select distinct id_candidato from reunioes where id_empresa = " . $this->db->escape($id_empresa));
        return $sql->result();
    }
  
    public function pegaReuniao($id_candidato) {
        $this->load->database();
        $sql = $this->db->query("select * from reunioes where id_candidato = " . $this->db->escape($id_candidato));
        return $sql->result();
    }

    //pega os pedidos de plano da empresa (se houver)
    public function pegaPedidos($id) {

        $this->load->database();
        $quantidade = $this->db->query("SELECT * FROM planos_pedidos INNER JOIN empresa ON planos_pedidos.id_empresa_planos_pedido = empresa.id_empresa INNER JOIN planos ON planos_pedidos.id_planos = planos.id_planos WHERE planos_pedidos.id_empresa_planos_pedido = " . $id);
        return $quantidade->result();
    }

    public function listaCursosCadastraVagasSelect($email) {
        $this->load->database();
        $sql = $this->db->query("SELECT empresa.ramo, empresa.email, cu.id, cu.id_area, cu.nome_curso FROM empresa INNER JOIN curso cu ON empresa.ramo = cu.id_area WHERE empresa.email = " . $this->db->escape($email));
        return $sql->result();
    }

    //cadastra visita da empresa
    public function cadastraVisita($id_empresa, $id_candidato, $nome_empresa) {

        //verifica se já existe uma visita da empresa, caso nao exista cadastra, se existir não faz nada
        $this->load->database();
        $sql = $this->db->query("SELECT * FROM visitas WHERE id_candidato = " . $this->db->escape($id_candidato) . " AND id_empresa = " . $this->db->escape($id_empresa));
        //conta os resultados pra saber se existe
        $contar = $sql->result();
        //se não existir nenhuma visita da empresa, então cadastra a visita

        if (count($contar) < 1) {

            $this->db->insert('visitas', ['id_candidato' => $id_candidato, 'id_empresa' => $id_empresa, 'nome_empresa' => $nome_empresa]);
        }


        }
    
        public function pegaInteresses($email) {

            $this->load->database();
    
                //verifica se email existe
                if (SELF::verificaUsuario($email) >= 1) {
    
                    $resultado = $this->db->query("SELECT * FROM interesses WHERE email_candidato = ".$this->db->escape($email));
                    return $resultado->result();
    
                }
    
            }
    
        public function pegaEducacao($email) {
    
            $this->load->database();
    
                //verifica se email existe
                if (SELF::verificaUsuario($email) >= 1) {
    
                    $resultado = $this->db->query("SELECT * FROM educacao WHERE email_candidato = ".$this->db->escape($email)." ORDER BY dataReferencia ASC");
                    return $resultado->result();
    
                }
        }
    
        
        public function pegaExperiencia($email) {
    
            $this->load->database();
    
                //verifica se email existe
                if (SELF::verificaUsuario($email) >= 1) {
    
                    $resultado = $this->db->query("SELECT * FROM experiencia WHERE email_candidato = ".$this->db->escape($email)." ORDER BY dataReferencia ASC");
                    return $resultado->result();
    
                }
        }
    
    
        public function pegaHabilidade($email) {
    
            $this->load->database();
    
                //verifica se email existe
                if (SELF::verificaUsuario($email) >= 1) {
    
                    $resultado = $this->db->query("SELECT * FROM habilidade WHERE email_candidato = ".$this->db->escape($email));
                    return $resultado->result();
    
                }
        }
    
        public function pegaPontoForte($email) {
    
            $this->load->database();
    
                //verifica se email existe
                if (SELF::verificaUsuario($email) >= 1) {
    
                    $resultado = $this->db->query("SELECT * FROM pontoforte WHERE email_candidato = ".$this->db->escape($email));
                    return $resultado->result();
    
                }
        }
    
        public function pegaPortfolio($email) {
    
            $this->load->database();
    
                //verifica se email existe
                if (SELF::verificaUsuario($email) >= 1) {
    
                    $resultado = $this->db->query("SELECT * FROM portfolio WHERE email_candidato = ".$this->db->escape($email));
                    return $resultado->result();
    
                }
        }
    
            //pega as recomendações das empresas
            public function pegaRecomendacao($candidato_id) {
    
                $this->load->database();
                $sql = $this->db->query("SELECT DISTINCT * FROM recomendados INNER JOIN empresa em ON recomendados.id_recomendados_empresa = em.id_empresa INNER JOIN area a ON em.ramo = a.id WHERE recomendados.id_recomendados_candidato = " . $this->db->escape($candidato_id));
                return $sql->result();
            }

            public function verificaUsuario($email) {

                $this->load->database();
                //verifica se usuaio existe
                $quantidade = $this->db->get_where('candidato', ['email' => $email]);
                return $quantidade->num_rows();
            }
    }



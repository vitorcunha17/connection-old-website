<?php

include('Upload.php');

class Candidato extends Upload {

    // Candidato com status 1: em analise
    // Candidato com status 2: aprovado
    // Candidato com status 3: reprovado
    // Candidato com status 9: candidato que nao enviou o video



    //Apos se cadastrar e confirmar o email, o usuario será movido para uma tela, nessa tela ele precisará preencher alguns dados pessoas, apôs preencher, será aqui a atualização deles
    public function primeiroAcesso( array $dados, $email) {

            $this->load->database();

            //verifica se email existe
            if (SELF::verificaUsuario($email) >= 1) {

                $dados['status'] = 9;
                $dados['data_inscricao'] = date('d/m/Y');
                $this->db->where('email', $email);
                $this->db->set($dados);
                $this->db->update('candidato');
                return true;

            }else {

                return false;
            }
    }

    public function cadastraProblema($dados){
        $analise = Parent::load($dados["video"]);

        if ($analise != false) {
                $dados['video'] = $analise;
                $dados['data_inscricao'] = date('d/m/Y');
                $this->db->insert('problemas', $dados);
                return 'Cadastro Realizado Com Sucesso!';

            }else {

                return 'Error - Infeliz!';
            }
            
    }
    public function enviarVideo(array $dados, $email) {

        $this->load->database();
        //verifica se o vídeo é valido
        $analise = Parent::load($dados["video_nome"]);

        if ($analise != false) {

            //verifica se email existe
            if (SELF::verificaUsuario($email) >= 1) {

                $dados['video_nome'] = $analise;
                $dados['status'] = 1;
                $dados['data_inscricao'] = date('d/m/Y');
                $this->db->where('email', $email);
                $this->db->set($dados);
                $this->db->update('candidato');
                return true;

            }else {

                return false;
            }

        } else {

            return false;
        }
    }


    public function cadastraInteresses(array $dados, $email) {

        $this->load->database();

            //verifica se email existe
            if (SELF::verificaUsuario($email) >= 1) {

                $this->db->insert('interesses', $dados);
                return true;

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



    public function cadastraEducacao(array $dados, $email) {

        $this->load->database();

            //verifica se email existe
            if (SELF::verificaUsuario($email) >= 1) {

                $this->db->insert('educacao', $dados);
                return true;

            }
    }


    public function insertReuniao(array $dados) {

        $this->load->database();
        $this->db->insert('reunioes', $dados);

        $this->load->database();
        $this->db->where('id_candidato', $dados['id_candidato']); 
        $this->db->where('id_empresa', $dados['id_empresa']); 
        $query = $this->db->get('reunioes');
 
         if($query->num_rows() > 0){
             return $query->result();
         }else{
             return false;
         }
        return true;
    }


    public function pegaEducacao($email) {

        $this->load->database();

            //verifica se email existe
            if (SELF::verificaUsuario($email) >= 1) {

                $resultado = $this->db->query("SELECT * FROM educacao WHERE email_candidato = ".$this->db->escape($email)." ORDER BY dataReferencia ASC");
                return $resultado->result();

            }
    }

    public function cadastraExperiencia(array $dados, $email) {

        $this->load->database();

            //verifica se email existe
            if (SELF::verificaUsuario($email) >= 1) {

                $this->db->insert('experiencia', $dados);
                return true;

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

    public function cadastraHabilidade(array $dados, $email) {

        $this->load->database();

            //verifica se email existe
            if (SELF::verificaUsuario($email) >= 1) {

                $this->db->insert('habilidade', $dados);
                return true;

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

    public function cadastraPontoForte(array $dados, $email) {

        $this->load->database();

            //verifica se email existe
            if (SELF::verificaUsuario($email) >= 1) {

                $this->db->insert('pontoforte', $dados);
                return true;

            }
    }



    public function editaPontoForte2($email, $id){
        $this->load->database();  
        $this->db->where('id', $id);
        $this->db->update('pontoforte', $id);
        if($this->db->affected_rows() >0){
            return true;
        }else{
            return false;
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

        public function cadastraPortfolio(array $dados, $email) {

        $this->load->database();

            //verifica se email existe
            if (SELF::verificaUsuario($email) >= 1) {

                //gera um novo nome para a imagem
                $novo_nome = SELF::novoNome($this->nome_temporario);
                move_uploaded_file(
                    $dados["foto"]["tmp_name"], getcwd() . '/assets/candidato/portfolio/' . $novo_nome . '.' . pathinfo($dados["foto"]["name"], PATHINFO_EXTENSION)
                );

                $dados["foto"] = $novo_nome . '.' . pathinfo($dados["foto"]["name"], PATHINFO_EXTENSION);

                $this->db->insert('portfolio', $dados);
                return true;

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



    //CHAT ==========================================

    public function enviamensagem(array $dados) {

        $this->load->database();

            //verifica qual a empresa que comprou o candidato

                $consulta = $this->db->query("SELECT * FROM candidatos_comprados WHERE id_candidato_comprado = ".$this->db->escape($dados["id_candidato"]));
                $dados["id_empresa"]  = $consulta->result()[0]->id_empresa_compradora; 
                $insere   = $this->db->insert("mensagens", $dados);

    }

    //FIM CHAT ======================================






    public function cadastraCandidato($dados, $video) {

        $this->load->database();
        //verifica se o vídeo é valido
        $analise = Parent::load($video);

        if ($analise != false) {

            //verifica se email existe
            if (SELF::verificaUsuario($dados['email']) >= 1) {

                unlink(getcwd() . '/assets/candidato/video_analise/' . $analise);
                return 'existe';
            } else {

                $dados['video_nome'] = $analise;
                $dados['status'] = 1;
                $dados['data_inscricao'] = date('d/m/Y');
                $this->db->insert('candidato', $dados);
                return 'certo';
            }
        } else {

            return false;
        }
    }

    public function editaPontoForte(array $dados) {

        $this->load->database();

        $id = $dados['id'];
        $conteudo = $dados['conteudo1'];
        $titulo = $dados['titulo1'];
        $nome = $dados['nome_candidato1'];
        $this->db->query('UPDATE pontoforte SET conteudo1 = ' . $this->db->escape($conteudo) . ', titulo1 = ' . $this->db->escape($titulo) . ' WHERE id= ' . $this->db->escape($id) . ' AND nome_candidato1 =' . $this->db->escape($nome));

        return 'certo';
    }
 
    public function editaQuemsou($quemsou, $id_candidato) {

        $this->load->database();
        $this->db->query('UPDATE candidato SET quemsou = ' . $this->db->escape($quemsou) . ' WHERE id_candidato = ' . $this->db->escape($id_candidato));
        return true;
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

    //atualiza a foto de perfil
    public function atualizaFoto($email, $foto, $foto_anterior) {

        $this->load->database();
        //verifica se a foto é valida
        $analise = SELF::load($foto);

        if ($analise != false) {

            //verifica se email existe
            if (SELF::verificaUsuario($email) >= 1) {

                $dados['foto_candidato'] = $analise;
                $this->db->where('email', $email);
                $this->db->set('foto_candidato', $dados['foto_candidato']);
                $this->db->update('candidato');
                if ($foto_anterior != 'padrao.png') {
                    unlink(getcwd() . '/assets/candidato/foto_candidato/' . $foto_anterior);
                }
                return true;
            } else {

                unlink(getcwd() . '/assets/candidato/foto_candidato/' . $analise);
                return false;
            }
        } else {

            return false;
        }
    }

    public function listaCurso() {
        $this->load->database();
        $sql = $this->db->query("SELECT DISTINCT id, nome_curso, id_area FROM curso ORDER BY id DESC");
        return $sql->result();
    }

    public function listapaises() {
        $this->load->database();
        //$sql = $this->db->query("SELECT DISTINCT paisId, paisNome from pais ORDER BY paisId ASC");
        //return $sql->result();
    }

    public function verificaUsuario($email) {

        $this->load->database();
        //verifica se usuaio existe
        $quantidade = $this->db->get_where('candidato', ['email' => $email]);
        return $quantidade->num_rows();
    }

    public function logarCandidato($email, $senha) {

        $this->load->database();
        $this->db->where('email', $email);
        $this->db->where('senha', $senha);
        $quantidade = $this->db->get('candidato')->row_array();
        return $quantidade;
    }

    public function listarCandidato($id) {

        $this->load->database();
        $quantidade = $this->db->query("SELECT * FROM candidato INNER JOIN curso cu ON candidato.curso = cu.id INNER JOIN area a ON cu.id_area = a.id WHERE candidato.id_candidato = " . $this->db->escape($id));
        return $quantidade->result();
    }

    //lista todos os candidatos, independente do status
    public function listarTodosCandidatos() {

        $this->load->database();
        $quantidade = $this->db->query("SELECT * FROM candidato INNER JOIN curso cu ON candidato.curso = cu.id INNER JOIN area a ON cu.id_area = a.id");
        return $quantidade->result();
    }

    //---------------------------------------------------------------------------------
    //lista candidatos contratados
    public function listarCandidatosContratados() {

        $this->load->database();
        $quantidade = $this->db->query("SELECT * FROM candidatos_comprados INNER JOIN candidato ON candidato.id_candidato = id_candidato_comprado INNER JOIN curso ON candidato.curso = curso.id");
        return $quantidade->result();
    }

    //-----------------------------------------------------------------------------------



    public function listarCandidatoEmail($email) {

        $this->load->database();
        $quantidade = $this->db->query("SELECT * FROM candidato INNER JOIN curso cu ON candidato.curso = cu.id INNER JOIN area a ON cu.id_area = a.id WHERE candidato.email = " . $this->db->escape($email));
        return $quantidade->result();
    }

    //lista os candidatos para aprovacao da administrcao
    public function listarCandidatosAprovacao() {

        $this->load->database();
        $quantidade = $this->db->query("SELECT * FROM candidato INNER JOIN curso cu ON candidato.curso = cu.id INNER JOIN area a ON cu.id_area = a.id WHERE candidato.status = 1");
        return $quantidade->result();
    }

    //lista os candidatos aprovados para a administrcao
    public function listarCandidatosAprovados() {

        $this->load->database();
        $quantidade = $this->db->query("SELECT * FROM candidato INNER JOIN curso cu ON candidato.curso = cu.id INNER JOIN area a ON cu.id_area = a.id WHERE candidato.status = 2");
        return $quantidade->result();
    }

    //Apôs candidato aceito, muda status e move vídeo (o video não precisa sofrer alterações na db, isso porque o nome dele se mantem o mesmo e o diretorio não é definido no banco)
    public function candidatoAceito($id, $video_url) {

        $this->load->database();
        $this->db->query("UPDATE candidato SET status = 2 WHERE id_candidato = " . $this->db->escape($id));
        Parent::moveVideo($video_url);
    }

    //Apôs candidato ser recusado, muda status para 3
    public function candidatoRecusado($id) {

        $this->load->database();
        $this->db->query("UPDATE candidato SET status = 3 WHERE id_candidato = " . $this->db->escape($id));
    }

    //Apôs candidato rejeitado, excluir os dados do banco e deleta o vídeo
    public function apagaCandidato($id, $video_url, $status, $foto_candidato) {

        $this->load->database();
        $this->db->query("DELETE FROM candidato WHERE id_candidato = " . $this->db->escape($id));
        //se o status for 1, então o vídeo esta na pasta de analise, se for 2, então o vídeo esta na pasta de editado, se for 3, então esta na pasta de recusado
        //€xclui foto do perfil
        if ($foto_candidato != 'padrao.png') {

            unlink(getcwd() . '/assets/candidato/foto_candidato/' . $foto_candidato);
        }
        //exclui o vídeo
        if ($status == 1) {

            unlink(getcwd() . '/assets/candidato/video_analise/' . $video_url);
        } elseif ($status == 2) {

            unlink(getcwd() . '/assets/candidato/video_editado/' . $video_url);
        } elseif ($status == 3) {

            unlink(getcwd() . '/assets/candidato/video_recusado/' . $video_url);
        }
    }

    //lista visitas de empresas no perfil do candidato
    public function listaVisitas($id_candidato) {

        //verifica se já existe uma visita da empresa, caso nao exista cadastra, se existir não faz nada
        $this->load->database();
        $sql = $this->db->query("SELECT * FROM visitas INNER JOIN empresa em ON visitas.id_empresa = em.id_empresa INNER JOIN area a ON em.ramo = a.id WHERE id_candidato = " . $this->db->escape($id_candidato));
        //conta os resultados pra saber se existe
        return $sql->result();
    }

    //envia o curriculum
    public function enviaCurriculum($id_candidato, $empresa_id, $vaga_id) {

        //verifica se existe um currilum deste candidato para a vaga
        if (count(SELF::verificaCurriculum($id_candidato, $empresa_id, $vaga_id)) >= 1) {
            //caso já exista um curriculum enviado, então retorna false
            return false;
        } else {
            //caso não exista, então envia o curriculum
            $this->load->database();
            $sql = $this->db->insert('curriculumEnviado', ['id_vaga_curriculum' => $vaga_id, 'id_empresa_curriculum' => $empresa_id, 'id_candidato_curriculum' => $id_candidato]);
            //envia true se o curriculum foi enviado
            return true;
        }
    }

    //verifica se já o candidato já possui um curriculum enviado para a vaga
    public function verificaCurriculum($id_candidato, $empresa_id, $vaga_id) {

        $this->load->database();
        $sql = $this->db->query("SELECT * FROM vagas INNER JOIN empresa em ON vagas.empresa_id = em.id_empresa INNER JOIN area a ON em.ramo = a.id INNER JOIN curriculumEnviado curriculum ON curriculum.id_empresa_curriculum = em.id_empresa INNER JOIN curriculumEnviado curriculumVaga ON curriculumVaga.id_vaga_curriculum = vagas.id_vaga  WHERE curriculum.id_candidato_curriculum = " . $this->db->escape($id_candidato) . " AND curriculum.id_empresa_curriculum = " . $this->db->escape($empresa_id) . " AND curriculum.id_vaga_curriculum  = " . $this->db->escape($vaga_id));
        //conta os resultados pra saber se existe
        return $sql->result();
    }

    //pega as recomendações das empresas
    public function pegaRecomendacao($candidato_id) {

        $this->load->database();
        $sql = $this->db->query("SELECT DISTINCT * FROM recomendados INNER JOIN empresa em ON recomendados.id_recomendados_empresa = em.id_empresa INNER JOIN area a ON em.ramo = a.id WHERE recomendados.id_recomendados_candidato = " . $this->db->escape($candidato_id));
        return $sql->result();
    }

    //será usado para a redefinição de senha, verifica se email existe e retorna o resultado
    public function verificaEmail($email) {

        $this->load->database();
        //verifica se email existe
        $sql = $this->db->query('SELECT * FROM candidato WHERE email =' . $this->db->escape($email));
        return $sql->result();
    }

    //altera a senha
    public function redefinirSenha($email, $senha) {

        $this->load->database();
        $sql = $this->db->query('UPDATE candidato SET senha = ' . $this->db->escape($senha) . ' WHERE email =' . $this->db->escape($email));
    }

    //============================================= CANDIDATO UPLOAD FOTO DE PERFIL

    private $pasta_temporaria;
    private $nome_temporario;
    private $tamanho;
    private $formato;
    private $tamanho_maximo = 2147483648; //2GB
    private $novo_nome;
    private $erro = 'Verifique se o arquivo esta dentro das normas do sistema e tente novamente!';
    private $aceitos = [
        'image/gif',
        'image/png',
        'image/jpg',
        'image/jpeg',
    ];

    public function load($arquivo) {

        $this->pasta_temporaria = $arquivo['tmp_name'];
        $this->nome_temporario = $arquivo['name'];
        $this->tamanho = $arquivo['size'];
        $this->formato = $arquivo['type'];
        $this->novo_nome = SELF::novoNome($this->nome_temporario);

        if (SELF::validarFormato($this->formato) && SELF::validaTamanho($this->tamanho)) {
            if (move_uploaded_file($this->pasta_temporaria, getcwd() . '/assets/candidato/foto_candidato/' . $this->novo_nome . '.' . pathinfo($this->nome_temporario, PATHINFO_EXTENSION))) {
                return $this->novo_nome . '.' . pathinfo($this->nome_temporario, PATHINFO_EXTENSION);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    private function validarFormato($formato) {

        if (in_array($formato, $this->aceitos)) {
            return true;
        }
        return false;
    }

    private function validaTamanho($tamanho) {

        if ($this->tamanho_maximo >= $tamanho) {
            return true;
        }
        return false;
    }

    private function novoNome($nome) {

        return md5(uniqid($nome));
    }




    public function mensagens($id_candidato) {

        $this->load->database();
        $sql = $this->db->query("SELECT * FROM reunioes 
            INNER JOIN empresa ON empresa.id_empresa = reunioes.id_empresa 
            WHERE id_candidato =".$this->db->escape($id_candidato)
        );

        return $sql->result();

    }

    public function pegaReuniao($id_empresa, $id_candidato) {
        $this->load->database();
        $sql = $this->db->query("select * from reunioes where id_empresa = " . $this->db->escape($id_empresa). " AND id_candidato = ". $this->db->escape($id_candidato));
        return $sql->result();
    }

    public function empresasAprovacoes($id_candidato) {
        $this->load->database();
        $sql = $this->db->query("select distinct id_empresa from reunioes where id_candidato = " . $this->db->escape($id_candidato));
        return $sql->result();
    }
    public function empresasSelecoes($empresas) {
        $this->load->database();
        $sql = $this->db->query("
        SELECT  id_empresa, empresa, cidade 
        FROM empresa
        WHERE id_empresa IN (" . implode(',', $this->db->escape($empresas)) . ") ORDER BY empresa ASC");
        return $sql->result();
    }

}

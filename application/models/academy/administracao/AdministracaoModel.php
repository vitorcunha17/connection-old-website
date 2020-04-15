<?php

class AdministracaoModel extends CI_Model {

    //cadastra admin
    public function cadastraADM(array $dados) {

        $this->load->database();
        if ($this->db->insert('administrador', [
                    'nomeADM' => $dados['nomeADM'],
                    'email_administrador' => $dados['emailADM'],
                    'senha_administrador' => hash('sha512', $dados['senhaADM']),
                    'acesso' => $dados['acessoADM']
                ])) {
            return true;
        } else {
            return false;
        }
    }

    //pega dados do administrador atraves do id
    public function verificaADM($id) {

        $this->load->database();
        $quantidade = $this->db->query('SELECT * FROM administrador WHERE id_administrador=' . $this->db->escape($id));
        return $quantidade->result();
    }

    //pega administradores com acesso total ao sistema (com acesso de nivel 1)
    public function contaADM() {

        $this->load->database();
        $quantidade = $this->db->query('SELECT * FROM administrador WHERE acesso=1');
        return $quantidade->result();
    }

    //apaga ADM
    public function apagaADM($id) {

        $this->load->database();
        $quantidade = $this->db->query('DELETE FROM administrador WHERE id_administrador=' . $this->db->escape($id));
    }

    //pega as categorias de acesso
    public function pegaAcesso() {

        $this->load->database();
        $quantidade = $this->db->query('SELECT * FROM acesso_adm');
        return $quantidade->result();
    }

    //pega os admin cadastrados
    public function pegaADM() {

        $this->load->database();
        $quantidade = $this->db->query('SELECT * FROM administrador INNER JOIN acesso_adm ON administrador.acesso = acesso_adm.id_acesso');
        return $quantidade->result();
    }

    //pega dados do adm logado
    public function pegaDadosAdmLogado($email) {

        $this->load->database();
        $quantidade = $this->db->query('SELECT * FROM administrador INNER JOIN acesso_adm ON administrador.acesso = acesso_adm.id_acesso WHERE administrador.email_administrador =' . $this->db->escape($email));
        return $quantidade->result();
    }

    public function logarAdministrador($email, $senha) {

        $this->load->database();
        $this->db->where('email_administrador', $email);
        $this->db->where('senha_administrador', $senha);
        $quantidade = $this->db->get('administrador')->row_array();
        return $quantidade;
    }

    //cadastra Categoria
    public function cadastraCategoria($area_nome) {

        $this->load->database();
        if ($this->db->insert('area', ['area_nome' => $area_nome])) {
            return true;
        } else {
            return false;
        }
    }

    //cadastra subcategoria
    public function cadastraSubCategoria($id_area, $nome_curso) {

        $this->load->database();
        if ($this->db->insert('curso', ['id_area' => $id_area, 'nome_curso' => $nome_curso])) {
            return true;
        } else {
            return false;
        }
    }

    //cadastra planos
    public function cadastraPlano($nome, $limite, $valor) {

        $this->load->database();
        if ($this->db->insert('planos', ['nome_planos' => $nome, 'limite_planos' => $limite, 'valor_planos' => $valor])) {
            return true;
        } else {
            return false;
        }
    }

    //lista os planos
    public function listaPlanos() {
        $this->load->database();
        $sql = $this->db->query("SELECT * FROM planos ORDER BY nome_planos ASC");
        return $sql->result();
    }

    //lista plano avulso
    public function listaPlanosAvulsos() {
        $this->load->database();
        $sql = $this->db->query("SELECT * FROM planos_avulsos ORDER BY nivel_planos_avulsos ASC");
        return $sql->result();
    }

    //deleta plano fixo
    public function deletaPlanos($id_planos) {
        $this->load->database();
        if (SELF::verificaPlanos($id_planos)) {
            $this->db->query("DELETE FROM planos WHERE id_planos = " . $this->db->escape($id_planos));
            return true;
        } else {
            return false;
        }
    }

    //deleta categoria/area
    public function deletaCategoria($id) {
        $this->load->database();
        if (SELF::verificaArea($id)) {
            $this->db->query("DELETE FROM area WHERE id = " . $this->db->escape($id));
            return true;
        } else {
            return false;
        }
    }

    //deleta subcategoria/curso
    public function deletaSubCategoria($id) {
        $this->load->database();
        if (SELF::verificaCurso($id)) {
            $this->db->query("DELETE FROM curso WHERE id = " . $this->db->escape($id));
            return true;
        } else {
            return false;
        }
    }

    //verifica se plano fixo existe
    public function verificaPlanos($id_planos) {
        $this->load->database();
        $sql = $this->db->query("SELECT * FROM planos WHERE id_planos = " . $this->db->escape($id_planos));
        return $sql->result();
    }

    //verifica se area existe
    public function verificaArea($id) {
        $this->load->database();
        $sql = $this->db->query("SELECT * FROM area WHERE id = " . $this->db->escape($id));
        return $sql->result();
    }

    //verifica se curso existe
    public function verificaCurso($id) {
        $this->load->database();
        $sql = $this->db->query("SELECT DISTINCT curso.id as curso_id, curso.nome_curso, curso.id_area, area.area_nome FROM curso INNER JOIN area ON curso.id_area = area.id WHERE curso.id = " . $this->db->escape($id));

        return $sql->result();
    }

    //verifica se plano avulso existe
    public function verificaPlanosAvulsos($id_planos_avulsos) {
        $this->load->database();
        $sql = $this->db->query("SELECT * FROM planos_avulsos WHERE id_planos_avulsos = " . $this->db->escape($id_planos_avulsos));
        return $sql->result();
    }

    //edita plano fixo
    public function editaPlanoFixo($id_planos, $nome_planos, $valor_planos, $limite_planos) {
        $this->load->database();
        if (SELF::verificaPlanos($id_planos)) {
            $sql = $this->db->query("UPDATE planos SET nome_planos = " . $this->db->escape($nome_planos) . ", valor_planos = " . $this->db->escape($valor_planos) . ", limite_planos = " . $this->db->escape($limite_planos) . "  WHERE id_planos = " . $this->db->escape($id_planos));
            return true;
        } else {
            return false;
        }
    }

    //edita plano avulso
    public function editaPlanoAvulso($id_planos_avulsos, $valor_planos_avulso) {
        $this->load->database();
        if (SELF::verificaPlanosAvulsos($id_planos_avulsos)) {
            $sql = $this->db->query("UPDATE planos_avulsos SET valor_planos_avulsos = " . $this->db->escape($valor_planos_avulso) . " WHERE id_planos_avulsos = " . $this->db->escape($id_planos_avulsos));
            return true;
        } else {
            return false;
        }
    }

    //edita área
    public function editaArea($id, $nome) {
        $this->load->database();
        if (SELF::verificaArea($id)) {
            $sql = $this->db->query("UPDATE area SET area_nome = " . $this->db->escape($nome) . " WHERE id = " . $this->db->escape($id));
            return true;
        } else {
            return false;
        }
    }

    //edita curso
    public function editaCurso($id, $curso, $id_area) {
        $this->load->database();
        if (SELF::verificaCurso($id)) {
            $sql = $this->db->query("UPDATE curso SET nome_curso = " . $this->db->escape($curso) . ", id_area = " . $this->db->escape($id_area) . " WHERE id = " . $this->db->escape($id));
            return true;
        } else {
            return false;
        }
    }

    public function verificaUsuario($email) {

        $this->load->database();
        //verifica se usuaio existe
        $quantidade = $this->db->get_where('administrador', ['email_administrador' => $email]);
        return $quantidade->num_rows();
    }

    //será usado para a redefinição de senha, verifica se email existe e retorna o resultado
    public function verificaEmail($email) {

        $this->load->database();
        //verifica se email existe
        $sql = $this->db->query('SELECT * FROM administrador WHERE email_administrador =' . $this->db->escape($email));
        return $sql->result();
    }

    //altera a senha
    public function redefinirSenha($email, $senha) {

        $this->load->database();
        $sql = $this->db->query('UPDATE administrador SET senha_administrador = ' . $this->db->escape($senha) . ' WHERE email_administrador =' . $this->db->escape($email));
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////// CONTROLE DA EMPRESA NA AREA DE ADMIN
    //pega todas as empresas
    public function pegaTodasEmpresas() {

        $this->load->database();
        $sql = $this->db->query('SELECT * FROM empresa INNER JOIN area ON empresa.ramo = area.id');
        return $sql->result();
    }

    //pega todas as vagas
    public function pegaTodasVagas() {

        $this->load->database();
        $sql = $this->db->query('SELECT * FROM vagas INNER JOIN empresa ON vagas.empresa_id = empresa.id_empresa INNER JOIN area ON vagas.area_curso = area.id INNER JOIN curso ON vagas.curso_vaga = curso.id');
        return $sql->result();
    }

    //pega todas as areas
    public function pegaTodasAreas() {

        $this->load->database();
        $sql = $this->db->query('SELECT * FROM area');
        return $sql->result();
    }

    //apaga empresa
    public function apagaEmpresa($id, $logo) {

        $this->load->database();
        $sql = $this->db->query('DELETE FROM empresa WHERE id_empresa = ' . $this->db->escape($id));
        //apaga a logo da empresa
        unlink(getcwd() . '/assets/empresa/logo/' . $logo);

        return true;
    }

}

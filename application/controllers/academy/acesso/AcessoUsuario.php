<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class AcessoUsuario extends CI_Controller {

    public function __construct() {
        Parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function Logar() {

        $this->load->model('acesso/acesso');

        if($this->input->post('email') AND $this->input->post('senha')) {

            $consulta = $this->acesso->verificaLogar($this->input->post('email'), hash('sha512', $this->input->post('senha')));
            if($consulta['conta_status'] == 'nenhuma') {

                $this->session->set_flashdata('msg', 'Email ou senha inválidos');
                redirect(base_url());

            }else{

                switch($consulta['conta_status']) {

                    case 'coordenador': {
                        $this->session->set_userdata('email_coord', $this->input->post('email'));
                        $this->session->set_userdata('conta_status_coord', 'coordenador');
                        redirect('empresa/login/coordenacao');
                    }                
                    break;

                    case 'empresa': {
                        $this->session->set_userdata('email_empresa', $this->input->post('email'));
                        $this->session->set_userdata('conta_status_empresa', 'empresa');
                        redirect('empresa/login/logado');
                    }                
                    break;

                    case 'candidato': {
                        $this->load->model('candidato/candidato');
                        $this->session->set_userdata('email_candidato', $this->input->post('email'));
                        $this->session->set_userdata('conta_status_candidato', 'candidato');
                        //metodo que será usado para a captura da area do candidato atraves do curso
                        $dados = $this->candidato->listarCandidatoEmail($this->session->userdata('email_candidato'));
                        $this->session->set_userdata('area_candidato', $dados[0]->id);
                        redirect('candidato/login/logado');
                    }                
                    break;
                }
            
            }

        }
    }

    /* AREA DE CADASTRO */
    public function cadastro() {

        $this->load->view("cadastro");

    }

    public function valida_cadastro() {

        $this->load->model('acesso/acesso');
        if (
            $this->input->post('email') AND
            $this->input->post('senha') AND
            $this->input->post("sexo") AND
            $this->input->post("nascimento") AND
            $this->input->post("tipo")
        ) {

            //se a solicitação for para cadastro de candidato
            if($this->input->post("tipo") == "candidato") {



                $operacao = $this->acesso->verificaCadastro(
                    $this->input->post('email'),
                    hash("sha512", $this->input->post('senha')),
                    $this->input->post("sexo"),
                    $this->input->post("nascimento"),
                    null,
                    null,
                    $this->input->post("tipo")
                );

                if($operacao["status"] == true) {

                    SELF::enviaEmail_confirma(
                        $this->input->post("email"),
                        //o link para confimação de senha é gerado como algo parecido com isso: "10/76dsds57f5sf575s7s7sf5f7s", o primeiro digio é o id, o segundo (depois do -) é o hash de email e senha e id
                        base_url('acesso/AcessoUsuario/confirmar_email/'. $operacao["id"] . "/" . hash('sha1', $this->input->post('email') . hash("sha512", $this->input->post('senha'))))
                    );
                   

                   $this->load->model('acesso/acesso');
            
                        $consulta = $this->acesso->verificaLogar($this->input->post('email'), hash('sha512', $this->input->post('senha')));
                        if($consulta['conta_status'] == 'nenhuma') {
            
                            $this->session->set_flashdata('msg', 'Email ou senha inválidos');
                            redirect(base_url());
            
                        }else{
            
                            switch($consulta['conta_status']) {
            
                                case 'administracao': {
                                    $this->session->set_userdata('email_administracao', $this->input->post('email'));
                                    $this->session->set_userdata('conta_status_administracao', 'administracao');
                                    redirect('administracao/administracao/logado');
                                }                
                                break;
            
                                case 'empresa': {
                                    $this->session->set_userdata('email_empresa', $this->input->post('email'));
                                    $this->session->set_userdata('conta_status_empresa', 'empresa');
                                    redirect('empresa/login/logado');
                                }                
                                break;
            
                                case 'candidato': {
                                    $this->load->model('candidato/candidato');
                                    $this->session->set_userdata('email_candidato', $this->input->post('email'));
                                    $this->session->set_userdata('conta_status_candidato', 'candidato');
                                    //metodo que será usado para a captura da area do candidato atraves do curso
                                    $dados = $this->candidato->listarCandidatoEmail($this->session->userdata('email_candidato'));
                                    $this->session->set_userdata('area_candidato', $dados[0]->id);
                                    redirect('candidato/login/logado');
                                }                
                                break;
                            }
                        
                        }
            
                    

                }elseif($operacao["status"] == null) {

                    $this->session->set_flashdata('msg', '<p>Já existe uma conta cadastrada com esse email.</p>');
                    redirect('/');

                }elseif($operacao["status"] == false) {

                    $this->session->set_flashdata('msg', '<p>Verifique os dados e tente novamente.</p>');
                    redirect('/');

                }
            }
        //se a solicitação for para cadastro de empresa
        }elseif (
            $this->input->post('email') AND
            $this->input->post('senha') AND
            $this->input->post("empresa") AND
            $this->input->post("cnpj") AND
            $this->input->post("tipo")
        ) {

            if($this->input->post("tipo") == "empresa") {

                
                $operacao = $this->acesso->verificaCadastro(
                    $this->input->post('email'),
                    hash("sha512", $this->input->post('senha')),
                    null,
                    null,
                    $this->input->post("empresa"),
                    $this->input->post("cnpj"),
                    $this->input->post("tipo")
                );

                if($operacao["status"] == true) {

                    SELF::enviaEmail_confirma(
                        $this->input->post("email"),
                        //o link para confimação de senha é gerado como algo parecido com isso: "10/76dsds57f5sf575s7s7sf5f7s", o primeiro digio é o id, o segundo (depois do -) é o hash de email e senha e id
                        base_url('acesso/AcessoUsuario/confirmar_email/'. $operacao["id"] . "/" . hash('sha1', $this->input->post('email') . hash("sha512", $this->input->post('senha'))))
                    );
                    
                    
                    $this->load->model('acesso/acesso');
            
                    $consulta = $this->acesso->verificaLogar($this->input->post('email'), hash('sha512', $this->input->post('senha')));
                    if($consulta['conta_status'] == 'nenhuma') {
        
                        $this->session->set_flashdata('msg', 'Email ou senha inválidos');
                        redirect(base_url());
        
                    }else{
        
                        switch($consulta['conta_status']) {
        
                            case 'administracao': {
                                $this->session->set_userdata('email_administracao', $this->input->post('email'));
                                $this->session->set_userdata('conta_status_administracao', 'administracao');
                                redirect('administracao/administracao/logado');
                            }                
                            break;
        
                            case 'empresa': {
                                $this->session->set_userdata('email_empresa', $this->input->post('email'));
                                $this->session->set_userdata('conta_status_empresa', 'empresa');
                                redirect('empresa/login/logado');
                            }                
                            break;
        
                            case 'candidato': {
                                $this->load->model('candidato/candidato');
                                $this->session->set_userdata('email_candidato', $this->input->post('email'));
                                $this->session->set_userdata('conta_status_candidato', 'candidato');
                                //metodo que será usado para a captura da area do candidato atraves do curso
                                $dados = $this->candidato->listarCandidatoEmail($this->session->userdata('email_candidato'));
                                $this->session->set_userdata('area_candidato', $dados[0]->id);
                                redirect('candidato/login/logado');
                            }                
                            break;
                        }
                    
                    }


                }elseif($operacao["status"] == null) {

                    $this->session->set_flashdata('msg', '<p>Já existe uma conta cadastrada com esse email.</p>');
                    redirect('/');

                }elseif($operacao["status"] == false) {

                    $this->session->set_flashdata('msg', '<p>Verifique os dados e tente novamente.</p>');
                    redirect('/');

                } 

            }
        }
    }


    /* CONFIRMAR EMAIL DE CADASTRO */
    public function confirmar_email() {

        $this->load->model("acesso/acesso");

        if($this->uri->segment(4) AND $this->uri->segment(5)) {

            //var_dump($this->acesso->confirmarEmail($this->uri->segment(4), $this->uri->segment(5)));
            if($this->acesso->confirmarEmail($this->uri->segment(4), $this->uri->segment(5))) {
                $this->session->set_flashdata('msg', 'Email confirmado com sucesso!');
                redirect("/");
            }else {
                $this->session->set_flashdata('msg', 'Falha na confirmação de email!');
                redirect("/");
            }

        }

    }

    /* AREA DE RECUPERAÇÃO DA SENHA ==================== */

    public function recuperar_senha() {

        $this->load->view("recuperar_senha");

    }

    public function valida_recuperacao() {

        if ($this->input->post('email')) {
            //se existir uma solicitação para recuperar senha
            $this->load->model('acesso/acesso');

            //se existir um usuario com esse email, então cria e envia por email um link para redefinição
            $operacao = $this->acesso->verificaRecuperacao($this->input->post('email'));
            if ($operacao["dadosUsuario"] != "nenhuma") {

                if($operacao["conta"] == "ADM") {

                    //envia o token de acesso para o email do usuário
                    SELF::enviaEmail(
                        $operacao["dadosUsuario"]->email_administrador,
                        base_url('acesso/AcessoUsuario/redefinir_senha/' . hash('sha1', $operacao["dadosUsuario"]->email_administrador . $operacao["dadosUsuario"]->senha_administrador))
                    );

                    $this->session->set_flashdata('msg', '<h1>Tudo certo, enviamos um link para redefinição de senha!</h1>');

                }else {

                    //envia o token de acesso para o email do usuário
                    SELF::enviaEmail(
                    $operacao["dadosUsuario"]->email,
                    base_url('acesso/AcessoUsuario/redefinir_senha/' . hash('sha1', $operacao["dadosUsuario"]->email . $operacao["dadosUsuario"]->senha))
                );

                $this->session->set_flashdata('msg','<h1>Tudo certo, enviamos um link para redefinição de senha!</h1>');

                }
                redirect('acesso/acessoUsuario/recuperar_senha');

            } else {
                $this->session->set_flashdata('msg', '<h1>Email não existe!</h1>');
                redirect('acesso/acessoUsuario/recuperar_senha');
            }
        }
    }

    public function valida_alteracao() {

        if ($this->input->post('email') AND $this->input->post('senha') AND $this->input->post("codigoURL")) {
            //se existir uma solicitação para recuperar senha
            $this->load->model('acesso/acesso');

            //se existir um usuario com esse email, então cria e envia por email um link para redefinição
            $operacao = $this->acesso->validaAlteracao(
                $this->input->post('email'),
                $this->input->post('senha'),
                $this->input->post("codigoURL")
            );
           if ($operacao) {
                $this->session->set_flashdata('msg', '<h1>Alteração realizada com sucesso!<br> vá para a página inicial do site clicando  <a href="'. base_url('/') .'">aqui</a></h1>');
                redirect('acesso/AcessoUsuario/redefinir_senha/'.$this->input->post("codigoURL"));

            } else {
                $this->session->set_flashdata('msg', '<h1>Código de alteração de senha inválido.</h1>');
                redirect('acesso/acessoUsuario/redefinir_senha/'.$this->input->post("codigoURL"));

            }
        }
    }

    public function redefinir_senha() {

        $this->load->view("redefinir_senha");

    }

    /* FIM AREA DE RECUPERAÇÃO DA SENHA ==================== */





//envia email com token de acesso
    private function enviaEmail($email, $token) {

        $header = 'MIME-Version: 1.0' . "\r\n";
        $header .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $to = $email;
        $subject = html_entity_decode("Recuperação de senha");
        $message = "Recebemos uma solicitação para redefinir sua senha, se foi você, por favor clique no link abaixo, caso contrario ignore essa mensagem.<br> <strong><a href='" . $token . "'>Redefinir senha</a></strong>";
        mail($to, $subject, $message, $header);
    }

    //envia email com token para confirmação de email apos o cadastro
    private function enviaEmail_confirma($email, $token) {

        $header = 'MIME-Version: 1.0' . "\r\n";
        $header .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $to = $email;
        $subject = html_entity_decode("Confirmação de cadastro");
        $message = "Seu cadastro foi efetuado com sucesso. Agora você só precisa confirmar o cadastro clicando no link a seguir:<br> <strong><a href='" . $token . "'>Redefinir senha</a></strong> <br>Se você não realizou esse cadastro, por favor, ignore essa mensagem.";
        mail($to, $subject, $message, $header);
    }

    public function sair() {
        $this->session->unset_userdata('email_administracao');
        $this->session->unset_userdata('senha_administracao');
        $this->session->unset_userdata('conta_status_administracao');
        redirect('/');
    }

}

?>
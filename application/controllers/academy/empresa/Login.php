<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        Parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
        header('Access-Control-Allow-Origin: *');
    }

    
    public function Logar() {

        $this->load->model('academy/acesso/acesso');

        if($this->input->post('email') AND $this->input->post('senha')) {

            $consulta = $this->acesso->verificaLogar($this->input->post('email'), hash('sha512', $this->input->post('senha')));
            if($consulta['conta_status'] == 'nenhuma') {

                $this->session->set_flashdata('msg', 'Email ou senha inválidos');
                redirect(base_url());

            }else{

                switch($consulta['conta_status']) {

                    case 'empresa': {
                        $this->session->set_userdata('email_empresa', $this->input->post('email'));
                        $this->session->set_userdata('conta_status_empresa', 'empresa');
                        session_start();
                        redirect('academy/empresa/login/logado');
                    }                
                    break;

                    case 'candidato': {
                        $this->load->model('academy/candidato/candidato');
                        $this->session->set_userdata('email_candidato', $this->input->post('email'));
                        $this->session->set_userdata('conta_status_candidato', 'candidato');
                        //metodo que será usado para a captura da area do candidato atraves do curso
                        $dados = $this->candidato->listarCandidatoEmail($this->session->userdata('email_candidato'));
                        $this->session->set_userdata('area_candidato', $dados[0]->id);
                        redirect('academy/candidato/login/logado');
                    }                
                    break;
                    
                    case 'coordenadores': {
                        $this->session->set_userdata('email_coord', $this->input->post('email'));
                        $this->session->set_userdata('conta_status_empresa', 'empresa');
                        redirect('academy/empresa/login/coordenacao');
                    }                
                    break;
                }
            
            }

        }
    }

    public function index() {
        $this->load->model("academy/empresa/logado");
        $area = $this->logado->listaArea();
        $this->load->view('academy/empresa/index', ['area' => $area, 'result'=> "Fazer Meu Cadastros"]);
    }

    public function academia() {
        $this->load->model("academy/empresa/logado");
        $area = $this->logado->listaArea();
        $univer = $this->logado->listaUniversidades();
        $this->load->view('academy/universidades/index', ['area' => $area, 'univer' => $univer, 'result'=> "Fazer Meu Cadastros"]);
    }

    public function logado() {

        $this->load->model('academy/empresa/empresa');
        $this->load->model("academy/empresa/logado");
        $dados = $this->empresa->verificaEmail($_SESSION['email_empresa']);
        $area = $this->logado->listaArea();
        $univer = $this->logado->listaUniversidades();
        $curso = $this->logado->listaCurso();
       
        $this->load->view('academy/empresa/home', ['area' => $area, 'curso'=> $curso, 'result'=> "Fazer Meu Cadastros", 'dados'=> $dados]);


        if(
            $this->input->post("coordenador") &&   
            $this->input->post("nome_dp") &&    
            $this->input->post("email_coord") &&    
            $this->input->post("curso") &&    
            $this->input->post("senha")
         ){
            $this->load->model("academy/empresa/empresa");
            $Id = $this->empresa->verificaEmail($this->session->userdata('email_empresa'));
            $result = $this->empresa->cadastroAcademyCoordenador(
                [
                    "coordenador"       => $this->input->post("coordenador"),
                    "nome_dp"           => $this->input->post("nome_dp"),
                    "email_coord"       => $this->input->post("email_coord"),
                    "curso"             => $this->input->post("curso"),
                    "senha"             => hash('sha512', $this->input->post('senha')),
                    "id_universidade"   => $Id[0]->id_empresa,
                    "data_inscricao"    => date("d/m/Y")
                ]
            );
            if($result == 'Cadastro Realizado Com Sucesso!'){
                $ok = 'Cordenador Cadastrado com sucesso!';
                $this->load->view('empresa/coordenadores',['area' => $area, 'curso'=> $curso, 'result'=> "Fazer Meu Cadastros", 'dados'=> $dados]);
                $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><div class="col-10 offset-1"><strong>'.$ok.'</div></div></div>');
            }else {
                $this->load->view('academy/empresa/index', ['result' => $result]);
            }
        }
  
  
     
        $tamanho_maximo_video = 10485760; // 10MB

        if(
            $this->input->post("titulo") &&   
            $this->input->post("email") &&    
            $this->input->post("nome_dp") &&    
            $this->input->post("representante") && 
            $this->input->post("area") 
        ) {

            if(
                isset($_FILES['video']) &&
                $_FILES['video']['type'] == "video/mp4" &&
                $_FILES['video']['size'] <= $tamanho_maximo_video
            ) {

                $this->load->model("academy/candidato/candidato");
                $result = $this->candidato->cadastraProblema(
                    [
                        "titulo"            => $this->input->post("titulo"),
                        "email"             => $this->input->post("email"),
                        "nome_dp"           => $this->input->post("nome_dp"),
                        "representante"     => $this->input->post("representante"),
                        "area"              => $this->input->post("area"),
                        "id_empresa"        => $dados[0]->id_empresa,
                        "video"             => $_FILES["video"]
                    ]
                 
                );
               
                if($result == 'Cadastro Realizado Com Sucesso!'){
                    $ok = 'Cordenador Cadastrado com sucesso!';
                    $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><div class="col-10 offset-1"><strong>'.$ok.'</div></div></div>');
                    redirect('empresa/login/logado/coordenadores');
                    $this->load->view('academy/empresa/home', ['coordenadores' => $coordenadores, 'area' => $area, 'curso'=> $curso, 'result'=> "Fazer Meu Cadastros", 'dados'=> $dados]);
                }else {
                    $this->load->view('academy/empresa/index', ['result' => $result]);
                }

            }

        }

    }
    



    public function coordenacao() {

        $this->load->model('academy/empresa/empresa');
        $this->load->model("academy/empresa/logado");
        $dados = $this->empresa->buscaCoordenador($this->session->userdata('email_coord'));
        $empresa = $this->empresa->pegaEmpresa($dados[0]->id_universidade);
        echo $empresa[0]->empresa;
        $alunos = $this->logado->listaAlunos($empresa[0]->empresa);
        $area = $this->logado->listaArea();
        $curso = $this->logado->listaCurso();
        $univer = $this->logado->listaUniversidades();

        $this->load->view('coordenadores/home', ['area' => $area, 'empresa' => $empresa, 'alunos'=> $alunos, 'univer' => $univer, 'curso'=> $curso, 'dados'=> $dados]);
  
  
    }
    public function watch() {
        
        $this->load->model('academy/empresa/empresa');
        $this->load->model("academy/empresa/logado");
        $dados = $this->empresa->verificaEmail($this->session->userdata('email_empresa'));
        $area = $this->logado->listaArea();
        $curso = $this->logado->listaCurso();
        $coordenadores = $this->empresa->buscaAcademyCoordenador($dados[0]->id_empresa);

        if(
            $this->input->post("coordenador") &&   
            $this->input->post("nome_dp") &&    
            $this->input->post("email_coord") &&    
            $this->input->post("curso") &&    
            $this->input->post("senha")
         ){
            $this->load->model("academy/empresa/empresa");
            $Id = $this->empresa->verificaEmail($this->session->userdata('email_empresa'));
            $result = $this->empresa->cadastroAcademyCoordenador(
                [
                    "coordenador"       => $this->input->post("coordenador"),
                    "nome_dp"           => $this->input->post("nome_dp"),
                    "email_coord"       => $this->input->post("email_coord"),
                    "curso"             => $this->input->post("curso"),
                    "senha"             => hash('sha512', $this->input->post('senha')),
                    "id_universidade"   => $Id[0]->id_empresa,
                    "data_inscricao"    => date("d/m/Y")
                ]
            );
            if($result == 'Cadastro Realizado Com Sucesso!'){
                $ok = 'Cordenador Cadastrado com sucesso!';
                $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><div class="col-10 offset-1"><strong>'.$ok.'</div></div></div>');
                redirect('empresa/login/logado/coordenadores');
                $this->load->view('empresa/home', ['coordenadores' => $coordenadores, 'area' => $area, 'curso'=> $curso, 'result'=> "Fazer Meu Cadastros", 'dados'=> $dados]);
            }else {
                $this->load->view('empresa/index', ['result' => $result]);
            }
        }
    }

    public function registerP() {
        
        $this->load->model('academy/empresa/empresa');
        $this->load->model("academy/empresa/logado");
        $this->load->model("academy/candidato/candidato");
        $dados = $this->empresa->verificaEmail($_SESSION['email_empresa']);
        $area = $this->logado->listaArea();
        $curso = $this->logado->listaCurso();
       

        $this->load->model('academy/candidato/candidato');
        $dados = $this->candidato->verificaEmail($this->session->userdata('email_candidato'));
         
        $tamanho_maximo_video = 10485760; // 10MB

        if(
            $this->input->post("titulo") &&   
            $this->input->post("email") &&    
            $this->input->post("nome_dp") &&    
            $this->input->post("representante") && 
            $this->input->post("area") 
        ) {

            if(
                isset($_FILES['video']) &&
                $_FILES['video']['type'] == "video/mp4" &&
                $_FILES['video']['size'] <= $tamanho_maximo_video
            ) {

                $this->load->model("academy/candidato/candidato");
                $result = $this->candidato->cadastraProblema(
                    [
                        "titulo"            => $this->input->post("titulo"),
                        "email"             => $this->input->post("email"),
                        "nome_dp"           => $this->input->post("nome_dp"),
                        "representante"     => $this->input->post("representante"),
                        "area"              => $this->input->post("area"),
                        "id_empresa"        => $dados[0]['id_empresa'],
                        "video"             => $_FILES["video"]
                    ]
                 
                );
               
                if($result == 'Cadastro Realizado Com Sucesso!'){
                    $ok = 'Cordenador Cadastrado com sucesso!';
                    $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><div class="col-10 offset-1"><strong>'.$ok.'</div></div></div>');
                    redirect('empresa/login/logado/coordenadores');
                    $this->load->view('empresa/home', ['coordenadores' => $coordenadores, 'area' => $area, 'curso'=> $curso, 'result'=> "Fazer Meu Cadastros", 'dados'=> $dados]);
                }else {
                    $this->load->view('empresa/index', ['result' => $result]);
                }

            }

        }
    }
    
    public function cadastro() {
        if(
            $this->input->post("empresa") &&   
            $this->input->post("cnpj") &&    
            $this->input->post("cep") &&    
            $this->input->post("email") &&    
            $this->input->post("telefone") &&   
            $this->input->post("ramo")  &&
            $this->input->post("senha") &&
            !empty($this->input->post("email")) 
         ){
            $this->load->model("academy/empresa/empresa");
            $result = $this->empresa->cadastroAcademy(
                [
                    "empresa"           => $this->input->post("empresa"),
                    "email"             => $this->input->post("email"),
                    "cnpj"              => $this->input->post("cnpj"),
                    "cep"               => $this->input->post("cep"),
                    "senha"             => $this->input->post("senha"),
                    "estado"            => "",
                    "cidade"            => "",
                    "bairro"            => "",
                    "rua"               => "",
                    "telefone"          => $this->input->post("telefone"),
                    "ramo"              => $this->input->post("ramo"),
                    "confirmou_email"   => "sim",
                    "logo"              => "padrao.png",
                    "num"               => "123",
                    "primeiro_acesso"   => "nao",
                    "data_inscricao"    => date("d/m/Y")
                ]
            );
            if($result == 'Cadastro Realizado Com Sucesso!'){
                $this->session->set_userdata('email_empresa', $this->input->post('email'));
                $this->session->set_userdata('conta_status_empresa', 'empresa');
                redirect('empresa/Login/logado');
            }else {
                $this->load->view('empresa/index', ['result' => $result]);
            }
        }

        


    }

}



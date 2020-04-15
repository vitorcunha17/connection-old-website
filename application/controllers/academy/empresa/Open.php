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
        //header("access-control-allow-origin: https://sandbox.pagseguro.uol.com.br");
        header('Access-Control-Allow-Origin: *');
    }


    public function home(){
        $this->load->view('empresa/index');
    }

    public function primeiroAcesso_() {

        if (!$this->session->userdata('email_empresa') && !$this->session->userdata('conta_status_empresa')) {
            redirect('/');
        }

        $tamanho_maximo_foto = 2097152; //2097152 Bytes é a mesma coisa que 2MB

        if(
            $this->input->post("pais") &&   
            $this->input->post("cnpj") &&    
            $this->input->post("cep") &&    
            $this->input->post("estado") && 
            $this->input->post("cidade") && 
            $this->input->post("telefone") &&   
            $this->input->post("numero_residencia") &&    
            $this->input->post("area")
        ) {

            if(
                isset($_FILES['imagem']) &&
                (
                    $_FILES['imagem']['type'] == "image/jpg" ||
                    $_FILES['imagem']['type'] == "image/jpeg" ||
                    $_FILES['imagem']['type'] == "image/png"
                ) &&
                $_FILES['imagem']['size'] <= $tamanho_maximo_foto
            ) {

                $this->load->model("empresa/empresa");
                $this->empresa->primeiroAcesso(
                    [
                        "pais"              => $this->input->post("pais"),
                        "empresa"           => $this->input->post("nome"),
                        "cnpj"              => $this->input->post("cnpj"),
                        "cep"               => $this->input->post("cep"),
                        "estado"            => $this->input->post("estado"),
                        "cidade"            => $this->input->post("cidade"),
                        "bairro"            => $this->input->post("bairro"),
                        "rua"               => $this->input->post("rua"),
                        "telefone"          => $this->input->post("telefone"),
                        "num"               => $this->input->post("numero_residencia"),
                        "ramo"              => $this->input->post("area"),
                        "logo"              => $_FILES["imagem"],
                        "primeiro_acesso"   => "nao",
                        "data_inscricao"    => date("d/m/Y")
                    ],
                    $this->session->userdata('email_empresa')
                );
                echo true;

            }else {
                
                echo "Imagem inválida!";

            }
        }else {

            echo "Preencha todos os campos";

        }   

    }




    public function logado() {
            $this->load->view('empresa/index');
    }


 
    public function sair() {
        $this->session->unset_userdata('email_empresa');
        $this->session->unset_userdata('conta_status_empresa');
        redirect('/');
    }

}



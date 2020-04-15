<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
    private $query;
    
    public function __construct() {
            Parent::__construct();
            $this->load->library('session');
            $this->load->helper('form');
            $this->load->library('form_validation');
            //header("access-control-allow-origin: https://sandbox.pagseguro.uol.com.br");
            header('Access-Control-Allow-Origin: *');
    }

   
    public function cadastro()
	{

		$this->form_validation->set_rules('id_administrador', 'id_administrador', 'required');
		$this->form_validation->set_rules('email_administrador', 'email_administrador', 'required');
		$this->form_validation->set_rules('senha_administrador', 'senha_administrador', 'required');
                
                
                $dados = [
				'id_administrador' => $this->input->post('id_administrador'),
				'email_administrador' => $this->input->post('email_administrador'),
				'senha_administrador' => $this->input->post('senha_administrador')
                        ];
                $operacao = $this->ADM->cadastraADM($dados);
                $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><div class="col-10 offset-1"><strong>Cadastrado com sucesso!</strong><br></div></div></div>');

        }
    
    
}


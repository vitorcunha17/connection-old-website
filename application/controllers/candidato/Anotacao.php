<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anotacao extends CI_Controller {
    public function __construct() {
            Parent::__construct();
            $this->load->library('session');
            $this->load->helper('form');
            $this->load->library('form_validation');
            header('Access-Control-Allow-Origin: *');
    }

    public function index()
    {   
        $this->load->model('candidato/AnotacaoModel');
        $this->AnotacaoModel->cadastraAnotacao([
            "anotacao" => $this->input->post('anotacao'),
            "id_candidato" => $this->input->post('id_candidato'),
            "id_empresa" => $this->input->post('id_empresa')
        ]);
        redirect('empresa/login/index');
    }
}


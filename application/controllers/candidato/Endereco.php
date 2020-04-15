<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Endereco extends CI_Controller {
    private $query;
    
    public function __construct() {
            Parent::__construct();
            $this->load->library('session');
            $this->load->helper('form');
            $this->load->library('form_validation');
            //header("access-control-allow-origin: https://sandbox.pagseguro.uol.com.br");
            header('Access-Control-Allow-Origin: *');
    }

    public function index()
    {
        $this->load->model("empresa/localizacao");
        echo json_encode($this->localizacao->getEnderecoByArea($_GET['id']));
    }
}


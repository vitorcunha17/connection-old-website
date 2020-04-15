<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Graficos extends CI_Controller {
   
    
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
        $this->load->model("administracao/Estatistica");
        echo json_encode($this->Estatistica->getEnderecoByArea());
        
    }

}

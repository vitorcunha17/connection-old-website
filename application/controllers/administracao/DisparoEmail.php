<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DisparoEmail extends CI_Controller{

    public function __construct(){
        Parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function cadastra_horario(){
        $this->load->model('administracao/DisparoEmailModel');
        if(count($this->input->post()) == 1){
            $this->DisparoEmailModel->cadastraHorario([
                "horario" => $this->input->post('horario'),
            ]);
            $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><div class="col-6"><strong>Cadastrado.</strong><br> Horário cadastrado com sucesso!</div></div></div>');
            redirect('administracao/administracao/logado/disparoEmail');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger"><div class="container"><div class="col-6"><strong>Cadastrado.</strong><br> Erro ao cadastrar horário.</div></div></div>');
            redirect('administracao/administracao/logado/disparoEmail');
        }
    }

    public function get_candidatos(){
        $this->load->model('administracao/DisparoEmailModel');
        $this->DisparoEmailModel->getCandidatos();
    }

    public function get_vagas(){
        $this->load->model('administracao/DisparoEmailModel');
        $this->DisparoEmailModel->getVagas();
    }


    public function disparar_email(){
        /*$candidatos = $this->get_candidatos();
        echo 'teste';
        var_dump($candidatos[]);*/
        $this->load->library('email');

        $this->email->from('vitorribeirocunha@gmail.com', 'Vitor Cunha');
        $this->email->to('vitorribeirocunha@hotmail.com');

        $this->email->subject('Teste');
        $this->email->message('Testa teste teste.');

        $this->email->send();
    }

}
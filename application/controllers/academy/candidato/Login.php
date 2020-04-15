<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        Parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index() {
        //verifica se existe candidato logado, se JÁ EXISTIR redireciona ele para o painel do usuario
        if ($this->session->userdata('email_candidato') && $this->session->userdata('conta_status_candidato')) {
            redirect('candidato/login/logado');
        }
    }

    //ao logar vai pra essa pagina
    public function logado() {

        //verifica se existe candidato logado, se não existir envia o usuario para tela de login
        if (!$this->session->userdata('email_candidato') && !$this->session->userdata('conta_status_candidato')) {
            redirect('/');
        }

        $this->load->model('candidato/candidato');
        $cursos = $this->candidato->listaCurso();
        $dados = $this->candidato->verificaEmail($this->session->userdata('email_candidato'));

         //verifica se o candidato tem deficiencia ou não, se tiver listar apenas as vagas para deficiêncites, caso contrario listar apenas as vagas que não são para deficiêntes, verifica também se é estagiario ou profissional
         if ($dados[0]->pcd == 'nao') {

            if (strtolower($dados[0]->situacao_curso) == 'concluido') { //se o curso tiver concluido, exibe as vagas para profissionais
                $candidatos = $this->candidato->listaVagas($this->session->userdata('area_candidato'), 'profissional');
            } elseif (strtolower($dados[0]->situacao_curso) == 'em andamento') { //se o curso tiver em andamento, exibe as vagas para estagiarios
                $candidatos = $this->candidato->listaVagas($this->session->userdata('area_candidato'), 'estagiario');
            }
        } elseif ($dados[0]->pcd == 'sim') {

            if ($dados[0]->situacao_curso == 'concluido') { //se o curso tiver concluido, exibe as vagas para profissionais
                $candidatos = $this->candidato->listaVagasPCD($this->session->userdata('area_candidato'), 'profissional');
            } elseif ($dados[0]->situacao_curso == 'em andamento') { //se o curso tiver em andamento, exibe as vagas para estagiarios
                $candidatos = $this->candidato->listaVagasPCD($this->session->userdata('area_candidato'), 'estagiario');
            }
        }

        if($dados[0]->primeiro_acesso == "nao") {
            $dados = $this->candidato->listarCandidatoEmail($this->session->userdata('email_candidato'));

            $mensagens = $this->candidato->mensagens($dados[0]->id_candidato); //pega as mensagens entre a empresa e candidato (caso haja compra aprovada)
            $this->load->view('candidato/logado', ['dados' => $dados, 'candidatos' => $candidatos, 'mensagens' => $mensagens]);
        }else {
            $this->load->view('candidato/primeiro_acesso', ['dados' => $dados, "cursos" => $cursos]);
        }
  
    }

    //AREA DO CHAT ==================================== O STATUS DO CANDIDATO PRECISA SER 5, OU SEJA, COMPRADO

    public function chat() {

        //verifica se existe candidato logado, se não existir envia o usuario para tela de login
        if (!$this->session->userdata('email_candidato') && !$this->session->userdata('conta_status_candidato')) {
            redirect('/');
        }

        $this->load->model('candidato/candidato');
        $dados = $this->candidato->verificaEmail($this->session->userdata('email_candidato'));

        if($dados[0]->status != 5) {
            redirect("candidato/login/logado");
            exit();
        }

        if($dados[0]->primeiro_acesso == "nao") {
            $this->load->view('candidato/candidato_comprado');
        }else {
            redirect("candidato/login/logado");
        }
  
    }

    //exibe as mensagens no chat
    public function mensagens() {

        //verifica se existe candidato logado, se não existir envia o usuario para tela de login
        if (!$this->session->userdata('email_candidato') && !$this->session->userdata('conta_status_candidato')) {
            redirect('/');
        }

        $this->load->model('candidato/candidato');
        $dados = $this->candidato->verificaEmail($this->session->userdata('email_candidato'));

        if($dados[0]->status != 5) {
            redirect("candidato/login/logado");
            exit();
        }

        if($dados[0]->primeiro_acesso == "nao") {

            $dados = $this->candidato->listarCandidatoEmail($this->session->userdata('email_candidato'));
            $mensagens = $this->candidato->mensagens($dados[0]->id_candidato); //pega as mensagens entre a empresa e candidato (caso haja compra aprovada)
            $this->load->view('candidato/mensagens', ['dados' => $dados, 'mensagens' => $mensagens]);
        }else {
            redirect("candidato/login/logado");
        }
  
    }

    public function enviaMensagem_() {

        //verifica se existe candidato logado, se não existir envia o usuario para tela de login
        if (!$this->session->userdata('email_candidato') && !$this->session->userdata('conta_status_candidato')) {
            redirect('/');
        }

        $this->load->model('candidato/candidato');
        $dados = $this->candidato->verificaEmail($this->session->userdata('email_candidato'));

        if($dados[0]->status != 5) {
            redirect("candidato/login/logado");
            exit();
        }

        if($dados[0]->primeiro_acesso == "nao") {

            $dados = $this->candidato->listarCandidatoEmail($this->session->userdata('email_candidato'));

            if($this->input->post("mensagem")) {

                $this->candidato->enviaMensagem([

                    "id_candidato" => $dados[0]->id_candidato,
                    "mensagem"     => strip_tags($this->input->post("mensagem")),
                    "data_envio"   => date("d/m/Y - H:i:s"),
                    "autor"        => "candidato"

                ]);

            }


        }else {
            redirect("candidato/login/logado");
        }
  
    }

    //FINAL DA AREA DO CHAT =================================

    //DEPOIS DE CONFIRMAR O EMAIL, O CANDIDATO PRECISARÁ TERMINAR DE PREENCHER MAIS ALGUNS DADOS
    //sempre que ele acessar o sistema, ele será levado para a tela de "primeiro_aceesso", e nela depois de preencher os dados para atualizar
    //a verificação será feita aqui

    public function primeiroAcesso_() {

        //verifica se existe candidato logado, se não existir envia o usuario para tela de login
        if (!$this->session->userdata('email_candidato') && !$this->session->userdata('conta_status_candidato')) {
            redirect('/');
        }
            
        $this->load->model("candidato/candidato");

        $tamanho_maximo_video = 10485760; //10485760 Bytes é a mesma coisa que 10MB

        if(
            isset($_FILES['video']) &&
            $_FILES['video']['type'] == "video/mp4" &&
            $_FILES['video']['size'] <= $tamanho_maximo_video
        ) {
    
            $this->load->model("candidato/candidato");
            $this->candidato->enviarVideo(
                [
                    "video_nome"        => $_FILES["video"],
                    "status"            => 1,
                ],
                $this->session->userdata('email_candidato')
            );
            echo true;
            }else {
                
                echo "Vídeo inválido!";

            }
    

        $this->load->model('candidato/candidato');
        $dados = $this->candidato->verificaEmail($this->session->userdata('email_candidato'));
        if($dados[0]->primeiro_acesso != "nao") {


        if(
            $this->input->post("pais") &&   
            $this->input->post("cpf") &&    
            $this->input->post("cep") &&    
            $this->input->post("estado") && 
            $this->input->post("cidade") && 
            $this->input->post("telefone") &&   
            $this->input->post("numero_residencia") &&  
            $this->input->post("pcd") &&    
            $this->input->post("curso") &&  
            $this->input->post("situacao_curso")
            //'foto_candidato' => 'padrao.png',
        ) {

            if( $this->input->post("enviarDados") ) {

                $this->load->model("candidato/candidato");
                $this->candidato->primeiroAcesso(
                    [
                        "pais"              => $this->input->post("pais"),
                        "nome"              => $this->input->post("nome"),
                        "cpf"               => $this->input->post("cpf"),
                        "cep"               => $this->input->post("cep"),
                        "estado"            => $this->input->post("estado"),
                        "cidade"            => $this->input->post("cidade"),
                        "bairro"            => $this->input->post("bairro"),
                        "rua"               => $this->input->post("rua"),
                        "telefone"          => $this->input->post("telefone"),
                        "num"               => $this->input->post("numero_residencia"),
                        "pcd"               => $this->input->post("pcd"),
                        "curso"             => $this->input->post("curso"),
                        "situacao_curso"    => $this->input->post("situacao_curso"),
                        "foto_candidato"    => "padrao.png",
                        "primeiro_acesso"   => "nao",
                    ],
                    $this->session->userdata('email_candidato')
                );
                echo true;

            }else {
                
                echo "Vídeo inválido!";

            }
        }else {

            echo "Preencha todos os campos";

        }
        redirect("candidato/login/logado");
    }else {
            redirect("candidato/login/logado");
    }


}


public function enviarMyVideo() {

    //verifica se existe candidato logado, se não existir envia o usuario para tela de login
    if (!$this->session->userdata('email_candidato') && !$this->session->userdata('conta_status_candidato')) {
        redirect('/');
    }

    $this->load->model('candidato/candidato');
    $dados = $this->candidato->verificaEmail($this->session->userdata('email_candidato'));
  


    $tamanho_maximo_video = 10485760; //10485760 Bytes é a mesma coisa que 10MB

  

        if(
            isset($_FILES['video']) &&
            $_FILES['video']['type'] == "video/mp4" &&
            $_FILES['video']['size'] <= $tamanho_maximo_video
        ) {

            $this->load->model("candidato/candidato");
            $this->candidato->enviarVideo(
                [
                    "video_nome"        => $_FILES["video"],
                ],
                $this->session->userdata('email_candidato')
            );
            echo true;

        }else {
            
            echo "Vídeo inválido!";

        }
        redirect("candidato/login/logado");
   
}



    public function cadastraInteresses_() {

    //verifica se existe candidato logado, se não existir envia o usuario para tela de login
    if (!$this->session->userdata('email_candidato') && !$this->session->userdata('conta_status_candidato')) {
        redirect('/');
    }

    if(
        $this->input->post("titulo") &&   
        $this->input->post("conteudo") 
    ) {

            $this->load->model("candidato/candidato");
            $this->candidato->cadastraInteresses(
                [
                    "titulo"              => $this->input->post("titulo"),
                    "conteudo"            => $this->input->post("conteudo"),
                    "email_candidato"     => $this->session->userdata('email_candidato')
                ],
                $this->session->userdata('email_candidato')
            );
    }  

}

public function cadastraEducacao_() {

    //verifica se existe candidato logado, se não existir envia o usuario para tela de login
    if (!$this->session->userdata('email_candidato') && !$this->session->userdata('conta_status_candidato')) {
        redirect('/');
    }

    if(
        $this->input->post("periodo") &&
        $this->input->post("curso") &&
        $this->input->post("empresa") &&
        $this->input->post("local") 
    ) {

            $this->load->model("candidato/candidato");
            $this->candidato->cadastraEducacao(
                [
                    "dataReferencia"        => $this->input->post("periodo"),
                    "curso2"                => $this->input->post("curso"),
                    "instituicao"           => $this->input->post("empresa"),
                    "cidadeEstado2"         => $this->input->post("local"),
                    "email_candidato"       => $this->session->userdata('email_candidato')
                ],
                $this->session->userdata('email_candidato')
            );
    }  

}


    //     public function cadastraInteresses_() {

    //     //verifica se existe candidato logado, se não existir envia o usuario para tela de login
    //     if (!$this->session->userdata('email_candidato') && !$this->session->userdata('conta_status_candidato')) {
    //         redirect('/');
    //     }

    //     if(
    //         $this->input->post("titulo") &&   
    //         $this->input->post("conteudo") 
    //     ) {

    //             $this->load->model("candidato/candidato");
    //             $this->candidato->cadastraInteresses(
    //                 [
    //                     "titulo"              => $this->input->post("titulo"),
    //                     "conteudo"            => $this->input->post("conteudo"),
    //                     "email_candidato"     => $this->session->userdata('email_candidato')
    //                 ],
    //                 $this->session->userdata('email_candidato')
    //             );
    //     }  

    // }

    // public function cadastraEducacao_() {

    //     //verifica se existe candidato logado, se não existir envia o usuario para tela de login
    //     if (!$this->session->userdata('email_candidato') && !$this->session->userdata('conta_status_candidato')) {
    //         redirect('/');
    //     }

    //     if(
    //         $this->input->post("periodo") &&
    //         $this->input->post("curso") &&
    //         $this->input->post("empresa") &&
    //         $this->input->post("local") 
    //     ) {

    //             $this->load->model("candidato/candidato");
    //             $this->candidato->cadastraEducacao(
    //                 [
    //                     "dataReferencia"        => $this->input->post("periodo"),
    //                     "curso2"                => $this->input->post("curso"),
    //                     "instituicao"           => $this->input->post("empresa"),
    //                     "cidadeEstado2"         => $this->input->post("local"),
    //                     "email_candidato"       => $this->session->userdata('email_candidato')
    //                 ],
    //                 $this->session->userdata('email_candidato')
    //             );
    //     }  

    // }

    public function cadastraExperiencia_() {

        //verifica se existe candidato logado, se não existir envia o usuario para tela de login
        if (!$this->session->userdata('email_candidato') && !$this->session->userdata('conta_status_candidato')) {
            redirect('/');
        }

        if(
            $this->input->post("periodo") &&
            $this->input->post("cargo") &&
            $this->input->post("empresa") &&
            $this->input->post("local") 
        ) {

                $this->load->model("candidato/candidato");
                $this->candidato->cadastraExperiencia(
                    [
                        "dataReferencia"    => $this->input->post("periodo"),
                        "titulo"            => $this->input->post("cargo"),
                        "empresa"           => $this->input->post("empresa"),
                        "cidadeEstado"      => $this->input->post("local"),
                        "email_candidato"   => $this->session->userdata('email_candidato')
                    ],
                    $this->session->userdata('email_candidato')
                );
        }  

    }

    public function cadastraHabilidade_() {

        //verifica se existe candidato logado, se não existir envia o usuario para tela de login
        if (!$this->session->userdata('email_candidato') && !$this->session->userdata('conta_status_candidato')) {
            redirect('/');
        }

        if(
            $this->input->post("curso") &&
            $this->input->post("porcentagem") 
        ) {

                $this->load->model("candidato/candidato");
                $this->candidato->cadastraHabilidade(
                    [
                        "titulo"            => $this->input->post("curso"),
                        "porcentagem"       => $this->input->post("porcentagem"),
                        "email_candidato"   => $this->session->userdata('email_candidato')
                    ],
                    $this->session->userdata('email_candidato')
                );
        }  

    }

    public function cadastraPontoForte_() {

        //verifica se existe candidato logado, se não existir envia o usuario para tela de login
        if (!$this->session->userdata('email_candidato') && !$this->session->userdata('conta_status_candidato')) {
            redirect('/');
        }

        if(
            $this->input->post("conteudo")
        ) {

                $this->load->model("candidato/candidato");
                $this->candidato->cadastraPontoForte(
                    [
                        "conteudo"          => $this->input->post("conteudo"),
                        "email_candidato"   => $this->session->userdata('email_candidato')
                    ],
                    $this->session->userdata('email_candidato')
                );
        }  

    }

    public function cadastraPortfolio_() {

        //verifica se existe candidato logado, se não existir envia o usuario para tela de login
        if (!$this->session->userdata('email_candidato') && !$this->session->userdata('conta_status_candidato')) {
            redirect('/');
        }

        $tamanho_maximo_foto = 2097152; //2097152 Bytes é a mesma coisa que 2MB

        if(
            $this->input->post("nome") && 
            isset($_FILES["arquivo"]) &&
            (
                 $_FILES["arquivo"]["type"] == "image/jpg" || 
                 $_FILES["arquivo"]["type"] == "image/jpeg" ||
                 $_FILES["arquivo"]["type"] == "image/png"
            ) && $_FILES["arquivo"]["size"] <= $tamanho_maximo_foto
        ) {

                $this->load->model("candidato/candidato");
                $this->candidato->cadastraPortfolio(
                    [
                        "titulo"          => $this->input->post("nome"),
                        "url"             => $this->input->post("url"),
                        "foto"            => $_FILES["arquivo"],
                        "email_candidato" => $this->session->userdata('email_candidato')
                    ],
                    $this->session->userdata('email_candidato')
                );
        }  

    }


 
    //se o candidato já estiver sido aceito, então ao logar na tela logado ele é movido pra cá
    public function aceito() {
        //verifica se existe candidato logado, se não existir envia o usuario para tela de login
        if (!$this->session->userdata('email_candidato') && !$this->session->userdata('conta_status_candidato')) {
            redirect('candidato/login');
        }


        $this->load->model('candidato/candidato');
        //pega os dados do candidato
        $dados = $this->candidato->listarCandidatoEmail($this->session->userdata('email_candidato'));



        //verifica se o candidato tem deficiencia ou não, se tiver listar apenas as vagas para deficiêncites, caso contrario listar apenas as vagas que não são para deficiêntes, verifica também se é estagiario ou profissional
        if ($dados[0]->pcd == 'nao') {

            if (strtolower($dados[0]->situacao_curso) == 'concluido') { //se o curso tiver concluido, exibe as vagas para profissionais
                $candidatos = $this->candidato->listaVagas($this->session->userdata('area_candidato'), 'profissional');
            } elseif (strtolower($dados[0]->situacao_curso) == 'em andamento') { //se o curso tiver em andamento, exibe as vagas para estagiarios
                $candidatos = $this->candidato->listaVagas($this->session->userdata('area_candidato'), 'estagiario');
            }
        } elseif ($dados[0]->pcd == 'sim') {

            if ($dados[0]->situacao_curso == 'concluido') { //se o curso tiver concluido, exibe as vagas para profissionais
                $candidatos = $this->candidato->listaVagasPCD($this->session->userdata('area_candidato'), 'profissional');
            } elseif ($dados[0]->situacao_curso == 'em andamento') { //se o curso tiver em andamento, exibe as vagas para estagiarios
                $candidatos = $this->candidato->listaVagasPCD($this->session->userdata('area_candidato'), 'estagiario');
            }
        }
        $this->load->model('candidato/candidato');
        //pega as recomendações
        $pegaRecomendacao = $this->candidato->pegaRecomendacao($dados[0]->id_candidato);
        //pega as visitas que empresas fizeram no perfil do candidato
        $visitas = $this->candidato->listaVisitas($dados[0]->id_candidato);
        $pontoForte = $this->candidato->pegaPontoForte($this->session->userdata("email_candidato"));
        $interesses = $this->candidato->pegaInteresses($this->session->userdata("email_candidato"));
        $educacao = $this->candidato->pegaEducacao($this->session->userdata("email_candidato"));
        $experiencia = $this->candidato->pegaExperiencia($this->session->userdata("email_candidato"));
        $habilidade = $this->candidato->pegaHabilidade($this->session->userdata("email_candidato"));
        $portfolio = $this->candidato->pegaPortfolio($this->session->userdata("email_candidato"));
        $cursos = $this->candidato->listaCurso();
        $this->load->view('candidato/aceito', 
            [
                'dados' => $dados,
             'candidatos' => $candidatos, 
            'visitas' => $visitas,
            'modelCandidato' => $this->candidato,
            'pegaRecomendacao' => $pegaRecomendacao,
            'interesses' => $interesses,
            'educacao' => $educacao,
            'experiencia' => $experiencia,
            'habilidade' => $habilidade,
            'pontoForte' => $pontoForte,
            'portfolio' => $portfolio,
            'cursos' => $cursos
        ]
        );

        //verifica se existe curriculum sendo enviado
        if ($this->input->post('id_vaga') AND $this->input->post('empresa_id')) {
            //verifica se já existe um curriculum enviado para essa vaga, caso exista, então ignore, caso contrario envia a vaga
            if ($this->candidato->enviaCurriculum($dados[0]->id_candidato, $this->input->post('empresa_id'), $this->input->post('id_vaga'))) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><div class="col-10 offset-1"><strong>Curriculum enviado com sucesso!</strong><br> Enviamos seu curriculum, boa sorte!.</div></div></div>');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-warning"><div class="container"><div class="col-10 offset-1"><strong>Curriculum já existente.</strong><br> Você já possui um curriculum enviado para essa vaga!</div></div></div>');
            }
        }

          //Editar Ponto Forte
          if ($this->input->post('id_pontoForte_editar')) {
            //verifica se já existe um curriculum enviado para essa vaga, caso exista, então ignore, caso contrario envia a vaga
            if ($this->candidato->editaPontoForte($dados[0]->email, $this->input->post('id_pontoForte_editar')  )) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><div class="col-10 offset-1"><strong>Expertise editada com sucesso!</strong><br> Enviamos seu curriculum, boa sorte!.</div></div></div>');
            } 
        }

         //verifica se existe curriculum sendo enviado
         if ($this->input->post('quemsou')) {
            //verifica se já existe um curriculum enviado para essa vaga, caso exista, então ignore, caso contrario envia a vaga
            if ($this->candidato->editaQuemsou($this->input->post('quemsou'), $dados[0]->id_candidato )) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><div class="col-10 offset-1">Informaçao Atualizada com Sucesso!</div></div></div>');
                redirect('candidato/login/aceito/');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-warning"><div class="container"><div class="col-10 offset-1"><strong>Error</strong><br> Deu ruim...</div></div></div>');
                redirect('candidato/login/aceito/');
            }
        }


        //verifica se existe solicitação para alterar a foto do perfil
        if (!empty($_FILES['foto']['name'])) {

            if ($this->candidato->atualizaFoto($this->session->userdata('email_candidato'), $_FILES['foto'], $dados[0]->foto_candidato)) {
                //se retornar true, ou seja, se a foto for cadastrada
                $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><div class="col-10 offset-1"><strong>Foto atualizada!</strong><br> Foto de perfil atualizada com sucesso!.</div></div></div>');
                redirect('candidato/login/aceito/meu_perfil');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-warning"><div class="container"><div class="col-10 offset-1"><strong>Foto invalida.</strong><br> Foto não atualizada!</div></div></div>');
                redirect('candidato/login/aceito/meu_perfil');
            }
        }
    }

    //envia email com token de acesso
    private function enviaEmail($email, $token) {

        $header = 'MIME-Version: 1.0' . "\r\n";
        $header .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $to = $email;
        $subject = html_entity_decode("Recuperação de senha");
        $message = "Recebemos uma solicitação para redefinir sua senha, se foi você, por favor clique no link abaixo, caso contrario ignore essa mensagem.<br> <strong><a href='" . $token . "'>Redefinir senha</a></strong>";
        mail($to, $subject, $message, $header);
    }

    public function sair() {
        //verifica se existe candidato logado, se não existir envia o usuario para tela de login
        if (!$this->session->userdata('email_candidato') && !$this->session->userdata('conta_status_candidato')) {
            redirect('candidato/login');
        }


        $this->session->unset_userdata('email_candidato');
        $this->session->unset_userdata('conta_status_candidato');
        redirect('/');
    }

     // CRUD FORMACAO ACADEMICA

 public function listaFormacao()
 {
     $this->load->model('candidato/Crud_m');
     $email=  $_SESSION['email_candidato'];
                $result['formacao']  = $this->Crud_m->listaFormacao($email);
     echo json_encode($result);
 }

public function editaFormacao(){     
 $this->load->model('candidato/Crud_m');
      $config = array(
                     array(
                         'field' => 'curso',
                         'rules' => 'trim|required'
                         ),
                     array(
                         'field' => 'situacao_curso',
                         'rules' => 'trim|required'
                     )
);
         $this->form_validation->set_rules($config);
         if ($this->form_validation->run() == FALSE) {
             $result['error'] = true;
             $result['msg'] = array(
                             'curso'=>form_error('curso'),
                             'situacao_curso'=>form_error('situacao_curso')
             );
             
     }else{
        $email=  $_SESSION['email_candidato'];
       $data = array(
                         'curso'=> $this->input->post('curso'),
                         'situacao_curso'=> $this->input->post('situacao_curso')
         );
             if($this->Crud_m->editaFormacao($email, $data)){
                 $result['error'] = false;
                 $result['success'] = 'Registro atualizado com Sucesso';
             }
    
 }
       echo json_encode($result);
  }
 // CRUD INFORMAÇOES PESSSOAIS

 public function listaInfos()
 {
     $this->load->model('candidato/Crud_m');
     $email = $this->session->userdata('email_candidato');
        $query=  $_SESSION['email_candidato'];
          if($query){
     
                $result['candidato']  = $this->Crud_m->listaInfos($email);
          
       }
     echo json_encode($result);
 }

 public function editaInfos(){    
    $this->load->model('candidato/Crud_m');
       $config = array(
                        array(
                            'field' => 'nome',
                            'rules' => 'trim|required'
                            ),
                        array(
                            'field' => 'nascimento',
                            'rules' => 'trim|required'
                              ),
                        array(
                            'field' => 'curso',
                            'rules' => 'trim|required'
                              ),
                        array(
                            'field' => 'cep',
                            'rules' => 'trim|required'
                              ),
                         array(
                            'field' => 'estado',
                            'rules' => 'trim|required'
                             ),
                        array(
                           'field' => 'cidade',
                           'rules' => 'trim|required'
                            ),
                        array(
                            'field' => 'bairro',
                            'rules' => 'trim|required'
                            ),
                        array(
                            'field' => 'rua',
                            'rules' => 'trim|required'
                            ),
                        array(
                            'field' => 'num',
                            'rules' => 'trim|required'
                            ),
                        array(
                        'field' => 'telefone',
                        'rules' => 'trim|required'
                            ),
                        array(
                            'field' => 'pais',
                            'rules' => 'trim|required'
                            ),
                        array(
                            'field' => 'sexo',
                            'rules' => 'trim|required'
                           ),
                        array(
                            'field' => 'pcd',
                            'rules' => 'trim|required'
                           )
            ); 

            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) {
                $result['error'] = true;
                $result['msg'] = array(
                                'nome'=>form_error('nome'),
                                'nascimento'=>form_error('nascimento'),
                                'curso'=>form_error('curso'),
                                'cep'=>form_error('cep'),
                                'estado'=>form_error('estado'),
                                'cidade'=>form_error('cidade'),
                                'bairro'=>form_error('bairro'),
                                'rua'=>form_error('num'),
                                'telefone'=>form_error('telefone'),
                                'pais'=>form_error('pais'),
                                'sexo'=>form_error('sexo')

                );
                
        }else{
            $email = $_SESSION['email_candidato'];
          $data = array(
                            'nome'=> $this->input->post('nome'),
                            'nascimento'=> $this->input->post('nascimento'),
                            'curso' => $this->input->post('curso'),
                            'cep' => $this->input->post('cep'),
                            'estado' => $this->input->post('estado'),
                            'cidade' => $this->input->post('cidade'),
                            'bairro' => $this->input->post('bairro'),
                            'rua' => $this->input->post('rua'),
                            'num' => $this->input->post('num'),
                            'telefone' => $this->input->post('telefone'),
                            'pais' => $this->input->post('pais'),
                            'sexo' => $this->input->post('sexo'),
                            'pcd' => $this->input->post('pcd')
            );

                if($this->Crud_m->editaInfos($email, $data)){
                    $result['error'] = false;
                    $result['success'] = 'Informaçoes atualizadas com Sucesso';
                }
       
         }
          echo json_encode($result);
     }


     public function insertVideo(){
        if (!$this->input->is_ajax_request()) {
            exit('no valid req.');
        }    
          $id = $_REQUEST['videoId'];
            echo $id;
           $data = array('video_nome'  => $id, 'status' => 1);
           $email =  $this->session->userdata('email_candidato');
            if(SELF::insertVideoDB($email, $data)){
               $result['error'] = false;
                $result['msg'] ='Atualizadao';
            }
            
        echo json_encode($result);
    }
    
    
    public function insertVideoDB($email, $field){
        $this->load->database();  
        $this->db->where('email', $email);
        $this->db->update('candidato', $field);
        if($this->db->affected_rows() >0){
            return true;
        }else{
            return false;
        }
        
    }

// CRUD CURSOS ############################################

 public function listaeducacao()
 {
     $this->load->model('candidato/Crud_m');
     $email = $this->session->userdata('email_candidato');
        $query=  $_SESSION['email_candidato'];
          if($query){
     
                $result['educacao']  = $this->Crud_m->listaeducacao($email);
          
       }
     echo json_encode($result);
 }
  public function buscaeducacao(){
     $this->load->model('candidato/Crud_m');
      $value = $this->input->post('text');
      $email = $_SESSION['email_candidato'];
       $query =  $this->Crud_m->buscaeducacao($value, $email);
        if($query){
            $result['educacao']= $query;
        }
        
     echo json_encode($result);
      
 }
 public function inserteducacao(){
     $this->load->model('candidato/Crud_m');
     $config = array(
                        array(
                            'field' => 'cidadeEstado2',
                            'rules' => 'trim|required'
                            ),
                        array(
                            'field' => 'instituicao',
                            'rules' => 'trim|required'
                        ),
                        array(
                            'field' => 'curso2',
                            'rules' => 'trim|required'
                        ),
                        array(
                            'field' => 'dataReferencia',
                            'rules' => 'trim|required'
                        )
         );

     
     $this->form_validation->set_rules($config);
     if ($this->form_validation->run() == FALSE) {
         $result['error'] = true;
         $result['msg'] = array(
                                'dataReferencia'=>form_error('dataReferencia'),
                                'instituicao'=>form_error('instituicao'),
                                'curso2'=>form_error('curso2'),
                                'cidadeEstado2'=>form_error('cidadeEstado2')
);
         
     }else{
        $data = array(
                        'dataReferencia'  => $this->input->post('dataReferencia'),
                        'instituicao'     => $this->input->post('instituicao'),
                        'curso2'          => $this->input->post('curso2'),
                        'cidadeEstado2'   => $this->input->post('cidadeEstado2'),
                        'email_candidato' => $_SESSION['email_candidato']
);

         if($this->Crud_m->inserteducacao($data)){
            $result['error'] = false;
             $result['msg'] ='Registro adicionado com Sucesso!';
         }
         
     }
     echo json_encode($result);
 }
public function editaeducacao(){    
 $this->load->model('candidato/Crud_m');
      $config = array(
                     array(
                         'field' => 'cidadeEstado2',
                         'rules' => 'trim|required'
                         ),
                     array(
                         'field' => 'instituicao',
                         'rules' => 'trim|required'
                     ),
                     array(
                        'field' => 'curso2',
                        'rules' => 'trim|required'
                    ),
                     array(
                         'field' => 'dataReferencia',
                         'rules' => 'trim|required'
                     )
);
         $this->form_validation->set_rules($config);
         if ($this->form_validation->run() == FALSE) {
             $result['error'] = true;
             $result['msg'] = array(
                             'dataReferencia'=>form_error('dataReferencia'),
                             'instituicao'=>form_error('instituicao'),
                             'curso2'=>form_error('curso2'),
                             'cidadeEstado2'=>form_error('cidadeEstado2')
             );
             
     }else{
       $id = $this->input->post('id');
       $data = array(
                         'dataReferencia'  => $this->input->post('dataReferencia'),
                         'instituicao'     => $this->input->post('instituicao'),
                         'curso2'          => $this->input->post('curso2'),
                         'cidadeEstado2'   => $this->input->post('cidadeEstado2'),
                         'email_candidato' => $_SESSION['email_candidato']
         );
             if($this->Crud_m->editaeducacao($id, $data)){
                 $result['error'] = false;
                 $result['success'] = 'Registro atualizado com Sucesso';
             }
    
 }
       echo json_encode($result);
  }
   public function deletaeducacao(){
     $this->load->model('candidato/Crud_m');
      $id = $this->input->post('id');
     if($this->Crud_m->deletaeducacao($id)){
          $msg['error'] = false;
         $msg['success'] = 'Registro Excluído com Sucesso';
     }else{
          $msg['error'] = true;
     }
     echo json_encode($msg);
      
 }



 // CRUD CURSOS ############################################

 public function listaHabilidade()
 {
     $this->load->model('candidato/Crud_m');
     $email = $this->session->userdata('email_candidato');
        $query=  $_SESSION['email_candidato'];
          if($query){
     
                $result['habilidade']  = $this->Crud_m->listaHabilidade($email);
          
       }
     echo json_encode($result);
 }
  public function buscaHabilidade(){
     $this->load->model('candidato/Crud_m');
      $value = $this->input->post('text');
      $email = $_SESSION['email_candidato'];
       $query =  $this->Crud_m->buscaHabilidade($value, $email);
        if($query){
            $result['habilidade']= $query;
        }
        
     echo json_encode($result);
      
 }
 public function insertHabilidade(){
     $this->load->model('candidato/Crud_m');
     $config = array(
                        array(
                            'field' => 'porcentagem',
                            'rules' => 'trim|required'
                            ),
                        array(
                            'field' => 'titulo',
                            'rules' => 'trim|required'
                        ),
                        array(
                            'field' => 'descricao',
                            'rules' => 'trim|required'
                        ),
                        array(
                            'field' => 'instituicao',
                            'rules' => 'trim|required'
                        )
         );

     
     $this->form_validation->set_rules($config);
     if ($this->form_validation->run() == FALSE) {
         $result['error'] = true;
         $result['msg'] = array(
                                'porcentagem'=>form_error('porcentagem'),
                                'titulo'=>form_error('titulo'),
                                'descricao'=>form_error('descricao'),
                                'instituicao'=>form_error('instituicao')
                                
);
         
     }else{
        $data = array(
                        'porcentagem'  => $this->input->post('porcentagem'),
                        'titulo'     => $this->input->post('titulo'),
                        'descricao'     => $this->input->post('descricao'),
                        'instituicao'     => $this->input->post('instituicao'),
                        'email_candidato' => $_SESSION['email_candidato']
);

         if($this->Crud_m->insertHabilidade($data)){
            $result['error'] = false;
             $result['msg'] ='Registro adicionado com Sucesso!';
         }
         
     }
     echo json_encode($result);
 }
public function editaHabilidade(){    
 $this->load->model('candidato/Crud_m');
    $config = array(
                    array(
                        'field' => 'porcentagem',
                        'rules' => 'trim|required'
                        ),
                    array(
                        'field' => 'titulo',
                        'rules' => 'trim|required'
                    ),
                    array(
                        'field' => 'descricao',
                        'rules' => 'trim|required'
                    ),
                    array(
                        'field' => 'instituicao',
                        'rules' => 'trim|required'
                    )
    );
         $this->form_validation->set_rules($config);
         if ($this->form_validation->run() == FALSE) {
             $result['error'] = true;
             $result['msg'] = array(
                            'porcentagem'=>form_error('porcentagem'),
                            'titulo'=>form_error('titulo'),
                            'descricao'=>form_error('descricao'),
                            'instituicao'=>form_error('instituicao')
             );
             
     }else{
       $id = $this->input->post('id');
       $data = array(
                    'porcentagem'  => $this->input->post('porcentagem'),
                    'titulo'     => $this->input->post('titulo'),
                    'descricao'     => $this->input->post('descricao'),
                    'instituicao'     => $this->input->post('instituicao'),
                    'email_candidato' => $_SESSION['email_candidato']
         );
             if($this->Crud_m->editaHabilidade($id, $data)){
                 $result['error'] = false;
                 $result['success'] = 'Registro atualizado com Sucesso';
             }
    
 }
       echo json_encode($result);
  }
   public function deletaHabilidade(){
     $this->load->model('candidato/Crud_m');
      $id = $this->input->post('id');
     if($this->Crud_m->deletaHabilidade($id)){
          $msg['error'] = false;
         $msg['success'] = 'Registro Excluído com Sucesso';
     }else{
          $msg['error'] = true;
     }
     echo json_encode($msg);
      
 }

  // CRUD EXPERTISE ############################################

  public function listaExpertise()
  {
      $this->load->model('candidato/Crud_m');
      $email = $this->session->userdata('email_candidato');
         $query=  $_SESSION['email_candidato'];
           if($query){
      
                 $result['expertise']  = $this->Crud_m->listaExpertise($email);
           
        }
      echo json_encode($result);
  }
   public function buscaExpertise(){
      $this->load->model('candidato/Crud_m');
       $value = $this->input->post('text');
       $email = $_SESSION['email_candidato'];
        $query =  $this->Crud_m->buscaExpertise($value, $email);
         if($query){
             $result['expertise']= $query;
         }
         
      echo json_encode($result);
       
  }
  public function insertExpertise(){
      $this->load->model('candidato/Crud_m');
      $config = array(
                         array(
                             'field' => 'conteudo',
                             'rules' => 'trim|required'
                             )
          );
 
      
      $this->form_validation->set_rules($config);
      if ($this->form_validation->run() == FALSE) {
          $result['error'] = true;
          $result['msg'] = array(
                                 'conteudo'=>form_error('conteudo')
                            
 );
          
      }else{
         $data = array(
                         'conteudo'  => $this->input->post('conteudo'),
                         'email_candidato' => $_SESSION['email_candidato']
 );
 
          if($this->Crud_m->insertExpertise($data)){
             $result['error'] = false;
              $result['msg'] ='Registro adicionado com Sucesso!';
          }
          
      }
      echo json_encode($result);
  }
 public function editaExpertise(){    
  $this->load->model('candidato/Crud_m');
       $config = array(
                    array(
                        'field' => 'conteudo',
                        'rules' => 'trim|required'
                        )
 );
          $this->form_validation->set_rules($config);
          if ($this->form_validation->run() == FALSE) {
              $result['error'] = true;
              $result['msg'] = array(
                                'conteudo'=>form_error('conteudo')
              );
              
      }else{
        $id = $this->input->post('id');
        $data = array(
                        'conteudo'  => $this->input->post('conteudo'),
                        'email_candidato' => $_SESSION['email_candidato']
          );
              if($this->Crud_m->editaExpertise($id, $data)){
                  $result['error'] = false;
                  $result['success'] = 'Registro atualizado com Sucesso';
              }
     
  }
        echo json_encode($result);
   }
    public function deletaExpertise(){
      $this->load->model('candidato/Crud_m');
       $id = $this->input->post('id');
      if($this->Crud_m->deletaExpertise($id)){
           $msg['error'] = false;
           $msg['success'] = 'Registro Excluído com Sucesso';
      }else{
           $msg['error'] = true;
      }
      echo json_encode($msg);
       
  }
 
 



//   Início CRUD EXPERIENCIAS  ############################################

 public function listaExperiencia()
 {
     $this->load->model('candidato/Crud_m');
     $email = $this->session->userdata('email_candidato');
        $query=  $_SESSION['email_candidato'];
          if($query){
     
                $result['experiencia']  = $this->Crud_m->listaExperiencia($email);
          
       }
     echo json_encode($result);
 }




 public function addExperiencia(){
     $this->load->model('candidato/Crud_m');
     $config = array(
                     array(
                         'field' => 'empresa',
                         'rules' => 'trim|required'
                         ),
                     array(
                         'field' => 'titulo',
                         'rules' => 'trim|required'
                     ),
                     array(
                         'field' => 'cidadeEstado',
                         'rules' => 'trim|required'
                     ),
                     array(
                        'field' => 'dataReferencia',
                        'rules' => 'trim|required'
                    ),
                     array(
                         'field' => 'email_candidato'
                     )
         );

     
     $this->form_validation->set_rules($config);
     if ($this->form_validation->run() == FALSE) {
         $result['error'] = true;
         $result['msg'] = array(
                                 'empresa'=>form_error('empresa'),
                                 'titulo'=>form_error('titulo'),
                                 'cidadeEstado'=>form_error('cidadeEstado'),
                                 'dataReferencia'=>form_error('dataReferencia')
                                
         );
         
     }else{
             $data = array(
                         'empresa'=> $this->input->post('empresa'),
                         'titulo'=> $this->input->post('titulo'),
                         'cidadeEstado'=> $this->input->post('cidadeEstado'),
                         'dataReferencia'=> $this->input->post('dataReferencia'),
                         'email_candidato'=> $_SESSION['email_candidato']
          
         ); 

         if($this->Crud_m->addExperiencia($data)){
            $result['error'] = false;
             $result['msg'] ='Registro adicionado com Sucesso!';
         }
         
     }
     echo json_encode($result);
 }
public function editaExperiencia(){    
 $this->load->model('candidato/Crud_m');
      $config = array(
                        array(
                            'field' => 'empresa',
                            'rules' => 'trim|required'
                            ),
                        array(
                            'field' => 'titulo',
                            'rules' => 'trim|required'
                        ),
                        array(
                            'field' => 'cidadeEstado',
                            'rules' => 'trim|required'
                        ),
                        array(
                        'field' => 'dataReferencia',
                        'rules' => 'trim|required'
                    ),
                        array(
                            'field' => 'email_candidato'
                        )
);
         $this->form_validation->set_rules($config);
         if ($this->form_validation->run() == FALSE) {
             $result['error'] = true;
             $result['msg'] = array(
                                    'empresa'=>form_error('empresa'),
                                    'titulo'=>form_error('titulo'),
                                    'cidadeEstado'=>form_error('cidadeEstado'),
                                    'dataReferencia'=>form_error('dataReferencia')
             );
             
     }else{
       $id = $this->input->post('id');
       $data = array(
                    'empresa'=> $this->input->post('empresa'),
                    'titulo'=> $this->input->post('titulo'),
                    'cidadeEstado'=> $this->input->post('cidadeEstado'),
                    'dataReferencia'=> $this->input->post('dataReferencia'),
                    'email_candidato'=> $_SESSION['email_candidato']
         );
             if($this->Crud_m->editaExperiencia($id, $data)){
                 $result['error'] = false;
                 $result['success'] = 'Registro atualizado com Sucesso';
             }
    
 }
       echo json_encode($result);
  }
   public function deletaExperiencia(){
     $this->load->model('candidato/Crud_m');
      $id = $this->input->post('id');
     if($this->Crud_m->deletaExperiencia($id)){
          $msg['error'] = false;
         $msg['success'] = 'Registro Excluído com Sucesso';
     }else{
          $msg['error'] = true;
     }
     echo json_encode($msg);
      
 }

 
//   Início CRUD INTERESSES  ############################################

public function listaInteresse()
{
    $this->load->model('candidato/Crud_m');
    $email = $this->session->userdata('email_candidato');
       $query=  $_SESSION['email_candidato'];
         if($query){
    
               $result['interesses']  = $this->Crud_m->listaInteresse($email);
         
      }
    echo json_encode($result);
}



 public function buscaInteresse(){
    $this->load->model('candidato/Crud_m');
     $value = $this->input->post('text');
     $email = $_SESSION['email_candidato'];
      $query =  $this->Crud_m->buscaInteresse($value, $email);
       if($query){
           $result['interesses']= $query;
       }
       
    echo json_encode($result);
     
}
public function insertInteresse(){
    $this->load->model('candidato/Crud_m');
    $config = array(
                    array(
                        'field' => 'titulo',
                        'rules' => 'trim|required'
                        ),
                    array(
                        'field' => 'conteudo',
                        'rules' => 'trim|required'
                    ),
                    array(
                        'field' => 'email_candidato'
                    )
        );

    
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() == FALSE) {
        $result['error'] = true;
        $result['msg'] = array(
                                'conteudo'=>form_error('conteudo'),
                                'titulo'=>form_error('titulo')
                               
        );
        
    }else{
            $data = array(
                        'conteudo'=> $this->input->post('conteudo'),
                        'titulo'=> $this->input->post('titulo'),
                        'email_candidato'=> $_SESSION['email_candidato']
         
        ); 

        if($this->Crud_m->insertInteresse($data)){
           $result['error'] = false;
            $result['msg'] ='Registro adicionado com Sucesso!';
        }
        
    }
    echo json_encode($result);
}
public function editaInteresse(){    
$this->load->model('candidato/Crud_m');
     $config = array(
                    array(
                        'field' => 'titulo',
                        'rules' => 'trim|required'
                        ),
                    array(
                        'field' => 'conteudo',
                        'rules' => 'trim|required'
                    )
                   
);
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $result['error'] = true;
            $result['msg'] = array(
                                    'conteudo'=>form_error('conteudo'),
                                    'titulo'=>form_error('titulo')
            );
            
    }else{
      $id = $this->input->post('id');
      $data = array(
                   'conteudo'=> $this->input->post('conteudo'),
                   'titulo'=> $this->input->post('titulo'),
                   'email_candidato'=> $_SESSION['email_candidato']
        );
            if($this->Crud_m->editaInteresse($id, $data)){
                $result['error'] = false;
                $result['success'] = 'Registro atualizado com Sucesso';
            }
   
}
      echo json_encode($result);
 }
  public function deletaInteresse(){
    $this->load->model('candidato/Crud_m');
     $id = $this->input->post('id');
    if($this->Crud_m->deletaInteresse($id)){
         $msg['error'] = false;
        $msg['success'] = 'Registro Excluído com Sucesso';
    }else{
         $msg['error'] = true;
    }
    echo json_encode($msg);
     
}

public function connectionAcademic(){
 
    $this->load->view('candidato/aceito/conAcad/');

}

}

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

    //DEPOIS DE CONFIRMAR O EMAIL, A EMPRESA PRECISARÁ TERMINAR DE PREENCHER MAIS ALGUNS DADOS
    //sempre que ele acessar o sistema, ele será levado para a tela de "primeiro_aceesso", e nela depois de preencher os dados para atualizar
    //a verificação será feita aqui
    public function primeiroAcesso_() {

        if (!$this->session->userdata('email_empresa') && !$this->session->userdata('conta_status_empresa')) {
            redirect('/');
        }

        $tamanho_maximo_foto = 10485760; // 10MB

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

     //AREA DO CHAT ====================================

    public function chat() {

        //verifica se existe candidato logado, se não existir envia o usuario para tela de login
        if (!$this->session->userdata('email_empresa') && !$this->session->userdata('conta_status_empresa')) {
            redirect('/');
        }

        $this->load->model("empresa/empresa");
        $this->load->model("empresa/logado");
        $areaEmpresa = $this->logado->pegaArea($this->session->userdata('email_empresa'));

        $dados   = [];
        $dados[] = $areaEmpresa;
        $dados["candidatos_comprados"] = $this->empresa->pegaCandidatosComprados($areaEmpresa[0]->id_empresa); //pega os candidatos comprados que já foram aprovados
        
            $this->load->view("empresa/candidato_comprado", ["dados" => $dados]);
  
    }

    //exibe as mensagens no chat
    public function mensagens() {

        if (!$this->session->userdata('email_empresa') && !$this->session->userdata('conta_status_empresa')) {
            redirect('/');
        }

        if($this->uri->segment(4)) {

            $this->load->model('empresa/empresa');
            $this->load->model('empresa/logado');
            $dados     = $this->empresa->verificaEmail($this->session->userdata('email_empresa'));
            $mensagens = $this->empresa->mensagens($this->uri->segment(4) ,$dados[0]->id_empresa); //pega as mensagens entre a empresa e candidato (caso haja compra aprovada)
            $candidatos = $this->logado->listaCandidato();
            $this->load->view('empresa/mensagens', ['dados' => $dados,  'candidatos' => $candidatos, 'mensagens' => $mensagens]);

        }
  
    }

    //pega a quantidade total de mensagens não lidas
    public function mensagensNaoLidasTotais_() {

        if (!$this->session->userdata('email_empresa') && !$this->session->userdata('conta_status_empresa')) {
            redirect('/');
        }

            $this->load->model('empresa/empresa');
            $dados     = $this->empresa->mensagensNaoLidasTotais($this->session->userdata('email_empresa'));

            if(trim(count($dados)) > 0) {
                echo count($dados);
            }else {
                echo "0";
            }
  
    }

    public function enviaMensagem_() {

        //verifica se existe candidato logado, se não existir envia o usuario para tela de login
        if (!$this->session->userdata('email_empresa') && !$this->session->userdata('conta_status_empresa')) {
            redirect('/');
        }

        $this->load->model('empresa/empresa');
        $dados = $this->empresa->verificaEmail($this->session->userdata('email_empresa'));

        if($dados[0]->primeiro_acesso == "nao") {

            if($this->input->post("mensagem")) {

                $this->empresa->enviaMensagem([

                    "id_empresa"   => $dados[0]->id_empresa,
                    "id_candidato" => $this->input->post("id_candidato"),
                    "mensagem"     => strip_tags($this->input->post("mensagem")),
                    "data_envio"   => date("d/m/Y - H:i:s"),
                    "autor"        => "empresa"

                ]);

            }


        }else {
            redirect("candidato/login/logado");
        }
  
    }

    public function atualizaMensagens_() {

        //verifica se existe candidato logado, se não existir envia o usuario para tela de login
        if (!$this->session->userdata('email_empresa') && !$this->session->userdata('conta_status_empresa')) {
            redirect('/');
        }

        $this->load->model('empresa/empresa');
        $dados = $this->empresa->verificaEmail($this->session->userdata('email_empresa'));

        if($dados[0]->primeiro_acesso == "nao") {

            if($this->uri->segment(4)) {

                $this->empresa->atualizaMensagens(

                    $this->uri->segment(4),
                    $this->session->userdata('email_empresa')

                );

            }


        }else {
            redirect("candidato/login/logado");
        }
  
    }


    //pega a quantidade de mensagens não lidas de cada conversa
    public function contaMensagens_() {

        //verifica se existe candidato logado, se não existir envia o usuario para tela de login
        if (!$this->session->userdata('email_empresa') && !$this->session->userdata('conta_status_empresa')) {
            redirect('/');
        }

        $this->load->model('empresa/empresa');
        $dados = $this->empresa->verificaEmail($this->session->userdata('email_empresa'));

        if($dados[0]->primeiro_acesso == "nao") {

            if($this->uri->segment(4)) {

                $resultado = $this->empresa->contaMensagens(

                    $this->uri->segment(4),
                    $this->session->userdata('email_empresa')

                );

                if(trim(count($resultado)) > 0) {
                    echo count($resultado);
                }else {
                    echo "0";
                }

            }


        }else {
            redirect("candidato/login/logado");
        }
  
    }



    public function perfil() {

        if (!$this->session->userdata('email_empresa') && !$this->session->userdata('conta_status_empresa')) {
            redirect('/');
        }

        if(is_numeric($this->uri->segment(4))) {
            $this->load->model('empresa/empresa');
            $this->load->model('empresa/logado');

        $acesso_ = $this->empresa->verificaEmail($this->session->userdata('email_empresa'));
        if($acesso_[0]->primeiro_acesso != "nao") {
            redirect('empresa/login/index');
        }


            $dadosEmpresa = $this->logado->pegaArea($this->session->userdata('email_empresa'));
            $dados = $this->empresa->pegaPerfilCandidato($dadosEmpresa[0]->id_empresa, $this->uri->segment(4));

            if($dados["status"]) {


            //cadastra acesso da empresa como visita
                if ($this->uri->total_segments() == 4) {

                    $this->logado->cadastraVisita($dadosEmpresa[0]->id_empresa, addslashes(htmlentities(utf8_decode(trim($this->uri->segment(4))))), $dadosEmpresa[0]->empresa);
                }

                $pontoForte = $this->empresa->pegaPontoForte($dados["dados"][0]->email);
                $interesses = $this->empresa->pegaInteresses($dados["dados"][0]->email);
                $educacao = $this->empresa->pegaEducacao($dados["dados"][0]->email);
                $experiencia = $this->empresa->pegaExperiencia($dados["dados"][0]->email);
                $habilidade = $this->empresa->pegaHabilidade($dados["dados"][0]->email);
                $portfolio = $this->empresa->pegaPortfolio($dados["dados"][0]->email);

                $this->load->view("empresa/ver_perfil_candidato", 
                    [
                        "dados" => $dados["dados"],
                        'interesses' => $interesses,
                        'educacao' => $educacao,
                        'experiencia' => $experiencia,
                        'habilidade' => $habilidade,
                        'pontoForte' => $pontoForte,
                        'portfolio' => $portfolio
                    ]
                );
            }else {
                redirect("empresa/login/logado");
            }
        }else {
            redirect("empresa/login/logado");
        }

    }

    public function index() {

        if (!$this->session->userdata('email_empresa') && !$this->session->userdata('conta_status_empresa')) {
            redirect('/');
        }

        $this->load->model('empresa/logado');
        $this->load->model('empresa/empresa');
        $area = $this->logado->listaArea();
        $dados = $this->empresa->verificaEmail($this->session->userdata('email_empresa'));

        if($dados[0]->primeiro_acesso == "nao") {
            redirect('empresa/login/logado');
        }else {
            $this->load->view('empresa/primeiro_acesso', ['dados' => $dados, "area" => $area]);
        }

    }

    //ATUALIZA OS DADOS DO PLANO NO BANCO (ISSO PRECISA SER UM CRON JOB, É ATRAVES DESSE METODO QUE SERA ADICIONADO PARA COMPRA DE CANDIDATOS A CADA MES, E TAMBÉM SERA REMOVIDO O SALDO DE CANDIDATOS PARA QUEM NÃO PAGOU, SERÁ TAMBÉM RESPONSAVÉL POR REMOVER OS PLANOS DAS EMPRESAS AO TERMINAR)
    public function ataliza_dados_do_plano() {

        $this->load->model('empresa/empresa');
        return $this->empresa->atualiza_dados_plano_empresa();
    }

    //faz o pagamento antes da data de vencimento
    public function pagamento_antecipado() {

        //verifica se existe usuario logado, se não existir envia o usuario para tela de login
        if (!$this->session->userdata('email_empresa') && !$this->session->userdata('conta_status_empresa')) {
            redirect('');
        }

        //pega os dados da empresa
        $this->load->model('empresa/logado');
        $dadosEmpresa = $this->logado->pegaArea($this->session->userdata('email_empresa'));

        if ((int) $this->input->post('pagar_adiantado') >= 1 AND (int) $this->input->post('pagar_adiantado') < 12) {

            $dataHoje = date("Y/m/d"); //pega a data de hoje
            $data1 = new DateTime($dataHoje); //pega a data que esta em formato de string e transforma em data
            $data2 = new DateTime($dadosEmpresa[0]->data_inicio_plano);  //pega a data que esta em formato de string e transforma em data
            $intervalo = $data1->diff($data2);
            $meses = $intervalo->m + ($intervalo->y * 12); //só funciona para planos que ainda não venceram (pega os meses entre a data de hoje e a data de inciio do plano)

            if ($dataHoje >= $dadosEmpresa[0]->data_inicio_plano) { //se a data de hoje for maior que a data de incio do plano
                if ((int) $dadosEmpresa[0]->meses_pagos >= $meses) { //se a quantidade de meses que passou for maior que a quantidade de meses com saldos adicionados(funciona assim: a cada mês que se passa de acordo com a data de incio do plano, será adicionado novamente o saldo das empresas para poder comprar os candidatos, e com isso o "saldo_adicionado_do_mes" ganhará +1, ou seja, vai representar se os saldos daquela empresa já foram adicionados ou não)
                    $dados_do_pagamento = [
                        "id_empresa" => $dadosEmpresa[0]->id_empresa,
                        "id_plano" => $dadosEmpresa[0]->plano_empresa,
                        "valor_plano" => $dadosEmpresa[0]->valor_plano,
                        "pagando_quantidade_meses" => (int) $this->input->post('pagar_adiantado'),
                        "total" => (int) $this->input->post('pagar_adiantado') * $dadosEmpresa[0]->valor_plano
                    ];

                    //cria sessão de paamento
                    $this->session->set_userdata('pagamento_antecipado', $dados_do_pagamento);

                    redirect('empresa/login/pagamento_antecipado');
                }
            }
        } elseif ($this->session->userdata('pagamento_antecipado')) {

            $this->load->view('empresa/pagamento_plano_antecipado');
        } else {

            redirect('empresa/login/logado_inicial/planos');
        }
    }

    //se a empresa tiver pagamentos pendentes e solicitar o pagamento (FUNCIONA PARA AS EMPRESAS COM STATUS 2, 7 E 8, OS STATUS PODEM SER VISTOS NA FUNÇÃO "verifica_plano_status", AS CHAMADAS VEM DA PAGINA PLANOS.PHP)
    public function pagar_todas_tarifas() {

        //verifica se existe usuario logado, se não existir envia o usuario para tela de login
        if (!$this->session->userdata('email_empresa') && !$this->session->userdata('conta_status_empresa')) {
            redirect('');
        }


        if ($this->input->post('pagar_todas_tarifas')) {

            //pega os dados da empresa
            $this->load->model('empresa/logado');
            $dadosEmpresa = $this->logado->pegaArea($this->session->userdata('email_empresa'));
            //verifica se existe pedidos de planos aguardando pagamento
            $pedidos_aguardando_pagamento = $this->logado->pegaPedidos($dadosEmpresa[0]->id_empresa);

            $dataHoje = date("Y/m/d");
            //$dataHoje = "2018/12/22";

            $data1 = new DateTime($dataHoje);
            $data2 = new DateTime($dadosEmpresa[0]->data_inicio_plano);

            $intervalo = $data1->diff($data2);

            /* o resutado retornando é em anos e meses, isso converte para ser apenas em meses
              exemplo: inves do resultado ser algo do tipo: 1 ano e 3 meses, o resultado é apenas
              15 meses */
            $meses = $intervalo->m + ($intervalo->y * 12); //só funciona para panos que ainda não venceram
            //soma valor a pagar
            $valor_a_pagar = $meses * $dadosEmpresa[0]->valor_plano; //só funciona para empresa com status 2, com status 7 precisa ser 12 - $dadosEmpresa[0]->meses_pagos



            /* se a quantidade de meses pagos for inferior a 12 e a data de hoje for inferior ou igual a data de vencimento do plano */
            if ($dadosEmpresa[0]->meses_pagos <= 12 AND $dataHoje <= $dadosEmpresa[0]->data_termino_plano) {

                //separada a dara do inicio da contratação
                $sepadaData = explode("/", $dadosEmpresa[0]->data_inicio_plano);

                /* adiciona a quantidade de mês pagos */
                $inicio = (new DateTime($dadosEmpresa[0]->data_inicio_plano));
                // Adiciona a quantidade de meses pagos na data de inicio e compara com a data atual, isso serve para identificar se existe faturas a pagar
                $novaData = $inicio->add(new DateInterval("P" . $dadosEmpresa[0]->meses_pagos . "M"));
                // Determina o dia de vencimento
                $vencimento = $novaData->format('Y/m/d');
                $vencimento_data_separada = explode("/", $vencimento); //aqui eu separo a data para que eu possa mostrar ela pra empresa no padrão brasileiro e não americano
                //verifica se existe pagamentos pendentes
                if ($dataHoje >= $vencimento) { //caso exista faturas a pagar

                    /* se essa empresa não estiver com um pedido de pagamento no banco aguardando aprovação */
                    if (count($pedidos_aguardando_pagamento) < 1 AND $dataHoje < $dadosEmpresa[0]->data_termino_plano) { //caso a empresa tenha faturas para pagar e não exista nenhum pedido de pagamento dela salvo no banco, então informar que existe faturas para pagar
                        $dados_do_pagamento = [];
                        $dados_do_pagamento['status'] = 2;
                        $dados_do_pagamento['atrasados'] = $meses;
                        $dados_do_pagamento['total'] = $valor_a_pagar;
                        $dados_do_pagamento['id_empresa'] = $dadosEmpresa[0]->id_empresa;
                        $dados_do_pagamento['id_plano'] = $dadosEmpresa[0]->plano_empresa;
                        $dados_do_pagamento['valor_plano'] = $dadosEmpresa[0]->valor_plano;

                        //cria sessão de paamento
                        $this->session->set_userdata('pagar_todas_tarifas', $dados_do_pagamento);

                        //caso exista algum outra sessão de pagamento, então encerrar
                        $this->session->unset_userdata('pagamento_plano');

                        //exibe a tela de pagamento para compra de plano
                        redirect('empresa/login/pagar_todas_tarifas');
                    } elseif (count($pedidos_aguardando_pagamento) < 1 AND $dataHoje == $dadosEmpresa[0]->data_termino_plano) {

                        $dados_do_pagamento = [];
                        $dados_do_pagamento['status'] = 8;
                        $dados_do_pagamento['atrasados'] = 12 - $dadosEmpresa[0]->meses_pagos;

                        //soma valor a pagar
                        $valor_a_pagar = $dados_do_pagamento['atrasados'] * $dadosEmpresa[0]->valor_plano;

                        $dados_do_pagamento['total'] = $valor_a_pagar;
                        $dados_do_pagamento['id_empresa'] = $dadosEmpresa[0]->id_empresa;
                        $dados_do_pagamento['id_plano'] = $dadosEmpresa[0]->plano_empresa;
                        $dados_do_pagamento['valor_plano'] = $dadosEmpresa[0]->valor_plano;

                        //cria sessão de paamento
                        $this->session->set_userdata('pagar_todas_tarifas', $dados_do_pagamento);

                        //caso exista algum outra sessão de pagamento, então encerrar
                        $this->session->unset_userdata('pagamento_plano');


                        //exibe a tela de pagamento para compra de plano
                        redirect('empresa/login/pagar_todas_tarifas');
                    }
                }
            } elseif ($dadosEmpresa[0]->meses_pagos < 12 AND $dataHoje >= $dadosEmpresa[0]->data_termino_plano) { //caso o plano vença e exista faturas para pagar

                /* se essa empresa não estiver com um pedido de pagamento no banco aguardando aprovação */

                if (count($pedidos_aguardando_pagamento) < 1) {

                    $dados_do_pagamento = [];
                    $dados_do_pagamento['status'] = 7;
                    $dados_do_pagamento['atrasados'] = 12 - $dadosEmpresa[0]->meses_pagos;

                    //soma valor a pagar
                    $valor_a_pagar = $dados_do_pagamento['atrasados'] * $dadosEmpresa[0]->valor_plano;

                    $dados_do_pagamento['total'] = $valor_a_pagar;
                    $dados_do_pagamento['id_empresa'] = $dadosEmpresa[0]->id_empresa;
                    $dados_do_pagamento['id_plano'] = $dadosEmpresa[0]->plano_empresa;
                    $dados_do_pagamento['valor_plano'] = $dadosEmpresa[0]->valor_plano;

                    //cria sessão de paamento
                    $this->session->set_userdata('pagar_todas_tarifas', $dados_do_pagamento);

                    //caso exista algum outra sessão de pagamento, então encerrar
                    $this->session->unset_userdata('pagamento_plano');


                    //exibe a tela de pagamento para compra de plano
                    redirect('empresa/login/pagar_todas_tarifas');
                }
            }
        } elseif ($this->session->userdata('pagar_todas_tarifas')) { //se existir uma sessão com os dados de pagamento, exibe a tela de pagamento
            //caso exista algum outra sessão de pagamento, então encerrar
            $this->session->unset_userdata('pagamento_plano');

            $this->load->view('empresa/pagamento_plano_vencido');
        } else {

            redirect('empresa/login/logado_inicial/planos');
        }
    }

    //verifica se existe planos aguardando aprovação de pagamento ###############
    public function pega_plano_pedidos() {

        //verifica se existe usuario logado, se não existir envia o usuario para tela de login
        if (!$this->session->userdata('email_empresa') && !$this->session->userdata('conta_status_empresa')) {
            redirect('');
        }

        $this->load->model('empresa/logado');
        $dadosEmpresa = $this->logado->pegaArea($this->session->userdata('email_empresa'));
        //verifica se existe pedidos de planos aguardando pagamento
        return $pedidos_aguardando_pagamento = $this->logado->pegaPedidos($dadosEmpresa[0]->id_empresa);
    }

    //verifica a compra de planos, se esta pago, se existe pagamento aguardando aprovação, se o periodo do plano terminou...
    public function verifica_plano_status() {

        //verifica se existe usuario logado, se não existir envia o usuario para tela de login
        if (!$this->session->userdata('email_empresa') && !$this->session->userdata('conta_status_empresa')) {
            redirect('');
        }

        /*

          STATUS LEGENDA:
          1 = PLANO AINDA NÃO TERMINOU, EXISTE TARIFA PENDENTE DE PAGAMENTO, O PAGAMENTO JÁ FOI FEITO E ESTA AGUARDANDO APROVAÇÃO
          2 = PLANO AINDA NÃO TERMINOU, EXISTE TARIFA PENDENTE DE PAGAMENTO, O PAGAMENTO AINDA NÃO FOI FEITO
          3 = PLANO AINDA NÃO TERMINOU, NÃO EXISTE TARIFA PENDENTE DE PAGAMENTO
          4 = PLANO AINDA NÃO TERMINOU, NÃO EXISTE TARIFA PENDENTE DE PAGAMENTO, POREM ESSE É O ÚLTIMO MÊS DO PLANO E NÃO EXISTEM MAIS FATURAS PARA SEREM PAGAS
          5 = PLANO TERMINOU E NÃO EXISTE TARIFAS PARA PAGAR
          6 = PLANO TERMINOU, EXISTE TARIFA PENDENTE DE PAGAMENTO, O PAGAMENTO FOI FEITO E ESTA AGUARDANDO APROVAÇÃO
          7 = PLANO TERMINOU, EXISTE TARIFA PENDENTE DE PAGAMENTO, O PAGAMENTO AINDA NÃO FOI FEITO
          8 = PLANO TERMINA HOJE, EXISTE TARIFA PENDENTE DE PAGAMENTO, O PAGAMENTO AINDA NÃO FOI FEITO
          9 = SE O PLANO DA EMPRESA VENCE HOJE E ELA NÃO POSSUI PAGAMENTOS PENDENTES


         */
        $this->load->model('empresa/logado');
        $dadosEmpresa = $this->logado->pegaArea($this->session->userdata('email_empresa'));
        //verifica se existe pedidos de planos aguardando pagamento
        $pedidos_aguardando_pagamento = $this->logado->pegaPedidos($dadosEmpresa[0]->id_empresa);

        $dataHoje = date("Y/m/d");
        //$dataHoje = "2019/10/22";


        $data1 = new DateTime($dataHoje);
        $data2 = new DateTime($dadosEmpresa[0]->data_inicio_plano);

        $intervalo = $data1->diff($data2);

        /* o resutado retornando é em anos e meses, isso converte para ser apenas em meses
          exemplo: inves do resultado ser algo do tipo: 1 ano e 3 meses, o resultado é apenas
          15 meses */
        $meses = $intervalo->m + ($intervalo->y * 12);

        //soma valor a pagar
        $valor_a_pagar = $meses * $dadosEmpresa[0]->valor_plano;



        /* se a quantidade de meses pagos for inferior a 12 e a data de hoje for inferior ou igual a data de vencimento do plano */
        if ($dadosEmpresa[0]->meses_pagos <= 12 AND $dataHoje <= $dadosEmpresa[0]->data_termino_plano) {

            //separada a dara do inicio da contratação
            $sepadaData = explode("/", $dadosEmpresa[0]->data_inicio_plano);

            /* adiciona a quantidade de mês pagos */
            $inicio = (new DateTime($dadosEmpresa[0]->data_inicio_plano));
            // Adiciona a quantidade de meses pagos na data de inicio e compara com a data atual, isso serve para identificar se existe faturas a pagar
            $novaData = $inicio->add(new DateInterval("P" . $dadosEmpresa[0]->meses_pagos . "M"));
            // Determina o dia de vencimento
            $vencimento = $novaData->format('Y/m/d');
            $vencimento_data_separada = explode("/", $vencimento); //aqui eu separo a data para que eu possa mostrar ela pra empresa no padrão brasileiro e não americano
            //verifica se existe pagamentos pendentes
            if ($dataHoje >= $vencimento) { //caso exista faturas a pagar

                /* se essa empresa já estiver com um pedido de pagamento no banco aguardando aprovação
                  então informar pra ela que o pagamento esta em analise */
                if (count($pedidos_aguardando_pagamento) >= 1) {

                    $plano_status['status'] = 1;
                    $plano_status['msg'] = "Aguardando aprovação de pagamento";
                    $plano_status['atrasados'] = $meses;
                    $plano_status['para_pagar'] = 12 - $dadosEmpresa[0]->meses_pagos;
                    $plano_status['valor'] = $dadosEmpresa[0]->valor_plano;
                    return $plano_status;
                    //echo "Aguardando aprovação de pagamento";
                } elseif (count($pedidos_aguardando_pagamento) < 1 AND $dataHoje < $dadosEmpresa[0]->data_termino_plano) { //caso a empresa tenha faturas para pagar e não exista nenhum pedido de pagamento dela salvo no banco, então informar que existe faturas para pagar (caso a data seja inferior a data de vencimento)
                    $plano_status['status'] = 2;
                    $plano_status['msg'] = "Existem faturas a pagar, você deve: " . $meses . " mês(es) e o valor é de: R$ " . number_format($valor_a_pagar, 2, ",", ".");
                    $plano_status['atrasados'] = $meses;
                    $plano_status['para_pagar'] = 12 - $dadosEmpresa[0]->meses_pagos;
                    $plano_status['valor'] = $dadosEmpresa[0]->valor_plano;
                    return $plano_status;
                    //echo "Existem faturas a pagar, você deve: ".$meses. " mês(es) e o valor é de: R$ ".number_format($valor_a_pagar, 2, ",", ".");
                } elseif (count($pedidos_aguardando_pagamento) < 1 AND $dataHoje == $dadosEmpresa[0]->data_termino_plano AND $dadosEmpresa[0]->meses_pagos < 12) { //caso a empresa tenha faturas para pagar e não exista nenhum pedido de pagamento dela salvo no banco, então informar que existe faturas para pagar (caso a data seja igual a data de vencimento)
                    $plano_status['status'] = 8;
                    $plano_status['atrasados'] = $meses;
                    $plano_status['para_pagar'] = 12 - $dadosEmpresa[0]->meses_pagos;

                    //soma valor a pagar
                    $valor_a_pagar = $plano_status['para_pagar'] * $dadosEmpresa[0]->valor_plano;
                    $plano_status['msg'] = "Seu plano vence hoje. Existem faturas a pagar, você deve: " . $plano_status['para_pagar'] . " mês(es) e o valor é de: R$ " . number_format($valor_a_pagar, 2, ",", ".");

                    $plano_status['valor'] = $dadosEmpresa[0]->valor_plano;
                    return $plano_status;
                    //echo "Existem faturas a pagar, você deve: ".$meses. " mês(es) e o valor é de: R$ ".number_format($valor_a_pagar, 2, ",", ".");
                } elseif (count($pedidos_aguardando_pagamento) < 1 AND $dataHoje == $dadosEmpresa[0]->data_termino_plano AND $dadosEmpresa[0]->meses_pagos == 12) { //Caso o plano da empresa vença hoje e ela não possui pagamentos pendentes
                    $plano_status['status'] = 9;
                    $plano_status['atrasados'] = $meses;
                    $plano_status['para_pagar'] = 12 - $dadosEmpresa[0]->meses_pagos;

                    //soma valor a pagar
                    $valor_a_pagar = $plano_status['para_pagar'] * $dadosEmpresa[0]->valor_plano;
                    $plano_status['msg'] = "Seu plano vence hoje. Você não possui pagamentos pendentes!";

                    $plano_status['valor'] = $dadosEmpresa[0]->valor_plano;
                    return $plano_status;
                    //echo "Existem faturas a pagar, você deve: ".$meses. " mês(es) e o valor é de: R$ ".number_format($valor_a_pagar, 2, ",", ".");
                }
            } else { //caso a empresa não tenha nenhum pagamento pendente
                if ($dadosEmpresa[0]->meses_pagos < 12) { //se o pagamento tiver em dia mas ainda não for o dia final do plano
                    $plano_status['status'] = 3;
                    $plano_status['msg'] = "Você não tem pagamentos pendentes, a data de vencimento para o próximo pagamento é em: " . $vencimento_data_separada[2] . "/" . $vencimento_data_separada[1] . "/" . $vencimento_data_separada[0];
                    $plano_status['atrasados'] = $meses;
                    $plano_status['para_pagar'] = 12 - $dadosEmpresa[0]->meses_pagos;
                    $plano_status['valor'] = $dadosEmpresa[0]->valor_plano;
                    return $plano_status;
                    //echo "Você não tem pagamentos pendentes, a data de vencimento para o próximo pagamento é em: ". $vencimento;
                } elseif ($dadosEmpresa[0]->meses_pagos == 12) { //se o pagamentp tiver em dia mas esse for o último mês do plano
                    $plano_status['status'] = 4;
                    $plano_status['msg'] = "Você não tem pagamentos pendentes, seu plano termina em: " . $vencimento_data_separada[2] . "/" . $vencimento_data_separada[1] . "/" . $vencimento_data_separada[0];
                    $plano_status['atrasados'] = $meses;
                    $plano_status['para_pagar'] = 12 - $dadosEmpresa[0]->meses_pagos;
                    $plano_status['valor'] = $dadosEmpresa[0]->valor_plano;
                    return $plano_status;
                    //echo "Você não tem pagamentos pendentes, eu plano termina em: ". $vencimento;
                }
            }
        } elseif ($dadosEmpresa[0]->meses_pagos == 12 AND $dataHoje >= $dadosEmpresa[0]->data_termino_plano) { //se o plano tiver chegado ao fim e a empresa não dever nada
            $plano_status['status'] = 5;
            $plano_status['msg'] = "Seu plano venceu e não existe nenhuma fatura para pagar";
            $plano_status['atrasados'] = $meses;
            $plano_status['para_pagar'] = 12 - $dadosEmpresa[0]->meses_pagos;
            $plano_status['valor'] = $dadosEmpresa[0]->valor_plano;
            return $plano_status;
            //echo "Seu plano venceu e não existe nenhuma fatura para pagar";
        } elseif ($dadosEmpresa[0]->meses_pagos < 12 AND $dataHoje >= $dadosEmpresa[0]->data_termino_plano) { //caso o plano vença e exista faturas para pagar

            /* se essa empresa já estiver com um pedido de pagamento no banco aguardando aprovação
              então informar pra ela que o pagamento esta em analise */

            if (count($pedidos_aguardando_pagamento) >= 1) {

                $plano_status['status'] = 6;
                $plano_status['msg'] = "Seu plano venceu e você tem uma tarifa de: R$ " . number_format($valor_a_pagar, 2, ",", ".") . " aguardando aprovação de pagamento!";
                $plano_status['atrasados'] = $meses;
                $plano_status['para_pagar'] = 12 - $dadosEmpresa[0]->meses_pagos;
                $plano_status['valor'] = $dadosEmpresa[0]->valor_plano;
                return $plano_status;
                //echo "Seu plano venceu e você tem uma tarifa de: R$ ". number_format($valor_a_pagar, 2, ",", ".") ." aguardando aprovação de pagamento!";
            } else {

                $plano_status['status'] = 7;
                $plano_status['atrasados'] = $meses;
                $plano_status['para_pagar'] = 12 - $dadosEmpresa[0]->meses_pagos;

                //soma valor a pagar
                $valor_a_pagar = $plano_status['para_pagar'] * $dadosEmpresa[0]->valor_plano;

                $plano_status['valor'] = $dadosEmpresa[0]->valor_plano;
                $plano_status['msg'] = "Seu plano venceu e você tem uma tarifa de: R$ " . number_format($valor_a_pagar, 2, ",", ".") . " para pagar.<br>Sua tarifa corresponde ao periodo de " . $plano_status['para_pagar'] . " mês(ses) de pagamentos sem pagar!";
                return $plano_status;
                //echo "Seu plano venceu e você tem uma tarifa de: R$ ". number_format($valor_a_pagar, 2, ",", ".") ." para pagar.<br>Sua tarifa corresponde ao periodo de ". $meses. " mês(ses) de pagamentos sem pagar!";
            }
        }
    }

    //valida plano...quando a empresa solicita uma assinatura de um plano, então verifica se o plano realmente existe
    public function valida_plano() {

        //verifica se existe usuario logado, se não existir envia o usuario para tela de login
        if (!$this->session->userdata('email_empresa') && !$this->session->userdata('conta_status_empresa')) {
            redirect('empresa/login');
        }

        $this->load->model('empresa/empresa');

        if ($this->input->post()) { //se existir solicitação para compra de plano, faz as validações, cria a sessão com os dados e joga pra página de pagamento
            //pega o id da empresa
            $dados_empresa = $this->empresa->verificaEmail($this->session->userdata('email_empresa'));

            //cria sessão de pagamento
            $this->session->set_userdata('pagamento_plano', $this->empresa->validando_plano($this->input->post('id_plano'), $dados_empresa[0]->id_empresa));

            //destroy outras sessões de pagamento caso existam
            $this->session->unset_userdata('pagar_todas_tarifas');


            //exibe a tela de pagamento para compra de plano
            redirect('empresa/login/valida_plano');
        } elseif ($this->session->userdata('pagamento_plano')) { //se existir uma sessão com os dados de pagamento, exibe a tela de pagamento
            //destroy outras sessões de pagamento caso existam
            $this->session->unset_userdata('pagar_todas_tarifas');

            $this->load->view('empresa/pagamento_plano');
        } else {

            redirect('empresa/login/logado_inicial/planos');
        }
    }

    //pagina de pagamento
    public function pagamento() {

        //se não existir a variavel valor (essa variavel terá o valor de pagamento, caso ela não exista, então o usuario é redirecionado pra tela de candidatos)
        if (count($this->session->userdata('pagamento')) < 1) {

            redirect('empresa/login/logado');
        } elseif (is_null($this->session->userdata('email_empresa'))) {

            redirect('');
        }
        $this->load->view('empresa/pagamento');
    }

    //faz pagamento com cartão de crédito (compra de candidato)
    public function pagamentoCartao() {

        //verifica se existe usuario logado, se não existir envia o usuario para tela de login
        if (!$this->session->userdata('email_empresa') && !$this->session->userdata('conta_status_empresa')) {
            redirect('empresa/login');
        }

        $this->load->model('pagamento/cartao');

        $nascimento = explode("-", $this->input->post('cc_nascimento'));

        $dadosComprador = [
            "cc_nome" => $this->input->post('cc_nome'),
            "cc_cpf" => $this->input->post('cc_cpf'),
            "cc_nascimento" => $nascimento[2] . '/' . $nascimento[1] . '/' . $nascimento[0],
            "cc_area" => $this->input->post('cc_area'),
            "cc_telefone" => $this->input->post('cc_telefone'),
            "cc_cep" => $this->input->post('cc_cep'),
            "cc_pais" => $this->input->post('cc_pais'),
            "cc_estado" => $this->input->post('cc_estado'),
            "cc_cidade" => $this->input->post('cc_cidade'),
            "cc_bairro" => $this->input->post('cc_bairro'),
            "cc_rua" => $this->input->post('cc_rua'),
            "cc_numero_residencia" => $this->input->post('cc_numero_residencia')
        ];


        $p = $this->cartao->pagarCartao(
         $this->input->post('pag_tproduto'), $this->input->post('pag_hash'), $this->input->post('pag_token'), $this->input->post('pag_tparcela'), $this->input->post('pag_vparcela'), $dadosComprador
        );
        header('Content-type: application/json');
        echo $p;
    }

    //faz pagamento com cartão de crédito (compra de plano)
    public function pagamentoCartaoPlano() {

        //verifica se existe usuario logado, se não existir envia o usuario para tela de login
        if (!$this->session->userdata('email_empresa') && !$this->session->userdata('conta_status_empresa')) {
            redirect('');
        }

        $this->load->model('pagamento/CartaoPlano');

        $nascimento = explode("-", $this->input->post('cc_nascimento'));

        $dadosComprador = [
            "cc_nome" => $this->input->post('cc_nome'),
            "cc_cpf" => $this->input->post('cc_cpf'),
            "cc_nascimento" => $nascimento[2] . '/' . $nascimento[1] . '/' . $nascimento[0],
            "cc_area" => $this->input->post('cc_area'),
            "cc_telefone" => $this->input->post('cc_telefone'),
            "cc_cep" => $this->input->post('cc_cep'),
            "cc_pais" => $this->input->post('cc_pais'),
            "cc_estado" => $this->input->post('cc_estado'),
            "cc_cidade" => $this->input->post('cc_cidade'),
            "cc_bairro" => $this->input->post('cc_bairro'),
            "cc_rua" => $this->input->post('cc_rua'),
            "cc_numero_residencia" => $this->input->post('cc_numero_residencia')
        ];


        $p = $this->CartaoPlano->pagarCartao(
         $this->input->post('pag_tproduto'), $this->input->post('pag_hash'), $this->input->post('pag_token'), $this->input->post('pag_tparcela'), $this->input->post('pag_vparcela'), $dadosComprador
        );
        header('Content-type: application/json');
        echo $p;
    }

    //faz pagamento com cartão de crédito (pagamento de plano vencido)
    public function pagamentoCartaoPlanoVencidos() {

        //verifica se existe usuario logado, se não existir envia o usuario para tela de login
        if (!$this->session->userdata('email_empresa') && !$this->session->userdata('conta_status_empresa')) {
            redirect('');
        }

        $this->load->model('pagamento/CartaoPlanoVencido');

        $nascimento = explode("-", $this->input->post('cc_nascimento'));

        $dadosComprador = [
            "cc_nome" => $this->input->post('cc_nome'),
            "cc_cpf" => $this->input->post('cc_cpf'),
            "cc_nascimento" => $nascimento[2] . '/' . $nascimento[1] . '/' . $nascimento[0],
            "cc_area" => $this->input->post('cc_area'),
            "cc_telefone" => $this->input->post('cc_telefone'),
            "cc_cep" => $this->input->post('cc_cep'),
            "cc_pais" => $this->input->post('cc_pais'),
            "cc_estado" => $this->input->post('cc_estado'),
            "cc_cidade" => $this->input->post('cc_cidade'),
            "cc_bairro" => $this->input->post('cc_bairro'),
            "cc_rua" => $this->input->post('cc_rua'),
            "cc_numero_residencia" => $this->input->post('cc_numero_residencia')
        ];


        $p = $this->CartaoPlanoVencido->pagarCartao(
         $this->input->post('pag_tproduto'), $this->input->post('pag_hash'), $this->input->post('pag_token'), $this->input->post('pag_tparcela'), $this->input->post('pag_vparcela'), $dadosComprador
        );
        header('Content-type: application/json');
        echo $p;
    }

    //faz pagamento com cartão de crédito (pagamento de plano adiantado)
    public function CartaoPlanoPagamentoAdiantado() {

        //verifica se existe usuario logado, se não existir envia o usuario para tela de login
        if (!$this->session->userdata('email_empresa') && !$this->session->userdata('conta_status_empresa')) {
            redirect('');
        }

        $this->load->model('pagamento/CartaoPlanoPagamentoAdiantado');

        $nascimento = explode("-", $this->input->post('cc_nascimento'));

        $dadosComprador = [
            "cc_nome" => $this->input->post('cc_nome'),
            "cc_cpf" => $this->input->post('cc_cpf'),
            "cc_nascimento" => $nascimento[2] . '/' . $nascimento[1] . '/' . $nascimento[0],
            "cc_area" => $this->input->post('cc_area'),
            "cc_telefone" => $this->input->post('cc_telefone'),
            "cc_cep" => $this->input->post('cc_cep'),
            "cc_pais" => $this->input->post('cc_pais'),
            "cc_estado" => $this->input->post('cc_estado'),
            "cc_cidade" => $this->input->post('cc_cidade'),
            "cc_bairro" => $this->input->post('cc_bairro'),
            "cc_rua" => $this->input->post('cc_rua'),
            "cc_numero_residencia" => $this->input->post('cc_numero_residencia')
        ];

        $p = $this->CartaoPlanoPagamentoAdiantado->pagarCartao(
         $this->input->post('pag_tproduto'), $this->input->post('pag_hash'), $this->input->post('pag_token'), $this->input->post('pag_tparcela'), $this->input->post('pag_vparcela'), $dadosComprador
        );
        header('Content-type: application/json');
        echo $p;
    }

    //faz pagamento com boleto
    public function pagamentoBoleto() {

        //verifica se existe usuario logado, se não existir envia o usuario para tela de login
        if (!$this->session->userdata('email_empresa') && !$this->session->userdata('conta_status_empresa')) {
            redirect('');
        }

        $this->load->model('pagamento/boleto');

        $dadosComprador = [
            "bo_nome" => $this->input->post('bo_nome'),
            "bo_cpf" => $this->input->post('bo_cpf'),
            "bo_area" => $this->input->post('bo_area'),
            "bo_telefone" => $this->input->post('bo_telefone'),
            "bo_cep" => $this->input->post('bo_cep'),
            "bo_pais" => $this->input->post('bo_pais'),
            "bo_estado" => $this->input->post('bo_estado'),
            "bo_cidade" => $this->input->post('bo_cidade'),
            "bo_bairro" => $this->input->post('bo_bairro'),
            "bo_rua" => $this->input->post('bo_rua'),
            "bo_numero_residencia" => $this->input->post('bo_numero_residencia')
        ];


        $p = $this->boleto->pagarBoleto(
         $this->input->post('pag_valor'), $this->input->post('pag_hash'), $dadosComprador
        );
        header('Content-type: application/json');
        echo $p;
    }

    //faz pagamento com debito
    public function pagamentoDebito() {

        //verifica se existe usuario logado, se não existir envia o usuario para tela de login
        if (!$this->session->userdata('email_empresa') && !$this->session->userdata('conta_status_empresa')) {
            redirect('');
        }

        $this->load->model('pagamento/debito');

        $dadosComprador = [
            "de_nome" => $this->input->post('de_nome'),
            "de_cpf" => $this->input->post('de_cpf'),
            "de_area" => $this->input->post('de_area'),
            "de_telefone" => $this->input->post('de_telefone'),
            "de_cep" => $this->input->post('de_cep'),
            "de_pais" => $this->input->post('de_pais'),
            "de_estado" => $this->input->post('de_estado'),
            "de_cidade" => $this->input->post('de_cidade'),
            "de_bairro" => $this->input->post('de_bairro'),
            "de_rua" => $this->input->post('de_rua'),
            "de_numero_residencia" => $this->input->post('de_numero_residencia')
        ];

        $p = $this->debito->pagarDebito(
         $this->input->post('pag_valor'), $this->input->post('pag_hash'), $dadosComprador
        );

        header('Content-type: application/json');
        echo $p;
    }

    //recebe as notificações de alteração de status do pedido do pagseguro (é automatico, são essas atualizações que alteram os pedidos de compra de candidato e de planos)
    public function pagseguro_notificacao() {

        $this->load->model('pagamento/notificacao');

        $notificationCode = preg_replace('/[^[:alnum:]-]/', '', $_POST["notificationCode"]);
        $this->notificacao->atualizaPedido($notificationCode);
    }

    //chama a API de pagamento
    public function chamaAPI() {

        //verifica se existe usuario logado, se não existir envia o usuario para tela de login
        if (!$this->session->userdata('email_empresa') && !$this->session->userdata('conta_status_empresa')) {
            redirect('');
        }

        $this->load->model('pagamento/pagamento');
        return $this->pagamento->pagar();
    }
    
    //pega cursde acordo com id da area
    public function pegaCursoPorId($id) {
    	$this->load->model('empresa/logado');
    	echo json_encode($this->logado->listaCursosPorIdArea($id));
    }
    
    

    public function logado_inicial() {

        if ($this->session->userdata('email_empresa') AND $this->session->userdata('conta_status_empresa') == 'empresa') {

            $this->form_validation->set_rules('titulo', 'título', 'required');
            $this->form_validation->set_rules('atuacao', 'atuação', 'required');
            $this->form_validation->set_rules('salario', 'salário', 'required');
            $this->form_validation->set_rules('experiencia', 'experiência', 'required');
            $this->form_validation->set_rules('empresa_vaga', 'Empresa vaga', 'required');
            $this->form_validation->set_rules('empresa_id', 'Empresa id', 'required');
            $this->form_validation->set_rules('area_id', 'Área id', 'required');
            $this->form_validation->set_rules('cargo', 'cargo', 'required');
            $this->load->model('empresa/logado');
            $this->load->model('empresa/empresa');
            $this->load->model('administracao/administracaoModel');



            $acesso_ = $this->empresa->verificaEmail($this->session->userdata('email_empresa'));
            if($acesso_[0]->primeiro_acesso != "nao") {
                redirect('empresa/login/index');
            }



            if ($this->form_validation->run() === false) {
                $areaEmpresa = $this->logado->pegaArea($this->session->userdata('email_empresa'));

                //pega id da empresa
                $idEmpresa = $areaEmpresa[0]->id_empresa;

                //pega os planos
                $listaPlanos = $this->administracaoModel->listaPlanos();
                $listaVagasEmpresaEmAnalise = $this->logado->listaVagasEmpresas($idEmpresa, 1);
                $listaVagasEmpresaAceitas = $this->logado->listaVagasEmpresas($idEmpresa, 2);
                $areaEmpresa = $this->logado->pegaArea($this->session->userdata('email_empresa'));
                $pegaPlano = $this->logado->pegaPlano($this->session->userdata('email_empresa'));
                $pegaCurriculum = $this->empresa->pegaCurriculum($idEmpresa);
                $pegaPedidos = $this->logado->pegaPedidos($idEmpresa);
                $pegaCandidatosFilaProvacao = $this->empresa->pegaCandidatosFilaProvacao($idEmpresa);
                $comprasAprovadas = $this->empresa->pegaCandidatosComprados($idEmpresa); //pega os candidatos comprados que já foram aprovados
                $candidatos = $this->logado->listaCandidato();
                $listaCursosCadastraVagasSelect = $this->logado->listaCursosCadastraVagasSelect($this->session->userdata('email_empresa'));
                $this->load->view('empresa/logado_inicial', [
                    'area' => $this->logado->listaArea(),
                    'areaEmpresa' => $areaEmpresa,
                    'listaCursosCadastraVagasSelect' => $listaCursosCadastraVagasSelect,
                    'listaVagasEmpresaEmAnalise' => $listaVagasEmpresaEmAnalise,
                    'listaVagasEmpresaAceitas' => $listaVagasEmpresaAceitas,
                    'pegaCurriculum' => $pegaCurriculum,
                    'listaPlanos' => $listaPlanos,
                    'pegaPlano' => $pegaPlano,
                    'candidatos' => $candidatos, 
                    'pegaPedidos' => $pegaPedidos,
                    'comprasAprovadas' => $comprasAprovadas,
                    'pegaCandidatosFilaProvacao' => $pegaCandidatosFilaProvacao
                ]);
            } else {
                //Cadastra vaga de emprego
                $dados = [
                    'nome_vaga' => $this->input->post('titulo'),
                    'curso_vaga' => $this->input->post('atuacao'),
                    'area_curso' => $this->input->post('area_id'),
                    'salario_vaga' => $this->input->post('salario'),
                    'experiencia_vaga' => $this->input->post('experiencia'),
                    'empresa_vaga' => $this->input->post('empresa_vaga'),
                    'empresa_id' => $this->input->post('empresa_id'),
                    'pcd' => $this->input->post('pcd'),
                    'cargo' => $this->input->post('cargo'),
                    'status_vaga' => 1
                ];

                $operacao = $this->empresa->cadastraVaga($dados);

                if ($operacao) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><div class="col-12"><strong>Vaga cadastrada.</strong><br> tudo certo, em breve sua vaga será aprovada!</div></div></div>');
                    redirect('empresa/login/logado_inicial/cadastra_vaga');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger"><div class="container"><div class="col-12"><strong>Erro.</strong><br> verifique os dados e tente novamente!</div></div></div>');
                    redirect('empresa/login/logado_inicial/cadastra_vaga');
                }
            }

            //se existir sair no segmento 4, então deslogar e enviar a empresa para area de login
            if ($this->uri->segment(4) == 'sair') {

                $this->session->unset_userdata('email_empresa');
                $this->session->unset_userdata('conta_status_empresa');
                redirect('/');
            }

            //verifica se existe uma tentativa de postagem de recomendação
            if (is_numeric(addslashes(htmlentities(utf8_decode(trim($this->input->post('recomendacao_candidato')))))) AND is_numeric(addslashes(htmlentities(utf8_decode(trim($this->input->post('recomendacao_candidato'))))))) {
                if ($this->empresa->cadastraRecomendados(addslashes(htmlentities(utf8_decode(trim($this->input->post('recomendacao_empresa'))))), addslashes(htmlentities(utf8_decode(trim($this->input->post('recomendacao_candidato'))))))) {
                    //se já não existir uma recomendação, então cadastra ela e exibe a mensagem de sucesso, caso conatrario exiba a mensagem de que já existe essa recomendação
                    $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><div class="col-12"><strong>Candidato recomendado.</strong><br> Obrigado pela colaboração!</div></div></div>');
                    redirect('empresa/login/logado_inicial/curriculum_recebido');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-warning"><div class="container"><div class="col-12"><strong>Recomendação já existe.</strong><br> Você já recomendou esse candidato!</div></div></div>');
                    redirect('empresa/login/logado_inicial/curriculum_recebido');
                }
            }
        } else {
            redirect('');
        }
    }

    public function esqueceu_senha() {

        if ($this->input->post('email')) {
            //se existir uma solicitação para recuperar senha
            $this->load->model('empresa/empresa');

            //se existir um usuario com esse email, então cria e envia por email um link para redefinição
            $operacao = $this->empresa->verificaEmail($this->input->post('email'));
            if (count($operacao) >= 1) {

                //envia o token de acesso para o email do usuário
                SELF::enviaEmail($operacao[0]->email, base_url('empresa/login/redefinir_senha/' . hash('sha1', $operacao[0]->email . $operacao[0]->senha)));

                $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><div class="col-12"><strong>Verifique seu email.</strong><br> Verifique seu e-mail, enviamos um link para que possa redefinir sua senha.</div></div></div>');
                redirect('empresa/login/esqueceu_senha');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger"><div class="container"><div class="col-12"><strong>E-mail invalido.</strong><br> Esse usuário não existe!</div></div></div>');
                redirect('empresa/login/esqueceu_senha');
            }
        }
        $this->load->view('empresa/esqueceu_senha');
    }

    public function redefinir_senha() {

        //se existir um token de acesso, exibe a tela para alterar a senha (esse token é enviado para o email do usuario)
        if ($this->uri->segment(4)) {

            $this->load->model('empresa/empresa');

            //exige que a senha tenha entre 5 e 30 caracteres
            $this->form_validation->set_rules('senha', 'senha', 'required|min_length[5]|max_length[30]');

            //ao preencher os dados para alteração de senha, verifica se o token de acesso esta correto
            if ($this->input->post('email') AND $this->input->post('senha') AND $this->input->post('repetirSenha')) {


                //se existir um usuario com esse email, então verifica se o token pertence a ele
                $operacao = $this->empresa->verificaEmail($this->input->post('email'));

                if (count($operacao) >= 1 AND hash('sha1', $operacao[0]->email . $operacao[0]->senha) == $this->uri->segment(4)) {

                    //se o token for valido, verifica se a nova senha é igual a antiga
                    if ($operacao[0]->senha == hash('sha512', $this->input->post('senha'))) {

                        $this->session->set_flashdata('msg', '<div class="alert alert-warning"><div class="container"><div class="col-12"><strong>Senha invalida.</strong><br> Você já utiliza essa senha!</div></div></div>');
                        redirect('empresa/login/redefinir_senha/' . $this->uri->segment(4));
                    } else {

                        //altera a senha
                        $this->empresa->redefinirSenha($operacao[0]->email, hash('sha512', $this->input->post('senha')));
                        //mostra mensagem de sucesso ao usuário (esse token já não será mais valido)
                        $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><div class="col-12"><strong>Senha alterada.</strong><br> Sua senha foi alterada com sucesso, click <a href=" ' . base_url('empresa/login') . ' ">AQUI<a> e faça login!</div></div></div>');
                        redirect('empresa/login/redefinir_senha/' . $this->uri->segment(4));
                    }
                } else {

                    $this->session->set_flashdata('msg', '<div class="alert alert-danger"><div class="container"><div class="col-12"><strong>Usuário não existe.</strong><br> Usuário ou token de acesso invalido!</div></div></div>');
                    redirect('empresa/login/redefinir_senha/' . $this->uri->segment(4));
                }
            }


            $this->load->view('empresa/redefinir_senha');
        } else {

            redirect('');
        }
    }

    //envia email com token de acesso
    private function enviaEmail($email, $token) {

        //verifica se existe usuario logado, se não existir envia o usuario para tela de login
        if (!$this->session->userdata('email_empresa') && !$this->session->userdata('conta_status_empresa')) {
            redirect('');
        }

        $header = 'MIME-Version: 1.0' . "\r\n";
        $header .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $to = $email;
        $subject = html_entity_decode("Recuperação de senha");
        $message = "Recebemos uma solicitação para redefinir sua senha, se foi você, por favor clique no link abaixo, caso contrario ignore essa mensagem.<br> <strong><a href='" . $token . "'>Redefinir senha</a></strong>";
        mail($to, $subject, $message, $header);
    }

      public function reuniao() {

        if ($this->session->userdata('email_empresa') AND $this->session->userdata('conta_status_empresa') == 'empresa') {

            $this->load->model('empresa/logado');
            $this->load->model('empresa/empresa');

            $acesso_ = $this->empresa->verificaEmail($this->session->userdata('email_empresa'));
            if($acesso_[0]->primeiro_acesso != "nao") {
                redirect('empresa/login/index');
            }


            $this->load->model('administracao/administracaoModel');
        
            $areaEmpresa = $this->logado->pegaArea($this->session->userdata('email_empresa'));
            $area = $this->logado->listaArea();
            $curso = $this->logado->listaCurso();
            $candidatos = $this->logado->listaCandidato();
            $listaPlanosAvulsos = $this->administracaoModel->listaPlanosAvulsos();
            $pegaPlano = $this->logado->pegaPlano($this->session->userdata('email_empresa'));

          

                //pega os candidatos selecionados
                $Ids_candidatos = $this->logado->candidatosAprovados($acesso_[0]->id_empresa);
                $separa_valores = [];
                for ($x = 0; $x < count($Ids_candidatos); $x++) {
                    if (is_numeric(addslashes(htmlentities(utf8_decode(trim($Ids_candidatos[$x]->id_candidato)))))) {
                        $separa_valores[] = addslashes(htmlentities(utf8_decode(trim($Ids_candidatos[$x]->id_candidato))));
                    }
                }

                $candidatosSelecionados = $this->logado->candidatosSelecionados($separa_valores);
                if ($candidatosSelecionados) {

                    // essa parte é importante, caso a empresa já tenha comprado o candidato ou já tenha pago por ele e esteja aguardando pagamento, terá um aviso de que notificando a empresa de que ela não pode comprar o candidato -----
                    $pegaPedidosCandidatos = []; // pega os candidatos na fila de pedidos (que estão aguardando pagamento)
                    $verificaCandidatosComprados = []; // pega os candidatos que já foram comprados pela empresa
                    $result = array();
                    $i = 0;
                    foreach ($candidatosSelecionados as $candidatosSelecionadosValue) {
                      
                        $expertise = $this->logado->pegaPontoForte($candidatosSelecionadosValue->email);
                        $interesses = $this->logado->pegaInteresses($candidatosSelecionadosValue->email);
                        $cursos = $this->logado->pegaEducacao($candidatosSelecionadosValue->email);
                        $experiencia = $this->logado->pegaExperiencia($candidatosSelecionadosValue->email);
                        $skill = $this->logado->pegaHabilidade($candidatosSelecionadosValue->email);
                        $reuniao = $this->logado->pegaReuniao($candidatosSelecionadosValue->id_candidato);
                        $skill = $this->logado->pegaHabilidade($candidatosSelecionadosValue->email);
    
                        $portifolio_imagens = $this->logado->pegaPortfolio($candidatosSelecionadosValue->email);

                      
                        $dadosPessoais = [];
                        $dadosPessoais['nome'] = $candidatosSelecionadosValue->nome;
                        $dadosPessoais['nome_curso'] = $candidatosSelecionadosValue->nome_curso;
                        $dadosPessoais['quemsou'] = $candidatosSelecionadosValue->quemsou;
                        $dadosPessoais['situacao_curso'] = $candidatosSelecionadosValue->situacao_curso;
                        $dadosPessoais['id_candidato'] = $candidatosSelecionadosValue->id_candidato;
                        $dadosPessoais['video_nome'] = $candidatosSelecionadosValue->video_nome;
                        $dadosPessoais['email'] = $candidatosSelecionadosValue->email;
                        $dadosPessoais['id'] = $candidatosSelecionadosValue->id;

                        $candidatos = array (
                                            'dadosPessoais' => $dadosPessoais,
                                            'expertise'     => $expertise,
                                            'interesses'    => $interesses,
                                            'cursos'        => $cursos, 
                                            'experiencia'   => $experiencia,
                                            'skill'         => $skill,
                                            'portifolio'    => $portifolio_imagens,
                                            'reuniao'       => $reuniao
                                        ); 
                        $i++; 
                        $result['carga'][$i] =  $candidatos;

                        $pegaPedidosCandidatos[] = @$this->empresa->pegaPedidosCandidatos($areaEmpresa[0]->id_empresa, $candidatosSelecionadosValue->id_candidato)[0]->id_candidato_pedido;
                        $verificaCandidatosComprados[] = @$this->empresa->verificaCandidatosComprados($areaEmpresa[0]->id_empresa, $candidatosSelecionadosValue->id_candidato)[0]->id_candidato_comprado;
                    }
                    //-------------------------------------------------------------------- fim verificação se a empresa já possui candidato
                    //se estiver tudo certo, então exibe a tela da triagem               
                 


                    $this->load->view('empresa/conferencing', [ 'result' => $result, 'candidatosSelecionados' => $candidatosSelecionados, 'areaEmpresa' => $areaEmpresa, 'listaPlanosAvulsos' => $listaPlanosAvulsos, 'pegaPedidosCandidatos' => $pegaPedidosCandidatos, 'pegaPlano' => $pegaPlano, 'verificaCandidatosComprados' => $verificaCandidatosComprados]);


                    //se existir uma solicitação de compra (botão finalizar compra na triagem) ////////////////////////////////
                    //////////////////////////////////////////////////////////////////////////////////////////////////////////
                    /////////////////////////////////////////////////////////////////////////////////////////////////////////

                    if (!empty($this->input->post())) {

                        //pega os pedidos
                        $pedidos = $this->input->post('preco');

                        //pega o plano da empresa (se houver)
                        $limitePlano = count($pegaPlano) >= 1 ? $pegaPlano[0]->limite_restante_vagas_plano : 0;

                        //SE O SALDO DO PLANO FOR MAIOR OU IGUAL A QUANTIDADE DE PEDIDOS, ENTÃO CADASTRA E JÁ ENVIA A MENSGAEM DE SUCESSO (DIZENDO QUE JÁ FORAM APROVADOS, ENVIAR MENSAGEM PARA A EMPRESA E PARA OS CANDIDATOS TAMBÉM)
                        if ($limitePlano >= count($pedidos)) {
                            foreach ($pedidos as $indice => $pedidosValue) {

                                //enquanto o limite do plano for maior que 0, a empresa não precisará pagar nada
                                if ($limitePlano > 0) {

                                    //realiza compra do candidato (nesse momento eu verifico se o retorno da compra é realmente verdadeiro, eu faço isso pois a empresa pode ter adicionado o candidato ao carrinho antes dele ser comprado, e nesse momento ele já ter sido comprado e aprovado por outra empresa, caso isso ocorra, então o retorno é falso e o plano da empresa não perde o saldo desse candidato)
                                    if ($this->empresa->fazCompra($areaEmpresa[0]->id_empresa, $pedidosValue, $limitePlano, $listaPlanosAvulsos)) {

                                        unset($pedidos[$indice]);
                                        $limitePlano -= 1;
                                    } else {

                                        unset($pedidos[$indice]);
                                    }
                                }
                            }

                            //exibe a mensagem de sucesso
                            $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><div class="col-12"><strong>Tudo certo.</strong><br> Compra efetuada com sucesso, você já pode vê-los na sua lista de compras clicando <a href="' . base_url('empresa/login/logado_inicial/compras_aprovadas') . '">aqui</a>!<br><a href="' . base_url('empresa/login/logado') . '">Voltar</a></div></div></div>');
                            //echo '<script>window.location.reload()</script>';
                            //$url_atual = "http" . (isset($_SERVER['HTTPS']) ? (($_SERVER['HTTPS']=="on") ? "s" : "") : "") . "://" . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                            redirect('empresa/login/logado');
                        }//SE O SALDO NÃO FOR MAIOR QUE OS PEDIDOS
                        else {

                            $pedidosParaPagar['id'] = []; //esse array receberá os ids
                            $pedidosParaPagar['total'] = 0; //esse array receberá o valor total
                            $pedidosParaPagar['id_empresa'] = 0; //id da empresa que esta comprando

                            foreach ($pedidos as $indice => $pedidosValue) {

                                //enquanto o limite do plano for maior que 0, a empresa não precisará pagar nada
                                if ($limitePlano > 0) {

                                    //realiza compra do candidato (nesse momento eu verifico se o retorno da compra é realmente verdadeiro, eu faço isso pois a empresa pode ter adicionado o candidato ao carrinho antes dele ser comprado, e nesse momento ele já ter sido comprado e aprovado por outra empresa, caso isso ocorra, então o retorno é falso e o plano da empresa não perde o saldo desse candidato)
                                    if ($this->empresa->fazCompra($areaEmpresa[0]->id_empresa, $pedidosValue, $limitePlano, $listaPlanosAvulsos)) { //estou enviando os planos avulsos pois preciso pegar os preços para atribuir na compra
                                        unset($pedidos[$indice]);
                                        $limitePlano -= 1;
                                    } else {

                                        unset($pedidos[$indice]);
                                    }
                                }
                                //quando o saldo terminar, então o restante do pagamento precisará ser feito com cartão, boleto ou debito.
                                //Para isso será passado todos os candidatos para um novo array, esse array conterá todos os ids dos candidatos restantes e o valor total deles, esse valor será passado para um campo de valor total na pagina de pagamento
                                else {

                                    //verifica se o candidato já foi comprado pela empresa ou se ele esta na fila aguardando pagamento
                                    if (count($this->empresa->pegaPedidosCandidatos($areaEmpresa[0]->id_empresa, $pedidosValue)) < 1 OR count($this->empresa->verificaCandidatosComprados($areaEmpresa[0]->id_empresa, $pedidosValue)) < 1) {

                                        //se candidato não existir na lista de compras e nem na fila de pagamentos, então atribui o id ao arrey $pedidosParaPagar e atribui o valor também
                                        if (strtolower($this->empresa->listarCandidato($pedidosValue)[0]->situacao_curso) == strtolower('concluido')) {

                                            $pedidosParaPagar['total'] += (float) $listaPlanosAvulsos[1]->valor_planos_avulsos;
                                            array_push($pedidosParaPagar['id'], $pedidosValue);
                                        } elseif (strtolower($this->empresa->listarCandidato($pedidosValue)[0]->situacao_curso) == strtolower('em andamento')) {

                                            $pedidosParaPagar['total'] += (float) $listaPlanosAvulsos[0]->valor_planos_avulsos;
                                            array_push($pedidosParaPagar['id'], $pedidosValue);
                                        }
                                    }
                                }
                            }

                            //redireciona pra pagina de pagamento e cria uma sessão com o valor e ids dos candidatos
                            $pedidosParaPagar['id_empresa'] = $areaEmpresa[0]->id_empresa;
                            $this->session->set_userdata('pagamento', $pedidosParaPagar);
                            redirect('empresa/login/pagamento');
                        }
                    }
                } 
                



            if (is_numeric(addslashes(htmlentities(utf8_decode(trim($this->input->post('recomendacao_candidato')))))) AND is_numeric(addslashes(htmlentities(utf8_decode(trim($this->input->post('recomendacao_candidato'))))))) {
                if ($this->empresa->cadastraRecomendados(addslashes(htmlentities(utf8_decode(trim($this->input->post('recomendacao_empresa'))))), addslashes(htmlentities(utf8_decode(trim($this->input->post('recomendacao_candidato'))))))) {
                    //se já não existir uma recomendação, então cadastra ela e exibe a mensagem de sucesso, caso conatrario exiba a mensagem de que já existe essa recomendação
                    $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><div class="col-12"><strong>Candidato recomendado.</strong><br> Obrigado pela colaboração!</div></div></div>');
                    redirect('empresa/login/logado');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-warning"><div class="container"><div class="col-12"><strong>Recomendação já existe.</strong><br> Você já recomendou esse candidato!</div></div></div>');
                    redirect('empresa/login/logado');
                }
            }
        } else {
            redirect('');
        }
    }



    public function fasetwo() {

        if ($this->session->userdata('email_empresa') AND $this->session->userdata('conta_status_empresa') == 'empresa') {

            $this->load->model('empresa/logado');
            $this->load->model('empresa/empresa');

            $acesso_ = $this->empresa->verificaEmail($this->session->userdata('email_empresa'));
            if($acesso_[0]->primeiro_acesso != "nao") {
                redirect('empresa/login/index');
            }


            $this->load->model('administracao/administracaoModel');
        
            $areaEmpresa = $this->logado->pegaArea($this->session->userdata('email_empresa'));
            $area = $this->logado->listaArea();
            $curso = $this->logado->listaCurso();
            $candidatos = $this->logado->listaCandidato();
            $listaPlanosAvulsos = $this->administracaoModel->listaPlanosAvulsos();
            $pegaPlano = $this->logado->pegaPlano($this->session->userdata('email_empresa'));

          
            //Se a empresa clicar no botão para analisar os candidatos escolhidos, verificar se os valores são validos, os valores vem atraves do get
            ///////////////////////////////////////////////////////////////////////////////////

            if ($this->uri->total_segments() > 3) {
            
                //os valores vem separados por barras da url, por isso eles são separados e transformados em array independentes
                $separa_valores = [];
                for ($x = 4; $x <= $this->uri->total_segments(); $x++) {

                    if (is_numeric(addslashes(htmlentities(utf8_decode(trim($this->uri->segment($x))))))) {

                        $separa_valores[] = addslashes(htmlentities(utf8_decode(trim($this->uri->segment($x)))));
                       
                    }
                }
                //pega os candidatos selecionados
                $candidatosSelecionados = $this->logado->candidatosSelecionados($separa_valores);
                if ($candidatosSelecionados) {

                    // essa parte é importante, caso a empresa já tenha comprado o candidato ou já tenha pago por ele e esteja aguardando pagamento, terá um aviso de que notificando a empresa de que ela não pode comprar o candidato -----
                    $pegaPedidosCandidatos = []; // pega os candidatos na fila de pedidos (que estão aguardando pagamento)
                    $verificaCandidatosComprados = []; // pega os candidatos que já foram comprados pela empresa
                    $result = array();
                    $i = 0;
                    foreach ($candidatosSelecionados as $candidatosSelecionadosValue) {
                      
                        $expertise = $this->logado->pegaPontoForte($candidatosSelecionadosValue->email);
                        $interesses = $this->logado->pegaInteresses($candidatosSelecionadosValue->email);
                        $cursos = $this->logado->pegaEducacao($candidatosSelecionadosValue->email);
                        $experiencia = $this->logado->pegaExperiencia($candidatosSelecionadosValue->email);
                        $skill = $this->logado->pegaHabilidade($candidatosSelecionadosValue->email);
                        $reuniao = $this->logado->pegaReuniao($candidatosSelecionadosValue->id_candidato);
                        $skill = $this->logado->pegaHabilidade($candidatosSelecionadosValue->email);
                        $portifolio_imagens = $this->logado->pegaPortfolio($candidatosSelecionadosValue->email);

                      
                        $dadosPessoais = [];
                        $dadosPessoais['nome'] = $candidatosSelecionadosValue->nome;
                        $dadosPessoais['nome_curso'] = $candidatosSelecionadosValue->nome_curso;
                        $dadosPessoais['quemsou'] = $candidatosSelecionadosValue->quemsou;
                        $dadosPessoais['situacao_curso'] = $candidatosSelecionadosValue->situacao_curso;
                        $dadosPessoais['id_candidato'] = $candidatosSelecionadosValue->id_candidato;
                        $dadosPessoais['video_nome'] = $candidatosSelecionadosValue->video_nome;
                        $dadosPessoais['email'] = $candidatosSelecionadosValue->email;
                        $dadosPessoais['id'] = $candidatosSelecionadosValue->id;

                        $candidatos = array (
                                            'dadosPessoais' => $dadosPessoais,
                                            'expertise'     => $expertise,
                                            'interesses'    => $interesses,
                                            'cursos'        => $cursos, 
                                            'experiencia'   => $experiencia,
                                            'skill'         => $skill,
                                            'portifolio'    => $portifolio_imagens
                                          
                                        ); 
                        $i++; 
                        $result['carga'][$i] =  $candidatos;

                        $pegaPedidosCandidatos[] = @$this->empresa->pegaPedidosCandidatos($areaEmpresa[0]->id_empresa, $candidatosSelecionadosValue->id_candidato)[0]->id_candidato_pedido;
                        $verificaCandidatosComprados[] = @$this->empresa->verificaCandidatosComprados($areaEmpresa[0]->id_empresa, $candidatosSelecionadosValue->id_candidato)[0]->id_candidato_comprado;
                    }
                    //-------------------------------------------------------------------- fim verificação se a empresa já possui candidato
                    //se estiver tudo certo, então exibe a tela da triagem               
                 


                    $this->load->view('empresa/agenda', [ 'result' => $result, 'candidatosSelecionados' => $candidatosSelecionados, 'areaEmpresa' => $areaEmpresa, 'listaPlanosAvulsos' => $listaPlanosAvulsos, 'pegaPedidosCandidatos' => $pegaPedidosCandidatos, 'pegaPlano' => $pegaPlano, 'verificaCandidatosComprados' => $verificaCandidatosComprados]);


                    //se existir uma solicitação de compra (botão finalizar compra na triagem) ////////////////////////////////
                    //////////////////////////////////////////////////////////////////////////////////////////////////////////
                    /////////////////////////////////////////////////////////////////////////////////////////////////////////

                    if (!empty($this->input->post())) {

                        //pega os pedidos
                        $pedidos = $this->input->post('preco');

                        //pega o plano da empresa (se houver)
                        $limitePlano = count($pegaPlano) >= 1 ? $pegaPlano[0]->limite_restante_vagas_plano : 0;

                        //SE O SALDO DO PLANO FOR MAIOR OU IGUAL A QUANTIDADE DE PEDIDOS, ENTÃO CADASTRA E JÁ ENVIA A MENSGAEM DE SUCESSO (DIZENDO QUE JÁ FORAM APROVADOS, ENVIAR MENSAGEM PARA A EMPRESA E PARA OS CANDIDATOS TAMBÉM)
                        if ($limitePlano >= count($pedidos)) {
                            foreach ($pedidos as $indice => $pedidosValue) {

                                //enquanto o limite do plano for maior que 0, a empresa não precisará pagar nada
                                if ($limitePlano > 0) {

                                    //realiza compra do candidato (nesse momento eu verifico se o retorno da compra é realmente verdadeiro, eu faço isso pois a empresa pode ter adicionado o candidato ao carrinho antes dele ser comprado, e nesse momento ele já ter sido comprado e aprovado por outra empresa, caso isso ocorra, então o retorno é falso e o plano da empresa não perde o saldo desse candidato)
                                    if ($this->empresa->fazCompra($areaEmpresa[0]->id_empresa, $pedidosValue, $limitePlano, $listaPlanosAvulsos)) {

                                        unset($pedidos[$indice]);
                                        $limitePlano -= 1;
                                    } else {

                                        unset($pedidos[$indice]);
                                    }
                                }
                            }

                            //exibe a mensagem de sucesso
                            $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><div class="col-12"><strong>Tudo certo.</strong><br> Compra efetuada com sucesso, você já pode vê-los na sua lista de compras clicando <a href="' . base_url('empresa/login/logado_inicial/compras_aprovadas') . '">aqui</a>!<br><a href="' . base_url('empresa/login/logado') . '">Voltar</a></div></div></div>');
                            //echo '<script>window.location.reload()</script>';
                            //$url_atual = "http" . (isset($_SERVER['HTTPS']) ? (($_SERVER['HTTPS']=="on") ? "s" : "") : "") . "://" . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                            redirect('empresa/login/logado');
                        }//SE O SALDO NÃO FOR MAIOR QUE OS PEDIDOS
                        else {

                            $pedidosParaPagar['id'] = []; //esse array receberá os ids
                            $pedidosParaPagar['total'] = 0; //esse array receberá o valor total
                            $pedidosParaPagar['id_empresa'] = 0; //id da empresa que esta comprando

                            foreach ($pedidos as $indice => $pedidosValue) {

                                //enquanto o limite do plano for maior que 0, a empresa não precisará pagar nada
                                if ($limitePlano > 0) {

                                    //realiza compra do candidato (nesse momento eu verifico se o retorno da compra é realmente verdadeiro, eu faço isso pois a empresa pode ter adicionado o candidato ao carrinho antes dele ser comprado, e nesse momento ele já ter sido comprado e aprovado por outra empresa, caso isso ocorra, então o retorno é falso e o plano da empresa não perde o saldo desse candidato)
                                    if ($this->empresa->fazCompra($areaEmpresa[0]->id_empresa, $pedidosValue, $limitePlano, $listaPlanosAvulsos)) { //estou enviando os planos avulsos pois preciso pegar os preços para atribuir na compra
                                        unset($pedidos[$indice]);
                                        $limitePlano -= 1;
                                    } else {

                                        unset($pedidos[$indice]);
                                    }
                                }
                                //quando o saldo terminar, então o restante do pagamento precisará ser feito com cartão, boleto ou debito.
                                //Para isso será passado todos os candidatos para um novo array, esse array conterá todos os ids dos candidatos restantes e o valor total deles, esse valor será passado para um campo de valor total na pagina de pagamento
                                else {

                                    //verifica se o candidato já foi comprado pela empresa ou se ele esta na fila aguardando pagamento
                                    if (count($this->empresa->pegaPedidosCandidatos($areaEmpresa[0]->id_empresa, $pedidosValue)) < 1 OR count($this->empresa->verificaCandidatosComprados($areaEmpresa[0]->id_empresa, $pedidosValue)) < 1) {

                                        //se candidato não existir na lista de compras e nem na fila de pagamentos, então atribui o id ao arrey $pedidosParaPagar e atribui o valor também
                                        if (strtolower($this->empresa->listarCandidato($pedidosValue)[0]->situacao_curso) == strtolower('concluido')) {

                                            $pedidosParaPagar['total'] += (float) $listaPlanosAvulsos[1]->valor_planos_avulsos;
                                            array_push($pedidosParaPagar['id'], $pedidosValue);
                                        } elseif (strtolower($this->empresa->listarCandidato($pedidosValue)[0]->situacao_curso) == strtolower('em andamento')) {

                                            $pedidosParaPagar['total'] += (float) $listaPlanosAvulsos[0]->valor_planos_avulsos;
                                            array_push($pedidosParaPagar['id'], $pedidosValue);
                                        }
                                    }
                                }
                            }

                            //redireciona pra pagina de pagamento e cria uma sessão com o valor e ids dos candidatos
                            $pedidosParaPagar['id_empresa'] = $areaEmpresa[0]->id_empresa;
                            $this->session->set_userdata('pagamento', $pedidosParaPagar);
                            redirect('empresa/login/pagamento');
                        }
                    }
                } 
                

            } else {

                //se a empresa não selecionou nada ou os dados são invalidos, então exibe a tela de candidatos
                $this->load->view('empresa/index', ['area' => $area, 'curso' => $curso, 'candidatos' => $candidatos, 'areaEmpresa' => $areaEmpresa]);
            }

       


            if (is_numeric(addslashes(htmlentities(utf8_decode(trim($this->input->post('recomendacao_candidato')))))) AND is_numeric(addslashes(htmlentities(utf8_decode(trim($this->input->post('recomendacao_candidato'))))))) {
                if ($this->empresa->cadastraRecomendados(addslashes(htmlentities(utf8_decode(trim($this->input->post('recomendacao_empresa'))))), addslashes(htmlentities(utf8_decode(trim($this->input->post('recomendacao_candidato'))))))) {
                    //se já não existir uma recomendação, então cadastra ela e exibe a mensagem de sucesso, caso conatrario exiba a mensagem de que já existe essa recomendação
                    $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><div class="col-12"><strong>Candidato recomendado.</strong><br> Obrigado pela colaboração!</div></div></div>');
                    redirect('empresa/login/logado');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-warning"><div class="container"><div class="col-12"><strong>Recomendação já existe.</strong><br> Você já recomendou esse candidato!</div></div></div>');
                    redirect('empresa/login/logado');
                }
            }
        } else {
            redirect('');
        }
    }


    public function logado() {

        if ($this->session->userdata('email_empresa') AND $this->session->userdata('conta_status_empresa') == 'empresa') {

            $this->load->model('empresa/logado');
            $this->load->model('empresa/empresa');

            $acesso_ = $this->empresa->verificaEmail($this->session->userdata('email_empresa'));
            if($acesso_[0]->primeiro_acesso != "nao") {
                redirect('empresa/login/index');
            }


            $this->load->model('administracao/administracaoModel');
        
            $areaEmpresa = $this->logado->pegaArea($this->session->userdata('email_empresa'));
            $area = $this->logado->listaArea();
            $curso = $this->logado->listaCurso();
            $estado = $this->logado->listaEstado();
            $cidade = $this->logado->listaCidade();
            $univer = $this->logado->listaUniversidades();
            $candidatos = $this->logado->listaCandidato();
            $listaPlanosAvulsos = $this->administracaoModel->listaPlanosAvulsos();
            $pegaPlano = $this->logado->pegaPlano($this->session->userdata('email_empresa'));

          
            //Se a empresa clicar no botão para analisar os candidatos escolhidos, verificar se os valores são validos, os valores vem atraves do get
            ///////////////////////////////////////////////////////////////////////////////////

            if ($this->uri->total_segments() > 3) {

                //os valores vem separados por barras da url, por isso eles são separados e transformados em array independentes
                $separa_valores = [];
                for ($x = 4; $x <= $this->uri->total_segments(); $x++) {

                    if (is_numeric(addslashes(htmlentities(utf8_decode(trim($this->uri->segment($x))))))) {

                        $separa_valores[] = addslashes(htmlentities(utf8_decode(trim($this->uri->segment($x)))));
                    }
                }

                //pega os candidatos selecionados
                $candidatosSelecionados = $this->logado->candidatosSelecionados($separa_valores);
                if ($candidatosSelecionados) {

                    // essa parte é importante, caso a empresa já tenha comprado o candidato ou já tenha pago por ele e esteja aguardando pagamento, terá um aviso de que notificando a empresa de que ela não pode comprar o candidato -----
                    $pegaPedidosCandidatos = []; // pega os candidatos na fila de pedidos (que estão aguardando pagamento)
                    $verificaCandidatosComprados = []; // pega os candidatos que já foram comprados pela empresa
                    $result = array();
                    $i = 0;
                    foreach ($candidatosSelecionados as $candidatosSelecionadosValue) {
                      
                        $expertise = $this->logado->pegaPontoForte($candidatosSelecionadosValue->email);
                        $interesses = $this->logado->pegaInteresses($candidatosSelecionadosValue->email);
                        $cursos = $this->logado->pegaEducacao($candidatosSelecionadosValue->email);
                        $experiencia = $this->logado->pegaExperiencia($candidatosSelecionadosValue->email);
                        $skill = $this->logado->pegaHabilidade($candidatosSelecionadosValue->email);
                        $portifolio_imagens = $this->logado->pegaPortfolio($candidatosSelecionadosValue->email);

                      
                        $dadosPessoais = [];
                        $dadosPessoais['nome'] = $candidatosSelecionadosValue->nome;
                        $dadosPessoais['nome_curso'] = $candidatosSelecionadosValue->nome_curso;
                        $dadosPessoais['quemsou'] = $candidatosSelecionadosValue->quemsou;
                        $dadosPessoais['situacao_curso'] = $candidatosSelecionadosValue->situacao_curso;
                        $dadosPessoais['id_candidato'] = $candidatosSelecionadosValue->id_candidato;
                        $dadosPessoais['video_nome'] = $candidatosSelecionadosValue->video_nome;
                        $dadosPessoais['email'] = $candidatosSelecionadosValue->email;
                        $dadosPessoais['id'] = $candidatosSelecionadosValue->id;

                        $candidatos = array (
                                            'dadosPessoais' => $dadosPessoais,
                                            'expertise'     => $expertise,
                                            'interesses'    => $interesses,
                                            'cursos'        => $cursos, 
                                            'experiencia'   => $experiencia,
                                            'skill'         => $skill,
                                            'portifolio'    => $portifolio_imagens
                                        ); 
                        $i++; 
                        $result['carga'][$i] =  $candidatos;

                        $pegaPedidosCandidatos[] = @$this->empresa->pegaPedidosCandidatos($areaEmpresa[0]->id_empresa, $candidatosSelecionadosValue->id_candidato)[0]->id_candidato_pedido;
                        $verificaCandidatosComprados[] = @$this->empresa->verificaCandidatosComprados($areaEmpresa[0]->id_empresa, $candidatosSelecionadosValue->id_candidato)[0]->id_candidato_comprado;
                    }
                    //-------------------------------------------------------------------- fim verificação se a empresa já possui candidato
                    //se estiver tudo certo, então exibe a tela da triagem               
                 


                    $this->load->view('empresa/triagem', [ 'result' => $result, 'candidatosSelecionados' => $candidatosSelecionados, 'areaEmpresa' => $areaEmpresa, 'listaPlanosAvulsos' => $listaPlanosAvulsos, 'pegaPedidosCandidatos' => $pegaPedidosCandidatos, 'pegaPlano' => $pegaPlano, 'verificaCandidatosComprados' => $verificaCandidatosComprados]);


                    //se existir uma solicitação de compra (botão finalizar compra na triagem) ////////////////////////////////
                    //////////////////////////////////////////////////////////////////////////////////////////////////////////
                    /////////////////////////////////////////////////////////////////////////////////////////////////////////

                    if (!empty($this->input->post())) {

                        //pega os pedidos
                        $pedidos = $this->input->post('preco');

                        //pega o plano da empresa (se houver)
                        $limitePlano = count($pegaPlano) >= 1 ? $pegaPlano[0]->limite_restante_vagas_plano : 0;

                        //SE O SALDO DO PLANO FOR MAIOR OU IGUAL A QUANTIDADE DE PEDIDOS, ENTÃO CADASTRA E JÁ ENVIA A MENSGAEM DE SUCESSO (DIZENDO QUE JÁ FORAM APROVADOS, ENVIAR MENSAGEM PARA A EMPRESA E PARA OS CANDIDATOS TAMBÉM)
                        if ($limitePlano >= count($pedidos)) {
                            foreach ($pedidos as $indice => $pedidosValue) {

                                //enquanto o limite do plano for maior que 0, a empresa não precisará pagar nada
                                if ($limitePlano > 0) {

                                    //realiza compra do candidato (nesse momento eu verifico se o retorno da compra é realmente verdadeiro, eu faço isso pois a empresa pode ter adicionado o candidato ao carrinho antes dele ser comprado, e nesse momento ele já ter sido comprado e aprovado por outra empresa, caso isso ocorra, então o retorno é falso e o plano da empresa não perde o saldo desse candidato)
                                    if ($this->empresa->fazCompra($areaEmpresa[0]->id_empresa, $pedidosValue, $limitePlano, $listaPlanosAvulsos)) {

                                        unset($pedidos[$indice]);
                                        $limitePlano -= 1;
                                    } else {

                                        unset($pedidos[$indice]);
                                    }
                                }
                            }

                            //exibe a mensagem de sucesso
                            $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><div class="col-12"><strong>Tudo certo.</strong><br> Compra efetuada com sucesso, você já pode vê-los na sua lista de compras clicando <a href="' . base_url('empresa/login/logado_inicial/compras_aprovadas') . '">aqui</a>!<br><a href="' . base_url('empresa/login/logado') . '">Voltar</a></div></div></div>');
                            //echo '<script>window.location.reload()</script>';
                            //$url_atual = "http" . (isset($_SERVER['HTTPS']) ? (($_SERVER['HTTPS']=="on") ? "s" : "") : "") . "://" . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                            redirect('empresa/login/logado');
                        }//SE O SALDO NÃO FOR MAIOR QUE OS PEDIDOS
                        else {

                            $pedidosParaPagar['id'] = []; //esse array receberá os ids
                            $pedidosParaPagar['total'] = 0; //esse array receberá o valor total
                            $pedidosParaPagar['id_empresa'] = 0; //id da empresa que esta comprando

                            foreach ($pedidos as $indice => $pedidosValue) {

                                //enquanto o limite do plano for maior que 0, a empresa não precisará pagar nada
                                if ($limitePlano > 0) {

                                    //realiza compra do candidato (nesse momento eu verifico se o retorno da compra é realmente verdadeiro, eu faço isso pois a empresa pode ter adicionado o candidato ao carrinho antes dele ser comprado, e nesse momento ele já ter sido comprado e aprovado por outra empresa, caso isso ocorra, então o retorno é falso e o plano da empresa não perde o saldo desse candidato)
                                    if ($this->empresa->fazCompra($areaEmpresa[0]->id_empresa, $pedidosValue, $limitePlano, $listaPlanosAvulsos)) { //estou enviando os planos avulsos pois preciso pegar os preços para atribuir na compra
                                        unset($pedidos[$indice]);
                                        $limitePlano -= 1;
                                    } else {

                                        unset($pedidos[$indice]);
                                    }
                                }
                                //quando o saldo terminar, então o restante do pagamento precisará ser feito com cartão, boleto ou debito.
                                //Para isso será passado todos os candidatos para um novo array, esse array conterá todos os ids dos candidatos restantes e o valor total deles, esse valor será passado para um campo de valor total na pagina de pagamento
                                else {

                                    //verifica se o candidato já foi comprado pela empresa ou se ele esta na fila aguardando pagamento
                                    if (count($this->empresa->pegaPedidosCandidatos($areaEmpresa[0]->id_empresa, $pedidosValue)) < 1 OR count($this->empresa->verificaCandidatosComprados($areaEmpresa[0]->id_empresa, $pedidosValue)) < 1) {

                                        //se candidato não existir na lista de compras e nem na fila de pagamentos, então atribui o id ao arrey $pedidosParaPagar e atribui o valor também
                                        if (strtolower($this->empresa->listarCandidato($pedidosValue)[0]->situacao_curso) == strtolower('concluido')) {

                                            $pedidosParaPagar['total'] += (float) $listaPlanosAvulsos[1]->valor_planos_avulsos;
                                            array_push($pedidosParaPagar['id'], $pedidosValue);
                                        } elseif (strtolower($this->empresa->listarCandidato($pedidosValue)[0]->situacao_curso) == strtolower('em andamento')) {

                                            $pedidosParaPagar['total'] += (float) $listaPlanosAvulsos[0]->valor_planos_avulsos;
                                            array_push($pedidosParaPagar['id'], $pedidosValue);
                                        }
                                    }
                                }
                            }

                            //redireciona pra pagina de pagamento e cria uma sessão com o valor e ids dos candidatos
                            $pedidosParaPagar['id_empresa'] = $areaEmpresa[0]->id_empresa;
                            $this->session->set_userdata('pagamento', $pedidosParaPagar);
                            redirect('empresa/login/pagamento');
                        }
                    }
                } 
                

            } else {


                //se a empresa não selecionou nada ou os dados são invalidos, então exibe a tela de candidatos
                $this->load->view('empresa/index', ['area' => $area, 'cidade' => $cidade,'univer'=> $univer, 'estado' => $estado,  'curso' => $curso, 'candidatos' => $candidatos, 'areaEmpresa' => $areaEmpresa]);
            }

       


            if (is_numeric(addslashes(htmlentities(utf8_decode(trim($this->input->post('recomendacao_candidato')))))) AND is_numeric(addslashes(htmlentities(utf8_decode(trim($this->input->post('recomendacao_candidato'))))))) {
                if ($this->empresa->cadastraRecomendados(addslashes(htmlentities(utf8_decode(trim($this->input->post('recomendacao_empresa'))))), addslashes(htmlentities(utf8_decode(trim($this->input->post('recomendacao_candidato'))))))) {
                    //se já não existir uma recomendação, então cadastra ela e exibe a mensagem de sucesso, caso conatrario exiba a mensagem de que já existe essa recomendação
                    $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><div class="col-12"><strong>Candidato recomendado.</strong><br> Obrigado pela colaboração!</div></div></div>');
                    redirect('empresa/login/logado');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-warning"><div class="container"><div class="col-12"><strong>Recomendação já existe.</strong><br> Você já recomendou esse candidato!</div></div></div>');
                    redirect('empresa/login/logado');
                }
            }
        } else {
            redirect('');
        }
    }


    public function player() {

        //verifica se existe usuario logado, se não existir envia o usuario para tela de login
        if (!$this->session->userdata('email_empresa') && !$this->session->userdata('conta_status_empresa')) {
            redirect('');
        }

        $this->load->model("empresa/empresa");
        $acesso_ = $this->empresa->verificaEmail($this->session->userdata('email_empresa'));
        if($acesso_[0]->primeiro_acesso != "nao") {
            redirect('empresa/login/index');
        }

        //verifica se exise dados
        if ($this->uri->total_segments() == 5) {

            //pagina que exibirá o vídeo, acrescentará +1 nas visitas e mostrará os botões para recomendar candidato
            $this->load->model('empresa/logado');
            $areaEmpresa = $this->logado->pegaArea($this->session->userdata('email_empresa'));
            $this->logado->cadastraVisita($areaEmpresa[0]->id_empresa, addslashes(htmlentities(utf8_decode(trim($this->uri->segment(4))))), $areaEmpresa[0]->empresa);
            $this->load->view('empresa/player');
        }
    }

    public function sair() {
        $this->session->unset_userdata('email_empresa');
        $this->session->unset_userdata('conta_status_empresa');
        redirect('/');
    }


    // CRUD INFORMAÇOES PESSSOAIS

 public function listaInfos()
 {
     $this->load->model('empresa/Crud_m');
     $email = $this->session->userdata('email_empresa');
        $query= $this->session->userdata('email_empresa');
          if($query){
     
                $result['empresa']  = $this->Crud_m->listaInfos($email);
          
       }
     echo json_encode($result);
 }

 public function editaInfos(){    
    $this->load->model('empresa/Crud_m');
       $config = array(
                        array(
                            'field' => 'empresa',
                            'rules' => 'trim|required'
                            ),
                        array(
                            'field' => 'cnpj',
                            'rules' => 'trim|required'
                              ),
                        array(
                            'field' => 'cep',
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
                            'field' => 'area',
                            'rules' => 'trim|required'
                            )
                      
            ); 

            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == FALSE) {
                $result['error'] = true;
                $result['msg'] = array(
                                'empresa'=>form_error('empresa'),
                                'area'=>form_error('area'),
                                'num'=>form_error('num'),
                                'cnpj'=>form_error('cnpj'),
                                'cep'=>form_error('cep'),
                                'telefone'=>form_error('telefone'),
                                'pais'=>form_error('pais')

                );
                
        }else{
            $email = $this->session->userdata('email_empresa');
          $data = array(
                            'empresa'=> $this->input->post('empresa'),
                            'cep'=> $this->input->post('cep'),
                            'area' => $this->input->post('area'),
                            'num' => $this->input->post('num'),
                            'telefone' => $this->input->post('telefone'),
                            'pais' => $this->input->post('pais'),
                            'cnpj' => $this->input->post('cnpj')
            );

                if($this->Crud_m->editaInfos($email, $data)){
                    $result['error'] = false;
                    $result['success'] = 'Informaçoes atualizadas com Sucesso';
                }
       
         }
          echo json_encode($result);
     }


     public function listavagas()
     {
        $this->load->model('empresa/logado');
        //$this->load->model('empresa/empresa');
        $this->load->model('empresa/crud_m');
    
        $areaEmpresa = $this->logado->pegaArea($this->session->userdata('email_empresa'));
        //pega id da empresa
        $idEmpresa = $areaEmpresa[0]->id_empresa;
                                                                
        $result['vagas']  = $this->crud_m->_listavagas($idEmpresa, 2); // Vagas Aceitas
        //$result['vagas'] = $this->logado->listaVagasEmpresas($idEmpresa, 1); // Vagas em Análise 
              
         echo json_encode($result);
     }
    

   
    public function addvagas(){
        $this->load->model('empresa/empresa');
        $config = array(
                           array(
                               'field' => 'nome_vaga',
                               'rules' => 'trim|required'
                               ),
                           array(
                               'field' => 'curso_vaga',
                               'rules' => 'trim|required'
                           ),
                           array(
                               'field' => 'area_curso',
                               'rules' => 'trim|required'
                           ),
                           array(
                               'field' => 'salario_vaga',
                               'rules' => 'trim|required'
                           ),
                           array(
                               'field' => 'experiencia_vaga',
                               'rules' => 'trim|required'
                           ),
                           array(
                               'field' => 'empresa_vaga',
                               'rules' => 'trim|required'
                           ),
                           array(
                               'field' => 'empresa_id',
                               'rules' => 'trim|required'
                           ),
                           array(
                               'field' => 'pcd',
                               'rules' => 'trim|required'
                           )
                           ,
                           array(
                               'field' => 'cargo',
                               'rules' => 'trim|required'
                           )
                         
            );
   
        
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $result['error'] = true;
            $result['msg'] = array(
                                   'nome_vaga'=>form_error('nome_vaga'),
                                   'curso_vaga'=>form_error('atuacao'),
                                   'salario_vaga'=>form_error('salario_vaga'),
                                   'experiencia_vaga'=>form_error('experiencia_vaga'),
                                   'pcd'=>form_error('pcd'),
                                   'cargo'=>form_error('cargo'),
                                   'status'=> 1
   );
            
        }else{
           $data = array(
                        'nome_vaga' => $this->input->post('titulo'),
                        'curso_vaga' => $this->input->post('atuacao'),
                        'area_curso' => $this->input->post('area_id'),
                        'salario_vaga' => $this->input->post('salario'),
                        'experiencia_vaga' => $this->input->post('experiencia'),
                        'empresa_vaga' => $this->input->post('empresa_vaga'),
                        'empresa_id' => $this->input->post('empresa_id'),
                        'pcd' => $this->input->post('pcd'),
                        'cargo' => $this->input->post('cargo'),
                        'status_vaga' => 1
   );
   
            if($this->empresa->cadastraVaga($data)){
               $result['error'] = false;
                $result['msg'] ='Registro adicionado com Sucesso!';
            }
            
        }
        echo json_encode($result);
    }

    public function editavagas(){
        $this->load->model('empresa/crud_m');
        $config = array(
                           array(
                               'field' => 'nome_vaga',
                               'rules' => 'trim|required'
                               ),
                           array(
                               'field' => 'curso_vaga',
                               'rules' => 'trim|required'
                           ),
                           array(
                               'field' => 'area_curso',
                               'rules' => 'trim|required'
                           ),
                           array(
                               'field' => 'salario_vaga',
                               'rules' => 'trim|required'
                           ),
                           array(
                               'field' => 'experiencia_vaga',
                               'rules' => 'trim|required'
                           ),
                           array(
                               'field' => 'empresa_vaga',
                               'rules' => 'trim|required'
                           ),
                           array(
                               'field' => 'empresa_id',
                               'rules' => 'trim|required'
                           ),
                           array(
                               'field' => 'pcd',
                               'rules' => 'trim|required'
                           )
                           ,
                           array(
                               'field' => 'cargo',
                               'rules' => 'trim|required'
                           )
                         
            );
   
        
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $result['error'] = true;
            $result['msg'] = array(
                                   'nome_vaga'=>form_error('nome_vaga'),
                                   'curso_vaga'=>form_error('curso_vaga'),
                                   'area_curso'=>form_error('area_curso'),
                                   'salario_vaga'=>form_error('salario_vaga'),
                                   'experiencia_vaga'=>form_error('experiencia_vaga'),
                                   'empresa_vaga'=>form_error('empresa_vaga'),
                                   'empresa_id'=>form_error('empresa_id'),
                                   'pcd'=>form_error('pcd'),
                                   'cargo'=>form_error('cargo'),
                                   'status'=> 1
   );
            
        }else{
           $id = $this->input->post('id');
           $data = array(
                        'nome_vaga' => $this->input->post('titulo'),
                        'curso_vaga' => $this->input->post('atuacao'),
                        'area_curso' => $this->input->post('area_id'),
                        'salario_vaga' => $this->input->post('salario'),
                        'experiencia_vaga' => $this->input->post('experiencia'),
                        'empresa_vaga' => $this->input->post('empresa_vaga'),
                        'empresa_id' => $this->input->post('empresa_id'),
                        'pcd' => $this->input->post('pcd'),
                        'cargo' => $this->input->post('cargo'),
                        'status_vaga' => 1
                         );
   
            if($this->crud_m->editavagas($data, $id)){
               $result['error'] = false;
                $result['msg'] ='Registro editado com Sucesso!';
            }
            
        }
        echo json_encode($result);
    }


    public function deletavagas(){
        $this->load->model('empresa/Crud_m');
         $id = $this->input->post('id');
        if($this->Crud_m->deletavagas($id)){
            $msg['error'] = false;
            $msg['success'] = 'Registro Excluído com Sucesso';
        }else{
             $msg['error'] = true;
        }
        echo json_encode($msg);
         
    }

    public function buscavagas(){
        $this->load->model('empresa/Crud_m');
         $value = $this->input->post('text');
         $email = $_SESSION['email_empresa'];
          $query =  $this->Crud_m->buscaevaga($value, $email);
           if($query){
               $result['educacao']= $query;
           }
           
        echo json_encode($result);
         
    }


    private $_video_id = FALSE;
    private $_video_type = FALSE;
    /**
     * Add Video
     *
     * This method automatically recognizes if the video is from YouTube or Vimeo.
     *
     * @access	public
     * @param	string	video url
     * @return	string	video ID
     */
    public function add_video($link)
    {
        echo 'to aqui';
        if(!preg_match("/vimeo/", $link)) {
            $vendor = 'youtube';
        } else {
            $vendor = 'vimeo';
            echo  $vendor ;
            echo $link;
        }
        if($vendor == 'youtube') {
            if($id = SELF::get_youtube_id($link)) {
                $this->_video_id = $id;
                $this->_video_type = 'youtube';
                return $this->_video_id;
            } else {
                return FALSE;
            }
        } else if($vendor == 'vimeo') {
      
            $id = SELF::get_vimeo_id($link);
      
           echo 'Valor dor Id=';
           echo $id;
           //echo $id;
           
                echo '____entrei =';
                $this->_video_id = $id;
                $this->_video_type = 'vimeo';
                echo $this->_video_id;
                return $this->_video_id;
         
              
            
        } else {
            return FALSE;
        }
    }
    /**
     * Return Video ID
     *
     * @access	public
     * @return	string	video ID
     */
    public function get_video_id() {
        return $this->_video_id;
    }
    /**
     * Return Video Type (youtube or vimeo)
     *
     * @access	public
     * @return	string	video type
     */
    public function get_video_type() {
        return $this->_video_type;
    }
    /**
     * Return url of video
     *
     * @access	public
     * @return	string	video url
     */
    public function get_video_url()
    {
        if(!SELF::verifyValidID()) { return FALSE; }
        $id = SELF::get_video_id();
        if($this->_video_type == 'youtube') {
            return 'https://www.youtube.com/watch?v=' . $id;
        } else if($this->_video_type == 'vimeo') {
            return 'https://vimeo.com/' . $id;
        }
    }
    /**
     * Return embed url of video
     *
     * @access	public
     * @return	string	video embed url
     */
    public function get_video_embed_url()
    {
        if(!SELF::verifyValidID()) { return FALSE; }
        $id = SELF::get_video_id();
        if($this->_video_type == 'youtube') {
            return 'http://www.youtube.com/embed/' . $id . '/';
        } else if($this->_video_type == 'vimeo') {
            return 'http://player.vimeo.com/video/' . $id . '?color=ffffff';
        }
    }
    /**
     * Return Video HTML embed code
     *
     * @access	public
     * @param	number	width
     * @param	number	height
     * @return	string	html code
     */
    public function get_embed_video($width = 500, $height = 280)
    {
        if(!SELF::verifyValidID()) { return FALSE; }
        $id = SELF::get_video_id();
        if($this->_video_type == 'youtube') {
            return '<iframe width="' . $width . '" height="' . $height . '" src="http://www.youtube.com/embed/' . $id . '/" frameborder="0" allowfullscreen></iframe>';
        } else if($this->_video_type == 'vimeo') {
            return '<iframe src="http://player.vimeo.com/video/' . $id . '?color=ffffff" width="' . $width . '" height="' . $height . '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
        }
    }
    /**
     * Return Video thumbs
     *
     * @access	public
     * @return	array	thumbs
     */
    public function get_thumbs()
    {
        if(!SELF::verifyValidID()) { return FALSE; }

        $id = SELF::get_video_id();
        if($this->_video_type == 'youtube') {
            return array(
                'default' => 'http://img.youtube.com/vi/' . $id . '/default.jpg',
                '0' => 'http://img.youtube.com/vi/' . $id . '/0.jpg',
                '1' => 'http://img.youtube.com/vi/' . $id . '/1.jpg',
                '2' => 'http://img.youtube.com/vi/' . $id . '/2.jpg',
                '3' => 'http://img.youtube.com/vi/' . $id . '/3.jpg'
            );
        } else if($this->_video_type == 'vimeo') {
            $hash = json_decode(file_get_contents('http://vimeo.com/api/v2/video/' . $id . '.json'));
            return array(
                '0' => $hash[0]->thumbnail_small,
                '1' => $hash[0]->thumbnail_medium,
                '2' => $hash[0]->thumbnail_large,
                '3' => str_replace("_640.jpg", "_1280.jpg", $hash[0]->thumbnail_large)
            );
        }
    }
    /**
     * Return Video info
     *
     * @access	public
     * @return	array	info
     */
    public function get_video_info()
    {
        if(!SELF::verifyValidID()) { return FALSE; }
        $id = SEFL::get_video_id();
        if($this->_video_type == 'youtube') {
            $video_info = json_decode(file_get_contents('https://gdata.youtube.com/feeds/api/videos/' . $id . '?v=2&alt=json'));
            $info = $video_info->entry;
            return array(
                'title'         => (isset($info->{'media$group'}->{'media$title'}->{'$t'})) ? $info->{'media$group'}->{'media$title'}->{'$t'} : null,
                'description'   => (isset($info->{'media$group'}->{'media$description'}->{'$t'})) ? $info->{'media$group'}->{'media$description'}->{'$t'} : null,
                'author'        => (isset($info->{'media$group'}->{'media$credit'}[0]->{'yt$display'})) ? $info->{'media$group'}->{'media$credit'}[0]->{'yt$display'} : null,
                'mobile_url'    => 'http://m.youtube.com/watch?v=' . $id,
                'short_url'     => 'http://youtu.be/' . $id,
                'category'      => (isset($info->{'media$group'}->{'media$category'}[0]->label)) ? $info->{'media$group'}->{'media$category'}[0]->label : null,
                'duration'      => (isset($info->{'media$group'}->{'yt$duration'}->seconds)) ? $info->{'media$group'}->{'yt$duration'}->seconds : null,
                'likes'         => (isset($info->{'yt$rating'}->numLikes)) ? $info->{'yt$rating'}->numLikes : null,
                'dislikes'      => (isset($info->{'yt$rating'}->numDislikes)) ? $info->{'yt$rating'}->numDislikes : null,
                'favoriteCount' => (isset($info->{'yt$statistics'}->favoriteCount)) ? $info->{'yt$statistics'}->favoriteCount : null,
                'viewCount'     => (isset($info->{'yt$statistics'}->viewCount)) ? $info->{'yt$statistics'}->viewCount : null,
                'commentsCount' => (isset($info->{'gd$comments'}->{'gd$feedLink'}->countHint)) ? $info->{'gd$comments'}->{'gd$feedLink'}->countHint : null,
                'rating'        => (isset($info->{'gd$rating'}->average)) ? $info->{'gd$rating'}->average : null
            );
        } else if($this->_video_type == 'vimeo') {
            $info = json_decode(file_get_contents('http://vimeo.com/api/v2/video/' . $id . '.json'));
            return array(
                'title'                    => (isset($info[0]->title)) ? $info[0]->title : null,
                'description'              => (isset($info[0]->description)) ? $info[0]->description : null,
                'user_name'                => (isset($info[0]->user_name)) ? $info[0]->user_name : null,
                'user_url'                 => (isset($info[0]->user_url)) ? $info[0]->user_url : null,
                'mobile_url'               => (isset($info[0]->mobile_url)) ? $info[0]->mobile_url : null,
                'stats_number_of_likes'    => (isset($info[0]->stats_number_of_likes)) ? $info[0]->stats_number_of_likes : null,
                'stats_number_of_plays'    => (isset($info[0]->stats_number_of_plays)) ? $info[0]->stats_number_of_plays : null,
                'stats_number_of_comments' => (isset($info[0]->stats_number_of_comments)) ? $info[0]->stats_number_of_comments : null,
                'duration'                 => (isset($info[0]->duration)) ? $info[0]->duration : null,
                'tags'                     => (isset($info[0]->tags)) ? $info[0]->tags : null
            );
        }
    }
    /**
     * Get YouTube ID
     *
     * @access	private
     * @param	string	url
     * @return	string	Video ID
     */
    private function get_youtube_id( $url)
    {
        if ( $url == '' ) { return FALSE; }
        if (!SELF::isValidURL( $url )) { return FALSE; }
        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $matches);
        if(!$matches) { return FALSE; }
        if ( !SELF::isValidID( $matches[0] )) {
            return FALSE;
        } else{
            return $matches[0];
        }
    }
    /**
     * Get Vimeo ID
     *
     * @access	private
     * @param	st"ring	url
     * @return	string	Video ID
     */
    private function get_vimeo_id( $url)
    {
        if ( $url == '' ) { return 'FALSE'; }
      
        $var = SELF::isValidURL( $url );
        if ($var) {
            sscanf(parse_url($url, PHP_URL_PATH), '/%d', $vimeo_id);
        } else {
            $vimeo_id = $url;
        }
    
        return (SELF::isValidID($vimeo_id,TRUE)) ? $vimeo_id : FALSE;
    }
    /**
     * Verifies if the Video URL is valid
     *
     * @access	private
     * @param	string	url
     * @return	boolean
     */
    private function isValidURL($url)
    {
        return preg_match('/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:.[A-Z0-9][A-Z0-9_-]*)+):?(d+)?/i', $url);
    }
    /**
     * Verifies if the Video URL is valid
     *
     * @access	private
     * @param	string	id
     * @param	boolean	vimeo
     * @return	boolean
     */
    private function isValidID($id, $vimeo)
    {
        if ($vimeo)
            $headers = get_headers('http://vimeo.com/' . $id);
        else
            $headers = get_headers('http://gdata.youtube.com/feeds/api/videos/' . $id);
        if (!strpos($headers[0], '200')) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    /**
     * Verifies if the saved Video ID is valid
     *
     * @access	private
     * @return	string	id
     */
    private function verifyValidID() {
        $type = ($this->_video_type == 'vimeo') ? TRUE : FALSE;
        $id = (SELF::isValidID(SELF::get_video_id(), $type)) ? SELF::get_video_id() : FALSE;
        return $id;
    }


   public function reunioes() {
        if (!$this->input->is_ajax_request()) {
            exit('no valid req.');
        }
        $id = $_REQUEST['id_candidato'];
        echo '<script>alert('. $id .')</script>';
            $this->load->model('candidato/candidato');
            $dados = [
                        'id_candidato' => $_REQUEST['id_candidato'],
                        'dataReuniao' => $_REQUEST['dataReuniao'],
                        'horario' => $_REQUEST['horario'],
                        'mensagem' => $_REQUEST['mensagem'],
                        'id_empresa' => $_REQUEST['id_empresa']
                     ];

            $operacao = $this->candidato->insertReuniao($dados);
            echo $operacao[0]->id_candidato;
      
    }
    


}



<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');

class Watch extends CI_Controller {

    public function __construct() {
        Parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
        //header("access-control-allow-origin: https://sandbox.pagseguro.uol.com.br");
        header('Access-Control-Allow-Origin: *');
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



                // ############# PORTE DO CANDIDATO   ###############################




        } else if($this->session->userdata('email_candidato') AND $this->session->userdata('conta_status_candidato')) {
           
            $this->load->model('candidato/candidato');
            $cursos = $this->candidato->listaCurso();
            $dados = $this->candidato->verificaEmail($this->session->userdata('email_candidato'));
            
            $Ids_empresas = $this->candidato->empresasAprovacoes($dados[0]->id_candidato);
            $separa_valores = [];
            for ($x = 0; $x < count($Ids_empresas); $x++) {
                if (is_numeric(addslashes(htmlentities(utf8_decode(trim( $Ids_empresas[$x]->id_empresa)))))) {
                    $separa_valores[] = addslashes(htmlentities(utf8_decode(trim($Ids_empresas[$x]->id_empresa))));
                }
            }

            $empresaAprovei = $this->candidato->empresasSelecoes($separa_valores);
            if ($empresaAprovei) {
                $result = array();
                $i = 0;
                foreach ($empresaAprovei as $empresaSelecionadosValue) {
                    $reuniao = $this->candidato->pegaReuniao($empresaSelecionadosValue->id_empresa, $dados[0]->id_candidato);
                    $empresa = array (  'reuniao'  => $reuniao ); 
                    $i++; 
                    $result['carga'][$i] =  $empresa;

                }
                $this->load->view('candidato/conferencingCan', [ 'result' => $result, 'dados' => $dados, 'empresaAprovei' => $empresaAprovei] );
           
            } 

        } else {
            redirect('');
        }
    }


   public function formulario(){
     $this->load->view('v/email/index');

   }

}



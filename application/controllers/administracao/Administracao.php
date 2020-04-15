<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Administracao extends CI_Controller {

    public function __construct() {
        Parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index() {
        //verifica se existe usuario logado, se JÁ EXISTIR move ele pro painel
        if ($this->session->userdata('email_administracao') && $this->session->userdata('conta_status_administracao')) {
            redirect('administracao/administracao/logado');
        }else {
            redirect(base_url());
        }
    }

    public function apaga_adm() {

        //verifica se existe usuario logado, se JÁ EXISTIR move ele pro painel
        if (!$this->session->userdata('email_administracao') && !$this->session->userdata('conta_status_administracao')) {
            redirect('administracao/administracao/');
        }

        $this->load->model('administracao/administracaoModel');
        if (is_numeric($this->uri->segment(4)) && $this->administracaoModel->pegaDadosAdmLogado($this->session->userdata('email_administracao'))[0]->acesso == 1) {

            $verificaADM = $this->administracaoModel->verificaADM($this->uri->segment(4));
            $contaADM = $this->administracaoModel->contaADM(); //conta quantos administradores com acesso total existem
            //verifica se existe o ADM com o id informado
            if (count($verificaADM) >= 1) {

                //verifica se ele é o último ADM com acesso total, caso seja, então exibe mensagem de que é necessario deixar pelo menos um ADM com acesso total ao sistema
                if (count($contaADM) == 1 AND $verificaADM[0]->acesso == 1) {

                    $this->session->set_flashdata('msg', '<div class="alert alert-warning"><div class="container"><div class="col-12"><strong>Administrador não apagado!</strong><br> É necessário a existência de pelo menos um administrador com privilégios "geral".</div></div></div>');
                    redirect('administracao/administracao/logado/cadastro_adm');
                } else {

                    //apaga o administrador
                    $this->administracaoModel->apagaADM($this->uri->segment(4));
                    $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><div class="col-12"><strong>Administrador apagado!</strong><br> Administrador apago com sucesso.</div></div></div>');
                    redirect('administracao/administracao/logado/cadastro_adm');
                }
            }
        } else {

            redirect('administracao/administracao/logado');
        }
    }

    /* cadastra novo admin */

    public function cadastra_adm() {

        //verifica se existe usuario logado, se JÁ EXISTIR move ele pro painel
        if (!$this->session->userdata('email_administracao') && !$this->session->userdata('conta_status_administracao')) {
            redirect('administracao/administracao/');
        }

        $this->load->model('administracao/administracaoModel');

        if (count($this->input->post()) == 4) {

            $this->administracaoModel->cadastraADM([
                "nomeADM" => $this->input->post('nomeADM'),
                "emailADM" => $this->input->post('emailADM'),
                "senhaADM" => $this->input->post('senhaADM'),
                "acessoADM" => $this->input->post('acessoADM')
            ]);

            $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><div class="col-6"><strong>Cadastrado.</strong><br> Novo ADM cadastrado!</div></div></div>');

            redirect('administracao/administracao/logado/cadastro_adm');
        } else {


            redirect('administracao/administracao/logado/cadastro_adm');
        }
    }

    //pega dados do admin logado
    public function pegaDadosADM() {

        //verifica se existe usuario logado, se JÁ EXISTIR move ele pro painel
        if (!$this->session->userdata('email_administracao') && !$this->session->userdata('conta_status_administracao')) {
            redirect('administracao/administracao/');
        }

        $this->load->model('administracao/administracaoModel');
        return $this->administracaoModel->pegaDadosAdmLogado($this->session->userdata('email_administracao'));
    }

    //pega dados de todos os admin
    public function pegaADMs() {

        //verifica se existe usuario logado, se JÁ EXISTIR move ele pro painel
        if (!$this->session->userdata('email_administracao') && !$this->session->userdata('conta_status_administracao')) {
            redirect('administracao/administracao/');
        }

        $this->load->model('administracao/administracaoModel');
        return $this->administracaoModel->pegaADM();
    }

    public function pegacategoriasAcesso() {

        //verifica se existe usuario logado, se JÁ EXISTIR move ele pro painel
        if (!$this->session->userdata('email_administracao') && !$this->session->userdata('conta_status_administracao')) {
            redirect('administracao/administracao/');
        }

        $this->load->model('administracao/administracaoModel');
        return $this->administracaoModel->pegaAcesso();
    }

    // ADMINISTRAÇÃO DAS EMPRESAS ////////////////////////////////////////////////////////////////////////////////////////////////////////
    //pega todas as empresas
    public function empresas() {

        $this->load->model('administracao/administracaoModel');
        return $this->administracaoModel->pegaTodasEmpresas();
    }

    //pega todas as vagas
    public function vagas() {

        $this->load->model('administracao/administracaoModel');
        return $this->administracaoModel->pegaTodasVagas();
    }

    //pega todas as areas
    public function areas() {

        $this->load->model('administracao/administracaoModel');
        return $this->administracaoModel->pegaTodasAreas();
    }

    //função que estiliza os menus ativos
    public function menuAtivo($segmento, $link) {

        //verifica se existe usuario logado, se JÁ EXISTIR move ele pro painel
        if (!$this->session->userdata('email_administracao') && !$this->session->userdata('conta_status_administracao')) {
            redirect('administracao/administracao/');
        }

        if ($segmento == $link) {

            echo "style='color: #007bff !important'";
        }
    }

    //lista areas e quantidade de empresas cadastradas em cada uma delas
    public function areas_empresas_quantidade($vagas = null) {

        echo "<p>Áreas</p>";
        foreach (SELF::areas() as $listaAreaValue) {

            $quantidade = 0;

            //verifica se a solicitação é pra listar as areas com a quantidade de empresas em cada uma delas, ou se é pra listar as vagas com a quantidade delas em cada area
            if (is_null($vagas)) {
                foreach (SELF::empresas() as $quantidade_area) {

                    if ($quantidade_area->ramo == @$listaAreaValue->id) {

                        $quantidade += 1;
                    }
                }
            } else {

                //caso a solicitação seja para listar as areas com a quantidade de determinadas vagas em cada uma delas
                foreach ($vagas as $quantidade_area) {

                    if ($quantidade_area->area_curso == @$listaAreaValue->id) {

                        $quantidade += 1;
                    }
                }
            }

            $cor = $this->uri->segment(6) == $listaAreaValue->id ? 'color: #007bff !important' : 'color: #000;';
            $url = base_url('administracao/administracao/logado/empresasPage/' . $this->uri->segment(5) . '/' . $listaAreaValue->id);
            echo "<a href='" . $url . "' style='padding: 10px;background: #eee;" . $cor . "margin: 10px 1px' >" . $listaAreaValue->area_nome . " ( " . $quantidade . " )</a>";
        }
    }

    //profissionais/estagiarios/pcd (exibe o cargo e a quantidade de vagas contidas nele de acordo com a area)
    public function cargoVaga($vagas) {

        $analise = array_filter(SELF::areas(), function($area) {
            return $area->id == $this->uri->segment(6);
        });

        if (count($analise) >= 1) {
            echo "<p>Cargo</p>";

            $profissional = array_filter($vagas, function($vagas_) {
                return strtolower($vagas_->cargo) == strtolower('profissional') AND $this->uri->segment(6) == strtolower($vagas_->area_curso);
            });
            $estagiario = array_filter($vagas, function($vagas_) {
                return strtolower($vagas_->cargo) == strtolower('estagiario') AND $this->uri->segment(6) == strtolower($vagas_->area_curso);
            });
            $pcd = array_filter($vagas, function($vagas_) {
                return strtolower($vagas_->pcd) == strtolower('sim') AND $this->uri->segment(6) == strtolower($vagas_->area_curso);
                ;
            });

            $corProfissional = $this->uri->segment(7) == 'profissional' ? 'color: #007bff !important' : 'color: #000;';
            $corEstagiario = $this->uri->segment(7) == 'estagiario' ? 'color: #007bff !important' : 'color: #000;';
            $corPCD = $this->uri->segment(7) == 'pcd' ? 'color: #007bff !important' : 'color: #000;';

            $url = base_url('administracao/administracao/logado/empresasPage/' . $this->uri->segment(5) . '/' . $this->uri->segment(6));

            echo "<a href='" . $url . "/profissional' style='padding: 10px;background: #eee;" . $corProfissional . "margin: 10px 1px' > Profissional ( " . count($profissional) . " )</a>";
            echo "<a href='" . $url . "/estagiario' style='padding: 10px;background: #eee;" . $corEstagiario . "margin: 10px 1px' > Estagiario ( " . count($estagiario) . " )</a>";
            echo "<a href='" . $url . "/pcd' style='padding: 10px;background: #eee;" . $corPCD . "margin: 10px 1px' > PCD ( " . count($pcd) . " )</a>";
        }
    }

    //lista as empresas de acordo com a area
    public function listaEmpresasPorArea() {

        //verifica se area existe
        $verificaArea = array_filter(SELF::areas(), function($listaArea_) {
            return $listaArea_->id == $this->uri->segment(6);
        });

        if ($this->uri->segment(5) == 'empresas' AND count($verificaArea) >= 1 AND count(SELF::empresas()) >= 1) {


            $cargoEmpresa = array_filter(SELF::empresas(), function($analise_) {
                return $analise_->ramo == $this->uri->segment(6);
            });


            $url = base_url('administracao/administracao/logado/empresasPage/analise/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/');

            if (isset($cargoEmpresa) AND count($cargoEmpresa) >= 1) {

                return $cargoEmpresa;
            }
        } else {
            return false;
        }
    }

    //lista as vagas de acordo com a area
    public function listaVagasPorArea() {

        //verifica se area existe
        $verificaArea = array_filter(SELF::areas(), function($listaArea_) {
            return $listaArea_->id == $this->uri->segment(6);
        });

        //verifica se é pra listar as vagas aprovadas ou as vagas em analise
        $tipo_de_vagas = null;
        if ($this->uri->segment(5) == 'vagas_inscritas') {

            $tipo_de_vagas = 2;
        } elseif ($this->uri->segment(5) == 'vagas_analise') {

            $tipo_de_vagas = 1;
        }
        if (!is_null($tipo_de_vagas) AND count($verificaArea) >= 1 AND count(SELF::empresas()) >= 1 AND $this->uri->segment(7)) {


            if ($this->uri->segment(7) == 'pcd') {

                $cargoEmpresa = [];
                foreach (SELF::vagas() as $key => $vagasValue) {

                    if ($vagasValue->area_curso == $this->uri->segment(6) AND $vagasValue->pcd == 'sim' AND $vagasValue->status_vaga == $tipo_de_vagas) {

                        if (!isset($cargoEmpresa['empresa'][$vagasValue->id_empresa])) {

                            $cargoEmpresa['empresa'][$vagasValue->id_empresa] = $vagasValue;
                            $cargoEmpresa['quantidade'][$vagasValue->id_empresa] = 1;
                        } else {

                            $cargoEmpresa['quantidade'][$vagasValue->id_empresa] += 1;
                        }
                    }
                }
            } elseif ($this->uri->segment(7) == 'estagiario') {

                $cargoEmpresa = [];
                foreach (SELF::vagas() as $key => $vagasValue) {

                    if ($vagasValue->area_curso == $this->uri->segment(6) AND $vagasValue->cargo == 'estagiario' AND $vagasValue->status_vaga == $tipo_de_vagas) {

                        if (!isset($cargoEmpresa['empresa'][$vagasValue->id_empresa])) {

                            $cargoEmpresa['empresa'][$vagasValue->id_empresa] = $vagasValue;
                            $cargoEmpresa['quantidade'][$vagasValue->id_empresa] = 1;
                        } else {

                            $cargoEmpresa['quantidade'][$vagasValue->id_empresa] += 1;
                        }
                    }
                }
            } elseif ($this->uri->segment(7) == 'profissional') {


                $cargoEmpresa = [];
                foreach (SELF::vagas() as $key => $vagasValue) {

                    if ($vagasValue->area_curso == $this->uri->segment(6) AND $vagasValue->cargo == 'profissional' AND $vagasValue->status_vaga == $tipo_de_vagas) {

                        if (!isset($cargoEmpresa['empresa'][$vagasValue->id_empresa])) {

                            $cargoEmpresa['empresa'][$vagasValue->id_empresa] = $vagasValue;
                            $cargoEmpresa['quantidade'][$vagasValue->id_empresa] = 1;
                        } else {

                            $cargoEmpresa['quantidade'][$vagasValue->id_empresa] += 1;
                        }
                    }
                }
            }

            $url = base_url('administracao/administracao/logado/empresasPage/analise/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/');

            if (isset($cargoEmpresa) AND count($cargoEmpresa) >= 1) {

                return $cargoEmpresa;
            }
        }
    }

    //lista vagas da empresa
    public function listaVagasDaEmpresa() {

        //verifica se area existe
        $verificaArea = array_filter(SELF::areas(), function($listaArea_) {
            return $listaArea_->id == $this->uri->segment(6);
        });

        if ($this->uri->segment(5) AND is_numeric($this->uri->segment(6)) AND $this->uri->segment(7) AND is_numeric($this->uri->segment(8)) AND count($verificaArea) >= 1 AND count(SELF::empresas()) >= 1) {

            $vagas_criadas_empresa = array_filter(SELF::vagas(), function($vagas_) {

                //determina se foi solicitado a listagem de vagas para profissionais, estagiarios ou pcd
                if ($this->uri->segment(7) == 'profissional') {

                    if ($this->uri->segment(5) == 'vagas_inscritas') {

                        return $vagas_->empresa_id == $this->uri->segment(8) AND $vagas_->ramo == $this->uri->segment(6) AND $vagas_->cargo == 'profissional' AND $vagas_->status_vaga == 2;
                    } elseif ($this->uri->segment(5) == 'vagas_analise') {

                        return $vagas_->empresa_id == $this->uri->segment(8) AND $vagas_->ramo == $this->uri->segment(6) AND $vagas_->cargo == 'profissional' AND $vagas_->status_vaga == 1;
                    }
                } elseif ($this->uri->segment(7) == 'estagiario') {

                    if ($this->uri->segment(5) == 'vagas_inscritas') {

                        return $vagas_->empresa_id == $this->uri->segment(8) AND $vagas_->ramo == $this->uri->segment(6) AND $vagas_->cargo == 'estagiario' AND $vagas_->status_vaga == 2;
                    } elseif ($this->uri->segment(5) == 'vagas_analise') {

                        return $vagas_->empresa_id == $this->uri->segment(8) AND $vagas_->ramo == $this->uri->segment(6) AND $vagas_->cargo == 'estagiario' AND $vagas_->status_vaga == 1;
                    }
                } elseif ($this->uri->segment(7) == 'pcd') {

                    if ($this->uri->segment(5) == 'vagas_inscritas') {

                        return $vagas_->empresa_id == $this->uri->segment(8) AND $vagas_->pcd == 'sim' AND $vagas_->status_vaga == 2;
                    } elseif ($this->uri->segment(5) == 'vagas_analise') {

                        return $vagas_->empresa_id == $this->uri->segment(8) AND $vagas_->pcd == 'sim' AND $vagas_->status_vaga == 1;
                    }
                }
            });

            if (isset($vagas_criadas_empresa) AND count($vagas_criadas_empresa) >= 1) {

                return $vagas_criadas_empresa;
            }
        } else {
            return false;
        }
    }

    //lista detalhes da empresa
    public function listaDetalhesEmpresa() {

        //verifica se area existe
        $verificaArea = array_filter(SELF::areas(), function($listaArea_) {
            return $listaArea_->id == $this->uri->segment(6);
        });

        if ($this->uri->segment(5) == 'empresas' AND is_numeric($this->uri->segment(6)) AND $this->uri->segment(7) == 'detalhes' AND is_numeric($this->uri->segment(8)) AND count($verificaArea) >= 1 AND count(SELF::empresas()) >= 1) {

            $cargoEmpresa = array_filter(SELF::empresas(), function($analise_) {
                return $analise_->ramo == $this->uri->segment(6) AND $analise_->id_empresa == $this->uri->segment(8);
            });
            $vagas_criadas_empresa = array_filter(SELF::vagas(), function($vagas_) {
                return $vagas_->empresa_id == $this->uri->segment(8);
            });

            if (isset($cargoEmpresa) AND count($cargoEmpresa) >= 1) {

                //$dados['vagas_criadas_empresa'] = $vagas_criadas_empresa; funciona, mas desabilitei por enquanto
                return $cargoEmpresa;
            }
        } else {
            return false;
        }
    }

    //ADMINISTRAÇÃO DOS CANDIDATOS //////////////////////////////////////////////////////////////////////////////////////////////////
    //profissionais/estagiarios/pcd (exibe o cargo e a quantidade de candidatos contidos nele de acordo com a area)
    public function cargo($tipo, $candidatos) {

        $analise = array_filter($tipo, function($tipo_) {
            return $tipo_->id == $this->uri->segment(6);
        });

        if (count($analise) >= 1) {
            echo "<p>Cargo</p>";

            $profissional = array_filter($candidatos, function($candidatos_) {
                return strtolower($candidatos_->situacao_curso) == strtolower('concluido') AND strtolower($candidatos_->id_area) == $this->uri->segment(6);
            });
            $estagiario = array_filter($candidatos, function($candidatos_) {
                return strtolower($candidatos_->situacao_curso) == strtolower('Em andamento') AND strtolower($candidatos_->id_area) == $this->uri->segment(6);
            });
            $pcd = array_filter($candidatos, function($candidatos_) {
                return strtolower($candidatos_->pcd) == strtolower('sim') AND strtolower($candidatos_->id_area) == $this->uri->segment(6);
            });

            $corProfissional = $this->uri->segment(7) == 'profissional' ? 'color: #007bff !important' : 'color: #000;';
            $corEstagiario = $this->uri->segment(7) == 'estagiario' ? 'color: #007bff !important' : 'color: #000;';
            $corPCD = $this->uri->segment(7) == 'pcd' ? 'color: #007bff !important' : 'color: #000;';

            $url = base_url('administracao/administracao/logado/candidatosPage/' . $this->uri->segment(5) . '/' . $this->uri->segment(6));

            echo "<a href='" . $url . "/profissional' style='padding: 10px;background: #eee;" . $corProfissional . "margin: 10px 1px' > Profissional ( " . count($profissional) . " )</a>";
            echo "<a href='" . $url . "/estagiario' style='padding: 10px;background: #eee;" . $corEstagiario . "margin: 10px 1px' > Estagiario ( " . count($estagiario) . " )</a>";
            echo "<a href='" . $url . "/pcd' style='padding: 10px;background: #eee;" . $corPCD . "margin: 10px 1px' > PCD ( " . count($pcd) . " )</a>";
        }
    }

    //Verifica quantidade de candidatos cadastrados em cada area
    public function quantidade_candidato_area($listaTodosCandidatos, $listaArea, $status) {

        echo "<p>Áreas</p>";
        foreach ($listaArea as $listaAreaValue) {

            $quantidade = 0;
            foreach ($listaTodosCandidatos as $candidatos_quantidade_area) {

                if ($candidatos_quantidade_area->id_area == @$listaAreaValue->id AND $candidatos_quantidade_area->status == $status) {

                    $quantidade += 1;
                }
            }

            $cor = $this->uri->segment(6) == $listaAreaValue->id ? 'color: #007bff !important' : 'color: #000;';
            $url = base_url('administracao/administracao/logado/candidatosPage/' . $this->uri->segment(5) . '/' . $listaAreaValue->id);
            echo "<a href='" . $url . "' style='padding: 10px;background: #eee;" . $cor . "margin: 10px 1px' >" . $listaAreaValue->area_nome . " ( " . $quantidade . " )</a>";
        }
    }

    //lista detalhes do candidato
    public function listaDetalhesCandidato() {

        //verifica se area existe
        $verificaArea = array_filter(SELF::areas(), function($listaArea_) {
            return $listaArea_->id == $this->uri->segment(6);
        });
        $tipos_status = ['aprovados', 'reprovados', 'analise'];

        if (in_array($this->uri->segment(5), $tipos_status) AND is_numeric($this->uri->segment(6)) AND $this->uri->segment(7) AND is_numeric($this->uri->segment(8)) AND count($verificaArea) >= 1) {



            if ($this->uri->segment(5) == 'aprovados') { //detalhes dos candidatos aprovados
                if ($this->uri->segment(7) == 'profissional') {

                    $detalhesCandidato = array_filter(SELF::listaTodosCandidatos(), function($candidato_) {

                        return $candidato_->id_area == $this->uri->segment(6) AND $candidato_->id_candidato == $this->uri->segment(8) AND $candidato_->status == 2 AND strtolower($candidato_->situacao_curso) == 'concluido';
                    });
                } elseif ($this->uri->segment(7) == 'estagiario') {

                    $detalhesCandidato = array_filter(SELF::listaTodosCandidatos(), function($candidato_) {

                        return $candidato_->id_area == $this->uri->segment(6) AND $candidato_->id_candidato == $this->uri->segment(8) AND $candidato_->status == 2 AND strtolower($candidato_->situacao_curso) == 'em andamento';
                    });
                } elseif ($this->uri->segment(7) == 'pcd') {

                    $detalhesCandidato = array_filter(SELF::listaTodosCandidatos(), function($candidato_) {

                        return $candidato_->id_area == $this->uri->segment(6) AND $candidato_->id_candidato == $this->uri->segment(8) AND $candidato_->status == 2 AND strtolower($candidato_->pcd) == 'sim';
                    });
                }
            } elseif ($this->uri->segment(5) == 'reprovados') { //candidatos reprovados
                if ($this->uri->segment(7) == 'profissional') {

                    $detalhesCandidato = array_filter(SELF::listaTodosCandidatos(), function($candidato_) {

                        return $candidato_->id_area == $this->uri->segment(6) AND $candidato_->id_candidato == $this->uri->segment(8) AND $candidato_->status == 3 AND strtolower($candidato_->situacao_curso) == 'concluido';
                    });
                } elseif ($this->uri->segment(7) == 'estagiario') {

                    $detalhesCandidato = array_filter(SELF::listaTodosCandidatos(), function($candidato_) {

                        return $candidato_->id_area == $this->uri->segment(6) AND $candidato_->id_candidato == $this->uri->segment(8) AND $candidato_->status == 3 AND strtolower($candidato_->situacao_curso) == 'em andamento';
                    });
                } elseif ($this->uri->segment(7) == 'pcd') {

                    $detalhesCandidato = array_filter(SELF::listaTodosCandidatos(), function($candidato_) {

                        return $candidato_->id_area == $this->uri->segment(6) AND $candidato_->id_candidato == $this->uri->segment(8) AND $candidato_->status == 3 AND strtolower($candidato_->pcd) == 'sim';
                    });
                }
            } elseif ($this->uri->segment(5) == 'analise') { //candidatos em analise
                if ($this->uri->segment(7) == 'profissional') {

                    $detalhesCandidato = array_filter(SELF::listaTodosCandidatos(), function($candidato_) {

                        return $candidato_->id_area == $this->uri->segment(6) AND $candidato_->id_candidato == $this->uri->segment(8) AND $candidato_->status == 1 AND strtolower($candidato_->situacao_curso) == 'concluido';
                    });
                } elseif ($this->uri->segment(7) == 'estagiario') {

                    $detalhesCandidato = array_filter(SELF::listaTodosCandidatos(), function($candidato_) {

                        return $candidato_->id_area == $this->uri->segment(6) AND $candidato_->id_candidato == $this->uri->segment(8) AND $candidato_->status == 1 AND strtolower($candidato_->situacao_curso) == 'em andamento';
                    });
                } elseif ($this->uri->segment(7) == 'pcd') {

                    $detalhesCandidato = array_filter(SELF::listaTodosCandidatos(), function($candidato_) {

                        return $candidato_->id_area == $this->uri->segment(6) AND $candidato_->id_candidato == $this->uri->segment(8) AND $candidato_->status == 1 AND strtolower($candidato_->pcd) == 'sim';
                    });
                }
            }

            if (isset($detalhesCandidato) AND count($detalhesCandidato) >= 1) {

                return $detalhesCandidato;
            }
        } else {
            return false;
        }
    }

    //candidatos para aprovação (ANALISE)
    public function auditar($listaArea, $analise) {

        //verifica se area existe
        $verificaArea = array_filter($listaArea, function($listaArea_) {
            return $listaArea_->id == $this->uri->segment(6);
        });

        if ($this->uri->segment(5) == 'analise' AND count($verificaArea) >= 1 AND count($analise) >= 1) {

            echo '<div class="col-3 bloco_lista">';
            echo "<p>Em Analise</p>";

            if (strtolower($this->uri->segment(7)) == strtolower('profissional')) { //se o curso tiver concluido, então é listado como profissional
                $cargoCandidato = array_filter($analise, function($analise_) {
                    return strtolower($analise_->situacao_curso) == strtolower('concluido') AND $analise_->id_area == $this->uri->segment(6);
                });
            } elseif (strtolower($this->uri->segment(7)) == strtolower('estagiario')) { //se o curso tiver em andamento, então é listado como estagiario
                $cargoCandidato = array_filter($analise, function($analise_) {
                    return strtolower($analise_->situacao_curso) == strtolower('em andamento') AND $analise_->id_area == $this->uri->segment(6);
                });
            } elseif (strtolower($this->uri->segment(7)) == strtolower('pcd')) { //se o candidato tiver pcd
                $cargoCandidato = array_filter($analise, function($analise_) {
                    return strtolower($analise_->pcd) == strtolower('sim') AND $analise_->id_area == $this->uri->segment(6);
                });
            }

            $url = base_url('administracao/administracao/logado/candidatosPage/analise/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/');

            if (isset($cargoCandidato) AND count($cargoCandidato) >= 1) {

                foreach ($cargoCandidato as $cargoCandidato_) {

                    echo '<a href="' . $url . $cargoCandidato_->id_candidato . '" class="btn col-12 bloco_lista_link text-left">';
                    echo $cargoCandidato_->nome;
                    echo '<span class="bg-success text-white btn">Auditar';
                    echo '</span>';
                    echo '</a>';
                }
                echo '</div>';
            }

            return true;
        }
    }

    //listagem dos candidatos
    public function candidatosLista() {

        //verifica se area existe
        $verificaArea = array_filter(SELF::areas(), function($listaArea_) {
            return $listaArea_->id == $this->uri->segment(6);
        });

        //verifica se a solicitação é para listagem de candidatos aprovados, reprovados ou em analise
        $tipos_status = ['aprovados', 'reprovados', 'analise'];
        $status_candidato = null;
        if ($this->uri->segment(5) == 'aprovados') {

            $status_candidato = 2;
        } elseif ($this->uri->segment(5) == 'reprovados') {

            $status_candidato = 3;
        } elseif ($this->uri->segment(5) == 'analise') {

            $status_candidato = 1;
        }


        if (in_array($this->uri->segment(5), $tipos_status) AND count($verificaArea) >= 1) {

            if (strtolower($this->uri->segment(7)) == strtolower('profissional')) { //se o curso tiver concluido, então é listado como profissional
                $cargoCandidato = array_filter(SELF::listaTodosCandidatos(), function($candidatos_) use ($status_candidato) {

                    return strtolower($candidatos_->situacao_curso) == strtolower('concluido') AND $candidatos_->id_area == $this->uri->segment(6) AND $candidatos_->status == $status_candidato;
                });
            } elseif (strtolower($this->uri->segment(7)) == strtolower('estagiario')) { //se o curso tiver em andamento, então é listado como estagiario
                $cargoCandidato = array_filter(SELF::listaTodosCandidatos(), function($candidatos_) use ($status_candidato) {

                    return strtolower($candidatos_->situacao_curso) == strtolower('em andamento') AND $candidatos_->id_area == $this->uri->segment(6) AND $candidatos_->status == $status_candidato;
                });
            } elseif (strtolower($this->uri->segment(7)) == strtolower('pcd')) { //se o candidato tiver pcd
                $cargoCandidato = array_filter(SELF::listaTodosCandidatos(), function($candidatos_) use ($status_candidato) {

                    return strtolower($candidatos_->pcd) == strtolower('sim') AND $candidatos_->id_area == $this->uri->segment(6) AND $candidatos_->status == $status_candidato;
                });
            }

            if (isset($cargoCandidato) AND count($cargoCandidato) >= 1) {

                return $cargoCandidato;
            }
        } else {

            return false;
        }
    }

    public function logado() {

        //verifica se existe usuario logado, se JÁ EXISTIR move ele pro painel
        if (!$this->session->userdata('email_administracao') && !$this->session->userdata('senha_administracao') && !$this->session->userdata('conta_status_administracao')) {
            redirect('administracao/administracao/');
        }

        $this->load->model('administracao/administracaoModel');


//CANDIDATO
        $this->load->model('candidato/candidato');
//lista candidatos ainda não aceitos
        $candidatos = $this->candidato->listarCandidatosAprovacao();
        $candidatosAprovados = $this->candidato->listarCandidatosAprovados(); //lista todos os candidatos que já foram aprovados
//verifica se a pagina é candidatos e se existe algum parametro no segmento 5 esperando uma ação
        if ($this->uri->segment(4) == 'candidatosPage' AND $this->uri->segment(5) == 'analise' AND $this->uri->segment(6) != '' AND $this->uri->segment(7) != '' AND $this->uri->segment(8) != '') {
//enviar o id do candidato que esta contido no segmento 8 e verifica se ele existe
            $candidatoDados = $this->candidato->listarCandidato(addslashes(htmlentities(utf8_decode(trim($this->uri->segment(8))))));
            if (count($candidatoDados) == 1) {
//se o candidato existir, então verifica se existe algo no segmento 6 e se ele é igual a "sim", caso seja, o candidato será aceito
                if ($this->uri->segment(9) == 'sim') {
                    foreach ($candidatoDados as $value) {
                        $this->candidato->candidatoAceito($value->id_candidato, $value->video_nome);
//envia email notificando que o candidato foi aceito
                        $msg = "Olá <string>" . $value->nome . "</string>.<br>" . "Estamos enviando esse email para notifica-ló de que seu cadastro foi aceito. Desejamos boa sorte com seu futuro emprego!.";
                        SELF::enviaEmailStatusCandidato($value->email, $msg);
                        redirect(base_url('administracao/administracao/logado/candidatosPage/analise/' . $this->uri->segment(6) . '/' . $this->uri->segment(7)));
                    }
//se o candidato existir, então verifica se existe algo no segmento 6 e se ele é igual a "nao", caso seja, o candidato será recusado
                } elseif ($this->uri->segment(9) == 'nao') {

                    foreach ($candidatoDados as $value) {

//envia email notificando que o candidato foi rejeitado
                        $msg = "Olá <string>" . $value->nome . "</string>.<br>" . "Estamos enviando esse email para notifica-ló de que seu cadastro foi rejeitado. Pedimos para que faça um novo cadastro, utilize dados verdadeiros e que estejam de acordo com as normas do site!.";
                        SELF::enviaEmailStatusCandidato($value->email, $msg);
                        $this->candidato->candidatoRecusado($value->id_candidato, $value->video_nome);
                        redirect(base_url('administracao/administracao/logado/candidatosPage/analise/' . $this->uri->segment(6) . '/' . $this->uri->segment(7)));
                    }
                }
            }
        }
//VAGAS EMPRESA
        $this->load->model('empresa/logado');
//pega as areas/categorias
        $listaArea = $this->logado->listaArea();
//pega os cursos/subcategorias
        $listaCurso = $this->logado->listaCurso();
//lista planos fixos
        $listaPlanos = $this->administracaoModel->listaPlanos();
//lista planos avulsos
        $listaPlanosAvulsos = $this->administracaoModel->listaPlanosAvulsos();
//lista vagas ainda não aceitas
        $vagas = $this->logado->listaVagasAprovacao(1);




//////////////////////////////////////////////////////////////////////////////////////////
//verifica se existe solicitação de exclução de vaga
//se a vaga for aceita
        if ($this->uri->segment(4) == 'empresasPage' AND is_numeric($this->uri->segment(8)) AND $this->uri->segment(9) == 'aceitar' AND $this->uri->segment(10) == 'sim') {
            echo "string";
            //muda o status da vaga para 2, ou seja, a vaga fica aceita
            $this->logado->vagaAceita(addslashes(htmlentities(utf8_decode(trim($this->uri->segment(8))))), 2);
            redirect(base_url('administracao/administracao/logado/empresasPage/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8)));
        }

//se a vaga for recusada, então apaga-lá
        if ($this->uri->segment(4) == 'empresasPage' AND is_numeric($this->uri->segment(8)) AND $this->uri->segment(9) == 'apagar' AND $this->uri->segment(10) == 'sim') {

            //apaga a vaga e notifica a empresa
            $this->logado->vagaRejeitada(addslashes(htmlentities(utf8_decode(trim($this->uri->segment(8))))));
            redirect(base_url('administracao/administracao/logado/empresasPage/' . $this->uri->segment(5) . '/' . $this->uri->segment(6) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(8)));
        }
//////////////////////////////////////////////////////////////////////////////////////
//verifica se existe solicitação de exclução da empresa

        if ($this->input->post('apagaEmpresaMsg') AND $this->input->post('id_empresa_apaga')) {

            //verifica se empresa existe
            $verifica = array_filter(SELF::empresas(), function($verifica_) {
                return $verifica_->id_empresa == $this->input->post('id_empresa_apaga');
            });
            //se existir a empresa, então apaga
            if (count($verifica) >= 1) {

                //notifica a empresa
                $header = 'MIME-Version: 1.0' . "\r\n";
                $header .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
                $to = null;
                foreach ($verifica as $verifica_) {
                    $to = $verifica_->email;
                }
                $subject = "Sua conta foi encerrada";
                $message = $this->input->post('apagaEmpresaMsg');

                mail($to, $subject, $message, $header);

                //apaga a empresa e a notifica
                $this->administracaoModel->apagaEmpresa($this->input->post('id_empresa_apaga'), $verifica_->logo);
            }
        }

////////////////////////////////////////////////////////////////////////////////////
//verifica se existe solicitação de exclução de candidato
        if ($this->input->post('msg_candidato_acao') AND $this->input->post('id_candidato_acao')) {

            //verifica se empresa existe
            $verifica = array_filter(SELF::listaTodosCandidatos(), function($verifica_) {
                return $verifica_->id_candidato == $this->input->post('id_candidato_acao');
            });
            //se existir a empresa, então faça essa ação
            if (count($verifica) >= 1) {

                //notifica o candidato
                $header = 'MIME-Version: 1.0' . "\r\n";
                $header .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
                $to = null;
                foreach ($verifica as $verifica_) {
                    $to = $verifica_->email;
                }
                $subject = "Status da sua conta";
                $message = $this->input->post('msg_candidato_acao');

                mail($to, $subject, $message, $header);


                if ($this->input->post('apagaCandidato')) {

                    //apaga a empresa e a notifica
                    $this->candidato->apagaCandidato($this->input->post('id_candidato_acao'), $verifica_->video_nome, $verifica_->status, $verifica_->foto_candidato);
                } elseif ($this->input->post('recusaCandidato')) {

                    //altera o status do candidato para 3, quando ele logar ele poderá alterar os dados e tentar novamente uma aprovação
                    $this->candidato->candidatoRecusado($this->input->post('id_candidato_acao'));
                } elseif ($this->input->post('aceitaCandidato')) {

                    //aceita o candidato e o notifica
                    $this->candidato->candidatoAceito($this->input->post('id_candidato_acao'), $verifica_->video_nome);
                }
            }
//como o envio de mensagem não é obritatorio para aceitar um candidato, então verifica se existe uma solicitação para aceitar o candidato, e mesmo que o campo de mensgaem esteja vazio, aceita
        } elseif (!$this->input->post('msg_candidato_acao') AND $this->input->post('id_candidato_acao') AND $this->input->post('aceitaCandidato')) {


            //verifica se empresa existe
            $verifica = array_filter(SELF::listaTodosCandidatos(), function($verifica_) {
                return $verifica_->id_candidato == $this->input->post('id_candidato_acao');
            });
            //se existir a empresa, então faça essa ação
            if (count($verifica) >= 1) {

                //notifica o candidato
                $header = 'MIME-Version: 1.0' . "\r\n";
                $header .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
                $to = null;
                foreach ($verifica as $verifica_) {
                    $to = $verifica_->email;
                }
                $subject = "Status da sua conta";
                $message = 'Olá <strong>' . $verifica_->nome . '</strong>. <br> Seja bem vindo, sua conta foi aprovada!';

                mail($to, $subject, $message, $header);

                //aceita o candidato e o notifica
                $this->candidato->candidatoAceito($this->input->post('id_candidato_acao'), $verifica_->video_nome);
            }
        }






//se existir uma solicitação de cadastro de categoria
        if (!empty(trim($this->input->post('categoria')))) {
            if ($this->administracaoModel->cadastraCategoria(addslashes(htmlentities(trim($this->input->post('categoria')))))) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><strong>Área cadastrada.</strong><br> Área foi cadastrada com sucesso!</div></div>');
                redirect('administracao/administracao/logado/cadastra_categoria');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger"><div class="container"><div class="col-6 offset-3"><strong>Erro.</strong><br> Verifique os dados e tente novamente!</div></div></div>');
                redirect('administracao/administracao/logado/cadastra_categoria');
            }
        }

//se existir uma solicitação de cadastro de subcategoria
        if (!empty(trim($this->input->post('subcategoria'))) AND ! empty(trim($this->input->post('id_area')))) {
            if ($this->administracaoModel->cadastraSubCategoria(addslashes(htmlentities(trim($this->input->post('id_area')))), addslashes(htmlentities(trim($this->input->post('subcategoria')))))) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><strong>Curso cadastrado.</strong><br> Curso foi cadastrado com sucesso!</div></div>');
                redirect('administracao/administracao/logado/cadastra_subcategoria');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger"><div class="container"><div class="col-6 offset-3"><strong>Erro.</strong><br> Verifique os dados e tente novamente!</div></div></div>');
                redirect('administracao/administracao/logado/cadastra_subcategoria');
            }
        }

//se existir uma solicitação de cadastro de planos
        if (!empty(trim($this->input->post('planos'))) AND ! empty(trim($this->input->post('planos'))) == 'planos' AND ! empty(trim($this->input->post('nome'))) AND ! empty(trim($this->input->post('valor'))) AND ! empty(trim($this->input->post('limite')))) {
            if ($this->administracaoModel->cadastraPlano(addslashes(htmlentities(trim($this->input->post('nome')))), addslashes(htmlentities(trim($this->input->post('limite')))), addslashes(htmlentities(trim($this->input->post('valor')))))) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><strong>Plano cadastrado.</strong><br> Plano foi cadastrado com sucesso!</div></div>');
                redirect('administracao/administracao/logado/cadastra_planos');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger"><div class="container"><div class="col-6 offset-3"><strong>Erro.</strong><br> Verifique os dados e tente novamente!</div></div></div>');
                redirect('administracao/administracao/logado/cadastra_planos');
            }
        }

//deleta plano fixo
        if ($this->uri->segment(5) == 'excluir_plano_fixo' AND is_numeric($this->uri->segment(6))) {
//se excluir, exiba mensagem de sucesso
            if ($this->administracaoModel->deletaPlanos(addslashes(htmlentities(trim($this->uri->segment(6)))))) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><strong>Plano excluido.</strong><br> Plano foi excluido com sucesso!</div></div>');
                redirect('administracao/administracao/logado/cadastra_planos');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger"><div class="container"><strong>Erro.</strong><br> Verifique os dados e tente novamente!</div></div>');
                redirect('administracao/administracao/logado/cadastra_planos');
            }
        }

//deleta categoria
        if ($this->uri->segment(5) == 'excluir_area' AND is_numeric($this->uri->segment(6))) {
//se excluir, exiba mensagem de sucesso
            if ($this->administracaoModel->deletaCategoria(addslashes(htmlentities(trim($this->uri->segment(6)))))) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><strong>Área excluida.</strong><br> Área foi excluida com sucesso!</div></div>');
                redirect('administracao/administracao/logado/cadastra_categoria');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger"><div class="container"><strong>Erro.</strong><br> Verifique os dados e tente novamente!</div></div>');
                redirect('administracao/administracao/logado/cadastra_categoria');
            }
        }


//deleta subcategoria
        if ($this->uri->segment(5) == 'excluir_curso' AND is_numeric($this->uri->segment(6))) {
//se excluir, exiba mensagem de sucesso
            if ($this->administracaoModel->deletaSubCategoria(addslashes(htmlentities(trim($this->uri->segment(6)))))) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><strong>Curso excluido.</strong><br> Curso foi excluido com sucesso!</div></div>');
                redirect('administracao/administracao/logado/cadastra_subcategoria');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger"><div class="container"><strong>Erro.</strong><br> Verifique os dados e tente novamente!</div></div>');
                redirect('administracao/administracao/logado/cadastra_subcategoria');
            }
        }


//pega as informações e preenche os campos do plano fixo (caso seja solicitado edição)
        $plano_fixo_editar_preenche_campos = null; //recebe null pois ele só vai receber dados se for solicitada uma edição de plano
        if ($this->uri->segment(5) == 'editar_plano_fixo' AND is_numeric($this->uri->segment(6))) {
//se excluir, exiba mensagem de sucesso
            $plano_fixo_editar_preenche_campos = $this->administracaoModel->verificaPlanos(addslashes(htmlentities(trim($this->uri->segment(6)))));
        }

//edita o plano fixo
        if ($this->input->post('editado_plano_fixo') == 'editado_plano_fixo' AND
                is_numeric($this->input->post('editar_plano_fixo_id')) AND ! empty(trim($this->input->post('editar_plano_fixo_id'))) AND ! empty(trim($this->input->post('editar_plano_fixo_nome'))) AND ! empty(trim($this->input->post('editar_plano_fixo_valor'))) AND ! empty(trim($this->input->post('editar_plano_fixo_limite')))) {
//se editar, exiba mensagem de sucesso
            if ($this->administracaoModel->editaPlanoFixo(addslashes(htmlentities(trim($this->input->post('editar_plano_fixo_id')))), addslashes(htmlentities(trim($this->input->post('editar_plano_fixo_nome')))), addslashes(htmlentities(trim($this->input->post('editar_plano_fixo_valor')))), addslashes(htmlentities(trim($this->input->post('editar_plano_fixo_limite')))))) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><strong>Plano editado.</strong><br> Plano fixo foi editado com sucesso!</div></div>');
                redirect('administracao/administracao/logado/cadastra_planos');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger"><div class="container"><strong>Erro.</strong><br> Verifique os dados e tente novamente!</div></div>');
                redirect('administracao/administracao/logado/cadastra_planos');
            }
        }


//pega as informações e preenche os campos do plano avulso (caso seja solicitado edição)
        $plano_avulso_editar_preenche_campos = null; //recebe null pois ele só vai receber dados se for solicitada uma edição de plano
        if ($this->uri->segment(5) == 'editar_plano_avulso' AND is_numeric($this->uri->segment(6))) {
//se excluir, exiba mensagem de sucesso
            $plano_avulso_editar_preenche_campos = $this->administracaoModel->verificaPlanosAvulsos(addslashes(htmlentities(trim($this->uri->segment(6)))));
        }

//edita o plano avulso
        if ($this->input->post('editado_plano_avulso') == 'editado_plano_avulso' AND
                is_numeric($this->input->post('editar_plano_avulso_id')) AND ! empty(trim($this->input->post('editar_plano_avulso_id'))) AND ! empty(trim($this->input->post('editar_plano_avulso_valor')))) {
//se editar, exiba mensagem de sucesso
            if ($this->administracaoModel->editaPlanoAvulso(addslashes(htmlentities(trim($this->input->post('editar_plano_avulso_id')))), addslashes(htmlentities(trim($this->input->post('editar_plano_avulso_valor')))))) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><strong>Plano editado.</strong><br> Plano avulso foi editado com sucesso!</div></div>');
                redirect('administracao/administracao/logado/cadastra_planos');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger"><div class="container"><strong>Erro.</strong><br> Verifique os dados e tente novamente!</div></div>');
                redirect('administracao/administracao/logado/cadastra_planos');
            }
        }

//pega as informações e preenche os campos da area (caso seja solicitado edição)
        $area_editar_preenche_campos = null; //recebe null pois ele só vai receber dados se for solicitada uma edição da area
        if ($this->uri->segment(5) == 'editar_area' AND is_numeric($this->uri->segment(6))) {
//se excluir, exiba mensagem de sucesso
            $area_editar_preenche_campos = $this->administracaoModel->verificaArea(addslashes(htmlentities(trim($this->uri->segment(6)))));
        }

//pega as informações e preenche os campos do curso (caso seja solicitado edição)
        $curso_editar_preenche_campos = null; //recebe null pois ele só vai receber dados se for solicitada uma edição do curso
        if ($this->uri->segment(5) == 'editar_subcategoria' AND is_numeric($this->uri->segment(6))) {
//se excluir, exiba mensagem de sucesso
            $curso_editar_preenche_campos = $this->administracaoModel->verificaCurso(addslashes(htmlentities(trim($this->uri->segment(6)))));
        }

//edita a área
        if ($this->input->post('editada_area') == 'editada_area' AND
                is_numeric($this->input->post('editar_area_id')) AND ! empty(trim($this->input->post('editar_area_id'))) AND ! empty(trim($this->input->post('editar_area_nome')))) {
//se editar, exiba mensagem de sucesso
            if ($this->administracaoModel->editaArea(addslashes(htmlentities(trim($this->input->post('editar_area_id')))), addslashes(htmlentities(trim($this->input->post('editar_area_nome')))))) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><strong>Área editada.</strong><br> Área foi editada com sucesso!</div></div>');
                redirect('administracao/administracao/logado/cadastra_categoria');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger"><div class="container"><strong>Erro.</strong><br> Verifique os dados e tente novamente!</div></div>');
                redirect('administracao/administracao/logado/cadastra_categoria');
            }
        }

//edita o curso
        if ($this->input->post('editado_curso') == 'editado_curso' AND
                is_numeric($this->input->post('editar_curso_id')) AND ! empty(trim($this->input->post('editar_curso_id'))) AND
                is_numeric($this->input->post('editar_area_id')) AND ! empty(trim($this->input->post('editar_area_id'))) AND ! empty(trim($this->input->post('editar_curso_nome')))) {
//se editar, exiba mensagem de sucesso
            if ($this->administracaoModel->editaCurso(addslashes(htmlentities(trim($this->input->post('editar_curso_id')))), addslashes(htmlentities(trim($this->input->post('editar_curso_nome')))), addslashes(htmlentities(trim($this->input->post('editar_area_id')))))) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><strong>Curso editado.</strong><br> Curso foi editado com sucesso!</div></div>');
                redirect('administracao/administracao/logado/cadastra_subcategoria');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger"><div class="container"><strong>Erro.</strong><br> Verifique os dados e tente novamente!</div></div>');
                redirect('administracao/administracao/logado/cadastra_subcategoria');
            }
        }


        $this->load->view('administracao/logado', [
            'candidatos' => $candidatos,
            'candidatoDados' => $candidatoDados ?? null,
            'vagas' => $vagas,
            'vagasDaEmpresaSelecionada' => $empresavaga ?? null,
            'listaArea' => $listaArea,
            'listaCurso' => $listaCurso,
            'listaPlanos' => $listaPlanos,
            'plano_fixo_editar_preenche_campos' => $plano_fixo_editar_preenche_campos,
            'listaPlanosAvulsos' => $listaPlanosAvulsos,
            'plano_avulso_editar_preenche_campos' => $plano_avulso_editar_preenche_campos,
            'area_editar_preenche_campos' => $area_editar_preenche_campos,
            'curso_editar_preenche_campos' => $curso_editar_preenche_campos,
            'candidatosAprovados' => $candidatosAprovados,
            'listaTodosCandidatos' => SELF::listaTodosCandidatos(),
            'listarCandidatosContratados' => $this->candidato->listarCandidatosContratados()
        ]);
    }

    private function listaTodosCandidatos() {
        $this->load->model('candidato');
        return $this->candidato->listarTodosCandidatos();
    }

    public function esqueceu_senha() {

        if ($this->input->post('email')) {
//se existir uma solicitação para recuperar senha
            $this->load->model('administracao/administracaoModel');

//se existir um usuario com esse email, então cria e envia por email um link para redefinição
            $operacao = $this->administracaoModel->verificaEmail($this->input->post('email'));
            if (count($operacao) >= 1) {

//envia o token de acesso para o email do usuário
                SELF::enviaEmail($operacao[0]->email, base_url('administracao/administracao/redefinir_senha/' . hash('sha1', $operacao[0]->email . $operacao[0]->senha)));

                $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><div class="col-12"><strong>Verifique seu email.</strong><br> Verifique seu e-mail, enviamos um link para que possa redefinir sua senha.</div></div></div>');
                redirect('administracao/administracao/esqueceu_senha');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger"><div class="container"><div class="col-12"><strong>E-mail invalido.</strong><br> Esse usuário não existe!</div></div></div>');
                redirect('administracao/administracao/esqueceu_senha');
            }
        }
        $this->load->view('administracao/esqueceu_senha');
    }

    public function redefinir_senha() {

//se existir um token de acesso, exibe a tela para alterar a senha (esse token é enviado para o email do usuario)
        if ($this->uri->segment(4)) {

            $this->load->model('administracao/administracaoModel');

//exige que a senha tenha entre 5 e 30 caracteres
            $this->form_validation->set_rules('senha', 'senha', 'required|min_length[5]|max_length[30]');

//ao preencher os dados para alteração de senha, verifica se o token de acesso esta correto
            if ($this->input->post('email') AND $this->input->post('senha') AND $this->input->post('repetirSenha')) {


//se existir um usuario com esse email, então verifica se o token pertence a ele
                $operacao = $this->administracaoModel->verificaEmail($this->input->post('email'));

                if (count($operacao) >= 1 AND hash('sha1', $operacao[0]->email . $operacao[0]->senha) == $this->uri->segment(4)) {

//se o token for valido, verifica se a nova senha é igual a antiga
                    if ($operacao[0]->senha == hash('sha512', $this->input->post('senha'))) {

                        $this->session->set_flashdata('msg', '<div class="alert alert-warning"><div class="container"><div class="col-12"><strong>Senha invalida.</strong><br> Você já utiliza essa senha!</div></div></div>');
                        redirect('administracao/administracao/redefinir_senha/' . $this->uri->segment(4));
                    } else {

//altera a senha
                        $this->administracaoModel->redefinirSenha($operacao[0]->email, hash('sha512', $this->input->post('senha')));
//mostra mensagem de sucesso ao usuário (esse token já não será mais valido)
                        $this->session->set_flashdata('msg', '<div class="alert alert-success"><div class="container"><div class="col-12"><strong>Senha alterada.</strong><br> Sua senha foi alterada com sucesso, click <a href=" ' . base_url('candidato/login') . ' ">AQUI<a> e faça login!</div></div></div>');
                        redirect('administracao/administracao/redefinir_senha/' . $this->uri->segment(4));
                    }
                } else {

                    $this->session->set_flashdata('msg', '<div class="alert alert-danger"><div class="container"><div class="col-12"><strong>Usuário não existe.</strong><br> Usuário ou token de acesso invalido!</div></div></div>');
                    redirect('administracao/administracao/redefinir_senha/' . $this->uri->segment(4));
                }
            }


            $this->load->view('administracao/redefinir_senha');
        } else {

            redirect('administracao/administracao');
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
        $this->session->unset_userdata('email_administracao');
        $this->session->unset_userdata('senha_administracao');
        $this->session->unset_userdata('conta_status_administracao');
        redirect('/');
    }

}

?>
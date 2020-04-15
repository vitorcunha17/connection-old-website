<?php

include('Upload.php');
date_default_timezone_set('America/Sao_Paulo');

class Empresa extends Upload {

    public function cadastraEmpresa($dados, $imagem) {

        $this->load->database();
        //verifica se o vídeo é valido
        $analise = Parent::load($imagem);

        //verifica se usuario existe
        if (SELF::verificaUsuario($dados['email']) >= 1) {

            unlink(getcwd() . '/assets/empresa/logo/' . $analise);
            return 'existe';
        } else {

            $dados['logo'] = $analise;
            $this->db->insert('empresa', $dados);
            return 'certo';
        }
    }

    //Apos se cadastrar e confirmar o email, o usuario será movido para uma tela, nessa tela ele precisará preencher alguns dados pessoas, apôs preencher, será aqui a atualização deles
    public function primeiroAcesso(array $dados, $email) {

        $this->load->database();
        //verifica se o vídeo é valido
        $analise = Parent::load($dados["logo"]);

        if ($analise != false) {

            //verifica se email existe
            if (SELF::verificaUsuario($email) >= 1) {

                $dados['logo'] = $analise;
                $dados['data_inscricao'] = date('d/m/Y');
                $this->db->where('email', $email);
                $this->db->set($dados);
                $this->db->update('empresa');
                return true;

            }else {

                return false;
            }

        } else {

            return false;
        }
    }



    public function verificaUsuario($email) {

        $this->load->database();
        //verifica se usuaio existe
        $quantidade = $this->db->get_where('empresa', ['email' => $email]);
        return $quantidade->num_rows();
    }

    //será usado para a redefinição de senha, verifica se email existe e retorna o resultado
    public function verificaEmail($email) {

        $this->load->database();
        //verifica se email existe
        $sql = $this->db->query('SELECT * FROM empresa WHERE email =' . $this->db->escape($email));
        return $sql->result();
    }

    //altera a senha
    public function redefinirSenha($email, $senha) {

        $this->load->database();
        $sql = $this->db->query('UPDATE empresa SET senha = ' . $this->db->escape($senha) . ' WHERE email =' . $this->db->escape($email));
    }

    public function logarEmpresa($email, $senha) {

        $this->load->database();
        $this->db->where('email', $email);
        $this->db->where('senha', $senha);
        $quantidade = $this->db->get('empresa')->row_array();
        return $quantidade;
    }

    public function listarEmpresa($email, $senha) {

        $this->load->database();
        $quantidade = $this->db->get_where('empresa', ['email' => $email])->custom_row_object(0, 'empresa');
        return $quantidade;
    }

    public function cadastraVaga($dados) {

        $this->load->database();
        return $this->db->insert('vagas', $dados);
    }

    //pega os curriculum recebidos pela empresa
    public function pegaCurriculum($empresa_id) {

        $this->load->database();
        $sql = $this->db->query("SELECT DISTINCT * FROM curriculumEnviado INNER JOIN empresa em ON curriculumEnviado.id_empresa_curriculum = em.id_empresa INNER JOIN  vagas va ON curriculumEnviado.id_vaga_curriculum = va.id_vaga INNER JOIN candidato ca ON curriculumEnviado.id_candidato_curriculum = ca.id_candidato INNER JOIN area a ON va.area_curso = a.id INNER JOIN curso cu ON cu.id = va.curso_vaga WHERE  ca.status = 2 AND curriculumEnviado.id_empresa_curriculum = " . $this->db->escape($empresa_id));
        //conta os resultados pra saber se existe
        return $sql->result();
    }

    //cadastra recomendação da empresa
    public function cadastraRecomendados($empresa_id, $candidato_id) {

        $this->load->database();
        //verifica se usuario existe, se não existir, então cadastra ele
        if (count(SELF::verificaRecomendados($empresa_id, $candidato_id)) < 1) {
            $sql = $this->db->insert('recomendados', ['id_recomendados_empresa' => $empresa_id, 'id_recomendados_candidato' => $candidato_id]);
            //incrementa em +1 a quantidade de recomendações no perfil do candidato
            $this->db->where('id_candidato', $candidato_id);
            $this->db->set('recomendados', 'recomendados+1', FALSE);
            $this->db->update('candidato');
            return true;
        } else {
            return false;
        }
    }

    //Verifica se já existe recomendação da empresa
    public function verificaRecomendados($empresa_id, $candidato_id) {

        $this->load->database();
        $sql = $this->db->query("SELECT * FROM recomendados WHERE id_recomendados_empresa =  " . $this->db->escape($empresa_id) . " AND id_recomendados_candidato = " . $this->db->escape($candidato_id));
        return $sql->result();
    }

    //verifica se empresa já possui candidato 'x' na lista
    public function pegaPedidosCandidatos($empresa_id, $candidato_id) {

        $this->load->database();
        $sql = $this->db->query("SELECT * FROM candidatos_pedidos WHERE id_empresa_pedido =  " . $this->db->escape($empresa_id) . " AND id_candidato_pedido = " . $this->db->escape($candidato_id));
        return $sql->result();
    }

    //verifica se empresa possui candidatos na lista para aprovação de pagamento
    public function pegaCandidatosFilaProvacao($empresa_id) {

        $this->load->database();
        $sql = $this->db->query("SELECT * FROM candidatos_pedidos INNER JOIN candidato ON .candidatos_pedidos.id_candidato_pedido = candidato.id_candidato INNER JOIN curso ON curso.id = candidato.curso INNER JOIN area ON curso.id_area = area.id WHERE id_empresa_pedido =  " . $this->db->escape($empresa_id));
        return $sql->result();
    }

    //Pega os candidatos comprados pela empresa (se houver)
    public function pegaCandidatosComprados($empresa_id) {

        $this->load->database();
        $sql = $this->db->query("SELECT * FROM candidatos_comprados INNER JOIN candidato ON candidato.id_candidato = id_candidato_comprado INNER JOIN curso ON candidato.curso = curso.id INNER JOIN area ON curso.id_area = area.id WHERE id_empresa_compradora =  " . $this->db->escape($empresa_id));
        return $sql->result();
    }

    //verifica os candidatos comprados pela empresa (se houver)
    public function verificaCandidatosComprados($empresa_id, $id_candidato) {

        $this->load->database();
        $sql = $this->db->query("SELECT * FROM candidatos_comprados WHERE id_empresa_compradora =  " . $this->db->escape($empresa_id) . " AND id_candidato_comprado = " . $this->db->escape($id_candidato));
        return $sql->result();
    }

    //verifica se candidato esta disponivel
    public function verificaCandidatoDisponivel($candidato_id) {

        $this->load->database();
        $sql = $this->db->query("SELECT * FROM candidato WHERE id_candidato =  " . $this->db->escape($candidato_id) . " AND status = 2");
        return $sql->result();
    }

    //Pega os candidatos comprados pela empresa (se houver)
    public function fazCompra($empresa_id, $candidato_id, $saldo, $listaPlanosAvulsos) { //a variavel $saldo se refere a quantidade de candidatos que a empresa ainda pode contratar
        $this->load->database();

        //verifica se o candidato já foi foi comprado ou esta na lista de aguardando pagamento por alguma empresa (verifico isso pois ao adicionar o candidato na fila de triagem ele pode estar disponivel (se não tiver disponivel nem vai mostrar) mas na hora de realizar a compra uma outra empresa pode já ter comprado)
        if (count(SELF::verificaCandidatoDisponivel($candidato_id)) >= 1) { //se o candidato tiver disponivel
            //verifica o saldo da empresa
            if ($saldo > 0) {

                $preco = null;
                //pega valor do candidato
                if (strtolower(SELF::listarCandidato($candidato_id)[0]->situacao_curso) == 'concluido') {

                    $preco = $listaPlanosAvulsos[1]->valor_planos_avulsos;
                } else {

                    $preco = $listaPlanosAvulsos[0]->valor_planos_avulsos;
                }

                //caso exista saldo, compra o candidato (compra será aprovada de imediato)
                $data = date('d/m/Y h:i');
                $sql = $this->db->query("INSERT INTO candidatos_comprados (id_empresa_compradora, id_candidato_comprado, preco, data_compra) VALUES (" .
                        $this->db->escape($empresa_id) . ',' .
                        $this->db->escape($candidato_id) . ',' .
                        $this->db->escape($preco) . ',' .
                        $this->db->escape($data) .
                        ")");
                //diminui o saldo da empresa
                $sql = $this->db->query("UPDATE empresa SET limite_restante_vagas_plano = limite_restante_vagas_plano-1 WHERE id_empresa = " . $this->db->escape($empresa_id));
                //muda o status do candidato e coloca como comprado
                $sql = $this->db->query("UPDATE candidato SET status = 5 WHERE id_candidato = " . $candidato_id);

                //envia mensagem notificando o candidato de que ele foi comprado

                $header = 'MIME-Version: 1.0' . "\r\n";
                $header .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
                $to = SELF::listarCandidato($candidato_id)[0]->email;
                $subject = "Ótimas noticias pra você!";
                $message = 'Olá <strong>' . SELF::listarCandidato($candidato_id)[0]->nome . '</strong><br>Uma empresa teve interesse no seu perfil, em breve ela poderá estrar em contato com você, boa sorte!';

                mail($to, $subject, $message, $header);

                return true;
            }
        } else { //se o candidato não tiver disponivel
            return false;
        }
    }

    //Serve para pegar os dados do candidato no momento da compra
    public function listarCandidato($id) {

        $this->load->database();
        $quantidade = $this->db->query("SELECT * FROM candidato INNER JOIN curso cu ON candidato.curso = cu.id INNER JOIN area a ON cu.id_area = a.id WHERE candidato.id_candidato = " . $this->db->escape($id));
        return $quantidade->result();
    }
  //valida a solicitação de plano
    public function validando_plano($id_plano, $id_empresa) {

        //pega informações do plano solicitado
        $this->load->database();
        $resultado = $this->db->query("SELECT * FROM planos WHERE id_planos =" . $this->db->escape($id_plano));
        $plano = $resultado->result();

        //verifica se empresa já possui um plano e se esse plano é mais barato ou mais caro que o plano atual
        if (SELF::verifica_plano_empresa($id_empresa[0]) >= 1) { //ou seja, se existir um plano
            //verifica se o plano solicitado é mais caro ou mias barato que o plano que a empresa já possui
            if (SELF::verifica_plano_empresa($id_empresa) > $plano[0]->valor_planos) { //ou seja, se o plano da empresa for maior que o plano solicitado, então vai existir uma taxa para migrar de plano
                //VALOR DA TAXA DE MIGRAÇÂO (PODE SER ALTERADO, MAS DEVE MANTER O PADRÃO DE FLOAT)
                $taxa = 100.00;

                //recebe um vetor com os dados da operação
                $dados = [
                    "plano_existe" => true, //diz que a empresa já possui um plano
                    "taxa" => $taxa, //taxa da migração de planos
                    "nome_plano" => $plano[0]->nome_planos, //nome do novo plnao
                    "valor_plano" => $plano[0]->valor_planos, //valor do novo plnao
                    "id_plano" => $plano[0]->id_planos, //id do novo plnao
                    "plano_atual" =>  'R$ 0,00',
                    "valor_plano_atual" => 12.32,//valor do plano atual
                    "id_empresa" => $id_empresa, //id da empresa solicitante
                    "total" => $taxa + $plano[0]->valor_planos
                ];

                return $dados;
            } else { //ou seja, se o plano da empresa for menor que o plano solicitado, então não existe taxa
                //VALOR DA TAXA DE MIGRAÇÂO (PODE SER ALTERADO, MAS DEVE MANTER O PADRÃO DE FLOAT)
                $taxa = 00.00;

                //recebe um vetor com os dados da operação
                $dados = [
                    "plano_existe" => true, //diz que a empresa já possui um plano
                    "taxa" => $taxa, //taxa da migração de planos
                    "nome_plano" => $plano[0]->nome_planos, //nome do novo plnao
                    "valor_plano" => $plano[0]->valor_planos, //valor do novo plnao
                    "id_plano" => $plano[0]->id_planos, //id do novo plnao
                    "plano_atual" => SELF::verifica_plano_empresa($id_empresa)[0]->nome_planos, //nome do plano atual
                    "valor_plano_atual" => SELF::verifica_plano_empresa($id_empresa)[0]->valor_planos, //valor do plano atual
                    "id_empresa" => $id_empresa, //id da empresa solicitante
                    "total" => $taxa + $plano[0]->valor_planos
                ];

                return $dados;
            }
        } else { //caso a empresa não possua nenhum plano
            //VALOR DA TAXA DE MIGRAÇÂO (PODE SER ALTERADO, MAS DEVE MANTER O PADRÃO DE FLOAT)
            $taxa = 00.00;

            //recebe um vetor com os dados da operação
            $dados = [
                "plano_existe" => false, //diz que a empresa não possui um plano
                "taxa" => $taxa, //taxa da migração de planos
                "nome_plano" => $plano[0]->nome_planos, //nome do novo plnao
                "valor_plano" => $plano[0]->valor_planos, //valor do novo plnao
                "id_plano" => $plano[0]->id_planos, //id do novo plnao
                "id_empresa" => $id_empresa, //id da empresa solicitante
                "total" => $taxa + $plano[0]->valor_planos
            ];

            return $dados;
        }
    }

    //verifica se a empresa já possui um plano ativo e se ele é mais barato ou mais caro que o plano que deseja comprar
    public function verifica_plano_empresa($id_empresa) {

        $this->load->database();
        $resultado = $this->db->query("SELECT * FROM empresa INNER JOIN planos ON empresa.plano_empresa =  planos.id_planos WHERE id_empresa =" . $this->db->escape($id_empresa));
        return $resultado->result();
    }

    //atualiza dados do plano da empresa, esse metodo verifica se plano já venceu, a cada mês adiciona os saldos para compra de candidato das empresas, verifica se existe pagamentos pendentes etc
    public function atualiza_dados_plano_empresa() {

        foreach (SELF::pegaEmpresas() as $empresaValue) {

            $dataHoje = date("Y/m/d");

            //verifica os planos que ainda não chegaram ao fim
            if ($dataHoje >= $empresaValue->data_inicio_plano AND $dataHoje < $empresaValue->data_termino_plano) {

                $data1 = new DateTime($dataHoje);
                $data2 = new DateTime($empresaValue->data_inicio_plano);
                $intervalo = $data1->diff($data2);
                $meses = $intervalo->m + ($intervalo->y * 12); //só funciona para planos que ainda não venceram
                //quando o plano ainda não chegou ao fim
                if ($meses >= 1) {

                    //adiciona saldo
                    if ($meses > $empresaValue->saldo_adicionado_do_mes AND $empresaValue->meses_pagos >= $meses) {

                        //plano ainda não venceu e a empresa não tem pagamentos pendentes
                        $dados = [
                            "plano_empresa" => $empresaValue->plano_empresa,
                            "limite_restante_vagas_plano" => $empresaValue->limite_planos,
                            "data_inicio_plano" => $empresaValue->data_inicio_plano,
                            "data_termino_plano" => $empresaValue->data_termino_plano,
                            "meses_pagos" => $empresaValue->meses_pagos,
                            "valor_plano" => $empresaValue->valor_plano,
                            "saldo_adicionado_do_mes" => $meses,
                            "id_empresa" => $empresaValue->id_empresa,
                        ];

                        SELF::atuaizaDados($dados);
                        //notifica a empresa
                        SELF::emailNotifica($empresaValue->email, "Olá, seu saldo mensal para compra de candidatos foi adicionada!", "Aviso");

                        //remove saldo
                    } else {
                        //plano ainda não venceu e a empresa tem pagamentos pendentes
                        $dados = [
                            "plano_empresa" => $empresaValue->plano_empresa,
                            "limite_restante_vagas_plano" => 0,
                            "data_inicio_plano" => $empresaValue->data_inicio_plano,
                            "data_termino_plano" => $empresaValue->data_termino_plano,
                            "meses_pagos" => $empresaValue->meses_pagos,
                            "valor_plano" => $empresaValue->valor_plano,
                            "saldo_adicionado_do_mes" => $$empresaValue->saldo_adicionado_do_mes,
                            "id_empresa" => $empresaValue->id_empresa,
                        ];

                        SELF::atuaizaDados($dados);
                        //notifica a empresa
                        SELF::emailNotifica($empresaValue->email, "Olá, seu saldo mensal para compra de candidatos não foi adicionada pois você possui pagamentos pendentes!", "Aviso");
                    }
                }
                //verifica se o plano chegou ao fim
            } elseif ($dataHoje > $empresaValue->data_termino_plano) {

                if ($empresaValue->meses_pagos >= 12) {

                    //plano venceu e a empresa não tem pagamentos pendentes

                    $dados = [
                        "plano_empresa" => 0,
                        "limite_restante_vagas_plano" => 0,
                        "data_inicio_plano" => 0,
                        "data_termino_plano" => 0,
                        "meses_pagos" => 0,
                        "valor_plano" => 0,
                        "saldo_adicionado_do_mes" => 0,
                        "id_empresa" => $empresaValue->id_empresa,
                    ];

                    SELF::atuaizaDados($dados);
                    //notifica a empresa
                    SELF::emailNotifica($empresaValue->email, "Olá, seu plano venceu e você não possui pagamentos pendentes, assine esse e outros planos quando quiser!", "Aviso");
                } else {

                    //plano venceu e a empresa tem pagamentos pendentes

                    $dados = [
                        "plano_empresa" => $empresaValue->plano_empresa,
                        "limite_restante_vagas_plano" => 0,
                        "data_inicio_plano" => $empresaValue->data_inicio_plano,
                        "data_termino_plano" => $empresaValue->data_termino_plano,
                        "meses_pagos" => $empresaValue->meses_pagos,
                        "valor_plano" => $empresaValue->valor_plano,
                        "saldo_adicionado_do_mes" => $$empresaValue->saldo_adicionado_do_mes,
                        "id_empresa" => $empresaValue->id_empresa,
                    ];

                    SELF::atuaizaDados($dados);
                    //notifica a empresa
                    SELF::emailNotifica($empresaValue->email, "Olá, seu plano venceu e você possui pagamentos pendentes!", "Aviso");
                }
            }
        }
    }

    //pega dados de todas as empresas
    public function pegaEmpresas() {

        $this->load->database();
        $result = $this->db->query('SELECT * FROM empresa INNER JOIN planos ON empresa.plano_empresa = planos.id_planos');
        return $result->result();
    }

    //atualiza dados da empresa (atualiza os dados referentes ao plano da empresa, atualiza se o plano já acabou, adiciona o saldo para compra de candidatos a cada mês...)
    public function atuaizaDados(array $dados) {

        $this->load->database();
        $result = $this->db->query('UPDATE empresa SET
			plano_empresa=' . $this->db->escape($dados['plano_empresa']) .
                ',limite_restante_vagas_plano=' . $this->db->escape($dados['limite_restante_vagas_plano']) .
                ', data_inicio_plano=' . $this->db->escape($dados['data_inicio_plano']) .
                ', data_termino_plano=' . $this->db->escape($dados['data_termino_plano']) .
                ', meses_pagos=' . $this->db->escape($dados['meses_pagos']) .
                ', valor_plano=' . $this->db->escape($dados['valor_plano']) .
                ', saldo_adicionado_do_mes=' . $this->db->escape($dados['saldo_adicionado_do_mes']) .
                ' WHERE id_empresa=' . $this->db->escape($dados['id_empresa'])
        );
    }

    //envia email para para notificar empresa
    public function emailNotifica($email, $msg, $assunto) {

        $header = 'MIME-Version: 1.0' . "\r\n";
        $header .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $to = $email;
        $subject = $assunto;
        $message = $msg;

        mail($to, $subject, $message, $header);
    }



    //vê perfil do candidato
    public function pegaPerfilCandidato($id_empresa, $id_candidato) {

        $this->load->database();
        $verifica_candidato = $this->db->query("SELECT * FROM candidato 
            INNER JOIN curso cu ON candidato.curso = cu.id 
            INNER JOIN area a ON cu.id_area = a.id 
            WHERE candidato.status = 2 AND candidato.id_candidato = " . $this->db->escape($id_candidato)
        );

        $verifica_compras = $this->db->query("SELECT * FROM candidatos_comprados 
            WHERE id_empresa_compradora = ". $this->db->escape($id_empresa) ." AND     id_candidato_comprado = " . $this->db->escape($id_candidato)
        );

        //caso o candidato esteja disponivel ou caso a empresa já tenha comprado ele
        if($verifica_candidato->num_rows() > 0 OR $verifica_compras->num_rows() > 0) {


            $verifica_candidato = $this->db->query("SELECT * FROM candidato 
                INNER JOIN curso cu ON candidato.curso = cu.id 
                INNER JOIN area a ON cu.id_area = a.id 
                WHERE candidato.id_candidato = " . $this->db->escape($id_candidato)
            );

            return ["status" => true ,"dados" => $verifica_candidato->result()];

        }else {
            return ["status" => false];
        }
        
    }










    //PEGA DADOS DO PERFIL DO CANDIDATO
    public function pegaInteresses($email) {

        $this->load->database();

            //verifica se email existe
            if (SELF::verificaUsuarioCandidato($email) >= 1) {

                $resultado = $this->db->query("SELECT * FROM interesses WHERE email_candidato = ".$this->db->escape($email));
                return $resultado->result();

            }
    }

    public function pegaEducacao($email) {

        $this->load->database();

            //verifica se email existe
            if (SELF::verificaUsuarioCandidato($email) >= 1) {

                $resultado = $this->db->query("SELECT * FROM educacao WHERE email_candidato = ".$this->db->escape($email)." ORDER BY dataReferencia ASC");
                return $resultado->result();

            }
    }

    public function pegaExperiencia($email) {

        $this->load->database();

            //verifica se email existe
            if (SELF::verificaUsuarioCandidato($email) >= 1) {

                $resultado = $this->db->query("SELECT * FROM experiencia WHERE email_candidato = ".$this->db->escape($email)." ORDER BY dataReferencia ASC");
                return $resultado->result();

            }
    }

    public function pegaHabilidade($email) {

        $this->load->database();

            //verifica se email existe
            if (SELF::verificaUsuarioCandidato($email) >= 1) {

                $resultado = $this->db->query("SELECT * FROM habilidade WHERE email_candidato = ".$this->db->escape($email));
                return $resultado->result();

            }
    }

    public function pegaPontoForte($email) {

        $this->load->database();

            //verifica se email existe
            if (SELF::verificaUsuarioCandidato($email) >= 1) {

                $resultado = $this->db->query("SELECT * FROM pontoforte WHERE email_candidato = ".$this->db->escape($email));
                return $resultado->result();

            }
    }

    public function pegaPortfolio($email) {

        $this->load->database();

            //verifica se email existe
            if (SELF::verificaUsuarioCandidato($email) >= 1) {

                $resultado = $this->db->query("SELECT * FROM portfolio WHERE email_candidato = ".$this->db->escape($email));
                return $resultado->result();

            }
    }
    public function verificaUsuarioCandidato($email) {

        $this->load->database();
        //verifica se usuaio existe
        $quantidade = $this->db->get_where('candidato', ['email' => $email]);
        return $quantidade->num_rows();
    }



    //CHAT ==========================================
    public function mensagens($id_candidato, $id_empresa) {

        $this->load->database();
        $sql = $this->db->query("SELECT * FROM mensagens 
            INNER JOIN candidato ON candidato.id_candidato = mensagens.id_candidato
            WHERE mensagens.id_candidato =".$this->db->escape($id_candidato)." AND mensagens.id_empresa =".$this->db->escape($id_empresa)
        );

        return $sql->result();

    }

    //pega quantidade total de novas mensagens
    public function mensagensNaoLidasTotais($email_empresa) {

        $this->load->database();
        $sql = $this->db->query("SELECT * FROM mensagens 
            INNER JOIN empresa ON empresa.id_empresa = mensagens.id_empresa 
            WHERE empresa.email =".$this->db->escape($email_empresa)." AND mensagens.empresa_leu != 'sim'"
        );

        return $sql->result();

    }

    //atualiza o contador das mensagens
    public function atualizaMensagens($id_candidato, $email_empresa) {

        $this->load->database();
        $sql = $this->db->query("UPDATE mensagens  
            INNER JOIN empresa ON empresa.id_empresa = mensagens.id_empresa 
            SET mensagens.empresa_leu = 'sim' 
            WHERE empresa.email =".$this->db->escape($email_empresa)." AND mensagens.id_candidato =". $this->db->escape($id_candidato)
        );

    }

    public function enviamensagem(array $dados) {

        $this->load->database();

            //verifica qual a empresa que comprou o candidato

                $consulta = $this->db->query("SELECT * FROM candidatos_comprados WHERE
                    id_candidato_comprado = ".$this->db->escape($dados["id_candidato"]) . " AND 
                    id_empresa_compradora = ".$this->db->escape($dados["id_empresa"])
                );
                if(count($consulta->result()) > 0) {
                    $insere   = $this->db->insert("mensagens", $dados);
                }

    }

    //pega quantidade de novas mensagens de cada conversa
    public function contaMensagens($id_candidato, $email_empresa) {

        $this->load->database();
        $sql = $this->db->query("SELECT * FROM mensagens 
            INNER JOIN empresa ON empresa.id_empresa = mensagens.id_empresa 
            WHERE empresa.email =".$this->db->escape($email_empresa)." AND mensagens.empresa_leu != 'sim' AND 
            mensagens.id_candidato=".$this->db->escape($id_candidato)
        );

        return $sql->result();

    }

    //FIM CHAT ======================================

}

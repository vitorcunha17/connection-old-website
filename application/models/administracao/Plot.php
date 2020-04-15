<?php
include('Upload.php');
date_default_timezone_set('America/Sao_Paulo');
class Plot extends Upload {
    
  
    public function getCandidatoMes() {
	$this->load->database();
        $profissional = $this->db->query("select count(id_candidato) As 'profissionais', substring(x.data_inscricao, 1,2) AS'dia', substring(x.data_inscricao, 4,2) AS 'Mes' from candidato x where situacao_curso = 'Concluido' group by data_inscricao;");
        $estagiario = $this->db->query("select count(id_candidato) As 'Estagiarios', substring(x.data_inscricao, 1,2) AS'dia', substring(x.data_inscricao, 4,2) AS 'Mes' from candidato x where situacao_curso = 'Em andamento' group by data_inscricao;");
        $vagas = $this->db->query("select count(cargo) AS 'VagasEP', cargo from vagas group by cargo;");
        
        return [$profissional->result(), $estagiario->result(), $vagas->result()];

    }
  //count(id_candidato) As 'quantidade'
    }
// SELECT count( SUBSTRING(data_inscricao, REGEXP_INSTR(data_inscricao, '/'+1),2)) As 'Quantidade_Inscritos', SUBSTRING(data_inscricao, REGEXP_INSTR(data_inscricao, '/'+1),2) As 'Mes' from candidato GROUP BY SUBSTRING(data_inscricao, REGEXP_INSTR(data_inscricao, '/'+1),2)");
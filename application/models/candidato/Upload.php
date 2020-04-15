<?php

class Upload extends CI_Model {

    private $pasta_temporaria;
    private $nome_temporario;
    private $tamanho;
    private $formato;
    private $tamanho_maximo = 2147483648; //2GB
    private $novo_nome;
    private $erro = 'Verifique se o arquivo esta dentro das normas do sistema e tente novamente!';
    private $aceitos = [
        'video/mp4',
        'video/webm',
        'video/ogg'
    ];

    public function load($arquivo) {




        $this->pasta_temporaria = $arquivo['tmp_name'];
        $this->nome_temporario = $arquivo['name'];
        $this->tamanho = $arquivo['size'];
        $this->formato = $arquivo['type'];
        $this->novo_nome = SELF::novoNome($this->nome_temporario);

        if (SELF::validarFormato($this->formato) && SELF::validaTamanho($this->tamanho)) {
            if (move_uploaded_file($this->pasta_temporaria, getcwd() . '/assets/candidato/video_analise/' . $this->novo_nome . '.' . pathinfo($this->nome_temporario, PATHINFO_EXTENSION))) {
                return $this->novo_nome . '.' . pathinfo($this->nome_temporario, PATHINFO_EXTENSION);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    private function validarFormato($formato) {

        if (in_array($formato, $this->aceitos)) {
            return true;
        }
        return false;
    }

    private function validaTamanho($tamanho) {

        if ($this->tamanho_maximo >= $tamanho) {
            return true;
        }
        return false;
    }

    private function novoNome($nome) {

        return md5(uniqid($nome));
    }

    //Apôs candidato aceito, vídeo é movido
    public function moveVideo($video_url) {

        @rename(getcwd() . '/assets/candidato/video_analise/' . $video_url, getcwd() . '/assets/candidato/video_editado/' . $video_url);
        //unlink(getcwd().'/assets/candidato/video_analise/'.$video_url);
    }

}

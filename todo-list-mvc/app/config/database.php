<?php

class Database{

    #   ATRIBUTOS
    private $host = "localhost";
    private $user = 'root';
    private $pass = '';
    private $db = 'todo_list';

    public $conn;

    #   FUNÇAO PARA CONECTAR COM O BANCO
    public function conectar(): mysqli{
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

        #   SE ALGO DER ERRADO NA CONESÃO
        if($this->conn->connect_error){
            die('deu erro na conesão' . $this->conn->connect_error);
        }

        #   SE TUDO DER CERTO RETORNA O BANCO
        return $this->conn;

    }

}

?>
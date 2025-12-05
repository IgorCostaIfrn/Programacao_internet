<?php
class Database {

    private $host = "localhost";
    private $usuario = "root";
    private $senha = "";
    private $banco = "login";
    public $conn;

    public function conectar()
    {

        $this->conn = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);

        if ($this->conn->connect_error) {

            die("Erro na conexão: " . $this->conn->connect_error);
            
        }

        return $this->conn;
        
    }
}
?>
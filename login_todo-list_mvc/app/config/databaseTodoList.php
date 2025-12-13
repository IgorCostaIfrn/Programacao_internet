<?php
class DatabaseTodoList
{

    private $host = "localhost";
    private $usario = "root";
    private $senha = "";
    private $banco = "todo_list";
    public $conn;

    public function conectar()
    {

        $this->conn = new mysqli($this->host, $this->usario, $this->senha, $this->banco);

        if ($this->conn->connect_error) {

            die("Algo deu errado com a conexão" . $this->conn->connect_error);
        }

        return $this->conn;
    }
}

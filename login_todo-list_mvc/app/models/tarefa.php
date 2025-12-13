<?php
require_once __DIR__ . '/../config/databaseTodoList.php';

class Tarefa
{
    private $conn;

    public function __construct()
    {
        $db = new DatabaseTodoList();
        $this->conn = $db->conectar();
    }

    ## Listar as tarefas de um usuario em especifico
    public function listarAtivas($idUsuario)
    {
        $tarefas = [];

        $sql = "SELECT * FROM tarefas WHERE id_usuario = $idUsuario ORDER BY data_criacao DESC";

        $resultado = $this->conn->query($sql);

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $tarefas[] = $row;
            }
        }

        return $tarefas;
    }

    ## Criar 
    public function criar($descricao, $idUsuario)
    {
        $descricao = $this->conn->real_escape_string($descricao);

        $sql = "INSERT INTO tarefas (descricao, id_usuario) VALUES ('$descricao', '$idUsuario')";

        return $this->conn->query($sql);
    }

    ## Exlcuir 
   public function excluir($id, $idUsuario)
    {
        $idUsuario = intval($idUsuario);

        $sql = "DELETE FROM tarefas 
                WHERE id = $id AND id_usuario = $idUsuario";

        return $this->conn->query($sql);
    }
    ## Editar
    public function editar($id, $descricao, $idUsuario)
    {
        $descricao = $this->conn->real_escape_string($descricao);

        $sql = "UPDATE tarefas SET descricao = '$descricao' WHERE id = $id AND id_usuario = $idUsuario";

        return $this->conn->query($sql);
    }

    ## Buscar por ID (para preencher o formulário de edição)
    public function buscarPorId($id, $idUsuario)
    {
        $sql = "SELECT * FROM tarefas WHERE id = $id AND id_usuario = $idUsuario";

        $resultado = $this->conn->query($sql);
        return $resultado->fetch_assoc();
    }
}

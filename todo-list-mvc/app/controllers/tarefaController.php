<?php
require_once __DIR__ . "/../models/Tarefa.php";
class TarefaController
{

    private $tarefaModel;

    public function __construct()
    {
        $this->tarefaModel = new Tarefa();
    }

    #   CRIAR
    public function criar()
    {
        if (isset($_POST['descricao']) && !empty(trim($_POST['descricao']))) {
            $this->tarefaModel->criar($_POST['descricao']);
        }

        header("location: index.php");
    }

    #   EXCLUIR 
    public function excluir()
    {
        if (isset($_POST['delete'])) {
            $this->tarefaModel->excluir($_POST['delete']);
        }

        header("location: index.php"); 
    }
}
?>
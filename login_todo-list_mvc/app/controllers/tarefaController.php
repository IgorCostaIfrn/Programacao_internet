<?php
require_once __DIR__ . '/../models/tarefa.php';
class TarefaController
{
    private $tarefaModel;

    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $this->tarefaModel = new Tarefa();
    }

    public function listar()
    {
        $tarefas = $this->tarefaModel->listarAtivas($_SESSION['id']);
        include __DIR__ . '/../views/tarefa/listar.php';
    }

    public function criar()
    {
        if (isset($_POST['descricao']) && !empty(trim($_POST['descricao']))) {
            $this->tarefaModel->criar($_POST['descricao'], $_SESSION['id']);
        }
        header("Location: index.php?action=listar");
    }

    public function excluir()
    {
        if (isset($_GET['delete'])) {
            $this->tarefaModel->excluir($_GET['delete'], $_SESSION['id']);
        }
        header("Location: index.php?action=listar");
    }

    public function editarTarefa()
    {
        if (isset($_GET['id'])) {
            $tarefa = $this->tarefaModel->buscarPorId($_GET['id'], $_SESSION['id']);
            include __DIR__ . '/../views/tarefa/editar.php';
        }
    }

    public function atualizar()
    {
        if (isset($_POST['id']) && isset($_POST['descricao'])) {
            $this->tarefaModel->editar($_POST['id'], $_POST['descricao'], $_SESSION['id']);
        }
        header("Location: index.php?action=listar");
    }
}

?>
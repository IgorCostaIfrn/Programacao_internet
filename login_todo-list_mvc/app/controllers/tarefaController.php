<?php

/**     ADICIONANDO UM INDENTIFICADOR DE USUÁRIO NAS TAREFAS (NÃO ESQUERCER DE ADICIONAR NO PC DO LAB)
 * USE todo_list;
 * ALTER TABLE tarefas
 * ADD COLUMN id_usuario INT NOT NULL;
 */

require_once __DIR__ . '/../models/tarefa.php';
class TarefaController
{
    private $tarefaModel;

    public function __construct()
    {
        $this->tarefaModel = new Tarefa();
    }

#   FUNÇÃO DE LISTAGEM DE TAREFAS (SOMENTE AS ATIVAS PARA O USUÁRIO LOGADO)
    public function listar()
    {
        $tarefas = $this->tarefaModel->listarAtivas($_SESSION['id']);
        include __DIR__ . '/../views/tarefa/listar.php';
    }

#   FUNÇÃO DE CRIAÇÃO DE TAREFA
    public function criar()
    {
        if (isset($_POST['descricao']) && !empty(trim($_POST['descricao']))) {
            $this->tarefaModel->criar($_POST['descricao'], $_SESSION['id']);
        }
        header("Location: index.php?action=listar");
    }

#   FUNÇÃO DE EXCLUSÃO DE TAREFA
    public function excluir()
    {
        if (isset($_GET['delete'])) {
            $this->tarefaModel->excluir($_GET['delete'], $_SESSION['id']);
        }
        header("Location: index.php?action=listar");
    }

#   FUNÇÃO DE EDIÇÃO DE TAREFA
    public function editarTarefa()
    {
        if (isset($_GET['id'])) {
            $tarefa = $this->tarefaModel->buscarPorId($_GET['id'], $_SESSION['id']);
            include __DIR__ . '/../views/tarefa/editar.php';
        }
    }

#   FUNÇÃO DE ATUALIZAÇÃO DE TAREFA
    public function atualizar()
    {
        if (isset($_POST['id']) && isset($_POST['descricao'])) {
            $this->tarefaModel->editar($_POST['id'], $_POST['descricao'], $_SESSION['id']);
        }
        header("Location: index.php?action=listar");
    }
}

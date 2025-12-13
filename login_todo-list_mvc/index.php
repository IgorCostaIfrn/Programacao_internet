<?php
require_once __DIR__ . '/app/controllers/tarefaController.php';
require_once __DIR__ . '/app/controllers/usuarioController.php';;

$TarefaController = new TarefaController();
$UsuarioController = new UsuarioController();

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'criar':
        $TarefaController->criar();
        break;
    case 'excluir':
        $TarefaController->excluir();
        break;
    case 'editar':
        $TarefaController->editarTarefa();
        break;
    case 'atualizar':
        $TarefaController->atualizar();
        break;
    case 'listar':
        $TarefaController->listar();
        break;
    case 'login':
        $UsuarioController->login();
        break;
    case 'logout':
        $UsuarioController->logout();
        break;
    default:
        $UsuarioController->index();
        break;
}

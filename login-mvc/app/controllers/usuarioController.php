<?php

require_once __DIR__ . '/../models/usuario.php';

class UsuarioController {
    private $usuarioModel;

    public function __construct() {

        if (!isset($_SESSION)) {
            session_start();
        }

        $this->usuarioModel = new Usuario();

    }

    public function index() {

        include __DIR__ . '/../views/login.php';

    }

    public function login() {
        if (empty($_POST['email']) || empty($_POST['senha'])) {
            $_SESSION['erro'] = 'Preencha todos os campos';
            header('Location: index.php');
            return;

        }

        $usuario = $this->usuarioModel->autenticar($_POST['email'], $_POST['senha']);

        if ($usuario !== null) {

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: index.php?action=painel");

        } else {
            $_SESSION['erro'] = 'Usuário ou senha inválidos.';
            header('Location: index.php');
            return;

        }
    }

    public function painel() {

        include __DIR__ . '/../views/painel.php';

    }

    public function logout() {

        session_destroy();
        header("Location: index.php");

    }
}
?>
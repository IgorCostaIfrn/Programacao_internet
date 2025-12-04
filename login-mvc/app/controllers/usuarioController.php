<?php
require_once __DIR__ . '/../models/usuario.php';

class UsuarioController
{
    private $usuarioModel;

    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        $this->usuarioModel = new Usuario();
    }

    // MOSTRA A PAGINA DE LOGIN (INDEX)
    public function index()
    {
        include __DIR__ . '/../views/login.php';
    }

    // LOGIN
    public function login()
    {
        if (empty($_POST['email']) || empty($_POST['senha'])) {
            $erro = "Preencha todos os campos.";
            include __DIR__ . '/../views/login.php';
            return;
        }

        $usuario = $this->usuarioModel->autenticar($_POST['email'], $_POST['senha']);

        if ($usuario !== null) {
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: index.php?action=painel");
        } else {
            $erro = "Usuário ou senha inválidos.";
            include __DIR__ . '/../views/login.php';
        }
    }

    // PÁGINA DE BEM VINDO
    public function painel()
    {
        include __DIR__ . '/../views/painel.php';
    }

    // LOGOUT
    public function logout()
    {
        session_destroy();
        header("Location: index.php");
    }
}
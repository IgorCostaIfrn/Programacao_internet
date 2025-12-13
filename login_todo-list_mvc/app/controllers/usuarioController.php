<?php

/**     ADICIONANDO UM INDENTIFICADOR DE USUÁRIO NAS TAREFAS (NÃO ESQUERCER DE ADICIONAR NO PC DO LAB)
 * USE todo_list;
 * ALTER TABLE tarefas
 * ADD COLUMN id_usuario INT NOT NULL;
 */

require_once __DIR__ . '/../models/usuario.php';

class UsuarioController
{
    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new Usuario();
    }

#   PAGINA DE LOGIN
    public function index()
    {
        include __DIR__ . '/../views/usuario/login.php';
    }

#   FUNÇÃO DE LOGIN, VERIFICAÇÃO DE USUÁRIO E SENHA E CRIAÇÃO DE SESSÃO (COM TUDO CERTO: REDIRECIONA PARA A LISTAGEM DE TAREFAS)
    public function login()
    {
        if (empty($_POST['email']) || empty($_POST['senha'])) {
            $_SESSION['erro'] = 'Preencha todos os campos';
            header('Location: index.php');
        }
        $usuario = $this->usuarioModel->autenticar($_POST['email'], $_POST['senha']);
        if ($usuario !== null) {
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            header("Location: index.php?action=listar");
        } else {
            $_SESSION['erro'] = 'Usuário ou senha inválidos.';
            header('Location: index.php');
        }
    }

#  FUNÇÃO DE LOGOUT, DESTRÓI A SESSÃO E REDIRECIONA PARA A PÁGINA DE LOGIN
    public function logout()
    {
        session_destroy();
        header("Location: index.php");
    }
}

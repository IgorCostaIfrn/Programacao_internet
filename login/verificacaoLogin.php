<?php
include('conexao.php');

if (isset($_POST['email']) || isset($_POST['senha'])) {
    if (strlen($_POST['email']) == 0)
        echo "Preencha seu email";
    else if (strlen($_POST['senha']) == 0)
        echo "Preencha sua senha";
    else {
        $email = $conn->real_escape_string($_POST['email']);
        $senha = $conn->real_escape_string($_POST['senha']);

        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

        $res = $conn->query($sql);
        if ($res->num_rows == 1) {
            $usuario = $res->fetch_assoc();
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");
        } else {
            echo "Usuario não encontrado";
        }


    }
}
?>
<?php
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['id'])){
    header('Location: protect.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel</title>
</head>
<body>

<h1>Bem-vindo, <?php echo $_SESSION['nome']; ?>!</h1>

<p><a href="index.php?action=logout">Sair</a></p>

</body>
</html>

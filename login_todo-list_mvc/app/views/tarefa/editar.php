<?php
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['id'])){
    $_SESSION['erro'] = 'Você não está autenticado! \nFaça login para acessar o conteúdo';
    header('Location: /index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar tarefa</title>
    <style>
        body{
            background-color: aqua
        }
    </style>
</head>
<body>
    <h1>Editar tarefa</h1>

    <form action="index.php?action=atualizar" method="POST">
        <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>">
        <input type="text" name="descricao" value="<?php echo htmlspecialchars($tarefa['descricao']); ?>" required>
        <button type="submit">Salvar</button>
    </form>

    <a href="index.php">Voltar</a>
</body>
</html>

<?php
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['id'])){
    $_SESSION['erro'] = 'Você não está autenticado! \n Faça login para acessar o conteúdo.';
    header('Location: /index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>To-Do List (MVC)</title>
    <style>
        body{
            background-color: aquamarine;
        }
    </style>
</head>
<body>

    <h1>TO-DO List (MVC)</h1>

    <form action="index.php?action=criar" method="POST">
        <input type="text" name="descricao" placeholder="Descrição da tarefa">
        <button type="submit">Adicionar</button>
    </form>

    
    <?php if (!empty($tarefas)): ?>
        <h2>Suas tarefas</h2>
        <ul>
            <?php foreach ($tarefas as $tarefa): ?>
                <li>
                    <?php echo htmlspecialchars($tarefa['descricao']); ?>
                    <a href="index.php?action=excluir&delete=<?php echo $tarefa['id']; ?>">Excluir</a>
                    <a href="index.php?action=editar&id=<?php echo $tarefa['id']; ?>">Editar</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Não há tarefas ainda!</p>
    <?php endif; ?>
    <a href="index.php?action=logout">Sair</a>
</body>
</html>

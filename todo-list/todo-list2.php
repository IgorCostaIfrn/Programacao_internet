<?php
# conectando o banco
$localhost = 'localhost';
$usario = 'root';
$senha = '';
$database = 'todo_list';

$conn = new mysqli($localhost, $usario, $senha, $database);

# se a conecsão der errado
if ($conn->connect_error) {
    die('Deu erro na conexão' . $conn->connect_error);
}

# criacao de tarefas
if (isset($_POST['descricao']) && !empty(trim($_POST['descricao']))) {

    $descricao = $conn->real_escape_string($_POST['descricao']);
    $sqlInsert = "INSERT INTO tarefas (descricao) VALUES ('$descricao')";

    if ($conn->query($sqlInsert) === TRUE) {
        header("location: todo-list2.php");
    }
}
# Exclusão de tarefas
if (isset($_GET['delete'])) {

    $id = intval( $_GET['delete']);
    $sqlDelete = "DELETE FROM tarefas WHERE id=$id";

    if ($conn->query($sqlDelete) === TRUE) {
        header("location: todo-list2.php");
    }
}

# Listar tarefas
$tarefas = [];
$sqlSelect = "SELECT * FROM tarefas ORDER BY data_criacao DESC";
$result = $conn->query($sqlSelect);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tarefas[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo-list</title>
</head>

<body>

    <h1>TO-DO List</h1>
    <form action="todo-list2.php" method="POST">
        <input type="text" placeholder="Descrição da sua tarefa" name="descricao" />
        <button type="submit">Adicionar</button>
    </form>

    <?php if (!empty($tarefas)): ?>
        <h3>Suas tarefas</h3>
        <ul>
            <?php foreach ($tarefas as $tarefa): ?>
                <li>
                    <?php echo $tarefa['descricao'] ?>
                    <a href="todo-list2.php?delete=<?php echo $tarefa['id'] ?>">Excluir</a>
                </li>
            <?php endforeach ?>
        </ul>
    <?php else: ?>
        <h3>Não tem tarefas</h3>
    <?php endif ?>

</body>

</html>
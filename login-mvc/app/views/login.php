<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<h1>Acesse sua conta</h1>

<?php if (!empty($erro)): ?>
    <p style="color:red;"><?php echo $erro; ?></p>
<?php endif; ?>

<form action="index.php?action=login" method="POST">
    <p>
        <label>E-mail</label>
        <input type="text" name="email">
    </p>
    <p>
        <label>Senha</label>
        <input type="password" name="senha">
    </p>
    <p>
        <button type="submit">Entrar</button>
    </p>
</form>

</body>
</html>

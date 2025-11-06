<?php
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['id'])){
    die("voce não pode acessar a pagina, loge. <p><a href=\"index.php\">Entrar</a></p>");
}
?>
<?php
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['id'])){
    die("voce não pode acessar a pagina, logue. <p><a href=\"index.php\">Logar</a></p>");
}
?>
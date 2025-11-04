<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'login';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("erro na conexão" . $conn->connect_error);
}
?>
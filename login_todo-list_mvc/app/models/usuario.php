<?php
require_once __DIR__ . '/../config/databaseLogin.php';

class Usuario
{
    private $conn;

    public function __construct()
    {
        $db = new DatabaseLogin();
        $this->conn = $db->conectar();
    }

    public function autenticar($email, $senha)
    {
        $email = $this->conn->real_escape_string($email);
        $senha = $this->conn->real_escape_string($senha);

        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $res = $this->conn->query($sql);

        return $res->fetch_assoc();
    }
}
?>
<?php
require_once 'C:/xampp/htdocs/ReidoX/DB/Database.php'; // Inclui e cria a variável $pdo
require_once 'C:/xampp/htdocs/ReidoX/Controller/UsuarioController.php';

// A variável $pdo já está disponível a partir do require_once acima
$usuarioController = new UsuarioController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'add') {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $role = $_POST['role'];

        // Criptografando a senha antes de salvar
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $usuarioController->cadastrar($nome, $email, $senhaHash, $role);
    }

    header('Location: admin.php');
    exit;
}
?>
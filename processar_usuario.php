<?php
require_once 'DB/Database.php'; // Inclui e cria a variável $pdo
require_once 'Controller/UsuarioController.php';

// A variável $pdo já está disponível a partir do require_once acima
$usuarioController = new UsuarioController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'add') {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $cargo = $_POST['cargo'];

        // Salva a senha sem criptografia
        $usuarioController->cadastrar($nome, $email, $senha, $cargo);
    }

    header('Location: admin.php');
    exit;
}
?>
<?php
require_once 'DB/Database.php';
require_once 'Controller/UsuarioController.php';

$usuarioController = new UsuarioController($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'add') {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $cargo = $_POST['cargo'] ?? 'cliente'; // Define 'cliente' como padrão

        try {
            // Tenta cadastrar o usuário (salvando a senha como texto plano)
            $usuarioController->cadastrar($nome, $email, $senha, $cargo);
            header('Location: admin.php?status=success');
        } catch (Exception $e) {
            // Se o e-mail já existir, exibe um alerta e redireciona
            echo "<script>
                alert('{$e->getMessage()}');
                window.location.href = 'admin.php';
            </script>";
        }
        exit;
    }
}

// Se não for uma ação de adicionar, redireciona para o admin
header('Location: admin.php');
exit;
?>
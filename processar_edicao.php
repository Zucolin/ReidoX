<?php
session_start();
require_once 'DB/Database.php';
require_once 'Model/UsuarioModel.php';

// Verifica se o usuário está logado e se o método é POST
if (!isset($_SESSION['id_usuario']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

// Pega os dados do formulário
$id = $_SESSION['id_usuario'];
$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? ''; // Nova senha (pode ser vazia)
$cep = $_POST['cep'] ?? '';
$rua = $_POST['rua'] ?? '';
$numero = $_POST['numero'] ?? '';

// Validação simples
if (empty($nome) || empty($email)) {
    header('Location: editar_usuario.php?erro=Nome e email são obrigatórios.');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: editar_usuario.php?erro=Email inválido.');
    exit;
}

try {
    $usuarioModel = new UsuarioModel($pdo);
    $sucesso = $usuarioModel->atualizarUsuario($id, $nome, $email, $senha, $cep, $rua, $numero);

    if ($sucesso) {
        // Atualiza o nome na sessão, caso tenha sido alterado
        $_SESSION['nome_usuario'] = $nome;
        header('Location: paginainicio.php');
        exit;
    } else {
        header('Location: editar_usuario.php?erro=Ocorreu um erro ao atualizar o perfil.');
        exit;
    }
} catch (Exception $e) {
    // Trata exceções, como email duplicado
    header('Location: editar_usuario.php?erro=' . urlencode($e->getMessage()));
    exit;
}
?>

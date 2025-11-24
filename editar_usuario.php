<?php
session_start();
require_once 'C:/turma1/xampp/htdocs/ReidoX/Controller/UsuarioController.php';
require_once 'C:/turma1/xampp/htdocs/ReidoX/DB/Database.php'; // Inclui e cria a variável $pdo

// Verifica se o usuário está logado
if (!isset($_SESSION['id_usuario'])) {
    // Se não estiver logado, redireciona para a página de login com uma mensagem de erro
    header('Location: index.php?erro=' . urlencode('Você precisa estar logado para editar o perfil.'));
    exit;
}

$usuarioController = new UsuarioController($pdo);

// Busca o usuário pelo ID armazenado na sessão
$id_usuario_logado = $_SESSION['id_usuario'];
$usuario = $usuarioController->buscarUsuarioPorId($id_usuario_logado);

$erro = $_GET['erro'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Editar Perfil</h2>
    <?php if ($erro): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($erro) ?></div>
    <?php endif; ?>

    <?php if ($usuario): ?>
    <form action="processar_edicao.php" method="post">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required readonly>
            <small class="form-text text-muted">O e-mail não pode ser alterado.</small>
        </div>
        <div class="form-group">
            <label for="senha">Nova Senha (deixe em branco para não alterar)</label>
            <input type="password" class="form-control" id="senha" name="senha">
        </div>
        <hr>
        <h5>Endereço</h5>
        <div class="form-group">
            <label for="cep">CEP</label>
            <input type="text" class="form-control" id="cep" name="cep" value="<?= htmlspecialchars($usuario['cep'] ?? '') ?>">
        </div>
        <div class="form-group">
            <label for="rua">Rua</label>
            <input type="text" class="form-control" id="rua" name="rua" value="<?= htmlspecialchars($usuario['rua'] ?? '') ?>">
        </div>
        <div class="form-group">
            <label for="numero">Número/Bloco</label>
            <input type="text" class="form-control" id="numero" name="numero" value="<?= htmlspecialchars($usuario['numero'] ?? '') ?>">
        </div>
        
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <a href="paginainicio.php" class="btn btn-secondary">Cancelar</a>
    </form>
    <?php else: ?>
    <div class="alert alert-warning">
        <p>Usuário não encontrado. Por favor, <a href="logout.php">faça o login novamente</a>.</p>
    </div>
    <?php endif; ?>
</div>
</body>
</html>
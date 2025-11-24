<?php
session_start();
require_once 'C:/turma1/xampp/htdocs/programa/ReidoX/Controller/UsuarioController.php';
require_once 'C:/turma1/xampp/htdocs/programa/ReidoX/DB/Database.php'; // Inclui e cria a variável $pdo

// Verifica se o usuário tem permissão (admin ou chapeiro)
if (!isset($_SESSION['cargo']) || ($_SESSION['cargo'] !== 'admin' && $_SESSION['cargo'] !== 'chapeiro')) {
    header('Location: index.php?erro=' . urlencode('Acesso negado. Área restrita para administradores.'));
    exit;
}

$usuarioController = new UsuarioController($pdo);

// Busca o usuário pelo ID passado na URL
$id_usuario_a_editar = $_GET['id'] ?? 0;
if (!$id_usuario_a_editar) {
    header('Location: admin.php?erro=' . urlencode('ID de usuário inválido.'));
    exit;
}
$usuario = $usuarioController->buscarUsuarioPorId($id_usuario_a_editar);

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
    <form action="processar_edicaoadmin.php" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($usuario['id']) ?>">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required>
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
        <div class="form-group">
            <label for="pedidos">Pedidos</label>
            <input type="text" class="form-control" id="pedidos" name="pedidos" value="<?= htmlspecialchars($usuario['pedidos'] ?? '') ?>">
        </div>
        <?php if (isset($usuario['cargo']) && $usuario['cargo'] === 'admin'): ?>
            <div class="form-group">
                <label>Cargo</label>
                <p class="form-control-static">Admin</p>
                <input type="hidden" name="cargo" value="admin">
            </div>
        <?php else: ?>
            <div class="form-group">
                <label for="cargo">Cargo</label>
                <select class="form-control" id="cargo" name="cargo" required>
                    <option value="cliente" <?= ($usuario['cargo'] ?? 'cliente') == 'cliente' ? 'selected' : '' ?>>Cliente</option>
                    <option value="chapeiro" <?= ($usuario['cargo'] ?? '') == 'chapeiro' ? 'selected' : '' ?>>Chapeiro</option>
                </select>
            </div>
        <?php endif; ?>
        
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <a href="admin.php" class="btn btn-secondary">Cancelar</a>
    </form>
    <?php else: ?>
    <div class="alert alert-warning">
        <p>Usuário não encontrado. Por favor, <a href="logout.php">faça o login novamente</a>.</p>
    </div>
    <?php endif; ?>
</div>
</body>
</html>
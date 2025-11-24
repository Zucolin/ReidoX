<?php
require_once 'C:/turma1/xampp/htdocs/ReidoX/Controller/UsuarioController.php';
require_once 'C:/turma1/xampp/htdocs/ReidoX/DB/Database.php'; // Inclui e cria a variável $pdo

// A variável $pdo já está disponível a partir do require_once acima
$usuarioController = new UsuarioController($pdo);

$usuario = null;
if (isset($_GET['id'])) {
    $usuario = $usuarioController->buscarUsuarioPorId($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $cargo = $_POST['cargo'];
    $pedidos = $_POST['pedidos'];

    $usuarioController->atualizarUsuario($id, $nome, $email, $senha, $cep, $rua, $numero, $cargo, $pedidos);
    header('Location: admin.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Editar Usuário</h2>
    <?php if ($usuario): ?>
    <form action="editar_usuario.php" method="post">
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
        <div class="form-group">
            <label for="cep">CEP</label>
            <input type="text" class="form-control" id="cep" name="cep" value="<?= htmlspecialchars($usuario['cep'] ?? '') ?>">
        </div>
        <div class="form-group">
            <label for="rua">Rua</label>
            <input type="text" class="form-control" id="rua" name="rua" value="<?= htmlspecialchars($usuario['rua'] ?? '') ?>">
        </div>
        <div class="form-group">
            <label for="numero">Número</label>
            <input type="text" class="form-control" id="numero" name="numero" value="<?= htmlspecialchars($usuario['numero'] ?? '') ?>">
        </div>
        <div class="form-group">
            <label for="pedidos">Pedidos</label>
            <textarea class="form-control" id="pedidos" name="pedidos" rows="3"><?= htmlspecialchars($usuario['pedidos'] ?? '') ?></textarea>
        </div>
        <div class="form-group">
            <label for="cargo">cargo</label>
            <select class="form-control" id="cargo" name="cargo">
                <option value="cliente" <?= ($usuario['cargo'] ?? 'cliente') == 'cliente' ? 'selected' : '' ?>>Cliente</option>
                <option value="chapeiro" <?= ($usuario['cargo'] ?? '') == 'chapeiro' ? 'selected' : '' ?>>Chapeiro</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <a href="admin.php" class="btn btn-secondary">Cancelar</a>
    </form>
    <?php else: ?>
    <p>Usuário não encontrado.</p>
    <?php endif; ?>
</div>
</body>
</html>
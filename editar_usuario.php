<?php
session_start();
require_once 'DB/Database.php';
require_once 'Model/UsuarioModel.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['id_usuario'])) {
    header('Location: index.php');
    exit;
}

$usuarioModel = new UsuarioModel($pdo);
$usuario = $usuarioModel->buscarUsuarioPorId($_SESSION['id_usuario']);

if (!$usuario) {
    // Se não encontrar o usuário, redireciona ou mostra erro
    echo "Usuário não encontrado.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - Rei do X</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="container">
        <h2>Editar Perfil</h2>
        <?php if (isset($_GET['sucesso'])): ?>
            <p class="sucesso">Perfil atualizado com sucesso!</p>
        <?php endif; ?>
        <?php if (isset($_GET['erro'])): ?>
            <p class="erro"><?php echo htmlspecialchars($_GET['erro']); ?></p>
        <?php endif; ?>

        <form action="processar_edicao.php" method="POST">
            <div class="input-group">
                <label for="nome">Nome Completo</label>
                <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>" required>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
            </div>
            <div class="input-group">
                <label for="senha">Nova Senha (deixe em branco para não alterar)</label>
                <input type="password" id="senha" name="senha">
            </div>
            <div class="input-group">
                <label for="cep">CEP</label>
                <input type="text" id="cep" name="cep" value="<?php echo htmlspecialchars($usuario['cep']); ?>">
            </div>
            <div class="input-group">
                <label for="rua">Rua</label>
                <input type="text" id="rua" name="rua" value="<?php echo htmlspecialchars($usuario['rua']); ?>">
            </div>
            <div class="input-group">
                <label for="numero">Número</label>
                <input type="text" id="numero" name="numero" value="<?php echo htmlspecialchars($usuario['numero']); ?>">
            </div>
            <button type="submit" class="btn">Salvar Alterações</button>
        </form>
        <div class="footer-links">
            <a href="paginainicio.php">Voltar para a página inicial</a>
        </div>
    </div>
</body>
</html>

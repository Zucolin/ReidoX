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
<style>

</style>
<body>
    <div class="container">
        <h2>Editar Perfil</h2>
        <?php if (isset($_GET['sucesso'])): ?>
            <p class="sucesso">Perfil atualizado com sucesso!</p>
        <?php endif; ?>
        <?php if (isset($_GET['erro'])): ?>
            <p class="erro"><?php echo htmlspecialchars($_GET['erro']); ?></p>
        <?php endif; ?>

        <form action="processar_edicao.php" method="POST" class="formulario-editar">
            <div class="campo">
                <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>" required class="input" placeholder=" ">
                <label for="nome" class="label-flutuante">Nome Completo</label>
            </div>
            <div class="campo">
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required class="input" placeholder=" ">
                <label for="email" class="label-flutuante">Email</label>
            </div>
            <div class="campo">
                <input type="password" id="senha" name="senha" class="input" placeholder=" ">
                <label for="senha" class="label-flutuante">Nova Senha</label>
            </div>
            <div class="campo">
                <input type="text" id="cep" name="cep" value="<?php echo htmlspecialchars($usuario['cep']); ?>" class="input" placeholder=" ">
                <label for="cep" class="label-flutuante">CEP</label>
            </div>
            <div class="campo">
                <input type="text" id="rua" name="rua" value="<?php echo htmlspecialchars($usuario['rua']); ?>" class="input" placeholder=" ">
                <label for="rua" class="label-flutuante">Rua</label>
            </div>
            <div class="campo">
                <input type="text" id="numero" name="numero" value="<?php echo htmlspecialchars($usuario['numero']); ?>" class="input" placeholder=" ">
                <label for="numero" class="label-flutuante">Número</label>
            </div>
            <input class="botao" type="submit" value="Salvar Alterações">
        </form>
    </div>
</body>
</html>

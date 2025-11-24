<?php
session_start();

require_once "DB/Database.php";
require_once "Model/UsuarioModel.php";

if (isset($pdo)) {
    $usuarioModel = new UsuarioModel($pdo);
} else {
    die("Database connection is not available.");
}

// Limpar o carrinho
if (isset($_GET['limpar'])) {
    unset($_SESSION['carrinho']);
    header('Location: carrinho.php');
    exit;
}

// Finalizar compra
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['finalizar'])) {
    if (!empty($_SESSION['carrinho']) && isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
        $pedidos = [];
        foreach ($_SESSION['carrinho'] as $id => $item) {
            $pedidos[] = $item['nome'] . ' (x' . $item['quantidade'] . ')';
        }
        $pedidosStr = implode(', ', $pedidos);

        // Adiciona o pedido ao usuário
        if (isset($usuarioModel)) {
            $usuarioModel->adicionarPedido($userId, $pedidosStr);
        }

        // Limpa o carrinho
        unset($_SESSION['carrinho']);

        // Redireciona para a página de pedidos
        header('Location: pedidos.php');
        exit;
    }
}

$carrinho = $_SESSION['carrinho'] ?? [];

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="container">
        <h1>Seu Carrinho</h1>
        <?php if (empty($carrinho)): ?>
            <p>Seu carrinho está vazio.</p>
        <?php else: ?>
            <form method="POST" action="carrinho.php">
                <ul>
                    <?php foreach ($carrinho as $id => $item): ?>
                        <li>
                            <?= htmlspecialchars($item['nome']) ?> - R$ <?= number_format($item['preco'], 2, ',', '.') ?> x <?= $item['quantidade'] ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <button type="submit" name="finalizar" class="btn">Finalizar Compra</button>
            </form>
            <a href="carrinho.php?limpar=1" class="btn-limpar">Limpar Carrinho</a>
        <?php endif; ?>
        <a href="paginainicio.php" class="btn">Continuar Comprando</a>
    </div>
</body>
</html>
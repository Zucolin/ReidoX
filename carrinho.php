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

// Remover um item específico
if (isset($_GET['remover'])) {
    $id_para_remover = $_GET['remover'];
    if (isset($_SESSION['carrinho'][$id_para_remover])) {
        unset($_SESSION['carrinho'][$id_para_remover]);
    }
    header('Location: carrinho.php');
    exit;
}

// Atualizar quantidades
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quantidades']) && !isset($_POST['finalizar'])) {
    foreach ($_POST['quantidades'] as $id => $quantidade) {
        $quantidade = (int)$quantidade;
        if (isset($_SESSION['carrinho'][$id])) {
            if ($quantidade > 0) {
                $_SESSION['carrinho'][$id]['quantidade'] = $quantidade;
            } else {
                unset($_SESSION['carrinho'][$id]); // Remove se a quantidade for 0 ou menor
            }
        }
    }
    header('Location: carrinho.php');
    exit;
}

// Finalizar compra
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['finalizar'])) {
    if (!empty($_SESSION['carrinho']) && isset($_SESSION['id_usuario'])) {
        $userId = $_SESSION['id_usuario'];
        $pedidos = [];
        $total = 0;

        foreach ($_SESSION['carrinho'] as $id => $item) {
            $pedidos[] = $item['nome'] . ' (x' . $item['quantidade'] . ')';
            $total += $item['preco'] * $item['quantidade'];
        }

        $pagamento = $_POST['pagamento'] ?? 'Não especificado';
        $entrega = $_POST['entrega'] ?? 'Não especificado';
        
        $pedidosStr = implode(', ', $pedidos);
        $pedidosStr .= " | Total: R$ " . number_format($total, 2, ',', '.');
        $pedidosStr .= " | Pagamento: " . htmlspecialchars($pagamento);
        $pedidosStr .= " | Entrega: " . htmlspecialchars($entrega);

        // Adiciona o pedido ao usuário
        if (isset($usuarioModel)) {
            $usuarioModel->adicionarPedido($userId, $pedidosStr);
        }

        // Define o status do pedido como "Preparando"
        $_SESSION['status_pedido'] = 'Preparando';

        // Limpa o carrinho
        unset($_SESSION['carrinho']);

        // Redireciona para a página de pedidos
        header('Location: pedidos.php');
        exit;
    }
}

$carrinho = $_SESSION['carrinho'] ?? [];
$total_carrinho = 0;

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
        .container { max-width: 800px; margin: auto; padding: 20px; }
        .cart-item { display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; padding: 10px; border: 1px solid #ddd; border-radius: 5px; }
        .cart-item input { width: 60px; text-align: center; }
        .cart-item a { color: #c00; text-decoration: none; }
        .cart-total { text-align: right; font-size: 1.2em; font-weight: bold; margin-top: 20px; }
        .form-group { margin-top: 20px; }
        .form-group label { display: block; margin-bottom: 5px; }
        .form-group select, .form-group div { padding: 5px; }
        .cart-actions { display: flex; justify-content: flex-end; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Seu Carrinho</h1>
        <?php if (empty($carrinho)): ?>
            <p>Seu carrinho está vazio.</p>
        <?php else: ?>
            <form method="POST" action="carrinho.php">
                <?php foreach ($carrinho as $id => $item): ?>
                    <?php $total_item = $item['preco'] * $item['quantidade']; $total_carrinho += $total_item; ?>
                    <div class="cart-item">
                        <span><?= htmlspecialchars($item['nome']) ?> - R$ <?= number_format($item['preco'], 2, ',', '.') ?></span>
                        <div>
                            <input type="number" name="quantidades[<?= $id ?>]" value="<?= $item['quantidade'] ?>" min="0" onchange="this.form.submit()">
                            <a href="carrinho.php?remover=<?= $id ?>" style="margin-left: 10px;">Tirar</a>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="cart-total">
                    Total: R$ <?= number_format($total_carrinho, 2, ',', '.') ?>
                </div>

                <div class="form-group">
                    <label for="pagamento">Forma de Pagamento:</label>
                    <select name="pagamento" id="pagamento" required>
                        <option value="cartao_credito">Cartão de Crédito</option>
                        <option value="pix">PIX</option>
                        <option value="dinheiro">Dinheiro</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Opção de Entrega:</label>
                    <div>
                        <input type="radio" name="entrega" value="entregar" id="entregar" checked required>
                        <label for="entregar">Entregar em casa</label>
                    </div>
                    <div>
                        <input type="radio" name="entrega" value="retirar" id="retirar">
                        <label for="retirar">Retirar na loja</label>
                    </div>
                </div>

                <div class="cart-actions">
                    <button type="submit" name="finalizar" class="btn">Finalizar Compra</button>
                </div>
            </form>
            <a href="carrinho.php?limpar=1" class="btn-limpar" style="margin-top: 10px; display: inline-block;">Limpar Carrinho</a>
        <?php endif; ?>
        <a href="paginainicio.php" class="btn" style="margin-top: 20px; display: inline-block;">Continuar Comprando</a>
    </div>
</body>
</html>
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
   /* RESET */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

body {
    background: #000;
    padding: 20px;
    color: #fff;
}


/* CONTAINER */
.container {
    max-width: 800px;
    margin: 40px auto;
    background: #111;
    padding: 25px;
    border-radius: 16px;
    border: 1px solid #ffcc00;
    box-shadow: 0 0 20px rgba(255, 204, 0, 0.2);
}

/* TÍTULO */
h1 {
    margin-bottom: 25px;
    color: #ffcc00;
    text-align: center;
}

/* ITEM DO CARRINHO */
.cart-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
    padding: 15px;
    background: #000;
    border-radius: 12px;
    border: 1px solid #333;
    transition: 0.2s ease;
}

.cart-item:hover {
    border-color: #ffcc00;
    box-shadow: 0 0 6px rgba(255, 204, 0, 0.3);
}

/* TEXTO DO PRODUTO */
.cart-item span {
    font-size: 15px;
    color: #fff;
}

/* QUANTIDADE */
.cart-item input[type="number"] {
    width: 60px;
    padding: 6px;
    border-radius: 8px;
    border: 1px solid #ffcc00;
    background: #000;
    color: #ffcc00;
    text-align: center;
}

/* REMOVER */
.cart-item a {
    color: #ffcc00;
    text-decoration: none;
    font-weight: bold;
}

.cart-item a:hover {
    text-decoration: underline;
    color: #ffd633;
}

/* TOTAL */
.cart-total {
    text-align: right;
    font-size: 22px;
    font-weight: bold;
    margin: 25px 0 15px;
    color: #ffcc00;
}

/* FORM */
.form-group {
    margin: 20px 0;
}

.form-group label {
    font-weight: bold;
    margin-bottom: 8px;
    display: block;
    color: #ffcc00;
}

/* SELECT */
.form-group select {
    width: 100%;
    padding: 8px;
    border-radius: 8px;
    border: 1px solid #ffcc00;
    background: #000;
    color: #ffcc00;
}

/* RADIO */
.form-group div {
    margin-top: 8px;
}

/* BOTÕES */
.btn,
button,
.btn-limpar,
.btn-cont {
    padding: 11px 18px;
    background: #000;
    border: 1px solid #ffcc00;
    color: #ffcc00;
    border-radius: 8px;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    transition: 0.2s;
    font-size: 15px;
    font-weight: bold;
}


.btn:hover,
button:hover {
    background: #2ef50bff;
    color: #000;
    transform: translateY(-2px);
}

/* LIMPAR CARRINHO */
.btn-limpar {
    border-color: #ffcc00;
}

.btn-limpar:hover {
    background: #ff0000;
    color: #000000ff;
    border-color: #ff0000;
}
.btn-cont {
    border-color: #ffcc00;
}
.btn-cont:hover {
    background: #ffcc00;
    color: #000000ff;
    border-color: #ffcc00;
}
/* RESPONSIVO */
@media(max-width: 600px) {
    .cart-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }

    .cart-total {
        text-align: left;
    }
}

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
        <a href="paginainicio.php" class="btn-cont" style="margin-top: 20px; display: inline-block;">Continuar Comprando</a>
    </div>
</body>
</html>
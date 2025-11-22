<?php
session_start();
require_once "DB/Database.php";
require_once "Model/UsuarioModel.php";

if (!isset($_SESSION['nome_usuario'])) {
    header('Location: index.php');
    exit;
}
$nome = $_SESSION['nome_usuario'];

$id = $_GET['id'] ?? 0;
if (!$id) {
    header("Location: cardapio.php");
    exit;
}

$usuarioModel = new UsuarioModel($pdo);
$produto = $usuarioModel->buscarProdutoPorId($id);

if (!$produto) {
    echo "Produto não encontrado.";
    exit;
}

// Lógica para adicionar ao carrinho/pedido
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $quantidade = $_POST['quantidade'] ?? 1;
    
    // Exemplo de como adicionar ao pedido na sessão.
    // Você pode querer uma lógica mais robusta, como salvar no banco de dados.
    $itemPedido = [
        'id' => $produto['id'],
        'nome' => $produto['nome'],
        'quantidade' => $quantidade,
        'preco' => $produto['preco'],
        'imagem' => $produto['imagem']
    ];

    // Adiciona ou atualiza o item no carrinho (armazenado na sessão)
    $_SESSION['carrinho'][$id] = $itemPedido;

    header("Location: pedidos.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= htmlspecialchars($produto['nome']) ?> - Rei do X</title>
    <link rel="stylesheet" href="Escolha/estilos.css">
    <style>
        body {
            background-color: #000;
            color: #fff;
        }
        .produto-detalhe-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 50px 20px;
            gap: 40px;
            min-height: calc(100vh - 80px); /* Ajuste conforme altura do seu nav */
        }
        .produto-img-detalhe {
            max-width: 400px;
            border-radius: 12px;
            border: 3px solid #ffc72c;
        }
        .produto-info {
            max-width: 500px;
        }
        .produto-titulo {
            font-size: 2.5rem;
            color: #ffc72c;
            margin-top: 0;
        }
        .produto-descricao {
            font-size: 1.1rem;
            line-height: 1.6;
        }
        .produto-preco {
            font-size: 2rem;
            font-weight: bold;
            color: #ffc72c;
            margin: 20px 0;
        }
        .compra-form {
            margin-top: 20px;
        }
        .label-qtd {
            font-size: 1rem;
            font-weight: bold;
        }
        .input-qtd {
            width: 60px;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            text-align: center;
            margin-left: 10px;
        }
        .btn-comprar {
            background-color: #ffc72c;
            color: #000;
            border: none;
            padding: 15px 30px;
            font-size: 1.2rem;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 20px;
            display: block;
            width: 100%;
        }
        .voltar {
            margin-top: 20px;
            display: inline-block;
            background-color: #555;
            color: #fff;
        }
    </style>
</head>
<body>
    <nav class="nav-escolha">
        <a href="paginainicio.php"><img src="img/logo.png" alt="logo" class="logo"></a>
        <ul>
            <li><a href="paginainicio.php">Início</a></li>
            <li><a href="pedidos.php">Pedidos</a></li>
            <li><a href="sobrenos.html">Sobre nós</a></li>
            <li><a href="cardapio.php">Cardápio</a></li>
        </ul>
    </nav>

    <div class="produto-detalhe-container">
        <img src="img/<?= htmlspecialchars($produto['imagem']) ?>" class="produto-img-detalhe" alt="<?= htmlspecialchars($produto['nome']) ?>">
        <div class="produto-info">
            <h2 class="produto-titulo"><?= htmlspecialchars($produto['nome']) ?></h2>
            <p class="produto-descricao"><?= htmlspecialchars($produto['descricao']) ?></p>
            <p class="produto-preco">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
            
            <form class="compra-form" method="post" action="">
                <input type="hidden" name="add_to_cart" value="1">
                <button class="btn-comprar" type="submit">Adicionar ao Pedido</button>
            </form>
            
            <a href="javascript:history.back()" class="btn-comprar voltar" style="text-align: center; text-decoration: none;">Voltar</a>
        </div>
    </div>
</body>
</html>

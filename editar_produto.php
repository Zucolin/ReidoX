<?php
require_once "DB/Database.php";
require_once "Model/UsuarioModel.php";

$id = $_GET['id'] ?? 0;

if (!$id) {
    header("Location: admin.php?status=error&msg=" . urlencode("ID do produto não fornecido."));
    exit;
}

$usuarioModel = new UsuarioModel($pdo);
$produto = $usuarioModel->buscarProdutoPorId($id);

if (!$produto) {
    header("Location: admin.php?status=error&msg=" . urlencode("Produto não encontrado."));
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
        body {
            background: #000;
            color: #fff;
            font-family: "Montserrat", sans-serif;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: rgba(255,255,255,0.05);
            padding: 28px;
            border-radius: 12px;
        }
        h1 {
            color: #ffc72c;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #ffc72c;
            font-weight: 700;
        }
        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 2px solid #ffc72c;
            background: transparent;
            color: #fff;
        }
        .form-group textarea {
            resize: vertical;
            min-height: 80px;
        }
        .btn {
            background: #ffc72c;
            color: #000;
            border: 0;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            margin-top: 10px;
        }
        .btn-secondary {
            background: #555;
            color: #fff;
            text-align: center;
            display: block;
            text-decoration: none;
            margin-top: 10px;
        }
        .current-image {
            display: block;
            max-width: 150px;
            margin-top: 10px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Produto</h1>
        <form action="processar_produto.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="id" value="<?= htmlspecialchars($produto['id']) ?>">

            <div class="form-group">
                <label for="nome">Nome do Produto</label>
                <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($produto['nome']) ?>" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea id="descricao" name="descricao" required><?= htmlspecialchars($produto['descricao']) ?></textarea>
            </div>

            <div class="form-group">
                <label for="preco">Preço (R$)</label>
                <input type="number" step="0.01" id="preco" name="preco" value="<?= htmlspecialchars($produto['preco']) ?>" required>
            </div>

            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select id="categoria" name="categoria" required>
                    <option value="lanche" <?= $produto['categoria'] == 'lanche' ? 'selected' : '' ?>>Lanche</option>
                    <option value="bebida" <?= $produto['categoria'] == 'bebida' ? 'selected' : '' ?>>Bebida</option>
                    <option value="sobremesa" <?= $produto['categoria'] == 'sobremesa' ? 'selected' : '' ?>>Sobremesa</option>
                    <option value="acompanhamento" <?= $produto['categoria'] == 'acompanhamento' ? 'selected' : '' ?>>Acompanhamento</option>
                    <option value="combo" <?= $produto['categoria'] == 'combo' ? 'selected' : '' ?>>Combo</option>
                </select>
            </div>

            <div class="form-group">
                <label for="imagem">Imagem do Produto</label>
                <input type="file" id="imagem" name="imagem" accept="image/*">
                <p>Imagem Atual:</p>
                <?php if (!empty($produto['imagem'])): ?>
                    <img src="img/<?= htmlspecialchars($produto['imagem']) ?>" alt="Imagem atual" class="current-image">
                <?php else: ?>
                    <p>Nenhuma imagem cadastrada.</p>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn">Salvar Alterações</button>
            <a href="admin.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>

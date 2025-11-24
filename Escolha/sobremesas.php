<?php
session_start();
require_once "../DB/Database.php";
require_once "../Model/UsuarioModel.php";

if (!isset($_SESSION['nome_usuario'])) {
    header('Location: ../index.php');
    exit;
}
$nome = $_SESSION['nome_usuario'];
if (!isset($_SESSION['nome_usuario']) || $_SESSION['nome_usuario'] == 'admin') {
    header('Location: ../index.php');
    exit;
}
$usuarioModel = new UsuarioModel($pdo);
$sobremesas = $usuarioModel->listarProdutosPorCategoria('sobremesa');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sobremesas</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
    .user-menu { position: relative; }
    .menu-opcoes {
        display: none;
        position: absolute;
        right: 0;
        top: 100%;
        background-color: #333;
        border-radius: 8px;
        padding: 10px;
        z-index: 10;
        width: 150px;
    }
    .menu-opcoes.active { display: block; }
    .menu-opcoes a {
        display: block;
        color: #fff;
        text-decoration: none;
        padding: 8px 12px;
    }
    .menu-opcoes a:hover { background-color: #555; }
    .card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        text-align: center;
    }
    .card form {
        margin-top: 10px;
    }
    .card button {
        background-color: #f5c518;
        color: black;
        border: none;
        padding: 10px;
        cursor: pointer;
        width: 100%;
        border-radius: 5px;
        font-weight: bold;
    }
</style>
</head>
<body>
    <section id="sobremesas">
        <nav class="nav-escolha">
            <a href="../paginainicio.php"><img src="../img/logo.png" alt="logo" class="logo"></a>
            <ul>
                <li><a href="../paginainicio.php">Início</a></li>
                <li><a href="../pedidos.php">Pedidos</a></li>
                <li><a href="../carrinho.php">Carrinho</a></li>
                <li><a href="../sobrenos.html">Sobre nós</a></li>
            </ul>
            <div class="user-menu">
                <button class="menu-btn">Olá, <?= htmlspecialchars($nome) ?>!</button>
                <div class="menu-opcoes">
                    <a href="../editar_usuario.php">Editar Perfil</a>
                    <a href="../logout.php">Sair</a>
                </div>
            </div>
        </nav>

        <h1 class="titulo-pagina">Sobremesas</h1>
        
        <div id="itens-container" class="grind">
            <?php if (empty($sobremesas)): ?>
                <p style="text-align: center; color: #fff; width: 100%;">Nenhuma sobremesa dísponivel.</p>
            <?php else: ?>
                <?php foreach ($sobremesas as $sobremesa): ?>
                    <div class="card">
                        <div>
                            <img src="../img/<?= htmlspecialchars($sobremesa['imagem']) ?>" alt="<?= htmlspecialchars($sobremesa['nome']) ?>">
                            <p><?= htmlspecialchars($sobremesa['nome']) ?></p>
                            <p>R$ <?= number_format($sobremesa['preco'], 2, ',', '.') ?></p>
                        </div>
                        <form action="../processar_carrinho.php" method="post">
                            <input type="hidden" name="produto_id" value="<?= $sobremesa['id'] ?>">
                            <input type="hidden" name="produto_nome" value="<?= htmlspecialchars($sobremesa['nome']) ?>">
                            <input type="hidden" name="produto_preco" value="<?= $sobremesa['preco'] ?>">
                            <button type="submit">Adicionar ao Carrinho</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>

    <script>
        document.querySelector('.menu-btn').addEventListener('click', function() {
            document.querySelector('.menu-opcoes').classList.toggle('active');
        });
        window.addEventListener('click', function(e) {
            const userMenu = document.querySelector('.user-menu');
            if (!userMenu.contains(e.target)) {
                document.querySelector('.menu-opcoes').classList.remove('active');
            }
        });
    </script>
</body>
</html>
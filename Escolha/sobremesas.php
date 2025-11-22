<?php
session_start();
require_once "../DB/Database.php";
require_once "../Model/UsuarioModel.php";

if (!isset($_SESSION['nome_usuario'])) {
    header('Location: ../index.php');
    exit;
}
$nome = $_SESSION['nome_usuario'];

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
        /* Mantive o style que você tinha no final do arquivo, organizado no head */
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

        /* Sugestão opcional para os cards */
        #itens-container.grind {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            justify-content: center;
            padding: 20px;
        }
        .card {
            cursor: pointer;
            width: 180px;
            background: rgba(255,255,255,0.06);
            border-radius: 8px;
            padding: 12px;
            text-align: center;
            box-shadow: 0 2px 6px rgba(0,0,0,0.3);
        }
        .card img {
            width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 6px;
        }
        .titulo-pagina {
            text-transform: capitalize;
            text-align: center;
            color: #fff;
            margin-top: 24px;
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
                <li><a href="../sobrenos.html">Sobre nós</a></li>
            </ul>
            <div class="user-menu">
                <button class="menu-btn">Olá, <?= htmlspecialchars($nome, ENT_QUOTES, 'UTF-8') ?>!</button>
                <div class="menu-opcoes">
                    <a href="../editar_usuario.php">Editar Perfil</a>
                    <a href="../logout.php">Sair</a>
                </div>
            </div>
        </nav>

        <h1 class="titulo-pagina">Sobremesas</h1>
        
        <div id="itens-container" class="grind">
            <?php if (empty($sobremesas)): ?>
                <p style="text-align: center; color: #fff; width: 100%;">Nenhuma sobremesa disponível.</p>
            <?php else: ?>
                <?php foreach ($sobremesas as $sobremesa): ?>
                    <div class="card" onclick="location.href='../produto.php?id=<?= urlencode($sobremesa['id']) ?>'">
                        <img src="../img/<?= htmlspecialchars($sobremesa['imagem'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($sobremesa['nome'], ENT_QUOTES, 'UTF-8') ?>">
                        <p><?= htmlspecialchars($sobremesa['nome'], ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>

    <script>
        const menuBtn = document.querySelector('.menu-btn');
        const menuOpcoes = document.querySelector('.menu-opcoes');

        if (menuBtn) {
            menuBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                menuOpcoes.classList.toggle('active');
            });
        }

        window.addEventListener('click', function(e) {
            const userMenu = document.querySelector('.user-menu');
            if (userMenu && !userMenu.contains(e.target)) {
                menuOpcoes.classList.remove('active');
            }
        });
    </script>
</body>
</html>

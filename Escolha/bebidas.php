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
$bebidas = $usuarioModel->listarProdutosPorCategoria('bebida');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Bebidas</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
        /* Mantive o style inline que você tinha no final do arquivo original */
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

        /* Sugestão básica para os cards (opcional) */
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
    <section id="bebidas">
        <nav class="nav-escolha">
            <a href="../paginainicio.php"><img src="../img/logo.png" alt="logo" class="logo"></a>
            <ul>
                <li><a href="../paginainicio.php">Início</a></li>
                <li><a href="../pedidos.php">Pedidos</a></li>
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

        <h1 class="titulo-pagina">Bebidas</h1>
        
        <div id="itens-container" class="grind">
            <?php if (empty($bebidas)): ?>
                <p style="text-align: center; color: #fff; width: 100%;">Nenhuma bebida disponível.</p>
            <?php else: ?>
                <?php foreach ($bebidas as $bebida): ?>
                    <div class="card" onclick="location.href='../produto.php?id=<?= urlencode($bebida['id']) ?>'">
                        <img src="../img/<?= htmlspecialchars($bebida['imagem']) ?>" alt="<?= htmlspecialchars($bebida['nome']) ?>">
                        <p><?= htmlspecialchars($bebida['nome']) ?></p>
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

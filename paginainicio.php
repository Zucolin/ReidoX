<?php

session_start();

// Se clicou em "sair"
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sair'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}

// Verifica se o usuário está logado
if (!isset($_SESSION['nome_usuario']) || $_SESSION['nome_usuario'] == 'admin') {
    header('Location: index.php');
    exit;
}
$total_itens_carrinho = 0;
if (isset($_SESSION['carrinho'])) {
    foreach ($_SESSION['carrinho'] as $item) {
        $total_itens_carrinho += $item['quantidade'];
    }
}

// Pega o nome do usuário logado
$nome = $_SESSION['nome_usuario'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rei do X</title>
    <style>
        :root {
            --bg: #000;
            --panel: #0f0f0f;
            --accent: #ffc72c;
            /* amarelo */
            --muted: rgba(255, 255, 255, 0.08);
            --text: #ffffff;
        }

        /* Reset rápido */
        * {
            box-sizing: border-box
        }

        html,
        body {
            height: 100%;
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: "Helvetica Neue", Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        /* Nav */
        nav {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 12px 32px;
            position: sticky;
            margin-top: -37px;
            z-index: 100;
        }
        

        .brand {
            flex: 0;
            display: flex;
            align-items: center
        }

        .brand img {
            height: 200px;
            width: 150px;
            display: block;
        }

        .nav-center {
            flex: 1;
            display: flex;
            justify-content: center
        }

        nav ul {
            display: flex;
            gap: 40px;
            list-style: none;
            margin: 0;
            padding: 0;
            align-items: center;

        }

        nav ul li a {
            color: var(--text);
            text-decoration: none;
            font-weight: 600;
            font-size: 29px;
            opacity: 0.95;
            transition: color .15s, opacity .15s;
            padding: 8px 6px;
            border-radius: 6px;
        }

        nav ul li a:hover {
            color: var(--accent);
            opacity: 1;
            background: rgba(255, 255, 255, 0.02)
        }

        /* Área do usuário (direita) */
        .menu-container {
            position: relative;
            display: flex;
            align-items: center;
            gap: 12px
        }

        .menu-btn {
            background: var(--accent);
            color: #000;
            border: 0;
            padding: 10px 18px;
            border-radius: 28px;
            font-weight: 800;
            cursor: pointer;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.6);
            letter-spacing: 0.3px;
        }

        /* Dropdown */
        #menu {
            display: none;
            position: absolute;
            right: 0;
            top: calc(100% + 10px);
            background: var(--panel);
            border-radius: 10px;
            min-width: 200px;
            overflow: hidden;
            box-shadow: 0 14px 40px rgba(0, 0, 0, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.03);
            z-index: 200;
        }

        #menu form {
            display: flex;
            flex-direction: column
        }

        #menu form button {
            background: none;
            border: 0;
            color: var(--text);
            padding: 12px 16px;
            text-align: left;
            cursor: pointer;
            font-weight: 600;
        }

        #menu form button:hover {
            background: rgba(255, 255, 255, 0.03);
            color: var(--accent)
        }

        /* Itens / Cards */
        #itens-container.grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 28px;
            padding: 36px;
            align-items: stretch;
            position: relative;
            z-index: 1;
        }

        .card {
            margin-top: 40px;
            width: 240px;
            height: 290px;
            /* restaurado para o tamanho anterior */
            background: rgba(255, 255, 255, 0.04);
            border-radius: 12px;
            text-align: center;
            transition: transform .18s ease, box-shadow .18s ease;
            border: 1px solid rgba(255, 255, 255, 0.04);
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.6);
        }

        .card a {
            display: block;
            color: inherit;
            text-decoration: none;
            pointer-events: auto
        }

        .card img {
            width: 100%;
            height: 200px;
            /* restaurado para 160px */
            object-fit: contain;
            background: transparent;
            border-radius: 8px;
            pointer-events: none;
            margin-top: 20px;
        }

        .card p {
            margin: 12px 0 0;
            margin-top: 0px;
            font-size: 24px;
            font-weight: 700;
            color: var(--text);
        }

        /* Responsivo */
        @media (max-width:900px) {
            nav {
                padding: 12px 20px
            }

            .card {
                width: 48%
            }

            .brand img {
                height: 56px;
                max-height: 56px
            }
        }

        @media (max-width:520px) {
            .nav-center {
                display: none
            }

            #itens-container.grid {
                padding: 18px;
                gap: 16px
            }

            .card {
                width: 100%
            }

            .menu-btn {
                padding: 10px 14px
            }

            .brand img {
                height: 44px;
                max-height: 44px
            }
            
        }
   
.carrinho{
  position: absolute;
  margin-left: 85%;  
}
.carrinhoimg{
height: 8vh;
width:8vh;
margin-left: -150px;

}
.contagemcarrinho{
    position:absolute;
  background-color:#ffc72c;
  display: flex;
  border-radius: 50%;
  width: 25px;
  height: 25px;
  justify-content: center;
    font-size: clamp(8px, 2vw, 12px);
    align-items: center;
  max-width: 40px;
  text-align: center;
  margin-left: -85px;
  margin-top: -3px;
}
.contagemcarrinho{
  color: rgb(0, 0, 0);
  font-size: 10px;
  font-weight: 700;
}
    </style>
</head>

<body>


    <section id="inicio">
        <nav>
            <div class="brand">
                <a href="paginainicio.php"><img src="img/logo.png" alt="Rei do X"></a>
            </div>

            <div class="nav-center">
                <ul>
                    <li><a href="paginainicio.php">Início</a></li>
                    <li><a href="pedidos.php">Pedidos</a></li>
                    <li><a href="sobrenos.html">Sobre nós</a></li>
                </ul>
            </div>
  <div class="carrinho">
     <p class="contagemcarrinho"><?= $total_itens_carrinho ?><p>
                 <a href="carrinho.php"><img src="img/carrinho1.png" alt="" class="carrinhoimg"></a>
               
                   
                 
            </div>
            <div class="menu-container">
                <button class="menu-btn" onclick="toggleMenu()">Olá, <?= htmlspecialchars($nome) ?>!</button>
                <div class="menu-opcoes" id="menu">
                    <a href="editar_usuario.php" class="menu-link">Editar Perfil</a>
                    <a href="logout.php" class="menu-link">Sair</a>
                </div>
            </div>
        </nav>

        <style>
            .menu-link {
                display: block;
                padding: 12px 16px;
                color: var(--text);
                text-decoration: none;
                font-weight: 600;
            }
            .menu-link:hover {
                background: rgba(255, 255, 255, 0.03);
                color: var(--accent);
            }
        </style>

        <div class="header-cardapio">
            <h1>Nosso Cardápio</h1>
        </div>

        <div class="category-grid">
            <a href="Escolha/combos.php" class="category-card">
                <img src="img/X_ComboIndividual.png" alt="Combos">
                <h2>Combos</h2>
            </a>
            <a href="Escolha/lanches.php" class="category-card">
                <img src="img/lanche.png" alt="Lanches">
                <h2>Lanches</h2>
            </a>
            <a href="Escolha/acompanhamentos.php" class="category-card">
                <img src="img/acompanhamento.png" alt="Acompanhamentos">
                <h2>Acompanhamentos</h2>
            </a>
            <a href="Escolha/sobremesas.php" class="category-card">
                <img src="img/mousseMaracuja.png" alt="Sobremesas">
                <h2>Sobremesas</h2>
            </a>
            <a href="Escolha/bebidas.php" class="category-card">
                <img src="img/coca.png" alt="Bebidas">
                <h2>Bebidas</h2>
            </a>
        </div>

    </section>

    <style>
        .header-cardapio {
            text-align: center;
            margin: 40px 0;
        }
        .header-cardapio h1 {
            color: var(--accent);
            font-size: 3rem;
            margin: 0;
            font-family: "Montserrat", sans-serif;
        }
        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            width: 90%;
            max-width: 1200px;
            margin: 0 auto; /* Centralizar a grade */
            padding: 20px;
        }
        .category-card {
            background: rgba(255,255,255,0.05);
            border: 2px solid var(--accent);
            border-radius: 12px;
            text-decoration: none;
            color: var(--text);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            padding: 10px;
        }
        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(255, 199, 44, 0.2);
        }
        .category-card img {
            width: 100%;
            height: 180px;
            object-fit: contain;
            margin-bottom: 10px;
        }
        .category-card h2 {
            margin: 0;
            font-size: 1.5rem;
            color: var(--accent);
            font-family: "Montserrat", sans-serif;
        }
    </style>

    <script>
        function toggleMenu() {
            const menu = document.getElementById("menu");
            menu.style.display = (menu.style.display === "block") ? "none" : "block";
        }

        // Fecha o menu se clicar fora dele
        window.addEventListener('click', function (e) {
            const menu = document.getElementById("menu");
            const btn = document.querySelector('.menu-btn');
            if (menu && btn && !btn.contains(e.target) && !menu.contains(e.target)) {
                menu.style.display = "none";
            }
        });
    </script>

</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['sair'])) {
        header('Location: index.php');
        exit;
    }
}
?>
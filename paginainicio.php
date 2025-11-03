<?php

session_start();

// Se clicou em "sair"
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sair'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}

// Verifica se o usuário está logado
if (!isset($_SESSION['nome_usuario'])) {
    header('Location: index.php');
    exit;
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
        :root{
            --bg:#000;
            --panel:#0f0f0f;
            --accent:#ffc72c; /* amarelo */
            --muted: rgba(255,255,255,0.08);
            --text:#ffffff;
        }

        /* Reset rápido */
        *{box-sizing:border-box}
        html,body{height:100%;margin:0;background:var(--bg);color:var(--text);font-family: "Helvetica Neue", Arial, sans-serif;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}

        /* Nav */
        nav{
            display:flex;
            align-items:center;
            gap:20px;
            padding:12px 32px;
            position:sticky;
            top:0;
            z-index:100;
        }

        .brand{flex:0; display:flex; align-items:center}
        .brand img{
            height:200px;
            width:150px;
            display:block;
        }

        .nav-center{flex:1; display:flex; justify-content:center}
        nav ul{
            display:flex;
            gap:40px;
            list-style:none;
            margin:0;
            padding:0;
            align-items:center;

        }
        nav ul li a{
            color:var(--text);
            text-decoration:none;
            font-weight:600;
            font-size:29px;
            opacity:0.95;
            transition:color .15s, opacity .15s;
            padding:8px 6px;
            border-radius:6px;
        }
        nav ul li a:hover{color:var(--accent);opacity:1; background: rgba(255,255,255,0.02) }

        /* Área do usuário (direita) */
        .menu-container{position:relative; display:flex; align-items:center; gap:12px}
        .menu-btn{
            background:var(--accent);
            color:#000;
            border:0;
            padding:10px 18px;
            border-radius:28px;
            font-weight:800;
            cursor:pointer;
            box-shadow: 0 6px 18px rgba(0,0,0,0.6);
            letter-spacing:0.3px;
            margin-top: -100px;
        }

        /* Dropdown */
        #menu{
            display:none;
            position:absolute;
            right:0;
            top:calc(100% + 10px);
            background:var(--panel);
            border-radius:10px;
            min-width:200px;
            overflow:hidden;
            box-shadow:0 14px 40px rgba(0,0,0,0.7);
            border:1px solid rgba(255,255,255,0.03);
            z-index:200;
        }
        #menu form{display:flex;flex-direction:column}
        #menu form button{
            background:none;
            border:0;
            color:var(--text);
            padding:12px 16px;
            text-align:left;
            cursor:pointer;
            font-weight:600;
        }
        #menu form button:hover{background:rgba(255,255,255,0.03); color:var(--accent)}

        /* Itens / Cards */
        #itens-container.grid{
            display:flex;
            flex-wrap:wrap;
            justify-content:center;
            gap:28px;
            padding:36px;
            align-items:stretch;
            position:relative;
            z-index:1;
        }
        .card{
            margin-top: 40px;
            width:340px;
            height: 340px; /* restaurado para o tamanho anterior */
            background: rgba(255,255,255,0.04);
            border-radius:12px;
            text-align:center;
            transition:transform .18s ease, box-shadow .18s ease;
            border:1px solid rgba(255,255,255,0.04);
        }
        .card:hover{
            transform:translateY(-8px);
            box-shadow:0 18px 40px rgba(0,0,0,0.6);
        }
        .card a{display:block; color:inherit; text-decoration:none; pointer-events:auto}
        .card img{
            width:100%;
            height:200px; /* restaurado para 160px */
            object-fit:contain;
            background:transparent;
            border-radius:8px;
            pointer-events:none;
            margin-top: 20px;
        }
        .card p{
            margin:12px 0 0;
            margin-top: 80px;
            font-size: 24px;
            font-weight:700;
            color:var(--text);
        }

        /* Responsivo */
        @media (max-width:900px){
            nav{padding:12px 20px}
            .card{width:48%}
            .brand img{height:56px; max-height:56px}
        }
        @media (max-width:520px){
            .nav-center{display:none}
            #itens-container.grid{padding:18px;gap:16px}
            .card{width:100%}
            .menu-btn{padding:10px 14px}
            .brand img{height:44px; max-height:44px}
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

        <div class="menu-container">
            <button class="menu-btn" onclick="toggleMenu()">Olá, <?= htmlspecialchars($nome) ?>!</button>
            <div class="menu-opcoes" id="menu">
                <form method="post">
                    <button type="submit" name="sair">Sair</button>
                </form>
            </div>
        </div>
    </nav>

       <div id="itens-container" class="grid">
        <div class="card">
            <a href="Escolha/combos.php"><img src="img/X_ComboIndividual.png" alt="Combos"></a>
            <p>Combos</p>
        </div>
        <div class="card">
            <a href="Escolha/lanches.php"><img src="img/X_Tudo.png" alt="Lanches"></a>
            <p>Lanches</p>
        </div>
        <div class="card">
            <a href="Escolha/acompanhamentos.php"><img src="img/porcaobatata.png" alt="Acompanhamentos"></a>
            <p>Acompanhamentos</p>
        </div>
        <div class="card">
            <a href="Escolha/sobremesas.php"><img src="img/mousseMaracuja.png" alt="Sobremesas"></a>
            <p>Sobremesas</p>
        </div>
        <div class="card">
            <a href="Escolha/bebidas.php"><img src="img/refri_capa.png" alt="Bebidas"></a>
            <p>Bebidas</p>
        </div>
    </div>
    
    </section>

    <script>
      function toggleMenu() {
        const menu = document.getElementById("menu");
        menu.style.display = (menu.style.display === "block") ? "none" : "block";
      }

      // Fecha o menu se clicar fora dele
      window.addEventListener('click', function(e) {
        const menu = document.getElementById("menu");
        const btn = document.querySelector('.menu-btn');
        if (!btn.contains(e.target) && !menu.contains(e.target)) {
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
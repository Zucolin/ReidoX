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
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    

    <section id="inicio">
    <nav>
        
        <div class="menu-container">
        <button class="menu-btn" onclick="toggleMenu()">Olá, <?= htmlspecialchars($nome) ?>!</button>
        <div class="menu-opcoes" id="menu">
            <form method="post">
            <button type="submit" name="editar" href="#">Editar</button>
            <button type="submit" name="sair" href="#">Sair</button>
            <button href="#">Detalhes</button>
            </form>
            </div>
     <img src="" alt="">
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
    </nav>
    <a href=""><img src="" alt=""></a><!-- Combos-->
    <a href=""><img src="" alt=""></a><!-- X-Lanches -->
    <a href=""><img src="" alt=""></a><!-- Acompanhamentos -->
    <a href=""><img src="" alt=""></a><!-- Bebidas-->
    </section>
    <section id="combos">
        <nav>
            <div class="menu-container">
            <button class="menu-btn" onclick="toggleMenu()">Olá, <?= htmlspecialchars($nome) ?>!</button>
            <div class="menu-opcoes" id="menu">
                <form method="post">
                    <button type="submit" name="editar" href="#">Editar</button>
                    <button type="submit" name="sair" href="#">Sair</button>
                    <button href="#">Detalhes</button>
                    </form>
            </div>
            <img src="" alt="">
            <h1>Combos</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <a href=""><img src="img/combo.triplo.jpeg" alt=""></a><!-- Combo 1-->
        <a href=""><img src="img/combo.familia.batata.jpeg" alt=""></a><!-- Combo 2-->
        <a href=""><img src="img/combo.familia.jpeg" alt=""></a><!-- Combo 3-->
        <a href=""><img src="img/combo.simples.jpeg" alt=""></a><!-- Combo 4-->
        <a href=""><img src="img/combotripo.frango.jpeg" alt=""></a><!-- Combo 5-->
        <section>
            <nav>
            <div class="menu-container">
            <button class="menu-btn" onclick="toggleMenu()">Olá, <?= htmlspecialchars($nome) ?>!</button>
            <div class="menu-opcoes" id="menu">
            <form method="POST">
            <button type="submit" name="editar" href="#">Editar</button>
            <button type="submit" name="sair" href="#">Sair</button>
            <button href="#">Detalhes</button>
            </form>      
            </div>
            <img src="" alt=""> 
            <h1>Combo 1</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="img/combo.triplo.jpeg" alt=""> <!-- Imagem do combo-->
        <p>Uma grande porção de nuggets , uma montanha de batatas fritas no centro, e uma porção farta de linguiça calabresa fatiada e frita. O combo é complementado por três hambúrgueres (feitos com pães de brioche e recheio simples) e é servido com molhos. </p> <!-- Descrição do Combo-->
        <form action="">
            <input type="submit">
            <input type="number">
        </form>
        </section>
        <section>
            <nav>
            <div class="menu-container">
            <button class="menu-btn" onclick="toggleMenu()">Olá, <?= htmlspecialchars($nome) ?>!</button>
            <div class="menu-opcoes" id="menu">
                <form method="post">
            <button type="submit" name="editar" href="#">Editar</button>
            <button type="submit" name="sair" href="#">Sair</button>
            <button href="#">Detalhes</button>
            </form>      
            </div>
            <img src="" alt=""> 
            <h1>Combo 2</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="img/combo.familia.batata.jpeg" alt=""> <!-- Imagem do combo-->
        <p>O centro da bandeja é preenchido por uma montanha de batatas fritas crocantes, banhadas em um cremoso molho de queijo Cheddar derretido. Por cima, elas são carregadas com pedacinhos de bacon crocante. O combo é completado por quatro hambúrguer e acompanha porções individuais de um molho cremoso.</p> <!-- Descrição do Combo-->
        <form action="">
            <input type="submit">
            <input type="number">
        </form>
        </section>
        <section>
            <nav>
            <div class="menu-container">
            <button class="menu-btn" onclick="toggleMenu()">Olá, <?= htmlspecialchars($nome) ?>!</button>
            <div class="menu-opcoes" id="menu">
                <form method="post">
            <button type="submit" name="editar" href="#">Editar</button>
            <button type="submit" name="sair" href="#">Sair</button>
            <button href="#">Detalhes</button>
            </form>      
            </div>
            <img src="" alt=""> 
            <h1>Combo 3</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="img/combo.familia.jpeg" alt="Combo Supremo Hot Chicken"> <!-- Imagem do combo-->
        <p>O combo é centrado em generosos pedaços de frango frito com tempero apimentado, e é decorado com picles de jalapeño. Ele vem acompanhado por uma montanha de batatas fritas temperadas, além de quatro deliciosos hamburgueres de frango acompanhada da salada coleslaw. o combo oferece potinhos de molho extra.</p> <!-- Descrição do Combo-->
        <form action="">
            <input type="submit">
            <input type="number">
        </form>
        </section>
    </section>
    <section id="lanches">
        <nav>
            <div class="menu-container">
            <button class="menu-btn" onclick="toggleMenu()">Olá, <?= htmlspecialchars($nome) ?>!</button>
            </div>
            <img src="" alt="">
            <h1>Lanches</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <a href=""><img src="" alt=""></a><!-- Lanche 1-->
        <a href=""><img src="" alt=""></a><!-- Lanche 2-->
        <a href=""><img src="" alt=""></a><!-- Lanche 3-->
        <section>
            <nav>
            <div class="menu-container">
            <button class="menu-btn" onclick="toggleMenu()">Olá, <?= htmlspecialchars($nome) ?>!</button>
            <div class="menu-opcoes" id="menu">
                <form method="post">
            <button type="submit" name="editar" href="#">Editar</button>
            <button type="submit" name="sair" href="#">Sair</button>
            <button href="#">Detalhes</button>
            </form>      
            </div>
            <img src="" alt=""> 
            <h1>Lanche 1</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="" alt=""> <!-- Imagem do lanche-->
        <p></p> <!-- Descrição do Lanche-->
        <form action="">
            <input type="submit">
            <input type="number">
        </form>
        </section>
        <section>
            <nav>
            <div class="menu-container">
            <button class="menu-btn" onclick="toggleMenu()">Olá, <?= htmlspecialchars($nome) ?>!</button>
            <div class="menu-opcoes" id="menu">
                <form method="post">
            <button type="submit" name="editar" href="#">Editar</button>
            <button type="submit" name="sair" href="#">Sair</button>
            <button href="#">Detalhes</button>
            </form>      
            </div>
            <img src="" alt=""> 
            <h1>Lanche 2</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="" alt=""> <!-- Imagem do lanche-->
        <p></p> <!-- Descrição do Lanche-->
        <form action="">
            <input type="submit">
            <input type="number">
        </form>
        </section>
        <section>
            <nav>
            <div class="menu-container">
            <button class="menu-btn" onclick="toggleMenu()">Olá, <?= htmlspecialchars($nome) ?>!</button>
            <div class="menu-opcoes" id="menu">
                <form method="post">
            <button type="submit" name="editar" href="#">Editar</button>
            <button type="submit" name="sair" href="#">Sair</button>
            <button href="#">Detalhes</button>
            </form>      
            </div>
            <img src="" alt=""> 
            <h1>Lanche 3</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="" alt=""> <!-- Imagem do lanche-->
        <p></p> <!-- Descrição do Lanche-->
        <form action="">
            <input type="submit">
            <input type="number">
        </form>
        </section>
    </section>
    <section id="acompanhamentos">
        <nav>
            <div class="menu-container">
            <button class="menu-btn" onclick="toggleMenu()">Olá, <?= htmlspecialchars($nome) ?>!</button>
            </div>
            <img src="" alt="">
            <h1>Acompanhamentos</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <a href=""><img src="" alt=""></a><!-- Acompanhamento 1-->
        <a href=""><img src="" alt=""></a><!-- Acompanhamento 2-->
        <a href=""><img src="" alt=""></a><!-- Acompanhamento 3-->
        <section>
            <nav>
            <div class="menu-container">
            <button class="menu-btn" onclick="toggleMenu()">Olá, <?= htmlspecialchars($nome) ?>!</button>
            <div class="menu-opcoes" id="menu">
                <form method="post">
            <button type="submit" name="editar" href="#">Editar</button>
            <button type="submit" name="sair" href="#">Sair</button>
            <button href="#">Detalhes</button>
            </form>      
            </div>
            <img src="" alt=""> 
            <h1>Acompanhamento 1</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="" alt=""> <!-- Imagem do Acompanhamento-->
        <p></p> <!-- Descrição do Acompanhamento-->
        <form action="">
            <input type="submit">
            <input type="number">
        </form>
        </section>
        <section>
            <nav>
            <div class="menu-container">
            <button class="menu-btn" onclick="toggleMenu()">Olá, <?= htmlspecialchars($nome) ?>!</button>
            <div class="menu-opcoes" id="menu">
                <form method="post">
            <button type="submit" name="editar" href="#">Editar</button>
            <button type="submit" name="sair" href="#">Sair</button>
            <button href="#">Detalhes</button>
            </form>      
            </div>
            <img src="" alt=""> 
            <h1>Acompanhamento 2</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="" alt=""> <!-- Imagem do Acompanhamento-->
        <p></p> <!-- Descrição do Acompanhamento-->
        <form action="">
            <input type="submit">
            <input type="number">
        </form>
        </section>
        <section>
            <nav>
            <div class="menu-container">
            <button class="menu-btn" onclick="toggleMenu()">Olá, <?= htmlspecialchars($nome) ?>!</button>
            <div class="menu-opcoes" id="menu">
                <form method="post">
            <button type="submit" name="editar" href="#">Editar</button>
            <button type="submit" name="sair" href="#">Sair</button>
            <button href="#">Detalhes</button>
            </form>      
            </div>
            <img src="" alt=""> 
            <h1>Acompanhamento 3</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="" alt=""> <!-- Imagem do Acompanhamento-->
        <p></p> <!-- Descrição do Acompanhamento-->
        <form action="">
            <input type="submit">
            <input type="number">
        </form>
        </section>
    </section>
    <section id="bebidas">
        <nav>
            <div class="menu-container">
            <button>Olá, <?= htmlspecialchars($nome) ?>!
            </div>
            <img src="" alt="">
            <h1>Bebidas</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <a href=""><img src="" alt=""></a><!-- Bebida 1-->
        <a href=""><img src="" alt=""></a><!-- Bebida 2-->
        <a href=""><img src="" alt=""></a><!-- Bebida 3-->
        <section>
            <nav>
            <div class="menu-container">
            <button class="menu-btn" onclick="toggleMenu()">Olá, <?= htmlspecialchars($nome) ?>!</button>
            <div class="menu-opcoes" id="menu">
                <form method="post">
            <button type="submit" name="editar" href="#">Editar</button>
            <button type="submit" name="sair" href="#">Sair</button>
            <button href="#">Detalhes</button>
            </form>      
            </div>
            <img src="" alt=""> 
            <h1>Bebida 1</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="" alt=""> <!-- Imagem da Bebida-->
        <p></p> <!-- Descrição da Bebida-->
        <form action="">
            <input type="submit">
            <input type="number">
        </section>
        <section>
            <nav>
            <div class="menu-container">
            <button class="menu-btn" onclick="toggleMenu()">Olá, <?= htmlspecialchars($nome) ?>!</button>
            <div class="menu-opcoes" id="menu">
                <form method="post">
            <button type="submit" name="editar" href="#">Editar</button>
            <button type="submit" name="sair" href="#">Sair</button>
            <button href="#">Detalhes</button>
            </form>      
            </div>
            <img src="" alt=""> 
            <h1>Bebida 2</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="" alt=""> <!-- Imagem da Bebida-->
        <p></p> <!-- Descrição da Bebida-->
        <form action="">
            <input type="submit">
            <input type="number">
        </section>
        <section>
            <nav>
            <div class="menu-container">
            <button class="menu-btn" onclick="toggleMenu()">Olá, <?= htmlspecialchars($nome) ?>!</button>
            <div class="menu-opcoes" id="menu">
                <form method="post">
            <button type="submit" name="editar" href="#">Editar</button>
            <button type="submit" name="sair" href="#">Sair</button>
            <button href="#">Detalhes</button>
            </form>      
            </div>
            <img src="" alt=""> 
            <h1>Bebida 3</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="" alt=""> <!-- Imagem da Bebida-->
        <p></p> <!-- Descrição da Bebida-->
        <form action="">
            <input type="submit">
            <input type="number">
        </section>
    </section>
</body>
</html>
<script>
  function toggleMenu() {
    const menu = document.getElementById("menu");
    menu.style.display = (menu.style.display === "block") ? "none" : "block";
  }

  // Fecha o menu se clicar fora dele
  window.addEventListener('click', function(e) {
    const menu = document.getElementById("menu");
    const btn = document.querySelector('.menu-btn');
    if (!btn.contains(e.target)) {
      menu.style.display = "none";
    }
  });
</script>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['sair'])) {
        header('Location: index.php');
        exit;
    }
}
?>
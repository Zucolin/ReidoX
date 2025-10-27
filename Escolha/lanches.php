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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../estilo.css">
</head>
<body>
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
        <a href=""><img src="img/lanche.frango.jpeg" alt=""></a><!-- Lanche 1-->
        <a href=""><img src="img/lanche.triplo.jpeg" alt=""></a><!-- Lanche 2-->
        <a href=""><img src="img/lanche.baicon.jpeg" alt=""></a><!-- Lanche 3-->
        <a href=""><img src="img/lanche.cebolitos.jpeg" alt=""></a><!-- Lanche 4-->
        <a href=""><img src="img/lanche.tropical.jpeg" alt=""></a><!-- Lanche 5-->
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
            <img src="img/lanche.frango.jpeg" alt=""> 
            <h1>Lanche de Frango</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="img/lanche.frango.jpeg" alt=""> <!-- Imagem do lanche1-->
        <p>Este lanche é construído em um pão de brioche. O recheio são duas porções de frango empanado e frito. Entre as camadas de frango e no topo da montagem, o lanche leva queijo cheddar derretido e uma cobertura de alface picada. Tudo é finalizado com um molho cremoso</p> <!-- Descrição do Lanche-->
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
            <img src="img/lanche.triplo.jpeg" alt=""> 
            <h1>Lanche Triplo</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="img/lanche.triplo.jpeg" alt=""> <!-- Imagem do lanche-->
        <p>Este é um hambúrguer é caracterizado pelas suas três camadas de carne separadas por fatias de queijo. A montagem inclui uma base de molho cremoso e é coroada com uma mistura de alface, tomate e bacon, todos cobertos por um molho cremoso final.</p> <!-- Descrição do Lanche-->
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
            <img src="img/lanche.baicon.jpeg" alt=""> 
            <h1>Lanche de Bacon</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="img/lanche.baicon.jpeg" alt=""> <!-- Imagem do lanche-->
        <p>Ele é composto por um pão macio de brioche que serve de base para algumas fatias de picles. O recheio consiste em duas de carne de hambúrguer, cada um coberto por uma generosa camada de queijo cheddar derretido. Entre as carnes, e no topo da montagem, encontram-se fatias de bacon crocante e espesso.</p> <!-- Descrição do Lanche-->
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
            <img src="img/lanche.cebolitos.jpeg" alt=""> 
            <h1>Lanche aneis de cebola</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="img/lanche.cebolitos.jpeg" alt=""> <!-- Imagem do lanche-->
        <p>Este Hambúrguer é servido em um pão macio e levemente tostado, a base é um generoso e suculento hambúrguer de carne. Sobre ele uma camada de queijo derretido e tiras de bacon crocante. vem também com uma pilha de anéis de cebola dourados, tudo coroado por um delicioso e cremoso molho.</p> <!-- Descrição do Lanche-->
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
            <img src="img/lanche.tropical.jpeg" alt=""> 
            <h1>Lanche Tropical</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="img/lanche.tropical.jpeg" alt=""> <!-- Imagem do lanche-->
        <p>Este Hambúrguer tem um pão de hambúrguer grelhado, ele começa com uma base fresca de alface, seguida por um hambúrguer de carne bovina. O sabor é intensificado por uma fatia de queijo cheddar derretido .O grande diferencial é a generosa rodela de abacaxi grelhado.</p> <!-- Descrição do Lanche-->
        <form action="">
            <input type="submit">
            <input type="number">
        </form>
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

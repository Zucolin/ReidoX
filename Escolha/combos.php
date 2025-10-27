 <?php

session_start();

// Se clicou em "sair"
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sair'])) {
    session_destroy();
    header('Location: ../index.php');
    exit;
}

// Verifica se o usuário está logado
if (!isset($_SESSION['nome_usuario'])) {
    header('Location: index.php');
    exit;
}
$nome = $_SESSION['nome_usuario'];
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
            <img src="img/combo.triplo.jpeg" alt="">
            <h1>Combos</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <a href="#triplo"><img src="img/combo.triplo.jpeg" alt=""></a><!-- Combo 1-->
        <a href="#batatafamilia"><img src="img/combo.familia.batata.jpeg" alt=""></a><!-- Combo 2-->
        <a href="#familia"><img src="img/combo.familia.jpeg" alt=""></a><!-- Combo 3-->
        <a href="#simples"><img src="img/combo.simples.jpeg" alt=""></a><!-- Combo 4-->
        <a href="#triplofrango"><img src="img/combotripo.frango.jpeg" alt=""></a><!-- Combo 5-->

        <!-- Combo Triplo-->
        <section id="triplo">
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
            <img src="img/combo.triplo.jpeg" alt=""> 
            <h1>Combo Triplo</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="img/combo.triplo.jpeg" alt=""> <!-- Imagem do combo-->
        <p>Acompanha uma grande porção de nuggets, uma montanha de batatas fritas no centro, e uma porção farta de linguiça calabresa fatiada e frita. O combo é complementado por três hambúrgueres (feitos com pães de brioche e recheio simples) e é servido com molhos. </p> <!-- Descrição do Combo-->
        <form action="">
            <input type="submit">
            <input type="number">
        </form>
        </section>

        <!-- Combo Familia-->
        <section id="familia">
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
            <img src="img/combo.familia.batata.jpeg" alt=""> 
            <h1>Combo Familia Batata </h1>
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

        <!-- Combo Familia Batata-->
        <section id="batatafamilia">
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
            <img src="img/combo.familia.batata.jpeg" alt=""> 
            <h1>Combo Familia Batata </h1>
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

        <!-- Combo Familia Frango-->
        <section id="familiafrango">
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
            <img src="img/combo.familia.jpeg" alt=""> 
            <h1>Combo Familia Frango</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="img/combo.familia.jpeg" alt="Combo Supremo Hot Chicken"> <!-- Imagem do combo-->
        <p>O combo é centrado em generosos pedaços de frango frito com tempero apimentado, e com picles de jalapeño. Ele vem acompanhado por uma montanha de batatas fritas temperadas, além de quatro deliciosos hamburgueres de frango acompanhada da salada coleslaw. o combo oferece potinhos de molho extra.</p> <!-- Descrição do Combo-->
        <form action="">
            <input type="submit">
            <input type="number">
        </form>
        </section>


    <!-- Combo Simples-->
      <section id="simples">
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
            <h1>Combo Simples</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="img/combo.simples.jpeg" alt=""> <!-- Imagem do combo 4-->
        <p>No hambúrguer a duas carnes suculentas em um mar de queijo cheddar derretido e pedaços de bacon crocante. com cebola roxa fresca e um molho especial cremoso, envolto em um pão macio. O combo é complementado por uma porção de batatas fritas e uma lata gelada de Coca-Cola Zero.</p> <!-- Descrição do Combo-->
        <form action="">
            <input type="submit">
            <input type="number">
        </form>
        </section>



        <!-- Combo Triplo Frango-->
        <section id="triplofrango">
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
            <h1>Combo Triplo de Frango</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="img/combotripo.frango.jpeg" alt=""> <!-- Imagem do combo 5-->
        <p>O combo tem uma porção de frango frito crocante e uma montanha de batatas fritas. Com hambúrgueres variados: desde o hambúgueres de frango com alface e molho, até hambúrgueres duplos com queijo e, uma opção com carne desfiada, além de uma fusão de frango frito e carne bovina.</p> <!-- Descrição do Combo-->
        <form action="">
            <input type="submit">
            <input type="number">
        </form>
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
        header('Location: ../index.php');
        exit;
    }
}
?>
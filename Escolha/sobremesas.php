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
    <section id="sobremesas">
        <nav>
            <div class="menu-container">
            <button class="menu-btn" onclick="toggleMenu()">Olá, <?= htmlspecialchars($nome) ?>!</button>
            </div>
            <img src="" alt="">
            <h1>Sobremesa</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <a href=""><img src="img/sobrimesa.bolopote.jpeg" alt=""></a><!-- Sobrimesa 1-->
        <a href=""><img src="img/sobrimesa.milkshake.jpeg" alt=""></a><!-- Sobrimesa 2-->
        <a href=""><img src="img/sobrimesa.mousse.jpeg" alt=""></a><!-- Sobrimesa 3-->
        <a href=""><img src="img/sobrimesa.pudim.jpeg" alt=""></a><!-- Sobrimesa 4-->
        <a href=""><img src="img/sobrimesa.torta.jpeg" alt=""></a><!-- Sobrimesa 5-->
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
            <img src="img/sobrimesa.bolopote.jpeg" alt=""> 
            <h1>Bolo de Pote </h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="img/sobrimesa.bolopote.jpeg" alt=""> <!-- Imagem do   sobrimesa-->
        <p>A base da sobremesa é uma mistura de cremes e massas de chocolate, uma camada de creme de chocolate ao leite, uma camada de massa bolo, e uma camada de castanhas, é finalizada no topo com um chantilly e um brigadeiro no topo coberto por castanhas.</p> <!-- Descrição do sobrimesa-->
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
            <img src="img/sobrimesa.milkshake.jpeg" alt=""> 
            <h1>Milkshake </h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="img/sobrimesa.milkshake.jpeg" alt=""> <!-- Imagem do SOBRIMESA-->
        <p>O Milkshake apresenta uma base espessa e gelada de sabor achocolatado, realçada por um ziguezague de calda de chocolate. É coroado com um  farelo de biscoito de chocolate. Finalizado com chantilly</p> <!-- Descrição do SOBRIMESA-->
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
            <img src="img/sobrimesa.mousse.jpeg" alt=""> 
            <h1>Mousse </h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="img/sobrimesa.mousse.jpeg" alt=""> <!-- Imagem do sobremesa-->
        <p>A sobremesa começa com uma base crocante de biscoito de chocolate. Sobre ela, repousam camadas de mousse de chocolate, que variam do doce ao leite e amargo. O topo é coroado com uma espiral de chantilly, lascas de chocolate e framboesas frescas, com um toque de hortelã.</p> <!-- Descrição do sobremesa-->
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
            <img src="img/sobrimesa.pudim.jpeg" alt=""> 
            <h1>Pudim</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="img/sobrimesa.pudim.jpeg" alt=""> <!-- Imagem do sobrimesa-->
        <p>A sobremesa apresenta uma massa suave e aveludada. Ela é banhada por uma calda de caramelo dourado. O prato é decorado com uma coroa de frutas vermelhas frescas. Um toque final de folhas de hortelã.</p> <!-- Descrição do sobrimesa-->
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
            <img src="img/sobrimesa.torta.jpeg" alt=""> 
            <h1>Torta de chocolate</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="img/sobrimesa.torta.jpeg" alt=""> <!-- Imagem do porção-->
        <p>A fatia revela camadas, começando por uma base de bolo de chocolate, seguida por texturas cremosas que variam, indo do chocolate preto ao leite e um creme de baunilha. A torta é finalizada com uma camada lisa de ganache e um ziguezague de calda de chocolate. O toque final é dado pelos biscoitos, que adicionam crocância</p> <!-- Descrição do porção-->
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
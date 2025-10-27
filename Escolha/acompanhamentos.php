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
     <section id="acompanhamentos">
        <nav>
            <div class="menu-container">
            <button class="menu-btn" onclick="toggleMenu()">Olá, <?= htmlspecialchars($nome) ?>!</button>
            </div>
            <img src="img/porção.fritas.jpeg" alt="">
            <h1>Porção</h1>
        <ul>
            <li><a href="paginainicio.php">Inicio</a></li>
            <li><a href="pedidos.php">Pedidos</a></li>
            <li><a href="sobrenos.html">Sobre nós</a></li>
        </ul>
        </nav>
        <a href="#camaroes"><img src="../img/porção.camarão.jpeg" alt=""></a><!-- Porção 1-->
        <a href="#cebolas"><img src="../img/porção.cebolitos.jpeg" alt=""></a><!-- Porção 2-->
        <a href="#churrasco"><img src="../img/porção.churrasco.jpeg" alt=""></a><!-- Porção 3-->
        <a href="#fritas"><img src="../img/porção.fritas.jpeg" alt=""></a><!-- Porção 4-->
        <a href="#peixes"><img src="../img/porção.peixe.jpeg" alt=""></a><!-- Porção 5-->

        <!-- Porção de Camarões-->
        <section id="camaroes">
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
            <img src="../img/porção.camarão.jpeg" alt=""> 
            <h1>Porção de Camarões</h1>
        <ul>
            <li><a href="paginainicio.php">Inicio</a></li>
            <li><a href="pedidos.php">Pedidos</a></li>
            <li><a href="sobrenos.html">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="../img/porção.camarão.jpeg" alt=""> <!-- Imagem do   porção-->
        <p>A travessa apresenta camarões grandes, empanados em uma farinha dourada e fritos. A porção é servida com fatias de limão e um potinho central de molho cremoso e temperado.</p> <!-- Descrição do porção-->
        <form action="post">
            <input type="submit">
            <input type="number">
        </form>
        </section>

        <!-- Porção de Cebola-->
        <section id="cebolas">
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
            <img src="../img/porção.cebolitos.jpeg" alt=""> 
            <h1>Porção Anéis de Cebola </h1>
        <ul>
            <li><a href="paginainicio.php">Inicio</a></li>
            <li><a href="pedidos.php">Pedidos</a></li>
            <li><a href="sobrenos.html">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="../img/porção.cebolitos.jpeg" alt=""> <!-- Imagem do porção-->
        <p>A travessa é preenchida com anéis de cebola grandes, empanados em uma farinha dourada e fritos. A porção é servida com um generoso potinho de molho cremoso no centro.</p> <!-- Descrição do porção-->
        <form action="post">
            <input type="submit">
            <input type="number">
        </form>
        </section>

        <!-- Porção Churrasco-->
        <section id="churrasco">
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
            <img src="../img/porção.churrasco.jpeg" alt=""> 
            <h1>Porção Churrasco</h1>
        <ul>
            <li><a href="paginainicio.php">Inicio</a></li>
            <li><a href="pedidos.php">Pedidos</a></li>
            <li><a href="sobrenos.html">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="../img/porção.churrasco.jpeg" alt=""> <!-- Imagem do porção-->
        <p>O prato é um mix generoso que combina iscas de carne bovina suculenta e cubos de frango grelhado, acompanhados de fatias de linguiça acebolada, inclui uma porção farta de batatas fritas e fatias de pão de alho grelhado. Servido com três opções de molho.</p> <!-- Descrição do porção-->
        <form action="post">
            <input type="submit">
            <input type="number">
        </form>
        </section>

        <!-- Porção de Fritas-->
        <section id="fritas">
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
            <img src="../img/porção.fritas.jpeg" alt=""> 
            <h1>Porção de Fritas</h1>
        <ul>
            <li><a href="paginainicio.php">Inicio</a></li>
            <li><a href="pedidos.php">Pedidos</a></li>
            <li><a href="sobrenos.html">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="../img/porção.fritas.jpeg" alt=""> <!-- Imagem do porção-->
        <p>Ela é composta por uma vasta variedade de batatas fritas,incluindo as clássicas, as onduladas, as em waffle, as em espiral (curly) e os bolinhos de batata (tots). Circulando o mix de batatas, há uma roda de dez molhos diferentes de variadas cores e sabores garantindo que cada mordida tenha um sabor novo e personalizado.</p> <!-- Descrição do porção-->
        <form action="post">
            <input type="submit">
            <input type="number">
        </form>
        </section>

        <!-- Porção Peixes-->
        <section id="peixes">
            <nav>
            <div class="menu-container">
            <button class="menu-btn" onclick="toggleMenu()">Olá, <?= htmlspecialchars($nome) ?>!</button>
            <div class="menu-opcoes" id="menu">
                <form method="post">
            <button type="submit" name="sair">Sair</button>
            </form>      
            </div>
            <img src="../img/logo.jpeg" alt=""> 
        <ul>
            <li><a href="paginainicio.php">Inicio</a></li>
            <li><a href="pedidos.php">Pedidos</a></li>
            <li><a href="sobrenos.html">Sobre nós</a></li>
        </ul>
        </nav>
        <div>
        <img src="../img/porção.peixe.jpeg" alt=""> <!-- Imagem do porção-->
        <h1>Porção Peixe</h1>
        <p>A travessa é generosamente preenchida com pedaços crocantes e dourados de peixe , os empanados servidos sobre uma base fresca de alface. O prato é decorado com fatias de limão. No centro, um molho cremoso e suavemente picante.</p> <!-- Descrição do porção-->
        </div>
        
        <form action="post">
            <label>Quantidade:</label>
            <input type="number" name="quantidade">
            <button><a href=""></a></button>
        </form>
        <section id="">
        <nav>
            <img src="../img/logo.jpeg" alt=""> 
        <ul>
            <li><a href="paginainicio.php">Inicio</a></li>
            <li><a href="pedidos.php">Pedidos</a></li>
            <li><a href="sobrenos.html">Sobre nós</a></li>
        </ul>
        </nav>
        <div>
           <img src="" alt=""> <!-- Imagem do produto-->
        </div>
        <form action="post">
            <h2>Entregar</h2>
            <input name="entrega" type="radio">
        </form>
        <form action="post">
            <h2>Retirar</h2>
            <input name="entrega" type="radio">
        </form>
        <form action="post">
            <h3>Método Pagamento</h3>
            <input name="entrega" type="select">
            <option value="cartao-credito">Cartão de Credito</option>
            <option value="cartao-debito">Cartão de Debito</option>
            <option value="pix">Pix</option>
            <option value="dinheiro">Dinheiro</option>
            <input type="submit">
        </form>
        </section>
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
        header('Location: ../index.php');
        exit;
    }
}
?>

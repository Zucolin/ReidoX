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
     <img src="img/logo.jpeg" alt="">
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
    </nav>
    <a href=""><img src="img/combo.familia.batata.jpeg" alt=""></a><!-- Combos-->
    <a href=""><img src="img/lanche. frango.jpeg" alt=""></a><!-- X-Lanches -->
    <a href=""><img src="img/porção.fritas.jpeg" alt=""></a><!-- Acompanhamentos -->
    <a href=""><img src="img/sobrimesa.torta.jpeg" alt=""></a><!-- Sobrimesas -->
    <a href=""><img src="img/bebida.coca2l.jpeg" alt=""></a><!-- Bebidas-->
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
            <img src="img/combo.triplo.jpeg" alt="">
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
    <section id="Porção">
        <nav>
            <div class="menu-container">
            <button class="menu-btn" onclick="toggleMenu()">Olá, <?= htmlspecialchars($nome) ?>!</button>
            </div>
            <img src="img/porção.fritas.jpeg" alt="">
            <h1>Porção</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <a href=""><img src="img/porção.camarão.jpeg" alt=""></a><!-- Porção 1-->
        <a href=""><img src="img/porção.cebolitos.jpeg" alt=""></a><!-- Porção 2-->
        <a href=""><img src="img/porção.churrasco.jpeg" alt=""></a><!-- Porção 3-->
        <a href=""><img src="img/porção.fritas.jpeg" alt=""></a><!-- Porção 4-->
        <a href=""><img src="img/porção.peixe.jpeg" alt=""></a><!-- Porção 5-->
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
            <img src="img/porção.camarão.jpeg" alt=""> 
            <h1>Porção de Camarões</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="img/porção.camarão.jpeg" alt=""> <!-- Imagem do   porção-->
        <p>A travessa apresenta camarões grandes, empanados em uma farinha dourada e fritos. A porção é servida com fatias de limão e um potinho central de molho cremoso e temperado.</p> <!-- Descrição do porção-->
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
            <img src="img/porção.cebolitos.jpeg" alt=""> 
            <h1>Porção Anéis de Cebola </h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="img/porção.cebolitos.jpeg" alt=""> <!-- Imagem do porção-->
        <p>A travessa é preenchida com anéis de cebola grandes, empanados em uma farinha dourada e fritos. A porção é servida com um generoso potinho de molho cremoso no centro.</p> <!-- Descrição do porção-->
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
            <img src="img/porção.churrasco.jpeg" alt=""> 
            <h1>Porção Churrasco</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="img/porção.churrasco.jpeg" alt=""> <!-- Imagem do porção-->
        <p>O prato é um mix generoso que combina iscas de carne bovina suculenta e cubos de frango grelhado, acompanhados de fatias de linguiça acebolada, inclui uma porção farta de batatas fritas e fatias de pão de alho grelhado. Servido com três opções de molho.</p> <!-- Descrição do porção-->
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
            <img src="img/porção.fritas.jpeg" alt=""> 
            <h1>Porção de Fritas</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="img/porção.fritas.jpeg" alt=""> <!-- Imagem do porção-->
        <p>Ela é composta por uma vasta variedade de batatas fritas,incluindo as clássicas, as onduladas, as em waffle, as em espiral (curly) e os bolinhos de batata (tots). Circulando o mix de batatas, há uma roda de dez molhos diferentes de variadas cores e sabores garantindo que cada mordida tenha um sabor novo e personalizado.</p> <!-- Descrição do porção-->
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
            <img src="img/porção.peixe.jpeg" alt=""> 
            <h1>Porção Peixe</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="img/porção.peixe.jpeg" alt=""> <!-- Imagem do porção-->
        <p>A travessa é generosamente preenchida com pedaços crocantes e dourados de peixe , os empanados servidos sobre uma base fresca de alface. O prato é decorado com fatias de limão. No centro, um molho cremoso e suavemente picante.</p> <!-- Descrição do porção-->
        <form action="">
            <input type="submit">
            <input type="number">
        </form>
        </section>




        

</section>
    <section id="Sobrimesa">
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
        <a href=""><img src="img/bebida.coca1,5.jpeg" alt=""></a><!-- Bebida 1-->
        <a href=""><img src="img/bebida.coca2l.jpeg" alt=""></a><!-- Bebida 2-->
        <a href=""><img src="img/bebida.energetico.jpeg" alt=""></a><!-- Bebida 3-->
        <a href=""><img src="img/bebida.fanta.jpeg" alt=""></a><!-- Bebida 4-->
        <a href=""><img src="img/bebida.guarana.jpeg" alt=""></a><!-- Bebida 5-->
        <a href=""><img src="img/bebida.sprite.jpeg" alt=""></a><!-- Bebida 6-->
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
            <img src="img/bebida.coca1,5.jpeg" alt=""> 
            <h1>Coca-Cola</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="img/bebida.coca1,5.jpeg" alt=""> <!-- Imagem da Bebida-->
        <p>Coca-Cola de 1,5L </p> <!-- Descrição da Bebida-->
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
            <img src="img/bebida.coca2l.jpeg" alt=""> 
            <h1>Coca-Cola</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="img/bebida.coca2l.jpeg" alt=""> <!-- Imagem da Bebida-->
        <p>Coca-Cola de 2L </p> <!-- Descrição da Bebida-->
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
            <img src="img/bebida.energetico.jpeg" alt=""> 
            <h1>Energetico</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="img/bebida.energetico.jpeg" alt=""> <!-- Imagem da Bebida-->
        <p>Lata de energetico, Monster Mango Loco</p> <!-- Descrição da Bebida-->
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
            <img src="img/bebida.fanta.jpeg" alt=""> 
            <h1>Fanta</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="img/bebida.fanta.jpeg" alt=""> <!-- Imagem da Bebida-->
        <p>Lata de fanta </p> <!-- Descrição da Bebida-->
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
            <img src="img/bebida.guarana.jpeg" alt=""> 
            <h1>Guaraná</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="img/bebida.guarana.jpeg" alt=""> <!-- Imagem da Bebida-->
        <p>Guaraná 2L </p> <!-- Descrição da Bebida-->
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
            <img src="img/bebida.sprite.jpeg" alt=""> 
            <h1>Sprite</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <img src="img/bebida.sprite.jpeg" alt=""> <!-- Imagem da Bebida-->
        <p>Sprite 2L </p> <!-- Descrição da Bebida-->
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
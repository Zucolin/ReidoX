<?php


    session_start();

    // Verifica se o usuário está logado
    if (!isset($_SESSION['nome_usuario'])) {
        header('Location: index.php');
        exit;
    }

    
    $nome = $_SESSION['nome_usuario'];

    // Se chegou aqui, usuário está logado
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rei do X</title>
</head>
<body>
    

    <section id="inicio">
    <header>
        <div style="position: absolute; top: 10px; right: 20px;">
         Olá, <?= htmlspecialchars($nome) ?>!
        </div>
        <img src="" alt="">
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
    </header>
    <a href=""><img src="" alt=""></a><!-- Combos-->
    <a href=""><img src="" alt=""></a><!-- X-Lanches -->
    <a href=""><img src="" alt=""></a><!-- Acompanhamentos -->
    <a href=""><img src="" alt=""></a><!-- Bebidas-->
    </section>
    <section id="combos">
        <header>
            <img src="" alt="">
            <h1>Combos</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </header>
        <a href=""><img src="" alt=""></a><!-- Combo 1-->
        <a href=""><img src="" alt=""></a><!-- Combo 2-->
        <a href=""><img src="" alt=""></a><!-- Combo 3-->
        <section>
            <header>
            <img src="" alt=""> 
            <h1>Combo 1</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </header>
        <img src="" alt=""> <!-- Imagem do combo-->
        <p></p> <!-- Descrição do Combo-->
        <form action="">
            <input type="submit">
            <input type="number">
        </form>
        </section>
        <section>
            <header>
            <img src="" alt=""> 
            <h1>Combo 2</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </header>
        <img src="" alt=""> <!-- Imagem do combo-->
        <p></p> <!-- Descrição do Combo-->
        <form action="">
            <input type="submit">
            <input type="number">
        </form>
        </section>
        <section>
            <header>
            <img src="" alt=""> 
            <h1>Combo 3</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </header>
        <img src="" alt=""> <!-- Imagem do combo-->
        <p></p> <!-- Descrição do Combo-->
        <form action="">
            <input type="submit">
            <input type="number">
        </form>
        </section>
    </section>
    <section id="lanches">
        <header>
            <img src="" alt="">
            <h1>Lanches</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </header>
        <a href=""><img src="" alt=""></a><!-- Lanche 1-->
        <a href=""><img src="" alt=""></a><!-- Lanche 2-->
        <a href=""><img src="" alt=""></a><!-- Lanche 3-->
        <section>
            <header>
            <img src="" alt=""> 
            <h1>Lanche 1</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </header>
        <img src="" alt=""> <!-- Imagem do lanche-->
        <p></p> <!-- Descrição do Lanche-->
        <form action="">
            <input type="submit">
            <input type="number">
        </form>
        </section>
        <section>
            <header>
            <img src="" alt=""> 
            <h1>Lanche 2</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </header>
        <img src="" alt=""> <!-- Imagem do lanche-->
        <p></p> <!-- Descrição do Lanche-->
        <form action="">
            <input type="submit">
            <input type="number">
        </form>
        </section>
        <section>
            <header>
            <img src="" alt=""> 
            <h1>Lanche 3</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </header>
        <img src="" alt=""> <!-- Imagem do lanche-->
        <p></p> <!-- Descrição do Lanche-->
        <form action="">
            <input type="submit">
            <input type="number">
        </form>
        </section>
    </section>
    <section id="acompanhamentos">
        <header>
            <img src="" alt="">
            <h1>Acompanhamentos</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </header>
        <a href=""><img src="" alt=""></a><!-- Acompanhamento 1-->
        <a href=""><img src="" alt=""></a><!-- Acompanhamento 2-->
        <a href=""><img src="" alt=""></a><!-- Acompanhamento 3-->
        <section>
            <header>
            <img src="" alt=""> 
            <h1>Acompanhamento 1</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </header>
        <img src="" alt=""> <!-- Imagem do Acompanhamento-->
        <p></p> <!-- Descrição do Acompanhamento-->
        <form action="">
            <input type="submit">
            <input type="number">
        </form>
        </section>
        <section>
            <header>
            <img src="" alt=""> 
            <h1>Acompanhamento 2</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </header>
        <img src="" alt=""> <!-- Imagem do Acompanhamento-->
        <p></p> <!-- Descrição do Acompanhamento-->
        <form action="">
            <input type="submit">
            <input type="number">
        </form>
        </section>
        <section>
            <header>
            <img src="" alt=""> 
            <h1>Acompanhamento 3</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </header>
        <img src="" alt=""> <!-- Imagem do Acompanhamento-->
        <p></p> <!-- Descrição do Acompanhamento-->
        <form action="">
            <input type="submit">
            <input type="number">
        </form>
        </section>
    </section>
    <section id="bebidas">
        <header>
            <img src="" alt="">
            <h1>Bebidas</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </header>
        <a href=""><img src="" alt=""></a><!-- Bebida 1-->
        <a href=""><img src="" alt=""></a><!-- Bebida 2-->
        <a href=""><img src="" alt=""></a><!-- Bebida 3-->
        <section>
            <header>
            <img src="" alt=""> 
            <h1>Bebida 1</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </header>
        <img src="" alt=""> <!-- Imagem da Bebida-->
        <p></p> <!-- Descrição da Bebida-->
        <form action="">
            <input type="submit">
            <input type="number">
        </section>
    </section>
</body>
</html>
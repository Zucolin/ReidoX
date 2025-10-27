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
  
 </head>
 <body>
    <section id="bebidas">
        <nav>
                <div class="menu-container">
                    <button class="menu-btn" onclick="toggleMenu(this)">Olá, <?= htmlspecialchars($nome) ?>!</button>
                    <div class="menu-opcoes">
                        <form method="post">
                            <button type="submit" name="editar">Editar</button>
                            <button type="submit" name="sair">Sair</button>
                            <button type="button">Detalhes</button>
                        </form>
                    </div>
                </div>
            <img src="" alt="">
            <h1>Bebidas</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <a href="#coca1.5"><img src="img/bebida.coca1,5.jpeg" alt=""></a><!-- Bebida 1-->
        <a href="#coca2"><img src="img/bebida.coca2l.jpeg" alt=""></a><!-- Bebida 2-->
        <a href="#energetico"><img src="img/bebida.energetico.jpeg" alt=""></a><!-- Bebida 3-->
        <a href="#fanta"><img src="img/bebida.fanta.jpeg" alt=""></a><!-- Bebida 4-->
        <a href="#guarana"><img src="img/bebida.guarana.jpeg" alt=""></a><!-- Bebida 5-->
        <a href="#sprite"><img src="img/bebida.sprite.jpeg" alt=""></a><!-- Bebida 6-->

        <!-- Coca Cola 1.5-->
        <section id="coca1.5">
           <nav>
                <div class="menu-container">
                    <button class="menu-btn" onclick="toggleMenu(this)">Olá, <?= htmlspecialchars($nome) ?>!</button>
                    <div class="menu-opcoes">
                        <form method="post">
                            <button type="submit" name="editar">Editar</button>
                            <button type="submit" name="sair">Sair</button>
                            <button type="button">Detalhes</button>
                        </form>
                    </div>
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

        <!-- Coca Cola 2-->
        <section class="coca2">
           <nav>
                <div class="menu-container">
                    <button class="menu-btn" onclick="toggleMenu(this)">Olá, <?= htmlspecialchars($nome) ?>!</button>
                    <div class="menu-opcoes">
                        <form method="post">
                            <button type="submit" name="editar">Editar</button>
                            <button type="submit" name="sair">Sair</button>
                            <button type="button">Detalhes</button>
                        </form>
                    </div>
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

        <!-- Energetico-->
        <section class="energetico">
           <nav>
                <div class="menu-container">
                    <button class="menu-btn" onclick="toggleMenu(this)">Olá, <?= htmlspecialchars($nome) ?>!</button>
                    <div class="menu-opcoes">
                        <form method="post">
                            <button type="submit" name="editar">Editar</button>
                            <button type="submit" name="sair">Sair</button>
                            <button type="button">Detalhes</button>
                        </form>
                    </div>
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

        <!-- Fanta-->
        <section id="fanta">
           <nav>
                <div class="menu-container">
                    <button class="menu-btn" onclick="toggleMenu(this)">Olá, <?= htmlspecialchars($nome) ?>!</button>
                    <div class="menu-opcoes">
                        <form method="post">
                            <button type="submit" name="editar">Editar</button>
                            <button type="submit" name="sair">Sair</button>
                            <button type="button">Detalhes</button>
                        </form>
                    </div>
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

        <!-- Guaraná-->
         <section id="guarana">
           <nav>
                <div class="menu-container">
                    <button class="menu-btn" onclick="toggleMenu(this)">Olá, <?= htmlspecialchars($nome) ?>!</button>
                    <div class="menu-opcoes">
                        <form method="post">
                            <button type="submit" name="editar">Editar</button>
                            <button type="submit" name="sair">Sair</button>
                            <button type="button">Detalhes</button>
                        </form>
                    </div>
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



        <!-- Sprite-->
         <section id="sprite">
           <nav>
                <div class="menu-container">
                    <button class="menu-btn" onclick="toggleMenu(this)">Olá, <?= htmlspecialchars($nome) ?>!</button>
                    <div class="menu-opcoes">
                        <form method="post">
                            <button type="submit" name="editar">Editar</button>
                            <button type="submit" name="sair">Sair</button>
                            <button type="button">Detalhes</button>
                        </form>
                    </div>
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
 
<script>
function toggleMenu(button) {
    // Pega o menu correspondente ao botão clicado dentro do mesmo container
    const menu = button.parentElement.querySelector('.menu-opcoes');
    menu.style.display = (menu.style.display === "block") ? "none" : "block";
}

// Fecha todos os menus se clicar fora
window.addEventListener('click', function(e) {
    document.querySelectorAll('.menu-opcoes').forEach(menu => {
        const btn = menu.parentElement.querySelector('.menu-btn');
        if (menu.style.display === "block" && !btn.contains(e.target) && !menu.contains(e.target)) {
            menu.style.display = "none";
        }
    });
});
</script>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['sair'])) {
        header('Location: ../index.php');
        exit;
    }
}
?>
 
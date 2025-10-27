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
            <li><a href="paginainicio.php">Inicio</a></li>
            <li><a href="pedidos.php">Pedidos</a></li>
            <li><a href="sobrenos.html">Sobre nós</a></li>
        </ul>
    </nav>
    <a href="Escolha/combos.php"><img src="img/combo.familia.batata.jpeg" alt=""></a><!-- Combos-->
    <a href="Escolha/lanches.php"><img src="img/lanche. frango.jpeg" alt=""></a><!-- X-Lanches -->
    <a href="Escolha/acompanhamentos.php"><img src="img/porção.fritas.jpeg" alt=""></a><!-- Acompanhamentos -->
    <a href="Escolha/sobremesas.php"><img src="img/sobrimesa.torta.jpeg" alt=""></a><!-- Sobrimesas -->
    <a href="Escolha/bebidas.php"><img src="img/bebida.coca2l.jpeg" alt=""></a><!-- Bebidas-->
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
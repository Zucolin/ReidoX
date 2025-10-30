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
    </section>
    <section id="lanches">
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
            <h1>Lanches</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <a href="#x-cheese"><img src="../img/X_CheeseBurguer.png" alt=""></a><!-- Lanche 1-->
        <a href="#x-bacon"><img src="../img/X_Bacon.png" alt=""></a><!-- Lanche 2-->
        <a href="#x-catupiry"><img src="../img/X_CatupiryBacon.png" alt=""></a><!-- Lanche 3-->
        <a href="#x-chicken"><img src="../img/X_Chicken.png" alt=""></a><!-- Lanche 4-->
        <a href="#x-costela"><img src="../img/X_Costela.png" alt=""></a><!-- Lanche 5-->
        <a href="#x-salada"><img src="../img/X_Salada.png" alt=""></a><!-- Lanche 6-->
        <a href="#x-tudo"><img src="../img/X_Tudo.png" alt=""></a><!-- Lanche 7-->

        <!-- Cheese Burguer-->
   <!-- Produto: Cheese Burguer -->

<!-- 1ª seção: Página de escolha do produto -->
    
<section id="x-cheese">
    <div>
        <img src="../img/X_CheeseBurguer.png" alt="">
        <h1>X-Cheese Burguer</h1>
        <p>Pão e Maionese da Casa, Hambúrguer prensado e Queijo Cheddar derretido.</p>
    </div>
    <form method="post">
        <label>Quantidade:</label>
        <input type="number" name="quantidade">
        <button><a href="#finalizacaocheeseburguer">Comprar</a></button>
    </form>

<!-- 3ª seção: Finalização da compra -->
    <section id="finalizacaocheeseburguer">
        <nav>
            <img src="../img/logo.jpeg" alt="">
            <ul>
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div>
            <img src="../img/X_CheeseBurguer.png" alt="">
        </div>
        <form method="post">
            <h2>Entregar</h2>
            <input name="entrega" type="radio">
        </form>
        <form method="post">
            <h2>Retirar</h2>
            <input name="entrega" type="radio">
        </form>
        <form method="post">
            <h3>Método Pagamento</h3>
            <select name="pagamento">
                <option value="cartao-credito">Cartão de Crédito</option>
                <option value="cartao-debito">Cartão de Débito</option>
                <option value="pix">Pix</option>
                <option value="dinheiro">Dinheiro</option>
            </select>
            <input type="submit">
        </form>
    </section>
</section>
<!-- Produto: x-bacon -->

<!-- 1ª seção: Página de escolha do produto -->
<section id="x-bacon">
    <div>
        <img src="../img/X_Bacon.png" alt="">
        <h1>X-Bacon</h1>
        <p>Pão Especial, Maionese da Casa, Hambúrguer prensado, Queijo Cheddar e Bacon em tiras.</p>
    </div>
    <form method="post">
        <label>Quantidade:</label>
        <input type="number" name="quantidade">
        <button><a href="#finalizacaox-bacon">Comprar</a></button>
    </form>

<!-- 3ª seção: Finalização da compra -->
    <section id="finalizacaox-bacon">
        <nav>
            <img src="../img/logo.jpeg" alt="">
            <ul>
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div>
            <img src="../img/X_Bacon.png" alt="">
        </div>
        <form method="post">
            <h2>Entregar</h2>
            <input name="entrega" type="radio">
        </form>
        <form method="post">
            <h2>Retirar</h2>
            <input name="entrega" type="radio">
        </form>
        <form method="post">
            <h3>Método Pagamento</h3>
            <select name="pagamento">
                <option value="cartao-credito">Cartão de Crédito</option>
                <option value="cartao-debito">Cartão de Débito</option>
                <option value="pix">Pix</option>
                <option value="dinheiro">Dinheiro</option>
            </select>
            <input type="submit">
        </form>
    </section>
</section>

<!-- Produto: x-catupiry -->

<!-- 1ª seção: Página de escolha do produto -->
<section id="x-catupiry">
    <div>
        <img src="../img/X_CatupiryBacon.png" alt="">
        <h1>X-Catupiry Bacon</h1>
        <p>Pão da Casa, Molho de Tomate Le Pinguê, Hambúrguer, Catupiry e Bacon crocante.</p>
    </div>
    <form method="post">
        <label>Quantidade:</label>
        <input type="number" name="quantidade">
        <button><a href="#finalizacaox-catupiry">Comprar</a></button>
    </form>

<!-- 3ª seção: Finalização da compra -->
    <section id="finalizacaox-catupiry">
        <nav>
            <img src="../img/logo.jpeg" alt="">
            <ul>
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div>
            <img src="../img/X_CatupiryBacon.png" alt="">
        </div>
        <form method="post">
            <h2>Entregar</h2>
            <input name="entrega" type="radio">
        </form>
        <form method="post">
            <h2>Retirar</h2>
            <input name="entrega" type="radio">
        </form>
        <form method="post">
            <h3>Método Pagamento</h3>
            <select name="pagamento">
                <option value="cartao-credito">Cartão de Crédito</option>
                <option value="cartao-debito">Cartão de Débito</option>
                <option value="pix">Pix</option>
                <option value="dinheiro">Dinheiro</option>
            </select>
            <input type="submit">
        </form>
    </section>
</section>
<!-- Produto: x-chicken -->

<!-- 1ª seção: Página de escolha do produto -->
<section id="x-chicken">
    <div>
        <img src="../img/X_Chicken.png" alt="">
        <h1>X-Chicken</h1>
        <p>Pão e Maionese da Casa, Hambúrguer de Frango empanado e Alface.</p>
    </div>
    <form method="post">
        <label>Quantidade:</label>
        <input type="number" name="quantidade">
        <button><a href="#finalizax-chicken">Comprar</a></button>
    </form>


<!-- 3ª seção: Finalização da compra -->
    <section id="finalizacaox-chicken">
        <nav>
            <img src="../img/logo.jpeg" alt="">
            <ul>
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div>
            <img src="../img/X_Chicken.png" alt="">
        </div>
        <form method="post">
            <h2>Entregar</h2>
            <input name="entrega" type="radio">
        </form>
        <form method="post">
            <h2>Retirar</h2>
            <input name="entrega" type="radio">
        </form>
        <form method="post">
            <h3>Método Pagamento</h3>
            <select name="pagamento">
                <option value="cartao-credito">Cartão de Crédito</option>
                <option value="cartao-debito">Cartão de Débito</option>
                <option value="pix">Pix</option>
                <option value="dinheiro">Dinheiro</option>
            </select>
            <input type="submit">
        </form>
    </section>
</section>
<!-- Produto: x-costela -->

<!-- 1ª seção: Página de escolha do produto -->
<section id="x-costela">
    <div>
        <img src="../img/X-Costela" alt="">
        <h1>X-Costela</h1>
        <p>Pão e Maionese da Casa, Bacon crocante, Hambúrguer de Costela, Queijo Provolone, Molho Barbecue e Cebola Roxa.</p>
    </div>
    <form method="post">
        <label>Quantidade:</label>
        <input type="number" name="quantidade">
        <button><a href="#finalizacaox-costela">Comprar</a></button>
    </form>


<!-- 3ª seção: Finalização da compra -->
    <section id="finalizacaox-costela">
        <nav>
            <img src="../img/logo.jpeg" alt="">
            <ul>
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div>
            <img src="../img/X-Costela" alt="">
        </div>
        <form method="post">
            <h2>Entregar</h2>
            <input name="entrega" type="radio">
        </form>
        <form method="post">
            <h2>Retirar</h2>
            <input name="entrega" type="radio">
        </form>
        <form method="post">
            <h3>Método Pagamento</h3>
            <select name="pagamento">
                <option value="cartao-credito">Cartão de Crédito</option>
                <option value="cartao-debito">Cartão de Débito</option>
                <option value="pix">Pix</option>
                <option value="dinheiro">Dinheiro</option>
            </select>
            <input type="submit">
        </form>
    </section>
</section>
<!-- Produto: x-salada -->

<!-- 1ª seção: Página de escolha do produto -->
<section id="x-salada">
    <div>
        <img src="../img/X_Salada.png" alt="">
        <h1>X-Salada</h1>
        <p>Pão Especial, Maionese da Casa, Hambúrguer prensado, Queijo Cheddar, Alface e Tomate.</p>
    </div>
    <form method="post">
        <label>Quantidade:</label>
        <input type="number" name="quantidade">
        <button><a href="#finalizacaox-salada">Comprar</a></button>
    </form>


<!-- 3ª seção: Finalização da compra -->
    <section id="finalizacaox-salada">
        <nav>
            <img src="../img/logo.jpeg" alt="">
            <ul>
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div>
            <img src="../img/X-Salada.png" alt="">
        </div>
        <form method="post">
            <h2>Entregar</h2>
            <input name="entrega" type="radio">
        </form>
        <form method="post">
            <h2>Retirar</h2>
            <input name="entrega" type="radio">
        </form>
        <form method="post">
            <h3>Método Pagamento</h3>
            <select name="pagamento">
                <option value="cartao-credito">Cartão de Crédito</option>
                <option value="cartao-debito">Cartão de Débito</option>
                <option value="pix">Pix</option>
                <option value="dinheiro">Dinheiro</option>
            </select>
            <input type="submit">
        </form>
    </section>
</section>
<!-- Produto: x-tudo -->

<!-- 1ª seção: Página de escolha do produto -->
<section id="x-tudo">
    <div>
        <img src="../img/X_Tudo.png" alt="">
        <h1>X-Tudo</h1>
        <p>Pão da Casa, Maionese de Bacon, Hambúrguer, Queijo Muçarela, Cebola Roxa, Alface e Tomate.</p>
    </div>
    <form method="post">
        <label>Quantidade:</label>
        <input type="number" name="quantidade">
        <button><a href="#finalizacaox-tudo">Comprar</a></button>
    </form>


<!-- 3ª seção: Finalização da compra -->
    <section id="finalizacaox-tudo">
        <nav>
            <img src="../img/logo.jpeg" alt="">
            <ul>
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div>
            <img src="../img/X_Tudo.png" alt="">
        </div>
        <form method="post">
            <h2>Entregar</h2>
            <input name="entrega" type="radio">
        </form>
        <form method="post">
            <h2>Retirar</h2>
            <input name="entrega" type="radio">
        </form>
        <form method="post">
            <h3>Método Pagamento</h3>
            <select name="pagamento">
                <option value="cartao-credito">Cartão de Crédito</option>
                <option value="cartao-debito">Cartão de Débito</option>
                <option value="pix">Pix</option>
                <option value="dinheiro">Dinheiro</option>
            </select>
            <input type="submit">
        </form>
    </section>
</section>

</body>
</html>
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
 

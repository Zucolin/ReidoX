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
        <a href="#xfrango"><img src="../img/lanche.frango.jpeg" alt=""></a><!-- Lanche 1-->
        <a href="#xtriplo"><img src="../img/lanche.triplo.jpeg" alt=""></a><!-- Lanche 2-->
        <a href="#xbacon"><img src="../img/lanche.baicon.jpeg" alt=""></a><!-- Lanche 3-->
        <a href="#xcebola"><img src="../img/lanche.cebolitos.jpeg" alt=""></a><!-- Lanche 4-->
        <a href="#xtropical"><img src="../img/lanche.tropical.jpeg" alt=""></a><!-- Lanche 5-->

        <!-- Lanche de Frango-->
   <!-- Produto: Lanche de Frango -->

<!-- 1ª seção: Página de escolha do produto -->
    
<section id="xfrango">
    <div>
        <img src="../img/lanche.frango.jpeg" alt="">
        <h1>Lanche de Frango</h1>
        <p>Este lanche é construído em um pão de brioche. O recheio são duas porções de frango empanado e frito. Entre as camadas de frango e no topo da montagem, o lanche leva queijo cheddar derretido e uma cobertura de alface picada. Tudo é finalizado com um molho cremoso.</p>
    </div>
    <form method="post">
        <label>Quantidade:</label>
        <input type="number" name="quantidade">
        <button><a href="#finalizacaofrango">Comprar</a></button>
    </form>

<!-- 3ª seção: Finalização da compra -->
    <section id="finalizacaofrango">
        <nav>
            <img src="../img/logo.jpeg" alt="">
            <ul>
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div>
            <img src="../img/lanche.frango.jpeg" alt="">
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
<!-- Produto: Lanche Triplo -->

<!-- 1ª seção: Página de escolha do produto -->
<section id="xtriplo">
    <div>
        <img src="../img/lanche.triplo.jpeg" alt="">
        <h1>Lanche Triplo</h1>
        <p>Este hambúrguer é caracterizado pelas suas três camadas de carne separadas por fatias de queijo. A montagem inclui uma base de molho cremoso e é coroada com uma mistura de alface, tomate e bacon, todos cobertos por um molho cremoso final.</p>
    </div>
    <form method="post">
        <label>Quantidade:</label>
        <input type="number" name="quantidade">
        <button><a href="#finalizacaotriplo">Comprar</a></button>
    </form>

<!-- 3ª seção: Finalização da compra -->
    <section id="finalizacaotriplo">
        <nav>
            <img src="../img/logo.jpeg" alt="">
            <ul>
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div>
            <img src="../img/lanche.triplo.jpeg" alt="">
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

<!-- Produto: Lanche Triplo -->

<!-- 1ª seção: Página de escolha do produto -->
<section id="xtriplo">
    <div>
        <img src="../img/lanche.triplo.jpeg" alt="">
        <h1>Lanche Triplo</h1>
        <p>Este hambúrguer é caracterizado pelas suas três camadas de carne separadas por fatias de queijo. A montagem inclui uma base de molho cremoso e é coroada com uma mistura de alface, tomate e bacon, todos cobertos por um molho cremoso final.</p>
    </div>
    <form method="post">
        <label>Quantidade:</label>
        <input type="number" name="quantidade">
        <button><a href="#finalizacaotriplo">Comprar</a></button>
    </form>

<!-- 3ª seção: Finalização da compra -->
    <section id="finalizacaotriplo">
        <nav>
            <img src="../img/logo.jpeg" alt="">
            <ul>
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div>
            <img src="../img/lanche.triplo.jpeg" alt="">
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
<!-- Produto: Lanche Aneis de Cebola -->

<!-- 1ª seção: Página de escolha do produto -->
<section id="xcebola">
    <div>
        <img src="../img/lanche.cebolitos.jpeg" alt="">
        <h1>Lanche Aneis de Cebola</h1>
        <p>Este Hambúrguer é servido em um pão macio e levemente tostado, a base é um generoso e suculento hambúrguer de carne. Sobre ele uma camada de queijo derretido e tiras de bacon crocante. Vem também com uma pilha de anéis de cebola dourados, tudo coroado por um delicioso e cremoso molho.</p>
    </div>
    <form method="post">
        <label>Quantidade:</label>
        <input type="number" name="quantidade">
        <button><a href="#finalizacaocebola">Comprar</a></button>
    </form>


<!-- 3ª seção: Finalização da compra -->
    <section id="finalizacaocebola">
        <nav>
            <img src="../img/logo.jpeg" alt="">
            <ul>
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div>
            <img src="../img/lanche.cebolitos.jpeg" alt="">
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
<!-- Produto: Lanche Aneis de Cebola -->

<!-- 1ª seção: Página de escolha do produto -->
<section id="xcebola">
    <div>
        <img src="../img/lanche.cebolitos.jpeg" alt="">
        <h1>Lanche Aneis de Cebola</h1>
        <p>Este Hambúrguer é servido em um pão macio e levemente tostado, a base é um generoso e suculento hambúrguer de carne. Sobre ele uma camada de queijo derretido e tiras de bacon crocante. Vem também com uma pilha de anéis de cebola dourados, tudo coroado por um delicioso e cremoso molho.</p>
    </div>
    <form method="post">
        <label>Quantidade:</label>
        <input type="number" name="quantidade">
        <button><a href="#finalizacaocebola">Comprar</a></button>
    </form>


<!-- 3ª seção: Finalização da compra -->
    <section id="finalizacaocebola">
        <nav>
            <img src="../img/logo.jpeg" alt="">
            <ul>
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div>
            <img src="../img/lanche.cebolitos.jpeg" alt="">
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
 

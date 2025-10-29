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
    <section id="sobremesas">
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
            <h1>Sobremesa</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <a href="#bolopote"><img src="img/sobrimesa.bolopote.jpeg" alt=""></a><!-- Sobrimesa 1-->
        <a href="#milkshake"><img src="img/sobrimesa.milkshake.jpeg" alt=""></a><!-- Sobrimesa 2-->
        <a href="#mousse"><img src="img/sobrimesa.mousse.jpeg" alt=""></a><!-- Sobrimesa 3-->
        <a href="#pudim"><img src="img/sobrimesa.pudim.jpeg" alt=""></a><!-- Sobrimesa 4-->
        <a href="#torta"><img src="img/sobrimesa.torta.jpeg" alt=""></a><!-- Sobrimesa 5-->

<!-- Sobremesa: Bolo de Pote -->

<!-- 1ª Seção: Página de escolha do produto -->
<section id="bolopote">
    <div>
        <img src="img/sobrimesa.bolopote.jpeg" alt="">
        <h1>Bolo de Pote</h1>
        <p>A base da sobremesa é uma mistura de cremes e massas de chocolate, uma camada de creme de chocolate ao leite, uma camada de massa bolo, e uma camada de castanhas, finalizada com chantilly e um brigadeiro coberto por castanhas.</p>
    </div>
    <form method="post">
        <label>Quantidade:</label>
        <input type="number" name="quantidade">
        <button><a href="#finalizacaobolopote">Comprar</a></button>
    </form>


<!-- 3ª Seção: Finalização da compra -->
    <section id="finalizacaobolopote">
        <nav>
            <img src="../img/logo.jpeg" alt="">
            <ul>
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div>
            <img src="img/sobrimesa.bolopote.jpeg" alt="">
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
<!-- Sobremesa: Milkshake -->

<!-- 1ª Seção: Página de escolha do produto -->
<section id="milkshake">
    <div>
        <img src="img/sobrimesa.milkshake.jpeg" alt="">
        <h1>Milkshake</h1>
        <p>O Milkshake apresenta uma base espessa e gelada de sabor achocolatado, realçada por um ziguezague de calda de chocolate. É coroado com farelo de biscoito de chocolate e finalizado com chantilly.</p>
    </div>
    <form method="post">
        <label>Quantidade:</label>
        <input type="number" name="quantidade">
        <button><a href="#finalizacaomilkshake">Comprar</a></button>
    </form>


<!-- 3ª Seção: Finalização da compra -->
    <section id="finalizacaomilkshake">
        <nav>
            <img src="../img/logo.jpeg" alt="">
            <ul>
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div>
            <img src="img/sobrimesa.milkshake.jpeg" alt="">
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
<!-- Sobremesa: Mousse de Chocolate -->

<!-- 1ª Seção: Página de escolha do produto -->
<section id="mousse">
    <div>
        <img src="img/sobrimesa.mousse.jpeg" alt="">
        <h1>Mousse de Chocolate</h1>
        <p>A sobremesa começa com uma base crocante de biscoito de chocolate. Sobre ela, repousam camadas de mousse de chocolate, que variam do doce ao leite e amargo. O topo é coroado com uma espiral de chantilly, lascas de chocolate e framboesas frescas, com um toque de hortelã.</p>
    </div>
    <form method="post">
        <label>Quantidade:</label>
        <input type="number" name="quantidade">
        <button><a href="#finalizacaomousse">Comprar</a></button>
    </form>

<!-- 3ª Seção: Finalização da compra -->
    <section id="finalizacaomousse">
        <nav>
            <img src="../img/logo.jpeg" alt="">
            <ul>
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div>
            <img src="img/sobrimesa.mousse.jpeg" alt="">
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
<!-- Sobremesa: Pudim -->

<!-- 1ª Seção: Página de escolha do produto -->
<section id="pudim">
    <div>
        <img src="img/sobrimesa.pudim.jpeg" alt="">
        <h1>Pudim</h1>
        <p>A sobremesa apresenta uma massa suave e aveludada. Ela é banhada por uma calda de caramelo dourado. O prato é decorado com uma coroa de frutas vermelhas frescas. Um toque final de folhas de hortelã.</p>
    </div>
    <form method="post">
        <label>Quantidade:</label>
        <input type="number" name="quantidade">
        <button><a href="#finalizacaopudim">Comprar</a></button>
    </form>


<!-- 3ª Seção: Finalização da compra -->
    <section id="finalizacaopudim">
        <nav>
            <img src="../img/logo.jpeg" alt="">
            <ul>
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div>
            <img src="img/sobrimesa.pudim.jpeg" alt="">
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
<!-- Sobremesa: Torta de Chocolate -->

<!-- 1ª Seção: Página de escolha do produto -->
<section id="torta">
    <div>
        <img src="img/sobrimesa.torta.jpeg" alt="">
        <h1>Torta de Chocolate</h1>
        <p>A fatia revela camadas, começando por uma base de bolo de chocolate, seguida por texturas cremosas que variam, indo do chocolate preto ao leite e um creme de baunilha. A torta é finalizada com uma camada lisa de ganache e um ziguezague de calda de chocolate. O toque final é dado pelos biscoitos, que adicionam crocância.</p>
    </div>
    <form method="post">
        <label>Quantidade:</label>
        <input type="number" name="quantidade">
        <button><a href="#finalizacaotorta">Comprar</a></button>
    </form>


<!-- 3ª Seção: Finalização da compra -->
    <section id="finalizacaotorta">
        <nav>
            <img src="../img/logo.jpeg" alt="">
            <ul>
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div>
            <img src="img/sobrimesa.torta.jpeg" alt="">
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
 
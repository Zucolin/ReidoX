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
        <a href="#browniesorvete"><img src="img/brownieSorvete.png" alt=""></a><!-- Sobremesa 1-->
        <a href="#moussemaracuja"><img src="img/mousseMaracuja.png" alt=""></a><!-- Sobremesa 2-->
        <a href="#moussemorango"><img src="img/mousseMorango.png" alt=""></a><!-- Sobremesa 3-->
        <a href="#sorveteflocos"><img src="img/sorveteflocos.png" alt=""></a><!-- Sobremesa 4-->
        <a href="#torta"><img src="img/torta.png" alt=""></a><!-- Sobremesa 5-->

<!-- Sobremesa: Brownie e Sorvete  -->

<!-- 1ª Seção: Página de escolha do produto -->
<section id="brownieesorvete">
    <div>
        <img src="img/brownieSorvete.png" alt="">
        <h1>Brownie com Sorvete</h1>
        <p>Brownie quentinho e macio com uma bola de sorvete cremoso e calda de Morango. Irresistível!</p>
    </div>
    <form method="post">
        <label>Quantidade:</label>
        <input type="number" name="quantidade">
        <button><a href="#finalizacaobrownieesorvete">Comprar</a></button>
    </form>


<!-- 3ª Seção: Finalização da compra -->
    <section id="finalizacaobrownieesorvete">
        <nav>
            <img src="../img/logo.jpeg" alt="">
            <ul>
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div>
            <img src="img/brownieSorvete.png" alt="">
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
<!-- Sobremesa: mousse de maracuja -->

<!-- 1ª Seção: Página de escolha do produto -->
<section id="moussemaracuja">
    <div>
        <img src="img/mousseMaracuja.png" alt="">
        <h1>Mousse de Maracujá</h1>
        <p>Sobremesa leve e cremosa, com o equilíbrio perfeito entre o doce e o azedinho do maracujá.</p>
    </div>
    <form method="post">
        <label>Quantidade:</label>
        <input type="number" name="quantidade">
        <button><a href="#finalizacaomoussemaracuja">Comprar</a></button>
    </form>


<!-- 3ª Seção: Finalização da compra -->
    <section id="finalizacaomoussemaracuja">
        <nav>
            <img src="../img/logo.jpeg" alt="">
            <ul>
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div>
            <img src="img/mousseMaracuja" alt="">
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
<!-- Sobremesa: Mousse de Morango -->

<!-- 1ª Seção: Página de escolha do produto -->
<section id="moussemorango">
    <div>
        <img src="img/sobrimesa.mousse.jpeg" alt="">
        <h1>Mousse de Morango</h1>
        <p>Camadas cremosas e leves com pedaços de morango fresco, unindo doçura e frescor em cada colherada.</p>
    </div>
    <form method="post">
        <label>Quantidade:</label>
        <input type="number" name="quantidade">
        <button><a href="#finalizacaomoussemorango">Comprar</a></button>
    </form>

<!-- 3ª Seção: Finalização da compra -->
    <section id="finalizacaomoussemorango">
        <nav>
            <img src="../img/logo.jpeg" alt="">
            <ul>
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div>
            <img src="img/mousseMorango.png" alt="">
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
<!-- Sobremesa: Sorvete Flocos-->

<!-- 1ª Seção: Página de escolha do produto -->
<section id="sorveteflocos">
    <div>
        <img src="img/sorveteFlocos" alt="">
        <h1>Sorvete de Flocos</h1>
        <p>Sorvete de flocos cremoso servido com brownie de chocolate e calda deliciosa. Uma combinação perfeita!</p>
    </div>
    <form method="post">
        <label>Quantidade:</label>
        <input type="number" name="quantidade">
        <button><a href="#finalizacaosorvete">Comprar</a></button>
    </form>


<!-- 3ª Seção: Finalização da compra -->
    <section id="finalizacaosorvete">
        <nav>
            <img src="../img/logo.jpeg" alt="">
            <ul>
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div>
            <img src="img/sorveteflocos.png" alt="">
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
<!-- Sobremesa: Torta de Oreo -->

<!-- 1ª Seção: Página de escolha do produto -->
<section id="torta">
    <div>
        <img src="img/torta.png" alt="">
        <h1>Torta de Oreo</h1>
        <p>Camadas cremosas de chocolate e baunilha sobre base crocante de biscoito Oreo, finalizada com calda de chocolate.</p>
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
            <img src="img/torta.png" alt="">
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
 
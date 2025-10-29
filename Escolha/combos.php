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
            <img src="img/combo.triplo.jpeg" alt="">
            <h1>Combos</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <a href="#triplo"><img src="../img/combo.triplo.jpeg" alt=""></a><!-- Combo 1-->
        <a href="#batatafamilia"><img src="../img/combo.familia.batata.jpeg" alt=""></a><!-- Combo 2-->
        <a href="#familia"><img src="../img/combo.familia.jpeg" alt=""></a><!-- Combo 3-->
        <a href="#simples"><img src="../img/combo.simples.jpeg" alt=""></a><!-- Combo 4-->
        <a href="#triplofrango"><img src="../img/combotripo.frango.jpeg" alt=""></a><!-- Combo 5-->

        <!-- Combo Triplo-->
    <!-- COMBO TRIPLO -->
    <section id="triplo">
        <h1>Combo Triplo</h1>
        <img src="../img/combo.triplo.jpeg" alt="">

        <section id="detalhesTriplo">
            <div>
                <img src="../img/combo.triplo.jpeg" alt="">
                <p>Acompanha uma grande porção de nuggets, batatas fritas, linguiça calabresa fatiada e três hambúrgueres com molhos especiais.</p>
            </div>
            <form method="post">
                <label>Quantidade:</label>
                <input type="number" name="quantidade">
                <button><a href="#finalizacaoTriplo">Comprar</a></button>
            </form>

            <section id="finalizacaoTriplo">
                <nav>
                    <img src="../img/logo.jpeg" alt="">
                    <ul>
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div>
                    <img src="../img/combo.triplo.jpeg" alt="">
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
    </section>

    <!-- COMBO FAMÍLIA BATATA -->
    <section id="batatafamilia">
        <h1>Combo Família Batata</h1>
        <img src="../img/combo.familia.batata.jpeg" alt="">
        <section id="detalhesBatataFamilia">
            <div>
                <img src="../img/combo.familia.batata.jpeg" alt="">
                <p>Batatas fritas crocantes com molho cheddar, bacon, quatro hambúrgueres e molhos individuais.</p>
            </div>
            <form method="post">
                <label>Quantidade:</label>
                <input type="number" name="quantidade">
                <button><a href="#finalizacaoBatataFamilia">Comprar</a></button>
            </form>

            <section id="finalizacaoBatataFamilia">
                <nav>
                    <img src="../img/logo.jpeg" alt="">
                    <ul>
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div>
                    <img src="../img/combo.familia.batata.jpeg" alt="">
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
    </section>

    <!-- COMBO SIMPLES -->
    <section id="simples">
        <h1>Combo Simples</h1>
        <img src="../img/combo.simples.jpeg" alt="">
        <section id="detalhesSimples">
            <div>
                <img src="../img/combo.simples.jpeg" alt="">
                <p>Hambúrguer duplo com queijo, bacon, cebola roxa, molho especial e batatas fritas, acompanhado de refrigerante.</p>
            </div>
            <form method="post">
                <label>Quantidade:</label>
                <input type="number" name="quantidade">
                <button><a href="#finalizacaoSimples">Comprar</a></button>
            </form>

            <section id="finalizacaoSimples">
                <nav>
                    <img src="../img/logo.jpeg" alt="">
                    <ul>
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div>
                    <img src="../img/combo.simples.jpeg" alt="">
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
    </section>
</section>

<section id="triplofrango">
    <h1>Combo Triplo de Frango</h1>
    <img src="../img/combotripo.frango.jpeg" alt="">
    <section id="detalhesTriploFrango">
        <div>
            <img src="../img/combotripo.frango.jpeg" alt="">
            <p>O combo possui porção de frango frito crocante, montanha de batatas fritas, hambúrgueres variados (frango, duplos com queijo, carne desfiada) e salada coleslaw. Inclui potinhos de molho extra.</p>
        </div>
        <form method="post">
            <label>Quantidade:</label>
            <input type="number" name="quantidade">
            <button><a href="#finalizacaoTriploFrango">Comprar</a></button>
        </form>

        <section id="finalizacaoTriploFrango">
            <nav>
                <img src="../img/logo.jpeg" alt="">
                <ul>
                    <li><a href="paginainicio.php">Inicio</a></li>
                    <li><a href="pedidos.php">Pedidos</a></li>
                    <li><a href="sobrenos.html">Sobre nós</a></li>
                </ul>
            </nav>
            <div>
                <img src="../img/combotripo.frango.jpeg" alt="">
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
 
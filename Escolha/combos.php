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
            <img src="" alt="">
            <h1>Combos</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <a href="#x-simples"><img src="../img/X_ComboSimples.png" alt=""></a><!-- Combo 1-->
        <a href="#x-individual"><img src="../img/X_ComboIndividual.png" alt=""></a><!-- Combo 2-->
        <a href="#x-familia"><img src="../img/X_ComboFamilia.png" alt=""></a><!-- Combo 3-->
      
        <!-- Combo simples-->
    <!-- COMBO SIMPLES -->
    <section id="x-simples">
            <div>
                <img src="../img/X_ComboSimples.png" alt="">
                <p>Hambúrguer clássico com queijo, alface, tomate e batata frita crocante. Uma combinação tradicional e deliciosa!</p>
            </div>
            <form method="post">
                <label>Quantidade:</label>
                <input type="number" name="quantidade">
                <button><a href="#finalizacaox-simples">Comprar</a></button>
            </form>

            <section id="finalizacaox-simples">
                <nav>
                    <img src="../img/logo.jpeg" alt="">
                    <ul>
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div>
                    <img src="../img/X_ComboSimples.png" alt="">
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

    <!-- COMBO INDIVIDUAL -->
    <section id="x-individual">
            <div>
                <img src="../img/X_ComboIndividual.png" alt="">
                <p>Hambúrguer artesanal com queijo derretido, bacon, alface, tomate, batata frita e refrigerante. Sabor completo em uma refeição prática!</p>
            </div>
            <form method="post">
                <label>Quantidade:</label>
                <input type="number" name="quantidade">
                <button><a href="#finalizacaox-individual">Comprar</a></button>
            </form>

            <section id="finalizacaox-individual">
                <nav>
                    <img src="../img/logo.jpeg" alt="">
                    <ul>
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div>
                    <img src="../img/X_ComboIndividual.png" alt="">
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

    <!-- COMBO Familia -->
    <section id="x-familia">

            <div>
                <img src="../img/X_ComboFamília.png" alt="">
                <p>rês hambúrgueres artesanais acompanhados de fritas, pedaços de carne e molhos especiais. Perfeito para compartilhar e saborear juntos!</p>
            </div>
            <form method="post">
                <label>Quantidade:</label>
                <input type="number" name="quantidade">
                <button><a href="#finalizacaox-familia">Comprar</a></button>
            </form>

            <section id="finalizacaox-familia">
                <nav>
                    <img src="../img/logo.jpeg" alt="">
                    <ul>
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div>
                    <img src="../img/X_ComboFamília.png" alt="">
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
 
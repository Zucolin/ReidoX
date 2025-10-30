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

$nome = $_SESSION['nome_usuario'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Porções</title>
    <link rel="stylesheet" href="../estilo.css">
</head>
<body>
<section id="acompanhamentos">
    <nav>
        <div class="menu-container">
            <button type="required" class="menu-btn" onclick="toggleMenu(this)">Olá, <?= htmlspecialchars($nome) ?>!</button>
            <div class="menu-opcoes">
                <form method="post">
                    <button type="required" type="submit" name="editar">Editar</button>
                    <button type="required" type="submit" name="sair">Sair</button>
                    <button type="required" type="button">Detalhes</button>
                </form>
            </div>
        </div>
        <img src="../img/porção.fritas.jpeg" alt="">
        <h1>Porções</h1>
        <ul>
            <li><a href="paginainicio.php">Inicio</a></li>
            <li><a href="pedidos.php">Pedidos</a></li>
            <li><a href="sobrenos.html">Sobre nós</a></li>
        </ul>
    </nav>

    <a href="#porcaocamaroes"><img src="../img/porção.camarão.jpeg" alt=""></a>
    <a href="#porcaocebolas"><img src="../img/porção.cebolitos.jpeg" alt=""></a>
    <a href="#porcaochurrasco"><img src="../img/porção.churrasco.jpeg" alt=""></a>
    <a href="#porcaofritas"><img src="../img/porção.fritas.jpeg" alt=""></a>
    <a href="#porcaopeixes"><img src="../img/porção.peixe.jpeg" alt=""></a>

    <!-- Porção Camarões -->


        <!-- Produto específico -->
        <section id="porcaocamarao">
            <div>
                <img src="../img/porção.camarão.jpeg" alt="">
                <h1>Porção Camarões</h1>
                <p>A travessa apresenta camarões grandes, empanados em uma farinha dourada e fritos. Servidos com fatias de limão e molho cremoso no centro.</p>
            </div>
            <form method="post">
                <label>Quantidade:</label>
                <input type="number" name="quantidade" required>
                <button type="required"><a href="#finalizacaocamarao">Comprar</a></button>
            </form>

            <!-- Finalização -->
            <section id="finalizacaocamarao">
                <nav>
                    <img src="../img/logo.jpeg" alt="">
                    <ul>
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div>
                    <img src="../img/porção.camarão.jpeg" alt="">
                </div>
                <h2>Tipo de Entrega</h2>
                <label><input type="radio" name="entrega" value="Entregar" required> Entregar</label>
                <label><input type="radio" name="entrega" value="Retirar" required> Retirar</label>
                <form method="post">
                    <h3>Método Pagamento</h3>
                    <select name="pagamento" required>
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

    <!-- Porção Cebolas -->

        <section id="porcaocebola">
            <div>
                <img src="../img/porção.cebolitos.jpeg" alt="">
                <h1>Porção Anéis de Cebola</h1>
                <p>Anéis de cebola crocantes e dourados, servidos com um delicioso molho cremoso ao centro.</p>
            </div>
            <form method="post">
                <label>Quantidade:</label>
                <input type="number" name="quantidade" required>
                <button type="required"><a href="#finalizacaocebola">Comprar</a></button>
            </form>

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
                    <img src="../img/porção.cebolitos.jpeg" alt="">
                </div>
                <h2>Tipo de Entrega</h2>
                <label><input type="radio" name="entrega" value="Entregar" required> Entregar</label>
                <label><input type="radio" name="entrega" value="Retirar" required> Retirar</label>
                <form method="post">
                    <h3>Método Pagamento</h3>
                    <select name="pagamento" required>
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

    <!-- Porção Churrasco -->

        <section id="porcaochurrasco">
            <div>
                <img src="../img/porção.churrasco.jpeg" alt="">
                <h1>Porção Churrasco</h1>
                <p>Mix de carnes suculentas com linguiça, batatas fritas e pão de alho grelhado. Acompanha molhos variados.</p>
            </div>
            <form method="post">
                <label>Quantidade:</label>
                <input type="number" name="quantidade" required>
                <button type="required"><a href="#finalizacaochurrasco">Comprar</a></button>
            </form>

            <section id="finalizacaochurrasco">
                <nav>
                    <img src="../img/logo.jpeg" alt="">
                    <ul>
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div>
                    <img src="../img/porção.churrasco.jpeg" alt="">
                </div>
                <h2>Tipo de Entrega</h2>
                <label><input type="radio" name="entrega" value="Entregar" required> Entregar</label>
                <label><input type="radio" name="entrega" value="Retirar" required> Retirar</label>
                <form method="post">
                    <h3>Método Pagamento</h3>
                    <select name="pagamento" required>
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

    <!-- Porção Fritas -->

        <section id="porcaofritas">
            <div>
                <img src="../img/porção.fritas.jpeg" alt="">
                <h1>Porção Fritas</h1>
                <p>Várias versões de batatas fritas com molhos variados, garantindo sabor e crocância em cada mordida.</p>
            </div>
            <form method="post">
                <label>Quantidade:</label>
                <input type="number" name="quantidade" required>
                <button type="required"><a href="#finalizacaofritas">Comprar</a></button>
            </form>

            <section id="finalizacaofritas">
                <nav>
                    <img src="../img/logo.jpeg" alt="">
                    <ul>
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div>
                    <img src="../img/porção.fritas.jpeg" alt="">
                </div>
                <h2>Tipo de Entrega</h2>
                <label><input type="radio" name="entrega" value="Entregar" required> Entregar</label>
                <label><input type="radio" name="entrega" value="Retirar" required> Retirar</label>
                <form method="post">
                    <h3>Método Pagamento</h3>
                    <select name="pagamento" required>
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

    <!-- Porção Peixe -->

        <section id="porcaopeixe">
            <div>
                <img src="../img/porção.peixe.jpeg" alt="">
                <h1>Porção Peixe</h1>
                <p>Pedaços crocantes e dourados de peixe sobre alface, decorados com limão e molho picante.</p>
            </div>
            <form method="post">
                <label>Quantidade:</label>
                <input type="number" name="quantidade" required>
                <button type="required"><a href="#finalizacaopeixe">Comprar</a></button>
            </form>

            <section id="finalizacaopeixe">
                <nav>
                    <img src="../img/logo.jpeg" alt="">
                    <ul>
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div>
                    <img src="../img/porção.peixe.jpeg" alt="">
                </div>
                <h2>Tipo de Entrega</h2>
                <label><input type="radio" name="entrega" value="Entregar" required> Entregar</label>
                <label><input type="radio" name="entrega" value="Retirar" required> Retirar</label>
                <form method="post">
                    <h3>Método Pagamento</h3>
                    <select name="pagamento" required>
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

<script>
function toggleMenu(button) {
    const menu = button.parentElement.querySelector('.menu-opcoes');
    menu.style.display = (menu.style.display === "block") ? "none" : "block";
}

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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
}
?>

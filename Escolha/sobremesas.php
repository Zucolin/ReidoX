<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sair'])) {
    session_destroy();
    header('Location: ../index.php');
    exit;
}
if (!isset($_SESSION['nome_usuario'])) {
    header('Location: ../index.php');
    exit;
}
$nome = $_SESSION['nome_usuario'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sobremesas</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <section id="sobremesas">
        <nav class="nav-escolha">
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
            <img src="logo.png" alt="logo" class="logo">
            <h1 class="titulo-pagina">Sobremesas</h1>
            <ul class="menu-principal">
                <li><a href="../paginainicio.php">Inicio</a></li>
                <li><a href="../pedidos.php">Pedidos</a></li>
                <li><a href="../sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>

        <div style="text-align:center; width:100%;">
            <a href="#brownie" class="produto-link"><img src="../img/brownieSorvete.png" alt="Brownie"></a>
            <a href="#mousse-maracuja" class="produto-link"><img src="../img/mousseMaracuja.png"
                    alt="Mousse Maracujá"></a>
            <a href="#mousse-morango" class="produto-link"><img src="../img/mousseMorango.png" alt="Mousse Morango"></a>
            <a href="#sorvete-flocos" class="produto-link"><img src="../img/sorveteflocos.png" alt="Sorvete Flocos"></a>
            <a href="#torta" class="produto-link"><img src="../img/torta.png" alt="Torta"></a>
        </div>
    </section>

    <!-- Brownie -->
    <section id="brownie" class="produto-page">
        <nav class="nav-escolha">
            <img src="../img/logo.png" alt="logo" class="logo">
            <h1 class="titulo-pagina">Brownie com Sorvete</h1>
            <ul class="menu-principal">
                <li><a href="../paginainicio.php">Inicio</a></li>
                <li><a href="../pedidos.php">Pedidos</a></li>
                <li><a href="../sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>

        <div class="produto-detalhe">
            <img src="../img/brownieSorvete.png" alt="Brownie" class="produto-img-detalhe">
            <div>
                <h1 class="produto-titulo">Brownie com Sorvete</h1>
                <p class="produto-descricao">Brownie quentinho com sorvete cremoso.</p>
            </div>
        </div>

        <form method="post" action="#finalizacaobrownie">
            <label class="label-qtd">Quantidade:</label>
            <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
            <a class="btn-comprar" href="#finalizacaobrownie">Finalizar compra</a>
        </form>
    </section>

    <section id="finalizacaobrownie" class="finalizacao">
        <nav class="nav-escolha">
            <img src="../img/logo.png" alt="logo" class="logo">
            <ul class="menu-principal">
                <li><a href="../paginainicio.php">Inicio</a></li>
                <li><a href="../pedidos.php">Pedidos</a></li>
                <li><a href="../sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div class="produto-finalizacao">
            <img src="../img/brownieSorvete.png" alt="Brownie" class="img-produto-finalizacao">
        </div>
        <form method="post">
            <input type="hidden" name="produto" value="Brownie com Sorvete">
            <label class="label-qtd">Quantidade:</label>
            <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>

            <h2 class="forma-entrega">Tipo de Entrega</h2>
            <label><input type="radio" name="entrega" value="Entregar" required> Entregar</label>
            <label><input type="radio" name="entrega" value="Retirar" required> Retirar</label>

            <h3 class="forma-pagamento">Método Pagamento</h3>
            <select name="pagamento" required>
                <option value="cartao-credito">Cartão de Crédito</option>
                <option value="cartao-debito">Cartão de Débito</option>
                <option value="pix">Pix</option>
                <option value="dinheiro">Dinheiro</option>
            </select>

            <input type="submit" class="btn-pagamento" value="Enviar pedido">
        </form>
    </section>

    <!-- Mousse Maracujá -->
    <section id="mousse-maracuja" class="produto-page">
        <nav class="nav-escolha">
            <img src="../img/logo.png" alt="logo" class="logo">
            <h1 class="titulo-pagina">Mousse de Maracujá</h1>
            <ul class="menu-principal">
                <li><a href="../paginainicio.php">Inicio</a></li>
                <li><a href="../pedidos.php">Pedidos</a></li>
                <li><a href="../sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>

        <div class="produto-detalhe">
            <img src="../img/mousseMaracuja.png" alt="Mousse Maracujá" class="produto-img-detalhe">
            <div>
                <h1 class="produto-titulo">Mousse de Maracujá</h1>
                <p class="produto-descricao">Sobremesa leve e cremosa.</p>
            </div>
        </div>

        <form method="post" action="#finalizacaomousse-maracuja">
            <label class="label-qtd">Quantidade:</label>
            <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
            <a class="btn-comprar" href="#finalizacaomousse-maracuja">Finalizar compra</a>
        </form>
    </section>

    <section id="finalizacaomousse-maracuja" class="finalizacao">
        <nav class="nav-escolha">
            <img src="../img/logo.png" class="logo" alt="logo">
            <ul class="menu-principal">
                <li><a href="../paginainicio.php">Inicio</a></li>
                <li><a href="../pedidos.php">Pedidos</a></li>
                <li><a href="../sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div class="produto-finalizacao">
            <img src="../img/mousseMaracuja.png" alt="Mousse Maracujá" class="img-produto-finalizacao">
        </div>
        <form method="post">
            <input type="hidden" name="produto" value="Mousse de Maracujá">
            <label class="label-qtd">Quantidade:</label>
            <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
            <h2 class="forma-entrega">Tipo de Entrega</h2>
            <label><input type="radio" name="entrega" value="Entregar" required> Entregar</label>
            <label><input type="radio" name="entrega" value="Retirar" required> Retirar</label>
            <h3 class="forma-pagamento">Método Pagamento</h3>
            <select name="pagamento" required>
                <option value="cartao-credito">Cartão de Crédito</option>
                <option value="cartao-debito">Cartão de Débito</option>
                <option value="pix">Pix</option>
                <option value="dinheiro">Dinheiro</option>
            </select>
            <input type="submit" class="btn-pagamento" value="Enviar pedido">
        </form>
    </section>

    <!-- Outras sobremesas: moussemorango, sorveteflocos, torta (estrutura igual) -->
    <section id="mousse-morango" class="produto-page">
        <nav class="nav-escolha"><img src="../img/logo.png" class="logo" alt="logo">
            <h1 class="titulo-pagina">Mousse de Morango</h1>
            <ul class="menu-principal">
                <li><a href="../paginainicio.php">Inicio</a></li>
                <li><a href="../pedidos.php">Pedidos</a></li>
                <li><a href="../sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div class="produto-detalhe"><img src="../img/mousseMorango.png" class="produto-img-detalhe"
                alt="Mousse Morango">
            <div>
                <h1 class="produto-titulo">Mousse de Morango</h1>
                <p class="produto-descricao">Cremoso e com pedaços de morango.</p>
            </div>
        </div>
        <form method="post" action="#finalizacaomousse-morango"><label class="label-qtd">Quantidade:</label><input
                type="number" name="quantidade" class="input-qtd" min="1" value="1" required><a class="btn-comprar"
                href="#finalizacaomousse-morango">Finalizar compra</a></form>
    </section>

    <section id="finalizacaomousse-morango" class="finalizacao">
        <nav class="nav-escolha"><img src="../img/logo.png" class="logo" alt="logo">
            <ul class="menu-principal">
                <li><a href="../paginainicio.php">Inicio</a></li>
                <li><a href="../pedidos.php">Pedidos</a></li>
                <li><a href="../sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div class="produto-finalizacao"><img src="../img/mousseMorango.png" class="img-produto-finalizacao"
                alt="Mousse Morango"></div>
        <form method="post"><input type="hidden" name="produto" value="Mousse de Morango"><label
                class="label-qtd">Quantidade:</label><input type="number" name="quantidade" class="input-qtd" min="1"
                value="1" required>
            <h2 class="forma-entrega">Tipo de Entrega</h2><label><input type="radio" name="entrega" value="Entregar"
                    required> Entregar</label><label><input type="radio" name="entrega" value="Retirar" required>
                Retirar</label>
            <h3 class="forma-pagamento">Método Pagamento</h3><select name="pagamento" required>
                <option value="cartao-credito">Cartão de Crédito</option>
                <option value="cartao-debito">Cartão de Débito</option>
                <option value="pix">Pix</option>
                <option value="dinheiro">Dinheiro</option>
            </select><input type="submit" class="btn-pagamento" value="Enviar pedido">
        </form>
    </section>

    <section id="sorvete-flocos" class="produto-page">
        <nav class="nav-escolha"><img src="../img/logo.png" class="logo" alt="logo">
            <h1 class="titulo-pagina">Sorvete de Flocos</h1>
            <ul class="menu-principal">
                <li><a href="../paginainicio.php">Inicio</a></li>
                <li><a href="../pedidos.php">Pedidos</a></li>
                <li><a href="../sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div class="produto-detalhe"><img src="../img/sorveteflocos.png" class="produto-img-detalhe" alt="Sorvete">
            <div>
                <h1 class="produto-titulo">Sorvete de Flocos</h1>
                <p class="produto-descricao">Sorvete cremoso de flocos.</p>
            </div>
        </div>
        <form method="post" action="#finalizacaosorvete"><label class="label-qtd">Quantidade:</label><input
                type="number" name="quantidade" class="input-qtd" min="1" value="1" required><a class="btn-comprar"
                href="#finalizacaosorvete">Finalizar compra</a></form>
    </section>

    <section id="finalizacaosorvete" class="finalizacao">
        <nav class="nav-escolha"><img src="../img/logo.png" class="logo" alt="logo">
            <ul class="menu-principal">
                <li><a href="../paginainicio.php">Inicio</a></li>
                <li><a href="../pedidos.php">Pedidos</a></li>
                <li><a href="../sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div class="produto-finalizacao"><img src="../img/sorveteflocos.png" class="img-produto-finalizacao"
                alt="Sorvete"></div>
        <form method="post"><input type="hidden" name="produto" value="Sorvete de Flocos"><label
                class="label-qtd">Quantidade:</label><input type="number" name="quantidade" class="input-qtd" min="1"
                value="1" required>
            <h2 class="forma-entrega">Tipo de Entrega</h2><label><input type="radio" name="entrega" value="Entregar"
                    required> Entregar</label><label><input type="radio" name="entrega" value="Retirar" required>
                Retirar</label>
            <h3 class="forma-pagamento">Método Pagamento</h3><select name="pagamento" required>
                <option value="cartao-credito">Cartão de Crédito</option>
                <option value="cartao-debito">Cartão de Débito</option>
                <option value="pix">Pix</option>
                <option value="dinheiro">Dinheiro</option>
            </select><input type="submit" class="btn-pagamento" value="Enviar pedido">
        </form>
    </section>

    <section id="torta" class="produto-page">
        <nav class="nav-escolha"><img src="../img/logo.png" class="logo" alt="logo">
            <h1 class="titulo-pagina">Torta de Oreo</h1>
            <ul class="menu-principal">
                <li><a href="../paginainicio.php">Inicio</a></li>
                <li><a href="../pedidos.php">Pedidos</a></li>
                <li><a href="../sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div class="produto-detalhe"><img src="../img/torta.png" class="produto-img-detalhe" alt="Torta">
            <div>
                <h1 class="produto-titulo">Torta de Oreo</h1>
                <p class="produto-descricao">Torta cremosa com base de biscoito Oreo.</p>
            </div>
        </div>
        <form method="post" action="#finalizacaotorta"><label class="label-qtd">Quantidade:</label><input type="number"
                name="quantidade" class="input-qtd" min="1" value="1" required><a class="btn-comprar"
                href="#finalizacaotorta">Finalizar compra</a></form>
    </section>

    <section id="finalizacaotorta" class="finalizacao">
        <nav class="nav-escolha"><img src="../img/logo.png" class="logo" alt="logo">
            <ul class="menu-principal">
                <li><a href="../paginainicio.php">Inicio</a></li>
                <li><a href="../pedidos.php">Pedidos</a></li>
                <li><a href="../sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div class="produto-finalizacao"><img src="../img/torta.png" class="img-produto-finalizacao" alt="Torta"></div>
        <form method="post"><input type="hidden" name="produto" value="Torta de Oreo"><label
                class="label-qtd">Quantidade:</label><input type="number" name="quantidade" class="input-qtd" min="1"
                value="1" required>
            <h2 class="forma-entrega">Tipo de Entrega</h2><label><input type="radio" name="entrega" value="Entregar"
                    required> Entregar</label><label><input type="radio" name="entrega" value="Retirar" required>
                Retirar</label>
            <h3 class="forma-pagamento">Método Pagamento</h3><select name="pagamento" required>
                <option value="cartao-credito">Cartão de Crédito</option>
                <option value="cartao-debito">Cartão de Débito</option>
                <option value="pix">Pix</option>
                <option value="dinheiro">Dinheiro</option>
            </select><input type="submit" class="btn-pagamento" value="Enviar pedido">
        </form>
    </section>

    <script>
        function toggleMenu(button) {
            const menu = button.parentElement.querySelector('.menu-opcoes');
            menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
        }
        window.addEventListener('click', function (e) {
            document.querySelectorAll('.menu-opcoes').forEach(menu => {
                const btn = menu.parentElement.querySelector('.menu-btn');
                if (menu.style.display === 'block' && !btn.contains(e.target) && !menu.contains(e.target)) {
                    menu.style.display = 'none';
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
    if (isset($_POST['produto']) && isset($_POST['quantidade'])) {
        $nomepedido = $_POST['produto'];
        $quantidade = intval($_POST['quantidade']);
        $pedido = $nomepedido . " x" . $quantidade;
        require_once '../Controller/UsuarioController.php';
        $controller = new UsuarioController($pdo);
        $controller->enviarpedidos($pedido);
    }
}
?>
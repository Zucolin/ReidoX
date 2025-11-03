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
<title>Bebidas</title>
<link rel="stylesheet" href="estilo.css">
</head>
<body>

<section id="bebidas">
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
        <h1 class="titulo-pagina">Bebidas</h1>

        <ul class="menu-principal">
            <li><a href="../paginainicio.php">Início</a></li>
            <li><a href="../pedidos.php">Pedidos</a></li>
            <li><a href="../sobrenos.html">Sobre nós</a></li>
        </ul>
    </nav>

    <div style="text-align:center; width:100%;">
        <a href="#agua" class="produto-link"><img src="../img/agua.png" alt="Água"></a>
        <a href="#coca" class="produto-link"><img src="../img/coca.png" alt="Coca"></a>
        <a href="#sprite" class="produto-link"><img src="../img/sprite.png" alt="Sprite"></a>
        <a href="#kuat" class="produto-link"><img src="../img/kuat.png" alt="Kuat"></a>
        <a href="#suco-maracuja" class="produto-link"><img src="../img/sucoMaracuja.png" alt="Suco Maracujá"></a>
        <a href="#suco-uva" class="produto-link"><img src="../img/sucoUva.png" alt="Suco Uva"></a>
    </div>
</section>

<!-- Água -->
<section id="agua" class="produto-page">
    <nav class="nav-escolha">
        <img src="../img/logo.png" class="logo" alt="logo">
        <h1 class="titulo-pagina">Água 500ml</h1>
        <ul class="menu-principal">
            <li><a href="../paginainicio.php">Início</a></li>
            <li><a href="../pedidos.php">Pedidos</a></li>
            <li><a href="../sobrenos.html">Sobre nós</a></li>
        </ul>
    </nav>

    <div class="produto-detalhe">
        <img src="../img/agua.png" class="produto-img-detalhe" alt="Água">
        <div>
            <h1 class="produto-titulo">Água 500ml</h1>
            <p class="produto-descricao">Garrafa de água 500ml.</p>
        </div>
    </div>

    <form method="post" action="#finalizacao-agua">
        <label class="label-qtd">Quantidade:</label>
        <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
        <a class="btn-comprar" href="#finalizacao-agua">Finalizar compra</a>
    </form>
</section>

<section id="finalizacao-agua" class="finalizacao">
    <nav class="nav-escolha">
        <img src="../img/logo.png" class="logo" alt="logo">
        <ul class="menu-principal">
            <li><a href="../paginainicio.php">Início</a></li>
            <li><a href="../pedidos.php">Pedidos</a></li>
            <li><a href="../sobrenos.html">Sobre nós</a></li>
        </ul>
    </nav>

    <div class="produto-finalizacao">
        <img src="../img/agua.png" class="img-produto-finalizacao" alt="Água">
    </div>

    <form method="post">
        <input type="hidden" name="produto" value="Água 500ml">
        <label class="label-qtd">Quantidade:</label>
        <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>

        <h2 class="forma-entrega">Tipo de Entrega</h2>
        <label><input type="radio" name="entrega" value="Entregar" required> Entregar</label>
        <label><input type="radio" name="entrega" value="Retirar" required> Retirar</label>

        <h3 class="forma-pagamento">Método Pagamento</h3>
        <select name="pagamento" class="escolha-pagamento" required>
            <option value="cartao-credito">Cartão de Crédito</option>
            <option value="cartao-debito">Cartão de Débito</option>
            <option value="pix">Pix</option>
            <option value="dinheiro">Dinheiro</option>
        </select>

        <input type="submit" class="btn-pagamento" value="Enviar pedido">
    </form>
</section>

<!-- Coca -->
<section id="coca" class="produto-page">
    <nav class="nav-escolha">
        <img src="../img/logo.png" class="logo" alt="logo">
        <h1 class="titulo-pagina">Coca-Cola 350ml</h1>
        <ul class="menu-principal">
            <li><a href="../paginainicio.php">Início</a></li>
            <li><a href="../pedidos.php">Pedidos</a></li>
            <li><a href="../sobrenos.html">Sobre nós</a></li>
        </ul>
    </nav>

    <div class="produto-detalhe">
        <img src="../img/coca.png" class="produto-img-detalhe" alt="Coca">
        <div>
            <h1 class="produto-titulo">Coca-Cola 350ml</h1>
            <p class="produto-descricao">Lata 350ml.</p>
        </div>
    </div>

    <form method="post" action="#finalizacaococa">
        <label class="label-qtd">Quantidade:</label>
        <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
        <a class="btn-comprar" href="#finalizacaococa">Finalizar compra</a>
    </form>
</section>

<section id="finalizacaococa" class="finalizacao">
    <nav class="nav-escolha">
        <img src="../img/logo.png" class="logo" alt="logo">
        <ul class="menu-principal">
            <li><a href="../paginainicio.php">Início</a></li>
            <li><a href="../pedidos.php">Pedidos</a></li>
            <li><a href="../sobrenos.html">Sobre nós</a></li>
        </ul>
    </nav>

    <div class="produto-finalizacao">
        <img src="../img/coca.png" class="img-produto-finalizacao" alt="Coca">
    </div>

    <form method="post">
        <input type="hidden" name="produto" value="Coca-Cola 350ml">
        <label class="label-qtd">Quantidade:</label>
        <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>

        <h2 class="forma-entrega">Tipo de Entrega</h2>
        <label><input type="radio" name="entrega" value="Entregar" required> Entregar</label>
        <label><input type="radio" name="entrega" value="Retirar" required> Retirar</label>

        <h3 class="forma-pagamento">Método Pagamento</h3>
        <select name="pagamento" class="escolha-pagamento" required>
            <option value="cartao-credito">Cartão de Crédito</option>
            <option value="cartao-debito">Cartão de Débito</option>
            <option value="pix">Pix</option>
            <option value="dinheiro">Dinheiro</option>
        </select>

        <input type="submit" class="btn-pagamento" value="Enviar pedido">
    </form>
</section>

<!-- Sprite -->
<section id="sprite" class="produto-page">
    <nav class="nav-escolha">
        <img src="../img/logo.png" class="logo" alt="logo">
        <h1 class="titulo-pagina">Sprite 350ml</h1>
        <ul class="menu-principal">
            <li><a href="../paginainicio.php">Início</a></li>
            <li><a href="../pedidos.php">Pedidos</a></li>
            <li><a href="../sobrenos.html">Sobre nós</a></li>
        </ul>
    </nav>

    <div class="produto-detalhe">
        <img src="../img/sprite.png" class="produto-img-detalhe" alt="Sprite">
        <div>
            <h1 class="produto-titulo">Sprite 350ml</h1>
            <p class="produto-descricao">Lata 350ml.</p>
        </div>
    </div>

    <form method="post" action="#finalizacaosprite">
        <label class="label-qtd">Quantidade:</label>
        <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
        <a class="btn-comprar" href="#finalizacaosprite">Finalizar compra</a>
    </form>
</section>

<section id="finalizacaosprite" class="finalizacao">
    <nav class="nav-escolha">
        <img src="../img/logo.png" class="logo" alt="logo">
        <ul class="menu-principal">
            <li><a href="../paginainicio.php">Início</a></li>
            <li><a href="../pedidos.php">Pedidos</a></li>
            <li><a href="../sobrenos.html">Sobre nós</a></li>
        </ul>
    </nav>

    <div class="produto-finalizacao">
        <img src="../img/sprite.png" class="img-produto-finalizacao" alt="Sprite">
    </div>

    <form method="post">
        <input type="hidden" name="produto" value="Sprite 350ml">
        <label class="label-qtd">Quantidade:</label>
        <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>

        <h2 class="forma-entrega">Tipo de Entrega</h2>
        <label><input type="radio" name="entrega" value="Entregar" required> Entregar</label>
        <label><input type="radio" name="entrega" value="Retirar" required> Retirar</label>

        <h3 class="forma-pagamento">Método Pagamento</h3>
        <select name="pagamento" class="escolha-pagamento" required>
            <option value="cartao-credito">Cartão de Crédito</option>
            <option value="cartao-debito">Cartão de Débito</option>
            <option value="pix">Pix</option>
            <option value="dinheiro">Dinheiro</option>
        </select>

        <input type="submit" class="btn-pagamento" value="Enviar pedido">
    </form>
</section>

<!-- Kuat -->
<section id="kuat" class="produto-page">
    <nav class="nav-escolha">
        <img src="../img/logo.png" class="logo" alt="logo">
        <h1 class="titulo-pagina">Kuat 350ml</h1>
        <ul class="menu-principal">
            <li><a href="../paginainicio.php">Início</a></li>
            <li><a href="../pedidos.php">Pedidos</a></li>
            <li><a href="../sobrenos.html">Sobre nós</a></li>
        </ul>
    </nav>

    <div class="produto-detalhe">
        <img src="../img/kuat.png" class="produto-img-detalhe" alt="Kuat">
        <div>
            <h1 class="produto-titulo">Kuat 350ml</h1>
            <p class="produto-descricao">Lata 350ml.</p>
        </div>
    </div>

    <form method="post" action="#finalizacaokuat">
        <label class="label-qtd">Quantidade:</label>
        <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
        <a class="btn-comprar" href="#finalizacaokuat">Finalizar compra</a>
    </form>
</section>

<section id="finalizacaokuat" class="finalizacao">
    <nav class="nav-escolha">
        <img src="../img/logo.png" class="logo" alt="logo">
        <ul class="menu-principal">
            <li><a href="../paginainicio.php">Início</a></li>
            <li><a href="../pedidos.php">Pedidos</a></li>
            <li><a href="../sobrenos.html">Sobre nós</a></li>
        </ul>
    </nav>

    <div class="produto-finalizacao">
        <img src="../img/kuat.png" class="img-produto-finalizacao" alt="Kuat">
    </div>

    <form method="post">
        <input type="hidden" name="produto" value="Kuat 350ml">
        <label class="label-qtd">Quantidade:</label>
        <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>

        <h2 class="forma-entrega">Tipo de Entrega</h2>
        <label><input type="radio" name="entrega" value="Entregar" required> Entregar</label>
        <label><input type="radio" name="entrega" value="Retirar" required> Retirar</label>

        <h3 class="forma-pagamento">Método Pagamento</h3>
        <select name="pagamento" class="escolha-pagamento" required>
            <option value="cartao-credito">Cartão de Crédito</option>
            <option value="cartao-debito">Cartão de Débito</option>
            <option value="pix">Pix</option>
            <option value="dinheiro">Dinheiro</option>
        </select>

        <input type="submit" class="btn-pagamento" value="Enviar pedido">
    </form>
</section>

<!-- Suco Maracujá -->
<section id="suco-maracuja" class="produto-page">
    <nav class="nav-escolha">
        <img src="../img/logo.png" class="logo" alt="logo">
        <h1 class="titulo-pagina">Suco Maracujá 300ml</h1>
        <ul class="menu-principal">
            <li><a href="../paginainicio.php">Início</a></li>
            <li><a href="../pedidos.php">Pedidos</a></li>
            <li><a href="../sobrenos.html">Sobre nós</a></li>
        </ul>
    </nav>

    <div class="produto-detalhe">
        <img src="../img/sucoMaracuja.png" class="produto-img-detalhe" alt="Suco Maracujá">
        <div>
            <h1 class="produto-titulo">Suco Maracujá 300ml</h1>
            <p class="produto-descricao">Suco natural batido na hora.</p>
        </div>
    </div>

    <form method="post" action="#finalizacaosuco-maracuja">
        <label class="label-qtd">Quantidade:</label>
        <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
        <a class="btn-comprar" href="#finalizacaosuco-maracuja">Finalizar compra</a>
    </form>
</section>

<section id="finalizacaosuco-maracuja" class="finalizacao">
    <nav class="nav-escolha">
        <img src="../img/logo.png" class="logo" alt="logo">
        <ul class="menu-principal">
            <li><a href="../paginainicio.php">Início</a></li>
            <li><a href="../pedidos.php">Pedidos</a></li>
            <li><a href="../sobrenos.html">Sobre nós</a></li>
        </ul>
    </nav>

    <div class="produto-finalizacao">
        <img src="../img/sucoMaracuja.png" class="img-produto-finalizacao" alt="Suco Maracujá">
    </div>

    <form method="post">
        <input type="hidden" name="produto" value="Suco Maracujá 300ml">
        <label class="label-qtd">Quantidade:</label>
        <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>

        <h2 class="forma-entrega">Tipo de Entrega</h2>
        <label><input type="radio" name="entrega" value="Entregar" required> Entregar</label>
        <label><input type="radio" name="entrega" value="Retirar" required> Retirar</label>

        <h3 class="forma-pagamento">Método Pagamento</h3>
        <select name="pagamento" class="escolha-pagamento" required>
            <option value="cartao-credito">Cartão de Crédito</option>
            <option value="cartao-debito">Cartão de Débito</option>
            <option value="pix">Pix</option>
            <option value="dinheiro">Dinheiro</option>
        </select>

        <input type="submit" class="btn-pagamento" value="Enviar pedido">
    </form>
</section>

<!-- Suco Uva -->
<section id="suco-uva" class="produto-page">
    <nav class="nav-escolha">
        <img src="../img/logo.png" class="logo" alt="logo">
        <h1 class="titulo-pagina">Suco de Uva 300ml</h1>
        <ul class="menu-principal">
            <li><a href="../paginainicio.php">Início</a></li>
            <li><a href="../pedidos.php">Pedidos</a></li>
            <li><a href="../sobrenos.html">Sobre nós</a></li>
        </ul>
    </nav>

    <div class="produto-detalhe">
        <img src="../img/sucoUva.png" class="produto-img-detalhe" alt="Suco Uva">
        <div>
            <h1 class="produto-titulo">Suco de Uva 300ml</h1>
            <p class="produto-descricao">Suco natural de uva.</p>
        </div>
    </div>

    <form method="post" action="#finalizacaosuco-uva">
        <label class="label-qtd">Quantidade:</label>
        <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
        <a class="btn-comprar" href="#finalizacaosuco-uva">Finalizar compra</a>
    </form>
</section>

<section id="finalizacaosuco-uva" class="finalizacao">
    <nav class="nav-escolha">
        <img src="../img/logo.png" class="logo" alt="logo">
        <ul class="menu-principal">
            <li><a href="../paginainicio.php">Início</a></li>
            <li><a href="../pedidos.php">Pedidos</a></li>
            <li><a href="../sobrenos.html">Sobre nós</a></li>
        </ul>
    </nav>

    <div class="produto-finalizacao">
        <img src="../img/sucoUva.png" class="img-produto-finalizacao" alt="Suco Uva">
    </div>

    <form method="post">
        <input type="hidden" name="produto" value="Suco de Uva 300ml">
        <label class="label-qtd">Quantidade:</label>
        <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>

        <h2 class="forma-entrega">Tipo de Entrega</h2>
        <label><input type="radio" name="entrega" value="Entregar" required> Entregar</label>
        <label><input type="radio" name="entrega" value="Retirar" required> Retirar</label>

        <h3 class="forma-pagamento">Método Pagamento</h3>
        <select name="pagamento" class="escolha-pagamento" required>
            <option value="cartao-credito">Cartão de Crédito</option>
            <option value="cartao-debito">Cartão de Débito</option>
            <option value="pix">Pix</option>
            <option value="dinheiro">Dinheiro</option>
        </select>

        <input type="submit" class="btn-pagamento" value="Enviar pedido">
    </form>
</section>

<script>
function toggleMenu(button){
    const menu = button.parentElement.querySelector('.menu-opcoes');
    menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
}

window.addEventListener('click', function(e){
    document.querySelectorAll('.menu-opcoes').forEach(menu=>{
        const btn = menu.parentElement.querySelector('.menu-btn');
        if(menu.style.display === 'block' && !btn.contains(e.target) && !menu.contains(e.target)){
            menu.style.display = 'none';
        }
    });
});
</script>

</body>
</html>

<?php
// processamento genérico de pedido
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

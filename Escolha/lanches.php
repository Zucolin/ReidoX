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
    <title>Lanches</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <section id="lanches">
        <nav class="nav-escolha">
            <div class="menu-container">
                <button class="menu-btn" onclick="toggleMenu(this)">Olá, <?= htmlspecialchars($nome) ?>!</button>
                <div class="menu-opcoes">
                    <form method="post">
                        <button type="submit" name="editar">Editar</button>
                        <button type="submit" name="sair">Sair</button>
                    </form>
                </div>
            </div>
            <img src="logo.png" alt="logo" class="logo">
            <h1 class="titulo-pagina">Lanches</h1>
            <ul class="menu-principal">
                <li><a href="../paginainicio.php">Inicio</a></li>
                <li><a href="../pedidos.php">Pedidos</a></li>
                <li><a href="../sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>

        <div style="text-align:center; width:100%;">
            <a href="#x-cheese" class="produto-link"><img src="../img/X_CheeseBurguer.png" alt="X-Cheese"></a>
            <a href="#x-bacon" class="produto-link"><img src="../img/X_Bacon.png" alt="X-Bacon"></a>
            <a href="#x-chicken" class="produto-link"><img src="../img/X_Chicken.png" alt="X-Chicken"></a>
            <a href="#x-tudo" class="produto-link"><img src="../img/X_Tudo.png" alt="X-Tudo"></a>
        </div>
    </section>

    <!-- X-Cheese - detalhe -->
    <section id="x-cheese" class="produto-page">
        <nav class="nav-escolha"><img src="../img/logo.png" class="logo" alt="logo"><h1 class="titulo-pagina">X-Cheese</h1><ul class="menu-principal"><li><a href="#lanches">Voltar</a></li></ul></nav>
        <div class="produto-detalhe"><img src="../img/X_CheeseBurguer.png" class="produto-img-detalhe" alt="X-Cheese"><div>
            <h2 class="produto-titulo">X-Cheese</h2>
            <p class="produto-descricao">Hambúrguer com queijo derretido.</p>
            <form method="post" action="#finalizacaox-cheese">
                <input type="hidden" name="produto" value="X-Cheese">
                <label class="label-qtd">Quantidade:</label>
                <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
                <button class="btn-comprar" type="submit">Ir para finalização</button>
            </form>
        </div></div>
    </section>

    <section id="finalizacaox-cheese" class="finalizacao">
        <nav class="nav-escolha"><img src="../img/logo.png" class="logo" alt="logo"><ul class="menu-principal"><li><a href="#x-cheese">Detalhe</a></li><li><a href="#lanches">Voltar</a></li></ul></nav>
        <div class="produto-finalizacao"><img src="../img/X_CheeseBurguer.png" class="img-produto-finalizacao" alt="X-Cheese"></div>
        <form method="post">
            <input type="hidden" name="produto" value="X-Cheese">
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

    <!-- X-Bacon -->
    <section id="x-bacon" class="produto-page">
        <nav class="nav-escolha"><img src="../img/logo.png" class="logo" alt="logo"><h1 class="titulo-pagina">X-Bacon</h1><ul class="menu-principal"><li><a href="#lanches">Voltar</a></li></ul></nav>
        <div class="produto-detalhe"><img src="../img/X_Bacon.png" class="produto-img-detalhe" alt="X-Bacon"><div>
            <h2 class="produto-titulo">X-Bacon</h2>
            <p class="produto-descricao">Hambúrguer com bacon crocante.</p>
            <form method="post" action="#finalizacaox-bacon">
                <input type="hidden" name="produto" value="X-Bacon">
                <label class="label-qtd">Quantidade:</label>
                <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
                <button class="btn-comprar" type="submit">Ir para finalização</button>
            </form>
        </div></div>
    </section>

    <section id="finalizacaox-bacon" class="finalizacao">
        <nav class="nav-escolha"><img src="../img/logo.png" class="logo" alt="logo"><ul class="menu-principal"><li><a href="#x-bacon">Detalhe</a></li><li><a href="#lanches">Voltar</a></li></ul></nav>
        <div class="produto-finalizacao"><img src="../img/X_Bacon.png" class="img-produto-finalizacao" alt="X-Bacon"></div>
        <form method="post">
            <input type="hidden" name="produto" value="X-Bacon">
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

    <!-- X-Chicken -->
    <section id="x-chicken" class="produto-page">
        <nav class="nav-escolha"><img src="../img/logo.png" class="logo" alt="logo"><h1 class="titulo-pagina">X-Chicken</h1><ul class="menu-principal"><li><a href="#lanches">Voltar</a></li></ul></nav>
        <div class="produto-detalhe"><img src="../img/X_Chicken.png" class="produto-img-detalhe" alt="X-Chicken"><div>
            <h2 class="produto-titulo">X-Chicken</h2>
            <p class="produto-descricao">Hambúrguer de frango empanado.</p>
            <form method="post" action="#finalizacaox-chicken">
                <input type="hidden" name="produto" value="X-Chicken">
                <label class="label-qtd">Quantidade:</label>
                <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
                <button class="btn-comprar" type="submit">Ir para finalização</button>
            </form>
        </div></div>
    </section>

    <section id="finalizacaox-chicken" class="finalizacao">
        <nav class="nav-escolha"><img src="../img/logo.png" class="logo" alt="logo"><ul class="menu-principal"><li><a href="#x-chicken">Detalhe</a></li><li><a href="#lanches">Voltar</a></li></ul></nav>
        <div class="produto-finalizacao"><img src="../img/X_Chicken.png" class="img-produto-finalizacao" alt="X-Chicken"></div>
        <form method="post">
            <input type="hidden" name="produto" value="X-Chicken">
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

    <!-- X-Tudo -->
    <section id="x-tudo" class="produto-page">
        <nav class="nav-escolha"><img src="../img/logo.png" class="logo" alt="logo"><h1 class="titulo-pagina">X-Tudo</h1><ul class="menu-principal"><li><a href="#lanches">Voltar</a></li></ul></nav>
        <div class="produto-detalhe"><img src="../img/X_Tudo.png" class="produto-img-detalhe" alt="X-Tudo"><div>
            <h2 class="produto-titulo">X-Tudo</h2>
            <p class="produto-descricao">Hambúrguer completo com vários acompanhamentos.</p>
            <form method="post" action="#finalizacaox-tudo">
                <input type="hidden" name="produto" value="X-Tudo">
                <label class="label-qtd">Quantidade:</label>
                <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
                <button class="btn-comprar" type="submit">Ir para finalização</button>
            </form>
        </div></div>
    </section>

    <section id="finalizacaox-tudo" class="finalizacao">
        <nav class="nav-escolha"><img src="../img/logo.png" class="logo" alt="logo"><ul class="menu-principal"><li><a href="#x-tudo">Detalhe</a></li><li><a href="#lanches">Voltar</a></li></ul></nav>
        <div class="produto-finalizacao"><img src="../img/X_Tudo.png" class="img-produto-finalizacao" alt="X-Tudo"></div>
        <form method="post">
            <input type="hidden" name="produto" value="X-Tudo">
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
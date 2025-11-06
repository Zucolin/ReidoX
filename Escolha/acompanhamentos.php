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
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Porções</title>
<link rel="stylesheet" href="estilo.css">
</head>
<body>

<section id="acompanhamentos">
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
        <h1 class="titulo-pagina">Porções</h1>
        <ul class="menu-principal">
            <li><a href="../paginainicio.php">Inicio</a></li>
            <li><a href="../pedidos.php">Pedidos</a></li>
            <li><a href="../sobrenos.html">Sobre nós</a></li>
        </ul>
    </nav>

    <div style="text-align:center; width:100%;">
        <a href="#porcaobatata" class="produto-link"><img src="../img/porcaobatata.png" alt="Porção Batata"></a>
        <a href="#porcaofrangofrito" class="produto-link"><img src="../img/porcaoFrangoFrito.png" alt="Frango Frito"></a>
        <a href="#porcaomucarela" class="produto-link"><img src="../img/porcaoMucarela.png" alt="Muçarela"></a>
        <a href="#porcaocebola" class="produto-link"><img src="../img/porcaoAnelCebola.png" alt="Anéis de Cebola"></a>
    </div>
</section>

<!-- Porção Batata - detalhe -->
<section id="porcaobatata" class="produto-page">
    <nav class="nav-escolha"><img src="../img/logo.jpeg" alt="logo" class="logo">
        <h1 class="titulo-pagina">Porção de Fritas</h1>
        <ul class="menu-principal"><li><a href="#acompanhamentos">Voltar</a></li></ul>
    </nav>

    <div class="produto-detalhe">
        <img src="../img/porcaobatata.png" alt="Porção Batata" class="produto-img-detalhe">
        <div>
            <h2 class="produto-titulo">Porção de Fritas</h2>
            <p class="produto-descricao">Crocrante por fora, macia por dentro, servida quentinha para acompanhar seu hambúrguer.</p>
            <form method="post" action="#finalizacaobatata">
                <input type="hidden" name="produto" value="Porção de Batata">
                <label class="label-qtd">Quantidade:</label>
                <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
                <button class="btn-comprar" type="submit">Ir para finalização</button>
            </form>
        </div>
    </div>
</section>

<!-- Porção Batata - finalização -->
<section id="finalizacaobatata" class="finalizacao">
    <nav class="nav-escolha"><img src="../img/logo.jpeg" alt="logo" class="logo">
        <ul class="menu-principal"><li><a href="#porcaobatata">Detalhe</a></li><li><a href="#acompanhamentos">Voltar</a></li></ul>
    </nav>

    <div class="produto-finalizacao"><img src="../img/porcaobatata.png" class="img-produto-finalizacao" alt="Porção Batata"></div>

    <form method="post">
        <input type="hidden" name="produto" value="Porção de Batata">
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

<!-- Frango Frito - detalhe -->
<section id="porcaofrangofrito" class="produto-page">
    <nav class="nav-escolha"><img src="../img/logo.png" class="logo" alt="logo"><h1 class="titulo-pagina">Porção Frango Frito</h1>
        <ul class="menu-principal"><li><a href="#acompanhamentos">Voltar</a></li></ul>
    </nav>
    <div class="produto-detalhe">
        <img src="../img/porcaoFrangoFrito.png" class="produto-img-detalhe" alt="Frango Frito">
        <div>
            <h2 class="produto-titulo">Porção Frango Frito</h2>
            <p class="produto-descricao">Pedaços selecionados, crocantes por fora e suculentos por dentro.</p>
            <form method="post" action="#finalizacaofrangofrito">
                <input type="hidden" name="produto" value="Porção de Frango Frito">
                <label class="label-qtd">Quantidade:</label>
                <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
                <button class="btn-comprar" type="submit">Ir para finalização</button>
            </form>
        </div>
    </div>
</section>

<section id="finalizacaofrangofrito" class="finalizacao">
    <nav class="nav-escolha"><img src="../img/logo.png" class="logo" alt="logo"><ul class="menu-principal"><li><a href="#porcaofrangofrito">Detalhe</a></li><li><a href="#acompanhamentos">Voltar</a></li></ul></nav>
    <div class="produto-finalizacao"><img src="../img/porcaoFrangoFrito.png" class="img-produto-finalizacao" alt="Frango Frito"></div>
    <form method="post">
        <input type="hidden" name="produto" value="Porção de Frango Frito">
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

<!-- Muçarela -->
<section id="porcaomucarela" class="produto-page">
    <nav class="nav-escolha"><img src="../img/logo.png" class="logo" alt="logo"><h1 class="titulo-pagina">Porção Palitos de Muçarela</h1><ul class="menu-principal"><li><a href="#acompanhamentos">Voltar</a></li></ul></nav>
    <div class="produto-detalhe"><img src="../img/porcaoMucarela.png" class="produto-img-detalhe" alt="Muçarela"><div>
        <h2 class="produto-titulo">Porção Palitos de Muçarela</h2>
        <p class="produto-descricao">Deliciosos palitos empanados, dourados e crocantes.</p>
        <form method="post" action="#finalizacaomucarela">
            <input type="hidden" name="produto" value="Porção de Muçarela">
            <label class="label-qtd">Quantidade:</label>
            <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
            <button class="btn-comprar" type="submit">Ir para finalização</button>
        </form>
    </div></div>
</section>

<section id="finalizacaomucarela" class="finalizacao">
    <nav class="nav-escolha"><img src="../img/logo.png" class="logo" alt="logo"><ul class="menu-principal"><li><a href="#porcaomucarela">Detalhe</a></li><li><a href="#acompanhamentos">Voltar</a></li></ul></nav>
    <div class="produto-finalizacao"><img src="../img/porcaoMucarela.png" class="img-produto-finalizacao" alt="Muçarela"></div>
    <form method="post">
        <input type="hidden" name="produto" value="Porção de Muçarela">
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

<!-- Anéis de Cebola -->
<section id="porcaocebola" class="produto-page">
    <nav class="nav-escolha"><img src="../img/logo.png" class="logo" alt="logo"><h1 class="titulo-pagina">Porção Anéis de Cebola</h1><ul class="menu-principal"><li><a href="#acompanhamentos">Voltar</a></li></ul></nav>
    <div class="produto-detalhe"><img src="../img/porcaoAnelCebola.png" class="produto-img-detalhe" alt="Anéis de Cebola"><div>
        <h2 class="produto-titulo">Porção Anéis de Cebola</h2>
        <p class="produto-descricao">Anéis empanados e fritos, crocantes e saborosos.</p>
        <form method="post" action="#finalizacaocebola">
            <input type="hidden" name="produto" value="Porção Anéis de Cebola">
            <label class="label-qtd">Quantidade:</label>
            <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
            <button class="btn-comprar" type="submit">Ir para finalização</button>
        </form>
    </div></div>
</section>

<section id="finalizacaocebola" class="finalizacao">
    <nav class="nav-escolha"><img src="../img/logo.png" class="logo" alt="logo"><ul class="menu-principal"><li><a href="#porcaocebola">Detalhe</a></li><li><a href="#acompanhamentos">Voltar</a></li></ul></nav>
    <div class="produto-finalizacao"><img src="../img/porcaoAnelCebola.png" class="img-produto-finalizacao" alt="Anéis de Cebola"></div>
    <form method="post">
        <input type="hidden" name="produto" value="Porção Anéis de Cebola">
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
// Processamento do pedido (mantive a lógica original)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['sair'])) {
        header('Location: ../index.php');
        exit;
    }

    if (isset($_POST['produto']) && isset($_POST['quantidade'])) {
       
        $nomepedido = $_POST['produto'];
        $quantidade = intval($_POST['quantidade']);
        $pedido = $nomepedido . " x" . $quantidade;

        require_once '../DB/Database.php';
        require_once '../Controller/UsuarioController.php';
        $controller = new UsuarioController($pdo);
        $controller->enviarpedidos($pedido);
    }
}
?>
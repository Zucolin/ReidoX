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
<link rel="stylesheet" href="estilos.css">
</head>
<body>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Porções</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <section id="acompanhamentos"> <nav class="nav-escolha">
            <a href="../paginainicio.php"><img src="../img/logo.png" alt="logo" class="logo"></a>
            <ul>
                <li><a href="../paginainicio.php">Início</a></li>
                <li><a href="../pedidos.php">Pedidos</a></li>
                <li><a href="../sobrenos.html">Sobre nós</a></li>
            </ul>
            <button class="menu-btn" onclick="toggleMenu(this)">Olá, <?= htmlspecialchars($nome) ?>!</button>
            <div class="menu-opcoes" id="menu">
                <form method="post">
                    <button><a href="../index.php">Sair</a></button>
                </form>
            </div>
        </nav>
        <h1 class="titulo-pagina">Porções</h1>
        
        <div id="itens-container" class="grind">
            <div onclick="location.href='#porcaobatata'" class="card">
                <img src="../img/porcaobatata.png" alt="Porção Batata">
                <p>Porção de Fritas</p>
            </div>
            <div onclick="location.href='#porcaofrangofrito'" class="card">
                <img src="../img/porcaoFrangoFrito.png" alt="Frango Frito">
                <p>Porção Frango Frito</p>
            </div>
            <div onclick="location.href='#porcaomucarela'" class="card">
                <img src="../img/porcaoMucarela.png" alt="Muçarela">
                <p>Palitos de Muçarela</p>
            </div>
            <div onclick="location.href='#porcaocebola'" class="card">
                <img src="../img/porcaoAnelCebola.png" alt="Anéis de Cebola">
                <p>Anéis de Cebola</p>
            </div>
        </div>
    </section>

    <section id="porcaobatata" class="produto-page">
        <nav class="nav-escolha">
            <img src="../img/logo.png" alt="logo" class="logo">
            <ul>
                <li><a href="../paginainicio.php">Início</a></li>
                <li><a href="../pedidos.php">Pedidos</a></li>
                <li><a href="../sobrenos.html">Sobre nós</a></li>
            </ul>
            <button class="menu-btn" onclick="toggleMenu(this)">Olá, <?= htmlspecialchars($nome) ?>!</button>
            <div class="menu-opcoes" id="menu">
                <form method="post">
                    <button><a href="../index.php">Sair</a></button>
                </form>
            </div>
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
                    <button class="btn-comprar" type="submit">Finalizar compra</button>
                </form>
            </div>
        </div>
        <a href="#acompanhamentos"><button class="voltar">Voltar</button></a>
    </section>

    <section id="finalizacaobatata" class="finalizacao">
        <nav class="nav-escolha">
            <img src="../img/logo.png" alt="logo" class="logo">
            <ul class="menu-principal">
                <li><a href="../paginainicio.php">Início</a></li>
                <li><a href="../pedidos.php">Pedidos</a></li>
                <li><a href="../sobrenos.html">Sobre nós</a></li>
            </ul>
            <button class="menu-btn" onclick="toggleMenu(this)">Olá, <?= htmlspecialchars($nome) ?>!</button>
            <div class="menu-opcoes" id="menu">
                <form method="post">
                    <button><a href="../index.php">Sair</a></button>
                </form>
            </div>
        </nav>

        <div class="produto-finalizacao">
            <img src="../img/porcaobatata.png" class="img-produto-finalizacao" alt="Porção Batata">
        
            <form method="post" action="../pedidos.php">
                <input type="hidden" name="produto" value="Porção de Batata">

                <h1 class="forma-entrega">Tipo de Entrega</h1>
                <div class="entrega">
                    <input type="radio" name="entrega" value="Entregar" required>
                    <label>Entregar</label>
                </div>
                <div class="entrega2">
                    <input type="radio" name="entrega" value="Retirar" required>
                    <label>Retirar</label>   
                </div>

                <h3 class="forma-pagamento">Método Pagamento</h3>
                <select name="pagamento" class="escolha-pagamento" required>
                    <option value="cartao-credito">Cartão de Crédito</option>
                    <option value="cartao-debito">Cartão de Débito</option>
                    <option value="pix">Pix</option>
                    <option value="dinheiro">Dinheiro</option>
                </select>
                <input type="submit" class="btn-pagamento" value="Enviar pedido">
            </form>
        </div>
    </section>

    <section id="porcaofrangofrito" class="produto-page">
        <nav class="nav-escolha">
            <img src="../img/logo.png" alt="logo" class="logo">
            <ul>
                <li><a href="../paginainicio.php">Início</a></li>
                <li><a href="../pedidos.php">Pedidos</a></li>
                <li><a href="../sobrenos.html">Sobre nós</a></li>
            </ul>
            <button class="menu-btn" onclick="toggleMenu(this)">Olá, <?= htmlspecialchars($nome) ?>!</button>
            <div class="menu-opcoes" id="menu">
                <form method="post">
                    <button><a href="../index.php">Sair</a></button>
                </form>
            </div>
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
                    <button class="btn-comprar" type="submit">Finalizar compra</button>
                </form>
            </div>
        </div>
        <a href="#acompanhamentos"><button class="voltar">Voltar</button></a>
    </section>

    <section id="finalizacaofrangofrito" class="finalizacao">
        <nav class="nav-escolha">
            <img src="../img/logo.png" alt="logo" class="logo">
            <ul class="menu-principal">
                <li><a href="../paginainicio.php">Início</a></li>
                <li><a href="../pedidos.php">Pedidos</a></li>
                <li><a href="../sobrenos.html">Sobre nós</a></li>
            </ul>
            <button class="menu-btn" onclick="toggleMenu(this)">Olá, <?= htmlspecialchars($nome) ?>!</button>
            <div class="menu-opcoes" id="menu">
                <form method="post">
                    <button><a href="../index.php">Sair</a></button>
                </form>
            </div>
        </nav>

        <div class="produto-finalizacao">
            <img src="../img/porcaoFrangoFrito.png" class="img-produto-finalizacao" alt="Frango Frito">
            
            <form method="post" action="../pedidos.php">
                <input type="hidden" name="produto" value="Porção de Frango Frito">
                <h1 class="forma-entrega">Tipo de Entrega</h1>
                <div class="entrega">
                    <input type="radio" name="entrega" value="Entregar" required>
                    <label>Entregar</label>
                </div>
                <div class="entrega2">
                    <input type="radio" name="entrega" value="Retirar" required>
                    <label>Retirar</label>   
                </div>

                <h3 class="forma-pagamento">Método Pagamento</h3>
                <select name="pagamento" class="escolha-pagamento" required>
                    <option value="cartao-credito">Cartão de Crédito</option>
                    <option value="cartao-debito">Cartão de Débito</option>
                    <option value="pix">Pix</option>
                    <option value="dinheiro">Dinheiro</option>
                </select>
                <input type="submit" class="btn-pagamento" value="Enviar pedido">
            </form>
        </div>
    </section>

    <section id="porcaomucarela" class="produto-page">
        <nav class="nav-escolha">
            <img src="../img/logo.png" alt="logo" class="logo">
            <ul>
                <li><a href="../paginainicio.php">Início</a></li>
                <li><a href="../pedidos.php">Pedidos</a></li>
                <li><a href="../sobrenos.html">Sobre nós</a></li>
            </ul>
            <button class="menu-btn" onclick="toggleMenu(this)">Olá, <?= htmlspecialchars($nome) ?>!</button>
            <div class="menu-opcoes" id="menu">
                <form method="post">
                    <button><a href="../index.php">Sair</a></button>
                </form>
            </div>
        </nav>

        <div class="produto-detalhe">
            <img src="../img/porcaoMucarela.png" class="produto-img-detalhe" alt="Muçarela">
            <div>
                <h2 class="produto-titulo">Porção Palitos de Muçarela</h2>
                <p class="produto-descricao">Deliciosos palitos empanados, dourados e crocantes.</p>
                <form method="post" action="#finalizacaomucarela">
                    <input type="hidden" name="produto" value="Porção de Muçarela">
                    <label class="label-qtd">Quantidade:</label>
                    <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
                    <button class="btn-comprar" type="submit">Finalizar compra</button>
                </form>
            </div>
        </div>
        <a href="#acompanhamentos"><button class="voltar">Voltar</button></a>
    </section>

    <section id="finalizacaomucarela" class="finalizacao">
        <nav class="nav-escolha">
            <img src="../img/logo.png" alt="logo" class="logo">
            <ul class="menu-principal">
                <li><a href="../paginainicio.php">Início</a></li>
                <li><a href="../pedidos.php">Pedidos</a></li>
                <li><a href="../sobrenos.html">Sobre nós</a></li>
            </ul>
            <button class="menu-btn" onclick="toggleMenu(this)">Olá, <?= htmlspecialchars($nome) ?>!</button>
            <div class="menu-opcoes" id="menu">
                <form method="post">
                    <button><a href="../index.php">Sair</a></button>
                </form>
            </div>
        </nav>

        <div class="produto-finalizacao">
            <img src="../img/porcaoMucarela.png" class="img-produto-finalizacao" alt="Muçarela">
            
            <form method="post" action="../pedidos.php">
                <input type="hidden" name="produto" value="Porção de Muçarela">
                <h1 class="forma-entrega">Tipo de Entrega</h1>
                <div class="entrega">
                    <input type="radio" name="entrega" value="Entregar" required>
                    <label>Entregar</label>
                </div>
                <div class="entrega2">
                    <input type="radio" name="entrega" value="Retirar" required>
                    <label>Retirar</label>   
                </div>

                <h3 class="forma-pagamento">Método Pagamento</h3>
                <select name="pagamento" class="escolha-pagamento" required>
                    <option value="cartao-credito">Cartão de Crédito</option>
                    <option value="cartao-debito">Cartão de Débito</option>
                    <option value="pix">Pix</option>
                    <option value="dinheiro">Dinheiro</option>
                </select>
                <input type="submit" class="btn-pagamento" value="Enviar pedido">
            </form>
        </div>
    </section>

    <section id="porcaocebola" class="produto-page">
        <nav class="nav-escolha">
            <img src="../img/logo.png" alt="logo" class="logo">
            <ul>
                <li><a href="../paginainicio.php">Início</a></li>
                <li><a href="../pedidos.php">Pedidos</a></li>
                <li><a href="../sobrenos.html">Sobre nós</a></li>
            </ul>
            <button class="menu-btn" onclick="toggleMenu(this)">Olá, <?= htmlspecialchars($nome) ?>!</button>
            <div class="menu-opcoes" id="menu">
                <form method="post">
                    <button><a href="../index.php">Sair</a></button>
                </form>
            </div>
        </nav>

        <div class="produto-detalhe">
            <img src="../img/porcaoAnelCebola.png" class="produto-img-detalhe" alt="Anéis de Cebola">
            <div>
                <h2 class="produto-titulo">Porção Anéis de Cebola</h2>
                <p class="produto-descricao">Anéis empanados e fritos, crocantes e saborosos.</p>
                <form method="post" action="#finalizacaocebola">
                    <input type="hidden" name="produto" value="Porção Anéis de Cebola">
                    <label class="label-qtd">Quantidade:</label>
                    <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
                    <button class="btn-comprar" type="submit">Finalizar compra</button>
                </form>
            </div>
        </div>
        <a href="#acompanhamentos"><button class="voltar">Voltar</button></a>
    </section>

    <section id="finalizacaocebola" class="finalizacao">
        <nav class="nav-escolha">
            <img src="../img/logo.png" alt="logo" class="logo">
            <ul class="menu-principal">
                <li><a href="../paginainicio.php">Início</a></li>
                <li><a href="../pedidos.php">Pedidos</a></li>
                <li><a href="../sobrenos.html">Sobre nós</a></li>
            </ul>
            <button class="menu-btn" onclick="toggleMenu(this)">Olá, <?= htmlspecialchars($nome) ?>!</button>
            <div class="menu-opcoes" id="menu">
                <form method="post">
                    <button><a href="../index.php">Sair</a></button>
                </form>
            </div>
        </nav>

        <div class="produto-finalizacao">
            <img src="../img/porcaoAnelCebola.png" class="img-produto-finalizacao" alt="Anéis de Cebola">
            
            <form method="post" action="../pedidos.php">
                <input type="hidden" name="produto" value="Porção Anéis de Cebola">
                <h1 class="forma-entrega">Tipo de Entrega</h1>
                <div class="entrega">
                    <input type="radio" name="entrega" value="Entregar" required>
                    <label>Entregar</label>
                </div>
                <div class="entrega2">
                    <input type="radio" name="entrega" value="Retirar" required>
                    <label>Retirar</label>   
                </div>

                <h3 class="forma-pagamento">Método Pagamento</h3>
                <select name="pagamento" class="escolha-pagamento" required>
                    <option value="cartao-credito">Cartão de Crédito</option>
                    <option value="cartao-debito">Cartão de Débito</option>
                    <option value="pix">Pix</option>
                    <option value="dinheiro">Dinheiro</option>
                </select>
                <input type="submit" class="btn-pagamento" value="Enviar pedido">
            </form>
        </div>
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
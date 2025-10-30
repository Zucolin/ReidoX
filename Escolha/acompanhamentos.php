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
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<section id="acompanhamentos">
    <nav class="nav-escolha">
        <div class="menu-container">
            <button type="required" class="menu-btn" onclick="toggleMenu(this)">Olá, <?= htmlspecialchars($nome) ?>!</button>
            <div class="menu-opcoes">
                <form method="post" >
                    <button type="required" type="submit" name="editar">Editar</button>
                    <button type="required" type="submit" name="sair">Sair</button>
                    <button type="required" type="button">Detalhes</button>
                </form>
            </div>
        </div>
        <img src="logo.png" alt="" class="logo">
        <h1 class="titulo-pagina">Porções</h1>
        <ul class="menu-principal">
            <li><a href="paginainicio.php" >Inicio</a></li>
            <li><a href="pedidos.php" >Pedidos</a></li>
            <li><a href="sobrenos.html">Sobre nós</a></li>
        </ul>
    </nav>

    <a href="#porcaocebola" class="produto-link">
        <img src="../img/porcaoAnelbatata.png" alt=""></a>
    <a href="#porcaobatata" class="produto-link">
        <img src="../img/porcaobatata.png" alt=""></a>
    <a href="#porcaofrangofrito" class="produto-link">
        <img src="../img/porcaoFrangoFrito.png" alt=""></a>
    <a href="#porcaomucarela" class="produto-link">
        <img src="../img/porcaoMucarela.png" alt=""></a>
   
    <!-- Porção Batata -->


        <!-- Produto específico -->
        <section id="porcaobatata">
            <div class="produto-detalhe">
                <img src="../img/porcaobatata.png" alt="" class="produto-img-detalhe">
                <h1 class="produto-titulo">Porção de Fritas</h1>
                <p class="produto-descricao">Crocrante por fora, macia por dentro, servida quentinha para acompanhar seu hambúrguer.</p>
            </div>
            <form method="post">
                <label class="label-qtd">Quantidade:</label>
                <input type="number" name="quantidade" class="input-qtd">
                <button class="btn-comprar"type="submit"><a href="#finalizacaobatata">Comprar</a></button>
            </form>

            <!-- Finalização -->
            <section id="finalizacaobatata" class="finalizacao">
                <nav class="nav-escolha">
                    <img src="../img/logo.jpeg" alt="" class="logo">
                    <ul class="menu-principal">
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div class="produto-finalizacao">
                    <img src="../img/porcaobatata.png" alt="" class="img-produto-finalizacao">
                </div>
                <form method="post">
                <input type="hidden" name="produto" value="Porção de Batata" >
                <h2 class="forma-entrega">Tipo de Entrega</h2>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Entregar" class="input-entregas"required> Entregar</label>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Retirar" class="input-entregas"required> Retirar</label>
                    <h3 class="forma-pagamento">Método Pagamento</h3>
                    <select name="pagamento" class="escolha-pagamento"required>
                        <option value="cartao-credito">Cartão de Crédito</option>
                        <option value="cartao-debito">Cartão de Débito</option>
                        <option value="pix">Pix</option>
                        <option value="dinheiro">Dinheiro</option>
                    </select>
                    <input type="submit" class="btn-pagamento">
                </form>
            </section>
        </section>
    </section>

    <!-- Porção frango frito -->

        <section id="porcaofrangofrito">
            <div class="produto-detalhe">
                <img src="../img/porcaoFrangoFrito.png" alt="" class="produto-img-detalhe">
                <h1 class="produto-titulo">Porção Frango Frito </h1>
                <p class="produto-descrição">Pedaços selecionados, crocantes por fora e suculentos por dentro, preparados na hora para máxima qualidade.</p>
            </div>
            <form method="post">
                <label class="label-qtd">Quantidade:</label>
                <input type="number" name="quantidade" class="input-qtd">
                <button class="btn-comprar"type="submit"><a href="#finalizacaofrangofrito">Comprar</a></button>
            </form>

            <section id="finalizacaofrangofrito" class="finalizacao">
                <nav class="nav-escolha">
                    <img src="../img/logo.png" alt="" class="logo">
                    <ul class="menu-principal">
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div class="produto-finalizacao">
                    <img src="../img/porcaoFrangoFrito.png" alt="" class="img-produto-finalizacao">
                </div>
                <form method="post">
                <input type="hidden" name="produto" value="Porção de Frango Frito">
                <h2 class="forma-entrega">Tipo de Entrega</h2>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Entregar" required class="input-entregas"> Entregar</label>
                <label class="metodo-entrega"><input type="radio" name="entrega"  class="input-entregas"value="Retirar" required> Retirar</label>
                    <h3 class="forma-pagamento">Método Pagamento</h3>
                    <select name="pagamento" class="escolha-pagamento" required>
                        <option value="cartao-credito">Cartão de Crédito</option>
                        <option value="cartao-debito">Cartão de Débito</option>
                        <option value="pix">Pix</option>
                        <option value="dinheiro">Dinheiro</option>
                    </select>
                    <input type="submit" class="btn-pagamento">
                </form>
            </section>
        </section>
    </section>

    <!-- Porção Muçarela -->

        <section id="porcaomucarela">
            <div class="produto-detalhe">
                <img src="../img/porcaoMucarela.png" alt="" class="produto-img-detalhe">
                <h1 class="produto-titulo">Porção Palitos de Muçarela</h1>
                <p class="produto-descricao">Deliciosos palitos de muçarela empanados, dourados e crocantes por fora, com queijo derretido e irresistível por dentro.</p>
            </div>
            <form method="post">
                <label class="label-qtd">Quantidade:</label>
                <input type="number" name="quantidade"class="input-qtd">
                <button class="btn-comprar"type="submit"><a href="#finalizacaomucarela">Comprar</a></button>
            </form>

            <section id="finalizacaomucarela" class="finalizacao">
                <nav class="nav-escolha">
                    <img src="../img/logo.png" alt="" class="logo">
                    <ul class="menu-principal">
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div class="produto-finalizaçao">
                    <img src="../img/porcaoMucarela.png" alt="" class="img-produto-finalizacao">
                </div>
                <form method="post">
                <input type="hidden" name="produto" value="Porção de Muçarela">
                <h2 class="forma-entrega">Tipo de Entrega</h2>
                <label class="metodod-entrega">
                    <input type="radio" name="entrega" value="Entregar" class="input-entregas" required> Entregar</label>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Retirar" class="input-entregas" required> Retirar</label>
                    <h3 class="forma-pagamento">Método Pagamento</h3>
                    <select name="pagamento" class="escolha-pagamento"required>
                        <option value="cartao-credito">Cartão de Crédito</option>
                        <option value="cartao-debito">Cartão de Débito</option>
                        <option value="pix">Pix</option>
                        <option value="dinheiro">Dinheiro</option>
                    </select>
                    <input type="submit" class="btn-pagamento">
                </form>
            </section>
        </section>
    </section>

    <!-- Porção Anel cebola -->

        <section id="porcaocebola">
            <div class="produto-detalhe">
                <img src="../img/porcaoAnelCebola.png" alt="" class="produto-img-detalhe">
                <h1 class="produto-titulo">Porcão Anéis de Cebola </h1>
                <p class="produto-descrição">Anéis de cebola empanados e fritos, com crocância envolvente e sabor suave que conquista em cada mordida.</p>
            </div>
            <form method="post">
                <label class="label-qtd">Quantidade:</label>
                <input type="number" name="quantidade" class="input-qtd" required>
                <button class="btn-comprar" type="submit"><a href="#finalizacaocebola">Comprar</a></button>
            </form>

            <section id="finalizacaocebola" class="finalização">
                <nav class="nav-escolha">
                    <img src="../img/logo.png" alt="" class="logo">
                    <ul class="menu-principal">
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div class="produto-finalizacao">
                    <img src="../img/porcaoAnelCebola.png" alt="" class="img-produto-finalizacao">
                </div>
                <form method="post">
                <input type="hidden" name="produto" value="Porção de Aneis Cebola">
                <h2 class="forma-entrega">Tipo de Entrega</h2>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Entregar" class="input-entregas"required> Entregar</label>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Retirar" class="input-entregas" required> Retirar</label>
                    <h3 class="forma-pagamento">Método Pagamento</h3>
                    <select name="pagamento" class="escolha-pagamento" required>
                        <option value="cartao-credito">Cartão de Crédito</option>
                        <option value="cartao-debito">Cartão de Débito</option>
                        <option value="pix">Pix</option>
                        <option value="dinheiro">Dinheiro</option>
                    </select>
                    <input type="submit" class="btn-pagamento">
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
    $nomepedido=$_POST['produto'];
    $quantidade=$_POST['quantidade'];

    $pedido=$nomepedido." x".$quantidade;
    require_once '../Controller/UsuarioController.php';
    $controller = new UsuarioController($pdo);
    $controller->enviarpedidos($pedido);
    
}
?>

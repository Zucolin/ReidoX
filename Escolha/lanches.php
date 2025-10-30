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
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    </section>
    <section id="lanches">
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
            <img src="logo.png" alt="" class="logo">
            <h1 class="titulo-pagina">Lanches</h1>
        <ul class="menu-principal">
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <a href="#x-cheese" class="produto-link"><img src="../img/X_CheeseBurguer.png" alt=""></a><!-- Lanche 1-->
        <a href="#x-bacon"class="produto-link"><img src="../img/X_Bacon.png" alt=""></a><!-- Lanche 2-->
        <a href="#x-catupiry"class="produto-link"><img src="../img/X_CatupiryBacon.png" alt=""></a><!-- Lanche 3-->
        <a href="#x-chicken"class="produto-link"><img src="../img/X_Chicken.png" alt=""></a><!-- Lanche 4-->
        <a href="#x-costela"class="produto-link"><img src="../img/X_Costela.png" alt=""></a><!-- Lanche 5-->
        <a href="#x-salada"class="produto-link"><img src="../img/X_Salada.png" alt=""></a><!-- Lanche 6-->
        <a href="#x-tudo"class="produto-link"><img src="../img/X_Tudo.png" alt=""></a><!-- Lanche 7-->

        <!-- Cheese Burguer-->
   <!-- Produto: Cheese Burguer -->

<!-- 1ª seção: Página de escolha do produto -->
    
<section id="x-cheese">
    <div class="produto-detalhe">
        <img src="../img/X_CheeseBurguer.png" alt="" class="produto-img-detalhe">
        <h1 class="pproduto-titulo">X-Cheese Burguer</h1>
        <p class="produto-descricao">Pão e Maionese da Casa, Hambúrguer prensado e Queijo Cheddar derretido.</p>
    </div>
    <form method="post">
        <label class="label-qtd">Quantidade:</label>
        <input type="number" name="quantidade" class="input-qtd">
        <button class="btn-comprar"><a href="#finalizacaocheeseburguer">Comprar</a></button>
    </form>

<!-- 3ª seção: Finalização da compra -->
    <section id="finalizacaocheeseburguer" class="finalizacao">
        <nav class="nav-escolha">
            <img src="../img/logo.png" alt="" class="logo">
            <ul class="menu-principal">
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div class="produto-finalizacao">
            <img src="../img/X_CheeseBurguer.png" alt="" class="img-produto-finalizacao">
        </div>
        <form method="post">
                <input type="hidden" name="produto" value="X-ChesseBurguer">
                <h2 class="forma-entrega">Tipo de Entrega</h2>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Entregar" class="input-entregas"required> Entregar</label>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Retirar" class="input-entregas" required> Retirar</label>
            <h3 class="forma-pagamento">Método Pagamento</h3>
            <select name="pagamento" class="escolha-pagamento">
                <option value="cartao-credito">Cartão de Crédito</option>
                <option value="cartao-debito">Cartão de Débito</option>
                <option value="pix">Pix</option>
                <option value="dinheiro">Dinheiro</option>
            </select>
            <input type="submit" class="btn-pagamento">
        </form>
    </section>
</section>
<!-- Produto: x-bacon -->

<!-- 1ª seção: Página de escolha do produto -->
<section id="x-bacon">
    <div class="produto-detalhe">
        <img src="../img/X_Bacon.png" alt="" class="produto-img-detalhe">
        <h1 class="produto-titulo">X-Bacon</h1>
        <p class="produto-descricao">Pão Especial, Maionese da Casa, Hambúrguer prensado, Queijo Cheddar e Bacon em tiras.</p>
    </div>
    <form method="post">
        <label class="label-qtd">Quantidade:</label>
        <input class="input-qtd"type="number" name="quantidade">
        <button class="btn-comprar"><a href="#finalizacaox-bacon">Comprar</a></button>
    </form>

<!-- 3ª seção: Finalização da compra -->
    <section id="finalizacaox-bacon" class="finalizacao">
        <nav class="nav-escolha">
            <img src="../img/logo.png" alt="" class="logo">
            <ul class="menu-principal">
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div class="produto-finalizacao">
            <img src="../img/X_Bacon.png" alt="" class="img-prouto-finalizacao">
        </div>
        <form method="post">
                <input type="hidden" name="produto" value="X-Bacon">
                <h2 class="forma-entrega">Tipo de Entrega</h2>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Entregar" class="input-entregas"required> Entregar</label>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Retirar" class="input-entrgas"required> Retirar</label>
            <h3 class="forma-pagamento">Método Pagamento</h3>
            <select name="pagamento" class="escolha-pagamento">
                <option value="cartao-credito">Cartão de Crédito</option>
                <option value="cartao-debito">Cartão de Débito</option>
                <option value="pix">Pix</option>
                <option value="dinheiro">Dinheiro</option>
            </select>
            <input type="submit" class="btn-pagamento">
        </form>
    </section>
</section>

<!-- Produto: x-catupiry -->

<!-- 1ª seção: Página de escolha do produto -->
<section id="x-catupiry">
    <div class="produto-detalhe">
        <img src="../img/X_CatupiryBacon.png" alt="" class="produto-mg-detalhe">
        <h1 class="produto-titulo">X-Catupiry Bacon</h1>
        <p class="produto-descricao">Pão da Casa, Molho de Tomate Le Pinguê, Hambúrguer, Catupiry e Bacon crocante.</p>
    </div>
    <form method="post">
        <label class="label-qtd">Quantidade:</label>
        <input type="number" name="quantidade" class="input-qtd">
        <button class="btn-comprar"><a href="#finalizacaox-catupiry">Comprar</a></button>
    </form>

<!-- 3ª seção: Finalização da compra -->
    <section id="finalizacaox-catupiry" class="finalizacao">
        <nav class="nav-escolha">
            <img src="../img/logo.png" alt="" class="logo">
            <ul class="menu-principal">
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div class="produto-finalizacao">
            <img src="../img/X_CatupiryBacon.png" alt="" class="img-produto-finalizacao">
        </div>
        <form method="post">
                <input type="hidden" name="produto" value="X-Catupiry Bacon">
                <h2 class="forma-entrega">Tipo de Entrega</h2>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Entregar" class="input-entregas" required> Entregar</label>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Retirar" class="input-entregas"required> Retirar</label>
            <h3 class="forma-pagamento">Método Pagamento</h3>
            <select name="pagamento" class="escolha-pagamento">
                <option value="cartao-credito">Cartão de Crédito</option>
                <option value="cartao-debito">Cartão de Débito</option>
                <option value="pix">Pix</option>
                <option value="dinheiro">Dinheiro</option>
            </select>
            <input type="submit" class="btn-pagamento">
        </form>
    </section>
</section>
<!-- Produto: x-chicken -->

<!-- 1ª seção: Página de escolha do produto -->
<section id="x-chicken">
    <div class="produto-detalhe">
        <img src="../img/X_Chicken.png" alt="" class="produto-img-detalhe">
        <h1 class="produto-titulo">X-Chicken</h1>
        <p class="produto-descricao">Pão e Maionese da Casa, Hambúrguer de Frango empanado e Alface.</p>
    </div>
    <form method="post">
        <label class="label-qtd">Quantidade:</label>
        <input type="number" name="quantidade" class="input-qtd">
        <button class="btn-comprar"><a href="#finalizax-chicken">Comprar</a></button>
    </form>


<!-- 3ª seção: Finalização da compra -->
    <section id="finalizacaox-chicken" class="finalizacao">
        <nav class="nav-escolha">
            <img src="../img/logo.png" alt="" class="logo">
            <ul class="menu-principal">
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div class="produto-finalizacao">
            <img src="../img/X_Chicken.png" alt="" class="img-produto-finalizacao">
        </div>
        <form method="post">
                <input type="hidden" name="produto" value="X-Chicken">
                <h2 class="forma-entrega">Tipo de Entrega</h2>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Entregar" class="input-entregas"required> Entregar</label>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Retirar" class="input-entregas" required> Retirar</label>
            <h3 class="forma-pagamento">Método Pagamento</h3>
            <select name="pagamento" class="escolha-pagamento">
                <option value="cartao-credito">Cartão de Crédito</option>
                <option value="cartao-debito">Cartão de Débito</option>
                <option value="pix">Pix</option>
                <option value="dinheiro">Dinheiro</option>
            </select>
            <input type="submit" class="btn-pagamento">
        </form>
    </section>
</section>
<!-- Produto: x-costela -->

<!-- 1ª seção: Página de escolha do produto -->
<section id="x-costela">
    <div class="produto-detalhe">
        <img src="../img/X-Costela" alt="" class="produto-img-detalhe">
        <h1 class="produto-titulo">X-Costela</h1>
        <p class="produto-descricao">Pão e Maionese da Casa, Bacon crocante, Hambúrguer de Costela, Queijo Provolone, Molho Barbecue e Cebola Roxa.</p>
    </div>
    <form method="post">
        <label class="label-qtd">Quantidade:</label>
        <input type="number" name="quantidade" class="input-qtd">
        <button class="btn-comprar"><a href="#finalizacaox-costela">Comprar</a></button>
    </form>


<!-- 3ª seção: Finalização da compra -->
    <section id="finalizacaox-costela" class="finalizacao">
        <nav class="nav-escolha">
            <img src="../img/logo.jpeg" alt="" class="logo">
            <ul class="menu-principal">
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div class="produto-finalizacao">
            <img src="../img/X-Costela" alt=""class="classimg-produto-finalizacao">
        </div>
        <form method="post">
                <input type="hidden" name="produto" value="X-Costela">
                <h2 class="forma-entrega">Tipo de Entrega</h2>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Entregar" class="input-entregas"required> Entregar</label>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Retirar" class="input-entregas"required> Retirar</label>
            <h3 class="forma-pagamento">Método Pagamento</h3>
            <select name="pagamento" class="escolha-pagamento">
                <option value="cartao-credito">Cartão de Crédito</option>
                <option value="cartao-debito">Cartão de Débito</option>
                <option value="pix">Pix</option>
                <option value="dinheiro">Dinheiro</option>
            </select>
            <input type="submit" class="btn-pagamento">
        </form>
    </section>
</section>
<!-- Produto: x-salada -->

<!-- 1ª seção: Página de escolha do produto -->
<section id="x-salada">
    <div class="produto-detalhe">
        <img src="../img/X_Salada.png" alt="" class="produto-img-detalhe">
        <h1 class="produto-titulo">X-Salada</h1>
        <p class="produto-descricao">Pão Especial, Maionese da Casa, Hambúrguer prensado, Queijo Cheddar, Alface e Tomate.</p>
    </div>
    <form method="post">
        <label class="label-qtd">Quantidade:</label>
        <input type="number" name="quantidade" class="input-qtd">
        <button class="btn-comprar"><a href="#finalizacaox-salada">Comprar</a></button>
    </form>


<!-- 3ª seção: Finalização da compra -->
    <section id="finalizacaox-salada" class="finalizacao">
        <nav class="nav-escolha">
            <img src="../img/logo.png" alt="" class="logo">
            <ul class="menu-principal">
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div class="produto-finalizacao">
            <img src="../img/X-Salada.png" alt="" class="img-produto-finalizacao">
        </div>
        <form method="post">
                <input type="hidden" name="produto" value="X-Salada">
                <h2 class="forma-entrega">Tipo de Entrega</h2>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Entregar" class="input-entregas" required> Entregar</label>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Retirar" class="input-entregas" required> Retirar</label>
            <h3 class="forma-pagamento">Método Pagamento</h3>
            <select name="pagamento" class="escolha-pagamento">
                <option value="cartao-credito">Cartão de Crédito</option>
                <option value="cartao-debito">Cartão de Débito</option>
                <option value="pix">Pix</option>
                <option value="dinheiro">Dinheiro</option>
            </select>
            <input type="submit" class="btn-pagamento">
        </form>
    </section>
</section>
<!-- Produto: x-tudo -->

<!-- 1ª seção: Página de escolha do produto -->
<section id="x-tudo">
    <div class="produto-detalhe">
        <img src="../img/X_Tudo.png" alt="" class="produto-img-detalhe">
        <h1 class="produto-titulo">X-Tudo</h1>
        <p class="produto-descricao">Pão da Casa, Maionese de Bacon, Hambúrguer, Queijo Muçarela, Cebola Roxa, Alface e Tomate.</p>
    </div>
    <form method="post">
        <label class="label-qtd">Quantidade:</label>
        <input type="number" name="quantidade" class="input-qtd">
        <button class="btn-comprar"><a href="#finalizacaox-tudo">Comprar</a></button>
    </form>


<!-- 3ª seção: Finalização da compra -->
    <section id="finalizacaox-tudo" class="finalizacao">
        <nav class="nav-escolha">
            <img src="../img/logo.png" alt="" class="logo">
            <ul class="menu-principal">
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div class="produto-finalizacao">
            <img src="../img/X_Tudo.png" alt="" class="img-produto-finalizacao">
        </div>
        <form method="post">
                <input type="hidden" name="produto" value="X-Tudo">
                <h2 class="forma-entrega">Tipo de Entrega</h2>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Entregar" class="input-entregas" required> Entregar</label>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Retirar" class="input-entregas" required> Retirar</label>
            <h3 class="forma-pagamento">Método Pagamento</h3>
            <select name="pagamento" class="escolha-pagamento">
                <option value="cartao-credito">Cartão de Crédito</option>
                <option value="cartao-debito">Cartão de Débito</option>
                <option value="pix">Pix</option>
                <option value="dinheiro">Dinheiro</option>
            </select>
            <input type="submit" class="btn-pagamento">
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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomepedido=$_POST['produto'];
    $quantidade=$_POST['quantidade'];

    $pedido=$nomepedido." x".$quantidade;
    require_once '../Controller/UsuarioController.php';
    $controller = new UsuarioController($pdo);
    $controller->enviarpedidos($pedido);
    
}
?>
 

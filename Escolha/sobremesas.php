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
    
</head>
<body>
    <section id="sobremesas">
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
            <h1 class="titulo-pagina">Sobremesas</h1>
        <ul class="menu-principal">
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <a href="#browniesorvete" class="produto-link">
            <img src="img/brownieSorvete.png" alt=""></a><!-- Sobremesa 1-->
        <a href="#moussemaracuja"class="produto-link">
            <img src="img/mousseMaracuja.png" alt=""></a><!-- Sobremesa 2-->
        <a href="#moussemorango"class="produto-link">
            <img src="img/mousseMorango.png" alt=""></a><!-- Sobremesa 3-->
        <a href="#sorveteflocos"class="produto-link">
            <img src="img/sorveteflocos.png" alt=""></a><!-- Sobremesa 4-->
        <a href="#torta"class="produto-link">
            <img src="img/torta.png" alt=""></a><!-- Sobremesa 5-->

<!-- Sobremesa: Brownie e Sorvete  -->

<!-- 1ª Seção: Página de escolha do produto -->
<section id="brownieesorvete">
    <div class="produto-detalhe">
        <img src="img/brownieSorvete.png" alt="" class="produto-img-detalhe">
        <h1 class="produto-titulo">Brownie com Sorvete</h1>
        <p class="produto-descricao">Brownie quentinho e macio com uma bola de sorvete cremoso e calda de Morango. Irresistível!</p>
    </div>
    <form method="post">
        <label class="label-qtd">Quantidade:</label>
        <input type="number" name="quantidade" class="input-qtd">
        <button class="btn-comprar"><a href="#finalizacaobrownieesorvete">Comprar</a></button>
    </form>


<!-- 3ª Seção: Finalização da compra -->
    <section id="finalizacaobrownieesorvete" class="finalizacao">
        <nav class="nav-escolha">
            <img src="../img/logo.jpeg" alt="" class="logo">
            <ul class="menu-principal">
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div class="produto-finalizacao">
            <img src="img/brownieSorvete.png" alt="" class="img-produto-finalizacao">
        </div>
        <form method="post">
                <input type="hidden" name="produto" value="Brownie e Sorvete">
                <h2 class="forma-entrega">Tipo de Entrega</h2>
                <label class="metodo-entrega"><input type="radio" name="entrega" value="Entregar" class="input-entregas" required> Entregar</label>
                <label class="metodo-entrega"><input type="radio" name="entrega" value="Retirar" class="input-entregas"required> Retirar</label>
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
<!-- Sobremesa: mousse de maracuja -->

<!-- 1ª Seção: Página de escolha do produto -->
<section id="moussemaracuja">
    <div class="produto-detalhe">
        <img src="img/mousseMaracuja.png" alt="" class="produto-img-detalhe">
        <h1 class="produto-titulo">Mousse de Maracujá</h1>
        <p class="produto-descricao">Sobremesa leve e cremosa, com o equilíbrio perfeito entre o doce e o azedinho do maracujá.</p>
    </div>
    <form method="post">
        <label class="label-qtd">Quantidade:</label>
        <input type="number" name="quantidade" class="input-qtd">
        <button class="btn-comprar"><a href="#finalizacaomoussemaracuja">Comprar</a></button>
    </form>


<!-- 3ª Seção: Finalização da compra -->
    <section id="finalizacaomoussemaracuja" class="finalizacao">
        <nav class="nav-escolha">
            <img src="../img/logo.png" alt="" class="logo">
            <ul class="menu-principal">
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div class="produto-finalizacao">
            <img src="img/mousseMaracuja" alt="" class="img-produto-finalizacao">
        </div>
        <form method="post">
                <input type="hidden" name="produto" value="Mousse Maracujá">
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
<!-- Sobremesa: Mousse de Morango -->

<!-- 1ª Seção: Página de escolha do produto -->
<section id="moussemorango">
    <div class="produto-detalhe">
        <img src="img/sobrimesa.mousse.jpeg" alt="" class="produto-img-detalhe">
        <h1 class="produto-titulo">Mousse de Morango</h1>
        <p class="produto-descricao">Camadas cremosas e leves com pedaços de morango fresco, unindo doçura e frescor em cada colherada.</p>
    </div>
    <form method="post">
        <label class="label-qtd">Quantidade:</label>
        <input type="number" name="quantidade" class="input-qtd">
        <button class="btn-comprar"><a href="#finalizacaomoussemorango">Comprar</a></button>
    </form>

<!-- 3ª Seção: Finalização da compra -->
    <section id="finalizacaomoussemorango" class="finalizacao">
        <nav class="nav-escolha">
            <img src="../img/logo.png" alt="" class="logo">
            <ul class="menu-principal">
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div class="produto-finalizacao">
            <img src="img/mousseMorango.png" alt=""class="img-produto-finalizacao">
        </div>
        <form method="post">
                <input type="hidden" name="produto" value="Mousse Morango">
                <h2 class="forma-entrega">Tipo de Entrega</h2>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Entregar" class="input-entregas " required> Entregar</label>
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
<!-- Sobremesa: Sorvete Flocos-->

<!-- 1ª Seção: Página de escolha do produto -->
<section id="sorveteflocos">
    <div class="produto-detalhe">
        <img src="img/sorveteFlocos" alt="" class="produto-img-detalhe">
        <h1 class="produto-titulo">Sorvete de Flocos</h1>
        <p class="produto-descricao">Sorvete de flocos cremoso servido com brownie de chocolate e calda deliciosa. Uma combinação perfeita!</p>
    </div>
    <form method="post">
        <label class="label-qtd">Quantidade:</label>
        <input type="number" name="quantidade" class="input-qtd">
        <button class="btn-comprar"><a href="#finalizacaosorvete">Comprar</a></button>
    </form>


<!-- 3ª Seção: Finalização da compra -->
    <section id="finalizacaosorvete" class="finalizacao">
        <nav class="nav-escolha">
            <img src="../img/logo.png" alt="" class="logo">
            <ul class="menu-principal">
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div class="produto-finalizacao">
            <img src="img/sorveteflocos.png" alt="" class="img-produto-finalizacao">
        </div>
        <form method="post">
                <input type="hidden" name="produto" value="Sorvete">
                <h2 class="forma-entrega">Tipo de Entrega</h2>
                <label class="metodo-entrega ">
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
<!-- Sobremesa: Torta de Oreo -->

<!-- 1ª Seção: Página de escolha do produto -->
<section id="torta">
    <div class="produto-detalhe">
        <img src="img/torta.png" alt="" class="produto-img-detalhe">
        <h1 class="produto-titulo ">Torta de Oreo</h1>
        <p class="produto-descricao">Camadas cremosas de chocolate e baunilha sobre base crocante de biscoito Oreo, finalizada com calda de chocolate.</p>
    </div>
    <form method="post">
        <label class="label-qtd">Quantidade:</label>
        <input type="number" name="quantidade" class="input-qtd">
        <button class="btn-comprar"><a href="#finalizacaotorta">Comprar</a></button>
    </form>


<!-- 3ª Seção: Finalização da compra -->
    <section id="finalizacaotorta" class="finalizacao">
        <nav class="nav-escolha">
            <img src="../img/logo.png" alt="" class="logo">
            <ul class="menu-principal">
                <li><a href="paginainicio.php">Inicio</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>
        <div class="produto-finalizacao">
            <img src="img/torta.png" alt="" class="img-produto-finalizacao">
        </div>
        <form method="post">
                <input type="hidden" name="produto" value="Torta de Oreo">
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
 
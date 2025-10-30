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
    <section id="bebidas">
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
            <h1 class="titulo-pagina">Bebidas</h1>
        <ul class="menu-principal">
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <a href="#agua" class="produto-link">
            <img src="../img/agua.png" alt=""></a><!-- Bebida 1-->
        <a href="#coca"class="produto-link">
            <img src="../img/coca.png" alt=""></a><!-- Bebida 2-->
        <a href="#sprite" class="produto-link">
            <img src="../img/sprite.png" alt=""></a><!-- Bebida 3-->
        <a href="#kuat" class="produto-link">
            <img src="../img/kuat.png" alt=""></a><!-- Bebida 4-->
        <a href="#sucomaracuja" class="produto-link">
            <img src="../img/sucoMaracuja.png" alt=""></a><!-- Bebida 5-->
        <a href="#sucouva"class="produto-link">
            <img src="../img/sucoUva.png" alt=""></a><!-- Bebida 6-->

        <!-- Água-->
        <section id="agua">
            <div class="produto-detalhe">
            <h1 class="produto-titulo">Água</h1>
            <img src="../img/agua.png" alt="" class="produto-img-detalhe">
            <p class="produto-descricao">Garrafa de água 500ml </p>
            </div>
            <form method="post">
                <label class="label-qtd">Quantidade:</label>
                <input type="number" name="quantidade" class="input-qtd">
                <button class="btn-comprar"><a href="#finalizacaoagua">Comprar</a></button>
            </form>
            
            <section id="finalizacaoagua" class="finalizacao">
                <nav class="nav-escolha">
                    <img src="../img/logo.jpeg" alt="" class="logo">
                     <ul class="menu-principal">
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div class="produto-finalizacao">
                    <img src="../img/agua.png" alt="" class="img-produto-finalizacao">
                </div>
                <form method="post">
                <input type="hidden" name="produto" value="Água">
                <h2 class="forma-entrega">Tipo de Entrega</h2>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Entregar" class="input-entrega"required> Entregar</label>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Retirar" class="input-entrega" required> Retirar</label>
                <form method="post">
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

        <section id="coca">
            <div class="produto-detalhe">
            <h1 class="produto-titulo">Coca-Cola</h1>
            <img src="../img/coca.png" alt="" class="produto-img-detalhe">
            <p>Lata Coca-Cola 350ml </p>
            </div>
            <form method="post">
                <label class="label-qtd">Quantidade:</label>
                <input class="input-qtd "type="number" name="quantidade">
                <button class="btn-comprar"><a href="#finalizacaococa">Comprar</a></button>
            </form>

            <section id="finalizacaococa">
                <nav class="nav-escolha">
                    <img src="../img/logo.png" alt="" class="logo">
                    <ul class="menu-principal">
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div class="produto-finalizacao">
                    <img src="../img/coca.png" alt="" class="img-produto-fnalizacao">
                </div>
                <form method="post">
                <input type="hidden" name="produto" value="Coca-Cola 350ml">
                <h2 class="forma-entrega">Tipo de Entrega</h2>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Entregar" class="input-entregas"required> Entregar</label>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Retirar" class="input-entregas" required> Retirar</label>
                <form method="post">
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

        <section id="sprite">
            <div class="produto-detalhe">
            <h1 class="produto-titulo">Sprite </h1>
            <img src="../img/sprite.png" alt="" class="produto-img-detalhe">
            <p>Lata Sprite 350ml</p>
            </div>
            <form method="post">
                <label class="label-qtd">Quantidade:</label>
                <input class="input-qtd" type="number" name="quantidade">
                <button class="btn-comprar"><a href="#finalizacaosprite">Comprar</a></button>
            </form>

            <section id="finalizacaosprite" class="finalizacao">
                <nav class="nav-escolha">
                    <img src="../img/logo.png" alt="" class="logo">
                    <ul class="menu-principal">
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div class="produto-finalizacao">
                    <img src="../img/sprite.png" alt="" class="img-produto-finalizacao">
                </div>
                <form method="post">
                <input type="hidden" name="produto" value="Lata Sprite 350ml">
                <h2 class="forma-entrega">Tipo de Entrega</h2>
                <label classmetodo-entrega>
                    <input type="radio" name="entrega" value="Entregar" class="input-entregas" required> Entregar</label>
                <label class="etodo-entrega">
                    <input type="radio" name="entrega" value="Retirar" class="input-entregas" required> Retirar</label>
                <form method="post">
                    <h3 class="forma-entrega">Método Pagamento</h3>
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

        <section id="kuat">
        <div class="produto-detalhe">
            <h1 class="produto-titulo">Kuat</h1>
            <img src="../img/kuat.png" alt="" class="produto-img-detalhe">
            <p class="produto-descricao">Lata Kuat 350ml </p>
        </div>
            <form method="post">
                <label class="label-qtd">Quantidade:</label>
                <input class="input-qtd"type="number" name="quantidade">
                <button class="btn-comprar"><a href="#finalizacaokuat">Comprar</a></button>
            </form>

            <section id="finalizacaokuat" class="finaliacao">
                <nav class="nav-escolha">
                    <img src="../img/logo.png" alt="" class="logo">
                    <ul class="menu-principal">
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div class="produto-finalizacao">
                    <img src="../img/kuat.png" alt="kuat" class="img-produto-finalizacao">
                </div>
                <form method="post">
                <input type="hidden" name="produto" value="Lata Kuat 350ml">
                <h2 class="forma-entrega">Tipo de Entrega</h2>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Entregar" class="input-entregas" required> Entregar</label>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Retirar" class="input-entregas"required> Retirar</label>
                <form method="post">
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

        <section id="sucomaracuja">
            <div class="produto-detalhe">
            <h1 class="produto-titulo">Suco Marácuja</h1>
            <img src="../img/sujoMaracuja.png" alt="" class="produto-img-detalhe">
            <p class="produto-descricao">Del Valle Marácuja 290ml </p>
            </div>
            <form method="post">
                <label class="label-qtd">Quantidade:</label>
                <input type="number" name="quantidade" class="input-qtd">
                <button class="btn-comprar"><a href="#finalizacaomaracuja">Comprar</a></button>
            </form>

            <section id="finalizacaomaracuja" class="finalizacao">
                <nav class="nav-escolha">
                    <img src="../img/logo.jpeg" alt="" class="logo">
                    <ul class="menu-principal">
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div class="produto-finalzacao">
                    <img src="../img/sucoMaracuja.png" alt="" class="img-produto-finalizacao">
                </div>
                <form method="post">
                <input type="hidden" name="produto" value="Del-Valle Marácuja 290ml">
                <h2 class="forma-entrega">Tipo de Entrega</h2>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Entregar" class="input-entregas"required> Entregar</label>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Retirar" class="input-entregas"required> Retirar</label>
                <form method="post">
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

        <section id="sucouva">
            <div class="produto-detalhe">
            <h1 class="produto-titulo">Suco de Uva</h1>
            <img src="../img/sucoUva.png" alt="uva" class="produto-img-detalhe">
            <p class="produto-descricao">Del Valle Uva 290ml  </p>
            </div>
            <form method="post">
                <label class="label-qtd">Quantidade:</label>
                <input type="number" name="quantidade" class="input-qtd">
                <button class="btn-comprar"><a href="#finalizacaouva">Comprar</a></button>
            </form>

            <section id="finalizacaouva" class="fnalizacao">
                <nav class="nav-escolha">
                    <img src="../img/logo.jpeg" alt="" class="logo">
                    <ul class="menu-principal">
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div class="produto-finalizacao">
                    <img src="../img/sucoUva.png" alt="uva" class="img-produto-finalizacao">
                </div>
                <form method="post">
                <input type="hidden" name="produto" value="Del-Valle Uva 290ml">
                <h2 class="forma-entrega">Tipo de Entrega</h2>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Entregar" class="input-entregas" required> Entregar</label>
                <label class="metodo-entrega">
                    <input type="radio" name="entrega" value="Retirar" class="input-entregas"required> Retirar</label>
                <form method="post">
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
 
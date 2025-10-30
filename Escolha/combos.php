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
    <link rel="stylesheet" href="../estilo.css">
</head>
<body>
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
            <h1 class="titulo-pagina">Combos</h1>
        <ul class="menu-principal">
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <a href="#x-simples" class="produto-link">
            <img src="../img/X_ComboSimples.png" alt=""></a><!-- Combo 1-->
        <a href="#x-individual" class="produto-link">
            <img src="../img/X_ComboIndividual.png" alt=""></a><!-- Combo 2-->
        <a href="#x-familia"class="produto-link">
            <img src="../img/X_ComboFamilia.png" alt=""></a><!-- Combo 3-->
      
        <!-- Combo simples-->
    <!-- COMBO SIMPLES -->
    <section id="x-simples">
            <div class="produto-detalhe">
                <h1 class="produto-titulo">X-Simples</h1>
                <img src="../img/X_ComboSimples.png" alt="" class="produto-img-detalhe">
                <p class="produto-descricao">Hambúrguer clássico com queijo, alface, tomate e batata frita crocante. Uma combinação tradicional e deliciosa!</p>
            </div>
            <form method="post">
                <label class="label-qtd">Quantidade:</label>
                <input class=" btn-comprar"type="number" name="quantidade">
                <button><a href="#finalizacaox-simples">Comprar</a></button>
            </form>

            <section id="finalizacaox-simples">
                <nav class="nav-escolha">
                    <img src="../img/logo.png" alt="" class="logo">
                    <ul class="menu-principal">
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div class="produto-finalizacao">
                    <img src="../img/X_ComboSimples.png" alt="" class="img-produto-finalizacao">
                </div>
                <form method="post">
                <input type="hidden" name="produto" value="Combo Simples">
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
    </section>

    <!-- COMBO INDIVIDUAL -->
    <section id="x-individual">
            <div class="produto-detalhe">
                <h1 class="produto-titulo">X-Individual</h1>
                <img src="../img/X_ComboIndividual.png" alt="" class="prduto-img-detalhe">
                <p class="produto-descricao">Hambúrguer artesanal com queijo derretido, bacon, alface, tomate, batata frita e refrigerante. Sabor completo em uma refeição prática!</p>
            </div>
            <form method="post">
                <label class="label-qtd">Quantidade:</label>
                <input class="input-qtd" type="number" name="quantidade">
                <button class="btn-comprar"><a href="#finalizacaox-individual">Comprar</a></button>
            </form>

            <section id="finalizacaox-individual" class="finalzacao">
                <nav class="nav-escolha">
                    <img src="../img/logo.jpeg" alt="" class="logo">
                    <ul class="menu-principal">
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div class="produto-finalizacao">
                    <img src="../img/X_ComboIndividual.png" alt="" class="img-produto-finalizacao">
                </div>
                <form method="post">
                <input type="hidden" name="produto" value="Coombo Individual">
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
    </section>

    <!-- COMBO Familia -->
    <section id="x-familia">

            <div class="produto-detalhe">
                <h1 class="produto-titulo">X-Familia</h1>
                <img src="../img/X_ComboFamília.png" alt="" class="produto-img-detalhe">
                <p class="produto-descricao">rês hambúrgueres artesanais acompanhados de fritas, pedaços de carne e molhos especiais. Perfeito para compartilhar e saborear juntos!</p>
            </div>
            <form method="post">
                <label class="label-qtd">Quantidade:</label>
                <input type="number" name="quantidade" class="input-qtd">
                <button class="btn-comprar"><a href="#finalizacaox-familia">Comprar</a></button>
            </form>

            <section id="finalizacaox-familia" class="finalizacao">
                <nav class="=nav-escolha">
                    <img src="../img/logo.png" alt="" class="logo">
                    <ul class="menu-principal">
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div class="produto-finalizacao">
                    <img src="../img/X_ComboFamília.png" alt="" class="img-produto-finalizacao">
                </div>
                <form method="post">
                <input type="hidden" name="produto" value="Combo Familia">
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
 
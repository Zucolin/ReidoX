<?php
session_start();

/* processamento genérico de pedido / logout */

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
    <title>Combos</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <section id="combos">
    <nav class="nav-escolha">
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
    <h1 class="titulo-pagina">Combos</h1>
    <!-- Galeria principal -->
    
        <div id="itens-container" class="grind">
            <div class="card">
                <a href="#x-simples" class="produto-link"><img src="../img/X_ComboSimples.png" alt="X-Simples"></a>
                <p>Combo Simples</p>
            </div>
            <div class="card">
                <a href="#x-individual" class="produto-link"><img src="../img/X_ComboIndividual.png" alt="X-Individual"></a>
                <p>Combo Individual</p>
            </div>
            <div class="card">
                <a href="#x-familia" class="produto-link"><img src="../img/X_ComboFamilia.png" alt="X-Família"></a>
                <p>Combo Família</p>
            </div>
        </div>
    </section>

    <!-- Produto: X-Simples (section 1 = detalhe) -->
    <section id="x-simples" class="produto-page">
        <nav class="nav-escolha">
            <img src="../img/logo.png" alt="logo" class="logo">
            <h1 class="titulo-pagina">X-Simples</h1>
            <ul class="menu-principal">
                <li><a href="../paginainicio.php">Início</a></li>
                <li><a href="../pedidos.php">Pedidos</a></li>
                <li><a href="../sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>

        <div class="produto-detalhe">
            <img src="../img/X_ComboSimples.png" alt="X-Simples" class="produto-img-detalhe">
            <div>
                <h2 class="produto-titulo">X-Simples</h2>
                <p class="produto-descricao">Hambúrguer clássico com queijo, alface, tomate e batata frita crocante.</p>

                <form method="post" action="#finalizacaox-simples">
                    <input type="hidden" name="produto" value="Combo Simples">
                    <label class="label-qtd">Quantidade:</label>
                    <input class="input-qtd" type="number" name="quantidade" min="1" value="1" required>
                    <button type="submit" class="btn-comprar">Finalizar compra</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Produto: X-Simples (section 2 = finalização) -->
    <section id="finalizacaox-simples" class="finalizacao">
        <nav class="nav-escolha">
            <img src="../img/logo.png" alt="logo" class="logo">
            <ul class="menu-principal">
                <li><a href="../paginainicio.php">Início</a></li>
                <li><a href="../pedidos.php">Pedidos</a></li>
                <li><a href="../sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>

        <div class="produto-finalizacao">
            <img src="../img/X_ComboSimples.png" alt="X-Simples" class="img-produto-finalizacao">
        </div>

        <form method="post">
            <input type="hidden" name="produto" value="Combo Simples">

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

    <!-- Produto: X-Individual (section 1 = detalhe) -->
    <section id="x-individual" class="produto-page">
        <nav class="nav-escolha">
            <img src="../img/logo.png" alt="logo" class="logo">
            <h1 class="titulo-pagina">X-Individual</h1>
            <ul class="menu-principal">
                <li><a href="../paginainicio.php">Início</a></li>
                <li><a href="../pedidos.php">Pedidos</a></li>
                <li><a href="../sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>

        <div class="produto-detalhe">
            <img src="../img/X_ComboIndividual.png" alt="X-Individual" class="produto-img-detalhe">
            <div>
                <h2 class="produto-titulo">X-Individual</h2>
                <p class="produto-descricao">Combo completo com hambúrguer, fritas e bebida.</p>

                <form method="post" action="#finalizacaox-individual">
                    <input type="hidden" name="produto" value="Combo Individual">
                    <label class="label-qtd">Quantidade:</label>
                    <input class="input-qtd" type="number" name="quantidade" min="1" value="1" required>
                    <button type="submit" class="btn-comprar">Finalizar compra</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Produto: X-Individual (section 2 = finalização) -->
    <section id="finalizacaox-individual" class="finalizacao">
        <nav class="nav-escolha">
            <img src="../img/logo.png" alt="logo" class="logo">
            <ul class="menu-principal">
                <li><a href="../paginainicio.php">Início</a></li>
                <li><a href="../pedidos.php">Pedidos</a></li>
                <li><a href="../sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>

        <div class="produto-finalizacao">
            <img src="../img/X_ComboIndividual.png" alt="X-Individual" class="img-produto-finalizacao">
        </div>

        <form method="post">
            <input type="hidden" name="produto" value="Combo Individual">

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

    <!-- Produto: X-Família (section 1 = detalhe) -->
    <section id="x-familia" class="produto-page">
        <nav class="nav-escolha">
            <img src="../img/logo.png" alt="logo" class="logo">
            <h1 class="titulo-pagina">X-Família</h1>
            <ul class="menu-principal">
                <li><a href="../paginainicio.php">Início</a></li>
                <li><a href="../pedidos.php">Pedidos</a></li>
                <li><a href="../sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>

        <div class="produto-detalhe">
            <img src="../img/X_ComboFamilia.png" alt="X-Família" class="produto-img-detalhe">
            <div>
                <h2 class="produto-titulo">X-Família</h2>
                <p class="produto-descricao">Combo para compartilhar — ideal para família e amigos.</p>

                <form method="post" action="#finalizacaox-familia">
                    <input type="hidden" name="produto" value="Combo Família">
                    <label class="label-qtd">Quantidade:</label>
                    <input class="input-qtd" type="number" name="quantidade" min="1" value="1" required>
                    <button type="submit" class="btn-comprar">Finalizar compra</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Produto: X-Família (section 2 = finalização) -->
    <section id="finalizacaox-familia" class="finalizacao">
        <nav class="nav-escolha">
            <img src="../img/logo.png" alt="logo" class="logo">
            <ul class="menu-principal">
                <li><a href="../paginainicio.php">Início</a></li>
                <li><a href="../pedidos.php">Pedidos</a></li>
                <li><a href="../sobrenos.html">Sobre nós</a></li>
            </ul>
        </nav>

        <div class="produto-finalizacao">
            <img src="../img/X_ComboFamilia.png" alt="X-Família" class="img-produto-finalizacao">
        </div>

        <form method="post">
            <input type="hidden" name="produto" value="Combo Família">

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
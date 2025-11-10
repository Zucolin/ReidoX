<?php
session_start();



// Processamento do pedido (mantive a lógica original)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['sair'])) {
        header('Location: ../index.php');
        exit;
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
    <title>Sobremesas</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <section id="sobremesas"> <nav class="nav-escolha">
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
        <h1 class="titulo-pagina">Sobremesas</h1>
        
        <div id="itens-container" class="grind">
            <div onclick="location.href='#brownie'" class="card">
                <img src="../img/brownieSorvete.png" alt="Brownie">
                <p>Brownie c/ Sorvete</p>
            </div>
            <div onclick="location.href='#mousse-maracuja'" class="card">
                <img src="../img/mousseMaracuja.png" alt="Mousse Maracujá">
                <p>Mousse Maracujá</p>
            </div>
            <div onclick="location.href='#mousse-morango'" class="card">
                <img src="../img/mousseMorango.png" alt="Mousse Morango">
                <p>Mousse Morango</p>
            </div>
            <div onclick="location.href='#sorvete-flocos'" class="card">
                <img src="../img/sorveteflocos.png" alt="Sorvete Flocos">
                <p>Sorvete Flocos</p>
            </div>
            <div onclick="location.href='#torta'" class="card">
                <img src="../img/torta.png" alt="Torta">
                <p>Torta Doce</p>
            </div>
        </div>
    </section>

    <section id="brownie" class="produto-page">
        <nav class="nav-escolha">
            <a href="../paginainicio.php"><img src="../img/logo.png" alt="logo" class="logo"></a>
            <h1 class="titulo-pagina">Brownie com Sorvete</h1>
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
            <img src="../img/brownieSorvete.png" class="produto-img-detalhe" alt="Brownie">
            <div>
                <h2 class="produto-titulo">Brownie com Sorvete</h2>
                <p class="produto-descricao">Brownie quentinho com sorvete cremoso.</p>
                <form method="post" action="#finalizacaobrownie">
                    <input type="hidden" name="produto" value="Brownie com Sorvete">
                    <label class="label-qtd">Quantidade:</label>
                    <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
                    <button class="btn-comprar" type="submit">Finalizar compra</button>
                </form>
            </div>
        </div>
        <a href="#sobremesas"><button class="voltar">Voltar</button></a>
    </section>

    <section id="finalizacaobrownie" class="finalizacao">
        <nav class="nav-escolha">
            <a href="../paginainicio.php"><img src="../img/logo.png" alt="logo" class="logo"></a>
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
            <img src="../img/brownieSorvete.png" class="img-produto-finalizacao" alt="Brownie">
        
            <form method="post" action="">
                <input type="hidden" name="produto" value="Brownie com Sorvete">

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

    <section id="mousse-maracuja" class="produto-page">
        <nav class="nav-escolha">
            <a href="../paginainicio.php"><img src="../img/logo.png" alt="logo" class="logo"></a>
            <h1 class="titulo-pagina">Mousse de Maracujá</h1>
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
            <img src="../img/mousseMaracuja.png" class="produto-img-detalhe" alt="Mousse Maracujá">
            <div>
                <h2 class="produto-titulo">Mousse de Maracujá</h2>
                <p class="produto-descricao">Sobremesa leve e cremosa.</p>
                <form method="post" action="#finalizacaomousse-maracuja">
                    <input type="hidden" name="produto" value="Mousse de Maracujá">
                    <label class="label-qtd">Quantidade:</label>
                    <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
                    <button class="btn-comprar" type="submit">Finalizar compra</button>
                </form>
            </div>
        </div>
        <a href="#sobremesas"><button class="voltar">Voltar</button></a>
    </section>

    <section id="finalizacaomousse-maracuja" class="finalizacao">
        <nav class="nav-escolha">
            <a href="../paginainicio.php"><img src="../img/logo.png" alt="logo" class="logo"></a>
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
            <img src="../img/mousseMaracuja.png" class="img-produto-finalizacao" alt="Mousse Maracujá">
            
            <form method="post" action="">
                <input type="hidden" name="produto" value="Mousse de Maracujá">
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

    <section id="mousse-morango" class="produto-page">
        <nav class="nav-escolha">
            <a href="../paginainicio.php"><img src="../img/logo.png" alt="logo" class="logo"></a>
            <h1 class="titulo-pagina">Mousse de Morango</h1>
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
            <img src="../img/mousseMorango.png" class="produto-img-detalhe" alt="Mousse Morango">
            <div>
                <h2 class="produto-titulo">Mousse de Morango</h2>
                <p class="produto-descricao">Mousse leve com sabor natural de morango.</p>
                <form method="post" action="#finalizacaomousse-morango">
                    <input type="hidden" name="produto" value="Mousse de Morango">
                    <label class="label-qtd">Quantidade:</label>
                    <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
                    <button class="btn-comprar" type="submit">Finalizar compra</button>
                </form>
            </div>
        </div>
        <a href="#sobremesas"><button class="voltar">Voltar</button></a>
    </section>

    <section id="finalizacaomousse-morango" class="finalizacao">
        <nav class="nav-escolha">
            <a href="../paginainicio.php"><img src="../img/logo.png" alt="logo" class="logo"></a>
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
            <img src="../img/mousseMorango.png" class="img-produto-finalizacao" alt="Mousse Morango">
            
            <form method="post" action="">
                <input type="hidden" name="produto" value="Mousse de Morango">
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

    <section id="sorvete-flocos" class="produto-page">
        <nav class="nav-escolha">
            <a href="../paginainicio.php"><img src="../img/logo.png" alt="logo" class="logo"></a>
            <h1 class="titulo-pagina">Sorvete Flocos</h1>
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
            <img src="../img/sorveteflocos.png" class="produto-img-detalhe" alt="Sorvete Flocos">
            <div>
                <h2 class="produto-titulo">Sorvete Flocos</h2>
                <p class="produto-descricao">Copo de sorvete sabor flocos.</p>
                <form method="post" action="#finalizacaosorvete-flocos">
                    <input type="hidden" name="produto" value="Sorvete Flocos">
                    <label class="label-qtd">Quantidade:</label>
                    <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
                    <button class="btn-comprar" type="submit">Finalizar compra</button>
                </form>
            </div>
        </div>
        <a href="#sobremesas"><button class="voltar">Voltar</button></a>
    </section>

    <section id="finalizacaosorvete-flocos" class="finalizacao">
        <nav class="nav-escolha">
            <a href="../paginainicio.php"><img src="../img/logo.png" alt="logo" class="logo"></a>
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
            <img src="../img/sorveteflocos.png" class="img-produto-finalizacao" alt="Sorvete Flocos">
            
            <form method="post" action="">
                <input type="hidden" name="produto" value="Sorvete Flocos">
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

    <section id="torta" class="produto-page">
        <nav class="nav-escolha">
            <a href="../paginainicio.php"><img src="../img/logo.png" alt="logo" class="logo"></a>
            <h1 class="titulo-pagina">Torta Doce</h1>
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
            <img src="../img/torta.png" class="produto-img-detalhe" alt="Torta">
            <div>
                <h2 class="produto-titulo">Torta Doce</h2>
                <p class="produto-descricao">Fatia de torta caseira, servida fresca.</p>
                <form method="post" action="#finalizacaotorta">
                    <input type="hidden" name="produto" value="Torta Doce">
                    <label class="label-qtd">Quantidade:</label>
                    <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
                    <button class="btn-comprar" type="submit">Finalizar compra</button>
                </form>
            </div>
        </div>
        <a href="#sobremesas"><button class="voltar">Voltar</button></a>
    </section>

    <section id="finalizacaotorta" class="finalizacao">
        <nav class="nav-escolha">
            <a href="../paginainicio.php"><img src="../img/logo.png" alt="logo" class="logo"></a>
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
            <img src="../img/torta.png" class="img-produto-finalizacao" alt="Torta">
            
            <form method="post" action="">
                <input type="hidden" name="produto" value="Torta Doce">
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

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' 
    && isset($_POST['produto']) 
    && isset($_POST['entrega']) 
    && isset($_POST['pagamento'])) {

    $produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'] ?? 1;
    $entrega = $_POST['entrega'];
    $pagamento = $_POST['pagamento'];

    $pedido = "$produto x $quantidade / Entrega : $entrega / Pagamento : $pagamento";

    require_once '../DB/Database.php';
    require_once '../Controller/UsuarioController.php';
    $controller = new UsuarioController($pdo);
    $controller->enviarpedidos($pedido);

    header("Location: ../pedidos.php");
    exit;
}

?>
</html>
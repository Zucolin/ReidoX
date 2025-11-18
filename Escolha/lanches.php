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
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <section id="lanches"> <nav class="nav-escolha">
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
        <h1 class="titulo-pagina">Lanches</h1>
        
        <div id="itens-container" class="grind">
            <div onclick="location.href='#x-cheese'" class="card">
                <img src="../img/X_CheeseBurguer.png" alt="X-Cheese">
                <p>X-Cheese</p>
            </div>
            <div onclick="location.href='#x-bacon'" class="card">
                <img src="../img/X_Bacon.png" alt="X-Bacon">
                <p>X-Bacon</p>
            </div>
            <div onclick="location.href='#x-chicken'" class="card">
                <img src="../img/X_Chicken.png" alt="X-Chicken">
                <p>X-Chicken</p>
            </div>
            <div onclick="location.href='#x-tudo'" class="card">
                <img src="../img/X_Tudo.png" alt="X-Tudo">
                <p>X-Tudo</p>
            </div>
        </div>
    </section>

    <section id="x-cheese" class="produto-page">
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
            <img src="../img/X_CheeseBurguer.png" class="produto-img-detalhe" alt="X-Cheese">
            <div>
                <h2 class="produto-titulo">X-Cheese</h2>
                <p class="produto-descricao">Hambúrguer com queijo derretido.</p>
                <form method="post" action="#finalizacaox-cheese">
                    <input type="hidden" name="produto" value="X-Cheese">
                    <label class="label-qtd">Quantidade:</label>
                    <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
                    <button class="btn-comprar" type="submit">Finalizar compra</button>
                </form>
            </div>
        </div>
        <a href="#lanches"><button class="voltar">Voltar</button></a>
    </section>

    <section id="finalizacaox-cheese" class="finalizacao">
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
            <img src="../img/X_CheeseBurguer.png" class="img-produto-finalizacao" alt="X-Cheese">
        
            <form method="post" action="">
                <input type="hidden" name="produto" value="X-Cheese">
<input type="hidden" name="quantidade" value="<?= $_POST['quantidade']; ?>">
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

    <section id="x-bacon" class="produto-page">
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
            <img src="../img/X_Bacon.png" class="produto-img-detalhe" alt="X-Bacon">
            <div>
                <h2 class="produto-titulo">X-Bacon</h2>
                <p class="produto-descricao">Hambúrguer com bacon crocante.</p>
                <form method="post" action="#finalizacaox-bacon">
                    <input type="hidden" name="produto" value="X-Bacon">
                    <label class="label-qtd">Quantidade:</label>
                    <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
                    <button class="btn-comprar" type="submit">Finalizar compra</button>
                </form>
            </div>
        </div>
        <a href="#lanches"><button class="voltar">Voltar</button></a>
    </section>

    <section id="finalizacaox-bacon" class="finalizacao">
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
            <img src="../img/X_Bacon.png" class="img-produto-finalizacao" alt="X-Bacon">
            
            <form method="post" action="">
                <input type="hidden" name="produto" value="X-Bacon">
                <input type="hidden" name="quantidade" value="<?= $_POST['quantidade']; ?>">
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

    <section id="x-chicken" class="produto-page">
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
            <img src="../img/X_Chicken.png" class="produto-img-detalhe" alt="X-Chicken">
            <div>
                <h2 class="produto-titulo">X-Chicken</h2>
                <p class="produto-descricao">Hambúrguer de frango empanado.</p>
                <form method="post" action="#finalizacaox-chicken">
                    <input type="hidden" name="produto" value="X-Chicken">
                    <label class="label-qtd">Quantidade:</label>
                    <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
                    <button class="btn-comprar" type="submit">Finalizar compra</button>
                </form>
            </div>
        </div>
        <a href="#lanches"><button class="voltar">Voltar</button></a>
    </section>

    <section id="finalizacaox-chicken" class="finalizacao">
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
            <img src="../img/X_Chicken.png" class="img-produto-finalizacao" alt="X-Chicken">
            
            <form method="post" action="">
                <input type="hidden" name="produto" value="X-Chicken">
                <input type="hidden" name="quantidade" value="<?= $_POST['quantidade']; ?>">
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

    <section id="x-tudo" class="produto-page">
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
            <img src="../img/X_Tudo.png" class="produto-img-detalhe" alt="X-Tudo">
            <div>
                <h2 class="produto-titulo">X-Tudo</h2>
                <p class="produto-descricao">Hambúrguer completo com vários acompanhamentos.</p>
                <form method="post" action="#finalizacaox-tudo">
                    <input type="hidden" name="produto" value="X-Tudo">
                    <label class="label-qtd">Quantidade:</label>
                    <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
                    <button class="btn-comprar" type="submit">Finalizar compra</button>
                </form>
            </div>
        </div>
        <a href="#lanches"><button class="voltar">Voltar</button></a>
    </section>

    <section id="finalizacaox-tudo" class="finalizacao">
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
            <img src="../img/X_Tudo.png" class="img-produto-finalizacao" alt="X-Tudo">
            
            <form method="post" action="">
                <input type="hidden" name="produto" value="X-Tudo">
                <input type="hidden" name="quantidade" value="<?= $_POST['quantidade']; ?>">
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
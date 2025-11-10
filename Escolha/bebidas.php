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
    <title>Bebidas</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

<section id="bebidas">
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
        <h1 class="titulo-pagina">Bebidas</h1>
        
        <div id="itens-container" class="grind">
            <div onclick="location.href='#agua'" class="card">
                <img src="../img/agua.png" alt="Água">
                <p>Água</p>
            </div>
            <div onclick="location.href='#coca'" class="card">
                <img src="../img/coca.png" alt="Coca-Cola">
                <p>Coca-Cola</p>
            </div>
            <div onclick="location.href='#sprite'" class="card">
                <img src="../img/sprite.png" alt="Sprite">
                <p>Sprite</p>
            </div>
            <div onclick="location.href='#kuat'" class="card">
                <img src="../img/kuat.png" alt="Kuat">
                <p>Kuat</p>
            </div>
            <div onclick="location.href='#suco-maracuja'" class="card">
                <img src="../img/sucoMaracuja.png" alt="Suco Maracujá">
                <p>Suco Maracujá</p>
            </div>
            <div onclick="location.href='#suco-uva'" class="card">
                <img src="../img/sucoUva.png" alt="Suco Uva">
                <p>Suco Uva</p>
            </div>
        </div>
    </section>

    <section id="agua" class="produto-page">
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
            <img src="../img/agua.png" class="produto-img-detalhe" alt="Água">
            <div>
                <h2 class="produto-titulo">Água 500ml</h2>
                <p class="produto-descricao">Garrafa de água 500ml.</p>
                <form method="post" action="#finalizacao-agua">
                    <input type="hidden" name="produto" value="Água 500ml">
                    <label class="label-qtd">Quantidade:</label>
                    <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
                    <button class="btn-comprar" type="submit">Finalizar compra</button>
                </form>
            </div>
        </div>
        <a href="#bebidas"><button class="voltar">Voltar</button></a>
    </section>

    <section id="finalizacao-agua" class="finalizacao">
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
            <img src="../img/agua.png" class="img-produto-finalizacao" alt="Água">
            
            <form method="post" action="../pedidos.php">
                <input type="hidden" name="produto" value="Água 500ml">
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

    <section id="coca" class="produto-page">
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
            <img src="../img/coca.png" class="produto-img-detalhe" alt="Coca">
            <div>
                <h2 class="produto-titulo">Coca-Cola 350ml</h2>
                <p class="produto-descricao">Lata 350ml.</p>
                <form method="post" action="#finalizacaococa">
                    <input type="hidden" name="produto" value="Coca-Cola 350ml">
                    <label class="label-qtd">Quantidade:</label>
                    <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
                    <button class="btn-comprar" type="submit">Finalizar compra</button>
                </form>
            </div>
        </div>
        <a href="#bebidas"><button class="voltar">Voltar</button></a>
    </section>

    <section id="finalizacaococa" class="finalizacao">
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
            <img src="../img/coca.png" class="img-produto-finalizacao" alt="Coca">
            
            <form method="post" action="../pedidos.php">
                <input type="hidden" name="produto" value="Coca-Cola 350ml">
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

    <section id="sprite" class="produto-page">
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
            <img src="../img/sprite.png" class="produto-img-detalhe" alt="Sprite">
            <div>
                <h2 class="produto-titulo">Sprite 350ml</h2>
                <p class="produto-descricao">Lata 350ml.</p>
                <form method="post" action="#finalizacaosprite">
                    <input type="hidden" name="produto" value="Sprite 350ml">
                    <label class="label-qtd">Quantidade:</label>
                    <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
                    <button class="btn-comprar" type="submit">Finalizar compra</button>
                </form>
            </div>
        </div>
        <a href="#bebidas"><button class="voltar">Voltar</button></a>
    </section>

    <section id="finalizacaosprite" class="finalizacao">
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
            <img src="../img/sprite.png" class="img-produto-finalizacao" alt="Sprite">
            
            <form method="post" action="../pedidos.php">
                <input type="hidden" name="produto" value="Sprite 350ml">
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

    <section id="kuat" class="produto-page">
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
            <img src="../img/kuat.png" class="produto-img-detalhe" alt="Kuat">
            <div>
                <h2 class="produto-titulo">Kuat 350ml</h2>
                <p class="produto-descricao">Lata 350ml.</p>
                <form method="post" action="#finalizacaokuat">
                    <input type="hidden" name="produto" value="Kuat 350ml">
                    <label class="label-qtd">Quantidade:</label>
                    <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
                    <button class="btn-comprar" type="submit">Finalizar compra</button>
                </form>
            </div>
        </div>
        <a href="#bebidas"><button class="voltar">Voltar</button></a>
    </section>

    <section id="finalizacaokuat" class="finalizacao">
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
            <img src="../img/kuat.png" class="img-produto-finalizacao" alt="Kuat">
            
            <form method="post" action="../pedidos.php">
                <input type="hidden" name="produto" value="Kuat 350ml">
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

    <section id="suco-maracuja" class="produto-page">
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
            <img src="../img/sucoMaracuja.png" class="produto-img-detalhe" alt="Suco Maracujá">
            <div>
                <h2 class="produto-titulo">Suco Maracujá 300ml</h2>
                <p class="produto-descricao">Suco natural batido na hora.</p>
                <form method="post" action="#finalizacaosuco-maracuja">
                    <input type="hidden" name="produto" value="Suco Maracujá 300ml">
                    <label class="label-qtd">Quantidade:</label>
                    <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
                    <button class="btn-comprar" type="submit">Finalizar compra</button>
                </form>
            </div>
        </div>
        <a href="#bebidas"><button class="voltar">Voltar</button></a>
    </section>

    <section id="finalizacaosuco-maracuja" class="finalizacao">
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
            <img src="../img/sucoMaracuja.png" class="img-produto-finalizacao" alt="Suco Maracujá">
            
            <form method="post" action="../pedidos.php">
                <input type="hidden" name="produto" value="Suco Maracujá 300ml">
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

    <section id="suco-uva" class="produto-page">
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
            <img src="../img/sucoUva.png" class="produto-img-detalhe" alt="Suco Uva">
            <div>
                <h2 class="produto-titulo">Suco de Uva 300ml</h2>
                <p class="produto-descricao">Suco natural de uva.</p>
                <form method="post" action="#finalizacaosuco-uva">
                    <input type="hidden" name="produto" value="Suco de Uva 300ml">
                    <label class="label-qtd">Quantidade:</label>
                    <input type="number" name="quantidade" class="input-qtd" min="1" value="1" required>
                    <button class="btn-comprar" type="submit">Finalizar compra</button>
                </form>
            </div>
        </div>
        <a href="#bebidas"><button class="voltar">Voltar</button></a>
    </section>

    <section id="finalizacaosuco-uva" class="finalizacao">
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
            <img src="../img/sucoUva.png" class="img-produto-finalizacao" alt="Suco Uva">
            
            <form method="post" action="../pedidos.php">
                <input type="hidden" name="produto" value="Suco de Uva 300ml">
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
window.addEventListener('click', function (e){
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
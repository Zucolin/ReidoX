<?php
session_start();

/* processamento genérico de pedido / logout */

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
    <title>Combos</title>
    <link rel="stylesheet" href="estilos.css">
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
                     <button><a href="editar_usuario.php" class="menu-link">Editar Perfil</a></button>
                    <button><a href="../index.php">Sair</a></button>
                </form>
            </div>
        </nav>
        <h1 class="titulo-pagina">Combos</h1>
        <div id="itens-container" class="grind">
            <div onclick="location.href='#x-simples'" class="card">
                <img src="../img/X_ComboSimples.png" alt="X-Simples">
                <p>Combo Simples</p>
            </div>
            <div onclick="location.href='#x-individual'" class="card">
                <img src="../img/X_ComboIndividual.png" alt="X-Individual">
                <p>Combo Individual</p>
            </div>
            <div onclick="location.href='#x-familia'" class="card">
                <img src="../img/X_ComboFamilia.png" alt="X-Família">
                <p>Combo Família</p>
            </div>
        </div>
    </section>

    <section id="x-simples" class="produto-page">
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
                 <button><a href="editar_usuario.php" class="menu-link">Editar Perfil</a></button>
                <button><a href="../index.php">Sair</a></button>
            </form>
            </div>
        </nav>

        <div class="produto-detalhe">
            <img src="../img/X_ComboSimples.png" alt="X-Simples" class="produto-img-detalhe">
            <div>
                <h2 class="produto-titulo">X-Simples</h2>
                <p class="produto-descricao">Hambúrguer clássico com queijo, alface, tomate e batata frita crocante.</p>
                <p class="preco">Preço:<strong class="valor">20R$</strong> </p>
                <form method="post" action="#finalizacaox-simples">
                    <input type="hidden" name="produto" value="Combo Simples">
                    <label class="label-qtd">Quantidade:</label>
                    <input class="input-qtd" type="number" name="quantidade" min="1" value="1" required>
                    <button type="submit" class="btn-comprar">Finalizar compra</button>
                </form>
            </div>
        </div>
        <a href="#combos"><button class="voltar">Voltar</button></a>
    </section>

    <section id="finalizacaox-simples" class="finalizacao">
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
                 <button><a href="editar_usuario.php" class="menu-link">Editar Perfil</a></button>
                <button><a href="../index.php">Sair</a></button>
            </form>
        </div>
        </nav>

        <div class="produto-finalizacao">
            <img src="../img/X_ComboSimples.png" alt="X-Simples" class="img-produto-finalizacao">
        
        <form method="post" action="">
            <input type="hidden" name="produto" value="Combo Simples">
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

    <section id="x-individual" class="produto-page">
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
                 <button><a href="editar_usuario.php" class="menu-link">Editar Perfil</a></button>
                <button><a href="../index.php">Sair</a></button>
            </form>
            </div>
        </nav>

        <div class="produto-detalhe">
            <img src="../img/X_ComboIndividual.png" alt="X-Individual" class="produto-img-detalhe">
            <div>
                <h2 class="produto-titulo">X-Individual</h2>
                <p class="produto-descricao">Combo completo com hambúrguer, fritas e bebida.</p>
                <p class="preco">Preço:<strong class="valor">25R$</strong> </p> 
                <form method="post" action="#finalizacaox-individual">
                    <input type="hidden" name="produto" value="Combo Individual">
                    <label class="label-qtd">Quantidade:</label>
                    <input class="input-qtd" type="number" name="quantidade" min="1" value="1" required>
                    <button type="submit" class="btn-comprar">Finalizar compra</button>
                </form>
            </div>
        </div>
        <a href="#combos"><button class="voltar">Voltar</button></a>
    </section>

    <section id="finalizacaox-individual" class="finalizacao">
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
                 <button><a href="editar_usuario.php" class="menu-link">Editar Perfil</a></button>
                <button><a href="../index.php">Sair</a></button>
            </form>
        </div>
        </nav>

        <div class="produto-finalizacao">
            <img src="../img/X_ComboIndividual.png" alt="X-Individual" class="img-produto-finalizacao">
        
        <form method="post" action="">
            <input type="hidden" name="produto" value="Combo Individual">
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

    <section id="x-familia" class="produto-page">
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
                 <button><a href="editar_usuario.php" class="menu-link">Editar Perfil</a></button>
                <button><a href="../index.php">Sair</a></button>
            </form>
            </div>
        </nav>

        <div class="produto-detalhe">
            <img src="../img/X_ComboFamilia.png" alt="X-Família" class="produto-img-detalhe">
            <div>
                <h2 class="produto-titulo">X-Família</h2>
                <p class="produto-descricao">Combo para compartilhar — ideal para família e amigos.</p>
                <p class="preco">Preço:<strong class="valor">40R$</strong> </p>
                <form method="post" action="#finalizacaox-familia">
                    <input type="hidden" name="produto" value="Combo Família">
                    <label class="label-qtd">Quantidade:</label>
                    <input class="input-qtd" type="number" name="quantidade" min="1" value="1" required>
                    <button type="submit" class="btn-comprar">Finalizar compra</button>
                </form>
            </div>
        </div>
        <a href="#combos"><button class="voltar">Voltar</button></a>
    </section>

    <section id="finalizacaox-familia" class="finalizacao">
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
                 <button><a href="editar_usuario.php" class="menu-link">Editar Perfil</a></button>
                <button><a href="../index.php">Sair</a></button>
            </form>
        </div>
        </nav>

        <div class="produto-finalizacao">
            <img src="../img/X_ComboFamilia.png" alt="X-Família" class="img-produto-finalizacao">
        
        <form method="post" action="">
            <input type="hidden" name="produto" value="Combo Família">
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
// Processamento do pedido (mantive a lógica original)
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
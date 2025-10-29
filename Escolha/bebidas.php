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
            <img src="" alt="">
            <h1>Bebidas</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <a href="#coca1.5"><img src="../img/bebida.coca1,5.jpeg" alt=""></a><!-- Bebida 1-->
        <a href="#coca2"><img src="../img/bebida.coca2l.jpeg" alt=""></a><!-- Bebida 2-->
        <a href="#energetico"><img src="../img/bebida.energetico.jpeg" alt=""></a><!-- Bebida 3-->
        <a href="#fanta"><img src="../img/bebida.fanta.jpeg" alt=""></a><!-- Bebida 4-->
        <a href="#guarana"><img src="../img/bebida.guarana.jpeg" alt=""></a><!-- Bebida 5-->
        <a href="#sprite"><img src="../img/bebida.sprite.jpeg" alt=""></a><!-- Bebida 6-->

        <!-- Coca Cola 1.5-->
        <section id="coca1.5">
                <h1>Coca-Cola 1.5L</h1>
            <img src="../img/bebida.coca1,5.jpeg" alt="Coca-Cola 1.5L">
            <p>Coca-Cola de 1,5L </p>
            <form method="post">
                <label>Quantidade:</label>
                <input type="number" name="quantidade">
                <button><a href="#finalizacaococa1.5">Comprar</a></button>
            </form>
            
            <section id="finalizacaococa1.5">
                <nav>
                    <img src="../img/logo.jpeg" alt=""> <ul>
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div>
                    <img src="../img/bebida.coca1,5.jpeg" alt="Coca-Cola 1.5L">
                </div>
                <form method="post">
                    <h2>Entregar</h2>
                    <input name="entrega" type="radio">
                </form>
                <form method="post">
                    <h2>Retirar</h2>
                    <input name="entrega" type="radio">
                </form>
                <form method="post">
                    <h3>Método Pagamento</h3>
                    <select name="pagamento">
                        <option value="cartao-credito">Cartão de Crédito</option>
                        <option value="cartao-debito">Cartão de Débito</option>
                        <option value="pix">Pix</option>
                        <option value="dinheiro">Dinheiro</option>
                    </select>
                    <input type="submit">
                </form>
            </section>
        </section>

        <section id="coca2">
            <img src="../img/bebida.coca2l.jpeg" alt="Coca-Cola 2L">
            <p>Coca-Cola de 2L </p>
            <form method="post">
                <label>Quantidade:</label>
                <input type="number" name="quantidade">
                <button><a href="#finalizacaococa2">Comprar</a></button>
            </form>

            <section id="finalizacaococa2">
                <nav>
                    <img src="../img/logo.jpeg" alt="">
                    <ul>
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div>
                    <img src="../img/bebida.coca2l.jpeg" alt="Coca-Cola 2L">
                </div>
                <form method="post">
                    <h2>Entregar</h2>
                    <input name="entrega" type="radio">
                </form>
                <form method="post">
                    <h2>Retirar</h2>
                    <input name="entrega" type="radio">
                </form>
                <form method="post">
                    <h3>Método Pagamento</h3>
                    <select name="pagamento">
                        <option value="cartao-credito">Cartão de Crédito</option>
                        <option value="cartao-debito">Cartão de Débito</option>
                        <option value="pix">Pix</option>
                        <option value="dinheiro">Dinheiro</option>
                    </select>
                    <input type="submit">
                </form>
            </section>
        </section>

        <section id="energetico">
            <h1>Energetico</h1>
            <img src="../img/bebida.energetico.jpeg" alt="Energético">
            <p>Lata de energético, Monster Mango Loco</p>
            <form method="post">
                <label>Quantidade:</label>
                <input type="number" name="quantidade">
                <button><a href="#finalizacaoenergetico">Comprar</a></button>
            </form>

            <section id="finalizacaoenergetico">
                <nav>
                    <img src="../img/logo.jpeg" alt="">
                    <ul>
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div>
                    <img src="../img/bebida.energetico.jpeg" alt="Energético">
                </div>
                <form method="post">
                    <h2>Entregar</h2>
                    <input name="entrega" type="radio">
                </form>
                <form method="post">
                    <h2>Retirar</h2>
                    <input name="entrega" type="radio">
                </form>
                <form method="post">
                    <h3>Método Pagamento</h3>
                    <select name="pagamento">
                        <option value="cartao-credito">Cartão de Crédito</option>
                        <option value="cartao-debito">Cartão de Débito</option>
                        <option value="pix">Pix</option>
                        <option value="dinheiro">Dinheiro</option>
                    </select>
                    <input type="submit">
                </form>
            </section>
        </section>

        <section id="fanta">
            
            <h1>Fanta</h1>
            <img src="../img/bebida.fanta.jpeg" alt="Fanta">
            <p>Lata de fanta </p>
            <form method="post">
                <label>Quantidade:</label>
                <input type="number" name="quantidade">
                <button><a href="#finalizacaofanta">Comprar</a></button>
            </form>

            <section id="finalizacaofanta">
                <nav>
                    <img src="../img/logo.jpeg" alt="">
                    <ul>
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div>
                    <img src="../img/bebida.fanta.jpeg" alt="Fanta">
                </div>
                <form method="post">
                    <h2>Entregar</h2>
                    <input name="entrega" type="radio">
                </form>
                <form method="post">
                    <h2>Retirar</h2>
                    <input name="entrega" type="radio">
                </form>
                <form method="post">
                    <h3>Método Pagamento</h3>
                    <select name="pagamento">
                        <option value="cartao-credito">Cartão de Crédito</option>
                        <option value="cartao-debito">Cartão de Débito</option>
                        <option value="pix">Pix</option>
                        <option value="dinheiro">Dinheiro</option>
                    </select>
                    <input type="submit">
                </form>
            </section>
        </section>

        <section id="guarana">
            <h1>Guaraná</h1>
            <img src="../img/bebida.guarana.jpeg" alt="Guaraná">
            <p>Guaraná 2L </p>
            <form method="post">
                <label>Quantidade:</label>
                <input type="number" name="quantidade">
                <button><a href="#finalizacaoguarana">Comprar</a></button>
            </form>

            <section id="finalizacaoguarana">
                <nav>
                    <img src="../img/logo.jpeg" alt="">
                    <ul>
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div>
                    <img src="../img/bebida.guarana.jpeg" alt="Guaraná">
                </div>
                <form method="post">
                    <h2>Entregar</h2>
                    <input name="entrega" type="radio">
                </form>
                <form method="post">
                    <h2>Retirar</h2>
                    <input name="entrega" type="radio">
                </form>
                <form method="post">
                    <h3>Método Pagamento</h3>
                    <select name="pagamento">
                        <option value="cartao-credito">Cartão de Crédito</option>
                        <option value="cartao-debito">Cartão de Débito</option>
                        <option value="pix">Pix</option>
                        <option value="dinheiro">Dinheiro</option>
                    </select>
                    <input type="submit">
                </form>
            </section>
        </section>

        <section id="sprite">
            
            <h1>Sprite</h1>
            <img src="../img/bebida.sprite.jpeg" alt="Sprite">
            <p>Sprite 2L </p>
            <form method="post">
                <label>Quantidade:</label>
                <input type="number" name="quantidade">
                <button><a href="#finalizacaosprite">Comprar</a></button>
            </form>

            <section id="finalizacaosprite">
                <nav>
                    <img src="../img/logo.jpeg" alt="">
                    <ul>
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div>
                    <img src="../img/bebida.sprite.jpeg" alt="Sprite">
                </div>
                <form method="post">
                    <h2>Entregar</h2>
                    <input name="entrega" type="radio">
                </form>
                <form method="post">
                    <h2>Retirar</h2>
                    <input name="entrega" type="radio">
                </form>
                <form method="post">
                    <h3>Método Pagamento</h3>
                    <select name="pagamento">
                        <option value="cartao-credito">Cartão de Crédito</option>
                        <option value="cartao-debito">Cartão de Débito</option>
                        <option value="pix">Pix</option>
                        <option value="dinheiro">Dinheiro</option>
                    </select>
                    <input type="submit">
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
?>
 
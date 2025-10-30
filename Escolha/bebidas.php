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
            <img src="logo.png" alt="">
            <h1>Bebidas</h1>
        <ul>
            <li><a href="">Inicio</a></li>
            <li><a href="">Pedidos</a></li>
            <li><a href="">Sobre nós</a></li>
        </ul>
        </nav>
        <a href="#agua"><img src="../img/agua.png" alt=""></a><!-- Bebida 1-->
        <a href="#coca"><img src="../img/coca.png" alt=""></a><!-- Bebida 2-->
        <a href="#uva"><img src="../img/uva.png" alt=""></a><!-- Bebida 3-->
        <a href="#kuat"><img src="../img/kuat.png" alt=""></a><!-- Bebida 4-->
        <a href="#sucomaracuja"><img src="../img/sucoMaracuja.png" alt=""></a><!-- Bebida 5-->
        <a href="#sucouva"><img src="../img/sucoUva.png" alt=""></a><!-- Bebida 6-->

        <!-- Água-->
        <section id="agua">
                <h1>Água (com/sem gás)</h1>
            <img src="../img/agua.png" alt="">
            <p>Garrafa de água 500ml </p>
            <form method="post">
                <label>Quantidade:</label>
                <input type="number" name="quantidade">
                <button><a href="#finalizacaoagua">Comprar</a></button>
            </form>
            
            <section id="finalizacaoagua">
                <nav>
                    <img src="../img/logo.jpeg" alt=""> <ul>
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div>
                    <img src="../img/agua.png" alt="">
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

        <section id="coca">
            <img src="../img/coca.png" alt="">
            <p>Lata Coca-Cola 350ml </p>
            <form method="post">
                <label>Quantidade:</label>
                <input type="number" name="quantidade">
                <button><a href="#finalizacaococa">Comprar</a></button>
            </form>

            <section id="finalizacaococa">
                <nav>
                    <img src="../img/logo.jpeg" alt="">
                    <ul>
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div>
                    <img src="../img/coca.png" alt="">
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

        <section id="uva">
            <h1>uva</h1>
            <img src="../img/uva.png" alt="">
            <p>Lata uva 350ml</p>
            <form method="post">
                <label>Quantidade:</label>
                <input type="number" name="quantidade">
                <button><a href="#finalizacaouva">Comprar</a></button>
            </form>

            <section id="finalizacaouva">
                <nav>
                    <img src="../img/logo.jpeg" alt="">
                    <ul>
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div>
                    <img src="../img/uva.png" alt="">
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

        <section id="kuat">
            
            <h1>Kuat</h1>
            <img src="../img/kuat.png" alt="">
            <p>Lata Kuat 350ml </p>
            <form method="post">
                <label>Quantidade:</label>
                <input type="number" name="quantidade">
                <button><a href="#finalizacaokuat">Comprar</a></button>
            </form>

            <section id="finalizacaokuat">
                <nav>
                    <img src="../img/logo.jpeg" alt="">
                    <ul>
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div>
                    <img src="../img/kuat.png" alt="kuat">
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

        <section id="sucomaracuja">
            <h1>Suco Marácuja</h1>
            <img src="../img/sujoMaracuja.png" alt="">
            <p>Del Valle Marácuja 290ml </p>
            <form method="post">
                <label>Quantidade:</label>
                <input type="number" name="quantidade">
                <button><a href="#finalizacaomaracuja">Comprar</a></button>
            </form>

            <section id="finalizacaomaracuja">
                <nav>
                    <img src="../img/logo.jpeg" alt="">
                    <ul>
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div>
                    <img src="../img/sucoMaracuja.png" alt="">
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

        <section id="sucouva">
            
            <h1>uva</h1>
            <img src="../img/sucoUva.png" alt="uva">
            <p>Del Valle Uva 290ml  </p>
            <form method="post">
                <label>Quantidade:</label>
                <input type="number" name="quantidade">
                <button><a href="#finalizacaouva">Comprar</a></button>
            </form>

            <section id="finalizacaouva">
                <nav>
                    <img src="../img/logo.jpeg" alt="">
                    <ul>
                        <li><a href="paginainicio.php">Inicio</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="sobrenos.html">Sobre nós</a></li>
                    </ul>
                </nav>
                <div>
                    <img src="../img/sucoUva.png" alt="uva">
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
 
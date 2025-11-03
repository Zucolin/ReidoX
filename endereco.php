<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="fundo">
    <header>
        <img src="img/logo.png" alt="" class="logo-endereco"> <!-- Logo no centro da tela-->
    </header>
    <div class="container-endereco">
        <!-- Abaixo o formulario de cadastro-->
        <form method="post" class="formulario-endereco">
            <div class="campo">
                <input name="cep" type="text" class="input" placeholder=" " required>
                <label for="cep" class="label-flutuante">CEP:</label>
            </div>
            <div class="campo">
                <input name="rua" type="text" class="input" placeholder=" " required>
                <label for="rua" class="label-flutuante">Rua:</label>
            </div>
            <div class="campo">
                <input name="numero" type="text" class="input" placeholder=" " required>
                <label for="numero" class="label-flutuante">Numero/Bloco:</label>
            </div>
            <input type="submit" class="botao-endereco">
            <!-- Depois de o usuario enviar as informações para o banco de dados ele é redirecionado a paginainicio -->
        </form>
    </div>
</body>

<?php

$idatual = $_GET["id"];
try {
    require_once 'DB/Database.php';
    require_once 'Controller/UsuarioController.php';
    require_once 'verificar.php';

    $controller = new UsuarioController($pdo);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cep = $_POST['cep'];
        $rua = $_POST['rua'];
        $numero = $_POST['numero'];


        $controller->atualizar($cep, $rua, $numero, $idatual); // chama a função do controller aqui mesmo

        session_start();

        // redireciona só depois da sessão estar salva
        $verificar = new Verificar();
        $permitido = true;
        $verificar->Usuariopermitido($permitido);
        exit;
    }
} catch (Exception $e) {
    echo "<p class='erro'>Erro: " . htmlspecialchars($e->getMessage()) . "</p>";
}
?>

</html>
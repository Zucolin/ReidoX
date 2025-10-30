
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <br>

    <div class="enfeiteborda">
        <br>
    <div class="ajustalogo">
        <img class="logo" src="img/logo.jpeg.jpeg" alt="">
        <h2 class="tituloprincipal">Entrar</h2>
       
        </div>
        <br>
<?php
session_start();
require_once 'DB/Database.php';
require_once 'Controller/UsuarioController.php';
require_once 'verificar.php'; // caso você use para redirecionamento

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $controller = new UsuarioController($pdo);
    $usuario = $controller->login($email, $senha);

    if ($usuario) {
        $_SESSION['nome_usuario'] = $usuario['nome'];
        $_SESSION['id_usuario'] = $usuario['id'];

        // Se for admin
        if ($usuario['email'] === "admin@hotmail.com") {
            header('Location: admin.php');
            exit;
        }

        // Redireciona usuário normal
        $verificar = new Verificar();
        $permitido = true;
        $verificar->Usuariopermitido($permitido);
        header('Location: paginainicio.php');
        exit;
    } else {
        $erro = "E-mail ou senha incorretos!";
    }

}
?>
        <?php if ($erro)
            echo "<p style='color:red;'>$erro</p>"; ?>
        <div class="formulario">
            <form method="post" class="titulos">
                <label>E-mail:</label> <br>
                <input type="email" name="email" required class="bordas">

                <br><br>

                <label>Senha:</label> <br>
                <input type="password" name="senha" required class="bordas">
                <br>

                <input type="submit" value="Entrar"><br>
            </form>

            <a href="cadastro.php">Cadastrar-se</a> <br>
        </div>

    </div>
    <br><br>
</body>
</html>
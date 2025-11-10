<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body class="fundo">
    <div class="container">
        <img class="logo" src="img/logo.png" alt="Logo">
        <h1 class="titulo">Login</h1>


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
        <form method="post" class="formulario">
            <div class="campo">
                <input type="email" name="email" required class="input" placeholder=" ">
                <label class="label-flutuante">E-mail:</label>
            </div>
            <div class="campo">
                <input type="password" name="senha" required class="input" placeholder=" ">
                <label class="label-flutuante">Senha:</label>
            </div>

            <input class="botao" type="submit" value="Entrar">
        </form>


        <?php if ($erro)
            echo "<p class='erro' style='color:red;'>$erro</p>"; ?>
        <a href="cadastro.php" class="link">Ainda não tem uma conta? Cadastrar-se</a>
    </div>

</body>

</html>
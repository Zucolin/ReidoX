<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body class="fundo">
    <header>
        <img class="logo-cadastro" src="img/logo.png" alt="Logo">
    </header>

    <div class="container-cadastro">
        <h1 class="titulo">Cadastro</h1>

        <form method="post" class="formulario">
            <div class="campo">
                <input class="input" type="text" name="nome" placeholder=" " required>
                <label class="label-flutuante">Nome</label>
            </div>

            <div class="campo">
                <input class="input" type="email" name="email" placeholder=" " required>
                <label class="label-flutuante">E-mail</label>
            </div>

            <div class="campo">
                <input class="input" type="password" name="senha" placeholder=" " required>
                <label class="label-flutuante">Senha</label>
            </div>

            <div class="campo">
                <input class="input" type="password" name="senhaconfirm" placeholder=" " required>
                <label class="label-flutuante">Confirmar Senha</label>
            </div>


            <input class="botao" type="submit" value="Cadastrar">
        </form>

        <?php
        try {
            require_once 'DB/Database.php';
            require_once 'Controller/UsuarioController.php';
            require_once 'verificar.php';

            $controller = new UsuarioController($pdo);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $senhaconfirm = $_POST['senhaconfirm'];
                $cargo = null;

                if ($senha == $senhaconfirm) {
                    // Criptografa a senha
                    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
                    $idatual = $controller->cadastrar($nome, $email, $senhaHash, $cargo);
                    
                    session_start();
                    $_SESSION['nome_usuario'] = $nome;
                    $_SESSION['user_id'] = $idatual;
                    header("Location: endereco.php?id=$idatual");
                    exit;
                } else {
                    echo "<p class='erro'>Erro ao se cadastrar! Senhas diferentes.</p>";
                }
            }
        } catch (Exception $e) {
            echo "<p class='erro'>Erro: " . htmlspecialchars($e->getMessage()) . "</p>";
        }
        ?>

        <a class="link" href="index.php">Login</a>
    </div>
</body>

</html>
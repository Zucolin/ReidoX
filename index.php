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
        // Inicia sessão com dados do usuário
        $_SESSION['nome_usuario'] = $usuario['nome'];
        $_SESSION['id_usuario'] = $usuario['id'];

        // Redireciona usando Verificar (se você usa essa lógica)
        $verificar = new Verificar();
        $permitido = true;
        $verificar->Usuariopermitido($permitido);

        // Redireciona para página inicial
        header('Location: paginainicio.php');
        exit;
    } else {
        $erro = "E-mail ou senha incorretos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Login</title>
</head>
<body>
<h2>Entrar no sistema</h2>

<?php if ($erro) echo "<p style='color:red;'>$erro</p>"; ?>

<form method="post">
    <label>E-mail:</label>
    <input type="email" name="email" required>

    <label>Senha:</label>
    <input type="password" name="senha" required>

    <input type="submit" value="Entrar">
</form>

<a href="cadastro.php">Cadastrar-se</a>
</body>
</html>

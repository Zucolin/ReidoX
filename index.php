<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lancheonete</title>
</head>
<body>
    <img src="logo" alt=""> <!-- Logo no centro da tela-->
    <!-- Abaixo o formulario de login -->
    <form action="POST">
        <label for="email">E-mail</label>
        <input type="email" name="email" required>
        <label for="senha">Senha</label>
        <input name="senha" type="password" required>
        <input type="submit">
        <!-- Depois de o usuario enviar as informações faz uma verificação de se aquele usuario existe, se sim ele é redirecionado a paginainicio, se não ele vai para tela de cadastro -->

        <!-- Caso o Usuario não possue Cadastro ele entra na tela de cadastro-->
        <p><a href="cadastro.php">Cadastre-se</a></p>
        
    </form>
</body>
</html>

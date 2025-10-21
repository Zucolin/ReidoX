<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <img src="" alt=""> <!-- Logo no centro da tela-->
    <!-- Abaixo o formulario de cadastro-->
    <form method="post"> 
        <label for="nome">Nome:</label>
        <input name="nome" type="text" required>
        <label for="email">E-mail:</label>
        <input name="email" type="email" required>
        <label for="senha">Senha:</label>
        <input name="senha" type="password" required>
        <label for="">Confirme sua senha:</label> <!-- If senha == confirmarsenha { envia } -->
        <input name="senhaconfirm" type="password" required>
        <input type="submit">
        <!-- Depois de o usuario enviar as informações para o banco de dados ele é redirecionado a paginainicio -->
    </form>
</body>

<?php
try{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome=$_POST['nome'];
    $email=$_POST['email'];
    $senha=$_POST['senha'];
    $senhaconfirm=$_POST['senhaconfirm'];
    if($senha == $senhaconfirm){
        require_once 'DB/Database.php';
        require_once 'Controller/UsuarioController.php';
        require_once 'verificar.php';

        $controller = new UsuarioController($pdo);
        $controller->cadastrar($nome, $email, $senha); // chama a função do controller aqui mesmo
        
        session_start();
        $_SESSION['nome_usuario'] = $_POST['nome'];

        $verificar = new Verificar();
        $permitido=true;
        $verificar->Usuariopermitido($permitido); // redireciona só depois da sessão estar salva
        exit;
    }else{
        echo "<p>Erro ao se cadastrar! Senhas Diferrentes</p>";
    }
}
}catch(Exception $e){
    echo "<p style='color: red;'>Erro: " . htmlspecialchars($e->getMessage()) . "</p>";
}

?>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <img src="img/logo.jpeg" alt=""> <!-- Logo no centro da tela-->
    <!-- Abaixo o formulario de cadastro-->
    <form method="post"> 
        <label for="cep">CEP:</label>
        <input name="cep" type="text" required>
        <label for="rua">Rua:</label>
        <input name="rua" type="text" required>
        <label for="numero">Numero/Bloco:</label>
        <input name="numero" type="text" required>
        <input type="submit">
        <!-- Depois de o usuario enviar as informações para o banco de dados ele é redirecionado a paginainicio -->
    </form>
    <a href="index.php">voltar</a>
</body>

<?php
try{
     require_once 'DB/Database.php';
        require_once 'Controller/UsuarioController.php';
        require_once 'verificar.php';
        
      $controller = new UsuarioController($pdo);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cep=$_POST['cep'];
    $rua=$_POST['rua'];
    $numero=$_POST['numero'];

        
        $controller->cadastrarEndereco($cep, $rua, $numero); // chama a função do controller aqui mesmo
        
        session_start();

        // redireciona só depois da sessão estar salva
        $verificar = new Verificar();
        $permitido=true;
        $verificar->Usuariopermitido($permitido);
        exit;
}
}catch(Exception $e){
    echo "<p style='color: red;'>Erro: " . htmlspecialchars($e->getMessage()) . "</p>";
}

?>
</html>
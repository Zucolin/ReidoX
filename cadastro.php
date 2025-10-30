<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <br>

    <div class="enfeiteborda">
        <br>
        <div class="ajustarlogo">
    <img class="logo" src="img/logo.jpeg.jpeg" alt=""> <!-- Logo no centro da tela-->
    <!-- Abaixo o formulario de cadastro-->
     <h1 class="tituloprincipal">Cadrastro: </h1>

     </div>
     <br>


    <form method="post"> 
        <div class="formulario">
        <label  for="nome">Nome:</label>
        <input class="bordas" name="nome" type="text" required><br>
        <label for="email">E-mail:</label>
        <input class="bordas" name="email" type="email" required><br>
        <label for="senha">Senha:</label>
        <input class="bordas" name="senha" type="password" required><br>
        <label for="">Confirme sua senha:</label> <!-- If senha == confirmarsenha { envia } -->
        <input class="bordas" name="senhaconfirm" type="password" required><br>

<?php
try{
     require_once 'DB/Database.php';
        require_once 'Controller/UsuarioController.php';
        require_once 'verificar.php';
        
      $controller = new UsuarioController($pdo);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome=$_POST['nome'];
    $email=$_POST['email'];
    $senha=$_POST['senha'];
    $senhaconfirm=$_POST['senhaconfirm'];
    if($senha == $senhaconfirm){
       

        
       $idatual = $controller->cadastrar($nome, $email, $senha); // chama a função do controller aqui mesmo
        
        session_start();
        $_SESSION['nome_usuario'] = $_POST['nome'];
        $_SESSION['user_id'] = $idatual;
        header("Location: endereco.php?id=$idatual"); // redireciona só depois da sessão estar salva
        exit;
        
    }
    else{
        echo "<p>Erro ao se cadastrar! Senhas Diferrentes</p>";
    }
    
}
}catch(Exception $e){
    echo "<p style='color: red;'>Erro: " . htmlspecialchars($e->getMessage()) . "</p>";
}

?>

        <input type="submit"><br><br>
        <!-- Depois de o usuario enviar as informações para o banco de dados ele é redirecionado a paginainicio -->
    
    <a href="index.php">voltar</a>
    <br>

    </form>
    <br><br>

</div>
</div>
</body>

</html>
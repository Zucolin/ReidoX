<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body class="fundo">
    <h1 class="tabela-titulo">Clientes</h1>

<?php

require_once "DB/Database.php";
require_once "Controller/UsuarioController.php";

$usuarioController = new UsuarioController($pdo);

$usuarios = $usuarioController->listar();

if(empty($usuarios)){
    echo "<p class='erro'>Nenhum usuário encontrado!</p>";
    echo "<a href='cadastro.php'>Cadastrar</a>";
    return;
}
echo "<h1 class='tabela-titulo'></h1>";
echo "<table>";
echo "<tr><th>ID</th><th>Nome</th><th>E-mail</th><th>Senha</th><th>Pedidos</th><th>Cep</th><th>Rua</th><th>Número</th><th>Ações</th></tr>";

foreach ($usuarios as $usuario) {
    $id = $usuario['id'];
    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$usuario['nome']}</td>";
    echo "<td>{$usuario['email']}</td>";
    echo "<td>{$usuario['senha']}</td>";
    echo "<td>{$usuario['pedidos']}</td>";
    echo "<td>{$usuario['cep']}</td>";
    echo "<td>{$usuario['rua']}</td>";
    echo "<td>{$usuario['numero']}</td>";
    echo "<td><a class='del' href='deletar.php?id={$id}' onclick=\"return confirm('Tem certeza que deseja excluir o usuário?')\">Excluir</a></td>";
    echo "</tr>";
}

echo "</table>";
echo "<div class='voltar'>
<a href='index.php'>Voltar</a>
</div>";

?>
</body>
</html>
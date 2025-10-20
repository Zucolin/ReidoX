<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" required><br>

        <label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" required><br>

        <label for="codigo_barra">Codigo de Barra:</label>
        <input type="text" name="codigo_barra" required><br>
        
        <label for="preco">Preço:</label>
        <input type="text" name="preco" required><br>

        <input type="submit">
    </form>
</body>
</html>

<?php
require_once "C:/Turma1/xampp/htdocs/programa/mvc/DB/Database.php";
require_once "C:/Turma1/xampp/htdocs/programa/mvc/Controller/ProdutoController.php";

$produtoController = new ProdutoController($pdo);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $quantidade = $_POST['quantidade'];
    $codigo_barra = $_POST['codigo_barra'];
    $preco = $_POST['preco'];

    $produtoController->cadastrarProduto($nome, $descricao, $quantidade, $codigo_barra, $preco);
    header('Location: ../../index.php');
}
?>
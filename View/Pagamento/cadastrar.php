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

        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo" required><br>

        <input type="submit">
    </form>
</body>
</html>

<?php
require_once "C:/Turma1/xampp/htdocs/REIDOX/mvc/DB/Database.php";
require_once "C:/Turma1/xampp/htdocs/REIDOX/mvc/Controller/PagamentoController.php";

$PagamentoController = new PagamentoController($pdo);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];

    $PagamentoController->cadastrarPagamento($nome, $tipo);
    header('Location: ../../index.php');
}
?>
<?php
require_once "C:/Turma1/xampp/htdocs/programa/mvc/DB/Database.php";
require_once "C:/Turma1/xampp/htdocs/programa/mvc/Controller/ProdutoController.php";

$prdoutoController = new ProdutoController($pdo);
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $produto = $produtoController->deletarProduto($id);
    header('Location: ../../index.php');
}else{
    header('Location: ../../index.php');
}
?>
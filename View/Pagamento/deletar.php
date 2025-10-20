<?php
require_once "C:/Turma1/xampp/htdocs/programa/mvc/DB/Database.php";
require_once "C:/Turma1/xampp/htdocs/programa/mvc/Controller/PagamentoController.php";

$PagamentoController = new PagamentoController($pdo);
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $pagamento = $PagamentoController->deletarPagamento($id);
    header('Location: ../../index.php');
}else{
    header('Location: ../../index.php');
}
?>
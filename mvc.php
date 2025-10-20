<?php
require_once "DB/Database.php";
require_once "Controller/UsuarioController.php";
require_once "Controller/ProdutoController.php";
require_once "Controller/PagamentoController.php";

$usuarioController = new UsuarioController($pdo);
$produtoController = new ProdutoController($pdo);
$pagamentoController = new PagamentoController($pdo);

$usuarios = $usuarioController->listar();
$produtos = $produtoController->listarProduto();
$pagamentos = $pagamentoController->listarPagamento();
?>
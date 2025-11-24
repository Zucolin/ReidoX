<?php
session_start();
require_once "DB/Database.php";
require_once "Model/UsuarioModel.php";

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['produto_id'])) {
    $produtoId = $_POST['produto_id'];
    $produtoNome = $_POST['produto_nome'];
    $produtoPreco = $_POST['produto_preco'];

    if (isset($_SESSION['carrinho'][$produtoId])) {
        $_SESSION['carrinho'][$produtoId]['quantidade']++;
    } else {
        $_SESSION['carrinho'][$produtoId] = [
            'nome' => $produtoNome,
            'preco' => $produtoPreco,
            'quantidade' => 1
        ];
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
?>
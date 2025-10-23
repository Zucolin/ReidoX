<?php
require_once "C:/Turma1/xampp/htdocs/REIDOX/mvc/DB/Database.php";
require_once "C:/Turma1/xampp/htdocs/REIDOX/mvc/Controller/ProdutoController.php";

$produtoController = new ProdutoController($pdo);
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $produto = $produtoController->buscarproduto($id);
?>
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
        <input type="text" name="nome" value="<?=$produto['nome'];?>" required><br>
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" value="<?=$produto['descricao'];?>" required><br>
        <label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" value="<?=$produto['quantidade'];?>" required><br>
        <label for="codigo_barra">Codigo de Barra:</label>
        <input type="text" name="codigo_barra" value="<?=$produto['codigo_barra'];?>" required><br>
        <label for="preco">Preço:</label>
        <input type="text" name="preco" value="<?=$produto['preco'];?>" required><br>
    </form>
</body>
</html>
<?php
}else{
    header('Location: listar.php');
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $quantidade = $_POST['quantidade'];
    $codigo_barra = $_POST['codigo_barra'];
    $preco = $_POST['preco'];

    $produtoController->editarProduto($nome, $descricao, $quantidade, $codigo_barra, $post, $id);
    header('Location: ../../index.php');
}
?>
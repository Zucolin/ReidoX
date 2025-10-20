<?php
require_once "C:/Turma1/xampp/htdocs/programa/mvc/DB/Database.php";
require_once "C:/Turma1/xampp/htdocs/programa/mvc/Controller/PagamentoController.php";

$pagamentoController = new PagamentoController($pdo);
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $pagamento = $pagamentoController->buscarpagamento($id);
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
        <input type="text" name="nome" value="<?=$pagamento['nome'];?>" required><br>
        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo" value="<?=$pagamento['tipo'];?>" required><br>
    </form>
</body>
</html>
<?php
}else{
    header('Location: listar.php');
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];

    $pagamentoController->editarPagamento($nome, $tipo, $id);
    header('Location: ../../index.php');
}
?>
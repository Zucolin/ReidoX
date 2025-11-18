<?php
$dsn = "mysql:host=localhost;dbname=db_reidox;charset=utf8";
$usuario = 'root';
$senha = '09876612vini';
try {
    $pdo = new PDO($dsn, $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>
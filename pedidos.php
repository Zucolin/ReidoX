<?php
session_start();

require_once "Controller/UsuarioController.php";
require_once "Model/UsuarioModel.php";
require_once "DB/Database.php";

$usuarioController = new UsuarioController($pdo);

// Verifica se usuário está logado
if (!isset($_SESSION['user_id'])) {
    echo "Você precisa estar logado para ver seus pedidos.";
    exit;
}

// Busca dados do usuário logado
$userId = $_SESSION['user_id'];
$usuario = $usuarioController->buscarUsuario($userId);

// Verifica se existem pedidos
$pedidos = $usuario['pedidos'] ?? '';

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
       <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link rel="stylesheet" href="pedidos.css">
</head>
<body>
    <h1>Pedidos de <?= htmlspecialchars($usuario['nome']) ?></h1>

    <?php if (!empty($pedidos)): ?>
        <ul>
            <?php
            // Supondo que os pedidos estejam separados por vírgula
            $listaPedidos = explode(',', $pedidos);
            foreach ($listaPedidos as $pedido): ?>
                <li><?= htmlspecialchars(trim($pedido)) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Você ainda não realizou nenhum pedido.</p>
    <?php endif; ?>
</body>
</html>

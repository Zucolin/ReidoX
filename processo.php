<?php
require_once("DB/Database.php");
require_once("Controller/UsuarioController.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
};

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['user_id'] ?? 0;
        if ($user_id === 0) {
            throw new Exception("Usuário não logado.");
        }

$usuarioController = new UsuarioController($pdo);

return $usuarioController->atualizaStatus($id);

       

?>
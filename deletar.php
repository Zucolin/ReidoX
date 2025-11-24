<?php

require_once "Controller/UsuarioController.php";
require_once "DB/Database.php";

$UsuarioController = new UsuarioController($pdo);

if (isset($_POST['id'])) {

  $id = $_POST['id']; // ← agora pega o id corretamente
  $UsuarioController->deletar($id);
  header("location: admin.php");
  exit;

} else {
  header("location: admin.php");
  exit;
}
?>
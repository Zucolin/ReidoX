<?php

require_once "C:/turma1/xampp/htdocs/ReidoX/Controller/UsuarioController.php";
require_once "C:/turma1/xampp/htdocs/ReidoX/DB/DataBase.php";

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
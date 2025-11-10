<?php


require_once "C:/turma1/xampp/htdocs/ReidoX/Controller/UsuarioController.php";
require_once "C:/turma1/xampp/htdocs/ReidoX/DB/DataBase.php";

$UsuarioController = new UsuarioController($pdo);

if (isset($_GET['id'])) {

  $id = $_GET['id'];
  $usuario = $UsuarioController->deletar($id);
  header("location: admin.php");
} else {
  header("location: admin.php");

}


?>
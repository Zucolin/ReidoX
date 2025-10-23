<?php


require_once "C:/turma1/xampp/htdocs/REIDOX/mvc/Controller/UsuarioController.php";
require_once "C:/turma1/xampp/htdocs/REIDOX/mvc/DB/DataBase.php";

$UsuarioController = new UsuarioController($pdo);

if(isset($_GET['id'])){

  $id = $_GET['id'];
  $usuario = $UsuarioController->deletar($id);
  header("location: admin.php");}
  else{
header("location: admin.php");
 
  }


?>
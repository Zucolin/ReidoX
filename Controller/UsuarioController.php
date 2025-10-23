<?php
require_once "Model/UsuarioModel.php";

class UsuarioController{
    private $usuarioModel;
    private $pdo;
    public function __construct($pdo){
        $this->usuarioModel= new UsuarioModel($pdo);
        $this->pdo = $pdo; 
    }
    public function listar(){
        $usuarios = $this->usuarioModel->buscarTodos();
        include_once "View/Usuario/listar.php";
        return;
    }
    public function buscarUsuario($id){
        $usuario=$this->usuarioModel->buscarUsuario($id);
        return $usuario;
    }
    public function cadastrar($nome, $email, $senha){
        return $this->usuarioModel->cadastrar($nome, $email, $senha,);
    }
    public function cadastrarEndereco($cep, $rua, $numero){
        return $this->usuarioModel->cadastrarEndereco( $cep, $rua, $numero);
    }
    public function editar($nome, $email, $senha, $id){
        $this->usuarioModel->editar($nome, $email, $senha, $id);
    }
    public function deletar($id){
        $usuario=$this->usuarioModel->deletar($id);
        return $usuario;}

public function login($email, $senha) {
    $stmt = $this->pdo->prepare("SELECT * FROM clientes WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && $senha === $usuario['senha']) { // comparação direta
        return $usuario;
    }

    return false;
}
} 


?>
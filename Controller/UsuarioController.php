<?php
require_once "Model/UsuarioModel.php";

class UsuarioController {
    private $usuarioModel;
    private $pdo;

    public function __construct($pdo) {
        $this->usuarioModel = new UsuarioModel($pdo);
        $this->pdo = $pdo; 

        // ==========================================
        // 🔹 Verificação e criação automática do admin
        // ==========================================
        $emailAdmin = 'admin@hotmail.com';
        $senhaAdmin = '123'; // sem criptografia
        $nomeAdmin = 'admin';

        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM clientes WHERE email = ?");
        $stmt->execute([$emailAdmin]);
        $existe = $stmt->fetchColumn();

        if ($existe == 0) {
            $insert = $this->pdo->prepare("INSERT INTO clientes (nome, email, senha) VALUES (?, ?, ?)");
            $insert->execute([$nomeAdmin, $emailAdmin, $senhaAdmin]);
          
         
        }
        // ==========================================
    }

    public function listar() {
        $usuarios = $this->usuarioModel->buscarTodos();
        include_once "C:/Turma1/xampp/htdocs/ReidoX/mvc/admin.php";
        return $usuarios;
    }

    public function buscarUsuario($id) {
        $usuario = $this->usuarioModel->buscarUsuario($id);
        return $usuario;
    }

    public function cadastrar($nome, $email, $senha) {
        return $this->usuarioModel->cadastrar($nome, $email, $senha);
    }
public function atualizar($cep,$rua,$numero,$idatual) {
        return $this->usuarioModel->atualizar($cep,$rua,$numero,$idatual);
    }

    public function editar($nome, $email, $senha, $id) {
        $this->usuarioModel->editar($nome, $email, $senha, $id);
    }

    public function deletar($id) {
        $usuario = $this->usuarioModel->deletar($id);
        return $usuario;
    }

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

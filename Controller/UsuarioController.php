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
        include_once "C:/xampp/htdocs/ReidoX/admin.php";
        return $usuarios;
    }

    public function buscarUsuario($id) {
        return $this->usuarioModel->buscarUsuario(id: $id);
    }

    public function cadastrar($nome, $email, $senha) {
        return $this->usuarioModel->cadastrar($nome, $email, $senha);
    }

    public function atualizar($cep, $rua, $numero, $idatual) {
        return $this->usuarioModel->atualizar($cep, $rua, $numero, $idatual);
    }

    public function editar($nome, $email, $senha, $id) {
        $this->usuarioModel->editar($nome, $email, $senha, $id);
    }

    public function deletar($id) {
        return $this->usuarioModel->deletar($id);
    }

    // ===========================
    // 🔹 Login com sessão
    // ===========================
    public function login($email, $senha) {
        $stmt = $this->pdo->prepare("SELECT * FROM clientes WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && $senha === $usuario['senha']) { // ajuste se usar hash
            // inicia sessão
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            // salva informações do usuário na sessão
            $_SESSION['user_id'] = $usuario['id'];
            $_SESSION['user_email'] = $usuario['email'];
            $_SESSION['user_nome'] = $usuario['nome'];

            return $usuario;
        }

        return false;
    }

    // ===========================
    // 🔹 Enviar pedidos para o usuário logado
    // ===========================
    public function enviarpedidos($pedido): void {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $user_id = $_SESSION['user_id'] ?? 0;
        if ($user_id === 0) {
            throw new Exception("Usuário não logado.");
        }

        $sql = "UPDATE clientes SET pedidos = :pedidos WHERE id = :user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':pedidos' => $pedido,
            ':user_id' => $user_id
        ]);
    }
  
    
}

?>
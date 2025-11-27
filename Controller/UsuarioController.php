<?php
require_once "C:/Turma1/xampp/htdocs/programa/ReidoX/Model/UsuarioModel.php";

class UsuarioController
{
    private $usuarioModel;
    private $pdo;

    public function __construct($pdo)
    {
        $this->usuarioModel = new UsuarioModel($pdo);
        $this->pdo = $pdo;

        // ==========================================/
        // 🔹 Verificação e criação automática do admin
        // ==========================================/
        $emailAdmin = 'admin@hotmail.com';
        $senhaAdmin = '123'; // Senha em texto plano
        $nomeAdmin = 'admin';
        $cargoAdmin = 'admin';

        $stmt = $this->pdo->prepare("SELECT * FROM clientes WHERE email = ?");
        $stmt->execute([$emailAdmin]);
        $admin = $stmt->fetch();

        if (!$admin) {
            // Salva a senha como texto plano
            $insert = $this->pdo->prepare("INSERT INTO clientes (nome, email, senha, cargo) VALUES (:nome, :email, :senha, :cargo)");
            $insert->execute([':nome' => $nomeAdmin, ':email' => $emailAdmin, ':senha' => $senhaAdmin, ':cargo' => $cargoAdmin]);
        }
        // ==========================================
    }

    public function listar()
    {
        $usuarios = $this->usuarioModel->buscarTodos();
        return $usuarios; // Apenas retorna os usuários. A view (admin.php) é quem deve ser chamada pelo fluxo normal.
    }

    public function buscarUsuario($id)
    {
        return $this->usuarioModel->buscarUsuario(id: $id);
    }

    public function cadastrar($nome, $email, $senha, $cargo = 'cliente', $telefone = null, $rua = null, $numero = null)
    {
        return $this->usuarioModel->cadastrar($nome, $email, $senha, $cargo, $telefone, $rua, $numero);
    }

    public function atualizar($telefone, $rua, $numero, $idatual)
    {
        return $this->usuarioModel->atualizar($telefone, $rua, $numero, $idatual);
    }

    public function editar($nome, $email, $senha, $id, $cargo)
    {
        $this.usuarioModel->editar($nome, $email, $senha, $id, $cargo);
    }

    public function deletar($id)
    {
        return $this->usuarioModel->deletar($id);
    }

    public function buscarUsuarioPorId($id)
    {
        return $this->usuarioModel->buscarUsuarioPorId($id);
    }

    public function atualizarUsuario($id, $nome, $email, $senha, $telefone, $rua, $numero, $cargo, $pedidos)
    {
        return $this->usuarioModel->atualizarUsuario($id, $nome, $email, $senha, $telefone, $rua, $numero, $cargo, $pedidos);
    }

    // ===========================
    // 🔹 Login com sessão
    // ===========================
    public function login($email, $senha)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM clientes WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Compara a senha em texto plano
        if ($usuario && $senha === $usuario['senha']) {
            return $usuario;
        }

        return false;
    }

    // ===========================
    // 🔹 Enviar pedidos para o usuário logado
    // ===========================
    public function enviarpedidos($pedido): void
    {
        
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
     if ($stmt->rowCount() > 0) {

        session_start();
        $_SESSION['status'] = "Preparando";
    
echo "<script>
    // Depois de 1 segundos (500 ms) envia para historico
    setTimeout(() => {
        window.location.href = '../pedidos.php';
    }, 500);
</script>";

} 
    }

    public function atualizaStatus($id){

         $sql = "INSERT INTO historico (idpedidos) VALUES (:pedidos)";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([
            ':pedidos'=>$id
        ]);

        if(session_status() === 'NONE'){    
            session_start();
        }
        $_SESSION['status'] = "Pronto";

        echo '<script>
    // Depois de 1 segundos (1000 ms) envia para historico
    setTimeout(() => {
        window.location.href = "pedidos.php";
    }, 1000);

</script>';


    }

}

?>
<?php
require_once "C:/turma1/xampp/htdocs/ReidoX/Model/UsuarioModel.php";

class UsuarioController
{
    private $usuarioModel;
    private $pdo;

    public function __construct($pdo)
    {
        $this->usuarioModel = new UsuarioModel($pdo);
        $this->pdo = $pdo;

        // ==========================================
        // 🔹 Verificação e criação automática do admin
        // ==========================================
        $emailAdmin = 'admin@hotmail.com';
        $senhaAdmin = '123'; // Senha sem criptografia
        $nomeAdmin = 'admin';
        $cargoAdmin = 'admin';

        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM clientes WHERE email = ?");
        $stmt->execute([$emailAdmin]);
        $existe = $stmt->fetchColumn();

        if ($existe == 0) {
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

    public function cadastrar($nome, $email, $senha, $cargo = 'cliente', $cep = null, $rua = null, $numero = null)
    {
        return $this->usuarioModel->cadastrar($nome, $email, $senha, $cargo, $cep, $rua, $numero);
    }

    public function atualizar($cep, $rua, $numero, $idatual)
    {
        return $this->usuarioModel->atualizar($cep, $rua, $numero, $idatual);
    }

    public function editar($nome, $email, $senha, $id, $cargo)
    {
        $this->usuarioModel->editar($nome, $email, $senha, $id, $cargo);
    }

    public function deletar($id)
    {
        return $this->usuarioModel->deletar($id);
    }

    public function buscarUsuarioPorId($id)
    {
        return $this->usuarioModel->buscarUsuarioPorId($id);
    }

    public function atualizarUsuario($id, $nome, $email, $senha, $cep, $rua, $numero, $cargo, $pedidos)
    {
        return $this->usuarioModel->atualizarUsuario($id, $nome, $email, $senha, $cep, $rua, $numero, $cargo, $pedidos);
    }

    // ===========================
    // 🔹 Login com sessão
    // ===========================
    public function login($email, $senha)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM clientes WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica se o usuário existe e se a senha corresponde à salva no banco (sem criptografia)
        if ($usuario && $senha === $usuario['senha']) {
            // A função login agora apenas retorna os dados do usuário.
            // A responsabilidade de iniciar a sessão e definir as variáveis fica no index.php.
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
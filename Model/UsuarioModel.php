<?php // define $pdo
class UsuarioModel{
    private $pdo;
public function __construct(PDO $pdo){
$this->pdo = $pdo;
}
public function buscarTodos(){
    $stmt=$this->pdo->query('SELECT * FROM clientes');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function buscarUsuario($id){
        $stmt = $this->pdo->query("SELECT * FROM clientes WHERE id = $id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
}
public function cadastrar($nome, $email, $senha, $role = 'cliente', $cep = null, $rua = null, $numero = null){
    try{
        $sql = "INSERT INTO clientes (nome, email, senha, role, cep, rua, numero) VALUES (:nome, :email, :senha, :role, :cep, :rua, :numero)";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([
            ':nome'=>$nome,
            ':email'=>$email,
            ':senha'=>$senha,
            ':role'=>$role,
            ':cep'=>$cep,
            ':rua'=>$rua,
            ':numero'=>$numero,
        ]);

         // ✅ Retorna o ID do cliente recém-inserido
        return $this->pdo->lastInsertId();

    }catch(PDOException $e){
        if ($e->getCode() == 23000 && strpos($e->getMessage(), 'Duplicate entry') !== false) {
            throw new Exception("E-mail já cadastrado!");
        } else {
            throw $e;
        }
    }
    
}
public function atualizar($cep,$rua,$numero,$idatual){
    try{
        $sql = "UPDATE clientes SET cep=?, rua=?, numero=? WHERE id = ?";
        $stmt= $this->pdo->prepare($sql);
        return $stmt->execute([$cep,$rua,$numero,$idatual]);
    }catch(PDOException $e){
        if ($e->getCode() == 23000 && strpos($e->getMessage(), 'Duplicate entry') !== false) {
            throw new Exception("E-mail já cadastrado!");
        } else {
            throw $e;
        }
    }
    
}

public function editar($nome, $email, $senha, $id, $role) {
        $sql = "UPDATE clientes SET nome=?, email=?, senha=?, role=? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome, $email, $senha, $id, $role]);
    }

    
    public function deletar($id){
    $sql = "DELETE FROM clientes WHERE id = ?";
    $stmt= $this->pdo->prepare($sql);
    return $stmt->execute([
        $id
    ]);
}

public function buscarUsuarioPorId($id) {
    $stmt = $this->pdo->prepare("SELECT id, nome, email, cep, rua, numero, role, pedidos FROM clientes WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function atualizarUsuario($id, $nome, $email, $senha, $cep, $rua, $numero, $role, $pedidos) {
    $params = [
        'id' => $id,
        'nome' => $nome,
        'email' => $email,
        'cep' => $cep,
        'rua' => $rua,
        'numero' => $numero,
        'role' => $role,
        'pedidos' => $pedidos
    ];

    if (!empty($senha)) {
        $sql = "UPDATE clientes SET nome = :nome, email = :email, senha = :senha, cep = :cep, rua = :rua, numero = :numero, role = :role, pedidos = :pedidos WHERE id = :id";
        $params['senha'] = password_hash($senha, PASSWORD_DEFAULT);
    } else {
        $sql = "UPDATE clientes SET nome = :nome, email = :email, cep = :cep, rua = :rua, numero = :numero, role = :role, pedidos = :pedidos WHERE id = :id";
    }

    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute($params);
}

// Funções para Produtos

public function cadastrarProduto($nome, $descricao, $preco, $categoria, $imagem) {
    $sql = "INSERT INTO produtos (nome, descricao, preco, categoria, imagem) VALUES (?, ?, ?, ?, ?)";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute([$nome, $descricao, $preco, $categoria, $imagem]);
}

public function listarProdutos() {
    $stmt = $this->pdo->query("SELECT * FROM produtos ORDER BY id DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function listarProdutosPorCategoria($categoria) {
    $stmt = $this->pdo->prepare("SELECT * FROM produtos WHERE categoria = ? ORDER BY nome");
    $stmt->execute([$categoria]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function buscarProdutoPorId($id) {
    $stmt = $this->pdo->prepare("SELECT * FROM produtos WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function editarProduto($id, $nome, $descricao, $preco, $categoria, $imagem) {
    $params = [$nome, $descricao, $preco, $categoria];
    $sql = "UPDATE produtos SET nome = ?, descricao = ?, preco = ?, categoria = ?";

    if ($imagem) {
        $sql .= ", imagem = ?";
        $params[] = $imagem;
    }

    $sql .= " WHERE id = ?";
    $params[] = $id;

    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute($params);
}

public function deletarProduto($id) {
    // Primeiro, buscar o nome do arquivo da imagem para poder excluí-lo
    $produto = $this->buscarProdutoPorId($id);

    // Agora, exclui o registro do banco de dados
    $sql = "DELETE FROM produtos WHERE id = ?";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute([$id]);
}


public function adicionarPedido($userId, $pedido) {
    try {
        // 1. Buscar os pedidos existentes
        $stmt = $this->pdo->prepare("SELECT pedidos FROM clientes WHERE id = ?");
        $stmt->execute([$userId]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        $pedidosAtuais = $resultado['pedidos'] ?? '';

        // 2. Concatenar o novo pedido
        $novosPedidos = $pedidosAtuais;
        if (!empty($pedidosAtuais) && !empty($pedido)) {
            $novosPedidos .= ', '; // Adiciona um separador se já houver pedidos
        }
        $novosPedidos .= $pedido;

        // 3. Atualizar a coluna de pedidos
        $sql = "UPDATE clientes SET pedidos = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$novosPedidos, $userId]);
    } catch (PDOException $e) {
        // Log do erro para depuração
        error_log("Erro ao adicionar pedido: " . $e->getMessage());
        return false;
    }
}


}
?>
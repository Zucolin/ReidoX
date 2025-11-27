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
public function cadastrar($nome, $email, $senha, $cargo = 'cliente', $telefone = null, $rua = null, $numero = null){
    try{
          if($cargo === null){
                $cargo = 'cliente';
        } 
        $sql = "INSERT INTO clientes (nome, email, senha, cargo, telefone, rua, numero) VALUES (:nome, :email, :senha, :cargo, :telefone, :rua, :numero)";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([
            ':nome'=>$nome,
            ':email'=>$email,
            ':senha'=>$senha,
            ':cargo'=>$cargo,
            ':telefone'=>$telefone,
            ':rua'=>$rua,
            ':numero'=>$numero
            
        ]);
      

         // ✅ Retorna o ID do cliente recém-inserido
        return $this->pdo->lastInsertId();

    }catch(PDOExtelefonetion $e){
        if ($e->getCode() == 23000 && strpos($e->getMessage(), 'Duplicate entry') !== false) {
            throw new Extelefonetion("E-mail já cadastrado!");
        } else {
            throw $e;
        }
    }
    
}
public function atualizar($telefone,$rua,$numero,$idatual){
    try{
        $sql = "UPDATE clientes SET telefone=?, rua=?, numero=? WHERE id = ?";
        $stmt= $this->pdo->prepare($sql);
        return $stmt->execute([$telefone,$rua,$numero,$idatual]);
    }catch(PDOExtelefonetion $e){
        if ($e->getCode() == 23000 && strpos($e->getMessage(), 'Duplicate entry') !== false) {
            throw new Extelefonetion("E-mail já cadastrado!");
        } else {
            throw $e;
        }
    }
    
}

public function editar($nome, $email, $senha, $id, $cargo) {
        $sql = "UPDATE clientes SET nome=?, email=?, senha=?, cargo=? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome, $email, $senha, $id, $cargo]);
    }

    
    public function deletar($id){
    $sql = "DELETE FROM clientes WHERE id = ?";
    $stmt= $this->pdo->prepare($sql);
    return $stmt->execute([
        $id
    ]);
}

public function buscarUsuarioPorId($id) {
    $stmt = $this->pdo->prepare("SELECT id, nome, email, telefone, rua, numero, cargo, pedidos FROM clientes WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
public function atualizarUsuario($id, $nome, $email, $senha, $telefone, $rua, $numero) {
    $params = [
        'id' => $id,
        'nome' => $nome,
        'email' => $email,
        'telefone' => $telefone,
        'rua' => $rua,
        'numero' => $numero,
    ];

    if (!empty($senha)) {
        $sql = "UPDATE clientes SET nome = :nome, email = :email, senha = :senha, telefone = :telefone, rua = :rua, numero = :numero  WHERE id = :id";
        $params['senha'] = $senha; // Salva a nova senha sem criptografia
    } else {
        $sql = "UPDATE clientes SET nome = :nome, email = :email, telefone = :telefone, rua = :rua, numero = :numero WHERE id = :id";
    }

    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute($params);
}
public function atualizarUsuarioAdmin($id, $nome, $email, $senha, $telefone, $rua, $numero, $cargo, $pedidos) {
    $params = [
        'id' => $id,
        'nome' => $nome,
        'email' => $email,
        'telefone' => $telefone,
        'rua' => $rua,
        'numero' => $numero,
        'cargo' => $cargo,
        'pedidos' => $pedidos
    ];

    if (!empty($senha)) {
        $sql = "UPDATE clientes SET nome = :nome, email = :email, senha = :senha, telefone = :telefone, rua = :rua, numero = :numero, cargo = :cargo, pedidos = :pedidos WHERE id = :id";
        $params['senha'] = $senha; // Salva a nova senha sem criptografia
    } else {
        $sql = "UPDATE clientes SET nome = :nome, email = :email, telefone = :telefone, rua = :rua, numero = :numero, cargo = :cargo, pedidos = :pedidos WHERE id = :id";
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
        // Substitui os pedidos existentes pelo novo pedido
        $sql = "UPDATE clientes SET pedidos = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$pedido, $userId]);
    } catch (PDOExtelefonetion $e) {
        // Log do erro para depuração
        error_log("Erro ao adicionar pedido: " . $e->getMessage());
        return false;
    }
}


}
?>
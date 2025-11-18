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
public function cadastrar($nome, $email, $senha){
    try{
        $sql = "INSERT INTO clientes (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([
            ':nome'=>$nome,
            ':email'=>$email,
            ':senha'=>$senha,
           
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

public function editar($nome, $email, $senha, $id) {
        $sql = "UPDATE clientes SET nome=?, email=?, senha=? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome, $email, $senha, $id]);
    }
    public function deletar($id){
    $sql = "DELETE FROM clientes WHERE id = ?";
    $stmt= $this->pdo->prepare($sql);
    return $stmt->execute([
        $id
    ]);
}

public function buscarUsuarioPorId($id) {
    $stmt = $this->pdo->prepare("SELECT id, nome, email, cep, rua, numero FROM clientes WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function atualizarUsuario($id, $nome, $email, $senha, $cep, $rua, $numero) {
    $params = [
        'id' => $id,
        'nome' => $nome,
        'email' => $email,
        'cep' => $cep,
        'rua' => $rua,
        'numero' => $numero
    ];

    if (!empty($senha)) {
        $sql = "UPDATE clientes SET nome = :nome, email = :email, senha = :senha, cep = :cep, rua = :rua, numero = :numero WHERE id = :id";
        $params['senha'] = password_hash($senha, PASSWORD_DEFAULT);
    } else {
        $sql = "UPDATE clientes SET nome = :nome, email = :email, cep = :cep, rua = :rua, numero = :numero WHERE id = :id";
    }

    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute($params);
}
}
?>
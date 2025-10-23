<?php
class UsuarioModel{
    private $pdo;
public function __construct(PDO $pdo){
$this->pdo = $pdo;
}
public function buscarTodos(){
    $stmt=$this->pdo->query("SELECT * FROM clientes");
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
        return $stmt->execute([
            ':nome'=>$nome,
            ':email'=>$email,
            ':senha'=>$senha,

        ]);
    }catch(PDOException $e){
        if ($e->getCode() == 23000 && strpos($e->getMessage(), 'Duplicate entry') !== false) {
            throw new Exception("E-mail já cadastrado!");
        } else {
            throw $e;
        }
    }
    
}
public function cadastrarEndereco($cep, $rua, $numero){
    try{
        $sql = "INSERT INTO clientes (cep, rua, numero) VALUES (:cep, :rua, :numero)";
        $stmt= $this->pdo->prepare($sql);
        return $stmt->execute([
            ':cep'=>$cep,
            ':rua'=>$rua,
            ':numero'=>$numero
        ]);
    }catch(PDOException $e){
        $e->getMessage();
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
}
?>
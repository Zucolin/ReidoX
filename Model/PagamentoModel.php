<?php
class PagamentoModel{
    private $pdo;
public function __construct(PDO $pdo){
$this->pdo = $pdo;
}
public function buscarTodosPagamentos(){
    $stmt=$this->pdo->query("SELECT * FROM pagamento");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function buscarPagamento($id){
        $stmt = $this->pdo->query("SELECT * FROM pagamento WHERE id = $id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
}
public function cadastrarPagamento($nome, $tipo){
    $sql = "INSERT INTO pagamento (nome, tipo) VALUES (:nome, :tipo)";
    $stmt= $this->pdo->prepare($sql);
    return $stmt->execute([
        ':nome'=>$nome,
        ':tipo'=>$tipo,
    ]);
}
public function editarPagamento($nome, $tipo, $id) {
        $sql = "UPDATE pagamento SET nome=?, tipo=? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome, $tipo, $id]);
    }
    public function deletarPagamento($id){
    $sql = "DELETE FROM pagamento WHERE id = ?";
    $stmt= $this->pdo->prepare($sql);
    return $stmt->execute([
        $id
    ]);
}
}
?>
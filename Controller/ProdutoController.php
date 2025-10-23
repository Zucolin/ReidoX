<?php
require_once "C:/Turma1/xampp/htdocs/REIDOX/mvc/Model/ProdutoModel.php";

class ProdutoController{
    private $produtoModel;
    public function __construct($pdo){
        $this->produtoModel= new ProdutoModel($pdo);
    }
    public function listarProduto(){
        $produtos = $this->produtoModel->buscarTodosProduto();
        include_once "C:/Turma1/xampp/htdocs/REIDOX/mvc/View/Produto/listar.php";
        return;
    }
    public function buscarProduto($id){
        $produto=$this->produtoModel->buscarProduto($id);
        return $produto;
    }
    public function cadastrarProduto($nome, $descricao, $quantidade, $codigo_barra, $preco){
        return $this->produtoModel->cadastrarProduto($nome, $descricao, $quantidade, $codigo_barra, $preco);
    }
    public function editarProduto($nome, $descricao, $quantidade, $codigo_barra, $preco, $id){
        $this->produtoModel->editarProduto($nome, $descricao, $quantidade, $codigo_barra, $preco, $id);
    }
        public function deletarProduto($id){
        $produto=$this->produtoModel->deletarProduto($id);
        return $produto;
    }
}
?>
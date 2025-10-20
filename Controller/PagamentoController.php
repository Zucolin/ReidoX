<?php
require_once "C:/Turma1/xampp/htdocs/programa/mvc/Model/PagamentoModel.php";

class PagamentoController{
    private $pagamentoModel;
    public function __construct($pdo){
        $this->pagamentoModel= new PagamentoModel($pdo);
    }
    public function listarPagamento(){
        $pagamentos = $this->pagamentoModel->buscarTodosPagamentos();
        include_once "C:/Turma1/xampp/htdocs/programa/mvc/View/Pagamento/listar.php";
        return;
    }
    public function buscarPagamento($id){
        $pagamento=$this->pagamentoModel->buscarPagamento($id);
        return $pagamento;
    }
    public function cadastrarPagamento($nome, $tipo){
        return $this->pagamentoModel->cadastrarPagamento($nome, $tipo);
    }
    public function editarPagamento($nome, $tipo, $id){
        $this->pagamentoModel->editarPagamento($nome, $tipo, $id);
    }

    public function deletarPagamento($id){
        $pagamento=$this->pagamentoModel->deletarPagamento($id);
        return $pagamento;
    }
}
?>
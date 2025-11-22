<?php
session_start();
require_once "DB/Database.php";
require_once "Model/UsuarioModel.php";

$usuarioModel = new UsuarioModel($pdo);

$action = $_POST['action'] ?? '';

try {
    if ($action === 'add') {
        $nome = $_POST['nome'] ?? '';
        $descricao = $_POST['descricao'] ?? '';
        $preco = $_POST['preco'] ?? 0;
        $categoria = $_POST['categoria'] ?? '';

        if (empty($nome) || empty($categoria)) {
            throw new Exception("Nome e categoria são obrigatórios.");
        }

        // Lógica de upload de imagem
        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
            $uploadDir = 'img/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            
            $ext = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
            $fileName = uniqid() . '.' . $ext;
            $destination = $uploadDir . $fileName;

            if (!move_uploaded_file($_FILES['imagem']['tmp_name'], $destination)) {
                throw new Exception("Falha ao mover o arquivo de imagem.");
            }
        } else {
            $fileName = null; // No image uploaded
        }

        // Cadastra o produto com a imagem
        $success = $usuarioModel->cadastrarProduto($nome, $descricao, $preco, $categoria, $fileName);
        
        if ($success) {
            header("Location: admin.php?status=prod_add_success");
            exit;
        } else {
            throw new Exception("Falha ao cadastrar o produto.");
        }

    } elseif ($action === 'edit') {
        $id = $_POST['id'] ?? 0;
        $nome = $_POST['nome'] ?? '';
        $descricao = $_POST['descricao'] ?? '';
        $preco = $_POST['preco'] ?? 0;
        $categoria = $_POST['categoria'] ?? '';
        $imagem = null; 

        if (!$id) {
            throw new Exception("ID do produto não fornecido para edição.");
        }

        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
            $uploadDir = 'img/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $produtoAtual = $usuarioModel->buscarProdutoPorId($id);
            if ($produtoAtual && !empty($produtoAtual['imagem'])) {
                $oldImagePath = $uploadDir . $produtoAtual['imagem'];
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $ext = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
            $fileName = uniqid() . '.' . $ext;
            $destination = $uploadDir . $fileName;

            if (!move_uploaded_file($_FILES['imagem']['tmp_name'], $destination)) {
                throw new Exception("Falha ao mover o novo arquivo de imagem.");
            }
            $imagem = $fileName;
        }

        $success = $usuarioModel->editarProduto($id, $nome, $descricao, $preco, $categoria, $imagem);
        
        if ($success) {
            header("Location: admin.php?status=prod_edit_success");
            exit;
        } else {
            throw new Exception("Falha ao editar o produto.");
        }

    } elseif ($action === 'delete') {
        $id = $_POST['id'] ?? 0;
        if ($id) {
            $usuarioModel->deletarProduto($id);
            header("Location: admin.php?status=prod_delete_success");
            exit;
        } else {
            throw new Exception("ID do produto não fornecido para exclusão.");
        }
    } else {
        header("Location: admin.php");
        exit;
    }
} catch (Exception $e) {
    // Em um aplicativo real, você pode querer registrar o erro
    // e mostrar uma mensagem mais amigável.
    header("Location: admin.php?status=error&message=" . urlencode($e->getMessage()));
    exit;
}

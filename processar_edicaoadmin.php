<?php
session_start();
require_once 'DB/Database.php';
require_once 'Model/UsuarioModel.php';

// Verifica se o usuário logado é admin e se o método é POST
if (!isset($_SESSION['cargo']) || ($_SESSION['cargo'] !== 'admin' && $_SESSION['cargo'] !== 'chapeiro')) {
    header('Location: index.php?erro=' . urlencode('Acesso negado. Área restrita para administradores.'));
    exit;
}
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

// Pega os dados do formulário
$id = $_POST['id'] ?? 0; // Pega o ID do usuário que está sendo editado (vindo do formulário)
$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? ''; // Nova senha (pode ser vazia)
$cep = $_POST['cep'] ?? '';
$rua = $_POST['rua'] ?? '';
$numero = $_POST['numero'] ?? '';
$cargo = $_POST['cargo'] ?? '';
$pedidos = $_POST['pedidos'] ?? '';

// Validação simples
if (empty($id) || empty($nome) || empty($email)) {
    header('Location: admin.php?erro=Dados inválidos para atualização.');
    exit;
}

try {
    $usuarioModel = new UsuarioModel($pdo);
    // Chama a função específica para atualização de admin, que inclui cargo e pedidos
    $sucesso = $usuarioModel->atualizarUsuarioAdmin($id, $nome, $email, $senha, $cep, $rua, $numero, $cargo, $pedidos);

    if ($sucesso) {
        // Verifica se o usuário editado é o próprio usuário logado
        $id_usuario_logado = $_SESSION['id_usuario'] ?? 0;
        $id_usuario_editado = (int)$id;

        // Se o usuário logado editou a si mesmo e mudou seu cargo para 'cliente'
        if ($id_usuario_logado === $id_usuario_editado && $cargo === 'cliente') {
            $_SESSION['cargo'] = 'cliente'; // Atualiza a sessão imediatamente
            header('Location: index.php?aviso=' . urlencode('Seu cargo foi alterado. Você foi desconectado.'));
            exit;
        }
        
        // Redireciona de volta para a página de admin com uma mensagem de sucesso
        header('Location: admin.php');
        exit;
    } else {
        header('Location: editar_usuarioadmin.php?erro=Ocorreu um erro ao atualizar o perfil.');
        exit;
    }
} catch (Exception $e) {
    // Trata exceções, como email duplicado
    header('Location: editar_usuarioadmin.php?erro=' . urlencode($e->getMessage()));
    exit;
}
?>
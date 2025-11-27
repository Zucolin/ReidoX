<?php
session_start();
require_once 'C:/turma1/xampp/htdocs/ReidoX/Controller/UsuarioController.php';
require_once 'C:/turma1/xampp/htdocs/ReidoX/DB/Database.php'; // Inclui e cria a variável $pdo

// Verifica se o usuário tem permissão (admin ou chapeiro)
if (!isset($_SESSION['cargo']) || ($_SESSION['cargo'] !== 'admin' && $_SESSION['cargo'] !== 'chapeiro')) {
    header('Location: index.php?erro=' . urlencode('Acesso negado. Área restrita para administradores.'));
    exit;
}

$usuarioController = new UsuarioController($pdo);

// Busca o usuário pelo ID passado na URL
$id_usuario_a_editar = $_GET['id'] ?? 0;
if (!$id_usuario_a_editar) {
    header('Location: admin.php?erro=' . urlencode('ID de usuário inválido.'));
    exit;
}
$usuario = $usuarioController->buscarUsuarioPorId($id_usuario_a_editar);

$erro = $_GET['erro'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
</head>
<style>
    /* ===== EDITAR USUÁRIO - PRETO + AMARELO (SEM MEXER NO HTML) ===== */

body {
  background: #000 !important;
}

.container.mt-5 {
  background: #111;
  max-width: 420px;
  padding: 30px;
  border-radius: 15px;
  box-shadow: 0 0 20px rgba(245, 196, 0, 0.25);
  margin: 80px auto !important;
  color: #fff;
}

.container.mt-5 h2 {
  text-align: center;
  color: #f5c400;
  margin-bottom: 25px;
  text-transform: uppercase;
  font-weight: bold;
}

/* Labels */
.form-group label {
  color: #f5c400;
  font-weight: 600;
}

/* Inputs */
.form-control {
  background: rgba(128, 128, 128, 0.25) !important;
  border: 1px solid rgba(255, 255, 0, 0.5) !important;
  color: #fff !important;
  border-radius: 14px !important;
  padding: 10px 14px !important;
  font-size: 0.9rem;
}

/* Quando clicar no input */
.form-control:focus {
  outline: none !important;
  border-color: #f5c400 !important;
  box-shadow: 0 0 7px #f5c40060 !important;
  background: rgba(128, 128, 128, 0.25) !important;
}

/* Textarea */
textarea.form-control {
  resize: none;
  min-height: 70px;
}

/* Botão salvar */
.btn-primary {
  width: 100%;
  margin-top: 15px;
  background-color: #f5c400 !important;
  color: #000 !important;
  border: none !important;
  padding: 10px !important;
  border-radius: 14px !important;
  font-weight: bold !important;
  transition: 0.3s;
}

.btn-primary:hover {
  background-color: #000 !important;
  color: #f5c400 !important;
  box-shadow: 0 0 10px #f5c400;
}

/* Botão cancelar (link) */
.btn-secondary {
  width: 100%;
  background: transparent !important;
  color: #f5c400 !important;
  border: 1px solid #f5c400 !important;
  padding: 10px !important;
  border-radius: 14px !important;
  margin-top: 10px;
  font-weight: 600 !important;
  transition: 0.3s;
}

.btn-secondary:hover {
  background: #f5c400 !important;
  color: #000 !important;
}

/* Mensagem usuário não encontrado */
.container.mt-5 p {
  color: #f5c400;
  text-align: center;
  font-size: 1em;
}
/* Deixa os itens mais próximos (menos espaço entre eles) */

/* Diminui espaço de cada grupo */
.form-group {
  margin-bottom: 10px !important;
}

/* Diminui altura dos inputs e fonte */
.form-control {
  padding: 6px 10px !important;
  font-size: 0.85rem !important;
}

/* Deixa o título mais perto do formulário */
.container.mt-5 h2 {
  margin-bottom: 10px !important;
}

/* Aproxima os botões dos campos */
.btn-primary {
  margin-top: 8px !important;
  padding: 8px !important;
}

.btn-secondary {
  margin-top: 6px !important;
  padding: 8px !important;
}

/* Ajusta tamanho geral do container */
.container.mt-5 {
  padding: 20px !important;
}
*{overflow-y: hidden;}
</style>

<body>
<div class="container mt-5">
    <h2>Editar Perfil</h2>
    <?php if ($erro): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($erro) ?></div>
    <?php endif; ?>

    <?php if ($usuario): ?>
    <form action="processar_edicaoadmin.php" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($usuario['id']) ?>">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required>
        </div>
        <div class="form-group">
            <label for="senha">Nova Senha (deixe em branco para não alterar)</label>
            <input type="password" class="form-control" id="senha" name="senha">
        </div>
        <hr>
        <h5>Endereço</h5>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value="<?= htmlspecialchars($usuario['telefone'] ?? '') ?>">
        </div>
        <div class="form-group">
            <label for="rua">Rua</label>
            <input type="text" class="form-control" id="rua" name="rua" value="<?= htmlspecialchars($usuario['rua'] ?? '') ?>">
        </div>
        <div class="form-group">
            <label for="numero">Número/Bloco</label>
            <input type="text" class="form-control" id="numero" name="numero" value="<?= htmlspecialchars($usuario['numero'] ?? '') ?>">
        </div>
        <div class="form-group">
            <label for="pedidos">Pedidos</label>
            <input type="text" class="form-control" id="pedidos" name="pedidos" value="<?= htmlspecialchars($usuario['pedidos'] ?? '') ?>">
        </div>
        <?php if (isset($usuario['cargo']) && $usuario['cargo'] === 'admin'): ?>
            <div class="form-group">
                <label>Cargo</label>
                <p class="form-control-static">Admin</p>
                <input type="hidden" name="cargo" value="admin">
            </div>
        <?php else: ?>
            <div class="form-group">
                <label for="cargo">Cargo</label>
                <select class="form-control" id="cargo" name="cargo" required>
                    <option value="cliente" <?= ($usuario['cargo'] ?? 'cliente') == 'cliente' ? 'selected' : '' ?>>Cliente</option>
                    <option value="chapeiro" <?= ($usuario['cargo'] ?? '') == 'chapeiro' ? 'selected' : '' ?>>Chapeiro</option>
                </select>
            </div>
        <?php endif; ?>
        
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <a href="admin.php" class="btn btn-secondary">Cancelar</a>
    </form>
    <?php else: ?>
    <div class="alert alert-warning">
        <p>Usuário não encontrado. Por favor, <a href="logout.php">faça o login novamente</a>.</p>
    </div>
    <?php endif; ?>
</div>
</body>
</html>
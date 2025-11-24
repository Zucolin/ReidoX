<?php
session_start();
require_once "Controller/UsuarioController.php";
require_once "DB/Database.php";

// Verifica se o usuário tem permissão de administrador
if (!isset($_SESSION['cargo']) || ($_SESSION['cargo'] !== 'admin' && $_SESSION['cargo'] !== 'chapeiro')) {
    header('Location: index.php?erro=' . urlencode('Acesso negado. Área restrita para administradores.'));
    exit;
}

$usuarioController = new UsuarioController($pdo);
$usuarios = $usuarioController->listar();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin - Clientes</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap");
        :root{
            --bg:#000;
            --text:#fff;
            --accent:#ffc72c; /* amarelo */
            --panel: rgba(255,255,255,0.02);
        }
        *{box-sizing:border-box ; font-family: "Montserrat", sans-serif; }
        html,body{height:100%;margin:0;background:var(--bg);color:var(--text);font-family: "Helvetica Neue", Arial, sans-serif;-webkit-font-smoothing:antialiased}

        /* Título no topo, centralizado */
        header.title-wrap{
            width:100%;
            padding:20px 16px;
            display:flex;
            justify-content:center;
            align-items:center;
        }
        h1.title{
            margin:0;
            font-size:40px;
            letter-spacing:0.6px;
            text-align:center;
            color:var(--accent);
        }

        .wrap{
            min-height:calc(100vh - 96px); /* espaço compensando o header */
            display:flex;
            align-items:flex-start;
            justify-content:center;
            padding:20px 16px 40px;
        }

        .table-box{
            width:100%;
            max-width:1200px;
            padding:28px;
            border-radius:12px;
            background:transparent;
            display:flex;
            flex-direction:column;
            align-items:stretch;
            gap:18px;
        }

        /* tabela com bordas sólidas amarelas ao redor, entre colunas e entre linhas */
        .clientes-table{
            width:100%;
            border-collapse:separate;       /* separado para permitir bordas internas independentes */
            border-spacing:0;               /* sem espaçamento entre células */
            border:3px solid var(--accent); /* borda sólida ao redor da tabela */
            border-radius:10px;
            overflow:hidden;
            background: rgba(0,0,0,0);
            table-layout:fixed;
        }

        /* Cabeçalho */
        .clientes-table thead th{
            text-align:left;
            padding:14px 18px;
            font-size:15px;
            background: rgba(255,255,255,0.02);
            color:var(--accent); /* títulos em amarelo */
            font-weight:700;
            /* traço vertical entre colunas (sólido) */
            border-left:2px solid var(--accent);
            /* linha sólida abaixo do cabeçalho */
            border-bottom:2px solid var(--accent);
            word-wrap:break-word;
        }
        .clientes-table thead th:first-child{ border-left: none; }

        /* Células do corpo com traço vertical separando colunas (sólido) */
        .clientes-table tbody td{
            padding:14px 18px;
            font-size:15px;
            color:rgba(255,255,255,0.9);
            vertical-align:middle;
            border-left:2px solid var(--accent);
            word-wrap:break-word;
        }
        .clientes-table tbody td:first-child{ border-left:none; }

        /* linha sólida entre linhas */
        .clientes-table tbody tr + tr td {
            border-top:2px solid var(--accent);
        }

        /* Remover dupla borda no canto interno (quando necessário) */
        .clientes-table tbody tr:first-child td {
            border-top: none;
        }

        .clientes-table tbody tr:hover{
            background: rgba(255,199,44,0.03);
        }

        .actions form{display:inline-block}
        .btn{
            background:var(--accent);
            color:#000;
            border:0;
            padding:8px 12px;
            border-radius:8px;
            font-weight:700;
            cursor:pointer;
            font-size:13px;
        }

        .btn.danger{ background:#c33; color:#fff }

        .muted{color:rgba(255,255,255,0.6); font-size:13px}

        .table-actions{
            width:100%;
            display:flex;
            justify-content:center;
            gap:14px;
            margin-top:12px;
        }
        .table-actions a{
            min-width:140px;
            padding:10px 14px;
            border-radius:10px;
            font-weight:800;
            text-align:center;
            text-decoration:none;
            display:inline-block;
            color:#000;
            background:rgba(255,199,44,1);
        }

        @media (max-width:900px){
            h1.title{font-size:34px}
            .wrap{min-height:calc(100vh - 84px)}
        }

        @media (max-width:700px){
            .clientes-table thead{display:none}
            .clientes-table, .clientes-table tbody, .clientes-table tr, .clientes-table td{display:block;width:100%}
            .clientes-table tr{margin-bottom:12px;border:1px solid rgba(255,199,44,0.25);padding:12px;border-radius:8px}
            .clientes-table td{padding:8px 12px}
            .clientes-table td::before{
                content: attr(data-label);
                display:block;
                font-weight:700;
                color:var(--accent);
                margin-bottom:6px;
                font-size:13px;
            }
            .table-actions{flex-direction:column; gap:10px}
            .table-actions a{width:100%}
        }
    </style>
</head>
<body>

    <!-- Título fixado no topo da página, centralizado -->
    <header class="title-wrap" role="banner">
        <h1 class="title">Clientes</h1>
    </header>

    <div class="wrap">
        <div class="table-box" role="region" aria-label="Lista de clientes">

            <table class="clientes-table" role="table" aria-label="Tabela de clientes">
                <thead>
                    <tr>
                        <th style="width:6%">ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Pedidos</th>
                        <th>Rua</th>
                        <th>Número</th>
                        <th>Cargo</th>
                        <th style="text-align:center; width:18%">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($usuarios) === 0): ?>
                        <tr>
                            <td colspan="7" style="text-align:center;padding:24px" class="muted">Nenhum cliente cadastrado.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($usuarios as $u): ?>
                            <tr>
                                <td data-label="ID"><?= htmlspecialchars($u['id'] ?? '') ?></td>
                                <td data-label="Nome"><?= htmlspecialchars($u['nome'] ?? '') ?></td>
                                <td data-label="Email"><?= htmlspecialchars($u['email'] ?? '') ?></td>
                                <td data-label="Pedidos"><?= nl2br(htmlspecialchars($u['pedidos'] ?? '')) ?></td>
                                <td data-label="Rua"><?= htmlspecialchars($u['rua'] ?? '') ?></td>
                                <td data-label="Número"><?= htmlspecialchars($u['numero'] ?? '') ?></td>
                                <td data-label="Role"><?= htmlspecialchars($u['cargo'] ?? 'cliente') ?></td>
                                <td data-label="Ações" style="text-align:center">
                                    <a href="editar_usuarioadmin.php?id=<?= $u['id'] ?>" class="btn" style="text-decoration:none; display: inline-block; margin-right: 5px;">Editar</a>
                                    <form method="post" action="deletar.php" style="display:inline-block" onsubmit="return confirm('Confirma exclusão?');">
                                        <input type="hidden" name="id" value="<?= htmlspecialchars($u['id'] ?? '') ?>">
                                        <button class="btn danger" type="submit">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- SEÇÃO DE PRODUTOS -->
    <header class="title-wrap" role="banner">
        <h1 class="title">Gerenciar Produtos</h1>
    </header>

    <div class="wrap">
        <div class="table-box" role="region" aria-label="Gerenciamento de Produtos">

            <!-- Formulário para Adicionar Usuário -->
            <div class="form-container" style="margin-bottom: 40px; background: rgba(255,255,255,0.05); padding: 20px; border-radius: 12px;">
                <h2 style="color: var(--accent); text-align: center;">Adicionar Novo Usuário</h2>
                <form action="processar_usuario.php" method="post">
                    <input type="hidden" name="action" value="add">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" required>
                    </div>
                    <div class="form-group">
                        <label for="cargo">Cargo</label>
                        <select name="cargo" required>
                            <option value="cliente">Cliente</option>
                            <option value="chapeiro">Chapeiro</option>
                        </select>
                    </div>
                    <button type="submit" class="btn">Adicionar Usuário</button>
                </form>
            </div>

            <!-- Formulário para Adicionar Produto -->
            <div class="form-container" style="margin-bottom: 40px; background: rgba(255,255,255,0.05); padding: 20px; border-radius: 12px;">
                <h2 style="color: var(--accent); text-align: center;">Adicionar Novo Produto</h2>
                <form action="processar_produto.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="add">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <textarea name="descricao" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="preco">Preço</label>
                        <input type="number" step="0.01" name="preco" required>
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoria</label>
                        <select name="categoria" required>
                            <option value="lanche">Lanche</option>
                            <option value="bebida">Bebida</option>
                            <option value="sobremesa">Sobremesa</option>
                            <option value="acompanhamento">Acompanhamento</option>
                            <option value="combo">Combo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="imagem">Imagem</label>
                        <input type="file" name="imagem" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn">Adicionar Produto</button>
                </form>
            </div>

            <!-- Tabela de Produtos Existentes -->
            <?php
            require_once "Model/UsuarioModel.php";
            $produtoModel = new UsuarioModel($pdo);
            $produtos = $produtoModel->listarProdutos();
            ?>
            <table class="clientes-table" role="table" aria-label="Tabela de Produtos">
                <thead>
                    <tr>
                        <th style="width:5%">ID</th>
                        <th style="width:20%">Nome</th>
                        <th>Descrição</th>
                        <th style="width:10%">Preço</th>
                        <th style="width:10%">Categoria</th>
                        <th style="text-align:center; width:15%">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($produtos)): ?>
                        <tr>
                            <td colspan="7" style="text-align:center;padding:24px" class="muted">Nenhum produto cadastrado.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($produtos as $p): ?>
                            <tr>
                                <td data-label="ID"><?= htmlspecialchars($p['id']) ?></td>
                                <td data-label="Nome"><?= htmlspecialchars($p['nome']) ?></td>
                                <td data-label="Descrição"><?= htmlspecialchars($p['descricao']) ?></td>
                                <td data-label="Preço">R$ <?= number_format($p['preco'], 2, ',', '.') ?></td>
                                <td data-label="Categoria"><?= htmlspecialchars($p['categoria']) ?></td>
                                <td data-label="Ações" style="text-align:center">
                                    <a href="editar_produto.php?id=<?= $p['id'] ?>" class="btn" style="text-decoration:none; display: inline-block; margin-right: 5px;">Editar</a>
                                    <form method="post" action="processar_produto.php" style="display:inline-block" onsubmit="return confirm('Tem certeza que deseja excluir este produto?');">
                                        <input type="hidden" name="id" value="<?= $p['id'] ?>">
                                        <input type="hidden" name="action" value="delete">
                                        <button class="btn danger" type="submit">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>

            <div class="table-actions" role="group" aria-label="Ações da tabela">
                <a class="btn" href="index.php" style="text-decoration:none;color:#000;background:rgba(255,199,44,1);">Voltar</a>
            </div>

        </div>
    </div>
    <style>
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; color: var(--accent); font-weight: 700; }
        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 2px solid var(--accent);
            background: transparent;
            color: #fff;
            font-size: 14px;
        }
    </style>
</body>
</html>
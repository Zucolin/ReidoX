<?php
session_start();
// Assumindo que essas classes/arquivos existem e estão configurados
require_once "Controller/UsuarioController.php";
require_once "DB/Database.php";
require_once "Model/UsuarioModel.php"; // Adicionado para listar produtos

// Configuração de conexão DB (assumindo que $pdo é definido em Database.php)

// Verifica se o usuário tem permissão de administrador ou chapeiro
if (!isset($_SESSION['cargo']) || ($_SESSION['cargo'] !== 'admin' && $_SESSION['cargo'] !== 'chapeiro')) {
    header('Location: index.php?erro=' . urlencode('Acesso negado. Área restrita.'));
    exit;
}

// Inicializa controllers/models
$usuarioController = new UsuarioController($pdo);
$usuarios = $usuarioController->listar();

$produtoModel = new UsuarioModel($pdo); 
$produtos = $produtoModel->listarProdutos(); // Puxa a lista de produtos
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin Dashboard</title>
<style>
 @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap");
    
    /* Variáveis CSS */
    :root{
        --bg:#000;
        --text:#fff;
        --accent:#ffc72c; /* Amarelo principal */
        --accent-dark: #cc9f23; 
        --panel: rgba(255,255,255,0.02);
        --danger: #c33; 
        --soft-shadow: 0 6px 20px rgba(0,0,0,0.6);
    }
    
    /* Reset, Fontes e TRAVAMENTO DA ROLAGEM PRINCIPAL */
    *{box-sizing:border-box ; font-family: "Montserrat", sans-serif; }
    html,body{
        height:100%;
        width: 100%;
        margin:0;
        background:var(--bg);
        color:var(--text);
        -webkit-font-smoothing:antialiased; 
        overflow: hidden; 
        scroll-behavior: smooth;
    }
    
    /* 1. Layout de Seções (Páginas Inteiras) */
    section {
        width: 100vw;
        height: 100vh; 
        display: flex;
        flex-direction: column;
        align-items: center;
        /* Alinhamento base: Título + Conteúdo + Ações */
        justify-content: flex-start;
        padding: 20px 16px;
    }

    /* Header (Título) */
    header.title-wrap{
        width:100%;
        padding:20px 16px 10px;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    h1.title{
        font-size: clamp(30px, 5vw, 40px);
        letter-spacing:0.8px;
        text-align:center;
        color:var(--accent);
        text-transform: uppercase;
    }

    /* 2. Estilo do Menu Principal e Formulários (CENTRALIZAÇÃO) */
    #inicio {
        justify-content: center; 
    }
    /* MUDANÇA: Centraliza o bloco inteiro do formulário */
    #criar-usuario, #criar-produto {
        justify-content: center; 
    }

    /* Container de navegação (Menu) */
    .main-menu {
        display: flex;
        flex-direction: column;
        gap: 20px;
        width: 100%;
        max-width: 300px; 
        padding: 20px;
        border-radius: 15px;
        background: rgba(255, 255, 255, 0.05);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(4px);
        border: 1px solid rgba(255, 255, 255, 0.18);
    }

    .main-menu a, .main-menu button {
        text-decoration: none;
        text-transform: uppercase;
        font-weight: 800;
        font-size: 16px;
        padding: 15px 20px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s, box-shadow 0.3s;
        text-align: center;
        display: block; 
    }
    
    .main-menu .menu-btn {
        background: var(--accent);
        color: var(--bg);
        box-shadow: 0 4px 10px rgba(255, 199, 44, 0.4);
    }

    .main-menu .menu-btn:hover {
        background: var(--accent-dark);
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(255, 199, 44, 0.6);
    }

    .main-menu .logout-btn {
        background: var(--danger);
        color: var(--text);
        margin-top: 10px;
        box-shadow: 0 4px 10px rgba(192, 51, 51, 0.4);
    }

    .main-menu .logout-btn:hover {
        background: #992222;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(192, 51, 51, 0.6);
    }
    
    /* 3. Estilos do Container Wrap */
    .wrap{
        width:100%;
        /* Altura adaptável para Listas (ocupa espaço restante e rola) */
        height: calc(100vh - 170px); 
        overflow-y: auto; 
        display:flex;
        align-items:flex-start;
        justify-content:center;
        padding: 20px 0;
    }
    
    /* MUDANÇA: Estilos do Wrap APENAS nas seções de Formulário */
    #criar-usuario .wrap, #criar-produto .wrap {
        height: auto; 
        overflow-y: visible; 
        max-height: calc(100vh - 170px); 
        padding: 0; 
        
        /* Centraliza o formulário no centro do wrap */
        align-items: center; 
        justify-content: center; 
    }

    .table-box{
        width:100%;
        max-width:1200px;
        padding: 0 16px; 
        display:flex;
        flex-direction:column;
        align-items:stretch;
        gap:18px;
    }

    /* ====== ALTERAÇÕES IMPORTANTES PARA CENTRALIZAR E DIMINUIR ====== */
    /* Faz a caixa interna centralizar seus conteúdos (formulários menores) */
    #criar-usuario .table-box,
    #criar-produto .table-box {
        align-items: center; /* centraliza horizontalmente o form-container */
    }

    /* Formulário com largura reduzida e visual melhorado */
    .form-container { 
        overflow: visible;
        background: rgba(255,255,255,0.03); 
        padding: 22px; 
        border-radius: 12px; 
        width: 900px;
        box-shadow: var(--soft-shadow);
        border: 1px solid rgba(255,199,44,0.08);
        
        /* Limita a altura e permite rolagem APENAS SE NECESSÁRIO */
        height: 540px 

    }

    /* Etiqueta menor e inputs mais compactos */
    .form-group { margin-bottom: 5px; }
    .form-group label { display: block; margin-bottom: 6px; color: var(--accent); font-weight: 700; font-size: 13px; }
    .form-group input, .form-group textarea, .form-group select {
        width: 850px;
        height: 36px;
        padding: 10px;
        border-radius: 8px;
        border: 2px solid var(--accent);
        background: rgba(255, 255, 255, 0.03);
        color: #fff;
        font-size: 15px;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .form-group textarea { min-height: 82px; resize: vertical; }
    .form-group input:focus, .form-group textarea:focus, .form-group select:focus {
            border-color: var(--accent-dark);
            outline: none;
            box-shadow: 0 0 8px rgba(255, 199, 44, 0.14);
    }

    /* Botão principal maior, porém com borda arredondada suave */
    .form-container .btn[type="submit"] {
    display: block;
    padding: 12px 30px; /* Aumentei um pouco a largura interna */
    font-size: 15px;
    
    /* O SEGREDO DA CENTRALIZAÇÃO: */
    width: fit-content; /* O botão fica do tamanho do texto */
    margin-left: auto;  /* Empurra da esquerda */
    margin-right: auto; /* Empurra da direita */
    margin-top: 20px;   /* Espaço acima do botão */
    margin-bottom: 10px; /* Espaço abaixo do botão */

    border-radius: 10px;
    font-weight: 800;
    box-shadow: 0 6px 18px rgba(0,0,0,0.4);
}

    /* Arquivo (file input) styled: esconder input real e usar label */
    .file-input-wrap {
position: relative;
        display: flex;
        gap: 12px;
        align-items: center;
    }
    .file-input-wrap input[type="file"]{
        display: inline-block;
    }
    /* Se quiser melhorar visual do file input: usar JS/CSS mais avançado.
       Mantive o padrão por compatibilidade, mas dei padding e borda ao redor. */
    .form-group .file-wrapper {
        border: 2px solid var(--accent);
        padding: 8px;
        border-radius: 8px;
        display:flex;
        align-items:center;
        gap:10px;
        background: rgba(255,255,255,0.01);
    }

    /* Tabela (Sem alterações) */
    .clientes-table{
        border-collapse:separate;
        border-spacing:0;
        border:3px solid var(--accent);
        border-radius:10px;
        overflow:hidden;
        background: rgba(0,0,0,0);
        table-layout:fixed;
        width: 100%;
    }
    .clientes-table thead th{
        text-align:left;
        padding:14px 18px;
        font-size:15px;
        background: rgba(255,255,255,0.05);
        color:var(--accent);
        font-weight:700;
        border-left:2px solid var(--accent);
        border-bottom:2px solid var(--accent);
        word-wrap:break-word;
    }
    .clientes-table thead th:first-child{ border-left: none; }

    .clientes-table tbody td{
        padding:14px 18px;
        font-size:15px;
        color:rgba(255,255,255,0.9);
        vertical-align:middle;
        border-left:2px solid var(--accent);
        word-wrap:break-word;
    }
    .clientes-table tbody td:first-child{ border-left:none; }
    .clientes-table tbody tr + tr td {
        border-top:2px solid var(--accent);
    }
    .clientes-table tbody tr:hover{
        background: rgba(255,199,44,0.05);
    }
    
    /* Botões de Ação na Tabela */
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
        transition: background-color 0.3s;
        text-decoration: none;
        display: inline-block;
    }
    .btn:hover { background: var(--accent-dark); }
    .btn.danger{ background:var(--danger); color:#fff }
    .btn.danger:hover{ background:#992222; }

    .muted{color:rgba(255,255,255,0.6); font-size:13px}

    /* Ações globais (Sair/Voltar) */
    .table-actions{
        width:100%;
        max-width: 300px; 
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
        color:var(--bg);
        background:rgba(255,199,44,1);
        transition: background-color 0.3s;
            position: fixed; 
            
            /* 2. Coloca o elemento a 20 pixels da borda inferior da janela */
            bottom: 20px; 
            
            /* 3. Coloca o elemento a 20 pixels da borda direita da janela */
            right: 20px; 
            
            /* 4. Estilos de exemplo para você visualizar o elemento */
            background-color: #007bff; /* Azul */
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
    }
    .table-actions a.logout{
        background:var(--danger) !important;
        color:var(--text) !important;
    }
    .table-actions a:hover{ background:var(--accent-dark); }
    .table-actions a.logout:hover{ background:#992222 !important; }

    /* Responsividade */
    @media (max-width:900px){
        h1.title{font-size:34px}
    }

    @media (max-width:700px){
        /* Ajusta o wrap de LISTAS para garantir rolagem em telas menores */
        #lista-usuarios .wrap, #tabela-produto .wrap { height: calc(100vh - 150px); padding: 10px 0;} 
        
        /* Ajusta o wrap de FORMULÁRIOS para ser mais contido */
        #criar-usuario .wrap, #criar-produto .wrap {
            max-height: calc(100vh - 150px);
        }
        
        /* No mobile, o formulário deve ocupar mais espaço horizontal */
        .form-container { max-width: 92%; padding: 16px; }

        .clientes-table thead{display:none}
        .clientes-table, .clientes-table tbody, .clientes-table tr, .clientes-table td{display:block;width:100%}
        .clientes-table tr{
            margin-bottom:12px;
            border:1px solid rgba(255,199,44,0.25);
            padding:12px;
            border-radius:8px;
        }
        .clientes-table td{
            padding:8px 12px;
            border-left:none !important; 
            border-top: none !important; 
        }

        .clientes-table td::before{
            content: attr(data-label);
            display:block;
            font-weight:700;
            color:var(--accent);
            margin-bottom:4px; 
            font-size:12px; 
        }
        
        .table-actions{flex-direction:column; gap:10px; max-width: 100%;}
        .table-actions a{width:100%}
        .main-menu { max-width: 90%; }
</style>
</head>
<body>

<section id="inicio">
    <header class="title-wrap" role="banner">
        <h1 class="title">🍔 Dashboard Administrativo</h1>
    </header>

    <div class="main-menu" role="navigation" aria-label="Menu principal de navegação">
        <a href="#lista-usuarios" class="menu-btn">Tabela Usuário</a>
        <a href="#criar-usuario" class="menu-btn">Criar Novo Usuário</a>
        <a href="#tabela-produto" class="menu-btn">Tabela Produto</a>
        <a href="#criar-produto" class="menu-btn">Adicionar Novo Produto</a>
        <a href="index.php" class="logout-btn">Sair</a>
    </div>
</section>

<section id="lista-usuarios">
    <header class="title-wrap" role="banner">
        <h1 class="title">Clientes Cadastrados</h1>
    </header>
    <div class="wrap">
        <div class="table-box" role="region" aria-label="Lista de clientes">
            <table class="clientes-table" role="table" aria-label="Tabela de clientes">
                <thead>
                    <tr>
                        <th style="width:6%">ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Senha</th>
                        <th>Pedidos</th>
                        <th>Telefone</th>
                        <th>Rua</th>
                        <th>Número</th>
                        <th>Cargo</th>
                        <th style="text-align:center; width:18%">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($usuarios) === 0): ?>
                        <tr>
                            <td colspan="9" style="text-align:center;padding:24px" class="muted">Nenhum cliente cadastrado.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($usuarios as $u): ?>
                            <tr>
                                <td data-label="ID"><?= htmlspecialchars($u['id'] ?? '') ?></td>
                                <td data-label="Nome"><?= htmlspecialchars($u['nome'] ?? '') ?></td>
                                <td data-label="Email"><?= htmlspecialchars($u['email'] ?? '') ?></td>
                                <td data-label="Email"><?= htmlspecialchars($u['senha'] ?? '') ?></td>
                                <td data-label="Pedidos"><?= nl2br(htmlspecialchars($u['pedidos'] ?? '')) ?></td>
                                <td data-label="Telefone"><?= htmlspecialchars($u['telefone'] ?? '') ?></td>
                                <td data-label="Rua"><?= htmlspecialchars($u['rua'] ?? '') ?></td>
                                <td data-label="Número"><?= htmlspecialchars($u['numero'] ?? '') ?></td>
                                <td data-label="Cargo"><?= htmlspecialchars($u['cargo'] ?? 'cliente') ?></td>
                                <td data-label="Ações" style="text-align:center" class="actions">
                                    <a href="editar_usuarioadmin.php?id=<?= $u['id'] ?>" class="btn" style="text-decoration:none;">Editar</a>
                                    <form method="post" action="deletar.php" onsubmit="return confirm('Confirma exclusão do usuário <?= htmlspecialchars($u['nome'] ?? '') ?>?');">
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
    <div class="table-actions" role="group" aria-label="Ações da tabela">
        <a class="btn" href="#inicio" style="background:var(--accent); color:var(--bg);">Voltar ao Menu</a>
    </div>
</section>

<section id="criar-usuario">
    <header class="title-wrap" role="banner">
        <h1 class="title">👥 Adicionar Novo Usuário</h1>
    </header>

    <div class="wrap">
        <div class="table-box" role="region">
            <div class="form-container">
                <form action="processar_usuario.php" method="post">
                    <input type="hidden" name="action" value="add">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" id="senha" name="senha" required>
                    </div>
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" id="telefone" name="telefone">
                    </div>
                    <div class="form-group">
                        <label for="rua">Rua</label>
                        <input type="text" id="rua" name="rua">
                    </div>
                    <div class="form-group">
                        <label for="numero">Número/Bloco</label>
                        <input type="text" id="numero" name="numero">
                    </div>
                    <div class="form-group">
                        <label for="cargo">Cargo</label>
                        <select id="cargo" name="cargo" required>
                            <option value="cliente">Cliente</option>
                            <option value="chapeiro">Chapeiro</option>
                            <?php if ($_SESSION['cargo'] === 'admin'): ?>
                                <option value="admin">Administrador</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn">Adicionar Usuário</button>
                </form>
            </div>
        </div>
    </div>
    <div class="table-actions" role="group" aria-label="Ações de navegação">
        <a class="btn" href="#inicio" style="background:var(--accent); color:var(--bg);">Voltar ao Menu</a>
    </div>
</section>

<section id="criar-produto">
    <header class="title-wrap" role="banner">
        <h1 class="title">➕ Adicionar Produto</h1>
    </header>
    <div class="wrap">
        <div class="table-box" role="region">
            <div class="form-container">
                <form action="processar_produto.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="add">
                    <div class="form-group">
                        <label for="produto_nome">Nome</label>
                        <input type="text" id="produto_nome" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <textarea id="descricao" name="descricao" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="preco">Preço (R$)</label>
                        <input type="number" step="0.01" id="preco" name="preco" required>
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoria</label>
                        <select id="categoria" name="categoria" required>
                            <option value="lanche">Lanche</option>
                            <option value="bebida">Bebida</option>
                            <option value="sobremesa">Sobremesa</option>
                            <option value="acompanhamento">Acompanhamento</option>
                            <option value="combo">Combo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="imagem">Imagem</label>
                        <input type="file" id="imagem" name="imagem" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn">Adicionar Produto</button>
                </form>
            </div>
        </div>
    </div>
    <div class="table-actions" role="group" aria-label="Ações de navegação">
        <a class="btn" href="#inicio" style="background:var(--accent); color:var(--bg);">Voltar ao Menu</a>
    </div>
</section>

<section id="tabela-produto">
    <header class="title-wrap" role="banner">
        <h1 class="title">🍔 Tabela de Produtos</h1>
    </header>
    <div class="wrap">
        <div class="table-box" role="region" aria-label="Lista de produtos">
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
                            <td colspan="6" style="text-align:center;padding:24px" class="muted">Nenhum produto cadastrado.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($produtos as $p): ?>
                            <tr>
                                <td data-label="ID"><?= htmlspecialchars($p['id']) ?></td>
                                <td data-label="Nome"><?= htmlspecialchars($p['nome']) ?></td>
                                <td data-label="Descrição"><?= htmlspecialchars($p['descricao']) ?></td>
                                <td data-label="Preço">R$ <?= number_format($p['preco'], 2, ',', '.') ?></td>
                                <td data-label="Categoria"><?= htmlspecialchars($p['categoria']) ?></td>
                                <td data-label="Ações" style="text-align:center" class="actions">
                                    <a href="editar_produto.php?id=<?= $p['id'] ?>" class="btn" style="text-decoration:none;">Editar</a>
                                    <form method="post" action="processar_produto.php" onsubmit="return confirm('Tem certeza que deseja excluir o produto <?= htmlspecialchars($p['nome']) ?>?');">
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
        </div>
    </div>
    <div class="table-actions" role="group" aria-label="Ações de navegação">
        <a class="btn" href="#inicio" style="background:var(--accent); color:var(--bg);">Voltar ao Menu</a>
    </div>
</section>

<div style="height: 1px; width: 1px; overflow: hidden; position: fixed; top: 0;">
    </div>

</body>
</html>
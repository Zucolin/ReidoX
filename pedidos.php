<?php
session_start();


require_once "Controller/UsuarioController.php";
require_once "Model/UsuarioModel.php";
require_once "DB/Database.php";

$usuarioController = new UsuarioController($pdo);

// Verifica se usuário está logado
if (!isset($_SESSION['user_id'])) {
    echo "Você precisa estar logado para ver seus pedidos.";
    exit;
}

// Busca dados do usuário logado
$userId = $_SESSION['user_id'];
$usuario = $usuarioController->buscarUsuario($userId);

// Verifica se existem pedidos
$pedidos = $usuario['pedidos'] ?? '';

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>

    <!-- Estilos embutidos conforme solicitado -->
    <style>
        :root{
            --bg-start: #000000;
            --bg-end: #000000;
            --card-bg: rgba(255, 255, 255, 0.04); /* container */
            --card-text: #0b1220; /* texto escuro secundário */
            --highlight: #f5c518; /* amarelo solicitado para títulos/itens e botão */
            --accent: #2563eb;
            --muted: #6b7280;
            --shadow: 0 10px 30px rgba(16,24,40,0.12);
            --radius: 12px;
            --max-width: 760px;
            --item-border: #000000; /* contorno preto para cada pedido */
        }

        *{box-sizing:border-box}
        html,body{
            height:100%;
            margin:0;
            font-family: Inter, Roboto, "Helvetica Neue", Arial, sans-serif;
            background: linear-gradient(180deg,var(--bg-start),var(--bg-end));
            -webkit-font-smoothing:antialiased;
            -moz-osx-font-smoothing:grayscale;
            color:#e6e6e6;
        }

        /* centraliza o conteúdo em tela inteira */
        body{
            display:flex;
            align-items:center;
            justify-content:center;
            padding:24px;
        }

        /* container principal */
        .container{
            width:100%;
            max-width:var(--max-width);
            background:var(--card-bg);
            color:var(--card-text);
            border-radius:var(--radius);
            box-shadow:var(--shadow);
            padding:28px;
            text-align:left;
            border: 1px solid rgba(0,0,0,0.08);
        }

        /* título */
        .container h1{
            margin:0 0 12px 0;
            font-size:1.4rem;
            color:var(--highlight); /* título em amarelo */
        }

        /* meta (aqui estão seus pedidos recentes) em branco */
        .meta{
            color:#ffffff;
            font-size:0.95rem;
            margin-bottom:16px;
        }

        /* lista de pedidos */
        .pedidos-list{
            list-style:none;
            margin:12px 0 20px 0;
            padding:0;
            display:flex;
            flex-direction:column;
            gap:10px;
        }

        /* item de pedido: apenas contorno preto, fundo transparente (mostra o container rgba) */
        .pedido-item{
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:12px 14px;
            border-radius:10px;
            background: transparent;
            border:2px solid var(--item-border);
            font-size:0.98rem;
            color:var(--card-text);
        }

        /* nome do pedido (texto do pedido) em amarelo */
        .pedido-item > span:first-child{
            color:var(--highlight);
            font-weight:700;
        }

        /* status badges (mantidos com legibilidade) */
        .status{
            font-weight:600;
            padding:6px 10px;
            border-radius:999px;
            font-size:0.85rem;
            background: rgba(255,255,255,0.85);
            color: var(--card-text);
            border:1px solid rgba(0,0,0,0.06);
        }

        .status.preparing{
            background:rgba(239,68,68,0.12);
            color:#b91c1c;
            border:1px solid rgba(239,68,68,0.18);
        }

        .status.ready{
            background:rgba(34,197,94,0.12);
            color:#065f46;
            border:1px solid rgba(34,197,94,0.18);
        }

        /* vazio */
        .empty{
            color:rgba(11,18,32,0.7);
            margin:14px 0 20px 0;
        }

        /* botão link - Voltar: fundo amarelo e texto branco */
        .btn{
            display:inline-block;
            text-decoration:none;
            background:var(--highlight);
            color:black;
            padding:10px 16px;
            border-radius:15px;
            font-weight:600;
            transition:transform 0.12s ease, box-shadow 0.12s ease;
            box-shadow: 0 6px 18px rgba(0,0,0,0.28);
            border: none;
        }

        .btn:hover{
            transform:translateY(-3px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.32);
        }

        @media (max-width:480px){
            .container{ padding:18px; border-radius:10px;}
            .pedido-item{ font-size:0.95rem; padding:10px; }
            .btn{ width:100%; text-align:center; }
        }
    </style>
</head>

<body>
    
    <div class="container">
        <h1>Pedidos de <?= htmlspecialchars($usuario['nome']) ?></h1>
        <div class="meta">Aqui estão seus pedidos recentes</div>

        <?php if (!empty($pedidos)): ?>
            <ul class="pedidos-list">
                <?php
                // Supondo que os pedidos estejam separados por vírgula
                $listaPedidos = explode(',', $pedidos);
                foreach ($listaPedidos as $pedido): 
                    $texto = htmlspecialchars(trim($pedido));
                    $isPreparing = isset($_SESSION['status']) && $_SESSION['status'] === 'Preparando';
                ?>
                    <li class="pedido-item">
                        <span><?= $texto ?></span>
                        <span class="status <?= $isPreparing ? 'preparing' : 'ready' ?>">
                            <?= $isPreparing ? '🔴 Preparando' : '🟢 Pronto' ?>
                        </span>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="empty">Você ainda não realizou nenhum pedido.</p>
        <?php endif; ?>

        <a class="btn" href="paginainicio.php">Voltar</a>
    </div>

<?php
if (isset($_SESSION['status']) && $_SESSION['status'] === 'Preparando'):
    ?>
    <script>
    // Depois de 10 segundos (10000 ms) envia para historico
    setTimeout(() => {
        window.location.href = "processo.php?id=<?= intval($usuario['id']); ?>";
    }, 10000);
    </script>
<?php
endif;
?>
</body>
</html>

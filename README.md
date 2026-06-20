# ReidoX (PHP + MySQL) — Sistema de Loja, Carrinho e Pedidos

## Visão geral
O **ReidoX** é um sistema web (PHP) com uma estrutura simples em **MVC** (Controllers/Models/DB), usado para:
- Login de usuários (clientes) e acesso a área administrativa.
- Cadastro e gestão de usuários e produtos (painel `admin.php`).
- Navegação por página inicial e seleção de produtos.
- **Carrinho** via sessão.
- Finalização do pedido e exibição de **pedidos do usuário**.
- Controle básico de status do pedido (ex.: “Preparando” → “Pronto”).

> Observação: as senhas estão sendo tratadas como **texto plano** em partes do código (o que é funcional para projeto didático, mas inseguro para produção).

---

## Requisitos
- **Windows + XAMPP** (Apache + PHP + MySQL)
- **PHP 8.2+** (no seu ambiente aparece PHP 8.2.12)
- **MySQL/MariaDB**
- Extensões PHP:
  - `pdo`
  - `pdo_mysql`

---

## Configuração do banco de dados
1. Abra o arquivo do dump:
   - `mysql/db_reidox.sql`
2. Importe o dump no phpMyAdmin criando/selecionando o banco **`db_reidox`**.
3. Garanta que a conexão no projeto está compatível com o seu MySQL.
   - Arquivo: `DB/Database.php`
   - DDL esperado (tabelas principais):
     - `clientes`
     - `produtos`
     - `historico`

### Conexão (PDO)
O projeto usa `PDO` com DSN do tipo:
- `mysql:host=localhost;dbname=db_reidox;charset=utf8`

Se seu MySQL estiver com outros dados (usuário/senha), ajuste `DB/Database.php`.

---

## Como rodar no XAMPP
1. Copie/garanta a pasta do projeto em:
   - `C:/xampp/htdocs/ReidoX`
2. Inicie no XAMPP:
   - Apache
   - MySQL
3. Acesse no navegador:
   - `http://localhost/ReidoX/index.php`

---

## Estrutura do projeto (pastas e responsabilidades)
- **Raiz** (páginas PHP)
  - `index.php` — tela de login
  - `cadastro.php` — cadastro de cliente
  - `admin.php` — painel administrativo (usuários + produtos)
  - `carrinho.php` — carrinho (sessão)
  - `pedidos.php` — exibição de pedidos do usuário
  - `paginainicio.php`, `produto.php`, `endereco.php`, etc. (fluxos de telas)
  - `processar_*.php`, `deletar.php`, `logout.php`, etc. (ações)

- **Controller/**
  - `UsuarioController.php` — lógica de login/CRUD e criação automática do admin

- **Model/**
  - `UsuarioModel.php` — operações no banco para clientes/probáveis utilitários (ex.: produtos)

- **DB/**
  - `Database.php` — cria a conexão PDO

- **mysql/**
  - `db_reidox.sql` — dump com estrutura e dados iniciais

- **img/** e **Escolha/**
  - recursos/imagens e categorias visuais

---

## Fluxos principais

### 1) Cadastro (`cadastro.php`)
- Formulário envia `nome`, `email`, `senha`, `senhaconfirm`.
- Valida se as senhas batem.
- Chama o controller:
  - `UsuarioController->cadastrar(..., $cargo='cliente')`
- Após cadastro:
  - salva sessão (`id_usuario`, `nome_usuario`)
  - redireciona para `endereco.php?id=...`.

### 2) Login (`index.php`)
- Envia `email` e `senha`.
- O controller faz:
  - busca do usuário em `clientes` por e-mail
  - compara senha em texto plano
- Se o usuário existir:
  - cria sessão com `nome_usuario`, `id_usuario`, `email`, `cargo`
  - redireciona por cargo:
    - `admin`, `chapeiro` ou e-mail específico → `admin.php`
    - caso contrário → `verificar.php` que leva para `paginainicio.php`.

### 3) Área administrativa (`admin.php`)
- `admin.php` verifica permissão:
  - se `$_SESSION['cargo']` não for `admin` nem `chapeiro` → nega acesso.
- Exibe:
  - tabela de clientes (nome, email, senha, pedidos, telefone, rua, número, cargo)
  - formulário para criar usuário
  - tabela e formulário para adicionar/excluir produtos

Operações acionadas por páginas de ação:
- `processar_usuario.php`
- `editar_usuarioadmin.php`
- `deletar.php`
- `processar_produto.php`
- `editar_produto.php`

### 4) Carrinho (`carrinho.php`) — sessão
- O carrinho é armazenado em `$_SESSION['carrinho']`.
- Funcionalidades:
  - adicionar item (incrementa `quantidade`)
    - rota usada: `processo`/ação que recebe `produto_id`, `produto_nome`, `produto_preco` (ex.: `processar_carrinho.php`)
  - atualizar quantidades (envia `quantidades[...]` e recarrega)
  - remover item via `carrinho.php?remover=ID`
  - limpar carrinho via `carrinho.php?limpar=1`
- Finalização:
  - botão “Finalizar Compra” envia:
    - `pagamento` (select)
    - `entrega` (radio)
  - monta uma string com itens e metadados do pedido
  - chama método do model para persistir o pedido no usuário
  - define `$_SESSION['status_pedido']='Preparando'`
  - limpa o carrinho e redireciona para `pedidos.php`.

### 5) Pedidos (`pedidos.php`)
- Carrega usuário via sessão (`id_usuario`).
- Lê `pedidos` salvo em `clientes` e faz parse da string usando `|` e `,`.
- Mostra lista do pedido e informações:
  - Total
  - Pagamento
  - Entrega
- Controle de status:
  - se `$_SESSION['status_pedido'] == 'Preparando'`:
    - após um tempo, troca a badge para “Pronto”
    - chama `processo.php` (AJAX) para limpar/registrar estado.

---

## Arquitetura MVC (como está aplicado)
- **DB**: `Database.php` provê `$pdo`.
- **Model**: `Model/UsuarioModel.php` concentra acesso ao banco.
- **Controller**: `Controller/UsuarioController.php` contém regras e orquestra ações do model.
- **Views (páginas)**: as páginas PHP na raiz renderizam HTML e chamam controllers/models conforme necessário.

> Observação: existem páginas que não seguem rigorosamente uma separação 100% “View vs Controller”, pois a aplicação mistura HTML e lógica em algumas rotas. Ainda assim, há separação funcional via Controller/Model para as operações de dados.

---

## Observações de segurança e melhorias sugeridas (didático)
1. **Senha em texto plano**: trocar por hash (ex.: `password_hash` / `password_verify`).
2. **SQL e validações**: garantir validação/escape e uso consistente de prepared statements.
3. **Armazenamento de pedidos**:
   - hoje o pedido é armazenado como uma *string formatada* em `clientes.pedidos`.
   - melhoria: criar tabelas normalizadas (ex.: `pedidos`, `pedido_itens`, `pagamentos`, etc.).

---

## Credenciais admin (projeto)
O controller cria automaticamente um admin caso não exista:
- e-mail: `admin@hotmail.com`
- senha: `123`
- nome: `admin`
- cargo: `admin`

---

## Contato/Documentação adicional
- Arquivo SQL e estrutura base: `mysql/db_reidox.sql`
- Observações gerais do projeto podem estar em `Documentação.docx`.


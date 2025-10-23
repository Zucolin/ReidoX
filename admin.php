<?php

require_once "DB/Database.php";
require_once "Controller/UsuarioController.php";

$usuarioController = new UsuarioController($pdo);

$usuarios = $usuarioController->listar();


if(empty($usuarios)){
    echo "<p>Nenhum usuário encontrado!</p>";
    echo "<a href='cadastro.php'>Cadastrar</a>";
    return;
}
echo" <a class='del' href='index.php'>Voltar</a>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";

echo "<tr><th>ID</th><th>Nome</th><th>E-mail</th><th>Senha</th><th>Pedidos</th><th>Endereço</th><th>Ações</th></tr>";

foreach($usuarios as $usuario){
    $id = $usuario['id'];
    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$usuario['nome']}</td>";
    echo "<td>{$usuario['email']}</td>";
    echo "<td>{$usuario['senha']}</td>";
    echo "<td>{$usuario['pedidos']}</td>";
    echo "<td>{$usuario['endereco']}</td>";
    echo "<td>
        
        <a class='del' href='deletar.php?id={$id}' onclick=\"return confirm('Tem certeza que deseja excluir o usuário?')\">Deletar</a>
    </td>";
    echo "</tr>";

}

echo "</table>";
?>

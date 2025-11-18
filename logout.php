<?php
session_start(); // Inicia a sessão para poder destruí-la
session_unset(); // Remove todas as variáveis da sessão
session_destroy(); // Destrói a sessão
header("Location: index.php"); // Redireciona para a página de login
exit();
?>

<?php

class Verificar
{
    /**
     * Simula a verificação de um usuário, armazena seus dados na sessão e redireciona.
     * Em um caso real, $dadosUsuario viria de uma consulta ao banco de dados.
     * 
     * @param array $dadosUsuario Dados do usuário, como ['id' => 1, 'nome' => 'John Doe']
     */
    public function Usuariopermitido($dadosUsuario)
    {
        if (!empty($dadosUsuario) && isset($dadosUsuario['id']) && isset($dadosUsuario['nome'])) {
            $_SESSION['id_usuario'] = $dadosUsuario['id'];
            $_SESSION['nome_usuario'] = $dadosUsuario['nome'];
            header('Location: paginainicio.php');
            exit;
        } else {
            // Se os dados não forem válidos, redireciona para o login
            header('Location: index.php?erro=login_invalido');
            exit;
        }
    }
}
?>
<?php
class Verificar
{
    public function Usuariopermitido($permitido)
    {
        if ($permitido === true) {
            header('Location: paginainicio.php');
            exit;
        }
    }
}
?>
<?php
            if(empty($pagamentos)){
                echo "<p>Nenhum pagamento encontrado!</p>";
                echo "<a href='View/Pagamento/cadastrar.php'>Cadastrar</a>";
                return;
            }
            echo "<table border='1' cellpadding='5' cellspacing='0'>";
            echo "<tr><td><a href='View/pagamento/cadastrar.php'>Cadastrar</a><td><tr>";
            echo "<tr><th>ID</th><th>Nome</th><th>Tipo</th><th>Ações</th></tr>";

            foreach($pagamentos as $pagamento){
                $id = $pagamento['id'];
                echo "<tr>";
                echo "<td>{$id}</td>";
                echo "<td>{$pagamento['nome']}</td>";
                echo "<td>{$pagamento['tipo']}</td>";
                echo "<td>
                    <a href='View/Pagamento/editar.php?id={$id}'>Editar</a> |
                    <a class='del' href='View/Pagamento/deletar.php?id={$id}' onclick=\"return confirm('Tem certeza que deseja excluir o elemento?')\">Deletar</a>
                    </td>";
                    echo "</tr>";
            }
            echo "</table";
?>
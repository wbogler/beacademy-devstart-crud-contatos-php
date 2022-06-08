<h1>Lista de Contatos</h1>
<br>

<table class="table table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">Telefone</th>
            <th scope="col">Excluir</th>
        </tr>
        <?php
        foreach($contatos as $posicao=>$cadaContato){
            $partes = explode(";", $cadaContato);
            echo "<tr>";
                echo '<th scope="row">'. $partes[0] .'</th>';
                echo '<td>'. $partes[1] .'</td>';
                echo '<td>'. $partes[2] .'</td>';
                echo "<td><a href='/excluir?id={$posicao}' class='btn btn-danger btn-sm'>Excluir</a></td>";
            echo "</tr>";
        }
        ?>
    </thead>
    
</table>
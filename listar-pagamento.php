<h1>Lista de Pagamentos</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Paciente</th>
            <th>Consulta</th>
            <th>Valor</th>
            <th>Data</th>
            <th>Método</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql = "SELECT pa.id_pagamento, p.nome_paciente, c.id_consulta, pa.valor_pagamento, pa.data_pagamento, pa.metodo_pagamento 
                    FROM pagamento pa 
                    JOIN paciente p ON pa.id_paciente = p.id_paciente 
                    JOIN consulta c ON pa.id_consulta = c.id_consulta";
            $res = $conn->query($sql);

            if ($res->num_rows > 0) {
                while ($row = $res->fetch_object()) {
                    echo "<tr>";
                    echo "<td>" . $row->nome_paciente . "</td>";
                    echo "<td>" . $row->id_consulta . "</td>";
                    echo "<td>" . $row->valor_pagamento . "</td>";
                    echo "<td>" . $row->data_pagamento . "</td>";
                    echo "<td>" . $row->metodo_pagamento . "</td>";
                    echo "<td>
                            <button class='btn btn-success' onclick=\"location.href='?page=editar-pagamento&id_pagamento=" . $row->id_pagamento . "';\">Editar</button>
                            <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-pagamento&acao=excluir&id_pagamento=" . $row->id_pagamento . "';}else{false;}\">Excluir</button>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nenhum pagamento encontrado</td></tr>";
            }
        ?>
    </tbody>
</table>

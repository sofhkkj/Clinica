<h1>Listar Prescrição</h1>

<?php
    $sql = "SELECT p.id_prescricao, p.data, p.instrucoes, p.medicamentos, p.dosagem, p.data_validade, 
        pa.nome_paciente, m.nome_medico
        FROM prescricoes AS p
        INNER JOIN paciente AS pa ON pa.id_paciente = p.id_paciente
        INNER JOIN medico AS m ON m.id_medico = p.id_medico";

    $res = $conn->query($sql);

    $qtd = $res->num_rows;

    if ($qtd > 0) {
        print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";

        print "<table class='table table-bordered table-striped table-hover'>";
        print "<tr>";
        print "<th>#</th>";
        print "<th>Paciente</th>";
        print "<th>Médico</th>";
        print "<th>Data</th>";
        print "<th>Medicamentos</th>";
        print "<th>Dosagem</th>";
        print "<th>Data de validade</th>";
        print "<th>Instruções</th>";
        print "<th>Ações</th>";
        print "</tr>";

        while ($row = $res->fetch_object()) {
            print "<tr>";
            print "<td>".$row->id_prescricao."</td>"; 
            print "<td>".$row->nome_paciente."</td>";
            print "<td>".$row->nome_medico."</td>";
            print "<td>".$row->data."</td>";
            print "<td>".$row->medicamentos."</td>";
            print "<td>".$row->dosagem."</td>";
            print "<td>".$row->data_validade."</td>";
            print "<td>".$row->instrucoes."</td>";
            print "<td>
                <button class='btn btn-success' onclick=\"location.href='?page=editar-prescricao&id_prescricao=".$row->id_prescricao."';\">Editar</button>
                <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-prescricao&acao=excluir&id_prescricao=".$row->id_prescricao."';}else{false;}\">Excluir</button>
            </td>";
            print "</tr>";
        }
        print "</table>";

    } else {
        print "Não encontrou resultado";
    }
?>

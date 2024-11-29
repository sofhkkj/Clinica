<h1>Editar Prescrição</h1>
<?php
    $sql = "SELECT * FROM prescricoes AS p
            INNER JOIN paciente AS pa ON pa.id_paciente = p.id_paciente
            INNER JOIN medico AS m ON m.id_medico = p.id_medico
            WHERE p.id_prescricao=".$_REQUEST['id_prescricao'];

    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        $row = $res->fetch_object();
    } else {
        echo "Prescrição não encontrada.";
        exit;
    }
?>

<form action="?page=salvar-prescricao" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_prescricao" value="<?php print $row->id_prescricao; ?>">

    <div class="mb-3">
        <label>Paciente</label>
        <select name="paciente_id_paciente" class="form-control" required>
            <option>-= Escolha o Paciente =-</option>
        <?php
            $sql_1 = "SELECT * FROM paciente";
            $res_1 = $conn->query($sql_1);
            if ($res_1->num_rows > 0) {
                while ($row_1 = $res_1->fetch_object()) {
                    if ($row_1->id_paciente == $row->id_paciente) {
                        print "<option value='".$row_1->id_paciente."' selected>".$row_1->nome_paciente."</option>";
                    } else {
                        print "<option value='".$row_1->id_paciente."'>".$row_1->nome_paciente."</option>";
                    }
                }
            } else {
                print "<option>Não há pacientes cadastrados</option>";
            }
        ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Médico</label>
        <select name="medico_id_medico" class="form-control" required>
            <option>-= Escolha o Médico =-</option>
        <?php
            $sql_2 = "SELECT * FROM medico";
            $res_2 = $conn->query($sql_2);
            if ($res_2->num_rows > 0) {
                while ($row_2 = $res_2->fetch_object()) {
                    if ($row_2->id_medico == $row->id_medico) {
                        print "<option value='".$row_2->id_medico."' selected>".$row_2->nome_medico."</option>";
                    } else {
                        print "<option value='".$row_2->id_medico."'>".$row_2->nome_medico."</option>";
                    }
                }
            } else {
                print "<option>Não há médicos cadastrados</option>";
            }
        ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Data</label>
        <input type="date" name="data_prescricao" class="form-control" required value="<?php print $row->data; ?>">
    </div>

    <div class="mb-3">
        <label>Remedio</label>
        <input type="name" name="medicamentos" class="form-control" required value="<?php print $row->medicamentos; ?>">
    </div>
    <div class="mb-3">
        <label>Dosagem</label>
        <input type="name" name="dosagem" class="form-control" required value="<?php print $row->dosagem; ?>">
    </div>

    <div class="mb-3">
        <label>Data de validade</label>
        <input type="date" name="data_validade" class="form-control" required value="<?php print $row->data_validade; ?>">
    </div>

    <div class="mb-3">
        <label>Instruções</label>
        <textarea name="instrucoes_prescricao" class="form-control" required><?php print $row->instrucoes; ?></textarea>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-success">Salvar</button>
    </div>
</form>

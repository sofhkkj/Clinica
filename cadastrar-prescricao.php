<h1>Cadastrar Prescrição</h1>
<form action="?page=salvar-prescricao" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    
    <div class="mb-3">
        <label>Paciente</label>
        <select name="paciente_id_paciente" class="form-control" required>
            <option value="">-= Escolha o Paciente =-</option>
            <?php
                $sql_1 = "SELECT * FROM paciente";
                $res_1 = $conn->query($sql_1);
                if ($res_1->num_rows > 0) {
                    while ($row_1 = $res_1->fetch_object()) {
                        echo "<option value='" . $row_1->id_paciente . "'>" . $row_1->nome_paciente . "</option>";
                    }
                } else {
                    echo "<option value=''>Não há pacientes cadastrados</option>";
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Médico</label>
        <select name="medico_id_medico" class="form-control" required>
            <option value="">-= Escolha o Médico =-</option>
            <?php
                $sql_2 = "SELECT * FROM medico";
                $res_2 = $conn->query($sql_2);
                if ($res_2->num_rows > 0) {
                    while ($row_2 = $res_2->fetch_object()) {
                        echo "<option value='" . $row_2->id_medico . "'>" . $row_2->nome_medico . "</option>";
                    }
                } else {
                    echo "<option value=''>Não há médicos cadastrados</option>";
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Data</label>
        <input type="date" name="data_prescricao" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Remedio</label>
        <input type="name" name="medicamentos" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Dosagem</label>
        <input type="name" name="dosagem" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Data de validade</label>
        <input type="date" name="data_validade" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Instruções</label>
        <textarea name="instrucoes_prescricao" class="form-control" required></textarea>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-success">Salvar</button>
    </div>
</form>
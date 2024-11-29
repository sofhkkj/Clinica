<h1>Cadastrar Pagamento</h1>
<form action="?page=salvar-pagamento" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    
    <!-- Campo Paciente -->
    <div class="mb-3">
        <label>Paciente</label>
        <select name="id_paciente" class="form-control" required>
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

    <!-- Campo Consulta -->
    <div class="mb-3">
        <label>Consulta</label>
        <select name="id_consulta" class="form-control" required>
            <option value="">-= Escolha a Consulta =-</option>
            <?php
                $sql_2 = "SELECT * FROM consulta";
                $res_2 = $conn->query($sql_2);
                if ($res_2->num_rows > 0) {
                    while ($row_2 = $res_2->fetch_object()) {
                        echo "<option value='" . $row_2->id_consulta . "'>Consulta " . $row_2->id_consulta . "</option>";
                    }
                } else {
                    echo "<option value=''>Não há consultas cadastradas</option>";
                }
            ?>
        </select>
    </div>

    <!-- Campo Valor do Pagamento -->
    <div class="mb-3">
        <label for="valor_pagamento">Valor do Pagamento</label>
        <input type="number" name="valor_pagamento" class="form-control" step="0.01" required>
    </div>
    
    <!-- Campo Data do Pagamento -->
    <div class="mb-3">
        <label for="data_pagamento">Data do Pagamento</label>
        <input type="date" name="data_pagamento" class="form-control" required>
    </div>

    <!-- Campo Método de Pagamento -->
    <div class="mb-3">
        <label for="metodo_pagamento">Método de Pagamento</label>
        <select name="metodo_pagamento" class="form-control" required>
            <option value="">-= Escolha o Método =-</option>
            <option value="Cartão de Crédito">Cartão de Crédito</option>
            <option value="Dinheiro">Dinheiro</option>
            <option value="Transferência Bancária">Transferência Bancária</option>
            <option value="PIX">PIX</option>
        </select>
    </div>

    <div class="mb-3">
        <button class="btn btn-success" type="submit">Salvar</button>
    </div>
</form>

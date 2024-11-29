<h1>Editar Pagamento</h1>
<?php
    // Consultando o pagamento com base no ID fornecido
    $sql = "SELECT * FROM pagamento AS pa
            INNER JOIN paciente AS p ON p.id_paciente = pa.id_paciente
            INNER JOIN consulta AS c ON c.id_consulta = pa.id_consulta
            WHERE pa.id_pagamento = ".$_REQUEST['id_pagamento'];

    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        $row = $res->fetch_object();
    } else {
        echo "Pagamento não encontrado.";
        exit;
    }
?>

<form action="?page=salvar-pagamento" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_pagamento" value="<?php print $row->id_pagamento; ?>">

    <div class="mb-3">
        <label>Paciente</label>
        <select name="id_paciente" class="form-control" required>
            <option>-= Escolha o Paciente =-</option>
        <?php
            // Consultando todos os pacientes cadastrados
            $sql_1 = "SELECT * FROM paciente";
            $res_1 = $conn->query($sql_1);
            if ($res_1->num_rows > 0) {
                while ($row_1 = $res_1->fetch_object()) {
                    // Selecionando o paciente atual com base no ID
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
        <label>Consulta</label>
        <select name="id_consulta" class="form-control" required>
            <option>-= Escolha a Consulta =-</option>
        <?php
            // Consultando todas as consultas relacionadas ao paciente
            $sql_2 = "SELECT * FROM consulta WHERE id_paciente = ".$row->id_paciente;
            $res_2 = $conn->query($sql_2);
            if ($res_2->num_rows > 0) {
                while ($row_2 = $res_2->fetch_object()) {
                    // Selecionando a consulta atual com base no ID
                    if ($row_2->id_consulta == $row->id_consulta) {
                        print "<option value='".$row_2->id_consulta."' selected>".$row_2->id_consulta."</option>";
                    } else {
                        print "<option value='".$row_2->id_consulta."'>".$row_2->id_consulta."</option>";
                    }
                }
            } else {
                print "<option>Não há consultas cadastradas para este paciente</option>";
            }
        ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="valor_pagamento">Valor do Pagamento</label>
        <input type="number" name="valor_pagamento" class="form-control" step="0.01" required value="<?php print $row->valor_pagamento; ?>">
    </div>
    
    <div class="mb-3">
        <label for="data_pagamento">Data do Pagamento</label>
        <input type="date" name="data_pagamento" class="form-control" required value="<?php print $row->data_pagamento; ?>">
    </div>

    <div class="mb-3">
        <label for="metodo_pagamento">Método de Pagamento</label>
        <select name="metodo_pagamento" class="form-control" required>
            <option value="">-= Escolha o Método =-</option>
            <option value="Cartão de Crédito" <?php if($row->metodo_pagamento == 'Cartão de Crédito') echo 'selected'; ?>>Cartão de Crédito</option>
            <option value="Dinheiro" <?php if($row->metodo_pagamento == 'Dinheiro') echo 'selected'; ?>>Dinheiro</option>
            <option value="Transferência Bancária" <?php if($row->metodo_pagamento == 'Transferência Bancária') echo 'selected'; ?>>Transferência Bancária</option>
            <option value="PIX" <?php if($row->metodo_pagamento == 'PIX') echo 'selected'; ?>>PIX</option>
        </select>
    </div>

    <div class="mb-3">
        <button class="btn btn-success" type="submit">Salvar</button>
    </div>
</form>

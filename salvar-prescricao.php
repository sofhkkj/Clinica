<?php
switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $paciente = $_POST['paciente_id_paciente'];
        $medico = $_POST['medico_id_medico'];
        $data = $_POST['data_prescricao'];
        $instrucoes = $_POST['instrucoes_prescricao'];
        $medicamentos = $_POST['medicamentos']; 
        $dosagem = $_POST['dosagem']; 
        $data_validade = $_POST['data_validade']; 

        $sql = "INSERT INTO prescricoes (id_paciente, id_medico, data, instrucoes, medicamentos, dosagem, data_validade) 
                VALUES ('{$paciente}', '{$medico}', '{$data}', '{$instrucoes}', '{$medicamentos}', '{$dosagem}', '{$data_validade}')";

        $res = $conn->query($sql);

       
        if ($res == true) {
            print "<script>alert('Prescrição cadastrada com sucesso!');</script>";
            print "<script>location.href='?page=listar-prescricao';</script>";  } else {
            print "<script>alert('Erro ao cadastrar prescrição!');</script>";
            print "<script>location.href='?page=listar-prescricao';</script>"; 
        }
        break;
    
    case 'editar':
        
        $paciente = $_POST['paciente_id_paciente'];
        $medico = $_POST['medico_id_medico'];
        $data = $_POST['data_prescricao'];
        $instrucoes = $_POST['instrucoes_prescricao'];
        $medicamentos = $_POST['medicamentos'];  
        $dosagem = $_POST['dosagem'];  
        $data_validade = $_POST['data_validade'];  

        $sql = "UPDATE prescricoes SET
        id_paciente='{$paciente}', 
        id_medico='{$medico}', 
        data='{$data}', 
        instrucoes='{$instrucoes}',
        medicamentos='{$medicamentos}',  
        dosagem='{$dosagem}',  
        data_validade='{$data_validade}' 
    WHERE
        id_prescricao=" . $_REQUEST["id_prescricao"];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Prescrição editada com sucesso!');</script>";
            print "<script>location.href='?page=listar-prescricao';</script>"; 
        } else {
            print "<script>alert('Erro ao editar prescrição!');</script>";
            print "<script>location.href='?page=listar-prescricao';</script>";       }
        break;

    case 'excluir':
        $sql = "DELETE FROM prescricoes
					WHERE id_prescricao=".$_REQUEST["id_prescricao"]; 

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Prescrição excluída com sucesso!');</script>";
            print "<script>location.href='?page=listar-prescricao';</script>"; 
        } else {
            print "<script>alert('Erro ao excluir prescrição!');</script>";
            print "<script>location.href='?page=listar-prescricao';</script>";       }
        break;
}
?>

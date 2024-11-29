<?php
switch ($_REQUEST['acao']) {
    case 'cadastrar':
        // Captura os dados do formulário
        $paciente = $_POST['id_paciente'];
        $consulta = $_POST['id_consulta'];
        $valor_pagamento = $_POST['valor_pagamento'];
        $data_pagamento = $_POST['data_pagamento'];
        $metodo_pagamento = $_POST['metodo_pagamento'];

        // Verifica se as variáveis não estão vazias
        if (empty($paciente) || empty($consulta) || empty($valor_pagamento) || empty($data_pagamento) || empty($metodo_pagamento)) {
            echo "<script>alert('Preencha todos os campos!');</script>";
            echo "<script>location.href='?page=cadastrar-pagamento';</script>";
            exit;
        }

        // Insere os dados na tabela 'pagamento'
        $sql = "INSERT INTO pagamento (
                    id_paciente,
                    id_consulta,
                    valor_pagamento,
                    data_pagamento,
                    metodo_pagamento)
                VALUES (
                    '{$paciente}',
                    '{$consulta}',
                    '{$valor_pagamento}',
                    '{$data_pagamento}',
                    '{$metodo_pagamento}')";

        // Executa a consulta no banco
        $res = $conn->query($sql);

        if ($res == true) {
            echo "<script>alert('Pagamento cadastrado com sucesso!');</script>";
            echo "<script>location.href='?page=listar-pagamento';</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar pagamento: " . $conn->error . "');</script>";
            echo "<script>location.href='?page=cadastrar-pagamento';</script>";
        }
        break;
        case 'editar':
            $paciente = $_POST['id_paciente'];
            $consulta = $_POST['id_consulta'];
            $valor_pagamento = $_POST['valor_pagamento'];
            $data_pagamento = $_POST['data_pagamento'];
            $metodo_pagamento = $_POST['metodo_pagamento'];
    
            // Atualiza o pagamento com base no id_pagamento
            $sql = "UPDATE pagamento SET
                        id_paciente='{$paciente}', 
                        id_consulta='{$consulta}', 
                        valor_pagamento='{$valor_pagamento}', 
                        data_pagamento='{$data_pagamento}', 
                        metodo_pagamento='{$metodo_pagamento}'
                    WHERE
                        id_pagamento=" . $_REQUEST["id_pagamento"];
    
            $res = $conn->query($sql);
    
            if ($res == true) {
                print "<script>alert('Pagamento editado com sucesso!');</script>";
                print "<script>location.href='?page=listar-pagamento';</script>";
            } else {
                print "<script>alert('Erro ao editar pagamento!');</script>";
                print "<script>location.href='?page=listar-pagamento';</script>";
            }
            break;
    
        case 'excluir':
            // Exclui o pagamento com base no id_pagamento
            $sql = "DELETE FROM pagamento
                    WHERE id_pagamento=" . $_REQUEST["id_pagamento"];
    
            $res = $conn->query($sql);
    
            if ($res == true) {
                print "<script>alert('Pagamento excluído com sucesso!');</script>";
                print "<script>location.href='?page=listar-pagamento';</script>";
            } else {
                print "<script>alert('Erro ao excluir pagamento!');</script>";
                print "<script>location.href='?page=listar-pagamento';</script>";
            }
            break;
    }
?>

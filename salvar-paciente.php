<?php
	switch ($_REQUEST['acao']) {
		case 'cadastrar':
			$nome = $_POST['nome_paciente'];
			$email = $_POST['email_paciente'];
			$endereco = $_POST['endereco_paciente'];
			$cpf = $_POST['cpf_paciente'];
			$data = $_POST['dt_nasc_paciente'];
			$sexo = $_POST['sexo_paciente'];

			$sql = "INSERT INTO paciente (
						nome_paciente,
						cpf_paciente,
						email_paciente,
						dt_nasc_paciente,
						endereco_paciente,
						sexo_paciente) 
					VALUES (
						'{$nome}',
						'{$cpf}',
						'{$email}',
						'{$data}',
						'{$endereco}',
						'{$sexo}' )";
			
			$res = $conn->query($sql);
			if($res==true){
				print "<script>alert('Cadastrou com sucesso!');</script>";
				print "<script>location.href='?page=listar-paciente';</script>";
			}else{
				print "<script>alert('Deu errado');</script>";
				print "<script>location.href='?page=listar-paciente';</script>";
			}
			break;
		
		case 'editar':
			$nome = $_POST['nome_paciente'];
			$email = $_POST['email_paciente'];
			$endereco = $_POST['endereco_paciente'];
			$cpf = $_POST['cpf_paciente'];
			$data = $_POST['dt_nasc_paciente'];
			$sexo = $_POST['sexo_paciente'];

			$sql = "UPDATE paciente SET
						nome_paciente='{$nome}',
						cpf_paciente='{$cpf}',
						email_paciente='{$email}',
						dt_nasc_paciente='{$data}',
						endereco_paciente='{$endereco}',
						sexo_paciente='{$sexo}'
					WHERE id_paciente=".$_REQUEST['id_paciente'];

			$res = $conn->query($sql);

			if($res==true){
				print "<script>alert('Editou com sucesso!');</script>";
				print "<script>location.href='?page=listar-paciente';</script>";
			}else{
				print "<script>alert('Deu errado');</script>";
				print "<script>location.href='?page=listar-paciente';</script>";
			}
			break;

		case 'excluir':
			$sql = "DELETE FROM paciente
					WHERE id_paciente=".$_REQUEST['id_paciente'];

			$res = $conn->query($sql);

			if($res==true){
				print "<script>alert('Excluiu com sucesso!');</script>";
				print "<script>location.href='?page=listar-paciente';</script>";
			}else{
				print "<script>alert('Deu errado');</script>";
				print "<script>location.href='?page=listar-paciente';</script>";
			}
			break;
	}
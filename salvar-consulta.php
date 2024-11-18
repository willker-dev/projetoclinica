<?php
switch($_REQUEST["acao"]){
    case 'cadastrar':
        // Receber os dados do formulário
        $id_medico = $_POST['nome_medico'];   // ID do médico (selecionado na lista)
        $id_paciente = $_POST['nome_paciente']; // ID do paciente (selecionado na lista)
        $tipo_consulta = $_POST['tipo_consulta']; // Tipo de consulta
        $data_consulta = $_POST['data_consulta']; // Data e hora da consulta

        // Inserir os dados no banco de dados
        $sql = "INSERT INTO consulta (
                    id_medico, 
                    id_paciente, 
                    tipo_consulta, 
                    data_consulta
                ) 
                VALUES (
                    '{$id_medico}',
                    '{$id_paciente}',
                    '{$tipo_consulta}',
                    '{$data_consulta}'
                )";

        // Executar a consulta
        $res = $conn->query($sql);

        if ($res == true) {
            // Se a consulta for inserida com sucesso
            print "<script>alert('Consulta cadastrada com sucesso!');</script>";
            print "<script>location.href='?page=listar-consulta';</script>";
        } else {
            // Se houve erro na execução da consulta
            print "<script>alert('Não foi possível cadastrar a consulta.');</script>";
            print "<script>location.href='?page=listar-consulta';</script>";
        }
    break;

    case 'editar':
        // Receber os dados do formulário
        $id_consulta = $_POST['id_consulta'];
        $id_medico = $_POST['nome_medico'];   // ID do médico (selecionado na lista)
        $id_paciente = $_POST['nome_paciente']; // ID do paciente (selecionado na lista)
        $tipo_consulta = $_POST['tipo_consulta']; // Tipo de consulta
        $data_consulta = $_POST['data_consulta']; // Data e hora da consulta

        // Atualizar os dados da consulta no banco de dados
        $sql = "UPDATE consulta SET
                    id_medico = '{$id_medico}',
                    id_paciente = '{$id_paciente}',
                    tipo_consulta = '{$tipo_consulta}',
                    data_consulta = '{$data_consulta}'
                WHERE id_consulta = {$id_consulta}";

        // Executar a consulta
        $res = $conn->query($sql);

        if ($res == true) {
            // Se a consulta for atualizada com sucesso
            print "<script>alert('Consulta editada com sucesso!');</script>";
            print "<script>location.href='?page=listar-consulta';</script>";
        } else {
            // Se houve erro na execução da consulta
            print "<script>alert('Não foi possível editar a consulta.');</script>";
            print "<script>location.href='?page=listar-consulta';</script>";
        }
    break;

    case 'excluir':
        // Receber o ID da consulta a ser excluída
        $id_consulta = $_REQUEST['id_consulta'];

        // Deletar a consulta do banco de dados
        $sql = "DELETE FROM consulta WHERE id_consulta = {$id_consulta}";

        // Executar a consulta
        $res = $conn->query($sql);

        if ($res == true) {
            // Se a consulta for excluída com sucesso
            print "<script>alert('Consulta excluída com sucesso!');</script>";
            print "<script>location.href='?page=listar-consulta';</script>";
        } else {
            // Se houve erro na execução da consulta
            print "<script>alert('Não foi possível excluir a consulta.');</script>";
            print "<script>location.href='?page=listar-consulta';</script>";
        }
    break;
}
?>

<?php
switch($_REQUEST["acao"]){
    case 'cadastrar':

        $nome = $_POST['nome_medico'];
        $crm = $_POST['crm_medico'];
        $especialidade = $_POST['especialidade_medico'];
        $situacao = 'Ativo'; 

        $sql = "INSERT INTO medico (nome_medico, crm_medico, especialidade_medico, situacao)
                VALUES ('{$nome}', '{$crm}', '{$especialidade}', '{$situacao}')";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastrou com sucesso!');</script>";
            print "<script>location.href='?page=listar-medico';</script>";
        } else {
            print "<script>alert('Não foi possível cadastrar!');</script>";
            print "<script>location.href='?page=listar-medico';</script>";
        }
    break;

    case 'editar':

        $id_medico = $_POST['id_medico'];
        $nome = $_POST['nome_medico'];
        $crm = $_POST['crm_medico'];
        $especialidade = $_POST['especialidade_medico'];
        $situacao = $_POST['situacao']; 

        $sql = "UPDATE medico SET
                    nome_medico = '{$nome}',
                    crm_medico = '{$crm}',
                    especialidade_medico = '{$especialidade}',
                    situacao = '{$situacao}'  
                WHERE id_medico = {$id_medico}";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Editou com sucesso!');</script>";
            print "<script>location.href='?page=listar-medico';</script>";
        } else {
            print "<script>alert('Não foi possível editar!');</script>";
            print "<script>location.href='?page=listar-medico';</script>";
        }
    break;

    case 'excluir':

        $id_medico = $_REQUEST['id_medico'];

        $sql = "DELETE FROM medico WHERE id_medico = {$id_medico}";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Excluiu com sucesso!');</script>";
            print "<script>location.href='?page=listar-medico';</script>";
        } else {
            print "<script>alert('Não foi possível excluir!');</script>";
            print "<script>location.href='?page=listar-medico';</script>";
        }
    break;
}
?>

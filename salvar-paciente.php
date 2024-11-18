<?php
switch($_REQUEST["acao"]){
    case 'cadastrar':
        // Recebe os dados do formulário
        $nome = $_POST['nome_paciente'];
        $email = $_POST['email_paciente'];
        $cpf = $_POST['cpf_paciente'];
        $dt_nasc = $_POST['dt_nasc_paciente'];
        $fone = $_POST['fone_paciente'];
        $endereco = $_POST['endereco_paciente'];
        $gravidade = $_POST['gravidade_paciente'];  // Recebe a gravidade do paciente

        // Insere os dados no banco de dados, incluindo a gravidade
        $sql = "INSERT INTO paciente (    
                    nome_paciente, 
                    email_paciente, 
                    cpf_paciente,
                    dt_nasc_paciente,
                    fone_paciente,
                    endereco_paciente,
                    gravidade_paciente) 
                VALUES (
                    '{$nome}',
                    '{$email}',
                    '{$cpf}',
                    '{$dt_nasc}',
                    '{$fone}',
                    '{$endereco}',
                    '{$gravidade}' 
        )";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastrou com sucesso!');</script>";
            print "<script>location.href='?page=listar-paciente';</script>";
        } else {
            print "<script>alert('Não foi possível cadastrar');</script>";
            print "<script>location.href='?page=listar-paciente';</script>";
        }
    break;

    case 'editar':

        $nome = $_POST["nome_paciente"];
        $email = $_POST["email_paciente"];
        $cpf = $_POST["cpf_paciente"];
        $dt_nasc = $_POST["dt_nasc_paciente"];
        $fone = $_POST["fone_paciente"];
        $endereco = $_POST["endereco_paciente"];
        $gravidade = $_POST["gravidade_paciente"];  


        $sql = "UPDATE paciente SET
                    nome_paciente='{$nome}',
                    email_paciente='{$email}',
                    cpf_paciente='{$cpf}',
                    dt_nasc_paciente='{$dt_nasc}',
                    fone_paciente='{$fone}',
                    endereco_paciente='{$endereco}',
                    gravidade_paciente='{$gravidade}'  
                WHERE id_paciente={$_POST['id_paciente']}";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Editou com sucesso!');</script>";
            print "<script>location.href='?page=listar-paciente';</script>";
        } else {
            print "<script>alert('Não foi possível editar');</script>";
            print "<script>location.href='?page=listar-paciente';</script>";
        }
    break;

    case 'excluir':
        
        $sql = "DELETE FROM paciente WHERE id_paciente=" . $_REQUEST['id_paciente'];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Excluiu com sucesso!');</script>";
            print "<script>location.href='?page=listar-paciente';</script>";
        } else {
            print "<script>alert('Não foi possível excluir');</script>";
            print "<script>location.href='?page=listar-paciente';</script>";
        }
    break;
}
?>

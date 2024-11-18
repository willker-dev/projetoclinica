<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listar Pacientes</title>
  <!-- Link para os arquivos CSS do Bootstrap -->
  <link href="path/to/bootstrap.min.css" rel="stylesheet">
  <!-- Link para os ícones do FontAwesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
  <h1 class="text-center mb-4">Lista de Pacientes</h1>


<?php
$sql = "SELECT * FROM paciente";
$res = $conn->query($sql);
$qtd = $res->num_rows;

if ($qtd > 0) {
    echo "<div class='table-responsive'>";
    echo "<table class='table table-bordered table-striped table-hover'>";
    echo "<thead class='thead-dark'>";
    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>Nome</th>";
    echo "<th>Email</th>";
    echo "<th>CPF</th>";
    echo "<th>Data de Nascimento</th>";
    echo "<th>Telefone</th>";
    echo "<th>Endereço</th>";
    echo "<th>Gravidade</th>";  
    echo "<th>Ações</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = $res->fetch_object()) {
        echo "<tr>";
        echo "<td>" . $row->id_paciente . "</td>";
        echo "<td>" . $row->nome_paciente . "</td>";
        echo "<td>" . $row->email_paciente . "</td>";
        echo "<td>" . $row->cpf_paciente . "</td>";
        echo "<td>" . $row->dt_nasc_paciente . "</td>";
        echo "<td>" . $row->fone_paciente . "</td>";
        echo "<td>" . $row->endereco_paciente . "</td>";
        echo "<td>" . ucfirst($row->gravidade_paciente) . "</td>";  
        echo "<td class='text-center'>
                <button class='btn btn-warning btn-sm' 
                        onclick=\"location.href='?page=editar-paciente&id_paciente=" . $row->id_paciente . "';\" 
                        aria-label='Editar'>
                  <i class='fas fa-edit'></i> Editar
                </button>
                <button class='btn btn-danger btn-sm' 
                        onclick=\"if(confirm('Deseja realmente excluir?')){location.href='?page=salvar-paciente&acao=excluir&id_paciente=" . $row->id_paciente . "';} else { false; }\" 
                        aria-label='Excluir'>
                  <i class='fas fa-trash-alt'></i> Excluir
                </button>
              </td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</div>";
} else {
    echo "<div class='alert alert-warning'>Não encontrou resultados</div>";
}
?>


</div>

<!-- Scripts do Bootstrap -->
<script src="path/to/bootstrap.bundle.min.js"></script>

</body>
</html>

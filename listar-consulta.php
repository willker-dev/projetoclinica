<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listar Consultas</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- Link para os arquivos CSS do Bootstrap -->
  <link href="path/to/bootstrap.min.css" rel="stylesheet">
  <!-- Link para os ícones do FontAwesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
  <h1 class="text-center mb-4">Listar Consultas</h1>

  <?php
    // Consultar todas as consultas no banco de dados
    $sql = "SELECT c.id_consulta, c.tipo_consulta, c.data_consulta, m.nome_medico, p.nome_paciente 
            FROM consulta c
            JOIN medico m ON c.id_medico = m.id_medico
            JOIN paciente p ON c.id_paciente = p.id_paciente";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if ($qtd > 0) {
        echo "<div class='alert alert-info'><b>$qtd</b> Consulta(s) cadastrada(s) no momento.</div>";
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered table-striped table-hover'>";
        echo "<thead class='thead-dark'>";
        echo "<tr>";
        echo "<th>#</th>";
        echo "<th>Médico</th>";
        echo "<th>Paciente</th>";
        echo "<th>Tipo de Consulta</th>";
        echo "<th>Data da Consulta</th>";
        echo "<th>Ações</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        
        while ($row = $res->fetch_object()) {
            echo "<tr>";
            echo "<td>".$row->id_consulta."</td>";
            echo "<td>".$row->nome_medico."</td>";
            echo "<td>".$row->nome_paciente."</td>";
            echo "<td>".$row->tipo_consulta."</td>";
            echo "<td>".date("d/m/Y H:i", strtotime($row->data_consulta))."</td>";
            echo "<td class='text-center'>
                    <button class='btn btn-warning btn-sm' 
                            onclick=\"location.href='?page=editar-consulta&id_consulta=".$row->id_consulta."';\" 
                            aria-label='Editar'>
                      <i class='fas fa-edit'></i> Editar
                    </button>
                    <button class='btn btn-danger btn-sm' 
                            onclick=\"if(confirm('Deseja realmente excluir?')){location.href='?page=salvar-consulta&acao=excluir&id_consulta=".$row->id_consulta."';} else { false; }\" 
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

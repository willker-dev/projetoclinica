<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listar Médicos</title>
  <link href="path/to/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
  <h1 class="text-center mb-4">Listar Médicos</h1>

  <?php
    $sql = "SELECT * FROM medico";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if($qtd > 0){
        echo "<div class='alert alert-info'><b>$qtd</b> Médico ativo no momento.</div>";
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered table-striped table-hover'>";
        echo "<thead class='thead-dark'>";
        echo "<tr>";
        echo "<th>#</th>";
        echo "<th>Nome</th>";
        echo "<th>CRM</th>";
        echo "<th>Especialidade</th>";
        echo "<th>Situação</th>";
        echo "<th>Ações</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        
        while($row = $res->fetch_object()){
            echo "<tr>";
            echo "<td>".$row->id_medico."</td>";
            echo "<td>".$row->nome_medico."</td>";
            echo "<td>".$row->crm_medico."</td>";
            echo "<td>".$row->especialidade_medico."</td>";
            echo "<td>".$row->situacao."</td>";
            echo "<td class='text-center'>
                    <button class='btn btn-warning btn-sm' 
                            onclick=\"location.href='?page=editar-medico&id_medico=".$row->id_medico."';\" 
                            aria-label='Editar'>
                      <i class='fas fa-edit'></i> Editar
                    </button>
                    <button class='btn btn-danger btn-sm' 
                            onclick=\"if(confirm('Deseja realmente excluir?')){location.href='?page=salvar-medico&acao=excluir&id_medico=".$row->id_medico."';}else{false;}\"
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

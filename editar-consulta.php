<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Consulta</title>
  <!-- Link para os arquivos CSS do Bootstrap -->
  <link href="path/to/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
  <h1 class="text-center mb-4">Editar Consulta</h1>

  <?php
    // Recupera os dados da consulta a partir do banco de dados
    $sql = "SELECT c.id_consulta, c.tipo_consulta, c.data_consulta, c.id_medico, c.id_paciente, 
                   m.nome_medico, p.nome_paciente 
            FROM consulta c
            JOIN medico m ON c.id_medico = m.id_medico
            JOIN paciente p ON c.id_paciente = p.id_paciente
            WHERE c.id_consulta = ".$_REQUEST['id_consulta'];
    $res = $conn->query($sql);
    $row = $res->fetch_object();
  ?>

  <div class="card shadow-lg">
    <div class="card-body">
      <form action="?page=salvar-consulta" method="POST">
        <!-- Ação e ID da consulta -->
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id_consulta" value="<?php echo $row->id_consulta; ?>">

        <!-- Selecionar Médico -->
        <div class="mb-3">
          <label for="nome_medico" class="form-label">Médico</label>
          <select name="nome_medico" id="nome_medico" class="form-control" required>
            <option value="">Selecione um Médico</option>
            <?php
              // Buscar médicos do banco de dados
              $query_medicos = "SELECT id_medico, nome_medico FROM medico";
              $resultado_medicos = mysqli_query($conn, $query_medicos);
              while($medico = mysqli_fetch_assoc($resultado_medicos)) {
                $selected = ($medico['id_medico'] == $row->id_medico) ? "selected" : "";
                echo "<option value='".$medico['id_medico']."' $selected>".$medico['nome_medico']."</option>";
              }
            ?>
          </select>
        </div>

        <!-- Selecionar Paciente -->
        <div class="mb-3">
          <label for="nome_paciente" class="form-label">Paciente</label>
          <select name="nome_paciente" id="nome_paciente" class="form-control" required>
            <option value="">Selecione um Paciente</option>
            <?php
              // Buscar pacientes do banco de dados
              $query_pacientes = "SELECT id_paciente, nome_paciente FROM paciente";
              $resultado_pacientes = mysqli_query($conn, $query_pacientes);
              while($paciente = mysqli_fetch_assoc($resultado_pacientes)) {
                $selected = ($paciente['id_paciente'] == $row->id_paciente) ? "selected" : "";
                echo "<option value='".$paciente['id_paciente']."' $selected>".$paciente['nome_paciente']."</option>";
              }
            ?>
          </select>
        </div>

        <!-- Tipo de Consulta -->
        <div class="mb-3">
          <label for="tipo_consulta" class="form-label">Tipo de Consulta</label>
          <select name="tipo_consulta" id="tipo_consulta" class="form-control" required>
            <option value="">Selecione o Tipo de Consulta</option>
            <option value="Consulta Geral" <?php echo ($row->tipo_consulta == 'Consulta Geral') ? "selected" : ""; ?>>Consulta Geral</option>
            <option value="Consulta de Acompanhamento" <?php echo ($row->tipo_consulta == 'Consulta de Acompanhamento') ? "selected" : ""; ?>>Consulta de Acompanhamento</option>
            <option value="Emergência" <?php echo ($row->tipo_consulta == 'Emergência') ? "selected" : ""; ?>>Emergência</option>
            <option value="Exame" <?php echo ($row->tipo_consulta == 'Exame') ? "selected" : ""; ?>>Exame</option>
            <option value="Cirurgia" <?php echo ($row->tipo_consulta == 'Cirurgia') ? "selected" : ""; ?>>Cirurgia</option>
          </select>
        </div>

        <!-- Data e Hora da Consulta -->
        <div class="mb-3">
          <label for="data_consulta" class="form-label">Data e Hora da Consulta</label>
          <input type="datetime-local" name="data_consulta" id="data_consulta" class="form-control" value="<?php echo date('Y-m-d\TH:i', strtotime($row->data_consulta)); ?>" required>
        </div>

        <!-- Botão Enviar -->
        <div class="mb-3 text-center">
          <button type="submit" class="btn btn-success btn-lg">Salvar Alterações</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Scripts do Bootstrap -->
<script src="path/to/bootstrap.bundle.min.js"></script>

</body>
</html>

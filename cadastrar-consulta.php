<?php

// Buscar médicos do banco de dados
$query_medicos = "SELECT id_medico, nome_medico FROM medico WHERE situacao = 'Ativo'";
$resultado_medicos = mysqli_query($conn, $query_medicos);

// Buscar pacientes do banco de dados (corrigido para a tabela 'paciente')
$query_pacientes = "SELECT id_paciente, nome_paciente, cpf_paciente FROM paciente";
$resultado_pacientes = mysqli_query($conn, $query_pacientes);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Consulta</title>
  <link href="path/to/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <h2>Cadastrar Consulta</h2>
    <form action="?page=salvar-consulta" method="POST">
          <input type="hidden" name="acao" value="cadastrar">
        <div class="mb-3">
            <label for="nome_medico" class="form-label">Médico</label>
            <select name="nome_medico" id="nome_medico" class="form-control" required>
                <option value="">Selecione um Médico</option>
                <?php while($medico = mysqli_fetch_assoc($resultado_medicos)): ?>
                    <option value="<?php echo $medico['id_medico']; ?>"><?php echo $medico['nome_medico']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="nome_paciente" class="form-label">Paciente</label>
            <select name="nome_paciente" id="nome_paciente" class="form-control" required>
                <option value="">Selecione um Paciente</option>
                <?php while($paciente = mysqli_fetch_assoc($resultado_pacientes)): ?>
                    <option value="<?php echo $paciente['id_paciente']; ?>"><?php echo $paciente['nome_paciente'] . " - " . $paciente['cpf_paciente']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="tipo_consulta" class="form-label">Tipo de Consulta</label>
            <select name="tipo_consulta" id="tipo_consulta" class="form-control" required>
                <option value="">Selecione o Tipo de Consulta</option>
                <option value="Consulta Geral">Consulta Geral</option>
                <option value="Consulta de Acompanhamento">Consulta de Acompanhamento</option>
                <option value="Emergência">Emergência</option>
                <option value="Exame">Exame</option>
                <option value="Cirurgia">Cirurgia</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="data_consulta" class="form-label">Data e Hora da Consulta</label>
            <input type="datetime-local" name="data_consulta" id="data_consulta" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar Consulta</button>
    </form>
</div>

<script src="path/to/bootstrap.bundle.min.js"></script>
</body>
</html>

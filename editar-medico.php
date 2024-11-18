<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Médico</title>
  <link href="path/to/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
  <h1 class="text-center mb-4">Editar Médico</h1>

  <?php
    $sql = "SELECT * FROM medico WHERE id_medico=".$_REQUEST['id_medico'];
    $res = $conn->query($sql);
    $row = $res->fetch_object();
  ?>

  <div class="card shadow-lg">
    <div class="card-body">
      <form action="?page=salvar-medico" method="POST">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id_medico" value="<?php print $row->id_medico; ?>">

        <div class="mb-3">
          <label for="nome_medico" class="form-label">Nome</label>
          <input type="text" name="nome_medico" id="nome_medico" class="form-control" value="<?php print $row->nome_medico; ?>" required>
        </div>

        <div class="mb-3">
          <label for="crm_medico" class="form-label">CRM</label>
          <input type="text" name="crm_medico" id="crm_medico" class="form-control" value="<?php print $row->crm_medico; ?>" required>
        </div>

        <div class="mb-3">
          <label for="especialidade_medico" class="form-label">Especialidade</label>
          <input type="text" name="especialidade_medico" id="especialidade_medico" class="form-control" value="<?php print $row->especialidade_medico; ?>" required>
        </div>

        <div class="mb-3">
          <label for="situacao_medico" class="form-label">Situação</label>
          <select name="situacao" id="situacao_medico" class="form-select">
            <option value="Ativo" <?php if($row->situacao == 'Ativo') echo "selected"; ?>>Ativo</option>
            <option value="Inativo" <?php if($row->situacao == 'Inativo') echo "selected"; ?>>Inativo</option>
            <option value="Afastado" <?php if($row->situacao == 'Afastado') echo "selected"; ?>>Afastado</option>
          </select>
        </div>

        <div class="mb-3 text-center">
          <button type="submit" class="btn btn-success btn-lg">Salvar Alterações</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="path/to/bootstrap.bundle.min.js"></script>

</body>
</html>

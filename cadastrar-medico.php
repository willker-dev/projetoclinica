<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar Médico</title>
  <link href="path/to/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
  <h1 class="text-center mb-4">Cadastrar Médico</h1>

  <div class="card shadow-lg">
    <div class="card-body">
      <form action="?page=salvar-medico" method="POST">
        <div class="mb-3">
          <label for="nome_medico" class="form-label">Nome</label>
          <input type="text" name="nome_medico" id="nome_medico" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="crm_medico" class="form-label">CRM</label>
          <input type="text" name="crm_medico" id="crm_medico" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="especialidade_medico" class="form-label">Especialidade</label>
          <input type="text" name="especialidade_medico" id="especialidade_medico" class="form-control" required>
        </div>

        <input type="hidden" name="situacao" value="Ativo"> 

        <div class="mb-3 text-center">
          <button type="submit" class="btn btn-success btn-lg">Cadastrar Médico</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="path/to/bootstrap.bundle.min.js"></script>

</body>
</html>

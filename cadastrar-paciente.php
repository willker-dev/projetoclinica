<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar Paciente</title>
  <link href="path/to/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</head>
<body>

<div class="container my-5">
  <h1 class="text-center mb-4">Cadastrar Paciente</h1>

  <div class="card shadow-lg">
    <div class="card-body">
      <form action="?page=salvar-paciente&salvar-transferencia" method="POST">
        <input type="hidden" name="acao" value="cadastrar">

        <div class="mb-3">
          <label for="nome_paciente" class="form-label">Nome</label>
          <input type="text" name="nome_paciente" id="nome_paciente" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="email_paciente" class="form-label">E-mail</label>
          <input type="email" name="email_paciente" id="email_paciente" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="cpf_paciente" class="form-label">CPF</label>
          <input type="text" name="cpf_paciente" id="cpf_paciente" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="dt_nasc_paciente" class="form-label">Data de Nascimento</label>
          <input type="date" name="dt_nasc_paciente" id="dt_nasc_paciente" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="fone_paciente" class="form-label">Telefone</label>
          <input type="text" name="fone_paciente" id="fone_paciente" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="endereco_paciente" class="form-label">Endereço</label>
          <input type="text" name="endereco_paciente" id="endereco_paciente" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="gravidade_paciente" class="form-label">Gravidade</label>
          <select name="gravidade_paciente" id="gravidade_paciente" class="form-control" required>
            <option value="nenhum">---</option>
            <option value="vermelha">Vermelha - Urgente</option>
            <option value="amarela">Amarela - Urgente, mas não imediato</option>
            <option value="verde">Verde - Não urgente</option>
            <option value="azul">Azul - Sem risco</option>
          </select>
        </div>

        <div class="mb-3 text-center">
          <button type="submit" class="btn btn-success btn-lg">Cadastrar Paciente</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="path/to/bootstrap.bundle.min.js"></script>

</body>
</html>

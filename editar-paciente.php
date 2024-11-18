<h1>Editar Paciente</h1>
<?php
    // Consultando o paciente pelo ID
    $sql = "SELECT * FROM paciente WHERE id_paciente=" . $_REQUEST['id_paciente'];
    $res = $conn->query($sql);
    $row = $res->fetch_object();
?>
<form action="?page=salvar-paciente" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_paciente" value="<?php print $row->id_paciente; ?>">

    <!-- Nome -->
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome_paciente" class="form-control" value="<?php print $row->nome_paciente; ?>">
    </div>

    <!-- E-mail -->
    <div class="mb-3">
        <label>Email</label>
        <input type="text" name="email_paciente" class="form-control" value="<?php print $row->email_paciente; ?>">
    </div>

    <!-- CPF -->
    <div class="mb-3">
        <label>CPF</label>
        <input type="number" name="cpf_paciente" class="form-control" value="<?php print $row->cpf_paciente; ?>">
    </div>

    <!-- Data de Nascimento -->
    <div class="mb-3">
        <label>Data de Nascimento</label>
        <input type="date" name="dt_nasc_paciente" class="form-control" value="<?php print $row->dt_nasc_paciente; ?>">
    </div>

    <!-- Telefone -->
    <div class="mb-3">
        <label>Telefone</label>
        <input type="number" name="fone_paciente" class="form-control" value="<?php print $row->fone_paciente; ?>">
    </div>

    <!-- Endereço -->
    <div class="mb-3">
        <label>Endereço</label>
        <input type="text" name="endereco_paciente" class="form-control" value="<?php print $row->endereco_paciente; ?>">
    </div>

    <!-- Gravidade -->
    <div class="mb-3">
        <label>Gravidade</label>
        <select name="gravidade_paciente" class="form-control" required>
            <option value="vermelha" <?php echo ($row->gravidade_paciente == 'vermelha') ? 'selected' : ''; ?>>Vermelha - Urgente</option>
            <option value="amarela" <?php echo ($row->gravidade_paciente == 'amarela') ? 'selected' : ''; ?>>Amarela - Urgente, mas não imediato</option>
            <option value="verde" <?php echo ($row->gravidade_paciente == 'verde') ? 'selected' : ''; ?>>Verde - Não urgente</option>
            <option value="azul" <?php echo ($row->gravidade_paciente == 'azul') ? 'selected' : ''; ?>>Azul - Sem risco</option>
        </select>
    </div>

    <!-- Botão de Enviar -->
    <div class="mb-3">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</form>

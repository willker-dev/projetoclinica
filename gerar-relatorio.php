<?php
// Incluindo a conexão com o banco de dados
require_once('db.php');  // Inclua o arquivo de conexão com o banco aqui

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Obtém os dados do formulário
    $tipoRelatorio = $_POST['tipo_relatorio'];

    // Cria um novo PDF
    require('fpdf/fpdf.php');
    $pdf = new FPDF();
    $pdf->AddPage();
    
    // Adiciona o nome da clínica no topo
    $pdf->SetFont('Arial', 'B', 24);
    $pdf->Cell(0, 10, 'Clinica do Will', 0, 1, 'C');
    $pdf->Ln(5);  // Espaço para separar do próximo conteúdo

    // Linha separadora
    $pdf->SetDrawColor(255, 0, 0);  // Cor da linha (vermelho)
    $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());  // Linha de separação
    $pdf->Ln(10);  // Espaço após a linha

    // Adiciona o título do relatório
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Relatorio de ' . ucfirst($tipoRelatorio), 0, 1, 'C');
    $pdf->Ln(10);

    // Gerar relatório para Paciente
    if ($tipoRelatorio == 'paciente') {
        
        // Consulta para obter os dados dos pacientes
        $select = "SELECT nome_paciente, cpf_paciente, tipo_consulta, gravidade_paciente FROM paciente JOIN consulta ON paciente.id_paciente = consulta.id_paciente";
        $res = $conn->query($select);

        // Definir a fonte para o relatório de paciente
        $pdf->SetFont('Arial', '', 12);

        // Adiciona as colunas do relatório de pacientes
        if (isset($_POST['relatorio_paciente'])) {
            // Cabeçalho do relatório com cor vermelha
            $pdf->SetFillColor(255, 0, 0);  // Cor de fundo vermelha
            $pdf->SetTextColor(255, 255, 255);  // Cor do texto (branco)
            $exibindoAlgumaColuna = false; // Variável de controle
            if (in_array('nome', $_POST['relatorio_paciente'])) {
                $pdf->Cell(40, 10, 'Nome', 1, 0, 'C', true);
                $exibindoAlgumaColuna = true;
            }
            if (in_array('cpf', $_POST['relatorio_paciente'])) {
                $pdf->Cell(40, 10, 'CPF', 1, 0, 'C', true);
                $exibindoAlgumaColuna = true;
            }
            if (in_array('tipo_consulta', $_POST['relatorio_paciente'])) {
                $pdf->Cell(50, 10, 'Tipo de Consulta', 1, 0, 'C', true);
                $exibindoAlgumaColuna = true;
            }
            if (in_array('gravidade', $_POST['relatorio_paciente'])) {
                $pdf->Cell(50, 10, 'Gravidade', 1, 0, 'C', true);
                $exibindoAlgumaColuna = true;
            }

            // Se pelo menos uma coluna foi selecionada, exibe os dados
            if ($exibindoAlgumaColuna) {
                $pdf->Ln(); // Nova linha para os dados
                // Exibe os dados com linhas alternadas (branco e azul claro)
                $pdf->SetTextColor(0, 0, 0); // Cor do texto (preto)
                $alternarCor = true; // Variável para alternar a cor das linhas
                foreach ($res as $row) {
                    // Define a cor de fundo para alternar entre branco e azul claro
                    if ($alternarCor) {
                        $pdf->SetFillColor(255, 255, 255);  // Branco
                    } else {
                        $pdf->SetFillColor(220, 240, 255);  // Azul claro
                    }

                    // Exibe os dados
                    if (in_array('nome', $_POST['relatorio_paciente'])) {
                        $pdf->Cell(40, 10, $row['nome_paciente'], 1, 0, 'C', true);
                    }
                    if (in_array('cpf', $_POST['relatorio_paciente'])) {
                        $pdf->Cell(40, 10, $row['cpf_paciente'], 1, 0, 'C', true);
                    }
                    if (in_array('tipo_consulta', $_POST['relatorio_paciente'])) {
                        $pdf->Cell(50, 10, $row['tipo_consulta'], 1, 0, 'C', true);
                    }
                    if (in_array('gravidade', $_POST['relatorio_paciente'])) {
                        $pdf->Cell(50, 10, $row['gravidade_paciente'], 1, 0, 'C', true);
                    }
                    $pdf->Ln();
                    $alternarCor = !$alternarCor; // Alterna a cor para a próxima linha
                }
            }
        }
    }

// Gerar relatório para Médico
if ($tipoRelatorio == 'medico') {
    
    // Consulta para obter os dados dos médicos
    $select = "SELECT nome_medico, situacao FROM medico";  // Alterado 'status' para 'situacao'
    $res = $conn->query($select);

    // Definir a fonte para o relatório de médico
    $pdf->SetFont('Arial', '', 12);

    // Adiciona o cabeçalho
    if (isset($_POST['relatorio_medico'])) {
        $pdf->SetFillColor(255, 0, 0);  // Cor de fundo vermelha
        $pdf->SetTextColor(255, 255, 255);  // Cor do texto (branco)

        // Definir largura das colunas para que se ajustem a toda a página
        $largura_nome = 120; // Largura para o Nome do Médico
        $largura_status = 70; // Largura para o Status
        $pdf->Cell($largura_nome, 10, 'Nome', 1, 0, 'C', true);
        $pdf->Cell($largura_status, 10, 'Status', 1, 0, 'C', true);
        $pdf->Ln(); // Nova linha

        // Exibe os dados com linhas alternadas (branco e azul claro)
        $pdf->SetTextColor(0, 0, 0); // Cor do texto (preto)
        $alternarCor = true; // Variável para alternar a cor das linhas
        foreach ($res as $row) {
            // Define a cor de fundo para alternar entre branco e azul claro
            if ($alternarCor) {
                $pdf->SetFillColor(255, 255, 255);  // Branco
            } else {
                $pdf->SetFillColor(220, 240, 255);  // Azul claro
            }

            // Exibe os dados
            if (in_array('nome', $_POST['relatorio_medico'])) {
                $pdf->Cell($largura_nome, 10, $row['nome_medico'], 1, 0, 'C', true);
            }
            if (in_array('status', $_POST['relatorio_medico'])) {
                // Exibe o status
                $pdf->Cell($largura_status, 10, $row['situacao'], 1, 0, 'C', true);
            }
            $pdf->Ln(); // Nova linha após cada entrada de dados
            $alternarCor = !$alternarCor; // Alterna a cor para a próxima linha
        }

        // Adiciona quebra de página se necessário
        if ($pdf->GetY() > 250) {  // Caso o conteúdo ultrapasse uma página
            $pdf->AddPage();  // Adiciona uma nova página
        }
    }
}


    // Faz o download do PDF gerado diretamente no navegador
    $pdf->Output('D', 'relatorio_' . time() . '.pdf'); // D significa download
    exit();
}
?>







<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerar Relatório</title>
    <link href="path/to/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
    <h1 class="text-center mb-4">Gerar Relatório</h1>

    <!-- Formulário para selecionar o tipo de relatório -->
    <form action="gerar-relatorio.php" method="POST">
        
        <!-- Seleção do tipo de relatório -->
        <div class="mb-3">
            <label for="tipo_relatorio" class="form-label">Escolha o Tipo de Relatório</label>
            <select name="tipo_relatorio" id="tipo_relatorio" class="form-select" onchange="exibirCampos()" required>
                <option value="">Selecione...</option>
                <option value="paciente">Relatório de Paciente</option>
                <option value="medico">Relatório de Médico</option>
            </select>
        </div>

        <!-- Campos específicos para Relatório de Paciente -->
        <div id="paciente-campos" style="display: none;">
            <h3>Relatório de Paciente</h3>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="relatorio_paciente[]" value="nome" id="relatorio_nome">
                <label class="form-check-label" for="relatorio_nome">Nome</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="relatorio_paciente[]" value="cpf" id="relatorio_cpf">
                <label class="form-check-label" for="relatorio_cpf">CPF</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="relatorio_paciente[]" value="tipo_consulta" id="relatorio_tipo_consulta">
                <label class="form-check-label" for="relatorio_tipo_consulta">Tipo de Consulta</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="relatorio_paciente[]" value="gravidade" id="relatorio_gravidade">
                <label class="form-check-label" for="relatorio_gravidade">Gravidade</label>
            </div>
        </div>

        <!-- Campos específicos para Relatório de Médico -->
        <div id="medico-campos" style="display: none;">
            <h3>Relatório de Médico</h3>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="relatorio_medico[]" value="nome" id="relatorio_nome_medico">
                <label class="form-check-label" for="relatorio_nome_medico">Nome</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="relatorio_medico[]" value="status" id="relatorio_status">
                <label class="form-check-label" for="relatorio_status">Status (Ativo/Inativo)</label>
            </div>
        </div>

        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-primary">Gerar Relatório</button>
        </div>
    </form>

</div>

<script>
    function exibirCampos() {
        var tipoRelatorio = document.getElementById('tipo_relatorio').value;
        document.getElementById('paciente-campos').style.display = tipoRelatorio === 'paciente' ? 'block' : 'none';
        document.getElementById('medico-campos').style.display = tipoRelatorio === 'medico' ? 'block' : 'none';
    }
</script>

<!-- Scripts do Bootstrap -->
<script src="path/to/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php

$sql = "
    SELECT 
        tipo_consulta, 
        COUNT(*) as total 
    FROM consulta c
    JOIN paciente p ON c.id_paciente = p.id_paciente
    GROUP BY tipo_consulta
";
$res = $conn->query($sql);

$tipos_consulta = [];
$dados = [];

while ($row = $res->fetch_object()) {
    $tipos_consulta[] = $row->tipo_consulta;
    $dados[] = (int)$row->total;
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Relatório de Consultas - Pacientes do Mês</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f7fb;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 800px;
      margin: 50px auto;
      text-align: center;
    }
    .chart-container {
      max-width: 100%;
      margin: 20px auto;
    }
    h1 {
      font-size: 2.5rem;
      color: #333;
      font-weight: bold;
      margin-bottom: 30px;
    }
    .chart-container canvas {
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>

<div class="container">
  <h1>Pacientes do Mês - Tipos de Consulta</h1>

  <div class="chart-container">
    <canvas id="myChart"></canvas>
  </div>

  <script>
    var tiposConsulta = <?php echo json_encode($tipos_consulta); ?>;
    var dados = <?php echo json_encode($dados); ?>;

    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'doughnut', 
      data: {
        labels: tiposConsulta,
        datasets: [{
          label: 'Número de Pacientes',
          data: dados, 
          backgroundColor: [
            '#FF8A80',  
            '#FF9800', 
            '#4CAF50',  
            '#2196F3',  
            '#9C27B0',  
            '#FFEB3B'   
          ],
          borderColor: [
            '#FF8A80',
            '#FF9800',
            '#4CAF50',
            '#2196F3',
            '#9C27B0',
            '#FFEB3B'
          ],
          borderWidth: 3,
          hoverOffset: 5, 
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top',
            labels: {
              font: {
                size: 14,
                weight: 'bold',
                family: 'Arial, sans-serif',
              },
              color: '#333'
            }
          },
          tooltip: {
            backgroundColor: 'rgba(0,0,0,0.7)',
            titleColor: '#fff',
            bodyColor: '#fff',
            callbacks: {
              label: function(tooltipItem) {
                return tooltipItem.label + ': ' + tooltipItem.raw + ' Pacientes';
              }
            }
          }
        },
        cutout: '30%', 
        animation: {
          animateRotate: true, 
          animateScale: true   
        },
        maintainAspectRatio: false,  
        layout: {
          padding: 20
        }
      }
    });
  </script>
</div>

</body>
</html>

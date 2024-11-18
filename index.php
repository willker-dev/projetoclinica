<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Clínica Médica</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            display: flex;
            height: 100vh;
            background-color: #f4f6f9;
        }

        .sidebar {
            width: 80px;
            height: 100%;
            background-color: #2c3e50; 
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            transition: width 0.3s ease, background-color 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
        }

        .sidebar:hover {
            width: 250px;
            background-color: #34495e; 
        }

        .sidebar a {
            color: #ecf0f1;
            padding: 15px;
            text-decoration: none;
            font-size: 18px;
            width: 100%;
            text-align: left;
            transition: background-color 0.3s ease, padding-left 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            white-space: nowrap;
        }

        .sidebar a i {
            margin-right: 10px;
            font-size: 22px;
        }

        .sidebar a span {
            display: none;
        }

        .sidebar:hover a span {
            display: inline;
        }

        .sidebar a:hover {
            background-color: #16a085; 
            padding-left: 30px; 
        }

        .content {
            margin-left: 80px;
            flex-grow: 1;
            padding: 20px;
            background-color: #f4f6f9;
            transition: margin-left 0.3s ease;
        }

        .dropdown-menu {
            background-color: #2c3e50; 
            border: none;
            transition: max-height 0.3s ease-out;
            max-height: 0;
            overflow: hidden;
        }

        .dropdown-menu.show {
            max-height: 500px;
        }

        .dropdown-item {
            color: white;
        }

        .dropdown-toggle::after {
            font-size: 1.2rem;
            margin-left: auto;
        }

        .sidebar .home-icon,
        .sidebar .medico-icon,
        .sidebar .paciente-icon,
        .sidebar .consulta-icon,
        .sidebar .transferencia-icon {
            font-size: 20px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 60px;
            }
            .sidebar:hover {
                width: 200px;
            }
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="navbar-brand">
            <a  href="index.php" id="dropdownMenuButton1" aria-expanded="false">
            <i class="fas fa-home home-icon"></i>
                <span>Will</span>
            </a>
        </div>

        <div class="dropdown">
            <a class="dropdown-toggle" href="#" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-md medico-icon"></i>
                <span>Médicos</span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="?page=listar-medico">Listar</a></li>
                <li><a class="dropdown-item" href="?page=cadastrar-medico">Cadastrar</a></li>
            </ul>
        </div>


        <div class="dropdown">
            <a class="dropdown-toggle" href="#" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-procedures paciente-icon"></i>
                <span>Pacientes</span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                <li><a class="dropdown-item" href="?page=listar-paciente">Listar</a></li>
                <li><a class="dropdown-item" href="?page=cadastrar-paciente">Cadastrar</a></li>
            </ul>
        </div>

        <div class="dropdown">
            <a class="dropdown-toggle" href="#" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-notes-medical consulta-icon"></i>
                <span>Consulta</span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                <li><a class="dropdown-item" href="?page=listar-consulta">Listar</a></li>
                <li><a class="dropdown-item" href="?page=cadastrar-consulta">Cadastrar</a></li>
            </ul>
        </div>

    <div class="dropdown">
        <a class="dropdown-toggle" href="#" id="dropdownMenuButton4" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-file-alt"></i>
            <span>Relatório</span> 
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
            <li><a class="dropdown-item" href="?page=gerar-relatorio">Gerar Relatório</a></li> 
        </ul>
    </div>
    </div>


    <div class="content">
        <?php
        include('config.php');

        switch(@$_REQUEST['page']){
            case 'cadastrar-medico':
                include('cadastrar-medico.php');
                break;
            case 'editar-medico':
                include('editar-medico.php');
                break;
            case 'listar-medico':
                include('listar-medico.php');
                break;
            case 'salvar-medico':
                include('salvar-medico.php');
                break;

            case 'cadastrar-paciente':
                include('cadastrar-paciente.php');
                break;
            case 'editar-paciente':
                include('editar-paciente.php');
                break;
            case 'listar-paciente':
                include('listar-paciente.php');
                break;
            case 'salvar-paciente':
                include('salvar-paciente.php');
                break;

            case 'cadastrar-consulta':
                include('cadastrar-consulta.php');
                break;
            case 'editar-consulta':
                include('editar-consulta.php');
                break;
            case 'listar-consulta':
                include('listar-consulta.php');
                break;
            case 'salvar-consulta':
                include('salvar-consulta.php');
                break;

            case 'gerar-relatorio':
                include('gerar-relatorio.php');
                break;

            default:
                include('home.php');        
        }
        ?>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script> 
    <script>
        console.log("Feito por WillkerGDS");
    </script>
</body>
</html>

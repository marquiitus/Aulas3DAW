<?php
session_start();
include 'verificar_sessao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sente - Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .dashboard-header {
            background: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
        }
        
        .user-info {
            background: white;
            padding: 30px;
            margin: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .btn-logout {
            background: #e74c3c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }
        
        .btn-logout:hover {
            background: #c0392b;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <nav class="nav">
                <div class="logo">Sente</div>
                <ul class="nav-links">
                    <li><a href="#">Teresa</a></li>
                    <li><a href="#">Reserva</a></li>
                    <li><a href="#">Sobre Nós</a></li>
                    <li><a href="#">Parceiros</a></li>
                </ul>
            </nav>
        </header>

        <main class="main-content">
            <div class="dashboard-header">
                <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario_nome'], ENT_QUOTES, 'UTF-8'); ?>!</h1>
                <p>Esta é sua área logada</p>
            </div>

            <div class="user-info">
                <h2>Suas informações</h2>
                <p><strong>Nome:</strong> <?php echo htmlspecialchars($_SESSION['usuario_nome'], ENT_QUOTES, 'UTF-8'); ?></p>
                <p><strong>E-mail:</strong> <?php echo htmlspecialchars($_SESSION['usuario_email'], ENT_QUOTES, 'UTF-8'); ?></p>
                <p><strong>ID:</strong> <?php echo htmlspecialchars($_SESSION['usuario_id'], ENT_QUOTES, 'UTF-8'); ?></p>
                
                <a href="logout.php" class="btn-logout">Sair</a>
            </div>
        </main>
    </div>
</body>
</html>
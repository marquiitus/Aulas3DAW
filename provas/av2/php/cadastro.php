<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro - Santa Teresa</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }

    .container {
      display: flex;
      max-width: 1000px;
      width: 100%;
      background: white;
      border-radius: 10px;
      box-shadow: 0 15px 30px rgba(0,0,0,0.2);
      overflow: hidden;
    }

    .left-panel {
      flex: 1;
      background: url('https://images.unsplash.com/photo-1552733407-5d5c46c3bb3b') center/cover;
      position: relative;
    }

    .right-panel {
      flex: 1;
      padding: 40px;
      max-height: 90vh;
      overflow-y: auto;
    }

    .logo {
      text-align: center;
      margin-bottom: 30px;
      font-size: 24px;
      font-weight: bold;
      color: #333;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      color: #555;
      font-weight: bold;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
      width: 100%;
      padding: 12px;
      border: 2px solid #ddd;
      border-radius: 5px;
      font-size: 16px;
      transition: border-color 0.3s;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
      border-color: #667eea;
      outline: none;
    }

    .form-group textarea {
      height: 80px;
      resize: vertical;
    }

    .form-row {
      display: flex;
      gap: 15px;
    }

    .form-row .form-group {
      flex: 1;
    }

    .btn {
      width: 100%;
      padding: 12px;
      background: #667eea;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      font-weight: bold;
      transition: background 0.3s;
    }

    .btn:hover {
      background: #764ba2;
    }

    .links {
      text-align: center;
      margin-top: 20px;
    }

    .links a {
      color: #667eea;
      text-decoration: none;
    }

    .links a:hover {
      text-decoration: underline;
    }

    .message {
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 5px;
      text-align: center;
    }

    .success {
      background: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }

    .error {
      background: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="left-panel"></div>
    <div class="right-panel">
      <div class="logo">SANTA TERESA</div>
      
      <?php
      session_start();
      if (isset($_SESSION['message'])) {
        echo '<div class="message ' . $_SESSION['message_type'] . '">' . $_SESSION['message'] . '</div>';
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
      }
      ?>

      <form action="processa_cadastro.php" method="POST">
        <div class="form-group">
          <label for="nome">Nome completo *</label>
          <input type="text" id="nome" name="nome" required>
        </div>

        <div class="form-group">
          <label for="endereco">Endereço completo *</label>
          <textarea id="endereco" name="endereco" required></textarea>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="email">E-mail *</label>
            <input type="email" id="email" name="email" required>
          </div>
          
          <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="tel" id="telefone" name="telefone">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label for="passaporte">Nº do Passaporte *</label>
            <input type="text" id="passaporte" name="passaporte" required>
          </div>
          
          <div class="form-group">
            <label for="nacionalidade">Nacionalidade *</label>
            <input type="text" id="nacionalidade" name="nacionalidade" required>
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group">
            <label for="senha">Senha *</label>
            <input type="password" id="senha" name="senha" required>
          </div>
          
          <div class="form-group">
            <label for="confirmar_senha">Confirmar Senha *</label>
            <input type="password" id="confirmar_senha" name="confirmar_senha" required>
          </div>
        </div>
        
        <button type="submit" class="btn">Cadastrar</button>
      </form>
      
      <div class="links">
        <a href="login.php">Já tem conta? Faça login</a>
      </div>
    </div>
  </div>
</body>
</html>
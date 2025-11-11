<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alterar Pergunta de Texto</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    body {
      background-color: #f5f7fa;
      color: #333;
      line-height: 1.6;
    }
    
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }
    
    header {
      background: linear-gradient(135deg, #2c3e50, #2ecc71);
      color: white;
      padding: 30px 0;
      text-align: center;
      border-radius: 0 0 10px 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
    }
    
    header h1 {
      font-size: 2.5rem;
      margin-bottom: 10px;
    }
    
    .menu-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 20px;
      margin-bottom: 40px;
    }
    
    .menu-card {
      background-color: white;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      border-left: 4px solid #2ecc71;
    }
    
    .menu-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    }
    
    .menu-card h3 {
      color: #2c3e50;
      margin-bottom: 15px;
      font-size: 1.3rem;
    }
    
    .menu-card ul {
      list-style-type: none;
    }
    
    .menu-card li {
      margin-bottom: 10px;
    }
    
    .menu-card a {
      display: block;
      padding: 10px 15px;
      background-color: #f8f9fa;
      border-radius: 4px;
      text-decoration: none;
      color: #2ecc71;
      transition: all 0.3s ease;
      border-left: 3px solid transparent;
    }
    
    .menu-card a:hover {
      background-color: #e8f8f0;
      border-left-color: #2ecc71;
      color: #2c3e50;
    }
    
    .content-section {
      background-color: white;
      padding: 25px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
      margin-bottom: 30px;
    }
    
    .content-section h2 {
      color: #2c3e50;
      margin-bottom: 20px;
      padding-bottom: 10px;
      border-bottom: 2px solid #ecf0f1;
    }
    
    .form-container {
      max-width: 800px;
      margin: 0 auto;
    }
    
    .form-group {
      margin-bottom: 20px;
    }
    
    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: #2c3e50;
    }
    
    .form-group input,
    .form-group textarea {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 1rem;
      transition: border-color 0.3s ease;
    }
    
    .form-group input:focus,
    .form-group textarea:focus {
      border-color: #2ecc71;
      outline: none;
      box-shadow: 0 0 0 2px rgba(46, 204, 113, 0.2);
    }
    
    .form-group textarea {
      resize: vertical;
      min-height: 100px;
    }
    
    .search-form {
      max-width: 600px;
      margin: 0 auto 30px;
      padding: 20px;
      background-color: #f8f9fa;
      border-radius: 8px;
    }
    
    .btn {
      display: inline-block;
      padding: 12px 25px;
      background-color: #2ecc71;
      color: white;
      border: none;
      border-radius: 4px;
      font-size: 1rem;
      cursor: pointer;
      transition: background-color 0.3s ease;
      text-decoration: none;
    }
    
    .btn:hover {
      background-color: #27ae60;
    }
    
    .btn-secondary {
      background-color: #95a5a6;
    }
    
    .btn-secondary:hover {
      background-color: #7f8c8d;
    }
    
    .btn-warning {
      background-color: #f39c12;
    }
    
    .btn-warning:hover {
      background-color: #e67e22;
    }
    
    .message {
      padding: 15px;
      border-radius: 4px;
      margin: 20px 0;
      text-align: center;
    }
    
    .success {
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }
    
    .error {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }
    
    .info {
      background-color: #d1ecf1;
      color: #0c5460;
      border: 1px solid #bee5eb;
    }
    
    .footer {
      text-align: center;
      margin-top: 40px;
      padding: 20px;
      color: #7f8c8d;
      border-top: 1px solid #ecf0f1;
    }
    
    @media (max-width: 768px) {
      .menu-grid {
        grid-template-columns: 1fr;
      }
      
      header h1 {
        font-size: 2rem;
      }
    }
  </style>
</head>
<body>
  <header>
    <div class="container">
      <h1>Alterar Pergunta de Texto</h1>
      <p>Sistema de Jogo Corporativo - Water Falls</p>
    </div>
  </header>
  
  <div class="container">
    <div class="menu-grid">
      <div class="menu-card">
        <h3>Gerenciar Perguntas</h3>
        <ul>
          <li><a href="criarPerguntaMultipla.php">Criar Perguntas de Múltipla Escolha</a></li>
          <li><a href="criarPerguntaTexto.php">Criar Perguntas de Texto</a></li>
          <li><a href="alterarPerguntaMultipla.php">Alterar Perguntas de Múltipla Escolha</a></li>
          <li><a href="alterarPerguntaTexto.php">Alterar Perguntas de Texto</a></li>
        </ul>
      </div>
      
      <div class="menu-card">
        <h3>Visualizar Perguntas</h3>
        <ul>
          <li><a href="listarPerguntasRespostas.php">Listar Todas as Perguntas</a></li>
          <li><a href="listarPergunta.php">Buscar uma Pergunta</a></li>
          <li><a href="excluirPerguntaResposta.php">Excluir Perguntas</a></li>
        </ul>
      </div>
      
      <div class="menu-card">
        <h3>Gerenciar Usuários</h3>
        <ul>
          <li><a href="crudUsuarios.php">CRUD de Usuários</a></li>
          <li><a href="index.html">Página Inicial</a></li>
        </ul>
      </div>
    </div>

    <div class="content-section">
      <h2>Alterar Pergunta de Texto</h2>
      
      <div class="search-form">
        <h3>Buscar Pergunta</h3>
        <form action="alterarPerguntaTexto.php" method="post">
          <div class="form-group">
            <label for="numPerguntaBusca">Número da Pergunta a ser alterada:</label>
            <input type="text" id="numPerguntaBusca" name="numPerguntaBusca" 
                   value="<?php echo isset($_POST['numPerguntaBusca']) ? $_POST['numPerguntaBusca'] : ''; ?>" required>
          </div>
          <button type="submit" name="buscarPergunta" class="btn">Buscar Pergunta</button>
        </form>
      </div>

      <?php
      if(isset($_POST['buscarPergunta']) && isset($_POST['numPerguntaBusca'])) 
      {
        $numPerguntaBusca = $_POST['numPerguntaBusca'];
        $encontrada = false;
        
        if(file_exists("perguntasTexto.txt"))
        {
          $arquivo = fopen("perguntasTexto.txt", "r");
          $cabecalho = true;
          
          while(!feof($arquivo))
          {
            $linha = fgets($arquivo);
            if($cabecalho)
            {
              $cabecalho = false;
              continue;
            }
            
            if(!empty(trim($linha)))
            {
              $dados = explode(";", $linha);
              
              if(isset($dados[0]) && trim($dados[0]) == $numPerguntaBusca)
              {
                $numPergunta = $dados[0];
                $pergunta = $dados[1];
                $respostaGabarito = trim($dados[2]);
                $encontrada = true;
                break;
              }
            }
          }
          fclose($arquivo);
          
          if($encontrada)
            echo "<div class='message info'>Pergunta encontrada! Preencha os campos abaixo para alterá-la.</div>";
          else
            echo "<div class='message error'>Pergunta não encontrada!</div>";
          
        }
        else
          echo "<div class='message error'>Arquivo de perguntas de texto não encontrado!</div>"; 
      }
      
      if(isset($_POST['salvarAlteracoes'])) 
      {
        $numPergunta = $_POST["numPergunta"];
        $pergunta = $_POST["pergunta"];
        $respostaGabarito = $_POST["respostaGabarito"];
        
        if(file_exists("perguntasTexto.txt"))
        {
          $arquivo = fopen("perguntasTexto.txt", "r");
          $arquivoTemp = fopen("temp.txt", "w");
          $cabecalho = true;
          
          while(!feof($arquivo))
          {
            $linha = fgets($arquivo);
            
            if($cabecalho)
            {
              fwrite($arquivoTemp, $linha);
              $cabecalho = false;
              continue;
            }
            
            if(!empty(trim($linha)))
            {
              $dados = explode(";", $linha);
              
              if(isset($dados[0]) && trim($dados[0]) == $numPergunta)
              {
                $linhaNova = $numPergunta . ";" . $pergunta . ";" . $respostaGabarito . "\n";
                fwrite($arquivoTemp, $linhaNova);
              }
              else
                fwrite($arquivoTemp, $linha);
            }
          }
          
          fclose($arquivo);
          fclose($arquivoTemp);
          
          unlink("perguntasTexto.txt");
          rename("temp.txt", "perguntasTexto.txt");
          
          echo "<div class='message success'>Pergunta alterada com sucesso!</div>";
        }
        else
          echo "<div class='message error'>Erro: Arquivo de perguntas de texto não encontrado!</div>";
      }
      
      if(isset($encontrada) && $encontrada)
      {
      ?>
      <div class="form-container">
        <h3>Editar Pergunta de Texto</h3>
        <form action="alterarPerguntaTexto.php" method="post">
          <input type="hidden" name="numPergunta" value="<?php echo $numPergunta; ?>">
          
          <div class="form-group">
            <label for="pergunta">Pergunta:</label>
            <textarea id="pergunta" name="pergunta" required><?php echo $pergunta; ?></textarea>
          </div>
          
          <div class="form-group">
            <label for="respostaGabarito">Resposta Correta (Gabarito):</label>
            <textarea id="respostaGabarito" name="respostaGabarito" required><?php echo $respostaGabarito; ?></textarea>
          </div>
          
          <div class="form-group">
            <button type="submit" name="salvarAlteracoes" class="btn btn-warning">Salvar Alterações</button>
            <a href="alterarPerguntaTexto.php" class="btn btn-secondary">Cancelar</a>
          </div>
        </form>
      </div>
      <?php
      }
      ?>
    </div>
  </div>
  
  <footer class="footer">
    <div class="container">
      <p>Sistema de Jogo Corporativo &copy; 2025 - Water Falls</p>
    </div>
  </footer>
</body>
</html>
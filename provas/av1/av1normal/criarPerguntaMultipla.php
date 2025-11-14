<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Criar Pergunta de Múltipla Escolha</title>
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
      background: linear-gradient(135deg, #2c3e50, #3498db);
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
      border-left: 4px solid #3498db;
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
      color: #3498db;
      transition: all 0.3s ease;
      border-left: 3px solid transparent;
    }
    
    .menu-card a:hover {
      background-color: #e3f2fd;
      border-left-color: #3498db;
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
    .form-group textarea,
    .form-group select {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 1rem;
      transition: border-color 0.3s ease;
    }
    
    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
      border-color: #3498db;
      outline: none;
      box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
    }
    
    .form-group textarea {
      resize: vertical;
      min-height: 100px;
    }
    
    .alternatives-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 15px;
    }
    
    .alternative-item {
      padding: 15px;
      background-color: #f8f9fa;
      border-radius: 4px;
      border-left: 4px solid #3498db;
    }
    
    .btn {
      display: inline-block;
      padding: 12px 25px;
      background-color: #3498db;
      color: white;
      border: none;
      border-radius: 4px;
      font-size: 1rem;
      cursor: pointer;
      transition: background-color 0.3s ease;
      text-decoration: none;
    }
    
    .btn:hover {
      background-color: #2980b9;
    }
    
    .btn-secondary {
      background-color: #95a5a6;
    }
    
    .btn-secondary:hover {
      background-color: #7f8c8d;
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
      <h1>Criar Pergunta de Múltipla Escolha</h1>
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
      <h2>Criar Nova Pergunta de Múltipla Escolha</h2>
      
      <div class="form-container">
        <form action="criarPerguntaMultipla.php" method="post">
          <div class="form-group">
            <label for="numPergunta">Número da Pergunta:</label>
            <input type="text" id="numPergunta" name="numPergunta" required>
          </div>
          
          <div class="form-group">
            <label for="pergunta">Pergunta:</label>
            <textarea id="pergunta" name="pergunta" required></textarea>
          </div>
          
          <div class="alternatives-grid">
            <div class="alternative-item">
              <div class="form-group">
                <label for="alternativaA">Alternativa A:</label>
                <input type="text" id="alternativaA" name="alternativaA" required>
              </div>
            </div>
            
            <div class="alternative-item">
              <div class="form-group">
                <label for="alternativaB">Alternativa B:</label>
                <input type="text" id="alternativaB" name="alternativaB" required>
              </div>
            </div>
            
            <div class="alternative-item">
              <div class="form-group">
                <label for="alternativaC">Alternativa C:</label>
                <input type="text" id="alternativaC" name="alternativaC" required>
              </div>
            </div>
            
            <div class="alternative-item">
              <div class="form-group">
                <label for="alternativaD">Alternativa D:</label>
                <input type="text" id="alternativaD" name="alternativaD" required>
              </div>
            </div>
            
            <div class="alternative-item">
              <div class="form-group">
                <label for="alternativaE">Alternativa E:</label>
                <input type="text" id="alternativaE" name="alternativaE" required>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <label for="alternativaGabarito">Gabarito (A, B, C, D ou E):</label>
            <select id="alternativaGabarito" name="alternativaGabarito" required>
              <option value="">Selecione a alternativa correta</option>
              <option value="A">Alternativa A</option>
              <option value="B">Alternativa B</option>
              <option value="C">Alternativa C</option>
              <option value="D">Alternativa D</option>
              <option value="E">Alternativa E</option>
            </select>
          </div>
          
          <div class="form-group">
            <button type="submit" class="btn">Criar Pergunta</button>
            <a href="index.html" class="btn btn-secondary">Cancelar</a>
          </div>
        </form>

        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
          $numPergunta = $_POST["numPergunta"];
          $pergunta = $_POST["pergunta"]; 
          $altA = $_POST["alternativaA"];
          $altB = $_POST["alternativaB"];
          $altC = $_POST["alternativaC"];
          $altD = $_POST["alternativaD"];
          $altE = $_POST["alternativaE"];
          $altGabarito = $_POST["alternativaGabarito"];
          
          if(!file_exists("perguntasMultiplaEscolha.txt"))
          {
            $arquivo = fopen("perguntasMultiplaEscolha.txt", "w");
            fwrite($arquivo, "numPergunta;pergunta;alternativaA;alternativaB;alternativaC;alternativaD;alternativaE;alternativaGabarito\n");
            fclose($arquivo);
          }
          
          $numeroExiste = false;
          $arquivo = fopen("perguntasMultiplaEscolha.txt", "r");
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
              
              if(isset($dados[0]) && $dados[0] == $numPergunta)
              {
                $numeroExiste = true;
                break;
              }
            }
          }
          fclose($arquivo);
          
          if($numeroExiste)
          {
            echo "<div class='message error'>Erro: Já existe uma pergunta com este número!</div>";
          }
          else
          {
            $arquivo = fopen("perguntasMultiplaEscolha.txt", "a");
            $linha = $numPergunta . ";" . $pergunta . ";" . $altA . ";" . $altB . ";" . $altC . ";" . $altD . ";" . $altE . ";" . $altGabarito . "\n";
            
            $resultado = fwrite($arquivo, $linha);
            fclose($arquivo);
            
            if($resultado)
            {
              echo "<div class='message success'>Pergunta cadastrada com sucesso!</div>";
            }
            else
            {
              echo "<div class='message error'>Erro ao salvar a pergunta. Verifique as permissões do arquivo.</div>";
            }
          }
        }
        ?>
      </div>
    </div>
  </div>
  
  <footer class="footer">
    <div class="container">
      <p>Sistema de Jogo Corporativo &copy; 2025 - Water Falls</p>
    </div>
  </footer>
</body>
</html>
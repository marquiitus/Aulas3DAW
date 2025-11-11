<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buscar uma Pergunta</title>
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
    
    .search-form {
      max-width: 600px;
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
    .form-group select {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 1rem;
      transition: border-color 0.3s ease;
    }
    
    .form-group input:focus,
    .form-group select:focus {
      border-color: #3498db;
      outline: none;
      box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
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
    
    table {
      border-collapse: collapse;
      width: 100%;
      margin: 20px 0;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }
    
    th, td {
      border: 1px solid #e1e1e1;
      padding: 12px 15px;
      text-align: left;
    }
    
    th {
      background-color: #3498db;
      color: white;
      font-weight: 600;
    }
    
    tr:nth-child(even) {
      background-color: #f8f9fa;
    }
    
    tr:hover {
      background-color: #f1f9ff;
    }
    
    .result-section {
      margin-top: 30px;
    }
    
    .no-results {
      text-align: center;
      padding: 20px;
      color: #7f8c8d;
      font-style: italic;
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
      
      table {
        display: block;
        overflow-x: auto;
      }
    }
  </style>
</head>
<body>
  <header>
    <div class="container">
      <h1>Buscar uma Pergunta</h1>
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
      <h2>Buscar Pergunta</h2>
      <form action="listarPergunta.php" method="post" class="search-form">
        <div class="form-group">
          <label for="tipoPergunta">Tipo de Pergunta:</label>
          <select id="tipoPergunta" name="tipoPergunta" required>
            <option value="">Selecione o tipo</option>
            <option value="multipla">Múltipla Escolha</option>
            <option value="texto">Texto</option>
          </select>
        </div>
        
        <div class="form-group">
          <label for="numPergunta">Número da Pergunta:</label>
          <input type="text" id="numPergunta" name="numPergunta" required>
        </div>
        
        <button type="submit" class="btn">Buscar Pergunta</button>
      </form>

      <?php
      if($_SERVER['REQUEST_METHOD'] == 'POST') 
      {
        $numPergunta = $_POST['numPergunta'];
        $tipoPergunta = $_POST['tipoPergunta'];
        $encontrada = false;
        
        echo "<div class='result-section'>";
        echo "<h2>Resultado da Busca</h2>";
        
        if($tipoPergunta == "multipla")
        {
          if(file_exists("perguntasMultiplaEscolha.txt"))
          {
            $arquivo = fopen("perguntasMultiplaEscolha.txt", "r");
            $cabecalho = true;
            
            echo "<table>";
            echo "<tr>
                    <th>Tipo</th>
                    <th>Número</th>
                    <th>Pergunta</th>
                    <th>Opção A</th>
                    <th>Opção B</th>
                    <th>Opção C</th>
                    <th>Opção D</th>
                    <th>Opção E</th>
                    <th>Gabarito</th>
                  </tr>";
            
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
                  echo "<tr>";
                  echo "<td>Múltipla Escolha</td>";
                  echo "<td>" . (isset($dados[0]) ? $dados[0] : '') . "</td>";
                  echo "<td>" . (isset($dados[1]) ? $dados[1] : '') . "</td>";
                  echo "<td>" . (isset($dados[2]) ? $dados[2] : '') . "</td>";
                  echo "<td>" . (isset($dados[3]) ? $dados[3] : '') . "</td>";
                  echo "<td>" . (isset($dados[4]) ? $dados[4] : '') . "</td>";
                  echo "<td>" . (isset($dados[5]) ? $dados[5] : '') . "</td>";
                  echo "<td>" . (isset($dados[6]) ? $dados[6] : '') . "</td>";
                  echo "<td>" . (isset($dados[7]) ? $dados[7] : '') . "</td>";
                  echo "</tr>";
                  $encontrada = true;
                  break;
                }
              }
            }
            
            fclose($arquivo);
            
            if(!$encontrada)
              echo "<tr><td colspan='9' class='no-results'>Pergunta não encontrada no arquivo de múltipla escolha</td></tr>";
    
            echo "</table>";
          }
          else
            echo "<p class='no-results'>Arquivo de perguntas de múltipla escolha não encontrado</p>";
          
        }
        elseif($tipoPergunta == "texto")
        {
          if(file_exists("perguntasTexto.txt"))
          {
            $arquivo = fopen("perguntasTexto.txt", "r");
            $cabecalho = true;
            
            echo "<table>";
            echo "<tr>
                    <th>Tipo</th>
                    <th>Número</th>
                    <th>Pergunta</th>
                    <th>Resposta Gabarito</th>
                  </tr>";
            
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
                  echo "<tr>";
                  echo "<td>Texto</td>";
                  echo "<td>" . (isset($dados[0]) ? $dados[0] : '') . "</td>";
                  echo "<td>" . (isset($dados[1]) ? $dados[1] : '') . "</td>";
                  echo "<td>" . (isset($dados[2]) ? $dados[2] : '') . "</td>";
                  echo "</tr>";
                  $encontrada = true;
                  break;
                }
              }
            }
            
            fclose($arquivo);
            
            if(!$encontrada)
              echo "<tr><td colspan='4' class='no-results'>Pergunta não encontrada no arquivo de texto</td></tr>";
            
            echo "</table>";
          }
          else
            echo "<p class='no-results'>Arquivo de perguntas de texto não encontrado</p>";
          
        }
        
        echo "</div>";
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
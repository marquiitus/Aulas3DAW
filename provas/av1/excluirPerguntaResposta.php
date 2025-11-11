<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Excluir Pergunta e Resposta</title>
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
      background: linear-gradient(135deg, #2c3e50, #e74c3c);
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
      border-left: 4px solid #e74c3c;
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
      color: #e74c3c;
      transition: all 0.3s ease;
      border-left: 3px solid transparent;
    }
    
    .menu-card a:hover {
      background-color: #fdedec;
      border-left-color: #e74c3c;
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
      border-color: #e74c3c;
      outline: none;
      box-shadow: 0 0 0 2px rgba(231, 76, 60, 0.2);
    }
    
    .btn {
      display: inline-block;
      padding: 12px 25px;
      background-color: #e74c3c;
      color: white;
      border: none;
      border-radius: 4px;
      font-size: 1rem;
      cursor: pointer;
      transition: background-color 0.3s ease;
      text-decoration: none;
    }
    
    .btn:hover {
      background-color: #c0392b;
    }
    
    .btn-secondary {
      background-color: #95a5a6;
    }
    
    .btn-secondary:hover {
      background-color: #7f8c8d;
    }
    
    .warning-box {
      background-color: #fdedec;
      border: 1px solid #e74c3c;
      border-radius: 4px;
      padding: 15px;
      margin-bottom: 20px;
    }
    
    .warning-box h4 {
      color: #c0392b;
      margin-bottom: 10px;
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
      <h1>Excluir Pergunta e Resposta</h1>
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
      <h2>Excluir Pergunta</h2>
      
      <div class="warning-box">
        <h4>Atenção!</h4>
        <p>Esta ação é irreversível. Ao excluir uma pergunta, todos os dados associados a ela serão permanentemente removidos do sistema.</p>
      </div>
      
      <div class="form-container">
        <form action="excluirPerguntaResposta.php" method="post">
          <div class="form-group">
            <label for="tipoPergunta">Tipo de Pergunta:</label>
            <select id="tipoPergunta" name="tipoPergunta" required>
              <option value="">Selecione o tipo</option>
              <option value="multipla">Múltipla Escolha</option>
              <option value="texto">Texto</option>
            </select>
          </div>
          
          <div class="form-group">
            <label for="numPergunta">Número da Pergunta a ser excluída:</label>
            <input type="text" id="numPergunta" name="numPergunta" required>
          </div>
          
          <div class="form-group">
            <button type="submit" class="btn" onclick="return confirm('Tem certeza que deseja excluir esta pergunta? Esta ação não pode ser desfeita.')">Excluir Pergunta</button>
            <a href="index.html" class="btn btn-secondary">Cancelar</a>
          </div>
        </form>

        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
          $tipoPergunta = $_POST['tipoPergunta'];
          $numPergunta = $_POST['numPergunta'];
          $msg = "";
          
          if($tipoPergunta == "multipla")
          {
            $arquivoNome = "perguntasMultiplaEscolha.txt";
            $tipoTexto = "de múltipla escolha";
          }
          elseif($tipoPergunta == "texto")
          {
            $arquivoNome = "perguntasTexto.txt";
            $tipoTexto = "de texto";
          }
          else
          {
            echo "<div class='message error'>Erro: Tipo de pergunta inválido!</div>";
            exit;
          }
          
          if(!file_exists($arquivoNome)) 
            echo "<div class='message error'>Arquivo de perguntas $tipoTexto não encontrado!</div>";
          else 
          {
            $arquivoTempNome = "temp_" . $arquivoNome;
            $perguntaEncontrada = false;
            
            $arquivo = fopen($arquivoNome, "r") or die("Erro ao abrir arquivo para leitura");
            $arquivoTemp = fopen($arquivoTempNome, "w") or die("Erro ao abrir arquivo temporário para escrita");
            
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
              
              if(trim($linha) == "") 
                continue;
              
              $dados = explode(";", $linha);
              
              if(isset($dados[0]) && trim($dados[0]) != $numPergunta) 
                fwrite($arquivoTemp, $linha);
              else
                $perguntaEncontrada = true;
            }
            
            fclose($arquivoTemp);
            fclose($arquivo);
            
            if($perguntaEncontrada)
            {
              unlink($arquivoNome);
              if(rename($arquivoTempNome, $arquivoNome)) 
                echo "<div class='message success'>Pergunta $tipoTexto excluída com sucesso!</div>";
              else
                echo "<div class='message error'>Erro ao excluir a pergunta. Tente novamente.</div>";
            }
            else
            {
              unlink($arquivoTempNome);
              echo "<div class='message error'>Pergunta não encontrada no arquivo de $tipoTexto!</div>";
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
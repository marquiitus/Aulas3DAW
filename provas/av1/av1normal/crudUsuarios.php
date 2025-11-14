<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD Usuários</title>
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
      background: linear-gradient(135deg, #2c3e50, #9b59b6);
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
      border-left: 4px solid #9b59b6;
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
      color: #9b59b6;
      transition: all 0.3s ease;
      border-left: 3px solid transparent;
    }
    
    .menu-card a:hover {
      background-color: #f4ecf7;
      border-left-color: #9b59b6;
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
    
    .form-group input {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 1rem;
      transition: border-color 0.3s ease;
    }
    
    .form-group input:focus {
      border-color: #9b59b6;
      outline: none;
      box-shadow: 0 0 0 2px rgba(155, 89, 182, 0.2);
    }
    
    .btn {
      display: inline-block;
      padding: 12px 25px;
      background-color: #9b59b6;
      color: white;
      border: none;
      border-radius: 4px;
      font-size: 1rem;
      cursor: pointer;
      transition: background-color 0.3s ease;
      text-decoration: none;
    }
    
    .btn:hover {
      background-color: #8e44ad;
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
    
    .btn-danger {
      background-color: #e74c3c;
    }
    
    .btn-danger:hover {
      background-color: #c0392b;
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
      background-color: #9b59b6;
      color: white;
      font-weight: 600;
    }
    
    tr:nth-child(even) {
      background-color: #f8f9fa;
    }
    
    tr:hover {
      background-color: #f4ecf7;
    }
    
    .actions a {
      display: inline-block;
      padding: 5px 10px;
      margin-right: 5px;
      border-radius: 4px;
      text-decoration: none;
      font-size: 0.85rem;
      transition: all 0.3s ease;
    }
    
    .btn-edit {
      background-color: #f39c12;
      color: white;
    }
    
    .btn-edit:hover {
      background-color: #e67e22;
    }
    
    .btn-delete {
      background-color: #e74c3c;
      color: white;
    }
    
    .btn-delete:hover {
      background-color: #c0392b;
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
    
    .empty-message {
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
      <h1>Gerenciar Usuários</h1>
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
      <h2><?php echo (isset($_GET['acao']) && $_GET['acao'] == 'editar') ? 'Alterar Usuário' : 'Novo Usuário'; ?></h2>
      
      <div class="form-container">
        <form action="crudUsuarios.php" method="post">
          <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" id="id" name="id" 
                   value="<?php echo isset($id) ? $id : ''; ?>" 
                   <?php echo (isset($_GET['acao']) && $_GET['acao'] == 'editar') ? 'readonly' : ''; ?> 
                   required>
          </div>
          
          <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" 
                   value="<?php echo isset($nome) ? $nome : ''; ?>" 
                   required>
          </div>
          
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" 
                   value="<?php echo isset($email) ? $email : ''; ?>" 
                   required>
          </div>
          
          <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" 
                   value="<?php echo isset($senha) ? $senha : ''; ?>" 
                   <?php echo (!isset($_GET['acao']) || $_GET['acao'] != 'editar') ? 'required' : ''; ?>>
            <?php if(isset($_GET['acao']) && $_GET['acao'] == 'editar'): ?>
              <small>Deixe em branco para manter a senha atual</small>
            <?php endif; ?>
          </div>
          
          <div class="form-group">
            <button type="submit" name="salvar" class="btn">Salvar</button>
            <a href="crudUsuarios.php" class="btn btn-secondary">Cancelar</a>
          </div>
        </form>
      </div>
    </div>

    <div class="content-section">
      <h2>Lista de Usuários</h2>
      
      <table>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Ações</th>
        </tr>

        <?php
        $arquivoNome = "usuarios.txt";
        $id = '';
        $nome = '';
        $email = '';
        $senha = '';
        
        if (!file_exists($arquivoNome)) {
          $handle = fopen($arquivoNome, 'w');
          fwrite($handle, "id;nome;email;senha\n");
          fclose($handle);
        }
        
        if (isset($_GET['acao']) && $_GET['acao'] == 'excluir') {
          $idExcluir = $_GET['id'];
          $linhas = file($arquivoNome);
          $arquivo = fopen($arquivoNome, 'w');
          $cabecalho = true;
          
          foreach($linhas as $linha) {
            if($cabecalho) {
              fwrite($arquivo, $linha);
              $cabecalho = false;
              continue;
            }
            
            $dados = explode(";", $linha);
            if (trim($dados[0]) != $idExcluir) 
              fwrite($arquivo, $linha);
          }
          fclose($arquivo);
          echo "<div class='message success'>Usuário excluído com sucesso!</div>";
        }
        
        if (isset($_GET['acao']) && $_GET['acao'] == 'editar') 
        {
          $idEditar = $_GET['id'];
          $linhas = file($arquivoNome);
          $cabecalho = true;
          
          foreach($linhas as $linha) 
          {
            if($cabecalho)
            {
              $cabecalho = false;
              continue;
            }
            
            $dados = explode(";", $linha);
            if (trim($dados[0]) == $idEditar) 
            {
              $id = $dados[0];
              $nome = $dados[1];
              $email = $dados[2];
              $senha = $dados[3];
              break;
            }
          }
        }
        
        if (isset($_POST['salvar'])) {
          $id = $_POST['id'];
          $nome = $_POST['nome'];
          $email = $_POST['email'];
          $novaSenha = $_POST['senha'];
          
          $linhas = file($arquivoNome);
          $arquivo = fopen($arquivoNome, 'w');
          $idJaExiste = false;
          $cabecalho = true;
          
          foreach($linhas as $linha) 
          {
            if($cabecalho) 
            {
              fwrite($arquivo, $linha);
              $cabecalho = false;
              continue;
            }
            
            $dados = explode(";", $linha);
            if (trim($dados[0]) == $id) 
            {
              $senhaParaSalvar = empty($novaSenha) ? trim($dados[3]) : $novaSenha;
              $linhaNova = $id . ";" . $nome . ";" . $email . ";" . $senhaParaSalvar . "\n";
              fwrite($arquivo, $linhaNova);
              $idJaExiste = true;
            } else 
              fwrite($arquivo, $linha);
          }
          
          if (!$idJaExiste) 
          {
            $linhaNova = $id . ";" . $nome . ";" . $email . ";" . $novaSenha . "\n";
            fwrite($arquivo, $linhaNova);
          }
          
          fclose($arquivo);
          echo "<div class='message success'>Usuário salvo com sucesso!</div>";
          
          if(!isset($_GET['acao']) || $_GET['acao'] != 'editar') 
          {
            $id = '';
            $nome = '';
            $email = '';
            $senha = '';
          }
        }
        
        if(file_exists($arquivoNome)) 
        {
          $arquivo = fopen($arquivoNome, "r");
          $cabecalho = true;
          $temUsuarios = false;
          
          while(!feof($arquivo)) 
          {
            $linha = fgets($arquivo);
            
            if($cabecalho) 
            {
              $cabecalho = false;
              continue;
            }
            
            if (trim($linha) != "") 
            {
              $dados = explode(";", $linha);
              echo "<tr>";
              echo "<td>" . $dados[0] . "</td>";
              echo "<td>" . $dados[1] . "</td>";
              echo "<td>" . $dados[2] . "</td>";
              echo "<td class='actions'>";
              echo "<a href='crudUsuarios.php?acao=editar&id=" . $dados[0] . "' class='btn-edit'>Editar</a>";
              echo "<a href='crudUsuarios.php?acao=excluir&id=" . $dados[0] . "' class='btn-delete' onclick='return confirm(\"Tem certeza que deseja excluir este usuário?\")'>Excluir</a>";
              echo "</td>";
              echo "</tr>";
              $temUsuarios = true;
            }
          }
          fclose($arquivo);
          
          if(!$temUsuarios) 
            echo "<tr><td colspan='4' class='empty-message'>Nenhum usuário cadastrado</td></tr>";          
        }
        ?>
      </table>
    </div>
  </div>
  
  <footer class="footer">
    <div class="container">
      <p>Sistema de Jogo Corporativo &copy; 2025 - Water Falls</p>
    </div>
  </footer>
</body>
</html>
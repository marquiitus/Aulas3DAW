<?php
include 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buscar uma Pergunta</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="header header-pergunta-detalhe">
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
        
        echo "<div class='result-section'>";
        echo "<h2>Resultado da Busca</h2>";
        
        if($tipoPergunta == "multipla")
        {
          try {
            $stmt = $pdo->prepare("SELECT * FROM perguntas_multipla_escolha WHERE numero_pergunta = ?");
            $stmt->execute([$numPergunta]);
            $pergunta = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($pergunta) {
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
              echo "<tr>";
              echo "<td>Múltipla Escolha</td>";
              echo "<td>{$pergunta['numero_pergunta']}</td>";
              echo "<td>{$pergunta['pergunta']}</td>";
              echo "<td>{$pergunta['alternativa_a']}</td>";
              echo "<td>{$pergunta['alternativa_b']}</td>";
              echo "<td>{$pergunta['alternativa_c']}</td>";
              echo "<td>{$pergunta['alternativa_d']}</td>";
              echo "<td>{$pergunta['alternativa_e']}</td>";
              echo "<td>{$pergunta['alternativa_gabarito']}</td>";
              echo "</tr>";
              echo "</table>";
            } else {
              echo "<p class='no-results'>Pergunta não encontrada no banco de dados</p>";
            }
          } catch (PDOException $e) {
            echo "<p class='no-results'>Erro ao buscar pergunta: " . $e->getMessage() . "</p>";
          }
        }
        elseif($tipoPergunta == "texto")
        {
          try {
            $stmt = $pdo->prepare("SELECT * FROM perguntas_texto WHERE numero_pergunta = ?");
            $stmt->execute([$numPergunta]);
            $pergunta = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($pergunta) {
              echo "<table>";
              echo "<tr>
                      <th>Tipo</th>
                      <th>Número</th>
                      <th>Pergunta</th>
                      <th>Resposta Gabarito</th>
                    </tr>";
              echo "<tr>";
              echo "<td>Texto</td>";
              echo "<td>{$pergunta['numero_pergunta']}</td>";
              echo "<td>{$pergunta['pergunta']}</td>";
              echo "<td>{$pergunta['resposta_gabarito']}</td>";
              echo "</tr>";
              echo "</table>";
            } else {
              echo "<p class='no-results'>Pergunta não encontrada no banco de dados</p>";
            }
          } catch (PDOException $e) {
            echo "<p class='no-results'>Erro ao buscar pergunta: " . $e->getMessage() . "</p>";
          }
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
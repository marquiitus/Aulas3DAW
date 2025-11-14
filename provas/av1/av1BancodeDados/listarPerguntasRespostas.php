<?php
include 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listar Todas as Perguntas e Respostas</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="header header-perguntas">
    <div class="container">
      <h1>Listar Todas as Perguntas e Respostas</h1>
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
      <h2>Perguntas de Múltipla Escolha</h2>
      <table>
        <tr>
          <th>Tipo</th>
          <th>Número da Pergunta</th>
          <th>Pergunta</th>
          <th>Opção A</th>
          <th>Opção B</th>
          <th>Opção C</th>
          <th>Opção D</th>
          <th>Opção E</th>
          <th>Gabarito</th>
          <th>Ações</th>
        </tr>
        <?php
        try {
            $stmt = $pdo->query("SELECT * FROM perguntas_multipla_escolha");
            $perguntasMultipla = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($perguntasMultipla) > 0) {
                foreach ($perguntasMultipla as $pergunta) {
                    echo "<tr class='tipo-multipla'>";
                    echo "<td>Múltipla Escolha</td>";
                    echo "<td>{$pergunta['numero_pergunta']}</td>";
                    echo "<td>{$pergunta['pergunta']}</td>";
                    echo "<td>{$pergunta['alternativa_a']}</td>";
                    echo "<td>{$pergunta['alternativa_b']}</td>";
                    echo "<td>{$pergunta['alternativa_c']}</td>";
                    echo "<td>{$pergunta['alternativa_d']}</td>";
                    echo "<td>{$pergunta['alternativa_e']}</td>";
                    echo "<td>{$pergunta['alternativa_gabarito']}</td>";
                    echo "<td class='actions'>";
                    echo "<a href='alterarPerguntaMultipla.php?numPergunta={$pergunta['numero_pergunta']}' class='btn-edit'>Editar</a>";
                    echo "<a href='excluirPerguntaResposta.php?numPergunta={$pergunta['numero_pergunta']}&tipo=multipla' class='btn-delete' onclick='return confirm(\"Tem certeza?\")'>Excluir</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='10' class='empty-message'>Nenhuma pergunta de múltipla escolha cadastrada</td></tr>";
            }
        } catch (PDOException $e) {
            echo "<tr><td colspan='10' class='empty-message'>Erro ao carregar perguntas: " . $e->getMessage() . "</td></tr>";
        }
        ?>
      </table>
    </div>

    <div class="content-section">
      <h2>Perguntas de Texto</h2>
      <table>
        <tr>
          <th>Tipo</th>
          <th>Número da Pergunta</th>
          <th>Pergunta</th>
          <th>Resposta Gabarito</th>
          <th>Ações</th>
        </tr>
        <?php
        try {
            $stmt = $pdo->query("SELECT * FROM perguntas_texto");
            $perguntasTexto = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($perguntasTexto) > 0) {
                foreach ($perguntasTexto as $pergunta) {
                    echo "<tr class='tipo-texto'>";
                    echo "<td>Texto</td>";
                    echo "<td>{$pergunta['numero_pergunta']}</td>";
                    echo "<td>{$pergunta['pergunta']}</td>";
                    echo "<td>{$pergunta['resposta_gabarito']}</td>";
                    echo "<td class='actions'>";
                    echo "<a href='alterarPerguntaTexto.php?numPergunta={$pergunta['numero_pergunta']}' class='btn-edit'>Editar</a>";
                    echo "<a href='excluirPerguntaResposta.php?numPergunta={$pergunta['numero_pergunta']}&tipo=texto' class='btn-delete' onclick='return confirm(\"Tem certeza?\")'>Excluir</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5' class='empty-message'>Nenhuma pergunta de texto cadastrada</td></tr>";
            }
        } catch (PDOException $e) {
            echo "<tr><td colspan='5' class='empty-message'>Erro ao carregar perguntas: " . $e->getMessage() . "</td></tr>";
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
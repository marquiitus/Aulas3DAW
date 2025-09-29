<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listar Uma Pergunta</title>
</head>
<body>
  <ul>
    <li><a href="index.html">Home</a></li>
    <li><a href="criarPerguntaMultipla.php">Criar Perguntas e Respostas de Múltipla Escolha</a></li>
    <li><a href="criarPerguntaTexto.php">Criar Perguntas e Respostas de Texto</a></li>
    <li><a href="alterarPerguntaMultipla.php">Alterar Perguntas e Respostas de Múltipla Escolha</a></li>
    <li><a href="alterarPerguntaTexto.php">Alterar Perguntas e Respostas de Texto</a></li>
    <li><a href="listarPerguntasRespostas.php">Listar Perguntas e Respostas</a></li>
    <li><a href="listarPergunta.php">Listar uma Pergunta</a></li>
    <li><a href="excluirPerguntaResposta.php">Excluir Pergunta e respostas</a></li>
    <li><a href="crudUsuarios.php">CRUD Usuários</a></li>
  </ul>

  <form action="listarPergunta.php" method="post">
    <label>Insira o número da sua pergunta:</label>
    <input type="text" id="numPergunta" name="numPergunta"><br>

    <input type="submit" value="enviar">
  </form>

  <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      $numPergunta = $_POST['numPergunta'];

      $arquivo = fopen("perguntasRespostas.txt", "r");

      echo "<br><table border='1'>";
      echo "<tr>
              <th>Número</th>
              <th>Pergunta</th>
              <th>Opção A</th>
              <th>Opção B</th>
              <th>Opção C</th>
              <th>Opção D</th>
              <th>Opção E</th>
              <th>Gabarito</th>
            </tr>";

      while(!feof($arquivo)) {
        $linha = fgets($arquivo);
        $dados = explode(";", $linha);
        
        if($dados[0] == $numPergunta) {
          echo "<tr>";
          echo "<td>$dados[0]</td>";
          echo "<td>$dados[1]</td>";
          echo "<td>$dados[2]</td>";
          echo "<td>$dados[3]</td>";
          echo "<td>$dados[4]</td>";
          echo "<td>$dados[5]</td>";
          echo "<td>$dados[6]</td>";
          echo "<td>$dados[7]</td>";
          echo "</tr>";
        }
      }
      
      fclose($arquivo);
      echo "</table>";
    }
  ?>
</body>
</html>
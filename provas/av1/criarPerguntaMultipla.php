<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Criar Pergunta Múltipla</title>
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

  <h2>Criar Pergunta de Múltipla Escolha</h2>

  <form action="criarPerguntaMultipla.php" method="post">
    <b>Número da Pergunta:</b><br>
    <input type="text" name="numPergunta"><br>
    <b>Pergunta:</b><br>
    <input type="text" name="pergunta" size="50"><br>
    <b>Alternativa A:</b><br>
    <input type="text" name="alternativaA" size="50"><br>
    <b>Alternativa B:</b><br>
    <input type="text" name="alternativaB" size="50"><br>
    <b>Alternativa C:</b><br>
    <input type="text" name="alternativaC" size="50"><br>
    <b>Alternativa D:</b><br>
    <input type="text" name="alternativaD" size="50"><br>
    <b>Alternativa E:</b><br>
    <input type="text" name="alternativaE" size="50"><br>
    <b>Gabarito (A, B, C, D ou E):</b><br>
    <input type="text" name="alternativaGabarito" size="10">
    <br><br>
    <input type="submit" value="Criar Pergunta">
  </form>

  <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      $numPergunta = $_POST["numPergunta"];
      $pergunta = $_POST["pergunta"]; 
      $altA = $_POST["alternativaA"];
      $altB = $_POST["alternativaB"];
      $altC = $_POST["alternativaC"];
      $altD = $_POST["alternativaD"];
      $altE = $_POST["alternativaE"];
      $altGabarito = $_POST["alternativaGabarito"];

      $arquivo = fopen("perguntasRespostas.txt", "a");
      $linha = $numPergunta . ";" . $pergunta . ";" . $altA . ";" . $altB . ";" . $altC . ";" . $altD . ";" . $altE . ";" . $altGabarito . "\n";

      fwrite($arquivo, $linha);
      fclose($arquivo);
      echo "<br><b>Pergunta cadastrada com sucesso!</b>";
    }
  ?>
</body>
</html>
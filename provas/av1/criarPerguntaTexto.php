<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alterar Pergunta Texto</title>
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

  <form action="criarPerguntaTexto.php" method="post">
    NUMPERGUNTA:<input type="text" name="numPergunta">
    PERGUNTA:<input type="text" name="pergunta"><br>
    (A)<input type="text" name="alternativaA"><br>
    (B)<input type="text" name="alternativaB"><br>
    (C)<input type="text" name="alternativaC"><br>
    (D)<input type="text" name="alternativaD"><br>
    (E)<input type="text" name="alternativaE"><br>
    Alternativa correta:<input type="text" name="alternativaGabarito">

    <input type="submit" value="Enviar">
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

      $arquivo = fopen("perguntasRespostas.txt", "a") or die ("ERRO");
      $linha = $numPergunta . ";" . $pergunta . ";" . $altA . ";" . $altB . ";" . $altC . ";" . $altD . ";" . $altE . ";" . $altGabarito . "\n";

      fwrite($arquivo, $linha);
      fclose($arquivo);
      echo "Pergunta Cadastratada com sucesso";
    }
  ?>
</body>
</html>
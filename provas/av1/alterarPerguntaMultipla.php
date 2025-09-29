<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alterar Pergunta Múltipla</title>
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

  <h2>Alterar Pergunta</h2>

  <?php
    $numPerguntaBusca = $_POST['numPerguntaBusca'];
    $mostrarFormularioEdicao = false;

    if ($_POST['salvarAlteracoes']) {
      $numPergunta = $_POST["numPergunta"];
      $pergunta = $_POST["pergunta"];
      $altA = $_POST["alternativaA"];
      $altB = $_POST["alternativaB"];
      $altC = $_POST["alternativaC"];
      $altD = $_POST["alternativaD"];
      $altE = $_POST["alternativaE"];
      $altGabarito = $_POST["alternativaGabarito"];

      $arquivo = fopen("perguntasRespostas.txt", "r");
      $arquivoTemp = fopen("temp.txt", "w");

      while (!feof($arquivo)) {
        $linha = fgets($arquivo);
        $dados = explode(";", $linha);
        
        if (trim($dados[0]) == $numPergunta) {
          $linhaNova = $numPergunta . ";" . $pergunta . ";" . $altA . ";" . $altB . ";" . $altC . ";" . $altD . ";" . $altE . ";" . $altGabarito . "\n";
          fwrite($arquivoTemp, $linhaNova);
        } else 
          fwrite($arquivoTemp, $linha);
      }

      fclose($arquivo);
      fclose($arquivoTemp);

      unlink("perguntasRespostas.txt");
      rename("temp.txt", "perguntasRespostas.txt");

      echo "<b>Pergunta alterada com sucesso!</b>";
    }
  ?>

  <form action="alterarPerguntaMultipla.php" method="post">
    <label>Número da Pergunta a ser alterada:</label>
    <input type="text" name="numPerguntaBusca" value="<?php echo $numPerguntaBusca; ?>">
    <input type="submit" name="buscarPergunta" value="Buscar">
  </form>
  <hr>

  <?php
    if ($numPerguntaBusca) {
      $arquivo = fopen("perguntasRespostas.txt", "r");
      while (!feof($arquivo)) {
        $linha = fgets($arquivo);
        $dados = explode(";", $linha);
        if (trim($dados[0]) == $numPerguntaBusca) {
          $numPergunta = $dados[0];
          $pergunta = $dados[1];
          $altA = $dados[2];
          $altB = $dados[3];
          $altC = $dados[4];
          $altD = $dados[5];
          $altE = $dados[6];
          $altGabarito = $dados[7];
          $mostrarFormularioEdicao = true;
          break;
        }
      }
      fclose($arquivo);
    }
    
    if ($mostrarFormularioEdicao) {
  ?>
  
  <form action="alterarPerguntaMultipla.php" method="post">
    <input type="hidden" name="numPergunta" value="<?php echo $numPergunta; ?>">
    
    <b>Pergunta:</b><br>
    <input type="text" name="pergunta" size="50" value="<?php echo $pergunta; ?>"><br>
    <b>Alternativa A:</b><br>
    <input type="text" name="alternativaA" size="50" value="<?php echo $altA; ?>"><br>
    <b>Alternativa B:</b><br>
    <input type="text" name="alternativaB" size="50" value="<?php echo $altB; ?>"><br>
    <b>Alternativa C:</b><br>
    <input type="text" name="alternativaC" size="50" value="<?php echo $altC; ?>"><br>
    <b>Alternativa D:</b><br>
    <input type="text" name="alternativaD" size="50" value="<?php echo $altD; ?>"><br>
    <b>Alternativa E:</b><br>
    <input type="text" name="alternativaE" size="50" value="<?php echo $altE; ?>"><br>
    <b>Gabarito (A, B, C, D ou E):</b><br>
    <input type="text" name="alternativaGabarito" size="10" value="<?php echo trim($altGabarito); ?>">

    <br><br>
    <input type="submit" name="salvarAlteracoes" value="Salvar Alterações">
  </form>

  <?php
    } elseif ($numPerguntaBusca) {
      echo "Pergunta não encontrada!";
    }
  ?>
</body>
</html>
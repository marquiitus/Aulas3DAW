<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Excluir Pergunta e Resposta</title>
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

  <form action="excluirPerguntaResposta.php" method="post">
    <label>Insira o número da pergunta para excluir:</label>
    <input type="text" name="numPergunta"><br>
    <input type="submit" value="Excluir">
  </form>

  <?php
    $msg = "";
    $numPergunta = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

      if(!file_exists("perguntasRespostas.txt")) 
        $msg = "Arquivo não existe!";
      else {
        $numPergunta = $_POST['numPergunta'];
        $arquivoTempNome = "perguntasRespostasTemp.txt";
        $arquivoNome = "perguntasRespostas.txt";

        $arquivo = fopen($arquivoNome, "r") or die ("ERRO ao abrir para leitura");
        $arquivoTemp = fopen($arquivoTempNome, "w") or die ("ERRO ao abrir para escrita");

        while(!feof($arquivo)) {
          $linha = fgets($arquivo);
          if(trim($linha) == "") 
            continue;

          $dados = explode(";", $linha);

          if(isset($dados[0]) && trim($dados[0]) != $numPergunta) 
            fwrite($arquivoTemp, $linha);
        }

        fclose($arquivoTemp);
        fclose($arquivo);

        unlink($arquivoNome);
        if(rename($arquivoTempNome, $arquivoNome)) 
          $msg = "Pergunta Excluída com sucesso!";
        else 
          $msg = "ERRO ao excluir a pergunta.";
      }
      echo $msg;
    }
  ?>
</body>
</html>
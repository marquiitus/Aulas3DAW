<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listar Tudo</title>
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

  <h1>Listar Todas as Perguntas e Respostas</h1>

  <table>
    <tr>
      <th>Número da Pergunta</th>
      <th>Pergunta</th>
      <th>Opção A</th>
      <th>Opção B</th>
      <th>Opção C</th>
      <th>Opção D</th>
      <th>Opção E</th>
      <th>Gabarito</th>
    </tr>
  <?php
    $arquivo = fopen("perguntasRespostas.txt", "r") or die ("ERRO");
    $cabecalho = true;

    while(!feof($arquivo)) {
      
      $linha = fgets($arquivo);

      // Pula a primeira linha (cabeçalho)
      if($cabecalho) {
        $cabecalho = false;
        continue;
      }

      if(!empty(trim($linha))) {

        $dados = explode(";", $linha);

        echo "<tr>";
        echo "<td>$dados[0]</td>";  //numero da pergunta
        echo "<td>$dados[1]</td>";  //a pergunta em si
        echo "<td>$dados[2]</td>";  //opção a
        echo "<td>$dados[3]</td>";  //opção b
        echo "<td>$dados[4]</td>";  //opção c
        echo "<td>$dados[5]</td>";  //opção d
        echo "<td>$dados[6]</td>";  //opção e
        echo "<td>$dados[7]</td>";  //gabarito
        echo "</tr>";
      }
    }

    fclose($arquivo);
  ?>
  </table>
</body>
</html>
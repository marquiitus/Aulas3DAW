<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD Usuários</title>
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

  <?php
    $arquivoNome = "usuarios.txt";
    $idEditar = $_GET['id'];
    $acao = $_GET['acao'];

    if (!file_exists($arquivoNome)) {
      $handle = fopen($arquivoNome, 'w');
      fclose($handle);
    }

    if ($_POST['salvar']) {
      $id = $_POST['id'];
      $nome = $_POST['nome'];
      $email = $_POST['email'];
      
      $linhas = file($arquivoNome);
      $arquivo = fopen($arquivoNome, 'w');
      $idJaExiste = false;

      foreach($linhas as $linha) {
        $dados = explode(";", $linha);
        if ($dados[0] == $id) {
          $linhaNova = $id . ";" . $nome . ";" . $email . "\n";
          fwrite($arquivo, $linhaNova);
          $idJaExiste = true;
        } else 
          fwrite($arquivo, $linha);
      }

      if (!$idJaExiste) {
        $linhaNova = $id . ";" . $nome . ";" . $email . "\n";
        fwrite($arquivo, $linhaNova);
      }
      
      fclose($arquivo);
      echo "<b>Usuário salvo com sucesso!</b><br><br>";
    }

    if ($acao == 'excluir') {
      $idExcluir = $_GET['id'];
      $linhas = file($arquivoNome);
      $arquivo = fopen($arquivoNome, 'w');

      foreach($linhas as $linha) {
        $dados = explode(";", $linha);
        if (trim($dados[0]) != $idExcluir) {
          fwrite($arquivo, $linha);
        }
      }
      fclose($arquivo);
      echo "<b>Usuário excluído com sucesso!</b><br><br>";
    }

    if ($acao == 'editar') {
      $linhas = file($arquivoNome);
      foreach($linhas as $linha) {
        $dados = explode(";", $linha);
        if (trim($dados[0]) == $idEditar) {
          $id = $dados[0];
          $nome = $dados[1];
          $email = $dados[2];
        }
      }
    }
  ?>

  <hr>
  <h2><?php echo ($idEditar) ? 'Alterar Usuário' : 'Novo Usuário'; ?></h2>
  <form action="crudUsuarios.php" method="post">
    <b>ID:</b><br>
    <input type="text" name="id" value="<?php echo $id; ?>" <?php if ($idEditar) echo 'readonly'; ?>><br>
    <b>Nome:</b><br>
    <input type="text" name="nome" size="30" value="<?php echo $nome; ?>"><br>
    <b>Email:</b><br>
    <input type="text" name="email" size="30" value="<?php echo $email; ?>"><br><br>
    <input type="submit" name="salvar" value="Salvar">
  </form>
  <hr>

  <h2>Lista de Usuários</h2>
  <table border="1" width="500">
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Email</th>
      <th>Ações</th>
    </tr>
    <?php
      $arquivo = fopen($arquivoNome, "r");
      while(!feof($arquivo)) {
        $linha = fgets($arquivo);
        if (trim($linha) != "") {
          $dados = explode(";", $linha);
          echo "<tr>";
          echo "<td>" . $dados[0] . "</td>";
          echo "<td>" . $dados[1] . "</td>";
          echo "<td>" . $dados[2] . "</td>";
          echo "<td>
            <a href='crudUsuarios.php?acao=editar&id=" . $dados[0] . "'>Editar</a> | 
            <a href='crudUsuarios.php?acao=excluir&id=" . $dados[0] . "' onclick='return confirm(\"Tem certeza?\")'>Excluir</a>
            </td>";
          echo "</tr>";
        }
      }
      fclose($arquivo);
    ?>
  </table>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Incluir Disciplina</title>
</head>
<body>
  <h1>Incluir Nova Disciplina</h1>
  <a href="listarTodas.php">← Voltar para a lista</a>

  <form method="post">
    <p>
      <label>Nome:</label><br>
      <input type="text" name="nome" required>
    </p>
    <p>
      <label>Sigla:</label><br>
      <input type="text" name="sigla" required>
    </p>
    <p>
      <label>Carga Horária:</label><br>
      <input type="number" name="carga" required>
    </p>
    <p>
      <input type="submit" value="Salvar">
      <a href="listarTodasDisciplinas.php">Cancelar</a>
    </p>
  </form>

  <?php
  if ($_POST)
  {
    $nome = $_POST['nome'];
    $sigla = $_POST['sigla'];
    $carga = $_POST['carga'];
    $arquivo = fopen("disciplinas.txt", "r");
    $existe = false;
    
    fgets($arquivo);
    
    while(!feof($arquivo))
    {
      $linha = fgets($arquivo);
      $linha = trim($linha);
      
      if(!empty($linha))
      {
        $dados = explode(";", $linha);
        
        if($dados[1] == $sigla)
        {
          $existe = true;
          break;
        }
      }
    }
    fclose($arquivo);
    
    if($existe)
    {
      echo "<p style='color: red;'>Erro: Sigla já existe!</p>";
    }
    else
    {
      $arquivo = fopen("disciplinas.txt", "a");
      $nova_disciplina = "\n$nome;$sigla;$carga";
      fwrite($arquivo, $nova_disciplina);
      fclose($arquivo);
      
      header("Location: listarTodas.php");
    }
  }
  ?>
</body>
</html>
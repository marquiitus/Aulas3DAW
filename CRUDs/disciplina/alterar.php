<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alterar Disciplina</title>
</head>
<body>
  <h1>Alterar Disciplina</h1>
  
  <?php
  $sigla = $_GET['sigla'];
  $encontrado = false;
  $nome = "";
  $carga = "";
  
  $arquivo = fopen("disciplinas.txt", "r");
  
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
        $nome = $dados[0];
        $carga = $dados[2];
        $encontrado = true;
        break;
      }
    }
  }
  fclose($arquivo);
  
  if(!$encontrado)
  {
    echo "<p>Disciplina não encontrada!</p>";
    echo "<a href='listarTodas.php'>Voltar</a>";
    exit;
  }
  ?>
  
  <form method="post">
    <p>
      <label>Nome:</label><br>
      <input type="text" name="nome" value="<?php echo $nome; ?>" required>
    </p>
    <p>
      <label>Sigla:</label><br>
      <input type="text" name="sigla" value="<?php echo $sigla; ?>" readonly>
    </p>
    <p>
      <label>Carga Horária:</label><br>
      <input type="number" name="carga" value="<?php echo $carga; ?>" required>
    </p>
    <p>
      <input type="submit" value="Atualizar">
      <a href="listarTodas.php">Cancelar</a>
    </p>
  </form>

  <?php
  if ($_POST)
  {
    $novo_nome = $_POST['nome'];
    $nova_sigla = $_POST['sigla'];
    $nova_carga = $_POST['carga'];
    
    $arquivo = fopen("disciplinas.txt", "r");
    $disciplinas = array();
    
    $disciplinas[] = fgets($arquivo);
    
    while(!feof($arquivo))
    {
      $linha = fgets($arquivo);
      $linha = trim($linha);
      
      if(!empty($linha))
      {
        $dados = explode(";", $linha);
        
        if($dados[1] == $sigla)
          $disciplinas[] = "$novo_nome;$nova_sigla;$nova_carga";
        else
          $disciplinas[] = $linha;
      }
    }
    fclose($arquivo);
    
    $arquivo = fopen("disciplinas.txt", "w");
    
    foreach($disciplinas as $disciplina)
      fwrite($arquivo, $disciplina . "\n");
    
    fclose($arquivo);
    
    header("Location: listarTodas.php");
  }
  ?>
</body>
</html>
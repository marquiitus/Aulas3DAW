<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buscar Disciplina</title>
  <style>
    .busca { margin: 20px 0; }
    .busca form { margin: 20px 0; }
    .error { color: red; }
    .dados { margin: 20px 0; }
    .dados p { font-size: 18px; }
  </style>
</head>
<body>
  <h1>Buscar Disciplina por Sigla</h1>  
  <a href="listarTodas.php">← Voltar para a lista</a>

  <div class="busca">
    <form method="post">
      <p>
        <label>Digite a sigla da disciplina:</label><br>
        <input type="text" name="sigla" required>
      </p>
      <p>
        <input type="submit" value="Buscar Disciplina">
      </p>
    </form>
  </div>

  <?php
  if ($_POST && isset($_POST['sigla']))
  {
    $sigla = $_POST['sigla'];
    $encontrado = false;
    
    $arquivo = fopen("disciplinas.txt", "r") or die("Arquivo não encontrado!");

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
          echo "<div class='dados'>";
          echo "<h2>Dados da Disciplina Encontrada:</h2>";
          echo "<p><strong>Nome:</strong> $dados[0]</p>";
          echo "<p><strong>Sigla:</strong> $dados[1]</p>";
          echo "<p><strong>Carga Horária:</strong> $dados[2]</p>";
          echo "</div>";
          
          echo "<div>";
          echo "<a href='alterar.php?sigla=$dados[1]'>Editar esta disciplina</a> | ";
          echo "<a href='excluir.php?sigla=$dados[1]' onclick='return confirm(\"Tem certeza que deseja excluir?\")'>Excluir esta disciplina</a>";
          echo "</div>";
          
          $encontrado = true;
          break;
        }
      }
    }

    fclose($arquivo);
    
    if(!$encontrado)
      echo "<p class='error'>Disciplina com sigla '$sigla' não encontrada!</p>";
  }
  ?>
</body>
</html>
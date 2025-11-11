<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buscar Aluno</title>
  <style>
    .busca { margin: 20px 0; }
    .busca form { margin: 20px 0; }
    .error { color: red; }
    .dados { margin: 20px 0; }
    .dados p { font-size: 18px; }
  </style>
</head>
<body>
  <h1>Buscar Aluno por Matrícula</h1>  
  <a href="listarTodos.php">← Voltar para a lista</a>

  <div class="busca">
    <form method="post">
      <p>
        <label>Digite a matrícula do aluno:</label><br>
        <input type="text" name="matricula" required>
      </p>
      <p>
        <input type="submit" value="Buscar Aluno">
      </p>
    </form>
  </div>

  <?php
  if ($_POST && isset($_POST['matricula']))
  {
    $matricula = $_POST['matricula'];
    $encontrado = false;
    
    $arquivo = fopen("alunos.txt", "r") or die("Arquivo não encontrado!");
    fgets($arquivo);
    
    while(!feof($arquivo))
    {
      $linha = fgets($arquivo);
      $linha = trim($linha);
        
      if(!empty($linha))
      {
        $dados = explode(";", $linha);
            
        if($dados[0] == $matricula)
        {
          echo "<div class='dados'>";
          echo "<h2>Dados do Aluno Encontrado:</h2>";
          echo "<p><strong>Matrícula:</strong> $dados[0]</p>";
          echo "<p><strong>Nome:</strong> $dados[1]</p>";
          echo "<p><strong>E-mail:</strong> $dados[2]</p>";
          echo "</div>";
          
          echo "<div>";
          echo "<a href='alterar.php?matricula=$dados[0]'>Editar este aluno</a> | ";
          echo "<a href='excluir.php?matricula=$dados[0]' onclick='return confirm(\"Tem certeza que deseja excluir?\")'>Excluir este aluno</a>";
          echo "</div>";
          
          $encontrado = true;
          break;
        }
      }
    }

    fclose($arquivo);
    
    if(!$encontrado)
      echo "<p class='error'>Aluno com matrícula '$matricula' não encontrado!</p>";
  }
  ?>
</body>
</html>
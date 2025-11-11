<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dados do Aluno</title>
  <style>
    .dados { margin: 20px 0; }
    .dados p { font-size: 18px; }
  </style>
</head>
<body>
  <h1>Dados do Aluno</h1>  
  <a href="listarTodos.php">← Voltar para a lista</a>

  <div class="dados">
    <?php
    $matricula = $_POST['matricula'];
    $encontrado = false;
    
    $arquivo = fopen("alunos.txt", "r") or die("Arquivo não encontrado!");
    fgets($arquivo);
    while(!feof($arquivo)) {
     
      $linha = fgets($arquivo);
      $linha = trim($linha);
        
      if(!empty($linha)) {

        $dados = explode(";", $linha);
            
        if($dados[0] == $matricula) {
        
          echo "<p><strong>Matrícula:</strong> $dados[0]</p>";
          echo "<p><strong>Nome:</strong> $dados[1]</p>";
          echo "<p><strong>E-mail:</strong> $dados[2]</p>";
          $encontrado = true;
          break;
        }
      }
    }

    fclose($arquivo);
    
    if(!$encontrado) 
      echo "<p>Aluno não encontrado!</p>";
    ?>
    </div>
    <div>
      <a href="alterar.php?matricula=<?php echo $matricula; ?>">Editar este aluno</a> |
      <a href="excluir.php?matricula=<?php echo $matricula; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir este aluno</a>
    </div>
</body>
</html>
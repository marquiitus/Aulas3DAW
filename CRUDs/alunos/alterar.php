<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Aluno</title>
</head>
<body>
  <h1>Editar Aluno</h1>
    
  <?php
    $matricula = $_GET['matricula'];
    $encontrado = false;
    $nome = "";
    $email = "";
  
    $arquivo = fopen("alunos.txt", "r");

    fgets($arquivo);
    while(!feof($arquivo)) {

      $linha = fgets($arquivo);
      $linha = trim($linha);
      if(!empty($linha)) {

        $dados = explode(";", $linha);
        if($dados[0] == $matricula) {

          $nome = $dados[1];
          $email = $dados[2];
          $encontrado = true;
          break;
        }
      }
    }
    fclose($arquivo);
    
    if(!$encontrado) {

      echo "<p>Aluno não encontrado!</p>";
      echo "<a href='listarTodos.php'>Voltar</a>";
      exit;
    }
    ?>
    <form method="post">
      <p>
        <label>Matrícula:</label><br>
        <input type="text" name="matricula" value="<?php echo $matricula; ?>" readonly>
      </p>
      <p>
        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?php echo $nome; ?>" required>
      </p>
      <p>
        <label>E-mail:</label><br>
        <input type="email" name="email" value="<?php echo $email; ?>" required>
      </p>
      <p>
        <input type="submit" value="Atualizar">
        <a href="listarTodos.php">Cancelar</a>
      </p>
    </form>

  <?php
    if ($_POST) {
      $nova_matricula = $_POST['matricula'];
      $novo_nome = $_POST['nome'];
      $novo_email = $_POST['email'];
        
      $arquivo = fopen("alunos.txt", "r");
      $alunos = array();
        
      $alunos[] = fgets($arquivo);
      while(!feof($arquivo)) {

        $linha = fgets($arquivo);
        $linha = trim($linha);
        if(!empty($linha)) {

          $dados = explode(";", $linha);
          if($dados[0] == $matricula) 
            $alunos[] = "$nova_matricula;$novo_nome;$novo_email";
          else 
            $alunos[] = $linha;   
        }
      }
      fclose($arquivo);
    
      $arquivo = fopen("alunos.txt", "w");
      foreach($alunos as $aluno) 
        fwrite($arquivo, $aluno . "\n");
      
      fclose($arquivo);
      header("Location: listarTodos.php ? matricula = $nova_matricula");
    }
  ?>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adicionar Aluno</title>
</head>
<body>
  <h1>Adicionar Novo Aluno</h1>
    
  <form method="post">
    <p>
      <label>Matrícula:</label><br>
      <input type="text" name="matricula" required>
    </p>
    <p>
      <label>Nome:</label><br>
      <input type="text" name="nome" required>
    </p>
    <p>
      <label>E-mail:</label><br>
      <input type="email" name="email" required>
    </p>
    <p>
      <input type="submit" value="Salvar">
      <a href="listarTodos.php">Cancelar</a>
    </p>
  </form>

  <?php
    if ($_POST) {
      $matricula = $_POST['matricula'];
      $nome = $_POST['nome'];
      $email = $_POST['email'];
        
      $arquivo = fopen("alunos.txt", "a");
      $novo_aluno = "\n$matricula;$nome;$email";

      fwrite($arquivo, $novo_aluno);
      fclose($arquivo);
        
      header("Location: listarTodos.php");
    }
  ?>
</body>
</html>
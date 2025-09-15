<?php 

  if($_SERVER['REQUEST_METHOD' == 'POST']) {

    $matricula = $_POST["matricula"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $msg = "";

    if(!file_exists("alunos.txt")) {


    }
  }
  
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Incluindo</title>
</head>
<body>
  <form action="incluir.php" method = "POST">


  </form>
</body>
</html>
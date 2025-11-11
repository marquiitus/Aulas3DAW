<?php
$matricula = $_GET['matricula'];
$arquivo = fopen("alunos.txt", "r");
$alunos = array();

$alunos[] = trim(fgets($arquivo));

while(!feof($arquivo)) {

  $linha = fgets($arquivo);
  $linha = trim($linha);
  if(!empty($linha)) {
    
    $dados = explode(";", $linha);
    if($dados[0] != $matricula) 
      $alunos[] = $linha;
  }
}

fclose($arquivo);

$arquivo = fopen("alunos.txt", "w");
foreach($alunos as $aluno) 
  fwrite($arquivo, $aluno . "\n");

fclose($arquivo);
header("Location: listarTodos.php");
?>
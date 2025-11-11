<?php
$sigla = $_GET['sigla'];

$arquivo = fopen("disciplinas.txt", "r");
$disciplinas = array();
$disciplinas[] = trim(fgets($arquivo));

while(!feof($arquivo))
{
  $linha = fgets($arquivo);
  $linha = trim($linha);
  
  if(!empty($linha))
  {
    $dados = explode(";", $linha);
    
    if($dados[1] != $sigla)
      $disciplinas[] = $linha;
  }
}
fclose($arquivo);

$arquivo = fopen("disciplinas.txt", "w");

foreach($disciplinas as $disciplina)
  fwrite($arquivo, $disciplina . "\n");

fclose($arquivo);

header("Location: listarTodas.php");
?>
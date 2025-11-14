<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$codigo = $_GET['codigo'] ?? '';

if(empty($codigo))
{
  echo json_encode(['erro' => 'Código não informado']);
  exit;
}

$arquivo = 'perguntasMultiplaEscolha.txt';

if(!file_exists($arquivo))
{
  echo json_encode(['erro' => 'Arquivo não encontrado']);
  exit;
}

$linhas = file($arquivo, FILE_IGNORE_NEW_LINES);
$encontrada = false;

foreach($linhas as $linha)
{
  $dados = explode(';', $linha);
  if($dados[0] == $codigo)
  {
    $pergunta = 
    [
      'codigo' => $dados[0],
      'pergunta' => $dados[1],
      'alternativaA' => $dados[2],
      'alternativaB' => $dados[3],
      'alternativaC' => $dados[4],
      'alternativaD' => $dados[5],
      'alternativaE' => $dados[6],
      'alternativaGabarito' => $dados[7]
    ];
    $encontrada = true;
    break;
  }
}

if(!$encontrada)
{
  echo json_encode(['erro' => 'Pergunta não encontrada']);
  exit;
}

echo json_encode($pergunta);
?>
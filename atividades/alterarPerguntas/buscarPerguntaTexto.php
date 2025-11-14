<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$codigo = $_GET['codigo'] ?? '';

if(empty($codigo))
{
  echo json_encode(['erro' => 'Código não informado']);
  exit;
}

$arquivo = 'perguntasTexto.txt';

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
      'respostaGabarito' => $dados[2]
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
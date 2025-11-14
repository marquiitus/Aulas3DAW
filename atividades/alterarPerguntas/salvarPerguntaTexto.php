<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

$dados = json_decode(file_get_contents('php://input'), true);

if(!$dados)
{
  echo json_encode(['sucesso' => false, 'erro' => 'Dados inválidos']);
  exit;
}

if(empty($dados['codigo']) || empty($dados['pergunta']) || empty($dados['respostaGabarito']))
{
  echo json_encode(['sucesso' => false, 'erro' => 'Campos obrigatórios faltando']);
  exit;
}

$arquivo = 'perguntasTexto.txt';

if(!file_exists($arquivo))
{
  echo json_encode(['sucesso' => false, 'erro' => 'Arquivo não encontrado']);
  exit;
}

$linhas = file($arquivo, FILE_IGNORE_NEW_LINES);
$novasLinhas = [];
$encontrada = false;

foreach($linhas as $linha)
{
  $dadosLinha = explode(';', $linha);
  if($dadosLinha[0] == $dados['codigo'])
  {
    $novaLinha = $dados['codigo'] . ';' . $dados['pergunta'] . ';' . $dados['respostaGabarito'];
    $novasLinhas[] = $novaLinha;
    $encontrada = true;
  }
  else
  {
    $novasLinhas[] = $linha;
  }
}

if(!$encontrada)
{
  echo json_encode(['sucesso' => false, 'erro' => 'Pergunta não encontrada']);
  exit;
}

if(file_put_contents($arquivo, implode(PHP_EOL, $novasLinhas)))
{
  echo json_encode(['sucesso' => true]);
}
else
{
  echo json_encode(['sucesso' => false, 'erro' => 'Erro ao salvar arquivo']);
}
?>
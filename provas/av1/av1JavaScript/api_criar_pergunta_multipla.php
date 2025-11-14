<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

$dados = json_decode(file_get_contents('php://input'), true);

if (!$dados) {
    http_response_code(400);
    echo json_encode(['erro' => 'Dados inválidos']);
    exit;
}

if (empty($dados['titulo']) || empty($dados['descricao']) || empty($dados['alternativas']) || !isset($dados['respostaCorreta'])) {
    http_response_code(400);
    echo json_encode(['erro' => 'Campos obrigatórios faltando']);
    exit;
}

$perguntas = [];
if (file_exists('perguntas.json')) {
    $perguntas = json_decode(file_get_contents('perguntas.json'), true);
}

$novaPergunta = [
    'id' => uniqid(),
    'tipo' => 'multipla',
    'titulo' => $dados['titulo'],
    'descricao' => $dados['descricao'],
    'alternativas' => $dados['alternativas'],
    'respostaCorreta' => $dados['respostaCorreta'],
    'dataCriacao' => date('Y-m-d H:i:s')
];

$perguntas[] = $novaPergunta;

if (file_put_contents('perguntas.json', json_encode($perguntas, JSON_PRETTY_PRINT))) {
    echo json_encode(['sucesso' => true, 'pergunta' => $novaPergunta]);
} else {
    http_response_code(500);
    echo json_encode(['erro' => 'Erro ao salvar pergunta']);
}
?>
<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Content-Type');

$dados = json_decode(file_get_contents('php://input'), true);

if (!$dados) {
    http_response_code(400);
    echo json_encode(['erro' => 'Dados inválidos']);
    exit;
}

if (empty($dados['id']) || empty($dados['titulo']) || empty($dados['descricao']) || empty($dados['alternativas']) || !isset($dados['respostaCorreta'])) {
    http_response_code(400);
    echo json_encode(['erro' => 'Campos obrigatórios faltando']);
    exit;
}

$perguntas = [];
if (file_exists('perguntas.json')) {
    $perguntas = json_decode(file_get_contents('perguntas.json'), true);
}

$encontrada = false;
foreach ($perguntas as &$pergunta) {
    if ($pergunta['id'] == $dados['id']) {
        $pergunta['titulo'] = $dados['titulo'];
        $pergunta['descricao'] = $dados['descricao'];
        $pergunta['alternativas'] = $dados['alternativas'];
        $pergunta['respostaCorreta'] = $dados['respostaCorreta'];
        $encontrada = true;
        break;
    }
}

if (!$encontrada) {
    http_response_code(404);
    echo json_encode(['erro' => 'Pergunta não encontrada']);
    exit;
}

if (file_put_contents('perguntas.json', json_encode($perguntas, JSON_PRETTY_PRINT))) {
    echo json_encode(['sucesso' => true]);
} else {
    http_response_code(500);
    echo json_encode(['erro' => 'Erro ao atualizar pergunta']);
}
?>
<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Content-Type');

$dados = json_decode(file_get_contents('php://input'), true);

if (!$dados || empty($dados['id'])) {
    http_response_code(400);
    echo json_encode(['erro' => 'ID da pergunta não informado']);
    exit;
}

$perguntas = [];
if (file_exists('perguntas.json')) {
    $perguntas = json_decode(file_get_contents('perguntas.json'), true);
}

$novaLista = [];
$encontrada = false;

foreach ($perguntas as $pergunta) {
    if ($pergunta['id'] != $dados['id']) {
        $novaLista[] = $pergunta;
    } else {
        $encontrada = true;
    }
}

if (!$encontrada) {
    http_response_code(404);
    echo json_encode(['erro' => 'Pergunta não encontrada']);
    exit;
}

if (file_put_contents('perguntas.json', json_encode($novaLista, JSON_PRETTY_PRINT))) {
    echo json_encode(['sucesso' => true]);
} else {
    http_response_code(500);
    echo json_encode(['erro' => 'Erro ao excluir pergunta']);
}
?>
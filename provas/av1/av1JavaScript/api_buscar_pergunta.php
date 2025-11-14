<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$busca = $_GET['busca'] ?? '';

if (empty($busca)) {
    echo json_encode([]);
    exit;
}

$perguntas = [];

if (file_exists('perguntas.json')) {
    $dados = file_get_contents('perguntas.json');
    $perguntas = json_decode($dados, true);
}

$resultados = [];

foreach ($perguntas as $pergunta) {
    $titulo = strtolower($pergunta['titulo']);
    $descricao = strtolower($pergunta['descricao']);
    $termo = strtolower($busca);
    
    if (strpos($titulo, $termo) !== false || strpos($descricao, $termo) !== false) {
        $resultados[] = $pergunta;
    }
}

echo json_encode($resultados);
?>
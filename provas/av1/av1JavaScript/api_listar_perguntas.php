<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$perguntas = [];

if (file_exists('perguntas.json')) {
    $dados = file_get_contents('perguntas.json');
    $perguntas = json_decode($dados, true);
}

echo json_encode($perguntas);
?>
<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$usuarios = [];

if (file_exists('usuarios.json')) {
    $dados = file_get_contents('usuarios.json');
    $usuarios = json_decode($dados, true);
}

echo json_encode($usuarios);
?>
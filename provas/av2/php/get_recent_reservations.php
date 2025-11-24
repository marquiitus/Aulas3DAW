<?php
session_start();
include 'conexao.php';

header('Content-Type: application/json');

try {
    $stmt = $pdo->query("
        SELECT id, nome, quarto, cama, checkin, checkout, status
        FROM reservas 
        ORDER BY id DESC 
        LIMIT 5
    ");
    
    $reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode([
        'success' => true,
        'reservas' => $reservas
    ]);
    
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Erro ao carregar reservas: ' . $e->getMessage()
    ]);
}
?>
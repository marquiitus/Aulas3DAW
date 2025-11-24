<?php
session_start();
include 'conexao.php';

header('Content-Type: application/json');

try {
    // Total de reservas
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM reservas WHERE status != 'cancelada'");
    $total_reservas = $stmt->fetch()['total'];
    
    // Total de usuários (baseado em reservas únicas)
    $stmt = $pdo->query("SELECT COUNT(DISTINCT email) as total FROM reservas");
    $total_usuarios = $stmt->fetch()['total'];
    
    // Total de quartos (assumindo 6 quartos baseado no seu sistema)
    $total_quartos = 6;
    
    // Total de receita (cálculo baseado nos preços dos quartos)
    $stmt = $pdo->query("
        SELECT COALESCE(SUM(
            CASE 
                WHEN quarto LIKE '%Privativo%' THEN 180
                WHEN quarto LIKE '%Feminino%' AND NOT quarto LIKE '%105%' THEN 90
                WHEN quarto LIKE '%Masculino%' AND quarto LIKE '%104%' THEN 95
                WHEN quarto LIKE '%Masculino%' THEN 85
                WHEN quarto LIKE '%Misto%' THEN 80
                ELSE 80
            END
        ), 0) as total 
        FROM reservas 
        WHERE status IN ('confirmada', 'concluida', 'ativa')
    ");
    $total_receita = $stmt->fetch()['total'];
    
    echo json_encode([
        'success' => true,
        'total_reservas' => $total_reservas,
        'total_usuarios' => $total_usuarios,
        'total_quartos' => $total_quartos,
        'total_receita' => number_format($total_receita, 2, '.', '')
    ]);
    
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Erro ao carregar dados do dashboard: ' . $e->getMessage()
    ]);
}
?>
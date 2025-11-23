<?php
// Evitar problemas de headers
if (ob_get_length()) ob_clean();

session_start();
include 'conexao.php';

// DEBUG
error_log("Iniciando processar_reserva.php");

header('Content-Type: application/json; charset=utf-8');

// Resto do código...

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitizar e validar dados
    $nome = trim($_POST['guestName']);
    $email = filter_var(trim($_POST['guestEmail']), FILTER_SANITIZE_EMAIL);
    $telefone = trim($_POST['guestPhone']);
    $checkin = $_POST['checkinDate'];
    $checkout = $_POST['checkoutDate'];
    $quarto_cama = trim($_POST['roomDetails']);
    $pedidos_especiais = trim($_POST['specialRequests']);

    // Separar quarto e cama da string
    $partes = explode(' - ', $quarto_cama);
    $quarto = $partes[0];
    $cama = isset($partes[1]) ? $partes[1] : 'Não especificada';

    // Validações
    $erros = [];

    if (empty($nome)) {
        $erros[] = "Nome é obrigatório.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = "Email inválido.";
    }

    if (empty($telefone)) {
        $erros[] = "Telefone é obrigatório.";
    }

    if (empty($checkin) || empty($checkout)) {
        $erros[] = "Datas de check-in e check-out são obrigatórias.";
    }

    // Validar datas
    $hoje = new DateTime();
    $data_checkin = DateTime::createFromFormat('Y-m-d', $checkin);
    $data_checkout = DateTime::createFromFormat('Y-m-d', $checkout);

    if ($data_checkin < $hoje) {
        $erros[] = "Data de check-in não pode ser no passado.";
    }

    if ($data_checkout <= $data_checkin) {
        $erros[] = "Data de check-out deve ser após a data de check-in.";
    }

    if (empty($quarto)) {
        $erros[] = "Quarto é obrigatório.";
    }

    // Se há erros, retornar
    if (!empty($erros)) {
        echo json_encode([
            'success' => false,
            'message' => 'Erro de validação:',
            'errors' => $erros
        ]);
        exit;
    }

    try {
        // Verificar se já existe reserva para a mesma cama nas datas solicitadas
        $stmt = $pdo->prepare("
            SELECT id FROM reservas 
            WHERE quarto = ? AND cama = ? AND status IN ('pendente', 'confirmada')
            AND ((checkin <= ? AND checkout >= ?) OR (checkin <= ? AND checkout >= ?))
        ");
        $stmt->execute([$quarto, $cama, $checkout, $checkin, $checkin, $checkout]);
        
        if ($stmt->rowCount() > 0) {
            echo json_encode([
                'success' => false,
                'message' => 'Esta cama já está reservada para as datas selecionadas. Por favor, escolha outras datas ou outra cama.'
            ]);
            exit;
        }

        // Inserir a reserva
        $stmt = $pdo->prepare("
            INSERT INTO reservas (nome, email, telefone, checkin, checkout, quarto, cama, pedidos_especiais) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");
        
        $stmt->execute([
            $nome, 
            $email, 
            $telefone, 
            $checkin, 
            $checkout, 
            $quarto, 
            $cama, 
            $pedidos_especiais
        ]);



        echo json_encode([
            'success' => true,
            'message' => 'Reserva realizada com sucesso! Um email de confirmação foi enviado.',
            'reserva_id' => $reserva_id
        ]);

    } catch (PDOException $e) {
        error_log("Erro ao processar reserva: " . $e->getMessage());
        echo json_encode([
            'success' => false,
            'message' => 'Erro ao processar reserva. Tente novamente.'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Método não permitido.'
    ]);
}
?>
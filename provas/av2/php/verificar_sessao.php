<?php
// Garante que a sessão está iniciada antes de verificar variáveis de sessão
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION['usuario_id'])) {
    // Redireciona para a página de login (caminho relativo ao arquivo que inclui este script)
    header('Location: ../login.html');
    exit;
}
?>
<?php
// Inclui o arquivo de configuração
include __DIR__ . '/../config.php';

$host = $db_host;
$dbname = $db_name;
$username = $db_user;
$password = $db_pass;

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Log do erro em vez de exibir diretamente
    error_log("Erro na conexão com o banco de dados: " . $e->getMessage());
    // Mensagem genérica para o usuário
    die("Ocorreu um erro ao conectar com o servidor. Por favor, tente novamente mais tarde.");
}
?>
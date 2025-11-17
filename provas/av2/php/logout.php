<?php
// Inicia a sessão para poder acessar e destruir os dados da sessão.
session_start();

// Limpa todas as variáveis da sessão (ex: $_SESSION['usuario_id']).
session_unset();

// Destrói a sessão atual.
session_destroy();

// Redireciona o usuário para a página de login com uma mensagem de sucesso.
header('Location: ../login.html?sucesso=' . urlencode("Você saiu com sucesso."));
exit;
?>
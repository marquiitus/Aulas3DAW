<?php
session_start();
include 'conexao.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  $email = trim($_POST['email']);
  $senha = $_POST['senha'];

  if (empty($email) || empty($senha))
  {
    echo json_encode(['success' => false, 'message' => 'Por favor, preencha todos os campos.']);
    exit;
  }

  try
  {
    // Verificação específica para o administrador
    if ($email === 'admin@gmail.com' && $senha === '123456') {
      $_SESSION['usuario_id'] = 0; // ID especial para admin
      $_SESSION['usuario_nome'] = 'Administrador';
      $_SESSION['usuario_email'] = 'admin@gmail.com';
      $_SESSION['is_admin'] = true;
      
      echo json_encode([
        'success' => true, 
        'message' => 'Login administrativo realizado com sucesso!',
        'is_admin' => true
      ]);
      exit;
    }

    // Login para usuários normais
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
    $stmt->execute([$email, $senha]);
    $usuario = $stmt->fetch();

    if ($usuario)
    {
      $_SESSION['usuario_id'] = $usuario['id'];
      $_SESSION['usuario_nome'] = $usuario['nome'];
      $_SESSION['usuario_email'] = $usuario['email'];
      $_SESSION['is_admin'] = false;
      
      echo json_encode([
        'success' => true, 
        'message' => 'Login realizado com sucesso!',
        'is_admin' => false
      ]);
    }
    else
    {
      echo json_encode(['success' => false, 'message' => 'Email ou senha incorretos.']);
    }
  }
  catch (PDOException $e)
  {
    error_log("Erro no login: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Erro no servidor. Tente novamente mais tarde.']);
  }
}
?>
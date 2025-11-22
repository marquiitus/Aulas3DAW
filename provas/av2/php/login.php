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
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
    $stmt->execute([$email, $senha]);
    $usuario = $stmt->fetch();

    if ($usuario)
    {
      $_SESSION['usuario_id'] = $usuario['id'];
      $_SESSION['usuario_nome'] = $usuario['nome'];
      $_SESSION['usuario_email'] = $usuario['email'];
      
      echo json_encode(['success' => true, 'message' => 'Login realizado com sucesso!']);
    }
    else
    {
      echo json_encode(['success' => false, 'message' => 'Email ou senha incorretos.']);
    }
  }
  catch (PDOException $e)
  {
    echo json_encode(['success' => false, 'message' => 'Erro no servidor. Tente novamente mais tarde.']);
  }
}
?>
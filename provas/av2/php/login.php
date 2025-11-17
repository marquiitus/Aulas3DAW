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
    // 1. Buscar o usuário pelo e-mail
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();

    // 2. Verificar se o usuário existe e se a senha está correta usando password_verify
    if ($usuario && password_verify($senha, $usuario['senha']))
    {
      // Sucesso: a senha corresponde ao hash
      $_SESSION['usuario_id'] = $usuario['id'];
      $_SESSION['usuario_nome'] = $usuario['nome'];
      $_SESSION['usuario_email'] = $usuario['email'];
      
      echo json_encode(['success' => true, 'message' => 'Login realizado com sucesso!']);
    }
    else
    {
      // Falha: e-mail não encontrado ou senha incorreta
      echo json_encode(['success' => false, 'message' => 'Email ou senha incorretos.']);
    }
  }
  catch (PDOException $e)
  {
    // Em caso de erro no banco de dados
    echo json_encode(['success' => false, 'message' => 'Erro no servidor. Tente novamente mais tarde.']);
  }
}
?>
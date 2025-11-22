<?php
session_start();
include 'conexao.php';

header('Content-Type: application/json'); // Define o cabeçalho para retornar JSON

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  $nome = trim($_POST['nome']);
  $endereco = trim($_POST['endereco']);
  $email = trim($_POST['email']);
  $telefone = trim($_POST['telefone']);
  $passaporte = trim($_POST['passaporte']);
  $nacionalidade = trim($_POST['nacionalidade']);
  $senha = $_POST['senha'];
  $confirmar_senha = $_POST['confirmar_senha'];

  // Validação dos campos obrigatórios
  $campos_obrigatorios = ['nome', 'endereco', 'email', 'passaporte', 'nacionalidade', 'senha'];
  foreach ($campos_obrigatorios as $campo)
  {
    if (empty($_POST[$campo]))
    {
      echo json_encode(['success' => false, 'message' => 'Todos os campos marcados com * são obrigatórios!']);
      exit;
    }
  }

  // Validação da senha
  if ($senha !== $confirmar_senha)
  {
    echo json_encode(['success' => false, 'message' => 'As senhas não coincidem!']);
    exit;
  }

  if (strlen($senha) < 6)
  {
    echo json_encode(['success' => false, 'message' => 'A senha deve ter pelo menos 6 caracteres!']);
    exit;
  }

  try
  {
    // Verifica se email ou passaporte já existem
    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ? OR passaporte = ?");
    $stmt->execute([$email, $passaporte]);
    
    if ($stmt->rowCount() > 0)
    {
      echo json_encode(['success' => false, 'message' => 'Este email ou número de passaporte já está cadastrado!']);
      exit;
    }
    
    // Criptografa a senha
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Insere o novo usuário no banco de dados
    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, endereco, email, telefone, passaporte, nacionalidade, senha) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$nome, $endereco, $email, $telefone, $passaporte, $nacionalidade, $senha_hash]);

    // Login automático após o cadastro
    $novo_usuario_id = $pdo->lastInsertId();
    $_SESSION['usuario_id'] = $novo_usuario_id;
    $_SESSION['usuario_nome'] = $nome;
    $_SESSION['usuario_email'] = $email;

    // Retorna sucesso
    echo json_encode(['success' => true, 'message' => 'Cadastro realizado com sucesso! Redirecionando...']);
    exit;
  }
  catch (PDOException $e)
  {
    error_log("Erro ao cadastrar usuário: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Ocorreu um erro no servidor. Tente novamente mais tarde.']);
    exit;
  }
}
?>
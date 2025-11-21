<?php
session_start();
include 'conexao.php';

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
      header('Location: ../cadastro.html?erro=' . urlencode("Todos os campos marcados com * são obrigatórios!"));
      exit;
    }
  }

  // Validação da senha
  if ($senha !== $confirmar_senha)
  {
    header('Location: ../cadastro.html?erro=' . urlencode("As senhas não coincidem!"));
    exit;
  }

  if (strlen($senha) < 6)
  {
    header('Location: ../cadastro.html?erro=' . urlencode("A senha deve ter pelo menos 6 caracteres!"));
    exit;
  }

  try
  {
    // Verifica se email ou passaporte já existem
    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ? OR passaporte = ?");
    $stmt->execute([$email, $passaporte]);
    
    if ($stmt->rowCount() > 0)
    {
      header('Location: ../cadastro.html?erro=' . urlencode("Este email ou número de passaporte já está cadastrado!"));
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

    // Redireciona para o dashboard
    header('Location: dashboard.php');
    exit;
  }
  catch (PDOException $e)
  {
    // Em caso de erro, redireciona com mensagem
    header('Location: ../cadastro.html?erro=' . urlencode("Erro ao cadastrar: " . $e->getMessage()));
    exit;
  }
}
?>
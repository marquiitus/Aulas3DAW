<?php
session_start();
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST['nome']);
    $endereco = trim($_POST['endereco']);
    $email = trim($_POST['email']);
    $telefone = trim($_POST['telefone']);
    $passaporte = trim($_POST['passaporte']);
    $nacionalidade = trim($_POST['nacionalidade']);
    $senha = $_POST['senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    // Verificar campos obrigatórios
    $campos_obrigatorios = ['nome', 'endereco', 'email', 'passaporte', 'nacionalidade', 'senha'];
    foreach ($campos_obrigatorios as $campo) {
        if (empty($_POST[$campo])) {
            header('Location: ../cadastro.html?erro=' . urlencode("Todos os campos marcados com * são obrigatórios!"));
            exit;
        }
    }

    // Verificar se senhas coincidem
    if ($senha !== $confirmar_senha) {
        header('Location: ../cadastro.html?erro=' . urlencode("As senhas não coincidem!"));
        exit;
    }

    try {
        // Verificar se email ou passaporte já existem
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ? OR passaporte = ?");
        $stmt->execute([$email, $passaporte]);
        
        if ($stmt->rowCount() > 0) {
            header('Location: ../cadastro.html?erro=' . urlencode("Este email ou número de passaporte já está cadastrado!"));
            exit;
        }
        
        // Inserir usuário (senha em texto puro)
        $stmt = $pdo->prepare("INSERT INTO usuarios (nome, endereco, email, telefone, passaporte, nacionalidade, senha) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$nome, $endereco, $email, $telefone, $passaporte, $nacionalidade, $senha]);

        header('Location: ../login.html?sucesso=' . urlencode("Cadastro realizado com sucesso! Faça login."));
        exit;
        
    } catch (PDOException $e) {
        header('Location: ../cadastro.html?erro=' . urlencode("Erro ao cadastrar. Tente novamente."));
        exit;
    }
} else {
    header('Location: ../cadastro.html');
    exit;
}
?>
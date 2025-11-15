<?php
include 'conexao.php';

$mensagem = '';
$erro = '';
$usuario = null;

// Buscar usuário para edição
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    try {
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$usuario) {
            $erro = "Usuário não encontrado!";
        }
    } catch (PDOException $e) {
        $erro = "Erro ao buscar usuário: " . $e->getMessage();
    }
}

// Processar atualização
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tipo = $_POST['tipo'];

    try {
        $stmt = $pdo->prepare("UPDATE usuarios SET nome = ?, email = ?, tipo = ? WHERE id = ?");
        $stmt->execute([$nome, $email, $tipo, $id]);
        $mensagem = "Usuário atualizado com sucesso!";
        
        // Recarregar os dados atualizados
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {
        $erro = "Erro ao atualizar usuário: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header header-usuarios">
        <div class="container">
            <h1>Editar Usuário</h1>
            <p>Edite os dados do usuário</p>
        </div>
    </header>

    <div class="container">
        <div class="content-section">
            <h2>Editar Usuário</h2>
            
            <?php if ($erro): ?>
                <div class="message error"><?php echo $erro; ?></div>
            <?php endif; ?>
            
            <?php if ($mensagem): ?>
                <div class="message success"><?php echo $mensagem; ?></div>
            <?php endif; ?>

            <?php if ($usuario): ?>
            <form method="post" class="form-container form-user">
                <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="tipo">Tipo de Usuário:</label>
                    <select id="tipo" name="tipo" required>
                        <option value="aluno" <?php echo ($usuario['tipo'] == 'aluno') ? 'selected' : ''; ?>>Aluno</option>
                        <option value="professor" <?php echo ($usuario['tipo'] == 'professor') ? 'selected' : ''; ?>>Professor</option>
                        <option value="admin" <?php echo ($usuario['tipo'] == 'admin') ? 'selected' : ''; ?>>Administrador</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Atualizar Usuário</button>
                <a href="crudUsuarios.php" class="btn btn-secondary">Voltar para Lista</a>
            </form>
            <?php else: ?>
                <div class="message warning">
                    <p>Usuário não encontrado. <a href="crudUsuarios.php">Voltar para a lista de usuários</a>.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p>Sistema de Jogo Corporativo &copy; 2025 - Water Falls</p>
        </div>
    </footer>
</body>
</html>
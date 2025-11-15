<?php
include 'conexao.php';

$mensagem = '';
$erro = '';

// Criar usuário
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['criar_usuario'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tipo = $_POST['tipo'];

    try {
        $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, tipo) VALUES (?, ?, ?)");
        $stmt->execute([$nome, $email, $tipo]);
        $mensagem = "Usuário criado com sucesso!";
    } catch (PDOException $e) {
        $erro = "Erro ao criar usuário: " . $e->getMessage();
    }
}

// Excluir usuário
if (isset($_GET['excluir_usuario'])) {
    $id = $_GET['excluir_usuario'];
    
    try {
        $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
        $mensagem = "Usuário excluído com sucesso!";
    } catch (PDOException $e) {
        $erro = "Erro ao excluir usuário: " . $e->getMessage();
    }
}

// Buscar todos os usuários
try {
    $stmt = $pdo->query("SELECT * FROM usuarios ORDER BY id DESC");
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $erro = "Erro ao carregar usuários: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Usuários</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header header-usuarios">
        <div class="container">
            <h1>Gerenciar Usuários</h1>
            <p>Cadastre e gerencie os usuários do sistema</p>
        </div>
    </header>

    <div class="container">
        <div class="menu-grid">
            <div class="menu-card">
                <h3>Gerenciar Perguntas</h3>
                <ul>
                    <li><a href="criarPerguntaMultipla.php">Criar Perguntas de Múltipla Escolha</a></li>
                    <li><a href="criarPerguntaTexto.php">Criar Perguntas de Texto</a></li>
                    <li><a href="alterarPerguntaMultipla.php">Alterar Perguntas de Múltipla Escolha</a></li>
                    <li><a href="alterarPerguntaTexto.php">Alterar Perguntas de Texto</a></li>
                </ul>
            </div>
            
            <div class="menu-card">
                <h3>Visualizar Perguntas</h3>
                <ul>
                    <li><a href="listarPerguntasRespostas.php">Listar Todas as Perguntas</a></li>
                    <li><a href="listarPergunta.php">Buscar uma Pergunta</a></li>
                    <li><a href="excluirPerguntaResposta.php">Excluir Perguntas</a></li>
                </ul>
            </div>
            
            <div class="menu-card">
                <h3>Gerenciar Usuários</h3>
                <ul>
                    <li><a href="crudUsuarios.php">CRUD de Usuários</a></li>
                    <li><a href="index.html">Página Inicial</a></li>
                </ul>
            </div>
        </div>

        <div class="content-section">
            <h2>Adicionar Novo Usuário</h2>
            
            <?php if ($mensagem): ?>
                <div class="message success"><?php echo $mensagem; ?></div>
            <?php endif; ?>
            
            <?php if ($erro): ?>
                <div class="message error"><?php echo $erro; ?></div>
            <?php endif; ?>

            <form method="post" class="form-container form-user">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="tipo">Tipo de Usuário:</label>
                    <select id="tipo" name="tipo" required>
                        <option value="aluno">Aluno</option>
                        <option value="professor">Professor</option>
                        <option value="admin">Administrador</option>
                    </select>
                </div>

                <button type="submit" name="criar_usuario" class="btn btn-success">Cadastrar Usuário</button>
            </form>
        </div>

        <div class="content-section">
            <h2>Usuários Cadastrados</h2>
            
            <?php if (empty($usuarios)): ?>
                <div class="empty-message">
                    <p>Nenhum usuário cadastrado</p>
                </div>
            <?php else: ?>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Tipo</th>
                        <th>Data de Cadastro</th>
                        <th>Ações</th>
                    </tr>
                    <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?php echo $usuario['id']; ?></td>
                        <td><?php echo htmlspecialchars($usuario['nome']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['email']); ?></td>
                        <td><?php echo ucfirst($usuario['tipo']); ?></td>
                        <td><?php echo date('d/m/Y H:i', strtotime($usuario['data_cadastro'])); ?></td>
                        <td class="actions">
                            <a href="editarUsuario.php?id=<?php echo $usuario['id']; ?>" class="btn-edit">Editar</a>
                            <a href="crudUsuarios.php?excluir_usuario=<?php echo $usuario['id']; ?>" class="btn-delete" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
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
<?php
include 'conexao.php';

$mensagem = '';
$erro = '';
$pergunta = null;

// Buscar pergunta para edição
if (isset($_GET['numero_pergunta'])) {
    $numero_pergunta = $_GET['numero_pergunta'];
    
    try {
        $stmt = $pdo->prepare("SELECT * FROM perguntas_texto WHERE numero_pergunta = ?");
        $stmt->execute([$numero_pergunta]);
        $pergunta = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$pergunta) {
            $erro = "Pergunta não encontrada!";
        }
    } catch (PDOException $e) {
        $erro = "Erro ao buscar pergunta: " . $e->getMessage();
    }
}

// Processar atualização
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero_pergunta = $_POST['numero_pergunta'];
    $pergunta_texto = $_POST['pergunta'];
    $resposta_gabarito = $_POST['resposta_gabarito'];

    try {
        $stmt = $pdo->prepare("UPDATE perguntas_texto SET pergunta = ?, resposta_gabarito = ? WHERE numero_pergunta = ?");
        $stmt->execute([$pergunta_texto, $resposta_gabarito, $numero_pergunta]);
        $mensagem = "Pergunta atualizada com sucesso!";
        
        // Recarregar os dados atualizados
        $stmt = $pdo->prepare("SELECT * FROM perguntas_texto WHERE numero_pergunta = ?");
        $stmt->execute([$numero_pergunta]);
        $pergunta = $stmt->fetch(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {
        $erro = "Erro ao atualizar pergunta: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Pergunta de Texto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header header-texto">
        <div class="container">
            <h1>Alterar Pergunta de Texto</h1>
            <p>Edite uma pergunta de texto existente</p>
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
            <h2>Editar Pergunta de Texto</h2>
            
            <?php if ($erro): ?>
                <div class="message error"><?php echo $erro; ?></div>
            <?php endif; ?>
            
            <?php if ($mensagem): ?>
                <div class="message success"><?php echo $mensagem; ?></div>
            <?php endif; ?>

            <?php if ($pergunta): ?>
            <form method="post" class="form-container">
                <input type="hidden" name="numero_pergunta" value="<?php echo $pergunta['numero_pergunta']; ?>">
                
                <div class="form-group">
                    <label for="numero_pergunta">Número da Pergunta:</label>
                    <input type="text" id="numero_pergunta" value="<?php echo $pergunta['numero_pergunta']; ?>" disabled>
                    <small>O número da pergunta não pode ser alterado</small>
                </div>

                <div class="form-group">
                    <label for="pergunta">Pergunta:</label>
                    <textarea id="pergunta" name="pergunta" required><?php echo htmlspecialchars($pergunta['pergunta']); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="resposta_gabarito">Resposta Gabarito:</label>
                    <textarea id="resposta_gabarito" name="resposta_gabarito" required><?php echo htmlspecialchars($pergunta['resposta_gabarito']); ?></textarea>
                </div>

                <button type="submit" class="btn btn-success">Atualizar Pergunta</button>
                <a href="listarPerguntasRespostas.php" class="btn btn-secondary">Voltar para Lista</a>
            </form>
            <?php else: ?>
                <div class="message warning">
                    <p>Selecione uma pergunta para editar através da <a href="listarPerguntasRespostas.php">lista de perguntas</a>.</p>
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
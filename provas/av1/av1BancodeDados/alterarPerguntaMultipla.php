<?php
include 'conexao.php';

$mensagem = '';
$erro = '';
$pergunta = null;

// Buscar pergunta para edição
if (isset($_GET['numero_pergunta'])) {
    $numero_pergunta = $_GET['numero_pergunta'];
    
    try {
        $stmt = $pdo->prepare("SELECT * FROM perguntas_multipla_escolha WHERE numero_pergunta = ?");
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
    $alternativa_a = $_POST['alternativa_a'];
    $alternativa_b = $_POST['alternativa_b'];
    $alternativa_c = $_POST['alternativa_c'];
    $alternativa_d = $_POST['alternativa_d'];
    $alternativa_e = $_POST['alternativa_e'];
    $alternativa_gabarito = $_POST['alternativa_gabarito'];

    try {
        $stmt = $pdo->prepare("UPDATE perguntas_multipla_escolha SET pergunta = ?, alternativa_a = ?, alternativa_b = ?, alternativa_c = ?, alternativa_d = ?, alternativa_e = ?, alternativa_gabarito = ? WHERE numero_pergunta = ?");
        $stmt->execute([$pergunta_texto, $alternativa_a, $alternativa_b, $alternativa_c, $alternativa_d, $alternativa_e, $alternativa_gabarito, $numero_pergunta]);
        $mensagem = "Pergunta atualizada com sucesso!";
        
        // Recarregar os dados atualizados
        $stmt = $pdo->prepare("SELECT * FROM perguntas_multipla_escolha WHERE numero_pergunta = ?");
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
    <title>Alterar Pergunta de Múltipla Escolha</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header header-multipla">
        <div class="container">
            <h1>Alterar Pergunta de Múltipla Escolha</h1>
            <p>Edite uma pergunta de múltipla escolha existente</p>
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
            <h2>Editar Pergunta de Múltipla Escolha</h2>
            
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
                    <label>Alternativas:</label>
                    <div class="alternatives-grid">
                        <div class="alternative-item">
                            <input type="text" id="alternativa_a" name="alternativa_a" placeholder="Alternativa A" value="<?php echo htmlspecialchars($pergunta['alternativa_a']); ?>" required>
                        </div>
                        <div class="alternative-item">
                            <input type="text" id="alternativa_b" name="alternativa_b" placeholder="Alternativa B" value="<?php echo htmlspecialchars($pergunta['alternativa_b']); ?>" required>
                        </div>
                        <div class="alternative-item">
                            <input type="text" id="alternativa_c" name="alternativa_c" placeholder="Alternativa C" value="<?php echo htmlspecialchars($pergunta['alternativa_c']); ?>" required>
                        </div>
                        <div class="alternative-item">
                            <input type="text" id="alternativa_d" name="alternativa_d" placeholder="Alternativa D" value="<?php echo htmlspecialchars($pergunta['alternativa_d']); ?>" required>
                        </div>
                        <div class="alternative-item">
                            <input type="text" id="alternativa_e" name="alternativa_e" placeholder="Alternativa E" value="<?php echo htmlspecialchars($pergunta['alternativa_e']); ?>" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="alternativa_gabarito">Alternativa Correta:</label>
                    <select id="alternativa_gabarito" name="alternativa_gabarito" required>
                        <option value="A" <?php echo ($pergunta['alternativa_gabarito'] == 'A') ? 'selected' : ''; ?>>A</option>
                        <option value="B" <?php echo ($pergunta['alternativa_gabarito'] == 'B') ? 'selected' : ''; ?>>B</option>
                        <option value="C" <?php echo ($pergunta['alternativa_gabarito'] == 'C') ? 'selected' : ''; ?>>C</option>
                        <option value="D" <?php echo ($pergunta['alternativa_gabarito'] == 'D') ? 'selected' : ''; ?>>D</option>
                        <option value="E" <?php echo ($pergunta['alternativa_gabarito'] == 'E') ? 'selected' : ''; ?>>E</option>
                    </select>
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
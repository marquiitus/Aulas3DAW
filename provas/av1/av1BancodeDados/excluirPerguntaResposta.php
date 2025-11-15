<?php
include 'conexao.php';

$mensagem = '';
$erro = '';

// Excluir pergunta de múltipla escolha
if (isset($_GET['excluir_multipla'])) {
    $numero_pergunta = $_GET['excluir_multipla'];
    
    try {
        $stmt = $pdo->prepare("DELETE FROM perguntas_multipla_escolha WHERE numero_pergunta = ?");
        $stmt->execute([$numero_pergunta]);
        $mensagem = "Pergunta de múltipla escolha excluída com sucesso!";
    } catch (PDOException $e) {
        $erro = "Erro ao excluir pergunta: " . $e->getMessage();
    }
}

// Excluir pergunta de texto
if (isset($_GET['excluir_texto'])) {
    $numero_pergunta = $_GET['excluir_texto'];
    
    try {
        $stmt = $pdo->prepare("DELETE FROM perguntas_texto WHERE numero_pergunta = ?");
        $stmt->execute([$numero_pergunta]);
        $mensagem = "Pergunta de texto excluída com sucesso!";
    } catch (PDOException $e) {
        $erro = "Erro ao excluir pergunta: " . $e->getMessage();
    }
}

// Buscar todas as perguntas
try {
    $stmt = $pdo->query("SELECT * FROM perguntas_multipla_escolha ORDER BY numero_pergunta");
    $perguntasMultipla = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $erro = "Erro ao carregar perguntas de múltipla escolha: " . $e->getMessage();
}

try {
    $stmt = $pdo->query("SELECT * FROM perguntas_texto ORDER BY numero_pergunta");
    $perguntasTexto = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $erro = "Erro ao carregar perguntas de texto: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Perguntas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header header-excluir">
        <div class="container">
            <h1>Excluir Perguntas</h1>
            <p>Gerencie as perguntas do sistema</p>
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
            <h2>Excluir Perguntas</h2>
            
            <?php if ($mensagem): ?>
                <div class="message success"><?php echo $mensagem; ?></div>
            <?php endif; ?>
            
            <?php if ($erro): ?>
                <div class="message error"><?php echo $erro; ?></div>
            <?php endif; ?>

            <div class="warning-box">
                <h4>Atenção!</h4>
                <p>A exclusão de perguntas é permanente e não pode ser desfeita. Tenha certeza antes de excluir.</p>
            </div>
        </div>

        <div class="content-section">
            <h2>Perguntas de Múltipla Escolha</h2>
            
            <?php if (empty($perguntasMultipla)): ?>
                <div class="empty-message">
                    <p>Nenhuma pergunta de múltipla escolha cadastrada</p>
                </div>
            <?php else: ?>
                <table>
                    <tr>
                        <th>Número</th>
                        <th>Pergunta</th>
                        <th>Alternativa Correta</th>
                        <th>Data de Criação</th>
                        <th>Ações</th>
                    </tr>
                    <?php foreach ($perguntasMultipla as $pergunta): ?>
                    <tr>
                        <td><?php echo $pergunta['numero_pergunta']; ?></td>
                        <td><?php echo htmlspecialchars(substr($pergunta['pergunta'], 0, 100)) . (strlen($pergunta['pergunta']) > 100 ? '...' : ''); ?></td>
                        <td><?php echo $pergunta['alternativa_gabarito']; ?></td>
                        <td><?php echo date('d/m/Y H:i', strtotime($pergunta['data_criacao'])); ?></td>
                        <td class="actions">
                            <a href="excluirPerguntaResposta.php?excluir_multipla=<?php echo $pergunta['numero_pergunta']; ?>" class="btn-delete" onclick="return confirm('Tem certeza que deseja excluir esta pergunta de múltipla escolha?')">Excluir</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </div>

        <div class="content-section">
            <h2>Perguntas de Texto</h2>
            
            <?php if (empty($perguntasTexto)): ?>
                <div class="empty-message">
                    <p>Nenhuma pergunta de texto cadastrada</p>
                </div>
            <?php else: ?>
                <table>
                    <tr>
                        <th>Número</th>
                        <th>Pergunta</th>
                        <th>Data de Criação</th>
                        <th>Ações</th>
                    </tr>
                    <?php foreach ($perguntasTexto as $pergunta): ?>
                    <tr>
                        <td><?php echo $pergunta['numero_pergunta']; ?></td>
                        <td><?php echo htmlspecialchars(substr($pergunta['pergunta'], 0, 100)) . (strlen($pergunta['pergunta']) > 100 ? '...' : ''); ?></td>
                        <td><?php echo date('d/m/Y H:i', strtotime($pergunta['data_criacao'])); ?></td>
                        <td class="actions">
                            <a href="excluirPerguntaResposta.php?excluir_texto=<?php echo $pergunta['numero_pergunta']; ?>" class="btn-delete" onclick="return confirm('Tem certeza que deseja excluir esta pergunta de texto?')">Excluir</a>
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
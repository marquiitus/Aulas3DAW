<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero_pergunta = $_POST['numero_pergunta'];
    $pergunta = $_POST['pergunta'];
    $alternativa_a = $_POST['alternativa_a'];
    $alternativa_b = $_POST['alternativa_b'];
    $alternativa_c = $_POST['alternativa_c'];
    $alternativa_d = $_POST['alternativa_d'];
    $alternativa_e = $_POST['alternativa_e'];
    $alternativa_gabarito = $_POST['alternativa_gabarito'];

    try {
        $stmt = $pdo->prepare("INSERT INTO perguntas_multipla_escolha (numero_pergunta, pergunta, alternativa_a, alternativa_b, alternativa_c, alternativa_d, alternativa_e, alternativa_gabarito) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$numero_pergunta, $pergunta, $alternativa_a, $alternativa_b, $alternativa_c, $alternativa_d, $alternativa_e, $alternativa_gabarito]);
        $mensagem = "Pergunta de múltipla escolha criada com sucesso!";
    } catch (PDOException $e) {
        $erro = "Erro ao criar pergunta: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Pergunta de Múltipla Escolha</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header header-multipla">
        <div class="container">
            <h1>Criar Pergunta de Múltipla Escolha</h1>
            <p>Adicione uma nova pergunta de múltipla escolha ao sistema</p>
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
            <h2>Nova Pergunta de Múltipla Escolha</h2>
            
            <?php if (isset($mensagem)): ?>
                <div class="message success"><?php echo $mensagem; ?></div>
            <?php endif; ?>
            
            <?php if (isset($erro)): ?>
                <div class="message error"><?php echo $erro; ?></div>
            <?php endif; ?>

            <form method="post" class="form-container">
                <div class="form-group">
                    <label for="numero_pergunta">Número da Pergunta:</label>
                    <input type="number" id="numero_pergunta" name="numero_pergunta" required>
                </div>

                <div class="form-group">
                    <label for="pergunta">Pergunta:</label>
                    <textarea id="pergunta" name="pergunta" required></textarea>
                </div>

                <div class="form-group">
                    <label>Alternativas:</label>
                    <div class="alternatives-grid">
                        <div class="alternative-item">
                            <input type="text" id="alternativa_a" name="alternativa_a" placeholder="Alternativa A" required>
                        </div>
                        <div class="alternative-item">
                            <input type="text" id="alternativa_b" name="alternativa_b" placeholder="Alternativa B" required>
                        </div>
                        <div class="alternative-item">
                            <input type="text" id="alternativa_c" name="alternativa_c" placeholder="Alternativa C" required>
                        </div>
                        <div class="alternative-item">
                            <input type="text" id="alternativa_d" name="alternativa_d" placeholder="Alternativa D" required>
                        </div>
                        <div class="alternative-item">
                            <input type="text" id="alternativa_e" name="alternativa_e" placeholder="Alternativa E" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="alternativa_gabarito">Alternativa Correta:</label>
                    <select id="alternativa_gabarito" name="alternativa_gabarito" required>
                        <option value="">Selecione a alternativa correta</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Criar Pergunta</button>
            </form>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p>Sistema de Jogo Corporativo &copy; 2025 - Water Falls</p>
        </div>
    </footer>
</body>
</html>
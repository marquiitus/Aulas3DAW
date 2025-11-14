<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero_pergunta = $_POST['numero_pergunta'];
    $pergunta = $_POST['pergunta'];
    $resposta_gabarito = $_POST['resposta_gabarito'];

    try {
        $stmt = $pdo->prepare("INSERT INTO perguntas_texto (numero_pergunta, pergunta, resposta_gabarito) VALUES (?, ?, ?)");
        $stmt->execute([$numero_pergunta, $pergunta, $resposta_gabarito]);
        $mensagem = "Pergunta de texto criada com sucesso!";
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
    <title>Criar Pergunta de Texto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header header-texto">
        <div class="container">
            <h1>Criar Pergunta de Texto</h1>
            <p>Adicione uma nova pergunta de texto ao sistema</p>
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
            <h2>Nova Pergunta de Texto</h2>
            
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
                    <label for="resposta_gabarito">Resposta Gabarito:</label>
                    <textarea id="resposta_gabarito" name="resposta_gabarito" required></textarea>
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
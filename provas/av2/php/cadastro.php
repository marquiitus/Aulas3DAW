<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sente - Cadastro</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <nav class="nav">
                <div class="logo">Sente</div>
                <ul class="nav-links">
                    <li><a href="#">Teresa</a></li>
                    <li><a href="#">Reserva</a></li>
                    <li><a href="#">Sobre Nós</a></li>
                    <li><a href="#">Parceiros</a></li>
                </ul>
            </nav>
        </header>

        <main class="main-content">
            <div class="login-container">
                <div class="welcome-section">
                    <h1>Crie sua conta</h1>
                    <p>Junte-se a nós agora mesmo</p>
                </div>

                <form class="login-form" id="cadastroForm">
                    <div class="form-group">
                        <label for="nome">Nome completo</label>
                        <input type="text" id="nome" name="nome" required>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" id="senha" name="senha" required>
                    </div>

                    <div class="form-group">
                        <label for="confirmar_senha">Confirmar Senha</label>
                        <input type="password" id="confirmar_senha" name="confirmar_senha" required>
                    </div>

                    <button type="submit" class="btn-login">Cadastrar</button>
                </form>

                <div class="register-link">
                    <p>Já tem conta? <a href="index.html">Faça login</a></p>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.getElementById('cadastroForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const nome = document.getElementById('nome').value;
            const email = document.getElementById('email').value;
            const senha = document.getElementById('senha').value;
            const confirmarSenha = document.getElementById('confirmar_senha').value;
            
            if (senha !== confirmarSenha) {
                alert('As senhas não coincidem!');
                return;
            }
            
            const formData = new FormData();
            formData.append('nome', nome);
            formData.append('email', email);
            formData.append('senha', senha);
            
            fetch('php/registrar.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Cadastro realizado com sucesso!');
                    window.location.href = 'index.html';
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                alert('Erro ao cadastrar. Tente novamente.');
            });
        });
    </script>
</body>
</html>
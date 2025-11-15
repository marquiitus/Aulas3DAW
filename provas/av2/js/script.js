document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = document.getElementById('email').value;
            const senha = document.getElementById('senha').value;
            
            // Validação básica
            if (!email || !senha) {
                showMessage('Por favor, preencha todos os campos.', 'error');
                return;
            }
            
            // Enviar dados para o PHP
            const formData = new FormData();
            formData.append('email', email);
            formData.append('senha', senha);
            
            fetch('php/login.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showMessage('Login realizado com sucesso!', 'success');
                    setTimeout(() => {
                        window.location.href = 'dashboard.php';
                    }, 1000);
                } else {
                    showMessage(data.message, 'error');
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                showMessage('Erro ao fazer login. Tente novamente.', 'error');
            });
        });
    }
    
    function showMessage(message, type) {
        // Remove mensagens existentes
        const existingMessage = document.querySelector('.message');
        if (existingMessage) {
            existingMessage.remove();
        }
        
        // Cria nova mensagem
        const messageDiv = document.createElement('div');
        messageDiv.className = `message ${type}`;
        messageDiv.textContent = message;
        
        // Insere antes do formulário
        const form = document.querySelector('.login-form');
        form.parentNode.insertBefore(messageDiv, form);
        
        // Remove a mensagem após 5 segundos
        setTimeout(() => {
            messageDiv.remove();
        }, 5000);
    }
});
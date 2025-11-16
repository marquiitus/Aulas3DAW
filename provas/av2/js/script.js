document.addEventListener('DOMContentLoaded', function() {
  const loginForm = document.getElementById('loginForm');
  const cadastroForm = document.getElementById('cadastro-form');
  
  if (loginForm) {
    loginForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const email = document.getElementById('email').value;
      const senha = document.getElementById('senha').value;
      
      if (!email || !senha) {
        showMessage('Por favor, preencha todos os campos.', 'error');
        return;
      }
      
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
  
  if (cadastroForm) {
    cadastroForm.addEventListener('submit', function(e) {
      const senha = document.getElementById('senha').value;
      const confirmarSenha = document.getElementById('confirmar_senha').value;
      
      if (senha !== confirmarSenha) {
        e.preventDefault();
        showMessage('As senhas não coincidem!', 'error');
        return false;
      }
      
      if (senha.length < 6) {
        e.preventDefault();
        showMessage('A senha deve ter pelo menos 6 caracteres!', 'error');
        return false;
      }
    });
  }
  
  const urlParams = new URLSearchParams(window.location.search);
  const erro = urlParams.get('erro');
  const sucesso = urlParams.get('sucesso');
  
  if (erro) {
    showMessage(decodeURIComponent(erro), 'error');
  }
  
  if (sucesso) {
    showMessage(decodeURIComponent(sucesso), 'success');
  }
});

function showMessage(message, type) {
  const existingMessage = document.querySelector('.message');
  if (existingMessage) {
    existingMessage.remove();
  }
  
  const messageDiv = document.createElement('div');
  messageDiv.className = `message ${type}`;
  messageDiv.textContent = message;
  
  const form = document.querySelector('.login-form') || document.querySelector('.form-container');
  if (form) {
    form.parentNode.insertBefore(messageDiv, form);
  }
  
  setTimeout(() => {
    if (messageDiv.parentNode) {
      messageDiv.remove();
    }
  }, 5000);
}
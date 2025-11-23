CREATE DATABASE IF NOT EXISTS santa_teresa;
USE santa_teresa;

CREATE TABLE IF NOT EXISTS usuarios (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  endereco TEXT NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  senha VARCHAR(255) NOT NULL,
  passaporte VARCHAR(20) UNIQUE NOT NULL,
  nacionalidade VARCHAR(50) NOT NULL,
  telefone VARCHAR(20),
  data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO usuarios (nome, endereco, email, senha, passaporte, nacionalidade, telefone) 
VALUES (
  'Usuário Teste',
  'Rua Exemplo, 123 - Centro, São Paulo - SP',
  'teste@teste.com',
  '123456',
  'BR123456789',
  'Brasileira',
  '(11) 99999-9999'
);

CREATE TABLE reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    checkin DATE NOT NULL,
    checkout DATE NOT NULL,
    quarto VARCHAR(100) NOT NULL,
    cama VARCHAR(50) NOT NULL,
    pedidos_especiais TEXT,
    status ENUM('pendente', 'confirmada', 'cancelada', 'concluida') DEFAULT 'pendente',
    data_reserva TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_atualizacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    -- Índices para melhor performance
    INDEX idx_email (email),
    INDEX idx_checkin (checkin),
    INDEX idx_status (status)
);

-- Inserir alguns dados de exemplo
INSERT INTO reservas (nome, email, telefone, checkin, checkout, quarto, cama, pedidos_especiais, status) VALUES
('João Silva', 'joao@email.com', '(21) 99999-9999', '2024-06-01', '2024-06-05', 'Dormitório Masculino - 101', 
'Cama 1 - Beliche Superior', 'Gostaria de toalhas extras', 'confirmada'),

('Maria Santos', 'maria@email.com', '(21) 98888-8888', '2024-06-02', '2024-06-07', 'Dormitório Feminino - 102', 
'Cama 2 - Beliche Inferior', 'Vegetariana', 'pendente'),

('Pedro Costa', 'pedro@email.com', '(21) 97777-7777', '2024-06-03', '2024-06-06', 'Quarto Privativo - 201', 
'Cama de Casal', 'Check-in tardio por favor', 'confirmada');
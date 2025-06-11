-- Create the database
CREATE DATABASE IF NOT EXISTS product_management;
USE product_management;

-- Create the products table
CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    preco DECIMAL(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert sample data
INSERT INTO produtos (nome, descricao, preco) VALUES
('Smartphone Galaxy S21', 'Smartphone Samsung Galaxy S21 com 128GB de armazenamento e 8GB de RAM.', 3999.00),
('Notebook Dell Inspiron', 'Notebook Dell Inspiron 15 com processador Intel Core i7, 16GB de RAM e SSD de 512GB.', 4500.00),
('Smart TV LG 50"', 'Smart TV LG 50 polegadas LED 4K com WiFi e Bluetooth integrados.', 2799.90),
('Headphone Bluetooth JBL', 'Fone de ouvido JBL Bluetooth com cancelamento de ruído e 30 horas de bateria.', 399.90);
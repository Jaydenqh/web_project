CREATE DATABASE IF NOT EXISTS minimart_db;
USE minimart_db;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(100) NOT NULL,
    category VARCHAR(50),
    price DECIMAL(10,2),
    quantity INT,
    supplier VARCHAR(100)
);

INSERT INTO products (product_name, category, price, quantity, supplier) VALUES
('Coca Cola', 'Beverages', 2.50, 100, 'Coca-Cola Malaysia'),
('Maggi Mee', 'Instant Food', 4.00, 50, 'Nestle Malaysia'),
('Milo Powder', 'Beverages', 15.00, 20, 'Nestle Malaysia'),
('Dettol Soap', 'Toiletries', 3.50, 40, 'Reckitt Benckiser'),
('Gardenia Bread', 'Bakery', 3.00, 30, 'Gardenia KL');


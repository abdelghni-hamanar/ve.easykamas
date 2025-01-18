-- Create the database
CREATE DATABASE ve_easykamas;

-- Use the created database
USE ve_easykamas;

-- Create users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    country VARCHAR(100),
    ville VARCHAR(100),
    adresse TEXT,
    role ENUM('admin', 'customer') NOT NULL
);

-- Create servers table
CREATE TABLE servers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    server_name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    status ENUM('Incomplet', 'Stock complet') NOT NULL
);

-- Create ventetickets table
CREATE TABLE ventetickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_server INT,
    id_user INT,
    price_server DECIMAL(10, 2) NOT NULL,
    quantity INT NOT NULL,
    status ENUM('holde', 'process', 'done') NOT NULL,
    FOREIGN KEY (id_server) REFERENCES servers(id),
    FOREIGN KEY (id_user) REFERENCES users(id)
);

-- Create echangetickets table
CREATE TABLE echangetickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_server1 INT,
    char1_name VARCHAR(255) NOT NULL,
    quantity_1 INT NOT NULL,
    id_server_2 INT,
    char2_name VARCHAR(255) NOT NULL,
    quantity_2 INT NOT NULL,
    status ENUM('holde', 'process', 'done') NOT NULL,
    FOREIGN KEY (id_server1) REFERENCES servers(id),
    FOREIGN KEY (id_server_2) REFERENCES servers(id)
);

DROP DATABASE IF EXISTS Proyecto_Finanzas;
CREATE DATABASE Proyecto_Finanzas;
USE Proyecto_Finanzas;
-- Crear tabla de Usuarios
CREATE TABLE Usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    dni VARCHAR(20) UNIQUE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    fecha_nacimiento DATE,
    foto VARCHAR(255),
    direccion VARCHAR(255),
    codigo_postal VARCHAR(10),
    ciudad VARCHAR(255),
    provincia VARCHAR(255),
    pais VARCHAR(255) NOT NULL,
    iban VARCHAR(255) UNIQUE NOT NULL,
    es_admin BOOLEAN DEFAULT FALSE,
    saldo DECIMAL(10,2) NOT NULL,
    moneda_preferida ENUM('EUR', 'USD', 'JPY', 'GBP', 'RUB') DEFAULT 'EUR',
    saldo_hexadecimal VARCHAR(255)
);

CREATE TABLE Prestamos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    cantidad DECIMAL(10,2),
    motivo TEXT,
    estado ENUM('pendiente', 'aprobado', 'rechazado'),
    fecha_vencimiento DATE,
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id)
);

CREATE TABLE Transacciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    cantidad DECIMAL(10,2),
    tipo ENUM('añadir', 'retirar'),
	concepto VARCHAR(255) NOT NULL,
    fecha_hora DATETIME,
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id)
);

CREATE TABLE Mensajes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    remitente INT,
    destinatario INT,
    mensaje TEXT,
    fecha_hora DATETIME,
    FOREIGN KEY (remitente) REFERENCES Usuarios(id),
    FOREIGN KEY (destinatario) REFERENCES Usuarios(id)
);


INSERT INTO Usuarios (nombre, apellido, contrasena, dni, email, fecha_nacimiento, pais, iban, es_admin, saldo, moneda_preferida, saldo_hexadecimal)
VALUES ('admin', 'admin', 'admin', '12345678A', 'admin@admin.com', '2001-09-11', 'EEUU', 'IBANAdmin', TRUE, 11092001, 'EUR', '0');


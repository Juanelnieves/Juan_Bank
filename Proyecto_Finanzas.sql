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
	estado ENUM('pendiente', 'aprobado', 'rechazado', 'completado') NOT NULL,
    fecha_vencimiento DATE,
    pago_mensual DECIMAL(10,2) NOT NULL,
    cantidad_restante DECIMAL(10,2) NOT NULL,
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

CREATE TABLE PagosPrestamos (
    id_pago INT AUTO_INCREMENT PRIMARY KEY,
    id_prestamo INT NOT NULL,
    fecha_pago DATE NOT NULL,
    cantidad DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (id_prestamo) REFERENCES Prestamos(id)
);

INSERT INTO Usuarios (nombre, apellido, contrasena, dni, email, fecha_nacimiento, pais, iban, es_admin, saldo, moneda_preferida, saldo_hexadecimal)
VALUES ('admin', 'admin', 'admin', '12345678A', 'admin@admin.com', '2001-09-11', 'EEUU', 'IBANAdmin', TRUE, 11092001, 'EUR', '0');

-- LA CONTRASEÑA CIFRADA ES Juan2004 para acceder a la cuenta admin
INSERT INTO Usuarios (nombre, apellido, contrasena, dni, email, fecha_nacimiento, pais, iban, es_admin, saldo, moneda_preferida, saldo_hexadecimal)
VALUES ('admin', 'admin', '$2y$10$npFvBVlq.YK6MYKYCVa0r.TuGVim8WjwVIzbVno2A4b0JLuhLMfTa', '12342678A', 'admin2@admin.com', '2001-09-11', 'EEUU', 'IBANAadmin', TRUE, 11092001, 'EUR', '0');



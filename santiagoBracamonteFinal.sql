DROP DATABASE IF EXISTS santiagoBracamonteFinal;
CREATE DATABASE santiagoBracamonteFinal;
USE santiagoBracamonteFinal;
CREATE TABLE roles (
    id TINYINT PRIMARY KEY,
    descripcion VARCHAR(20)
);

INSERT INTO roles (id, descripcion) VALUES
(1, 'Administrador'),
(2, 'Empleado');

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30),
    apellido VARCHAR(30),
    usuario VARCHAR(30) UNIQUE,
    contra VARCHAR(30),
    rol TINYINT,
    FOREIGN KEY (rol) REFERENCES roles(id)
);

INSERT INTO usuarios (nombre, apellido, usuario, contra, rol) VALUES
('Juan', 'Bracamonte', 'JBracamonte', 'juan1234', 1),
('Maria', 'Goldenberg', 'MG21', 'mariasol123', 2),
('Santiago', 'Bracamonte', 'SBRACAMONTE', 'santiago1234', 2),
('Cindy','Anzi','CindyAnzi','cindy123',1),
('Peter','Anzi','Peter19','peter123',2),
('Gala','Gonzalez','GGalu','galuymar17',2),
('Liliana','Suarez','lilucha17','marylili',2),
('Mar','Martinez','Marchuri','maryviento23',1),
('Margarita','Luz','margarita','luzyfuerza',2),
('Rocio','Bracamonte','Ro28','rocio123',2);

CREATE TABLE productos (
   codigo INT AUTO_INCREMENT PRIMARY KEY,
    descripcion VARCHAR(100),
    precio DOUBLE,
    cantidad INT,
    peso FLOAT,
    fecha_ingreso DATE
);
CREATE DATABASE IF NOT EXISTS clinica_central
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE clinica_central;

CREATE TABLE IF NOT EXISTS Pacientes (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(80) NOT NULL,
  apellido VARCHAR(80) NOT NULL,
  correo VARCHAR(120) NOT NULL,
  telefono VARCHAR(20) DEFAULT NULL,
  creado_en TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY uq_Pacientes_correo (correo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO Pacientes (nombre, apellido, correo, telefono) VALUES
('Duabn', 'Gómez', 'Duban.gomez@example.com', '3001234567'),
('Pablo', 'Martínez', 'Pablo.martinez@example.com', '3109876543'),
('Juan', 'Arenas', 'Juan.arenas@example.com', '3109876543'),
('Samuel', 'Molina', 'Samuel.molina@example.com', '3109876543'),
('Ronald', 'De Arenas', 'Ronald.Dearenas@example.com', '3109876543'),
('Diego', 'Rojas', 'Diego.rojas@example.com', NULL);

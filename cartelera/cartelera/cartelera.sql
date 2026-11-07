-- =====================================================================
--  cartelera.sql  ·  la base de esta práctica
--  Una sola tabla. Importar en phpMyAdmin: Importar -> elegir archivo.
-- =====================================================================

DROP DATABASE IF EXISTS cine;
CREATE DATABASE cine CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE cine;

CREATE TABLE peliculas (
    id       INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titulo   VARCHAR(100)  NOT NULL,
    sala     VARCHAR(20)   NOT NULL,
    horario  TIME          NOT NULL,
    precio   DECIMAL(6,2)  NOT NULL,
    entradas INT UNSIGNED  NOT NULL   -- cuántas quedan a la venta
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO peliculas (titulo, sala, horario, precio, entradas) VALUES
('El último verano',    'Sala 1', '18:00', 320.00, 48),
('Ciudad de nadie',     'Sala 2', '19:30', 380.00,  0),
('La vuelta al barrio', 'Sala 1', '20:45', 320.00,  7),
('Noche de tormenta',   'Sala 3', '21:00', 450.00, 112),
('Los días contados',   'Sala 2', '22:15', 380.00,  3),
('El tren de las seis', 'Sala 3', '23:30', 450.00, 65);

-- Fijate que hay una película agotada (0 entradas) y dos con pocas.
-- Eso lo vas a necesitar para la zona 3.

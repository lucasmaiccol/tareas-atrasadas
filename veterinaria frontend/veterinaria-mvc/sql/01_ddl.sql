-- =====================================================================
--  01_ddl.sql  —  DDL (Data Definition Language)
--  Estructura de la base "veterinaria"
--
--  DDL es el sublenguaje de SQL que DEFINE la estructura:
--  CREATE, ALTER, DROP. No mueve datos, mueve el "molde".
--
--  Ejecutar PRIMERO, desde phpMyAdmin → Importar.
-- =====================================================================

DROP DATABASE IF EXISTS veterinaria;
CREATE DATABASE veterinaria
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE veterinaria;

-- ---------------------------------------------------------------------
--  ESPECIES   (perro, gato, conejo...)  — sin dependencias
-- ---------------------------------------------------------------------
CREATE TABLE especies (
    id              INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre          VARCHAR(40)  NOT NULL,
    esperanza_vida  TINYINT UNSIGNED NULL COMMENT 'Años de vida promedio',

    CONSTRAINT uq_especies_nombre UNIQUE (nombre)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------
--  VETERINARIOS
-- ---------------------------------------------------------------------
CREATE TABLE veterinarios (
    id            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre        VARCHAR(100) NOT NULL,
    especialidad  VARCHAR(60)  NULL,
    activo        TINYINT(1)   NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------
--  CLIENTES   (los dueños de las mascotas)
-- ---------------------------------------------------------------------
CREATE TABLE clientes (
    id         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre     VARCHAR(100) NOT NULL,
    documento  VARCHAR(20)  NOT NULL,
    telefono   VARCHAR(30)  NULL,
    email      VARCHAR(120) NULL,
    direccion  VARCHAR(150) NULL,
    alta       DATE         NOT NULL,

    CONSTRAINT uq_clientes_documento UNIQUE (documento),
    INDEX idx_clientes_nombre (nombre)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------
--  MASCOTAS   (N:1 con clientes, N:1 con especies)
-- ---------------------------------------------------------------------
CREATE TABLE mascotas (
    id              INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre          VARCHAR(60)  NOT NULL,
    fecha_nacimiento DATE        NULL,
    sexo            ENUM('M','H') NOT NULL,
    peso_kg         DECIMAL(5,2) NULL,
    cliente_id      INT UNSIGNED NOT NULL,
    especie_id      INT UNSIGNED NOT NULL,

    CONSTRAINT fk_mascotas_cliente
        FOREIGN KEY (cliente_id) REFERENCES clientes(id)
        ON DELETE CASCADE  ON UPDATE CASCADE,

    CONSTRAINT fk_mascotas_especie
        FOREIGN KEY (especie_id) REFERENCES especies(id)
        ON DELETE RESTRICT ON UPDATE CASCADE,

    INDEX idx_mascotas_nombre (nombre)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------
--  CONSULTAS   (cada visita al veterinario)
-- ---------------------------------------------------------------------
CREATE TABLE consultas (
    id              INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    mascota_id      INT UNSIGNED NOT NULL,
    veterinario_id  INT UNSIGNED NOT NULL,
    fecha           DATE         NOT NULL,
    motivo          VARCHAR(150) NOT NULL,
    diagnostico     TEXT         NULL,
    costo           DECIMAL(8,2) NOT NULL DEFAULT 0,

    CONSTRAINT fk_consultas_mascota
        FOREIGN KEY (mascota_id) REFERENCES mascotas(id)
        ON DELETE CASCADE  ON UPDATE CASCADE,

    CONSTRAINT fk_consultas_veterinario
        FOREIGN KEY (veterinario_id) REFERENCES veterinarios(id)
        ON DELETE RESTRICT ON UPDATE CASCADE,

    INDEX idx_consultas_fecha (fecha)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =====================================================================
--  El modelo de datos queda así:
--
--     especies ──< mascotas >── clientes
--                     │
--                     ^
--                 consultas >── veterinarios
--
--  Leelo como: "una especie tiene muchas mascotas",
--              "un cliente tiene muchas mascotas",
--              "una mascota tiene muchas consultas",
--              "un veterinario atiende muchas consultas".
-- =====================================================================

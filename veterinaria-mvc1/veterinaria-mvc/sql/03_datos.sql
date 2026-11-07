-- =====================================================================
--  03_datos.sql  —  DML de carga inicial
--
--  DML (Data Manipulation Language) es el sublenguaje que mueve DATOS:
--  INSERT, UPDATE, DELETE, SELECT.
--
--  Ejecutar TERCERO, después de 01_ddl.sql y 02_dcl.sql
-- =====================================================================

USE veterinaria;

-- ------------------------------ ESPECIES -----------------------------
INSERT INTO especies (id, nombre, esperanza_vida) VALUES
(1, 'Perro',    13),
(2, 'Gato',     15),
(3, 'Conejo',   9),
(4, 'Hámster',  3),
(5, 'Tortuga',  40),
(6, 'Loro',     25);

-- --------------------------- VETERINARIOS ----------------------------
INSERT INTO veterinarios (id, nombre, especialidad, activo) VALUES
(1, 'Dra. Cecilia Márquez', 'Clínica general',  1),
(2, 'Dr. Andrés Bentancor', 'Cirugía',          1),
(3, 'Dra. Paula Rivas',     'Dermatología',     1),
(4, 'Dr. Jorge Lemos',      'Animales exóticos',1),
(5, 'Dra. Noelia Ferrán',   'Clínica general',  0);

-- ------------------------------ CLIENTES -----------------------------
INSERT INTO clientes (id, nombre, documento, telefono, email, direccion, alta) VALUES
(1,  'Lucía Fernández',   '41234567', '099 123 456', 'lucia.f@mail.com',    'Rivera 2340',       '2024-03-12'),
(2,  'Martín Rodríguez',  '38765432', '098 765 432', 'martinr@mail.com',    '18 de Julio 1875',  '2024-05-20'),
(3,  'Sofía Píriz',       '45678901', '091 456 789', 'spiriz@mail.com',     'Bulevar Artigas 990','2024-08-02'),
(4,  'Diego Cabrera',     '39876543', '094 321 654', NULL,                  'Canelones 1520',    '2025-01-15'),
(5,  'Valentina Souza',   '47123456', '092 888 111', 'vsouza@mail.com',     'Gonzalo Ramírez 45','2025-02-28'),
(6,  'Rodrigo Methol',    '36543210', '099 555 222', 'rmethol@mail.com',    'Maldonado 1130',    '2025-04-09'),
(7,  'Camila Onetto',     '48901234', '095 777 333', 'camilao@mail.com',    'Durazno 2201',      '2025-06-17'),
(8,  'Federico Aguirre',  '37654321', '098 444 999', NULL,                  'Yaguarón 1450',     '2025-09-05'),
(9,  'Ana Belén Torres',  '46012345', '091 222 777', 'abtorres@mail.com',   'Colonia 1890',      '2025-11-21'),
(10, 'Gonzalo Pereyra',   '35432109', '094 666 000', 'gpereyra@mail.com',   'Paysandú 1015',     '2026-01-30');

-- ------------------------------ MASCOTAS -----------------------------
INSERT INTO mascotas (id, nombre, fecha_nacimiento, sexo, peso_kg, cliente_id, especie_id) VALUES
(1,  'Rocco',    '2019-04-15', 'M', 28.50, 1,  1),
(2,  'Mica',     '2021-09-03', 'H',  4.20, 1,  2),
(3,  'Tommy',    '2017-01-22', 'M', 12.80, 2,  1),
(4,  'Nube',     '2022-06-11', 'H',  3.90, 2,  2),
(5,  'Bigotes',  '2020-11-30', 'M',  5.10, 3,  2),
(6,  'Pelusa',   '2023-02-14', 'H',  1.80, 3,  3),
(7,  'Zeus',     '2018-07-08', 'M', 35.20, 4,  1),
(8,  'Luna',     '2021-03-19', 'H', 18.40, 5,  1),
(9,  'Canela',   '2023-08-25', 'H',  0.15, 5,  4),
(10, 'Toribio',  '2010-05-01', 'M',  2.30, 6,  5),
(11, 'Paco',     '2016-12-09', 'M',  0.95, 6,  6),
(12, 'Simba',    '2022-01-27', 'M',  6.70, 7,  2),
(13, 'Ronca',    '2019-10-16', 'H', 22.10, 8,  1),
(14, 'Copito',   '2024-03-05', 'M',  1.40, 9,  3),
(15, 'Athena',   '2020-08-12', 'H',  9.60, 9,  1),
(16, 'Manchas',  '2015-06-20', 'M', 31.00, 10, 1),
(17, 'Pipo',     '2023-11-11', 'M',  0.12, 10, 4),
(18, 'Greta',    '2021-05-07', 'H',  4.80, 4,  2);

-- ----------------------------- CONSULTAS -----------------------------
INSERT INTO consultas (mascota_id, veterinario_id, fecha, motivo, diagnostico, costo) VALUES
(1,  1, '2026-02-10', 'Vacunación anual',        'Sin novedades. Refuerzo aplicado.',        1200.00),
(1,  3, '2026-05-18', 'Picazón en el lomo',      'Dermatitis alérgica. Tratamiento tópico.', 2400.00),
(2,  1, '2026-01-25', 'Control general',         'Peso adecuado. Todo normal.',               900.00),
(3,  2, '2025-11-30', 'Cojera pata trasera',     'Esguince leve. Reposo 15 días.',           3100.00),
(3,  1, '2026-03-14', 'Control post-operatorio', 'Recuperación completa.',                    800.00),
(4,  1, '2026-04-02', 'Vacunación anual',        'Refuerzo aplicado.',                       1200.00),
(5,  3, '2026-06-08', 'Caída de pelo',           'Hongos. Antimicótico por 3 semanas.',      2700.00),
(6,  4, '2026-05-21', 'No come hace 2 días',     'Problema dental. Limado de incisivos.',    2900.00),
(7,  2, '2026-01-09', 'Bulto en el costado',     'Lipoma benigno. Extraído.',                7500.00),
(7,  1, '2026-02-01', 'Retiro de puntos',        'Cicatrización correcta.',                   600.00),
(8,  1, '2026-06-30', 'Vacunación anual',        'Refuerzo aplicado.',                       1200.00),
(9,  4, '2026-07-12', 'Letargo',                 'Deshidratación. Suero subcutáneo.',        1800.00),
(10, 4, '2026-03-27', 'Control anual',           'Caparazón en buen estado.',                1500.00),
(11, 4, '2026-04-19', 'Se arranca las plumas',   'Estrés por falta de estímulo.',            2200.00),
(12, 1, '2026-07-05', 'Vacunación anual',        'Refuerzo aplicado.',                       1200.00),
(13, 2, '2026-06-14', 'Herida en la oreja',      'Sutura de 4 puntos.',                      3400.00),
(13, 1, '2026-06-28', 'Retiro de puntos',        'Sin infección.',                            600.00),
(15, 1, '2026-07-20', 'Control general',         'Sobrepeso leve. Plan alimenticio.',        1000.00),
(16, 2, '2026-05-03', 'Dificultad para caminar', 'Artrosis de cadera. Antiinflamatorio.',    4200.00),
(16, 1, '2026-07-26', 'Control de artrosis',     'Mejora parcial. Continuar tratamiento.',    900.00),
(18, 3, '2026-08-11', 'Manchas en la piel',      'Dermatitis por contacto.',                 2300.00),
(1,  1, '2026-08-30', 'Control general',         'Peso estable. Todo normal.',                900.00),
(12, 3, '2026-09-04', 'Rascado de orejas',       'Ácaros. Tratamiento ótico.',               2100.00);

-- =====================================================================
--  Resumen de lo cargado:
--    6 especies · 5 veterinarios · 10 clientes
--    18 mascotas · 23 consultas
--
--  Ojo: las mascotas 14 y 17 NO tienen ninguna consulta registrada.
--  Eso es a propósito: sirve para practicar LEFT JOIN y para que se note
--  la diferencia con INNER JOIN.
-- =====================================================================

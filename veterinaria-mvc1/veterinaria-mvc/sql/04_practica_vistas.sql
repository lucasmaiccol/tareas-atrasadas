-- =====================================================================
--  04_practica_vistas.sql
--  Ejecutar ANTES de la clase de vistas (después de los otros tres).
--
--  Deja el peso de una mascota vacío, para que se pueda probar el caso
--  "mostrar un guión cuando no hay dato" de la zona 2.
-- =====================================================================

USE veterinaria;

UPDATE mascotas SET peso_kg = NULL WHERE nombre = 'Greta';

-- Para comprobar que quedó: la ficha de Greta tiene que mostrar "—"
-- en el peso una vez resuelta la zona 2.
SELECT id, nombre, peso_kg FROM mascotas WHERE nombre = 'Greta';

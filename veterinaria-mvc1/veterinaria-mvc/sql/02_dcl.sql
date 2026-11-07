-- =====================================================================
--  02_dcl.sql  —  DCL (Data Control Language)
--  Usuario de la aplicación y sus permisos
--
--  DCL es el sublenguaje de SQL que controla QUIÉN puede hacer QUÉ:
--  CREATE USER, GRANT, REVOKE, DROP USER.
--
--  ¿Por qué no usamos root en la aplicación?
--  Porque root puede borrar la base entera. Si alguien encuentra un
--  agujero en la app, con root se lleva todo puesto. El usuario de la
--  aplicación solo necesita leer y escribir filas: no necesita poder
--  borrar tablas ni crear bases de datos.
--
--  Esto se llama PRINCIPIO DE MÍNIMO PRIVILEGIO: dar exactamente los
--  permisos necesarios, ni uno más.
--
--  Ejecutar SEGUNDO, después de 01_ddl.sql
-- =====================================================================

-- ---------------------------------------------------------------------
--  1) Crear el usuario
-- ---------------------------------------------------------------------
--  'vet_app'@'localhost'  =  el usuario vet_app, pero SOLO si se conecta
--  desde la misma máquina. Si alguien intenta entrar con ese usuario
--  desde otra computadora, MySQL lo rechaza.
-- ---------------------------------------------------------------------

DROP USER IF EXISTS 'vet_app'@'localhost';

CREATE USER 'vet_app'@'localhost'
    IDENTIFIED BY 'vet2026';

-- ---------------------------------------------------------------------
--  2) Dar permisos de datos (DML) sobre ESTA base únicamente
-- ---------------------------------------------------------------------
--  veterinaria.*  significa "todas las tablas de la base veterinaria".
--  El usuario no ve ni toca ninguna otra base del servidor.
-- ---------------------------------------------------------------------

GRANT SELECT, INSERT, UPDATE, DELETE
    ON veterinaria.*
    TO 'vet_app'@'localhost';

-- ---------------------------------------------------------------------
--  3) Lo que NO le damos, a propósito
-- ---------------------------------------------------------------------
--  No tiene: CREATE, DROP, ALTER, GRANT.
--  O sea: puede trabajar con las filas, pero no puede cambiar la
--  estructura de la base ni repartir permisos a otros.
--
--  Estas líneas están comentadas porque los permisos no se otorgaron.
--  Se dejan a la vista para que se entienda la diferencia:
--
--     GRANT CREATE, DROP, ALTER ON veterinaria.* TO 'vet_app'@'localhost';
--     GRANT ALL PRIVILEGES ON *.* TO 'vet_app'@'localhost';   -- ¡nunca!
-- ---------------------------------------------------------------------

FLUSH PRIVILEGES;

-- ---------------------------------------------------------------------
--  4) Para verificar que quedó bien
-- ---------------------------------------------------------------------
--  Corré esta consulta y mirá la lista de permisos que devuelve:

SHOW GRANTS FOR 'vet_app'@'localhost';

-- ---------------------------------------------------------------------
--  Ejemplo de REVOKE (quitar un permiso ya dado)
--  No lo ejecutes ahora; es para que veas la sintaxis.
--
--     REVOKE DELETE ON veterinaria.* FROM 'vet_app'@'localhost';
--
--  Y para eliminar el usuario por completo:
--
--     DROP USER 'vet_app'@'localhost';
-- ---------------------------------------------------------------------

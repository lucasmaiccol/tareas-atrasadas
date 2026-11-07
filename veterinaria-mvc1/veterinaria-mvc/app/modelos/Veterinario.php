<?php
/**
 * =====================================================================
 *  Veterinario.php  —  EJEMPLO RESUELTO  ·  nada para hacer acá
 * =====================================================================
 *
 *  Este modelo ya está terminado. Es tu referencia: cuando no sepas
 *  cómo encarar una función de los otros archivos, mirá cómo está
 *  resuelta una parecida acá.
 *
 *  Tabla `veterinarios`:
 *      id            INT
 *      nombre        VARCHAR(100)
 *      especialidad  VARCHAR(60)   NULL
 *      activo        TINYINT(1)
 * =====================================================================
 */
class Veterinario extends Modelo
{
    /**
     * Todos los veterinarios en actividad, ordenados por nombre.
     *
     * RECIBE:   nada
     * DEVUELVE: array de arrays con 'id', 'nombre', 'especialidad'
     *
     * Fijate en tres cosas:
     *   · la consulta se guarda en una variable $sql, para leerla mejor
     *   · se listan las columnas en vez de usar SELECT *
     *   · fetchAll() porque esperamos varias filas
     */
    public function activos()
    {
        $sql = "SELECT id, nombre, especialidad
                FROM veterinarios
                WHERE activo = 1
                ORDER BY nombre";

        return $this->consulta($sql)->fetchAll();
    }


    /**
     * Un veterinario por su id.
     *
     * RECIBE:   $id  int
     * DEVUELVE: array asociativo, o null si no existe
     *
     * Fijate en dos cosas:
     *   · el id va como PARÁMETRO PREPARADO: el ? en el SQL y el valor
     *     aparte, en el array. Nunca concatenado.
     *   · fetch() devuelve false cuando no hay resultado, y el contrato
     *     pide null: por eso la última línea lo convierte.
     */
    public function buscarPorId($id)
    {
        $sql = "SELECT id, nombre, especialidad, activo
                FROM veterinarios
                WHERE id = ?
                LIMIT 1";

        $fila = $this->consulta($sql, [(int) $id])->fetch();

        return $fila === false ? null : $fila;
    }


    /**
     * Cuántos veterinarios activos hay.
     *
     * RECIBE:   nada
     * DEVUELVE: int
     *
     * Fijate: COUNT(*) devuelve UNA fila con UNA columna. Se le pone un
     * alias con AS para poder leerla, se trae con fetch() y se convierte
     * a entero antes de devolverla, porque MySQL la manda como texto.
     */
    public function contarActivos()
    {
        $sql = "SELECT COUNT(*) AS total
                FROM veterinarios
                WHERE activo = 1";

        $fila = $this->consulta($sql)->fetch();

        return (int) $fila['total'];
    }


    /**
     * Veterinarios de una especialidad, con búsqueda parcial.
     *
     * RECIBE:   $especialidad  string
     * DEVUELVE: array de arrays
     *
     * Fijate cómo se arma el LIKE: el comodín % se concatena en PHP y
     * todo junto viaja como parámetro. El SQL solo tiene el ?.
     */
    public function porEspecialidad($especialidad)
    {
        $patron = '%' . $especialidad . '%';

        $sql = "SELECT id, nombre, especialidad
                FROM veterinarios
                WHERE especialidad LIKE ?
                  AND activo = 1
                ORDER BY nombre";

        return $this->consulta($sql, [$patron])->fetchAll();
    }
}

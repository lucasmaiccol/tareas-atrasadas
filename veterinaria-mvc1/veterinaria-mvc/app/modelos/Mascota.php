<?php
/**
 * =====================================================================
 *  Mascota.php  —  NIVEL 2  ·  5 funciones para resolver
 * =====================================================================
 *
 *  Acá empiezan los JOIN. Es el modelo central del proyecto.
 *
 *  Tabla `mascotas`:
 *      id                INT
 *      nombre            VARCHAR(60)
 *      fecha_nacimiento  DATE      NULL
 *      sexo              ENUM('M','H')
 *      peso_kg           DECIMAL   NULL
 *      cliente_id        INT   → clientes.id
 *      especie_id        INT   → especies.id
 *
 *  RECORDATORIO SOBRE JOIN
 *  -----------------------
 *  La tabla `mascotas` guarda cliente_id y especie_id, que son números.
 *  Pero en pantalla no queremos ver "cliente 3": queremos ver
 *  "Sofía Píriz". Para eso se une con las otras tablas:
 *
 *      SELECT m.nombre, c.nombre
 *      FROM mascotas m
 *      INNER JOIN clientes c ON c.id = m.cliente_id
 *
 *  Como las dos tablas tienen una columna `nombre`, hay que ponerle
 *  alias a por lo menos una, o PHP recibe una sola:
 *
 *      SELECT m.nombre AS mascota, c.nombre AS dueno
 * =====================================================================
 */
class Mascota extends Modelo
{
    /**
     * -----------------------------------------------------------------
     *  EJERCICIO 8  ·  Listado general de mascotas
     * -----------------------------------------------------------------
     *  Devuelve todas las mascotas con el nombre de su dueño y el de
     *  su especie. Une TRES tablas.
     *
     *  RECIBE:   nada
     *
     *  DEVUELVE: array de arrays, ordenado por nombre de mascota, con
     *            EXACTAMENTE estos campos (los nombres importan, la
     *            vista los busca así):
     *
     *              'id'          int      id de la mascota
     *              'nombre'      string   nombre de la mascota
     *              'sexo'        string   'M' o 'H'
     *              'peso_kg'     string   puede venir null
     *              'dueno'       string   nombre del cliente
     *              'cliente_id'  int      para armar el enlace a su ficha
     *              'especie'     string   nombre de la especie
     *
     *  Se usa en: la vista mascotas/index
     * -----------------------------------------------------------------
     */
    public function todasConDuenoYEspecie()
    {
        // TODO — Ejercicio 8

        return [];
    }


    /**
     * -----------------------------------------------------------------
     *  EJERCICIO 9  ·  Las mascotas de un cliente
     * -----------------------------------------------------------------
     *  RECIBE:   $clienteId  int
     *
     *  DEVUELVE: array de arrays con las mascotas de ese cliente,
     *            ordenadas por nombre:
     *
     *              'id'               int
     *              'nombre'           string
     *              'sexo'             string
     *              'fecha_nacimiento' string o null
     *              'especie'          string   nombre de la especie
     *
     *  Se usa en: la vista clientes/ficha
     * -----------------------------------------------------------------
     */
    public function porCliente($clienteId)
    {
        // TODO — Ejercicio 9

        return [];
    }


    /**
     * -----------------------------------------------------------------
     *  EJERCICIO 10  ·  Ficha completa de una mascota
     * -----------------------------------------------------------------
     *  RECIBE:   $id  int
     *
     *  DEVUELVE: UN array asociativo (no una lista), o null si no existe:
     *
     *              'id'               int
     *              'nombre'           string
     *              'fecha_nacimiento' string o null
     *              'sexo'             string
     *              'peso_kg'          string o null
     *              'dueno'            string
     *              'cliente_id'       int
     *              'especie'          string
     *              'esperanza_vida'   int o null   (viene de especies)
     *
     *  Se usa en: la vista mascotas/ficha
     * -----------------------------------------------------------------
     */
    public function verFicha($id)
    {
        // TODO — Ejercicio 10

        return null;
    }


    /**
     * -----------------------------------------------------------------
     *  EJERCICIO 11  ·  Peso promedio por especie
     * -----------------------------------------------------------------
     *  Para cada especie que TENGA mascotas registradas, devuelve
     *  cuántas hay y cuánto pesan en promedio.
     *
     *  RECIBE:   nada
     *
     *  DEVUELVE: array de arrays, ordenado de más a menos mascotas:
     *
     *              'especie'       string
     *              'cantidad'      int
     *              'peso_promedio' string   (lo que devuelva AVG)
     *
     *  Las especies sin ninguna mascota NO tienen que aparecer acá.
     *  Pensá qué JOIN corresponde: ¿el mismo del ejercicio 2 o el otro?
     *
     *  Se usa en: el panel de inicio
     *  SQL: JOIN + COUNT + AVG + GROUP BY + ORDER BY
     *
     *  Pista: para que el promedio no salga con ocho decimales, podés
     *  envolverlo:  ROUND(AVG(m.peso_kg), 2)
     * -----------------------------------------------------------------
     */
    public function pesoPromedioPorEspecie()
    {
        // TODO — Ejercicio 11

        return [];
    }


    /**
     * -----------------------------------------------------------------
     *  EJERCICIO 12  ·  Actualizar el peso de una mascota
     * -----------------------------------------------------------------
     *  RECIBE:   $id       int
     *            $pesoKg   float   el peso nuevo
     *
     *  DEVUELVE: bool — true si se actualizó alguna fila, false si no.
     *
     *  Pista: el objeto que devuelve $this->consulta() tiene un método
     *  rowCount() que dice cuántas filas fueron afectadas. Guardalo en
     *  una variable en lugar de encadenarlo:
     *
     *      $sentencia = $this->consulta($sql, [...]);
     *      return $sentencia->rowCount() > 0;
     *
     *  Se usa en: el formulario de la ficha de mascota
     *  SQL: UPDATE ... SET ... WHERE id = ?
     * -----------------------------------------------------------------
     */
    public function actualizarPeso($id, $pesoKg)
    {
        // TODO — Ejercicio 12

        return false;
    }
}

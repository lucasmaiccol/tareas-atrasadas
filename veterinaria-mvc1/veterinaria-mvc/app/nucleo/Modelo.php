<?php
/**
 * Modelo — Clase base de todos los modelos.  [RESUELTO — no tocar]
 *
 * Acá vive el método consulta(), que es el que vas a usar en TODOS
 * los ejercicios. Leelo con atención antes de empezar.
 */
abstract class Modelo
{
    /** @var PDO */
    protected $db;

    /** Modelos usados en esta petición (para la barra de traza) */
    public static $usados = [];

    public function __construct()
    {
        $this->db = Database::conexion();
        self::$usados[get_class($this)] = true;
    }

    // =================================================================
    //  EL MÉTODO QUE VAS A USAR SIEMPRE
    // =================================================================

    /**
     * Ejecuta una consulta preparada y devuelve el PDOStatement.
     *
     * Consulta preparada = el SQL viaja por un lado y los datos por otro.
     * Es lo que protege de la inyección SQL. NUNCA concatenes lo que
     * viene del usuario dentro del string de la consulta.
     *
     *   MAL : "SELECT * FROM mascotas WHERE id = " . $id
     *   BIEN : $this->consulta("SELECT * FROM mascotas WHERE id = ?", [$id])
     *
     * Después de llamarlo, para obtener los datos:
     *
     *   ->fetchAll()   devuelve TODAS las filas, como array de arrays.
     *                  Si no hay ninguna, devuelve un array vacío [].
     *
     *   ->fetch()      devuelve UNA sola fila, como array asociativo.
     *                  Si no hay ninguna, devuelve false.
     *
     * Ejemplos completos:
     *
     *   // Varias filas
     *   $sql = "SELECT id, nombre FROM especies ORDER BY nombre";
     *   return $this->consulta($sql)->fetchAll();
     *
     *   // Una fila, con parámetro
     *   $sql = "SELECT * FROM clientes WHERE id = ?";
     *   $fila = $this->consulta($sql, [$id])->fetch();
     *   return $fila === false ? null : $fila;
     *
     *   // Dos parámetros: el orden del array es el orden de los ?
     *   $sql = "SELECT * FROM consultas WHERE fecha >= ? AND costo > ?";
     *   return $this->consulta($sql, [$desde, $minimo])->fetchAll();
     *
     * @param  string $sql         La consulta, con ? donde vayan los datos
     * @param  array  $parametros  Los valores, en el mismo orden que los ?
     * @return PDOStatement
     */
    protected function consulta($sql, array $parametros = [])
    {
        Database::registrar($sql, $parametros);

        $sentencia = $this->db->prepare($sql);
        $sentencia->execute($parametros);

        return $sentencia;
    }

    /**
     * Devuelve el id que MySQL le asignó a la última fila insertada.
     * Se usa después de un INSERT.
     *
     * @return int
     */
    protected function ultimoId()
    {
        return (int) $this->db->lastInsertId();
    }
}

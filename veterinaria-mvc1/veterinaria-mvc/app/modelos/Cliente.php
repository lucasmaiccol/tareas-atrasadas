<?php
/**
 * =====================================================================
 *  Cliente.php  —  NIVEL 1 y 2  ·  5 funciones para resolver
 * =====================================================================
 *
 *  Tabla `clientes`:
 *      id         INT
 *      nombre     VARCHAR(100)
 *      documento  VARCHAR(20)   UNIQUE
 *      telefono   VARCHAR(30)   NULL
 *      email      VARCHAR(120)  NULL
 *      direccion  VARCHAR(150)  NULL
 *      alta       DATE
 * =====================================================================
 */
class Cliente extends Modelo
{
    /**
     * -----------------------------------------------------------------
     *  EJERCICIO 3  ·  Listar todos los clientes
     * -----------------------------------------------------------------
     *  RECIBE:   nada
     *
     *  DEVUELVE: array de arrays con TODAS las columnas de la tabla,
     *            ordenado por nombre de la A a la Z.
     *
     *  Se usa en: la vista clientes/index
     * -----------------------------------------------------------------
     */
    public function todos()
    {
        // TODO — Ejercicio 3

        return [];
    }


    /**
     * -----------------------------------------------------------------
     *  EJERCICIO 4  ·  Buscar un cliente por su id
     * -----------------------------------------------------------------
     *  RECIBE:   $id  int   el id del cliente
     *
     *  DEVUELVE: un array asociativo con las columnas del cliente,
     *            o null si no existe ninguno con ese id.
     *
     *  ATENCIÓN A DOS COSAS:
     *
     *  1) El id viene de la URL, o sea del usuario. Va SÍ O SÍ como
     *     parámetro preparado, nunca concatenado dentro del SQL.
     *
     *  2) fetch() devuelve false cuando no encuentra nada, pero el
     *     contrato pide null. Tenés que convertirlo.
     *
     *  Se usa en: la vista clientes/ficha
     * -----------------------------------------------------------------
     */
    public function buscarPorId($id)
    {
        // TODO — Ejercicio 4

        return null;
    }


    /**
     * -----------------------------------------------------------------
     *  EJERCICIO 5  ·  Buscador de clientes
     * -----------------------------------------------------------------
     *  Busca clientes cuyo nombre, documento o email contengan el texto
     *  buscado. La búsqueda es parcial: buscar "lu" tiene que encontrar
     *  a "Lucía Fernández".
     *
     *  RECIBE:   $texto  string   lo que escribió el usuario
     *
     *  DEVUELVE: array de arrays con las columnas de los clientes que
     *            coincidan, ordenado por nombre. Si no coincide ninguno,
     *            un array vacío [].
     *
     *  CÓMO SE HACE LA BÚSQUEDA PARCIAL:
     *    Se usa LIKE con el comodín %. El comodín se arma en PHP y se
     *    manda como parámetro; NO se escribe dentro del SQL.
     *
     *      $patron = '%' . $texto . '%';
     *      $sql = "SELECT ... WHERE nombre LIKE ?";
     *      return $this->consulta($sql, [$patron])->fetchAll();
     *
     *    Como hay que buscar en tres columnas, van tres ? y el array
     *    lleva el mismo patrón tres veces.
     *
     *  Se usa en: la vista clientes/index (el buscador de arriba)
     * -----------------------------------------------------------------
     */
    public function buscar($texto)
    {
        // TODO — Ejercicio 5

        return [];
    }


    /**
     * -----------------------------------------------------------------
     *  EJERCICIO 6  ·  Cuántos clientes hay
     * -----------------------------------------------------------------
     *  RECIBE:   nada
     *
     *  DEVUELVE: int — la cantidad total de clientes.
     *            Ojo: un NÚMERO, no un array.
     *
     *  Pista: COUNT(*) devuelve una fila con una columna. Ponele un
     *  alias con AS para poder leerla cómodo, traela con fetch() y
     *  convertila a entero con (int) antes de devolverla.
     *
     *  Se usa en: el panel de inicio
     * -----------------------------------------------------------------
     */
    public function contar()
    {
        // TODO — Ejercicio 6

        return 0;
    }


    /**
     * -----------------------------------------------------------------
     *  EJERCICIO 7  ·  Dar de alta un cliente
     * -----------------------------------------------------------------
     *  RECIBE:   $datos  array asociativo con estas claves:
     *              'nombre'    string
     *              'documento' string
     *              'telefono'  string o null
     *              'email'     string o null
     *              'direccion' string o null
     *
     *  DEVUELVE: int — el id que MySQL le asignó al cliente nuevo.
     *
     *  DOS DETALLES:
     *
     *  1) La columna `alta` no viene en $datos: es la fecha de hoy.
     *     Podés resolverlo con la función CURDATE() de MySQL dentro
     *     del INSERT, o pasando date('Y-m-d') desde PHP.
     *
     *  2) Para devolver el id, la clase Modelo te da el método
     *     $this->ultimoId().
     *
     *  Se usa en: el formulario de alta de cliente
     *  SQL: INSERT INTO ... VALUES (?, ?, ...)
     * -----------------------------------------------------------------
     */
    public function crear(array $datos)
    {
        // TODO — Ejercicio 7

        return 0;
    }
}

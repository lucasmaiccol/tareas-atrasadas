<?php
/**
 * =====================================================================
 *  Especie.php  —  NIVEL 1  ·  2 funciones para resolver
 * =====================================================================
 *
 *  Este es el modelo más simple. Empezá por acá.
 *
 *  Tabla `especies`:
 *      id              INT
 *      nombre          VARCHAR(40)
 *      esperanza_vida  TINYINT      (años, puede ser NULL)
 *
 *  Para resolver cada función:
 *    1. Leé el contrato del comentario de arriba: qué recibe y qué
 *       tiene que devolver, con qué nombres de campo exactos.
 *    2. Probá primero la consulta en phpMyAdmin hasta que dé bien.
 *    3. Recién ahí pasala al código.
 *    4. Recargá la página del navegador y mirá la barra negra del pie:
 *       te muestra la consulta que se ejecutó.
 *
 *  Acordate: el método $this->consulta() está explicado en
 *  app/nucleo/Modelo.php. Leelo antes de empezar.
 * =====================================================================
 */
class Especie extends Modelo
{
    /**
     * -----------------------------------------------------------------
     *  EJERCICIO 1  ·  Listar todas las especies
     * -----------------------------------------------------------------
     *  Devuelve todas las especies ordenadas por nombre de la A a la Z.
     *
     *  RECIBE:   nada
     *
     *  DEVUELVE: array de arrays asociativos. Cada uno con:
     *              'id'             int
     *              'nombre'         string
     *              'esperanza_vida' int o null
     *
     *  EJEMPLO DE LO QUE TIENE QUE DEVOLVER:
     *    [
     *      ['id' => 3, 'nombre' => 'Conejo',  'esperanza_vida' => 9],
     *      ['id' => 2, 'nombre' => 'Gato',    'esperanza_vida' => 15],
     *      ...
     *    ]
     *
     *  Se usa en: la vista especies/index
     *  SQL: un SELECT simple con ORDER BY
     * -----------------------------------------------------------------
     */
    public function todas()
    {
        // TODO — Ejercicio 1

        return [];   // ← borrá esta línea cuando resuelvas
    }


    /**
     * -----------------------------------------------------------------
     *  EJERCICIO 2  ·  Especies con cuántas mascotas tiene cada una
     * -----------------------------------------------------------------
     *  Devuelve todas las especies y, al lado, el número de mascotas
     *  registradas de esa especie.
     *
     *  IMPORTANTE: tienen que aparecer TODAS las especies, incluso las
     *  que no tienen ninguna mascota (esas van con 0). Pensá qué tipo
     *  de JOIN te da ese comportamiento.
     *
     *  RECIBE:   nada
     *
     *  DEVUELVE: array de arrays asociativos, ordenado por nombre:
     *              'id'                int
     *              'nombre'            string
     *              'esperanza_vida'    int o null
     *              'cantidad_mascotas' int    ← alias obligatorio
     *
     *  EJEMPLO:
     *    [
     *      ['id' => 3, 'nombre' => 'Conejo', 'esperanza_vida' => 9,
     *       'cantidad_mascotas' => 2],
     *      ...
     *    ]
     *
     *  Se usa en: la vista especies/index
     *  SQL: LEFT JOIN + COUNT + GROUP BY
     *
     *  Pista: si en el GROUP BY te da error, acordate de que todas las
     *  columnas del SELECT que no sean funciones de agregado tienen que
     *  estar listadas en el GROUP BY.
     * -----------------------------------------------------------------
     */
    public function conCantidadMascotas()
    {
        // TODO — Ejercicio 2

        return [];   // ← borrá esta línea cuando resuelvas
    }
}

<?php
/**
 * =====================================================================
 *  Consulta.php  —  NIVEL 3  ·  5 funciones para resolver
 * =====================================================================
 *
 *  Las más difíciles del proyecto. Hacelas al final.
 *
 *  Tabla `consultas`:
 *      id              INT
 *      mascota_id      INT   → mascotas.id
 *      veterinario_id  INT   → veterinarios.id
 *      fecha           DATE
 *      motivo          VARCHAR(150)
 *      diagnostico     TEXT    NULL
 *      costo           DECIMAL(8,2)
 *
 *  FUNCIONES DE FECHA DE MySQL QUE TE PUEDEN SERVIR
 *  ------------------------------------------------
 *    CURDATE()                          la fecha de hoy
 *    DATEDIFF(fecha1, fecha2)           días de diferencia entre dos fechas
 *    YEAR(fecha)                        extrae el año
 *    DATE_SUB(CURDATE(), INTERVAL 30 DAY)   la fecha de hace 30 días
 *
 *  Probalas sueltas en phpMyAdmin antes de meterlas en una consulta:
 *      SELECT CURDATE(), DATEDIFF(CURDATE(), '2026-01-01');
 * =====================================================================
 */
class Consulta extends Modelo
{
    /**
     * -----------------------------------------------------------------
     *  EJERCICIO 13  ·  Las últimas consultas atendidas
     * -----------------------------------------------------------------
     *  Une CUATRO tablas: consultas, mascotas, clientes y veterinarios.
     *
     *  RECIBE:   $limite  int   cuántas traer (por defecto 8)
     *
     *  DEVUELVE: array de arrays, de la más reciente a la más vieja:
     *
     *              'id'          int
     *              'fecha'       string
     *              'motivo'      string
     *              'costo'       string
     *              'mascota'     string   nombre de la mascota
     *              'mascota_id'  int
     *              'dueno'       string   nombre del cliente
     *              'veterinario' string   nombre del veterinario
     *
     *  CUIDADO CON EL LIMIT
     *  --------------------
     *  LIMIT no admite un ? como parámetro preparado en todas las
     *  versiones de PHP. Como $limite es un número que controlás vos
     *  (no viene de un formulario), la forma segura es convertirlo a
     *  entero y concatenarlo:
     *
     *      $sql = "SELECT ... ORDER BY c.fecha DESC LIMIT " . (int) $limite;
     *
     *  El (int) es obligatorio: es lo que garantiza que ahí solo pueda
     *  entrar un número. Sin el (int), esto sería un agujero de seguridad.
     *
     *  Se usa en: el panel de inicio y la vista consultas/index
     * -----------------------------------------------------------------
     */
    public function ultimas($limite = 8)
    {
        // TODO — Ejercicio 13

        return [];
    }


    /**
     * -----------------------------------------------------------------
     *  EJERCICIO 14  ·  Historial clínico de una mascota
     * -----------------------------------------------------------------
     *  RECIBE:   $mascotaId  int
     *
     *  DEVUELVE: array de arrays con todas las consultas de esa mascota,
     *            de la más reciente a la más vieja:
     *
     *              'id'          int
     *              'fecha'       string
     *              'motivo'      string
     *              'diagnostico' string o null
     *              'costo'       string
     *              'veterinario' string
     *
     *  Se usa en: la vista mascotas/ficha
     * -----------------------------------------------------------------
     */
    public function historialDeMascota($mascotaId)
    {
        // TODO — Ejercicio 14

        return [];
    }


    /**
     * -----------------------------------------------------------------
     *  EJERCICIO 15  ·  Cuánto facturó cada veterinario
     * -----------------------------------------------------------------
     *  RECIBE:   nada
     *
     *  DEVUELVE: array de arrays, del que más facturó al que menos:
     *
     *              'veterinario'  string
     *              'especialidad' string o null
     *              'atenciones'   int      cuántas consultas hizo
     *              'total'        string   la suma de los costos
     *
     *  Solo los veterinarios que hayan atendido al menos una consulta.
     *
     *  Se usa en: la vista consultas/index
     *  SQL: JOIN + COUNT + SUM + GROUP BY + ORDER BY
     * -----------------------------------------------------------------
     */
    public function facturacionPorVeterinario()
    {
        // TODO — Ejercicio 15

        return [];
    }


    /**
     * -----------------------------------------------------------------
     *  EJERCICIO 16  ·  Mascotas que hace mucho no vienen     [DIFÍCIL]
     * -----------------------------------------------------------------
     *  La veterinaria quiere llamar a los clientes cuyas mascotas no
     *  se controlan hace tiempo.
     *
     *  RECIBE:   $dias  int   el umbral (por defecto 120)
     *
     *  DEVUELVE: array de arrays con las mascotas cuya ÚLTIMA consulta
     *            fue hace más de $dias días, MÁS las que nunca tuvieron
     *            ninguna consulta. De la más abandonada a la menos:
     *
     *              'id'             int      id de la mascota
     *              'nombre'         string   nombre de la mascota
     *              'especie'        string
     *              'dueno'          string
     *              'telefono'       string o null
     *              'ultima_visita'  string o null   (null = nunca vino)
     *              'dias_sin_venir' int o null      (null = nunca vino)
     *
     *  CÓMO PENSARLO
     *  -------------
     *  Necesitás, por cada mascota, la fecha de su última consulta.
     *  Eso es MAX(c.fecha) agrupando por mascota.
     *
     *  Las que nunca vinieron tienen que aparecer igual, así que el
     *  JOIN con consultas tiene que ser del tipo que conserva las filas
     *  sin pareja.
     *
     *  Y el filtro no se puede poner en el WHERE, porque filtra por el
     *  resultado de una función de agregado (MAX). Para eso existe
     *  HAVING, que se aplica DESPUÉS del GROUP BY:
     *
     *      GROUP BY ...
     *      HAVING dias_sin_venir > ? OR ultima_visita IS NULL
     *
     *  Se usa en: la vista consultas/pendientes
     * -----------------------------------------------------------------
     */
    public function mascotasSinVisitaReciente($dias = 120)
    {
        // TODO — Ejercicio 16

        return [];
    }


    /**
     * -----------------------------------------------------------------
     *  EJERCICIO 17  ·  Registrar una consulta nueva
     * -----------------------------------------------------------------
     *  RECIBE:   $datos  array asociativo con:
     *              'mascota_id'     int
     *              'veterinario_id' int
     *              'fecha'          string   formato 'AAAA-MM-DD'
     *              'motivo'         string
     *              'diagnostico'    string o null
     *              'costo'          float
     *
     *  DEVUELVE: int — el id de la consulta recién creada.
     *
     *  Se usa en: el formulario de la ficha de mascota
     * -----------------------------------------------------------------
     */
    public function registrar(array $datos)
    {
        // TODO — Ejercicio 17

        return 0;
    }
}

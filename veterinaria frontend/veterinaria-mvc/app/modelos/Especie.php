<?php
/**
 * Especie.php  ·  modelo resuelto — no hace falta tocarlo
 */
class Especie extends Modelo
{
    /** Consulta a la base */
    public function todas()
    {
        $sql = "SELECT id, nombre, esperanza_vida
                FROM especies
                ORDER BY nombre";

        return $this->consulta($sql)->fetchAll();
    }

    /**
     * * La clave es el LEFT JOIN: conserva las especies aunque no tengan
     * ninguna mascota. Con INNER JOIN desaparecerían y el resultado
     * tendría menos de 6 filas.
     */
    public function conCantidadMascotas()
    {
        $sql = "SELECT  e.id,
                        e.nombre,
                        e.esperanza_vida,
                        COUNT(m.id) AS cantidad_mascotas
                FROM especies e
                LEFT JOIN mascotas m ON m.especie_id = e.id
                GROUP BY e.id, e.nombre, e.esperanza_vida
                ORDER BY e.nombre";

        return $this->consulta($sql)->fetchAll();
    }
}

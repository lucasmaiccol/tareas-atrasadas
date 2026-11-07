<?php
/**
 * Consulta.php  ·  modelo resuelto — no hace falta tocarlo
 */
class Consulta extends Modelo
{
    /** Consulta a la base */
    public function ultimas($limite = 8)
    {
        $sql = "SELECT  co.id,
                        co.fecha,
                        co.motivo,
                        co.costo,
                        m.nombre  AS mascota,
                        m.id      AS mascota_id,
                        c.nombre  AS dueno,
                        v.nombre  AS veterinario
                FROM consultas co
                INNER JOIN mascotas     m ON m.id = co.mascota_id
                INNER JOIN clientes     c ON c.id = m.cliente_id
                INNER JOIN veterinarios v ON v.id = co.veterinario_id
                ORDER BY co.fecha DESC, co.id DESC
                LIMIT " . (int) $limite;

        return $this->consulta($sql)->fetchAll();
    }

    /** Consulta a la base */
    public function historialDeMascota($mascotaId)
    {
        $sql = "SELECT  co.id,
                        co.fecha,
                        co.motivo,
                        co.diagnostico,
                        co.costo,
                        v.nombre AS veterinario
                FROM consultas co
                INNER JOIN veterinarios v ON v.id = co.veterinario_id
                WHERE co.mascota_id = ?
                ORDER BY co.fecha DESC, co.id DESC";

        return $this->consulta($sql, [(int) $mascotaId])->fetchAll();
    }

    /** Consulta a la base */
    public function facturacionPorVeterinario()
    {
        $sql = "SELECT  v.nombre        AS veterinario,
                        v.especialidad,
                        COUNT(co.id)    AS atenciones,
                        SUM(co.costo)   AS total
                FROM veterinarios v
                INNER JOIN consultas co ON co.veterinario_id = v.id
                GROUP BY v.id, v.nombre, v.especialidad
                ORDER BY total DESC";

        return $this->consulta($sql)->fetchAll();
    }

    /**
     * el más difícil. Tres ideas combinadas:
     *   · LEFT JOIN para conservar las mascotas que nunca vinieron
     *   · MAX(fecha) por mascota, para saber su última visita
     *   · HAVING (no WHERE) porque el filtro usa el resultado del MAX
     *
     * El ORDER BY pone primero las que nunca vinieron: en MySQL los NULL
     * ordenan antes que cualquier valor con ASC, así que se usa DESC
     * sobre los días y un IS NULL delante para forzarlas arriba.
     */
    public function mascotasSinVisitaReciente($dias = 120)
    {
        $sql = "SELECT  m.id,
                        m.nombre,
                        e.nombre AS especie,
                        c.nombre AS dueno,
                        c.telefono,
                        MAX(co.fecha)                        AS ultima_visita,
                        DATEDIFF(CURDATE(), MAX(co.fecha))   AS dias_sin_venir
                FROM mascotas m
                INNER JOIN especies  e ON e.id = m.especie_id
                INNER JOIN clientes  c ON c.id = m.cliente_id
                LEFT  JOIN consultas co ON co.mascota_id = m.id
                GROUP BY m.id, m.nombre, e.nombre, c.nombre, c.telefono
                HAVING ultima_visita IS NULL OR dias_sin_venir > ?
                ORDER BY (ultima_visita IS NULL) DESC, dias_sin_venir DESC";

        return $this->consulta($sql, [(int) $dias])->fetchAll();
    }

    /** Consulta a la base */
    public function registrar(array $datos)
    {
        $sql = "INSERT INTO consultas
                    (mascota_id, veterinario_id, fecha, motivo, diagnostico, costo)
                VALUES (?, ?, ?, ?, ?, ?)";

        $this->consulta($sql, [
            (int)   $datos['mascota_id'],
            (int)   $datos['veterinario_id'],
                    $datos['fecha'],
                    $datos['motivo'],
                    $datos['diagnostico'],
            (float) $datos['costo'],
        ]);

        return $this->ultimoId();
    }
}

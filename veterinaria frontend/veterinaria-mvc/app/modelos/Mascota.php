<?php
/**
 * Mascota.php  ·  modelo resuelto — no hace falta tocarlo
 */
class Mascota extends Modelo
{
    /** Consulta a la base */
    public function todasConDuenoYEspecie()
    {
        $sql = "SELECT  m.id,
                        m.nombre,
                        m.sexo,
                        m.peso_kg,
                        c.nombre AS dueno,
                        m.cliente_id,
                        e.nombre AS especie
                FROM mascotas m
                INNER JOIN clientes c ON c.id = m.cliente_id
                INNER JOIN especies e ON e.id = m.especie_id
                ORDER BY m.nombre";

        return $this->consulta($sql)->fetchAll();
    }

    /** Consulta a la base */
    public function porCliente($clienteId)
    {
        $sql = "SELECT  m.id,
                        m.nombre,
                        m.sexo,
                        m.fecha_nacimiento,
                        e.nombre AS especie
                FROM mascotas m
                INNER JOIN especies e ON e.id = m.especie_id
                WHERE m.cliente_id = ?
                ORDER BY m.nombre";

        return $this->consulta($sql, [(int) $clienteId])->fetchAll();
    }

    /** Consulta a la base */
    public function verFicha($id)
    {
        $sql = "SELECT  m.id,
                        m.nombre,
                        m.fecha_nacimiento,
                        m.sexo,
                        m.peso_kg,
                        c.nombre AS dueno,
                        m.cliente_id,
                        e.nombre AS especie,
                        e.esperanza_vida
                FROM mascotas m
                INNER JOIN clientes c ON c.id = m.cliente_id
                INNER JOIN especies e ON e.id = m.especie_id
                WHERE m.id = ?
                LIMIT 1";

        $fila = $this->consulta($sql, [(int) $id])->fetch();

        return $fila === false ? null : $fila;
    }

    /**
     * Acá va INNER JOIN: solo interesan las
     * especies que tienen mascotas. Con LEFT JOIN aparecerían las vacías
     * con cantidad 0 y promedio NULL.
     */
    public function pesoPromedioPorEspecie()
    {
        $sql = "SELECT  e.nombre                   AS especie,
                        COUNT(m.id)                AS cantidad,
                        ROUND(AVG(m.peso_kg), 2)   AS peso_promedio
                FROM especies e
                INNER JOIN mascotas m ON m.especie_id = e.id
                GROUP BY e.id, e.nombre
                ORDER BY cantidad DESC, e.nombre";

        return $this->consulta($sql)->fetchAll();
    }

    /** Consulta a la base */
    public function actualizarPeso($id, $pesoKg)
    {
        $sql = "UPDATE mascotas
                SET peso_kg = ?
                WHERE id = ?";

        $sentencia = $this->consulta($sql, [(float) $pesoKg, (int) $id]);

        return $sentencia->rowCount() > 0;
    }
}

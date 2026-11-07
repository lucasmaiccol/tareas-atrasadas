<?php
/**
 * Cliente.php  ·  modelo resuelto — no hace falta tocarlo
 */
class Cliente extends Modelo
{
    /** Consulta a la base */
    public function todos()
    {
        $sql = "SELECT id, nombre, documento, telefono, email, direccion, alta
                FROM clientes
                ORDER BY nombre";

        return $this->consulta($sql)->fetchAll();
    }

    /** Consulta a la base */
    public function buscarPorId($id)
    {
        $sql = "SELECT id, nombre, documento, telefono, email, direccion, alta
                FROM clientes
                WHERE id = ?
                LIMIT 1";

        $fila = $this->consulta($sql, [(int) $id])->fetch();

        return $fila === false ? null : $fila;
    }

    /** Consulta a la base */
    public function buscar($texto)
    {
        $patron = '%' . $texto . '%';

        $sql = "SELECT id, nombre, documento, telefono, email, direccion, alta
                FROM clientes
                WHERE nombre LIKE ? OR documento LIKE ? OR email LIKE ?
                ORDER BY nombre";

        return $this->consulta($sql, [$patron, $patron, $patron])->fetchAll();
    }

    /** Consulta a la base */
    public function contar()
    {
        $sql = "SELECT COUNT(*) AS total FROM clientes";

        $fila = $this->consulta($sql)->fetch();

        return (int) $fila['total'];
    }

    /** Consulta a la base */
    public function crear(array $datos)
    {
        $sql = "INSERT INTO clientes (nombre, documento, telefono, email, direccion, alta)
                VALUES (?, ?, ?, ?, ?, CURDATE())";

        $this->consulta($sql, [
            $datos['nombre'],
            $datos['documento'],
            $datos['telefono'],
            $datos['email'],
            $datos['direccion'],
        ]);

        return $this->ultimoId();
    }
}

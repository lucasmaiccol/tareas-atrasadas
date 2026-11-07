<?php
/**
 * Database — Conexión única con PDO.  [RESUELTO — no tocar]
 *
 * Patrón Singleton: por más modelos que intervengan en una página,
 * todos comparten UNA sola conexión.
 */
class Database
{
    private static $instancia = null;

    /** Registro de consultas, para la barra de traza del pie */
    public static $consultas = [];

    private function __construct() {}
    private function __clone() {}

    public static function conexion()
    {
        if (self::$instancia === null) {

            $dsn = 'mysql:host=' . DB_HOST
                 . ';dbname='    . DB_NOMBRE
                 . ';charset='   . DB_CHARSET;

            $opciones = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            try {
                self::$instancia = new PDO($dsn, DB_USUARIO, DB_PASSWORD, $opciones);
            } catch (PDOException $e) {
                if (MODO_DEBUG) {
                    die('<h1>No se pudo conectar a la base de datos</h1>'
                      . '<p>' . htmlspecialchars($e->getMessage()) . '</p>'
                      . '<p>Revisá que MySQL esté encendido y que hayas corrido '
                      . '<code>02_dcl.sql</code> para crear el usuario <code>vet_app</code>.</p>');
                }
                die('Servicio no disponible.');
            }
        }

        return self::$instancia;
    }

    public static function registrar($sql, array $parametros = [])
    {
        self::$consultas[] = ['sql' => $sql, 'parametros' => $parametros];
    }
}

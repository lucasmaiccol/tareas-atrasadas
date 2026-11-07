<?php
/**
 * Traza — Anota qué pieza del MVC intervino.  [RESUELTO — no tocar]
 * Alimenta la barra didáctica del pie de página.
 */
class Traza
{
    public static $url         = '';
    public static $controlador = '';
    public static $accion      = '';
    public static $parametros  = [];
    public static $vista       = '';
    public static $inicio      = 0.0;

    public static function milisegundos()
    {
        return round((microtime(true) - self::$inicio) * 1000, 1);
    }
}

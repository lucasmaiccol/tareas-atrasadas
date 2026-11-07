<?php
/**
 * config.php — Configuración de la aplicación.  [RESUELTO — no tocar]
 *
 * Si la app no conecta, el problema casi siempre está acá.
 */

// ------------------- Base de datos -------------------
define('DB_HOST',     'localhost');
define('DB_NOMBRE',   'veterinaria');

// Usuario creado en 02_dcl.sql, con permisos limitados a esta base.
define('DB_USUARIO',  'vet_app');
define('DB_PASSWORD', 'vet2026');

define('DB_CHARSET',  'utf8mb4');

// ------------------- Aplicación ----------------------
define('APP_NOMBRE', 'Veterinaria Patitas');

// true muestra los errores y la barra de traza al pie de cada página.
define('MODO_DEBUG', true);

// ------------------- Rutas ---------------------------
define('RUTA_APP',  dirname(__DIR__));
define('RUTA_RAIZ', dirname(RUTA_APP));

// ------------------- Errores -------------------------
if (MODO_DEBUG) {
    ini_set('display_errors', '1');
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', '0');
    error_reporting(0);
}

date_default_timezone_set('America/Montevideo');

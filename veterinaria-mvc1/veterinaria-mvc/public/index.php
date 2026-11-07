<?php
/**
 * index.php — FRONT CONTROLLER.  [RESUELTO — no tocar]
 * Todas las peticiones del sitio entran por acá.
 */

if (php_sapi_name() === 'cli-server') {
    $archivoPedido = __DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    if (is_file($archivoPedido)) {
        return false;
    }
}

session_start();

require_once dirname(__DIR__) . '/app/config/config.php';

if (php_sapi_name() === 'cli-server') {
    define('BASE_URL', '');
} else {
    $carpeta = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');
    define('BASE_URL', $carpeta === '/' ? '' : $carpeta);
}

spl_autoload_register(function ($clase) {
    foreach (['nucleo', 'modelos', 'controladores'] as $carpeta) {
        $archivo = RUTA_APP . '/' . $carpeta . '/' . $clase . '.php';
        if (file_exists($archivo)) {
            require_once $archivo;
            return;
        }
    }
});

require_once RUTA_APP . '/nucleo/helpers.php';

Traza::$inicio = microtime(true);

if (isset($_GET['url'])) {
    $ruta = $_GET['url'];
} else {
    $ruta = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    if (BASE_URL !== '' && strpos($ruta, BASE_URL) === 0) {
        $ruta = substr($ruta, strlen(BASE_URL));
    }
}
$ruta = trim($ruta, '/');

$router = new Router();
$router->despachar($ruta);

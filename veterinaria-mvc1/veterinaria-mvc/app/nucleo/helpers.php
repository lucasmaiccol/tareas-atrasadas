<?php
/**
 * helpers.php — Funciones de ayuda globales.  [RESUELTO — no tocar]
 */

/** Escapa lo que se imprime. Protege de XSS. */
function e($texto)
{
    return htmlspecialchars((string) $texto, ENT_QUOTES, 'UTF-8');
}

/** Arma una URL respetando la carpeta donde esté instalada la app */
function url($ruta = '')
{
    return BASE_URL . '/' . ltrim($ruta, '/');
}

function redirigir($ruta)
{
    header('Location: ' . url($ruta));
    exit;
}

/** Mensajes que sobreviven a una redirección */
function flash($mensaje = null, $tipo = 'ok')
{
    if ($mensaje !== null) {
        $_SESSION['flash'][] = ['mensaje' => $mensaje, 'tipo' => $tipo];
        return null;
    }
    $mensajes = isset($_SESSION['flash']) ? $_SESSION['flash'] : [];
    unset($_SESSION['flash']);
    return $mensajes;
}

/** 2026-07-15  ->  15/07/2026 */
function fecha($fechaSql, $porDefecto = '—')
{
    if (empty($fechaSql) || $fechaSql === '0000-00-00') {
        return $porDefecto;
    }
    $d = date_create($fechaSql);
    return $d ? $d->format('d/m/Y') : $porDefecto;
}

/** 4200 -> $ 4.200,00 */
function precio($numero)
{
    return '$ ' . number_format((float) $numero, 2, ',', '.');
}

/** Marca activo el ítem del menú de la sección actual */
function menuActivo($seccion)
{
    return strpos(Traza::$url, '/' . $seccion) === 0 ? ' class="activo"' : '';
}

/**
 * Avisa en pantalla cuando una función todavía no fue implementada.
 * Lo usa la vista para mostrar el cartel amarillo de "falta resolver".
 */
function sinResolver($mensaje = 'Esta función todavía no está resuelta.')
{
    return '<p class="pendiente">⚠ ' . e($mensaje) . '</p>';
}

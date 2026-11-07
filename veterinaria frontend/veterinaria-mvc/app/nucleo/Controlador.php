<?php
/**
 * Controlador — Clase base.  [RESUELTO — no tocar]
 *
 * El controlador coordina: lee la petición, le pide datos al modelo
 * y elige la vista. No escribe SQL ni HTML.
 */
abstract class Controlador
{
    /** Instancia un modelo:  $mascota = $this->modelo('Mascota'); */
    protected function modelo($nombre)
    {
        return new $nombre();
    }

    /** Renderiza una vista dentro de la plantilla */
    protected function vista($vista, array $datos = [])
    {
        $archivo = RUTA_APP . '/vistas/' . $vista . '.php';

        if (!file_exists($archivo)) {
            die("Error: no existe la vista <code>{$vista}.php</code>");
        }

        Traza::$vista = $vista;

        extract($datos);

        require RUTA_APP . '/vistas/plantilla/cabecera.php';
        require $archivo;
        require RUTA_APP . '/vistas/plantilla/pie.php';
    }

    protected function soloPost()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            die('Este recurso solo acepta POST.');
        }
    }

    protected function noEncontrado($mensaje = 'No encontramos lo que buscabas.')
    {
        http_response_code(404);
        $this->vista('errores/404', ['titulo' => 'No encontrado', 'mensaje' => $mensaje]);
        exit;
    }
}

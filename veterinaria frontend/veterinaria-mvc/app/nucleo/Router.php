<?php
/**
 * Router — Traduce la URL en clase y método.  [RESUELTO — no tocar]
 *
 *   /mascotas          -> MascotasControlador::index()
 *   /mascotas/ver/7    -> MascotasControlador::ver(7)
 */
class Router
{
    private $controladorPorDefecto = 'home';
    private $accionPorDefecto      = 'index';

    public function despachar($url)
    {
        $url = trim($url, '/');
        $segmentos = $url === '' ? [] : explode('/', $url);

        $nombreControlador = isset($segmentos[0]) && $segmentos[0] !== ''
            ? $segmentos[0] : $this->controladorPorDefecto;

        $nombreAccion = isset($segmentos[1]) && $segmentos[1] !== ''
            ? $segmentos[1] : $this->accionPorDefecto;

        $parametros = array_slice($segmentos, 2);

        if (!preg_match('/^[a-z0-9\-]+$/i', $nombreControlador) ||
            !preg_match('/^[a-z0-9\-]+$/i', $nombreAccion)) {
            $this->error404($url);
            return;
        }

        $clase  = str_replace(' ', '', ucwords(str_replace('-', ' ', $nombreControlador)));
        $clase .= 'Controlador';

        $metodo = lcfirst(str_replace(' ', '', ucwords(str_replace('-', ' ', $nombreAccion))));

        $archivo = RUTA_APP . '/controladores/' . $clase . '.php';

        if (!file_exists($archivo) || !$this->esAccionValida($clase, $metodo)) {
            $this->error404($url);
            return;
        }

        Traza::$url         = '/' . $url;
        Traza::$controlador = $clase;
        Traza::$accion      = $metodo;
        Traza::$parametros  = $parametros;

        $instancia = new $clase();
        call_user_func_array([$instancia, $metodo], $parametros);
    }

    private function esAccionValida($clase, $metodo)
    {
        if (!method_exists($clase, $metodo)) {
            return false;
        }
        $reflexion = new ReflectionMethod($clase, $metodo);
        return $reflexion->isPublic() && !$reflexion->isStatic();
    }

    private function error404($url)
    {
        http_response_code(404);
        Traza::$url         = '/' . $url;
        Traza::$controlador = '(ninguno)';
        Traza::$accion      = '(ninguna)';

        $controlador = new HomeControlador();
        $controlador->noHallada($url);
    }
}

<?php
/**
 * HomeControlador — [RESUELTO — no tocar]
 * Panel de inicio. Usa cuatro modelos distintos.
 */
class HomeControlador extends Controlador
{
    public function index()
    {
        $cliente     = $this->modelo('Cliente');
        $mascota     = $this->modelo('Mascota');
        $consulta    = $this->modelo('Consulta');
        $veterinario = $this->modelo('Veterinario');

        $this->vista('home/index', [
            'titulo'      => 'Panel',
            'totalClientes'    => $cliente->contar(),
            'totalVets'        => $veterinario->contarActivos(), // resuelto
            'pesoPorEspecie'   => $mascota->pesoPromedioPorEspecie(),
            'ultimasConsultas' => $consulta->ultimas(6),
        ]);
    }

    public function noHallada($url = '')
    {
        $this->vista('errores/404', [
            'titulo'  => 'Página no encontrada',
            'mensaje' => 'La ruta /' . $url . ' no corresponde a ningún controlador.',
        ]);
    }
}

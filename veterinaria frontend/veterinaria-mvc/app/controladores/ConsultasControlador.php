<?php
/**
 * ConsultasControlador — [RESUELTO — no tocar]
 * Ejercita: Consulta::ultimas(), facturacionPorVeterinario(),
 *           mascotasSinVisitaReciente()
 */
class ConsultasControlador extends Controlador
{
    public function index()
    {
        $consulta = $this->modelo('Consulta');

        $this->vista('consultas/index', [
            'titulo'       => 'Consultas',
            'ultimas'      => $consulta->ultimas(20),
            'facturacion'  => $consulta->facturacionPorVeterinario(),
        ]);
    }

    public function pendientes()
    {
        $dias = isset($_GET['dias']) ? max(1, (int) $_GET['dias']) : 120;

        $this->vista('consultas/pendientes', [
            'titulo'    => 'Mascotas sin control',
            'dias'      => $dias,
            'pendientes'=> $this->modelo('Consulta')->mascotasSinVisitaReciente($dias),
        ]);
    }
}

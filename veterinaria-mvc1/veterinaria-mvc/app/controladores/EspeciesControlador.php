<?php
/**
 * EspeciesControlador — [RESUELTO — no tocar]
 * Ejercita: Especie::todas() y Especie::conCantidadMascotas()
 */
class EspeciesControlador extends Controlador
{
    public function index()
    {
        $especie = $this->modelo('Especie');

        $this->vista('especies/index', [
            'titulo'          => 'Especies',
            'especies'        => $especie->todas(),                // ejercicio 1
            'conCantidades'   => $especie->conCantidadMascotas(),  // ejercicio 2
        ]);
    }
}

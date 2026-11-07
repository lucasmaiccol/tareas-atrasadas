<?php
/**
 * MascotasControlador — [RESUELTO — no tocar]
 * Ejercita: Mascota::todasConDuenoYEspecie(), verFicha(), actualizarPeso()
 *           Consulta::historialDeMascota(), registrar()
 */
class MascotasControlador extends Controlador
{
    public function index()
    {
        $mascota = $this->modelo('Mascota');

        $this->vista('mascotas/index', [
            'titulo'   => 'Mascotas',
            'mascotas' => $mascota->todasConDuenoYEspecie(),   // ejercicio 8
        ]);
    }

    public function ficha($id = null)
    {
        $mascota = $this->modelo('Mascota');
        $datos   = $mascota->verFicha($id);                   // ejercicio 10

        if ($datos === null) {
            $this->noEncontrado('No existe la mascota con id ' . (int) $id
                . '. (Si todavía no resolviste el ejercicio 10, es normal que veas esto.)');
        }

        $this->vista('mascotas/ficha', [
            'titulo'       => $datos['nombre'],
            'mascota'      => $datos,
            'historial'    => $this->modelo('Consulta')->historialDeMascota($datos['id']), // ej. 14
            'veterinarios' => $this->modelo('Veterinario')->activos(),                     // resuelto
        ]);
    }

    /** Recibe el formulario de peso de la ficha */
    public function peso($id = null)
    {
        $this->soloPost();

        $peso = isset($_POST['peso_kg']) ? (float) $_POST['peso_kg'] : 0;

        if ($peso <= 0) {
            flash('El peso tiene que ser mayor que cero.', 'error');
            redirigir('mascotas/ficha/' . (int) $id);
        }

        $ok = $this->modelo('Mascota')->actualizarPeso($id, $peso);   // ejercicio 12

        if ($ok) {
            flash('Peso actualizado.');
        } else {
            flash('No se actualizó nada. ¿Resolviste el ejercicio 12?', 'aviso');
        }

        redirigir('mascotas/ficha/' . (int) $id);
    }

    /** Recibe el formulario de consulta nueva de la ficha */
    public function atender($id = null)
    {
        $this->soloPost();

        $texto = function ($campo) {
            return isset($_POST[$campo]) ? trim((string) $_POST[$campo]) : '';
        };

        $datos = [
            'mascota_id'     => (int) $id,
            'veterinario_id' => (int) $texto('veterinario_id'),
            'fecha'          => $texto('fecha'),
            'motivo'         => $texto('motivo'),
            'diagnostico'    => $texto('diagnostico') ?: null,
            'costo'          => (float) $texto('costo'),
        ];

        if ($datos['veterinario_id'] <= 0 || $datos['fecha'] === '' || $datos['motivo'] === '') {
            flash('Faltan datos: veterinario, fecha y motivo son obligatorios.', 'error');
            redirigir('mascotas/ficha/' . (int) $id);
        }

        $nuevoId = $this->modelo('Consulta')->registrar($datos);   // ejercicio 17

        if ($nuevoId > 0) {
            flash('Consulta registrada.');
        } else {
            flash('No se guardó la consulta. ¿Resolviste el ejercicio 17?', 'aviso');
        }

        redirigir('mascotas/ficha/' . (int) $id);
    }
}

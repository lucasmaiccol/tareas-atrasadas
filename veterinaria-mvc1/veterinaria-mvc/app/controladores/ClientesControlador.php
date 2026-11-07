<?php
/**
 * ClientesControlador — [RESUELTO — no tocar]
 * Ejercita: Cliente::todos(), buscar(), buscarPorId(), crear()
 *           y Mascota::porCliente()
 */
class ClientesControlador extends Controlador
{
    public function index()
    {
        $cliente = $this->modelo('Cliente');

        $busqueda = isset($_GET['q']) ? trim($_GET['q']) : '';

        if ($busqueda !== '') {
            $clientes = $cliente->buscar($busqueda);     // ejercicio 5
        } else {
            $clientes = $cliente->todos();               // ejercicio 3
        }

        $this->vista('clientes/index', [
            'titulo'   => 'Clientes',
            'clientes' => $clientes,
            'busqueda' => $busqueda,
        ]);
    }

    public function ficha($id = null)
    {
        $cliente = $this->modelo('Cliente');
        $datos   = $cliente->buscarPorId($id);           // ejercicio 4

        if ($datos === null) {
            $this->noEncontrado('No existe el cliente con id ' . (int) $id
                . '. (Si todavía no resolviste el ejercicio 4, es normal que veas esto.)');
        }

        $this->vista('clientes/ficha', [
            'titulo'   => $datos['nombre'],
            'cliente'  => $datos,
            'mascotas' => $this->modelo('Mascota')->porCliente($datos['id']), // ejercicio 9
        ]);
    }

    public function nuevo()
    {
        $this->vista('clientes/formulario', ['titulo' => 'Nuevo cliente']);
    }

    public function guardar()
    {
        $this->soloPost();

        $texto = function ($campo) {
            return isset($_POST[$campo]) ? trim((string) $_POST[$campo]) : '';
        };

        $datos = [
            'nombre'    => $texto('nombre'),
            'documento' => $texto('documento'),
            'telefono'  => $texto('telefono')  ?: null,
            'email'     => $texto('email')     ?: null,
            'direccion' => $texto('direccion') ?: null,
        ];

        if ($datos['nombre'] === '' || $datos['documento'] === '') {
            flash('El nombre y el documento son obligatorios.', 'error');
            redirigir('clientes/nuevo');
        }

        $nuevoId = $this->modelo('Cliente')->crear($datos);   // ejercicio 7

        if ($nuevoId > 0) {
            flash('Se dio de alta a ' . $datos['nombre'] . '.');
            redirigir('clientes/ficha/' . $nuevoId);
        }

        flash('No se pudo guardar. ¿Resolviste el ejercicio 7?', 'error');
        redirigir('clientes');
    }
}

<?php /* clientes/index — [RESUELTO] Recibe: $clientes, $busqueda */ ?>

<div class="encabezado">
    <div>
        <p class="rotulo">Fichero</p>
        <h1>Clientes <small class="ej">ejercicios 3 y 5</small></h1>
    </div>
    <a class="boton boton--primario" href="<?= url('clientes/nuevo') ?>">+ Nuevo cliente</a>
</div>

<form class="buscador" method="get" action="<?= url('clientes') ?>">
    <input type="search" name="q" value="<?= e($busqueda) ?>" placeholder="Buscar por nombre, documento o email">
    <button class="boton" type="submit">Buscar</button>
    <?php if ($busqueda !== ''): ?>
        <a class="boton boton--claro" href="<?= url('clientes') ?>">Limpiar</a>
    <?php endif; ?>
</form>

<?php if ($busqueda !== ''): ?>
    <p class="rotulo"><?= count($clientes) ?> resultado(s) para «<?= e($busqueda) ?>»</p>
<?php endif; ?>

<?php if (empty($clientes)): ?>
    <?= sinResolver($busqueda !== ''
        ? 'Sin resultados. Si todavía no resolviste Cliente::buscar() (ejercicio 5), es normal.'
        : 'Falta resolver Cliente::todos() (ejercicio 3)') ?>
<?php else: ?>
<div class="tabla-caja">
    <table>
        <thead><tr><th>Nombre</th><th>Documento</th><th>Teléfono</th><th>Email</th><th>Cliente desde</th></tr></thead>
        <tbody>
        <?php foreach ($clientes as $c): ?>
            <tr>
                <td><a href="<?= url('clientes/ficha/' . $c['id']) ?>"><?= e($c['nombre']) ?></a></td>
                <td class="num"><?= e($c['documento']) ?></td>
                <td><?= e($c['telefono']) ?: '—' ?></td>
                <td><?= e($c['email']) ?: '—' ?></td>
                <td class="num"><?= fecha($c['alta']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>

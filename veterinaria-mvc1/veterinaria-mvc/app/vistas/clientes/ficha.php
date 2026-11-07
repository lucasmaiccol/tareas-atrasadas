<?php /* clientes/ficha — [RESUELTO] Recibe: $cliente, $mascotas */ ?>

<p class="rotulo"><a href="<?= url('clientes') ?>">← Volver a clientes</a></p>

<div class="tarjeta">
    <p class="rotulo">Cliente nº <?= (int) $cliente['id'] ?> <small class="ej">ejercicio 4</small></p>
    <h1><?= e($cliente['nombre']) ?></h1>

    <dl class="datos">
        <dt>Documento</dt><dd><?= e($cliente['documento']) ?></dd>
        <dt>Teléfono</dt><dd><?= e($cliente['telefono']) ?: '—' ?></dd>
        <dt>Email</dt><dd><?= e($cliente['email']) ?: '—' ?></dd>
        <dt>Dirección</dt><dd><?= e($cliente['direccion']) ?: '—' ?></dd>
        <dt>Cliente desde</dt><dd><?= fecha($cliente['alta']) ?></dd>
    </dl>
</div>

<h2>Sus mascotas <small class="ej">ejercicio 9</small></h2>

<?php if (empty($mascotas)): ?>
    <?= sinResolver('Falta resolver Mascota::porCliente(), o este cliente no tiene mascotas.') ?>
<?php else: ?>
<div class="tabla-caja">
    <table>
        <thead><tr><th>Nombre</th><th>Especie</th><th>Sexo</th><th>Nacimiento</th></tr></thead>
        <tbody>
        <?php foreach ($mascotas as $m): ?>
            <tr>
                <td><a href="<?= url('mascotas/ficha/' . $m['id']) ?>"><?= e($m['nombre']) ?></a></td>
                <td><?= e($m['especie']) ?></td>
                <td><?= $m['sexo'] === 'M' ? 'Macho' : 'Hembra' ?></td>
                <td class="num"><?= fecha($m['fecha_nacimiento']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>

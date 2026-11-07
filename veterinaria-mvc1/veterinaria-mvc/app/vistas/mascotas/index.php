<?php /* mascotas/index — [RESUELTO] Recibe: $mascotas */ ?>

<p class="rotulo">Registro</p>
<h1>Mascotas <small class="ej">ejercicio 8</small></h1>

<?php if (empty($mascotas)): ?>
    <?= sinResolver('Falta resolver Mascota::todasConDuenoYEspecie()') ?>
<?php else: ?>
<div class="tabla-caja">
    <table>
        <thead><tr><th>Nombre</th><th>Especie</th><th>Sexo</th><th>Peso</th><th>Dueño</th></tr></thead>
        <tbody>
        <?php foreach ($mascotas as $m): ?>
            <tr>
                <td><a href="<?= url('mascotas/ficha/' . $m['id']) ?>"><?= e($m['nombre']) ?></a></td>
                <td><?= e($m['especie']) ?></td>
                <td><?= $m['sexo'] === 'M' ? 'Macho' : 'Hembra' ?></td>
                <td class="num"><?= $m['peso_kg'] !== null ? e($m['peso_kg']) . ' kg' : '—' ?></td>
                <td><a href="<?= url('clientes/ficha/' . $m['cliente_id']) ?>"><?= e($m['dueno']) ?></a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<p class="ayuda">Si resolviste bien, tienen que aparecer las 18 mascotas.</p>
<?php endif; ?>

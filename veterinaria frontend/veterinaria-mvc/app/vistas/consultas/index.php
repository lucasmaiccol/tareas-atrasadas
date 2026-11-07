<?php /* consultas/index — [RESUELTO] Recibe: $ultimas, $facturacion */ ?>

<p class="rotulo">Actividad</p>
<h1>Consultas</h1>

<h2>Facturación por veterinario</h2>

<?php if (empty($facturacion)): ?>
    <p class="ayuda">Todavía no hay consultas registradas.</p>
<?php else: ?>
<div class="tabla-caja">
    <table>
        <thead><tr><th>Veterinario</th><th>Especialidad</th><th>Atenciones</th><th>Total facturado</th></tr></thead>
        <tbody>
        <?php foreach ($facturacion as $f): ?>
            <tr>
                <td><?= e($f['veterinario']) ?></td>
                <td><?= e($f['especialidad']) ?: '—' ?></td>
                <td class="num"><?= (int) $f['atenciones'] ?></td>
                <td class="num"><?= precio($f['total']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>

<h2 style="margin-top:32px">Últimas consultas</h2>

<?php if (empty($ultimas)): ?>
    <p class="ayuda">Todavía no hay consultas registradas.</p>
<?php else: ?>
<div class="tabla-caja">
    <table>
        <thead><tr><th>Fecha</th><th>Mascota</th><th>Dueño</th><th>Motivo</th><th>Veterinario</th><th>Costo</th></tr></thead>
        <tbody>
        <?php foreach ($ultimas as $c): ?>
            <tr>
                <td class="num"><?= fecha($c['fecha']) ?></td>
                <td><a href="<?= url('mascotas/ficha/' . $c['mascota_id']) ?>"><?= e($c['mascota']) ?></a></td>
                <td><?= e($c['dueno']) ?></td>
                <td><?= e($c['motivo']) ?></td>
                <td><?= e($c['veterinario']) ?></td>
                <td class="num"><?= precio($c['costo']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>

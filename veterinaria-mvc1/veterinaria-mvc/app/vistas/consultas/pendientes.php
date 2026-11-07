<?php /* consultas/pendientes — [RESUELTO] Recibe: $pendientes, $dias */ ?>

<p class="rotulo">Seguimiento</p>
<h1>Mascotas sin control <small class="ej">ejercicio 16</small></h1>

<form class="buscador" method="get" action="<?= url('consultas/pendientes') ?>">
    <label style="align-self:center">Sin venir hace más de</label>
    <input type="number" name="dias" value="<?= (int) $dias ?>" min="1" style="max-width:110px">
    <label style="align-self:center">días</label>
    <button class="boton" type="submit">Filtrar</button>
</form>

<?php if (empty($pendientes)): ?>
    <?= sinResolver('Falta resolver Consulta::mascotasSinVisitaReciente(), o están todas al día.') ?>
<?php else: ?>
<div class="tabla-caja">
    <table>
        <thead><tr><th>Mascota</th><th>Especie</th><th>Dueño</th><th>Teléfono</th><th>Última visita</th><th>Días</th></tr></thead>
        <tbody>
        <?php foreach ($pendientes as $p): ?>
            <tr>
                <td><a href="<?= url('mascotas/ficha/' . $p['id']) ?>"><?= e($p['nombre']) ?></a></td>
                <td><?= e($p['especie']) ?></td>
                <td><?= e($p['dueno']) ?></td>
                <td class="num"><?= e($p['telefono']) ?: '—' ?></td>
                <td class="num"><?= $p['ultima_visita'] !== null ? fecha($p['ultima_visita']) : 'Nunca vino' ?></td>
                <td class="num">
                    <?php if ($p['dias_sin_venir'] === null): ?>
                        <span class="etiqueta etiqueta--roja">Nunca</span>
                    <?php else: ?>
                        <span class="etiqueta etiqueta--ambar"><?= (int) $p['dias_sin_venir'] ?> d</span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<p class="ayuda">Con el umbral en 120 días tienen que aparecer, entre otras, Copito y Pipo,
   que nunca tuvieron una consulta.</p>
<?php endif; ?>

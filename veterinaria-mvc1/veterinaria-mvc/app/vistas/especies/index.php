<?php /* especies/index — [RESUELTO] Recibe: $especies, $conCantidades */ ?>

<p class="rotulo">Catálogo</p>
<h1>Especies</h1>

<div class="columnas">

    <section>
        <h2>Listado simple <small class="ej">ejercicio 1</small></h2>
        <?php if (empty($especies)): ?>
            <?= sinResolver('Falta resolver Especie::todas()') ?>
        <?php else: ?>
        <div class="tabla-caja">
            <table>
                <thead><tr><th>Especie</th><th>Esperanza de vida</th></tr></thead>
                <tbody>
                <?php foreach ($especies as $e): ?>
                    <tr>
                        <td><?= e($e['nombre']) ?></td>
                        <td class="num"><?= $e['esperanza_vida'] !== null ? (int) $e['esperanza_vida'] . ' años' : '—' ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
    </section>

    <section>
        <h2>Con cantidad de mascotas <small class="ej">ejercicio 2</small></h2>
        <?php if (empty($conCantidades)): ?>
            <?= sinResolver('Falta resolver Especie::conCantidadMascotas()') ?>
        <?php else: ?>
        <div class="tabla-caja">
            <table>
                <thead><tr><th>Especie</th><th>Mascotas</th></tr></thead>
                <tbody>
                <?php foreach ($conCantidades as $e): ?>
                    <tr>
                        <td><?= e($e['nombre']) ?></td>
                        <td class="num"><?= (int) $e['cantidad_mascotas'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <p class="ayuda">Si resolviste bien, acá tienen que aparecer las 6 especies,
           incluidas las que tienen 0 mascotas.</p>
        <?php endif; ?>
    </section>

</div>

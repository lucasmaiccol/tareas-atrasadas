<?php /* especies/index — [RESUELTO] Recibe: $especies, $conCantidades */ ?>

<p class="rotulo">Catálogo</p>
<h1>Especies</h1>

<div class="columnas">

    <section>
        <h2>Listado simple</h2>
        <?php if (empty($especies)): ?>
            <p class="ayuda">No hay especies cargadas.</p>
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
        <h2>Con cantidad de mascotas</h2>
        <?php if (empty($conCantidades)): ?>
            <p class="ayuda">No hay especies cargadas.</p>
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
        <p class="ayuda">Si resolviste bien, acá tienen que aparecer las 8 especies.
           Hurón y Cobayo tienen que aparecer con 0: si no están, usaste INNER JOIN
           donde iba LEFT JOIN.</p>
        <?php endif; ?>
    </section>

</div>

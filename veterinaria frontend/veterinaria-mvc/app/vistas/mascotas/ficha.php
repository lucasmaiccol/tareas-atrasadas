<?php
/* =====================================================================
   PRÁCTICA DE VISTAS  ·  ficha de la mascota  ·  RESUELTA
   Recibe: $mascota, $historial, $veterinarios
   ===================================================================== */

/* ZONA 5 (paso 1) · el acumulador del total arranca en cero ANTES de la tabla.
   Si estuviera adentro del foreach se reiniciaría en cada vuelta. */
$total = 0;

/* ZONA 8 · primera vuelta: no dibuja nada, solo averigua el costo máximo. */
$maximo = 0;
foreach ($historial as $c) {
    if ($c['costo'] > $maximo) {
        $maximo = $c['costo'];
    }
}
?>

<p class="rotulo"><a href="<?= url('mascotas') ?>">← Volver a mascotas</a></p>

<details class="inspector">
    <summary>🔍 Ver los datos que me llegan a esta página</summary>

    <div class="inspector__cuerpo">

        <p class="inspector__nota">Estos tres arrays ya están cargados. No tenés que
           consultarlos: solo mostrarlos.</p>

        <h4>$mascota <span>— un array asociativo</span></h4>
        <pre><?php print_r($mascota); ?></pre>

        <h4>$historial <span>— un array de arrays: uno por consulta</span></h4>
        <pre><?php print_r($historial); ?></pre>

        <h4>$veterinarios <span>— un array de arrays: uno por veterinario</span></h4>
        <pre><?php print_r($veterinarios); ?></pre>

    </div>
</details>


<!-- ZONA 1 · el nombre de la mascota -->
<h1><?= e($mascota['nombre']) ?></h1>


<div class="tarjeta">

    <!-- ZONA 2 · la ficha de datos -->
    <dl class="datos">
        <dt>Especie</dt>      <dd><?= e($mascota['especie']) ?></dd>
        <dt>Sexo</dt>         <dd><?= $mascota['sexo'] === 'M' ? 'Macho' : 'Hembra' ?></dd>
        <dt>Nacimiento</dt>   <dd><?= fecha($mascota['fecha_nacimiento']) ?></dd>
        <dt>Peso</dt>         <dd><?= $mascota['peso_kg'] !== null ? e($mascota['peso_kg']) . ' kg' : '—' ?></dd>
        <dt>Dueño</dt>        <dd><?= e($mascota['dueno']) ?></dd>
    </dl>

</div>


<h2>Historial clínico</h2>

<!-- ZONA 6 · si no hay historial, un mensaje en lugar de la tabla -->
<?php if (empty($historial)): ?>

    <p class="ayuda">Esta mascota todavía no tuvo ninguna consulta.</p>

<?php else: ?>

<div class="tabla-caja">
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Motivo</th>
                <th>Veterinario</th>
                <th>Costo</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            <!-- ZONA 3 · una fila por consulta -->
            <?php foreach ($historial as $c): ?>

                <?php $total = $total + $c['costo']; /* ZONA 5 (paso 2) · se suma en cada vuelta */ ?>

                <!-- ZONA 8 · segunda vuelta: resalta la fila más cara -->
                <tr<?= $c['costo'] == $maximo ? ' class="fila-destacada"' : '' ?>>
                    <td><?= fecha($c['fecha']) ?></td>
                    <td><?= e($c['motivo']) ?></td>
                    <td><?= e($c['veterinario']) ?></td>
                    <td class="num"><?= precio($c['costo']) ?></td>
                    <td>
                        <!-- ZONA 4 · etiqueta solo si costó más de 2000 -->
                        <?php if ($c['costo'] > 2000): ?>
                            <span class="etiqueta etiqueta--ambar">Cara</span>
                        <?php endif; ?>
                    </td>
                </tr>

            <?php endforeach; ?>

        </tbody>

        <tfoot>
            <tr>
                <td colspan="3"><b>Total gastado</b></td>
                <!-- ZONA 5 (paso 3) · se muestra el total acumulado -->
                <td class="num"><?= precio($total) ?></td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</div>

<?php endif; ?>


<h2>Registrar una consulta</h2>

<form class="tarjeta form" method="post" action="<?= url('mascotas/atender/' . $mascota['id']) ?>">

    <div class="campo">
        <label for="veterinario_id">Veterinario</label>
        <select id="veterinario_id" name="veterinario_id" required>
            <option value="">— Elegir —</option>

            <!-- ZONA 7 · una opción por veterinario: el id va en el value, el nombre es lo que se ve -->
            <?php foreach ($veterinarios as $v): ?>
                <option value="<?= (int) $v['id'] ?>"><?= e($v['nombre']) ?></option>
            <?php endforeach; ?>

        </select>
    </div>

    <div class="fila">
        <div class="campo">
            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="fecha" value="<?= date('Y-m-d') ?>" required>
        </div>
        <div class="campo">
            <label for="costo">Costo</label>
            <input type="number" id="costo" name="costo" step="0.01" min="0" value="0" required>
        </div>
    </div>

    <div class="campo">
        <label for="motivo">Motivo</label>
        <input type="text" id="motivo" name="motivo" maxlength="150" required>
    </div>

    <button class="boton boton--primario" type="submit">Registrar consulta</button>

</form>

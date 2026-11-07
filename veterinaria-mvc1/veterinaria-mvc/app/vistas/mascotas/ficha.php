<?php /* mascotas/ficha — [RESUELTO] Recibe: $mascota, $historial, $veterinarios */ ?>

<p class="rotulo"><a href="<?= url('mascotas') ?>">← Volver a mascotas</a></p>

<div class="tarjeta">
    <p class="rotulo">Ficha nº <?= (int) $mascota['id'] ?> <small class="ej">ejercicio 10</small></p>
    <h1><?= e($mascota['nombre']) ?></h1>

    <dl class="datos">
        <dt>Especie</dt><dd><?= e($mascota['especie']) ?></dd>
        <dt>Sexo</dt><dd><?= $mascota['sexo'] === 'M' ? 'Macho' : 'Hembra' ?></dd>
        <dt>Nacimiento</dt><dd><?= fecha($mascota['fecha_nacimiento']) ?></dd>
        <dt>Peso</dt><dd><?= $mascota['peso_kg'] !== null ? e($mascota['peso_kg']) . ' kg' : '—' ?></dd>
        <dt>Dueño</dt>
        <dd><a href="<?= url('clientes/ficha/' . $mascota['cliente_id']) ?>"><?= e($mascota['dueno']) ?></a></dd>
        <dt>Esperanza de vida</dt>
        <dd><?= $mascota['esperanza_vida'] !== null ? (int) $mascota['esperanza_vida'] . ' años' : '—' ?></dd>
    </dl>
</div>

<div class="columnas">

    <section>
        <h3>Actualizar peso <small class="ej">ejercicio 12</small></h3>
        <form class="tarjeta form" method="post" action="<?= url('mascotas/peso/' . $mascota['id']) ?>">
            <div class="campo">
                <label for="peso_kg">Peso en kilos</label>
                <input type="number" id="peso_kg" name="peso_kg" step="0.01" min="0.01"
                       value="<?= e($mascota['peso_kg']) ?>" required>
            </div>
            <button class="boton boton--primario" type="submit">Guardar peso</button>
        </form>
    </section>

    <section>
        <h3>Registrar consulta <small class="ej">ejercicio 17</small></h3>
        <form class="tarjeta form" method="post" action="<?= url('mascotas/atender/' . $mascota['id']) ?>">

            <div class="campo">
                <label for="veterinario_id">Veterinario</label>
                <select id="veterinario_id" name="veterinario_id" required>
                    <option value="">— Elegir —</option>
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

            <div class="campo">
                <label for="diagnostico">Diagnóstico</label>
                <textarea id="diagnostico" name="diagnostico" rows="3"></textarea>
            </div>

            <button class="boton boton--primario" type="submit">Registrar consulta</button>
        </form>
    </section>

</div>

<h2>Historial clínico <small class="ej">ejercicio 14</small></h2>

<?php if (empty($historial)): ?>
    <?= sinResolver('Falta resolver Consulta::historialDeMascota(), o esta mascota nunca vino.') ?>
<?php else: ?>
<div class="tabla-caja">
    <table>
        <thead><tr><th>Fecha</th><th>Motivo</th><th>Diagnóstico</th><th>Veterinario</th><th>Costo</th></tr></thead>
        <tbody>
        <?php foreach ($historial as $c): ?>
            <tr>
                <td class="num"><?= fecha($c['fecha']) ?></td>
                <td><?= e($c['motivo']) ?></td>
                <td><?= e($c['diagnostico']) ?: '—' ?></td>
                <td><?= e($c['veterinario']) ?></td>
                <td class="num"><?= precio($c['costo']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>

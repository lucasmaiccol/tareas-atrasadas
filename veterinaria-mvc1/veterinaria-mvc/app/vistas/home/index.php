<?php /* home/index — [RESUELTO] Recibe: $totalClientes, $totalVets, $pesoPorEspecie, $ultimasConsultas */ ?>

<p class="rotulo">Panel</p>
<h1>Veterinaria Patitas</h1>

<div class="totales">
    <a class="total" href="<?= url('clientes') ?>">
        <span class="total__n"><?= (int) $totalClientes ?></span>
        <span class="rotulo">Clientes <small>(ej. 6)</small></span>
    </a>
    <div class="total">
        <span class="total__n"><?= (int) $totalVets ?></span>
        <span class="rotulo">Veterinarios <small>(resuelto)</small></span>
    </div>
</div>

<div class="columnas">

    <section>
        <h2>Peso promedio por especie <small class="ej">ejercicio 11</small></h2>
        <?php if (empty($pesoPorEspecie)): ?>
            <?= sinResolver('Falta resolver Mascota::pesoPromedioPorEspecie()') ?>
        <?php else: ?>
        <div class="tabla-caja">
            <table>
                <thead><tr><th>Especie</th><th>Mascotas</th><th>Peso promedio</th></tr></thead>
                <tbody>
                <?php foreach ($pesoPorEspecie as $f): ?>
                    <tr>
                        <td><?= e($f['especie']) ?></td>
                        <td class="num"><?= (int) $f['cantidad'] ?></td>
                        <td class="num"><?= e($f['peso_promedio']) ?> kg</td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
    </section>

    <section>
        <h2>Últimas consultas <small class="ej">ejercicio 13</small></h2>
        <?php if (empty($ultimasConsultas)): ?>
            <?= sinResolver('Falta resolver Consulta::ultimas()') ?>
        <?php else: ?>
        <div class="tabla-caja">
            <table>
                <thead><tr><th>Fecha</th><th>Mascota</th><th>Motivo</th><th>Costo</th></tr></thead>
                <tbody>
                <?php foreach ($ultimasConsultas as $c): ?>
                    <tr>
                        <td class="num"><?= fecha($c['fecha']) ?></td>
                        <td><a href="<?= url('mascotas/ficha/' . $c['mascota_id']) ?>"><?= e($c['mascota']) ?></a></td>
                        <td><?= e($c['motivo']) ?></td>
                        <td class="num"><?= precio($c['costo']) ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
    </section>

</div>

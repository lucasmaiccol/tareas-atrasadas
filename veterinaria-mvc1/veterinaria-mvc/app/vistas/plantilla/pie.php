<?php /* pie.php — [RESUELTO — no tocar]  Barra de traza para depurar */ ?>
</main>

<?php if (MODO_DEBUG): ?>
<section class="traza">
    <div class="contenedor">
        <div class="traza__flujo">
            <span class="traza__paso"><b>URL</b><?= e(Traza::$url) ?></span>
            <span class="traza__flecha">→</span>
            <span class="traza__paso traza__paso--c"><b>Controlador</b><?= e(Traza::$controlador) ?>::<?= e(Traza::$accion) ?>()</span>
            <span class="traza__flecha">→</span>
            <span class="traza__paso traza__paso--m"><b>Modelos</b><?= e(implode(', ', array_keys(Modelo::$usados))) ?: '(ninguno)' ?></span>
            <span class="traza__flecha">→</span>
            <span class="traza__paso traza__paso--v"><b>Vista</b><?= e(Traza::$vista) ?></span>
        </div>

        <details class="traza__sql" open>
            <summary><?= count(Database::$consultas) ?> consulta(s) SQL · <?= Traza::milisegundos() ?> ms</summary>
            <?php if (empty(Database::$consultas)): ?>
                <p class="consulta__vacio">No se ejecutó ninguna consulta. Si esperabas ver datos,
                   probablemente la función del modelo todavía devuelve el array vacío.</p>
            <?php endif; ?>
            <?php foreach (Database::$consultas as $i => $c): ?>
                <div class="consulta">
                    <span class="consulta__n"><?= $i + 1 ?></span>
                    <pre><?= e(preg_replace('/\s+/', ' ', $c['sql'])) ?></pre>
                    <?php if (!empty($c['parametros'])): ?>
                        <p class="consulta__params">parámetros: <?= e(implode(' | ', array_map('strval', $c['parametros']))) ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </details>
    </div>
</section>
<?php endif; ?>

<footer class="pie">
    <div class="contenedor"><?= e(APP_NOMBRE) ?> — proyecto de clase, PHP sin framework.</div>
</footer>

</body>
</html>

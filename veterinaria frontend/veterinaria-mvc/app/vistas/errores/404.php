<div class="tarjeta" style="text-align:center;padding:48px 24px">
    <p class="rotulo">Error 404</p>
    <h1>No encontramos esa página</h1>
    <p><?= e(isset($mensaje) ? $mensaje : 'La dirección no corresponde a ninguna sección.') ?></p>
    <p style="margin-top:20px"><a class="boton" href="<?= url('') ?>">Ir al panel</a></p>
</div>

<?php /* cabecera.php — [RESUELTO — no tocar] */ ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($titulo) ? e($titulo) . ' · ' : '' ?><?= e(APP_NOMBRE) ?></title>
    <link rel="stylesheet" href="<?= url('css/estilos.css') ?>">
</head>
<body>

<header class="barra">
    <div class="contenedor barra__fila">
        <a class="marca" href="<?= url('') ?>">
            <span class="marca__icono">🐾</span>
            <span class="marca__nombre"><?= e(APP_NOMBRE) ?></span>
        </a>

        <nav class="menu">
            <a href="<?= url('clientes') ?>"<?= menuActivo('clientes') ?>>Clientes</a>
            <a href="<?= url('mascotas') ?>"<?= menuActivo('mascotas') ?>>Mascotas</a>
            <a href="<?= url('consultas') ?>"<?= menuActivo('consultas') ?>>Consultas</a>
            <a href="<?= url('consultas/pendientes') ?>">Sin control</a>
            <a href="<?= url('especies') ?>"<?= menuActivo('especies') ?>>Especies</a>
        </nav>
    </div>
</header>

<main class="contenedor">

<?php foreach (flash() as $m): ?>
    <p class="aviso aviso--<?= e($m['tipo']) ?>"><?= e($m['mensaje']) ?></p>
<?php endforeach; ?>

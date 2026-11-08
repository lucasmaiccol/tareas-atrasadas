<?php
/* =====================================================================
   CARTELERA DE CINE  ·  práctica corta  ·  RESUELTA
   ===================================================================== */

require 'conexion.php';


/* ---------------------------------------------------------------------
   ZONA 7  ·  Guardar la película nueva
   Va ARRIBA de la consulta de la zona 1: así la película recién cargada
   ya aparece en la tabla sin tener que recargar.
   Los datos van como parámetros (?) y nunca pegados dentro del SQL.
   --------------------------------------------------------------------- */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $sentencia = $db->prepare(
        "INSERT INTO peliculas (titulo, sala, horario, precio, entradas)
         VALUES (?, ?, ?, ?, ?)"
    );

    $sentencia->execute([
        $_POST['titulo'],
        $_POST['sala'],
        $_POST['horario'],
        $_POST['precio'],
        $_POST['entradas'],
    ]);
}


/* ---------------------------------------------------------------------
   ZONA 1  ·  Traer las películas de la base
   --------------------------------------------------------------------- */
$consulta  = $db->query("SELECT id, titulo, sala, horario, precio, entradas
                         FROM peliculas
                         ORDER BY horario");
$peliculas = $consulta->fetchAll();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cartelera</title>

    <!-- ZONA 4 · Bootstrap 5.3 (CSS) desde la documentación oficial -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- ZONA 5 · clase container py-4 -->
<div id="contenedor" class="container py-4">

    <h1>Cartelera de hoy</h1>
    <p>Tenemos <?= count($peliculas) ?> películas en cartel.</p>

    <!-- ZONA 5 · table table-striped align-middle -->
    <table id="tabla" class="table table-striped align-middle">
        <!-- ZONA 5 · table-dark en el thead -->
        <thead class="table-dark">
            <tr>
                <th>Película</th>
                <th>Sala</th>
                <th>Horario</th>
                <th>Precio</th>
                <th>Entradas</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>

        <!-- ZONA 2 · una fila por película -->
        <?php foreach ($peliculas as $p): ?>
            <tr>
                <td><?= htmlspecialchars($p['titulo']) ?></td>
                <td><?= htmlspecialchars($p['sala']) ?></td>
                <td><?= substr($p['horario'], 0, 5) ?></td>
                <td>$ <?= number_format($p['precio'], 2, ',', '.') ?></td>
                <td><?= $p['entradas'] ?></td>
                <td>
                    <!-- ZONA 3 · estado según las entradas que quedan.
                         Importa el orden: primero == 0 y después < 10. -->
                    <?php if ($p['entradas'] == 0): ?>
                        <span class="badge bg-danger">AGOTADA</span>
                    <?php elseif ($p['entradas'] < 10): ?>
                        <span class="badge bg-warning text-dark">ÚLTIMAS ENTRADAS</span>
                    <?php else: ?>
                        <span class="badge bg-success">DISPONIBLE</span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>


    <h2>Cargar una película</h2>

    <!-- ZONA 6 · formulario completo. El name de cada campo es igual
         al nombre de la columna, y es lo que se lee en $_POST. -->
    <form method="post">

        <p>
            <label for="titulo">Título</label><br>
            <input type="text" id="titulo" name="titulo" class="form-control" required>
        </p>

        <p>
            <label for="sala">Sala</label><br>
            <input type="text" id="sala" name="sala" class="form-control" required>
        </p>

        <p>
            <label for="horario">Horario</label><br>
            <input type="time" id="horario" name="horario" class="form-control" required>
        </p>

        <p>
            <label for="precio">Precio</label><br>
            <input type="number" step="0.01" id="precio" name="precio" class="form-control" required>
        </p>

        <p>
            <label for="entradas">Entradas</label><br>
            <input type="number" id="entradas" name="entradas" class="form-control" required>
        </p>

        <p>
            <button type="submit" id="boton-guardar" class="btn btn-success">Guardar película</button>
        </p>

    </form>

    <p>
        <a href="index.php" id="boton" class="btn btn-primary">Actualizar cartelera</a>
    </p>

</div>

</body>
</html>

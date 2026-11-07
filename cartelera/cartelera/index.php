<?php
/* =====================================================================
   CARTELERA DE CINE  ·  práctica corta
   =====================================================================
   Este es el único archivo que vas a tocar. Son siete zonas:

       1 a 3   PHP: traer los datos y mostrarlos
       4 y 5   Bootstrap: que la página deje de ser fea
       6 y 7   El formulario: cargar una película nueva

   Reemplazá cada caja punteada por tu código, guardá y recargá.
   Las consignas y las pistas están en el PDF.
   ===================================================================== */

require 'conexion.php';


/* ---------------------------------------------------------------------
   ZONA 7  ·  Guardar la película nueva
   ---------------------------------------------------------------------
   Esto se hace AL FINAL, después de la zona 6, pero el código va acá
   arriba. ¿Por qué? Porque si guardás después de la consulta de la
   zona 1, la película recién cargada no aparece hasta recargar.

   Lo que tiene que pasar:
     · si la página se abrió normalmente, no hacer nada
     · si llegó un formulario enviado, leer los datos e insertarlos

   Dejá esta zona para el final. Primero resolvé de la 1 a la 6.
   --------------------------------------------------------------------- */

// ← acá va el código de la zona 7


/* ---------------------------------------------------------------------
   ZONA 1  ·  Traer las películas de la base
   ---------------------------------------------------------------------
   Pedile a la base todas las películas, ordenadas por horario.

   La conexión ya está abierta y se llama  $db
   La tabla se llama  peliculas  y tiene estas columnas:

       id · titulo · sala · horario · precio · entradas

   Si te sale bien, el contador de abajo del título va a decir 6.
   --------------------------------------------------------------------- */

$peliculas = [];   // ← borrá esta línea y poné tu código


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cartelera</title>

    <?php /* ---------------------------------------------------------
       ZONA 4  ·  Buscar Bootstrap en la documentación
       ---------------------------------------------------------
       No te voy a dar la línea: andá a buscarla.

           https://getbootstrap.com/docs/5.3/getting-started/introduction/

       En esa página, bien arriba, hay un recuadro que dice "CSS" con
       una etiqueta <link> adentro y un botón para copiarla.
       Copiala y pegala acá, justo debajo de esta caja.

       Leer documentación es parte del trabajo: toda tu vida vas a
       aprender herramientas así.
       --------------------------------------------------------- */ ?>


    <style>
        /* Esto es solo para que se vean las cajas de las zonas.
           No lo toques. */
        .zona { border: 2px dashed #999; background: #f0f0f0; color: #555;
                padding: 12px; margin: 12px 0; font-family: sans-serif;
                font-size: 14px; text-align: center; }
    </style>
</head>
<body>

<div id="contenedor">

    <div class="zona">⬜ ZONA 4 · el &lt;link&gt; de Bootstrap va arriba, adentro del &lt;head&gt;.
        Borrá esta caja cuando lo hayas puesto.</div>

    <h1>Cartelera de hoy</h1>
    <p>Tenemos <?= count($peliculas) ?> películas en cartel.</p>

    <table id="tabla">
        <thead>
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

        <?php /* -----------------------------------------------------
           ZONA 2  ·  Armar las filas
           -----------------------------------------------------
           Recorré  $peliculas  y por cada una armá un <tr> con seis
           <td>: título, sala, horario, precio, entradas, y el último
           lo dejás vacío porque es de la zona 3.

           Acordate de cómo se mezcla PHP con HTML en una vista: el
           HTML se escribe tal cual, y donde va un dato abrís <?=  ?>
           ----------------------------------------------------- */ ?>

            <tr>
                <td colspan="6">
                    <div class="zona">⬜ ZONA 2 · acá van las filas, recorriendo $peliculas</div>
                </td>
            </tr>

        <?php /* -----------------------------------------------------
           ZONA 3  ·  El estado de cada función
           -----------------------------------------------------
           En el último <td> de cada fila, mostrá en qué estado está
           la función según cuántas entradas queden:

                 0 entradas          →   AGOTADA
                 menos de 10         →   ÚLTIMAS ENTRADAS
                 de 10 en adelante   →   DISPONIBLE

           Son tres casos, así que necesitás  if / elseif / else .
           Va adentro del foreach de la zona 2.
           ----------------------------------------------------- */ ?>

        </tbody>
    </table>

    <div class="zona">⬜ ZONA 3 · el estado va adentro del foreach de la zona 2.
        Borrá esta caja cuando lo tengas.</div>


    <h2>Cargar una película</h2>

    <?php /* -------------------------------------------------------------
       ZONA 6  ·  Completar el formulario
       -------------------------------------------------------------
       El formulario ya está empezado: el campo del título está hecho
       como ejemplo. Faltan los otros cuatro.

       Lo único que importa de cada campo es el atributo  name :
       ese nombre es el que después vas a usar para leer el dato.
       Poneles el mismo nombre que la columna de la tabla.

           sala        texto
           horario     hora      (type="time")
           precio      número    (type="number" step="0.01")
           entradas    número    (type="number")
       ------------------------------------------------------------- */ ?>

    <form method="post">

        <p>
            <label for="titulo">Título</label><br>
            <input type="text" id="titulo" name="titulo" required>
        </p>

        <div class="zona">⬜ ZONA 6 · acá van los otros cuatro campos</div>

        <p>
            <button type="submit" id="boton-guardar">Guardar película</button>
        </p>

    </form>

    <p>
        <a href="index.php" id="boton">Actualizar cartelera</a>
    </p>

    <?php /* ---------------------------------------------------------
       ZONA 5  ·  Ponerle las clases de Bootstrap
       ---------------------------------------------------------
       Bootstrap ya está enchufado, pero todavía no lo usaste. Funciona
       así: le ponés nombres de clase al HTML que ya tenés. Se pueden
       poner varias juntas, separadas por un espacio.

       Los seis cambios están en la tabla del PDF.
       --------------------------------------------------------- */ ?>

    <div class="zona">⬜ ZONA 5 · ponerle las clases de Bootstrap al HTML de arriba</div>

</div>

</body>
</html>

<?php
/* =====================================================================
   PRÁCTICA DE VISTAS  ·  ficha de la mascota
   =====================================================================

   Este es el ÚNICO archivo que vas a tocar hoy.

   Los datos ya te llegan resueltos. No tenés que consultar nada:

     $mascota       un array asociativo con los datos de la mascota
     $historial     un array de arrays: cada consulta de esa mascota
     $veterinarios  un array de arrays: los veterinarios activos

   Lo único que falta es MOSTRARLOS.

   Cada caja punteada gris es una zona para resolver. Reemplazá la caja
   entera por tu código, guardá, y recargá la página.

   Las pistas están en la hoja que te dieron.
   ===================================================================== */
?>

<p class="rotulo"><a href="<?= url('mascotas') ?>">← Volver a mascotas</a></p>

<?php /* =================================================================
     EL INSPECTOR DE DATOS   ·  esto ya está hecho, no lo toques
     =================================================================
     Abrí este panel en el navegador cuando no sepas qué contiene una
     variable o cómo se llama una clave. Te muestra exactamente lo que
     la vista está recibiendo.

     print_r() es la herramienta que usa cualquier programador de PHP
     cuando algo no sale: imprime un array entero con sus claves.
     ================================================================= */ ?>

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




<?php /* =================================================================
     ZONA 1  ·  El nombre de la mascota                      dificultad *
     =================================================================
     Arriba del todo tiene que aparecer el nombre, en grande.

     Reemplazá la caja de abajo por un <h1> que muestre el nombre.
     El dato está en  $mascota['nombre']
     ================================================================= */ ?>

<div class="zona-pendiente">
    <span class="zona-n">1</span>
    <b>El nombre de la mascota</b>, en un &lt;h1&gt;
</div>


<div class="tarjeta">

    <?php /* =============================================================
         ZONA 2  ·  La ficha de datos                        dificultad **
         =============================================================
         Adentro de la lista <dl> de abajo faltan los valores.
         Cada <dd> está vacío: completalos con el dato que corresponde.

           especie          →  $mascota['especie']
           sexo             →  'M' es Macho, 'H' es Hembra
           nacimiento       →  $mascota['fecha_nacimiento']
           peso             →  $mascota['peso_kg']
           dueño            →  $mascota['dueno']

         Ojo con dos cosas:
           · El peso puede venir vacío. Si no hay dato, mostrá un guión.
           · Para la fecha usá  fecha($mascota['fecha_nacimiento'])
             que la convierte de 2019-04-15 a 15/04/2019.
         ============================================================= */ ?>

    <dl class="datos">
        <dt>Especie</dt>      <dd></dd>
        <dt>Sexo</dt>         <dd></dd>
        <dt>Nacimiento</dt>   <dd></dd>
        <dt>Peso</dt>         <dd></dd>
        <dt>Dueño</dt>        <dd></dd>
    </dl>

    <div class="zona-pendiente zona-chica">
        <span class="zona-n">2</span>
        <b>Los cinco valores de la ficha</b> (completá los &lt;dd&gt; de arriba y borrá esta caja)
    </div>

</div>


<h2>Historial clínico</h2>

<?php /* =================================================================
     ZONA 3  ·  Las filas del historial                      dificultad **
     =================================================================
     La tabla ya tiene su encabezado. Lo que falta son las filas.

     Recorré  $historial  con un foreach y por cada consulta armá
     un <tr> con cinco <td>:

        fecha · motivo · veterinario · costo · (la zona 4 va acá)

     Para la fecha usá   fecha($c['fecha'])
     Para el costo usá   precio($c['costo'])    → queda $ 1.200,00

     La forma de escribir el foreach adentro de una vista es:

        <?php foreach ($historial as $c): ?>
            ... acá va el HTML ...
        <?php endforeach; ?>
     ================================================================= */ ?>

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

            <tr class="zona-pendiente-fila">
                <td colspan="5">
                    <span class="zona-n">3</span>
                    <b>Las filas del historial</b>, recorriendo $historial con foreach
                </td>
            </tr>

            <?php /* =====================================================
                 ZONA 4  ·  La etiqueta de consulta cara    dificultad ***
                 =====================================================
                 Adentro del mismo foreach, en el último <td> de cada
                 fila, poné una etiqueta SOLO si la consulta costó más
                 de 2000 pesos:

                    <span class="etiqueta etiqueta--ambar">Cara</span>

                 Es un if adentro del foreach. Se escribe así:

                    <?php if ( ... ): ?>
                        ... el HTML ...
                    <?php endif; ?>

                 Si resolvés bien, de las tres consultas de Rocco una
                 sola tiene que quedar marcada.
                 ===================================================== */ ?>

        </tbody>

        <?php /* =========================================================
             ZONA 5  ·  El total gastado                   dificultad ****
             =========================================================
             Al pie de la tabla tiene que aparecer cuánto gastó en
             total el dueño de esta mascota.

             Esta es la más difícil del día, y no se resuelve con una
             sola línea. Pensalo así:

               1. Antes de la tabla, creás una variable en cero.
               2. Adentro del foreach, le vas sumando cada costo.
               3. Acá abajo, la mostrás.

             El paso 1 va ARRIBA del <div class="tabla-caja">, no acá.
             ========================================================= */ ?>

        <tfoot>
            <tr>
                <td colspan="3"><b>Total gastado</b></td>
                <td class="num">
                    <div class="zona-pendiente zona-chica">
                        <span class="zona-n">5</span>
                        <b>El total</b>
                    </div>
                </td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</div>

<div class="zona-pendiente zona-chica">
    <span class="zona-n">4</span>
    <b>La etiqueta "Cara"</b> va adentro del foreach de la zona 3, en el último &lt;td&gt;.
    Borrá esta caja cuando la tengas resuelta.
</div>



<?php /* =================================================================
     ZONA 6  ·  Cuando no hay historial                      dificultad **
     =================================================================
     Si esta mascota nunca vino, la tabla queda vacía y no se entiende
     qué pasó.

     Hacé que, cuando $historial esté vacío, en vez de la tabla se vea
     un mensaje que diga "Esta mascota todavía no tuvo ninguna consulta".

     Para saber si está vacío:   empty($historial)
     Vas a necesitar un if ... else ... envolviendo la tabla entera.

     Para probarlo: entrá a la ficha de Copito o de Pipo, que no
     tienen ninguna consulta cargada.
     ================================================================= */ ?>

<div class="zona-pendiente">
    <span class="zona-n">6</span>
    <b>El mensaje de historial vacío</b> (envolvé la tabla de arriba en un if/else)
</div>


<h2>Registrar una consulta</h2>

<form class="tarjeta form" method="post" action="<?= url('mascotas/atender/' . $mascota['id']) ?>">

    <?php /* =============================================================
         ZONA 7  ·  El desplegable de veterinarios         dificultad ***
         =============================================================
         El <select> de abajo está vacío. Tiene que tener una <option>
         por cada veterinario de $veterinarios.

         Cada opción se escribe así:

            <option value="EL ID">EL NOMBRE</option>

         O sea: otro foreach, pero esta vez lo que armás no es una fila
         de tabla sino una opción del desplegable.

         Si te sale, el desplegable tiene que mostrar 4 veterinarios.
         ============================================================= */ ?>

    <div class="campo">
        <label for="veterinario_id">Veterinario</label>
        <select id="veterinario_id" name="veterinario_id" required>
            <option value="">— Elegir —</option>
        </select>

        <div class="zona-pendiente zona-chica">
            <span class="zona-n">7</span>
            <b>Las opciones del desplegable</b> van adentro del &lt;select&gt; de arriba
        </div>
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


<?php /* =================================================================
     ZONA 8  ·  DESAFÍO · La consulta más cara             dificultad *****
     =================================================================
     Opcional. Solo si terminaste todo lo demás.

     Hacé que la fila de la consulta MÁS CARA del historial aparezca
     resaltada, agregándole  class="fila-destacada"  al <tr>.

     Pista grande: no se puede saber cuál es la más cara hasta no
     haberlas mirado todas. Así que vas a necesitar recorrer el array
     dos veces: una para averiguar cuál es el costo máximo, y otra
     para dibujar las filas comparando contra ese valor.
     ================================================================= */ ?>

<div class="zona-pendiente zona-chica">
    <span class="zona-n">8</span>
    <b>Desafío opcional</b> · leé el comentario de arriba. Si no lo hacés, borrá esta caja igual
    para cerrar la barra de progreso.
</div>

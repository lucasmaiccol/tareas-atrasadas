<?php /* clientes/formulario — [RESUELTO] */ ?>

<p class="rotulo"><a href="<?= url('clientes') ?>">← Volver a clientes</a></p>
<h1>Nuevo cliente <small class="ej">ejercicio 7</small></h1>

<form class="tarjeta form" method="post" action="<?= url('clientes/guardar') ?>">

    <div class="campo">
        <label for="nombre">Nombre completo *</label>
        <input type="text" id="nombre" name="nombre" maxlength="100" required>
    </div>

    <div class="fila">
        <div class="campo">
            <label for="documento">Documento *</label>
            <input type="text" id="documento" name="documento" maxlength="20" required>
        </div>
        <div class="campo">
            <label for="telefono">Teléfono</label>
            <input type="text" id="telefono" name="telefono" maxlength="30">
        </div>
    </div>

    <div class="campo">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" maxlength="120">
    </div>

    <div class="campo">
        <label for="direccion">Dirección</label>
        <input type="text" id="direccion" name="direccion" maxlength="150">
    </div>

    <p class="ayuda">La fecha de alta la pone el modelo automáticamente: es la de hoy.</p>

    <div class="acciones">
        <button class="boton boton--primario" type="submit">Guardar cliente</button>
        <a class="boton boton--claro" href="<?= url('clientes') ?>">Cancelar</a>
    </div>

</form>

# Práctica de vistas — Veterinaria Patitas

Aplicación web en PHP puro (sin framework) + MySQL.
**Todo está resuelto menos una vista**: la ficha de la mascota.

- `practica-vistas.pdf` — la guía con las pistas (6 páginas).
- `app/vistas/mascotas/ficha.php` — **el único archivo que se edita**.
- Todo lo demás (base de datos, modelos, controladores, el resto de las
  vistas y los estilos) ya está hecho y no se toca.

## Puesta en marcha

1. Copiar la carpeta dentro de `C:\xampp\htdocs`
2. Arrancar **Apache** y **MySQL** desde XAMPP.
3. En phpMyAdmin → Importar, en este orden:
   `sql/01_ddl.sql`, `sql/02_dcl.sql`, `sql/03_datos.sql`, `sql/04_practica_vistas.sql`
   Si la base ya estaba cargada de antes, alcanza con el `04`.
4. Entrar a `http://localhost/veterinaria-mvc/mascotas/ficha/1`

La app conecta con el usuario `vet_app` / `vet2026`, creado por el DCL con
permisos limitados a esta base. No usa root.

## Las ocho zonas

La página aparece con ocho cajas punteadas grises. Cada una es una zona
para resolver. Al pie hay una barra que cuenta cuántas faltan.

Arriba de la página hay un panel desplegable, **Ver los datos que me
llegan**, que muestra con `print_r()` el contenido exacto de las tres
variables que recibe la vista.

## Para el docente

La solución completa está en `SOLUCION-ficha.php`, fuera de este paquete.
Copiarla sobre `app/vistas/mascotas/ficha.php` para ver la práctica terminada.

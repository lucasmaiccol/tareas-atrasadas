# Consultorio Veterinario — Proyecto MVC

Aplicación web en PHP puro (sin framework) + MySQL, armada como actividad
de clase: **todo está resuelto menos las 17 consultas a la base de datos**.

- `CONSIGNA.pdf` — el enunciado para repartir (5 páginas).
- `sql/` — DDL, DCL y datos de carga. Se importan en ese orden.
- `app/modelos/` — los cuatro archivos que completan los alumnos,
  más `Veterinario.php` resuelto como ejemplo.
- Todo lo demás ya está hecho y no se toca.

## Puesta en marcha

1. Copiar la carpeta dentro de `C:\xampp\htdocs`
2. Arrancar **Apache** y **MySQL** desde XAMPP.
3. En phpMyAdmin → Importar, en este orden:
   `sql/01_ddl.sql`, `sql/02_dcl.sql`, `sql/03_datos.sql`
4. Entrar a `http://localhost/veterinaria-mvc/`

La app conecta con el usuario `vet_app` / `vet2026`, creado por el DCL con
permisos limitados a esta base. No usa root.

## Para el docente

Las soluciones están en la carpeta `soluciones-docente/`, fuera del paquete
que se reparte. Para ver la aplicación funcionando al 100%, copiar esos
cuatro archivos sobre `app/modelos/`.

Todas las consultas de la solución fueron verificadas contra los datos de
carga. Resultados esperados: 6 especies, 10 clientes, 18 mascotas,
23 consultas, 4 veterinarios con facturación, y 9 mascotas sin control a
120 días (2 de ellas sin ninguna consulta).

<?php
/**
 * conexion.php  ·  RESUELTO — no hace falta tocarlo
 *
 * Abre la conexión con MySQL y la deja en la variable $db.
 * Si la página te dice que no se pudo conectar, revisá acá.
 */

$host     = 'localhost';
$base     = 'cine';
$usuario  = 'root';
$password = '';          // En XAMPP va vacío. En MAMP poné 'root'.

try {
    $db = new PDO(
        "mysql:host=$host;dbname=$base;charset=utf8mb4",
        $usuario,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );
} catch (PDOException $e) {
    die('<h1>No se pudo conectar</h1><p>' . htmlspecialchars($e->getMessage())
      . '</p><p>¿Está MySQL encendido? ¿Importaste cartelera.sql?</p>');
}

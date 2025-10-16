<?php
// NOTA DE PROYECTO:
// Archivo de conexión PDO reutilizable.
// Vi ejemplos en donde se activaba el tipado estricto para trabajar con PHP 8 y detectar posibles errores de tipo.

declare(strict_types=1);


$servidor = 'localhost';
$usuario = 'root';
$clave = "";
$base_datos = "sgh_gutierrezdavid";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$base_datos;charset=utf8", $usuario, $clave);
    // Conexión establecida correctamente, sin mostrar mensaje
} catch(PDOException $e) {
    echo "❌ Error al conectar con la base de datos: " . $e->getMessage();
}


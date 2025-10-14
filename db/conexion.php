<?php
declare(strict_types=1);
// Vi ejemplos en donde se activaba el tipado estricto para trabajar con PHP 8 y detectar posibles errores de tipo.


// Datos de conexión
$servidor = 'localhost';
$usuario = 'root';
$clave = "";
$base_datos = "sgh_gutierrezdavid";

// Intentar la conexión

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$base_datos;charset=utf8", $usuario, $clave);
    // Si todo va bien, mostramos un mensaje (provisional).
    echo "✅ Conexión establecida de forma correcta!!";
} catch(PDOException $e) {
    // Si algo falla, mostramos el error.
    echo "❌ Error al conectar con la base de datos: " . $e->getMessage();
}


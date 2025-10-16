<?php
// procesar_huesped.php
// Recibe los datos del formulario y los guarda en la base de datos.

declare(strict_types=1);

// Conectamos a la base de datos
require_once __DIR__ . '/../db/conexion.php';

// Verificamos que se haya enviado el formulario correctamente
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST["nombre"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $documento = trim($_POST["documento"] ?? "");

    // Validamos campos vacíos
    if ($nombre === "" || $email === "" || $documento === "") {
        echo "<p style='color:red; text-align:center;'>⚠️ Todos los campos son obligatorios.</p>";
        echo "<p style='text-align:center;'><a href='registrar_huesped.php'>Volver al formulario</a></p>";
        exit;
    }

    try {
        // Preparamos la sentencia SQL
        $sql = "INSERT INTO huespedes (nombre, email, documento_identidad) 
                VALUES (:nombre, :email, :documento)";

        $stmt = $conexion->prepare($sql);

        // Asignamos los valores
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":documento", $documento, PDO::PARAM_STR);

        // Ejecutamos la consulta
        $stmt->execute();

        // Mostramos mensaje de éxito
        echo "<h2 style='text-align:center; color:green;'>✅ Huésped registrado correctamente.</h2>";
        echo "<p style='text-align:center;'><a href='../index.php'>Volver al inicio</a></p>";

    } catch (PDOException $e) {
        // Controlamos errores (por ejemplo, email duplicado)
        echo "<h2 style='text-align:center; color:red;'>❌ Error al registrar huésped:</h2>";
        echo "<p style='text-align:center;'>" . $e->getMessage() . "</p>";
        echo "<p style='text-align:center;'><a href='registrar_huesped.php'>Volver al formulario</a></p>";
    }
} else {
    // Si se intenta acceder directamente sin formulario
    header("Location: registrar_huesped.php");
    exit;
}

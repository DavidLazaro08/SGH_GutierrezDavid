<?php
// procesar_reserva.php
// Guarda los datos del formulario en la tabla de reservas

declare(strict_types=1);
require_once __DIR__ . '/../db/conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id_huesped = $_POST["id_huesped"] ?? "";
    $id_habitacion = $_POST["id_habitacion"] ?? "";
    $fecha_llegada = $_POST["fecha_llegada"] ?? "";
    $fecha_salida = $_POST["fecha_salida"] ?? "";
    $precio_total = $_POST["precio_total"] ?? "";

    // Validamos campos
    if (empty($id_huesped) || empty($id_habitacion) || empty($fecha_llegada) || empty($fecha_salida) || empty($precio_total)) {
        echo "<p style='color:red; text-align:center;'>⚠️ Todos los campos son obligatorios.</p>";
        echo "<p style='text-align:center;'><a href='crear_reserva.php'>Volver al formulario</a></p>";
        exit;
    }

    try {
        // Preparamos la consulta
        $sql = "INSERT INTO reservas (id_huesped, id_habitacion, fecha_llegada, fecha_salida, precio_total, estado)
                VALUES (:id_huesped, :id_habitacion, :fecha_llegada, :fecha_salida, :precio_total, 'Pendiente')";

        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":id_huesped", $id_huesped, PDO::PARAM_INT);
        $stmt->bindParam(":id_habitacion", $id_habitacion, PDO::PARAM_INT);
        $stmt->bindParam(":fecha_llegada", $fecha_llegada);
        $stmt->bindParam(":fecha_salida", $fecha_salida);
        $stmt->bindParam(":precio_total", $precio_total);

        $stmt->execute();

        echo "<h2 style='text-align:center; color:green;'>✅ Reserva creada correctamente.</h2>";
        echo "<p style='text-align:center;'><a href='../index.php'>Volver al inicio</a></p>";

    } catch (PDOException $e) {
        echo "<h2 style='text-align:center; color:red;'>❌ Error al crear reserva:</h2>";
        echo "<p style='text-align:center;'>" . $e->getMessage() . "</p>";
        echo "<p style='text-align:center;'><a href='crear_reserva.php'>Volver al formulario</a></p>";
    }
} else {
    header("Location: crear_reserva.php");
    exit;
}

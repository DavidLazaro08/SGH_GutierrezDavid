<?php
// crear_reserva.php

// NOTA DE PROYECTO:
// Formulario para crear una nueva reserva
// Vista combinada (HTML + PHP) basada en plantillas personales previas de otras actividades,
// adaptada para mostrar datos reales con PDO según lo que hemos visto en clase.

declare(strict_types=1);
require_once __DIR__ . '/../db/conexion.php';

// -------------------------------------------------------------
// 1️⃣ Obtenemos los huéspedes y habitaciones de la base de datos
// -------------------------------------------------------------

try {
    $huespedes = $conexion->query("SELECT id, nombre FROM huespedes")->fetchAll(PDO::FETCH_ASSOC);
    $habitaciones = $conexion->query("SELECT id, numero, tipo FROM habitaciones")->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "<p style='color:red; text-align:center;'>❌ Error al cargar datos: " . $e->getMessage() . "</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Reserva - SGH</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
</head>
<body>

    <h1>🛎️ Crear nueva reserva</h1>

    <form action="procesar_reserva.php" method="POST" class="formulario">

        <!-- Huésped -->
        <label for="huesped">Huésped:</label>
        <select id="huesped" name="id_huesped" required>
            <option value="">Selecciona un huésped...</option>
            <?php foreach ($huespedes as $h): ?>
                <option value="<?= (int)$h['id'] ?>">
                    <?= htmlspecialchars((string)$h['nombre']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <!-- Habitación -->
        <label for="habitacion">Habitación:</label>
        <select id="habitacion" name="id_habitacion" required>
            <option value="">Selecciona una habitación...</option>
            <?php foreach ($habitaciones as $hab): ?>
                <?php
                // Evitamos errores si algún dato llega vacío
                $numero = isset($hab['numero']) ? htmlspecialchars((string)$hab['numero']) : "Sin número";
                $tipo = isset($hab['tipo']) ? htmlspecialchars((string)$hab['tipo']) : "Sin tipo";
                ?>
                <option value="<?= (int)$hab['id'] ?>">Nº <?= $numero ?> (<?= $tipo ?>)</option>
            <?php endforeach; ?>
        </select>

        <!-- Fechas -->
        <label for="fecha_llegada">Fecha de llegada:</label>
        <input type="date" id="fecha_llegada" name="fecha_llegada" required>

        <label for="fecha_salida">Fecha de salida:</label>
        <input type="date" id="fecha_salida" name="fecha_salida" required>

        <!-- Precio -->
        <label for="precio_total">Precio total (€):</label>

        <!-- Dejé el precio con valor por defecto 0.00 para permitir registrar 
         la reserva aunque no se calcule automáticamente -->
        <input type="number" step="0.01" id="precio_total" name="precio_total" value="0.00">

        <button type="submit">✅ Crear reserva</button>
    </form>

    <!-- Enlaces de navegación -->
    <div style="text-align:center; margin-top:20px;">
        <a href="../index.php">⬅ Volver al inicio</a>
    </div>

</body>
</html>

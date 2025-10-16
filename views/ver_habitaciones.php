<?php
// NOTA DE PROYECTO:
// Vista combinada (HTML + PHP) basada en plantillas personales previas,
// adaptada para mostrar datos reales con PDO según lo visto en clase.

require_once __DIR__ . '/../src/Habitacion.php';

// Obtenemos las habitaciones desde la base de datos
$habitaciones = Habitacion::obtenerHabitaciones();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Habitaciones - SGH</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
</head>
<body>
    <h1 class="titulo-vista">🏨 Listado de Habitaciones</h1>

    <?php if (!empty($habitaciones)) : ?>
        <table class="tabla-datos">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Número</th>
                    <th>Tipo</th>
                    <th>Precio base</th>
                    <th>Estado de limpieza</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($habitaciones as $hab): ?>
                    <tr>
                        <td><?= htmlspecialchars((string)$hab["id"]) ?></td>
                        <td><?= htmlspecialchars((string)$hab["numero"]) ?></td>
                        <td><?= htmlspecialchars((string)$hab["tipo"]) ?></td>
                        <td><?= htmlspecialchars((string)$hab["precio_base"]) ?> €</td>
                        <td><?= htmlspecialchars((string)$hab["estado_limpieza"]) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p class="mensaje-vacio">No hay habitaciones registradas.</p>
    <?php endif; ?>

    <a href="../index.php" class="volver">⬅ Volver al inicio</a>
</body>
</html>

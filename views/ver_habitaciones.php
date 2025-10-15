<?php
// Cargamos la clase Habitacion
require_once __DIR__ . '/../src/Habitacion.php';

// Obtenemos las habitaciones desde la base de datos
$habitaciones = Habitacion::obtenerHabitaciones();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Habitaciones</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background: #f8f8f8; }
        table { border-collapse: collapse; width: 100%; background: #fff; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #eee; }
        h1 { color: #333; }
    </style>
</head>
<body>
    <h1>Listado de Habitaciones</h1>

    <?php if (!empty($habitaciones)) : ?>
        <table>
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
                        <td><?= $hab["id"] ?></td>
                        <td><?= $hab["numero"] ?></td>
                        <td><?= $hab["tipo"] ?></td>
                        <td><?= $hab["precio_base"] ?> €</td>
                        <td><?= $hab["estado_limpieza"] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No hay habitaciones registradas.</p>
    <?php endif; ?>
</body>
</html>

<?php
// NOTA DE PROYECTO:
// Vista combinada (HTML + PHP) basada en plantillas personales previas,
// adaptada para mostrar datos reales con PDO según lo visto en clase.

require_once __DIR__ . '/../db/conexion.php';
$modoTema = $_COOKIE['modo_tema'] ?? 'claro';

try {
    // Consulta para obtener las reservas junto con el nombre del huésped y el número de habitación
    $consulta = $conexion->query("
        SELECT 
            r.id,
            h.nombre AS huesped,
            hab.numero AS habitacion,
            hab.tipo AS tipo,
            r.fecha_llegada,
            r.fecha_salida,
            r.precio_total,
            r.estado
        FROM reservas r
        INNER JOIN huespedes h ON r.id_huesped = h.id
        INNER JOIN habitaciones hab ON r.id_habitacion = hab.id
        ORDER BY r.fecha_reserva DESC
    ");

    $reservas = $consulta->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo '<p style="color:red; text-align:center;">❌ Error al cargar reservas: ' . $e->getMessage() . '</p>';
    $reservas = [];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Reservas - SGH</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
</head>
<body class="<?= htmlspecialchars($modoTema) ?>">
    <h1 class="titulo-vista">📋 Listado de Reservas</h1>

    <?php if (!empty($reservas)) : ?>
        <table class="tabla-datos">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Huésped</th>
                    <th>Habitación</th>
                    <th>Tipo</th>
                    <th>Fecha de llegada</th>
                    <th>Fecha de salida</th>
                    <th>Precio total</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservas as $r): ?>
                    <tr>
                        <td><?= htmlspecialchars((string)$r["id"]) ?></td>
                        <td><?= htmlspecialchars((string)$r["huesped"]) ?></td>
                        <td><?= htmlspecialchars((string)$r["habitacion"]) ?></td>
                        <td><?= htmlspecialchars((string)$r["tipo"]) ?></td>
                        <td><?= htmlspecialchars((string)$r["fecha_llegada"]) ?></td>
                        <td><?= htmlspecialchars((string)$r["fecha_salida"]) ?></td>
                        <td><?= htmlspecialchars((string)$r["precio_total"]) ?> €</td>
                        <td><?= htmlspecialchars((string)$r["estado"]) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p class="mensaje-vacio">Lo siento! No hay reservas registradas.</p>
    <?php endif; ?>

    <a href="../index.php" class="volver">⬅ Volver al inicio</a>
</body>
</html>

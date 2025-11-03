<?php
// NOTA DE PROYECTO:
// Simplifiqué este módulo de forma que muestre las tareas de
// mantenimiento y limpieza que registré directamente en la base de datos.
// No implementé el formulario de registro, ya que el objetivo es visualizar las tareas existentes..

require_once __DIR__ . '/../db/conexion.php';
$modoTema = $_COOKIE['modo_tema'] ?? 'claro';

try {
    $consulta = $conexion->query("
        SELECT 
            m.id,
            hab.numero AS habitacion,
            hab.tipo AS tipo,
            m.descripcion,
            m.fecha_inicio,
            m.fecha_fin
        FROM mantenimientos m
        INNER JOIN habitaciones hab ON m.id_habitacion = hab.id
        ORDER BY m.fecha_inicio DESC
    ");
    $mantenimientos = $consulta->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo '<p style="color:red; text-align:center;">❌ Error al cargar los mantenimientos: ' . $e->getMessage() . '</p>';
    $mantenimientos = [];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mantenimientos - SGH</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
</head>
<body class="<?= htmlspecialchars($modoTema) ?>">
    <h1 class="titulo-vista">🧹 Mantenimientos y limpiezas</h1>

    <?php if (!empty($mantenimientos)) : ?>
        <table class="tabla-datos">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Habitación</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mantenimientos as $m): ?>
                    <tr>
                        <td><?= htmlspecialchars((string)$m["id"]) ?></td>
                        <td><?= htmlspecialchars((string)$m["habitacion"]) ?></td>
                        <td><?= htmlspecialchars((string)$m["tipo"]) ?></td>
                        <td><?= htmlspecialchars((string)$m["descripcion"]) ?></td>
                        <td><?= htmlspecialchars((string)$m["fecha_inicio"]) ?></td>
                        <td><?= htmlspecialchars((string)$m["fecha_fin"]) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p class="mensaje-vacio">No hay mantenimientos registrados.</p>
    <?php endif; ?>

    <a href="../index.php" class="volver">⬅ Volver al inicio</a>
</body>
</html>

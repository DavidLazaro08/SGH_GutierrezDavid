<?php
// registrar_huesped.php

// NOTA DE PROYECTO:
// Formulario basado en plantillas personales previas,
// adaptado para mantener una presentación limpia y coherente.
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Huésped - SGH</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
</head>
<body>

    <h1>Registrar nuevo huésped</h1>

    <form action="procesar_huesped.php" method="POST">
        <label for="nombre">Nombre completo:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required>

        <label for="documento">Documento de identidad:</label>
        <input type="text" id="documento" name="documento" required>

        <button type="submit">Registrar huésped</button>
    </form>

    <a class="volver" href="../index.php">⬅ Volver al inicio</a>

</body>
</html>

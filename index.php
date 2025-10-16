<?php
// index.php
// Página principal del Sistema de Gestión Hotelera (SGH)
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>SGH - Sistema de Gestión Hotelera</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body class="inicio">

    <div class="contenedor-principal">
        <h1>🏨 Sistema de Gestión Hotelera (SGH)</h1>

        <div class="menu">
            <a href="views/ver_habitaciones.php">Ver habitaciones</a>
            <a href="views/registrar_huesped.php">Registrar huésped</a>
            <a href="views/crear_reserva.php">Crear reserva</a>
            <a href="views/ver_reservas.php">Ver reservas</a>
            <a href="views/ver_mantenimientos.php">Ver mantenimientos</a>
        </div>

        <p class="descripcion">
            Bienvenido al panel principal del sistema.<br>
            Selecciona una opción para comenzar.
        </p>

        <footer>
            Proyecto académico - SGH © 2025 | David Gutiérrez
        </footer>
    </div>

</body>
</html>

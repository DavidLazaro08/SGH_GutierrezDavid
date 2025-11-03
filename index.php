<?php
// index.php
// Página principal del Sistema de Gestión Hotelera (SGH)

// Le añadimos CONTROL DE SESIÓN

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: views/login.php");
    exit;
}

// Guardamos los datos del usuario logueado para mostrarlos en la interfaz
$nombreUsuario = $_SESSION['usuario'];
$rolUsuario = $_SESSION['rol'];
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

        <!-- Barra de información de sesión -->
        <div style="background-color:#f2f2f2; padding:10px; border-radius:8px; margin-bottom:20px;">
            <p>
                👤 Sesión iniciada como: 
                <strong><?= htmlspecialchars($nombreUsuario) ?></strong> 
                (rol: <?= htmlspecialchars($rolUsuario) ?>)
            </p>
            <a href="views/cerrar_sesion.php">Cerrar sesión</a>
        </div>

        <!-- Menú principal adaptado al rol -->
        <div class="menu">
            <?php if ($rolUsuario === 'admin'): ?>
                <!-- Vistas completas para el administrador -->
                <a href="views/ver_habitaciones.php">Ver habitaciones</a>
                <a href="views/registrar_huesped.php">Registrar huésped</a>
                <a href="views/crear_reserva.php">Crear reserva</a>
                <a href="views/ver_reservas.php">Ver reservas</a>
                <a href="views/ver_mantenimientos.php">Ver mantenimientos</a>
            <?php else: ?>
                <!-- Vistas limitadas para el usuario normal -->
                <a href="views/crear_reserva.php">Crear reserva</a>
                <a href="views/ver_reservas.php">Ver mis reservas</a>
                <p style="color:#777; margin-top:10px;">
                    🔒 Algunas secciones están restringidas para administradores.
                </p>
            <?php endif; ?>
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
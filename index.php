<?php
// index.php
// Página principal del Sistema de Gestión Hotelera (SGH)

// Le añadimos CONTROL DE SESIÓN
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: views/login.php");
    exit;
}

// --------------------------------------------------------------
// DETECTAR MODO GUARDADO EN COOKIE (oscuro o claro)
// --------------------------------------------------------------
$modoTema = $_COOKIE['modo_tema'] ?? 'claro';

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
<!-- Aquí aplicamos el modo oscuro o claro al body -->
<body class="inicio <?= htmlspecialchars($modoTema) ?>">

    <div class="contenedor-principal">
        <h1>🏨 Sistema de Gestión Hotelera (SGH)</h1>

        <div class="imagen-hotel">
            <img src="assets/img/HOTEL1.png" alt="Vista del hotel SGH">
        </div>

        <!-- Barra de información de sesión -->
        <div class="barra-sesion">
            <p>
                👤 Sesión iniciada como: 
                <strong><?= htmlspecialchars($nombreUsuario) ?></strong> 
                (rol: <?= htmlspecialchars($rolUsuario) ?>)
            </p>
            <a href="views/tema.php" class="enlace-tema">🌓 Cambiar tema</a>
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

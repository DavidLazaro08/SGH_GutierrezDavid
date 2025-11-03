<?php
// views/cerrar_sesion.php
// (Basado en el ejemplo adaptado de Login.php → Bienvenida.php → Cerrar_sesion.php)

session_start(); // Iniciamos o reanudamos la sesión

// Eliminamos todas las variables de sesiones (Vaciar el array $_SESSION)
$_SESSION = array();

// Destruimos el archivo de sesión en el servidor,
session_destroy();

// Redirigimos al login
header("Location: login.php");
exit;
?>

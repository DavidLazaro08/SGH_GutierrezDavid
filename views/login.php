<?php
// views/login.php
// (Basado en el ejemplo de clase: Login.php → Bienvenida.php → Cerrar_sesion.php)

session_start();
require_once("../db/conexion.php");

$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $identificador = trim($_POST['identificador']); // Puede ser nombre o email
    $password = trim($_POST['password']);

    try {
        // Permitir login con email o nombre
        $sql = "SELECT * FROM usuarios 
                WHERE (email = :identificador OR nombre = :identificador)
                AND password = :password";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':identificador', $identificador, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            $_SESSION['usuario'] = $usuario['nombre'];
            $_SESSION['rol'] = $usuario['rol'];
            $_SESSION['email'] = $usuario['email'];

            // Redirigir al index de la raíz del proyecto
            header("Location: /index.php");
            exit;
        } else {
            $mensaje = "Usuario o contraseña incorrectos.";
        }
    } catch (PDOException $e) {
        $mensaje = "Error de conexión: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de sesión - SGH</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
</head>
<body>

    <h1>🔑 Iniciar sesión</h1>

    <!-- Instrucciones para el profesor -->
    <div class="datos-prueba">
        <p><strong>Datos de prueba:</strong></p>
        <ul>
            <li><b>Administrador</b> → <i>admin@sgh.com</i> o <i>Administrador</i> / <b>admin123</b></li>
            <li><b>Usuario Random</b> → <i>user@sgh.com</i> o <i>UsuarioRandom</i> / <b>random123</b></li>
        </ul>
    </div>

    <?php if (!empty($mensaje)): ?>
        <p style="color:red; text-align:center;"><?= htmlspecialchars($mensaje) ?></p>
    <?php endif; ?>

    <!-- Formulario de login -->
    <form method="POST" action="" class="form-login">
        <label for="identificador">Correo electrónico o nombre:</label>
        <input type="text" name="identificador" required>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>

        <button type="submit">Entrar</button>
    </form>

</body>
</html>

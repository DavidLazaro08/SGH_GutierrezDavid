<?php
// views/tema.php
// (Basado en los ejemplos del profesor de cookies)
// Permite elegir entre modo claro y modo oscuro, y guarda la preferencia en una cookie.

session_start();

// Si ya existe cookie, la usamos; si no, por defecto "claro"
$tema = $_COOKIE['modo_tema'] ?? 'claro';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['modo'])) {
    $tema = $_POST['modo'];
    setcookie("modo_tema", $tema, time() + (86400 * 30), "/"); // 30 días
    header("Location: tema.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modo Oscuro / Claro - SGH</title>
    <link rel="stylesheet" href="../assets/css/estilos.css">
</head>
<body class="<?= htmlspecialchars($tema) ?>">

    <h1>🌗 Preferencias de visualización</h1>

    <form method="POST" action="" class="form-login">
        <label>Selecciona el modo de tema:</label><br><br>
        <label><input type="radio" name="modo" value="claro" <?= $tema === 'claro' ? 'checked' : '' ?>> Claro</label><br>
        <label><input type="radio" name="modo" value="oscuro" <?= $tema === 'oscuro' ? 'checked' : '' ?>> Oscuro</label><br><br>

        <button type="submit">Guardar preferencia</button>
    </form>

    <div class="datos-prueba" style="text-align:center; margin-top:20px;">
        <p>🕯 Tu elección se guardará durante 30 días en una cookie.<br>
        Al volver a entrar, SGH mostrará el modo seleccionado.</p>
        <a href="../index.php">⬅ Volver al panel principal</a>
    </div>

</body>
</html>

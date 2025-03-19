<?php
// Validar en el servidor

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Evitar caracteres especiales
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $errores = [];

    // Validar que el campo usuario no esté vacío y tenga al menos 6 caracteres
    if (empty($username)) {
        $errores[] = "El campo usuario es obligatorio.";
    } elseif (strlen($username) < 6) {
        $errores[] = "El usuario debe tener al menos 6 caracteres.";
    }

    // Validar que el campo contraseña no esté vacío y tenga al menos 6 caracteres
    if (empty($password)) {
        $errores[] = "El campo contraseña es obligatorio.";
    } elseif (strlen($password) < 6) {
        $errores[] = "La contraseña debe tener al menos 6 caracteres.";
    }

    // Si la validación es correcta, se puede proceder a la autenticación
    if (empty($errores)) {
        // Ejemplo de validación de credenciales (en la práctica, consultar una base de datos)
        if ($username === "admin123" && $password === "pass123") {
            echo "<p>Inicio de sesión exitoso. ¡Bienvenido, $username!</p>";
        } else {
            echo "<p style='color:red;'>Usuario o contraseña incorrectos.</p>";
        }
    } else {
        // Mostrar los errores de validación
        foreach ($errores as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
} else {
    // Si se accede directamente a este archivo sin enviar el formulario, redireccionar
    header("Location: indextest.html");
    exit();
}

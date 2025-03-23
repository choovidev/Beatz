<?php
// Inicializar variables
$username = $password = $email = "";
$errores = [];
// Verificar si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Eliminar espacios en blanco al principio y al final de los datos
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  $email    = trim($_POST['email']);

  // Validación de cada campo vacios
  if (empty($username)) {
    $errores[] = "El campo 'Usuario' es obligatorio.";
  } elseif (strlen($username) < 4) {
    $errores[] = "El usuario debe tener al menos 4 caracteres.";
  }
  if (empty($password)) {
    $errores[] = "El campo 'Contraseña' es obligatorio.";
  } elseif (strlen($password) < 6) {
    $errores[] = "La contraseña debe tener al menos 6 caracteres.";
  }
  if (empty($email)) {
    $errores[] = "El campo 'Correo electrónico' es obligatorio.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores[] = "El correo electrónico no es válido.";
  }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Procesar Formulario</title>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="formulario.css" />
</head>

<body>
  <h1 id="logo">BΞΛTZ</h1>
  <div class="login-container">
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      // Si hay errores, se muestra el formulario original con errores y campos insertados.
      if (!empty($errores)) {
        echo "<form class='login-form' action='procesar.php' id='loginForm' method='POST'>";
        echo "<h2>Iniciar Sesión</h2>";
        echo "<div class='errores'><ul>";
        foreach ($errores as $error) {
          // Mostrar los errores en una lista
          echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul></div>";
    ?>
        <div class="form-group">
          <label for="username">Usuario</label>
          <input
            type="text"
            id="username"
            name="username"
            placeholder="Ingresa tu usuario"
            value="<?php echo htmlspecialchars($username); ?>" /> <!--Insertar el valor del usuario en el campo de usuario-->
        </div>
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input
            type="text"
            id="password"
            name="password"
            placeholder="Ingresa tu contraseña"
            value="<?php echo htmlspecialchars($password); ?>" /> <!--Insertar el valor de la contraseña en el campo de contraseña-->
        </div>
        <div class="form-group">
          <label for="email">Correo electrónico</label>
          <input
            type="email"
            id="email"
            name="email"
            placeholder="Ingresa tu correo electrónico"
            value="<?php echo htmlspecialchars($email); ?>" /> <!--Insertar el valor del correo electrónico en el campo de correo electrónico-->
        </div>
        <!--Boton de registro-->
        <button type="submit" class="login-button">Registrarse</button>
        <!--Volver al inicio-->
        <a href="indextest.html" class="back-link">Volver al inicio</a>
      <?php
        echo "</form>";
      } else {
        // Si la validación es exitosa, se muestra un "formulario" idéntico que contiene el resultado
        echo "<form class='login-form resultado-form'>";
        echo "<h3>Registro Exitoso</h3>";
        echo "<div class='form-group'>";
        echo "<label>Usuario:</label>";
        echo "<p>" . htmlspecialchars($username) . "</p>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label>Correo electrónico:</label>";
        echo "<p>" . htmlspecialchars($password) . "</p>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label>Email:</label>";
        echo "<p>" . htmlspecialchars($email) . "</p>";
        echo "</div>";
        echo '<a href="indextest.html" class="back-link">Volver al inicio</a>';
        echo "</form>";
      }
    } else {
      // Si no se ha enviado el formulario, se muestra el formulario original
      ?>
      <form class="login-form" action="procesar.php" id="loginForm" method="POST">
        <h2>Iniciar Sesión</h2>
        <div class="form-group">
          <label for="username">Usuario</label>
          <input
            type="text"
            id="username"
            name="username"
            placeholder="Ingresa tu usuario"
            value="" />
        </div>
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input
            type="text"
            id="password"
            name="password"
            placeholder="Ingresa tu contraseña"
            value="" />
        </div>
        <div class="form-group">
          <label for="email">Correo electrónico</label>
          <input
            type="email"
            id="email"
            name="email"
            placeholder="Ingresa tu correo electrónico"
            value="" />
        </div>
        <!--Boton de registro-->
        <button type="submit" class="login-button">Registrarse</button>
        <!--Volver al inicio-->
        <a href="indextest.html" class="back-link">Volver al inicio</a>
      </form>
    <?php
    }
    ?>
  </div>
  <!-- Script de validación en JS. -->
  <script src="validacion.js"></script>
</body>

</html>
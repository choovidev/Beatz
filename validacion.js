// Obtener el formulario
const loginForm = document.querySelector(".login-form");

// Agregar evento de envío del formulario
loginForm.addEventListener("submit", function (e) {
  e.preventDefault(); // Prevenir el envío por defecto

  // Obtener los valores de los campos
  const username = document.getElementById("username").value.trim();
  const password = document.getElementById("password").value.trim();

  // Asegurar que los campos no estén vacíos
  if (username.length < 4 && password.length < 6) {
    alert(
      "El nombre de usuario debe tener al menos 4 caracteres y la contraseña debe tener al menos 6 caracteres"
    );
    return;
  }
  // Validar que los campos no estén vacíos

  if (username === "") {
    alert("Por favor, ingresa un nombre de usuario");
    return;
  }

  if (password === "") {
    alert("Por favor, ingresa una contraseña");
    return;
  }

  if (username.length < 4 && password.length < 6) {
    alert(
      "El nombre de usuario debe tener al menos 4 caracteres y la contraseña debe tener al menos 6 caracteres"
    );
    return;
  }
  // Validar longitud mínima del usuario
  if (username.length < 4) {
    alert("El nombre de usuario debe tener al menos 4 caracteres");
    return;
  }

  // Validar longitud mínima de la contraseña
  if (password.length < 6) {
    alert("La contraseña debe tener al menos 6 caracteres");
    return;
  }

  // Si todas las validaciones pasan, se podría proceder con el envío
  // Por ahora, solo mostraremos un mensaje de éxito
  alert("Inicio de sesión exitoso");
  loginForm.reset();
});

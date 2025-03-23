document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("loginForm");
  if (form) {
    let isValidated = false; // Flag para indicar que ya se validó
    form.addEventListener("submit", function (e) {
      if (isValidated) return; // Si ya se validó, se permite el envío

      e.preventDefault(); // Prevenir el envío por defecto

      // Obtener y limpiar los valores de los campos
      const username = document.getElementById("username").value.trim();
      const password = document.getElementById("password").value.trim();
      const email = document.getElementById("email").value.trim();

      // Validar campo Usuario vacios
      if (username === "") {
        alert("El campo 'Usuario' es obligatorio.");
        return;
      }
      if (username.length < 4) {
        alert("El nombre de usuario debe tener al menos 4 caracteres.");
        return;
      }

      // Validar campo Contraseña vacios
      if (password === "") {
        alert("El campo 'Contraseña' es obligatorio.");
        return;
      }
      if (password.length < 6) {
        alert("La contraseña debe tener al menos 6 caracteres.");
        return;
      }

      // Validar campo Correo electrónico
      if (email === "") {
        alert("El campo 'Correo electrónico' es obligatorio.");
        return;
      }
      // Validar campo Correo electrónico con expresion regular
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(email)) {
        alert("El correo electrónico no es válido.");
        return;
      }

      // Si todas las validaciones pasan, se marca el formulario como validado y se envía manualmente
      isValidated = true;
      form.submit();
    });
  }
});

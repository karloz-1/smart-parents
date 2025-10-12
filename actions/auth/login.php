<?php
// Backend que procesa el formulario de login

session_start();
// Conexion a la base de datos
include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/config/db_config.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $identificacion = $_POST["user"];
  $pass = $_POST['pass'];

  //Login
  $stmt = $conexion->prepare("SELECT id_usuario, rol, password FROM usuarios WHERE identificacion = ?");
  $stmt->bind_param("s", $identificacion);
  $stmt->execute();
  $resultado = $stmt->get_result();

  if ($resultado->num_rows === 1) {
    $usuario = $resultado->fetch_assoc();

    // Verifica la contraseña puesta con la cifrada en la base de datos
    if (password_verify($pass, $usuario['password'])) {
      // Login exitoso: guardar en sesión
      $_SESSION['id_usuario'] = $usuario['id_usuario'];
      $_SESSION['rol'] = $usuario['rol'];
      $stmt->close();
      $conexion->close();
      header("Location: /smart-parents/views/dashboard.php"); // Redirige al dashboard
      exit();
    }
  }

  // Si falla
  $stmt->close();
  $conexion->close();
  header("Location: /smart-parents/views/auth/login.php?error=1");
  die();
}

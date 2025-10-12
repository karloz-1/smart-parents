<?php
// Backend que procesa el formulario para registrar nuevos usuarios a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Conexión a la base de datos
  include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/config/db_config.php';

  // Recoger y limpiar los datos del formulario
  // (int) es para convertir el id de eventos en un numero entero
  // trim() es para eliminar espacios al inicio y al final de la cadena de texto
  $nombre1 = trim($_POST['nombre1']);
  $nombre2 = trim($_POST['nombre2']);
  $apellido1 = trim($_POST['apellido1']);
  $apellido2 = trim($_POST['apellido2']);
  $identificacion = trim($_POST['identificacion']);
  $telefono = trim($_POST['telefono']);
  $email = trim($_POST['email']);
  $rol = $_POST['rol'];
  $asignatura = $_POST['asignatura'] === "" ? NULL : $_POST['asignatura'];
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

  // Preparar la consulta
  $stmt = $conexion->prepare("INSERT INTO usuarios (rol, identificacion, nombre1, nombre2, apellido1, apellido2, email, telefono, password, asignatura) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssssssss", $rol, $identificacion, $nombre1, $nombre2, $apellido1, $apellido2, $email, $telefono, $password, $asignatura);

  // Gestion de resultados / errores.
  try {
    // Si la consulta se exitosamente
    if ($stmt->execute()) {
      $stmt->close();
      $conexion->close();
      header("Location: /smart-parents/views/crud/usuarios/registrar_usuarios.php?success=1");
      exit();
    } else {
      $stmt->close();
      $conexion->close();
      // Si la consulta falla
      header("Location: /smart-parents/views/crud/usuarios/registrar_usuarios.php?error=1");
      exit();
    }
  // Si todo falla es porque seguramente hay un usuario duplicado con la info que se le indicó
  } catch (mysqli_sql_exception $e) {
    $stmt->close();
    $conexion->close();
    header("Location: /smart-parents/views/crud/usuarios/registrar_usuarios.php?error=duplicado");
    exit();
  }

  // Cerrar la consulta y la conexion
  $stmt->close();
  $conexion->close();
} else {
  echo "Método no permitido.";
  die();
}

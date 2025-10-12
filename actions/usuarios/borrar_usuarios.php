<?php
// Backend para eliminar usuarios de la base de datos.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id_usuario'];
  // Conexión a la base de datos
  include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/config/db_config.php';

  // Consulta para eliminar toda la informacion de usuario deseado
  $stmt = $conexion->prepare("DELETE FROM usuarios WHERE id_usuario = ?");
  $stmt->bind_param("i", $id);

  // Si la consulta se ejecuta correctamente
  if ($stmt->execute()) {
    $stmt->close();
    $conexion->close();
    header("Location: /smart-parents/views/crud/usuarios/crud_usuarios.php?success=1");
    exit();
  } else {
    // Si la consulta falla
    $stmt->close();
    $conexion->close();
    header("Location: /smart-parents/views/crud/usuarios/crud_usuarios.php?error=1");
    exit();
  }
} else {
  echo "Metodo no permitido";
  die();
}


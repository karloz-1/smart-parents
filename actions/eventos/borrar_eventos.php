<?php
// Backed para eliminar eventos de la base de datos.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = (int) $_POST['id_evento'];

  // Conexión a la base de datos
  include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/config/db_config.php';

  // Consulta
  $stmt = $conexion->prepare("DELETE FROM eventos WHERE id_evento = ?");
  $stmt->bind_param("i", $id);

  // Si la consulta se ejcuta correctamente
  if ($stmt->execute()) {
    $stmt->close();
    $conexion->close();
    header("Location: /smart-parents/views/crud/eventos/crud_eventos.php?success=1");
    exit();
  } else {
    // Si la consulta falla
    $stmt->close();
    $conexion->close();
    header("Location: /smart-parents/views/crud/eventos/crud_eventos.php?error=1");
    exit();
  }
} else {
  echo "Metodo no permitido";
  die();
}


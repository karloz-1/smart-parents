<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Conexión a la base de datos
  include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/config/db_config.php';

  // Recoger y limpiar los datos del formulario
  $id_evento = (int) $_POST['id_evento'];
  $tipo_de_evento = trim($_POST['tipo_de_evento']);
  $usuario_del_evento = trim($_POST['usuario_del_evento']);
  $descripcion_del_evento = trim($_POST['descripcion_del_evento']);
  $registrado_por = trim($_POST['registrado_por']);

  // Preparar la consulta
  $stmt = $conexion->prepare("UPDATE eventos SET id_usuario = ?, tipo_evento = ?, descripcion = ?, registrado_por = ? WHERE id_evento = ?");
  $stmt->bind_param("issii", $usuario_del_evento, $tipo_de_evento, $descripcion_del_evento, $registrado_por, $id_evento);

  if ($stmt->execute()) {
    $stmt->close();
    $conexion->close();
    header("Location: /smart-parents/views/crud/eventos/crud_eventos.php?success=1");
    exit();
  } else {
    $stmt->close();
    $conexion->close();
    header("Location: /smart-parents/views/crud/eventos/crud_eventos.php?error=1");
    exit();
  }
  $stmt->close();
  $conexion->close();
} else {
  echo "Método no permitido.";
}


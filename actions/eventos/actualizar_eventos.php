<?php
// Backed que procesar el formulario para actualizar los eventos a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Conexión a la base de datos
  include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/config/db_config.php';

  // Recoger y limpiar los datos del formulario
  // (int) es para convertir el id de eventos en un numero entero
  // trim() es para eliminar espacios al inicio y al final de la cadena de texto
  $id_evento = (int) $_POST['id_evento'];
  $tipo_de_evento = trim($_POST['tipo_de_evento']);
  $usuario_del_evento = trim($_POST['usuario_del_evento']);
  $descripcion_del_evento = trim($_POST['descripcion_del_evento']);
  $registrado_por = trim($_POST['registrado_por']);

  // Preparar la consulta
  $stmt = $conexion->prepare("UPDATE eventos SET id_usuario = ?, tipo_evento = ?, descripcion = ?, registrado_por = ? WHERE id_evento = ?");
  $stmt->bind_param("issii", $usuario_del_evento, $tipo_de_evento, $descripcion_del_evento, $registrado_por, $id_evento);

  // Si se ejecuta la consulta correctamente
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
  $stmt->close();
  $conexion->close();
} else {
  echo "Método no permitido.";
  die();
}

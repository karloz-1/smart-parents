<?php

// Conexion a la base de datos
include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/config/db_config.php';

if (!isset($_GET['id'])) {
  echo "id no especificado";
  exit();
}

// Si se encontró id se guarda en una variable
$id = $_GET['id'];

$stmt = $conexion->prepare("SELECT e.id_evento, u1.id_usuario AS id_u1, u1.nombre1 AS nombre1_u1, u1.nombre2 AS nombre2_u1, u1.apellido1 AS apellido1_u1, u1.apellido2 AS apellido2_u1, e.tipo_evento, e.descripcion, u2.id_usuario AS registrado_por, u2.nombre1 AS nombre1_u2, u2.nombre2 AS nombre2_u2, u2.apellido1 AS apellido1_u2, u2.apellido2 AS apellido2_u2, e.created_at, e.updated_at FROM eventos AS e INNER JOIN usuarios AS u1 ON e.id_usuario = u1.id_usuario INNER JOIN usuarios AS u2 ON e.registrado_por = u2.id_usuario WHERE e.id_evento = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows == 0) {
  echo "evento no encontrado";
  exit();
}

$evento = $resultado->fetch_assoc();


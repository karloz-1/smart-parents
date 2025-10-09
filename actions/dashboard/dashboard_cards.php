<?php

// Conexion a la base de datos
include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/config/db_config.php';

// Consulta para mostrar la info relacionada a los eventos
$stmt = $conexion->prepare("SELECT e.tipo_evento, e.descripcion, u2.id_usuario AS registrado_por, u2.nombre1 AS nombre1_u2, u2.nombre2 AS nombre2_u2, u2.apellido1 AS apellido1_u2, u2.apellido2 AS apellido2_u2, u2.asignatura AS asignatura, e.created_at FROM eventos AS e INNER JOIN usuarios AS u1 ON e.id_usuario = u1.id_usuario INNER JOIN usuarios AS u2 ON e.registrado_por = u2.id_usuario WHERE u1.id_usuario = ? ORDER BY id_evento DESC");
$stmt->bind_param('i', $id_usuario);
$stmt->execute();
$resultado = $stmt->get_result();

// Cerrar la consulta y la conexión
$stmt->close();
$conexion->close();

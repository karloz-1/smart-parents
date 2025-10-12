<?php
// Backend para mostrar toda la informacion de los usuarios en el tabla del crud de los usuarios

// Conexion a la base de datos
include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/config/db_config.php';

// Consulta SQL para mostrar todos los usuarios
$stmt = $conexion->prepare("SELECT * FROM usuarios ORDER BY id_usuario DESC");
$stmt->execute();
$resultado = $stmt->get_result();

// Cerrar consulta y conexio a la base de datos
$stmt->close();
$conexion->close();
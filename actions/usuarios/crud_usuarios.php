<?php
    // Conexion a la base de datos
    include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/config/db_config.php';

    // Consulta SQL para mostrar todos los usuarios
    $stmt = $conexion->prepare("SELECT * FROM usuarios ORDER BY id_usuario");
    $stmt->execute();
    $resultado = $stmt->get_result();
?>
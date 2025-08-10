<?php 
    session_start();
    // Verifica que el usuario sea administrador
    if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'administrador') {
        echo "Acceso denegado.";
        exit();
    }

    // Conexion a la base de datos
    include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/config/db_config.php';

    // Consulta
    $sql = "SELECT * FROM usuarios ORDER BY id_usuario DESC";
    $resultado = $conexion->query($sql);
?>
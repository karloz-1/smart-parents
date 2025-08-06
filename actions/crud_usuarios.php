<?php 
    session_start();
    // Verifica que el usuario sea administrador
    if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'administrador') {
        echo "Acceso denegado.";
        exit();
    }

    // Conexion a la base de datos
    include '../config/db_config.php';

    // Consulta
    $sql = "SELECT * FROM usuarios";
    $resultado = $conexion->query($sql);
?>
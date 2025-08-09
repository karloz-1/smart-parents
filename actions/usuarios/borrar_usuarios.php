<?php
    session_start();

    // Verifica que el usuario sea administrador
    if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'administrador') {
        echo "Acceso denegado.";
        exit();
    }

    // Conexión a la base de datos
    include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/config/db_config.php';
    
?>
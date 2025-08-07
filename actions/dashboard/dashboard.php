<?php

    // Incluye la conexion a la db
    session_start();
    include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/config/db_config.php';

    // Consulta
    $sql = "SELECT nombre1, nombre2, apellido1, apellido2 FROM usuarios WHERE id_usuario = $id_usuario";
    $resultado = $conexion->query($sql);

    // Resultado
    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();
        // Crear las variables para hacer el nombre completo
        $nombre1 = $usuario["nombre1"];
        $nombre2 = $usuario["nombre2"];
        $apellido1 = $usuario["apellido1"];
        $apellido2 = $usuario["apellido2"];
        $nombreCompleto = $nombre1 . " " . $nombre2 . " " . $apellido1 . " " . $apellido2;
        echo $nombreCompleto;
    } else {
        echo "No se encontraron datos.";
    }

    // 4. Cerrar conexión
    $conexion->close();

?>
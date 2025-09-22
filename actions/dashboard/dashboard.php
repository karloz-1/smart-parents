<?php

    // Incluye la conexion a la db
    include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/config/db_config.php';
    
    // Consulta
    $stmt = $conexion->prepare("SELECT nombre1, nombre2, apellido1, apellido2 FROM usuarios WHERE id_usuario = ?");
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();

    // Resultado
    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();
        // Crear las variables para hacer el nombre completo
        $nombre1 = $usuario["nombre1"];
        $nombre2 = $usuario["nombre2"];
        $apellido1 = $usuario["apellido1"];
        $apellido2 = $usuario["apellido2"];
        $nombreCompleto = $nombre1 . " " . $nombre2 . " " . $apellido1 . " " . $apellido2;
    } else {
        echo "No se encontraron datos.";
    }

    // 4. Cerrar conexión
    $stmt->close();
    $conexion->close();

?>
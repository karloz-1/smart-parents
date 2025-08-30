<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $id = $_POST['id_usuario'];
        // Conexión a la base de datos
        include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/config/db_config.php';

        $stmt = $conexion->prepare("DELETE FROM usuarios WHERE id_usuario = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $stmt->close();
            $conexion->close();
            header("Location: /smart-parents/views/crud/usuarios/crud_usuarios.php?success=1");
            exit();
        } else {
            $stmt->close();
            $conexion->close();
            header("Location: /smart-parents/views/crud/usuarios/crud_usuarios.php?error=1");
            exit();
        }
    } else {
        echo "Metodo no permitido";
    }
?>
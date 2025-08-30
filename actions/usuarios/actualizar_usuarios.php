<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Conexión a la base de datos
        include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/config/db_config.php';

        // Recoger y limpiar los datos del formulario
        $id_usuario = (INT) $_POST['id_usuario'];
        $nombre1 = trim($_POST['nombre1']);
        $nombre2 = trim($_POST['nombre2']);
        $apellido1 = trim($_POST['apellido1']);
        $apellido2 = trim($_POST['apellido2']);
        $identificacion = trim($_POST['identificacion']);
        $telefono = trim($_POST['telefono']);
        $email = trim($_POST['email']);
        $rol = $_POST['rol'];
        $asignatura = $_POST['asignatura'] === "" ? NULL : $_POST['asignatura'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        // Preparar la consulta
        $stmt = $conexion->prepare("UPDATE usuarios SET rol = ?, identificacion = ?, nombre1 = ?, nombre2 = ?, apellido1 = ?, apellido2 = ?, email = ?, telefono = ?, password = ?, asignatura = ? WHERE id_usuario = ?");
        $stmt->bind_param("ssssssssssi", $rol, $identificacion, $nombre1, $nombre2, $apellido1, $apellido2, $email, $telefono, $password, $asignatura, $id_usuario);

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
        $stmt->close();
        $conexion->close();
    } else {
        echo "Método no permitido.";
    }
?>
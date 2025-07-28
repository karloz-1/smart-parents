<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../config/db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger y limpiar datos del formulario
    $identificacion = trim($_POST['identificacion']);
    $nombre1        = trim($_POST['nombre1']);
    $nombre2        = trim($_POST['nombre2']);
    $apellido1      = trim($_POST['apellido1']);
    $apellido2      = trim($_POST['apellido2']);
    $email          = trim($_POST['email']);
    $telefono       = trim($_POST['telefono']);
    $password       = password_hash($_POST['password'], PASSWORD_DEFAULT); // Cifrado seguro
    $rol            = trim($_POST['rol']);
    $asignatura     = trim($_POST['asignatura']);

    // Si asignatura está vacía, ponerla como NULL (porque es ENUM NULL)
    $asignatura = ($asignatura === "") ? null : $asignatura;

    // Consulta SQL con placeholders
    $sql = "INSERT INTO usuarios 
        (identificacion, nombre1, nombre2, apellido1, apellido2, email, telefono, password, rol, asignatura)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Preparar la consulta
    $stmt = $conexion->prepare($sql);

    if ($stmt) {
        // Enlazar los parámetros
        $stmt->bind_param(
            "ssssssssss",
            $identificacion,
            $nombre1,
            $nombre2,
            $apellido1,
            $apellido2,
            $email,
            $telefono,
            $password,
            $rol,
            $asignatura
        );

        // Ejecutar y verificar
        if ($stmt->execute()) {
            echo "✅ Usuario registrado correctamente.";
            // También podrías redirigir:
            // header("Location: ../views/usuarios.php?mensaje=registrado");
            // exit();
        } else {
            echo "❌ Error al registrar: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "❌ Error al preparar la consulta: " . $conexion->error;
    }

    $conexion->close();
} else {
    echo "❌ Acceso no válido.";
}
?>

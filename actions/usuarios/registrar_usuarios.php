<?php
session_start();

// Verifica que el usuario sea administrador
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'administrador') {
    echo "Acceso denegado.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/config/db_config.php';

    // Recoger y limpiar los datos del formulario
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
    $stmt = $conexion->prepare("INSERT INTO usuarios (rol, identificacion, nombre1, nombre2, apellido1, apellido2, email, telefono, password, asignatura) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $rol, $identificacion, $nombre1, $nombre2, $apellido1, $apellido2, $email, $telefono, $password, $asignatura);

    try {
        if ($stmt->execute()) {
            header("Location: /smart-parents/views/crud/usuarios/registrar_usuarios.php?success=1");
            exit();
        } else {
            header("Location: /smart-parents/views/crud/usuarios/registrar_usuarios.php?error=1");
            exit();
        }
    } catch (mysqli_sql_exception $e) {
        header("Location: /smart-parents/views/crud/usuarios/registrar_usuarios.php?error=duplicado");
        exit();
    }

    $stmt->close();
    $conexion->close();
} else {
    echo "Método no permitido.";
}


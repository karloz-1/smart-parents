<?php
session_start();
include '../config/db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identificacion = trim($_POST['identificacion']);
    $passwordIngresada = $_POST['password'];

    // Buscar usuario en la base de datos
    $sql = "SELECT * FROM usuarios WHERE identificacion = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $identificacion);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();

        // Verificar contraseña encriptada
        if (password_verify($passwordIngresada, $usuario['password'])) {
            // ✅ Contraseña correcta: guardar datos en la sesión
            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['rol'] = $usuario['rol'];
            header("Location: ../views/dashboard.php");
            exit();
        } else {
            echo "❌ Contraseña incorrecta.";
        }
    } else {
        echo "❌ Usuario no encontrado.";
    }

    $stmt->close();
    $conexion->close();
}
?>

<?php

    session_start();
    include("../config/db_config.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $identificacion = $_POST["user"];
    $pass = $_POST['pass'];

    //Login

    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE identificacion = ?");
        $stmt->bind_param("s", $identificacion);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 1) {
            $usuario = $resultado->fetch_assoc();

            if (password_verify($pass, $usuario['password'])) {
                // Login exitoso: guardar en sesión
                $_SESSION['id_usuario'] = $usuario['id_usuario'];
                $_SESSION['rol'] = $usuario['rol'];

                header("Location: ../views/dashboard.php"); // Redirige al dashboard
                exit();
            }
        }

        // Si falla
        header("Location: ../views/login.php?error=1");
        exit();
}
?>
<?php

    session_start();
    include("../config/db_config.php");

    $identificacion = $_POST["user"];
    $pass = $_POST["pass"];

    //Login

    if(isset($_POST["submit_btn"])) {
        $query = mysqli_query($conexion,"SELECT * from usuarios where identificacion ='$identificacion' AND password ='$pass'"); 
        $nr = mysqli_num_rows($query); 
        // registros por filas
        // si logra encontrar alguna coincidencia entonces se tiene una fila de datos y permite que
        // el usuario avance , en caso contrario lo devuelva al login

        if ( $nr == 1 ) {
            // Login exitoso
            $fila = mysqli_fetch_assoc($query);
            $_SESSION['id_usuario'] = $fila['id_usuario'];
            $_SESSION['rol'] = $fila["rol"];
            header("Location: ../views/dashboard.php"); // Rediriges al dashboard
            exit();
        } else {
            echo "Usuario o contraseña incorrecta";
        }
    }
?>
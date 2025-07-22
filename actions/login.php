<?php

    include("../config/db_config.php");

    $identificacion = $_POST["user"];
    $pass = $_POST["pass"];

    //Login

    if(isset($_POST["submit_btn"])) {
        $query = mysqli_query($conn,"SELECT * from usuarios where identificacion ='$identificacion' AND 
        password ='$pass'"); 
        $nr = mysqli_num_rows($query); 
        // registros por filas
        // si logra encontrar alguna coincidencia entonces se tiene una fila de datos y permite que
        // el usuario avance , en caso contrario lo devuelva al login

        if ( $nr == 1 ) {
            header('https://streamable.com/lf027o');
            echo "<script> alert('¡Conexión exitosa!. Bienvenido $identificacion'); window.location ='https://music.youtube.com/watch?v=346Blp43ehQ&si=uUG6PqiNeu8RD8f8'</script>";
        }
    }
?>
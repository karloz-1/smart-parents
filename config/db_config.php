<?php

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "smart_parents";

    $conexion = new mysqli($dbhost,$dbuser,$dbpass,$dbname,3306);

    if ($conexion->connect_error){
        die("Fallo en la conexion".$conexion->connect_error);
    }
    echo "¡Conexion exitosa!<br>
    database host: $dbhost<br>
    database: $dbname<br><br>";

?>
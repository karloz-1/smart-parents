<?php

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "smart_parents";

    $conn =new mysqli($dbhost,$dbuser,$dbpass,$dbname,3306);

    if ($conn->connect_error){
        die("Fallo en la conexion".$conn->connect_error);
    }
    echo "¡Conexion exitosa! <br>";

?>
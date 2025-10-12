<?php
// Conexion a la base de datos

// Datos de conexion
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "smart_parents";

// Conexion
$conexion = new mysqli($dbhost, $dbuser, $dbpass, $dbname, 3306);
$conexion->set_charset("utf8"); // hace que la conexion se haga en formato utf8 para que puedan aparecer ñ u tildes.

if ($conexion->connect_error) {
  die("Fallo en la conexion" . $conexion->connect_error);
}


<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "smart_parents";

$conexion = new mysqli($dbhost, $dbuser, $dbpass, $dbname, 3306);
$conexion->set_charset("utf8");

if ($conexion->connect_error) {
  die("Fallo en la conexion" . $conexion->connect_error);
}


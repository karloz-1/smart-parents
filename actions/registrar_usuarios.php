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
    $password       = trim($_POST['password']);
    $rol            = trim($_POST['rol']);
    $asignatura     = trim($_POST['asignatura']);

    // Si asignatura está vacía, ponerla como NULL (porque es ENUM NULL)
    $asignatura = !empty($_POST['asignatura']) ? $_POST['asignatura'] : NULL;

    $sql = "INSERT INTO usuarios (rol, identificacion, nombre1, nombre2, apellido1, apellido2, email, telefono, password, asignatura) VALUES ('$rol', '$identificacion', '$nombre1', '$nombre2', '$apellido1', '$apellido2', '$email', '$telefono', '$password', "($asignatura === NULL) ? NULL : '$asignatura' .")";
    if (mysqli_query($conexion, $sql)) {
        echo "<script> alert('usuario registrado con exito :$nombre');</script>";
    } else {
        echo "Error : " . $sql . "<br>" . mysqli_error($conexion);
    }
}
    
?>

<?php
// Backend que hace una consulta a la base de datos para que a la hora de darle a editar un usuario ya aparezca la informacion del mismo ya puesta en los campos correspondientes

// Conexion a la base de datos
include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/config/db_config.php';

// Si no se especifica el id del usuario a modificar
if (!isset($_GET['id'])) {
  echo "id no especificado";
  exit();
}

// Si se encontró id se guarda en una variable
$id = $_GET['id'];

// Consulta
$stmt = $conexion->prepare("SELECT * FROM usuarios WHERE id_usuario = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();

// Si no se encuentran resultados
if ($resultado->num_rows == 0) {
  echo "usuario no encontrado";
  $stmt->close();
  $conexion->close();
  exit();
}

// Guardar resultado y cerrar la consulta y la base de datos
$usuario = $resultado->fetch_assoc();
$stmt->close();
$conexion->close();
<?php
// ====================================================
// Verificar si el usuario existe y tiene permisos de administrador
// Redirige a las páginas de error si no cumple los requisitos
//-----------------------------------------------------
session_start();
if (!isset($_SESSION['id_usuario'])) {
  header("Location: /smart-parents/views/errors/401.php"); // 401 - Acceso denegado
  exit();
} elseif ($_SESSION['rol'] != 'administrador') {
  header("Location: /smart-parents/views/errors/403.php"); // 403 - Prohibido
  exit();
}
$id_usuario = $_SESSION['id_usuario'];
$rol = $_SESSION['rol'];
// ====================================================
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Configuración de la página -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/smart-parents/assets/img/cerebrosmart-parents.png">
  <title>Smart Parents - CRUD de usuarios</title>
  <!-- Estilos CSS -->
  <link rel="stylesheet" href="/smart-parents/assets/css/style.css">
  <!-- Enlace a la tipografía -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/includes/dashboard_header.php'; ?>

  <main>
    <h1>CRUD de usuarios</h1>
    <?php

    if (isset($_GET['success'])) {
      echo '<div class="mensaje exito">Usuario actualizado o eliminado correctamente.</div>';
    } elseif (isset($_GET['error']) === 1) {
      echo '<div class="mensaje error">Hubo un error al actualizar o al eliminar el usuario.</div>';
    }

    ?>
    <table class="tabla">
      <thead>
        <tr>
          <th></th>
          <th>Id</th>
          <th>Rol</th>
          <th>Identificación</th>
          <th>Primer nombre</th>
          <th>Segundo nombre</th>
          <th>Primer apellido</th>
          <th>Segundo apellido</th>
          <th>Correo electrónico</th>
          <th>Teléfono</th>
          <th>Contraseña</th>
          <th>Asignatura</th>
          <th>Creado</th>
        </tr>
      </thead>
      <tbody>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/actions/usuarios/crud_usuarios.php'; ?>
        <?php while ($row = $resultado->fetch_assoc()) { ?>
          <tr>
            <td>
              <a href="/smart-parents/views/crud/usuarios/editar_usuarios.php?id=<?= $row['id_usuario'] ?>">Editar</a>
              <a href="/smart-parents/views/crud/usuarios/borrar_usuarios.php?id=<?= $row['id_usuario'] ?>">Eliminar</a>
            </td>
            <td>
              <?= $row['id_usuario']; ?>
            </td>
            <td>
              <?= $row['rol']; ?>
            </td>
            <td>
              <?= $row['identificacion']; ?>
            </td>
            <td>
              <?= $row['nombre1']; ?>
            </td>
            <td>
              <?= $row['nombre2']; ?>
            </td>
            <td>
              <?= $row['apellido1']; ?>
            </td>
            <td>
              <?= $row['apellido2']; ?>
            </td>
            <td>
              <?= $row['email']; ?>
            </td>
            <td>
              <?= $row['telefono']; ?>
            </td>
            <td>
              <?= $row['password']; ?>
            </td>
            <td>
              <?= $row['asignatura']; ?>
            </td>
            <td>
              <?= $row['created_at']; ?>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </main>
</body>

</html>

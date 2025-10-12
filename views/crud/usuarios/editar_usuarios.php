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
  <title>Smart Parents - Editar usuario</title>
  <!-- Estilos CSS -->
  <link rel="stylesheet" href="/smart-parents/assets/css/style.css">
  <link rel="stylesheet" href="/smart-parents/assets/css/registrar_usuarios.css">
  <!-- Enlace a la tipografía -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/includes/dashboard_header.php'; ?>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/actions/usuarios/editar_usuarios.php'; ?>
  <main>
    <div class="form_title">
      <h1>Editar un usuario</h1>
    </div>
    <div class="form">
      <form action="/smart-parents/actions/usuarios/actualizar_usuarios.php" method="POST" class="form_content">
        <div class="form_id">
          <label for="id_usuario">Id de usuario</label>
          <input type="number" value="<?= $id ?>" disabled>
          <input type="hidden" name="id_usuario" value="<?= $id ?>">
        </div>
        <div class="form_nombre1">
          <label for="nombre1">Primer nombre</label>
          <input type="text" name="nombre1" value="<?= $usuario['nombre1']; ?>" required>
        </div>
        <div class="form_nombre2">
          <label for="nombre2">Segundo nombre</label>
          <input type="text" name="nombre2" value="<?= $usuario['nombre2']; ?>">
        </div>
        <div class="form_apellido1">
          <label for="apellido1">Primer apellido</label>
          <input type="text" name="apellido1" value="<?= $usuario['apellido1']; ?>" required>
        </div>
        <div class="form_apellido2">
          <label for="apellido2">Segundo apellido</label>
          <input type="text" name="apellido2" value="<?= $usuario['apellido2']; ?>">
        </div>
        <div class="form_identificacion">
          <label for="identificacion">Número de identificación</label>
          <input type="text" name="identificacion" value="<?= $usuario['identificacion']; ?>" required>
        </div>
        <div class="form_telefono">
          <label for="telefono">Teléfono</label>
          <input type="text" name="telefono" value="<?= $usuario['telefono']; ?>" required>
        </div>
        <div class="form_email">
          <label for="email">Correo electrónico</label>
          <input type="email" name="email" value="<?= $usuario['email']; ?>">
        </div>
        <div class="form_rol">
          <label for="rol">Rol</label>
          <select name="rol" required>
            <option value="">Seleciona un rol</option>
            <option value="estudiante">Estudiante</option>
            <option value="profesor">Profesor</option>
            <option value="administrador">Administrador</option>
          </select>
        </div>
        <div class="form_asignatura">
          <label for="asignatura">Asignatura (solo si es profesor)</label>
          <select name="asignatura">
            <option value="">Ninguna</option>
            <option value="Administración">Administración</option>
            <option value="Matematicas">Matematicas</option>
            <option value="Español">Español</option>
            <option value="Quimica">Quimica</option>
            <option value="C.Sociales">C.Sociales</option>
          </select>
        </div>
        <div class="form_password">
          <label for="password">Contraseña</label>
          <input type="password" name="password" required>
        </div>
        <div class="form_submit">
          <button type="submit" name="submit_btn">Confirmar</button>
        </div>
      </form>
    </div>
  </main>
</body>

</html>

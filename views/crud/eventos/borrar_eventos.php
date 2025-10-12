<?php
// ====================================================
// Verificar si el usuario existe y tiene permisos de administrador
// Si no cumple con los requisitos, redirige a las páginas de error correspondientes
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
  <title>Smart Parents - Eliminar evento</title>
  <!-- Estilos CSS -->
  <link rel="stylesheet" href="/smart-parents/assets/css/style.css">
  <link rel="stylesheet" href="/smart-parents/assets/css/borrar_usuarios.css">
  <!-- Enlace a la tipografía -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/includes/dashboard_header.php'; ?>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/actions/eventos/editar_eventos.php'; ?>
  <main>
    <div class="card_borrar_usuario">
      <div class="card_title">
        <h2>¿Está seguro de eliminar este evento?</h2>
      </div>
      <div class="card_content">
        <form action="/smart-parents/actions/eventos/borrar_eventos.php" method="POST">
          <div class="card_item">
            <input type="hidden" name="id_evento" value="<?= $id ?>">
          </div>
          <div class="card_item">
            <label for="tipo_de_evento">Tipo de evento</label>
            <p class="black">
              <?= $evento['tipo_evento']; ?>
            </p>
          </div>
          <hr>
          <div class="card_item">
            <label for="usuario_del_evento">Usuario del evento</label>
            <p class="black">
              <?= $evento['nombre1_u1'] . " " . $evento['nombre2_u1'] . " " . $evento['apellido1_u1'] . " " . $evento['apellido2_u1']; ?>
            </p>
          </div>
          <hr>
          <div class="card_item">
            <label for="descripcion_del_evento">Descripción del evento</label>
            <p class="black">
              <?= $evento['descripcion']; ?>
            </p>
          </div>
          <hr>
          <div class="card_item">
            <label for="registrado_por">Registrado por</label>
            <p class="black">
              <?= $evento['nombre1_u2'] . " " . $evento['nombre2_u2'] . " " . $evento['apellido1_u2'] . " " . $evento['apellido2_u2']; ?>
            </p>
          </div>
          <hr>

          <div class="card_button">
            <button type="submit" name="submit_btn">Eliminar</button>
          </div>
        </form>
        <a href="/smart-parents/views/crud/eventos/crud_eventos.php" class="card_button">Regresar</a>
      </div>
    </div>
  </main>
</body>

</html>

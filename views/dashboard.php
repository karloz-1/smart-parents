<?php
// ====================================================
// Verificar si el usuario existe
// Para dejarlo ver la pagina o de lo contrario para que le salga un error
//-----------------------------------------------------
session_start();
if (!isset($_SESSION['id_usuario'])) {
  header("Location: /smart-parents/views/errors/401.php"); // 401 - Acceso denegado
  exit();
}
$id_usuario = $_SESSION['id_usuario'];
$rol = $_SESSION['rol'];
// ====================================================
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Configuración de la pagina -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/smart-parents/assets/img/cerebrosmart-parents.png">
  <title>Smart Parents - Dashboard</title>
  <!-- Estilos css -->
  <link rel="stylesheet" href="/smart-parents/assets/css/style.css">
  <link rel="stylesheet" href="/smart-parents/assets/css/dashboard.css">
  <!-- Enlaza la tipografia -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
  <!-- Se incluye el header y la consulta para mostrar el nombre completo del usuario -->
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/includes/dashboard_header.php'; ?>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/actions/dashboard/dashboard.php'; ?>

  <main>
    <div class="main_title">
      <h1>Bienvenido/a <?= $nombreCompleto; ?></h1>
    </div>
    <h2>Eventos recientes</h2>
    <div class="cards">
      <!-- Se incluye la consulta que trae toda la información de los eventos, para mostrarlos en las tarjetas -->
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/actions/dashboard/dashboard_cards.php'; ?>

      <!-- Ciclo que muestra una tarjeta por cada fila de datos recorrida -->
      <?php while ($row = $resultado->fetch_assoc()) { ?>
        <div class="card">
          <div class="card_title">
            <h2>
              <?php
              // Por temas esteticos se compara el texto que se trae de la base de datos para mostrar lo mismo pero bien escrito
              if ($row['tipo_evento'] === 'llegada_tarde') {
                echo 'Llegada tarde';
              } elseif ($row['tipo_evento'] === 'anotacion') {
                echo 'Anotación';
              } elseif ($row['tipo_evento'] === 'inasistencia') {
                echo 'Inasistencia';
              } elseif ($row['tipo_evento'] === 'comentario') {
                echo 'Comentario';
              }
              ?>
            </h2>
          </div>
          <div class="card_text">
            <p><?= $row['descripcion'] ?></p>
          </div>
          <hr>
          <div class="card_footer">
            <div class="registrado_por">
              <h3>Registrado por</h3>
              <p><?= $row['nombre1_u2'] . " " . $row['nombre2_u2'] . " " . $row['apellido1_u2'] . " " . $row['apellido2_u2']; ?></p>
            </div>
            <div class="area">
              <h3>Asignatura</h3>
              <p><?= $row['asignatura']; ?></p>
            </div>
            <div class="fecha">
              <h3>Fecha y hora de registro</h3>
              <p><?= $row['created_at']; ?></p>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </main>
</body>

</html>
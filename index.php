<?php
// ====================================================
// Verificar si el usuario ya tiene la sesion iniciada
// Para redirigirlo al dashboard
//-----------------------------------------------------
session_start();
if (isset($_SESSION['id_usuario'])) {
  header("Location: /smart-parents/views/dashboard.php");
  exit();
}
// ====================================================
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Configuración de la pagina -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/smart-parents/assets/img/cerebrosmart-parents.png">
  <title>Smart Parents</title>
  <!-- Estilos css -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/index.css">
  <!-- Enlaza la tipografia -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/includes/landing_header.php'; ?>

  <main class="main">
    <!-- Tarjeta para mostrar la info del proyecto e iniciar sesión -->
    <div class="main_card">
      <div class="card_content">
        <h1 class="card_title">SMART PARENTS</h1>
        <p class="card_text">
          SMART PARENTS es una plataforma web institucional desarrollada en HTML, CSS, PHP y MySQL que mantiene informados a padres y estudiantes sobre el rendimiento académico y comportamiento escolar. Busca fortalecer la comunicación con el colegio y facilitar el acceso a información clara, rápida y segura.
        </p>
        <div class="card_button">
          <a href="views/auth/login.php" class="btn_primary">Iniciar Sesión</a>
        </div>
      </div>
    </div>
    <img class="id_card" src="/smart-parents/assets/img/cerebrosmart-parents.png" alt="ilustracion de tarjeta"
      width="300px" height="300px">
  </main>
</body>

</html>
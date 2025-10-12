<?php
// ====================================================
// Verificar si el usuario ya tiene la sesion iniciada
// Para redirigirlo al dashboard
//-----------------------------------------------------
include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/actions/auth/login.php'; // En este caso no se pone "session_start" porque ya esta en este archivo que es el que maneja el backend
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
  <link rel="stylesheet" href="/smart-parents/assets/css/style.css">
  <link rel="stylesheet" href="/smart-parents/assets/css/login.css">
  <!-- Enlaza la tipografia -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
  <div class="login_card">
    <div class="card_content">
      <h1 class="card_title">INICIAR SESIÓN</h1>
      <div class="card_form">
        <!-- Formulario de login -->
        <form action="/smart-parents/actions/auth/login.php" method="POST" class="form">
          <div class="form__user">
            <label for="user">Número de documento</label>
            <input type="text" name="user" required>
          </div>
          <div class="form__password">
            <label for="password">Contraseña</label>
            <input type="password" name="pass" required>
          </div>
          <div class="form__submit">
            <button type="submit" name="submit_btn">Ingresar</button>
          </div>
          <a href="/smart-parents/index.php">Regresar</a>
        </form>
        <?php
        // Por si el login llega a fallar mostrar una advertencia
        if (isset($_GET['error'])) {
          echo '<div class="mensaje error">Usuario o contraseña incorrectos</div>';
        }
        ?>
      </div>
    </div>
  </div>
</body>

</html>
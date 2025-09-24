<?php
    session_start();
    if (isset($_SESSION['id_usuario'])) {
        header("Location: views/dashboard.php"); // Redirige si ya está logueado
        exit();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Parents</title>
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Vincula el css principal -->
    <link rel="stylesheet" href="assets/css/index.css"> <!-- Vinvula el css dedicado -->
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!-- Conecta la fuente -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    <!-- Conecta la fuente -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> <!-- Conecta la fuente -->
</head>
<body>
    <?php include 'includes/landing_header.php';?>   <!-- Incluye archivo php con el header de la pagina -->
    <main class="main">
        <div class="main_card"> <!-- Contenedor de la tarjeta principal -->
            <div class="card_content">  <!-- Contenido de la tarjeta -->
                <h1 class="card_title">SMART PARENTS</h1>   <!-- Titulo de la tarjeta -->
                <p class="card_text">   <!-- Texto de la tarjeta / descripcion del proyecto -->
                    SMART PARENTS es una plataforma web institucional desarrollada en HTML, CSS, PHP y MySQL, cuyo objetivo principal es mantener informados a los padres de familia sobre la situación académica y comportamental de sus hijos. Esta plataforma permitirá a los usuarios acceder a información de manera clara, rápida y segura.
                </p>
                <div class="card_button">   <!-- Contenedor del botón -->
                    <a href="views/auth/login.php" class="btn_primary">Iniciar Sesión</a>    <!-- Botón que lleva a la pagina de iniciar sesión -->
                </div>
            </div>
        </div>
        <img class="id_card" src="assets/img/id_card.svg" alt="ilustracion de tarjeta"> <!-- Imagen de ilustrativa -->
    </main>
</body>
</html>
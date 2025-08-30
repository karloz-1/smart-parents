<?php
    session_start();
    if (isset($_SESSION['id_usuario'])) {
        header("Location: /smart-parents/views/dashboard.php"); // Redirige si ya está logueado
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>401 - Unauthorized</title>
    <link rel="stylesheet" href="/smart-parents/assets/css/style.css"> <!-- Vincula el css principal -->
    <link rel="stylesheet" href="/smart-parents/assets/css/4xx.css"> <!-- Vincula el css dedicado -->
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!-- Conecta la fuente -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    <!-- Conecta la fuente -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> <!-- Conecta la fuente -->
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/includes/landing_header.php';?>   <!-- Incluye archivo php con el header de la pagina -->
    <main>
        <div class="title">
            <h1>Acceso restringido</h1>
        </div>
        <p class="msj">Lo sentimos, necesitas iniciar sesión para acceder a esta página. <br><br> Este error <span class="bold">401 Unauthorized</span> significa que no tienes credenciales de usuario válidas para ver el contenido al que intentas acceder. Por favor, inicia sesión con tu cuenta para continuar.</p>
        <div class="ahora">
            <h2>¿Qué puedes hacer ahora?</h2>
            <div class="list">
                <ul class="ahora-list">
                    <li>
                        <h3>Inicia sesión:</h3>
                        <a href="/smart-parents/views/auth/login.php" class="a-reverse">Haz clic aquí para iniciar sesión</a>
                    </li>
                    <li><h3>Si no tienes una cuenta:</h3>
                        <p>Acércate a la admistración de la institución para que te ayuden a crear una.</p>
                    </li>
                    <li>
                        <h3>Si el problema persiste:</h3>
                        <p>Por favor <a href="mailto:carlostecno14@gmail.com" class="a-reverse">contáctanos</a></p>
                    </li>
                </ul>
            </div>
        </div>
    </main>
</body>
</html>
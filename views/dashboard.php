<?php
    session_start();
    // Verifica que el usuario exista
    if (!isset($_SESSION['id_usuario'])) {
        header("Location: /smart-parents/views/errors/401.php");
        exit();
    }
    $id_usuario = $_SESSION['id_usuario'];
    $rol = $_SESSION['rol'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/smart-parents/assets/css/style.css"> <!-- Vincula el css principal -->
    <link rel="stylesheet" href="/smart-parents/assets/css/dashboard.css"> <!-- Vincula el css dedicado -->
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!-- Conecta la fuente -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    <!-- Conecta la fuente -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> <!-- Conecta la fuente -->
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/includes/dashboard_header.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/actions/dashboard/dashboard.php'; ?>
    <main>
        <div class="main_title">
            <h1>Bienvenido/a <?= $nombreCompleto; ?></h1>
        </div>
        <div class="cards">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/actions/dashboard/dashboard_cards.php'; ?>
            <?php while ($row = $resultado->fetch_assoc()) { ?>
                <div class="card">
                    <div class="card_title">
                        <h2>
                            <?php
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
                            <p><?= $row['nombre1_u2'] . " ". $row['nombre2_u2'] . " ". $row['apellido1_u2'] . " ". $row['apellido2_u2']; ?></p>
                        </div>
                        <div class="area">
                            <h3>Asignatura</h3>
                            <p><?= $row['asignatura']; ?></p>
                        </div>
                        <div class="fecha">
                            <h3>Fecha y hora</h3>
                            <p><?= $row['created_at']; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>   
    </main>
</body>
</html>
<?php
    session_start();

    if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'administrador') {
        echo "Acceso denegado.";
        exit();
    }
    $id_usuario = $_SESSION['id_usuario'];
    $rol = $_SESSION['rol'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css"> <!-- Vincula el css principal -->
    <link rel="stylesheet" href="../assets/css/admin.css"> <!-- Vincula el css dedicado -->
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!-- Conecta la fuente -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    <!-- Conecta la fuente -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> <!-- Conecta la fuente -->
</head>
<body>
    <?php include '../includes/dashboard_header.php'; ?>
    <main>
        <div class="cards">
            <div class="card_crud_usuarios">
                <div class="card_title">
                    <h2>Crud usuarios</h2>
                </div>
                <div class="card_content">
                    <div class="card_text">
                        <p>Acceder al CRUD completo de todos los usuarios. Usted podrá acceder a todo el contenido de la base de datos (usuarios) ademas de poder crear, leer, actualizar y eliminar usuarios.</p>
                    </div>
                    <div class="card_button">
                        <a href="" class="btn_primary">Ingresar</a>
                    </div>
                </div>
            </div>
            <div class="card_crud_eventos">
                <div class="card_title">
                    <h2>Crud eventos</h2>
                </div>
                <div class="card_content">
                    <div class="card_text">
                        <p>Acceder al CRUD completo de todos los eventos. Usted podrá acceder a todo el contenido de la base de datos (eventos) ademas de poder crear, leer, actualizar y eliminar eventos.</p>
                    </div>
                    <div class="card_button">
                        <a href="" class="btn_primary">Ingresar</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
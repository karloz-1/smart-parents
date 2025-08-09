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
    <title>Registrar usuarios</title>
    <link rel="stylesheet" href="/smart-parents/assets/css/style.css"> <!-- Vincula el css principal -->
    <link rel="stylesheet" href="/smart-parents/assets/css/borrar_usuarios.css"> <!-- Vincula el css dedicado -->
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!-- Conecta la fuente -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    <!-- Conecta la fuente -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> <!-- Conecta la fuente -->
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/includes/dashboard_header.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/actions/usuarios/editar_usuarios.php'; ?>
    <main>
        <div class="card_borrar_usuario">
                <div class="card_title">
                    <h2>¿Esta seguro de eliminar a este usuario?</h2>
                </div>
                <div class="card_content">
                    <form action="/smart-parents/actions/usuarios/borrar_usuarios.php" method="POST">
                        <div class="card_item">
                            <input type="hidden" name="id_usuario" value="<?= $id ?>">
                        </div>
                        <div class="card_item">
                            <label for="nombre1">Primer nombre</label>
                            <p class="black"><?= $usuario['nombre1']; ?></p>
                        </div>
                        <hr>
                        <div class="card_item">
                            <label for="nombre1">Segundo nombre</label>
                            <p class="black"><?= $usuario['nombre2']; ?></p>
                        </div>
                        <hr>
                        <div class="card_item">
                            <label for="nombre1">Primer apellido</label>
                            <p class="black"><?= $usuario['apellido1']; ?></p>
                        </div>
                        <hr>
                        <div class="card_item">
                            <label for="nombre1">Segundo apellido</label>
                            <p class="black"><?= $usuario['apellido2']; ?></p>
                        </div>
                        <hr>
                        <div class="card_item">
                            <label for="nombre1">Identificacion</label>
                            <p class="black"><?= $usuario['identificacion']; ?></p>
                        </div>
                        <hr>
                        <div class="card_button">
                            <button type="submit" name="submit_btn">Eliminar</button>
                        </div>
                    </form>
                    <a href="/smart-parents/views/crud/usuarios/crud_usuarios.php" class="card_button">Regresar</a>
                </div>
            </div>
    </main>
</body>
</html>
<?php
    session_start();
    // Verifica que el usuario exista y sea administrador
    if (!isset($_SESSION['rol'])) {
        header("Location: /smart-parents/views/errors/401.php");
        exit();
    }
    elseif ($_SESSION['rol'] != 'administrador') {
        header("Location: /smart-parents/views/errors/403.php");
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
    <title>Editar eventos</title>
    <link rel="stylesheet" href="/smart-parents/assets/css/style.css"> <!-- Vincula el css principal -->
    <link rel="stylesheet" href="/smart-parents/assets/css/registrar_eventos.css"> <!-- Vincula el css principal -->
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!-- Conecta la fuente -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    <!-- Conecta la fuente -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> <!-- Conecta la fuente -->
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/includes/dashboard_header.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/actions/dashboard/dashboard.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/actions/eventos/editar_eventos.php'; ?>
    <main>
        <div class="form_title">
            <h1>Editar eventos</h1>
        </div>
        <div class="form">
            <form action="/smart-parents/actions/eventos/actualizar_eventos.php" method="POST" class="form_content">
                <div class="form_id_evento">
                    <label for="id_evento">Id del evento</label>
                    <input type="number" value="<?= $id ?>" disabled>
                    <input type="hidden" name="id_evento" value="<?= $id ?>">
                </div>
                <div class="form_tipo_de_evento">
                    <label for="tipo_de_evento">Tipo de evento</label>
                    <select name="tipo_de_evento" required>
                        <option value="llegada_tarde" <?php if ($evento['tipo_evento'] == "llegada_tarde") { echo 'selected="selected"'; } ?>>Llegada tarde</option>
                        <option value="anotacion" <?php if ($evento['tipo_evento'] == "anotacion") { echo 'selected="selected"'; } ?>>Anotacion</option>
                        <option value="inasistencia" <?php if ($evento['tipo_evento'] == "inasistencia") { echo 'selected="selected"'; } ?>>Inasistencia</option>
                        <option value="comentario" <?php if ($evento['tipo_evento'] == "comentario") { echo 'selected="selected"'; } ?>>Comentario</option>
                    </select>
                </div>
                <div class="form_usuario">
                    <label for="usuario_del_evento">Usuario del evento</label>

                    <input type="hidden" name="usuario_del_evento" value="<?= $evento['id_u1'] ?>" required>
                    <input type="text" value="<?= $evento['nombre1_u1'] . " ". $evento['nombre2_u1'] . " ". $evento['apellido1_u1'] . " ". $evento['apellido2_u1']; ?>" disabled>
                </div>
                <div class="form_descripcion">
                    <label for="descripcion_del_evento">Descripción del evento</label>
                    <textarea name="descripcion_del_evento" rows="4" required><?= $evento['descripcion'] ?></textarea>
                </div>
                <div class="form_registrado_por">
                    <label for="registrado_por">Registrado por</label>
                    <input type="hidden" name="registrado_por" value="<?= $evento['registrado_por'] ?>" required>
                    <input type="text" value="<?= $evento['nombre1_u2'] . " ". $evento['nombre2_u2'] . " ". $evento['apellido1_u2'] . " ". $evento['apellido2_u2']; ?>" disabled>
                </div>
                <div class="form_submit">
                    <button type="submit" name="submit_btn">Editar</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
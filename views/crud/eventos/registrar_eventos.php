<?php
    session_start();

    if (!isset($_SESSION['rol']) || ($_SESSION['rol'] != 'administrador' && $_SESSION['rol'] != 'profesor')) {
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
    <title>Registrar eventos</title>
    <link rel="stylesheet" href="/smart-parents/assets/css/style.css"> <!-- Vincula el css principal -->
    <link rel="stylesheet" href="/smart-parents/assets/css/registrar_eventos.css"> <!-- Vincula el css principal -->
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!-- Conecta la fuente -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    <!-- Conecta la fuente -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> <!-- Conecta la fuente -->
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/includes/dashboard_header.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/actions/dashboard/dashboard.php'; ?>
    <main>
        <div class="form_title">
            <h1>Registrar eventos</h1>
        </div>
        <div class="form">
            <form action="/smart-parents/actions/eventos/registrar_eventos.php" method="POST" class="form_content">
                <div class="form_tipo_de_evento">
                    <label for="tipo_de_evento">Tipo de evento</label>
                    <select name="tipo_de_evento" required>
                        <option value="llegada_tarde">Llegada tarde</option>
                        <option value="anotacion">Anotacion</option>
                        <option value="inasistencia">Inasistencia</option>
                        <option value="comentario">Comentario</option>
                    </select>
                </div>
                <div class="form_usuario">
                    <label for="usuario_del_evento">Usuario del evento</label>
                    <select name="usuario_del_evento" required>
                        <option value="">Selecione un usuario</option>
                        <?php include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/actions/usuarios/crud_usuarios.php'; ?>
                        <?php while ($row = $resultado->fetch_assoc()) { ?>
                            <option value="<?= $row['id_usuario']; ?>"><?= $row['nombre1'] . " " . $row['nombre2'] . " " . $row['apellido1'] . " " . $row['apellido2']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form_descripcion">
                    <label for="descripcion_del_evento">Descripción del evento</label>
                    <textarea name="descripcion_del_evento" rows="4" required></textarea>
                </div>
                <div class="form_registrado_por">
                    <label for="registrado_por">Registrado por</label>
                    <input type="hidden" name="registrado_por" value="<?= $_SESSION['id_usuario'] ?>">
                    <input type="text" value="<?= $nombreCompleto; ?>" disabled>
                </div>
                <div class="form_submit">
                    <button type="submit" name="submit_btn">Registrar</button>
                </div>
            </form>
            <?php
            
            if (isset($_GET['success'])) {
                echo '<div class="mensaje exito">Evento registrado correctamente.</div>';
            } elseif (isset($_GET['error']) === 1) {
                echo '<div class="mensaje error">Hubo un error al registrar el evento.</div>';
            }

            ?>
        </div>
    </main>
    
</body>
</html>
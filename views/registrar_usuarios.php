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
    <link rel="stylesheet" href="../assets/css/style.css"> <!-- Vincula el css principal -->
    <link rel="stylesheet" href="../assets/css/registrar_usuarios.css"> <!-- Vincula el css dedicado -->
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!-- Conecta la fuente -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    <!-- Conecta la fuente -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> <!-- Conecta la fuente -->
</head>
<body>
    <?php include '../includes/dashboard_header.php'; ?>
    <main>
        <div class="form_title">
            <h1>Registrar un nuevo estudiante</h1>
        </div>
        <div class="form">
            <form action="../actions/registrar_usuarios.php" method="POST" class="form_content">
                <div class="form_nombre1">
                    <label for="nombre1">Primer nombre</label>
                    <input type="text" name="nombre1" required>
                </div>
                <div class="form_nombre2">
                    <label for="nombre2">Segundo nombre</label>
                    <input type="text" name="nombre2">
                </div>
                <div class="form_apellido1">
                    <label for="apellido1">Primer apellido</label>
                    <input type="text" name="apellido1" required>
                </div>
                <div class="form_apellido2">
                    <label for="apellido2">Segundo apellido</label>
                    <input type="text" name="apellido2">
                </div>
                <div class="form_identificacion">
                    <label for="identificacion">Numero de identificación</label>
                    <input type="text" name="identificacion" required>
                </div>
                <div class="form_telefono">
                    <label for="telefono">Telefono</label>
                    <input type="text" name="telefono" required>
                </div>
                <div class="form_email">
                    <label for="email">Email</label>
                    <input type="email" name="email">
                </div>
                <div class="form_rol">
                    <label for="rol">Rol</label>
                    <select name="rol" required>
                        <option value="">Seleciona un rol</option>
                        <option value="estudiante">Estudiante</option>
                        <option value="profesor">Profesor</option>
                        <option value="administrador">Administrador</option>
                    </select>
                </div>
                <div class="form_asignatura">
                    <label for="asignatura">Asignatura (solo si es profesor)</label>
                    <select name="asignatura">
                        <option value="">Ninguna</option>
                        <option value="Administración">Administración</option>
                        <option value="Matematicas">Matematicas</option>
                        <option value="Español">Español</option>
                        <option value="Quimica">Quimica</option>
                        <option value="C.Sociales">C.Sociales</option>
                    </select>
                </div>
                <div class="form_password">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" required>
                </div>
                <div class="form_submit">
                    <button type="submit" name="submit_btn">Registrar</button>
                </div>
            </form>

            <?php
            
            if (isset($_GET['success'])) {
                echo '<div class="mensaje exito">Usuario registrado correctamente.</div>';
            } elseif ($_GET['error'] === 1) {
                echo '<div class="mensaje error">Hubo un error al registrar el usuario.</div>';
            } elseif ($_GET['error'] === 'duplicado') {
                echo '<div class="mensaje error">El usuario ya existe (identificación o correo repetido).</div>';
            }

            ?>

        </div>
    </main>
</body>
</html>
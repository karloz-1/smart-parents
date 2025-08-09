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
    <title>Crud usuarios</title>
    <link rel="stylesheet" href="/smart-parents/assets/css/style.css"> <!-- Vincula el css principal -->
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!-- Conecta la fuente -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    <!-- Conecta la fuente -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> <!-- Conecta la fuente -->
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/includes/dashboard_header.php'; ?>

    <main>
        <h1>Crud usuarios</h1>
        <?php
            
            if (isset($_GET['success'])) {
                echo '<div class="mensaje exito">Usuario actualizado correctamente.</div>';
            } elseif ($_GET['error'] === 1) {
                echo '<div class="mensaje error">Hubo un error al actualizar el usuario.</div>';
            }

        ?>
        <table border="1">
            <thead>
                <tr>
                    <th></th>
                    <th>Id</th>
                    <th>Rol</th>
                    <th>Identificación</th>
                    <th>Primer nombre</th>
                    <th>Segundo nombre</th>
                    <th>Primer apellido</th>
                    <th>Segundo apellido</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Contraseña</th>
                    <th>Asignatura</th>
                    <th>Creado</th>
                    <th>Actualizado</th>
                </tr>
            </thead>
            <tbody>
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/actions/usuarios/crud_usuarios.php'; ?>
                <?php while ($row = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td>
                            <a href="/smart-parents/views/crud/usuarios/editar_usuarios.php?id=<?=$row['id_usuario']?>">Editar</a>
                            <a href="/smart-parents/actions/usuarios/borrar_usuarios.php?id=<?=$row['id_usuario']?>">Borrar</a>
                        </td>
                        <td><?= $row['id_usuario']; ?></td>
                        <td><?= $row['rol']; ?></td>
                        <td><?= $row['identificacion']; ?></td>
                        <td><?= $row['nombre1']; ?></td>
                        <td><?= $row['nombre2']; ?></td>
                        <td><?= $row['apellido1']; ?></td>
                        <td><?= $row['apellido2']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['telefono']; ?></td>
                        <td><?= $row['password']; ?></td>
                        <td><?= $row['asignatura']; ?></td>
                        <td><?= $row['created_at']; ?></td>
                        <td><?= $row['update_at']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>
</html>
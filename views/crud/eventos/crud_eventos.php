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
        <h1>Crud eventos</h1>
        <?php
            
            if (isset($_GET['success'])) {
                echo '<div class="mensaje exito">Usuario actualizado o eliminado correctamente.</div>';
            } elseif (isset($_GET['error']) === 1) {
                echo '<div class="mensaje error">Hubo un error al actualizar o al eliminar el usuario.</div>';
            }

        ?>
        <table class="tabla">
            <thead>
                <tr>
                    <th></th>
                    <th>Id</th>
                    <th>Usuario del evento</th>
                    <th>Tipo de evento</th>
                    <th>Descripción</th>
                    <th>Registrado por</th>
                    <th>Creado</th>
                    <th>Actualizado</th>
                </tr>
            </thead>
            <tbody>
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/actions/eventos/crud_eventos.php'; ?>
                <?php while ($row = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td>
                            <a href="/smart-parents/views/crud/eventos/editar_eventos.php?id=<?=$row['id_evento']?>">Editar</a>
                            <a href="/smart-parents/views/crud/eventos/borrar_eventos.php?id=<?=$row['id_evento']?>">Borrar</a>
                        </td>
                        <td><?= $row['id_evento']; ?></td>
                        <td>
                            Id: <?= $row['id_u1']; ?> <br>
                            Nombre: <?= $row['nombre1_u1'] . " ". $row['nombre2_u1'] . " ". $row['apellido1_u1'] . " ". $row['apellido2_u1']; ?>
                        </td>
                        <td><?= $row['tipo_evento']; ?></td>
                        <td><?= $row['descripcion']; ?></td>
                        <td>
                            Id: <?= $row['registrado_por']; ?> <br>
                            Nombre: <?= $row['nombre1_u2'] . " ". $row['nombre2_u2'] . " ". $row['apellido1_u2'] . " ". $row['apellido2_u2']; ?>
                        </td>
                        <td><?= $row['created_at']; ?></td>
                        <td><?= $row['update_at']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
    
</body>
</html>
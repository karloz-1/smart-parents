<?php 
    session_start();
    // Verifica que el usuario sea administrador
    if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'administrador') {
        echo "Acceso denegado.";
        exit();
    }

    // Conexion a la base de datos
    include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/config/db_config.php';

    if (!isset($_GET['id'])) {
        echo "id no especificado";
        exit();
    }

    // Si se encontró id se guarda en una variable
    $id = $_GET['id'];

    // // Obtener datos del usuario
    // $sql = "SELECT * FROM usuario WHERE id_usuario = $id";
    // $resultado = $conexion->query($sql);


    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE id_usuario = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();


    if ($resultado->num_rows == 0) {
        echo "usuario no encontrado";
        exit();
    }

    $usuario = $resultado->fetch_assoc();

    header("Location: /smart-parents/views/editar_usuarios.php?");
?>
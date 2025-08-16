<?php
session_start();

// Verifica que el usuario sea administrador
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'administrador') {
    echo "Acceso denegado.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/config/db_config.php';

    // Recoger y limpiar los datos del formulario
    $tipo_de_evento = trim($_POST['tipo_de_evento']);
    $usuario_del_evento = trim($_POST['usuario_del_evento']);
    $descripcion_del_evento = trim($_POST['descripcion_del_evento']);
    $registrado_por = trim($_POST['registrado_por']);

    // Preparar la consulta
    $stmt = $conexion->prepare("INSERT INTO eventos (id_usuario, tipo_evento, descripcion, registrado_por) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("issi", $usuario_del_evento, $tipo_de_evento, $descripcion_del_evento, $registrado_por);

    if ($stmt->execute()) {
        header("Location: /smart-parents/views/crud/eventos/registrar_eventos.php?success=1");
        exit();
    } else {
        header("Location: /smart-parents/views/crud/eventos/registrar_eventos.php?error=1");
        exit();
    }

    $stmt->close();
    $conexion->close();
} else {
    echo "Método no permitido.";
}
?>
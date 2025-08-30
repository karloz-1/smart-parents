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
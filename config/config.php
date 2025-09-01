<?php
// =============================== CONFIGURACIÓN DE RUTAS PARA HTML Y PHP (INCLUDES Y REQUIRES) ========================================================================

    $host = $_SERVER['HTTP_HOST']; // Guarda el host en una variable para compararla luego.

    /* EXPLICACIÓN:
        Lo que hace esto es verificar si la pagina se ejecuta desde el hosting o desde xampp, y dependiendo si es una u otra se definen unas constantes para cada caso.
        Esto con el fin de que la pagina funcione correctamente de forma local y en el hosting. (en cuanto a enlaces entre archivos y paginas web)

        -? 'BASE_URL' (URL son recursos) se usa principalmente para enlazar css, backend de formularios, enlaces a paginas web, etc.
        -? 'BASE_PATH' (PATH son rutas de archivos) se usa para incluir archivos php

        MODO DE USO:
            Primero se enlaza este archivo de configuración para que los enlaces funcionen correctamente. (esto solo se hace una vez al principio de cada archivo)
            <?php include_once __DIR__ . '/config/config.php'; ?>

            BASE_URL (EJEMPLOS)
                <link rel="stylesheet" href="<?= BASE_URL; ?>assets/css/style.css">
            
            BASE_PATH
                <?php include BASE_PATH . 'includes/dashboard_header.php'; ?>
    */

    if ($host === 'localhost') { // Si la pagina se ejecuta de forma local:
        define('BASE_URL', '/smart-parents/');
        define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/');
    } else { // Si la pagina se ejecuta desde el hosting:
        define('BASE_URL', '/');
        define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/');
    }
// =====================================================================================================================================================================
?>
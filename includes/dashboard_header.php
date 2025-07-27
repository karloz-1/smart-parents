<?php
    echo
    '<header class="header">    <!-- Etiqueta de encabezado -->
        <div class="header_logo">   <!-- Contenedor del "logo" en este caso es el texto que está a la izquierda del encabezado -->
            <a href="../views/dashboard.php">Smart Parents</a>   <!-- Botón que lleva al dashboard -->
        </div>
        <nav class="header_nav">    <!-- Contenedor de navegación del sitio -->
            <ul class="header_nav_list">    <!-- Lista de enlaces del menú de navegación -->
                <li><a href="../views/dashboard.php">Inicio</a></li>                     <!-- Enlace a al dashboard -->';
                if ($rol === 'profesor' || 'admistrador') {
                    echo '<li><a href="../views/registrar_eventos.php">Registrar eventos</a></li>   <!-- Enlace a la pagina de registro de eventos-->';
                };
                if ($rol === 'administrador') {
                    echo '<li><a href="../views/registrar_usuarios.php">Registrar usuarios</a></li>   <!-- Enlace a la pagina de registro de usuarios-->';
                };
                if ($rol === 'administrador') {
                    echo '<li><a href="../views/admin.php">Administrador</a></li>   <!-- Enlace a la pagina de adminstrador-->';
                };
        echo'</ul>
        </nav>
        <div class="header_nav_login">  <!-- Contenedor del boton de cerrar sesión -->
            <a href="../actions/logout.php" class="btn_secundary">Cerrar Sesión</a>  <!-- Botón para ir a la pagina de cerrar sesión -->
        </div>
    </header>';
?>

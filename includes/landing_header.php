<?php
    echo
    '<header class="header">    <!-- Etiqueta de encabezado -->
        <div class="header_logo">   <!-- Contenedor del "logo" en este caso es el texto que está a la izquierda del encabezado -->
            <a href="/smart-parents/index.php">Smart Parents</a>   <!-- Botón que lleva al incio -->
        </div>
        <nav class="header_nav">    <!-- Contenedor de navegación del sitio -->
            <ul class="header_nav_list">    <!-- Lista de enlaces del menú de navegación -->
                <li><a href="/smart-parents/index.php">Inicio</a></li>                     <!-- Enlace a al inicio de la pagina -->
                <li><a href="/smart-parents/views/public/informacion.html">información</a></li>   <!-- Enlace a la pagina de información-->
            </ul>
        </nav>
        <div class="header_nav_login">  <!-- Contenedor del boton de iniciar sesión -->
            <a href="/smart-parents/views/auth/login.php" class="btn_secundary">Iniciar Sesión</a>  <!-- Botón para ir a la pagina de iniciar sesión -->
        </div>
    </header>'
?>
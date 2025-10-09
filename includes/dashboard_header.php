<?php
// Header para todas las paginas
echo
'<header class="header">
  <div class="header_logo">
    <a href="/smart-parents/views/dashboard.php">Smart Parents</a>
      </div>
        <nav class="header_nav">
          <ul class="header_nav_list">
            <li><a href="/smart-parents/views/dashboard.php">Inicio</a></li>';
// ====================================================================
// Validación de roles para mostrar unos botones u otros dependiendo del rol
// --------------------------------------------------------------------
if ($rol !== 'estudiante') {
  echo '<li><a href="/smart-parents/views/crud/eventos/registrar_eventos.php">Registrar eventos</a></li>';
};
if ($rol === 'administrador') {
  echo '<li><a href="/smart-parents/views/crud/usuarios/registrar_usuarios.php">Registrar usuarios</a></li>';
};
if ($rol === 'administrador') {
  echo '<li><a href="/smart-parents/views/crud/admin.php">Administrador</a></li>';
};
// ====================================================================
echo '    </ul>
        </nav>
      <div class="header_nav_login">
    <a href="/smart-parents/actions/auth/logout.php" class="btn_secundary">Cerrar Sesión</a>
  </div>
</header>';

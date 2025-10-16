<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Configuración de la pagina -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="/smart-parents/assets/img/cerebrosmart-parents.png" />
  <title>Smart Parents - Información</title>
  <!-- Estilos css -->
  <link rel="stylesheet" href="/smart-parents/assets/css/style.css" />
  <link rel="stylesheet" href="/smart-parents/assets/css/info.css" />
  <!-- Enlaza la tipografia -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />
</head>

<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/smart-parents/includes/landing_header.php'; ?>
  <main>
    <div class="titulo_principal">
      <h1>Información del proyecto</h1>
    </div>
    <div class="texto">
      <section class="como_acceder">
        <h2>¿Como acceder a todas las funcionalidades de la pagina?</h2>
        <p>Para acceder a al sitio web debes de iniciar con alguna de las siguientes credenciales:</p>
        <p>(la contraseña para todos los usuarios es "<strong>12345</strong>")</p>
        <ul>
          <li>1234567890 - <strong>Administrador</strong> - Admin</li>
          <li>0000000001 - <strong>Administrador</strong> - Carlos</li>
          <li>0000000002 - <strong>Profesor </strong> - Jhonatan</li>
          <li>0000000003 - <strong>Estudiante</strong> - Salomé</li>
          <li>0000000004 - <strong>Administrador</strong> - Juan</li>
          <li>0000000005 - <strong>Profesor </strong> - Lauren</li>
        </ul>
      </section>
      <hr>
      <section class="smart_parents">
        <h2>¿Que es Smart Parents?</h2>
        <p>Smart parents es una plataforma digital que organiza la información escolar, registrando llegadas tarde y novedades para mejorar la comunicación entre padres, docentes y estudiantes</p>
      </section>
      <section class="quienes_somos">
        <h2>¿Quienes somos?</h2>
        <p>Somos un grupo de estudiantes comprometidos con el desarrollo de un sistema que facilite el proceso de comunicación entre la escuela y el hogar</p>
        <div class="grupo">
          <ul>
            <li>
              <img src="/smart-parents/assets/img/face_3_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="Imagen de persona" width="100px">
              <p>Salomé Patiño<br>Desarrolladora</p>
            </li>
            <li>
              <img src="/smart-parents/assets/img/face_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="Imagen de persona" width="100px">
              <p>Carlos Gonzalez<br>Desarrollador</p>
            </li>
            <li>
              <img src="/smart-parents/assets/img/face_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="Imagen de persona" width="100px">
              <p>Jhonatan Londoño<br>Desarrollador</p>
            </li>
            <li>
              <img src="/smart-parents/assets/img/face_3_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="Imagen de persona" width="100px">
              <p>Lauren Villadiego<br>Desarrolladora</p>
            </li>
            <li>
              <img src="/smart-parents/assets/img/face_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.svg" alt="Imagen de persona" width="100px">
              <p>Juan Tabares<br>Desarrollador</p>
            </li>
          </ul>
        </div>
      </section>
      <hr>
      <section>
        <h2>Misión</h2>
        <p>Diseñar e implementar una solución web que optimice la gestión de la información académica, promoviendo una comunicación eficiente entre estudiantes, docentes y padres de familia, mediante el uso de herramientas tecnológicas confiables y accesibles.</p>
      </section>
      <section>
        <h2>Visión</h2>
        <p>Ser una plataforma innovadora y funcional reconocida dentro de la institución educativa por mejorar el control académico y fortalecer la participación de toda la comunidad escolar en los procesos formativos.</p>
      </section>
      <hr>
      <section>
        <h2>Objetivo general</h2>
        <p>Desarrollar una plataforma web que permita el registro y seguimiento de eventos escolares, llegadas tarde y novedades, optimizando la comunicación entre padres, docentes y estudiantes.</p>
      </section>
      <section>
        <h2>Objetivos especificos</h2>
        <ul>
          <li>Permitir a los padres consultar fácilmente la información de sus hijos.</li>
          <li>Garantizar la seguridad y privacidad de los datos almacenados.</li>
          <li>Fomentar la participación activa de los padres en la educación de sus hijos.</li>
        </ul>
      </section>
      <hr>
      <section>
        <h2>Implementación</h2>
        <p>Este proyecto es una solución práctica y moderna que aprovecha la tecnología para mejorar los procesos de comunicación y gestión escolar.</p>
      </section>
      <section>
        <h2>Soluciones</h2>
        <p>El uso de PHP, MySQL y HTML en este proyecto refleja cómo la programación puede dar soluciones reales a problemas educativos.</p>
      </section>
    </div>
    <a href="/smart-parents/views/auth/login.php" class="btn_primary">Iniciar Sesión</a>
  </main>
</body>

</html>
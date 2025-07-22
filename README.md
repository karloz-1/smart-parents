# smart-parents
SMART PARENTS es una plataforma web institucional desarrollada en HTML, CSS, PHP y MySQL, cuyo objetivo principal es mantener informados a los padres de familia sobre la situación académica y comportamental de sus hijos. Esta plataforma permitirá a los usuarios acceder a información de manera clara, rápida y segura.

ESTRUCTURA DE ARCHIVOS:

smart-parents/
│
├── 📁 assets/              # Archivos estáticos (imágenes, CSS, JS)
│   ├── 📁 css/             # Hojas de estilo
│   │   └── style.css
│   ├── 📁 js/              # Scripts JS si se usan
│   │   └── scripts.js
│   └── 📁 img/             # Imágenes
│       └── logo.png
│
├── 📁 config/              # Configuraciones generales
│   └── db.php              # Conexión a la base de datos
│
├── 📁 includes/            # Archivos reutilizables
│   ├── header.php          # Encabezado común (menú, logo)
│   ├── footer.php          # Pie de página común
│   └── session.php         # Verificación de sesión/login
│
├── 📁 views/               # Páginas según el tipo de usuario
│   ├── login.php           # Página de inicio de sesión
│   ├── admin.php           # Panel del administrador
│   ├── profesor.php        # Panel del profesor
│   ├── estudiante.php      # Panel del estudiante
│   └── padre.php           # Panel del padre
│
├── 📁 actions/             # Archivos que procesan formularios (CRUD)
│   ├── login.php           # Procesa el inicio de sesión
│   ├── logout.php          # Cierra sesión
│   ├── registrar_evento.php # Añadir llegada tarde, llamado, etc.
│   ├── registrar_usuario.php # Crear nuevos usuarios (solo admins)
│   └── eliminar_evento.php  # Eliminar eventos
│
├── 📁 sql/                 # Scripts SQL para crear las tablas
│   └── estructura.sql
│
├── index.php               # Redirecciona según si está logueado
└── README.md               # Explicación del proyect

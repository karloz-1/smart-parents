DROP DATABASE IF EXISTS smart_parents;
CREATE DATABASE smart_parents;
USE smart_parents;

CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    rol ENUM('estudiante', 'pad')
)
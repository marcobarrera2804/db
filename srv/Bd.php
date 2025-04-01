<?php

class Bd
{
 private static ?PDO $pdo = null;

 static function pdo(): PDO
 {
  if (self::$pdo === null) {

   self::$pdo = new PDO(
    // cadena de conexión
    "dbname:pasatiempos_db",
    // usuario
    null,
    // contraseña
    null,
    // Opciones: pdos no persistentes y lanza excepciones.
    [PDO::ATTR_PERSISTENT => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
   );

   self::$pdo->exec(
    "CREATE DATABASE IF NOT EXISTS pasatiempos_db;
USE pasatiempos_db;

CREATE TABLE IF NOT EXISTS PASATIEMPO (
    PAS_ID INT AUTO_INCREMENT PRIMARY KEY,
    PAS_NOMBRE VARCHAR(255) NOT NULL UNIQUE,
    PAS_DESCRIPCION TEXT NOT NULL,
    PAS_CATEGORIA ENUM('Deporte', 'Juegos', 'Arte', 'Ciencia', 'Música', 'Otro') NOT NULL,
    PAS_DIFICULTAD ENUM('Fácil', 'Intermedio', 'Difícil') NOT NULL DEFAULT 'Intermedio',
    PAS_FECHA_CREACION TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insertando algunos datos de prueba
INSERT INTO PASATIEMPO (PAS_NOMBRE, PAS_DESCRIPCION, PAS_CATEGORIA, PAS_DIFICULTAD) VALUES
('Fútbol', 'Deporte en equipo donde se anota en la portería del rival', 'Deporte', 'Intermedio'),
('Ajedrez', 'Juego de estrategia con piezas en un tablero de 64 casillas', 'Juegos', 'Difícil'),
('Natación', 'Deporte acuático que mejora la resistencia y técnica', 'Deporte', 'Intermedio'),
('Pintura', 'Arte de plasmar imágenes y colores sobre un lienzo', 'Arte', 'Fácil'),
('Guitarra', 'Instrumento musical de cuerdas para acompañar canciones', 'Música', 'Intermedio');

-- Consultar datos para verificar
SELECT * FROM PASATIEMPO;
;
"
   );
  }

  return self::$pdo;
 }
}

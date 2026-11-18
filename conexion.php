<?php
// Configuración por defecto de XAMPP
$host    = 'localhost';
$db      = 'clinica_central';
$usuario = 'root';
$clave   = '';          // XAMPP trae el usuario root sin contraseña
$charset = 'utf8mb4';

$dsn = "mysql:host=$host:3306;dbname=$db;charset=$charset";$opciones = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $usuario, $clave, $opciones);
} catch (PDOException $e) {
    die('Error de conexión a la base de datos: ' . $e->getMessage());
}

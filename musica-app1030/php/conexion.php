<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'musica';
$port = 3308; // Puerto correcto del MySQL de WAMP

$conexion = new mysqli($host, $user, $password, $database, $port);

if ($conexion->connect_error) {
    die("❌ Conexión fallida: " . $conexion->connect_error);
}
?>

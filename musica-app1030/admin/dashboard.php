<?php
session_start();
if (!isset($_SESSION['admin'])) {
    die("⚠️ Acceso solo para administradores");
}

include_once '../php/conexion.php';

echo "<h1>📋 Panel del Administrador</h1>";

// Mostrar álbumes
echo "<h2>Álbumes Creados</h2>";
$albumes = $conexion->query("SELECT a.*, u.nombre FROM album a JOIN usuarios u ON a.id_usuario = u.id");
while ($a = $albumes->fetch_assoc()) {
    echo "<p><strong>{$a['titulo']}</strong> ({$a['anio']}) - por {$a['nombre']}</p>";
}

// Mostrar canciones
echo "<h2>Canciones Creadas</h2>";
$canciones = $conexion->query("SELECT c.*, u.nombre FROM cancion c JOIN usuarios u ON c.id_usuario = u.id");
while ($c = $canciones->fetch_assoc()) {
    echo "<p><strong>{$c['titulo']}</strong> - {$c['cantante']} (álbum: {$c['id_album']}) - por {$c['nombre']}</p>";
}

// Mostrar usuarios
echo "<h2>Usuarios Registrados</h2>";
$usuarios = $conexion->query("SELECT * FROM usuarios");
while ($u = $usuarios->fetch_assoc()) {
    echo "<p>{$u['nombre']} - {$u['correo']}</p>";
}
?>
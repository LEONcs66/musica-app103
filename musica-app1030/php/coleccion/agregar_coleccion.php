<?php 
include_once '../conexion.php';
session_start();

// Validar si el usuario está logueado
if (!isset($_SESSION['usuario_id'])) {
    // Redirigir al login si no ha iniciado sesión
    header("Location: /login.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $id_usuario = $_SESSION['usuario_id']; // Solo si piensas registrar el autor

    if (!empty($nombre)) {
        $stmt = $conexion->prepare("INSERT INTO coleccion (nombre) VALUES (?)");
        $stmt->bind_param("s", $nombre);

        if ($stmt->execute()) {
            // Redirección al crear con éxito
            header("Location: /colecciones.php?exito=1");
            exit();
        } else {
            echo "❌ Error al crear colección: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "❌ El nombre de la colección no puede estar vacío.";
    }

    $conexion->close();
} else {
    echo "❌ Método no permitido.";
}

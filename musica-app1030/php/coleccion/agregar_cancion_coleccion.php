<?php
include_once '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_coleccion = $_POST['id_coleccion'];
    $id_cancion = $_POST['id_cancion'];

    // Validación básica
    if (!empty($id_coleccion) && !empty($id_cancion)) {
        $stmt = $conexion->prepare("INSERT INTO coleccion_cancion (id_coleccion, id_cancion) VALUES (?, ?)");
        $stmt->bind_param("ii", $id_coleccion, $id_cancion);

        if ($stmt->execute()) {
            // Redirigir de vuelta a colecciones con éxito
            header("Location:/colecciones.php?agregado=1");
            exit();
        } else {
            echo "Error al agregar la canción a la colección: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "❌ Datos incompletos.";
    }

    $conexion->close();
} else {
    echo "❌ Método no permitido.";
}

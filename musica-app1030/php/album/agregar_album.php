<?php
include_once '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $titulo = $_POST['titulo'];
    $anio = $_POST['anio'];

    // Validar que no estén vacíos (extra por seguridad)
    if (!empty($titulo) && !empty($anio)) {
        // Preparar la consulta segura
        $stmt = $conexion->prepare("INSERT INTO album (titulo, anio) VALUES (?, ?)");
        $stmt->bind_param("si", $titulo, $anio);

        // Ejecutar e ir a la página principal
        if ($stmt->execute()) {
            header("Location:../../albumes.html");
            exit();
        } else {
            echo "❌ Error al guardar el álbum: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "❌ Por favor completa todos los campos.";
    }

    $conexion->close();
} else {
    echo "Acceso no permitido.";
}
?>

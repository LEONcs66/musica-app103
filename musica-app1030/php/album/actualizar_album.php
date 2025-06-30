<?php
include_once '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $anio = $_POST['anio'];

    $stmt = $conexion->prepare("UPDATE album SET titulo=?, anio=? WHERE id=?");
    $stmt->bind_param("sii", $titulo, $anio, $id);

    if ($stmt->execute()) {
        header("Location: albumes.html?actualizado=1");
        exit;
    } else {
        echo "❌ Error al actualizar: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
} else {
    echo "❌ Método no permitido.";
}

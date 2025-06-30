<?php
include_once '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $cantante = $_POST['cantante'];
    $interprete = $_POST['interprete'];
    $compositor = $_POST['compositor'];
    $disquera = $_POST['disquera'];
    $genero = $_POST['genero'];
    $productor = $_POST['productor'];
    $id_album = $_POST['id_album'];

    // Validación básica
    if (!empty($titulo) && !empty($cantante) && !empty($id_album)) {
        $stmt = $conexion->prepare("UPDATE cancion 
            SET titulo = ?, cantante = ?, interprete = ?, compositor = ?, disquera = ?, genero = ?, productor = ?, id_album = ?
            WHERE id = ?");
        $stmt->bind_param("sssssssii", $titulo, $cantante, $interprete, $compositor, $disquera, $genero, $productor, $id_album, $id);

        if ($stmt->execute()) {
            header("Location:/canciones.php");
            exit();
        } else {
            echo "❌ Error al actualizar la canción: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "❌ Título, cantante y álbum son obligatorios.";
    }

    $conexion->close();
} else {
    echo "Acceso no permitido.";
}
?>

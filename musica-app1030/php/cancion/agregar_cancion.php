<?php
include_once '../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $cantante = $_POST['cantante'];
    $interprete = $_POST['interprete'];
    $compositor = $_POST['compositor'];
    $disquera = $_POST['disquera'];
    $genero = $_POST['genero'];
    $productor = $_POST['productor'];
    $id_album = $_POST['id_album'];
    


    $stmt = $conexion->prepare("INSERT INTO cancion (titulo, cantante, interprete, compositor, disquera, genero, productor, id_album)
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    // $consulta=mysqli_query("");
    $stmt->bind_param("sssssssi", $titulo, $cantante, $interprete, $compositor, $disquera, $genero, $productor, $id_album);

    if ($stmt->execute()) {
        header("Location:../../canciones.php");
        
        exit();
    } else {
        echo "❌ Error al guardar la canción: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
}
?>

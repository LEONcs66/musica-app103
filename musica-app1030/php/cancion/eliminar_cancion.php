<?php
include_once '../conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conexion->query("DELETE FROM cancion WHERE id = $id");
    header("Location:canciones.php");
}
?>

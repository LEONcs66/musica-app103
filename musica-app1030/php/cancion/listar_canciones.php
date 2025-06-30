<?php
include_once '../conexion.php';

$sql = "SELECT c.*, a.titulo AS album_titulo 
        FROM cancion c
        JOIN album a ON c.id_album = a.id
        ORDER BY c.id DESC";
$resultado = $conexion->query($sql);

echo "<table border='1' width='100%' style='background-color: white; color: black; border-collapse: collapse;'>";
echo "<tr style='background-color: #1db954; color: white;'>
        <th>ID</th>
        <th>Título</th>
        <th>Cantante</th>
        <th>Intérprete</th>
        <th>Compositor</th>
        <th>Disquera</th>
        <th>Género</th>
        <th>Productor</th>
        <th>Álbum</th>
        <th>Acciones</th>
      </tr>";

while ($fila = $resultado->fetch_assoc()) {
    echo "<tr>
            <td>{$fila['id']}</td>
            <td>{$fila['titulo']}</td>
            <td>{$fila['cantante']}</td>
            <td>{$fila['interprete']}</td>
            <td>{$fila['compositor']}</td>
            <td>{$fila['disquera']}</td>
            <td>{$fila['genero']}</td>
            <td>{$fila['productor']}</td>
            <td>{$fila['album_titulo']}</td>
            <td>
                <a href='editar_cancion.php?id={$fila['id']}'>Editar</a> |
                <a href='eliminar_cancion.php?id={$fila['id']}' onclick=\"return confirm('¿Eliminar esta canción?')\">Eliminar</a>
            </td>
          </tr>";
}

echo "</table>";
$conexion->close();
?>

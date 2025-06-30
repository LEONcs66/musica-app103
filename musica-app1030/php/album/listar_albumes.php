<?php
include_once '../conexion.php';

$sql = "SELECT * FROM album ORDER BY id DESC";
$resultado = $conexion->query($sql);

if ($resultado && $resultado->num_rows > 0) {
    echo "<table border='1' width='100%' style='background-color: white; color: black; border-collapse: collapse;'>";
    echo "<tr style='background-color: #1db954; color: white;'>
            <th>ID</th>
            <th>Título</th>
            <th>Año</th>
            <th>Acciones</th>
          </tr>";

    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>
                <td>{$fila['id']}</td>
                <td>{$fila['titulo']}</td>
                <td>{$fila['anio']}</td>
                <td>
                    <a href='editar_album.php?id={$fila['id']}'>Editar</a> |
                    <a href='eliminar_album.php?id={$fila['id']}' onclick=\"return confirm('¿Eliminar este álbum?')\">Eliminar</a>
                </td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p style='color: black;'>No hay álbumes registrados.</p>";
}

$conexion->close();
?>

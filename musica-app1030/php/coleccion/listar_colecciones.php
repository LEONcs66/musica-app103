<?php
include_once '../conexion.php';

// Consulta para obtener canciones agrupadas por colección
$sql = "SELECT cc.id_coleccion, col.nombre AS nombre_coleccion, c.titulo AS titulo_cancion
        FROM coleccion_cancion cc
        JOIN coleccion col ON cc.id_coleccion = col.id
        JOIN cancion c ON cc.id_cancion = c.id
        ORDER BY col.nombre ASC, c.titulo ASC";

$resultado = $conexion->query($sql);

// Mostrar en tabla agrupada por colección
$coleccion_actual = null;

echo "<div style='background-color: white; color: black; padding: 10px;'>";

while ($fila = $resultado->fetch_assoc()) {
    if ($coleccion_actual !== $fila['nombre_coleccion']) {
        // Si cambiamos de colección, mostramos nuevo encabezado
        if ($coleccion_actual !== null) {
            echo "</ul>";
        }
        $coleccion_actual = $fila['nombre_coleccion'];
        echo "<h3>🎵 Colección: <strong>{$coleccion_actual}</strong></h3><ul>";
    }
    echo "<li>{$fila['titulo_cancion']}</li>";
}

if ($coleccion_actual !== null) {
    echo "</ul>";
}

echo "</div>";

$conexion->close();
?>

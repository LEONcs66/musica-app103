<?php
include_once '../conexion.php';

$album = null;

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM album WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    if ($resultado->num_rows > 0) {
        $album = $resultado->fetch_assoc();
    } else {
        echo "<p style='color:red; text-align:center;'>❌ Álbum no encontrado.</p>";
        exit;
    }
} else {
    echo "<p style='color:red; text-align:center;'>❌ ID no válido.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Álbum</title>
</head>
<body>
    <h2>Editar Álbum</h2>
    <form method="POST" action="actualizar_album.php">
        <input type="hidden" name="id" value="<?= htmlspecialchars($album['id']) ?>">
        <label>Título:</label>
        <input type="text" name="titulo" value="<?= htmlspecialchars($album['titulo']) ?>"><br><br>
        <label>Año:</label>
        <input type="number" name="anio" value="<?= htmlspecialchars($album['anio']) ?>"><br><br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>

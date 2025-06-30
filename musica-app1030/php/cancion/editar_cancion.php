<?php
include_once '../conexion.php';

$id = $_GET['id'];
$result = $conexion->query("SELECT * FROM cancion WHERE id = $id");
$cancion = $result->fetch_assoc();
$albumes = $conexion->query("SELECT * FROM album");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Canción</title>
</head>
<body>
    <h2>Editar Canción</h2>
    <form action="actualizar_cancion.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $cancion['id']; ?>">

        <label>Título:</label>
        <input type="text" name="titulo" value="<?php echo $cancion['titulo']; ?>" required><br><br>

        <label>Cantante:</label>
        <input type="text" name="cantante" value="<?php echo $cancion['cantante']; ?>"><br><br>

        <label>Intérprete:</label>
        <input type="text" name="interprete" value="<?php echo $cancion['interprete']; ?>"><br><br>

        <label>Compositor:</label>
        <input type="text" name="compositor" value="<?php echo $cancion['compositor']; ?>"><br><br>

        <label>Disquera:</label>
        <input type="text" name="disquera" value="<?php echo $cancion['disquera']; ?>"><br><br>

        <label>Género:</label>
        <input type="text" name="genero" value="<?php echo $cancion['genero']; ?>"><br><br>

        <label>Productor:</label>
        <input type="text" name="productor" value="<?php echo $cancion['productor']; ?>"><br><br>

        <label>Álbum:</label>
        <select name="id_album" required>
            <?php while($a = $albumes->fetch_assoc()) {
                $selected = ($a['id'] == $cancion['id_album']) ? "selected" : "";
                echo "<option value='{$a['id']}' $selected>{$a['titulo']}</option>";
            } ?>
        </select><br><br>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>

<?php
include_once 'php/conexion.php'; // Corrige la ruta según la ubicación de este archivo

// Cargar colecciones
$colecciones = $conexion->query("SELECT * FROM coleccion");

// Cargar canciones
$canciones = $conexion->query("SELECT * FROM cancion");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colecciones</title>
    <link rel="stylesheet" href="css/style_cole.css">
</head>
<body>
    <header>
        <h1>🎵 Colecciones de Canciones 🎵</h1>
        <nav>
            <a href="index.html">Inicio</a>
            <a href="albumes.html">Álbumes</a>
            <a href="canciones.php">Canciones</a>
        </nav>
    </header>

    <main>
        <!-- Mostrar mensaje si se creó la colección -->
        <?php if (isset($_GET['exito']) && $_GET['exito'] == 1): ?>
            <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin: 15px 0;">
                ✅ ¡Colección creada exitosamente!
            </div>
        <?php endif; ?>

        <section>
            <h2>Crear nueva colección</h2>
            <form action="php/coleccion/agregar_coleccion.php" method="POST">
                <label for="nombre">Nombre de la colección:</label>
                <input type="text" id="nombre" name="nombre" required>
                <button type="submit">Crear</button>
            </form>
        </section>

        <section>
            <h2>Agregar canciones a colección</h2>
            <form action="php/coleccion/agregar_cancion_coleccion.php" method="POST">
                <label for="coleccion">Colección:</label>
                <select name="id_coleccion" id="coleccion" required>
                    <?php
                    if ($colecciones && $colecciones->num_rows > 0) {
                        while ($c = $colecciones->fetch_assoc()) {
                            echo "<option value='{$c['id']}'>{$c['nombre']}</option>";
                        }
                    } else {
                        echo "<option disabled>No hay colecciones disponibles</option>";
                    }
                    ?>
                </select><br><br>

                <label for="cancion">Canción:</label>
                <select name="id_cancion" id="cancion" required>
                    <?php
                    if ($canciones && $canciones->num_rows > 0) {
                        while ($c = $canciones->fetch_assoc()) {
                            echo "<option value='{$c['id']}'>{$c['titulo']}</option>";
                        }
                    } else {
                        echo "<option disabled>No hay canciones disponibles</option>";
                    }

                    $conexion->close(); // Cerramos conexión aquí al final
                    ?>
                </select><br><br>

                <button type="submit">Agregar a colección</button>
            </form>
        </section>

        <section>
            <h2>Listado de colecciones</h2>
            <iframe src="php/coleccion/listar_colecciones.php" width="100%" height="400px" style="border:none;"></iframe>
        </section>
    </main>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canciones</title>
    <link rel="stylesheet" href="css/style_can.css">
</head>
<body>
    <header>
        <h1>🎵 Canciones 🎵</h1>
        <nav>
            <a href="index.html">Inicio</a>
            <a href="albumes.html">Álbumes</a>
            <a href="colecciones.php">Colecciones</a>
        </nav>
    </header>

    <main>
        <section>
            <h2>Agregar nueva canción</h2>
            <form action="php/cancion/agregar_cancion.php" method="POST">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required><br><br>

                <label for="cantante">Cantante:</label>
                <input type="text" id="cantante" name="cantante" required><br><br>

                <label for="interprete">Intérprete:</label>
                <input type="text" id="interprete" name="interprete"><br><br>

                <label for="compositor">Compositor:</label>
                <input type="text" id="compositor" name="compositor"><br><br>

                <label for="disquera">Disquera:</label>
                <input type="text" id="disquera" name="disquera"><br><br>

                <label for="genero">Género:</label>
                <input type="text" id="genero" name="genero"><br><br>

                <label for="productor">Productor:</label>
                <input type="text" id="productor" name="productor"><br><br>

                <label for="id_album">Álbum:</label>
                <select name="id_album" required>
                    <?php
                        include_once './php/conexion.php';
                        $result = mysqli_query($conexion, "SELECT * FROM album");
                        while($row = mysqli_fetch_array($result)) {
                            echo "<option value=$row[0] > $row[1] </option> ";
                        }
                        
                    ?>
                </select><br><br>

                <button type="submit">Guardar canción</button>
            </form>
        </section>

        <section>
            <h2>Listado de canciones</h2>
            <iframe src="php/cancion/listar_canciones.php" width="100%" height="400px" style="border:none;"></iframe>
        </section>
    </main>
</body>
</html>

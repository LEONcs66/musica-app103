<?php
include_once 'conexion.php';
session_start();

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT * FROM usuarios WHERE correo = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $correo);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    $usuario = $resultado->fetch_assoc();
    if (password_verify($contrasena, $usuario['contrasena'])) {
        $_SESSION['usuario'] = $usuario['nombre'];
        $_SESSION['usuario_id'] = $usuario['id'];
        header("Location:/index.html");
    } else {
        echo "❌ Contraseña incorrecta.";
    }
} else {
    echo "❌ Usuario no encontrado.";
}
?>

<?php
session_start();
include 'conexion.php';

date_default_timezone_set('America/Argentina/Buenos_Aires');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $contra = $_POST['contra'];

    $conexion = conectar();
    $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contra='$contra'";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        $usuario_data = mysqli_fetch_assoc($resultado);
        $_SESSION['usuario'] = $usuario_data['usuario'];
        $_SESSION['rol'] = $usuario_data['rol'];
        $_SESSION['nombre'] = $usuario_data['nombre'];

        $fecha_hora = date('d-m-Y H:i:s');
        $archivo = fopen("accesos.txt", "a");
        fwrite($archivo, "$fecha_hora - Usuario: $usuario ha iniciado sesión\n");
        fclose($archivo);

        if ($usuario_data['rol'] == 1) {
            header('Location: admin.php');
        } else {
            header('Location: empleado.php');
        }
        exit();
    } else {
        echo "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <div class="formulario_login">
    <form method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>
        <br>
        <label for="contra">Contraseña:</label>
        <input type="password" id="contra" name="contra" required>
        <br>
        <input type="submit" value="Iniciar Sesión">
    </form>
    </div>
    <?php
    if (isset($_SESSION['mensaje'])) {
        echo "<p>{$_SESSION['mensaje']}</p>";
        unset($_SESSION['mensaje']);
    }
    ?>
</body>
</html>
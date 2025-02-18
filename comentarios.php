<?php
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 2) {
    header('Location: login.php');
    exit();
}
date_default_timezone_set('America/Argentina/Buenos_Aires');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comentario = $_POST['comentario'];
    $fecha_hora = date('d-m-Y H:i:s');
    $usuario = $_SESSION['usuario'];

    $archivo = fopen('comentarios.txt', 'a');
    fwrite($archivo, "<span style='color:red;'>$usuario</span>: $comentario - $fecha_hora<br>\n");
    fclose($archivo);

    echo "Mensaje enviado";
}
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Comentario</title>
    <link rel="stylesheet" href="comentarios.css">
</head>
<body>
    <h1>Enviar comentario al Administrador</h1>
    <form method="post">
        <textarea name="comentario" rows="4" cols="50" required></textarea>
        <br>
        <input type="submit" value="Enviar Comentario">
    </form>
    <a href="empleado.php">Volver</a>
</body>
</html>
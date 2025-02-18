<?php
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 1) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Comentarios</title>
    <link rel="stylesheet" href="ver_comentarios.css">
</head>
<body>
    <h1>Comentarios de Empleados</h1>
    <div class="comentarios">
        <?php
        $comentarios = file('comentarios.txt');
        if ($comentarios) {
            foreach ($comentarios as $comentario) {
                echo "<div class='comentario'>$comentario</div>";
            }
        } else {
            echo "<div class='comentario'>No hay comentarios.</div>";
        }
        ?>
    </div>
    <a href="admin.php">Volver</a>
</body>
</html>
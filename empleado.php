<?php
session_start();


if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 2) {
    header('Location: login.php');
    exit();
}

$usuario = $_SESSION['usuario'];
$nombre = $_SESSION['nombre'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleado</title>
    <link rel="stylesheet" href="empleado.css">
</head>
<body>
    <h1>Pagina de Empleado</h1>
    <ul>
        <li>
            <form method="get" action="buscar_producto.php">
                <input type="text" name="buscado" required>
                <div class="radios">
                    <input type="radio" name="op" value="codigo" required>Código
                    <input type="radio" name="op" value="descripcion" required>Descripción
                </div>
                <input type="submit" value="Buscar">
            </form>
        </li>
        <li><a href="lista_productos.php"><button>Lista de Productos</button></a></li>
        <li><a href="comentarios.php"><button>Enviar Comentario</button></a></li>
    </ul>
    <div style="text-align: right; margin-right: 20px;">
        <span>Bienvenido, <?php echo $usuario; ?></span>
        <a href="logout.php"><button>Cerrar Sesión</button></a>
    </div>
</body>
</html>
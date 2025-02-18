<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 1) {
    header('Location: login.php');
    exit();
}

$usuario = $_SESSION['usuario'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <h1>Pagina de Administrador</h1>
    <div class="admin">
    <ul>
        <li><a href="agregar_producto.php"><button>Ingresar Productos</button></a></li>
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
        <li><a href="ver_comentarios.php"><button>Ver Comentarios</button></a></li>
    </ul>
    </div>
    <div class="cerrar" >
        <span>Bienvenido, <?php echo $usuario; ?></span>
        <a href="logout.php"><button>Cerrar Sesión</button></a>
    </div>
</body>
</html>
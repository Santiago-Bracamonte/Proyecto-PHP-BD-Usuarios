<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

$conexion = conectar();
$sql = "SELECT * FROM productos";
$resultado = mysqli_query($conexion, $sql);
$esEmpleado = $_SESSION['rol'] == 2;
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="lista_productos.css">
</head>
<body>
    <h1>Lista de Productos</h1>
    <?php
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        echo "<table>";
        echo "<tr><th>Código</th><th>Descripción</th><th>Precio</th><th>Cantidad</th><th>Peso</th><th>Fecha de Ingreso</th><th>Acciones</th></tr>";
        while ($filas = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>{$filas['codigo']}</td>";
            echo "<td>{$filas['descripcion']}</td>";
            echo "<td>{$filas['precio']}</td>";
            echo "<td>{$filas['cantidad']}</td>";
            echo "<td>{$filas['peso']}</td>";
            echo "<td>{$filas['fecha_ingreso']}</td>";
            echo "<td>";
            if (!$esEmpleado) { 
                echo "<a href='editar_producto.php?codigo={$filas['codigo']}' class='editar'>Editar</a>";
                echo " <a href='confirmar_accion.php?codigo={$filas['codigo']}&accion=eliminar' class='eliminar'>Eliminar</a>";
            } else {
                echo "Solo disponible para el administrador";
            }
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<div class='no-resultados'>No se encontraron productos.</div>";
    }
    mysqli_close($conexion);
    ?>
    <div class="botones">
        <?php
        if ($_SESSION['rol'] == 1) {
            echo '<a href="admin.php" class="boton">Volver</a>';
        } else {
            echo '<a href="empleado.php" class="boton">Volver</a>';
        }
        ?>
    </div>
</body>
</html>
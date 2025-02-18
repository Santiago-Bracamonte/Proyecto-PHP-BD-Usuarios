<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['usuario']) || ($_SESSION['rol'] != 1 && $_SESSION['rol'] != 2)) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $buscado = $_GET['buscado'];
    $op = $_GET['op'];

    $conexion = conectar();
    $sql = "SELECT * FROM productos WHERE $op LIKE '%$buscado%'";
    $resultado = mysqli_query($conexion, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Producto</title>
    <link rel="stylesheet" href="buscar_producto.css">
</head>
<body>
<h1>Buscar Producto</h1>
<?php
if ($resultado && mysqli_num_rows($resultado) > 0) {
    echo "<table>";
    echo "<tr><th>Código</th><th>Descripción</th><th>Precio</th><th>Cantidad</th><th>Peso</th><th>Fecha de Ingreso</th></tr>";
    while ($filas = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>{$filas['codigo']}</td>";
        echo "<td>{$filas['descripcion']}</td>";
        echo "<td>{$filas['precio']}</td>";
        echo "<td>{$filas['cantidad']}</td>";
        echo "<td>{$filas['peso']}</td>";
        echo "<td>{$filas['fecha_ingreso']}</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<div class='no-resultados'>No se encontraron productos.</div>";
}
?>
<?php
if ($_SESSION['rol'] == 1) {
    echo '<a href="admin.php">Volver</a>';
} else {
    echo '<a href="empleado.php">Volver</a>';
}
?>
</body>
</html>
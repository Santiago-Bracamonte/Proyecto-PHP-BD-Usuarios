<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 1) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codigo = $_POST['codigo'];
    $accion = $_POST['accion'];

    $conexion = conectar();

    if ($accion === 'editar') {
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        $peso = $_POST['peso'];
        $fecha_ingreso = $_POST['fecha_ingreso'];

        $sql = "UPDATE productos SET descripcion='$descripcion', precio='$precio', cantidad='$cantidad', peso='$peso', fecha_ingreso='$fecha_ingreso' WHERE codigo='$codigo'";
        if (mysqli_query($conexion, $sql)) {
            header('Location: lista_productos.php');
            exit();
        } else {
            echo "Error al actualizar el producto.";
        }
    } elseif ($accion === 'eliminar') {
        $sql = "DELETE FROM productos WHERE codigo='$codigo'";
        if (mysqli_query($conexion, $sql)) {
            header('Location: lista_productos.php');
            exit();
        } else {
            echo "Error al eliminar el producto.";
        }
    }
} else {
    header('Location: lista_productos.php');
    exit();
}
?>
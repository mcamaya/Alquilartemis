<?php
if (isset($_POST['registrar'])) {
    // Obtener los datos del formulario
    $idInventario = $_POST['idInventario'];
    $idProducto = $_POST['idProducto'];
    $cantidadInicial = $_POST['cantidadInicial'];
    $cantidadFinal = $_POST['cantidadFinal'];
    $cantidadSalidas = $_POST['cantidadSalidas'];
    $cantidadEntradas = $_POST['cantidadEntradas'];
    $tipoOperacion = $_POST['tipoOperacion'];
    $estado = $_POST['estado'];

    // var_dump($_POST);
    // die();
    // Realizar las operaciones necesarias para guardar los datos en la base de datos

    // Aquí puedes escribir tu código para insertar los datos en la base de datos

    // Redireccionar a la página de inventario después de agregar el registro
    header("Location: inventario.php");
    exit();
}
?>

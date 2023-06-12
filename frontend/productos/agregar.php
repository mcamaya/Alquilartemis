<?php
require_once 'conectarProductos.php';

if(isset($_POST['registrar'])){
    $data = new Producto();
    $data->setNombre($_POST['nombre']);
    $data->setPrecio($_POST['precio']);
    $data->setCategoria($_POST['categoria']);

    $data->insertData();
    echo "<script>alert('Datos guardados con éxito'); document.location='productos.php'</script>";
}
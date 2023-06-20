<?php
require_once 'conectarEmpleados.php';

if(isset($_POST['registrar'])){
    $data = new Empleado();
    $data->setNombre($_POST['nombre']);
    $data->setEmail($_POST['email']);
    $data->setTelefono($_POST['celular']);
    $data->setPassword($_POST['password']);

    $data->insertData();
    echo "<script>alert('Datos guardados con éxito'); document.location='empleados.php'</script>";
}
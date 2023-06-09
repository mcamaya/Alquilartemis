<?php
require_once 'conectarClientes.php';

if(isset($_POST['registrar'])){
    $data = new Cliente();
    $data->setNombre($_POST['nombre']);
    $data->setNIT($_POST['nit']);
    $data->setRepresentante($_POST['representante']);
    $data->setEmail($_POST['email']);
    $data->setTelefono($_POST['celular']);

    $data->insertData();
    echo "<script>alert('Datos guardados con éxito'); document.location='clientes.php'</script>";
}
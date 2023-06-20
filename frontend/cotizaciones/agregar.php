<?php
require_once 'conectarCotizaciones.php';
if(isset($_POST['registrar'])){
    $data = new Cotizacion();
    $data->setCliente($_POST['constructora']);
    $data->setEmpleado($_POST['empleado']);
    $data->setFechaCotizacion($_POST['fechaCoti']);
    $data->setHoraCotizacion($_POST['hora']);
    $data->setFechaAlquiler($_POST['fechaAlquiler']);
    $data->setDuracion($_POST['duracion']);

    $data->insertData();
    echo "<script>alert('Datos guardados con éxito'); document.location='cotizaciones.php'</script>";
}
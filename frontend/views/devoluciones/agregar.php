<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'conectarDevoluciones.php';

if (isset($_POST['registrar'])) {
    // Obtener los datos del formulario
    $idDevolucion = $_POST['idDevolucion'];
    $idEmpleado = $_POST['idEmpleado'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    // var_dump($_POST);
    // die();
    // Crear una instancia de DevolucionManager
    $data = new DevolucionManager($idDevolucion, $idEmpleado, $fecha, $hora);
    // Insertar los datos en la base de datos
    $data->insertData();
    echo "<script>alert('Datos guardados con éxito'); document.location='devoluciones.php'</script>";
}
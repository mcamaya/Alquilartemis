<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

require_once '../config/Conectar.php';
require_once '../models/Salida.php';

$salida = new Salida();

switch ($_GET['op']) {
  case 'GetAll':
    $datos = $salida->obtainAll();
    echo json_encode($datos);
    break;

  case 'InsertData':
    $salida->insertData($_POST['fk_id_empleado'], $_POST['fecha_salida'], $_POST['hora_salida'], $_POST['placa_salida'], $_POST['observaciones_salida']);
    echo json_encode('Dato insertado con éxito');
    break;
  
  default:
    echo "<script>alert('Ha ocurrido un error');</script>";
    break;
}
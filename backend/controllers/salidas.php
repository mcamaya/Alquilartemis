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

  
  default:
    # code...
    break;
}
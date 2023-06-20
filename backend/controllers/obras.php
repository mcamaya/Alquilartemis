<?php

/* http://localhost/SkylAb-108/Alquilartemis/backend/controllers/obras.php?op=GetAll */

ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

require_once '../config/Conectar.php';
require_once '../models/Obra.php';

$obra = new Obra();

switch ($_GET['op']) {
  case 'GetAll':
    $datos = $obra->obtainAll();
    echo json_encode($datos);
    break;

  
  default:
    echo "<script>alert('Ha ocurrido un error');</script>";
    break;
}
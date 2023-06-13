<?php
require_once 'conectarProductosCotizaciones.php';

if(isset($_POST['registrar'])){
  $data = new Registro();
  $data->setProducto($_POST['producto_id']);
  $data->setCotizacion($_POST['cotizacion_id']);

  $data->insertData();
  echo "<script>alert('Datos guardados con éxito'); document.location='productosCotizaciones.php'</script>";
}
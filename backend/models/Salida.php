<?php

class Salida extends Conectar {

  public function __construct(){
    parent::__construct();
  }

  public function obtainAll(){
    try {
      $stm = $this->db->prepare("
      SELECT salidas.id_salida, salidas.fk_id_empleado, salidas.fecha_salida, salidas.hora_salida, salidas.placa_salida, salidas.observaciones_salida, empleados.nombre_empleado FROM salidas
      INNER JOIN empleados ON salidas.fk_id_empleado = empleados.id_empleado
      ");      
      
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
      return $e->getMessage();
    }
  }

  public function insertData($empleado, $fecha, $hora, $placa, $observaciones){
    try {
      $stm = $this->db->prepare("INSERT INTO salidas (fk_id_empleado, fecha_salida, hora_salida, placa_salida, observacion_salida) VALUES (:emp, :fecha, :hora, :placa, :obs)");
      $stm->bindParam(":emp", $empleado);
      $stm->bindParam(":fecha", $fecha);
      $stm->bindParam(":hora", $hora);
      $stm->bindParam(":placa", $placa);
      $stm->bindParam(":obs", $observaciones);
      $stm->execute();
    } catch (\Throwable $th) {
      //throw $th;
    }

  }

}
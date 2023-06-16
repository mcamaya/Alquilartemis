<?php

class Salida extends Conectar {

  public function obtainAll(){
    try {
      $conectar = parent::Conexion();
      parent::set_name();

      $stm = $conectar->prepare("SELECT * FROM salidas");
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
      return $e->getMessage();
    }
  }

}
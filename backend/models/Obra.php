<?php

class Obra extends Conectar {

  public function __construct(){
    parent::__construct();
  }

  public function obtainAll(){
    try {
      $stm = $this->db->prepare("SELECT obras.id_obra, obras.descripcion_obra, obras.ubicacion_obra, constructoras.nombre_constructora FROM obras
      INNER JOIN constructoras ON constructoras.id_constructora = obras.fk_id_constructora
      ");      
      
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $e) {
      return $e->getMessage();
    }
  }


}
<?php

require_once ('../../../backend/config/conexion.php');

class DevolucionManager extends Conectar{
    private $idDevolucion;
    private $idEmpleado;
    private $fecha;
    private $hora;
    
    public function __construct($idDevolucion=0, $idEmpleado=0, $fecha="", $hora="", $dbCnx="") {
        $this->idDevolucion = $idDevolucion;
        $this->idEmpleado = $idEmpleado;
        $this->fecha = $fecha;
        $this->hora = $hora;
        parent::__construct($dbCnx);
    }
    
    // Getters y setters
    
    public function getIdDevolucion() {
        return $this->idDevolucion;
    }
    
    public function setIdDevolucion($idDevolucion) {
        $this->idDevolucion = $idDevolucion;
    }
    
    public function getIdEmpleado() {
        return $this->idEmpleado;
    }
    
    public function setIdEmpleado($idEmpleado) {
        $this->idEmpleado = $idEmpleado;
    }
    
    public function getFecha() {
        return $this->fecha;
    }
    
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    
    public function getHora() {
        return $this->hora;
    }
    
    public function setHora($hora) {
        $this->hora = $hora;
    }
    public function insertData(){
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO devoluciones(id_devolucion, id_empleado, fecha, hora) values(?,?,?,?) ");
            $stm->execute([$this->idDevolucion, $this->idEmpleado, $this->fecha, $this->hora]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtainAll(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM devoluciones");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtainOne(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM devoluciones WHERE id = ?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this->dbCnx->prepare("UPDATE devoluciones SET id_devolucion = ?, id_empleado = ?, fecha = ?, hora = ? WHERE id = ?");
            $stm->execute([$this->idDevolucion, $this->idEmpleado, $this->fecha, $this->hora, $this->id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(){
        try {
            $stm = $this->dbCnx->prepare("DELETE FROM devoluciones WHERE id = ?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

?>
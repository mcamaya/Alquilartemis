<?php
require_once '../../backend/config/conexion.php';

class Registro extends Conectar{
    private $id;
    private $producto;
    private $cotizacion;

    public function __construct($id=0, $producto=0, $cotizacion=0, $dbCnx=""){
        $this->id = $id;
        $this->producto = $producto;
        $this->cotizacion = $cotizacion;
        parent::__construct($dbCnx);
    }

    public function setId($id){
        $this->id = $id;
    }
    public function setProducto($producto){
        $this->producto = $producto;
    }
    public function setCotizacion($cotizacion){
        $this->cotizacion = $cotizacion;
    }


    public function getId(){
        return $this->id;
    }
    public function getProducto(){
        return $this->producto;
    }
    public function getCotizacion(){
        return $this->cotizacion;
    }

    public function insertData(){
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO productos_x_cotizaciones(fk_id_producto, fk_id_detalle) values(?,?) ");
            $stm->execute([$this->producto, $this->cotizacion]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtainAll(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM productos_x_cotizaciones");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function obtainAll_innerJoin(){
        try {
            $stm = $this->dbCnx->prepare("
            SELECT cotizaciones.id_cotizacion, empleados.nombre_empleado, constructoras.nombre_constructora, cotizaciones.fecha_cotizacion, cotizaciones.hora_cotizacion, cotizaciones.dia_alquiler, cotizaciones.duracion_alquiler FROM cotizaciones
            INNER JOIN empleados ON cotizaciones.fk_id_empleado = empleados.id_empleado
            INNER JOIN constructoras ON cotizaciones.fk_id_constructora = constructoras.id_constructora
            ");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(){
        try {
            $stm = $this->dbCnx->prepare("DELETE FROM productos_x_cotizaciones WHERE id_registro = ?");
            $stm -> execute([$this->id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
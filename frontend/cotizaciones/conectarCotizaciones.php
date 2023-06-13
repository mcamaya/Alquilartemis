<?php
require_once '../../backend/config/conexion.php';

class Cotizacion extends Conectar{
    private $id;
    private $empleado;
    private $cliente;
    private $fechaCotizacion;
    private $horaCotizacion;
    private $fechaAlquiler;
    private $duracion;

    public function __construct($id=0, $empleado=0, $cliente=0, $fechaCotizacion="", $horaCotizacion="", $fechaAlquiler=0, $duracion=0, $dbCnx=""){
        $this->id = $id;
        $this->empleado = $empleado;
        $this->cliente = $cliente;
        $this->fechaCotizacion = $fechaCotizacion;
        $this->horaCotizacion = $horaCotizacion;
        $this->fechaAlquiler = $fechaAlquiler;
        $this->duracion = $duracion;
        parent::__construct($dbCnx);
    }

    public function setId($id){
        $this->id = $id;
    }
    public function setEmpleado($empleado){
        $this->empleado = $empleado;
    }
    public function setCliente($cliente){
        $this->cliente = $cliente;
    }
    public function setFechaCotizacion($fechaCotizacion){
        $this->fechaCotizacion = $fechaCotizacion;
    }
    public function setHoraCotizacion($horaCotizacion){
        $this->horaCotizacion = $horaCotizacion;
    }
    public function setFechaAlquiler($fechaAlquiler){
        $this->fechaAlquiler = $fechaAlquiler;
    }
    public function setDuracion($duracion){
        $this->duracion = $duracion;
    }

    public function getId(){
        return $this->id;
    }
    public function getEmpleado(){
        return $this->empleado;
    }
    public function getCliente(){
        return $this->cliente;
    }
    public function getFechaCotizacion(){
        return $this->fechaCotizacion;
    }
    public function getHoraCotizacion(){
        return $this->horaCotizacion;
    }
    public function getFechaAlquiler(){
        return $this->fechaAlquiler;
    }
    public function getDuracion(){
        return $this->duracion;
    }

    public function insertData(){
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO cotizaciones(fk_id_empleado, fk_id_constructora, fecha_cotizacion, hora_cotizacion, dia_alquiler, duracion_alquiler) values(?,?,?,?,?,?) ");
            $stm->execute([$this->empleado, $this->cliente, $this->fechaCotizacion, $this->horaCotizacion, $this->fechaAlquiler, $this->duracion]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtainAll(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM cotizaciones");
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

    public function obtainProductos(){
        try {
            $stm = $this->dbCnx->prepare("
            SELECT * FROM (SELECT productos_x_cotizaciones.fk_id_producto, productos_x_cotizaciones.fk_id_detalle, productos.nombre_producto, productos.precio_x_dia FROM productos_x_cotizaciones
            INNER JOIN productos ON productos_x_cotizaciones.fk_id_producto = productos.id_producto) AS resultado WHERE fk_id_detalle = ?
            ");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(){
        try {
            $stm = $this->dbCnx->prepare("DELETE FROM cotizaciones WHERE id_cotizacion = ?");
            $stm -> execute([$this->id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
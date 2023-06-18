<?php
require_once('../../../backend/config/conexion.php');

class InventarioManager extends Conectar{
    private $idInventario;
    private $idProducto;
    private $cantidadInicial;
    private $cantidadFinal;
    private $cantidadSalidas;
    private $cantidadEntradas;
    private $tipoOperacion;
    private $estado;
    
    public function __construct($idInventario=0, $idProducto=0, $cantidadInicial="", $cantidadFinal="", $cantidadSalidas="", $cantidadEntradas="", $tipoOperacion="", $estado="",$dbCnx="") {
        $this->idInventario = $idInventario;
        $this->idProducto = $idProducto;
        $this->cantidadInicial = $cantidadInicial;
        $this->cantidadFinal = $cantidadFinal;
        $this->cantidadSalidas = $cantidadSalidas;
        $this->cantidadEntradas = $cantidadEntradas;
        $this->tipoOperacion = $tipoOperacion;
        $this->estado = $estado;
        parent::__construct($dbCnx);
    }
    
    // Getters y setters
    
    public function getIdInventario() {
        return $this->idInventario;
    }
    
    public function setIdInventario($idInventario) {
        $this->idInventario = $idInventario;
    }
    
    public function getIdProducto() {
        return $this->idProducto;
    }
    
    public function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }
    
    public function getCantidadInicial() {
        return $this->cantidadInicial;
    }
    
    public function setCantidadInicial($cantidadInicial) {
        $this->cantidadInicial = $cantidadInicial;
    }
    
    public function getCantidadFinal() {
        return $this->cantidadFinal;
    }
    
    public function setCantidadFinal($cantidadFinal) {
        $this->cantidadFinal = $cantidadFinal;
    }
    
    public function getCantidadSalidas() {
        return $this->cantidadSalidas;
    }
    
    public function setCantidadSalidas($cantidadSalidas) {
        $this->cantidadSalidas = $cantidadSalidas;
    }
    
    public function getCantidadEntradas() {
        return $this->cantidadEntradas;
    }
    
    public function setCantidadEntradas($cantidadEntradas) {
        $this->cantidadEntradas = $cantidadEntradas;
    }
    
    public function getTipoOperacion() {
        return $this->tipoOperacion;
    }
    
    public function setTipoOperacion($tipoOperacion) {
        $this->tipoOperacion = $tipoOperacion;
    }
    
    public function getEstado() {
        return $this->estado;
    }
    
    public function setEstado($estado) {
        $this->estado = $estado;
    }
    
    public function insertData(){
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO inventario(id_inventario, id_producto, cantidad_inicial, cantidad_final, cantidad_salidas, cantidad_entradas, tipo_operacion, estado) values(?,?,?,?,?,?,?,?) ");
            $stm->execute([$this->idInventario, $this->idProducto, $this->cantidadInicial, $this->cantidadFinal, $this->cantidadSalidas, $this->cantidadEntradas, $this->tipoOperacion, $this->estado]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtainAll(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM inventario");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

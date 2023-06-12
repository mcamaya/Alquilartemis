<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

require_once '../../backend/config/conexion.php';

class Producto extends Conectar{
    private $id;
    private $nombre;
    private $precio;
    private $categoria;

    public function __construct($id=0, $nombre="", $precio=0, $categoria="", $dbCnx=""){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->categoria = $categoria;
        parent::__construct($dbCnx);
    }

    public function setId($id){
        $this->id = $id;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setPrecio($precio){
        $this->precio = $precio;
    }
    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }

    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getPrecio(){
        return $this->precio;
    }
    public function getCategoria(){
        return $this->categoria;
    }

    public function insertData(){
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO productos(nombre_producto, precio_x_dia, categoria_producto) values(?,?,?) ");
            $stm->execute([$this->nombre, $this->email, $this->telefono, MD5($this->password)]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtainAll(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM empleados");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtainOne(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM empleados WHERE id_empleado = ?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this->dbCnx->prepare("UPDATE empleados SET nombre_empleado = ?, email_empleado = ?, celular_empleado = ?  WHERE id_empleado = ?");
            $stm->execute([$this->nombre, $this->email, $this->telefono, $this->id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(){
        try {
            $stm = $this->dbCnx->prepare("DELETE FROM empleados WHERE id_empleado = ?");
            $stm -> execute([$this->id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
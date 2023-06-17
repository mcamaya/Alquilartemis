<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

require_once ('../../../backend/config/conexion.php');

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
            $stm = $this->dbCnx->prepare("INSERT INTO productos(nombre_producto, precio_x_dia, categoria_producto) values(?,?,?)");
            $stm->execute([$this->nombre, $this->precio, $this->categoria]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtainAll(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM productos");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtainAll_innerJoin(){
        try {
            $stm = $this->dbCnx->prepare("
            SELECT productos.id_producto, productos.nombre_producto, productos.precio_x_dia, categorias.nombre_categoria FROM productos
            INNER JOIN categorias ON productos.categoria_producto = categorias.id_categoria
            ");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtainOne(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM productos WHERE id_producto = ?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this->dbCnx->prepare("UPDATE productos SET nombre_producto = ?, precio_x_dia = ?, categoria_producto = ?  WHERE id_producto = ?");
            $stm->execute([$this->nombre, $this->precio, $this->categoria, $this->id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(){
        try {
            $stm = $this->dbCnx->prepare("DELETE FROM productos WHERE id_producto = ?");
            $stm -> execute([$this->id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
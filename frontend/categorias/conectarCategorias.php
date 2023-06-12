<?php
require_once '../../backend/config/conexion.php';

class Categoria extends Conectar{
    private $id;
    private $nombre;
    private $descripcion;
    private $img;

    public function __construct($id=0, $nombre="", $descripcion="", $img="", $dbCnx=""){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->img = $img;
        parent::__construct($dbCnx);
    }

    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function getImg(){
        return $this->img;
    }

    public function setId($id){
        $this->id = $id;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    public function setImg($img){
        $this->img = $img;
    }

    public function insertData(){
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO categorias(nombre_categoria, descripcion_categoria, img_categoria) values(?,?,?) ");
            $stm->execute([$this->nombre, $this->descripcion, $this->img]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtainAll(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM categorias");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtainOne(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM categorias WHERE id_categoria = ?");
            $stm->execute([$this->id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this->dbCnx->prepare("UPDATE categorias SET nombre_categoria = ?, descripcion_categoria = ? WHERE id_categoria = ?");
            $stm->execute([$this->nombre, $this->descripcion, $this->id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateWithImg(){
        try {
            $stm = $this->dbCnx->prepare("UPDATE categorias SET nombre_categoria = ?, descripcion_categoria = ?, img_categoria = ? WHERE id_categoria = ?");
            $stm->execute([$this->nombre, $this->descripcion, $this->img, $this->id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(){
        try {
            $stm = $this->dbCnx->prepare("DELETE FROM categorias WHERE id_categoria = ?");
            $stm -> execute([$this->id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

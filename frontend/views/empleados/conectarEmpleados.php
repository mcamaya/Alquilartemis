<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);


require_once ('../../../backend/config/conexion.php');

class Empleado extends Conectar{
    private $id;
    private $nombre;
    private $password;
    private $email;
    private $telefono;

    public function __construct($id=0, $nombre="", $password="", $email="", $telefono=0, $dbCnx=""){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->password = $password;
        $this->email = $email;
        $this->telefono = $telefono;
        parent::__construct($dbCnx);
    }

    public function setId($id){
        $this->id = $id;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getTelefono(){
        return $this->telefono;
    }

    public function insertData(){
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO empleados(nombre_empleado, email_empleado, celular_empleado, password_empleado) values(?,?,?,?) ");
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

    public function updateNoPass(){
        try {
            $stm = $this->dbCnx->prepare("UPDATE empleados SET nombre_empleado = ?, email_empleado = ?, celular_empleado = ?  WHERE id_empleado = ?");
            $stm->execute([$this->nombre, $this->email, $this->telefono, $this->id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateWithPass(){
        try {
            $stm = $this->dbCnx->prepare("UPDATE empleados SET nombre_empleado = ?, email_empleado = ?, celular_empleado = ?, password_empleado = ?  WHERE id_empleado = ?");
            $stm->execute([$this->nombre, $this->email, $this->telefono, MD5($this->password), $this->id]);
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
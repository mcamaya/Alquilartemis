<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);

require_once '../../backend/config/conexion.php';

class Cliente extends Conectar{
    private $id;
    private $nit;
    private $nombre;
    private $representante;
    private $email;
    private $telefono;

    public function __construct($id=0, $nit=0, $nombre="", $representante="", $email="", $telefono=0, $dbCnx=""){
        $this->id = $id;
        $this->nit = $nit;
        $this->nombre = $nombre;
        $this->representante = $representante;
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
    public function setNIT($nit){
        $this->nit = $nit;
    }
    public function setRepresentante($representante){
        $this->representante = $representante;
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
    public function getNIT(){
        return $this->nit;
    }
    public function getRepresentante(){
        return $this->representante;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getTelefono(){
        return $this->telefono;
    }

    public function insertData(){
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO constructoras(nombre_constructora, nit_constructora, nombre_representante, email_contacto, telefono_contacto) values(?,?,?,?,?) ");
            $stm->execute([$this->nombre, $this->nit, $this->representante, $this->email, $this->telefono]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtainAll(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM constructoras");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
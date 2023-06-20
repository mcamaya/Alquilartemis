<?php
class Conectar {
  protected $db;

  protected function __construct(){
    try {
      $this->db = new PDO("mysql:local=localhost;dbname=alquilartemis", "campus", "campus2023");
      $this->db->query("SET NAMES 'utf8'");
    } catch (Exception $e) {
      return $e->getMessage();
      die();
    }
  }

}
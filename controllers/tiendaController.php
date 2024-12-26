<?php
require_once("models/zapato.php");

class tiendaController {

  public $zapato;
  
  public function __construct() {
    $this->zapato = new zapato();
  }

  public function index() {
    $zapatos = $this->zapato->listar();
    $_POST = array();
    require_once("views/home.php");
  }

  public function home() {
    $zapatos = $this->zapato->listar();
    $_POST = array();
    require_once("views/home.php");
  }
}


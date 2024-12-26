<?php 
class conexion {
  public static function conectar() {
    $conn = new PDO("mysql:host=localhost;dbname=zapatos;charset=utf8","root","");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
  }
}
?>
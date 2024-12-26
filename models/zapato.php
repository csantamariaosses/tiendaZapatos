<?php

require_once "config/conexion.php";

class zapato {
    public $conn;

    public function __construct() {
      try {
        $this->conn = conexion::conectar();
      } catch ( Exception $ex ) {
        die( $ex->getMessage());
      }
    }


    public function listar() {
      try {
            $query  = " Select z.id, z.precio, z.color, e.estilo, t.talla, g.genero, z.cantidad, z.imagen "; 
            $query .= " From zapatos z ";
            $query .= " inner join estilos e on( z.id_estilo = e.id) ";
            $query .= " inner join tallas  t on( z.id_talla  = t.id) ";
            $query .= " inner join generos g on( z.id_genero = g.id) ";
            $query .= " order by z.id desc ";

            
            $stmt = $this->conn->prepare( $query );
            $stmt->execute();
            $result = $stmt->fetchAll();
            
            return $result;

      } catch ( Exception $ex) {
          die( $ex->getMessage());
      }
    }
}
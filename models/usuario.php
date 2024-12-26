<?php

require_once "config/conexion.php";

class usuario {
  public $cnx;

  public function __construct() {
    try {

      $this->conn = conexion::conectar();

    } catch ( Exception $ex ) {
      die( $ex->getMessage());
    }
  }


  public function listar() {
    //echo "<br>model: usuario:listar" ;
     try {
          $query  = " Select id, email, password "; 
          $query .= " From  usuarios ";
          
          $stmt = $this->conn->prepare( $query );
          $stmt->execute();
          $result = $stmt->fetchAll();
          
          //print_r( $result );

          return $result;

     } catch ( Exception $ex) {
        die( $ex->getMessage());
     }
  }

  public function save($email, $password){
         try {
           $sql  = "INSERT INTO usuarios ";
           $sql .= "(email, password) values ";
           $sql .= "(?, ?)";
           $stmt = $this->conn->prepare( $sql );
           //$password_hash = password_hash($password, PASSWORD_DEFAULT);
           $pass_md5 = md5( $password );

           $stmt->bindParam(1, $email) ;
           $stmt->bindParam(2, $pass_md5);
           $stmt->execute();
           $lastId = $this->conn->lastInsertId();
          
           return $lastId;
          } catch ( Exception $ex) {
            die( $ex->getMessage());
          }

  }

  public function acceso($email, $password) {

       //$password_hash = password_hash( $password, PASSWORD_DEFAULT);
       $pass_md5 = md5( $password );
       
       try {
           $sql = "SELECT id, email, password FROM usuarios WHERE email=? and password=?";
           $stmt = $this->conn->prepare( $sql );

           $stmt->bindParam(1, $email) ;
           $stmt->bindParam(2, $pass_md5) ;
           $stmt->execute();
           $result = $stmt->fetch();

           return $result;
       } catch (  Exception $ex) {
        die( $ex->getMessage());
       }
  }

  public function findById( $id ) {
    try {
      $query  = " Select id, email, password "; 
      $query .= " From usuarios ";
      $query .= " where id=?  ";
      
      $stmt = $this->conn->prepare( $query );
      $stmt->bindParam(1,$id);
      $stmt->execute();
      $result = $stmt->fetch();
      
      return $result;

      } catch ( Exception $ex) {
          die( $ex->getMessage());
      }
  }

  public function findByEmail( $email ) {
    echo "<br>FindByEmail";
    try {
      $query  = " Select count(*) as cantidad "; 
      $query .= " From usuarios ";
      $query .= " where trim(email)=trim(?) limit 1 ";
      
      ECHO "<BR>". $query;
      $stmt = $this->conn->prepare( $query );
      $stmt->bindParam(1,$email);
      $stmt->execute();
      $result = $stmt->fetch( PDO::FETCH_ASSOC);
       
      return $result;

      } catch ( Exception $ex) {
          die( $ex->getMessage());
      }
  }

  public function update( $id, $email, $password) {
     try {
       $sql  = "UPDATE usuarios ";
       $sql .= "SET  ";
       $sql .= " password = ?";
       $sql .= " WHERE id = ?";

       $stmt = $this->conn->prepare( $sql );
       $stmt->bindParam(1,$password);
       $stmt->bindParam(2,$id);
       $stmt->execute();
       $result = $stmt->fetch();
      
       return $result;
     } catch ( Exception $ex) {
       die( $ex->getMessage());
     }
  }

  public function delete( $id) {
    try {
      $sql = " DELETE FROM usuarios WHERE id= ? ";
      $stmt = $this->conn->prepare( $sql );
      $stmt->bindParam(1, $id);
      $stmt->execute();
      return 1;
    } catch (Exception $ex) {
      die( $ex->getMessage());
    }
  }


}
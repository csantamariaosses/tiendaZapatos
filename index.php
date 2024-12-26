<?php
require_once ("vendor/autoload.php");
require_once("controllers/tiendaController.php");

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
//$dotenv = new Dotenv\Dotenv('../../');
$dotenv->load();

echo "<br>DB_USER::" . $_ENV['DB_USER'];

if( !isset($_REQUEST['c'])) {
  $controller = new tiendaController();
  $controller->index();
} else {
  $controller = $_REQUEST['c'];
  $action     = $_REQUEST['a'];

  switch( $controller  ){

    case "tiendaController":
          require_once("controllers/tiendaController.php");
          $controller = new tiendaController();
          break;
  }
        

  call_user_func( array($controller, $action));
}



?>
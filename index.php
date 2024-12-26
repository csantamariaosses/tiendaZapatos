<?php
require_once("controllers/tiendaController.php");


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
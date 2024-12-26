<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="resources/css/materialize.min.css">
  <style>
  .back-red {
    background-color:#ff4d4d;
  }

  .foreground-rojo {
    color:#FF0000;
  }
  </style>
</head>
<body>
  <div class="container">
      <div class="row center-align">
           <h3>TIENDA DE ZAPATOS</H3>
      </div>
  </DIV>
  <div class="container">
      <div class="row">
          <!-- Dropdown Structure -->
            <ul id="dropdown1" class="dropdown-content">
              <li><a href="#">one</a></li>
              <li><a href="#">two</a></li>
              <li class="divider"></li>
              <li><a href="#">three</a></li>
            </ul>
            <nav>
              <div class="nav-wrapper">
                <ul><li><a href="?c=tiendaController&a=home" class="brand-logo">Logo</a></li> </ul>  
                <ul class="right hide-on-med-and-down">
                  <?php if( isset( $_SESSION['usuario'] ) ) 
                     echo '<li>'.$_SESSION['usuario'] .'</li>';
                   else
                     echo '<li></li>';                      
                  ?>
                  <!-- <li><a href="?c=zapatosController&a=index">Zapatos</a></li> -->

                  <?php if( isset( $_SESSION['usuario'] ) )  { ?>
                  <li><a href="?c=usuariosController&a=index">Usuarios</a></li>
                  <?php } ?>
                  <!-- Dropdown Trigger -->
                  <li><a class="dropdown-trigger" href="#" data-target="dropdown1">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>
                  <?php if( isset($_SESSION['usuario'])) { ?>
                    <li><a href="?c=usuariosController&a=logout">Logout</a></li>
                  <?php } else { ?> 
                    <li><a href="?c=adminController&a=login">Login</a> </li>                    
                  <?php } ?>
                  <li><a href="?c=logout">Logout2</a></li>
                  <li><a href="?c=adminController&a=creaCuenta">Crea Cuenta</a></li>
                
                </ul>
              </div>
            </nav>
      </div>
  </DIV>
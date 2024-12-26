<?php
require_once "models/zapato.php";

require_once "views/partials/header.php";
?>

<div class="container">
   <div class="row">
       <?php foreach( $zapatos as $zapato ) { ?>
       <div class="col s4">            
            <div class="card">
                <div class="card-image">
                <?php echo "<img src='uploads/" .$zapato['imagen'] . "'  width='200' height='400'>" ?>
                <span class="card-title">Card Title</span>
                </div>
                <div class="card-content">
                    <p>I am a very simple card. I am good at containing small bits of information.
                    I am convenient because I require little markup to use effectively.</p>
                    <p>Color: <?php echo $zapato['color']?></p>
                    <p>Precio: <?php echo $zapato['precio']?></p>
                </div>
                <div class="card-action">
                    <a href="#">This is a link</a>
                </div>
            </div>
           
        </div>
        <?php } ?>
   </div>
</div>  
<?php require_once "views/partials/footer.php"; ?>

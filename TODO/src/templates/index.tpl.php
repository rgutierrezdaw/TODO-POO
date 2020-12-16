<?php
include 'header.tpl.php';
include 'indexnav.tpl.php';
?>
<div class="index col-md-12">
<section class="d-flex flex-wrap align-items-start">
    <div class="col-md-7 d-flex flex-column justify-content-center welcome">
        <h2 style="font-family: 'Comfortaa', Sans Serif;">Benvingud@</h2>
        <br></br>
        <p style="font-family: 'Roboto', Sans Serif;">
            Amb Task Manager podràs organitzar-te la feïna. Crea les teves tasques i posa un temps determinat per 
            dur-les a terme. A cada tasca podràs posar les passes que necessitis seguir per completar la tasca sencera,
            de manera que t'ajudi a conseguir l'execució mitjançant petits objectius.
        </p>
        <p style="font-family: 'Roboto', Sans Serif;">Per utilitzar Task Manager només hauràs de registrar-te, un cop registrat ja podrás començar a organitzar-te!</p>
    </div>
    <div class="d-flex col-md-5 justify-content-center">         
        <div class="col-sm-8">
        <?php 
                if(isset($_SESSION['register'])){               
                    echo "<h3>".$_SESSION['register']."</h3>";  
                } 
            ?> 
            <?=$form?> 
            <?php 
                if(isset($_SESSION['error'])){               
                    echo "<h3>".$_SESSION['error']."</h3>";  
                } 
            ?> 
        </div>
            

    </div>                      
</section>

</div>


<?php
include 'footer.tpl.php';
?>
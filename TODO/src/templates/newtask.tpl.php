<?php

include 'header.tpl.php'; //nos saldrà definido el header
include 'usernav.tpl.php';
?>

<section>
<h1>Nova tasca:</h1>
    <div class="col-sm-12 d-flex justify-content-center">
        <form class="d-flex flex-column col-md-4" action="<?=BASE;?>tasks/createTask" method="POST">
            <div class="form-group">
                <label for="task">Nom de la tasca:</label>
                <input type="text" name="task" placeholder="Tasca nova" required>
            </div>           
            <div class="form-group d-flex flex-column">
                <label>Descripció:</label>
                <textarea type="text" name="description" placeholder="Que has de fer?"></textarea>
            </div>
            <div class="form-group">
                <label for="date">Data de finalització:</label>
                <input type="date" name="date" required> 
            </div>            
            <div class="form-group">
                <input type="submit" name="envia" value="Crea"> 
            </div>
            
        </form>
    </div>
    
</section>

<?php
include 'footer.tpl.php';
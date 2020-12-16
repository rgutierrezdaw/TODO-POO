<?php
include 'header.tpl.php';
include 'registerNav.tpl.php';
?>
<section class="col-md-12 d-flex flex-column justify-content-center register">
    <?php 
        if(isset($_SESSION['register'])){               
            echo "<h3 class='text-center text-light'>".$_SESSION['register']."</h3>";  
        } 
    ?> 
    <div class="col-md-3 align-self-center">
            <form  action="<?php echo BASE;?>user/register" method="POST">
                <h3>Registra't</h3>
                    <div class="form-group">
                        <label for="username">User name</label>
                        <input type="text" class="form-control" name="newuser" placeholder="Introdueïx l'usuari" required>             
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="newpwd" placeholder="Contrasenya" required>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Registra'm">
                </form> 
    </div>
</section>
  
<?php
include 'footer.tpl.php';
?>
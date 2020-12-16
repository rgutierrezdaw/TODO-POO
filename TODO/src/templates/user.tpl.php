<?php

include 'header.tpl.php'; //nos saldrà definido el header
include 'usernav.tpl.php';
?>

<section class="d-flex flex-column justify-content-center col-sm-12">
    <h1  >Tasques de <?php echo ucfirst($user);?></h1>
    <br>
    <div class="d-flex flex-nowrap justify-content-around col-md-12 tasks">
       <?php
       $thead='<table class="table" id="tabletasks">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Tasca</th>
                    <th scope="col">Descripció</th>
                    <th scope="col">Data finalització</th>
                    <th scope="col">Estat</th>
                    <th scope="col">Acció</th>
                  </tr>
                </thead>
                <tbody>';
        $tfinal="</tbody></table>";
       $tasks="";
            if($data){
                foreach ($data as $task){
                  if($task['completed']==0){
                    $status="Incompleta";
                    $class="table-warning";
                    $button="<input type='submit' value='Completada' name='complete' id='complete' class='action btn-outline-success btn-sm'>";       
                  }else{
                    $status="Completada";
                    $class="table-success";
                    $button="";
                  }
                  $tasks.="<tr id='task' class='".$class."'>
                            <td>".$task['taskName']."</td>
                            <td>".$task['description']."</td>
                            <td>".$task['uploadDate']."</td>
                            <td id='status'>".$status."</td>
                            <td><form class='hidden d-flex flex-column col-sm-4 ".$class."' id='taskForm' action='".BASE."tasks/modifyTask' method='POST'>
                            <input type='hidden' value='".$task['code']."' name='code'>
                            <input type='submit' value='Borrar' name='delete' class='action btn-outline-danger btn-sm'>
                            ".$button."
                            </form> </td>
                          </tr>";
                } 
                echo $thead.$tasks.$tfinal;                
            } else {
              echo $tasks.="<div class='d-flex flex-column'>
                        <h3>Encara no tens cap tasca.</h3>
                      </div>";
            } 
            
       ?>
    </div> 
</section>

<?php
include 'footer.tpl.php';
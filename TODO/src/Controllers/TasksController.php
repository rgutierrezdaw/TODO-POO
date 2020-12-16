<?php
namespace App\Controllers;

use App\Controller;
use App\Request;
use App\Session;
use App\DB;

class TasksController extends Controller{
    
    public function __construct(Request $request, Session $session){
        parent::__construct($request, $session);        
    }

    function index(){
        $this->render(['tasks'=>''], 'newtask');
    }

    public function createTask(){
        $task=filter_input(INPUT_POST,'task');
        $description=filter_input(INPUT_POST,'description');
        $date=filter_input(INPUT_POST,'date');
        $userId=(int)$_COOKIE['userId'];
        if($task != null && $description!= null && $date!= null ){        
            if($this->getDB()->newTask($task, $description, $date, $userId)== true){
                header('Location:'.BASE.'user/index'); 
            }         
        }
    }  

    public function modifyTask(){
        if(filter_input(INPUT_POST, 'delete')){
            self::deleteTask();
        }
        if(filter_input(INPUT_POST, 'complete')){
            self::completeTask();
        }        
    }

   public function deleteTask(){
    $code=(int)filter_input(INPUT_POST, 'code');   
    $db=$this->getDB();
    $stmt=$db->prepare("DELETE FROM tasks WHERE code=:code");          
    $stmt->execute([':code'=>$code]);
    header('Location:'.BASE.'user/index');     
   }

   public function completeTask(){
    $code=(int)filter_input(INPUT_POST, 'code'); 
    
    $db=$this->getDB();
    $stmt=$db->prepare("UPDATE tasks SET completed = 1 WHERE code=:code");          
    $stmt->execute([':code'=>$code]);
    header('Location:'.BASE.'user/index');     

   }
   
}







/*
public function ShowTasks(){
    $dataTask=[];
    $tasks="";
    $db=$this->getDB();
    $id=(int)$_COOKIE['userId'];         
    self::getTasks($db, $id, $dataTask);      
        if($dataTask){
            foreach ($dataTask as $task){
              $tasks.="<div class='d-flex flex-column border tasca'>
                        <h3>".$task['taskName']."</h3>
                        <p>".$task['description']."</p>
                        <p>Data d'entrega: ".$task['uploadDate']."</p>                           
                        <form action='/tasks/deleteTask' method='POST'>
                        <input type='hidden' value='".$task['code']."' name='code'>
                        <input type='submit' value='Borrar'>
                        </form>                        
                      </div>";
            }  
            $this->render(['tasks'=>$tasks], 'user');        
            //return $tasks;
        } else {
          $tasks.="<div class='d-flex flex-column'>
                    <h3>Encara no tens cap tasca.</h3>
                  </div>";
                  $this->render(['tasks'=>$tasks], 'user');   
        //return $tasks;
        } 

private function getTasks($db, $userId, &$dataTask):array{
    $stmt=$db->prepare("SELECT code, taskName, description, uploadDate FROM tasks WHERE userId = :userId");
    $stmt->execute([':userId'=>$userId]);
    $count=$stmt->rowCount();
    $dataTask=$stmt->fetchAll(\PDO::FETCH_ASSOC);     
        if($count){       
            return $dataTask;
        }else{
            return $dataTask;
        }    
}}*/

    

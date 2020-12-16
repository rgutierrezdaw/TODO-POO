<?php
namespace App;

class DB extends \PDO{
    static $instance;
    protected  $config;

    public function __construct(){
        parent::__construct(DSN,USR,PWD);
    }
    
    static function singleton(){
        if(!(self::$instance instanceof self)){
            self::$instance=new self();
        }
        return self::$instance;
    }

    public function auth($uname,$pass):bool{      
        try{  
            $stmt=self::singleton()->prepare('SELECT * FROM users WHERE name=:uname LIMIT 1');
            $stmt->execute([':uname'=>$uname]);
            $count=$stmt->rowCount();
            $row=$stmt->fetchAll(\PDO::FETCH_ASSOC);  
            if($count==1){       
                $user=$row[0];
                $res=password_verify($pass,$user['password']);                             
                if ($res){
                    $id=$user['id'];
                    setcookie('userId', $id, time()+36000,'/');          
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }catch(PDOException $e){
                return false;
            }
    }

    public function checkUserName(string $name): bool{
        $stmt=self::singleton()->prepare("SELECT 'name' FROM users WHERE name = :name LIMIT 1;");
        $stmt->execute([':name'=> $name]);
        $count=$stmt->rowCount();       
        if($count == 1){           
           return true; 
        } else {
           return false; 
        }
    }

    public function newUser( $data): bool{
        if($data){
            $newuser=$data["username"];
            $newpwd=$data["password"];
            $stmt=self::singleton()->prepare("INSERT INTO users (name, password) VALUES (:name, :password)");
            if($stmt->execute([':name'=> $newuser, ':password'=> $newpwd])){
                return true;
            }else{
                return false;
            }
        } else {
            return false;
        }
    }

    public function getTasks($userId, &$dataTask):array{       
        $db=self::singleton();
        $stmt=$db->prepare("SELECT * FROM tasks WHERE userId = :userId");
        $stmt->execute([':userId'=>$userId]);
        $count=$stmt->rowCount();      
        $dataTask=$stmt->fetchAll(\PDO::FETCH_ASSOC);    
            if($count){       
                return $dataTask;
            }else{
                return $dataTask;
            }    
    }

    public function newTask($taskName, $taskDescription, $taskDate, $userId): bool{
        $stmt=self::singleton()->prepare("INSERT INTO tasks (taskName, description, uploadDate, userId) VALUES (?, ?, ?, ? )");
        $stmt->bindParam(1, $taskName);
        $stmt->bindParam(2, $taskDescription);
        $stmt->bindParam(3, $taskDate);
        $stmt->bindParam(4, $userId);
        if($stmt->execute()){
           return true;          
        }else {
            return false;
        }
    }
}

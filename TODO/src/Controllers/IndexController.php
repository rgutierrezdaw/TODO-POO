<?php
namespace App\Controllers;

use App\Request;
use App\Controller;
use App\Session;

final class IndexController extends Controller{

    public function __construct(Request $request, Session $session){
        parent::__construct($request, $session);
    }

    public function index(){ 
        $form=self::getForm();     
        $dataview=['form'=>$form]; 
        $this->render($dataview);
    }

    public function getForm():String{
        $form="";
        if (self::checkUser()==true){
            $form="<form action='".BASE."user/login' method='POST'>
                        <h3>Inicia sessió</h3>
                        <div class='form-group'>
                            <label for='username'>User name</label>
                            <input type='text' class='form-control' name='username' value='".$_COOKIE['user']."' required>             
                        </div>
                        <div class='form-group'>
                            <label for='password'>Password</label>
                            <input type='password' class='form-control' name='password' value='".$_COOKIE['pwd']."' required>
                        </div>
                        <p class='font-weight-bold'>Última connexió realitzada el: </p>  
                        <p>".$_COOKIE['lastconnection']."</p>                     
                        <input type='submit' class='btn btn-primary' value='Inicia sessió'> <br>
                        <a href='".BASE."user/change'>Canvia de compte</a>              
                    </form>";
                   
        } else {
            $form = "<form action='".BASE."user/login' method='POST'>
                        <h3>Inicia sessió</h3>
                        <div class='form-group'>
                            <label for='username'>User name</label>
                            <input type='text' class='form-control' name='username' placeholder='Introdueïx usuari' required>             
                        </div>
                        <div class='form-group'>
                            <label for='password'>Password</label>
                            <input type='password' class='form-control' name='password' placeholder='Introdueïx la contrasenya' required>
                        </div>
                        <input type='checkbox' name='rememberUser'>
                        <label for='rememberUser'>Guarda l'usuari en aquest equip</label><br>
                        <input type='submit' class='btn btn-primary' value='Inicia sessió'><br>             
                </form>";
        }
        return $form;
    }

    public function checkUser():bool{
        if(!isset($_COOKIE['user']) && !isset($_COOKIE['pwd'])){
            return false;   
        }else{
            return true; 
        }

    }

}
/*db5001159986.hosting-data.io */
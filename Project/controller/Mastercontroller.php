<?php

require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');

require_once('view/LoginView.php');
require_once('controller/LoginController.php');
require_once('model/LoginModel.php');

require_once('view/Registerview.php');
require_once('controller/RegisterController.php');
require_once('model/RegisterModel.php');
require_once('model/RegisterDAL.php');


class Mastercontroller{
    
    public function Startapplication() {
    
    
        $dtv = new DateTimeView(); //Ny datetimeview
        $layout = new LayoutView(); //Ny layoutview
        $rd = new RegisterDAL();
        
        $uri = $_SERVER["REQUEST_URI"];
        $uri = explode("?",$uri);
        
        $lm = new LoginModel($rd); //Annars körs view.
        $lv = new LoginView($lm); 
    
        
        if(count($uri) > 1 && $uri[1] == "Register")
        {
            $isLoggedIn = false;
            
            $rm = new RegisterModel($rd);
            $rv = new Registerview($rm);
            $c = new RegisterController($rv,$rm, $lv);
            
            $v = $c->Init();
        }
        else
        {
            
            $c = new LoginController($lv,$lm);
            
            $v = $c->Init();
            $isLoggedIn = $lm->Issessionset();
        }
        
        
         $layout->render($isLoggedIn, $v, $dtv);
    }

}

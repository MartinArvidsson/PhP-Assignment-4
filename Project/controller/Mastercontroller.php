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
        

        
        $lm = new LoginModel($rd); //Annars körs view.
        $lv = new LoginView($lm); 
    
        
        if(isset($_GET['register'])){

            $isLoggedIn = false;
            
            $rm = new RegisterModel($rd);
            $rv = new Registerview($rm);
            $c = new RegisterController($rv,$rm, $lv);
            
            $this->v = $c->Init();
        
        }
        else
        {
            
            $c = new LoginController($lv,$lm);
            
            $this->v = $c->Init();
            $isLoggedIn = $lm->Issessionset();
        }
        
        
         $layout->render($isLoggedIn, $this->v, $dtv);
    }

}

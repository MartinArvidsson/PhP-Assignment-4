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
    $lv = new LayoutView(); //Ny layoutview
    
    $uri = $_SERVER["REQUEST_URI"];
    $uri = explode("?",$uri);

    

    
    if(count($uri) > 1 && $uri[1] == "Register")
    {
    $rd = new RegisterDAL();    
    $rm = new RegisterModel($rd);
    $rv = new Registerview($rm);
    $rc = new RegisterController($rv,$rm,$dtv,$lv);
    
    $rc->Init();
    }
    else
    {
    $lm = new LoginModel(); //Annars körs view.
    $v = new LoginView($lm); 
    $lc = new LoginController($v,$lm,$dtv,$lv);
    
    $lc->Init();
    }
}

}

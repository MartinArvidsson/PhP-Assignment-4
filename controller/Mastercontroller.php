<?php

require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');

require_once('view/LoginView.php');
require_once('controller/LoginController.php');
require_once('model/LoginModel.php');

require_once('view/Registerview.php');
require_once('controller/RegisterController.php');
require_once('model/RegisterModel.php');


class Mastercontroller{
    
    public function Startapplication() {
    
    
    $dtv = new DateTimeView(); //Ny datetimeview
    $lv = new LayoutView(); //Ny layoutview
    
    $uri = $_SERVER["REQUEST_URI"];
    $uri = explode("?",$uri);
    
    $rm = new RegisterModel();
    $rv = new Registerview($rm);
    $rc = new RegisterController($rv,$rm,$dtv,$lv);
    
    $lm = new LoginModel(); //Annars körs view.
    $v = new LoginView($lm); 
    $lc = new LoginController($v,$lm,$dtv,$lv);
    
    if(count($uri) > 1 && $uri[1] == "Register")
    {
    
    
    $rc->Init();
    }
    else
    {
    
    
    $lc->Init();
    }
}

}

//Skapa mastercontroller, ska kolla url, OM den inehåller 'register' kör en registercontroller som kallar på registerview som skapar hyperlänk till layoutmodel som kallar på registerview
//som skapar en hyperlänk till registercontroller....
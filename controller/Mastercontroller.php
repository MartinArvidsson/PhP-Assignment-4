<?php
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('controller/LoginController.php');
require_once('model/LoginModel.php');
require_once('view/Registerview.php');
require_once('model/RegisterModel.php');
require_once('controller/RegisterController.php');    
class Mastercontroller{
    
    public function __construct() {
    
    
    $dtv = new DateTimeView(); //Ny datetimeview
    $lv = new LayoutView(); //Ny layoutview
    $lm = new LoginModel(); // Ny loginmodel
    $v = new LoginView($lm); //Ny loginview med en instans av LoginModel
    $lc = new LoginController($v,$lm); // Ny logincontroller med instanser av Loginview samt LoginModell
    
    $rm = new RegisterModel();
    $rv = new Registerview($rm);
    $rc = new RegisterController($rv,$rm);
    
    //SAKER FÖR REGISTER SKA HIT:
    
    
    //TODO: KOLLA OM MAN VILL TILL REGISTER ELLER INTE BEROENDE PÅ URL, DATAN KOLLAS I NAVIGATIONVIEW, FIXA REGISTER/VIEW TILLS LÖRDAG EM.
    
    
    
    //SAKER FÖR VIEW SKA HIT:
    
    $lc->checkLogin(); //Startar checkLogin
    $html = $v->response(); 
    $lv->render($lm->Issessionset(), $html, $dtv);

    }
}

//Skapa mastercontroller, ska kolla url, OM den inehåller 'register' kör en registercontroller som kallar på registerview som skapar hyperlänk till layoutmodel som kallar på registerview
//som skapar en hyperlänk till registercontroller....
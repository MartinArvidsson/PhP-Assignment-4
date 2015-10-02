<?php

//INCLUDE THE FILES NEEDED...
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('controller/LoginController.php');
require_once('model/LoginModel.php');
//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//CREATE OBJECTS OF THE VIEWS

$dtv = new DateTimeView(); //Ny datetimeview
$lv = new LayoutView(); //Ny layoutview
$lm = new LoginModel(); // Ny loginmodel
$v = new LoginView($lm); //Ny loginview med en instans av LoginModel
$lc = new LoginController($v,$lm); // Ny logincontroller med instanser av Loginview samt LoginModell

$lc->checkLogin(); //Startar checkLogin


$html = $v->response(); 

$lv->render($lm->Issessionset(), $html, $dtv);

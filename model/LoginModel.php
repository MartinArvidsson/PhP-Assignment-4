<?php
session_start();
class LoginModel{

private static $CorrectUsername = "Admin"; //The Correct information needed to be able to login
private static $CorrectPassword = "Password";
private $UserUserName; //The user inputs will go here
private $UserPassword;
private $IsUserLoggedIn;
private $LoginMessage;
    
    public function __construct(){ //Skapar session och sätter till false
	 if(!isset($_SESSION['USERLOGGEDIN']))
             {
                 $_SESSION['USERLOGGEDIN'] = false;
             }	
	}
    
    public function CheckLogin($_UserPassword,$_UserUsername) //Kollar logininformationen, och beroende om den matchar eller inte händer olika scenarion
    {
        $this->UserPassword = $_UserPassword;
        $this->UserUserName = $_UserUsername;
       
        if($this->UserUserName == self::$CorrectUsername && $this->UserPassword == self::$CorrectPassword)
        {
            if($_SESSION['USERLOGGEDIN'] == false)
            {
             $this->LoginMessage = "Welcome";
            }
             
             $_SESSION['USERLOGGEDIN'] = true;
        }
        elseif($this->UserUserName == '')
        {
            $this->LoginMessage = "Username is missing";    
        }
        elseif($this->UserUserName != '' && $this->UserPassword === ''){
            $this->LoginMessage = "Password is missing";
        }
        elseif($this->UserUserName != self::$CorrectUsername)
        {
             $this->LoginMessage = "Wrong name or password";
        }
        elseif($this->UserPassword != self::$CorrectPassword)
        {
             $this->LoginMessage = "Wrong name or password";
        }
    }
    
    public function getMessage() //Retunerar LoginMessage till LoginView för att den ska presenteras
    {
        return $this->LoginMessage;
    }
    
    public function UserWantsToLogout() //Tar bort session och fixar meddelande om man loggar ut.
    {
        //Ta bort session, rensa cookies etc.
        if($_SESSION['USERLOGGEDIN'] == true)
        {
            $this->LoginMessage = "Bye bye!";
        }
        unset($_SESSION['USERLOGGEDIN']);
        session_destroy();
        return $this->LoginMessage;
    }
    
    public function Issessionset() //Retunerar sessionen för Layoutview.
    {
        if(isset($_SESSION['USERLOGGEDIN']))
        {
            return $_SESSION['USERLOGGEDIN'];
        }
    }
}
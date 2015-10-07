<?php
session_start();
class LoginModel
{

    private static $CorrectUsername = "Admin"; //The Correct information needed to be able to login
    private static $CorrectPassword = "Password";
    //Byt ut ovanstående till att hämta data från REGISTERDAL, läs användarnamn där.
    
    private $RegisterDAL;
    private $UserNametovalidate; //The user inputs will go here
    private $Passwordtovalidate;
    private $IsUserLoggedIn;
    private $LoginMessage;
    
    public function __construct(RegisterDAL $_RegisterDAL)
    { //Skapar session och sätter till false
    
        $this->RegisterDAL = $_RegisterDAL;
        
	    if(!isset($_SESSION['USERLOGGEDIN']))
        {
            $_SESSION['USERLOGGEDIN'] = false;
        }	
	}
    
    public function CheckLogin($_Passwordtovalidate,$_Usernametovalidate) //Kollar logininformationen, och beroende om den matchar eller inte händer olika scenarion
    {
        $_Passwordtovalidate = hash('sha1', $_Passwordtovalidate);
        $this->Passwordtovalidate = $_Passwordtovalidate;
        $this->Usernametovalidate = $_Usernametovalidate;
        
        if($this->Usernametovalidate == '')
        {
            $this->LoginMessage = "Username is missing";    
        }
        elseif($this->Usernametovalidate != '' && $this->Passwordtovalidate === ''){
            $this->LoginMessage = "Password is missing";
        }
        
        $ListofUsers = $this->RegisterDAL->GetAllUsers(); //<- Does not work, .bin file not yet created, need to learn Serialize first.
        //Will check if username already exists in the list of registed users.
        if($ListofUsers != null)
        {
            foreach($ListofUsers as $RegistedUsers)
            {
                if($this->Usernametovalidate != $RegistedUsers->getUsername())
                {
                     $this->LoginMessage = "Wrong name or password";
                }
                elseif($this->Passwordtovalidate != $RegistedUsers->getPassword())
                {
                     $this->LoginMessage = "Wrong name or password";
                }                
                elseif($this->Usernametovalidate == $RegistedUsers->getUsername() && $this->Passwordtovalidate == $RegistedUsers->getPassword())
                {
                    if($_SESSION['USERLOGGEDIN'] == false)
                {
                    $this->LoginMessage = "Welcome";
                }
                    $_SESSION['USERLOGGEDIN'] = true;
                }
            }
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
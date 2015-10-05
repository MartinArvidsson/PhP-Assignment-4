<?php

class RegisterDAL{
private $Usernametoreg;
private $Passwordtoreg;
private $RepeatPasswordtoreg;

    public function RegisterUser($_Username,$_Password,$_RepeatPassword)
    {
        $this->Usernametoreg = $_Username;
        $this->Passwordtoreg = $_Password;
        $this->RepeatPasswordtoreg = $_RepeatPassword;
        
        //Kolla om användarnamn innehåller kod, eller är för kort
        
        
        
        //Kolla om lösenordet inehåller kod, är för kort eller inte matchar repeatpassword
    }
    
}
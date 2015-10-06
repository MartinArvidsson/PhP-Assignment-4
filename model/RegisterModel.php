<?php

class RegisterModel
{   
    private $Usernametorval;
    private $Passwordtorval;
    private $RepeatPasswordtoval;
    private $RegisterDAL;
    private $ListofUsers;
    
    public function __construct(RegisterDAL $_RegisterDAL)
    {
        $this->RegisterDAL = $_RegisterDAL;
    }

    public function RegisterUser($_Username,$_Password,$_RepeatPassword)
    {
        $this->Usernametorval = $_Username;
        $this->Passwordtorval = $_Password;
        $this->RepeatPasswordtoval = $_RepeatPassword;
        
        
        if($this->ValidateUser($Usernametorval,$Passwordtorval,$RepeatPasswordtoval))
        {
            $this->RegisterDAL->AddUser($Usernametorval,$Passwordtorval,$RepeatPasswordtoval);
        }
    }
    
    private function ValidateUser($Usernametorval,$Passwordtorval,$RepeatPasswordtoval)
    {
        //This is for Mandatory testcase nr.4.8
        $ListofUsers = $this->RegisterDAL->GetAllUsers(); //<- Does not work, .bin file not yet created, need to learn Serialize first.
        //Will check if username already exists in the list of registed users. 
        
        if(strlen($Usernametorval) < 3 && strlen($Passwordtorval) < 6)
        {
            throw new exception("Username has too few characters, at least 3 characters. Password has too few characters, at least 6 characters.");
        }
        if(ctype_space($Passwordtorval) && strlen($Passwordtorval) < 6)
        {
            throw new exception("Password has too few characters, at least 6 characters.");
        }
        if(strlen($Usernametorval) < 3)
        {
            throw new exception("Username has too few characters, at least 3 characters.");
        }
        if(strlen($Passwordtorval) < 6)
        {
            throw new exception("Password has too few characters, at least 6 characters.");
        }
        if($Passwordtorval != $RepeatPasswordtoval)
        {
            throw new exception("Passwords do not match.");
        }
        
        
        
    }
    
}